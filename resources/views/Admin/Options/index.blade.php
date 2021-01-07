@extends('Admin.master')
@section('titlePage','لیست تشریفات')
@section('Styles')

@endsection
@section('Scripts')

@endsection
@section('content')

   @livewire('admin.options.list-option' , [

        'titlePage' => 'لیست تشریفات میزبان',

   ])

@endsection
