@extends('Admin.master')
@section('titlePage','افزودن گالری')
@section('Styles')

@endsection
@section('Scripts')

@endsection

@section('content')

    @livewire("admin.galleries.form-gallery" ,[

    'titlePage' => 'افزودن گالری بامیز'

    ])

@endsection
