<nav class="site-menu js-menu">
  <div>
    <ul>
      <li>
        <a href="/{{locale()}}/{{__('page.slug-products')}}/{{__('page.slug-presswerkzeuge')}}/1" title="{{__('page.nav-presswerkzeuge')}}">{{__('page.nav-presswerkzeuge')}}</a>
      </li>
      <li>
        <a href="/{{locale()}}/{{__('page.slug-products')}}/{{__('page.slug-stanz-biegewerkzeuge')}}/2" title="{{__('page.nav-stanz-und-biegewerkzeuge')}}">{{__('page.nav-stanz-und-biegewerkzeuge')}}</a>
      </li>
      <li>
        <a href="/{{locale()}}/{{__('page.slug-products')}}/{{__('page.slug-schneidewerkzeuge')}}/3" title="{{__('page.nav-schneidewerkzeuge')}}">{{__('page.nav-schneidewerkzeuge')}}</a>
      </li>
      <li class="site-menu__language">
        @if (request()->routeIs('page.home'))
          <a href="/de/">DE</a>
          <a href="/fr/">FR</a>
          <a href="/it/">IT</a>
        @else
          <a href="{{current_route('de')}}">DE</a>
          <a href="{{current_route('fr')}}">FR</a>
          <a href="{{current_route('it')}}">IT</a>
        @endif
      </li>
    </ul>
  </div>
</nav>