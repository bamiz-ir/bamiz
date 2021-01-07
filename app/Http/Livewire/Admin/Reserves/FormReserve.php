<?php

namespace App\Http\Livewire\Admin\Reserves;

use App\Http\Controllers\traits\ReserveTrait;
use App\Models\Center;
use App\Models\Chair;
use App\Models\ChairReserve;
use App\Models\Option;
use App\Models\Product;
use App\Models\Reserve;
use App\Models\Setting;
use App\Models\User;
use App\Models\WorkTime;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Livewire\Component;

class FormReserve extends Component
{
    use ReserveTrait;

    public $titlePage = '';
    public $type;

    public $reserve;

    public $times = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24];
    public $date;
    public $time;
    public $chairs = [];
    public $products = [];
    public $options = [];

    public $reserve_id;
    public $center_id;
    public $user_id;
    public $guest_count;
    public $price;
    public $chair_id;
    public $product_id;
    public $option_id;

    private function getDataForEdit()
    {
        $this->reserve_id = $this->reserve->id;
        $this->date = $this->reserve->date;
        $this->time = $this->reserve->time;
        $this->center_id = $this->reserve->center_id;
        $this->user_id = $this->reserve->user_id;
        $this->guest_count = $this->reserve->guest_count;
        $this->chair_id = $this->reserve->chair ?  $this->reserve->chair->id : null;
        $this->option_id = $this->reserve->pluckOptions();
        $this->product_id = $this->reserve->pluckProducts();

        $this->chairs = Chair::query()->where('center_id', $this->center_id)->get()->toArray();
        $this->SetTimesAndProductsAndOptions();
        $this->ShowChairs();
    }

    public function updated($propertyName)
    {
        ($propertyName == 'center_id') && $this->SetTimesAndProductsAndOptions();

        if (isset($this->time) && isset($this->date) && isset($this->center_id))
        {
            $this->ShowChairs();
        }
    }

    public function mount()
    {
        $this->type == 'edit' && $this->getDataForEdit();
    }

    private function selectData(): array
    {
        $centers = Center::getCenters();
        $users = User::query()->where('block_status', 0)->get();
        return array($centers, $users);
    }

    public function render()
    {
        list($centers, $users) = $this->selectData();

        $this->price = Setting::getPriceFromSettings();

        return view('livewire.admin.reserves.form-reserve', ['centers' => $centers, 'users' => $users]);
    }
}
