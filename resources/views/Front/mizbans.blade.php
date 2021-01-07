@extends('Front.master-main')

@section('titlePage')
    میزبان های بامیز
@endsection

@section('content')
    @livewire('front.mizbans' , [
        'slug' => $slug
    ])
@endsection
