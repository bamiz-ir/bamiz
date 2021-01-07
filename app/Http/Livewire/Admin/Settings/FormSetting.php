<?php

namespace App\Http\Livewire\Admin\Settings;

use App\Models\Setting;
use Livewire\Component;

class FormSetting extends Component
{
    public $titlePage = '';
    public $type = '';

    public $setting_id;
    public $setting;
    public $key , $value;

    public function getDataForEdit()
    {
        $this->setting_id = $this->setting->id;
        $this->key = $this->setting->key;
        $this->value = $this->setting->value;
    }

    private function validation()
    {
        return $this->validate([
            'key' => 'required',
            'value' => 'required',
        ]);
    }

    public function store()
    {
        $data = $this->validation();

        Setting::create($data);

        \Request::session()->flash('message', "تنظیمات ($this->key) با موفقیت ثبت شد. ");
        return redirect(route('settings.index'));
    }

    public function edit(Setting $setting)
    {
        $data = $this->validation();

        $setting->update($data);

        \Request::session()->flash('message', "تنظیمات ($this->key) با موفقیت ویرایش شد. ");
        return redirect(route('settings.index'));
    }

    public function mount()
    {
        $this->type == 'edit' && $this->getDataForEdit();
    }

    public function render()
    {
        return view('livewire.admin.settings.form-setting');
    }
}
