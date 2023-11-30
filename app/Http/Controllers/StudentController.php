<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Grade;
use App\Models\Course;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $req)
    {
        $search = $req->get('search');
        $grade = $req->get('grade');
        $listgrade = Grade::all();
        if($grade != null){
            $liststudent = Admin::join("class", "users.class_id", "=" , "class.class_id")
                                ->where('name', 'like' , "%$search%")
                                ->where('users.class_id', $grade)
                                ->where('role', 0)
                                ->paginate(10);
        }else{
            $liststudent = Admin::join("class", "users.class_id", "=" , "class.class_id")
                                ->where('name', 'like' , "%$search%")
                                ->where('role', 0)
                                ->paginate(10);
        }
        $listgrade = Grade::all();
        return view("student.index", [
            "ListStudent" => $liststudent,
            "search" => $search,
            "grade" => $grade,
            "listgrade" => $listgrade,
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $listgrade = Grade::all();
        $student = Admin::find($id);
        return view('student.edit', [
            "student" => $student,
            "listgrade" => $listgrade,
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
        $name = $request->get('name');
        $date = $request->get('date');
        $gender = $request->get('gender');
        $grade = $request->get('grade');
        $student = Admin::find($id);
        $student->name = $name;
        $student->date = $date;
        $student->gender = $gender;
        $student->class_id = $grade;
        $student->save();
        return redirect(route('student.index'))->with("editstudent","1");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
