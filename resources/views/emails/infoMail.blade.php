

@component('mail::message')
# {{ $details['title'] }}



@component('mail::table')
| ORDEN COMPRA  | ARTICULO       | PROVEEDOR    | INFORMACION    |
| ------------- |:-------------:|:-------------:| :-------------:| 
@foreach ($details['dtArticu'] as $lst)
| {{$lst['num_po']}} | {{$lst['ARTICULO']}}| {{$lst['PROVEEDOR']}}  | {{$lst['INFORMACION']}} | 
@endforeach
@endcomponent



Creado por,<br>
{{ config('app.name') }}
@endcomponent