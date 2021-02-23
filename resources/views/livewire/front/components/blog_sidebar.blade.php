<div class="widget" style="margin-top: 50px !important;">
    <div class="widget-title">
        <h4>محبوب ترین مقالات</h4>
    </div>
    <ul class="comments-list">
        @foreach($articles->get()->sortByDesc('LikeCount') as $a)
            <li>
                <div class="alignleft">
                    <a href="/blogs/{{ $a->slug }}"><img src="{{ $a->images['images']['300'] }}" alt="{{ $a->title }}"></a>
                </div>
                <small>{{ \Carbon\Carbon::parse($a->created_at)->diffForHumans() }}</small>
                <h3><a href="/blogs/{{ $a->slug }}" title="">{{ \Illuminate\Support\Str::limit($a->short_text , 20) }}</a></h3>
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
            <li><a href="/centers/blogs/{{ $b_c->slug }}"> {{ $b_c->name }} <span>({{ $b_c->articles()->count() }})</span></a></li>
        @endforeach
    </ul>
</div>
