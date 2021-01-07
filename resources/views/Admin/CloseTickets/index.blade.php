@extends('Admin.master')
@section('titlePage','لیست تیکت های غیر فعال')
@section('Styles')

@endsection
@section('Scripts')

@endsection
@section('content')

    @livewire('admin.close-tickets.list-close-ticket' , [

    'titlePage' => 'لیست تیکت های غیر فعال بامیز',

    ])

@endsection
