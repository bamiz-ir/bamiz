@extends('Admin.master')
@section('titlePage','لیست غذا ها')
@section('Styles')

@endsection
@section('Scripts')

@endsection
@section('content')

    @livewire("admin.products.list-product" , [

        'titlePage' => 'لیست غذا های منو میزبان'

    ])

@endsection
