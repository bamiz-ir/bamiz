@extends('Admin.master')
@section('titlePage','ویرایش غذا')
@section('Styles')

@endsection
@section('Scripts')

@endsection
@section('content')

    @livewire("admin.products.form-product" , [

        'titlePage' => 'ویرایش غذای میزبان',
        'type' => 'edit',
        'product' => $product

    ])

@endsection
