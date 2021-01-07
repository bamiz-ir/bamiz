<?php

namespace App\Http\Livewire\Admin\Caches;

use App\Models\Option;
use App\Models\User;
use Illuminate\Support\Facades\Cache;
use Livewire\Component;

class DeleteCache extends Component
{
    public $key = '';
    public $status = false;

    public function destroy($key)
    {
        \cache()->delete($key);
        \Request::session()->flash('message', "کش ($key) با موفقیت حذف شد. ");
        $this->status = false;
    }

    public function DestroyAll()
    {
        \cache()->flush();
        \Request::session()->flash('message', "همه کش ها با موفقیت حذف شدند");
    }

    public function updated($propertyName)
    {
        $propertyName == 'key'
                &&  \cache()->has($this->key)  ?  session()->flash('hasKey', $this->status = true)  :  $this->status = false;
    }

    public function render()
    {
        return view('livewire.admin.caches.delete-cache');
    }
}
