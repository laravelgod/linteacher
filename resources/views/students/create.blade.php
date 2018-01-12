@extends('app')

@section('title', 'LHU 註冊學生')

@section('lhu_contents')
    {!! Form::open(['url' => 'students']) !!}
        @include('students.form', ['submitButtonText' => '註冊一位學生'])

    {!! Form::close() !!}

    @include('errors.list')

@stop
