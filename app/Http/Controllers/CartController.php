<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderConfirmation;
use Illuminate\Support\Facades\Notification;
use App\Notifications\OrderSuccessNotification;
use App\Models\User;

class CartController extends Controller
{
    // 1. Hiện danh sách giỏ hàng
    public function index() {
        $cart = session()->get('cart', []);
        $total = 0;
        foreach($cart as $item) {
            $total += ($item['price'] ?? 0) * ($item['quantity'] ?? 0);
        }
        // Trả về view trong thư mục resources/views/cart/index.blade.php
        return view('cart.index', compact('cart', 'total'));
    }

    // 2. Thêm sản phẩm vào giỏ (Xử lý cho câu 3)
    public function add(Request $request) {
        $productId = $request->input('product_id');
        $quantity = $request->input('quantity', 1);

        $product = DB::table('san_pham')->where('id', $productId)->first();
        if (!$product) return response()->json(['success' => false], 404);

        $cart = session()->get('cart', []);

        if(isset($cart[$productId])) {
            $cart[$productId]['quantity'] += $quantity;
        } else {
            $cart[$productId] = [
                "name"     => $product->ten_san_pham,
                "quantity" => $quantity,
                "price"    => $product->gia_ban,
                "image"    => $product->hinh_anh
            ];
        }

        session()->put('cart', $cart);

        $totalQuantity = count($cart);

        return response()->json([
            'success'        => true,
            'message'        => 'Đã thêm vào giỏ hàng!',
            'total_quantity' => $totalQuantity
        ]);
    }

public function checkout(Request $request) {
    $cart = session()->get('cart', []);
    if(empty($cart)) return redirect()->back();

    $user = Auth::user();

    // 1. Lưu đơn hàng (don_hang)
    $orderId = DB::table('don_hang')->insertGetId([
        'ngay_dat_hang' => now(),
        'tinh_trang' => 1,
        'hinh_thuc_thanh_toan' => $request->hinh_thuc_thanh_toan,
        'user_id' => $user->id
    ]);

    $total = 0;
    $orderDetails = [];

    // 2. Lưu chi tiết (chi_tiet_don_hang)
    foreach($cart as $id => $details) {
        DB::table('chi_tiet_don_hang')->insert([
            'ma_don_hang' => $orderId,
            'id_san_pham' => $id,
            'so_luong' => $details['quantity'],
            'don_gia' => $details['price']
        ]);
        $total += $details['price'] * $details['quantity'];
        $orderDetails[] = $details;
    }

    $orderData = [
        'orderId' => $orderId,
        'orderDate' => now()->format('d/m/Y H:i'),
        'paymentMethod' => $request->hinh_thuc_thanh_toan == 1 ? 'Tiền mặt' : 'Chuyển khoản',
        'orderDetails' => $orderDetails,
        'total' => $total
    ];

    $user->notify(new OrderSuccessNotification($orderData));

    // 4. Xóa giỏ và chuyển hướng
    session()->forget('cart');
    return redirect()->route('cart.index')->with('success', 'Đặt hàng thành công! Vui lòng kiểm tra email.');
}

    // 4. Xóa sản phẩm khỏi giỏ hàng
    public function remove($id) {
        $cart = session('cart', []);
        if(isset($cart[$id])) {
            unset($cart[$id]);
            session(['cart' => $cart]);
        }
        return redirect()->back()->with('success', 'Sản phẩm đã được xóa khỏi giỏ hàng.');
    }
}