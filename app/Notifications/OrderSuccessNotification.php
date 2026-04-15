<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class OrderSuccessNotification extends Notification
{
    use Queueable;

    public $orderData;

    public function __construct($orderData)
    {
        $this->orderData = $orderData;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Xác nhận đặt hàng thành công #' . $this->orderData['orderId'])
            // Sử dụng file blade bạn đã có
            ->view('emails.order-confirmation', [
                'user' => $notifiable,
                'orderId' => $this->orderData['orderId'],
                'orderDate' => $this->orderData['orderDate'],
                'paymentMethod' => $this->orderData['paymentMethod'],
                'orderDetails' => $this->orderData['orderDetails'],
                'total' => $this->orderData['total'],
            ]);
    }
}