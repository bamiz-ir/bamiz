<div class="header">
    <div class="header-left">
            <a href="/" class="logo">
            <h3 style="margin-top:18px !important;">Bamiz</h3>
        </a>
    </div>
    <div class="page-title-box pull-left">
        <h3>Preadmin</h3>
    </div>
    <a id="mobile_btn" class="mobile_btn pull-left" href="#sidebar"><i class="fa fa-bars" aria-hidden="true"></i></a>
    <ul class="nav navbar-nav navbar-right user-menu pull-right">
        <li class="dropdown hidden-xs">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bell-o"></i> <span class="badge bg-primary pull-right">3</span></a>
            <div class="dropdown-menu notifications">
                <div class="topnav-dropdown-header">
                    <span>اعلانات</span>
                </div>
                <div class="drop-scroll">
                    <ul class="media-list">
                        <li class="media notification-message">
                            <a href="activities.html">
                                <div class="media-left">
                                            <span class="avatar">
												<img alt="John Doe" src="assets/img/user.jpg" class="img-responsive img-circle">
											</span>
                                </div>
                                <div class="media-body">
                                    <p class="noti-details"><span class="noti-title">امین صفرپور</span> افزودن کار جدید <span class="noti-title">رزرو وقت بیمار</span></p>
                                    <p class="noti-time"><span class="notification-time">4 دقیقه قبل</span></p>
                                </div>
                            </a>
                        </li>
                        <li class="media notification-message">
                            <a href="activities.html">
                                <div class="media-left">
                                    <span class="avatar">V</span>
                                </div>
                                <div class="media-body">
                                    <p class="noti-details"><span class="noti-title">برناردو گالوویز</span> نام کار را تغییر داد <span class="noti-title">رزرو روزانه با دروازه پرداخت</span></p>
                                    <p class="noti-time"><span class="notification-time">6 دقیقه قبل</span></p>
                                </div>
                            </a>
                        </li>
                        <li class="media notification-message">
                            <a href="activities.html">
                                <div class="media-left">
                                    <span class="avatar">L</span>
                                </div>
                                <div class="media-body">
                                    <p class="noti-details"><span class="noti-title">برناردو گالوویز</span> افزود <span class="noti-title">امین صفرپور</span> و <span class="noti-title">کلر مپس</span>برای پروژه  <span class="noti-title">دکتر ماژول موجود</span></p>
                                    <p class="noti-time"><span class="notification-time">8 دقیقه قبل</span></p>
                                </div>
                            </a>
                        </li>
                        <li class="media notification-message">
                            <a href="activities.html">
                                <div class="media-left">
                                    <span class="avatar">G</span>
                                </div>
                                <div class="media-body">
                                    <p class="noti-details"><span class="noti-title">برناردو گالوویز</span> تکمیل کار <span class="noti-title">کنفرانس ویدیویی بیمار و دکتر</span></p>
                                    <p class="noti-time"><span class="notification-time">12 دقیقه قبل</span></p>
                                </div>
                            </a>
                        </li>
                        <li class="media notification-message">
                            <a href="activities.html">
                                <div class="media-left">
                                    <span class="avatar">V</span>
                                </div>
                                <div class="media-body">
                                    <p class="noti-details"><span class="noti-title">برناردو گالوویز</span> افزودن کار جدید <span class="noti-title">ماژول چت خصوصی</span></p>
                                    <p class="noti-time"><span class="notification-time">2 دقیقه قبل</span></p>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="topnav-dropdown-footer">
                    <a href="activities.html">مشاهده تمام اعلان ها</a>
                </div>
            </div>
        </li>
        <li class="dropdown hidden-xs">
            <a href="javascript:;" id="open_msg_box" class="hasnotifications"><i class="fa fa-comment-o"></i> <span class="badge bg-primary pull-right">8</span></a>
        </li>
        <li class="dropdown">
            <a href="profile.html" class="dropdown-toggle user-link" data-toggle="dropdown" title="Admin">
                        <span class="user-img"><img class="img-circle" src="{{ auth()->user()->profile_photo_path ?   \Illuminate\Support\Facades\Storage::url(auth()->user()->profile_photo_path)  :  "data:image/jpeg;base64,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" }}" width="40" alt="Admin">
							<span class="status online"></span></span>
                <span> {{ auth()->check() ? auth()->user()->username : 'admin'}} </span>
                <i class="caret"></i>
            </a>
            <ul class="dropdown-menu">
                <li><a href="profile.html">پروفایل من</a></li>
                <li><a href="edit-profile.html">ویرایش پروفایل</a></li>
                <li><a href="settings.html">تنظیمات</a></li>
                <form action="{{ route('logout') }}" method="post">

                    @csrf
                    <input type="submit" value="خروج" class="btn btn-danger" style="width: 100%">

                </form>
            </ul>
        </li>
    </ul>
    <div class="dropdown mobile-user-menu pull-right">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
        <ul class="dropdown-menu pull-right">
            <li><a href="profile.html">پروفایل من</a></li>
            <li><a href="edit-profile.html">ویرایش پروفایل</a></li>
            <li><a href="settings.html">تنظیمات</a></li>
            <li><a href="login.html">خروج</a></li>
        </ul>
    </div>
</div>
