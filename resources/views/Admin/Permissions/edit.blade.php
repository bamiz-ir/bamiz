@extends('Admin.master')
@section('titlePage','ویرایش دسترسی')
@section('Styles')

@endsection
@section('Scripts')

@endsection
@section('content')

        @livewire('admin.permissions.form-permission' , [

            'titlePage' => 'ویرایش دسترسی بامیز',
            'type' => 'edit',
            'permission' => $permission

        ])

@endsection
