<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Session;
use Log;

class StudentsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $students = \App\Models\Student::paginate(4);

        $data = [];
        $data['students'] = $students;

        return view('students.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('students.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = array(
            'first_name' => 'required|max:100',
            'description' => 'required'
        );

        $this->validate($request, $rules);

        $student = new Student();
        $student->first_name = $request->first_name;
        $student->description = $request->description;
        $student->subscribed = $request->subscribed;
        $student->school_name = $request->school_name;
        $student->save();

        \Log::info("New student profile saved", $request->all());

        $request->session()->flash('successMessage', 'Post saved successfully');
        return redirect()->action('StudentsController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $student = Student::find($id);

        if(!$student) {
            Log::info("Student with ID $id cannot be found");
            $request->session()->flash('errorMessage', 'Post not found');
            abort(404);
        }
        return view('students.show')->with('student', $student);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $student = Student::find($id);

        if(!$student) {
            Session::flash("errorMessage", "Student not found");
        }
        //
        return view('students.edit')->with('student', $student);
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
        $student = Student::find($id);

        if(!$student) {
            Session::flash("errorMessage", "Student not found");
            return redirect()->action("StudentsController@index");
        }

        $student->first_name = $request->first_name;
        $student->description = $request->description;
        $student->subscribed = $request->subscribed;
        $student->school_name = $request->school_name;
        $student->save();

        return view('students.show')->with('student', $student);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student = Student::find($id);
        
        if(!$student) {
            Session::flash('errorMessage', "Post not found");
            return redirect()->action('StudentsController@index');
        }

        $student->delete();
        return redirect()->action('StudentsController@index');
    }
}
