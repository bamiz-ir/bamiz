@extends('Admin.master')
@section('titlePage','لیست میز های غیر فعال')
@section('Styles')

@endsection
@section('Scripts')

@endsection
@section('content')

   @livewire('admin.trash-chairs.list-trash-chair' , [

        'titlePage' => 'لیست میز های غیر فعال بامیز',

   ])

@endsection
