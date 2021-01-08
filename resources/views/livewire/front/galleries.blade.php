<div>
    <main>

        <section class="hero_in restaurants start_bg_zoom">
            <div class="wrapper">
                <div class="container">
                </div>
            </div>
        </section>
        <!--/hero_in-->

        <div class="filters_listing sticky_horizontal" style="">
            <div class="container">
                <ul class="clearfix">
                    <li>
                        <div class="switch-field">
                            <input type="radio" id="all" name="listing_filter" value="all" checked="">
                            <label for="all">All</label>
                            <input type="radio" id="popular" name="listing_filter" value="popular">
                            <label for="popular">Popular</label>
                            <input type="radio" id="latest" name="listing_filter" value="latest">
                            <label for="latest">Latest</label>
                        </div>
                    </li>
                </ul>
            </div>
            <!-- /container -->
        </div>
        <!-- /filters -->

        <div class="collapse" id="collapseMap">
            <div id="map" class="map"></div>
        </div>
        <!-- End Map -->

        <div class="margin_60_35"  style="margin: 20px 20px !important;">

                <div class="row">

                    @foreach($galleries as $lg)

                        <div class="col-xl-3 col-lg-6 col-md-6" >
                            <a href="/galleries/{{ $lg->id }}" class="grid_item">
                                <figure>
                                    <div class="score"><strong>{{ $lg->score }}</strong></div>
                                    <img src="{{ $lg->captions[0] }}" class="img-fluid" alt="گالری تصاویر"
                                         style="height:200px;width:400px">
                                    <div class="info">
                                        <h3> ارسالی از کاربر {{ $lg->user->username }} </h3>
                                    </div>
                                </figure>
                            </a>
                        </div>

                    @endforeach

                </div>
                <!-- /row -->
        </div>

        <div class="text-center" style="margin:  0 auto">
            {!! $galleries->links() !!}
        </div>

        <p class="text-center"><a href="#0" class="btn_1 rounded add_top_30">اینجا باید پیجینیت قرار بگیرد</a></p>

        <!-- /container -->
    </main>
</div>
