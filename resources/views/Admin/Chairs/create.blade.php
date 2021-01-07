@extends('Admin.master')
@section('titlePage','افزودن میز')
@section('Styles')

@endsection
@section('Scripts')

@endsection
@section('content')

    @livewire('admin.chairs.form-chair' , [

        'titlePage' => 'افزودن میز میزبان',

    ])

@endsection
