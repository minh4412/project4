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

class CartController extends Controller
{
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
        if(Session('cart') != null){
            $oldcart = Session('cart');
        }else{
            $oldcart = null;
        }
        $newcart = New Cart($oldcart);
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
        $admin = Admin::where('role', 1)->get();
        foreach($admin as $ad){
            Mail::to($ad->email)->send(new SendAdmin);
        }
        return view('cartdt');
    }

    public function CancelOrder($id)
    {
        $bill = Bill::find($id);
        if($bill->status != 1){
            $bill->status = 2;
            $bill->save();
            return 2;
        }else{
            return 1;
        }
    }

    public function EditAll(Request $request){
        $data = $request->data;
        foreach($data as $item){
            if(Session('cart') != null){
                $oldcart = Session('cart');
            }else{
                $oldcart = null;
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
}
