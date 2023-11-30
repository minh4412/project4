<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Bill;
use App\Models\Admin;
use App\Models\BillDetail;
use App\Models\Subject;
use Illuminate\Support\Facades\DB;
use App\Cart;
use Illuminate\Http\Request;
use App\Mail\SendAdmin;
use Illuminate\Support\Facades\Mail;
use App\Jobs\SendEmail;
use Exception;

class CartController extends Controller
{
    // public function index(){
    //     $listBook = Book::all();
    //     return view('cart',[
    //         'listBook' => $listBook,
    //     ]);
    // }
    public function AddCart(Request $request , $id){
        $book = DB::table('book')->where("book_id",$id)->first();
        if($book != null){
            if(Session('cart') != null){
                $oldcart = Session('cart');
            }else{
                $oldcart = null;
            }
            $newcart = New Cart($oldcart);
            $newcart->AddCart($book , $id);
            $request->session()->put('cart', $newcart);
        }
        return redirect(route('listbook.show' , $id ));
    }

    public function DeleteItemCart(Request $request ,$id){
        $oldcart = Session('cart');
        $newcart = New Cart($oldcart);
        $newcart->DeleteItemCart($id);
        if(count($newcart->listproduct) > 0){
            $request->session()->put('cart', $newcart);
        }else{
            $request->session()->forget('cart');
        }
        return view('cartdt');
    }

    public function UpdateItemCart(Request $request ,$id ,$qty){
        $book = Book::find($id);
        if(Session('cart') != null){
            $oldcart = Session('cart');
        }else{
            $oldcart = null;
        }
        $newcart = New Cart($oldcart);
        if($qty < 1){
            $qty = 1;
        }
        if($qty > ($book->qty - 1)){
            $qty = ($book->qty -1);
        }
        $newcart->UpdateItemCart($id , $qty);
        $request->session()->put('cart', $newcart);
        return view('cartdt');
    }

    public function Order(Request $request){
        $userid = Session('id');
        $cart = Session('cart');
        $bill = new Bill();
        $bill->user_id = $userid;
        $bill->total_price = $cart->totalprice;
        $bill->status = 0;
        $bill->pay_method = 0;
        $bill->save();
        $a = $bill->bill_id;
        $detailcart = $cart->listproduct;
        foreach($detailcart as $c){
            $dtbill = new BillDetail();
            $dtbill->bill_id = $a;
            $dtbill->book_id = $c["productInfo"]->book_id;
            $dtbill->qty_bill = (int)$c["qty"];
            $dtbill->book_price = $c["productInfo"]->price;
            $dtbill->save();
        }
        $request->session()->forget('cart');
        // $detail = [
        //     'title' => 'Notification email',
        //     'messenge' => 'You have a new unprocessed order.'
        // ];
        // Mail::to("nguyentriminh505@gmail.com")->send(new SendAdmin($detail));
        return view('cartdt');
    }

    public function CancelOrder($id)
    {
        $userid = Session('id');
        $bill = Bill::find($id);
        if($bill->status == 0){
            $bill->editor_id = $userid;
            $bill->status = 2;
            $bill->save();
            return 2;
        }else if($bill->status == 1){
            return 1;
        }else if($bill->status == 2){
            return 3;
        }
    }

    public function EditAll(Request $request){
        $data = $request->data;
        foreach($data as $item){
            $book = Book::find($item["key"]);
            if(Session('cart') != null){
                $oldcart = Session('cart');
            }else{
                $oldcart = null;
            }
            if($item["value"] < 1){
                $item["value"] = 1;
            }
            if($item["value"] > ($book->qty - 1)){
                $item["value"] = ($book->qty -1);
            }
            $newcart = New Cart($oldcart);
            $newcart->UpdateItemCart($item["key"] , $item["value"]);
            $request->session()->put('cart', $newcart);
        }
        return view('cartdt');
    }

    public function DeleteAll(Request $request){
        $request->session()->forget('cart');
        return view('cartdt');
    }

    public function epayment(){
        $last_record = Bill::orderBy('bill_id', 'DESC')->first()->toArray();
        $cart = Session('cart');
        $a =  mt_rand(0, 99999);
        $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        $vnp_Returnurl = url('/payreturn');
        $vnp_TmnCode = "CVNHVFVE";//Mã website tại VNPAY 
        $vnp_HashSecret = "RIISHCDQSXPJKQJYGFFPFAVYLLOAGWSP"; //Chuỗi bí mật

        // $vnp_TxnRef = $last_record["bill_id"] + 1;
        $vnp_TxnRef = $a; //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
        $vnp_OrderInfo = "E-payment";
        $vnp_OrderType = "billpayment";
        $vnp_Amount = $cart->totalprice * 100;
        $vnp_Locale = "vn";
        $vnp_BankCode = "NCB";
        $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];
        //Add Params of 2.0.1 Version
        // $vnp_ExpireDate = $_POST['txtexpire'];
        //Billing
        $inputData = array(
            "vnp_Version" => "2.1.0",
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_OrderType" => $vnp_OrderType,
            "vnp_ReturnUrl" => $vnp_Returnurl,
            "vnp_TxnRef" => $vnp_TxnRef
        );

        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }
        if (isset($vnp_Bill_State) && $vnp_Bill_State != "") {
            $inputData['vnp_Bill_State'] = $vnp_Bill_State;
        }

        //var_dump($inputData);
        ksort($inputData);
        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashdata .= urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }

        $vnp_Url = $vnp_Url . "?" . $query;
        if (isset($vnp_HashSecret)) {
            $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret);//  
            $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
        }
        $returnData = array('code' => '00'
            , 'message' => 'success'
            , 'data' => $vnp_Url);
            if (isset($_POST['redirect'])) {
                header('Location: ' . $vnp_Url);
                die();
            } else {
                echo json_encode($returnData);
            }
    }

    public function payreturn(Request $request){
        if($request->vnp_ResponseCode == "00") {
            try{
                $userid = Session('id');
                $cart = Session('cart');
                if($userid){
                    $bill = new Bill();
                    $bill->user_id = $userid;
                    $bill->total_price = $cart->totalprice;
                    $bill->status = 0;
                    $bill->pay_method = 1;
                    $bill->save();
                    $a = $bill->bill_id;
                    $detailcart = $cart->listproduct;
                    foreach($detailcart as $c){
                        $dtbill = new BillDetail();
                        $dtbill->bill_id = $a;
                        $dtbill->book_id = $c["productInfo"]->book_id;
                        $dtbill->qty_bill = (int)$c["qty"];
                        $dtbill->book_price = $c["productInfo"]->price;
                        $dtbill->save();
                    }
                    $request->session()->forget('cart');
                    $detail = [
                        'title' => 'Notification email',
                        'messenge' => 'You have a new unprocessed order.'
                    ];
                    Mail::to("nguyentriminh505@gmail.com")->send(new SendAdmin($detail));
                    return redirect(url('/mycart'))->with('success' ,'Đã thanh toán phí dịch vụ');
                }
            }catch(Exception $e){
                return redirect(url('/mycart'))->with('fail' ,'Lỗi trong quá trình thanh toán phí dịch vụ');
            }
        }else{
            return redirect(url('/mycart'))->with('fail' ,'Lỗi trong quá trình thanh toán phí dịch vụ');
        }
    }
}
