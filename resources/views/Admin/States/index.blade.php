@extends('Admin.master')
@section('titlePage','لیست استان ها')
@section('Styles')

@endsection
@section('Scripts')

@endsection
@section('content')

    @livewire('admin.states.list-state' , [

        'titlePage' => 'لیست استان های میزبان',

    ])

@endsection
