@extends('Admin.master')
@section('titlePage','لیست تخفیف ها')
@section('Styles')

@endsection
@section('Scripts')

@endsection
@section('content')

    @livewire('admin.discounts.list-discount' , [

        'titlePage' => 'لیست تخفیف های بامیز',

    ])

@endsection
