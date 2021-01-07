@extends('Admin.master')
@section('titlePage','افزودن تشفریفات')
@section('Styles')

@endsection
@section('Scripts')

@endsection
@section('content')

    @livewire('admin.options.form-option' , [

    'titlePage' => 'افزودن تشریفات میزبان',

    ])

@endsection
