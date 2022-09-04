<?php
    $description = $getDescription();
    $descriptionPosition = $getDescriptionPosition();
?>

<div
    <?php echo e($attributes->merge($getExtraAttributes())->class([
        'filament-tables-text-column px-4 py-3',
        'text-primary-600 transition hover:underline hover:text-primary-500 focus:underline focus:text-primary-500' => $getAction() || $getUrl(),
        'whitespace-normal' => $canWrap(),
    ])); ?>

>
    <?php if(filled($description) && $descriptionPosition === 'above'): ?>
        <span class="block text-sm text-gray-400">
            <?php echo e($description instanceof \Illuminate\Support\HtmlString ? $description : \Illuminate\Support\Str::of($description)->markdown()->sanitizeHtml()->toHtmlString()); ?>

        </span>
    <?php endif; ?>

    <?php echo e($getFormattedState()); ?>


    <?php if(filled($description) && $descriptionPosition === 'below'): ?>
        <span class="block text-sm text-gray-400">
            <?php echo e($description instanceof \Illuminate\Support\HtmlString ? $description : \Illuminate\Support\Str::of($description)->markdown()->sanitizeHtml()->toHtmlString()); ?>

        </span>
    <?php endif; ?>
</div>
<?php /**PATH /home/nesren/Project/web/laravel/Aqrabi-Ecommerce/vendor/filament/tables/src/../resources/views/columns/text-column.blade.php ENDPATH**/ ?>