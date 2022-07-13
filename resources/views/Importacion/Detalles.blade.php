@extends('layouts.lyt_gumadesk')
@section('metodosjs')
@include('jsViews.js_Orden_Detalles');
@endsection
@section('content')
<!-- ===============================================-->
<!--    Main Content-->
<!-- ===============================================-->
<main class="main" id="top">
    <div class="container-fluid" data-layout="container">
        <div class="content">
            @include('layouts.nav_gumadesk')



            <div class="row g-3 mb-3">
            <div class="col-md-10 col-xxl-10">
           
              <div class="card">
                <div class="card-header">
                  <div class="row flex-between-center">
                    <div class="col-auto">
                      <h5 class="mb-2">P.O. NO. : # {{ $Orden_Detalles[0]->num_po }} </h5>
                    </div>
                    <div class="col-auto mt-2">
                      <div class="row g-sm-4">
                        <div class="col-12 col-sm-auto">
                          <div class="mb-3 pe-4 border-sm-end border-200">
                            <h6 class="fs--2 text-600 mb-1">Factura NO.: </h6>
                            <div class="d-flex align-items-center">
                              <h5 class="fs-0 text-900 mb-0 me-2">00000</h5>
                            </div>
                          </div>
                        </div>
                        <div class="col-12 col-sm-auto">
                          <div class="mb-3 pe-4 border-sm-end border-200">
                            <h6 class="fs--2 text-600 mb-1">RECIBO NO.:</h6>
                            <div class="d-flex align-items-center">
                              <h5 class="fs-0 text-900 mb-0 me-2">0000</h5>
                            </div>
                          </div>
                        </div>                        
                        <div class="col-12 col-sm-auto">
                        <div class="mb-3 pe-4 border-sm-end border-200">
                            <h6 class="fs--2 text-600 mb-1 ">Via</h6>
                            <div class="d-flex align-items-center">
                            <h5 class="fs-0 text-900 mb-0 me-2">0000</h5>
                            </div>
                          </div>
                        </div>
                        <div class="col-12 col-sm-auto">
                        <div class="mb-3 pe-4 border-sm-end border-200">
                            <h6 class="fs--2 text-600 mb-1">Status</h6>
                            <div class="d-flex align-items-center">
                            <div class="badge rounded-pill badge-soft-success fs--2">Despachado<span class="fas fa-check ms-1" data-fa-transform="shrink-2"></span></div>
                            </div>
                          </div>
                        </div>
                        <div class="col-12 col-sm-auto">
                        <div class="mb-3 pe-4 border-sm-end border-200">
                            <h6 class="fs--2 text-600 mb-1">Estado de pago</h6>
                            <div class="d-flex align-items-center">
                            <div class="badge rounded-pill badge-soft-success fs--2">Pagado<span class="fas fa-check ms-1" data-fa-transform="shrink-2"></span></div>
                            </div>
                          </div>
                        </div>
                        <div class="col-12 col-sm-auto">
                          <div class="mb-3 pe-0">
                            <h6 class="fs--2 text-600 mb-1">Carga</h6>
                            <div class="d-flex align-items-center">
                            <div class="badge rounded-pill badge-soft-success fs--2"> Consolidada<span class="fas fa-check ms-1" data-fa-transform="shrink-2"></span></div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="card-body py-5 py-sm-3">
                  <div class="row g-5 g-sm-0">
                    <div class="col-sm-6">
                      <div class="border-sm-end border-300">
                      <h5 class="mb-3 fs-0">VENDOR</h5>
                        <h6 class="mb-2">{{ $Orden_Detalles[0]->Vendor->nombre_vendor }}</h6>
                        <p class="mb-1 fs--1">
                          {{ $Orden_Detalles[0]->Vendor->Descripcion }}
                      </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="border-sm-end border-300 text-center">
                        <h5 class="mb-3 fs-0">SHIP TO</h5>
                        <h6 class="mb-2">{{ $Orden_Detalles[0]->proveedor->nombre_shipto }}</h6>
                        <p class="mb-0 fs--1">{{ $Orden_Detalles[0]->proveedor->Descripcion }}</p>
                                              
                        </div>
                    </div>
                  </div>
                </div>
                <div class="card-footer">
                    <div class="row align-items-center">
                    <div class="w-100">
                        <div class="row fs--1 fw-semi-bold text-500 g-0">
                            <div class="col-auto d-flex align-items-center pe-3"><span class="dot bg-primary"></span><span>MIFIC </span><span class="d-none d-md-inline-block d-lg-block d-xxl-inline-block">( SI )</span></div>
                            <div class="col-auto d-flex align-items-center pe-3"><span class="dot bg-info"></span><span>REGENCIA </span><span class="d-none d-md-inline-block d-lg-block d-xxl-inline-block">( SI )</span></div>
                            <div class="col-auto d-flex align-items-center pe-3"><span class="dot bg-success"></span><span>MINSA </span><span class="d-none d-md-inline-block d-lg-block d-xxl-inline-block">( SI )</span></div>
                            <div class="col-auto d-flex align-items-center"><span class="dot bg-200"></span><span> Vendedor / Fabricante  </span><span class="d-none d-md-inline-block d-lg-block d-xxl-inline-block m"> --- <span></div>
                            
                        </div>
                    </div>
                    </div>
                </div>
              </div>
            </div>
            <div class="col-md-2 col-xxl-2">
              <div class="card h-100">
                <div class="card-body pb-0">
                  <div class="mx-ncard">
                  <div class="px-3">
                    <ul class="list-unstyled mt-3 scrollbar management-calendar-events" id="management-calendar-events">
                        <li class="border-topmb-3 pb-1 cursor-pointer" data-calendar-events="">
                            <div class="border-start border-3 border-primary ps-3 mt-1">
                            <h6 class="mb-1 fw-semi-bold text-700"> Fecha Despacho </h6>
                            <p class="fs--2 text-600 mb-0">07 Jul, 2022</p>
                            </div>
                        </li> 
                        <li class="border-top pt-3 mb-3 pb-1 cursor-pointer" data-calendar-events="">
                            <div class="border-start border-3 border-success ps-3 mt-1">
                            <h6 class="mb-1 fw-semi-bold text-700"> Fecha Estimada </h6>
                            <p class="fs--2 text-600 mb-0">16 Jul, 2022  </p>
                            </div>
                        </li> 
                        <li class="border-top pt-3 mb-3 pb-1 cursor-pointer" data-calendar-events="">
                            <div class="border-start border-3 border-warning ps-3 mt-1">
                            <h6 class="mb-1 fw-semi-bold text-700">Fecha Factura</h6>
                            <p class="fs--2 text-600 mb-0">07 Jul, 2022 - 10 Jul, 2022</p>
                            </div>
                        </li> 
                        <li class="border-top pt-3 mb-3 pb-1 cursor-pointer" data-calendar-events="">
                            <div class="border-start border-3 border-danger ps-3 mt-1">
                            <h6 class="mb-1 fw-semi-bold text-700"> Fecha Orden de Compra:  </h6>
                            <p class="fs--2 text-600 mb-0">07 Jul, 2022  </p>
                            </div>
                        </li> 
                        <!-- <li class="border-top pt-3 mb-3 pb-1 cursor-pointer" data-calendar-events="">
                            <div class="border-start border-3 border-warning ps-3 mt-1">
                            <h6 class="mb-1 fw-semi-bold text-700">Vendedor / Fabricante</h6>
                            <p class="fs--2 text-600 mb-0">Lorem ipsum dolor sit amet </p>
                            </div>
                        </li>-->
                    </ul>
                </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

            <div class="card mb-3">
                <div class="card-body">
                <div class="table-responsive fs--1">
                    <table class="table table-striped border-bottom">
                    <thead class="bg-200 text-900">
                        <tr>
                        <th class="border-0">Products</th>
                        <th class="border-0 text-center">Quantity</th>
                        <th class="border-0 text-end">Precio. Farmacia</th>
                        <th class="border-0 text-end">Precio. Publico</th>
                        <th class="border-0 text-end">Precio. Institucion</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="border-200">
                        <td class="align-middle">
                            <h6 class="mb-0 text-nowrap">MED:GUMAFENIT® 100 BP 100 Tabs</h6>
                            <p class="mb-0">Phenytoin Sodium 100 BP Tablets 100 Tabs/Box (Propiedad MINSA)</p>
                        </td>
                        <td class="align-middle text-center">18900</td>
                        <td class="align-middle text-end">$65.00</td>
                        <td class="align-middle text-end">$130.00</td>
                        <td class="align-middle text-end">$130.00</td>
                        </tr>
                        <tr class="border-200">
                        <td class="align-middle">
                            <h6 class="mb-0 text-nowrap">MED:GUMA ZINC® 50 mg 100 Tabs</h6>
                            <p class="mb-0">Zinc Gluconate USP 50 mg Tablets 100 Tabs/Box (Propiedad MINSA)</p>
                        </td>
                        <td class="align-middle text-center">1</td>
                        <td class="align-middle text-end">$2,100.00</td>
                        <td class="align-middle text-end">$2,100.00</td>
                        <td class="align-middle text-end">$130.00</td>
                        </tr>
                        <tr>
                        <td class="align-middle">
                            <h6 class="mb-0 text-nowrap">MED:LABELOW® 200 mg 100 Tabs</h6>
                            <p class="mb-0">Labetalol Tablets USP 200 mg 100 Tabs/Box (Propiedad MINSA)</p>
                        </td>
                        <td class="align-middle text-center">8</td>
                        <td class="align-middle text-end">$5,00.00</td>
                        <td class="align-middle text-end">$4,000.00</td>
                        <td class="align-middle text-end">$130.00</td>
                        </tr>
                    </tbody>
                    </table>
                </div>
                <div class="row g-0 justify-content-end">
                    <div class="col-auto">
                    <table class="table table-sm table-borderless fs--1 text-end">
                        
                        <tr class="border-top">
                        <th class="text-900">Total:</th>
                        <td class="fw-semi-bold">$6541.50</td>
                        </tr>
                    </table>
                    </div>
                </div>
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