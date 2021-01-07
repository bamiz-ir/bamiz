@extends('Admin.master')
@section('titlePage','لیست رزرو ها ناموفق')
@section('Styles')

@endsection
@section('Scripts')

@endsection
@section('content')

    @livewire('admin.reserves.failed-list-reserve' , [

    'titlePage' => 'لیست رزرو های ناموفق بامیز',

    ])

@endsection
