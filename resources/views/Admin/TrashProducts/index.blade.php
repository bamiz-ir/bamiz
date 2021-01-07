@extends('Admin.master')
@section('titlePage','لیست غذا های غیر فعال')
@section('Styles')

@endsection
@section('Scripts')

@endsection
@section('content')

    @livewire('admin.trash-products.list-trash-product',[
    'titlePage' => 'لیست غذاهای غیر فعال میزبان',
    ])
@endsection
