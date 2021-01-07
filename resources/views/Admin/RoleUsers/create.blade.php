@extends('Admin.master')
@section('titlePage','اعطای مقام جدید به کاربر')
@section('Styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
@endsection
@section('Scripts')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
@endsection
@section('content')

    @livewire('admin.role-users.form-role-user',[
        'titlePage' => 'اعطای مقام جدید به کاربر بامیز',
    ])

@endsection
