@extends('Admin.master')
@section('titlePage','ویرایش تیکت')
@section('Styles')

@endsection
@section('Scripts')

@endsection
@section('content')

        @livewire('admin.tickets.form-ticket' , [

            'titlePage' => 'ویرایش تیکت بامیز',
            'type' => 'edit',
            'ticket' => $ticket

        ])

@endsection
