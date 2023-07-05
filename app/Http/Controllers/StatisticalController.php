<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bill;
use App\Models\BillDetail;
use App\Models\Book;
use App\Models\Subject;

class StatisticalController extends Controller
{
    public function index(){
        $listbill = Bill::all();
        $listdtbill = BillDetail::all();
        $listSubject = Subject::all();
        $listbook = Book::join('category', 'book.category_id', "=", 'category.category_id')
                        ->join('major', 'book.major_id', "=", 'major.major_id')
                        ->orderBy('book_id', 'DESC')
                        ->get();
        return view('dashboard',[
            "listbill" => $listbill,
            "listdtbill" => $listdtbill,
            "listbook" => $listbook,
            'listSubject' => $listSubject,
        ]);
    }
}
