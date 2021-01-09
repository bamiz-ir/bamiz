@extends('Front.master-main')

@section('titlePage')
    مقاله ({{ str_replace('-' , ' ' , request('slug')) }})
{{--    مقالات مرکز ({{ str_replace('-' , ' ' , request('slug')) }}) بامیز--}}
@endsection

@section('content')

    @livewire('front.blog-detail')

@endsection
