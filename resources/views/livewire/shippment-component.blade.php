<div>
    <div class="row">
    @if(sizeof($savedAdress) > 0)
    <!-- select shipping adress -->
    
        <div class="col-12">
            <h3 class="mb-5 border-bottom pb-2">Select A Shipping Adress</h3>
        </div>
        @foreach ($savedAdress as $adr)
            <div class="col-sm-6">
                <input wire:model="shippment.shippment_adress_id" id="{{$adr->id}}" class="custom-checkbox" type="radio" value="{{$adr->id}}" name="adress_id">
                <label for="{{'id'.$adr->id}}">{{ $adr->city_name }}</label>
                <small class="d-block ml-3">{{'Posta number '. $adr->posta_number.' Zip Code '.$adr->postal_code }}</small>
            </div>
        @endforeach
        @error('shippment.shippment_adress_id')
            <span for="zip-code" style="color:red;">{{$message}}</span>
        @enderror
    @endif
    </div>  
    <div class="col-sm-6 mb-4 mt-3">
            
            New adress : 
            <li class="list-inline-item mr-4">
              <label class="radio">
                <input wire:model="newAdress" type="checkbox" name="radio">
                <span class="radio-box bg-magenta"></span>
              </label>
            </li>
        </div>
        <!-- /select shipping method -->
    @if($newAdress)
    <h3 class="mb-5 border-bottom pb-2">New Address</h3>
    <div class="row mb-3">
        <div class="col-sm-6">
            <label for="firstName">Full Name</label>
            <input class="form-control" wire:model.lazy="adress.fullname"  style="margin-bottom:0px;" type="text" id="firstName" name="firstName" required>
            @error('adress.fullname')
                <span for="zip-code" style="color:red;">{{$message}}</span>
            @enderror
        </div>
        <div class="col-sm-6">
            <label for="country">Country</label>
            <select wire:model="adress.country_id"  style="margin-bottom:0px;" class="form-control" name="country">
                <option value="">Country</option>
                @foreach ($countries as $country)
                    <option value="{{ $country['id'] }}">{{ $country['name'] }}</option>
                @endforeach
            </select>
            @error('adress.country_id')
                <span for="zip-code" style="color:red;">{{$message}}</span>
            @enderror
        </div>
        <div class="col-sm-6">
            <label for="city">City</label>
            <input type="text" wire:model.lazy="adress.city_name"  style="margin-bottom:0px;" list="cityname" class="form-control" name="city">
            <datalist id="cityname">
                <option value="">Your city</option>
                @if($cities)
                    @foreach ($cities as $city)
                        <option value="{{ $city->name }}">{{ $city->name }}</option>
                    @endforeach
                @endif
            </datalist>
            @error('adress.city')
                <span for="zip-code" style="color:red;">{{$message}}</span>
            @enderror
        </div>

        <div class="col-sm-6">
            <label for="lastName">Phone Number</label>
            <div class="input-group-prepend" >
                @if($country_code)
                <div class="input-group-prepend" style="height:50px">
                    <span class="input-group-text" id="validationTooltipUsernamePrepend">{{ $country_code }}</span>
                </div>
                @endif
                <input wire:model.lazy="adress.phone"  style="margin-bottom:0px;" style="border-left:1px;height:50px" class="form-control" type="tel" id="lastName" required aria-describedby="validationTooltipUsernamePrepend">
            </div>
            @error('adress.phone')
                    <span for="zip-code" style="color:red;">{{$message}}</span>
                @enderror
        </div>
        
        <div class="col-sm-6">
            <label for="email">Email</label>
            <input wire:model.lazy="adress.email"  style="margin-bottom:0px;" class="form-control" type="email" id="email" name="email" required>
            @error('adress.email')
                <span for="zip-code" style="color:red;">{{$message}}</span>
            @enderror
        </div>
        <div class="col-sm-6">
            <label for="company">Posta Number</label>
            <input wire:model.lazy="adress.posta_number"  style="margin-bottom:0px;" class="form-control" type="text" id="company" name="company" required>
            @error('adress.posta_number')
                <span for="zip-code" style="color:red;">{{$message}}</span>
            @enderror
        </div>
        <div class="col-sm-6">
            <label for="address">Address line 1</label>
            <input wire:model.lazy="adress.addressLine1"  style="margin-bottom:0px;" class="form-control" type="text" id="address"  required>
            @error('adress.addressLine1')
                <span for="zip-code" style="color:red;">{{$message}}</span>
            @enderror
        </div>
        <div class="col-sm-6">
            <label for="phone">Address line 2</label>
            <input wire:model.lazy="adress.addressLine2"  style="margin-bottom:0px;" class="form-control" type="text" id="address"  required>
            @error('adress.addressLine2')
                <span for="zip-code" style="color:red;">{{$message}}</span>
            @enderror
        </div>
        <div class="col-sm-6">
            <label for="phone">Address line 3</label>
            <input wire:model.lazy="adress.addressLine3"  style="margin-bottom:0px;" class="form-control" id="address type="text"  required>
            @error('adress.addressLine3') 
                <span for="zip-code" style="color:red;">{{$message}}</span>
            @enderror
        </div>
        <div class="col-sm-6">
            <label for="zip-code">Zip Code</label>
            <input wire:model.lazy="adress.postal_code" style="margin-bottom:0px;" class="form-control" type="text" id="zip-code" >
            @error('adress.postal_code')
                <span for="zip-code" style="color:red;">{{$message}}</span>
            @enderror
        </div>
    </div>
    @endif
    
    <div class="row">
        <!-- select shipping method -->
        @if($shippmentMethod != null)
        <div class="col-12">
            <h3 class="mb-5 border-bottom pb-2">Select A Shipping Method</h3>
        </div>
        @if($shippmentMethod == 'unavailable')
        <div div class="col-12">
            <h5 class="mb-5 border-bottom pb-2">Sorry! Shippment method is not available for choise!</h5>
        </div>
        @else
            @foreach ($shippmentMethod as $shipp)
                <div class="col-sm-6 mb-4">
                    <input  wire:model="shippment.shippment_method" id="{{$shipp['productName']}}" class="custom-checkbox" type="radio" value="{{$shipp['productName']}}" name="shippment_method">
                    <label for="{{$shipp['productName']}}">{{ 'DHL '.$shipp['productName'] }} - {{'Estimated price'.$shipp['totalPrice'][0]['price'].$shipp['totalPrice'][0]['priceCurrency']}}</label>
                    <small class="d-block ml-3">{{'Estimated delivery time'. $shipp['deliveryCapabilities']['estimatedDeliveryDateAndTime']}}</small>
                </div>
            @endforeach
            @error('shippment.shippment_method')
                <span for="zip-code" style="color:red;">{{$message}}</span>
            @enderror
        @endif
        @endif
    </div>
    
    <!-- /shipping-address -->
    <div class="p-4 bg-gray text-right">
        <button wire:click="continue" class="btn btn-primary">Continue</button>
    </div>
</div>