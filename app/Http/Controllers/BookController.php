<?php
namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Subject;
use App\Models\Category;
use App\Models\Major;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->get('search');
        $major = $request->get('major');
        $category = $request->get('category');
        $subject = $request->get('subject');
        $listSubject = Subject::all();
        $listCategory = Category::all();
        $listMajor = Major::all();
        if($category != null && $subject != null && $major != null){
            if($subject == 0){
                $listBook = Book::join('category', 'book.category_id', "=", 'category.category_id')
                                ->join('major', 'book.major_id', "=", 'major.major_id')
                                ->where('book_name', 'like', "%$search%")
                                ->where('book.category_id', $category)
                                ->whereNull('subject_id')
                                ->where('book.major_id', $major)
                                ->orderBy('book_id', 'DESC')
                                ->paginate(10);
            }else{
                $listBook = Book::join('category', 'book.category_id', "=", 'category.category_id')
                                ->join('major', 'book.major_id', "=", 'major.major_id')
                                ->where('book_name', 'like', "%$search%")
                                ->where('book.category_id', $category)
                                ->where('subject_id', $subject)
                                ->where('book.major_id', $major)
                                ->orderBy('book_id', 'DESC')
                                ->paginate(10);
            }
        }elseif($category != null && $subject != null && $major == null){
            if($subject == 0){
                $listBook = Book::join('category', 'book.category_id', "=", 'category.category_id')
                                ->join('major', 'book.major_id', "=", 'major.major_id')
                                ->where('book_name', 'like', "%$search%")
                                ->where('book.category_id', $category)
                                ->whereNull('subject_id')
                                ->orderBy('book_id', 'DESC')
                                ->paginate(10);
            }else{
                $listBook = Book::join('category', 'book.category_id', "=", 'category.category_id')
                                ->join('major', 'book.major_id', "=", 'major.major_id')
                                ->where('book_name', 'like', "%$search%")
                                ->where('book.category_id', $category)
                                ->where('subject_id', $subject)
                                ->orderBy('book_id', 'DESC')
                                ->paginate(10);
            }
        }elseif($category != null && $subject == null && $major == null){
            $listBook = Book::join('category', 'book.category_id', "=", 'category.category_id')
                            ->join('major', 'book.major_id', "=", 'major.major_id')
                            ->where('book_name', 'like', "%$search%")
                            ->where('book.category_id', $category)
                            ->orderBy('book_id', 'DESC')
                            ->paginate(10);
        }elseif($category == null && $subject != null && $major != null){
            if($subject == 0){
                $listBook = Book::join('category', 'book.category_id', "=", 'category.category_id')
                                ->join('major', 'book.major_id', "=", 'major.major_id')
                                ->where('book_name', 'like', "%$search%")
                                ->whereNull('subject_id')
                                ->where('book.major_id', $major)
                                ->orderBy('book_id', 'DESC')
                                ->paginate(10);
            }else{
                $listBook = Book::join('category', 'book.category_id', "=", 'category.category_id')
                                ->join('major', 'book.major_id', "=", 'major.major_id')
                                ->where('book.book_name', 'like', "%$search%")
                                ->where('subject_id', $subject)
                                ->where('book.major_id', $major)
                                ->orderBy('book_id', 'DESC')
                                ->paginate(10);
            }
        }elseif($category == null && $subject != null && $major == null){
            if($subject == 0){
                $listBook = Book::join('category', 'book.category_id', "=", 'category.category_id')
                                ->join('major', 'book.major_id', "=", 'major.major_id')
                                ->where('book_name', 'like', "%$search%")
                                ->whereNull('subject_id')
                                ->orderBy('book_id', 'DESC')
                                ->paginate(10);
            }else{
                $listBook = Book::join('category', 'book.category_id', "=", 'category.category_id')
                                ->join('major', 'book.major_id', "=", 'major.major_id')
                                ->where('book.book_name', 'like', "%$search%")
                                ->where('subject_id', $subject)
                                ->orderBy('book_id', 'DESC')
                                ->paginate(10);
            }
        }elseif($category != null && $subject == 0 && $major != null){
            $listBook = Book::join('category', 'book.category_id', "=", 'category.category_id')
                            ->join('major', 'book.major_id', "=", 'major.major_id')
                            ->where('book_name', 'like', "%$search%")
                            ->where('book.category_id', $category)
                            ->where('book.major_id', $major)
                            ->orderBy('book_id', 'DESC')
                            ->paginate(10);
        }elseif($category == null && $subject == 0 && $major != null){
            $listBook = Book::join('category', 'book.category_id', "=", 'category.category_id')
                            ->join('major', 'book.major_id', "=", 'major.major_id')
                            ->where('book_name', 'like', "%$search%")
                            ->where('book.major_id', $major)
                            ->orderBy('book_id', 'DESC')
                            ->paginate(10);
        }else{
            $listBook = Book::join('category', 'book.category_id', "=", 'category.category_id')
                            ->join('major', 'book.major_id', "=", 'major.major_id')
                            ->where('book_name', 'like', "%$search%")
                            ->orderBy('book_id', 'DESC')
                            ->paginate(10);
        }
        return view('book.index', [
            'listBook' => $listBook,
            'search' => $search,
            'major' => $major,
            'category' => $category,
            'subject' => $subject,
            'listSubject' => $listSubject,
            'listCategory' => $listCategory,
            'listMajor' => $listMajor,
        ]);    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $listsubject = Subject::all();
        $listbook = Book::all();
        $listcategory = Category::all();
        $listmajor = Major::all();
        return view('book.create', [
            "listsubject" => $listsubject,
            "listbook" => $listbook,
            "listcategory" => $listcategory,
            "listmajor" => $listmajor,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $name = $request->get('name_book');
        $category = $request->get('category');
        $subject = $request->get('subject');
        $price = $request->get('price');
        $quantity = $request->get('quantity');
        $major = $request->get('major');
        $book = new Book();
        $book->book_name = $name;
        $book->category_id = $category;
        $book->subject_id = $subject;
        $book->price = $price;
        $book->qty = $quantity;
        $book->qty_received = 0;
        $book->major_id = $major;
        $file = $request->file('book-image');
        $extention = $file->getClientOriginalExtension();
        $imagename = time().'.'.$extention;
        $file->move('uploads/books/',$imagename);
        $book->image = $imagename;
        $book->save();
        return redirect(route('book.index'))->with('addbook','1');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $book = Book::where('book_id', $id)->first();
        return $book;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $listsubject = Subject::all();
        $book = Book::find($id);
        $listcategory = Category::all();
        $listmajor = Major::all();
        return view('book.edit', [
            "listsubject" => $listsubject,
            "book" => $book,
            "listcategory" => $listcategory,
            "listmajor" => $listmajor,
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
        $name = $request->get('name_book');
        $category = $request->get('category');
        $subject = $request->get('subject');
        $price = $request->get('price');
        $quantity = $request->get('quantity');
        $major = $request->get('major');
        $book = Book::find($id);
        $book->book_name = $name;
        $book->category_id = $category;
        $book->subject_id = $subject;
        $book->price = $price;
        $book->qty = $quantity;
        $book->major_id = $major;
        if($request->hasFile('book-image')){
            $file = $request->file('book-image');
            $extention = $file->getClientOriginalExtension();
            $imagename = time().'.'.$extention;
            $file->move('uploads/books/',$imagename);
            $book->image = $imagename;
        }
        $book->save();
        return redirect(route('book.index'))->with('editbook','1');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Book::where('book_id', $id)->delete();
        return redirect(route('book.index'));
    }

    // public function import()
    // {
    //     return view('book.import');
    // }

    // public function importprocess(Request $request)
    // {
    //     $file = $request->file('fileimport');
    //     Excel::import(new BookImport, $file );
    //     return redirect(route('book.index'));
    // }

    // public function export()
    // {
    //     return Excel::download(new BookExport, 'book.xlsx');
    // }
}
