@extends('Admin.master')
@section('titlePage','لیست زمان های کاری')
@section('Styles')

@endsection
@section('Scripts')

@endsection
@section('content')

    @livewire('admin.worktimes.list-worktime' , [

        'titlePage' => 'لیست زمان کاری  میزبان ها',

    ])

@endsection
