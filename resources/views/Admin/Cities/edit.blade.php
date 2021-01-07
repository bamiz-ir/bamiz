@extends('Admin.master')
@section('titlePage','ویرایش شهر')
@section('Styles')

@endsection
@section('Scripts')

@endsection
@section('content')

        @livewire('admin.cities.form-city' , [

            'titlePage' => 'ویرایش شهر میزبان',
            'city' => $city,
            'type' => 'edit'

        ])

@endsection
