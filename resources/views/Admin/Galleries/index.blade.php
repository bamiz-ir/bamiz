@extends('Admin.master')
@section('titlePage','لیست گالری ها')
@section('Styles')

@endsection
@section('Scripts')

@endsection
@section('content')

    @livewire("admin.galleries.list-gallery" , [

        'titlePage' => 'لیست گالری های بامیز'

    ])

@endsection
