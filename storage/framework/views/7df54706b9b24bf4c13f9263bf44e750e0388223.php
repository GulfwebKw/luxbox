<label><?php echo e($label); ?></label>
<?php if(isset($required)): ?> <span style="color: red">*</span> <?php endif; ?>
<input <?php if(isset($type)): ?> type="<?php echo e($type); ?>" <?php else: ?> type="text" <?php endif; ?>
       class="form-control <?php if($errors->has($name)): ?> is-invalid <?php endif; ?>"
       name="<?php echo e($name); ?>"
       placeholder="<?php echo e('Please enter ' . $label); ?>"
       value="<?php echo e(old($name) ?? $value); ?>"
       <?php if(isset($required)): ?> required <?php endif; ?>
>
<?php if($errors->has($name)): ?>
    <div class="invalid-feedback">
        <?php echo e($errors->first($name)); ?>

    </div>
<?php endif; ?><?php /**PATH /home/luqqvtwm/private/resources/views/gwc/components/editTextInput.blade.php ENDPATH**/ ?>