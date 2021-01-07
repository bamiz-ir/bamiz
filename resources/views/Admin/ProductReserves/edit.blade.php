@extends('Admin.master')
@section('titlePage','ویرایش رزرو غذا')
@section('Styles')

@endsection
@section('Scripts')

@endsection
@section('content')

        @livewire('admin.product-reserves.form-product-reserve' , [

            'titlePage' => 'ویرایش رزرو غذا بامیز',
            'type' => 'edit',
            'product_reserve' => $productReserve

        ])

@endsection
