<div class="form-group <?php if($errors->has($name)): ?> has-error <?php endif; ?>">
  <?php if($label ?? null): ?>
    <label class="<?php echo e(($required ?? false) ? 'is-required' : ''); ?>" for="<?php echo e($name); ?>">
      <?php echo $label; ?>

    </label>
  <?php endif; ?>
  <input
    class="<?php echo e($css ?? ''); ?>"
    type="<?php echo e($type ?? 'text'); ?>"
    name="<?php echo e($name); ?>"
    placeholder="<?php echo e($placeholder ?? ''); ?>"
    value="<?php echo e(old($name, $value ?? '')); ?>"
    <?php echo e(($required ?? false) ? 'required' : ''); ?>


    <?php if($autocomplete != 'false'): ?>
      autocomplete="off"
    <?php endif; ?>

    <?php if(isset($min)): ?>
      min="<?php echo e($min ?? ''); ?>"
    <?php endif; ?>
  >
  <?php if($helper): ?>
    <div class="form-helper"><?php echo $helper; ?></div>
  <?php endif; ?>
</div><?php /**PATH /Users/marceli.to/Jamon.digital/Webroot/specialhydraulics.ferratec.ch/resources/views/web/components/form/text-field.blade.php ENDPATH**/ ?>