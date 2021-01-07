@extends('Admin.master')
@section('titlePage','لیست دسته بندی ها')
@section('Styles')

@endsection
@section('Scripts')

@endsection
@section('content')

    @livewire("admin.users.list-user" , [

    'titlePage' => 'لیست کابران بامیز',

    ])

@endsection
