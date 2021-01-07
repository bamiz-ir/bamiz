@extends('Admin.master')
@section('titlePage','افزودن غذا')
@section('Styles')

@endsection
@section('Scripts')

@endsection

@section('content')

    @livewire("admin.products.form-product" ,[

            'titlePage' => 'افزودن غذا به منو میزبان'

    ])

@endsection
