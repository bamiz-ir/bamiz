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

        <div class="container margin_60_35">
            <div class="wrapper-grid">
                <div class="row">
                    @foreach($centers as $c)
                        <div class="col-xl-4 col-lg-6 col-md-6">
                            <div class="box_grid">
                                <figure>

                                    @if(auth()->check())
                                        @if($c->wish_lists->where('user_id' , auth()->user()->id)->isEmpty())
                                            <a wire:click="AddToWishList('{{ $c->slug }}')" class="wish_bt"></a>
                                        @else
                                            <a wire:click="DeleteFromWishList('{{ $c->slug }}')" class="wish_bt liked"></a>
                                        @endif
                                    @endif

                                    <a href="/centers/{{ $c->slug }}"><img src="{{ $c->images['images']['original'] }}" class="img-fluid" alt="" width="800" height="533"><div class="read_more"><span>مشاهده</span></div></a>
                                    <small>{{ $c->state->name }}</small>
                                </figure>
                                <div class="wrapper">
                                    <h3><a href="/centers/{{ $c->slug }}">{{ $c->name }}</a></h3>
                                    <p>{{ $c->description }}</p>
                                </div>
                                <ul>
                                    <li><i class="ti-eye"></i> {{ $c->viewCount }} بازدید</li>
                                    <li><div class="score"><strong>{{ $c->category->title }}</strong></div></li>
                                </ul>
                            </div>
                        </div>
                    @endforeach
                </div>
                <!-- /row -->
            </div>
            <!-- /isotope-wrapper -->

            {!! $centers->links() !!}

            <p class="text-center"><a href="#0" class="btn_1 rounded add_top_30">اینجا باید پیجینیت قرار بگیرد</a></p>

        </div>
        <!-- /container -->
    </main>
</div>
