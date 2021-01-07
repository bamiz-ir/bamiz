@extends('Admin.master')
@section('titlePage','لیست مراکز غیر فعال')
@section('Styles')

@endsection
@section('Scripts')

@endsection
@section('content')

   @livewire('admin.trash-centers.list-trash-center' , [

        'titlePage' => 'لیست مراکز غیر فعال بامیز',

   ])

@endsection
