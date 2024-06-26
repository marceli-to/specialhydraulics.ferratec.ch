<a href="javascript:;" class="btn-cta-preview js-btn-cta is-hidden">
  <div>
    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevrons-down"><polyline points="7 13 12 18 17 13"></polyline><polyline points="7 6 12 11 17 6"></polyline></svg>
    <em><?php echo e(__('page.heading-get-in-touch')); ?></em>
  </div>
</a>
<section class="cta js-wrapper-cta">
  <div>
    <h2><?php echo e(__('page.heading-how-can-we-help')); ?></h2>
    <div class="cta__buttons">
      
      
 
      <?php if(request()->routeIs('*.page.product.show')): ?>
        <a href="<?php echo e(localized_route('page.forms.training', ['slug' => AppHelper::slug($product->title), 'product' => $product->id ])); ?>" class="btn-cta" title="<?php echo e(__('page.request-training')); ?>">
          <svg width="36" height="36" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M28.5 6h-21a3 3 0 0 0-3 3v21a3 3 0 0 0 3 3h21a3 3 0 0 0 3-3V9a3 3 0 0 0-3-3zM24 3v6M12 3v6M4.5 15h27" stroke="#009b68" stroke-width="2.25" stroke-linecap="round" stroke-linejoin="round"/></svg>
          <div><?php echo __('page.request-training-text'); ?></div>
        </a>
      <?php else: ?>
        <a href="<?php echo e(localized_route('page.forms.training')); ?>" class="btn-cta" title="Anfrage Schulung">
          <svg width="36" height="36" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M28.5 6h-21a3 3 0 0 0-3 3v21a3 3 0 0 0 3 3h21a3 3 0 0 0 3-3V9a3 3 0 0 0-3-3zM24 3v6M12 3v6M4.5 15h27" stroke="#009b68" stroke-width="2.25" stroke-linecap="round" stroke-linejoin="round"/></svg>
          <div><?php echo __('page.request-training-text'); ?></div>
        </a>
      <?php endif; ?>
      <a href="<?php echo e(localized_route('page.forms.rent')); ?>" class="btn-cta" title="Anfrage Produktemiete">
        <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 24 24" fill="none" stroke="#009b68" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-bag"><path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path><line x1="3" y1="6" x2="21" y2="6"></line><path d="M16 10a4 4 0 0 1-8 0"></path></svg>
        <div><?php echo __('page.request-rent-text'); ?></div>
      </a>
    </div>
  </div>
</section>
<footer class="site-footer">
  <div>
    <p>Copyright © <?php echo e(date('Y', time())); ?> <?php echo e(\Config::get('custom.company')); ?><br><?php echo __('page.copyright'); ?></p>
    <p><strong>FERRATEC TECHNICS AG</strong><br>Grossmattstrasse 19<br>8964 Rudolfstetten<br>Telefon +41 56 649 21 21<br>Fax +41 56 649 21 41<br><a href="mailto:info@ferratec.ch">info@ferratec.ch</a></p>
    <div class="copy">
      <nav>
        <ul>
          <li>
            <a href="<?php echo e(localized_route('page.privacy')); ?>"><?php echo e(__('Datenschutzerklärung')); ?></a>
          </li>
          <li>
            <a href="<?php echo e(localized_route('page.cookies')); ?>"><?php echo e(__('Cookies')); ?></a>
          </li>
        </ul>
      </nav>
    </div>
  </div>
</footer>
<script src="<?php echo e(mix('assets/js/app.js')); ?>" type="text/javascript"></script>
<script type="text/javascript">
  var _paq = window._paq = window._paq || [];
  /* tracker methods like "setCustomDimension" should be called before "trackPageView" */
  _paq.push(['trackPageView']);
  _paq.push(['enableLinkTracking']);
  (function() {
    var u="https://stat.ferratec.ch/";
    _paq.push(['setTrackerUrl', u+'matomo.php']);
    _paq.push(['setSiteId', '7']);
    var d=document, g=d.createElement('script'), s=d.getElementsByTagName('script')[0];
    g.type='text/javascript'; g.async=true; g.src=u+'matomo.js'; s.parentNode.insertBefore(g,s);
  })();
</script>
</body>
<!-- made with ❤ by marceli.to -->
</html><?php /**PATH /Users/marceli.to/Jamon.digital/Webroot/specialhydraulics.ferratec.ch/resources/views/web/partials/footer.blade.php ENDPATH**/ ?>