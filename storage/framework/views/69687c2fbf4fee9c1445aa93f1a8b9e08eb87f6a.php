

<?php $__env->startSection('indexContent'); ?>
    <table class="table table-striped- table-bordered table-hover table-checkable " id="kt_table_1">
        <thead>
        <tr>
            <th width="10">#</th>
            <th><?php echo e(__('adminMessage.title_en')); ?></th>
            <th><?php echo e(__('adminMessage.title_ar')); ?></th>
            <th><?php echo e(__('adminMessage.categorydescription_en')); ?></th>
            <th><?php echo e(__('adminMessage.categorydescription_ar')); ?></th>
            <th><?php echo e(__('adminMessage.displayorder')); ?></th>
            <th width="100"><?php echo e(__('adminMessage.image')); ?></th>
            <th width="10"><?php echo e(__('adminMessage.status')); ?></th>
            <th width="100"><?php echo e(__('adminMessage.createdat')); ?></th>
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
                        <?php echo $resource->title_en; ?>

                    </td>
                    <td>
                        <?php echo $resource->title_ar; ?>

                    </td>
                    <td>
                        <?php echo e(Illuminate\Support\Str::limit(strip_tags($resource->description_en))); ?>

                    </td>
                    <td>
                        <?php echo e(Illuminate\Support\Str::limit(strip_tags($resource->description_ar))); ?>

                    </td>
                    <td>
                        <?php echo $resource->display_order; ?>

                    </td>
                    <td>
                        <?php if($resource->image): ?>
                            <img src="<?php echo asset($data['imageFolder'] . '/thumb/' . $resource->image); ?>" width="40">
                        <?php endif; ?>
                    </td>
                    <td>
                        <span class="kt-switch">
                            <label>
                                <input type="checkbox" id="<?php echo e($data['path']); ?>" class="change_status"
                                       value="<?php echo e($resource->id); ?>" <?php echo e(!empty($resource->is_active)?'checked':''); ?>>
                                <span></span>
                            </label>
                        </span>
                    </td>
                    <td>
                        <?php echo $resource->created_at; ?>

                    </td>
                    <td class="kt-datatable__cell">
                        <span style="overflow: visible; position: relative; width: 80px;">
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
<?php echo $__env->make('gwc.template.indexTemplate', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/luqqvtwm/private/resources/views/gwc/slideshows/index.blade.php ENDPATH**/ ?>