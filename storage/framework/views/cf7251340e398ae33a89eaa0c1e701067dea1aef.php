<?php if(filled($brand = config('filament.brand'))): ?>
    <div class="<?php echo \Illuminate\Support\Arr::toCssClasses([
        'text-xl font-bold tracking-tight filament-brand',
        'dark:text-white' => config('filament.dark_mode'),
    ]) ?>">
        <?php echo e($brand); ?>

    </div>
<?php endif; ?>
<?php /**PATH /home/nesren/Project/web/laravel/Aqrabi-Ecommerce/vendor/filament/filament/src/../resources/views/components/brand.blade.php ENDPATH**/ ?>