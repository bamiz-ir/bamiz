@extends('Admin.master')
@section('titlePage','ویرایش میز')
@section('Styles')

@endsection
@section('Scripts')

@endsection
@section('content')

        @livewire('admin.chairs.form-chair' , [

            'titlePage' => 'ویرایش میز میزبان',
            'chair' => $chair,
            'type' => 'edit'

        ])

@endsection
