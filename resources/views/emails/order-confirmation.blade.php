<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xác nhận đặt hàng</title>
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; }
        .container { max-width: 600px; margin: 0 auto; padding: 20px; }
        .header { background-color: #28a745; color: white; padding: 20px; text-align: center; }
        .content { padding: 20px; background-color: #f9f9f9; }
        .order-details { background-color: white; padding: 15px; margin: 20px 0; border-radius: 5px; }
        .total { font-weight: bold; font-size: 18px; color: #28a745; }
        .footer { text-align: center; padding: 20px; color: #666; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Đặt hàng thành công!</h1>
        </div>
        <div class="content">
            <p>Xin chào <strong>{{ $user->name }}</strong>,</p>
            <p>Cảm ơn bạn đã đặt hàng tại cửa hàng cây cảnh của chúng tôi!</p>
            <p>Đơn hàng của bạn đã được xác nhận với thông tin sau:</p>

            <div class="order-details">
                <h3>Chi tiết đơn hàng #{{ $orderId }}</h3>
                <p><strong>Ngày đặt:</strong> {{ $orderDate }}</p>
                <p><strong>Hình thức thanh toán:</strong> {{ $paymentMethod }}</p>

                <table style="width: 100%; border-collapse: collapse; margin-top: 15px;">
                    <thead>
                        <tr style="background-color: #f8f9fa;">
                            <th style="border: 1px solid #ddd; padding: 8px; text-align: left;">Sản phẩm</th>
                            <th style="border: 1px solid #ddd; padding: 8px; text-align: center;">Số lượng</th>
                            <th style="border: 1px solid #ddd; padding: 8px; text-align: right;">Đơn giá</th>
                            <th style="border: 1px solid #ddd; padding: 8px; text-align: right;">Thành tiền</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($orderDetails as $item)
                        <tr>
                            <td style="border: 1px solid #ddd; padding: 8px;">{{ $item['name'] }}</td>
                            <td style="border: 1px solid #ddd; padding: 8px; text-align: center;">{{ $item['quantity'] }}</td>
                            <td style="border: 1px solid #ddd; padding: 8px; text-align: right;">{{ number_format($item['price'], 0, ',', '.') }}đ</td>
                            <td style="border: 1px solid #ddd; padding: 8px; text-align: right;">{{ number_format($item['price'] * $item['quantity'], 0, ',', '.') }}đ</td>
                        </tr>
                        @endforeach
                        <tr style="background-color: #f8f9fa;">
                            <td colspan="3" style="border: 1px solid #ddd; padding: 8px; text-align: right; font-weight: bold;">Tổng cộng:</td>
                            <td style="border: 1px solid #ddd; padding: 8px; text-align: right; font-weight: bold; color: #28a745;">{{ number_format($total, 0, ',', '.') }}đ</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <p>Chúng tôi sẽ xử lý đơn hàng của bạn trong thời gian sớm nhất. Bạn sẽ nhận được thông tin cập nhật qua email hoặc điện thoại.</p>
            <p>Nếu có bất kỳ câu hỏi nào, vui lòng liên hệ với chúng tôi.</p>

            <p>Trân trọng,<br>
            Đội ngũ Cửa hàng Cây Cảnh</p>
        </div>
        <div class="footer">
            <p> 2024 Cửa hàng Cây Cảnh. Tất cả quyền được bảo lưu.</p>
        </div>
    </div>
</body>
</html>