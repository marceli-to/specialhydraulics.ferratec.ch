<?php $__env->startSection('seo_title', $accessory->category->title_singular . ' ' . $accessory->title); ?>
<?php $__env->startSection('seo_description', ''); ?>
<?php $__env->startSection('content'); ?>
<section>
  <div>
    <header class="product-header">
      <h1><?php echo e($accessory->title); ?><br><em><?php echo e($accessory->e_no); ?></em></h1>
      <a href="javascript:;" class="btn-back js-btn-back">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#009b68" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>
        <span><?php echo e(__('page.label-overview')); ?></span>
      </a>
    </header>
    <div class="product">
      <p><?php echo str_replace('mm2', 'mm<sup>2</sup>', $accessory->subtitle); ?></p>
      <article>
        <div class="grid-3x1">
          <div>
            <?php if($accessory->e_no): ?>
              <p><strong><?php echo e(__('page.label-enumber')); ?></strong><br><?php echo e($accessory->e_no); ?></p>
            <?php endif; ?>
            <?php if($accessory->description): ?>
              <h3><?php echo e(__('page.heading-technical-data')); ?></h3>
              <?php echo str_replace('mm2', 'mm<sup>2</sup>', $accessory->description); ?>

            <?php endif; ?>
          </div>
        </div>
        <?php if($accessory->link_shop_ferratec): ?>
          <div class="product__shop">
            <hr>
            <h3><?php echo e(__('page.heading-order-product')); ?></h3>
            <div class="product__shop-buttons">
              <a href="<?php echo e($accessory->link_shop_ferratec); ?>" target="_blank" class="btn-primary">
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
                <input type="hidden" name="result" value="<?php echo e($accessory->form_data); ?>"/>
                <input type="submit" value="<?php echo e(__('page.button-store')); ?> (elbridge)" class="btn-primary">
              </form>
            </div>
          </div>
        <?php endif; ?>

        <?php if($accessory->publishedImages->count() > 0): ?>
          <hr>
          <h3><?php echo e(__('page.heading-product-images')); ?></h3>
          <div class="product__images">
            <?php $__currentLoopData = $accessory->publishedImages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $img): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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

      </article>
    </div>
  </div>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('web.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/marceli.to/Jamon.digital/Webroot/specialhydraulics.ferratec.ch/resources/views/web/pages/accessory/show.blade.php ENDPATH**/ ?>