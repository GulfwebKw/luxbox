<div class="col-md-8">
    <label><?php echo e($label); ?></label>
    <?php if(isset($required)): ?> <span style="color: red">*</span> <?php endif; ?>
    <div class="custom-file <?php if($errors->has($name)): ?> is-invalid <?php endif; ?>">
        <input type="file"
               class="custom-file-input <?php if($errors->has($name)): ?> is-invalid <?php endif; ?>"
               id="<?php echo e($name); ?>"
               name="<?php echo e($name); ?>"
               <?php if($value != null): ?> value="<?php echo e($value); ?>" <?php endif; ?>
               <?php if(isset($required) && $value == null): ?> required <?php endif; ?>
        >
        <label class="custom-file-label" for="<?php echo e($name); ?>">
            Choose Image (JPG,JPEG,PNG,GIF) , 2MB
        </label>
    </div>
    <?php if($errors->has($name)): ?>
        <div class="invalid-feedback"><?php echo e($errors->first($name)); ?></div>
    <?php endif; ?>
</div>
<br>
<div class="col-md-4">
    <?php if($value): ?>
      

        <?php if(isset($deletePath)): ?>
        <a href="javascript:;"
           data-toggle="kt-popover"
           data-trigger="focus"
           title="Alert"
           data-html="true"
           data-content="Are you sure you want to delete?<br><br><a href='<?php echo e(url($deletePath)); ?>' class='btn btn-brand btn-danger btn-icon-sm btn-sm'>Yes</a>"
           class="btn btn-brand btn-danger btn-icon-sm btn-sm"
        >
            <i class="la la-trash"></i>
            Delete
        </a>
        <?php endif; ?>

    <?php endif; ?>
</div><?php /**PATH /home/luqqvtwm/private/resources/views/gwc/components/editImageUpload.blade.php ENDPATH**/ ?>