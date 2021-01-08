@extends('Admin.master')
@section('titlePage','لیست درخواست های همکاری')
@section('Styles')

@endsection
@section('Scripts')

@endsection
@section('content')

    @livewire("admin.cooperation.list-cooperation" , [

        'titlePage' => 'لیست درخواست های همکاری بامیز'

    ])

@endsection
