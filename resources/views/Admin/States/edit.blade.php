@extends('Admin.master')
@section('titlePage','ویرایش استان')
@section('Styles')

@endsection
@section('Scripts')

@endsection
@section('content')

        @livewire('admin.states.form-state' , [

            'titlePage' => 'ویرایش استان میزبان',
            'type' => 'edit',
            'state' => $state

        ])

@endsection
