@extends('Admin.master')
@section('titlePage','ویرایش دسته بندی')
@section('Styles')

@endsection
@section('Scripts')

@endsection
@section('content')

    @livewire('admin.categories.form-category',[
    'titlePage' => 'افزودن دسته بندی بامیز',
    'type' => 'edit',
    'category' =>  $category
    ])
@endsection
