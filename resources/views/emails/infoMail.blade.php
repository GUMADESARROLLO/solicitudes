

@component('mail::message')
# {{ $details['title'] }}

Estan son las ordenes de compran que han cambiado de estado


@component('mail::panel')
    Ordenes que cambiaron de estado
@endcomponent

## Ordenes de Compras:

@component('mail::table')
| ORDEN COMPRA  | ARTICULO       | PROVEEDOR    | INFORMACION    |
| ------------- |:-------------:|:-------------:| :-------------:| 
@foreach ($details['dtArticu'] as $lst)
| {{$lst['num_po']}} | {{$lst['ARTICULO']}}| {{$lst['PROVEEDOR']}}  | {{$lst['INFORMACION']}} | 
@endforeach
@endcomponent





@component('mail::subcopy')
    This is a subcopy component
@endcomponent


Creado por,<br>
{{ config('app.name') }}
@endcomponent