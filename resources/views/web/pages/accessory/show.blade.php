@extends('web.layout.app')
@section('seo_title', $accessory->category->title_singular . ' ' . $accessory->title)
@section('seo_description', '')
@section('content')
<section>
  <div>
    <header class="product-header">
      <h1>{{$accessory->title}}<br><em>{{ $accessory->e_no }}</em></h1>
      <a href="javascript:;" class="btn-back js-btn-back">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#009b68" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>
        <span>{{__('page.label-overview')}}</span>
      </a>
    </header>
    <div class="product">
      <p>{!! str_replace('mm2', 'mm<sup>2</sup>', $accessory->subtitle) !!}</p>
      <article>
        <div class="grid-3x1">
          <div>
            @if ($accessory->e_no)
              <p><strong>{{__('page.label-enumber')}}</strong><br>{{$accessory->e_no}}</p>
            @endif
            @if ($accessory->description)
              <h3>{{__('page.heading-technical-data')}}</h3>
              {!!  str_replace('mm2', 'mm<sup>2</sup>', $accessory->description) !!}
            @endif
          </div>
        </div>
        @if ($accessory->link_shop_ferratec)
          <div class="product__shop">
            <hr>
            <h3>{{__('page.heading-order-product')}}</h3>
            <div class="product__shop-buttons">
              <a href="{{$accessory->link_shop_ferratec}}" target="_blank" class="btn-primary">
                {{__('page.button-store')}}
              </a>
            </div>
          </div>
        @endif
        
        @if (isset($api_connection['hookurl']))
          <div class="product__shop">
            <hr>
            <h3>{{__('page.heading-order-product')}}</h3>
            <div class="product__shop-buttons">
              <form action="{{ $api_connection['hookurl'] }}" method="post" target="_blank" enctype="multipart/form-data"> 
                <input type="hidden" name="version" value="{{ $api_connection['version'] }}"/>
                <input type="hidden" name="country" value="{{ $api_connection['country'] }}"/>
                <input type="hidden" name="language" value="{{ $api_connection['language'] }}"/>
                <input type="hidden" name="result" value="{{ $accessory->form_data }}"/>
                <input type="submit" value="{{__('page.button-store')}} (elbridge)" class="btn-primary">
              </form>
            </div>
          </div>
        @endif

        @if ($accessory->publishedImages->count() > 0)
          <hr>
          <h3>{{__('page.heading-product-images')}}</h3>
          <div class="product__images">
            @foreach($accessory->publishedImages as $img)
              @if (!$img->preview)
                <figure>
                  <a href="{!! ImageHelper::fancybox($img) !!}" data-fancybox="gallery">
                    {!! ImageHelper::large($img, $img->caption) !!}
                  </a>
                </figure>
              @endif
            @endforeach
          </div>
        @endif

      </article>
    </div>
  </div>
</section>
@endsection