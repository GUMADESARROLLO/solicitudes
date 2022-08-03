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
</style>

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
                      <span style="display:none" id="id_lbl_po">{{ $Orden->id }}</span>
                      <h5>P.O. NO. : # {{ $Orden->num_po  }} </h5>
                      <p class="fs--1" onclick="frmSweetAlert02(3)" ><u class="dotted"> {{ !empty($Orden->fecha_orden_compra ) ? date('F d, Y', strtotime($Orden->fecha_orden_compra))  :'N/D'  }}</u></p>

                      
                      <div><strong class="me-2">Status: </strong>
                        <div class="badge rounded-pill badge-soft-success fs--2">{{ !empty($Orden->Estado->descripcion) ? $Orden->Estado->descripcion :'N/D'  }}<span class="fas fa-check ms-1" data-fa-transform="shrink-2"></span></div>
                      </div>
                    </div>
                    <div class="col-auto mt-2">
                      <div class="row g-sm-4">
                        <div class="col-12 col-sm-auto">
                          <div class="mb-3 pe-4 border-sm-end border-200">
                            <h6 class="fs--2 text-600 mb-1">Factura NO.: </h6>
                            <div class="d-flex align-items-center">
                              <h5 class="fs-0 text-900 mb-0 me-2" onclick="frmSweetAlert(0)">{{ number_format($Orden->factura,0) }}</h5>
                            </div>
                          </div>
                        </div>
                        <div class="col-12 col-sm-auto">
                          <div class="mb-3 pe-4 border-sm-end border-200">
                            <h6 class="fs--2 text-600 mb-1">RECIBO NO.:</h6>
                            <div class="d-flex align-items-center">
                              <h5 class="fs-0 text-900 mb-0 me-2" onclick="frmSweetAlert(1)">{{ number_format($Orden->recibo,0) }}</h5>
                            </div>
                          </div>
                        </div>                        
                        <div class="col-12 col-sm-auto">
                        <div class="mb-3 pe-4 border-sm-end border-200">
                            <h6 class="fs--2 text-600 mb-1 ">Via</h6>
                            <div class="d-flex align-items-center">
                            <h5 class="fs-0 text-900 mb-0 me-2" onclick="frmSweetAlert(2)"> {{ !empty($Orden->Vias->Descripcion) ? $Orden->Vias->Descripcion :'N/D'  }}  </h5>
                            </div>
                          </div>
                        </div>
                        
                        <div class="col-12 col-sm-auto">
                        <div class="mb-3 pe-4 border-sm-end border-200">
                            <h6 class="fs--2 text-600 mb-1">Estado de pago</h6>
                            <div class="d-flex align-items-center">
                            <div class="badge rounded-pill badge-soft-success fs--2"  onclick="frmSweetAlert(4)" > {{ !empty($Orden->EstadoPago->Descripcion) ? $Orden->EstadoPago->Descripcion :'N/D'  }} </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-12 col-sm-auto">
                          <div class="mb-3 pe-0">
                            <h6 class="fs--2 text-600 mb-1">Carga</h6>
                            <div class="d-flex align-items-center">                            
                            <div class="badge rounded-pill badge-soft-success fs--2" onclick="frmSweetAlert(5)" > {{ !empty($Orden->TipoCarga->Descripcion) ? $Orden->TipoCarga->Descripcion :'N/D'  }} </div>
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
                        <h6 class="mb-2">{{ $Orden->Vendor->nombre_vendor }}</h6>
                        <p class="mb-1 fs--1">
                          {{ $Orden->Vendor->Descripcion }}
                      </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="border-sm-end border-300 text-center">
                        <h5 class="mb-3 fs-0">SHIP TO</h5>
                        <h6 class="mb-2">{{ $Orden->proveedor->nombre_shipto }}</h6>
                        <p class="mb-0 fs--1">{{ $Orden->proveedor->Descripcion }}</p>
                                              
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
                        <li class="border-topmb-3 pb-1 cursor-pointer"  onclick="frmSweetAlert02(0)">
                            <div class="border-start border-3 border-primary ps-3 mt-1">
                            <h6 class="mb-1 fw-semi-bold text-700"> Fecha Despacho </h6>
                            <p class="fs--2 text-600 mb-0">{{ !empty($Orden->fecha_despacho ) ? $Orden->fecha_despacho  :'N/D'  }} </p>
                            </div>
                        </li> 
                        <li class="border-top pt-3 mb-3 pb-1 cursor-pointer" onclick="frmSweetAlert02(1)">
                            <div class="border-start border-3 border-success ps-3 mt-1">
                            <h6 class="mb-1 fw-semi-bold text-700"> Fecha Estimada </h6>
                            <p class="fs--2 text-600 mb-0">{{ !empty($Orden->fecha_estimada ) ? $Orden->fecha_estimada  :'N/D'  }} </p>
                            </div>
                        </li> 
                        <li class="border-top pt-3 mb-3 pb-1 cursor-pointer" onclick="frmSweetAlert02(2)">
                            <div class="border-start border-3 border-warning ps-3 mt-1">
                            <h6 class="mb-1 fw-semi-bold text-700">Fecha Factura</h6>
                            <p class="fs--2 text-600 mb-0">{{ !empty($Orden->fecha_factura ) ? $Orden->fecha_factura  :'N/D'  }} </p>
                            </div>
                        </li> 
                        <li class="border-top pt-3 mb-3 pb-1 cursor-pointer" style="display:none">
                            <div class="border-start border-3 border-danger ps-3 mt-1">
                            <h6 class="mb-1 fw-semi-bold text-700"> Fecha Orden de Compra:  </h6>
                            <p class="fs--2 text-600 mb-0">{{ !empty($Orden->fecha_orden_compra ) ? $Orden->fecha_orden_compra  :'N/D'  }} </p>
                            </div>
                        </li> 
                    </ul>
                </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

            <div class="card mb-3">
              <div class="card-header">
                <div class="row flex-between-center">
                  <div class="col-auto col-sm-6 col-lg-7">

                    <div class="row g-sm-4">
                    <div class="col-12 col-sm-auto ">
                        <div class="mb-3 pe-4 border-sm-end border-200 ">
                          <h6 class="fs--2 text-600 mb-1">TOTAL</h6>
                          <div class="d-flex align-items-center ">
                            <h5 class="fs-0 text-900 mb-0 me-2" id="id_tt_list_product"> {{count($Orden->Detalles)}} </h5>
                          </div>
                        </div>
                      </div>
                      <div class="col-12 col-sm-auto">
                        <div class="mb-3 pe-4 border-sm-end border-200">
                          <h6 class="fs--2 text-600 mb-1">MIFIC</h6>
                          <div class="d-flex align-items-center">
                            <h5 class="fs-0 text-900 mb-0 me-2" id="id_count_tbl_mific"> 0 </h5><span class="badge rounded-pill bg-primary"><span id="id_count_tbl_mific_procent"></span> %</span>
                          </div>
                        </div>
                      </div>
                      <div class="col-12 col-sm-auto">
                        <div class="mb-3 pe-4 border-sm-end border-200">
                          <h6 class="fs--2 text-600 mb-1">REGENCIA</h6>
                          <div class="d-flex align-items-center">
                            <h5 class="fs-0 text-900 mb-0 me-2" id="id_count_tbl_regencia">0</h5><span class="badge rounded-pill bg-success"> <span id="id_count_tbl_regencia_procent"></span> %</span>
                          </div>
                        </div>
                      </div>
                      <div class="col-12 col-sm-auto">
                        <div class="mb-3 pe-4 border-sm-end border-200">
                          <h6 class="fs--2 text-600 mb-1">MINSA</h6>
                          <div class="d-flex align-items-center">
                            <h5 class="fs-0 text-900 mb-0 me-2" id="id_count_tbl_minsa" >0</h5><span class="badge rounded-pill bg-info"> <span id="id_count_tbl_minsa_procent"></span> %</span>
                          </div>
                        </div>
                      </div>
                      
                      <div class="col-12 col-sm-auto invisible">
                        <div class="mb-3 pe-0">
                          <h6 class="fs--2 text-600 mb-1">Vendedor / Fabricante </h6>
                          <div class="d-flex align-items-center">
                            <h5 class="fs-0 text-900 mb-0 me-2">5</h5>
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
                          <th class="border-0">Productos </th>
                          <th class="border-0 text-center">Estado</th>
                          <th class="border-0 text-center">Cantidad</th>
                          <th class="border-0 text-end">Precio. Farmacia</th>
                          <th class="border-0 text-end">Precio. Público</th>
                          <th class="border-0 text-end">Precio. Institución</th>
                          <th class="border-0 text-end">MIFIC</th>
                          <th class="border-0 text-end">REGENCIA</th>
                          <th class="border-0 text-end">MINSA</th>
                        </tr>
                    </thead>
                    <tbody>

                  
                        @foreach ($Orden->Detalles as $lstProducto)

                        <tr class="border-200">
                        <td class="align-middle text-center">{{$lstProducto->linea}}</td>
                          <td class="align-middle">
                            <div class="d-flex align-items-center position-relative"><img class="rounded-1 border border-200" src="{{ asset('images/item.png') }}"alt="" width="60">
                              <div class="flex-1 ms-3">
                                <h6 class="mb-1 fw-semi-bold text-nowrap"><a href=""> <strong>{{$lstProducto->isProduct->Tipo->descripcion}} </strong></a> : {{$lstProducto->isProduct->descripcion_corta}}</h6>
                                <p class="fw-semi-bold mb-0 text-500">{{$lstProducto->isProduct->descripcion_larga}}</p>                            
                                <div class="row g-0 fw-semi-bold text-center py-2 fs--1">
              
                                    
                                    <div class="row g-0 fw-semi-bold text-center py-2 fs--1"> 
                                        <div class="col-auto"><a class="rounded-2 d-flex align-items-center me-3 text-700" href="#!" onclick="Editar({{$lstProducto->id}})"><span class="ms-1 fas fa-pencil-alt text-primary"></span><span class="ms-1">Editar</span></a></div>
                                        <div class="col-auto"><a class="rounded-2 d-flex align-items-center me-3 text-700" href="#!" ><span class="ms-1 fas fa-comment text-primary"></span><span class="ms-1">Comentarios (1)</span></a></div>
                                        <div class="col-auto d-flex align-items-center"><a class="rounded-2 text-700 d-flex align-items-center" href="#!" onclick="Remover({{$lstProducto->id}})"><span class="ms-1 fas fa-trash-alt text-danger" ></span><span class="ms-1">Borrar</span></a></div>                                    
                                        <div class="col-auto d-flex align-items-center">
                                            @if($lstProducto->mific !='0')
                                              <span class="ms-3 badge rounded-pill bg-primary"> MIFIC <span class="fas fa-check"></span></span>  
                                            @endif
                                            @if($lstProducto->regencia !='0')
                                              <span class="ms-3 badge rounded-pill bg-success"> REGENCIA  <span class="fas fa-check"></span></span>
                                            @endif
                                            @if($lstProducto->minsa !='0')
                                              <span class="ms-3 badge rounded-pill bg-info"> MINSA <span class="fas fa-check"></span></span>
                                            @endif
                                        </div>
                                    </div>
                                </div> 
                              </div>
                            </div>
                          </td>
                          <td class="align-middle text-center"><span class="badge fs--1 w-100 badge-soft-success"> {{$lstProducto->getEstado->descripcion}}</span></td>
                          <td class="align-middle text-center">{{number_format($lstProducto->cantidad,2)}}</td>
                          <td class="align-middle text-end">C$ {{number_format($lstProducto->precio_farmacia,2)}}</td>
                          <td class="align-middle text-end">C$ {{number_format($lstProducto->precio_publico,2)}}</td>
                          <td class="align-middle text-end">C$ {{number_format($lstProducto->precio_institucion,2)}}</td>
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
                          
                        </tr>
                          
                        @endforeach

                        
                     
                    </tbody>
                    </table>
                </div>
                <div class="row g-0 justify-content-end mt-3 invisible">
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


        <!--OPEN MODALS -->
        <div class="modal fade" id="mdl_add_product" tabindex="-1" role="dialog" aria-labelledby="authentication-modal-label" aria-hidden="true">
          <div class="modal-dialog modal-xl mt-6" role="document">
            <div class="modal-content border-0">
              <div class="modal-header px-5 position-relative modal-shape-header bg-shape">
                <div class="position-relative z-index-1 light">
                  <h4 class="mb-0 text-white" id="authentication-modal-label"><span id="id_modal_state"></span> producto P.O.</h4>
                  <p class="fs--1 mb-0 text-white">Ingresar articulos a la PO</p>                  
                  <span id="id_mdl_po" ></span>
                </div>
                <button class="btn-close btn-close-white position-absolute top-0 end-0 mt-2 me-2" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body py-4 px-5">
                
              

                
                <div class="row g-2">
                  <div class="col-4">
                    <div class="mb-3">
                      <label for="">Estado</label>
                      <select class="form-select" id="id_select_estado">                  
                          @foreach ($EstadosProducto as $est)
                          <option value="{{ strtoupper($est->id) }}">{{ strtoupper($est->descripcion) }}</option>
                          @endforeach
                            
                        </select>
                    </div>
                  </div>                  
                  <div class="col-4">
                    <div class="mb-3">
                      <label for="">Producto</label>
                      <select class="form-select" id="id_select_producto">                  
                          @foreach ($Productos as $pdt)
                          <option value="{{ strtoupper($pdt['id']) }}">{{ strtoupper($pdt->Tipo->descripcion) }} : {{ strtoupper($pdt['descripcion_corta']) }}</option>
                          @endforeach
                            
                        </select>
                    </div>
                  </div>
                  <div class="col-4">
                    <div class="mb-3">
                      <label class="form-label" for="">Cantidad:</label>
                      <input class="form-control" type="text" name="" placeholder="0.00" required="required" id="id_frm_cantidad"/>                      
                    </div>
                  </div>
                </div>

                <div class="row g-2">
                  <div class="col-4">
                    <div class="mb-3">
                      <label class="form-label" for="">Precio. Farmacia:</label>
                      <input class="form-control" type="text" name="" placeholder="C$ 0.00" required="required" id="id_frm_precio_farma"/>
                      <div class="invalid-feedback">Please enter password</div>
                    </div>
                  </div>
                  <div class="col-4">
                    <div class="mb-3">
                      <label class="form-label" for="">Precio Público:</label>
                      <input class="form-control" type="text" name="" placeholder="C$ 0.00" required="required"id="id_frm_precio_public"/>                      
                    </div>
                  </div>
                  <div class="col-4">
                    <div class="mb-3">
                      <label class="form-label" for="">Precio Institución:</label>
                      <input class="form-control" type="text" name="" placeholder="C$ 0.00" required="required" id="id_frm_precio_insti" />                      
                    </div>
                  </div>
                </div>

                <div class="row g-2">
                  <div class="col-4">
                    <div class="mt-3">
                      <div class="form-check form-switch">
                        <label class="form-check-label" for="id_chk_mific">MIFIC</label>
                        <input class="form-check-input" id="id_chk_mific" type="checkbox" />
                      </div>
                    </div>
                  </div>
                  <div class="col-4">
                    <div class="mt-3">
                      <div class="form-check form-switch">
                        <label class="form-check-label" for="id_chk_regencia">REGENCIA</label>
                        <input class="form-check-input" id="id_chk_regencia" type="checkbox"  />
                      </div>             
                    </div>
                  </div>
                  <div class="col-4">
                    <div class="mt-3">
                      <div class="form-check form-switch">
                        <label class="form-check-label" for="id_chk_minsa">MINSA</label>
                        <input class="form-check-input" id="id_chk_minsa" type="checkbox"  />
                      </div>
                    </div>
                  </div>
                </div>

               
                      
                <div class="mb-3">
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