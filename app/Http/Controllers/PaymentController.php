<?php

namespace App\Http\Controllers;

use App\Http\Controllers\traits\PageStaticValues;
use App\Http\Controllers\traits\ReserveTrait;
use App\Http\Requests\PaymentRequest;
use App\Models\Center;
use App\Models\Option;
use App\Models\Payment;
use App\Models\Reserve;
use App\Models\Setting;
use Illuminate\Http\Request;
use SoapClient;

class PaymentController extends Controller
{
    use ReserveTrait;
    use PageStaticValues;

    protected $merchant_id = 'XXXXXXXX-XXXX-XXXX-XXXX-XXXXXXXXXXXX';
    protected $totalPrice;

    private function ConvertOptionsToInt($options)
    {
        $options = explode(',' , $options);
        foreach ($options as $key => $op)
        {
            if ($op != null && $op != '')
            {
                $options[$key] = intval($op);
            }
            else
            {
                unset($options[$key]);
            }
        }
        return $options;
    }
    /////////////////////////////////////////////////////
    public function Show()
    {
        return view('payment');
    }

    public function Pay(PaymentRequest $request , $slug)
    {
        $data = array_merge($request->all() , ['slug' => $slug , 'price' => Setting::getPriceFromSettings()]);
        $data = array_merge($data , ['reserve_data'=> session()->get('data')[0]]);

        $center = Center::query()->where('slug' , $slug)->firstOrFail();

        $reserve = Reserve::query()->create([
            "date" => $data['reserve_data']['date'],
            "time" => $data['reserve_data']['time'],
            "guest_count" => $data['reserve_data']['guest_count'],
            "user_id" => auth()->user()->id,
            "center_id" => $center->id,
            "status" => false,
            "chair_id" => $data['reserve_data']['chair_id']
        ]);

        $options = $this->ConvertOptionsToInt($data['options']);

        if (isset($data['options']))   $reserve->options()->sync($options);
        if (isset($data['products']))  $reserve->products()->sync($data['products']);

        foreach ($reserve->options as $op)
        {
            $this->totalPrice += $op->price;
        }

        foreach ($reserve->products as $pr)
        {
            $this->totalPrice += $pr->price;
        }

        $this->totalPrice += $data['price'] * $reserve->guest_count;
        $reserve->update(['price' => $this->totalPrice]);

        ////////////////////////////////////////////////////////////
        /// در گاه پرداخت

        $this->getSettingsData();

        $MerchantID = $this->merchant_id; //Required
        $Amount = $this->totalPrice; //Amount will be based on Toman - Required
        $Description = 'رزرو رستوران از سایت بامیز'; // Required
        $Email = $this->settings['email']; // Optional
        $Mobile = $this->settings['phone']; // Optional
        $CallbackURL = 'http://127.0.0.1:8000/payment/callback'; // Required


        $client = new SoapClient('https://sandbox.zarinpal.com/pg/services/WebGate/wsdl', ['encoding' => 'UTF-8']);

        $result = $client->PaymentRequest(
            [
                'MerchantID' => $MerchantID,
                'Amount' => $Amount,
                'Description' => $Description,
                'Email' => $Email,
                'Mobile' => $Mobile,
                'CallbackURL' => $CallbackURL,
            ]
        );

//Redirect to URL You can do it also by creating a form
        if ($result->Status == 100) {

            Payment::create([
                'user_id' => auth()->user()->id,
                'center_id' => $center->id,
                'reserve_id' => $reserve->id,
                'price' => $this->totalPrice,
                'authority' => $result->Authority,
                'status' => false
            ]);

            return redirect('https://sandbox.zarinpal.com/pg/StartPay/'.$result->Authority);

        } else {
            echo'ERR: '.$result->Status;
        }
    }

    public function Callback()
    {
        $payment = Payment::query()->where('authority' , \request('Authority'))->first();

        $MerchantID = $this->merchant_id;
        $Amount = $payment->price; //Amount will be based on Toman
        $Authority = \request('Authority');

        if (\request('Status') == 'OK') {

            $client = new SoapClient('https://sandbox.zarinpal.com/pg/services/WebGate/wsdl', ['encoding' => 'UTF-8']);

            $result = $client->PaymentVerification(
                [
                    'MerchantID' => $MerchantID,
                    'Authority' => $Authority,
                    'Amount' => $Amount,
                ]
            );

            if ($result->Status == 100) {

                $payment->update(['status' => true , 'refID' => $result->RefID]);
                $payment->reserve()->update(['status' => true]);

                echo 'Transaction success. RefID:'.$result->RefID;
            } else {
                $payment->reserve()->delete();
                echo 'Transaction failed. Status:'.$result->Status;
            }
        } else {

            $payment->reserve()->delete();
            echo 'Transaction canceled by user';
        }
    }

}
