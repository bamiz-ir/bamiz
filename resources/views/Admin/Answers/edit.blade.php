@extends('Admin.master')
@section('titlePage','ویرایش پاسخ تیکت')
@section('Styles')

@endsection
@section('Scripts')

@endsection
@section('content')

        @livewire('admin.answers.form-answer' , [

            'titlePage' => 'ویرایش پاسخ تیکت بامیز',
            'type' => 'edit',
            'answer' => $answer

        ])

@endsection
