@extends('web.layout.app')
@section('seo_title', __('Cookies'))
@section('content')
<section class="content">
  <div class="privacy">
    <h1>{{ __('Cookies') }}</h1>
    <p class="sb-sm">{{ __('Zuletzt aktualisiert am 29. August 2023') }}</p>
    @include('web.pages.privacy.'. app()->getLocale() .'.cookies')
  </div>
</section>
@endsection