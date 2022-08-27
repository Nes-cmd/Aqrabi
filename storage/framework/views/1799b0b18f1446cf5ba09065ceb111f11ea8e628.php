<div>
    <input wire:model="query"  class="search-box" autofocus id="search" type="search" list="suggest" placeholder="Enter Keywords...">
    <button wire:click="search" class="search-icon"><i class="ti-search"></i></button>
    <datalist id="suggest">
        <?php $__currentLoopData = $suggestions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $suggestion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option class="pl-6" value="<?php echo e($suggestion->productname); ?>"><?php echo e($suggestion->productname); ?></option>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </datalist>
</div><?php /**PATH /home/nesren/Project/web/laravel/Aqrabi-Ecommerce/resources/views/livewire/search-component.blade.php ENDPATH**/ ?>