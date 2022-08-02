@extends('layouts.lyt_gumadesk')
@section('metodosjs')
@include('jsViews.js_Ordenes');
<style>
.dataTables_paginate {
        display: flex;
        align-items: center;
        padding-top: 20px;

    }
    .notification-body {
      width: 100% !important;
    }
    .dataTables_paginate a {
        padding: 0 10px;
        margin-inline: 5px;
    }

    .dataTables_wrapper .dataTables_paginate {
      font-size: .8rem;      
    }

    .dt-center {
      text-align: center;
    }

    .dt-right {
      text-align: right;
    }

    .dt-left {
      text-align: left;
    }
    .custom {
        min-width: 70%;
        min-height: 100%;
    }

    .custom_detail {
        min-width: 80%;
        min-height: 100%;
    }

    u.dotted {
        border-bottom: 1px dashed red;
        text-decoration: none;
    }

    .dBorder {
        border: 1px solid #ccc !important;
    }

    .text-primary {
        color: #4e73df !important;
    }

    .text-success {
        color: #1cc88a !important;
    }

    .text-info {
        color: #36b9cc !important;
    }

    .text-warning {
        color: #f6c23e !important;
    }

    .border-left-primary {
        border-left: .25rem solid #4e73df !important;
    }

    .border-left-success {
        border-left: .25rem solid #1cc88a !important;
    }

    .border-left-info {
        border-left: .25rem solid #36b9cc !important;
    }

    .border-left-warning {
        border-left: .25rem solid #f6c23e !important;
    }

    .color-focus {
        color: #0894ff !important;
    }

    .nav-tabs>.nav-item {
        padding-left: 3.25rem;
    }

    @media (min-width: 768px) {
        .nav-tabs .nav-item {
            padding-left: 1.5rem;
        }
    }

    @media (min-width: 992px) {
        .nav-tabs .nav-item {
            padding-left: 1.75rem;
        }
    }

    @media (min-width: 1200px) {
        .nav-tabs .nav-item {
            padding-left: 2.25rem;
        }
    }

    .swal2-shown {
        padding-right: 0px !important;
    }
