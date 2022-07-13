@extends('layouts.lyt_gumadesk')
@section('metodosjs')
@include('jsViews.js_Ordenes');
@endsection
@section('content')

<!-- ===============================================-->
<!--    Main Content-->
<!-- ===============================================-->
<?php
//dd($Ordenes);
?>
<main class="main" id="top">
    <div class="container-fluid" data-layout="container">
        <div class="content">
            @include('layouts.nav_gumadesk')
            <div class="row mb-3">
                <div class="col">
                    <div class="card bg-100 shadow-none border">
                        <div class="row gx-0 flex-between-center">
                        <div class="col-sm-auto d-flex align-items-center"><img class="ms-n2" src="../assets/img/illustrations/crm-bar-chart.png" alt="" width="90" />
                            <div>
                            <h6 class="text-primary fs--1 mb-0">Bienvenido a </h6>
                            <h4 class="text-primary fw-bold mb-0">Importaciones <span class="text-info fw-medium">GUMA</span></h4>
                            </div><img class="ms-n4 d-md-none d-lg-block" src="../assets/img/illustrations/crm-line-chart.png" alt="" width="150" />
                        </div>
                        <div class="col-md-auto p-3">
                            <form class="row align-items-center g-3">
                            <div class="col-auto">
                                <h6 class="text-700 mb-0">Mostrando datos para: </h6>
                            </div>
                            <div class="col-md-auto position-relative">
                            <span class="fas fa-calendar-alt text-primary position-absolute translate-middle-y ms-2 mt-3"> </span>
                            <input id="id_range_select" class="form-control form-control-sm datetimepicker ps-4" type="text" data-options='{"mode":"range","dateFormat":"Y-m-d","disableMobile":true}'/></div>
                            <div class="col-auto">                              
                              <div class="dropdown font-sans-serif btn-reveal-trigger">
                                <button class="btn btn-link text-600 btn-sm dropdown-toggle dropdown-caret-none btn-reveal" type="button" id="dropdown-top-products" data-bs-toggle="dropdown" data-boundary="viewport" aria-haspopup="true" aria-expanded="false"><span class="fas fa-ellipsis-h fs--2"></span></button>
                                <div class="dropdown-menu dropdown-menu-end border py-2" aria-labelledby="dropdown-top-products">
                                  <a class="dropdown-item"  href="#!" id="id_btn_new_po"><span class="fas fa-plus me-1"></span>P.O </a>
                                  <a class="dropdown-item"  href="Vendor"><span class="fas fa-plus me-1"></span>VENDOR </a>
                                  <a class="dropdown-item"  href="Shipto"><span class="fas fa-plus me-1"></span>SHIP TO </a>
                                  <a class="dropdown-item"  href="Product"><span class="fas fa-plus me-1"></span>PRODUCT</a>
                                  
                                </div>
                              </div>
                            </div>

                           
                            
                            </form>
                        </div>
                        
                        </div>
                    </div>
                </div>
            </div>
            <div class="row g-3">
              <div class="col-md-3 col-xxl-3">
                <div class="card h-100">
                  <div class="card-header">
                      <div class="row flex-between-center">  
                      <div class="col-auto">
                        <h6 class="mb-2">ORDENES MIFIC</h6>
                      </div>                      
                        <div class="col-auto mt-2">
                          <div class="row g-sm-4">
                            <div class="col-12 col-sm-auto">
                              <div class="mb-3 pe-4 border-sm-end border-200">
                                <h6 class="fs--2 text-600 mb-1">Total de Ordenes</h6>
                                <div class="d-flex align-items-center">
                                  <h5 class="fs-0 text-900 mb-0 me-2">00</h5><span class="badge rounded-pill badge-soft-primary"><span class="fas fa-caret-up"></span> 20.2%</span>
                                </div>
                              </div>
                            </div>
                            <div class="col-12 col-sm-auto">
                              <div class="mb-3 pe-4 border-sm-end border-200">
                                <h6 class="fs--2 text-600 mb-1">Con si</h6>
                                <div class="d-flex align-items-center">
                                  <h5 class="fs-0 text-900 mb-0 me-2">00</h5><span class="badge rounded-pill badge-soft-success"><span class="fas fa-caret-up"></span> 20%</span>
                                </div>
                              </div>
                            </div>
                            <div class="col-12 col-sm-auto">
                              <div class="mb-3 pe-0">
                                <h6 class="fs--2 text-600 mb-1">Con no</h6>
                                <div class="d-flex align-items-center">
                                  <h5 class="fs-0 text-900 mb-0 me-2">$256,489</h5><span class="badge rounded-pill badge-soft-primary"><span class="fas fa-caret-up"></span> 18%</span>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
            </div>
            <div class="col-md-3 col-xxl-3">
              <div class="card">
                <div class="card-header">
                    <div class="row flex-between-center">
                      <div class="col-auto">
                        <h6 class="mb-2">REGENCIA QUE NECESITA PERMISO</h6>
                      </div>
                      <div class="col-auto mt-2">
                        <div class="row g-sm-4">
                          <div class="col-12 col-sm-auto">
                            <div class="mb-3 pe-4 border-sm-end border-200">
                              <h6 class="fs--2 text-600 mb-1">Total de Ordenes </h6>
                              <div class="d-flex align-items-center">
                                <h5 class="fs-0 text-900 mb-0 me-2">00</h5><span class="badge rounded-pill badge-soft-primary"><span class="fas fa-caret-up"></span> 20.2%</span>
                              </div>
                            </div>
                          </div>
                          <div class="col-12 col-sm-auto">
                            <div class="mb-3 pe-4 border-sm-end border-200">
                              <h6 class="fs--2 text-600 mb-1">con no</h6>
                              <div class="d-flex align-items-center">
                                <h5 class="fs-0 text-900 mb-0 me-2">00</h5><span class="badge rounded-pill badge-soft-success"><span class="fas fa-caret-up"></span> 20%</span>
                              </div>
                            </div>
                          </div>
                          <div class="col-12 col-sm-auto">
                            <div class="mb-3 pe-0">
                              <h6 class="fs--2 text-600 mb-1">con si</h6>
                              <div class="d-flex align-items-center">
                                <h5 class="fs-0 text-900 mb-0 me-2">00</h5><span class="badge rounded-pill badge-soft-primary"><span class="fas fa-caret-up"></span> 18%</span>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
              </div>
            </div>
            <div class="col-md-3 col-xxl-3">
              <div class="card">
                  <div class="card-header">
                    <div class="row flex-between-center">
                      <div class="col-auto">
                        <h6 class="mb-2">MINSA Ó PRIVADO </h6>
                      </div>
                      <div class="col-auto mt-2">
                        <div class="row g-sm-4">
                          <div class="col-12 col-sm-auto">
                            <div class="mb-3 pe-4 border-sm-end border-200">
                              <h6 class="fs--2 text-600 mb-1">Total Ordenes</h6>
                              <div class="d-flex align-items-center">
                                <h5 class="fs-0 text-900 mb-0 me-2">00</h5><span class="badge rounded-pill badge-soft-primary"><span class="fas fa-caret-up"></span> 20.2%</span>
                              </div>
                            </div>
                          </div>
                          <div class="col-12 col-sm-auto">
                            <div class="mb-3 pe-4 border-sm-end border-200">
                              <h6 class="fs--2 text-600 mb-1">Con Si</h6>
                              <div class="d-flex align-items-center">
                                <h5 class="fs-0 text-900 mb-0 me-2">00</h5><span class="badge rounded-pill badge-soft-success"><span class="fas fa-caret-up"></span> 20%</span>
                              </div>
                            </div>
                          </div>
                          <div class="col-12 col-sm-auto">
                            <div class="mb-3 pe-0">
                              <h6 class="fs--2 text-600 mb-1">Con no</h6>
                              <div class="d-flex align-items-center">
                                <h5 class="fs-0 text-900 mb-0 me-2">00</h5><span class="badge rounded-pill badge-soft-primary"><span class="fas fa-caret-up"></span> 18%</span>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
            <div class="col-md-3 col-xxl-3">
              <div class="card">
              <div class="card-header">
                    <div class="row flex-between-center">
                      <div class="col-auto mt-2">
                        <div class="row g-sm-4">
                          <div class="col-12 col-sm-auto">
                          <div class="mb-3 pe-4 border-sm-end border-200">
                              <h6 class="fs-1 mb-1">Pedido</h6>
                              <div class="d-flex align-items-center">
                              <div class="badge rounded-pill badge-soft-success fs--2">Despachado<span class="fas fa-check ms-1" data-fa-transform="shrink-2"></span></div>
                              </div>
                            </div>
                          </div>
                          <div class="col-12 col-sm-auto">
                          <div class="mb-3 pe-4 border-sm-end border-200">
                              <h6 class="fs-1 mb-1">Transito</h6>
                              <div class="d-flex align-items-center">
                              <div class="badge rounded-pill badge-soft-success fs--2">Pagado<span class="fas fa-check ms-1" data-fa-transform="shrink-2"></span></div>
                              </div>
                            </div>
                          </div>
                          <div class="col-12 col-sm-auto">
                            <div class="mb-3 pe-0">
                              <h6 class="fs-1 mb-1">Minsa</h6>
                              <div class="d-flex align-items-center">
                              <div class="badge rounded-pill badge-soft-success fs--2"> Consolidada<span class="fas fa-check ms-1" data-fa-transform="shrink-2"></span></div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  </div>
                  
            </div>

          <div class="card mb-3" id="ordersTable" data-list='{"valueNames":["order","date","address","status","amount"],"page":10,"pagination":true}'>
          
            <div class="card-body p-0 ">
            <div class="card-header">
              <div class="row flex-between-center">
              <div class="w-100">
                    <div class="row fs--1 fw-semi-bold text-500 g-0">
                      <div class="col-auto d-flex align-items-center pe-3"><span class="dot bg-danger"></span><span>Rojo</span><span class="d-none d-md-inline-block d-xxl-inline-block">(50)</span></div>
                      <div class="col-auto d-flex align-items-center pe-3"><span class="dot bg-warning"></span><span>Naranja</span><span class="d-none d-md-inline-block d-xxl-inline-block">(40)</span></div>
                      <div class="col-auto d-flex align-items-center pe-3"><span class="dot bg-success"></span><span>Verde</span><span class="d-none d-md-inline-block d-xxl-inline-block">(10)</span></div>
                      <div class="col-auto d-flex align-items-center"><span class="dot bg-200"></span><span>Total </span><span class="d-none d-md-inline-block d-xxl-inline-block">(100)</span></div>
                    </div>
                  </div>
              </div>
            </div>
              <div class="table-responsive scrollbar">
                <table class="table table-sm table-striped fs--1 mb-0 overflow-hidden">
                  <thead class="bg-200 text-900">
                    <tr>
                      <th class="sort pe-1 align-middle white-space-nowrap" data-sort="order">P.O. NO</th>
                      <th class="sort pe-1 align-middle white-space-nowrap pe-7" data-sort="date">Fecha</th>
                      <th class="sort pe-1 align-middle white-space-nowrap pe-7" data-sort="date">Via</th>
                      <th class="sort pe-1 align-middle white-space-nowrap pe-7" data-sort="date">Carga</th>
                      <th class="sort pe-1 align-middle white-space-nowrap pe-7" data-sort="date">Vendedor / Fabricante</th>
                      <th class="sort pe-1 align-middle white-space-nowrap" data-sort="address" style="min-width: 12.5rem;">Ship To</th>
                      <th class="sort pe-1 align-middle white-space-nowrap text-center" data-sort="status">Status</th>
                      <th class="sort pe-1 align-middle white-space-nowrap text-end" data-sort="amount">Monto</th>
                      <th class="no-sort"></th>
                    </tr>
                  </thead>
                  <tbody class="list" id="table-orders-body">
                    @foreach ($Ordenes as $orden)
                    <tr class="btn-reveal-trigger ">
                      <td class="py-2 align-middle white-space-nowrap">
                        <div class="d-flex align-items-center position-relative">
                          <div class="avatar avatar-xl">
                            <div class="avatar-name rounded-circle text-primary bg-success fs-0"><span></span></div>
                          </div>
                          <div class="flex-1 ms-3">
                            <h6 class="mb-0 fw-semi-bold"><a class="stretched-link text-900" href="ImportacionDetalles/{{$orden->id}}"># {{$orden->num_po}}</a></h6>
                            <p class="text-500 fs--2 mb-0">Falcon</p>
                          </div>
                        </div>
                      </td>
                      <td class="date py-2 align-middle">20/04/2019</td>
                      <td class="date py-2 align-middle">AQUI VA LA VIA</td>
                      <td class="date py-2 align-middle">AQUI VA LA CARGA</td>
                      <td class="date py-2 align-middle">AQUI VA LA VENDEDOR FABRICANTE</td>
                      <td class="address py-2 align-middle white-space-nowrap">{{strtoupper($orden->proveedor->nombre_shipto)}}
                        <p class="mb-0 text-500">{{ strtoupper($orden->proveedor->Descripcion) }}</p>
                      </td>
                      <td class="status py-2 align-middle text-center fs-0 white-space-nowrap"><span class="badge badge rounded-pill d-block badge-soft-success">Depachado<span class="ms-1 fas fa-check" data-fa-transform="shrink-2"></span></span>
                      </td>
                      <td class="amount py-2 align-middle text-end fs-0 fw-medium">$99</td>
                      <td class="py-2 align-middle white-space-nowrap text-end">
                        <div class="dropdown font-sans-serif position-static">
                          <button class="btn btn-link text-600 btn-sm dropdown-toggle btn-reveal" type="button" id="order-dropdown-0" data-bs-toggle="dropdown" data-boundary="viewport" aria-haspopup="true" aria-expanded="false"><span class="fas fa-ellipsis-h fs--1"></span></button>
                          <div class="dropdown-menu dropdown-menu-end border py-0" aria-labelledby="order-dropdown-0">
                            <div class="bg-white py-2">
                              <a class="dropdown-item" href="#!">Completed</a>
                              <a class="dropdown-item" href="#!">Processing</a>
                              <a class="dropdown-item" href="#!">On Hold</a>
                              <a class="dropdown-item" href="#!">Pending</a>
                              <div class="dropdown-divider"></div>
                              <a class="dropdown-item text-danger" href="#!" onClick="RemoveOrden({{ $orden->id }})">Borrrar</a>
                            </div>
                          </div>
                        </div>
                      </td>
                    </tr>
                    
                    @endforeach

                  <?php


                  

                   /*for($i=0;$i<=1;$i++){
                   echo '
                    <tr class="btn-reveal-trigger ">
                      <td class="py-2 align-middle white-space-nowrap">
                        <div class="d-flex align-items-center position-relative">
                          <div class="avatar avatar-xl">
                            <div class="avatar-name rounded-circle text-primary bg-success fs-0"><span></span></div>
                          </div>
                          <div class="flex-1 ms-3">
                            <h6 class="mb-0 fw-semi-bold"><a class="stretched-link text-900" href="ImportacionDetalles"># 181</a></h6>
                            <p class="text-500 fs--2 mb-0">Falcon</p>
                          </div>
                        </div>
                      </td>
                      <td class="date py-2 align-middle">20/04/2019</td>
                      <td class="date py-2 align-middle">AQUI VA LA VIA</td>
                      <td class="date py-2 align-middle">AQUI VA LA CARGA</td>
                      <td class="date py-2 align-middle">AQUI VA LA VENDEDOR FABRICANTE</td>
                      <td class="address py-2 align-middle white-space-nowrap">Ricky Antony, 2392 Main Avenue, Penasauka, New Jersey 02149
                        <p class="mb-0 text-500">Via Flat Rate</p>
                      </td>
                      <td class="status py-2 align-middle text-center fs-0 white-space-nowrap"><span class="badge badge rounded-pill d-block badge-soft-success">Depachado<span class="ms-1 fas fa-check" data-fa-transform="shrink-2"></span></span>
                      </td>
                      <td class="amount py-2 align-middle text-end fs-0 fw-medium">$99</td>
                      <td class="py-2 align-middle white-space-nowrap text-end">
                        <div class="dropdown font-sans-serif position-static">
                          <button class="btn btn-link text-600 btn-sm dropdown-toggle btn-reveal" type="button" id="order-dropdown-0" data-bs-toggle="dropdown" data-boundary="viewport" aria-haspopup="true" aria-expanded="false"><span class="fas fa-ellipsis-h fs--1"></span></button>
                          <div class="dropdown-menu dropdown-menu-end border py-0" aria-labelledby="order-dropdown-0">
                            <div class="bg-white py-2"><a class="dropdown-item" href="#!">Completed</a><a class="dropdown-item" href="#!">Processing</a><a class="dropdown-item" href="#!">On Hold</a><a class="dropdown-item" href="#!">Pending</a>
                              <div class="dropdown-divider"></div><a class="dropdown-item text-danger" href="#!">Delete</a>
                            </div>
                          </div>
                        </div>
                      </td>
                    </tr>
                    <tr class="btn-reveal-trigger">
                      
                      <td class="py-2 align-middle white-space-nowrap">
                        <div class="d-flex align-items-center position-relative">
                          <div class="avatar avatar-xl">
                            <div class="avatar-name rounded-circle text-primary bg-success fs-0"><span></span></div>
                          </div>
                          <div class="flex-1 ms-3">
                            <h6 class="mb-0 fw-semi-bold"><a class="stretched-link text-900" href="ImportacionesDetalles"># 181</a></h6>
                            <p class="text-500 fs--2 mb-0">Falcon</p>
                          </div>
                        </div>
                      </td>
                      <td class="date py-2 align-middle">20/04/2019</td>
                      <td class="date py-2 align-middle">AQUI VA LA VIA</td>
                      <td class="date py-2 align-middle">AQUI VA LA CARGA</td>
                      <td class="date py-2 align-middle">AQUI VA LA VENDEDOR FABRICANTE</td>
                      <td class="address py-2 align-middle white-space-nowrap">Kin Rossow, 1 Hollywood Blvd,Beverly Hills, California 90210
                        <p class="mb-0 text-500">Via Free Shipping</p>
                      </td>
                      <td class="status py-2 align-middle text-center fs-0 white-space-nowrap"><span class="badge badge rounded-pill d-block badge-soft-primary">Transito<span class="ms-1 fas fa-redo" data-fa-transform="shrink-2"></span></span>
                      </td>
                      <td class="amount py-2 align-middle text-end fs-0 fw-medium">$120</td>
                      <td class="py-2 align-middle white-space-nowrap text-end">
                        <div class="dropdown font-sans-serif position-static">
                          <button class="btn btn-link text-600 btn-sm dropdown-toggle btn-reveal" type="button" id="order-dropdown-1" data-bs-toggle="dropdown" data-boundary="viewport" aria-haspopup="true" aria-expanded="false"><span class="fas fa-ellipsis-h fs--1"></span></button>
                          <div class="dropdown-menu dropdown-menu-end border py-0" aria-labelledby="order-dropdown-1">
                            <div class="bg-white py-2"><a class="dropdown-item" href="#!">Completed</a><a class="dropdown-item" href="#!">Processing</a><a class="dropdown-item" href="#!">On Hold</a><a class="dropdown-item" href="#!">Pending</a>
                              <div class="dropdown-divider"></div><a class="dropdown-item text-danger" href="#!">Delete</a>
                            </div>
                          </div>
                        </div>
                      </td>
                    </tr>
                    <tr class="btn-reveal-trigger">
                      <td class="py-2 align-middle white-space-nowrap">
                        <div class="d-flex align-items-center position-relative">
                          <div class="avatar avatar-xl">
                            <div class="avatar-name rounded-circle text-primary bg-warning fs-0"><span></span></div>
                          </div>
                          <div class="flex-1 ms-3">
                            <h6 class="mb-0 fw-semi-bold"><a class="stretched-link text-900" href="ImportacionesDetalles"># 181</a></h6>
                            <p class="text-500 fs--2 mb-0">Falcon</p>
                          </div>
                        </div>
                      </td>
                      <td class="date py-2 align-middle">30/04/2019</td>
                      <td class="date py-2 align-middle">AQUI VA LA VIA</td>
                      <td class="date py-2 align-middle">AQUI VA LA CARGA</td>
                      <td class="date py-2 align-middle">AQUI VA LA VENDEDOR FABRICANTE</td>
                      <td class="address py-2 align-middle white-space-nowrap">Merry Diana, 1 Infinite Loop, Cupertino, California 90210
                        <p class="mb-0 text-500">Via Link Road</p>
                      </td>
                      <td class="status py-2 align-middle text-center fs-0 white-space-nowrap"><span class="badge badge rounded-pill d-block badge-soft-secondary">Llegado<span class="ms-1 fas fa-ban" data-fa-transform="shrink-2"></span></span>
                      </td>
                      <td class="amount py-2 align-middle text-end fs-0 fw-medium">$70</td>
                      <td class="py-2 align-middle white-space-nowrap text-end">
                        <div class="dropdown font-sans-serif position-static">
                          <button class="btn btn-link text-600 btn-sm dropdown-toggle btn-reveal" type="button" id="order-dropdown-2" data-bs-toggle="dropdown" data-boundary="viewport" aria-haspopup="true" aria-expanded="false"><span class="fas fa-ellipsis-h fs--1"></span></button>
                          <div class="dropdown-menu dropdown-menu-end border py-0" aria-labelledby="order-dropdown-2">
                            <div class="bg-white py-2"><a class="dropdown-item" href="#!">Completed</a><a class="dropdown-item" href="#!">Processing</a><a class="dropdown-item" href="#!">On Hold</a><a class="dropdown-item" href="#!">Pending</a>
                              <div class="dropdown-divider"></div><a class="dropdown-item text-danger" href="#!">Delete</a>
                            </div>
                          </div>
                        </div>
                      </td>
                    </tr>
                    <tr class="btn-reveal-trigger">
                      
                      <td class="py-2 align-middle white-space-nowrap">
                        <div class="d-flex align-items-center position-relative">
                          <div class="avatar avatar-xl">
                            <div class="avatar-name rounded-circle text-primary bg-danger fs-0"><span></span></div>
                          </div>
                          <div class="flex-1 ms-3">
                            <h6 class="mb-0 fw-semi-bold"><a class="stretched-link text-900" href="ImportacionesDetalles"># 181</a></h6>
                            <p class="text-500 fs--2 mb-0">Falcon</p>
                          </div>
                        </div>
                      </td>
                      <td class="date py-2 align-middle">30/04/2019</td>
                      <td class="date py-2 align-middle">AQUI VA LA VIA</td>
                      <td class="date py-2 align-middle">AQUI VA LA CARGA</td>
                      <td class="date py-2 align-middle">AQUI VA LA VENDEDOR FABRICANTE</td>
                      <td class="address py-2 align-middle white-space-nowrap">Bucky Robert, 1 Infinite Loop, Cupertino, California 90210</td>
                      <td class="status py-2 align-middle text-center fs-0 white-space-nowrap"><span class="badge badge rounded-pill d-block badge-soft-warning">Pendiente<span class="ms-1 fas fa-stream" data-fa-transform="shrink-2"></span></span>
                      </td>
                      <td class="amount py-2 align-middle text-end fs-0 fw-medium">$92</td>
                      <td class="py-2 align-middle white-space-nowrap text-end">
                        <div class="dropdown font-sans-serif position-static">
                          <button class="btn btn-link text-600 btn-sm dropdown-toggle btn-reveal" type="button" id="order-dropdown-3" data-bs-toggle="dropdown" data-boundary="viewport" aria-haspopup="true" aria-expanded="false"><span class="fas fa-ellipsis-h fs--1"></span></button>
                          <div class="dropdown-menu dropdown-menu-end border py-0" aria-labelledby="order-dropdown-3">
                            <div class="bg-white py-2"><a class="dropdown-item" href="#!">Completed</a><a class="dropdown-item" href="#!">Processing</a><a class="dropdown-item" href="#!">On Hold</a><a class="dropdown-item" href="#!">Pending</a>
                              <div class="dropdown-divider"></div><a class="dropdown-item text-danger" href="#!">Delete</a>
                            </div>
                          </div>
                        </div>
                      </td>
                    </tr>
                    
                    ';
                  }*/
                  ?>
                    
                  </tbody>
                </table>
              </div>
            </div>
            <div class="card-footer">
              <div class="d-flex align-items-center justify-content-center">
                <button class="btn btn-sm btn-falcon-default me-1" type="button" title="Previous" data-list-pagination="prev"><span class="fas fa-chevron-left"></span></button>
                <ul class="pagination mb-0"></ul>
                <button class="btn btn-sm btn-falcon-default ms-1" type="button" title="Next" data-list-pagination="next"><span class="fas fa-chevron-right">             </span></button>
              </div>
            </div>
          </div>
            @include('layouts.footer_gumadesk')
        </div>


        <!--OPEN MODALS -->
        <div class="modal fade" id="tbl_setting" tabindex="-1" role="dialog" aria-labelledby="authentication-modal-label" aria-hidden="true">
          <div class="modal-dialog modal-xl mt-6" role="document">
            <div class="modal-content border-0">
              <div class="modal-header px-5 position-relative modal-shape-header bg-shape">
                <div class="position-relative z-index-1 light">
                  <h4 class="mb-0 text-white" id="authentication-modal-label">Nueva P.O. NO</h4>
                  <p class="fs--1 mb-0 text-white">Aperturar nueva orden de pedido</p>
                </div>
                <button class="btn-close btn-close-white position-absolute top-0 end-0 mt-2 me-2" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body py-4 px-5">
              <div class="mb-3">
                <label class="col-form-label" for="id_num_po">P.O. NO:</label>
                <input class="form-control" id="id_num_po" type="text" />
              </div>
                <div class="mb-3">
                  <label for="">VENDOR</label>
                  <select class="form-select" id="id_select_vendor">
                      
                      @foreach ($Vendors as $vnd)
                      <option value="{{ strtoupper($vnd['id']) }}">{{ strtoupper($vnd['nombre_vendor']) }}</option>
                      @endforeach
                        
                    </select>
                </div>
                
                <div class="row gx-2">
                  <div class="mb-3 col-sm-12">
                  <label for="">Ship To</label>
                  <select class="form-select" id="id_select_shipto">

                      @foreach ($ShipTo as $sht)
                      <option value="{{ strtoupper($sht['id']) }}">{{ strtoupper($sht['nombre_shipto']) }}</option>
                      @endforeach

                  </select>
                  </div>
                </div>                
                <div class="mb-3">
                  <button class="btn btn-primary d-block w-100 mt-3" id="id_send_frm_new_po" type="submit" name="submit">Guardar</button>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!--CLOSE MODALS -->
    </div>
</main>
@endsection('content')