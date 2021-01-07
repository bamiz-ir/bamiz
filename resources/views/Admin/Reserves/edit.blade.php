@extends('Admin.master')
@section('titlePage','ویرایش میز رزرو')
@section('Styles')

@endsection
@section('Scripts')

@endsection
@section('content')

        @livewire('admin.reserves.form-reserve' , [

            'titlePage' => 'ویرایش میز رزرو میزبان میزبان',
            'type' => 'edit',
            'reserve' => $reserve

        ])

@endsection
