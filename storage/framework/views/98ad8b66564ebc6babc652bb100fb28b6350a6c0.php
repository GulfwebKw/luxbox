<?php $__env->startSection('indexContent'); ?>
    <table class="table table-striped- table-bordered table-hover table-checkable " id="kt_table_1">
        <thead>
        <tr>
            <th width="10">#</th>
            <th><?php echo e(__('adminMessage.user_name')); ?></th>
            <th><?php echo e(__('adminMessage.order')); ?></th>
            <th><?php echo e(__('adminMessage.package_type')); ?></th>
            <th><?php echo e(__('adminMessage.shipping_method')); ?></th>
            <th><?php echo e(__('adminMessage.weight')); ?></th>
            <th><?php echo e(__('adminMessage.good_value')); ?></th>
            <th width="100"><?php echo e(__('adminMessage.original_track_id')); ?></th>
            <th width="10"><?php echo e(__('adminMessage.box_count')); ?></th>
            <th width="100"><?php echo e(__('adminMessage.order_status')); ?></th>
            <th width="10"><?php echo e(__('adminMessage.actions')); ?></th>
        </tr>
        </thead>
        <tbody>
        <?php if(count($resources)): ?>
            <?php $p=1; ?>
            <?php $__currentLoopData = $resources; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $resource): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr class="search-body">
                    <td>
                        <?php echo e($p); ?>

                    </td>
                    <td>
                        <?php echo $resource['member']->fullname; ?>

                    </td>
                    <td>
                        <?php echo '#' .$resource->order; ?>

                    </td>
                    <td>
                        <?php echo $resource->package_type; ?>

                    </td>
                    <td>
                        <?php echo e($resource->shipping_method); ?>

                    </td>
                    <td>
                        <?php echo e($resource->weight . ' '. $resource->weight_type); ?>

                    </td>
                    <td>
                        <?php echo $resource->goods_value; ?>

                    </td>
                    <td>
                        <?php echo $resource->original_track_id; ?>

                    </td>
                    <td>
                        <?php echo $resource->boxes_count; ?>

                    </td>
                    <td>
                        <b><?php echo $resource->order_status; ?></b>

                    </td>












                    <td class="kt-datatable__cell">
                        <span style="display:inline-block;overflow: visible; position: relative; width: 80px;">
                            <div class="dropdown">
                                <a href="javascript:;" class="btn btn-sm btn-clean btn-icon btn-icon-md" data-toggle="dropdown">
                                    <i class="flaticon-more-1"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <ul class="kt-nav">
                                        <?php if(auth()->guard('admin')->user()->can($data['editPermission'])): ?>
                                            <li class="kt-nav__item">
                                                <a href="<?php echo e(url($data['url'] . $resource->id . '/edit')); ?>" class="kt-nav__link">
                                                    <i class="kt-nav__link-icon flaticon2-contract"></i>
                                                    <span class="kt-nav__link-text"><?php echo e(__('adminMessage.edit')); ?></span>
                                                </a>
                                            </li>
                                        <?php endif; ?>
                                           <li class="kt-nav__item">
                                                <a href="javascript:;" data-toggle="modal" data-target="#kt_modal_change_status_<?php echo e($resource->id); ?>" class="kt-nav__link">
                                                    <i class="kt-nav__link-icon flaticon-refresh"></i>
                                                    <span class="kt-nav__link-text">Change Status</span>
                                                </a>
                                            </li>
                                        <?php if(!$resource->invoice): ?>
                                               <li class="kt-nav__item">
                                                <a href="<?php echo e(url('/gwc/package-invoice/create?package_order='.$resource->order)); ?>" class="kt-nav__link">
                                                    <i class="kt-nav__link-icon flaticon-price-tag"></i>
                                                    <span class="kt-nav__link-text">Make Invoice</span>
                                                </a>
                                            </li>
                                            <?php else: ?>
                                                <li class="kt-nav__item">
                                                <a href="<?php echo e(url('/gwc/package-invoice/'.$resource->invoice->id . '/edit?package_order='.$resource->order)); ?>" class="kt-nav__link">
                                                    <i class="kt-nav__link-icon flaticon-price-tag"></i>
                                                    <span class="kt-nav__link-text">Edit Invoice</span>
                                                </a>
                                            </li>
                                            <?php endif; ?>
                                        <?php if(auth()->guard('admin')->user()->can($data['deletePermission'])): ?>
                                            <li class="kt-nav__item">
                                                <a href="javascript:;" data-toggle="modal" data-target="#kt_modal_<?php echo e($resource->id); ?>" class="kt-nav__link">
                                                    <i class="kt-nav__link-icon flaticon2-trash"></i>
                                                    <span class="kt-nav__link-text"><?php echo e(__('adminMessage.delete')); ?></span>
                                                </a>
                                            </li>
                                        <?php endif; ?>
                                    </ul>
                                </div>
                            </div>
                        </span>

                        <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"
                             id="kt_modal_change_status_<?php echo e($resource->id); ?>"
                        >
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Change Order Status</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form method="post" action="<?php echo e(route('package.change-status', $resource->id)); ?>">
                                        <?php echo csrf_field(); ?>
                                    <div class="modal-body">
                                            <?php $__env->startComponent('gwc.components.editSelectBox', [
                                                'label' => 'Change Order Status',
                                                'title' => 'name',
                                                'value' => 'name',
                                                'SelectedValue' => 'name',
                                                'none' => 'false',
                                                'name' => 'order_status',
                                                'resources' => $orderStatus,
                                                'foreign_key' => $resource->order_status,
                                                'required' => true
                                            ]); ?> <?php echo $__env->renderComponent(); ?>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo e(__('adminMessage.no')); ?></button>
                                        <button type="submit" class="btn btn-danger">
                                            <?php echo e(__('adminMessage.yes')); ?>

                                        </button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>


                        <!--Delete modal -->
                        <?php $__env->startComponent('gwc.templateIncludes.deleteModal', [
							'url' => $data['url'],
							'object' => $resource
						]); ?> <?php echo $__env->renderComponent(); ?>
                    </td>
                </tr>
                <?php $p++; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td colspan="8" class="text-center"><?php echo e($resources->links()); ?></td>
            </tr>
        <?php else: ?>
            <tr>
                <td colspan="8"
                    class="text-center"><?php echo e(__('adminMessage.recordnotfound')); ?></td>
            </tr>
        <?php endif; ?>
        </tbody>
    </table>








<?php $__env->stopSection(); ?>
<?php echo $__env->make('gwc.template.indexTemplate', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/luqqvtwm/private/resources/views/gwc/packages/index.blade.php ENDPATH**/ ?>