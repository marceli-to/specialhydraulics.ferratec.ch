@component('mail::message')
# Anfrage Produkteschulung

<p><strong>{{$data['firstname']}} {{$data['name']}}</strong> bittet um einen Termnin für eine Produkteschulung:</p>

@component('mail::table')
|     |     |
| --- | --- |
| Vorname, Name | {{$data['firstname']}} {{$data['name']}} |
| Firma | {{$data['company']}} |
| Telefon | {{$data['phone']}} |
| E-Mail | {{$data['email']}} |
| Anzahl Teilnehmer | {{$data['headcount']}} |
| Gewünschter Termin | {{$data['date']}} |
@endcomponent

<p class="signature">
  Freundliche Grüsse<br>
  {{\Config::get('custom.company')}}
</p>
@endcomponent