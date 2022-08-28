<?php
    if (! $getAction()) {
        $wireClickAction = null;
    } else {
        $wireClickAction = $getAction();

        if ($getActionArguments()) {
            $wireClickAction .= '(\'';
            $wireClickAction .= \Illuminate\Support\Str::of(json_encode($getActionArguments()))->replace('"', '\\"');
            $wireClickAction .= '\')';
        }
    }
?>

<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'tables::components.button','data' => ['form' => $getForm(),'type' => $canSubmitForm() ? 'submit' : 'button','tag' => $action->getUrl() ? 'a' : 'button','wire:click' => $wireClickAction,'href' => $action->isEnabled() ? $action->getUrl() : null,'target' => $action->shouldOpenUrlInNewTab() ? '_blank' : null,'xOn:click' => $canCancelAction() ? 'isOpen = false' : null,'color' => $getColor(),'outlined' => $isOutlined(),'icon' => $getIcon(),'iconPosition' => $getIconPosition(),'size' => $getSize(),'attributes' => $getExtraAttributeBag(),'class' => 'filament-tables-modal-button-action']] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('tables::button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['form' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($getForm()),'type' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($canSubmitForm() ? 'submit' : 'button'),'tag' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($action->getUrl() ? 'a' : 'button'),'wire:click' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($wireClickAction),'href' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($action->isEnabled() ? $action->getUrl() : null),'target' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($action->shouldOpenUrlInNewTab() ? '_blank' : null),'x-on:click' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($canCancelAction() ? 'isOpen = false' : null),'color' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($getColor()),'outlined' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($isOutlined()),'icon' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($getIcon()),'icon-position' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($getIconPosition()),'size' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($getSize()),'attributes' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($getExtraAttributeBag()),'class' => 'filament-tables-modal-button-action']); ?>
    <?php echo e($getLabel()); ?>

 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php /**PATH /home/nesren/Project/web/laravel/Aqrabi-Ecommerce/vendor/filament/tables/src/../resources/views/actions/modal/actions/button-action.blade.php ENDPATH**/ ?>