@php

    use App\Models\Setting;

        $settings['workwithus'] = Setting::query()->firstOrCreate(['key' => 'workwithus'] , [
            'key' => 'workwithus',
            'value' => 'کافه یا رستوران هایی که تمایل دارند از امکان رزرو آنلاین میز با استفاده از تورمجازی بهره مند شوند بر روی دکمه زیر کلیک کنید تا از شرایط و مفاد همکاری مطلع شوید'
        ]);

        $settings['introduction'] = Setting::query()->firstOrCreate(['key' => 'introduction'] , [
            'key' => 'introduction',
            'value' => 'سامانه رزرو میز ، امکانی را در اختیار کاربران قرار می دهد که با استفاده از تورمجازی (تصاویر 360 درجه) در کافه ها و رستوران ها گشت و گذار داشته باشند تا هم با محیط کافه و رستوران ها آشنا شوند و هم بتوانند میز مورد نظر خود را با استفاده از تورمجازی انتخاب و برای تاریخی مشخص رزرو نمایند.'
        ]);

        $settings['year'] = Setting::query()->firstOrCreate(['key' => 'year'] , [
            'key' => 'year',
            'value' => '1399'
        ]);

        $settings['introduction'] = Setting::query()->firstOrCreate(['key' => 'introduction'] , [
            'key' => 'introduction',
            'value' => 'سامانه رزرو میز ، امکانی را در اختیار کاربران قرار می دهد که با استفاده از تورمجازی (تصاویر 360 درجه) در کافه ها و رستوران ها گشت و گذار داشته باشند تا هم با محیط کافه و رستوران ها آشنا شوند و هم بتوانند میز مورد نظر خود را با استفاده از تورمجازی انتخاب و برای تاریخی مشخص رزرو نمایند.'
        ]);

        $settings['year'] = Setting::query()->firstOrCreate(['key' => 'year'] , [
            'key' => 'year',
            'value' => '1399'
        ]);
        $settings['email'] = Setting::query()->firstOrCreate(['key' => 'email'] , [
            'key' => 'email',
            'value' => 'bamiz.ir@gmail.com'
        ]);
        $settings['phone'] = Setting::query()->firstOrCreate(['key' => 'phone'] , [
            'key' => 'phone',
            'value' => '021-2000000'
        ]);

        $settings['instagram'] = Setting::query()->firstOrCreate(['key' => 'instagram'] , [
            'key' => 'instagram',
            'value' => 'https://www.instagram.com/bamiz.ir'
        ]);

        $settings['facebook'] = Setting::query()->firstOrCreate(['key' => 'facebook'] , [
            'key' => 'facebook',
            'value' => 'https://www.facebook.com/bamiz.ir'
        ]);

        $settings['twitter'] = Setting::query()->firstOrCreate(['key' => 'twitter'] , [
            'key' => 'twitter',
            'value' => 'https://www.twitter.com/bamiz.ir'
        ]);

        $settings['logo'] = Setting::query()->firstOrCreate(['key' => 'logo'] ,
            [
                'value' => '/front/img/logo_sticky.svg'
            ]);

@endphp

    <!DOCTYPE html>
<html lang="en" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('titlePage')</title>

    <!-- Favicons-->
    <link rel="shortcut icon" href="/front/img/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" type="image/x-icon" href="/front/img/apple-touch-icon-57x57-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72"
          href="/front/img/apple-touch-icon-72x72-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114"
          href="/front/img/apple-touch-icon-114x114-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="144x144"
          href="/front/img/apple-touch-icon-144x144-precomposed.png">

    <!-- GOOGLE WEB FONT -->
    <link href="/front/https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800" rel="stylesheet">

    <!-- BASE CSS -->
    <link href="/front/css/bootstrap-rtl.min.css" rel="stylesheet">
    <link href="/front/css/style.css" rel="stylesheet">
    <link href="/front/css/style-rtl.css" rel="stylesheet">
    <link href="/front/css/vendors.css" rel="stylesheet">

    <!-- YOUR CUSTOM CSS -->
    <link href="/front/css/custom.css" rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
          integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

    @stack('CSS')

    @livewireStyles

