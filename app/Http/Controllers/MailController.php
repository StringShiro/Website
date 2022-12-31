<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\Customer;
use App\Coupon;
use Carbon\Carbon;
session_start();

class MailController extends Controller
{
    public function send_mail(){
        //send mail
        $to_name = "shopbanhang.tech";
        $to_email = "lmhtovn@gmail.com"; //send to this email

        $data = array("name" => "shopbanhang.tech", "body" => "Nội dung nè");

        Mail::send('pages.send_mail',$data,function($message) use ($to_name,$to_email){
            $message->to($to_email)->subject('Mail nè');//send mail with subject
            $message->from($to_email,$to_name); //send from this mail
        });
        return redirect('/')->with('message', '');
    }

    public function send_coupon(){
        //get customer
        $customer_vip = Customer::where('customer_vip', 1)->get();
        $now = Carbon::now('Asia/Ho_Chi_Minh')->format('d-m-Y H:i:s');
        $title_mail = "Gửi mã khuyến mãi ngày".' '.$now;
        $data = [];
        // get customer email
        foreach($customer_vip as $vip){
            $data['email'][] = $vip->customer_email;
        }
        //dd($data);

        Mail::send('pages.send_mail', $data, function($message) use ($title_mail,$data){
            $message->to($data['email'])->subject($title_mail);//send mail with subject
            $message->from($data['email'],$title_mail); //send from this mail
        });

        return redirect()->back()->with('message','Gửi mã khuyến mãi khách vip thành công');
    }
    public function mail_example(){
        return view('pages.send_mail');
    }
}
