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
      
      <a href="javascript:;" class="btn-cta js-btn-livechat">
        <svg width="36" height="36" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M31.5 17.25a12.57 12.57 0 0 1-1.35 5.7A12.751 12.751 0 0 1 18.75 30a12.57 12.57 0 0 1-5.7-1.35L4.5 31.5l2.85-8.55A12.57 12.57 0 0 1 6 17.25a12.75 12.75 0 0 1 7.05-11.4 12.57 12.57 0 0 1 5.7-1.35h.75a12.72 12.72 0 0 1 12 12v.75z" stroke="#009b68" stroke-width="2.25" stroke-linecap="round" stroke-linejoin="round"/></svg>
        <div><?php echo __('page.request-livechat-text'); ?></div>
      </a>
 
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
    <p>Intercable GmbH<br>Rienzfeldstrasse, 21<br>I-39031 Bruneck<br><br>Phone +39 0474 571 700<br>Fax +39 0474 555 511</p>
  </div>
</footer>
<script src="<?php echo e(mix('assets/js/app.js')); ?>" type="text/javascript"></script>
<script>
  window.intercomSettings = {
    app_id: "bqaelhed",
    custom_launcher_selector: ".js-btn-livechat"
  };
</script>
<script>
(function(){var w=window;var ic=w.Intercom;if(typeof ic==="function"){ic('reattach_activator');ic('update',w.intercomSettings);}else{var d=document;var i=function(){i.c(arguments);};i.q=[];i.c=function(args){i.q.push(args);};w.Intercom=i;var l=function(){var s=d.createElement('script');s.type='text/javascript';s.async=true;s.src='https://widget.intercom.io/widget/bqaelhed';var x=d.getElementsByTagName('script')[0];x.parentNode.insertBefore(s,x);};if(w.attachEvent){w.attachEvent('onload',l);}else{w.addEventListener('load',l,false);}}})();
</script>
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
</html><?php /**PATH /Users/marceli.to/Jamon.digital/Webroot/hydraulic-tools.ch/resources/views/web/partials/footer.blade.php ENDPATH**/ ?>