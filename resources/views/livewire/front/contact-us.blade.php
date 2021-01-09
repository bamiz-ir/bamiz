<div>
        <section class="hero_in contacts start_bg_zoom">
            <div class="wrapper">
                <div class="container">
                    <h1 class="fadeInUp animated"><span></span>تماس با ما</h1>
                </div>
            </div>
        </section>
        <!--/hero_in-->

        <div class="contact_info">
            <div class="container">
                <ul class="clearfix">
                    <li>
                        <i class="pe-7s-map-marker"></i>
                        <h4>آدرس</h4>
                        <span>{{ $page_info['address']->value }}</span>
                    </li>
                    <li>
                        <i class="pe-7s-mail-open-file"></i>
                        <h4>ایمیل</h4>
                        <span>{{ $page_info['email']->value }}</span>

                    </li>
                    <li>
                        <i class="fa fa-phone"></i>
                        <h4>شماره تلفن</h4>
                        <span>{{ $page_info['phone']->value }}</span>
                    </li>
                </ul>
            </div>
        </div>
        <!--/contact_info-->

        <div class="bg_color_1">
            <div class="container margin_80_55">
                <div class="row justify-content-between">
                    <div class="col-lg-12">
                        <i class="fa fa-phone"></i>
                        <h4>ارسال پیام تماس با ما</h4>
                        <p>پیام ، نظر و یا پیشنهاد خود را لطفا به ما برسانید.</p>
                        <div id="message-contact"></div>
                        <form method="post" action="{{ route('contact_us') }}" id="contactform" autocomplete="off">

                            @csrf

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>نام</label>
                                        <input required class="form-control" type="text" id="name_contact" name="name">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>نام خانوادگی</label>
                                        <input required class="form-control" type="text" id="lastname_contact" name="lastName">
                                    </div>
                                </div>
                            </div>
                            <!-- /row -->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>ایمیل</label>
                                        <input required class="form-control" type="email" id="email_contact" name="email">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>عنوان پیام</label>
                                        <input required class="form-control" type="text" id="phone_contact" name="title">
                                    </div>
                                </div>
                            </div>
                            <!-- /row -->
                            <div class="form-group">
                                <label>متن</label>
                                <textarea required class="form-control" id="body" name="text" style="height:150px;"></textarea>
                            </div>

                            @if(session()->has('contact_us_message'))
                                <div class="mt-3 text-center text-success" style="font-size: 20px !important;">{{ session()->get('contact_us_message') }}</div>
                            @endif

                            @if($errors->any())

                                <div class="alert alert-danger text-center" style="font-size: 18px !important;">

                                    @foreach($errors->all() as $e)
                                        {{ $e }}<br>
                                    @endforeach

                                </div>

                            @endif

                            <p class="add_top_30"><input type="submit" value="ارسال پیام" class="btn_1 rounded" id="submit-contact"></p>
                        </form>
                    </div>
                </div>
                <!-- /row -->
            </div>
            <!-- /container -->
        </div>
        <!-- /bg_color_1 -->
</div>

@push('JS')
    <script src="/ckeditor/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('body' , {


            filebrowserUploadMethod: 'form',

            filebrowserUploadUrl : '/admin/panel/CK',
            filebrowserImageUploadUrl :  '/admin/panel/CK'

        });
    </script>
@endpush
