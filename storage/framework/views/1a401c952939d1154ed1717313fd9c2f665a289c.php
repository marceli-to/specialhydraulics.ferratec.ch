<?php $__env->startSection('seo_title', __('Datenschutzerklärung')); ?>
<?php $__env->startSection('content'); ?>
<section class="content">
  <div class="privacy">
    <h1><?php echo e(__('Datenschutzerklärung')); ?></h1>
    <p class="sb-sm"><?php echo e(__('Zuletzt aktualisiert am 29. August 2023')); ?></p>
    <?php echo $__env->make('web.pages.privacy.'. app()->getLocale() .'.privacy', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  </div>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('web.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/marceli.to/Jamon.digital/Webroot/specialhydraulics.ferratec.ch/resources/views/web/pages/privacy/privacy.blade.php ENDPATH**/ ?>