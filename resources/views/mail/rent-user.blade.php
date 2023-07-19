@component('mail::message')
# {{__('page.mail-rent-title')}}

<p>{{__('page.mail-greetings')}} {{$data['firstname']}} {{$data['name']}}</p>
<p>{{__('page.mail-rent-text')}}</p>

@component('mail::table')
|     |     |
| --- | --- |
| {{__('page.mail-label-product')}}| {{$data['product']->title}} |
| {{__('page.mail-label-date-start')}} | {{$data['date-start']}} |
| {{__('page.mail-label-date-end')}} | {{$data['date-start']}} |
| {{__('page.mail-label-name')}}| {{$data['firstname']}} {{$data['name']}} |
| {{__('page.mail-label-company')}} | {{$data['company']}} |
| {{__('page.mail-label-phone')}} | {{$data['phone']}} |
| {{__('page.mail-label-email')}} | {{$data['email']}} |

@endcomponent

<p class="signature">
  {{__('page.mail-salutations')}} <br>
  {{\Config::get('custom.company')}}
</p>
@endcomponent