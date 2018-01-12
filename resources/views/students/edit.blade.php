@extends('app')

@section('title', 'LHU 編輯學生資料')

@section('lhu_contents')

    {!! Form::model($student, ['method'=>'PATCH','action'=>['StudentsController@update', $student->id]]) !!}

        @include('students.form', ['submitButtonText' => '更新學生資料'])
    {!! Form::close() !!}

    @include('errors.list')

@stop
