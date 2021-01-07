<?php

namespace App\Http\Livewire\Admin\Chairs;

use App\Models\Center;
use App\Models\Chair;
use Illuminate\Validation\ValidationException;
use Livewire\Component;

class FormChair extends Component
{
    public $titlePage = '';
    public $type = '';

    public $chair_id;
    public $number;
    public $center_id;
    public $chair;

    private function validation()
    {
        return $this->validate([
            'number' => 'required|numeric',
            'center_id' => 'required|numeric|exists:centers,id',
        ]);
    }

    private function Check_Exist()
    {
        $checkNumberChair = Chair::query()
            ->where('number' , $this->number)
            ->where('center_id' , $this->center_id)
            ->first();

        if ($checkNumberChair)
        {
            throw ValidationException::withMessages(['number' => 'این شماره میز برای این مرکز قبلا ثبت شده است.']);
        }
    }

    public function store()
    {
        $this->Check_Exist();

        $data = $this->validation();
        $chair = Chair::create($data);

        \Request::session()->flash('message', "میز ({$chair->number}|{$chair->center->name}) با موفقیت ثبت شد. ");
        return redirect(route('chairs.index'));
    }

    public function edit(Chair $chair)
    {
        ($this->number != $chair->number || $this->center_id != $chair->center_id)  &&  $this->Check_Exist();

        $data = $this->validation();
        $chair->update($data);

        \Request::session()->flash('message', "میز ({$this->chair->number}|{$this->chair->center->name}) با موفقیت ویرایش شد. ");
        return redirect(route('chairs.index'));
    }

    private function getDataForEdit()
    {
        $this->chair_id = $this->chair->id;
        $this->number = $this->chair->number;
        $this->center_id = $this->chair->center_id;
    }

    public function mount()
    {
        $this->type == 'edit' && $this->getDataForEdit();
    }

    public function render()
    {
        $centers = Center::getCenters();
        return view('livewire.admin.chairs.form-chair' , ['centers' => $centers]);
    }
}
