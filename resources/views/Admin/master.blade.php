<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="shortcut icon" type="image/x-icon" href="/admin/assets/img/favicon.png">
    <title>پنل ادمین | @yield('titlePage')</title>
    <link href="https://fonts.googleapis.com/css?family=Fira+Sans:400,500,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/admin/assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/admin/assets/css/bootstrap.rtl.min.css">
    <link rel="stylesheet" type="text/css" href="/admin/assets/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="/admin/assets/css/fullcalendar.min.css">
    <link rel="stylesheet" type="text/css" href="/admin/assets/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/admin/assets/css/select2.min.css">
    <link rel="stylesheet" type="text/css" href="/admin/assets/css/bootstrap-datetimepicker.min.css">
    <link rel="stylesheet" type="text/css" href="/admin/assets/plugins/morris/morris.css">
    <link rel="stylesheet" type="text/css" href="/admin/assets/css/style.css">

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.min.css" id="theme-styles">


    {!! SEOMeta::generate() !!}

    @yield('Styles')

    @livewireStyles
</head>

<body>
<div class="main-wrapper">
    @include('Admin.Section.header')
    @include('Admin.Section.sidebar')
    <div class="page-wrapper">
        <div class="content container-fluid">

            @yield('content')
        </div>
        <div class="notification-box">
            <div class="msg-sidebar notifications msg-noti">
                <div class="topnav-dropdown-header">
                    <span>پیام ها</span>
                </div>
                <div class="drop-scroll msg-list-scroll">
                    <ul class="list-box">
                        <li>
                            <a href="chat.html">
                                <div class="list-item">
                                    <div class="list-left">
                                        <span class="avatar">R</span>
                                    </div>
                                    <div class="list-body">
                                        <span class="message-author">امین صفرپور</span>
                                        <span class="message-time">12:28 AM</span>
                                        <div class="clearfix"></div>
                                        <span class="message-content">ملت وب ایپسوم متن ساختگی با تولید سادگی ملت وب از صنعت چاپ </span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="chat.html">
                                <div class="list-item new-message">
                                    <div class="list-left">
                                        <span class="avatar">J</span>
                                    </div>
                                    <div class="list-body">
                                        <span class="message-author">امین صفرپور</span>
                                        <span class="message-time">1 Aug</span>
                                        <div class="clearfix"></div>
                                        <span class="message-content">ملت وب ایپسوم متن ساختگی با تولید سادگی ملت وب از صنعت چاپ </span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="chat.html">
                                <div class="list-item">
                                    <div class="list-left">
                                        <span class="avatar">T</span>
                                    </div>
                                    <div class="list-body">
                                        <span class="message-author">امین صفرپور</span>
                                        <span class="message-time">12:28 AM</span>
                                        <div class="clearfix"></div>
                                        <span class="message-content">ملت وب ایپسوم متن ساختگی با تولید سادگی ملت وب از صنعت چاپ </span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="chat.html">
                                <div class="list-item">
                                    <div class="list-left">
                                        <span class="avatar">M</span>
                                    </div>
                                    <div class="list-body">
                                        <span class="message-author">امین صفرپور</span>
                                        <span class="message-time">12:28 AM</span>
                                        <div class="clearfix"></div>
                                        <span class="message-content">ملت وب ایپسوم متن ساختگی با تولید سادگی ملت وب از صنعت چاپ </span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="chat.html">
                                <div class="list-item">
                                    <div class="list-left">
                                        <span class="avatar">C</span>
                                    </div>
                                    <div class="list-body">
                                        <span class="message-author">امین صفرپور</span>
                                        <span class="message-time">12:28 AM</span>
                                        <div class="clearfix"></div>
                                        <span class="message-content">ملت وب ایپسوم متن ساختگی با تولید سادگی ملت وب از صنعت چاپ </span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="chat.html">
                                <div class="list-item">
                                    <div class="list-left">
                                        <span class="avatar">D</span>
                                    </div>
                                    <div class="list-body">
                                        <span class="message-author">امین صفرپور</span>
                                        <span class="message-time">12:28 AM</span>
                                        <div class="clearfix"></div>
                                        <span class="message-content">ملت وب ایپسوم متن ساختگی با تولید سادگی ملت وب از صنعت چاپ </span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="chat.html">
                                <div class="list-item">
                                    <div class="list-left">
                                        <span class="avatar">B</span>
                                    </div>
                                    <div class="list-body">
                                        <span class="message-author">امین صفرپور</span>
                                        <span class="message-time">12:28 AM</span>
                                        <div class="clearfix"></div>
                                        <span class="message-content">ملت وب ایپسوم متن ساختگی با تولید سادگی ملت وب از صنعت چاپ </span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="chat.html">
                                <div class="list-item">
                                    <div class="list-left">
                                        <span class="avatar">R</span>
                                    </div>
                                    <div class="list-body">
                                        <span class="message-author">امین صفرپور</span>
                                        <span class="message-time">12:28 AM</span>
                                        <div class="clearfix"></div>
                                        <span class="message-content">ملت وب ایپسوم متن ساختگی با تولید سادگی ملت وب از صنعت چاپ </span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="chat.html">
                                <div class="list-item">
                                    <div class="list-left">
                                        <span class="avatar">C</span>
                                    </div>
                                    <div class="list-body">
                                        <span class="message-author">امین صفرپور</span>
                                        <span class="message-time">12:28 AM</span>
                                        <div class="clearfix"></div>
                                        <span class="message-content">ملت وب ایپسوم متن ساختگی با تولید سادگی ملت وب از صنعت چاپ </span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="chat.html">
                                <div class="list-item">
                                    <div class="list-left">
                                        <span class="avatar">M</span>
                                    </div>
                                    <div class="list-body">
                                        <span class="message-author">امین صفرپور</span>
                                        <span class="message-time">12:28 AM</span>
                                        <div class="clearfix"></div>
                                        <span class="message-content">ملت وب ایپسوم متن ساختگی با تولید سادگی ملت وب از صنعت چاپ </span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="chat.html">
                                <div class="list-item">
                                    <div class="list-left">
                                        <span class="avatar">J</span>
                                    </div>
                                    <div class="list-body">
                                        <span class="message-author">امین صفرپور</span>
                                        <span class="message-time">12:28 AM</span>
                                        <div class="clearfix"></div>
                                        <span class="message-content">ملت وب ایپسوم متن ساختگی با تولید سادگی ملت وب از صنعت چاپ </span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="chat.html">
                                <div class="list-item">
                                    <div class="list-left">
                                        <span class="avatar">L</span>
                                    </div>
                                    <div class="list-body">
                                        <span class="message-author">امین صفرپور</span>
                                        <span class="message-time">12:28 AM</span>
                                        <div class="clearfix"></div>
                                        <span class="message-content">ملت وب ایپسوم متن ساختگی با تولید سادگی ملت وب از صنعت چاپ </span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="chat.html">
                                <div class="list-item">
                                    <div class="list-left">
                                        <span class="avatar">T</span>
                                    </div>
                                    <div class="list-body">
                                        <span class="message-author">امین صفرپور</span>
                                        <span class="message-time">12:28 AM</span>
                                        <div class="clearfix"></div>
                                        <span class="message-content">ملت وب ایپسوم متن ساختگی با تولید سادگی ملت وب از صنعت چاپ </span>
                                    </div>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="topnav-dropdown-footer">
                    <a href="chat.html">مشاهده همه پیام ها</a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="sidebar-overlay" data-reff=""></div>
<script type="text/javascript" src="/admin/assets/js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="/admin/assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/admin/assets/js/jquery.slimscroll.js"></script>
<script type="text/javascript" src="/admin/assets/js/moment.min.js"></script>
<script type="text/javascript" src="/admin/assets/plugins/morris/morris.min.js"></script>
<script type="text/javascript" src="/admin/assets/plugins/raphael/raphael-min.js"></script>
<script type="text/javascript" src="/admin/assets/js/app.js"></script>

@livewireScripts

@yield('Scripts')

@stack('StackScript')
</body>

</html>
