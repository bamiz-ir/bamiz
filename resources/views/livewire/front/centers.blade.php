<div>
    <section class="hero_in restaurants start_bg_zoom">
        <div class="wrapper">
            <div class="container">
                <h1 class="fadeInUp animated"><span></span>Paris Eat &amp; Drink list</h1>
            </div>
        </div>
    </section>
    <!--/hero_in-->

    <div class="collapse" id="collapseMap">
        <div id="map" class="map"></div>
    </div>
    <!-- End Map -->

    <div class="container margin_60_35">
        <div class="col-lg-12">
            <div class="row no-gutters custom-search-input-2 inner">
                <div class="col-lg-4">
                    <div class="form-group">
                        <input wire:model.defer="search_word" class="form-control" type="text" placeholder="دنبال چه چیزی میگردید...؟">
                        <i class="icon_search"></i>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="form-group">
                        <input wire:model.defer="search_city_or_state" class="form-control" type="text" placeholder="فیلتر استان/شهر">
                        <i class="icon_pin_alt"></i>
                    </div>
                </div>

                @php $categories = \App\Models\Category::query()->where('is_remove' , 0)->get() @endphp

                <div class="col-lg-3">
                    <select wire:model.defer="search_category" class="wide">
                        <option value="0">همه دسته بندی ها</option>
                        @foreach($categories as $c)
                                <option value="{{ $c->id }}">{{ $c->title }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-lg-2">
                    <input wire:click="SearchAndFilter()" type="submit" class="btn_search" value="جستجو">
                </div>
            </div>
            <!-- /row -->
        </div>
        <!-- /custom-search-input-2 -->
        <div class="isotope-wrapper">

            @foreach($centers as $c)

                <div class="box_list isotope-item popular">
                    <div class="row no-gutters">
                        <div class="col-lg-5"box_list isotope-item popular>
                            <figure>
                                <a href="/centers/{{ $c->slug }}"><img src="{{ $c->images['images']['original'] }}" class="img-fluid" alt="" width="800" height="533"><div class="read_more"><span>Read more</span></div></a>
                            </figure>
                        </div>
                        <div class="col-lg-7">
                            <div class="wrapper">

                                @if(auth()->check())
                                    @if($c->wish_lists->where('user_id' , auth()->user()->id)->isEmpty())
                                        <a wire:click="AddToWishList('{{ $c->slug }}')" class="wish_bt"></a>
                                    @else
                                        <a wire:click="DeleteFromWishList('{{ $c->slug }}')" class="wish_bt liked"></a>
                                    @endif
                                @endif

                                <h3><a href="/centers/{{ $c->slug }}"> {{ $c->name }} </a></h3>
                                <p>{{ $c->description }}</p>
                            </div>
                            <ul>
                                <li><i class="ti-eye"></i> {{ $c->viewCount }} بازدید </li>
                                <li><div class="score"><strong>{{ $c->state->name }}</strong></div></li>
                            </ul>
                        </div>
                    </div>
                </div>

            @endforeach

        </div>
        <!-- /isotope-wrapper -->

        <p class="text-center"><a href="#0" class="btn_1 rounded">اینجا باید بیجینیت قرار بگیرد</a></p>

    </div>
</div>
