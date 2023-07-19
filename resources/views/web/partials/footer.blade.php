<a href="javascript:;" class="btn-cta-preview js-btn-cta is-hidden">
  <div>
    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevrons-down"><polyline points="7 13 12 18 17 13"></polyline><polyline points="7 6 12 11 17 6"></polyline></svg>
    <em>{{__('page.heading-get-in-touch')}}</em>
  </div>
</a>
<section class="cta js-wrapper-cta">
  <div>
    <h2>{{__('page.heading-how-can-we-help')}}</h2>
    <div class="cta__buttons">
      {{-- @if (request()->routeIs('*.page.product.show'))
        <a href="{{ localized_route('page.forms.callback', ['slug' => AppHelper::slug($product->title), 'product' => $product->id ]) }}" class="btn-cta" title="{{__('page.request-callback')}}">
          <svg width="36" height="36" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M33 25.38v4.5a3 3 0 0 1-3.27 3 29.685 29.685 0 0 1-12.945-4.605 29.25 29.25 0 0 1-9-9A29.685 29.685 0 0 1 3.18 6.27 3 3 0 0 1 6.165 3h4.5a3 3 0 0 1 3 2.58c.19 1.44.542 2.854 1.05 4.215a3 3 0 0 1-.675 3.165l-1.905 1.905a24 24 0 0 0 9 9l1.905-1.905a3 3 0 0 1 3.165-.675c1.36.508 2.775.86 4.215 1.05A3 3 0 0 1 33 25.38z" stroke="#009b68" stroke-width="2.25" stroke-linecap="round" stroke-linejoin="round"/></svg>
          <div>{!!__('page.request-callback-text')!!}</div>
        </a>
        <a href="{{ localized_route('page.forms.training', ['slug' => AppHelper::slug($product->title), 'product' => $product->id ]) }}" class="btn-cta" title="{{__('page.request-training')}}">
          <svg width="36" height="36" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M28.5 6h-21a3 3 0 0 0-3 3v21a3 3 0 0 0 3 3h21a3 3 0 0 0 3-3V9a3 3 0 0 0-3-3zM24 3v6M12 3v6M4.5 15h27" stroke="#009b68" stroke-width="2.25" stroke-linecap="round" stroke-linejoin="round"/></svg>
          <div>{!!__('page.request-training-text')!!}</div>
        </a>
        <a href="{{ localized_route('page.forms.presentation', ['slug' => AppHelper::slug($product->title), 'product' => $product->id ]) }}" class="btn-cta" title="{{__('page.request-presentation')}}">
          <svg width="36" height="36" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M33.81 9.63a4.17 4.17 0 0 0-2.91-3C28.32 6 18 6 18 6S7.68 6 5.1 6.69a4.17 4.17 0 0 0-2.91 3 43.5 43.5 0 0 0-.69 7.935 43.5 43.5 0 0 0 .69 7.995A4.17 4.17 0 0 0 5.1 28.5c2.58.69 12.9.69 12.9.69s10.32 0 12.9-.69a4.171 4.171 0 0 0 2.91-3c.468-2.599.7-5.235.69-7.875a43.498 43.498 0 0 0-.69-7.995z" stroke="#009b68" stroke-width="2.25" stroke-linecap="round" stroke-linejoin="round"/><path d="M14.625 22.53l8.625-4.905-8.625-4.905v9.81z" stroke="#009b68" stroke-width="2.25" stroke-linecap="round" stroke-linejoin="round"/></svg>
          <div>{!!__('page.request-presentation-text')!!}</div>
        </a>
      @else
        <a href="{{ localized_route('page.forms.callback') }}" class="btn-cta" title="Rückruf">
          <svg width="36" height="36" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M33 25.38v4.5a3 3 0 0 1-3.27 3 29.685 29.685 0 0 1-12.945-4.605 29.25 29.25 0 0 1-9-9A29.685 29.685 0 0 1 3.18 6.27 3 3 0 0 1 6.165 3h4.5a3 3 0 0 1 3 2.58c.19 1.44.542 2.854 1.05 4.215a3 3 0 0 1-.675 3.165l-1.905 1.905a24 24 0 0 0 9 9l1.905-1.905a3 3 0 0 1 3.165-.675c1.36.508 2.775.86 4.215 1.05A3 3 0 0 1 33 25.38z" stroke="#009b68" stroke-width="2.25" stroke-linecap="round" stroke-linejoin="round"/></svg>
          <div>{!!__('page.request-callback-text')!!}</div>
        </a>
        <a href="{{ localized_route('page.forms.training') }}" class="btn-cta" title="Anfrage Schulung">
          <svg width="36" height="36" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M28.5 6h-21a3 3 0 0 0-3 3v21a3 3 0 0 0 3 3h21a3 3 0 0 0 3-3V9a3 3 0 0 0-3-3zM24 3v6M12 3v6M4.5 15h27" stroke="#009b68" stroke-width="2.25" stroke-linecap="round" stroke-linejoin="round"/></svg>
          <div>{!!__('page.request-training-text')!!}</div>
        </a>
        <a href="{{ localized_route('page.forms.presentation') }}" class="btn-cta" title="Anfrage Präsentation">
          <svg width="36" height="36" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M33.81 9.63a4.17 4.17 0 0 0-2.91-3C28.32 6 18 6 18 6S7.68 6 5.1 6.69a4.17 4.17 0 0 0-2.91 3 43.5 43.5 0 0 0-.69 7.935 43.5 43.5 0 0 0 .69 7.995A4.17 4.17 0 0 0 5.1 28.5c2.58.69 12.9.69 12.9.69s10.32 0 12.9-.69a4.171 4.171 0 0 0 2.91-3c.468-2.599.7-5.235.69-7.875a43.498 43.498 0 0 0-.69-7.995z" stroke="#009b68" stroke-width="2.25" stroke-linecap="round" stroke-linejoin="round"/><path d="M14.625 22.53l8.625-4.905-8.625-4.905v9.81z" stroke="#009b68" stroke-width="2.25" stroke-linecap="round" stroke-linejoin="round"/></svg>
          <div>{!!__('page.request-presentation-text')!!}</div>
        </a>
      @endif --}}
      <a href="javascript:;" class="btn-cta js-btn-livechat">
        <svg width="36" height="36" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M31.5 17.25a12.57 12.57 0 0 1-1.35 5.7A12.751 12.751 0 0 1 18.75 30a12.57 12.57 0 0 1-5.7-1.35L4.5 31.5l2.85-8.55A12.57 12.57 0 0 1 6 17.25a12.75 12.75 0 0 1 7.05-11.4 12.57 12.57 0 0 1 5.7-1.35h.75a12.72 12.72 0 0 1 12 12v.75z" stroke="#009b68" stroke-width="2.25" stroke-linecap="round" stroke-linejoin="round"/></svg>
        <div>{!!__('page.request-livechat-text')!!}</div>
      </a>
 
      @if (request()->routeIs('*.page.product.show'))
        <a href="{{ localized_route('page.forms.training', ['slug' => AppHelper::slug($product->title), 'product' => $product->id ]) }}" class="btn-cta" title="{{__('page.request-training')}}">
          <svg width="36" height="36" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M28.5 6h-21a3 3 0 0 0-3 3v21a3 3 0 0 0 3 3h21a3 3 0 0 0 3-3V9a3 3 0 0 0-3-3zM24 3v6M12 3v6M4.5 15h27" stroke="#009b68" stroke-width="2.25" stroke-linecap="round" stroke-linejoin="round"/></svg>
          <div>{!!__('page.request-training-text')!!}</div>
        </a>
      @else
        <a href="{{ localized_route('page.forms.training') }}" class="btn-cta" title="Anfrage Schulung">
          <svg width="36" height="36" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M28.5 6h-21a3 3 0 0 0-3 3v21a3 3 0 0 0 3 3h21a3 3 0 0 0 3-3V9a3 3 0 0 0-3-3zM24 3v6M12 3v6M4.5 15h27" stroke="#009b68" stroke-width="2.25" stroke-linecap="round" stroke-linejoin="round"/></svg>
          <div>{!!__('page.request-training-text')!!}</div>
        </a>
      @endif
      <a href="{{ localized_route('page.forms.rent') }}" class="btn-cta" title="Anfrage Produktemiete">
        <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 24 24" fill="none" stroke="#009b68" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-bag"><path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path><line x1="3" y1="6" x2="21" y2="6"></line><path d="M16 10a4 4 0 0 1-8 0"></path></svg>
        <div>{!!__('page.request-rent-text')!!}</div>
      </a>
    </div>
  </div>
</section>
<footer class="site-footer">
  <div>
    <p>Copyright © {{date('Y', time())}} {{\Config::get('custom.company')}}<br>{!!__('page.copyright')!!}</p>
    <p><strong>FERRATEC TECHNICS AG</strong><br>Grossmattstrasse 19<br>8964 Rudolfstetten<br>Telefon +41 56 649 21 21<br>Fax +41 56 649 21 41<br><a href="mailto:info@ferratec.ch">info@ferratec.ch</a></p>
  </div>
</footer>
<script src="{{ mix('assets/js/app.js') }}" type="text/javascript"></script>
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
</html>