<?php

namespace App\Http\Livewire\Admin\OptionReserves;

use App\Models\Center;
use App\Models\Option;
use App\Models\OptionReserve;
use App\Models\Reserve;
use Illuminate\Validation\ValidationException;
use Livewire\Component;

class FormOptionReserve extends Component
{
    public $titlePage = '';
    public $type;

    public $optionReserve;
    public $option_reserve_id;
    public $reserve_id;
    public $option_id;
    public $center_id;

    public $centers = [];
    public $options = [];

    private function validation()
    {
        return $this->validate([
            'reserve_id' => 'required|numeric|exists:reserves,id',
            'center_id' => 'required|numeric|exists:centers,id',
            'option_id.*' => 'required|exists:options,id',
        ], [
            'option_id.*.required' => 'لطفا حداقل یک مورد تشریفات انتخاب کنید.'
        ]);
    }

    public function updated($propertyName)
    {
        if ($propertyName == 'reserve_id')
        {
            $this->centers = Center::query()->whereHas('reserves', function ($query) {
                                return $query->where('id', $this->reserve_id);
                         })->get();
        }

        if ($propertyName == 'center_id')
        {
            $this->options = Option::query()->where('center_id', $this->center_id)
                            ->where('is_remove', 0)->get();
        }
    }

    private function getDataForEdit()
    {
        $this->option_reserve_id = $this->optionReserve->id;
        $this->center_id = $this->optionReserve->reserve->center_id;
        $this->reserve_id = $this->optionReserve->reserve_id;
        $this->option_id = $this->optionReserve->option_id;

        $this->options = Option::query()->where('center_id', $this->center_id)->where('is_remove', 0)->get();
        $this->centers = Center::query()->whereHas('reserves', function ($query) {
            return $query->where('id', $this->reserve_id);
        })->where('is_remove', 0)->get();
    }

    public function store()
    {
        $this->validation();

        $reserve = Reserve::query()->find($this->reserve_id);
        $reserve->options()->sync($this->option_id);

        \Request::session()->flash('message', "تشریفات رزرو مورد نظر با موفقیت ثبت شد. ");
        return redirect(route('option_reserve.index'));
    }

    public function edit(OptionReserve $optionReserve)
    {
        $this->validation();

        $reserve = Reserve::query()->find($this->reserve_id);
        $reserve->options()->sync($this->option_id);

        \Request::session()->flash('message', "تشریفات رزرو مورد نظر با موفقیت ویرایش شد. ");
        return redirect(route('option_reserve.index'));
    }

    public function mount()
    {
        $this->type == 'edit' && $this->getDataForEdit();
    }

    private function selectReserves()
    {
        return Reserve::query()->whereHas('center', function ($query) {
                    return $query->where('is_remove', 0);
                })->get();
    }

    public function render()
    {
        $reserves = $this->selectReserves();
        return view('livewire.admin.option-reserves.form-option-reserve', ['reserves' => $reserves]);
    }
}
