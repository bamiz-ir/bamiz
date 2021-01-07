<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use App\Models\Center;
use App\Models\City;
use App\Models\Option;
use App\Models\Product;
use App\Models\State;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

class SiteMapController extends Controller
{
    private $sitemap;

    private function InitSiteMap($name)
    {
        $this->sitemap = app()->make('sitemap');
        $this->sitemap->setCache('bamiz.sitemap' . $name, 60);

        return $this->sitemap->isCached();
    }
    ////////////////////////////////////////////////////////////////
    public function index()
    {
        $this->InitSiteMap('');

        if (!$this->sitemap->isCached())
        {
            $this->sitemap->add(URL::to('/'), Carbon::now() , '0.5', 'daily');
        }

        return $this->sitemap->render();
    }

    public function states()
    {
        if (!$this->InitSiteMap('states'))
        {
            $states = State::query()->latest()->get();
            foreach ($states as $s)
            {
                $this->sitemap->add(URL::to("/states/{$s->slug}") , $s->created_at , '0.9' , 'weekly');
            }
        }

        return $this->sitemap->render();
    }

    public function cities()
    {
        if (!$this->InitSiteMap('cities'))
        {
            $cities = City::query()->latest()->get();
            foreach ($cities as $c)
            {
                $this->sitemap->add(URL::to("/cities/{$c->slug}") , $c->created_at , '0.9' , 'weekly');
            }
        }

        return $this->sitemap->render();
    }

    public function articles()
    {
        if (!$this->InitSiteMap('articles'))
        {
            $articles = Article::query()->where('status' , 1)->latest()->get();
            foreach ($articles as $a)
            {
                $this->sitemap->add(URL::to("/articles/{$a->slug}") , $a->created_at , '0.9' , 'weekly');
            }
        }

        return $this->sitemap->render();
    }

    public function centers()
    {
        if (!$this->InitSiteMap('centers'))
        {
            $centers = Center::query()->where('is_remove' , 0)->latest()->get();
            foreach ($centers as $c)
            {
                $this->sitemap->add(URL::to("/centers/{$c->slug}") , $c->created_at , '0.9' , 'weekly');
            }
        }

        return $this->sitemap->render();
    }

    public function categories()
    {
        if (!$this->InitSiteMap('categories'))
        {
            $categories = Category::query()->where('is_remove' , 0)->latest()->get();
            foreach ($categories as $c)
            {
                $this->sitemap->add(URL::to("/categories/{$c->slug}") , $c->created_at , '0.9' , 'weekly');
            }
        }

        return $this->sitemap->render();
    }

    public function products()
    {
        if (!$this->InitSiteMap('products'))
        {
            $products = Product::query()->where('is_remove' , 0)->get();
            foreach ($products as $p)
            {
                $this->sitemap->add(URL::to("/products/{$p->slug}"), $p->created_at, '0.9', 'weekly');
            }
        }

        return $this->sitemap->render();
    }

    public function options()
    {
        if (!$this->InitSiteMap('options'))
        {
            $options = Option::query()->where('is_remove' , 0)->get();
            foreach ($options as $o)
            {
                $this->sitemap->add(URL::to("/options/{$o->slug}"), $o->created_at, '0.9', 'weekly');
            }
        }

        return $this->sitemap->render();
    }
}
