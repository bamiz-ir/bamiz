@extends('Admin.master')
@section('titlePage','افزودن رزرو غذا')
@section('Styles')

@endsection
@section('Scripts')

@endsection
@section('content')

    @livewire('admin.product-reserves.form-product-reserve',[

        'titlePage' => 'افزودن رزرو غذا میزبان ',

    ])

@endsection
