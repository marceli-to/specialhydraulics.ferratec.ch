<div class="form-group @if ($errors->has($name)) has-error @endif">
  @if($label ?? null)
    <label class="{{ ($required ?? false) ? 'is-required' : '' }}" for="{{ $name }}">
      {!! $label !!}
    </label>
  @endif
  <input
    class="{{ $css ?? '' }}"
    type="{{ $type ?? 'text' }}"
    name="{{ $name }}"
    placeholder="{{ $placeholder ?? '' }}"
    value="{{ old($name, $value ?? '') }}"
    {{ ($required ?? false) ? 'required' : '' }}

    @if ($autocomplete != 'false')
      autocomplete="off"
    @endif

    @if (isset($min))
      min="{{ $min ?? '' }}"
    @endif
  >
  @if ($helper)
    <div class="form-helper">{!! $helper !!}</div>
  @endif
</div>