@extends('Admin.master')
@section('titlePage','ویرایش')
@section('Styles')

@endsection
@section('Scripts')

@endsection
@section('content')

    @livewire("admin.users.form-user" , [

        'titlePage' => 'ویرایش کابر',
        'type' => 'edit',
        'user' => $user

    ])

@endsection
