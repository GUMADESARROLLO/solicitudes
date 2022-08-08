

@component('mail::message')
# {{ $details['title'] }}

Estan son las ordenes de compran que han cambiado de estado


@component('mail::panel')
    Ordenes que cambiaron de estado
@endcomponent

## Ordenes de Compras:

@component('mail::table')
| Nº P.O       | Proveedor         | C02  |
| ------------- |:-------------:| --------:|
| Col 2 is      | Centered      | $10      |
| Col 3 is      | Right-Aligned | $20      |
@endcomponent


@component('mail::subcopy')
    This is a subcopy component
@endcomponent


Creado por,<br>
{{ config('app.name') }}
@endcomponent