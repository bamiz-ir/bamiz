@extends('Admin.master')
@section('titlePage','افزودن تیکت جدید')
@section('Styles')

@endsection
@section('Scripts')

@endsection
@section('content')

    @livewire('admin.tickets.form-ticket',[
    'titlePage' => 'افزودن تیکت بامیز',
    ])
@endsection
