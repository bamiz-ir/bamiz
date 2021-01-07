<div>
    <section class="hero_in tours_detail start_bg_zoom">
        <div class="wrapper">
            <div class="container">
                <h1 class="fadeInUp animated"><span></span>تور مجازی {{ $center->name }}</h1>
            </div>
        </div>
    </section>
    <div class="bg_color_1" style="transform: none;">

        <nav class="secondary_nav sticky_horizontal" style="">
            <div class="container">
                <ul class="clearfix">
                    <li><a href="#description" class="active">اطلاعات</a></li>
                    <li><a href="#comments">نظرات</a></li>
                    <li><a href="#sidebar">رزرو</a></li>
                </ul>
            </div>
        </nav>

        <div class="container margin_60_35" style="transform: none;">
            <div class="row" style="transform: none;">
                <div class="col-lg-8">
                    <section id="description">
                        <h2>توضیحات</h2>
                        <p> {{ \Illuminate\Support\Str::limit($center->description , 150) }} </p>
                        <hr>

                        <h3>آخرین تصاویر اینستاگرام</h3>
                        <div id="instagram-feed" class="clearfix"></div>

                        <hr>

                        <div class="room_type first">
                            <div class="row">

                                <div class="col-md-8">
                                    <h4>{{ $center->name }}</h4>
                                    <p> {{ \Illuminate\Support\Str::limit($center->description , 150) }} </p>
                                    <ul class="hotel_facilities">
                                        <li><img src="/front/img/hotel_facilites_icon_2.svg" alt="">متوسط : کلاس قیمت
                                        </li>
                                        <li><img src="/front/img/hotel_facilites_icon_2.svg" alt="">ظرفیت : 50 نفر</li>
                                        <li><img src="/front/img/hotel_facilites_icon_8.svg" alt="">مالیات بر ارزش
                                            افزوده 10
                                            درصد
                                        </li>
                                        <li><img src="/front/img/hotel_facilites_icon_4.svg" alt="">اینترنت - دارد</li>
                                        <li><img src="/front/img/hotel_facilites_icon_5.svg" alt=""> فضای بازی کودکان-
                                            میز
                                            مخصوص
                                        </li>
                                        <li><img src="/front/img/hotel_facilites_icon_5.svg" alt="">فضای VIP - 1</li>
                                        <li><img src="/front/img/hotel_facilites_icon_5.svg" alt="">موسیقی زنده - آخر
                                            هفته
                                            ها
                                        </li>

                                    </ul>
                                </div>
                            </div>
                            <!-- /row -->
                        </div>

                        <hr>

                        <h3>ساعات کاری</h3>
                        <p>ساعات کاری کافه | رستوران ({{ $center->name }}) به شرح ذیل می باشد</p>

                        <ul class="cbp_tmtimeline">

                            @foreach($work_days as $d)

                                <li>
                                    <time class="cbp_tmtime" datetime="09:30"><span>روز</span></time>
                                    <div class="cbp_tmicon">
                                        <small style="font-size: small">{{ $d }}</small>
                                    </div>
                                    <div class="cbp_tmlabel">
                                        <p>
                                            ساعت کاری از ساعت {{ $center->work_time->fromHour }} صبح
                                            الی {{ $center->work_time->toHour }} شب
                                        </p>
                                    </div>
                                </li>

                            @endforeach

                        </ul>

                        <hr>
                        <h3>موقعیت جغرافیایی</h3>
                        <div id="map" class="map map_single add_bottom_30 olMap">
                            <div id="OpenLayers_Map_4_OpenLayers_ViewPort"
                                 class="olMapViewport olControlDragPanActive olControlZoomBoxActive olControlPinchZoomActive olControlNavigationActive olControlActive"
                                 style="position: relative; overflow: hidden; width: 100%; height: 100%;">
                                <div id="OpenLayers_Map_4_OpenLayers_Container"
                                     style="position: absolute; z-index: 749; left: 488px; top: 146px;">
                                    <div id="OpenLayers_Layer_OSM_30" dir="ltr" class="olLayerDiv olLayerGrid"
                                         style="position: absolute; width: 100%; height: 100%; z-index: 325;"><img
                                            class="olTileImage" crossorigin="anonymous"
                                            src="http://b.tile.openstreetmap.org/14/10467/6417.png"
                                            style="visibility: inherit; opacity: 1; position: absolute; left: 25px; top: 155px; width: 256px; height: 256px;"><img
                                            class="olTileImage" crossorigin="anonymous"
                                            src="http://a.tile.openstreetmap.org/14/10467/6416.png"
                                            style="visibility: inherit; opacity: 1; position: absolute; left: 25px; top: -101px; width: 256px; height: 256px;"><img
                                            class="olTileImage" crossorigin="anonymous"
                                            src="http://b.tile.openstreetmap.org/14/10466/6417.png"
                                            style="visibility: inherit; opacity: 1; position: absolute; left: -231px; top: 155px; width: 256px; height: 256px;"><img
                                            class="olTileImage" crossorigin="anonymous"
                                            src="http://c.tile.openstreetmap.org/14/10466/6416.png"
                                            style="visibility: inherit; opacity: 1; position: absolute; left: -231px; top: -101px; width: 256px; height: 256px;"><img
                                            class="olTileImage"
                                            style="visibility: inherit; opacity: 1; position: absolute; left: -487px; top: -101px; width: 256px; height: 256px;"
                                            crossorigin="anonymous"
                                            src="http://a.tile.openstreetmap.org/14/10465/6416.png"><img
                                            class="olTileImage"
                                            style="visibility: inherit; opacity: 1; position: absolute; left: -487px; top: 155px; width: 256px; height: 256px;"
                                            crossorigin="anonymous"
                                            src="http://a.tile.openstreetmap.org/14/10465/6417.png"><img
                                            class="olTileImage"
                                            style="visibility: inherit; opacity: 1; position: absolute; left: -487px; top: -357px; width: 256px; height: 256px;"
                                            crossorigin="anonymous"
                                            src="http://c.tile.openstreetmap.org/14/10465/6415.png"><img
                                            class="olTileImage"
                                            style="visibility: inherit; opacity: 1; position: absolute; left: -231px; top: -357px; width: 256px; height: 256px;"
                                            crossorigin="anonymous"
                                            src="http://a.tile.openstreetmap.org/14/10466/6415.png"><img
                                            class="olTileImage"
                                            style="visibility: inherit; opacity: 1; position: absolute; left: 25px; top: -357px; width: 256px; height: 256px;"
                                            crossorigin="anonymous"
                                            src="http://c.tile.openstreetmap.org/14/10467/6415.png"><img
                                            class="olTileImage"
                                            style="visibility: inherit; opacity: 1; position: absolute; left: -743px; top: -357px; width: 256px; height: 256px;"
                                            crossorigin="anonymous"
                                            src="http://b.tile.openstreetmap.org/14/10464/6415.png"><img
                                            class="olTileImage"
                                            style="visibility: inherit; opacity: 1; position: absolute; left: -743px; top: -101px; width: 256px; height: 256px;"
                                            crossorigin="anonymous"
                                            src="http://a.tile.openstreetmap.org/14/10464/6416.png"><img
                                            class="olTileImage"
                                            style="visibility: inherit; opacity: 1; position: absolute; left: -743px; top: 155px; width: 256px; height: 256px;"
                                            crossorigin="anonymous"
                                            src="http://c.tile.openstreetmap.org/14/10464/6417.png">
                                    </div>
                                    <div id="OpenLayers_Layer_Markers_81" dir="ltr" class="olLayerDiv"
                                         style="position: absolute; width: 100%; height: 100%; z-index: 330;">
                                        <div id="OL_Icon_83"
                                             style="position: absolute; width: 32px; height: 32px; left: 349px; top: 168px;">
                                            <img id="OL_Icon_83_innerImage" class="olAlphaImg"
                                                 src="_uploads_/_default_/marker.png"
                                                 style="position: relative; width: 32px; height: 32px;"></div>
                                    </div>
                                </div>
                                <div id="OpenLayers_Control_Attribution_2"
                                     class="olControlAttribution olControlNoSelect"
                                     unselectable="on" style="position: absolute; z-index: 1002;">© <a
                                        href="http://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors
                                </div>
                                <div id="OpenLayers_Control_PanZoom_3" class="olControlPanZoom olControlNoSelect"
                                     unselectable="on" style="position: absolute; left: 4px; top: 4px; z-index: 1002;">
                                    <div id="OpenLayers_Control_PanZoom_3_panup" class="olButton"
                                         style="position: absolute; left: 13px; top: 4px; width: 18px; height: 18px; cursor: pointer;">
                                        <img id="OpenLayers_Control_PanZoom_3_panup_innerImage" class="olAlphaImg"
                                             src="js/map/img/north-mini.png"
                                             style="position: relative; width: 18px; height: 18px;"></div>
                                    <div id="OpenLayers_Control_PanZoom_3_panleft" class="olButton"
                                         style="position: absolute; left: 4px; top: 22px; width: 18px; height: 18px; cursor: pointer;">
                                        <img id="OpenLayers_Control_PanZoom_3_panleft_innerImage" class="olAlphaImg"
                                             src="js/map/img/west-mini.png"
                                             style="position: relative; width: 18px; height: 18px;"></div>
                                    <div id="OpenLayers_Control_PanZoom_3_panright" class="olButton"
                                         style="position: absolute; left: 22px; top: 22px; width: 18px; height: 18px; cursor: pointer;">
                                        <img id="OpenLayers_Control_PanZoom_3_panright_innerImage" class="olAlphaImg"
                                             src="js/map/img/east-mini.png"
                                             style="position: relative; width: 18px; height: 18px;"></div>
                                    <div id="OpenLayers_Control_PanZoom_3_pandown" class="olButton"
                                         style="position: absolute; left: 13px; top: 40px; width: 18px; height: 18px; cursor: pointer;">
                                        <img id="OpenLayers_Control_PanZoom_3_pandown_innerImage" class="olAlphaImg"
                                             src="js/map/img/south-mini.png"
                                             style="position: relative; width: 18px; height: 18px;"></div>
                                    <div id="OpenLayers_Control_PanZoom_3_zoomin" class="olButton"
                                         style="position: absolute; left: 13px; top: 63px; width: 18px; height: 18px; cursor: pointer;">
                                        <img id="OpenLayers_Control_PanZoom_3_zoomin_innerImage" class="olAlphaImg"
                                             src="js/map/img/zoom-plus-mini.png"
                                             style="position: relative; width: 18px; height: 18px;"></div>
                                    <div id="OpenLayers_Control_PanZoom_3_zoomworld" class="olButton"
                                         style="position: absolute; left: 13px; top: 81px; width: 18px; height: 18px; cursor: pointer;">
                                        <img id="OpenLayers_Control_PanZoom_3_zoomworld_innerImage" class="olAlphaImg"
                                             src="js/map/img/zoom-world-mini.png"
                                             style="position: relative; width: 18px; height: 18px;"></div>
                                    <div id="OpenLayers_Control_PanZoom_3_zoomout" class="olButton"
                                         style="position: absolute; left: 13px; top: 99px; width: 18px; height: 18px; cursor: pointer;">
                                        <img id="OpenLayers_Control_PanZoom_3_zoomout_innerImage" class="olAlphaImg"
                                             src="js/map/img/zoom-minus-mini.png"
                                             style="position: relative; width: 18px; height: 18px;"></div>
                                </div>
                                <div id="OpenLayers_Control_DrawFeature_38"
                                     class="olControlDrawFeature olControlNoSelect"
                                     unselectable="on" style="position: absolute; z-index: 1004;"></div>
                                <div id="OpenLayers_Control_DrawFeature_44"
                                     class="olControlDrawFeature olControlNoSelect"
                                     unselectable="on" style="position: absolute; z-index: 1005;"></div>
                                <div id="OpenLayers_Control_DrawFeature_50"
                                     class="olControlDrawFeature olControlNoSelect"
                                     unselectable="on" style="position: absolute; z-index: 1006;"></div>
                                <div id="OpenLayers_Control_DragFeature_56"
                                     class="olControlDragFeature olControlNoSelect"
                                     unselectable="on" style="position: absolute; z-index: 1007;"></div>
                                <div id="OpenLayers_Control_DrawFeature_59"
                                     class="olControlDrawFeature olControlNoSelect"
                                     unselectable="on" style="position: absolute; z-index: 1008;"></div>
                                <div id="OpenLayers_Control_65" class="olControl olControlNoSelect" unselectable="on"
                                     style="position: absolute; z-index: 1009;"></div>
                            </div>
                        </div>
                        <!-- End Map -->
                    </section>
                    <!-- /section -->

                    <section id="comments">
                        <h2>نظرات کاربران</h2>
                        <div class="reviews-container">
                            <div class="row">
                                <div class="col-lg-3">
                                    <div id="review_summary">
                                        <strong>5</strong>
                                        <em>از</em>
                                        <small>مجموع 10 رای اخذ شده</small>
                                    </div>
                                </div>
                                <div class="col-lg-9">
                                    <div class="row">
                                        <div class="col-lg-10 col-9">
                                            <div class="progress">
                                                <div class="progress-bar" role="progressbar" style="width: 90%"
                                                     aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                        <div class="col-lg-2 col-3"><small><strong>5 ستاره</strong></small></div>
                                    </div>
                                    <!-- /row -->
                                    <div class="row">
                                        <div class="col-lg-10 col-9">
                                            <div class="progress">
                                                <div class="progress-bar" role="progressbar" style="width: 95%"
                                                     aria-valuenow="95" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                        <div class="col-lg-2 col-3"><small><strong>4 ستاره</strong></small></div>
                                    </div>
                                    <!-- /row -->
                                    <div class="row">
                                        <div class="col-lg-10 col-9">
                                            <div class="progress">
                                                <div class="progress-bar" role="progressbar" style="width: 60%"
                                                     aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                        <div class="col-lg-2 col-3"><small><strong>3 ستاره</strong></small></div>
                                    </div>
                                    <!-- /row -->
                                    <div class="row">
                                        <div class="col-lg-10 col-9">
                                            <div class="progress">
                                                <div class="progress-bar" role="progressbar" style="width: 20%"
                                                     aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                        <div class="col-lg-2 col-3"><small><strong>2 ستاره</strong></small></div>
                                    </div>
                                    <!-- /row -->
                                    <div class="row">
                                        <div class="col-lg-10 col-9">
                                            <div class="progress">
                                                <div class="progress-bar" role="progressbar" style="width: 0"
                                                     aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                        <div class="col-lg-2 col-3"><small><strong>1 ستاره</strong></small></div>
                                    </div>
                                    <!-- /row -->
                                </div>
                            </div>
                            <!-- /row -->
                        </div>

                        <hr>

                        @if(!$comments->isEmpty())
                            @foreach($comments as $c)
                                <div class="reviews-container">
                                    <div class="review-box clearfix">
                                        <figure class="rev-thumb"><img
                                                src="{{ $c->user->profile_photo_path ? \Illuminate\Support\Facades\Storage::url($c->user->profile_photo_path) :  "https://www.hardiagedcare.com.au/wp-content/uploads/2019/02/default-avatar-profile-icon-vector-18942381.jpg"}}"
                                                alt="">
                                        </figure>

                                        <div class="rev-content">
                                            <h5> {{ $c->title }} </h5>
                                            <div class="rating">
                                                <i class="icon_star voted"></i><i class="icon_star voted"></i><i
                                                    class="icon_star voted"></i><i class="icon_star voted"></i><i
                                                    class="icon_star"></i>
                                            </div>
                                            <div class="rev-info">
                                                {{ \Illuminate\Support\Carbon::parse($c->created_at)->diffForHumans() }}
                                                - {{ $c->user->username }}
                                            </div>
                                            <div class="rev-text">
                                                <p>
                                                    {{ $c->body }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /review-box -->
                                </div>
                            @endforeach


                        @else
                            <h5>هنوز نظری وجود ندارد.</h5>
                    @endif
                    <!-- /review-container -->
                    </section>
                    <!-- /section -->
                    <hr>

                    <div class="add-review">
                        @if($errors->any() && ($errors->has('body') || $errors->has('title') || $errors->has('star')))

                            <div class="alert alert-danger text-center">

                                @foreach($errors->all() as $e)
                                    {{ $e }}<br>
                                @endforeach

                            </div>

                        @endif

                        <h5>ثبت نظر</h5>
                        @if(auth()->check())
                            <form wire:submit.prevent="SubmitNewComment()">
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label>عنوان *</label>
                                        <input wire:model.defer="title" required type="text" name="name_review"
                                               id="name_review" placeholder=""
                                               class="form-control">
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label>امتیاز (اختیاری)</label>
                                        <select class="form-control" wire:model.defer="star" name="rating_review"
                                                id="rating_review">
                                            <option value="" selected>امتیاز نمیدم</option>
                                            <option value="1">1 (ضعیف)</option>
                                            <option value="2">2</option>
                                            <option value="3">3 (متوسط)</option>
                                            <option value="4">4</option>
                                            <option value="5">5 (عالی</option>
                                        </select>
                                    </div>

                                    <div class="form-group col-md-12">
                                        <label>نظر شما *</label>
                                        <textarea wire:model.defer="body" required name="body" id="review_text"
                                                  class="form-control"
                                                  style="height:130px;"></textarea>
                                    </div>

                                    @if(session()->has('comment_add'))
                                        <div class="mt-3 text-center text-success" style="font-size: 14px !important;">{{ session()->get('comment_add') }}</div>
                                    @endif

                                    <div class="form-group col-md-12 add_top_20">
                                        <input type="submit" value="ثبت نظر" class="btn_1" id="submit-review">
                                    </div>
                                </div>
                            </form>
                        @else
                            <div style="margin-top: 25px !important;" class="alert alert-danger">برای ثبت نظر ابتدا
                                <a class="text-info" href="/login"> وارد </a> شوید
                            </div>
                        @endif
                    </div>
                </div>
                <!-- /col -->

                <aside class="col-lg-4" id="sidebar"
                       style="position: relative; overflow: visible; box-sizing: border-box; min-height: 1610.6px;">

                    <div class="theiaStickySidebar"
                         style="padding-top: 0px; padding-bottom: 1px; position: fixed; transform: translateY(-51.4px); top: 0px; left: 204.6px; width: 350px;">

                        @if($errors->any() && !($errors->has('body') || $errors->has('title') || $errors->has('star')))

                            <div class="alert alert-danger text-center">

                                @foreach($errors->all() as $e)
                                    {{ $e }}<br>
                                @endforeach

                            </div>

                        @endif

                        <form action="{{ route('reserve' , $center->slug) }}" method="post" id="reserve_form">

                            @csrf

                            <div class="box_detail">
                                <div class="price">
                                    <span> {{ $price }} <small> تومان هزینه رزرو هر نفر</small></span>
                                    <div class="score"><strong>{{ $center->reserves->count() }} رزرو موفق</strong></div>
                                    <br>
                                    <div class="text-center" style="margin-top: 10px;color: red"><strong>هزینه رزرو از
                                            مبلغ
                                            فاکتور سفارش کسر می شود</strong></div>
                                </div>

                                <div class="form-group">
                                    <input wire:model="date" required class="form-control" type="date" name="date"
                                           id="date"
                                           placeholder="تاریخ رزرو">
                                </div>

                                <div class="form-group clearfix">
                                    <select wire:model="time" required class="form-control" id="chain_no" name="time">
                                        <option value="">ساعت رزرو</option>

                                        @foreach($times as $c)
                                            <option value="{{ $c }}"> ساعت {{ $c }} </option>
                                        @endforeach

                                    </select>

                                    <br>
                                    <div class="form-group clearfix">
                                        <select wire:model="chair_id" class="form-control" name="chair_id">
                                            <option value="">میز خاصی مد نظر ندارم</option>

                                            @foreach($chairs as $c)
                                                <option value="{{ $c['id'] }}"> میز شماره {{ $c['number'] }} </option>
                                            @endforeach

                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <small style="color: red">تعداد صندلی های هر میز
                                            : {{ $center->chairs_people_count }}</small>
                                        <input wire:model="guest_count" required class="form-control" type="text"
                                               name="guest_count" id="quest_count"
                                               placeholder="تعداد مهمانان">
                                    </div>


                                    <div class="text-center text-red"><b>سفارش تشریفات میز و رزرو غذا در صورت تمایل در
                                            مرحله بعد
                                            انجام می شود</b></div>


                                    <button id="btn_check_reserve" type="submit" class="btn_1 full-width outline"><i
                                            class="icon-calendar-outlilne"></i> تکمیل رزرو
                                    </button>
                                    @if(auth()->check())
                                        @if(!$is_Added_To_WishList)
                                            <button wire:click.prevent="AddToWishList()"
                                                    class="btn_1 full-width outline wishlist"><i
                                                    class="icon_heart"></i> اضافه به علاقه مندی ها
                                            </button>

                                        @else
                                            <button wire:click.prevent="DeleteFromWishList()"
                                                    class="btn_1 full-width outline wishlist"><i
                                                    class="icon_heart"></i> حذف از علاقه مندی ها
                                            </button>
                                        @endif


                                        @if(session()->has('wishlist_status'))
                                                <div class="mt-3 text-center text-success" style="font-size: 14px !important;">{{ session()->get('wishlist_status') }}</div>
                                            @endif

                                    @else
                                        <hr>
                                        <span class="alert alert-danger">برای افزدون به علاقه مندی ها ابتدا <a
                                                class="text-info"
                                                href="/login"> وارد </a> شوید</span>
                                    @endif

                                </div>
                        </form>
                        <div class="resize-sensor"
                             style="position: absolute; inset: 0px; overflow: hidden; z-index: -1; visibility: hidden;">
                            <div class="resize-sensor-expand"
                                 style="position: absolute; left: 0; top: 0; right: 0; bottom: 0; overflow: hidden; z-index: -1; visibility: hidden;">
                                <div
                                    style="position: absolute; left: 0px; top: 0px; transition: all 0s ease 0s; width: 360px; height: 536px;"></div>
                            </div>
                            <div class="resize-sensor-shrink"
                                 style="position: absolute; left: 0; top: 0; right: 0; bottom: 0; overflow: hidden; z-index: -1; visibility: hidden;">
                                <div
                                    style="position: absolute; left: 0; top: 0; transition: 0s; width: 200%; height: 200%"></div>
                            </div>
                        </div>
                    </div>
                </aside>


            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
</div>

@push('JS')
    <!-- Map -->
    <script src="/front/js/map/OpenLayers.js"></script>
    <script src="/front/js/map/map.js"></script>
    <script>

        function load_marker(id, lon, lat, from_prj, title, service, address, type, x1, x2, y1, y2) {
            var size = new OpenLayers.Size(32, 32);
            var offset = new OpenLayers.Pixel(-(size.w / 2), -size.h);
            var icon = new OpenLayers.Icon("_uploads_/_default_/marker.png", size, offset);
            // var icon = new OpenLayers.Icon("assets_mehman/Bundle/JS/map/map_markers/"+iconname, size, offset);
            var marker = new OpenLayers.Marker(new OpenLayers.LonLat(lon, lat).transform(new OpenLayers.Projection('EPSG:' + from_prj), map.getProjection()), icon);
            marker.id = id;
            arrayMarks.push(marker);
            // marker.events.register("click", marker, function () {
            // });

            // var divTooltip='<div style="align-content: center;text-align:center;width:200px">';
            // divTooltip+='<div class="row" style="text-align: center">';
            // divTooltip+='<div class="col-md-12" style="font-size: large">'+title+'</div>';
            // divTooltip+='</div>';
            // divTooltip+='<hr style="margin: 5px;padding: 0">';
            // divTooltip+='<div class="row" style="text-align: right">';
            // divTooltip+='<div class="col-md-6"><img src="assets_mehman/Uploads/MehmanItem/'+id+'/index.jpg" class="img-responsive img-rounded" style="width:100px;height:70px" /></div>';
            // divTooltip+='<div class="col-md-6">';
            // divTooltip+=' <div  style="font-size: x-small">'+address+'</div>';
            // divTooltip+=' <div style="font-size: x-small">'+service+'</div>';
            // // divTooltip+=' <div style="font-size: x-small"><ul class="list-inline" style="margin-top: 0"><li style="color: white;background-color: red;"><strong style="font-size: medium">'+discount+' %</strong>تخفیف</li></ul></div>';
            // divTooltip+='</div>';
            // divTooltip+='</div>';


            //here add mouseover event
            // marker.events.register('mouseover', marker, function(evt) {
            // $('#map').css( 'cursor', 'pointer' );
            // popup = new OpenLayers.Popup.FramedCloud("Popup",
            //     new OpenLayers.LonLat(lon,lat).transform(new OpenLayers.Projection("EPSG:4326"),map.getProjectionObject()),
            //     null,
            //     divTooltip,
            //     null,
            //     false);
            // map.addPopup(popup);
            // });

            // marker.events.register('mouseout', marker, function(evt) {
            //     $('#map').css( 'cursor', 'default' );
            //
            //     popup.hide();
            // });

            markers.addMarker(marker);
        }

        function loadMap() {
            var lon = 50.01697
            var lat = 36.29433

            initmap('position', 14, lon, lat);
            markers = new OpenLayers.Layer.Markers("بامیز");
            map.addLayer(markers);


            var id = 3
            var address = "قزوین/قزوین";
            var fullname = "پیتزا پل";
            var service = "پیتزا پل قبل از اینکه خوشمزه باشه سالمه";
            load_marker(id, lon, lat, 4326, fullname, service, address, "point", 0, 0, 0, 0);
        }

        loadMap();

        onLoad();

        $("#btn_check_reserve").on("click", function (event) {
            var date = $("#date").val();
            var time = $("#time").val();
            var chair_no = $("#chain_no").val();
            var guest_count = $("#guest_count").val();

            let formDataa = new FormData();
            formDataa.append('date', date);
            formDataa.append('time', time);
            formDataa.append('chair_no', chair_no);
            formDataa.append('guest_count', guest_count);
            formDataa.append('id_center', 3);

            $.ajax({
                url: "http://bamiz.ir/check_reserve",
                type: 'POST',
                cache: false,
                data: formDataa,
                contentType: false,
                processData: false,
                headers: {
                    'X-CSRF-TOKEN': $("#csrf-token").attr('content')
                },
                beforeSend: function () {
                    // $("#waitingLink").click();
                    // ShowWaiting("بارگذاری مراکز میزبان");
                },
                success: function (result) {
                    if (!result.error) {
                        $("#reserve_form").submit();
                    } else {
                        alert(result.message);
                        // ShowMessage(result.message, result.type);
                    }
                },
                complete: function () {
                    // CloseWaiting();
                },
                error: function () {
                    ShowMessage('خطای ناشتاخته', '« صفحه را تجدید (بازنشانی) کرده و مجددا تلاش نمایید. »', 'error');
                }
            });
        });

    </script>
@endpush

@push('CSS')

@endpush
