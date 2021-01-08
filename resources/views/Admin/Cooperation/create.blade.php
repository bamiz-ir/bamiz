@extends('Admin.master')
@section('titlePage','افزودن درخواست همکاری')
@section('Styles')

@endsection
@section('Scripts')

@endsection
@section('content')

    @livewire("admin.cooperation.form-cooperation" , [

        'titlePage' => 'افزودن درخواست همکاری بامیز'

    ])

@endsection
