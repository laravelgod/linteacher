<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
use \App\Http\Requests\StudentRequest;
use \App\Student;
use \App\Teacher;

class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('students.index')
            ->with('students', Student::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('students.create')
            ->with('teachers', Teacher::latest('employed_at')->get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(StudentRequest $request)
    {
        $student_new = new Student;
        $student_new->name = $request->input('name');
        $student_new->email = $request->input('email');
        $student_new->teacher_id = $request->input('teacher_id');
        $student_new->born_at = $request->input('born_at');
        $student_new->save();

        return redirect('students');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('students.edit')
            ->with(['student'=>Student::findOrFail($id),
                    'teachers'=>Teacher::latest('employed_at')->get()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(StudentRequest $request, $id)
    {
        $s = Student::findOrFail($id);
        $s->update($request->all());

        return redirect('students');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $s = Student::findOrFail($id);
        $s->delete();

        return redirect('students');
    }

    public function restore($id)
    {
        $t = Student::onlyTrashed()->where('id', '=', $id);
        $t->restore();

        return redirect('students/quit');
    }

    public function quit()
    {

        return view('students.quit')->with('students',
            Student::onlyTrashed()->get());
    }
}
