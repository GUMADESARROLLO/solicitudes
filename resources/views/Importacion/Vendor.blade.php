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
                    <h5 class="fs-0 mb-0 text-nowrap py-2 py-xl-0">Proveedor</h5>
                    </div>
                    <div class="col-8 col-sm-auto text-end ps-2">                        
                        <div id="table-customers-replace-element">
                            <button class="btn btn-falcon-default btn-sm" type="button" id="id_btn_new"><span class="fas fa-plus" data-fa-transform="shrink-3 down-2"></span><span class="d-none d-sm-inline-block ms-1">Nuevo</span></button>
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
                            <th class="sort pe-1 align-middle white-space-nowrap ps-5" data-sort="address" style="min-width: 200px;">Descripcion</th>
                            <th class="sort pe-1 align-middle white-space-nowrap" data-sort="joined">Creado.</th>
                            <th class="align-middle no-sort"></th>
                        </tr>
                    </thead>
                    <tbody class="list" id="table-customers-body">

                        @foreach ($Vendors as $vnd)                        
                        <td class="name align-middle white-space-nowrap py-2"><a href="#!">
                            <div class="d-flex d-flex align-items-center">
                                <div class="avatar avatar-xl me-2">
                                <div class="avatar-name rounded-circle"><span>{{ strtoupper($vnd['id']) }}</span></div>
                                </div>
                                <div class="flex-1">
                                <h5 class="mb-0 fs--1">{{ strtoupper($vnd['nombre_vendor']) }}</h5>
                                </div>
                            </div>
                            </a>
                        </td>
                        <td class="address align-middle white-space-nowrap ps-5 py-2">{{ strtoupper($vnd['Descripcion']) }}</td>
                        <td class="joined align-middle py-2">{{ strtoupper($vnd['created_at']) }}</td>
                        <td class="align-middle white-space-nowrap py-2 text-end">
                            <div class="dropdown font-sans-serif position-static">
                            <button class="btn btn-link text-600 btn-sm dropdown-toggle btn-reveal" type="button" id="customer-dropdown-0" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false"><span class="fas fa-ellipsis-h fs--1"></span></button>
                            <div class="dropdown-menu dropdown-menu-end border py-0" aria-labelledby="customer-dropdown-0">
                                <div class="bg-white py-2"><a class="dropdown-item" href="#!" onClick="OpenModal({{ strtoupper($vnd['id']) }})">Editar</a>
                                <a class="dropdown-item text-danger" href="#!"onClick="RemoveVendor({{ strtoupper($vnd['id']) }})">Borrar</a></div>
                            </div>
                            </div>
                        </td>
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