<?php $__env->startSection('seo_title', __('page.heading-form-rent')); ?>
<?php $__env->startSection('seo_description', ''); ?>
<?php $__env->startSection('content'); ?>
<section>
  <div>
    <h1>
      <?php echo e(__('page.heading-form-rent')); ?>

      <span><?php echo e(__('page.heading-form-rent-byline')); ?></span>
    </h1>
    <div class="form form--product-rent">
      <div class="sb-xxl">
        <p><?php echo __('page.text-form-rent-product'); ?></p>

        <form method="POST" action="<?php echo e(localized_route('page.forms.rent.submit')); ?>" class="product-rent js-rent-form">
          <?php echo csrf_field(); ?>
          <div>
            <h2 class="sb-xxl"><?php echo e(__('page.heading-form-rent-select-product')); ?></h2>
            <div class="error-message js-error-productId" style="display:none">
              <p><?php echo e(__('page.error-form-rent-product')); ?></p>
            </div>
            <div class="products">
              <input type="hidden" name="product_id" value="">
              <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($product->previewImage->orientation == 'p'): ?>
                  <div class="product-card is-portrait"  class="">
                    <figure>
                      <?php if($product->previewImage): ?>
                        <?php echo ImageHelper::large($product->previewImage, $product->previewImage->caption); ?>

                      <?php endif; ?>
                    </figure>
                    <div>
                      <h2>
                        <?php echo e($product->title); ?>

                      </h2>
                      <div><?php echo str_replace('mm2', 'mm<sup>2</sup>', $product->subtitle); ?></div>
                      <div>
                        <a href="javascript:;" data-product="<?php echo e($product->id); ?>" class="btn-primary js-product">
                          <?php echo e(__('page.label-select')); ?>

                        </a>
                      </div>
                    </div>
                  </div>
                <?php else: ?>
                  <div class="product-card is-landscape">
                    <div>
                      <h2>
                        <?php echo e($product->title); ?>

                      </h2>
                      <figure>
                        <?php if($product->previewImage): ?>
                          <?php echo ImageHelper::large($product->previewImage, $product->previewImage->caption); ?>

                        <?php endif; ?>
                      </figure>
                      <div><?php echo str_replace('mm2', 'mm<sup>2</sup>', $product->subtitle); ?></div>
                      <div>
                        <a href="javascript:;" data-product="<?php echo e($product->id); ?>" class="btn-primary js-product">
                          <?php echo e(__('page.label-select')); ?>

                        </a>
                      </div>
                    </div>
                  </div>
                <?php endif; ?>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>

            <h2><?php echo e(__('page.heading-form-rent-periode')); ?></h2>

            <div class="form-group">
              <div class="error-message js-error-periode" style="display:none">
                <p><?php echo e(__('page.error-form-rent-periode')); ?></p>
              </div>
              <label class="sa-sm"><?php echo e(__('page.label-form-rent-periode')); ?>*</label>
              <div class="select-wrapper">
                <select name="rent-periode" class="js-select-periode">
                  <option value=""><?php echo e(__('page.label-form-rent-periode-select')); ?></option>
                  <option value="365">1 Jahr</option>
                  <option value="30">1 Monat</option>
                  <option value="7">1 Woche</option>
                <select>
              </div>
            </div>
            <div class="js-wrapper-dates" style="display:none">
               <?php if (isset($component)) { $__componentOriginalddfe6e9ba720630bcfd57925e273d1c2d438e971 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\TextField::class, ['label' => ''.e(__('page.label-form-rent-start-date')).'*','type' => 'text','name' => 'date-start','css' => 'js-datepicker js-input-date-start']); ?>
