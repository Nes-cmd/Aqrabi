<?php foreach($attributes->onlyProps([
    'darkMode' => false,
]) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps([
    'darkMode' => false,
]); ?>
<?php foreach (array_filter(([
    'darkMode' => false,
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>

<h3 <?php echo e($attributes->class(['text-gray-500 filament-modal-subheading'])); ?>>
    <?php echo e($slot); ?>

</h3>
<?php /**PATH /home/nesren/Project/web/laravel/Aqrabi-Ecommerce/vendor/filament/support/src/../resources/views/components/modal/subheading.blade.php ENDPATH**/ ?>