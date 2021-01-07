@extends('Admin.master')
@section('titlePage','لیست کاربران مقام دار')
@section('Styles')

@endsection
@section('Scripts')

@endsection
@section('content')

    @livewire('admin.role-users.list-role-user',[
    'titlePage' => 'لیست کاربران مقام دار بامیز',
    ])
@endsection
