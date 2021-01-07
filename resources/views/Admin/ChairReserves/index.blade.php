@extends('Admin.master')
@section('titlePage','لیست میز های رزرو شده')
@section('Styles')

@endsection
@section('Scripts')

@endsection
@section('content')

    @livewire('admin.chair-reserves.list-chair-reserve' , [

        'titlePage' => 'لیست میز های رزرو شده بامیز',

    ])

@endsection
