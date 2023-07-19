<?php $__env->startSection('seo_title', strip_tags($category->title_singular)); ?>
<?php $__env->startSection('seo_description', ''); ?>
<?php $__env->startSection('content'); ?>
<section>
  <div>
    <h1><?php echo $category->title_listing; ?></h1>
    <?php if($products): ?>
      <div class="products">
        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <?php if($product->previewImage->orientation == 'p'): ?>
            <div class="product-card is-portrait">
              <figure>
                <?php if($product->previewImage): ?>
                  <?php echo ImageHelper::large($product->previewImage, $product->previewImage->caption); ?>

                <?php endif; ?>
              </figure>
              <div>
                <h2>
                  <?php echo e($category->title_singular); ?> <em><?php echo e($product->title); ?></em>
                </h2>
                <div><?php echo str_replace('mm2', 'mm<sup>2</sup>', $product->subtitle); ?></div>
                <div>
                  <a href="<?php echo e(localized_route('page.product.show', ['slug' => AppHelper::slug($category->title_singular .'-'. $product->title), 'product' => $product->id])); ?>" class="btn-primary">
                    <?php echo e(__('page.label-select')); ?>

                  </a>
                </div>
              </div>
            </div>
          <?php else: ?>
            <div class="product-card is-landscape">
              <div>
                <h2>
                  <?php echo e($category->title_singular); ?> <em><?php echo e($product->title); ?></em>
                </h2>
                <figure>
                  <?php if($product->previewImage): ?>
                    <?php echo ImageHelper::large($product->previewImage, $product->previewImage->caption); ?>

                  <?php endif; ?>
                </figure>
                <div><?php echo str_replace('mm2', 'mm<sup>2</sup>', $product->subtitle); ?></div>
                <div>
                  <a href="<?php echo e(localized_route('page.product.show', ['slug' => AppHelper::slug($category->title_singular .'-'. $product->title), 'product' => $product->id])); ?>" class="btn-primary">
                    <?php echo e(__('page.label-select')); ?>

                  </a>
                </div>
              </div>
            </div>
          <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        <?php if($productCategoryHoleSaw): ?>
          <div class="product-card is-portrait">
            <figure>
              <img src="/assets/img/<?php echo e($productCategoryHoleSaw->image); ?>" width="210" height="620" alt="<?php echo e($productCategoryHoleSaw->title); ?>">
            </figure>
            <div>
              <h2><?php echo e($productCategoryHoleSaw->title); ?></h2>
              <?php if($productCategoryHoleSaw->products): ?>
                <div style="margin-bottom: 8px"><strong><?php echo e(__('page.label-products')); ?></strong></div>
                <div class="select-wrapper">
                  <select class="js-product-dd">
                    <option value="null"><?php echo e(__('page.label-select')); ?></option>
                    <?php $__currentLoopData = $productCategoryHoleSaw->products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <option value="<?php echo e(localized_route('page.product.show', ['slug' => AppHelper::slug($product->subtitle .'-'. $product->title), 'product' => $product->id])); ?>">
                        <?php echo e($product->subtitle); ?> <?php echo e($product->title); ?> <?php echo e($product->diameter); ?>

                      </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </select>
                </div>
              <?php endif; ?>
            </div>
          </div>
        <?php endif; ?>

      </div>
    <?php endif; ?>



  </div>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('web.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/marceli.to/Jamon.digital/Webroot/hydraulic-tools.ch/resources/views/web/pages/product/listing.blade.php ENDPATH**/ ?>