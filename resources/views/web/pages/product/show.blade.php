@extends('web.layout.app')
@section('seo_title', $product->category->title_singular . ' ' . $product->title)
@section('seo_description', '')
@section('content')
<section>
  <div>
    <header class="product-header">
      @if ($product->category->id == 4)
        <h1>
          {{$product->subtitle}}<br>
          <em>{{$product->title}}</em>
        </h1>
        <a href="javascript:;" class="btn-back js-btn-back">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#009b68" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>
          <span>{{__('page.label-overview')}}</span>
        </a>
      @else
        <h1>
          {{$product->category->title_singular}}<br>
          <em>{{$product->title}}</em>
        </h1>
        <a href="{{ localized_route('page.product.listing', ['slug' => $product->category->slug, 'productCategory' => $product->category->id]) }}" class="btn-back">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#009b68" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>
          <span>{{__('page.label-overview')}}</span>
        </a>
      @endif
    </header>
    <div class="product">
      @if ($product->category->id != 4)
        <p>{!! str_replace('mm2', 'mm<sup>2</sup>', $product->subtitle) !!}</p>
      @endif
      <article>
        <div class="grid-3x1">
          <div>
            @if ($product->e_no)
              <p><strong>{{__('page.label-enumber')}}</strong><br>{{$product->e_no}}</p>
            {{-- @elseif ($product->article_no)
              <p><strong>{{__('page.label-enumber')}}</strong><br>{{$product->article_no}}</p> --}}
            @endif
            @if ($product->description)
              <h3>{{__('page.heading-technical-data')}}</h3>
              {!! $product->description !!}
            @endif
          </div>
        </div>
        @if (isset($api_connection['hookurl']))
          <div class="product__shop">
            <hr>
            <h3>{{__('page.heading-order-product')}}</h3>
            <div class="product__shop-buttons">
              <form action="{{ $api_connection['hookurl'] }}" method="post" target="_blank" enctype="multipart/form-data"> 
                <input type="hidden" name="version" value="{{ $api_connection['version'] }}"/>
                <input type="hidden" name="country" value="{{ $api_connection['country'] }}"/>
                <input type="hidden" name="language" value="{{ $api_connection['language'] }}"/>
                <input type="hidden" name="result" value="{{ $product->form_data }}"/>
                <input type="submit" value="{{__('page.button-basket')}}" class="btn-primary">
              </form>
            </div>
          </div>
        @else
          @if ($product->link_shop_ferratec)
            <div class="product__shop">
              <hr>
              <h3>{{__('page.heading-order-product')}}</h3>
              <div class="product__shop-buttons">
                <a href="{{$product->link_shop_ferratec}}" target="_blank" class="btn-primary">
                  {{__('page.button-store')}}
                </a>
              </div>
            </div>
          @endif
        @endif

        @if ($product->publishedImages->count() > 0)
          <hr>
          <h3>{{__('page.heading-product-images')}} <strong>{{$product->title}}</strong></h3>
          <div class="product__images">
            @foreach($product->publishedImages as $img)
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
        
        @if ($accessories)
          @include('web.partials.accessories', ['accessories' => $accessories, 'product' => $product])
        @endif

        @if ($consumables)
          @include('web.partials.consumables', ['consumables' => $consumables, 'product' => $product])
        @endif

        @if ($product->code_youtube)
          <hr>
          <h3>{{__('page.heading-training-videos')}}</h3>
          <div class="product__media">
            <div>
              <div class="ratio-container">
                {!! $product->code_youtube !!}
              </div>
            </div>
            @if ($product->caption_youtube)
              <div class="media-caption">{{$product->caption_youtube}}</div>
            @endif
          </div>
        @endif
        @if ($product->code_3d)
          <hr>
          <h3>{{__('page.heading-3d-model')}}</h3>
          <div class="product__media">
            <div>
              <div class="ratio-container">
                {!! $product->code_3d !!}
              </div>
            </div>
            @if ($product->caption_3d)
              <div class="media-caption">{{$product->caption_3d}}</div>
            @endif
          </div>
        @endif
        @if ($product->category->id == '1')
          <hr>
          <h3>{!!__('page.heading-webinar-crimping-stripping')!!}</h3>
          <div class="product__media">
            <div>
              <div class="ratio-container">
                <iframe width="560" height="315" src="https://www.youtube.com/embed/FYClvi4GDcU" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
              </div>
            </div>
          </div>
        @endif
        @if ($product->category->id == '2')
          <hr>
          <h3>{!!__('page.heading-webinar-sheet-perforation')!!}</h3>
          <div class="product__media">
            <div>
              <div class="ratio-container">
                <iframe width="560" height="315" src="https://www.youtube.com/embed/HKVwqHsa0GY" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
              </div>
            </div>
          </div>
        @endif
        {{-- @if ($product->tools && $product->tools->count() > 0)
          @include('web.partials.tools', ['product' => $product])
        @endif --}}
      </article>
    </div>
  </div>
</section>
@endsection