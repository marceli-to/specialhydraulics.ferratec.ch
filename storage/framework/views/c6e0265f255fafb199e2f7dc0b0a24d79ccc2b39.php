<?php echo $__env->make('web.partials.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<main role="main" class="site">
  <?php echo $__env->yieldContent('content'); ?>
</main>
<?php echo $__env->make('web.partials.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/marceli.to/Jamon.digital/Webroot/hydraulic-tools.ch/resources/views/web/layout/app.blade.php ENDPATH**/ ?>