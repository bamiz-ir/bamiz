<?php


namespace App\Http\Controllers\traits;


use App\Models\Center;
use App\Models\Chair;
use App\Models\Option;
use App\Models\Product;
use App\Models\Reserve;
use App\Models\Setting;
use App\Models\WorkTime;
use Illuminate\Validation\ValidationException;

trait ReserveTrait
{
    private function ShowChairs()
    {
        $this->chairs = Chair::query()->where('center_id' , $this->center_id)->get()->toArray();

        $reserved_chairs = Reserve::query()->where('center_id' , $this->center_id)->get();

        foreach ($reserved_chairs as $r_ch)
        {
            if (strtotime($r_ch->date) == strtotime($this->date) && $r_ch->time == $this->time)
            {
                foreach ($this->chairs as $key => $current)
                {
                    if ($r_ch->chair_id == $current['id'] && $current['id'] != $this->chair_id)
                    {
                        unset($this->chairs[$key]);
                    }
                }
            }
        }
    }

    private function SetTimesAndProductsAndOptions()
    {
        $this->products = Product::query()->where('center_id' , $this->center_id)->where('is_remove' , 0)->get();
        $this->options = Option::query()->where('center_id' , $this->center_id)->where('is_remove' , 0)->get();

        try {
            $this->times = [];
            $work_time = WorkTime::query()->where('center_id' , $this->center_id)->first();
            for ($i = $work_time->fromHour ; $i <= $work_time->toHour ; $i++)
            {
                $this->times[$i] = $i;
            }

        }
        catch (\Exception $exception)
        {
            session()->flash('center' , 'مرکزی که انتخاب کردید وجود ندارد و یا زمان کاری برای آن تعریف نشده است!');
        }
    }

    private static function Check_Exist($request , $id='')
    {
        if ($request->price != Setting::getPriceFromSettings())
        {
            throw ValidationException::withMessages(['price' => 'قیمت رزرو از قبل تعین شده است و نمیتوان آن را تغییر داد.']);
        }

        $result = Reserve::query()->where(function ($query) use($request) {
            return $query->where('time' , $request->time)
                ->where('center_id' , $request->center_id)
                ->where('date' , $request->date);
        })->first();

        if ($result && $result->id != $id)
        {
            if ($request->chair_id == $result['id']) {
                throw ValidationException::withMessages(['time' => 'این میزی که انتخاب کرده اید در این زمان قبلا رزرو شده است.']);
            }
        }

        $work_time = WorkTime::query()->where('center_id' , $request->center_id)->first();
        if ($request->time < $work_time->fromHour || $request->time > $work_time->toHour)
        {
            throw ValidationException::withMessages(['time' => 'این زمانی که شما انتخاب کرده اید در محدوده کاری این کافه رستوران نیست و تعطیل است.']);
        }
    }

}
