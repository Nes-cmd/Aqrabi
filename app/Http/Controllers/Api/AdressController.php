<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Address;
use App\Models\SupplierAddress;
use Exception;
use App\Models\Country;

class AdressController extends Controller
{
    public function getShippmentAdress()
    {
        $address = Address::where('user_id', auth()->user()->id)->get();
        return ['adresses' => $address];
    }
    public function getSupplierAdress()
    {
        $address = SupplierAddress::where('supplier_id', auth()->user()->id)->get();
        return ['adresses' => $address];
    }
    public function getCountries()
    {
        $countries = Country::all();
        return ['countries' => $countries];
    }
    public function storeShippmentAdress(Request $request)
    {
        try {
            
            $request->validate([
                'fullname' => 'required',
                'phone' => 'required',
                'email' => 'required',
                'country_id' => 'required',
                'postal_code' => 'required',
                'posta_number' => 'required',
                'city_name' => 'required',
                'addressLine1' => 'required'
            ]);
            
            $address = Address::create([
                'user_id' => auth()->user()->id,
                'fullname' => $request->fullname,
                'phone' => $request->phone,
                'email' => $request->email,
                'country_id' => $request->country_id,
                'postal_code' => $request->postal_code,
                'city_name' => $request->city_name,
                'posta_number' => $request->posta_number,
                'province_name' => $request->province_name,
                'province_code' => $request-> province_code,
                'addressLine1' => $request->addressLine1,
                'addressLine2' => $request->addressLine2,
                'addressLine3' => $request->addressLine3,
            ]);
            return ['adress' => $address];
        } 
        catch (Exception $e) { 
            ['exception' => $e];
        }
    }
}
