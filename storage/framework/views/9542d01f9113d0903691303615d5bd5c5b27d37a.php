<?php foreach($attributes->onlyProps([
    'action' => null,
    'alignment' => null,
    'isClickDisabled' => false,
    'name',
    'record',
    'recordAction' => null,
    'recordUrl' => null,
    'shouldOpenUrlInNewTab' => false,
    'tooltip' => null,
    'url' => null,
]) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps([
    'action' => null,
    'alignment' => null,
    'isClickDisabled' => false,
    'name',
    'record',
    'recordAction' => null,
    'recordUrl' => null,
    'shouldOpenUrlInNewTab' => false,
    'tooltip' => null,
    'url' => null,
]); ?>
<?php foreach (array_filter(([
    'action' => null,
    'alignment' => null,
    'isClickDisabled' => false,
    'name',
    'record',
    'recordAction' => null,
    'recordUrl' => null,
    'shouldOpenUrlInNewTab' => false,
    'tooltip' => null,
    'url' => null,
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>

<td
    <?php echo e($attributes->class([
        'filament-tables-cell',
        'dark:text-white' => config('tables.dark_mode'),
        match ($alignment) {
            'left' => 'text-left',
            'center' => 'text-center',
            'right' => 'text-right',
            default => null,
        },
    ])); ?>

    <?php if($tooltip): ?>
        x-data="{}"
        x-tooltip.raw="<?php echo e($tooltip); ?>"
    <?php endif; ?>
>
    <?php if($isClickDisabled): ?>
        <?php echo e($slot); ?>

    <?php elseif($url || ($recordUrl && $action === null)): ?>
        <a
            href="<?php echo e($url ?: $recordUrl); ?>"
            <?php echo e($shouldOpenUrlInNewTab ? 'target="_blank"' : null); ?>

            class="block"
        >
            <?php echo e($slot); ?>

        </a>
    <?php elseif($action || $recordAction): ?>
        <?php
            if ($action) {
                $wireClickAction = "callTableColumnAction('{$name}', '%s')";
            } else {
                if ($this->getCachedTableAction($recordAction)) {
                    $wireClickAction = "mountTableAction('{$recordAction}', '%s')";
                } else {
                    $wireClickAction = "{$recordAction}('%s')";
                }
            }

            $wireClickAction = sprintf($wireClickAction, $this->getTableRecordKey($record));
        ?>

        <button
            wire:click="<?php echo e($wireClickAction); ?>"
            wire:target="<?php echo e($wireClickAction); ?>"
            wire:loading.attr="disabled"
            wire:loading.class="opacity-70 cursor-wait"
            type="button"
            class="block text-left rtl:text-right w-full"
        >
            <?php echo e($slot); ?>

        </button>
    <?php else: ?>
        <?php echo e($slot); ?>

    <?php endif; ?>
</td>
<?php /**PATH /home/nesren/Project/web/laravel/Aqrabi-Ecommerce/vendor/filament/tables/src/../resources/views/components/cell.blade.php ENDPATH**/ ?>