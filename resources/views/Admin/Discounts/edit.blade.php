@extends('Admin.master')
@section('titlePage','ویرایش تخفیف')
@section('Styles')

@endsection
@section('Scripts')

@endsection
@section('content')

        @livewire('admin.discounts.form-discount' , [

            'titlePage' => 'ویرایش تخفیف بامیز',
            'type' => 'edit',
            'discount' => $discount

        ])

@endsection
