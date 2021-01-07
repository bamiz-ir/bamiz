@extends('Admin.master')
@section('titlePage','ویرایش علاقه مندی')
@section('Styles')

@endsection
@section('Scripts')

@endsection
@section('content')

    @livewire('admin.wishlists.form-wish-list' , [

        'titlePage' => 'ویرایش علاقه مندی',
        'wishlist' => $wishList,
        'type' => 'edit'

    ])

@endsection
