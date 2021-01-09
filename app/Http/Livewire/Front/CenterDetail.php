<?php

namespace App\Http\Livewire\Front;

use App\Http\Controllers\traits\CommentTrait;
use App\Http\Controllers\traits\ReserveTrait;
use App\Models\Center;
use App\Models\Chair;
use App\Models\Comment;
use App\Models\Setting;
use App\Models\WishList;
use App\Models\WorkTime;
use Livewire\Component;
use phpDocumentor\Reflection\Types\Self_;
use function PHPUnit\Framework\isEmpty;

class CenterDetail extends Component
{
    use ReserveTrait;
    use CommentTrait;

    public $center;
    public $price;
    public $time;
    public $date;
    public $guest_count;
    public $center_id;
    public $chair_id = [];

    public $is_Added_To_WishList = true;

    public $comments;

    public $title;
    public $body;
    public $star = 0;


    public $chairs = [];
    public $work_days = [];
    public $times = [];

    private function ValidateCommentData()
    {
        $this->validate([
            'title' => 'required|string|max:50',
            'body' => 'required|string|max:300',
            'star' => 'numeric|max:5',
        ]);
    }

    public function SubmitNewComment()
    {
        self::CheckBadWords($this->title , $this->body);
        $this->ValidateCommentData();

        $this->star = $this->star !=0 ?  $this->star : null;

        auth()->user()->comments()->create([
            'title' => $this->title,
            'body' => $this->body,
            'commentable_id' => $this->center_id,
            'status' => false,
            'score' => $this->star,
            'commentable_type' => get_class($this->center)
        ]);

        $this->title = $this->body = null;
        $this->star = 0;

        session()->flash('comment_add' , 'نظر شما کاربر عزیز با موفقیت ثبت شد و پس تایید مدیر در سایت قرار میگیرد.');
    }

    public function AddToWishList()
    {
        auth()->user()->wish_lists()->create([
            'wish_listable_id' => $this->center_id,
            'wish_listable_type' => get_class($this->center),
        ]);

        $this->is_Added_To_WishList = true;
        session()->flash('wishlist_status' , 'با موفقیت به علاقه مندی ها افزوده شد');
    }

    public function DeleteFromWishList()
    {
        auth()->user()->wish_lists()
            ->where('wish_listable_id' , $this->center->id)->where('wish_listable_type' , get_class($this->center))->delete();

        $this->is_Added_To_WishList = false;
        session()->flash('wishlist_status' , 'با موفقیت از علاقه مندی ها حذف شد');
    }

    private function getTimes()
    {
        $work_time = $this->center->work_time;
        for ($i = $work_time->fromHour ; $i <= $work_time->toHour ; $i++)
        {
            $this->times[$i] = $i;
        }
    }

    private function getData()
    {
        $this->comments = Comment::where(function ($query){
            return $query->where('status' , 1)
                ->where('commentable_id' , $this->center->id)
                ->where('commentable_type' , get_class($this->center));
        })->get();
        $this->work_days = explode(' , '  , $this->center->work_time->week_days);
        $this->getTimes();
    }

    public function updated()
    {
        if (isset($this->time) && isset($this->date) && isset($this->center->id))
        {
            $this->ShowChairs();
        }
    }

    public function mount()
    {
        $this->center = Center::where('slug' , request('slug'))->firstOrFail();
        $this->center->update(['viewCount' => $this->center->viewCount += 1]);

        if (auth()->check() && $this->center->wish_lists->where('user_id' , auth()->user()->id)->isEmpty())
        {
            $this->is_Added_To_WishList = false;
        }

        $this->price = Setting::getPriceFromSettings();
        $this->center_id = $this->center->id;
    }

    public function render()
    {
        $this->getData();
        return view('livewire.front.center-detail');
    }
}
