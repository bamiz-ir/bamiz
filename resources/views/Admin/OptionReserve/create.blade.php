@extends('Admin.master')
@section('titlePage','افزودن تشریفات رزرو')
@section('Styles')

@endsection
@section('Scripts')

@endsection
@section('content')

    @livewire('admin.option-reserves.form-option-reserve',[

        'titlePage' => 'افزودن تشریفات رزرو میزبان ',

    ])

@endsection
