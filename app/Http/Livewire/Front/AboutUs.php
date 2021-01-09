<?php

namespace App\Http\Livewire\Front;

use App\Http\Controllers\traits\PageStaticValues;
use App\Models\Center;
use Livewire\Component;

class AboutUs extends Component
{
    use PageStaticValues;

    public function render()
    {
        $about_us_title = $this->CreateOrShowSettingData('about_us_title' , 'بامیز سایت رزرو آنلاین غذا و کافه و رستوران');
        $about_us_text = $this->CreateOrShowSettingData('about_us_text' , 'This about us Page of bamiz restaurant handling website...');
        $default_site_admin = $this->CreateOrShowSettingData('default_site_admin' , 'Bamiz Admin');

        $centers = Center::query()->where('is_remove' , 0)
            ->whereHas('work_time' , function ($query){
                return $query->where('center_id' , '!=' , null);
            })->latest()->get();

        return view('livewire.front.about-us'
            , [
                'about_us_title' => $about_us_title,
                'about_us_text' => $about_us_text,
                'default_site_admin'  => $default_site_admin,
                'centers' => $centers
            ]
        );
    }
}
