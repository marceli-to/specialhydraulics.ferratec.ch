<?php $__env->startSection('seo_title', 'Immer wieder Intelligent – Die intelligente Verpressung von Intercable.'); ?>
<?php $__env->startSection('seo_description', 'Immer wieder Intelligent – Die intelligente Verpressung von Intercable.'); ?>
<?php $__env->startSection('content'); ?>
<section class="content">
  <div>
    <h1>
      <?php echo __('page.claim'); ?>

      <?php echo __('page.claim-byline'); ?>

    </h1>
    <div class="products">
      <?php if($categories): ?>
        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <div class="product-card product-card--home is-portrait">
            <figure>
              <img src="/assets/img/<?php echo e($category->image); ?>" width="210" height="620" alt="<?php echo e($category->title); ?>">
            </figure>
            <div>
              <h2><?php echo e($category->title); ?></h2>
              <span class="word-break"><?php echo $category->description; ?></span>
              <p>
                <?php if($category->products): ?>
                  <div class="select-wrapper">
                    <select class="js-product-dd">
                      
                      <?php if($category->id == 1): ?>
                        <option><?php echo e(__('page.label-press-area')); ?></option>
                      <?php elseif($category->id == 2): ?>
                        <option><?php echo e(__('page.label-max-strength')); ?></option>
                      <?php elseif($category->id == 3): ?>
                        <option><?php echo e(__('page.label-max-diameter')); ?></option>
                      <?php else: ?>
                        <option><?php echo e(__('page.label-diameter')); ?></option>
                      <?php endif; ?>
                      <?php $__currentLoopData = $category->products->sortBy('order'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($product->publish): ?>
                          <?php if($category->id == 1): ?>
                            <option value="<?php echo e(localized_route('page.product.show', ['slug' => AppHelper::slug($category->title_singular .'-'. $product->title), 'product' => $product->id])); ?>"><?php echo e($product->diameter); ?> mm2</option>
                          <?php elseif($category->id == 2): ?>
                            <option value="<?php echo e(localized_route('page.product.show', ['slug' => AppHelper::slug($category->title_singular .'-'. $product->title), 'product' => $product->id])); ?>"><?php echo e($product->diameter); ?> mm</option>
                          <?php elseif($category->id == 3): ?>
                            <option value="<?php echo e(localized_route('page.product.show', ['slug' => AppHelper::slug($category->title_singular .'-'. $product->title), 'product' => $product->id])); ?>"><?php echo e($product->diameter); ?> mm</option>
                          <?php else: ?>
                            <option value="<?php echo e(localized_route('page.product.show', ['slug' => AppHelper::slug($category->title_singular .'-'. $product->title), 'product' => $product->id])); ?>"><?php echo e($product->diameter); ?> mm2</option>
                          <?php endif; ?>
                        <?php endif; ?>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                  </div>
                <?php endif; ?>
              </p>
              <p>
                <a href="<?php echo e(localized_route('page.product.listing', ['slug' => $category->slug, 'productCategory' => $category->id])); ?>">
                  <?php echo e(__('page.label-show-all')); ?>

                </a>
              </p>
            </div>
          </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      <?php endif; ?>
    </div>
  </div>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('web.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/marceli.to/Jamon.digital/Webroot/specialhydraulics.ferratec.ch/resources/views/web/pages/home.blade.php ENDPATH**/ ?>