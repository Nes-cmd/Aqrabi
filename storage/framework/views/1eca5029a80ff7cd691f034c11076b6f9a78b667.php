<?php
    $url = $getUrl();
?>

<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'filament::components.stats.card','data' => ['tag' => $url ? 'a' : 'div','chart' => $getChart(),'chartColor' => $getChartColor(),'color' => $getColor(),'icon' => $getIcon(),'description' => $getDescription(),'descriptionColor' => $getDescriptionColor(),'descriptionIcon' => $getDescriptionIcon(),'href' => $url,'target' => $shouldOpenUrlInNewTab() ? '_blank' : null,'label' => $getLabel(),'value' => $getValue(),'extraAttributes' => $getExtraAttributes(),'class' => 'filament-stats-overview-widget-card']] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('filament::stats.card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['tag' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($url ? 'a' : 'div'),'chart' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($getChart()),'chart-color' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($getChartColor()),'color' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($getColor()),'icon' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($getIcon()),'description' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($getDescription()),'description-color' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($getDescriptionColor()),'description-icon' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($getDescriptionIcon()),'href' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($url),'target' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($shouldOpenUrlInNewTab() ? '_blank' : null),'label' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($getLabel()),'value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($getValue()),'extra-attributes' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($getExtraAttributes()),'class' => 'filament-stats-overview-widget-card']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php /**PATH /home/nesren/Project/web/laravel/Aqrabi-Ecommerce/resources/views/vendor/filament/widgets/stats-overview-widget/card.blade.php ENDPATH**/ ?>