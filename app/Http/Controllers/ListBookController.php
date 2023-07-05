<?php
namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Subject;
use App\Models\Category;
use App\Models\Major;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ListBookController extends Controller
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
                                ->paginate(12);
            }else{
                $listBook = Book::join('category', 'book.category_id', "=", 'category.category_id')
                                ->join('major', 'book.major_id', "=", 'major.major_id')
                                ->where('book_name', 'like', "%$search%")
                                ->where('book.category_id', $category)
                                ->where('subject_id', $subject)
                                ->where('book.major_id', $major)
                                ->orderBy('book_id', 'DESC')
                                ->paginate(12);
            }
        }elseif($category != null && $subject != null && $major == null){
            if($subject == 0){
                $listBook = Book::join('category', 'book.category_id', "=", 'category.category_id')
                                ->join('major', 'book.major_id', "=", 'major.major_id')
                                ->where('book_name', 'like', "%$search%")
                                ->where('book.category_id', $category)
                                ->whereNull('subject_id')
                                ->orderBy('book_id', 'DESC')
                                ->paginate(12);
            }else{
                $listBook = Book::join('category', 'book.category_id', "=", 'category.category_id')
                                ->join('major', 'book.major_id', "=", 'major.major_id')
                                ->where('book_name', 'like', "%$search%")
                                ->where('book.category_id', $category)
                                ->where('subject_id', $subject)
                                ->orderBy('book_id', 'DESC')
                                ->paginate(12);
            }
        }elseif($category != null && $subject == null && $major == null){
            $listBook = Book::join('category', 'book.category_id', "=", 'category.category_id')
                            ->join('major', 'book.major_id', "=", 'major.major_id')
                            ->where('book_name', 'like', "%$search%")
                            ->where('book.category_id', $category)
                            ->orderBy('book_id', 'DESC')
                            ->paginate(12);
        }elseif($category == null && $subject != null && $major != null){
            if($subject == 0){
                $listBook = Book::join('category', 'book.category_id', "=", 'category.category_id')
                                ->join('major', 'book.major_id', "=", 'major.major_id')
                                ->where('book_name', 'like', "%$search%")
                                ->whereNull('subject_id')
                                ->where('book.major_id', $major)
                                ->orderBy('book_id', 'DESC')
                                ->paginate(12);
            }else{
                $listBook = Book::join('category', 'book.category_id', "=", 'category.category_id')
                                ->join('major', 'book.major_id', "=", 'major.major_id')
                                ->where('book.book_name', 'like', "%$search%")
                                ->where('subject_id', $subject)
                                ->where('book.major_id', $major)
                                ->orderBy('book_id', 'DESC')
                                ->paginate(12);
            }
        }elseif($category == null && $subject != null && $major == null){
            if($subject == 0){
                $listBook = Book::join('category', 'book.category_id', "=", 'category.category_id')
                                ->join('major', 'book.major_id', "=", 'major.major_id')
                                ->where('book_name', 'like', "%$search%")
                                ->whereNull('subject_id')
                                ->orderBy('book_id', 'DESC')
                                ->paginate(12);
            }else{
                $listBook = Book::join('category', 'book.category_id', "=", 'category.category_id')
                                ->join('major', 'book.major_id', "=", 'major.major_id')
                                ->where('book.book_name', 'like', "%$search%")
                                ->where('subject_id', $subject)
                                ->orderBy('book_id', 'DESC')
                                ->paginate(12);
            }
        }elseif($category != null && $subject == 0 && $major != null){
            $listBook = Book::join('category', 'book.category_id', "=", 'category.category_id')
                            ->join('major', 'book.major_id', "=", 'major.major_id')
                            ->where('book_name', 'like', "%$search%")
                            ->where('book.category_id', $category)
                            ->where('book.major_id', $major)
                            ->orderBy('book_id', 'DESC')
                            ->paginate(12);
        }elseif($category == null && $subject == 0 && $major != null){
            $listBook = Book::join('category', 'book.category_id', "=", 'category.category_id')
                            ->join('major', 'book.major_id', "=", 'major.major_id')
                            ->where('book_name', 'like', "%$search%")
                            ->where('book.major_id', $major)
                            ->orderBy('book_id', 'DESC')
                            ->paginate(12);
        }else{
            $listBook = Book::join('category', 'book.category_id', "=", 'category.category_id')
                            ->join('major', 'book.major_id', "=", 'major.major_id')
                            ->where('book_name', 'like', "%$search%")
                            ->orderBy('book_id', 'DESC')
                            ->paginate(12);
        }
        return view('listbook', [
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
        $listSubject = Subject::all();
        $book = Book::join('category', 'book.category_id', "=", 'category.category_id')
                    ->join('major', 'book.major_id', "=", 'major.major_id')
                    ->find($id);
        return view('detailbook', [
            'book' => $book,
            'listSubject' => $listSubject,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
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
