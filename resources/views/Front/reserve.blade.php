@extends('Front.master-main')

@section('titlePage')
    رزرو میز {{ $data[0]['slug'] }}
@endsection

@section('content')
    @php $data2 = $data[0] @endphp
    @livewire('front.reserve-center' , [
        'data' => $data2
    ])
@endsection
