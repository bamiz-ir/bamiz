@extends('Admin.master')
@section('titlePage','افزودن کاربر')
@section('Styles')

@endsection
@section('Scripts')

@endsection
@section('content')

    @livewire("admin.users.form-user" , [

        'titlePage' => 'افزودن کاربر جدید'

    ])

@endsection
