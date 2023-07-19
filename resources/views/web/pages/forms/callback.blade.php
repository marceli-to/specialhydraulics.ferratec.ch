@extends('web.layout.app')
@section('seo_title', __('page.heading-form-callback'))
@section('seo_description', '')
@section('content')
<section>
  <div>
    <h1>
      {{__('page.heading-form-callback')}}
      <span>{{__('page.heading-form-callback-byline')}}</span>
    </h1>
    <div class="form">
      <form method="POST" action="{{ localized_route('page.forms.callback.submit') }}" class="contact">
        @csrf
        <div>
          <h2>{{__('page.label-form-personal-details')}}</h2>
          <x-text-field label="{{__('page.form-label-name')}} *" type="text" name="name" />
          <x-text-field label="{{__('page.form-label-firstname')}} *" type="text" name="firstname" />
          <x-text-field label="{{__('page.form-label-company')}} *" type="text" name="company" />
          <x-text-field label="{{__('page.form-label-phone')}} *" type="text" name="phone" />
          <x-text-field label="{{__('page.form-label-email')}}<sup>1</sup> *" type="email" name="email" helper="<sup>1</sup>{{__('page.form-helper-email')}}" />
        </div>
        <div>
          <h2>{{__('page.label-form-requested-date')}}</h2>
          <x-text-field label="{{__('page.form-label-datetime-callback')}}*" type="text" name="date" css="js-datetimepicker" />
          <h2>{{__('page.label-choose-product')}}</h2>
          <x-select-products name="product" label="{{__('page.label-please-choose')}}" productId="{{isset($product) ? $product->id : null}}" />
          <div class="form-group">
            <x-button-submit name="submit" label="{{__('page.button-send')}}" />
          </div>
        </div>
      </form>
    </div>
  </div>
</section>
@endsection