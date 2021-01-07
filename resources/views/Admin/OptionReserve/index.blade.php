@extends('Admin.master')
@section('titlePage','لیست تشریفات رزرو')
@section('Styles')

@endsection
@section('Scripts')

@endsection
@section('content')

    @livewire('admin.option-reserves.list-option-reserve' , [

        'titlePage' => 'لیست تشریفات رزرو میزبان',

    ])

@endsection
