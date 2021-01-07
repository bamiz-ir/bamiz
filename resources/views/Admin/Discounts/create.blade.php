@extends('Admin.master')
@section('titlePage','افزودن تخفیف جدید')
@section('Styles')

@endsection
@section('Scripts')

@endsection
@section('content')

    @livewire('admin.discounts.form-discount',[
    'titlePage' => 'افزودن تخفیف بامیز',
    ])
@endsection
