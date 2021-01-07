@extends('Admin.master')
@section('titlePage','افزودن شهر')
@section('Styles')

@endsection
@section('Scripts')

@endsection
@section('content')

    @livewire('admin.cities.form-city' , [

    'titlePage' => 'افزودن شهر میزبان',

    ])

@endsection