</head>
<body class="rtl">
<div id="page">

    <header class="header menu_fixed">
        <div id="preloader">
            <div data-loader="circle-side"></div>
        </div><!-- /Page Preload -->
        <div id="logo">
            <a href="/front/index.html">
                <img src="{{ $settings['logo']->value }}" width="150" height="36" alt="" class="logo_normal">
                <img src="{{ $settings['logo']->value }}" width="150" height="36" alt="" class="logo_sticky">
            </a>
        </div>
        <ul id="top_menu">
            <li><a href="/front/cart-1.html" class="cart-menu-btn" title="Cart"><strong>4</strong></a></li>
            <li><a href="/front/#sign-in-dialog" id="sign-in" class="login" title="Sign In">Sign In</a></li>
            <li><a href="/front/wishlist.html" class="wishlist_bt_top" title="Your wishlist">Your wishlist</a></li>
        </ul>
        <!-- /top_menu -->
        <a href="/front/#menu" class="btn_mobile">
            <div class="hamburger hamburger--spin" id="hamburger">
                <div class="hamburger-box">
                    <div class="hamburger-inner"></div>
                </div>
            </div>
        </a>
        <nav id="menu" class="main-menu">
            <ul>

                <li><span><a href="/">صفحه نخست</a></span></li>
                <li><span><a href="mizbans">میزبان</a></span>
                    <ul>
                        <li>
                            <a href="mizbans/caffe">کافه</a>
                        </li>
                        <li>
                            <a href="mizbans/restaurant">رستوران</a>
                        </li>
                        <li>
                            <a href="mizbans/fastfood">فست فود</a>
                        </li>
                        <li>
                            <a href="mizbans/teashop">سفره خانه</a>
                        </li>
                    </ul>
                </li>
                <li><span><a href="map">نقشه میزبان</a></span></li>
                <li><span><a href="centers">رزرو سریع</a></span>
                    <ul>
                        <li>
                            <a href="centers">رزرو میز</a>
                        </li>
                        <li>
                            <a href="foods">رزرو غذا</a>
                        </li>
                    </ul>
                </li>
                <li><span><a href="cooperation">درخواست همکاری</a></span></li>
                <li><span><a href="about">درباره بامیز </a></span></li>

                @if(auth()->check())
                    <form method="post" action="{{ route('logout') }}">
                        @csrf

                        <input type="submit" value="خروج">

                    </form>
                @else
                    <li><span> <a href="/login">ورود</a> </span></li>
                    /
                    <li><span> <a href="/register">عضویت</a> </span></li>
                @endif

            </ul>
        </nav>
    </header>
    <!-- /header -->

    <main>
        @yield('content')
    </main>

    <!-- /main -->

    <footer>
        <div class="container margin_60_35">
            <div class="row">
                <div class="col-lg-5 col-md-12 p-r-5">
                    <p><img src="/front/img/logo.svg" width="150" height="36" alt=""></p>
                    <p>{{ $settings['introduction']->value }}</p>
                    <div class="follow_us">
                        <ul>
                            <li>ما را دنبال کنید</li>
                            <li><a href="{{ $settings['facebook']->value }}"><i class="ti-facebook"></i></a></li>
                            <li><a href="{{ $settings['twitter']->value }}"><i class="ti-twitter-alt"></i></a></li>
                            <li><a href="{{ $settings['instagram']->value }}"><i class="ti-instagram"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 ml-lg-auto">
                    <h5>دسترسی سریع</h5>
                    <ul class="links">
                        <li><a href="/about-us">درباره ما</a></li>
                        <li><a href="/login">ورود</a></li>
                        <li><a href="/register">ثبت نام</a></li>
                        <li><a href="/blog">اخبار  و رویداد ها</a></li>
                        <li><a href="/contact-us">تماس با ما</a></li>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h5>تماس با ما</h5>
                    <ul class="contacts">
                        <li><a href="/front/tel://61280932400"><i class="ti-mobile"></i>{{ $settings['phone']->value }}</a></li>
                        <li><a href='/mailto:info@ {{ $settings['email']->value }}'><i class="ti-email"></i>{{ $settings['email']->value }}</a></li>
                    </ul>
                    <div id="newsletter">
                        <h6>خبر نامه</h6>
                        <div id="message-newsletter"></div>
                        <form method="post" action="assets/newsletter.php" name="newsletter_form" id="newsletter_form">
                            <div class="form-group">
                                <input type="email" name="email_newsletter" id="email_newsletter" class="form-control" placeholder="ایمیل خود را وارد نمایید">
                                <input type="submit" value="عضویت" id="submit-newsletter">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!--/row-->
            <hr>
            <div class="row">
                <div class="col-lg-6">
                    <ul id="footer-selector">
                        <li>
                            <div class="styled-select" id="lang-selector">
                                <select>
                                    <option value="English" selected>ترکی</option>
                                    <option value="French">کوردی</option>
                                    <option value="Spanish">فارسی</option>
                                </select>
                            </div>
                        </li>
                        <li><img src="/front/img/cards_all.svg" alt=""></li>
                    </ul>
                </div>
                <div class="col-lg-6">
                    <ul id="additional_links">
                        <li><a href="/front/#0">قوانین و مقررات</a></li>
                        <li><a href="/front/#0">حریم خصوصی</a></li>
                        <li><span>©{{ $settings['year']->value }} رزرو بامیز</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
    <!--/footer-->
