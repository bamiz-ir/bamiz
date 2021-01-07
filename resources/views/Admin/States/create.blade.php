@extends('Admin.master')
@section('titlePage','افزودن استان')
@section('Styles')

@endsection
@section('Scripts')

@endsection
@section('content')

    @livewire('admin.states.form-state',[
    'titlePage' => 'افزودن استان میزبان',
    ])
@endsection
