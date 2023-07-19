<nav class="site-menu js-menu">
  <div>
    <ul>
      <li>
        <a href="/<?php echo e(locale()); ?>/<?php echo e(__('page.slug-products')); ?>/<?php echo e(__('page.slug-presswerkzeuge')); ?>/1" title="<?php echo e(__('page.nav-presswerkzeuge')); ?>"><?php echo e(__('page.nav-presswerkzeuge')); ?></a>
      </li>
      <li>
        <a href="/<?php echo e(locale()); ?>/<?php echo e(__('page.slug-products')); ?>/<?php echo e(__('page.slug-stanz-biegewerkzeuge')); ?>/2" title="<?php echo e(__('page.nav-stanz-und-biegewerkzeuge')); ?>"><?php echo e(__('page.nav-stanz-und-biegewerkzeuge')); ?></a>
      </li>
      <li>
        <a href="/<?php echo e(locale()); ?>/<?php echo e(__('page.slug-products')); ?>/<?php echo e(__('page.slug-schneidewerkzeuge')); ?>/3" title="<?php echo e(__('page.nav-schneidewerkzeuge')); ?>"><?php echo e(__('page.nav-schneidewerkzeuge')); ?></a>
      </li>
      <li class="site-menu__language">
        <?php if(request()->routeIs('page.home')): ?>
          <a href="/de/">DE</a>
          <a href="/fr/">FR</a>
          <a href="/it/">IT</a>
        <?php else: ?>
          <a href="<?php echo e(current_route('de')); ?>">DE</a>
          <a href="<?php echo e(current_route('fr')); ?>">FR</a>
          <a href="<?php echo e(current_route('it')); ?>">IT</a>
        <?php endif; ?>
      </li>
    </ul>
  </div>
</nav><?php /**PATH /Users/marceli.to/Jamon.digital/Webroot/specialhydraulics.ferratec.ch/resources/views/web/partials/nav.blade.php ENDPATH**/ ?>