@extends('Admin.master')
@section('titlePage','لیست نظرات')
@section('Styles')

@endsection
@section('Scripts')

@endsection
@section('content')

    @livewire("admin.comments.list-comment" , [

        'titlePage' => 'لیست نظرات بامیز'

    ])

@endsection
