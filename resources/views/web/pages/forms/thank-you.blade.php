@extends('web.layout.app')
@section('seo_title', __('page.heading-thank-you'))
@section('seo_description', '')
@section('content')
<section>
  <div>
    <h1>{{__('page.heading-thank-you')}}</h1>
    <div class="sb-lg">
      <p>{{__('page.text-thank-you')}}</p>
    </div>
  </div>
</section>
@endsection