<div
    x-data='LivewireRangeSlider({
        options: <?php echo json_encode($options); ?>,
        models: <?php echo json_encode($getWireModel($attributes)); ?>,
        modifier: "<?php echo e($getWireModelModifier($attributes)); ?>"
    })'
    x-init="init()"
    @focusout="getValue"
    <?php echo e($attributes); ?>

    wire:ignore
>
    <div x-ref="range"></div>
    <?php echo e($slot); ?>

</div><?php /**PATH /home/nesren/Project/web/laravel/Aqrabi-Ecommerce/vendor/jantinnerezo/livewire-range-slider/src/../resources/views/components/range-slider.blade.php ENDPATH**/ ?>