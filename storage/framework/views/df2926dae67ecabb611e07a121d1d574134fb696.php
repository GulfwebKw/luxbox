<label><?php echo e($label); ?></label>
<select <?php if(isset($multiple)&&$multiple==true): ?> multiple <?php endif; ?> name="<?php echo e(isset($multiple) && $multiple==true?$name . '[]':$name); ?>" class="form-control" <?php if(isset($required)): ?> required <?php endif; ?>>
    <?php if(!isset($none)): ?>
                <option value="">None</option>
    <?php endif; ?>
    <?php $__currentLoopData = $resources; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $resource): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <option value="<?php echo e(isset($value)?$resource->$value:$resource->id); ?>" <?php if(isset($SelectedValue)): ?> <?php if($resource->$SelectedValue == $foreign_key): ?> selected <?php endif; ?>  <?php elseif($resource->id == $foreign_key): ?> selected  <?php endif; ?>>
            <?php echo e($title?$resource->$title: $resource->title); ?>

        </option>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</select><?php /**PATH /home/luqqvtwm/private/resources/views/gwc/components/editSelectBox.blade.php ENDPATH**/ ?>