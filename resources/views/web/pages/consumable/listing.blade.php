@extends('web.layout.app')
@section('seo_title', __('page.heading-product-consumables'))
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
      @if ($consumables)
        @foreach($consumables as $consumable)
          @if ($consumable->previewImage->orientation == 'p')
            <div class="product-card is-portrait">
              <figure>
                @if ($consumable->previewImage)
                  {!! ImageHelper::large($consumable->previewImage, $consumable->previewImage->caption) !!}
                @endif
              </figure>
              <div>
                <h2>{{$consumable->title}}</h2>
                <div>{!! str_replace('mm2', 'mm<sup>2</sup>', $consumable->subtitle) !!}</div>
                <div>
                  <a href="{{ localized_route('page.consumable.show', ['slug' => AppHelper::slug($consumable->title), 'consumable' => $consumable->id]) }}" class="btn-primary">
                    {{__('page.label-select')}}
                  </a>
                </div>
              </div>
            </div>
          @else
            <div class="product-card is-landscape">
              <div>
                <h2>{{$consumable->title}}</h2>
                <figure>
                  @if ($consumable->previewImage)
                    {!! ImageHelper::large($consumable->previewImage, $consumable->previewImage->caption) !!}
                  @endif
                </figure>
                <div>{!! str_replace('mm2', 'mm<sup>2</sup>', $consumable->subtitle) !!}</div>
                <div>
                  <a href="{{ localized_route('page.consumable.show', ['slug' => AppHelper::slug($category->title_singular .'-'. $consumable->title), 'consumable' => $consumable->id]) }}" class="btn-primary">
                    {{__('page.label-select')}}
                  </a>
                </div>
              </div>
            </div>
          @endif
        @endforeach
      @endif
      @if ($consumablesWithVariants)
        <div class="product-card {{ $consumablesWithVariants['items'][0]->previewImage->orientation == 'p' ? 'is-portrait' : 'is-landscape' }}">
          @if ($consumablesWithVariants['items'][0]->previewImage->orientation == 'l')
            <h2>{{ $consumablesWithVariants['title_first'] }} <strong>{{__('page.label-to')}}</strong> {{ $consumablesWithVariants['title_last'] }}</h2>
          @endif
          <figure>
            @if ($consumablesWithVariants['items'][0]->previewImage)
              {!! ImageHelper::large($consumablesWithVariants['items'][0]->previewImage, $consumablesWithVariants['items'][0]->previewImage->caption) !!}
            @endif
          </figure>
          <div>
          @if ($consumablesWithVariants['items'][0]->previewImage->orientation == 'p')
            <h2>{{ $consumablesWithVariants['title_first'] }} <strong>{{__('page.label-to')}}</strong> {{ $consumablesWithVariants['title_last'] }}</h2>
          @endif
            <p>
              @if ($consumablesWithVariants['items'])
                <div class="select-wrapper">
                  <select class="js-product-dd">
                    <option>{{__('page.label-press-area')}}</option>
                    @foreach($consumablesWithVariants['items'] as $item)
                      <option value="{{ localized_route('page.consumable.show', ['slug' => AppHelper::slug($item->title), 'consumable' => $item->id]) }}">
                        {{$item->drilling}} {{ $item->unit ? $item->unit : 'mm2' }}
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