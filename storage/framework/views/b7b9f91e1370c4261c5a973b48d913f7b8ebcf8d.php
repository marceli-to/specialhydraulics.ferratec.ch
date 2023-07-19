<?php $__env->startComponent('mail::message'); ?>
# <?php echo e(__('page.mail-rent-title')); ?>


<p><?php echo e(__('page.mail-greetings')); ?> <?php echo e($data['firstname']); ?> <?php echo e($data['name']); ?></p>
<p><?php echo e(__('page.mail-rent-text')); ?></p>

<?php $__env->startComponent('mail::table'); ?>
|     |     |
| --- | --- |
| <?php echo e(__('page.mail-label-product')); ?>| <?php echo e($data['product']->title); ?> |
| <?php echo e(__('page.mail-label-date-start')); ?> | <?php echo e($data['date-start']); ?> |
| <?php echo e(__('page.mail-label-date-end')); ?> | <?php echo e($data['date-start']); ?> |
| <?php echo e(__('page.mail-label-name')); ?>| <?php echo e($data['firstname']); ?> <?php echo e($data['name']); ?> |
| <?php echo e(__('page.mail-label-company')); ?> | <?php echo e($data['company']); ?> |
| <?php echo e(__('page.mail-label-phone')); ?> | <?php echo e($data['phone']); ?> |
| <?php echo e(__('page.mail-label-email')); ?> | <?php echo e($data['email']); ?> |

<?php if (isset($__componentOriginal20cb600a4a4149597e6997e789a6c2fa917d1906)): ?>
<?php $component = $__componentOriginal20cb600a4a4149597e6997e789a6c2fa917d1906; ?>
<?php unset($__componentOriginal20cb600a4a4149597e6997e789a6c2fa917d1906); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>

<p class="signature">
  <?php echo e(__('page.mail-salutations')); ?> <br>
  <?php echo e(\Config::get('custom.company')); ?>

</p>
<?php if (isset($__componentOriginal2dab26517731ed1416679a121374450d5cff5e0d)): ?>
<?php $component = $__componentOriginal2dab26517731ed1416679a121374450d5cff5e0d; ?>
<?php unset($__componentOriginal2dab26517731ed1416679a121374450d5cff5e0d); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?><?php /**PATH /Users/marceli.to/Jamon.digital/Webroot/hydraulic-tools.ch/resources/views/mail/rent-user.blade.php ENDPATH**/ ?>