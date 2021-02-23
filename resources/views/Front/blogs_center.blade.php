@extends('Front.master-main')

@section('titlePage')
    مقالات مرکز ({{ str_replace('-' , ' ' , request('slug')) }})
@endsection

@section('content')

    @livewire('front.blogs-center')

@endsection
