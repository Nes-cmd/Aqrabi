<?php extract(collect($attributes->getAttributes())->mapWithKeys(function ($value, $key) { return [Illuminate\Support\Str::camel(str_replace([':', '.'], ' ', $key)) => $value]; })->all(), EXTR_SKIP); ?>
<?php foreach($attributes->onlyProps(['darkMode','tag','wire:click','href','target','disabled','color','tooltip','icon','size','dusk','class','outlined','iconPosition','iconPosition']) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps(['darkMode','tag','wire:click','href','target','disabled','color','tooltip','icon','size','dusk','class','outlined','iconPosition','iconPosition']); ?>
<?php foreach (array_filter((['darkMode','tag','wire:click','href','target','disabled','color','tooltip','icon','size','dusk','class','outlined','iconPosition','iconPosition']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>
<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'tables::components.button','data' => ['darkMode' => $darkMode,'tag' => $tag,'wire:click' => $wireClick,'href' => $href,'target' => $target,'disabled' => $disabled,'color' => $color,'tooltip' => $tooltip,'icon' => $icon,'size' => $size,'dusk' => $dusk,'class' => $class,'outlined' => $outlined,'iconPosition' => $iconPosition]] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('tables::button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['dark-mode' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($darkMode),'tag' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($tag),'wire:click' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($wireClick),'href' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($href),'target' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($target),'disabled' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($disabled),'color' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($color),'tooltip' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($tooltip),'icon' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($icon),'size' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($size),'dusk' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($dusk),'class' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($class),'outlined' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($outlined),'iconPosition' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($iconPosition),'icon-position' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($iconPosition)]); ?>

<?php echo e($slot ?? ""); ?>

 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?><?php /**PATH /home/nesren/Project/web/laravel/Aqrabi-Ecommerce/storage/framework/views/678eadcfdfa82bbc50e12d220448b7b4fc126902.blade.php ENDPATH**/ ?>