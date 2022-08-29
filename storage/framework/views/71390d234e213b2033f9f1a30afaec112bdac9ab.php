<?php if (isset($component)) { $__componentOriginal3bf0a20793be3eca9a779778cf74145887b021b9 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\DynamicComponent::class, ['component' => $getFieldWrapperView()] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('dynamic-component'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(Illuminate\View\DynamicComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => $getId(),'label' => $getLabel(),'label-sr-only' => $isAvatar() || $isLabelHidden(),'helper-text' => $getHelperText(),'hint' => $getHint(),'hint-icon' => $getHintIcon(),'required' => $isRequired(),'state-path' => $getStatePath()]); ?>
    <?php
        $imageCropAspectRatio = $getImageCropAspectRatio();
        $imageResizeTargetHeight = $getImageResizeTargetHeight();
        $imageResizeTargetWidth = $getImageResizeTargetWidth();
        $imageResizeMode = $getImageResizeMode();
        $shouldTransformImage = $imageCropAspectRatio || $imageResizeTargetHeight || $imageResizeTargetWidth;
    ?>
    <div
        x-data="fileUploadFormComponent({
            acceptedFileTypes: <?php echo e(json_encode($getAcceptedFileTypes())); ?>,
            canDownload: <?php echo e($canDownload() ? 'true' : 'false'); ?>,
            canOpen: <?php echo e($canOpen() ? 'true' : 'false'); ?>,
            canPreview: <?php echo e($canPreview() ? 'true' : 'false'); ?>,
            canReorder: <?php echo e($canReorder() ? 'true' : 'false'); ?>,
            deleteUploadedFileUsing: async (fileKey) => {
                return await $wire.deleteUploadedFile('<?php echo e($getStatePath()); ?>', fileKey)
            },
            getUploadedFileUrlsUsing: async () => {
                return await $wire.getUploadedFileUrls('<?php echo e($getStatePath()); ?>')
            },
            imageCropAspectRatio: <?php echo e($imageCropAspectRatio ? "'{$imageCropAspectRatio}'" : 'null'); ?>,
            imagePreviewHeight: <?php echo e(($height = $getImagePreviewHeight()) ? "'{$height}'" : 'null'); ?>,
            imageResizeMode: <?php echo e($imageResizeMode ? "'{$imageResizeMode}'" : 'null'); ?>,
            imageResizeTargetHeight: <?php echo e($imageResizeTargetHeight ? "'{$imageResizeTargetHeight}'" : 'null'); ?>,
            imageResizeTargetWidth: <?php echo e($imageResizeTargetWidth ? "'{$imageResizeTargetWidth}'" : 'null'); ?>,
            isAvatar: <?php echo e($isAvatar() ? 'true' : 'false'); ?>,
            loadingIndicatorPosition: '<?php echo e($getLoadingIndicatorPosition()); ?>',
            locale: <?php echo \Illuminate\Support\Js::from(app()->getLocale())->toHtml() ?>,
            panelAspectRatio: <?php echo e(($aspectRatio = $getPanelAspectRatio()) ? "'{$aspectRatio}'" : 'null'); ?>,
            panelLayout: <?php echo e(($layout = $getPanelLayout()) ? "'{$layout}'" : 'null'); ?>,
            placeholder: <?php echo \Illuminate\Support\Js::from($getPlaceholder())->toHtml() ?>,
            maxSize: <?php echo e(($size = $getMaxSize()) ? "'{$size} KB'" : 'null'); ?>,
            minSize: <?php echo e(($size = $getMinSize()) ? "'{$size} KB'" : 'null'); ?>,
            removeUploadedFileUsing: async (fileKey) => {
                return await $wire.removeUploadedFile('<?php echo e($getStatePath()); ?>', fileKey)
            },
            removeUploadedFileButtonPosition: '<?php echo e($getRemoveUploadedFileButtonPosition()); ?>',
            reorderUploadedFilesUsing: async (files) => {
                return await $wire.reorderUploadedFiles('<?php echo e($getStatePath()); ?>', files)
            },
            shouldAppendFiles: <?php echo e($shouldAppendFiles() ? 'true' : 'false'); ?>,
            shouldTransformImage: <?php echo e($shouldTransformImage ? 'true' : 'false'); ?>,
            state: $wire.<?php echo e($applyStateBindingModifiers('entangle(\'' . $getStatePath() . '\')')); ?>,
            uploadButtonPosition: '<?php echo e($getUploadButtonPosition()); ?>',
            uploadProgressIndicatorPosition: '<?php echo e($getUploadProgressIndicatorPosition()); ?>',
            uploadUsing: (fileKey, file, success, error, progress) => {
                $wire.upload(`<?php echo e($getStatePath()); ?>.${fileKey}`, file, () => {
                    success(fileKey)
                }, error, progress)
            },
        })"
        wire:ignore
        <?php echo ($id = $getId()) ? "id=\"{$id}\"" : null; ?>

        style="min-height: <?php echo e($isAvatar() ? '8em' : ($getPanelLayout() === 'compact' ? '2.625em' : '4.75em')); ?>"
        <?php echo e($attributes->merge($getExtraAttributes())->class([
            'filament-forms-file-upload-component',
            'w-32 mx-auto' => $isAvatar(),
        ])); ?>

        <?php echo e($getExtraAlpineAttributeBag()); ?>

    >
        <input
            x-ref="input"
            <?php echo e($isDisabled() ? 'disabled' : ''); ?>

            <?php echo e($isMultiple() ? 'multiple' : ''); ?>

            type="file"
            <?php echo e($getExtraInputAttributeBag()); ?>

            dusk="filament.forms.<?php echo e($getStatePath()); ?>"
        />
    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal3bf0a20793be3eca9a779778cf74145887b021b9)): ?>
<?php $component = $__componentOriginal3bf0a20793be3eca9a779778cf74145887b021b9; ?>
<?php unset($__componentOriginal3bf0a20793be3eca9a779778cf74145887b021b9); ?>
<?php endif; ?>
<?php /**PATH /home/nesren/Project/web/laravel/Aqrabi-Ecommerce/vendor/filament/forms/src/../resources/views/components/file-upload.blade.php ENDPATH**/ ?>