@component('mail::message')
# Anfrage Produktemiete

<p><strong>{{$data['firstname']}} {{$data['name']}}</strong> hat Interesse an einer Produktemiete:</p>

@component('mail::table')
|     |     |
| --- | --- |
| Produkt | {{$data['product']->title}} |
| Mietbeginn | {{$data['date-start']}} |
| Mietende | {{$data['date-end']}} |
| Vorname, Name | {{$data['firstname']}} {{$data['name']}} |
| Firma | {{$data['company']}} |
| Telefon | {{$data['phone']}} |
| E-Mail | {{$data['email']}} |
@endcomponent

<p class="signature">
  Freundliche Grüsse<br>
  {{\Config::get('custom.company')}}
</p>
@endcomponent