@extends('Admin.master')
@section('titlePage','لیست رزرو های غذا')
@section('Styles')

@endsection
@section('Scripts')

@endsection
@section('content')

    @livewire('admin.product-reserves.list-product-reserve' , [

        'titlePage' => 'لیست رزرو های غذا بامیز',

    ])

@endsection
