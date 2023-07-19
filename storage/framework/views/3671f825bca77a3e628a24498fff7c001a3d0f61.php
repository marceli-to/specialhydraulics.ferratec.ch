<?php $__env->startSection('seo_title', $product->category->title_singular . ' ' . $product->title); ?>
<?php $__env->startSection('seo_description', ''); ?>
<?php $__env->startSection('content'); ?>
<section>
  <div>
    <header class="product-header">
      <?php if($product->category->id == 4): ?>
        <h1>
          <?php echo e($product->subtitle); ?><br>
          <em><?php echo e($product->title); ?></em>
        </h1>
        <a href="javascript:;" class="btn-back js-btn-back">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#009b68" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>
          <span><?php echo e(__('page.label-overview')); ?></span>
        </a>
      <?php else: ?>
        <h1>
          <?php echo e($product->category->title_singular); ?><br>
          <em><?php echo e($product->title); ?></em>
        </h1>
        <a href="<?php echo e(localized_route('page.product.listing', ['slug' => $product->category->slug, 'productCategory' => $product->category->id])); ?>" class="btn-back">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#009b68" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>
          <span><?php echo e(__('page.label-overview')); ?></span>
        </a>
      <?php endif; ?>
    </header>
    <div class="product">
      <?php if($product->category->id != 4): ?>
        <p><?php echo str_replace('mm2', 'mm<sup>2</sup>', $product->subtitle); ?></p>
      <?php endif; ?>
      <article>
        <div class="grid-3x1">
          <div>
            <?php if($product->e_no): ?>
              <p><strong><?php echo e(__('page.label-enumber')); ?></strong><br><?php echo e($product->e_no); ?></p>
            
            <?php endif; ?>
            <?php if($product->description): ?>
              <h3><?php echo e(__('page.heading-technical-data')); ?></h3>
              <?php echo $product->description; ?>

            <?php endif; ?>
          </div>
        </div>
        <?php if($product->link_shop): ?>
          <div class="product__shop">
            <hr>
            <h3><?php echo e(__('page.heading-order-product')); ?></h3>
            <div class="product__shop-buttons">
              <a href="<?php echo e($product->link_shop); ?>" target="_blank" class="btn-primary">
                <?php echo e(__('page.button-store')); ?>

              </a>
            </div>
          </div>
        <?php endif; ?>

        <?php if(isset($api_connection['hookurl'])): ?>
          <div class="product__shop">
            <hr>
            <h3><?php echo e(__('page.heading-order-product')); ?></h3>
            <div class="product__shop-buttons">
              <form action="<?php echo e($api_connection['hookurl']); ?>" method="post" target="_blank" enctype="multipart/form-data"> 
                <input type="hidden" name="version" value="<?php echo e($api_connection['version']); ?>"/>
                <input type="hidden" name="country" value="<?php echo e($api_connection['country']); ?>"/>
                <input type="hidden" name="language" value="<?php echo e($api_connection['language']); ?>"/>
                <input type="hidden" name="result" value="<?php echo e($product->form_data); ?>"/>
                <input type="submit" value="<?php echo e(__('page.button-store')); ?> (elbridge)" class="btn-primary">
              </form>
            </div>
          </div>
        <?php endif; ?>

        <?php if($product->publishedImages->count() > 0): ?>
          <hr>
          <h3><?php echo e(__('page.heading-product-images')); ?> <strong><?php echo e($product->title); ?></strong></h3>
          <div class="product__images">
            <?php $__currentLoopData = $product->publishedImages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $img): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <?php if(!$img->preview): ?>
                <figure>
                  <a href="<?php echo ImageHelper::fancybox($img); ?>" data-fancybox="gallery">
                    <?php echo ImageHelper::large($img, $img->caption); ?>

                  </a>
                </figure>
              <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </div>
        <?php endif; ?>
        
        <?php if($accessories): ?>
          <?php echo $__env->make('web.partials.accessories', ['accessories' => $accessories, 'product' => $product], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>

        <?php if($consumables): ?>
          <?php echo $__env->make('web.partials.consumables', ['consumables' => $consumables, 'product' => $product], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>

        <?php if($product->code_youtube): ?>
          <hr>
          <h3><?php echo e(__('page.heading-training-videos')); ?></h3>
          <div class="product__media">
            <div>
              <div class="ratio-container">
                <?php echo $product->code_youtube; ?>

              </div>
            </div>
            <?php if($product->caption_youtube): ?>
              <div class="media-caption"><?php echo e($product->caption_youtube); ?></div>
            <?php endif; ?>
          </div>
        <?php endif; ?>
        <?php if($product->code_3d): ?>
          <hr>
          <h3><?php echo e(__('page.heading-3d-model')); ?></h3>
          <div class="product__media">
            <div>
              <div class="ratio-container">
                <?php echo $product->code_3d; ?>

              </div>
            </div>
            <?php if($product->caption_3d): ?>
              <div class="media-caption"><?php echo e($product->caption_3d); ?></div>
            <?php endif; ?>
          </div>
        <?php endif; ?>
        <?php if($product->category->id == '1'): ?>
          <hr>
          <h3><?php echo __('page.heading-webinar-crimping-stripping'); ?></h3>
          <div class="product__media">
            <div>
              <div class="ratio-container">
                <iframe width="560" height="315" src="https://www.youtube.com/embed/FYClvi4GDcU" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
              </div>
            </div>
          </div>
        <?php endif; ?>
        <?php if($product->category->id == '2'): ?>
          <hr>
          <h3><?php echo __('page.heading-webinar-sheet-perforation'); ?></h3>
          <div class="product__media">
            <div>
              <div class="ratio-container">
                <iframe width="560" height="315" src="https://www.youtube.com/embed/HKVwqHsa0GY" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
              </div>
            </div>
          </div>
        <?php endif; ?>
        <?php if($product->tools && $product->tools->count() > 0): ?>
          <?php echo $__env->make('web.partials.tools', ['product' => $product], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>
      </article>
    </div>
  </div>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('web.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/marceli.to/Jamon.digital/Webroot/hydraulic-tools.ch/resources/views/web/pages/product/show.blade.php ENDPATH**/ ?>