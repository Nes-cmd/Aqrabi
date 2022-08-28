<div>
    <div class="row">
    <?php if(sizeof($savedAdress) > 0): ?>
    <!-- select shipping adress -->
    
        <div class="col-12">
            <h3 class="mb-5 border-bottom pb-2">Select A Shipping Adress</h3>
        </div>
        <?php $__currentLoopData = $savedAdress; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $adr): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-sm-6">
                <input wire:model="shippment.shippment_adress_id" id="<?php echo e($adr->id); ?>" class="custom-checkbox" type="radio" value="<?php echo e($adr->id); ?>" name="adress_id">
                <label for="<?php echo e('id'.$adr->id); ?>"><?php echo e($adr->city_name); ?></label>
                <small class="d-block ml-3"><?php echo e('Posta number '. $adr->posta_number.' Zip Code '.$adr->postal_code); ?></small>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php $__errorArgs = ['shippment.shippment_adress_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <span for="zip-code" style="color:red;"><?php echo e($message); ?></span>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
    <?php endif; ?>
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
    <?php if($newAdress): ?>
    <h3 class="mb-5 border-bottom pb-2">New Address</h3>
    <div class="row mb-3">
        <div class="col-sm-6">
            <label for="firstName">Full Name</label>
            <input class="form-control" wire:model.lazy="adress.fullname"  style="margin-bottom:0px;" type="text" id="firstName" name="firstName" required>
            <?php $__errorArgs = ['adress.fullname'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <span for="zip-code" style="color:red;"><?php echo e($message); ?></span>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>
        <div class="col-sm-6">
            <label for="country">Country</label>
            <select wire:model="adress.country_id"  style="margin-bottom:0px;" class="form-control" name="country">
                <option value="">Country</option>
                <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($country['id']); ?>"><?php echo e($country['name']); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
            <?php $__errorArgs = ['adress.country_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <span for="zip-code" style="color:red;"><?php echo e($message); ?></span>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>
        <div class="col-sm-6">
            <label for="city">City</label>
            <input type="text" wire:model.lazy="adress.city_name"  style="margin-bottom:0px;" list="cityname" class="form-control" name="city">
            <datalist id="cityname">
                <option value="">Your city</option>
                <?php if($cities): ?>
                    <?php $__currentLoopData = $cities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $city): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($city->name); ?>"><?php echo e($city->name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            </datalist>
            <?php $__errorArgs = ['adress.city'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <span for="zip-code" style="color:red;"><?php echo e($message); ?></span>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>

        <div class="col-sm-6">
            <label for="lastName">Phone Number</label>
            <div class="input-group-prepend" >
                <?php if($country_code): ?>
                <div class="input-group-prepend" style="height:50px">
                    <span class="input-group-text" id="validationTooltipUsernamePrepend"><?php echo e($country_code); ?></span>
                </div>
                <?php endif; ?>
                <input wire:model.lazy="adress.phone"  style="margin-bottom:0px;" style="border-left:1px;height:50px" class="form-control" type="tel" id="lastName" required aria-describedby="validationTooltipUsernamePrepend">
            </div>
            <?php $__errorArgs = ['adress.phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <span for="zip-code" style="color:red;"><?php echo e($message); ?></span>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>
        
        <div class="col-sm-6">
            <label for="email">Email</label>
            <input wire:model.lazy="adress.email"  style="margin-bottom:0px;" class="form-control" type="email" id="email" name="email" required>
            <?php $__errorArgs = ['adress.email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <span for="zip-code" style="color:red;"><?php echo e($message); ?></span>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>
        <div class="col-sm-6">
            <label for="company">Posta Number</label>
            <input wire:model.lazy="adress.posta_number"  style="margin-bottom:0px;" class="form-control" type="text" id="company" name="company" required>
            <?php $__errorArgs = ['adress.posta_number'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <span for="zip-code" style="color:red;"><?php echo e($message); ?></span>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>
        <div class="col-sm-6">
            <label for="address">Address line 1</label>
            <input wire:model.lazy="adress.addressLine1"  style="margin-bottom:0px;" class="form-control" type="text" id="address"  required>
            <?php $__errorArgs = ['adress.addressLine1'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <span for="zip-code" style="color:red;"><?php echo e($message); ?></span>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>
        <div class="col-sm-6">
            <label for="phone">Address line 2</label>
            <input wire:model.lazy="adress.addressLine2"  style="margin-bottom:0px;" class="form-control" type="text" id="address"  required>
            <?php $__errorArgs = ['adress.addressLine2'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <span for="zip-code" style="color:red;"><?php echo e($message); ?></span>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>
        <div class="col-sm-6">
            <label for="phone">Address line 3</label>
            <input wire:model.lazy="adress.addressLine3"  style="margin-bottom:0px;" class="form-control" id="address type="text"  required>
            <?php $__errorArgs = ['adress.addressLine3'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> 
                <span for="zip-code" style="color:red;"><?php echo e($message); ?></span>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>
        <div class="col-sm-6">
            <label for="zip-code">Zip Code</label>
            <input wire:model.lazy="adress.postal_code" style="margin-bottom:0px;" class="form-control" type="text" id="zip-code" >
            <?php $__errorArgs = ['adress.postal_code'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <span for="zip-code" style="color:red;"><?php echo e($message); ?></span>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>
    </div>
    <?php endif; ?>
    
    <div class="row">
        <!-- select shipping method -->
        <?php if($shippmentMethod != null): ?>
        <div class="col-12">
            <h3 class="mb-5 border-bottom pb-2">Select A Shipping Method</h3>
        </div>
        <?php if($shippmentMethod == 'unavailable'): ?>
        <div div class="col-12">
            <h5 class="mb-5 border-bottom pb-2">Sorry! Shippment method is not available for choise!</h5>
        </div>
        <?php else: ?>
            <?php $__currentLoopData = $shippmentMethod; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $shipp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-sm-6 mb-4">
                    <input  wire:model="shippment.shippment_method" id="<?php echo e($shipp['productName']); ?>" class="custom-checkbox" type="radio" value="<?php echo e($shipp['productName']); ?>" name="shippment_method">
                    <label for="<?php echo e($shipp['productName']); ?>"><?php echo e('DHL '.$shipp['productName']); ?> - <?php echo e('Estimated price'.$shipp['totalPrice'][0]['price'].$shipp['totalPrice'][0]['priceCurrency']); ?></label>
                    <small class="d-block ml-3"><?php echo e('Estimated delivery time'. $shipp['deliveryCapabilities']['estimatedDeliveryDateAndTime']); ?></small>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php $__errorArgs = ['shippment.shippment_method'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <span for="zip-code" style="color:red;"><?php echo e($message); ?></span>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        <?php endif; ?>
        <?php endif; ?>
    </div>
    
    <!-- /shipping-address -->
    <div class="p-4 bg-gray text-right">
        <button wire:click="continue" class="btn btn-primary">Continue</button>
    </div>
</div><?php /**PATH /home/nesren/Project/web/laravel/Aqrabi-Ecommerce/resources/views/livewire/shippment-component.blade.php ENDPATH**/ ?>