<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"
     id="kt_modal_<?php echo e($object->id); ?>"
>
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><?php echo e(__('adminMessage.alert')); ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h6 class="modal-title"><?php echo __('adminMessage.alertDeleteMessage'); ?></h6>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo e(__('adminMessage.no')); ?></button>
                <button type="button" class="btn btn-danger"
                        onClick="Javascript:window.location.href='<?php echo e(url($url . 'delete/' . $object->id)); ?>'">
                    <?php echo e(__('adminMessage.yes')); ?>

                </button>
            </div>
        </div>
    </div>
</div><?php /**PATH /home/luqqvtwm/private/resources/views/gwc/templateIncludes/deleteModal.blade.php ENDPATH**/ ?>