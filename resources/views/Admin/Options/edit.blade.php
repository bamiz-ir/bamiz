@extends('Admin.master')
@section('titlePage','ویرایش تشریفات')
@section('Styles')

@endsection
@section('Scripts')

@endsection
@section('content')

        @livewire('admin.options.form-option' , [

            'titlePage' => 'ویرایش تشریفات میزبان',
            'option' => $option,
            'type' => 'edit'

        ])

@endsection
