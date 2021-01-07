@extends('Admin.master')
@section('titlePage','لیست تیکت ها')
@section('Styles')

@endsection
@section('Scripts')

@endsection
@section('content')

    @livewire('admin.tickets.list-ticket' , [

    'titlePage' => 'لیست تیکت های بامیز',

    ])

@endsection