</div>
<!-- page -->

<!-- Sign In Popup -->
<div id="sign-in-dialog" class="zoom-anim-dialog mfp-hide">
    <div class="small-dialog-header">
        <h3>Sign In</h3>
    </div>
    <form>
        <div class="sign-in-wrapper">
            <a href="/front/#0" class="social_bt facebook">Login with Facebook</a>
            <a href="/front/#0" class="social_bt google">Login with Google</a>
            <div class="divider"><span>Or</span></div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" class="form-control" name="email" id="email">
                <i class="icon_mail_alt"></i>
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" class="form-control" name="password" id="password" value="">
                <i class="icon_lock_alt"></i>
            </div>
            <div class="clearfix add_bottom_15">
                <div class="checkboxes float-left">
                    <label class="container_check">Remember me
                        <input type="checkbox">
                        <span class="checkmark"></span>
                    </label>
                </div>
                <div class="float-right mt-1"><a id="forgot" href="/front/javascript:void(0);">Forgot Password?</a></div>
            </div>
            <div class="text-center"><input type="submit" value="Log In" class="btn_1 full-width"></div>
            <div class="text-center">
                Don’t have an account? <a href="/front/register.html">Sign up</a>
            </div>
            <div id="forgot_pw">
                <div class="form-group">
                    <label>Please confirm login email below</label>
                    <input type="email" class="form-control" name="email_forgot" id="email_forgot">
                    <i class="icon_mail_alt"></i>
                </div>
                <p>You will receive an email containing a link allowing you to reset your password to a new preferred one.</p>
                <div class="text-center"><input type="submit" value="Reset Password" class="btn_1"></div>
            </div>
        </div>
    </form>
    <!--form -->
</div>
<!-- /Sign In Popup -->

<div id="toTop"></div><!-- Back to top button -->

<!-- COMMON SCRIPTS -->
<script src="/front/js/common_scripts.js"></script>
<script src="/front/js/main_rtl.js"></script>
{{--<script src="/front/assets/validate.js"></script>--}}
{{----}}
{{--<script src="/front/js/bamiz.js"></script>--}}

<!-- SPECIFIC SCRIPTS -->
{{--<script src="/front/js/video_header.js"></script>--}}
{{--<script>--}}
{{--    HeaderVideo.init({--}}
{{--        container: $('.header-video'),--}}
{{--        header: $('.header-video--media'),--}}
{{--        videoTrigger: $("#video-trigger"),--}}
{{--        autoPlayVideo: true--}}
{{--    });--}}
{{--</script>--}}


@stack('JS')

@livewireScripts

</body>
</html>



