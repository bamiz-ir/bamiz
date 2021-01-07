@extends('Admin.master')
@section('titlePage','لیست دسته بندی ها')
@section('Styles')

@endsection
@section('Scripts')

@endsection
@section('content')

    @livewire('admin.categories.list-category',[
    'titlePage' => 'لیست دسته بندی های بامیز',
    ])
@endsection
