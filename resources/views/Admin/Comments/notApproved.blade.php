@extends('Admin.master')
@section('titlePage','لیست نظرات تایید نشده')
@section('Styles')

@endsection
@section('Scripts')

@endsection
@section('content')

    @livewire("admin.comments.list-notapproved-comment" , [

        'titlePage' => 'لیست نظرات تایید نشده بامیز'

    ])

@endsection
