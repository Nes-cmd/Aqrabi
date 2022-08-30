<?php foreach($attributes->onlyProps([
    'columns' => '3',
]) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps([
    'columns' => '3',
]); ?>
<?php foreach (array_filter(([
    'columns' => '3',
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>

<?php
    $columns = (int) $columns;
?>

<div <?php echo e($attributes->class([
    'grid gap-4 lg:gap-8 filament-stats',
    'md:grid-cols-3' => $columns === 3,
    'md:grid-cols-1' => $columns === 1,
    'md:grid-cols-2' => $columns === 2,
    'md:grid-cols-2 xl:grid-cols-4' => $columns === 4,
])); ?>>
    <?php echo e($slot); ?>

</div>
<?php /**PATH /home/nesren/Project/web/laravel/Aqrabi-Ecommerce/resources/views/vendor/filament/components/stats/index.blade.php ENDPATH**/ ?>