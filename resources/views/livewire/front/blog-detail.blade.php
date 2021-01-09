<div>
    <section class="hero_in general start_bg_zoom">
        <div class="wrapper">
            <div class="container">
                <h1 class="fadeInUp animated"><span></span>جزییات مقاله بامیز</h1>
            </div>
        </div>
    </section>
    <!--/hero_in-->

    <div class="container margin_60_35">
        <div class="row">
            <div class="col-lg-9">
                <div class="bloglist singlepost">
                    <p><img alt="" class="img-fluid" src="{{ $blog->images['images']['original'] }}"></p>
                    <h1>{{ $blog->title }}</h1>
                    <div class="postmeta">
                        <ul>
                            <li>
                                <i class="fa fa-calendar"></i> {{ \Carbon\Carbon::parse($blog->created_at)->diffForHumans() }}
                            </li>
                            <li><i class="fa fa-user"></i> {{ $blog->user->username }}</li>
                            <li><i class="fa fa-comment"></i> تعداد نظرات ({{ $blog->CommentCount }})</li>
                        </ul>
                    </div>
                    <!-- /post meta -->
                    <div class="post-content">
                        <div class="dropcaps">
                            <p>{{ $blog->short_text }}</p>
                        </div>

                        <p>{!! $blog->body !!}</p>
                    </div>
                    <!-- /post -->
                </div>
                <!-- /single-post -->

                <div id="comments">
                    <h5>نظرات</h5>
                    <ul>
                        @if(!$comments->isEmpty())
                            @foreach($comments as $c)
                                <li>
                                    <div class="avatar col-md-3">
                                        <img
                                            src="{{ $c->user->profile_path ?  \Illuminate\Support\Facades\Storage::url($c->user->profile_path)  :  "https://www.hardiagedcare.com.au/wp-content/uploads/2019/02/default-avatar-profile-icon-vector-18942381.jpg" }}"
                                            alt="{{ $c->user->username }}">
                                    </div>
                                    <div class="comment_right col-md-9 clearfix">
                                        <div class="comment_info">
                                              {{ \Carbon\Carbon::instance($c->created_at)->diffForHumans() }}  <span> |</span>توسط<span style="color: green">{{ $c->user->username }}</span>
                                        </div>
                                        <p>
                                            {{ $c->body }}
                                        </p>
                                    </div>
                                </li>
                            @endforeach

                        @else
                            <h5>هنوز نظری وجود ندارد.</h5>
                        @endif
                    </ul>
                </div>

                <hr>

                <h5>شما نظری بگذارید</h5>

                @if($errors->any())

                    <div class="alert alert-danger text-center">

                        @foreach($errors->all() as $e)
                            {{ $e }}<br>
                        @endforeach

                    </div>

                @endif

                <form wire:submit.prevent="SubmitNewComment()">
                    <div class="form-group">
                        <input wire:model.defer="title" required type="text" name="title" class="form-control" placeholder="عنوان*">
                    </div>
                    <div class="form-group">
                        <select wire:model.defer="star" class="form-control" name="score">
                            <option value="" selected>امتیاز نمیدم (اختیاری)</option>
                            <option value="1">1 (ضعیف)</option>
                            <option value="2">2</option>
                            <option value="3">3 (متوسط)</option>
                            <option value="4">4</option>
                            <option value="5">5 (عالی</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <textarea wire:model.defer="body" required class="form-control" name="comments" id="comments2" rows="6"
                                  placeholder="متن نطر*"></textarea>
                    </div>

                    @if(session()->has('comment_add'))
                        <div class="mt-3 text-center text-success" style="font-size: 14px !important;">{{ session()->get('comment_add') }}</div>
                    @endif

                    <div class="form-group">
                        <button type="submit" id="submit2" class="btn_1 add_bottom_30"> ثبت نظر </button>
                    </div>
                </form>
            </div>
            <!-- /col -->

            <aside class="col-lg-3">
                <div class="widget">
                    <div class="widget-title">
                        <h4>محبوب ترین مقالات</h4>
                    </div>
                    <ul class="comments-list">
                        @foreach($articles as $a)
                            <li>
                                <div class="alignleft">
                                    <a href="/blogs/{{ $a->slug }}"><img src="{{ $a->images['images']['300'] }}"
                                                                         alt="{{ $a->title }}"></a>
                                </div>
                                <small>{{ \Carbon\Carbon::parse($a->created_at)->diffForHumans() }}</small>
                                <h3><a href="/blogs/{{ $a->slug }}"
                                       title="">{{ \Illuminate\Support\Str::limit($a->short_text , 20) }}</a></h3>
                            </li>
                        @endforeach

                    </ul>
                </div>
                <!-- /widget -->
                <div class="widget">
                    <div class="widget-title">
                        <h4>مراکز (مقالات)</h4>
                    </div>
                    <ul class="cats">
                        @foreach($best_centers as $b_c)
                            <li><a href="/centers/blogs/{{ $b_c->slug }}"> {{ $b_c->name }} <span>({{ $b_c->articles()->count() }})</span></a>
                            </li>
                        @endforeach
                    </ul>
                </div>
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
