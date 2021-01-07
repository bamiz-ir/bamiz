@extends('Admin.master')
@section('titlePage','لیست مقالات و اخبار')
@section('Styles')

@endsection
@section('Scripts')

@endsection
@section('content')

    @livewire("admin.articles.list-article" , [

        'titlePage' => 'لیست مقالات میزبان'

    ])

@endsection
