<?php

namespace App\Helpers;
use Illuminate\Support\Facades\Mail;

class SendMail
{
    public function orderMail($firstName, $lastName, $phone, $cart, $totalPrice){
        $time = date('d-m-Y H:i:s');

        Mail::send('emails.order', array(
            'firstName' => $firstName,
            'lastName' => $lastName,
            'phone' => $phone,
            'cart' => $cart,
            'totalPrice' => $totalPrice,
            'time' => $time), function($message)
        {
            $message->from('emails@clock.loc', 'Robot')->subject('Нове замовлення');
            $message->to(env('MAIL_RECIPIENT'));
        });
    }

    //Зворотній звязок
    public function feedbackMail($firstName, $phone){
        $time = date('d-m-Y H:i:s');
        Mail::send('emails.feedback', array('firstName' => $firstName, 'phone' => $phone, 'time' => $time), function($message)
        {
            $message->from('emails@clock.loc', 'Robot')->subject('Зворотній зв\'язок');
            $message->to(env('MAIL_RECIPIENT'));
        });
    }
}