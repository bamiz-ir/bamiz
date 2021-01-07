<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li class="menu-title">ملت وب</li>
                <li class="active">
                    <a href="{{ route('dashboard-one') }}"><i class="fa fa-dashboard"></i> داشبورد</a>
                </li>

                {{--                /////////////////////////////////////////////////////////////////////////--}}

                <li class="submenu">
                    <a href="#"><i class="fa fa-map" aria-hidden="true"></i> <span>استان های بامیز</span> <span
                            class="menu-arrow"></span></a>
                    <ul class="list-unstyled" style="display: none;">
                        <li><a href="{{ route('states.index') }}">لیست استان ها</a></li>
                        <li><a href="{{ route('states.create') }}">افزودن استان جدید</a></li>
                    </ul>
                </li>

                {{--                /////////////////////////////////////////////////////--}}

                <li class="submenu">
                    <a href="#"><i class="fa fa-flag" aria-hidden="true"></i> <span>شهرهای بامیز</span> <span
                            class="menu-arrow"></span></a>
                    <ul class="list-unstyled" style="display: none;">
                        <li><a href="{{ route('cities.index') }}">لیست شهر ها</a></li>
                        <li><a href="{{ route('cities.create') }}">افزودن شهر جدید</a></li>
                    </ul>
                </li>

                {{--                ////////////////////////////////////////////////////////--}}

                <li class="submenu">
                    <a href="#"><i class="fa fa-clock-o" aria-hidden="true"></i> <span>زمان کاری میزبان ها</span> <span
                            class="menu-arrow"></span></a>
                    <ul class="list-unstyled" style="display: none;">
                        <li><a href="{{ route('work-times.index') }}">لیست زمان های کاری</a></li>
                        <li><a href="{{ route('work-times.create') }}">افزودن زمان کاری جدید</a></li>
                    </ul>
                </li>

                {{--                //////////////////////////////////////////////////////////////////////--}}

                <li class="submenu">
                    <a href="#"><i class="fa fa-image" aria-hidden="true"></i> <span>گالری بامیز</span> <span
                            class="menu-arrow"></span></a>
                    <ul class="list-unstyled" style="display: none;">
                        <li><a href="{{ route('galleries.index') }}">لیست گالری ها</a></li>
                        <li><a href="{{ route('galleries.create') }}">افزودن گالری جدید</a></li>
                    </ul>
                </li>

                {{--                ////////////////////////////////////////////////////--}}

                <li class="submenu">
                    <a href="#"><i class="fa fa-newspaper-o" aria-hidden="true"></i> <span>مقالات و اخبار بامیز</span>
                        <span class="menu-arrow"></span></a>
                    <ul class="list-unstyled" style="display: none;">
                        <li><a href="{{ route('articles.index') }}">لیست مقالات و اخبار</a></li>
                        <li><a href="{{ route('articles.create') }}">افزودن مقاله و اخبار</a></li>
                    </ul>
                </li>

                {{--                //////////////////////////////////////////////////--}}

                <li class="submenu">
                    <a href="#"><i class="fa fa-coffee" aria-hidden="true"></i> <span>مراکز بامیز</span> <span
                            class="menu-arrow"></span></a>
                    <ul class="list-unstyled" style="display: none;">
                        <li><a href="{{ route('centers.index') }}">لیست مراکز</a></li>
                        <li><a href="{{ route('centers.create') }}">افزودن مرکز جدید</a></li>
                        <li><a href="{{ route('trash_centers.index') }}">لیست مراکز غیر فعال</a></li>
                    </ul>
                </li>

                {{--                //////////////////////////////////////////////////--}}

                <li class="submenu">
                    <a href="#"><i class="fa fa-table" aria-hidden="true"></i> <span>میز های مراکز بامیز</span> <span
                            class="menu-arrow"></span></a>
                    <ul class="list-unstyled" style="display: none;">
                        <li><a href="{{ route('chairs.index') }}">لیست میز ها</a></li>
                        <li><a href="{{ route('chairs.create') }}">افزودن میز جدید</a></li>
                        <li><a href="{{ route('trash_chairs.index') }}">لیست میز ها غیر فعال</a></li>
                    </ul>
                </li>

                {{--                ////////////////////////////////////////////--}}

                <li class="submenu">
                    <a href="#"><i class="fa fa-list-alt" aria-hidden="true"></i> <span>دسته بندی بامیز</span> <span
                            class="menu-arrow"></span></a>
                    <ul class="list-unstyled" style="display: none;">
                        <li><a href="{{ route('categories.index') }}">لیست دسته بندی</a></li>
                        <li><a href="{{ route('categories.create') }}">افزودن دسته بندی</a></li>
                        <li><a href="{{ route('trash_categories.index') }}">لیست دسته بندی حذفی</a></li>
                    </ul>
                </li>

                {{--                ///////////////////////////////////////////////////--}}

                <li class="submenu">
                    <a href="#"><i class="fa fa-user" aria-hidden="true"></i> <span>کاربران بامیز</span> <span
                            class="menu-arrow"></span></a>
                    <ul class="list-unstyled" style="display: none;">
                        <li><a href="{{ route('users.index') }}">لیست کاربران</a></li>
                        <li><a href="{{ route('users.create') }}">افزودن کابر جدید</a></li>
                        <li><a href="{{ route('block_users.index') }}">لیست کاربران مسدودی</a></li>
                    </ul>
                </li>

                {{--                //////////////////////////////////////////////////////////--}}

                <li class="submenu">
                    <a href="#"><i class="fa fa-gift" aria-hidden="true"></i> <span>تشریفات بامیز</span> <span
                            class="menu-arrow"></span></a>
                    <ul class="list-unstyled" style="display: none;">
                        <li><a href="{{ route('options.index') }}">لیست تشریفات</a></li>
                        <li><a href="{{ route('trash_options.index') }}">لیست تشریفات غیر فعال</a></li>
                        <li><a href="{{ route('options.create') }}">افزودن تشریفات جدید</a></li>
                    </ul>
                </li>

                {{--                //////////////////////////////////////////////////////////////--}}

                <li class="submenu">
                    <a href="#"><i class="fa fa-cutlery" aria-hidden="true"></i> <span>غذا های بامیز</span> <span
                            class="menu-arrow"></span></a>
                    <ul class="list-unstyled" style="display: none;">
                        <li><a href="{{ route('products.index') }}">لیست غذا</a></li>
                        <li><a href="{{ route('products.create') }}">افزودن غذا جدید</a></li>
                        <li><a href="{{ route('trash_products.index') }}">لیست غذا های غیر فعال</a></li>
                    </ul>
                </li>

                {{--                ///////////////////////////////////////////////////////////////////--}}

                <li class="submenu">
                    <a href="#"><i class="fa fa-comment" aria-hidden="true"></i> <span>نظرات بامیز</span> <span
                            class="menu-arrow"></span></a>
                    <ul class="list-unstyled" style="display: none;">
                        <li><a href="{{ route('comments.index') }}">نظرات تایید شده</a></li>
                        <li><a href="{{ route('NotApprovedComments') }}">نظرات تایید نشده</a></li>
                    </ul>
                </li>

                {{--                ///////////////////////////////////////////////////////////////////--}}

                <li class="submenu">
                    <a href="#"><i class="fa fa-heart" aria-hidden="true"></i> <span>علاقه مندی ها بامیز</span> <span
                            class="menu-arrow"></span></a>
                    <ul class="list-unstyled" style="display: none;">
                        <li><a href="{{ route('wish-lists.index') }}">لیست علاقه مندی ها</a></li>
                        <li><a href="{{ route('wish-lists.create') }}">افزودن علاقه مندی جدید </a></li>
                    </ul>
                </li>

                {{--                ///////////////////////////////////////////////////////////////////////////////////--}}

                <li class="menu-title">سطح دسترسی و مقام ها</li>

                <li class="submenu">
                    <a href="#"><i class="fa fa-cog" aria-hidden="true"></i> <span>لیست دسترسی ها بامیز</span> <span
                            class="menu-arrow"></span></a>
                    <ul class="list-unstyled" style="display: none;">
                        <li><a href="{{ route('permissions.index') }}">لیست دسترسی ها</a></li>
                        <li><a href="{{ route('permissions.create') }}">افزودن دسترسی جدید</a></li>
                    </ul>
                </li>

                <li class="submenu">
                    <a href="#"><i class="fa fa-black-tie" aria-hidden="true"></i> <span>مقام ها بامیز</span> <span
                            class="menu-arrow"></span></a>
                    <ul class="list-unstyled" style="display: none;">
                        <li><a href="{{ route('roles.index') }}">لیست مقام های بامیز</a></li>
                        <li><a href="{{ route('roles.create') }}">افزودن مقام جدید</a></li>
                    </ul>
                </li>

                <li class="submenu">
                    <a href="#"><i class="fa fa-user-circle-o" aria-hidden="true"></i> <span>کاربران دارای مقام</span>
                        <span class="menu-arrow"></span></a>
                    <ul class="list-unstyled" style="display: none;">
                        <li><a href="{{ route('roles_users.index') }}">لیست کاربران مقام دار</a></li>
                        <li><a href="{{ route('roles_users.create') }}">اعطای مقام به کاربر</a></li>
                    </ul>
                </li>

                {{--                //////////////////////////////////////////////////////////////////////////////////--}}

                <li class="menu-title">رزرو ها</li>

                <li class="submenu">
                    <a href="#"><i class="fa fa-ticket" aria-hidden="true"></i> <span>رزرو های بامیز</span> <span
                            class="menu-arrow"></span></a>
                    <ul class="list-unstyled" style="display: none;">
                        <li><a href="{{ route('reserves.index') }}">لیست رزرو ها موفق</a></li>
                        <li><a href="{{ route('reserves.failed') }}">لیست رزرو ها ناموفق</a></li>
                        <li><a href="{{ route('reserves.create') }}">افزودن رزرو</a></li>
                    </ul>
                </li>

                <li class="submenu">
                    <a href="#"><i class="fa fa-cutlery" aria-hidden="true"></i> <span>غذا های رزرو شده</span> <span
                            class="menu-arrow"></span></a>
                    <ul class="list-unstyled" style="display: none;">
                        <li><a href="{{ route('product_reserves.index') }}">لیست غذاهای رزرو شده</a></li>
                        <li><a href="{{ route('product_reserves.create') }}">افزودن غذای رزرو شده</a></li>
                    </ul>
                </li>

                <li class="submenu">
                    <a href="#"><i class="fa fa-birthday-cake" aria-hidden="true"></i> <span>تشریفات رزرو شده</span>
                        <span class="menu-arrow"></span></a>
                    <ul class="list-unstyled" style="display: none;">
                        <li><a href="{{ route('option_reserve.index') }}">لیست تشریفات رزروی</a></li>
                        <li><a href="{{ route('option_reserve.create') }}">افزودن تشریفات رزروی</a></li>
                    </ul>
                </li>

                {{--                //////////////////////////////////////////////////--}}

                <li class="menu-title">تیکت ها</li>

                <li class="submenu">
                    <a href="#"><i class="fa fa-ticket" aria-hidden="true"></i> <span>تیکت ها</span> <span
                            class="menu-arrow"></span></a>
                    <ul class="list-unstyled" style="display: none;">
                        <li><a href="{{ route('tickets.index') }}">لیست تیکت ها</a></li>
                        <li><a href="{{ route('tickets.create') }}">افزودن تیکت جدید</a></li>
                    </ul>
                </li>

                <li class="submenu">
                    <a href="#"><i class="fa fa-question" aria-hidden="true"></i> <span>پرسش ها</span> <span
                            class="menu-arrow"></span></a>
                    <ul class="list-unstyled" style="display: none;">
                        <li><a href="{{ route('questions.index') }}">لیست پرسش ها</a></li>
                        <li><a href="{{ route('questions.create') }}">افزودن پرسش جدید</a></li>
                    </ul>
                </li>

                <li class="submenu">
                    <a href="#"><i class="fa fa-reply-all" aria-hidden="true"></i> <span>پاسخ ها</span> <span
                            class="menu-arrow"></span></a>
                    <ul class="list-unstyled" style="display: none;">
                        <li><a href="{{ route('answers.index') }}">لیست پاسخ ها</a></li>
                        <li><a href="{{ route('answers.create') }}">افزودن پاسخ جدید</a></li>
                    </ul>
                </li>

                <hr>

                {{--                //////////////////////////////////////////////////////////////////////////////////////////--}}

                <li class="submenu">
                    <a href="#"><i class="fa fa-phone" aria-hidden="true"></i> <span>تماس با ما بامیز</span> <span
                            class="menu-arrow"></span></a>
                    <ul class="list-unstyled" style="display: none;">
                        <li><a href="{{ route('contact_us.index') }}">لیست تماس با ما</a></li>
                        <li><a href="{{ route('contact_us.create') }}">افزودن تماس با ما جدید</a></li>
                    </ul>
                </li>

                {{--                //////////////////////////////////////////////////////////////////////////////////////////--}}

                <li class="submenu">
                    <a href="#"><i class="fa fa-paypal" aria-hidden="true"></i> <span>پرداخت ها بامیز</span> <span
                            class="menu-arrow"></span></a>
                    <ul class="list-unstyled" style="display: none;">
                        <li><a href="{{ route('success_payments.index') }}">پرداخت های موفق</a></li>
                        <li><a href="{{ route('failed_payments.index') }}">پرداخت ناموفق</a></li>
                    </ul>
                </li>

                {{--                ////////////////////////////////////////////////////////--}}

                <li class="submenu">
                    <a href="#"><i class="fa fa-paypal" aria-hidden="true"></i> <span>تیکت ها بامیز</span> <span
                            class="menu-arrow"></span></a>
                    <ul class="list-unstyled" style="display: none;">
                        <li><a href="{{ route('success_payments.index') }}">پرداخت های موفق</a></li>
                        <li><a href="{{ route('failed_payments.index') }}">پرداخت ناموفق</a></li>
                    </ul>
                </li>

                {{--                ///////////////////////////////////////////////////////////--}}

                <li class="submenu">
                    <a href="#"><i class="fa fa-cogs" aria-hidden="true"></i> <span>مدیریت کش ها</span> <span
                            class="menu-arrow"></span></a>
                    <ul class="list-unstyled" style="display: none;">
                        <li><a href="{{ route('caches.delete') }}">حذف کش ها</a></li>
                    </ul>
                </li>

                {{--                ////////////////////////////////////////////////////////////////////////////--}}

                <li class="submenu">
                    <a href="#"><i class="fa fa-cog" aria-hidden="true"></i> <span>تنظیمات بامیز</span> <span
                            class="menu-arrow"></span></a>
                    <ul class="list-unstyled" style="display: none;">
                        <li><a href="{{ route('settings.index') }}">لیست تنظیمات</a></li>
                        <li><a href="{{ route('settings.index') }}">افزودن تنظیمات</a></li>
                    </ul>
                </li>

                {{--                ////////////////////////////////////////////////////////////////////////////--}}

            </ul>
        </div>
    </div>
</div>
