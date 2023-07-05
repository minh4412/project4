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
        $search = $request->get("search");
        $listStudent = Admin::where('role', '=' , 1);
        $listBook = Book::all();
        $listBill = Bill::join("users", "bill.user_id", "=", "users.user_id")
                        ->orderBy('bill_id', 'DESC')
                        ->where("bill_id", "like", "%$search%")->paginate(10);
        $billdt = BillDetail::join("book", "bill_detail.book_id", "=", "book.book_id")
                            ->where("bill_id", "like", "%$search%")
                            ->get(['bill_detail.*', 'book.*']);
        return view('history', [
            "listBill" => $listBill,
            "search" => $search,
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
