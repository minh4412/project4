<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Grade;
use App\Models\Course;
use Illuminate\Support\Facades\DB;
class GradeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $req)
    {
        $search = $req->get('search');
        // $idCourse = $req->get('idCourse');
        $listgrade = Grade::join("course", "class.course_id", "=" , "course.course_id")
                        // ->where("course.course_id", $idCourse)
                        ->where('code', 'like' , "%$search%")
                        ->paginate(10);
        $listcourse = Course::all();
        return view("grade.index", [
            "ListGrade" => $listgrade,
            "search" => $search,
        ]); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $listcourse = Course::all();
        return view("grade.create", [
            "ListCourse" => $listcourse,
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
        $name = $request->get('class');
        $idCourse = $request->get('course');
        $grade = new Grade();
        $grade->code = $name;
        $grade->course_id = $idCourse;
        $grade->save();
        return redirect(route('class.index'));
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
        $listcourse = Course::all();
        $listgrade = Grade::join("course", "class.course_id", "=" , "course.course_id")
                        ->find($id);
        return view('grade.edit', [
            "class" => $listgrade,
            "ListCourse" => $listcourse,
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
        $class = $request->get('class');
        $course = $request->get('course');
        $grade = Grade::find($id);
        $grade->code = $class;
        $grade->course_id = $course;
        $grade->save();
        return redirect(route('class.index'))->with('editclass','1');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Grade::where('class_id', $id)->delete();
        return redirect(route('class.index'));
    }
}
