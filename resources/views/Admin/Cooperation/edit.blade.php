@extends('Admin.master')
@section('titlePage','ویرایش درخواست همکاری')
@section('Styles')

@endsection
@section('Scripts')

@endsection
@section('content')

    @livewire("admin.cooperation.form-cooperation" , [

        'titlePage' => 'ویرایش درخواست همکاری بامیز',
        'type' => 'edit',
        'cooperation' => $cooperation

    ])

@endsection
