@extends('Admin.master')
@section('titlePage','لیست سطل زباله دسته بندی ها')
@section('Styles')

@endsection
@section('Scripts')

@endsection
@section('content')

    @livewire('admin.trash-categories.list-trash-category',[
    'titlePage' => 'لیست سطل زباله دسته بندی های بامیز',
    ])
@endsection
