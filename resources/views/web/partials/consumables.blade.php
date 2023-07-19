<hr>
<h3>{{__('page.heading-product-consumables')}}</h3>
<div class="products products--consumables">
  @foreach($consumables as $group)
    <div class="product-card product-card--consumable is-landscape">
      <div>
        <h3>{{$group[0]->category->title}}</h3>
        <figure>
          @if ($group[0]->previewImage)
            <img src="/assets/img/{{$group[0]->category->image}}" width="210" height="620" alt="{{$group[0]->category->title}}">
          @endif
        </figure>
        <div>
          @if (count($group) == 1)
            <a href="{{ localized_route('page.consumable.show', ['slug' => AppHelper::slug($group[0]->title), 'consumable' => $group[0]->id]) }}" class="btn-primary is-sm">
              {{__('page.label-show')}}
            </a>
          @else
            <a 
              href="{{ localized_route('page.consumable.listing', ['slugProduct' => AppHelper::slug($product->title), 'product' => $product->id, 'slug' => AppHelper::slug($group[0]->category->title), 'consumableCategory' => $group[0]->category->id]) }}" 
              class="btn-primary is-sm">
              {{__('page.label-show')}}
            </a>
          @endif
        </div>
      </div>
    </div>
  @endforeach
</div>