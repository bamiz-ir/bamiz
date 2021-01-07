@extends('Admin.master')
@section('titlePage','لیست دسترسی ها')
@section('Styles')

@endsection
@section('Scripts')

@endsection
@section('content')

    @livewire('admin.permissions.list-permission' , [

        'titlePage' => 'لیست دسترسی های بامیز',

    ])

@endsection
