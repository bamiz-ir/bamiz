@extends('Admin.master')
@section('titlePage','لیست علاقه مندی ها')
@section('Styles')

@endsection
@section('Scripts')

@endsection
@section('content')

    @livewire('admin.wishlists.list-wish-list' , [

        'titlePage' => 'لیست علاقه مندی ها کاربران',

    ])

@endsection
