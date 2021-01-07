@extends('Admin.master')
@section('titlePage','افزودن تیکت جدید')
@section('Styles')

@endsection
@section('Scripts')

@endsection
@section('content')

    @livewire('admin.questions.form-question',[
    'titlePage' => 'افزودن تیکت بامیز',
    ])
@endsection
