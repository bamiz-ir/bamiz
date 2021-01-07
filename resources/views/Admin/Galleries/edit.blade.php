@extends('Admin.master')
@section('titlePage','ویرایش گالری')
@section('Styles')

@endsection
@section('Scripts')

@endsection
@section('content')

    @livewire("admin.galleries.form-gallery" , [

        'titlePage' => 'ویرایش گالری بامیز',
        'type' => 'edit',
        'gallery' => $gallery

    ])

@endsection
