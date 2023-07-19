@extends('web.layout.app')
@section('seo_title', __('page.heading-form-rent'))
@section('seo_description', '')
@section('content')
<section>
  <div>
    <h1>
      {{__('page.heading-form-rent')}}
      <span>{{__('page.heading-form-rent-byline')}}</span>
    </h1>
    <div class="form form--product-rent">
      <div class="sb-xxl">
        <p>{!! __('page.text-form-rent-product') !!}</p>

        <form method="POST" action="{{ localized_route('page.forms.rent.submit') }}" class="product-rent js-rent-form">
          @csrf
          <div>
            <h2 class="sb-xxl">{{__('page.heading-form-rent-select-product')}}</h2>
            <div class="error-message js-error-productId" style="display:none">
              <p>{{__('page.error-form-rent-product')}}</p>
            </div>
            <div class="products">
              <input type="hidden" name="product_id" value="">
              @foreach($products as $product)
                @if ($product->previewImage->orientation == 'p')
                  <div class="product-card is-portrait"  class="">
                    <figure>
                      @if ($product->previewImage)
                        {!! ImageHelper::large($product->previewImage, $product->previewImage->caption) !!}
                      @endif
                    </figure>
                    <div>
                      <h2>
                        {{$product->title}}
                      </h2>
                      <div>{!! str_replace('mm2', 'mm<sup>2</sup>', $product->subtitle) !!}</div>
                      <div>
                        <a href="javascript:;" data-product="{{ $product->id }}" class="btn-primary js-product">
                          {{__('page.label-select')}}
                        </a>
                      </div>
                    </div>
                  </div>
                @else
                  <div class="product-card is-landscape">
                    <div>
                      <h2>
                        {{$product->title}}
                      </h2>
                      <figure>
                        @if ($product->previewImage)
                          {!! ImageHelper::large($product->previewImage, $product->previewImage->caption) !!}
                        @endif
                      </figure>
                      <div>{!! str_replace('mm2', 'mm<sup>2</sup>', $product->subtitle) !!}</div>
                      <div>
                        <a href="javascript:;" data-product="{{ $product->id }}" class="btn-primary js-product">
                          {{__('page.label-select')}}
                        </a>
                      </div>
                    </div>
                  </div>
                @endif
              @endforeach
            </div>

            <h2>{{__('page.heading-form-rent-periode')}}</h2>

            <div class="form-group">
              <div class="error-message js-error-periode" style="display:none">
                <p>{{__('page.error-form-rent-periode')}}</p>
              </div>
              <label class="sa-sm">{{__('page.label-form-rent-periode')}}*</label>
              <div class="select-wrapper">
                <select name="rent-periode" class="js-select-periode">
                  <option value="">{{__('page.label-form-rent-periode-select')}}</option>
                  <option value="365">1 Jahr</option>
                  <option value="30">1 Monat</option>
                  <option value="7">1 Woche</option>
                <select>
              </div>
            </div>
            <div class="js-wrapper-dates" style="display:none">
              <x-text-field label="{{__('page.label-form-rent-start-date')}}*" type="text" name="date-start" css="js-datepicker js-input-date-start" />
              <x-text-field label="{{__('page.label-form-rent-end-date')}} *" type="text" name="date-end" css="is-disabled js-input-date-end" />
            </div>
            <h2>{{__('page.label-form-personal-details')}}</h2>
            <x-text-field label="{{__('page.form-label-firstname')}} *" type="text" name="firstname" css="js-error-firstname" />
            <x-text-field label="{{__('page.form-label-name')}} *" type="text" name="name" css="js-error-name" />
            <x-text-field label="{{__('page.form-label-company')}} *" type="text" name="company" css="js-error-company" />
            <x-text-field label="{{__('page.form-label-phone')}} *" type="text" name="phone" css="js-error-phone" />
            <x-text-field label="{{__('page.form-label-email')}} *" type="email" name="email" css="js-error-email" />
            <div class="form-group">
              <x-button-submit name="submit" label="{{__('page.button-send')}}" />
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>
@endsection