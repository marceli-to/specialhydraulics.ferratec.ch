@component('mail::message')
# Anfrage Rückruf

<p><strong>{{$data['firstname']}} {{$data['name']}}</strong> bittet um einen Rückruf:</p>

@component('mail::table')
|     |     |
| --- | --- |
| Produkt | {{$data['product'] != 'null' ? $data['product'] : '–' }} |
| Vorname, Name | {{$data['firstname']}} {{$data['name']}} |
| Firma | {{$data['company']}} |
| Telefon | {{$data['phone']}} |
| E-Mail | {{$data['email']}} |
| Gewünschter Termin | {{$data['date']}} |
@endcomponent

<p class="signature">
  Freundliche Grüsse<br>
  {{\Config::get('custom.company')}}
</p>
@endcomponent