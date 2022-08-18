@extends('layouts.lyt_gumadesk')
@section('metodosjs')
@include('jsViews.js_Home_Detalles');
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

    .dotted {
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
        <div class="content ">
        @include('layouts.nav_importacion')
            
            <div class="row g-3">
            <div class="col-md-4 col-xxl-4" >
                <div class="card h-100">
                  <div class="card-header">
                      <div class="row flex-between-center">  
                      <div class="col-auto">
                        <h6 class="mb-2">ORDENES CON REGISTRO MIFIC</h6>
                      </div>                      
                        <div class="col-auto mt-2">
                          <div class="row g-sm-4" >
                            <div class="col-12 col-sm-auto" >
                              <div class="mb-3 pe-4 border-sm-end border-200"  style="display:none">
                                <h6 class="fs--2 text-600 mb-1">Total de Ordenes</h6>
                                <div class="d-flex align-items-center OnClickSearch">
                                  <h5 class="fs-0 text-900 mb-0 me-2 dotted " id="id_ttMiffc">00</h5><span class="badge rounded-pill badge-soft-primary invisible"><span class="fas fa-caret-up"></span> 20.2 %</span>
                                </div>
                              </div>
                            </div>
                            <div class="col-12 col-sm-auto">
                              <div class="mb-3 pe-4 border-sm-end border-200">
                                <h6 class="fs--2 text-600 mb-1">Con si</h6>
                                <div class="d-flex align-items-center OnClickSearch">
                                  <h5 class="fs-0 text-900 mb-0 me-2 dotted " id="id_sMiffc">0.00</h5><span class="badge rounded-pill badge-soft-success"><span class="fas fa-caret-up"></span> <span id="id_sMiffc_procent_si"></span>0 %</span>
                                </div>
                              </div>
                            </div>
                            <div class="col-12 col-sm-auto">
                              <div class="mb-3 pe-0">
                                <h6 class="fs--2 text-600 mb-1">Con no</h6>
                                <div class="d-flex align-items-center OnClickSearch">
                                  <h5 class="fs-0 text-900 mb-0 me-2 dotted" id="id_ntMiffc">00</h5><span class="badge rounded-pill badge-soft-primary"><span class="fas fa-caret-up"></span> <span id="id_ntMiffc_procent_no"></span>0 %</span>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
            </div>
            <div class="col-md-4 col-xxl-4" >
              <div class="card">
                <div class="card-header">
                    <div class="row flex-between-center">
                      <div class="col-auto">
                        <h6 class="mb-2">REGENCIA QUE NECESITA PERMISO</h6>
                      </div>
                      <div class="col-auto mt-2">
                        <div class="row g-sm-4" >
                          <div class="col-12 col-sm-auto">
                            <div class="mb-3 pe-4 border-sm-end border-200 " style="display:none">
                              <h6 class="fs--2 text-600 mb-1">Total de Ordenes </h6>
                              <div class="d-flex align-items-center OnClickSearch">
                                <h5 class="fs-0 text-900 mb-0 me-2 dotted" id="id_ttRegencia" >00</h5><span class="badge rounded-pill badge-soft-primary invisible"><span class="fas fa-caret-up"></span> 20.2%</span>
                              </div>
                            </div>
                          </div>
                          <div class="col-12 col-sm-auto">
                            <div class="mb-3 pe-4 border-sm-end border-200">
                              <h6 class="fs--2 text-600 mb-1">con no</h6>
                              <div class="d-flex align-items-center OnClickSearch">
                                <h5 class="fs-0 text-900 mb-0 me-2 dotted" id="id_sRegencia">00</h5><span class="badge rounded-pill badge-soft-success"><span class="fas fa-caret-up"></span> <span id="id_sRengencia_procent_si"></span>0 %</span>
                              </div>
                            </div>
                          </div>
                          <div class="col-12 col-sm-auto">
                            <div class="mb-3 pe-0">
                              <h6 class="fs--2 text-600 mb-1">con si</h6>
                              <div class="d-flex align-items-center OnClickSearch">
                                <h5 class="fs-0 text-900 mb-0 me-2 dotted " id="id_nRegencia">00</h5><span class="badge rounded-pill badge-soft-primary"><span class="fas fa-caret-up"></span> <span id="id_nRegencia_procent_no"></span>0 %</span>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
              </div>
            </div>
            
            <div class="col-md-4 col-xxl-4" >
              <div class="card">
                  <div class="card-header">
                    <div class="row flex-between-center">
                      <div class="col-auto">
                        <h6 class="mb-2">ORDENES PARA MINSA Ó PRIVADO </h6>
                      </div>
                      <div class="col-auto mt-2">
                        <div class="row g-sm-4">
                          <div class="col-12 col-sm-auto">
                            <div class="mb-3 pe-4 border-sm-end border-200"  style="display:none">
                              <h6 class="fs--2 text-600 mb-1">Total Ordenes</h6>
                              <div class="d-flex align-items-center OnClickSearch">
                                <h5 class="fs-0 text-900 mb-0 me-2 " id="id_ttMinsa">00</h5><span class="badge rounded-pill badge-soft-primary invisible"><span class="fas fa-caret-up"></span> 20.2%</span>
                              </div>
                            </div>
                          </div>
                          <div class="col-12 col-sm-auto">
                            <div class="mb-3 pe-4 border-sm-end border-200">
                              <h6 class="fs--2 text-600 mb-1">Con Si</h6>
                              <div class="d-flex align-items-center OnClickSearch">
                                <h5 class="fs-0 text-900 mb-0 me-2 dotted" id="id_sMinsa">00</h5><span class="badge rounded-pill badge-soft-success"><span class="fas fa-caret-up"></span> <span id="id_sMinsa_procent_si"></span>0 %</span>
                              </div>
                            </div>
                          </div>
                          <div class="col-12 col-sm-auto">
                            <div class="mb-3 pe-0">
                              <h6 class="fs--2 text-600 mb-1">Con no</h6>
                              <div class="d-flex align-items-center OnClickSearch ">
                                <h5 class="fs-0 text-900 mb-0 me-2 dotted" id="id_nMinsa">00</h5><span class="badge rounded-pill badge-soft-primary"><span class="fas fa-caret-up"></span> <span id="id_ntMinsa_procent_no"></span>0 %</span>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header ps-0 py-0 border-bottom d-flex flex-row-reverse">
                                  
                  <ul class="nav nav-tabs border border-0 " >                    
                    <li class="nav-item" role="presentation">
                      <form class="row align-items-center g-3 py-3 mb-0">
                        <div class="col-md-auto position-relative">
                          <span class="fas fa-calendar-alt text-primary position-absolute translate-middle-y ms-2 mt-3"> </span>
                          <input id="id_range_select" class="form-control form-control-sm datetimepicker ps-4" type="text" data-options='{"mode":"range","dateFormat":"Y-m-d","disableMobile":true}'/>
                        </div>
                      </form>
                    </li>
                    <li class="nav-item">
                      <div class="input-group py-3 mb-0" >
                        <input class="form-control form-control-sm shadow-none search" type="search" placeholder="Buscar..." aria-label="search" id="id_txt_buscar" />
                        <div class="input-group-text bg-transparent">
                          <span class="fa fa-search fs--1 text-600"></span>
                        </div>            
                      </div>
                    </li>
                  </ul>
                </div>
                <div class="card-body">
                  <div class="row g-1">                   
                    <div class="col-xxl-12">
                      <div class="tab-content">
                        <div class="tab-pane active" id="po-resumen" role="tabpanel" aria-labelledby="po-resumen-tab">                         
                          <div class="tab-pane" id="tns_guma_privado" role="tabpanel" aria-labelledby="tns_guma_privado_tab">
                            <table class="table table-sm table-striped fs--1 overflow-hidden" id="tbl_guma_minsa" style="width:100%"></table>
                          </div>
                        </div>                        
                      </div>
                    </div>
                  </div>
                </div>
        


        <!--OPEN MODALS -->


        <div class="modal fade" id="IdmdlComment" data-keyboard="false" tabindex="-1" aria-labelledby="scrollinglongcontentLabel" aria-hidden="true">
          <div class="modal-dialog modal-xl">
            <div class="modal-content">
            <div class="card-header bg-light">
                  <div class="row justify-content-between">
                    <div class="col">
                      <div class="d-flex">
                        <div class="avatar avatar-2xl">
                          <img class="rounded-circle" src="{{ asset('images/item.png') }}" alt="" />

                        </div>
                        <div class="flex-1 align-self-center ms-2">
                          <p class="mb-1 lh-1"><a class="fw-semi-bold" href="!#" id="id_modal_name_item" >Nombre Item</a></p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              <div class="modal-body">
                
                
                
                <div id="id_comment_item"></div>
                
              </div>

            </div>
          </div>
        </div>

    
        <!--CLOSE MODALS -->
    </div>
</main>
@endsection('content')