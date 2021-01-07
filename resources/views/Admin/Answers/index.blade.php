@extends('Admin.master')
@section('titlePage','لیست پاسخ های تیکت')
@section('Styles')

@endsection
@section('Scripts')

@endsection
@section('content')

    @livewire('admin.answers.list-answer' , [

    'titlePage' => 'لیست پاسخ های تیکت بامیز',

    ])

@endsection
