@extends('Admin.master')
@section('titlePage','ویرایش دسته بندی ها')
@section('Styles')

@endsection
@section('Scripts')

@endsection
@section('content')

        @livewire("admin.settings.form-setting" , [

            'titlePage' => '',
            'type' => 'edit',
            'setting' => $setting

        ])

@endsection
