<div <?php echo e($attributes->class([
    'filament-widget',
    match ($this->getColumnSpan()) {
        2 => 'col-span-2',
        3 => 'col-span-3',
        4 => 'col-span-4',
        5 => 'col-span-5',
        6 => 'col-span-6',
        7 => 'col-span-7',
        8 => 'col-span-8',
        9 => 'col-span-9',
        10 => 'col-span-10',
        11 => 'col-span-11',
        12 => 'col-span-12',
        'full' => 'col-span-full',
        1 => 'col-span-1',
    },
])); ?>>
    <?php echo e($slot); ?>

</div>
<?php /**PATH /home/nesren/Project/web/laravel/Aqrabi-Ecommerce/resources/views/vendor/filament/components/widget.blade.php ENDPATH**/ ?>