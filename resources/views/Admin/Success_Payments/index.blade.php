@extends('Admin.master')
@section('titlePage','لیست پرداخت ها موفق')
@section('Styles')

@endsection
@section('Scripts')

@endsection
@section('content')

    @livewire('admin.success-payments.list-payment' , [

    'titlePage' => 'لیست پرداخت های موفق بامیز',

    ])

@endsection
