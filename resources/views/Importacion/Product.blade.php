@extends('layouts.lyt_gumadesk')
@section('metodosjs')
@include('jsViews.js_product');
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
                    <h5 class="fs-0 mb-0 text-nowrap py-2 py-xl-0">Product</h5>
                    </div>
                    <div class="col-8 col-sm-auto text-end ps-2">
                    <div class="d-none" id="table-customers-actions">
                        <div class="d-flex">
                        <select class="form-select form-select-sm" aria-label="Bulk actions">
                            <option selected="">Bulk actions</option>
                            <option value="Refund">Refund</option>
                            <option value="Delete">Delete</option>
                            <option value="Archive">Archive</option>
                        </select>
                        <button class="btn btn-falcon-default btn-sm ms-2" type="button">Apply</button>
                        </div>
                    </div>
                    <div id="table-customers-replace-element">
                        <button class="btn btn-falcon-default btn-sm" type="button" id="id_btn_new"><span class="fas fa-plus" data-fa-transform="shrink-3 down-2" ></span><span class="d-none d-sm-inline-block ms-1">Crear</span></button>
                    </div>
                    </div>
                </div>
                </div>
                <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-sm table-striped fs--1 mb-0 overflow-hidden" id="tbl_productos">
                    <thead class="bg-200 text-900">
                        <tr>
                        <th class="sort pe-1 align-middle white-space-nowrap" data-sort="name">Nombre Corto</th>
                        <th class="sort pe-1 align-middle white-space-nowrap ps-5" data-sort="address" style="min-width: 200px;">Nombre Largo</th>
                        
                        <th class="align-middle no-sort"></th>
                        </tr>
                    </thead>
                    <tbody class="list" id="table-customers-body">
                        @foreach ($Productos as $producto)  
                        <td>
                            <div class="d-flex align-items-center position-relative">
                                <img class="rounded-1 border border-200" src="{{ asset('images/item.png') }}" width="60" alt="" />
                                <div class="flex-1 ms-3">
                                    <h6 class="mb-1 fw-semi-bold text-nowrap"><a class="text-900 stretched-link" href="#!">{{ strtoupper($producto->Tipo->descripcion) }} : {{ strtoupper($producto['descripcion_corta']) }}</a></h6>
                                    <p class="fw-semi-bold mb-0 text-500">{{ strtoupper($producto['created_at']) }}</p>
                                </div>
                            </div>
                        </td>
                        <td class="address align-middle white-space-nowrap ps-5 py-2">{{ strtoupper($producto['descripcion_larga']) }}</td>                        
                        <td class="align-middle white-space-nowrap py-2 text-end">
                            <div class="dropdown font-sans-serif position-static">
                            <button class="btn btn-link text-600 btn-sm dropdown-toggle btn-reveal" type="button" id="customer-dropdown-0" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false"><span class="fas fa-ellipsis-h fs--1"></span></button>
                            <div class="dropdown-menu dropdown-menu-end border py-0" aria-labelledby="customer-dropdown-0">
                                <div class="bg-white py-2"><a class="dropdown-item" href="#!" onClick="OpenModal({{ strtoupper($producto['id']) }})">Editar</a>
                                <a class="dropdown-item text-danger" href="#!"onClick="RemoveProducto({{ strtoupper($producto['id']) }})">Borrar</a></div>
                            </div>
                            </div>
                        </td>
                        </tr>
                        @endforeach
                    </tbody>
                    </table>
                </div>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-center">
                <button class="btn btn-sm btn-falcon-default me-1" type="button" title="Previous" data-list-pagination="prev"><span class="fas fa-chevron-left"></span></button>
                <ul class="pagination mb-0"></ul>
                <button class="btn btn-sm btn-falcon-default ms-1" type="button" title="Next" data-list-pagination="next"><span class="fas fa-chevron-right"></span></button>
                </div>
            </div>



            @include('layouts.footer_gumadesk')
        </div>

        <!--OPEN MODALS -->
        <div class="modal fade" id="modal_new_product" tabindex="-1">
          <div class="modal-dialog modal-xl">
            <div class="modal-content border-0">
            <div class="modal-header px-5 position-relative modal-shape-header bg-shape">
                <div class="position-relative z-index-1 light">
                    <h4 class="mb-0 text-white" id="authentication-modal-label">Producto</h4>
                    <p class="fs--1 mb-0 text-white"> --- </p>
                    <p class="fs--1 mb-0 text-white" id="id_modal_state"> - </p>
                </div>
                <button class="btn-close btn-close-white position-absolute top-0 end-0 mt-2 me-2" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
                <div class="modal-body p-card">
                    <div class="mb-3">
                        <label class="fs-0" for="id_articulo">Codigo de Sistema</label>
                        <select class="form-select" id="id_articulo" name="label">
                            <option value="" selected="selected">None</option>
                            @foreach ($Articulos as $articulo)
                            <option value="{{$articulo->ARTICULO}}">{{$articulo->ARTICULO}} | {{strtoupper($articulo->DESCRIPCION)}}</option>
                            @endforeach
                    
                        </select>
                    </div>
                  <div class="mb-3">
                    <label class="fs-0" for="id_nombre_corto">Nombre Corto</label>
                    <input class="form-control" id="id_nombre_corto" type="text" name="title" required="required" />
                  </div>
                  <div class="mb-3">
                    <label class="fs-0" for="id_nombre_largo">Nombre Largo</label>
                    <textarea class="form-control" rows="3" name="description" id="id_nombre_largo" required="required"></textarea>
                  </div>
                  <div class="mb-3">
                    <label class="fs-0" for="id_tipo">Tipo</label>
                    <select class="form-select" id="id_tipo" name="label" required="required">
                        <option value="" selected="selected">None</option>
                        @foreach ($Tipos as $tipo)
                        <option value="{{$tipo->id}}"> {{strtoupper($tipo->descripcion)}}</option>
                        @endforeach
                    
                    </select>
                  </div>
                </div>
                <div class="card-footer d-flex justify-content-end align-items-center bg-light">
                  <button class="btn btn-primary px-4" id="id_send_frm_produc" type="submit">Guardar</button>
                </div>
            </div>
          </div>
        </div>
        <!--CLOSE MODALS -->
    </div>
</main>
@endsection('content')