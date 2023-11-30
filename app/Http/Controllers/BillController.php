<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Bill;
use App\Models\BillDetail;
use App\Models\Admin;
use App\Models\Book;
use Illuminate\Http\Request;
use App\Mail\SendToUser;
use App\Mail\SendToUser2;
use Illuminate\Support\Facades\Mail;

class BillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->get("search");
        $status = $request->get("status");
        $paymethod = $request->get("paymethod");
        $listAdmin = Admin::all();
        $listBook = Book::all();
        if($status != null){
            if($paymethod != null){
                $listBill = Bill::join("users", "bill.user_id", "=", "users.user_id")
                                ->orderBy('bill_id', 'DESC')
                                ->where("bill_id", "like", "%$search%")
                                ->where("status", $status)
                                ->where("pay_method", $paymethod)
                                ->paginate(10);
            }else{
                $listBill = Bill::join("users", "bill.user_id", "=", "users.user_id")
                                ->orderBy('bill_id', 'DESC')
                                ->where("bill_id", "like", "%$search%")
                                ->where("status", $status)
                                ->paginate(10);
            }
        }else{
            if($paymethod != null){
                $listBill = Bill::join("users", "bill.user_id", "=", "users.user_id")
                                ->orderBy('bill_id', 'DESC')
                                ->where("bill_id", "like", "%$search%")
                                ->where("pay_method", $paymethod)
                                ->paginate(10);
            }else{
                $listBill = Bill::join("users", "bill.user_id", "=", "users.user_id")
                            ->orderBy('bill_id', 'DESC')
                            ->where("bill_id", "like", "%$search%")
                            ->paginate(10);
            }
        }
        $billdt = BillDetail::join("book", "bill_detail.book_id", "=", "book.book_id")
                            ->where("bill_id", "like", "%$search%")
                            ->get(['bill_detail.*', 'book.*']);
        return view('bill.index', [
            "listBill" => $listBill,
            "search" => $search,
            "status" => $status,
            "paymethod" => $paymethod,
            "listAdmin" => $listAdmin,
            "listBook" => $listBook,
            "billdt" => $billdt,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $time = $request->get('time');
        $idStudent = $request->get('idStudent');
        $idBook = $request->get('idBook');
        $status = $request->get('status');
        $bill = new Bill();
        $bill->time = $time;
        $bill->idStudent = $idStudent;
        $bill->idBook = $idBook;
        $bill->status = $status;
        $bill->save();
        return redirect(route('bill.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request ,$id)
    {
        $search = $request->get("search");
        $listDetailBill = BillDetail::join("book", "bill_detail.book_id", "=", "book.book_id")
                                    ->where("book_name", "like", "%$search%")
                                    ->where('bill_id', '=' , $id)->paginate(10);
        $listDetailBillAll = BillDetail::join("book", "bill_detail.book_id", "=", "book.book_id")
                                    ->where('bill_id', '=' , $id)
                                    ->get(['bill_detail.*', 'book.*']);
        $bill = Bill::find($id);
        return view('bill.detail', [
            "listDetailBill" => $listDetailBill,
            "listDetailBillAll" => $listDetailBillAll,
            "search" => $search,
            "bill" => $bill,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $userid = Session('id');
        $status = $request->get('status');
        $bill = Bill::find($id);
        if($bill->status == 0){
            $bill->status = $status;
            $bill->editor_id = $userid;
            $bill->save();
            $student = Admin::find($bill->user_id);
            if($status == 1){
                $qty_bill_str = $request->get('qty_bill');
                $qty_book_str = $request->get('qty_book');
                $book_id_str = $request->get('book_id');
                $qty_received_str = $request->get('qty_received');
                $qty_bill = explode(',', $qty_bill_str);
                $qty_book = explode(',', $qty_book_str);
                $book_id = explode(',', $book_id_str);
                $qty_received = explode(',', $qty_received_str);
                $a = count($book_id);
                $c = 0;
                for( $i = 0 ; $i < $a ; $i++ ){
                    $book = Book::find($book_id[$i]);
                    if(((int)$qty_book[$i] - (int)$qty_bill[$i]) < 2){
                        $c++;
                    }
                }
                if($c == 0){
                    for( $i = 0 ; $i < $a ; $i++ ){
                        $book = Book::find($book_id[$i]);
                        $book->qty_received = (int)$qty_received[$i] + (int)$qty_bill[$i];
                        $book->qty = (int)$qty_book[$i] - (int)$qty_bill[$i];
                        $book->save();
                    }
                    // Mail::to($student->email)->send(new SendToUser);
                    return [1,$id];
                }else{
                    $bill->status = 0;
                    $bill->save();
                    return [5,$id];
                }
            }else{
                // Mail::to($student->email)->send(new SendToUser2);
                return [2,$id];
            }
        }elseif($bill->status == 1){
            return [3,$id];
        }else{
            return [4,$id];
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Bill::where('idBill', $id)->delete();
        return redirect(route('bill.index'));
    }
}
