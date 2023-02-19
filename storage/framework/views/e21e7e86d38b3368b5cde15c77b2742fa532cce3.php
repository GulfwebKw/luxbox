<div class="col-md-12">
    <label><?php echo e($label); ?></label>
    <?php if(isset($required)): ?> <span style="color: red">*</span> <?php endif; ?>
    <div class="custom-file <?php if($errors->has($name)): ?> is-invalid <?php endif; ?>">
        <input type="file"
               class="custom-file-input <?php if($errors->has($name)): ?> is-invalid <?php endif; ?>"
               id="<?php echo e($name); ?>"
               name="<?php echo e($name); ?>"
               <?php if(isset($required)): ?> required <?php endif; ?>
        >
        <label class="custom-file-label" for="<?php echo e($name); ?>">
            Choose Image (JPG,JPEG,PNG,GIF) , 2MB
        </label>
    </div>
    <?php if($errors->has($name)): ?>
        <div class="invalid-feedback"><?php echo e($errors->first($name)); ?></div>
    <?php endif; ?>
</div><?php /**PATH /home/luqqvtwm/private/resources/views/gwc/components/createImageUpload.blade.php ENDPATH**/ ?>