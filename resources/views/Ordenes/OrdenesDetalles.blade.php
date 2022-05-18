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
        <div class="bg-holder d-none d-lg-block bg-card" style="background-image:url(../../../assets/img/icons/spot-illustrations/corner-4.png);opacity: 0.7;">
        </div>
        <!--/.bg-holder-->

        <div class="card-body position-relative">
            <h5>Solciitud: #2737</h5>
            <p class="fs--1">April 21, 2019</p>
            <div><strong class="me-2">Transito: </strong>
            <div class="badge rounded-pill badge-soft-success fs--2">Completed<span class="fas fa-check ms-1" data-fa-transform="shrink-2"></span></div>
            </div>
        </div>
        </div>
        
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
                        <tr class="border-200">
                            <td class="align-middle text-center">300.00</td>
                            <td class="align-middle text-center">0000/00/00</td>
                            <td class="align-middle text-center"><span class="ms-1 fas fa-trash text-danger" data-fa-transform="shrink-2" ></span></td>
                        </tr>
                        <tr class="border-200">                    
                            <td class="align-middle text-center">300.00</td>
                            <td class="align-middle text-center">0000/00/00</td>
                            <td class="align-middle text-center"><span class="ms-1 fas fa-trash text-danger" data-fa-transform="shrink-2" ></span></td>
                        </tr>
                        <tr>                        
                            <td class="align-middle text-center">300.00</td>
                            <td class="align-middle text-center">0000/00/00</td>
                            <td class="align-middle text-center"><span class="ms-1 fas fa-trash text-danger" data-fa-transform="shrink-2" ></span></td>
                        </tr>
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
        <div class="card mb-3">
            <div class="card-body">                
                <div class="mb-3">
                    <label class="form-label" for="exampleFormControlTextarea1">Comentarios</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                </div>
            </div>
            <div class="card-footer bg-light py-2">
                  <div class="row flex-between-center">
                    <div class="col-auto">
                     
                    </div>
                    <div class="col-auto"><a class="btn btn-sm btn-primary" href="#!">Guardar</a></div>
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