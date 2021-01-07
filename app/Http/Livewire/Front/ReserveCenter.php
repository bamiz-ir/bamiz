<?php

namespace App\Http\Livewire\Front;

use App\Http\Controllers\PaymentController;
use App\Models\Center;
use App\Models\Option;
use App\Models\Setting;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Livewire\Component;

class ReserveCenter extends Component
{
    public $data;
    public $center;
    public $options = [];

    public $price;

    public $options_price = 0;

    public function SetNewOption($slug)
    {
        $option = Option::query()->where('slug' , $slug)->firstOrFail();
        array_push($this->options , $option->id);
        $this->options_price += $option->price;
    }

    public function RemoveOption($slug)
    {
        $option = Option::query()->where('slug' , $slug)->firstOrFail();
        if (array_search($option->id , $this->options) !== false)
        {
            $key = array_search($option->id , $this->options);
           $this->options[$key] = null;
        }
        $this->options_price -= $option->price;
    }

    public function mount()
    {
        $this->center = Center::query()->where('slug' , $this->data['slug'])->firstOrFail();
        $this->price = Setting::getPriceFromSettings();
    }

    public function render()
    {
        return view('livewire.front.reserve-center');
    }
}
