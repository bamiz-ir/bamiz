<?php

namespace App\Http\Livewire\Front;

use App\Http\Controllers\traits\ReserveTrait;
use App\Models\Center;
use App\Models\Chair;
use App\Models\Comment;
use App\Models\Setting;
use App\Models\WorkTime;
use Livewire\Component;
use function PHPUnit\Framework\isEmpty;

class CenterDetail extends Component
{
    use ReserveTrait;

    public $center;
    public $price;
    public $time;
    public $date;
    public $guest_count;
    public $center_id;
    public $chair_id = [];

    public $comments;

    public $chairs = [];
    public $work_days = [];
    public $times = [];

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
        $this->comments = Comment::query()->where(function ($query){
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
        $this->center = Center::query()->where('slug' , request('slug'))->firstOrFail();
        $this->price = Setting::getPriceFromSettings();
        $this->center_id = $this->center->id;
    }

    public function render()
    {
        $this->getData();
        return view('livewire.front.center-detail');
    }
}
