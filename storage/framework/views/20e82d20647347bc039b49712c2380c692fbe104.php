<div class="alert alert--<?php echo e($type); ?>" role="alert">
  <?php echo e($message); ?>

  <?php if($errors->any()): ?>
    <ul>
      <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <li><?php echo e($error); ?></li>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
  <?php endif; ?>
</div><?php /**PATH /Users/marceli.to/Jamon.digital/Webroot/specialhydraulics.ferratec.ch/resources/views/web/components/content/alert.blade.php ENDPATH**/ ?>