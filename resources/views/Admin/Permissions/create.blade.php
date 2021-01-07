@extends('Admin.master')
@section('titlePage','افزودن دسترسی جدید')
@section('Styles')

@endsection
@section('Scripts')

@endsection
@section('content')

    @livewire('admin.permissions.form-permission',[
    'titlePage' => 'افزودن دسترسی بامیز',
    ])
@endsection
