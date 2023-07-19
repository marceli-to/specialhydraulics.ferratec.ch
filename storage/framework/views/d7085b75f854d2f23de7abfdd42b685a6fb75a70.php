<?php $__env->startSection('seo_title', 'Login'); ?>
<?php $__env->startSection('seo_description', ''); ?>
<?php $__env->startSection('content'); ?>
<section>
  <div>
    <h1>Login</h1>
    <div class="form">
      <?php if($errors->any()): ?>
         <?php if (isset($component)) { $__componentOriginald4c8f106e1e33ab85c5d037c2504e2574c1b0975 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Alert::class, ['type' => 'danger','message' => ''.e(__('messages.general_error')).'']); ?>
<?php $component->withName('alert'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if (isset($__componentOriginald4c8f106e1e33ab85c5d037c2504e2574c1b0975)): ?>
<?php $component = $__componentOriginald4c8f106e1e33ab85c5d037c2504e2574c1b0975; ?>
<?php unset($__componentOriginald4c8f106e1e33ab85c5d037c2504e2574c1b0975); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 
      <?php endif; ?>
      <form method="POST" class="auth" action="<?php echo e(route('login')); ?>">
        <?php echo csrf_field(); ?>
         <?php if (isset($component)) { $__componentOriginalddfe6e9ba720630bcfd57925e273d1c2d438e971 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\TextField::class, ['label' => 'E-Mail','type' => 'email','name' => 'email','autocomplete' => 'false']); ?>
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
<?php $component = $__env->getContainer()->make(App\View\Components\TextField::class, ['label' => 'Passwort','type' => 'password','name' => 'password','autocomplete' => 'false']); ?>
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
        <div class="form-buttons align-justify">
          <?php if(Route::has('password.request')): ?>
            <a href="<?php echo e(route('password.request')); ?>" class="form-helper">Passwort vergessen?</a>
          <?php endif; ?>
           <?php if (isset($component)) { $__componentOriginal7fcc76179725c81866e553f66bac35293fdd291a = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\ButtonSubmit::class, ['name' => 'submit','label' => 'Absenden']); ?>
<?php $component->withName('button-submit'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['btnClass' => 'js-btn-loader']); ?>
<?php if (isset($__componentOriginal7fcc76179725c81866e553f66bac35293fdd291a)): ?>
<?php $component = $__componentOriginal7fcc76179725c81866e553f66bac35293fdd291a; ?>
<?php unset($__componentOriginal7fcc76179725c81866e553f66bac35293fdd291a); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 
        </div>
      </form>
    </div>
  </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('web.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/marceli.to/Jamon.digital/Webroot/specialhydraulics.ferratec.ch/resources/views/auth/login.blade.php ENDPATH**/ ?>