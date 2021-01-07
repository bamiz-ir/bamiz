@extends('Admin.master')
@section('titlePage','لیست تشریفات غیر فعال')
@section('Styles')

@endsection
@section('Scripts')

@endsection
@section('content')

    @livewire('admin.trash-options.list-trash-option',[
    'titlePage' => 'لیست تشریفات غیر فعال میزبان',
    ])
@endsection
