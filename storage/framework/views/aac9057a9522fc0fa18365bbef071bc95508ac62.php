<?php foreach($attributes->onlyProps([
    'indicators' => [],
]) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps([
    'indicators' => [],
]); ?>
<?php foreach (array_filter(([
    'indicators' => [],
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>

<?php if(count($indicators)): ?>
    <div <?php echo e($attributes->class(['bg-gray-500/5 gap-x-4 px-4 py-1 text-sm flex filament-tables-filter-indicators'])); ?>>
        <div class="flex flex-1 items-center flex-wrap gap-y-1 gap-x-2">
            <span class="font-medium">
                <?php echo e(__('tables::table.filters.indicator')); ?>

            </span>

            <?php $__currentLoopData = $indicators; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $filter => $filterIndicators): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php $__currentLoopData = $filterIndicators; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $field => $indicator): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                        $field = is_numeric($field) ? null : $field;
                    ?>

                    <span class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                        'inline-flex items-center justify-center min-h-6 px-2 py-0.5 text-xs font-medium tracking-tight rounded-xl text-gray-700 bg-gray-500/10 whitespace-normal filament-tables-filter-indicator',
                        'dark:text-gray-300 dark:bg-gray-500/20' => config('tables.dark_mode'),
                    ]) ?>">
                        <?php echo e($indicator); ?>


                        <button
                            wire:click="removeTableFilter('<?php echo e($filter); ?>'<?php echo e($field ? ' , \'' . $field . '\'' : null); ?>)"
                            wire:loading.attr="disabled"
                            wire:loading.class="cursor-wait"
                            wire:target="removeTableFilter"
                            type="button"
                            class="ml-1 -mr-2 rtl:mr-1 rtl:-ml-2 p-1 -my-1 hover:bg-gray-500/10 rounded-full"
                        >
                            <?php if (isset($component)) { $__componentOriginalcd9972c8156dfa6e5fd36675ca7bf5f21b506e2e = $component; } ?>
<?php $component = $__env->getContainer()->make(BladeUI\Icons\Components\Svg::class, [] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('heroicon-s-x'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(BladeUI\Icons\Components\Svg::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-3 h-3']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalcd9972c8156dfa6e5fd36675ca7bf5f21b506e2e)): ?>
<?php $component = $__componentOriginalcd9972c8156dfa6e5fd36675ca7bf5f21b506e2e; ?>
<?php unset($__componentOriginalcd9972c8156dfa6e5fd36675ca7bf5f21b506e2e); ?>
<?php endif; ?>

                            <span class="sr-only">
                                <?php echo e(__('tables::table.filters.buttons.remove.label')); ?>

                            </span>
                        </button>
                    </span>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>

        <div class="flex-shrink-0">
            <button
                wire:click="removeTableFilters"
                type="button"
                class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                    '-mb-1.5 -mt-0.5 -mr-2 p-1.5 text-gray-600 hover:bg-gray-500/10 rounded-full hover:text-gray-700',
                    'dark:text-gray-400 dark:hover:text-gray-300 dark:hover:bg-gray-500/20' => config('tables.dark_mode'),
                ]) ?>"
            >
                <div class="w-5 h-5 flex items-center justify-center">
                    <?php if (isset($component)) { $__componentOriginalcd9972c8156dfa6e5fd36675ca7bf5f21b506e2e = $component; } ?>
<?php $component = $__env->getContainer()->make(BladeUI\Icons\Components\Svg::class, [] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('heroicon-s-x'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(BladeUI\Icons\Components\Svg::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['x-tooltip.raw' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('tables::table.filters.buttons.remove_all.tooltip')),'wire:loading.remove.delay' => true,'wire:target' => 'removeTableFilters,removeTableFilter','class' => 'w-5 h-5']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalcd9972c8156dfa6e5fd36675ca7bf5f21b506e2e)): ?>
<?php $component = $__componentOriginalcd9972c8156dfa6e5fd36675ca7bf5f21b506e2e; ?>
<?php unset($__componentOriginalcd9972c8156dfa6e5fd36675ca7bf5f21b506e2e); ?>
<?php endif; ?>

                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'filament-support::components.loading-indicator','data' => ['wire:loading.delay' => true,'wire:target' => 'removeTableFilters,removeTableFilter','class' => 'animate-spin w-5 h-5']] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('filament-support::loading-indicator'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:loading.delay' => true,'wire:target' => 'removeTableFilters,removeTableFilter','class' => 'animate-spin w-5 h-5']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                </div>

                <span class="sr-only">
                    <?php echo e(__('tables::table.filters.buttons.remove_all.label')); ?>

                </span>
            </button>
        </div>
    </div>
<?php endif; ?>
<?php /**PATH /home/nesren/Project/web/laravel/Aqrabi-Ecommerce/vendor/filament/tables/src/../resources/views/components/filters/indicators.blade.php ENDPATH**/ ?>