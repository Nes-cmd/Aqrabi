<div <?php echo e($attributes->merge($getExtraAttributes())->class(['filament-tables-image-column px-4 py-3'])); ?>>
    <?php
        $height = $getHeight();
        $width = $getWidth() ?? ($isRounded() ? $height : null);
    ?>

    <div
        style="
            <?php echo $height !== null ? "height: {$height};" : null; ?>

            <?php echo $width !== null ? "width: {$width};" : null; ?>

        "
        class="<?php echo \Illuminate\Support\Arr::toCssClasses(['rounded-full overflow-hidden' => $isRounded()]) ?>"
    >
        <?php if($path = $getImagePath()): ?>
            <img
                src="<?php echo e($path); ?>"
                style="
                    <?php echo $height !== null ? "height: {$height};" : null; ?>

                    <?php echo $width !== null ? "width: {$width};" : null; ?>

                "
                <?php echo e($getExtraImgAttributeBag()->class([
                    'object-cover object-center' => $isRounded(),
                ])); ?>

            >
       <?php endif; ?>
    </div>
</div>
<?php /**PATH /home/nesren/Project/web/laravel/Aqrabi-Ecommerce/vendor/filament/tables/src/../resources/views/columns/image-column.blade.php ENDPATH**/ ?>