</style>
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
                          <div class="row g-sm-4" >
                            <div class="col-12 col-sm-auto" >
                              <div class="mb-3 pe-4 border-sm-end border-200">
                                <h6 class="fs--2 text-600 mb-1">Total de Ordenes</h6>
                                <div class="d-flex align-items-center">
                                  <h5 class="fs-0 text-900 mb-0 me-2" id="id_ttMiffc">00</h5><span class="badge rounded-pill badge-soft-primary invisible"><span class="fas fa-caret-up"></span> 20.2 %</span>
                                </div>
                              </div>
                            </div>
                            <div class="col-12 col-sm-auto">
                              <div class="mb-3 pe-4 border-sm-end border-200">
                                <h6 class="fs--2 text-600 mb-1">Con si</h6>
                                <div class="d-flex align-items-center">
                                  <h5 class="fs-0 text-900 mb-0 me-2" id="id_sMiffc">00</h5><span class="badge rounded-pill badge-soft-success"><span class="fas fa-caret-up"></span> <span id="id_sMiffc_procent_si"></span>0 %</span>
                                </div>
                              </div>
                            </div>
                            <div class="col-12 col-sm-auto">
                              <div class="mb-3 pe-0">
                                <h6 class="fs--2 text-600 mb-1">Con no</h6>
                                <div class="d-flex align-items-center">
                                  <h5 class="fs-0 text-900 mb-0 me-2" id="id_ntMiffc">00</h5><span class="badge rounded-pill badge-soft-primary"><span class="fas fa-caret-up"></span> <span id="id_ntMiffc_procent_no"></span>0 %</span>
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
                                <h5 class="fs-0 text-900 mb-0 me-2" id="id_ttRegencia" >00</h5><span class="badge rounded-pill badge-soft-primary invisible"><span class="fas fa-caret-up"></span> 20.2%</span>
                              </div>
                            </div>
                          </div>
                          <div class="col-12 col-sm-auto">
                            <div class="mb-3 pe-4 border-sm-end border-200">
                              <h6 class="fs--2 text-600 mb-1">con no</h6>
                              <div class="d-flex align-items-center">
                                <h5 class="fs-0 text-900 mb-0 me-2" id="id_sRegencia">00</h5><span class="badge rounded-pill badge-soft-success"><span class="fas fa-caret-up"></span> <span id="id_sRengencia_procent_si"></span>0 %</span>
                              </div>
                            </div>
                          </div>
                          <div class="col-12 col-sm-auto">
                            <div class="mb-3 pe-0">
                              <h6 class="fs--2 text-600 mb-1">con si</h6>
                              <div class="d-flex align-items-center">
                                <h5 class="fs-0 text-900 mb-0 me-2" id="id_nRegencia">00</h5><span class="badge rounded-pill badge-soft-primary"><span class="fas fa-caret-up"></span> <span id="id_nRegencia_procent_no"></span>0 %</span>
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
                                <h5 class="fs-0 text-900 mb-0 me-2" id="id_ttMinsa">00</h5><span class="badge rounded-pill badge-soft-primary invisible"><span class="fas fa-caret-up"></span> 20.2%</span>
                              </div>
                            </div>
                          </div>
                          <div class="col-12 col-sm-auto">
                            <div class="mb-3 pe-4 border-sm-end border-200">
                              <h6 class="fs--2 text-600 mb-1">Con Si</h6>
                              <div class="d-flex align-items-center">
                                <h5 class="fs-0 text-900 mb-0 me-2" id="id_sMinsa">00</h5><span class="badge rounded-pill badge-soft-success"><span class="fas fa-caret-up"></span> <span id="id_sMinsa_procent_si"></span>0 %</span>
                              </div>
                            </div>
                          </div>
                          <div class="col-12 col-sm-auto">
                            <div class="mb-3 pe-0">
                              <h6 class="fs--2 text-600 mb-1">Con no</h6>
                              <div class="d-flex align-items-center">
                                <h5 class="fs-0 text-900 mb-0 me-2" id="id_nMinsa">00</h5><span class="badge rounded-pill badge-soft-primary"><span class="fas fa-caret-up"></span> <span id="id_ntMinsa_procent_no"></span>0 %</span>
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

          <div class="card mb-3" >
          
            <div class="card-body p-0 ">
            <div class="card-header">
              <div class="card-header">
                <div class="row flex-between-center">
                  <div class="col-auto col-sm-6 col-lg-7">
 
                    <div class="row g-sm-4 ">
                    <div class="col-12 col-sm-auto">
                        <div class="mb-3 pe-4 border-sm-end border-200">
                          <h6 class="fs--2 text-600 mb-1">TOTAL</h6>
                          <div class="d-flex align-items-center">
                            <h5 class="fs-0 text-900 mb-0 me-2"> 0 </h5>
                          </div>
                        </div>
                      </div>
                      <div class="col-12 col-sm-auto">
                        <div class="mb-3 pe-4 border-sm-end border-200">
                          <h6 class="fs--2 text-600 mb-1">ROJO</h6>
                          <div class="d-flex align-items-center">
                            <span class="badge rounded-pill bg-danger"><span id=""></span> 20</span>
                          </div>
                        </div>
                      </div>
                      
                      <div class="col-12 col-sm-auto">
                        <div class="mb-3 pe-4 border-sm-end border-200">
                          <h6 class="fs--2 text-600 mb-1">NARANJA</h6>
                          <div class="d-flex align-items-center">
                            <span class="badge rounded-pill bg-warning"> <span id=""></span> 30</span>
                          </div>
                        </div>
                      </div>
                      <div class="col-12 col-sm-auto">
                        <div class="mb-3 pe-4 border-sm-end border-200">
                          <h6 class="fs--2 text-600 mb-1">VERDE</h6>
                          <div class="d-flex align-items-center">
                            <span class="badge rounded-pill bg-success"> <span id=""></span> 50</span>
                          </div>
                        </div>
                      </div>
                    </div>
                    
                    
                  </div>
                  <div class="col-auto col-sm-6 col-lg-5">
                    <div class="input-group" >
                      <input class="form-control form-control-sm shadow-none search" type="search" placeholder="Buscar..." aria-label="search" id="id_txt_buscar" />
                      <div class="input-group-text bg-transparent">
                        <span class="fa fa-search fs--1 text-600"></span>
                      </div>                     
                    </div>
                  </div>
                </div>
              </div>
              <div class="">
                <table class="table table-sm table-striped fs--1 overflow-hidden" id="tbl_ordenes_compra">
                  <thead class="bg-200 text-900">
                    <tr>
                      <th class="" >P.O. NO</th>
                      <th class="" >Fecha</th>
                      <th class="" >Via</th>
                      <th class="" >Carga</th>
                      <th class="">Status</th>
                     
                    </tr>
                  </thead>
                  <tbody class="list" >
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>


        <!--OPEN MODALS -->
        <div class="modal fade" id="tbl_setting" tabindex="-1" role="dialog" aria-labelledby="authentication-modal-label" aria-hidden="true">
          <div class="modal-dialog modal-xl mt-6" role="document">
            <div class="modal-content border-0">
              <div class="modal-header px-5 position-relative modal-shape-header bg-shape">
                <div class="position-relative z-index-1 light">
                  <h4 class="mb-0 text-white" id="authentication-modal-label">Nº P.O. </h4>
                  <p class="fs--1 mb-0 text-white">Aperturar nueva orden de pedido</p>
                </div>
                <button class="btn-close btn-close-white position-absolute top-0 end-0 mt-2 me-2" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body py-4 px-5">
                <div class="mb-3">
                  <label class="col-form-label" for="id_num_po">P.O. NO:</label>
                  <input class="form-control" id="id_num_po" type="text" />
                </div>
                <div class="mb-3" >
                  <label class="fs-0" for="eDate">Fecha</label>
                  <input class="form-control datetimepicker" id="poDate" type="text" required="required" name="startDate" placeholder="yyyy/mm/dd" data-options='{"static":"true","enableTime":"false","dateFormat":"Y-m-d"}' />
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