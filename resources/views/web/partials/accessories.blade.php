<hr>
<h3>{{__('page.heading-product-accessories')}}</h3>
<div class="products products--accessories">
  @foreach($accessories as $group)
    <div class="product-card product-card--accessory is-landscape">
      <div>
        <h3>{{$group[0]->category->title}}</h3>
        <figure>
          @if ($group[0]->previewImage)
            <img src="/assets/img/{{$group[0]->category->image}}" width="210" height="620" alt="{{$group[0]->category->title}}">
          @endif
        </figure>
        <div>
          @if (count($group) == 1)
            <a href="{{ localized_route('page.accessory.show', ['slug' => AppHelper::slug($group[0]->title), 'accessory' => $group[0]->id]) }}" class="btn-primary is-sm">
              {{__('page.label-show')}}
            </a>
          @else
            <a 
              href="{{ localized_route('page.accessory.listing', ['slugProduct' => AppHelper::slug($product->title), 'product' => $product->id, 'slug' => AppHelper::slug($group[0]->category->title), 'accessoryCategory' => $group[0]->category->id]) }}" 
              class="btn-primary is-sm">
              {{__('page.label-show')}}
            </a>
          @endif
        </div>
      </div>
    </div>
  @endforeach
</div>