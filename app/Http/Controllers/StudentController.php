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
        $liststudent = Admin::join("class", "users.class_id", "=" , "class.class_id")
                            ->where('name', 'like' , "%$search%")
                            ->where('role', 0)
                            ->paginate(10);
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
        $liststudent = Student::all();
        $listgrade = Grade::all();
        return view("student.create", [
            "ListGrade" => $listgrade,
            "ListStudent" => $liststudent,
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
        $name = $request->get('name');
        $date = $request->get('birthdate');
        $idGrade = $request->get('idGrade');
        $gender = $request->get('gender');
        $available = 0;
        $student = new Student();
        $student->nameStudent = $name;
        $student->idGrade = $idGrade;
        $student->birthday = $date;
        $student->gender = $gender;
        $student->available = $available;
        $student->save();
        return redirect(route('student.index'));
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
        return redirect(route('student.index'));
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

    // public function import()
    // {
    //     return view("student.import");
    // }

    // public function importprocess(Request $request)
    // {
    //     $file = $request->file('fileimport');
    //     Excel::import(new StudentImport, $file );
        
    //     return redirect(route('student.index'));
    // }

    // public function export()
    // {
    //     return Excel::download(new StudentExport, 'student.xlsx');
    // }
}
