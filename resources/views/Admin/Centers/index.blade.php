@extends('Admin.master')
@section('titlePage','لیست مراکز')
@section('Styles')

@endsection
@section('Scripts')

@endsection
@section('content')

   @livewire('admin.centers.list-center' , [

        'titlePage' => 'لیست مراکز بامیز',

   ])

@endsection
