@extends('Admin.master')
@section('titlePage','ویرایش پرسش تیکت')
@section('Styles')

@endsection
@section('Scripts')

@endsection
@section('content')

        @livewire('admin.questions.form-question' , [

            'titlePage' => 'ویرایش پرسش تیکت بامیز',
            'type' => 'edit',
            'question' => $question

        ])

@endsection
