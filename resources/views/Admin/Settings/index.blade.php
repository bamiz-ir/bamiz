@extends('Admin.master')
@section('titlePage','لیست تنظیمات')
@section('Styles')

@endsection
@section('Scripts')

@endsection
@section('content')

    @livewire("admin.settings.list-setting" , [

        'titlePage' => 'لیست تنظیمات بامیز',

    ])

@endsection
