<nav <?php echo e($attributes->class([
    'flex overflow-x-auto items-center p-1 space-x-1 rtl:space-x-reverse text-sm text-gray-600 bg-gray-500/5 rounded-xl filament-tabs',
    'dark:bg-gray-500/20' => config('filament.dark_mode'),
])); ?>>
    <?php echo e($slot); ?>

</nav>
<?php /**PATH /home/nesren/Project/web/laravel/Aqrabi-Ecommerce/resources/views/vendor/filament/components/tabs/index.blade.php ENDPATH**/ ?>