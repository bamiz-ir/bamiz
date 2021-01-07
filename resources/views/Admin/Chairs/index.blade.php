@extends('Admin.master')
@section('titlePage','لیست میز ها')
@section('Styles')

@endsection
@section('Scripts')

@endsection
@section('content')

   @livewire('admin.chairs.list-chair' , [

        'titlePage' => 'لیست میز های میزبان',

   ])

@endsection
