@extends('layouts.lyt_gumadesk')
@section('metodosjs')
@include('jsViews.js_importaciones');
@endsection
@section('content')

<!-- ===============================================-->
<!--    Main Content-->
<!-- ===============================================-->
<main class="main" id="top">
    <div class="container-fluid" data-layout="container">
        <div class="content">
            @include('layouts.nav_gumadesk')
           
            <div class="card mb-3">
                <div class="card-header bg-light">
                  <div class="row flex-between-center">
                    <div class="col-sm-auto">
                      <h5 class="mb-2 mb-sm-0">Order #AD20294</h5>
                    </div>
                    <div class="col-sm-auto"><a class="btn btn-falcon-default btn-sm" href="#!"><span class="fas fa-plus me-2" data-fa-transform="shrink-2"></span>Add New Address </a></div>
                  </div>
                </div>
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-6 mb-3 mb-md-0">
                      <div class="form-check mb-0 custom-radio radio-select">
                        <input class="form-check-input" id="address-1" type="radio" name="clientName" checked="checked" />
                        <label class="form-check-label mb-0 fw-bold d-block" for="address-1">
                            Unidad de Negocio: UNIMARK
                            <span class="radio-select-content">
                                <span> 
                                    Factura. # : 00000,<br/>
                                    Recibo. # : 00000,<br/>
                                    Fecha Despacho : 00/00/0000
                                   
                                    <span class="d-block mb-0 pt-2"> Fecha Orden de Compra: 00/00/0000</span>
                                </span>
                            </span>
                        </label>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="position-relative">
                        <div class="form-check mb-0 custom-radio radio-select">
                          <input class="form-check-input" id="address-2" type="radio" name="clientName" />
                          <label class="form-check-label mb-0 fw-bold d-block" for="address-2">
                            Información<span class="radio-select-content"><span>
                                MIFIC : SI  <br/>
                                REGENCIA : SI, <br/>
                                MINSA: -----
                                <span class="d-block mb-0 pt-2 text-sm-center alert-success fw-bold">ESTADO : AQUI VA EL ESTADO</span>
                            </span>
                        </span>
                    
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            <div class="card mb-3">
                <div class="table-responsive scrollbar mt-4 fs--1">
                <table class="table table-striped border-bottom">
                    <thead class="light">
                    <tr class="bg-primary text-white dark__bg-1000">
                        <th class="border-0">Articulo</th>
                        <th class="border-0 text-center">Laboratorio</th>
                        <th class="border-0 text-center">Cantidad</th>                        
                        <th class="border-0 text-end">Precio. Farmacia</th>
                        <th class="border-0 text-end">Precio. Publico</th>
                        <th class="border-0 text-end">Precio. Institucion</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td class="align-middle">
                            <h6 class="mb-0 text-nowrap">NOMBRE DEL ARTICULO</h6>
                            <p class="mb-0">SKU: N/D</p>
                        </td>
                        <td class="align-middle text-center">NOMBRE LABORATORIO</td>
                        <td class="align-middle text-center">2</td>
                        <td class="align-middle text-end">C$ 00.00</td>
                        <td class="align-middle text-end">C$ 00.00</td>
                        <td class="align-middle text-end">C$ 00.00</td>
                    </tr>
                    <tr>
                        <td class="align-middle">
                            <h6 class="mb-0 text-nowrap">NOMBRE DEL ARTICULO</h6>
                            <p class="mb-0">SKU: N/D</p>
                        </td>
                        <td class="align-middle text-center">NOMBRE LABORATORIO</td>
                        <td class="align-middle text-center">1</td>
                        <td class="align-middle text-end">C$ 00.00</td>
                        <td class="align-middle text-end">C$ 00.00</td>
                        <td class="align-middle text-end">C$ 00.00</td>
                    </tr>
                    <tr>
                        <td class="align-middle">
                            <h6 class="mb-0 text-nowrap">NOMBRE DEL ARTICULO</h6>
                            <p class="mb-0">SKU: N/D</p>
                        </td>
                        <td class="align-middle text-center">NOMBRE LABORATORIO</td>
                        <td class="align-middle text-center">1</td>
                        <td class="align-middle text-end">C$ 00.00</td>
                        <td class="align-middle text-end">C$ 00.00</td>
                        <td class="align-middle text-end">C$ 00.00</td>
                    </tr>
                    <tr>
                        <td class="align-middle">
                            <h6 class="mb-0 text-nowrap">NOMBRE DEL ARTICULO</h6>
                            <p class="mb-0">SKU: N/D</p>
                        </td>
                        <td class="align-middle text-center">NOMBRE LABORATORIO</td>
                        <td class="align-middle text-center">1</td>
                        <td class="align-middle text-end">C$ 00.00</td>
                        <td class="align-middle text-end">C$ 00.00</td>
                        <td class="align-middle text-end">C$ 00.00</td>
                    </tr>
                    </tbody>
                </table>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="tab-content">
                        <div class="tab-pane preview-tab-pane active" >
                            <div class="mb-3">
                                <label class="form-label" for="exampleFormControlTextarea1">Comentarios</label>
                                <textarea class="form-control" id="id_" rows="3"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @include('layouts.footer_gumadesk')
        </div>
    </div>
</main>
@endsection('content')