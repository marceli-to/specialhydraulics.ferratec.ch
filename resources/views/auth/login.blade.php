@extends('web.layout.app')
@section('seo_title', 'Login')
@section('seo_description', '')
@section('content')
<section>
  <div>
    <h1>Login</h1>
    <div class="form">
      @if ($errors->any())
        <x-alert type="danger" message="{{__('messages.general_error')}}" />
      @endif
      <form method="POST" class="auth" action="{{ route('login') }}">
        @csrf
        <x-text-field label="E-Mail" type="email" name="email" autocomplete="false" />
        <x-text-field label="Passwort" type="password" name="password" autocomplete="false" />
        <div class="form-buttons align-justify">
          @if (Route::has('password.request'))
            <a href="{{ route('password.request') }}" class="form-helper">Passwort vergessen?</a>
          @endif
          <x-button-submit name="submit" label="Absenden" btnClass="js-btn-loader" />
        </div>
      </form>
    </div>
  </div>
</section>
@endsection
