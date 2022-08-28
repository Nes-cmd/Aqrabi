<?php foreach($attributes->onlyProps([
    'user' => \Filament\Facades\Filament::auth()->user(),
]) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps([
    'user' => \Filament\Facades\Filament::auth()->user(),
]); ?>
<?php foreach (array_filter(([
    'user' => \Filament\Facades\Filament::auth()->user(),
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>

<div
    <?php echo e($attributes->class([
        'w-10 h-10 rounded-full bg-gray-200 bg-cover bg-center',
        'dark:bg-gray-900' => config('filament.dark_mode'),
    ])); ?>

    style="background-image: url('<?php echo e(\Filament\Facades\Filament::getUserAvatarUrl($user)); ?>')"
></div>
<?php /**PATH /home/nesren/Project/web/laravel/Aqrabi-Ecommerce/resources/views/vendor/filament/components/user-avatar.blade.php ENDPATH**/ ?>