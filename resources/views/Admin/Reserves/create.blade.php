@extends('Admin.master')
@section('titlePage','افزودن رزرو جدید')
@section('Styles')

@endsection
@section('Scripts')

@endsection
@section('content')

    @livewire('admin.reserves.form-reserve',[
    'titlePage' => 'افزودن رزرو بامیز',
    ])
@endsection
