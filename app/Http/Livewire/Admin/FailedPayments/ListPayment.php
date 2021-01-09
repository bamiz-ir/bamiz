<?php

namespace App\Http\Livewire\Admin\FailedPayments;

use App\Models\Payment;
use Livewire\Component;
use Livewire\WithPagination;

class ListPayment extends Component
{
    use WithPagination;

    public $titlePage = '';
    public $pagination = 5;
    public $search = '';

    protected $payments = [];

    private function Searching()
    {
        return Payment::where(function ($query){
            return $query->whereHas('center' , function ($query){
                return $query->where('name' , 'like' , '%' . $this->search . '%');
            })
                ->OrWhereHas('user' ,  function ($query){
                    return $query->where('username' , 'like' , '%' . $this->search . '%');
                })
                ->OrWhereHas('reserve' , function ($query){
                    return $query->where('guest_count' , 'like' , '%' . $this->search . '%')
                        ->OrWhere('time' , 'like' , '%' . $this->search . '%');
                })
                ->OrWhere('price' , 'like' , '%' .$this->search . '%')
                ->OrWhere('refID' , 'like' , '%' . $this->search . '%')
                ->where('refID' , '!=' , null);
        })->where('status' , 0)
            ->latest()->paginate($this->pagination);
    }

    public function Success(Payment $payment)
    {
        $payment->update(['status' => 1]);
    }

    private function selectFailedPayments(): void
    {
        $this->payments = $this->search != '' ? $this->Searching()
            : Payment::where('status', 0)->where('refID', '!=', null)
                ->latest()->paginate($this->pagination);
    }

    public function updated($propertyName)
    {
        if ($propertyName == 'search' || $propertyName == 'pagination')
        {
            $this->resetPage();
        }
    }

    public function render()
    {
        $this->selectFailedPayments();

        return view('livewire.admin.failed-payments.list-payment' , ['payments' => $this->payments]);
    }
}
