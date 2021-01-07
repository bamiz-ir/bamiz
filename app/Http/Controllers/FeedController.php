<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Laravelium\Feed\Feed;

class FeedController extends Controller
{
    public function articles()
    {
        $feed = app()->make('feed');

        $feed->setCache(60, 'bamiz.feed.articles');

        if (!$feed->isCached())
        {
            $articles = Article::query()->where('status' , 1)->latest()->take(10)->get();
            foreach ($articles as $a)
            {
                $feed->pubdate = $a->created_at;
                $feed->add($a->title, $a->user->username, URL::to("/articles/{$a->slug}"), $a->created_at, strip_tags($a->short_text), strip_tags($a->body));
            }
        }

        return $feed->render('atom');
    }
}
