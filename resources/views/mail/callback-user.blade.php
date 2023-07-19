@component('mail::message')
# {{__('page.mail-callback-title')}}

<p>{{__('page.mail-greetings')}} {{$data['firstname']}} {{$data['name']}}</p>
<p>{{__('page.mail-callback-text')}} </p>

@component('mail::table')
|     |     |
| --- | --- |
| {{__('page.mail-label-product')}} | {{$data['product'] != 'null' ? $data['product'] : '–' }} |
| {{__('page.mail-label-name')}} | {{$data['firstname']}} {{$data['name']}} |
| {{__('page.mail-label-company')}} | {{$data['company']}} |
| {{__('page.mail-label-phone')}} | {{$data['phone']}} |
| {{__('page.mail-label-email')}} | {{$data['email']}} |
| {{__('page.mail-label-requested-date')}} | {{$data['date']}} |
@endcomponent

<p class="signature">
  {{__('page.mail-salutations')}} <br>
  {{\Config::get('custom.company')}}
</p>
@endcomponent