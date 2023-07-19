<?php $__env->startSection('seo_title', __('page.heading-form-training')); ?>
<?php $__env->startSection('seo_description', ''); ?>
<?php $__env->startSection('content'); ?>
<section>
  <div>
    <h1>
      <?php echo e(__('page.heading-form-training')); ?>

      <span><?php echo e(__('page.heading-form-training-byline')); ?></span>
    </h1>
    <div class="form">
<!--
      <h2><?php echo e(__('page.heading-form-training-regular-trainings')); ?></h2>
      <p><?php echo __('page.text-form-training-regular-trainings'); ?></p>
-->
      <div class="sb-xxl">
        <h2><?php echo e(__('page.heading-form-training-individual-trainings')); ?></h2>
        <p><?php echo e(__('page.text-form-training-individual-trainings')); ?></p>
        <form method="POST" action="<?php echo e(localized_route('page.forms.training.submit')); ?>" class="contact">
          <?php echo csrf_field(); ?>
          <div>
            <h2><?php echo e(__('page.label-form-personal-details')); ?></h2>
             <?php if (isset($component)) { $__componentOriginalddfe6e9ba720630bcfd57925e273d1c2d438e971 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\TextField::class, ['label' => ''.e(__('page.form-label-name')).' *','type' => 'text','name' => 'name']); ?>
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
<?php $component = $__env->getContainer()->make(App\View\Components\TextField::class, ['label' => ''.e(__('page.form-label-firstname')).' *','type' => 'text','name' => 'firstname']); ?>
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
<?php $component = $__env->getContainer()->make(App\View\Components\TextField::class, ['label' => ''.e(__('page.form-label-company')).' *','type' => 'text','name' => 'company']); ?>
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
<?php $component = $__env->getContainer()->make(App\View\Components\TextField::class, ['label' => ''.e(__('page.form-label-phone')).' *','type' => 'text','name' => 'phone']); ?>
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
<?php $component = $__env->getContainer()->make(App\View\Components\TextField::class, ['label' => ''.e(__('page.form-label-email')).'<sup>1</sup> *','type' => 'email','name' => 'email','helper' => '<sup>1</sup>'.e(__('page.form-helper-email')).'']); ?>
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
          <div>
            <h3><?php echo e(__('page.heading-form-training-participants-and-date')); ?></h3>
             <?php if (isset($component)) { $__componentOriginalddfe6e9ba720630bcfd57925e273d1c2d438e971 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\TextField::class, ['label' => ''.e(__('page.label-form-participants')).' *','type' => 'number','min' => '10','name' => 'headcount']); ?>
<?php $component->withName('text-field'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['value' => '10']); ?>
<?php if (isset($__componentOriginalddfe6e9ba720630bcfd57925e273d1c2d438e971)): ?>
<?php $component = $__componentOriginalddfe6e9ba720630bcfd57925e273d1c2d438e971; ?>
<?php unset($__componentOriginalddfe6e9ba720630bcfd57925e273d1c2d438e971); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 
             <?php if (isset($component)) { $__componentOriginalddfe6e9ba720630bcfd57925e273d1c2d438e971 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\TextField::class, ['label' => ''.e(__('page.label-form-requested-date')).'*','type' => 'text','name' => 'date','css' => 'js-datepicker']); ?>
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
<?php echo $__env->make('web.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/marceli.to/Jamon.digital/Webroot/specialhydraulics.ferratec.ch/resources/views/web/pages/forms/training.blade.php ENDPATH**/ ?>