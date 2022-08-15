@extends('layouts.lyt_gumadesk')
@section('metodosjs')
@include('jsViews.js_Orden_Detalles');
@endsection
@section('content')
<!-- ===============================================-->
<!--    Main Content-->
<!-- ===============================================-->

<style>
  u.dotted 
  {
    border-bottom: 1px dashed red;
    text-decoration: none;
  }
  .row {
  --falcon-gutter-x: 0rem;
  --falcon-gutter-y: 0;
}
</style>
<main class="main" id="top">
    <div class="container-fluid" data-layout="container">
      
        <div class="content">
        <div class="row" style="display:none">
          <span id="id_rol" >{{Session::get('rol')}}</span>
          <span id="id_login_user">{{auth()->user()->id}}</span>
          <span  id="id_lbl_po">{{ $Orden->id }}</span>
        </div>
            @include('layouts.nav_importacion')
            
          <div class="row g-0 mb-3">
            <div class="col-sm-12 col-xxl-4 pe-sm-2 mb-3 mb-xxl-0">
              <div class="card">
                <div class="card-header bg-light">
                  <div class="row justify-content-between">
                    <div class="col">
                      <div class="d-flex">
                        <div class="avatar avatar-2xl">
                          <img class="rounded-circle" src="{{ asset('images/item.png') }}" alt="" />
                        </div>
                        <div class="flex-1 align-self-center ms-2">
                          <p class="mb-1 lh-1"><a class="fw-semi-bold" href="#">P.O. NO. : # {{ $Orden->num_po  }}</a> <span class="badge rounded-pill badge-soft-info" onclick="frmSweetAlert(2)"> Via: {{ !empty($Orden->Vias->Descripcion) ? $Orden->Vias->Descripcion :'N/D'  }}  <span class="fas fa-pencil-alt"></span></span></p>
                          <p class="mb-0 fs--1">
                            <span class="ms-1  badge rounded-pill bg-primary" onclick="frmSweetAlert(5)"> TIPO CARGA {{ !empty($Orden->TipoCarga->Descripcion) ? $Orden->TipoCarga->Descripcion :'N/D'  }} <span class="fas fa-pencil-alt"></span></span>  
                            <span class="ms-1  badge rounded-pill bg-success"  onclick="frmSweetAlert(4)"> TIPO PAGO {{ !empty($Orden->EstadoPago->Descripcion) ? $Orden->EstadoPago->Descripcion :'N/D'  }}  <span class="fas fa-pencil-alt"></span></span>
                            <span class="ms-1  badge rounded-pill bg-info" onclick="frmSweetAlert(3)"> ESTADO  {{ !empty($Orden->Estado->descripcion) ? $Orden->Estado->descripcion :'N/D'  }}  <span class="fas fa-pencil-alt"></span></span>
                          </p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="card-footer bg-light pt-0">
              
                  <div class="row g-0 fw-semi-bold text-center py-2 fs--1">
                    <div class="col-auto"><a class="rounded-2 d-flex align-items-center me-3" href="#!" onclick="frmSweetAlert(0)"><span class="ms-1  fas fa-pencil-alt text-primary" ></span><span class="ms-1">FACTURA Nº.: {{ number_format($Orden->factura,0,'.','') }}</span></a></div>
                    <div class="col-auto"><a class="rounded-2 d-flex align-items-center me-3 text-700" href="#!"onclick="frmSweetAlert(1)" ><span class="ms-1  fas fa-pencil-alt text-primary" ></span><span class="ms-1">RECIBO Nº.: {{ number_format($Orden->recibo,0,'.','') }} </span></a></div>                    
                  </div>
                </div>
              </div>
            </div>
            <div class="col-sm-6 col-xxl-4 ps-sm-2 order-xxl-1 mb-3 mb-xxl-0">
              <div class="card h-100">
              <div class="card-header d-flex flex-between-center">
                  <h6 class="mb-0"></h6>                  
                </div>
                <div class="card-body pt-0">
                  <div class="row mb-2">
                    <div class="col-3 border-end border-200">
                    <p class="fs--1 text-600 mb-0">FECHA DESPACHO</p>
                    <span class="badge rounded-pill bg-primary" onclick="frmSweetAlert02(0)">{{ !empty($Orden->fecha_despacho ) ? date('D, M d, Y', strtotime($Orden->fecha_despacho))  :'N/D'  }} <span class="ms-1 fas fa-pencil-alt"></span> </span>
                      
                    </div>
                    <div class="col-3 border-end text-center border-200">
                      <p class="fs--1 text-600 mb-0">FECHA ESTIMADA</p>
                      <span class="badge rounded-pill bg-primary" onclick="frmSweetAlert02(1)">{{ !empty($Orden->fecha_estimada ) ? date('D, M d, Y', strtotime($Orden->fecha_estimada))  :'N/D'  }} <span class="ms-1 fas fa-pencil-alt"></span> </span>
                      
                    </div>
                    <div class="col-3 text-center">
                      <p class="fs--1 text-600 mb-0">FECHA FACTURA</p>
                      <span class="badge rounded-pill bg-primary" onclick="frmSweetAlert02(2)">{{ !empty($Orden->fecha_factura ) ? date('D, M d, Y', strtotime($Orden->fecha_factura))  :'N/D'  }} <span class="ms-1 fas fa-pencil-alt"></span></span>
                      
                    </div>
                    <div class="col-3 text-center">
                      <p class="fs--1 text-600 mb-0">FECHA PO</p>
                      <span class="badge rounded-pill bg-primary" onclick="frmSweetAlert02(3)" >{{ !empty($Orden->fecha_orden_compra ) ? date('D, M d, Y', strtotime($Orden->fecha_orden_compra))  :'N/D'  }} <span class="ms-1 fas fa-pencil-alt"></span></span>                      
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-sm-6 col-xxl-4 ps-sm-2 order-xxl-1 mb-3 mb-xxl-0">
              <div class="card h-100">
                  <div class="card-header d-flex flex-between-center">
                    <h6 class="mb-0"></h6>                  
                  </div>
                  <div class="card-body pt-0">
                    <div class="row mb-2">
                      <div class="col-2 border-end border-200">
                        <p class="fs--1 text-600 mb-0">TOTAL SKU'S</p>  
                        <h5 class="fs-0 text-900 mb-0 me-2" id="id_tt_list_product"> {{count($Orden->Detalles)}} </h5>
                        
                        
                      </div>
                      <div class="col-3 border-end text-center border-200">
                        <p class="fs--1 text-600 mb-0">CON REGISTRO MIFIC</p>
                        
                        <div class="col-12 col-sm-auto">
                          <div class="mb-3 pe-4 border-sm-end border-200 ms-2">
                              <div class="d-flex align-items-center">
                                <h5 class="fs-0 text-900 mb-0 me-2" id="id_count_tbl_mific"> 0 </h5><span class="badge rounded-pill bg-primary"><span id="id_count_tbl_mific_procent"></span> %</span>
                              </div>
                            </div>
                          </div>
                      </div>
                      
                      <div class="col-4 text-center">
                        <p class="fs--1 text-600 mb-0">CON REGISTRO REGENCIA</p>  
                        <div class="col-12 col-sm-auto">
                          <div class="mb-3 pe-4 border-sm-end border-200 ms-2">
                              <div class="d-flex align-items-center">
                                <h5 class="fs-0 text-900 mb-0 me-2" id="id_count_tbl_regencia"> 0 </h5><span class="badge rounded-pill bg-primary"><span id="id_count_tbl_regencia_procent"></span> %</span>
                              </div>
                            </div>
                          </div>
                        
                      </div>

                      <div class="col-3 text-center">
                        <p class="fs--1 text-600 mb-0">CON REGISTRO MINSA</p>
                        <div class="col-12 col-sm-auto">
                          <div class="mb-3 pe-4 border-sm-end border-200 ms-2">
                              <div class="d-flex align-items-center">
                                <h5 class="fs-0 text-900 mb-0 me-2" id="id_count_tbl_minsa"> 0 </h5><span class="badge rounded-pill bg-primary"><span id="id_count_tbl_minsa_procent"></span> %</span>
                              </div>
                            </div>
                          </div>                
                      </div>

                    </div>
                  </div>
                </div>
            </div>
            
          </div>
            <div class="card mb-3">
                <div class="card-body py-5 py-sm-3">
                  <div class="row g-5 g-sm-0">
                    <div class="col-sm-6 col-xxl-6 ps-sm-2 order-xxl-1 mb-3 mb-xxl-0">
                      <div class="border border-1 border-300 rounded-2 p-3 ask-analytics-item position-relative mb-3">
                        <div class="d-flex align-items-center mb-3"><span class="far fa-address-card text-primary"></span><a class="stretched-link text-decoration-none" href="#!">
                            <h5 class="fs-0 mb-0 ps-3">Vendor : {{ $Orden->Vendor->nombre_vendor }}</h5>
                          </a></div>
                        <h5 class="fs--1 text-800">{{ $Orden->Vendor->Descripcion }}</h5>
                      </div>
                    </div>
                    <div class="col-sm-6 col-xxl-6 ps-sm-2 order-xxl-1 mb-3 mb-xxl-0">
                      <div class="border border-1 border-300 rounded-2 p-3 ask-analytics-item position-relative mb-3">
                        <div class="d-flex align-items-center mb-3"><span class="far fa-building text-primary"></span><a class="stretched-link text-decoration-none" href="#!">
                            <h5 class="fs-0 mb-0 ps-3">SHIP TO : {{ $Orden->proveedor->nombre_shipto }}</h5>
                          </a></div>
                        <h5 class="fs--1 text-800">{{ $Orden->proveedor->Descripcion }}</h5>
                      </div>                       
                    </div>
                  </div>
                </div>
              </div>
            <div class="card mb-3">
              <div class="card-header">
                <div class="row flex-between-center">
                  <div class="col-12 col-sm-12 col-lg-12">
                    <div class="input-group" >
                      <input class="form-control form-control-sm shadow-none search" type="search" placeholder="Buscar..." aria-label="search" id="id_txt_buscar" />
                      <div class="input-group-text bg-transparent">
                        <span class="fa fa-search fs--1 text-600"></span>
                      </div>
                      <div class="input-group-text bg-transparent" id="id_btn_add_product">
                        <span class="fa fa-plus fs--1 text-600"></span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
                <div class="card-body">
                <div class="table-responsive fs--1">
                    <table class="table table-striped border-bottom" id="tbl_detalles_articulos_po">
                    <thead class="bg-200 text-900">
                        <tr>
                          <th class="border-0">Nº </th>
                          <th class="border-0">Nº </th>
                          <th class="border-0">Nº </th>
                          <th class="border-0">Nº </th>
                          <th class="border-0">TOTAL SKU'S ( {{count($Orden->Detalles)}} ) </th>
                          <th class="border-0 text-center"></th>
                        </tr>
                    </thead>
                    <tbody>

                  
                        @foreach ($Orden->Detalles as $lstProducto)
                        <tr class="border-200">
                        <td class="align-middle text-center">{{$lstProducto->linea}}</td>
                        <td class="align-middle text-end">
                            @if($lstProducto->mific !='0')
                            <span class="badge badge rounded-pill badge-soft-success"><span class="fs-3 fas fa-check" data-fa-transform="shrink-2"></span></span>
                            @else
                            <span class="badge badge rounded-pill badge-soft-danger"><span class="fs-3 fas fa-times" data-fa-transform="shrink-2"></span></span>
                            @endif
                          </td>
                          <td class="align-middle text-end">
                            @if($lstProducto->regencia !='0')
                            <span class="badge badge rounded-pill badge-soft-success"><span class="fs-3 fas fa-check" data-fa-transform="shrink-2"></span></span>
                            @else
                            <span class="badge badge rounded-pill badge-soft-danger"><span class="fs-3 fas fa-times" data-fa-transform="shrink-2"></span></span>
                            @endif
                          </td>
                          <td class="align-middle text-end">
                            @if($lstProducto->minsa !='0')
                            <span class="badge badge rounded-pill badge-soft-success"><span class="fs-3 fas fa-check" data-fa-transform="shrink-2"></span></span>
                            @else
                            <span class="badge badge rounded-pill badge-soft-danger"><span class="fs-3 fas fa-times" data-fa-transform="shrink-2"></span></span>
                            @endif
                          </td>
                          <td class="">

                          <div class="card">
                            <div class="card-header bg-light">
                              <div class="row justify-content-between">
                                <div class="col">
                                  <div class="d-flex">
                                    <div class="avatar avatar-2xl status-online">
                                      <img class="rounded-circle" src="{{ asset('images/item.png') }}" alt="" />

                                    </div>
                                    <div class="flex-1 align-self-center ms-2">
                                    <p class="mb-1 lh-1"><a class="fw-semi-bold" href="#!">{{$lstProducto->isProduct->Tipo->descripcion}} : {{$lstProducto->isProduct->descripcion_corta}}</a> 
                                     
                                      </p>
                                      <p class="mb-0 fs--1">{{number_format($lstProducto->cantidad,0)}} &bull; {{$lstProducto->isProduct->Clasificacion_1}} &bull; <span class="fas fa-boxes"></span>
                                      <span class="badge rounded-pill ms-3 badge-soft-info"><span class="fas fa-check"></span> Propiedad {{$lstProducto->getMercados->descripcion}}</span>
                                          @if($lstProducto->TieneVenta == 1)
                                            <span class="badge rounded-pill ms-3 badge-soft-success "><span class="fas fas fa-dollar-sign"></span> Tiene Venta</span>
                                          @endif
                                    </p>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="card-body overflow-hidden">
                                <h6 class="fs-0 mb-0">{{$lstProducto->isProduct->descripcion_larga}}
                                <div class="row g-0 fw-semi-bold text-center py-2 fs--1 tm-3"> 
                                  <div class="col-auto d-flex align-items-center">
                                          @if($lstProducto->mific !='0')
                                            <span class="ms-3 badge rounded-pill bg-primary"> CON REGISTRO MINFIC <span class="fas fa-check"></span></span>  
                                          @endif
                                          @if($lstProducto->regencia !='0')
                                            <span class="ms-3 badge rounded-pill bg-success">CON REGISTRO REGENCIA  <span class="fas fa-check"></span></span>
                                          @endif
                                          @if($lstProducto->minsa !='0')
                                            <span class="ms-3 badge rounded-pill bg-info">CON REGISTRO MINSA <span class="fas fa-check"></span></span>
                                          @endif
                                          
                                          
                                      </div>
                                  </div>

                              </h6>
                            </div>
                            <div class="card-footer bg-light pt-0">
                              <div class="row g-0 fw-semi-bold text-center py-2 fs--1">
                                <div class="col-auto"><a class="rounded-2 d-flex align-items-center me-3" href="#!" onclick="Editar({{$lstProducto->id}},true)"><span class="ms-1 fas fa-pencil-alt text-primary"></span><span class="ms-1">Editar</span></a></div>
                                <div class="col-auto"><a class="rounded-2 d-flex align-items-center me-3 text-700" href="#!"  onclick="Remover({{$lstProducto->id}})"><span class="ms-1 fas fa-trash-alt text-danger" ></span><span class="ms-1">Borrar</span></a></div>
                                <div class="col-auto"><a class="rounded-2 d-flex align-items-center me-3 text-700" href="#!"  onclick="AddComment({{$lstProducto}})"><span class="ms-1 fas fa-comment text-primary" ></span><span class="ms-1">{{$lstProducto->Comments()}}</span></a></div>
                                <div class="col-auto d-flex align-items-center"><a class="rounded-2 text-700 d-flex align-items-center" href="#!" onclick="Editar({{$lstProducto->id}},false)"><span class="ms-1 fas fas fa-info-circle text-primary"></span><span class="ms-1">Mas Info</span></a></div>
                                
                              </div>
                              
                            </div>
                          </div>
                           
                          </td>
                          <td class="">
                          
                            <div class="row">

                              <div class="col-md-4 h-100">
                                <div class="d-flex btn-reveal-trigger">                                
                                  <div class="flex-1 position-relative">
                                    <div class="border border-1 border-300 rounded-2 p-3 ask-analytics-item position-relative mb-3">
                                      <div class="d-flex align-items-center mb-3">
                                        
                                        
                                        <span class="{{ !empty($lstProducto->fecha_real_despacho ) ? '' : 'fas fa-clock text-primary'  }}"></span>
                                          <h5 class="fs--1 text-600 mb-0 ps-3">Tiempo en Despacho <span class="badge badge-soft-success rounded-pill">{{ $Orden->Vendor->time_despacho }} Dias</span>
                                          <?php
                                          if(!empty($Orden->fecha_orden_compra )){

                                            $dtEstimado     = date('Y-m-d', strtotime($Orden->fecha_orden_compra. ' + '.$Orden->Vendor->time_despacho.' days'));
                                            $dtHoy          = date('Y-m-d');

                                            $DiasDiff = round((strtotime($dtEstimado) - strtotime($dtHoy))/86400);
                                            if($DiasDiff < 0){
                                              echo '<span class="badge badge-soft-danger rounded-pill">'.abs($DiasDiff).' Dias Excedidos</span>';
                                            }
                                          }

                                          ?>

                                        </h5>
                                      </div> 
                                      
                                      <div class="row g-sm-4 ">
                                        <div class="col-12 col-sm-auto">
                                          <div class="mb-3 pe-4">
                                            <h6 class="fs--2 text-600 mb-1">Fecha de Orden Compra</h6>
                                            <div class="d-flex align-items-center">
                                              <h5 class="fs-0 text-900 mb-0 me-2">{{ !empty($Orden->fecha_orden_compra ) ? date('D, M d, Y', strtotime($Orden->fecha_orden_compra))  :'N/D'  }}</h5>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="col-12 col-sm-auto">
                                          <div class="mb-3 pe-4 ">
                                            <h6 class="fs--2 text-600 mb-1">Estimada de Despacho </h6>
                                            <div class="d-flex align-items-center">
                                              <h5 class="fs-0 text-900 mb-0 me-2">{{ !empty($Orden->fecha_orden_compra ) ? date('D, M d, Y', strtotime($Orden->fecha_orden_compra. ' + '.$Orden->Vendor->time_despacho.' days')):'N/D'  }} </h5>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="col-12 col-sm-auto">
                                          <div class="mb-3 pe-0">
                                            <h6 class="fs--2 text-600 mb-1">Fecha Real de Despacho</h6>
                                            <div class="d-flex align-items-center">
                                              <h5 class="fs-0 text-900 mb-0 me-2" onclick="frmSweetAlert03(0,{{$lstProducto->id}})">{{ !empty($lstProducto->fecha_real_despacho ) ? date('D, M d, Y', strtotime($lstProducto->fecha_real_despacho))  :'N/D'  }}<span class="ms-1 fas fa-calendar-alt"></span> </h5>
                                            </div>
                                          </div>
                                        </div>

                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>

                              <div class="col-md-4 h-100">
                                <div class="d-flex btn-reveal-trigger">                                
                                  <div class="flex-1 position-relative ps-3 ">
                                    <div class="border border-1 border-300 rounded-2 p-3 ask-analytics-item position-relative mb-3">
                                      <div class="d-flex align-items-center mb-3">
                                        <?php
                                          if (!empty($lstProducto->fecha_real_despacho)) {
                                            if (empty($lstProducto->fecha_real_aduana)) {
                                              echo '<span class="fas fa-clock text-primary"></span>';
                                            }
                                          }
                                        ?>
                                          <h5 class="fs--1 text-600 mb-0 ps-3">Tiempo en Transito  <span class="badge badge-soft-success rounded-pill">{{ $Orden->Vendor->time_despacho }} Dias</span>
                                          <?php
                                          if(!empty($lstProducto->fecha_real_despacho )){

                                            $dtEstimado     = date('Y-m-d', strtotime($lstProducto->fecha_real_despacho. ' + '.$Orden->Vendor->time_transito.' days'));
                                            $dtHoy          = date('Y-m-d');

                                            $DiasDiff = round((strtotime($dtEstimado) - strtotime($dtHoy))/86400);
                                            if($DiasDiff < 0){
                                              echo '<span class="badge badge-soft-danger rounded-pill">'.abs($DiasDiff).' Dias Excedidos</span>';
                                            }
                                          }

                                          ?>
                                        </h5>
                                      </div> 
                                      <div class="row g-0">

                                      <div class="col-12 col-sm-auto">
                                          <div class="mb-3 pe-4 ">
                                            <h6 class="fs--2 text-600 mb-1">Fecha Real Despacho</h6>
                                            <div class="d-flex align-items-center">
                                              <h5 class="fs-0 text-900 mb-0 me-2">{{ !empty($lstProducto->fecha_real_despacho ) ? date('D, M d, Y', strtotime($lstProducto->fecha_real_despacho))  :'N/D'  }}</h5>
                                            </div>
                                          </div>
                                        </div>

                                        <div class="col-12 col-sm-auto">
                                          <div class="mb-3 pe-4 ">
                                            <h6 class="fs--2 text-600 mb-1">Estimada en Aduana </h6>
                                            <div class="d-flex align-items-center">
                                              <h5 class="fs-0 text-900 mb-0 me-2">{{ !empty($lstProducto->fecha_real_despacho ) ? date('D, M d, Y', strtotime($lstProducto->fecha_real_despacho. ' + '.$Orden->Vendor->time_transito.' days')):'N/D'  }} </h5>
                                            </div>
                                          </div>
                                        </div>

                                        <div class="col-12 col-sm-auto">
                                          <div class="mb-3 pe-0">
                                            <h6 class="fs--2 text-600 mb-1">Fecha Real en Aduana </h6>
                                            <div class="d-flex align-items-center">
                                              <h5 class="fs-0 text-900 mb-0 me-2" onclick="frmSweetAlert03(1,{{$lstProducto->id}})">{{ !empty($lstProducto->fecha_real_aduana ) ? date('D, M d, Y', strtotime($lstProducto->fecha_real_aduana))  :'N/D'  }}<span class="ms-1 fas fa-calendar-alt"></span> </h5>
                                            </div>
                                          </div>
                                        </div>
                                        
                                
                              
                                      
                                      </div>  
                                    </div>
                                  </div>
                                </div>
                              </div>

                              <div class="col-md-4 h-100">
                                <div class="d-flex btn-reveal-trigger">                                
                                  <div class="flex-1 position-relative ps-3 ">
                                    <div class="border border-1 border-300 rounded-2 p-3 ask-analytics-item position-relative mb-3">
                                      <div class="d-flex align-items-center mb-3">
                                        <?php
                                          if (!empty($lstProducto->fecha_real_aduana)) {
                                            if (empty($lstProducto->fecha_real_bodega)) {
                                              echo '<span class="fas fa-clock text-primary"></span>';
                                            }
                                          }
                                        ?>
                                          <h5 class="fs--1 text-600 mb-0 ps-3">Tiempo de Aduana <span class="badge badge-soft-success rounded-pill">{{ $Orden->Vendor->time_aduana }} Dias</span>
                                          <?php
                                          if(!empty($lstProducto->fecha_real_aduana )){

                                            $dtEstimado     = date('Y-m-d', strtotime($lstProducto->fecha_real_aduana. ' + '.$Orden->Vendor->time_aduana.' days'));
                                            $dtHoy          = date('Y-m-d');
                                            

                                            $DiasDiff = round((strtotime($dtEstimado) - strtotime($dtHoy))/86400);
                                            
                                            if($DiasDiff < 0){
                                              echo '<span class="badge badge-soft-danger rounded-pill">'.abs($DiasDiff).' Dias Excedidos</span>';
                                            }
                                          }

                                          ?>
                                        </h5>
                                      </div> 
                                      <div class="row g-0">


                                      
                                      <div class="col-12 col-sm-auto">
                                          <div class="mb-3 pe-4 ">
                                            <h6 class="fs--2 text-600 mb-1">Fecha Real en Aduana</h6>
                                            <div class="d-flex align-items-center">
                                              <h5 class="fs-0 text-900 mb-0 me-2">{{ !empty($lstProducto->fecha_real_aduana ) ? date('D, M d, Y', strtotime($lstProducto->fecha_real_aduana))  :'N/D'  }}</h5>
                                            </div>
                                          </div>
                                        </div>
                                        
                                        <div class="col-12 col-sm-auto">
                                          <div class="mb-3 pe-4 ">
                                            <h6 class="fs--2 text-600 mb-1">Estimada en Bodega</h6>
                                            <div class="d-flex align-items-center">
                                              <h5 class="fs-0 text-900 mb-0 me-2">{{ !empty($lstProducto->fecha_real_aduana ) ? date('D, M d, Y', strtotime($lstProducto->fecha_real_aduana. ' + '.$Orden->Vendor->time_aduana.' days')):'N/D'  }}</h5>
                                            </div>
                                          </div>
                                        </div>

                                        <div class="col-12 col-sm-auto">
                                          <div class="mb-3 pe-0">
                                            <h6 class="fs--2 text-600 mb-1">Fecha Real Bodega </h6>
                                            <div class="d-flex align-items-center">
                                              <h5 class="fs-0 text-900 mb-0 me-2" onclick="frmSweetAlert03(2,{{$lstProducto->id}})">{{ !empty($lstProducto->fecha_real_bodega ) ? date('D, M d, Y', strtotime($lstProducto->fecha_real_bodega))  :'N/D'  }}<span class="ms-1 fas fa-calendar-alt"></span> </h5>
                                            </div>
                                          </div>
                                        </div>

                                      </div>  
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          
                          </td>                          
                        </tr>
                          
                        @endforeach

                        
                     
                    </tbody>
                    </table>
                </div>
                <div class="row g-0 justify-content-end mt-3">
                    <div class="col-auto">
                      <a class="btn btn-sm btn-danger" href="#!" id="id_btn_delete_po">Eliminar</a>
                    </div>
                </div>
                </div>
            </div>
   
            @include('layouts.footer_gumadesk')
        </div>
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
                          <p class="mb-0 fs--1"><span id="id_modal_articulo"></span> </p>
                          <p class="mb-0 fs--1">#<span id="id_modal_nSoli"></span> &bull; <span id="id_modal_Fecha"></span> <span class="fas fa-calendar"></span></p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              <div class="modal-body">
                
                <div class="d-flex align-items-center border-top border-200 pt-3">
                  <div class="avatar avatar-xl">
                    <img class="rounded-circle" src="{{ asset('images/user/avatar-4.jpg') }}" alt="" />
                  </div>
                  <input class="form-control rounded-pill ms-2 fs--1" type="text" placeholder="Escribe un Comentario..." id="id_textarea_comment" />
                </div>

                
                <div id="id_comment_item"></div>
                
              </div>

            </div>
          </div>
        </div>

        <!--OPEN MODALS -->
        <div class="modal fade" id="mdl_add_product" tabindex="-1" role="dialog" aria-labelledby="authentication-modal-label" aria-hidden="true">
          <div class="modal-dialog modal-xl mt-6" role="document">
            <div class="modal-content border-0">
              <div class="modal-header px-5 position-relative modal-shape-header bg-shape">
                <div class="position-relative z-index-1 light">
                  <h4 class="mb-0 text-white" id="authentication-modal-label"><span id="id_modal_state"></span> producto P.O.</h4>
                  <p class="fs--1 mb-0 text-white">Ingresar articulos a la PO</p>                  
                  <span id="id_mdl_po" style="display:none" ></span>
                </div>
                <button class="btn-close btn-close-white position-absolute top-0 end-0 mt-2 me-2" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body py-4 px-5">
                
              

                
                <div class="row g-2">
                                  
                  <div class="col-md-4 col-sm-12 col-xxl-4 ">
                    <div class="mb-3">
                      <label for="">Producto</label>
                      <select class="form-select" id="id_select_producto">                  
                          @foreach ($Productos as $pdt)
                          <option value="{{ strtoupper($pdt['id']) }}">{{ strtoupper($pdt->Tipo->descripcion) }} : {{ strtoupper($pdt['descripcion_corta']) }}</option>
                          @endforeach
                            
                        </select>
                    </div>
                  </div>
                  <div class="col-md-2 col-sm-6 col-xxl-2">
                    <div class="mb-3">
                    <label class="form-label" for="">Cantidad:</label>
                      <input class="form-control" type="text" name="" placeholder="0.00" required="required" id="id_frm_cantidad" onkeypress="soloNumeros(event.keyCode, event, $(this).val())"/>                        
                    </div>
                  </div>
                  <div class="col-md-2 col-sm-6 col-xxl-2">
                    <div class="mb-3">
                    <label for="">Propiedad</label>
                      <select class="form-select" id="id_mercado">                  
                        @foreach ($Mercados as $mercado)
                          <option value="{{ strtoupper($mercado->id) }}">{{ strtoupper($mercado->descripcion) }}</option>
                        @endforeach
                      </select>  
                    </div>
                  </div>  
                  <div class="col-md-2 col-sm-6 col-xxl-2">
                    <div class="mb-3">
                      <label for="">Tiene Venta</label>
                      <select class="form-select" id="id_tiene_venta">                  
                        <option value="0">NO</option>
                        <option value="1">SI</option>
                      </select>    
                    </div>
                  </div>
                  <div class="col-md-2 col-sm-6 col-xxl-2">
                    <div class="mb-3">
                      <label for="">Estado</label>
                      <select class="form-select" id="id_select_estado">                  
                          @foreach ($EstadosProducto as $est)
                          <option value="{{ strtoupper($est->id) }}">{{ strtoupper($est->descripcion) }}</option>
                          @endforeach
                            
                        </select>
                    </div>
                  </div>  
                </div>

                <div class="row g-2">
                  <div class="col-md-4 col-sm-6 col-xxl-4">
                    <div class="mb-3">
                      <label class="form-label" for="">Precio. Farmacia:</label>
                      <input class="form-control" type="text" name="" placeholder="C$ 0.00" required="required" id="id_frm_precio_farma" onkeypress="soloNumeros(event.keyCode, event, $(this).val())"/>
                      <div class="invalid-feedback">Please enter password</div>
                    </div>
                  </div>
                  <div class="col-md-4 col-sm-6 col-xxl-4">
                    <div class="mb-3">
                      <label class="form-label" for="">Precio Público:</label>
                      <input class="form-control" type="text" name="" placeholder="C$ 0.00" required="required"id="id_frm_precio_public" onkeypress="soloNumeros(event.keyCode, event, $(this).val())"/>                      
                    </div>
                  </div>
                  <div class="col-md-4 col-sm-6 col-xxl-4">
                    <div class="mb-3">
                      <label class="form-label" for="">Precio Institución:</label>
                      <input class="form-control" type="text" name="" placeholder="C$ 0.00" required="required" id="id_frm_precio_insti" onkeypress="soloNumeros(event.keyCode, event, $(this).val())"/>                      
                    </div>
                  </div>
                </div>

                <div class="row g-2">
                  <div class="col-md-6 col-sm-6 col-xxl-4">
                    <div class="mt-3">
                      <div class="form-check form-switch">
                        <label class="form-check-label" for="id_chk_mific">MIFIC</label>
                        <input class="form-check-input" id="id_chk_mific" type="checkbox" />
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6 col-sm-6 col-xxl-4">
                    <div class="mt-3">
                      <div class="form-check form-switch">
                        <label class="form-check-label" for="id_chk_regencia">REGENCIA</label>
                        <input class="form-check-input" id="id_chk_regencia" type="checkbox"  />
                      </div>             
                    </div>
                  </div>
                  <div class="col-md-6 col-sm-6 col-xxl-4">
                    <div class="mt-3">
                      <div class="form-check form-switch">
                        <label class="form-check-label" for="id_chk_minsa">MINSA</label>
                        <input class="form-check-input" id="id_chk_minsa" type="checkbox"  />
                      </div>
                    </div>
                  </div>
                </div>

               
                      
                <div class="mb-3" id="id_div_btn_send">
                  <button class="btn btn-primary d-block w-100 mt-3" id="id_frm_add_articulo_po" type="submit" name="submit">Guardar</button>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!--CLOSE MODALS -->
        



    </div>
</main>
@endsection('content')