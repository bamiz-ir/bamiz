@extends('Admin.master')
@section('titlePage','لیست مقام ها')
@section('Styles')

@endsection
@section('Scripts')

@endsection
@section('content')

    @livewire('admin.roles.list-role',[
    'titlePage' => 'لیست مقام های بامیز',
    ])
@endsection
