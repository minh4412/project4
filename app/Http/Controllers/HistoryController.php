<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Bill;
use App\Models\BillDetail;
use App\Models\Admin;
use App\Models\Book;
use Illuminate\Http\Request;

class HistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $userid = Session('id');
        $search = $request->get("search");
        $status = $request->get("status");
        $paymethod = $request->get("paymethod");
        $listStudent = Admin::where('role', '=' , 1);
        $listBook = Book::all();
        if($status != null){
            if($paymethod != null){
                $listBill = Bill::join("users", "bill.user_id", "=", "users.user_id")
                                ->orderBy('bill_id', 'DESC')
                                ->where("bill.user_id", $userid)
                                ->where("bill_id", "like", "%$search%")
                                ->where("status", $status)
                                ->where("pay_method", $paymethod)
                                ->paginate(10);
            }else{
                $listBill = Bill::join("users", "bill.user_id", "=", "users.user_id")
                                ->orderBy('bill_id', 'DESC')
                                ->where("bill.user_id", $userid)
                                ->where("bill_id", "like", "%$search%")
                                ->where("status", $status)
                                ->paginate(10);
            }
        }else{
            if($paymethod != null){
                $listBill = Bill::join("users", "bill.user_id", "=", "users.user_id")
                                ->orderBy('bill_id', 'DESC')
                                ->where("bill.user_id", $userid)
                                ->where("bill_id", "like", "%$search%")
                                ->where("pay_method", $paymethod)
                                ->paginate(10);
            }else{
                $listBill = Bill::join("users", "bill.user_id", "=", "users.user_id")
                            ->orderBy('bill_id', 'DESC')
                            ->where("bill.user_id", $userid)
                            ->where("bill_id", "like", "%$search%")
                            ->paginate(10);
            }
        }
        $billdt = BillDetail::join("book", "bill_detail.book_id", "=", "book.book_id")
                            ->where("bill_id", "like", "%$search%")
                            ->get(['bill_detail.*', 'book.*']);
        return view('history', [
            "listBill" => $listBill,
            "search" => $search,
            "status" => $status,
            "paymethod" => $paymethod,
            "listStudent" => $listStudent,
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
        return view('dthistory', [
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
    public function update($id)
    {
        $bill = Bill::find($id);
        $bill->status = 2;
        $bill->save();
        return redirect(route('history.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    }
}
