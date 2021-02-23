<div>
    <section class="hero_in general">
        <div class="wrapper">
            <div class="container">
                <h1 class="fadeInUp"><span></span>مقالات بامیز</h1>
            </div>
        </div>
    </section>
    <!--/hero_in-->

    <div class="container margin_60_35">
        <div class="row">
            <div class="col-lg-9">

                @foreach($articles->latest()->paginate($this->pagination) as $a)

                    <article class="blog wow fadeIn">
                        <div class="row no-gutters">
                            <div class="col-lg-7">
                                <figure>
                                    <a href="/blogs/{{ $a->slug }}"><img src="{{ $a->images['images']['original'] }}" alt="{{ $a->title }}">
                                        <div class="preview"><span>مشاهده</span></div>
                                    </a>
                                </figure>
                            </div>
                            <div class="col-lg-5">
                                <div class="post_info">
                                    <small>{{ \Carbon\Carbon::parse($a->created_at)->diffForHumans() }}</small>
                                    <br><br>
                                    <h3><a href="/blogs/{{ $a->slug }}">{{ $a->title }}</a></h3>
                                    <p>{{ $a->short_text }}</p>
                                    <ul>
                                        <li>
                                            <div class="thumb">
                                                <img
                                                    src="{{ $a->user->profile_path ?  \Illuminate\Support\Facades\Storage::url($a->user->profile_path) : "https://www.hardiagedcare.com.au/wp-content/uploads/2019/02/default-avatar-profile-icon-vector-18942381.jpg" }}"
                                                    alt="">
                                            </div> {{ $a->user->username }}
                                        </li>
                                        <li>
                                            <i class="fa fa-eye"></i> {{ $a->ViewCount }}
                                            &nbsp;
                                            <i class="fa fa-eye"></i> {{ $a->LikeCount }}
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </article>
                    <!-- /article -->

                @endforeach

                {!! $articles->latest()->paginate($this->pagination)->links() !!}

            </div>
            <!-- /col -->

            <aside class="col-lg-3">
                <div class="widget">
                    <form wire:submit.prevent="Searching()">
                        <div class="form-group">
                            <input wire:model.defer="search" type="text" name="search" id="search" class="form-control"
                                   style="margin-bottom: -32px !important;    padding-left: 109px !important;"
                                   placeholder="جستجو...">
                            <button type="submit" id="submit" class="btn_1 badge-pill "
                                    style="margin-top: -10px !important;float: left;height: 41px;z-index: 1;position: relative; ">
                                جستجو
                            </button>
                        </div>
                    </form>
                </div>
                <!-- /widget -->

                @include('livewire.front.components.blog_sidebar')

            </aside>
            <!-- /aside -->
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>

@push('CSS')
    <link href="/front/css/blog.css" rel="stylesheet">
    <link href="/front/css/blog-rtl.css" rel="stylesheet">
    <!-- YOUR CUSTOM CSS -->
    <link href="/front/css/custom.css" rel="stylesheet">
@endpush
