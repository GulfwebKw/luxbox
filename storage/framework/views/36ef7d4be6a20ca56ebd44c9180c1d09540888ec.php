<input
        type="number"
        class="form-control <?php if($errors->has('display_order')): ?> is-invalid <?php endif; ?>"
        name="display_order"
        value="<?php echo e(old('display_order') ? old('display_order') : $lastOrder); ?>"
        autocomplete="off"
        min="0"
        required
/>
<?php if($errors->has('display_order')): ?>
    <div class="invalid-feedback"><?php echo e($errors->first('display_order')); ?></div>
<?php endif; ?><?php /**PATH /home/luqqvtwm/private/resources/views/gwc/components/createDisplayOrder.blade.php ENDPATH**/ ?>