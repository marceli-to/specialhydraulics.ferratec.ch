@extends('web.layout.app')
@section('seo_title', __('page.heading-product-accessories'))
@section('content')
<section>
  <div>
    <h1>
      {{ $category->title }}
      @if ($category->description)
        <br><em>{{$category->description}}</em>
      @endif
    </h1>
    <div class="products">
      @if ($accessories)
        @foreach($accessories as $accessory)
          @if ($accessory->previewImage && $accessory->previewImage->orientation == 'p')
            <div class="product-card is-portrait">
              <figure>
                @if ($accessory->previewImage)
                  {!! ImageHelper::large($accessory->previewImage, $accessory->previewImage->caption) !!}
                @endif
              </figure>
              <div>
                <h2>{{$accessory->title}}</h2>
                <div>{!! str_replace('mm2', 'mm<sup>2</sup>', $accessory->subtitle) !!}</div>
                <div>
                  <a href="{{ localized_route('page.accessory.show', ['slug' => AppHelper::slug($accessory->title), 'accessory' => $accessory->id]) }}" class="btn-primary">
                    {{__('page.label-select')}}
                  </a>
                </div>
              </div>
            </div>
          @else
            <div class="product-card is-landscape">
              <div>
                <h2>{{$accessory->title}}</h2>
                <figure>
                  @if ($accessory->previewImage)
                    {!! ImageHelper::large($accessory->previewImage, $accessory->previewImage->caption) !!}
                  @endif
                </figure>
                <div>{!! str_replace('mm2', 'mm<sup>2</sup>', $accessory->subtitle) !!}</div>
                <div>
                  <a href="{{ localized_route('page.accessory.show', ['slug' => AppHelper::slug($category->title_singular .'-'. $accessory->title), 'accessory' => $accessory->id]) }}" class="btn-primary">
                    {{__('page.label-select')}}
                  </a>
                </div>
              </div>
            </div>
          @endif
        @endforeach
      @endif
      @if ($accessoriesWithVariants)
        <div class="product-card {{ $accessoriesWithVariants['items'][0]->previewImage->orientation == 'p' ? 'is-portrait' : 'is-landscape' }}">
          @if ($accessoriesWithVariants['items'][0]->previewImage->orientation == 'l')
            <h2>{{ $accessoriesWithVariants['title_first'] }} <strong>{{__('page.label-to')}}</strong> {{ $accessoriesWithVariants['title_last'] }}</h2>
          @endif
          <figure>
            @if ($accessoriesWithVariants['items'][0]->previewImage)
              {!! ImageHelper::large($accessoriesWithVariants['items'][0]->previewImage, $accessoriesWithVariants['items'][0]->previewImage->caption) !!}
            @endif
          </figure>
          <div>
          @if ($accessoriesWithVariants['items'][0]->previewImage->orientation == 'p')
            <h2>{{ $accessoriesWithVariants['title_first'] }} <strong>{{__('page.label-to')}}</strong> {{ $accessoriesWithVariants['title_last'] }}</h2>
          @endif
            <p>
              @if ($accessoriesWithVariants['items'])
                <div class="select-wrapper">
                  <select class="js-product-dd">
                    <option>{{__('page.label-press-area')}}</option>
                    @foreach($accessoriesWithVariants['items'] as $item)
                      <option value="{{ localized_route('page.accessory.show', ['slug' => AppHelper::slug($item->title), 'accessory' => $item->id]) }}">
                        {{$item->diameter}} mm2
                      </option>
                    @endforeach
                  </select>
                </div>
              @endif
            </p>
          </div>
        </div>
      @endif
    </div>
  </div>
</section>
@endsection