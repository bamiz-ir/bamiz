@extends('Admin.master')
@section('titlePage','لیست تماس با ما')
@section('Styles')

@endsection
@section('Scripts')

@endsection
@section('content')

    @livewire("admin.contact-us.list-contactus" , [

        'titlePage' => 'لیست تماس با ما بامیز'

    ])

@endsection
