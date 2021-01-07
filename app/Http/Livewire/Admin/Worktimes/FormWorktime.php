<?php

namespace App\Http\Livewire\Admin\Worktimes;

use App\Models\Center;
use App\Models\WorkTime;
use Livewire\Component;

class FormWorktime extends Component
{
    public $titlePage = '';
    public $type = '';

    public $workTime;

    public $worktime_id;
    public $center_id;
    public $week_days;
    public $fromHour;
    public $toHour;

    private function getDataForEdit()
    {
        $this->worktime_id = $this->workTime->id;
        $this->center_id = $this->workTime->center_id;
        $this->week_days = explode(' , ' , $this->workTime->week_days);
        $this->fromHour = $this->workTime->fromHour;
        $this->toHour = $this->workTime->toHour;
    }

    public function mount()
    {
        $this->type  == 'edit' && $this->getDataForEdit();
    }

    public function render()
    {
        $centers = Center::getCenters();
        return view('livewire.admin.worktimes.form-worktime' , ['centers' => $centers]);
    }
}