<?php $component->withName('text-field'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if (isset($__componentOriginalddfe6e9ba720630bcfd57925e273d1c2d438e971)): ?>
<?php $component = $__componentOriginalddfe6e9ba720630bcfd57925e273d1c2d438e971; ?>
<?php unset($__componentOriginalddfe6e9ba720630bcfd57925e273d1c2d438e971); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 
               <?php if (isset($component)) { $__componentOriginalddfe6e9ba720630bcfd57925e273d1c2d438e971 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\TextField::class, ['label' => ''.e(__('page.label-form-rent-end-date')).' *','type' => 'text','name' => 'date-end','css' => 'is-disabled js-input-date-end']); ?>
<?php $component->withName('text-field'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if (isset($__componentOriginalddfe6e9ba720630bcfd57925e273d1c2d438e971)): ?>
<?php $component = $__componentOriginalddfe6e9ba720630bcfd57925e273d1c2d438e971; ?>
<?php unset($__componentOriginalddfe6e9ba720630bcfd57925e273d1c2d438e971); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 
            </div>
            <h2><?php echo e(__('page.label-form-personal-details')); ?></h2>
             <?php if (isset($component)) { $__componentOriginalddfe6e9ba720630bcfd57925e273d1c2d438e971 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\TextField::class, ['label' => ''.e(__('page.form-label-firstname')).' *','type' => 'text','name' => 'firstname','css' => 'js-error-firstname']); ?>
<?php $component->withName('text-field'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if (isset($__componentOriginalddfe6e9ba720630bcfd57925e273d1c2d438e971)): ?>
<?php $component = $__componentOriginalddfe6e9ba720630bcfd57925e273d1c2d438e971; ?>
<?php unset($__componentOriginalddfe6e9ba720630bcfd57925e273d1c2d438e971); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 
             <?php if (isset($component)) { $__componentOriginalddfe6e9ba720630bcfd57925e273d1c2d438e971 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\TextField::class, ['label' => ''.e(__('page.form-label-name')).' *','type' => 'text','name' => 'name','css' => 'js-error-name']); ?>
<?php $component->withName('text-field'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if (isset($__componentOriginalddfe6e9ba720630bcfd57925e273d1c2d438e971)): ?>
<?php $component = $__componentOriginalddfe6e9ba720630bcfd57925e273d1c2d438e971; ?>
<?php unset($__componentOriginalddfe6e9ba720630bcfd57925e273d1c2d438e971); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 
             <?php if (isset($component)) { $__componentOriginalddfe6e9ba720630bcfd57925e273d1c2d438e971 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\TextField::class, ['label' => ''.e(__('page.form-label-company')).' *','type' => 'text','name' => 'company','css' => 'js-error-company']); ?>
<?php $component->withName('text-field'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if (isset($__componentOriginalddfe6e9ba720630bcfd57925e273d1c2d438e971)): ?>
<?php $component = $__componentOriginalddfe6e9ba720630bcfd57925e273d1c2d438e971; ?>
<?php unset($__componentOriginalddfe6e9ba720630bcfd57925e273d1c2d438e971); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 
             <?php if (isset($component)) { $__componentOriginalddfe6e9ba720630bcfd57925e273d1c2d438e971 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\TextField::class, ['label' => ''.e(__('page.form-label-phone')).' *','type' => 'text','name' => 'phone','css' => 'js-error-phone']); ?>
<?php $component->withName('text-field'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if (isset($__componentOriginalddfe6e9ba720630bcfd57925e273d1c2d438e971)): ?>
<?php $component = $__componentOriginalddfe6e9ba720630bcfd57925e273d1c2d438e971; ?>
<?php unset($__componentOriginalddfe6e9ba720630bcfd57925e273d1c2d438e971); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 
             <?php if (isset($component)) { $__componentOriginalddfe6e9ba720630bcfd57925e273d1c2d438e971 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\TextField::class, ['label' => ''.e(__('page.form-label-email')).' *','type' => 'email','name' => 'email','css' => 'js-error-email']); ?>
<?php $component->withName('text-field'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if (isset($__componentOriginalddfe6e9ba720630bcfd57925e273d1c2d438e971)): ?>
<?php $component = $__componentOriginalddfe6e9ba720630bcfd57925e273d1c2d438e971; ?>
<?php unset($__componentOriginalddfe6e9ba720630bcfd57925e273d1c2d438e971); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 
            <div class="form-group">
               <?php if (isset($component)) { $__componentOriginal7fcc76179725c81866e553f66bac35293fdd291a = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\ButtonSubmit::class, ['name' => 'submit','label' => ''.e(__('page.button-send')).'']); ?>
<?php $component->withName('button-submit'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if (isset($__componentOriginal7fcc76179725c81866e553f66bac35293fdd291a)): ?>
<?php $component = $__componentOriginal7fcc76179725c81866e553f66bac35293fdd291a; ?>
<?php unset($__componentOriginal7fcc76179725c81866e553f66bac35293fdd291a); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('web.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/marceli.to/Jamon.digital/Webroot/specialhydraulics.ferratec.ch/resources/views/web/pages/forms/rent.blade.php ENDPATH**/ ?>