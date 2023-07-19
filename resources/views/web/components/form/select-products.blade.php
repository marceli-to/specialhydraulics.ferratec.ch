<div class="form-group @if ($errors->has($name)) has-error @endif">
  <div class="select-wrapper">
    <select name="{{ $name }}">
      <option value="null">{{$label}}</option>
      @foreach($products as $key => $group)
        <optgroup label="{{ $categories[$key-1]['title'][locale()] }} ">
        @foreach($group as $product)
          @if ($productId && $productId == $product->id)
            <option value="{{ $categories[$key-1]['title_singular'][locale()] }} {{$product->title}}" selected>
              {{$product->title}}
            </option>
          @else
            <option value="{{ $categories[$key-1]['title_singular'][locale()] }} {{$product->title}}">
              {{$product->title}}
            </option>
          @endif
        @endforeach
      @endforeach
    <select>
  </div>
</div>