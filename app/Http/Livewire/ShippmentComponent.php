<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\ShippmentAddress;
use DB;
class ShippmentComponent extends Component
{
    public $newAdress = false;
    public $adress = ['fullname' => null, 'phone' => null, 'email' => null,'country_id' => null, 'city_name' => null, 'posta_number' => null, 'postal_code' => null, 'addressLine1' => null, 'addressLine2' => null, 'addressLine3' => null];
    public $shippment = ['shippment_method' => null, 'shippment_adress_id' => null];
    public $countries;
    public $cities;
    public $country_code = null;
    public $savedAdress = null;
    public $shippmentMethod = null;
    public $shippmentPrice;
    protected $rules = [
        'adress.fullname' => 'required|string',
        'adress.phone' => 'required|numeric',
        'adress.email' => 'required|string',
        'adress.country_id' => 'required',
        'adress.city_name' => 'required',
        'adress.posta_number' => 'required',
        'adress.postal_code' => 'required',
        'adress.addressLine1' => 'required',
        'adress.addressLine2' => 'nullable',
        'adress.addressLine3' => 'nullable',
    ];
    public function mount()
    {
        $this->countries = DB::table('countries')->get();
        $this->findSavedAdresses();
    }
    public function setShippment($adress)
    {
        $dhlService = new DhlService;
        $dhlProduct = $dhlService->getRate(['country_code' => $this->countries[$adress['country_id']]['country_code'], 'postal_code' =>$adress['postal_code']]);
        if($dhlProduct->has('products')){
            $this->shippmentMethod = objectToArray($dhlProduct['products']);
        }
        else{
            $this->shippmentMethod = 'unavailable';
        }
    }
    public function findSavedAdresses()
    {
        $this->savedAdress = ShippmentAddress::where('user_id', auth()->user()->id )->get();
    }
    public function continue()
    {
        $adress = null;
        if($this->newAdress){
            $this->validate();
            $adress = ShippmentAddress::create([
                'user_id' => auth()->user()->id,
                'phone' => $this->adress['phone'],
                'country_id' => $this->adress['country_id'],
                'city_name' => $this->adress['city_name'],
                'posta_number' => $this->adress['posta_number'],
                'postal_code' => $this->adress['postal_code'],
                'fullname' => $this->adress['fullname'],
                'email' => $this->adress['email'],
                'addressLine1' => $this->adress['addressLine1'],
                'addressLine2' => $this->adress['addressLine2'],
                'addressLine3' => $this->adress['addressLine3'],
            ]);
            $this->shippment['shippment_adress_id'] = $adress->id;
            $this->findSavedAdresses();
        }
        else{
            $this->validate([
                'shippment.shippment_adress_id' => 'required',
            ]);
            $adress = ShippmentAddress::where('id', $this->shippment['shippment_adress_id'])->first();
        }
        // $shipp = $this->shippment;
        $this->emit('shippmentAdded',$adress);
    }

    public function render()
    {
        return view('livewire.shippment-component');
    }
}