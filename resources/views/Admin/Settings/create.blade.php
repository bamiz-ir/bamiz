@extends('Admin.master')
@section('titlePage','افزودن تنظیمات')
@section('Styles')

@endsection
@section('Scripts')

@endsection
@section('content')

    @livewire('admin.settings.form-setting',[
    'titlePage' => 'افزودن تنظیمات میزبان',
    ])
@endsection
