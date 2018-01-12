<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
//use Illuminate\Http\Request;
use \App\Http\Requests\TeacherRequest;
//use Illuminate\Support\Facades\Input;
use \App\Teacher;

class TeachersController extends Controller
{
    //

    public function index()
    {
        return view('teachers.index')
            ->with('teachers', Teacher::latest('employed_at')->get());
    }

    public function quit()
    {
        return view('teachers.quit')->with('teachers',
            Teacher::onlyTrashed()->get());
    }


    public function show($id)
    {
        $t = Teacher::findOrFail($id);



        return view('students.index')
            ->with('students', $t->students);
    }

    public function create()
    {
        return view('teachers.create');
    }

    /*
    public function store() {
    // 使用 Input 來取得使用者從表單輸入之資料
    $name = Input::get('teacher_name');
    $id = Input::get('teacher_id');
    return '教師名稱：' . $name . '，教師編號：' . $id;
    }
    */

    public function store(TeacherRequest $request)
    {
        /*
        $this->validate($request, [
            'name' => 'required|min:2',
            'email' => 'required|email',
            'professional' => 'required',
            'url' => 'required',
            'employed_at' => 'required|date'
            ]);
        */

        //Teacher::create($request->all());
        $teacher_new = new Teacher;
        $teacher_new->name = $request->input('name');
        $teacher_new->email = $request->input('email');
        $teacher_new->professional = $request->input('professional');
        $teacher_new->url = $request->input('url');
        $teacher_new->employed_at = $request->input('employed_at');
        $teacher_new->save();


        return redirect('teachers');
    }

    public function edit($id)
    {
        return view('teachers.edit')->with('teacher', Teacher::findOrFail($id));
    }

    public function update($id, TeacherRequest $request)
    {
        $t = Teacher::findOrFail($id);
        $t->update($request->all());

        return redirect('teachers');
    }

    public function destroy($id)
    {
        $t = Teacher::findOrFail($id);
        $t->delete();

        return redirect('teachers');
    }

    public function restore($id)
    {
        $t = Teacher::onlyTrashed()->where('id', '=', $id);
        $t->restore();

        return redirect('teachers/quit');
    }
}
