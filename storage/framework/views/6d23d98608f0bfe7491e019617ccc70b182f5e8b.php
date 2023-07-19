<hr>
<h3><?php echo e(__('page.heading-product-accessories')); ?></h3>
<div class="products products--accessories">
  <?php $__currentLoopData = $accessories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="product-card product-card--accessory is-landscape">
      <div>
        <h3><?php echo e($group[0]->category->title); ?></h3>
        <figure>
          <?php if($group[0]->previewImage): ?>
            <img src="/assets/img/<?php echo e($group[0]->category->image); ?>" width="210" height="620" alt="<?php echo e($group[0]->category->title); ?>">
          <?php endif; ?>
        </figure>
        <div>
          <?php if(count($group) == 1): ?>
            <a href="<?php echo e(localized_route('page.accessory.show', ['slug' => AppHelper::slug($group[0]->title), 'accessory' => $group[0]->id])); ?>" class="btn-primary is-sm">
              <?php echo e(__('page.label-show')); ?>

            </a>
          <?php else: ?>
            <a 
              href="<?php echo e(localized_route('page.accessory.listing', ['slugProduct' => AppHelper::slug($product->title), 'product' => $product->id, 'slug' => AppHelper::slug($group[0]->category->title), 'accessoryCategory' => $group[0]->category->id])); ?>" 
              class="btn-primary is-sm">
              <?php echo e(__('page.label-show')); ?>

            </a>
          <?php endif; ?>
        </div>
      </div>
    </div>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div><?php /**PATH /Users/marceli.to/Jamon.digital/Webroot/hydraulic-tools.ch/resources/views/web/partials/accessories.blade.php ENDPATH**/ ?>