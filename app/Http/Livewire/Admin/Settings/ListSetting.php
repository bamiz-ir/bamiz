<?php

namespace App\Http\Livewire\Admin\Settings;

use App\Models\Setting;
use Livewire\Component;
use Livewire\WithPagination;

class ListSetting extends Component
{
    use WithPagination;

    public $titlePage = '';
    public $pagination = 5;
    public $search = '';

    protected $settings = [];

    public function Searching()
    {
        return Setting::where('key' , 'like' , '%' . $this->search . '%')
            ->orWhere('value' , 'like' , '%' . $this->search . '%')->latest()->paginate($this->pagination);
    }

    public function destroy(Setting $setting)
    {
        $setting->delete();
    }

    private function selectSettings(): void
    {
        $this->settings = $this->search != '' ? $this->Searching() : Setting::latest()->paginate($this->pagination);
    }

    public function render()
    {
        $this->selectSettings();
        return view('livewire.admin.settings.list-setting' , ['settings' => $this->settings]);
    }
}
