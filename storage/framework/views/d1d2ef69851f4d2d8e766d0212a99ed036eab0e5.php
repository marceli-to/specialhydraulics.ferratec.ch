<?php $__env->startComponent('mail::message'); ?>
# Anfrage Produktemiete

<p><strong><?php echo e($data['firstname']); ?> <?php echo e($data['name']); ?></strong> hat Interesse an einer Produktemiete:</p>

<?php $__env->startComponent('mail::table'); ?>
|     |     |
| --- | --- |
| Produkt | <?php echo e($data['product']->title); ?> |
| Mietbeginn | <?php echo e($data['date-start']); ?> |
| Mietende | <?php echo e($data['date-end']); ?> |
| Vorname, Name | <?php echo e($data['firstname']); ?> <?php echo e($data['name']); ?> |
| Firma | <?php echo e($data['company']); ?> |
| Telefon | <?php echo e($data['phone']); ?> |
| E-Mail | <?php echo e($data['email']); ?> |
<?php if (isset($__componentOriginal20cb600a4a4149597e6997e789a6c2fa917d1906)): ?>
<?php $component = $__componentOriginal20cb600a4a4149597e6997e789a6c2fa917d1906; ?>
<?php unset($__componentOriginal20cb600a4a4149597e6997e789a6c2fa917d1906); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>

<p class="signature">
  Freundliche Grüsse<br>
  <?php echo e(\Config::get('custom.company')); ?>

</p>
<?php if (isset($__componentOriginal2dab26517731ed1416679a121374450d5cff5e0d)): ?>
<?php $component = $__componentOriginal2dab26517731ed1416679a121374450d5cff5e0d; ?>
<?php unset($__componentOriginal2dab26517731ed1416679a121374450d5cff5e0d); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?><?php /**PATH /Users/marceli.to/Jamon.digital/Webroot/hydraulic-tools.ch/resources/views/mail/rent-owner.blade.php ENDPATH**/ ?>