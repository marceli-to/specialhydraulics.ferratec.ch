<hr>
<h3><?php echo e(__('page.heading-product-tools')); ?></h3>
<div class="products products--preview">
  <?php $__currentLoopData = $product->tools; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tool): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="product-card product-card--tool is-landscape">
      <div>
        <h3><?php echo e($tool->title); ?></h3>
        <figure>
          <?php if($tool->previewImage): ?>
            <?php echo ImageHelper::large($tool->previewImage, $tool->previewImage->caption); ?>

          <?php endif; ?>
        </figure>
        <div>
          <a href="<?php echo e(localized_route('page.tool.show', ['slug' => AppHelper::slug($tool->title), 'tool' => $tool->id])); ?>" class="btn-primary is-sm">
            <?php echo e(__('page.label-show')); ?>

          </a>
        </div>
      </div>
    </div>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div><?php /**PATH /Users/marceli.to/Jamon.digital/Webroot/hydraulic-tools.ch/resources/views/web/partials/tools.blade.php ENDPATH**/ ?>