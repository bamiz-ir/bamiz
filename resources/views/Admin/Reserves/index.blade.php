@extends('Admin.master')
@section('titlePage','لیست رزرو ها')
@section('Styles')

@endsection
@section('Scripts')

@endsection
@section('content')

    @livewire('admin.reserves.list-reserve' , [

    'titlePage' => 'لیست رزرو های بامیز',

    ])

@endsection
