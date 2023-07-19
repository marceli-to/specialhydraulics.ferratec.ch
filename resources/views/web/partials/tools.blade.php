<hr>
<h3>{{__('page.heading-product-tools')}}</h3>
<div class="products products--preview">
  @foreach($product->tools as $tool)
    <div class="product-card product-card--tool is-landscape">
      <div>
        <h3>{{$tool->title}}</h3>
        <figure>
          @if ($tool->previewImage)
            {!! ImageHelper::large($tool->previewImage, $tool->previewImage->caption) !!}
          @endif
        </figure>
        <div>
          <a href="{{ localized_route('page.tool.show', ['slug' => AppHelper::slug($tool->title), 'tool' => $tool->id]) }}" class="btn-primary is-sm">
            {{__('page.label-show')}}
          </a>
        </div>
      </div>
    </div>
  @endforeach
</div>