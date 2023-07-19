<hr>
<h3><?php echo e(__('page.heading-product-consumables')); ?></h3>
<div class="products products--consumables">
  <?php $__currentLoopData = $consumables; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="product-card product-card--consumable is-landscape">
      <div>
        <h3><?php echo e($group[0]->category->title); ?></h3>
        <figure>
          <?php if($group[0]->previewImage): ?>
            <img src="/assets/img/<?php echo e($group[0]->category->image); ?>" width="210" height="620" alt="<?php echo e($group[0]->category->title); ?>">
          <?php endif; ?>
        </figure>
        <div>
          <?php if(count($group) == 1): ?>
            <a href="<?php echo e(localized_route('page.consumable.show', ['slug' => AppHelper::slug($group[0]->title), 'consumable' => $group[0]->id])); ?>" class="btn-primary is-sm">
              <?php echo e(__('page.label-show')); ?>

            </a>
          <?php else: ?>
            <a 
              href="<?php echo e(localized_route('page.consumable.listing', ['slugProduct' => AppHelper::slug($product->title), 'product' => $product->id, 'slug' => AppHelper::slug($group[0]->category->title), 'consumableCategory' => $group[0]->category->id])); ?>" 
              class="btn-primary is-sm">
              <?php echo e(__('page.label-show')); ?>

            </a>
          <?php endif; ?>
        </div>
      </div>
    </div>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div><?php /**PATH /Users/marceli.to/Jamon.digital/Webroot/specialhydraulics.ferratec.ch/resources/views/web/partials/consumables.blade.php ENDPATH**/ ?>