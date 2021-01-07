@extends('Admin.master')
@section('titlePage','ویرایش مرکز')
@section('Styles')

@endsection
@section('Scripts')

@endsection
@section('content')

        @livewire('admin.centers.form-center' , [

            'titlePage' => 'ویرایش مرکز بامیز',
            'center' => $center,
            'type' => 'edit'

        ])

@endsection
