<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'filament::components.pages.actions.action','data' => ['action' => $action,'component' => 'filament::button','outlined' => $isOutlined(),'iconPosition' => $getIconPosition(),'class' => 'filament-page-button-action']] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('filament::pages.actions.action'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['action' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($action),'component' => 'filament::button','outlined' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($isOutlined()),'icon-position' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($getIconPosition()),'class' => 'filament-page-button-action']); ?>
    <?php echo e($getLabel()); ?>

 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php /**PATH /home/nesren/Project/web/laravel/Aqrabi-Ecommerce/resources/views/vendor/filament/pages/actions/button-action.blade.php ENDPATH**/ ?>