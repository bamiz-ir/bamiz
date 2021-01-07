<?php


namespace App\Http\Controllers\traits;


use App\Models\Setting;

trait PageStaticValues
{
    public $workWithUsText = '';
    public $introduction = '';
    public $year = 0;
    public $phone;
    public $email;
    public $social;
    public $logo;

    public $settings = [];

    private function getSettingsData()
    {
        $this->settings['workwithus'] = Setting::query()->firstOrCreate(['key' => 'workwithus'] , [
            'key' => 'workwithus',
            'value' => 'کافه یا رستوران هایی که تمایل دارند از امکان رزرو آنلاین میز با استفاده از تورمجازی بهره مند شوند بر روی دکمه زیر کلیک کنید تا از شرایط و مفاد همکاری مطلع شوید'
        ]);

        $this->settings['introduction'] = Setting::query()->firstOrCreate(['key' => 'introduction'] , [
            'key' => 'introduction',
            'value' => 'سامانه رزرو میز ، امکانی را در اختیار کاربران قرار می دهد که با استفاده از تورمجازی (تصاویر 360 درجه) در کافه ها و رستوران ها گشت و گذار داشته باشند تا هم با محیط کافه و رستوران ها آشنا شوند و هم بتوانند میز مورد نظر خود را با استفاده از تورمجازی انتخاب و برای تاریخی مشخص رزرو نمایند.'
        ]);

        $this->settings['year'] = Setting::query()->firstOrCreate(['key' => 'year'] , [
            'key' => 'year',
            'value' => '1399'
        ]);

        $this->settings['introduction'] = Setting::query()->firstOrCreate(['key' => 'introduction'] , [
            'key' => 'introduction',
            'value' => 'سامانه رزرو میز ، امکانی را در اختیار کاربران قرار می دهد که با استفاده از تورمجازی (تصاویر 360 درجه) در کافه ها و رستوران ها گشت و گذار داشته باشند تا هم با محیط کافه و رستوران ها آشنا شوند و هم بتوانند میز مورد نظر خود را با استفاده از تورمجازی انتخاب و برای تاریخی مشخص رزرو نمایند.'
        ]);

        $this->settings['year'] = Setting::query()->firstOrCreate(['key' => 'year'] , [
            'key' => 'year',
            'value' => '1399'
        ]);
        $this->settings['email'] = Setting::query()->firstOrCreate(['key' => 'email'] , [
            'key' => 'email',
            'value' => 'bamiz.ir@gmail.com'
        ]);
        $this->settings['phone'] = Setting::query()->firstOrCreate(['key' => 'phone'] , [
            'key' => 'phone',
            'value' => '021-2000000'
        ]);

        $this->settings['instagram'] = Setting::query()->firstOrCreate(['key' => 'instagram'] , [
            'key' => 'instagram',
            'value' => 'https://www.instagram.com/bamiz.ir'
        ]);

        $this->settings['facebook'] = Setting::query()->firstOrCreate(['key' => 'facebook'] , [
            'key' => 'facebook',
            'value' => 'https://www.facebook.com/bamiz.ir'
        ]);

        $this->settings['twitter'] = Setting::query()->firstOrCreate(['key' => 'twitter'] , [
            'key' => 'twitter',
            'value' => 'https://www.twitter.com/bamiz.ir'
        ]);

        $this->settings['logo'] = Setting::query()->firstOrCreate(['key' => 'logo'] ,
            [
                'value' => '/front/img/logo_sticky.svg'
            ]);
    }
}
