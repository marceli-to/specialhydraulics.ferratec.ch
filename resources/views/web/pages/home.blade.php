@extends('web.layout.app')
@section('seo_title', 'Immer wieder Intelligent – Die intelligente Verpressung von Intercable.')
@section('seo_description', 'Immer wieder Intelligent – Die intelligente Verpressung von Intercable.')
@section('content')
<section class="content">
  <div>
    <h1>
      {!!__('page.claim')!!}
      {!!__('page.claim-byline')!!}
    </h1>
    <div class="products">
      @if ($categories)
        @foreach($categories as $category)
          <div class="product-card product-card--home is-portrait">
            <figure>
              <img src="/assets/img/{{$category->image}}" width="210" height="620" alt="{{$category->title}}">
            </figure>
            <div>
              <h2>{{$category->title}}</h2>
              <span class="word-break">{!! $category->description !!}</span>
              <p>
                @if ($category->products)
                  <div class="select-wrapper">
                    <select class="js-product-dd">
                      
                      @if ($category->id == 1)
                        <option>{{__('page.label-press-area')}}</option>
                      @elseif ($category->id == 2)
                        <option>{{__('page.label-max-strength')}}</option>
                      @elseif ($category->id == 3)
                        <option>{{__('page.label-max-diameter')}}</option>
                      @else
                        <option>{{__('page.label-diameter')}}</option>
                      @endif
                      @foreach($category->products->sortBy('order') as $product)
                        @if ($product->publish)
                          @if ($category->id == 1)
                            <option value="{{ localized_route('page.product.show', ['slug' => AppHelper::slug($category->title_singular .'-'. $product->title), 'product' => $product->id]) }}">{{$product->diameter}} mm2</option>
                          @elseif ($category->id == 2)
                            <option value="{{ localized_route('page.product.show', ['slug' => AppHelper::slug($category->title_singular .'-'. $product->title), 'product' => $product->id]) }}">{{$product->diameter}} mm</option>
                          @elseif ($category->id == 3)
                            <option value="{{ localized_route('page.product.show', ['slug' => AppHelper::slug($category->title_singular .'-'. $product->title), 'product' => $product->id]) }}">{{$product->diameter}} mm</option>
                          @else
                            <option value="{{ localized_route('page.product.show', ['slug' => AppHelper::slug($category->title_singular .'-'. $product->title), 'product' => $product->id]) }}">{{$product->diameter}} mm2</option>
                          @endif
                        @endif
                      @endforeach
                    </select>
                  </div>
                @endif
              </p>
              <p>
                <a href="{{ localized_route('page.product.listing', ['slug' => $category->slug, 'productCategory' => $category->id]) }}">
                  {{__('page.label-show-all')}}
                </a>
              </p>
            </div>
          </div>
        @endforeach
      @endif
    </div>
  </div>
</section>
@endsection