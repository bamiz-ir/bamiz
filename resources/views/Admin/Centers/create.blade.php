@extends('Admin.master')
@section('titlePage','افزودن مرکز')
@section('Styles')

@endsection
@section('Scripts')

@endsection
@section('content')

    @livewire('admin.centers.form-center' , [

    'titlePage' => 'افزودن مرکز بامیز'

    ])

@endsection
