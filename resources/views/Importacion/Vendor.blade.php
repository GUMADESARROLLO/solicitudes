@extends('layouts.lyt_gumadesk')
@section('metodosjs')
@include('jsViews.js_vendor');
@endsection
@section('content')

<!-- ===============================================-->
<!--    Main Content-->
<!-- ===============================================-->
<main class="main" id="top">
    <div class="container-fluid" data-layout="container">
        <div class="content">
            @include('layouts.nav_gumadesk')
            <div class="card mb-3" id="customersTable" data-list='{"valueNames":["name","email","phone","address","joined"],"page":10,"pagination":true}'>
            <div class="card-header">
                <div class="row flex-between-center">
                    <div class="col-4 col-sm-auto d-flex align-items-center pe-0">
                    <h5 class="fs-0 mb-0 text-nowrap py-2 py-xl-0"></h5>
                    </div>
                    <div class="col-8 col-sm-auto text-end ps-2">
                   
                    <div class="col-8 col-sm-auto text-end ps-2">
                        <div id="table-customers-replace-element">
                            <div class="input-group" >
                                <input class="form-control form-control-sm shadow-none search" type="search" placeholder="Buscar..." aria-label="search" id="id_txt_buscar" />
                                <div class="input-group-text bg-transparent">
                                    <span class="fa fa-search fs--1 text-600"></span>
                                </div>
                                <div class="input-group-text bg-transparent" id="id_btn_new">
                                    <span class="fa fa-plus fs--1 text-600"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    </div>
                </div>
                </div>
                <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-sm table-striped fs--1 mb-0 overflow-hidden" id="tbl_vendors">
                    <thead class="bg-200 text-900">
                        <tr>
                            <th class="sort pe-1 align-middle white-space-nowrap" data-sort="name">Nombre</th>
                            <th class="sort pe-1 align-middle white-space-nowrap" data-sort="joined">Creado.</th>
                            
                        </tr>
                    </thead>
                    <tbody class="list" id="table-customers-body">

                        @foreach ($Vendors as $vnd)      
                        <td class="align-middle">
                        <div class="address d-flex align-items-center position-relative"><img class="rounded-1 border border-200" src="{{ asset('images/item.png') }}"alt="" width="60">
                            <div class="flex-1 ms-3">
                            <h6 class="mb-1 fw-semi-bold text-nowrap"><strong>{{ strtoupper($vnd->nombre_vendor) }} </strong></h6>
                            <p class="fw-semi-bold mb-0 text-500">{{ strtoupper($vnd->Descripcion) }}</p>                            
                            <div class="row g-0 fw-semi-bold text-center py-2 fs--1">
                                <div class="col-auto">
                                    <a class="rounded-2 d-flex align-items-center me-3 text-700" href="#!" onclick="OpenModal({{$vnd->id}})"> <span class="ms-1 fas fa-pencil-alt text-primary " data-fa-transform="shrink-2" ></span> 
                                    <span class="ms-1">Editar</span></a>
                                </div>
                                <div class="col-auto d-flex align-items-center">
                                    <a class="rounded-2 text-700 d-flex align-items-center" href="#!" onclick="RemoveVendor({{$vnd->id}})" >
                                    <span class="ms-1 fas fa-trash-alt text-danger" data-fa-transform="shrink-2" ></span><span class="ms-1">Borrar</span>
                                    </a>
                                </div>
                                
                            </div> 
                            </div>
                        </div>
                        </td> 
                        <td class="address joined align-middle py-2">{{ date('F d, Y, h:m A', strtotime($vnd->created_at))  }}</td>
                    
                        </tr>
                        @endforeach
                    </tbody>
                    </table>
                </div>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-center"></br></div>
            </div>



            @include('layouts.footer_gumadesk')
        </div>


         <!--OPEN MODALS -->
         <div class="modal fade" id="modal_new_vendor" tabindex="-1" role="dialog" aria-labelledby="authentication-modal-label" aria-hidden="true">
          <div class="modal-dialog modal-xl mt-6" role="document">
            <div class="modal-content border-0">
              <div class="modal-header px-5 position-relative modal-shape-header bg-shape">
                <div class="position-relative z-index-1 light">
                    <h4 class="mb-0 text-white" id="authentication-modal-label">Vendor</h4>
                    <p class="fs--1 mb-0 text-white"> --- </p>
                    <p class="fs--1 mb-0 text-white" id="id_modal_state"> - </p>
                </div>
                <button class="btn-close btn-close-white position-absolute top-0 end-0 mt-2 me-2" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body py-4 px-5">
                <div class="mb-3">
                    <label class="fs-0" for="id_name_vendor">Nombre: </label>
                    <input class="form-control" id="id_name_vendor" type="text" name="name_vendor" required="required" />
                  </div>
                <div class="mb-3">
                    <label class="fs-0" for="id_description">Descripcion</label>
                    <textarea class="form-control" rows="3" name="descripcion" id="id_description"></textarea>
                </div>
                <div class="mb-3">
                  <button class="btn btn-primary d-block w-100 mt-3" id="id_send_frm_vendor" type="submit">Guardar</button>
                </div>
              </div>
            </div>
          </div>
        </div>
        
        <!--CLOSE MODALS -->
    </div>
</main>
@endsection('content')