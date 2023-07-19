@extends('web.layout.app')
@section('seo_title', strip_tags($category->title_singular))
@section('seo_description', '')
@section('content')
<section>
  <div>
    <h1>{!! $category->title_listing !!}</h1>
    @if ($products)
      <div class="products">
        @foreach($products as $product)
          @if ($product->previewImage->orientation == 'p')
            <div class="product-card is-portrait">
              <figure>
                @if ($product->previewImage)
                  {!! ImageHelper::large($product->previewImage, $product->previewImage->caption) !!}
                @endif
              </figure>
              <div>
                <h2>
                  {{$category->title_singular}} <em>{{$product->title}}</em>
                </h2>
                <div>{!! str_replace('mm2', 'mm<sup>2</sup>', $product->subtitle) !!}</div>
                <div>
                  <a href="{{ localized_route('page.product.show', ['slug' => AppHelper::slug($category->title_singular .'-'. $product->title), 'product' => $product->id]) }}" class="btn-primary">
                    {{__('page.label-select')}}
                  </a>
                </div>
              </div>
            </div>
          @else
            <div class="product-card is-landscape">
              <div>
                <h2>
                  {{$category->title_singular}} <em>{{$product->title}}</em>
                </h2>
                <figure>
                  @if ($product->previewImage)
                    {!! ImageHelper::large($product->previewImage, $product->previewImage->caption) !!}
                  @endif
                </figure>
                <div>{!! str_replace('mm2', 'mm<sup>2</sup>', $product->subtitle) !!}</div>
                <div>
                  <a href="{{ localized_route('page.product.show', ['slug' => AppHelper::slug($category->title_singular .'-'. $product->title), 'product' => $product->id]) }}" class="btn-primary">
                    {{__('page.label-select')}}
                  </a>
                </div>
              </div>
            </div>
          @endif
        @endforeach

        @if ($productCategoryHoleSaw)
          <div class="product-card is-portrait">
            <figure>
              <img src="/assets/img/{{$productCategoryHoleSaw->image}}" width="210" height="620" alt="{{$productCategoryHoleSaw->title}}">
            </figure>
            <div>
              <h2>{{$productCategoryHoleSaw->title}}</h2>
              @if ($productCategoryHoleSaw->products)
                <div style="margin-bottom: 8px"><strong>{{__('page.label-products')}}</strong></div>
                <div class="select-wrapper">
                  <select class="js-product-dd">
                    <option value="null">{{__('page.label-select')}}</option>
                    @foreach($productCategoryHoleSaw->products as $product)
                      <option value="{{ localized_route('page.product.show', ['slug' => AppHelper::slug($product->subtitle .'-'. $product->title), 'product' => $product->id]) }}">
                        {{$product->subtitle}} {{$product->title}} {{$product->diameter}}
                      </option>
                    @endforeach
                  </select>
                </div>
              @endif
            </div>
          </div>
        @endif

      </div>
    @endif



  </div>
</section>
@endsection