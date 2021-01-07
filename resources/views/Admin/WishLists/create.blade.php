@extends('Admin.master')
@section('titlePage','افزودن علاقه مندی')
@section('Styles')

@endsection
@section('Scripts')

@endsection
@section('content')

    @livewire("admin.wishlists.form-wish-list" , [

    'titlePage' => 'افزودن علاقه مندی جدید'

    ])

@endsection
