@extends('web.layout.app')
@section('seo_title', __('Datenschutzerklärung'))
@section('content')
<section class="content">
  <div class="privacy">
    <h1>{{ __('Datenschutzerklärung') }}</h1>
    <p class="sb-sm">{{ __('Zuletzt aktualisiert am 29. August 2023') }}</p>
    @include('web.pages.privacy.'. app()->getLocale() .'.privacy')
  </div>
</section>
@endsection