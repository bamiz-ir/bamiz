@extends('Admin.master')
@section('titlePage','لیست شهر ها')
@section('Styles')

@endsection
@section('Scripts')

@endsection
@section('content')

   @livewire('admin.cities.list-city' , [

        'titlePage' => 'لیست شهر های میزبان',

   ])

@endsection
