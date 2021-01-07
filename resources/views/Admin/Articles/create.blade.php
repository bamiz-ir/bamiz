@extends('Admin.master')
@section('titlePage','افزودن مقاله و خبر')
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

    @livewire("admin.articles.form-article" ,[

            'titlePage' => 'افزودن مقاله و خبر بامیز'

    ])

@endsection
