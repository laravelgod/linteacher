@extends('app')

@section('title', 'LHU 編輯老師資料')

@section('lhu_contents')

    {!! Form::model($teacher, ['method'=>'PATCH','action'=>['TeachersController@update', $teacher->id]]) !!}

        @include('teachers.form', ['submitButtonText' => '更新老師資料'])
    {!! Form::close() !!}

    @include('errors.list')

@stop
