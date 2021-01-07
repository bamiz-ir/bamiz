@extends('Admin.master')
@section('titlePage','لیست پرسش های تیکت')
@section('Styles')

@endsection
@section('Scripts')

@endsection
@section('content')

    @livewire('admin.questions.list-question' , [

    'titlePage' => 'لیست پرسش های تیکت بامیز',

    ])

@endsection
