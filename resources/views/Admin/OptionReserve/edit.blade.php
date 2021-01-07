@extends('Admin.master')
@section('titlePage','ویرایش تشریفات رزرو')
@section('Styles')

@endsection
@section('Scripts')

@endsection
@section('content')

        @livewire('admin.option-reserves.form-option-reserve' , [

            'titlePage' => 'ویرایش تشریفات زررو میزبان ',
            'type' => 'edit',
            'optionReserve' => $optionReserve

        ])

@endsection
