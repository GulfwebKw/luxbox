<label><?php echo e($label); ?></label>
<?php if(isset($required)): ?> <span style="color: red">*</span> <?php endif; ?>
<textarea
        class="kt-tinymce-4 form-control  <?php if($errors->has($name)): ?> is-invalid <?php endif; ?>"
        rows="10"
        name="<?php echo e($name); ?>"
        placeholder="<?php echo e('Please enter ' . $label); ?>"
><?php echo e(old($name) ?? $value); ?></textarea>
<?php if($errors->has($name)): ?>
    <div class="invalid-feedback">
        <?php echo e($errors->first($name)); ?>

    </div>
<?php endif; ?><?php /**PATH /home/luqqvtwm/private/resources/views/gwc/components/editTinyMce.blade.php ENDPATH**/ ?>