@extends('layouts.lyt_gumadesk')
@section('content')

<!-- ===============================================-->
<!--    Main Content-->
<!-- ===============================================-->
<main class="main" id="top">
    <div class="container-fluid" data-layout="container">
    <div class="content">
    @include('layouts.nav_gumadesk')
        <div class="card mb-3">
            <div class="card-body">
                <div class="table-responsive fs--1">
                <table class="table table-striped border-bottom">
                    <thead class="bg-200 text-900">
                        <tr>
                            <th class="border-0 text-center" >INGRESOS</th>
                            <th class="border-0 text-center" >FECHAS</th>
                            <th class="border-0 text-center" >-</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($Solicitud_Detalles as $s)
                            <tr class="border-200">
                                <td class="align-middle text-center">{{ $s['Cantidad'] }}</td>
                                <td class="align-middle text-center">{{ $s['Fecha'] }}</td>
                                <td class="align-middle text-center"><div class="col-auto d-flex align-items-center"><a class="rounded-2 text-700 d-flex align-items-center" href="../DelIngreso/{{ $s['id_ingreso'] }}/{{ $s['id_solicitud'] }}/" ><span class="ms-1 fas fa-trash text-danger" data-fa-transform="shrink-2" ></span><span class="ms-1">Borrar</span></a></div></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                </div>
                <div class="row g-0 justify-content-end">
                <div class="col-auto">
                    <table class="table table-sm table-borderless fs--1 text-end">
                    <tr class="border-top">
                        <th class="text-900">Total Ingreso:</th>
                        <td class="fw-semi-bold">900.00</td>
                    </tr>
                    </table>
                </div>
                </div>
            </div>
        </div>
        
        @include('layouts.footer_gumadesk')
    </div>
    
    </div>
</main>
<!-- ===============================================-->
<!--    End of Main Content-->
<!-- ===============================================-->
@endsection('content')