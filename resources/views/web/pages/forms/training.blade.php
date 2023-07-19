@extends('web.layout.app')
@section('seo_title', __('page.heading-form-training'))
@section('seo_description', '')
@section('content')
<section>
  <div>
    <h1>
      {{__('page.heading-form-training')}}
      <span>{{__('page.heading-form-training-byline')}}</span>
    </h1>
    <div class="form">
<!--
      <h2>{{__('page.heading-form-training-regular-trainings')}}</h2>
      <p>{!! __('page.text-form-training-regular-trainings') !!}</p>
-->
      <div class="sb-xxl">
        <h2>{{__('page.heading-form-training-individual-trainings')}}</h2>
        <p>{{__('page.text-form-training-individual-trainings')}}</p>
        <form method="POST" action="{{ localized_route('page.forms.training.submit') }}" class="contact">
          @csrf
          <div>
            <h2>{{__('page.label-form-personal-details')}}</h2>
            <x-text-field label="{{__('page.form-label-name')}} *" type="text" name="name" />
            <x-text-field label="{{__('page.form-label-firstname')}} *" type="text" name="firstname" />
            <x-text-field label="{{__('page.form-label-company')}} *" type="text" name="company" />
            <x-text-field label="{{__('page.form-label-phone')}} *" type="text" name="phone" />
            <x-text-field label="{{__('page.form-label-email')}}<sup>1</sup> *" type="email" name="email" helper="<sup>1</sup>{{__('page.form-helper-email')}}" />
          </div>
          <div>
            <h3>{{__('page.heading-form-training-participants-and-date')}}</h3>
            <x-text-field label="{{__('page.label-form-participants')}} *" type="number" min="10" name="headcount" value="10" />
            <x-text-field label="{{__('page.label-form-requested-date')}}*" type="text" name="date" css="js-datepicker" />
            <div class="form-group">
              <x-button-submit name="submit" label="{{__('page.button-send')}}" />
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>
@endsection