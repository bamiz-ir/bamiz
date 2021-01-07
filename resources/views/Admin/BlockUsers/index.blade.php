@extends('Admin.master')
@section('titlePage','لیست کاربران مسدود شده')
@section('Styles')

@endsection
@section('Scripts')

@endsection
@section('content')

    @livewire("admin.block-users.list-block-user" , [

        'titlePage' => 'لیست کابران مسدود شده بامیز',

    ])

@endsection
