@extends('Admin.master')
@section('titlePage','ویرایش نظر')
@section('Styles')

@endsection
@section('Scripts')

@endsection
@section('content')

    @livewire("admin.comments.form-comment" , [

        'titlePage' => 'ویرایش نظر بامیز',
        'comment' => $comment

    ])

@endsection
