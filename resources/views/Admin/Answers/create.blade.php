@extends('Admin.master')
@section('titlePage','افزودن پاسخ تیکت جدید')
@section('Styles')

@endsection
@section('Scripts')

@endsection
@section('content')

    @livewire('admin.answers.form-answer',[
    'titlePage' => 'افزودن پاسخ تیکت بامیز',
    ])
@endsection
