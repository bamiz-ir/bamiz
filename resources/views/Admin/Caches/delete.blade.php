@extends('Admin.master')
@section('titlePage','حذف کش ها')
@section('Styles')

@endsection
@section('Scripts')

@endsection
@section('content')

        @livewire('admin.caches.delete-cache' , [
            'titlePage' => 'حذف کش های بامیز',
        ])

@endsection
