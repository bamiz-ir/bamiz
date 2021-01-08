<div>
        <section class="hero_in contacts start_bg_zoom">
            <div class="wrapper">
                <div class="container">
                    <h1 class="fadeInUp animated"><span></span>Contact Us</h1>
                </div>
            </div>
        </section>
        <!--/hero_in-->

        <div class="contact_info">
            <div class="container">
                <ul class="clearfix">
                    <li>
                        <i class="pe-7s-map-marker"></i>
                        <h4>Address</h4>
                        <span>PO Box 97845 Baker st. 567, Los Angeles<br>California - US.</span>
                    </li>
                    <li>
                        <i class="pe-7s-mail-open-file"></i>
                        <h4>Email address</h4>
                        <span>support@Panagea.com - info@Panagea.com<br><small>Monday to Friday 9am - 7pm</small></span>

                    </li>
                    <li>
                        <i class="pe-7s-phone"></i>
                        <h4>Contacts info</h4>
                        <span>+ 61 (2) 8093 3402 + 61 (2) 8093 3402<br><small>Monday to Friday 9am - 7pm</small></span>
                    </li>
                </ul>
            </div>
        </div>
        <!--/contact_info-->

        <div class="bg_color_1">
            <div class="container margin_80_55">
                <div class="row justify-content-between">
                    <div class="col-lg-12">
                        <h4>ارسال پیام تماس با ما</h4>
                        <p>پیام و یا نظر و پیشنهاد خود را لظفا به ما برسانید</p>
                        <div id="message-contact"></div>
                        <form method="post" action="/contact_us" id="contactform" autocomplete="off">

                            @csrf

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>نام</label>
                                        <input class="form-control" type="text" id="name_contact" name="name_contact">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>نام خانوادگی</label>
                                        <input class="form-control" type="text" id="lastname_contact" name="lastname_contact">
                                    </div>
                                </div>
                            </div>
                            <!-- /row -->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>ایمیل</label>
                                        <input class="form-control" type="email" id="email_contact" name="email_contact">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>عنوان پیام</label>
                                        <input class="form-control" type="text" id="phone_contact" name="phone_contact">
                                    </div>
                                </div>
                            </div>
                            <!-- /row -->
                            <div class="form-group">
                                <label>متن</label>
                                <textarea class="form-control" id="body" name="message_contact" style="height:150px;"></textarea>
                            </div>
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
