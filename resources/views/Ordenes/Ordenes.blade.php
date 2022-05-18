@extends('layouts.lyt_gumadesk')
@section('metodosjs')
@include('jsViews.js_solicitud');
<style>
  

    .dataTables_paginate {
        display: flex;
        align-items: center;
        padding-top: 20px;

    }

    .dataTables_paginate a {
        padding: 0 10px;
        /*border:1px solid #979797;*/
        /* background: linear-gradient(to bottom, white 0%, #0F85FC 100%);*/
        margin-inline: 5px;
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
    <main class="main" id="top">
      <div class="container-fluid" data-layout="container">
      
        <div class="content">
          @include('layouts.nav_gumadesk')
          <div class="row mb-3 g-3">
            <div class="col-lg-12 col-xxl-12">
              <div class="card">
              <div class="card-header">
              <div class="row flex-between-center">
                <div class="col-4 col-sm-auto d-flex align-items-center pe-0">
                  <h5 class="fs-0 mb-0 text-nowrap py-2 py-xl-0">Historial de Solicitudes</h5>
                </div>
                <div class="col-8 col-sm-auto ms-auto text-end ps-0">
                  <div id="orders-actions">
                  
                    <button class="btn btn-falcon-default btn-sm" type="button" id="id_btn_setting">
                      <span class="fas fa-filter" data-fa-transform="shrink-3 down-2"></span>
                      <span class="d-none d-sm-inline-block ms-1">Filtro</span>
                    </button>
                    <button class="btn btn-falcon-default btn-sm" type="button" id="id_btn_nueva_solicitud">
                      <span class="fas fa-plus" data-fa-transform="shrink-3 down-2"></span>
                      <span class="d-none d-sm-inline-block ms-1">Nuevo</span>
                    </button>
                  </div>
                </div>
              </div>
            </div>  
            <div class="card-body p-0">
              <div class="table-responsive scrollbar">
                  <table class="table table-sm table-striped fs--1 mb-0 overflow-hidden" id="tbl_solicitudes" ></table>  
              </div>
            </div>
              </div>
            </div>
            <div class="col-xxl-3" style="display:none">
              <div class="card">
                <div class="card-header d-flex flex-between-center py-2 border-bottom">
                  <h6 class="mb-0">Resumen</h6>
                  
                </div>
                <div class="card-body d-flex flex-column justify-content-between">
                  <div class="row align-items-center">
                    <div class="col-md-5 col-xxl-12 mb-xxl-1">
                      <div class="position-relative">
                        <div class="echart-most-leads my-2" data-echart-responsive="true"></div>
                        <div class="position-absolute top-50 start-50 translate-middle text-center">
                          <p class="fs--1 mb-0 text-400 font-sans-serif fw-medium">Total</p>
                          <p class="fs-3 mb-0 font-sans-serif fw-medium mt-n2" id="id_total_soli">00</p>
                        </div>
                      </div>
                    </div>
                    <div class="col-xxl-12 col-md-7">
                      <hr class="mx-ncard mb-0 d-md-none d-xxl-block" />
                      <div class="d-flex flex-between-center border-bottom py-3 pt-md-0 pt-xxl-3">
                        <div class="d-flex">
                        <span class="badge badge rounded-pill d-block badge-soft-secondary">Transito<span class="ms-1 fas fa-ban" data-fa-transform="shrink-2"></span></span> 
                        </div>
                        <p class="fs--1 text-500 mb-0 fw-semi-bold" id="id_count_transito">0.00</p>
                        <h6 class="text-700 mb-0"> <span id="id_porcent_transito"> 00 </span> %</h6>
                      </div>
                      <div class="d-flex flex-between-center border-bottom py-3">
                        <div class="d-flex">
                          <span class="badge badge rounded-pill d-block badge-soft-warning">Retenido<span class="ms-1 fas fa-stream" data-fa-transform="shrink-2"></span></span>
                        </div>
                        <p class="fs--1 text-500 mb-0 fw-semi-bold" id="id_count_Retenido">0.00</p>
                        <h6 class="text-700 mb-0"> <span id="id_porcent_Retenido"> 00 </span> %</h6>
                      </div>
                      <div class="d-flex flex-between-center border-bottom py-3">
                        <div class="d-flex">
                          <span class="badge badge rounded-pill d-block badge-soft-primary">Ingreso Parcial<span class="ms-1 fas fa-redo" data-fa-transform="shrink-2"></span></span>
                        </div>
                        <p class="fs--1 text-500 mb-0 fw-semi-bold" id="id_count_In_parci">0.00</p>
                        <h6 class="text-700 mb-0"> <span id="id_porcent_In_parci"> 00 </span> %</h6>
                      </div>
                      <div class="d-flex flex-between-center border-bottom py-3 border-bottom-0 pb-0">
                        <div class="d-flex">
                          <span class="badge badge rounded-pill d-block badge-soft-success">Ingreso Total<span class="ms-1 fas fa-check" data-fa-transform="shrink-2"></span></span>
                        </div>
                        <p class="fs--1 text-500 mb-0 fw-semi-bold" id="id_count_In_Total">00</p>
                        <h6 class="text-700 mb-0"> <span id="id_porcent_In_Total"> 00 </span> %</h6>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="card-footer bg-light p-0"><a class="btn btn-sm btn-link d-block py-2" href="#!"><br></a></div>
              </div>
            </div>
          </div>
          @include('layouts.footer_gumadesk')
        </div>
            
        <div class="modal fade" id="addNuevaSolicitud" tabindex="-1" role="dialog" aria-labelledby="authentication-modal-label" aria-hidden="true">
          <div class="modal-dialog mt-6" role="document">
            <div class="modal-content border-0">
              <div class="modal-header px-5 position-relative modal-shape-header bg-shape">
                <div class="position-relative z-index-1 light">
                  <h4 class="mb-0 text-white" id="authentication-modal-label">Solicitud</h4>
                  <p class="fs--1 mb-0 text-white">Por favor ingrese los datos necesarios</p>
                </div>
                <button class="btn-close btn-close-white position-absolute top-0 end-0 mt-2 me-2" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body py-4 px-5">
                <div class="mb-3">
                  <label for="organizerSingle">Articulo</label>
                    <select class="form-select js-choice" id="organizerSingle" size="1" name="organizerSingle" data-options='{"removeItemButton":true,"placeholder":true}'>
                      <option value="">Select organizer...</option>
                    </select>
                </div>
                <div class="mb-3">
                  <label class="fs-0" for="eventStartDate">Fecha</label>
                  <input class="form-control datetimepicker" id="eventStartDate" type="text" required="required" name="startDate" placeholder="yyyy/mm/dd" data-options='{"static":"true","enableTime":"false","dateFormat":"Y-m-d"}' />
                </div>
                <div class="row gx-2">
                  <div class="mb-3 col-sm-12">
                    <label class="form-label" for="txt_proyeccion_mensual">Proyeccion Mensual</label>
                    <input class="form-control" type="text" autocomplete="on" id="id_txt_proyeccion_mensual" onkeypress="soloNumeros(event.keyCode, event, $(this).val())"/>
                  </div>
                </div>                
                <div class="mb-3">
                  <button class="btn btn-primary d-block w-100 mt-3" id="id_send_info" type="submit" name="submit">Crear</button>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="modal fade" id="tbl_setting" tabindex="-1" role="dialog" aria-labelledby="authentication-modal-label" aria-hidden="true">
          <div class="modal-dialog mt-6" role="document">
            <div class="modal-content border-0">
              <div class="modal-header px-5 position-relative modal-shape-header bg-shape">
                <div class="position-relative z-index-1 light">
                  <h4 class="mb-0 text-white" id="authentication-modal-label">Filtros</h4>
                  <p class="fs--1 mb-0 text-white">Filtrado de información a aplicar</p>
                </div>
                <button class="btn-close btn-close-white position-absolute top-0 end-0 mt-2 me-2" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body py-4 px-5">
                <div class="mb-3">
                  <label for="">Mes</label>
                  <select class="form-select" id="id_select_nmes">
                      <?php                        
                            $mes = date("m");

                            $meses = array('none','Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre');

                            for ($i= 1; $i <= 12 ; $i++) {
                              if ($i==$mes) {
                                  echo'<option selected value="'.$i.'">'.$meses[$i].'</option>';
                              }else {
                                  echo'<option value="'.$i.'">'.$meses[$i].'</option>';
                              }
                            }
                        ?>
                        
                    </select>
                </div>
                
                <div class="row gx-2">
                  <div class="mb-3 col-sm-12">
                  <label for="">Año</label>
                  <select class="form-select" id="id_select_annio">
                        <?php
                            $year = date("Y");
                            for ($i= 2018; $i <= $year ; $i++) {
                                if ($i==$year) {
                                    echo'<option selected value="'.$i.'">'.$i.'</option>';
                                }else {
                                    echo'<option value="'.$i.'">'.$i.'</option>';
                                }
                            }
                        ?>
                  </select>
                  </div>
                </div>                
                <div class="mb-3">
                  <button class="btn btn-primary d-block w-100 mt-3" id="id_send_filtros" type="submit" name="submit">Aplicar</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>
    
    <!-- ===============================================-->
    <!--    End of Main Content-->
    <!-- ===============================================-->

@endsection('content')