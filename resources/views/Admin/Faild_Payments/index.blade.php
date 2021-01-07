@extends('Admin.master')
@section('titlePage','لیست پرداخت ها ناموفق')
@section('Styles')

@endsection
@section('Scripts')

@endsection
@section('content')

    @livewire('admin.failed-payments.list-payment' , [

    'titlePage' => 'لیست پرداخت های ناموفق بامیز',

    ])

@endsection
