@extends('Admin.master')
@section('titlePage','افزودن تماس با ما')
@section('Styles')

@endsection
@section('Scripts')

    <script src="/ckeditor/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('body' , {


            filebrowserUploadMethod: 'form',

            filebrowserUploadUrl : '/admin/panel/CK',
            filebrowserImageUploadUrl :  '/admin/panel/CK'

        });
    </script>

@endsection
@section('content')

    @livewire("admin.contact-us.form-contactus" , [

        'titlePage' => 'افزودن تماس با بامیز'

    ])

@endsection
