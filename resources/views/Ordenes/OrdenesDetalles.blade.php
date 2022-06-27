@extends('layouts.lyt_gumadesk')
@section('metodosjs')
@include('jsViews.js_solicitud_detalles');
@endsection
@section('content')


<!-- ===============================================-->
<!--    Main Content-->
<!-- ===============================================-->
<main class="main" id="top">
    <div class="container-fluid" data-layout="container">
    <div class="content">
    @include('layouts.nav_gumadesk')
        <div class="card mb-3">
            <div class="card-body">
                <div class="table-responsive fs--1">
                <table class="table table-striped border-bottom" id="id_table_solicitud_detalles">
                    <thead class="bg-200 text-900">
                        <tr>
                            <th class="border-0 text-center" >INGRESOS</th>
                            <th class="border-0 text-center" ></th>
                            <th class="border-0 text-center" ></th>
                            <th class="border-0 text-center" ></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php  $total = 0; ?>
                        @foreach($Solicitud_Detalles as $s)
                            <tr class="border-200 " >
                                <!--<td class="align-middle text-center">{{ $s['Cantidad'] }}</td>
                                <td class="align-middle text-center">{{ $s['Fecha'] }}</td>-->
                                <td class="col-4">
                                
                                    <div class="d-flex align-items-center position-relative">
                                        <img class="rounded-1 border border-200" src="{{ asset('images/item.png') }}" alt="" width="60">
                                        <div class="flex-1 ms-3" >
                                            <h6 class="mb-1 fw-semi-bold text-nowrap">Ingreso:  <a href="#!"> <strong> {{ $s['Cantidad'] }} </strong></a> </h6>
                                            <p class="fw-semi-bold mb-0 text-500">#{{ $s['id_ingreso'] }} - {{ $s['Fecha'] }}</p>
                                            
                                            <div class="row g-0 fw-semi-bold text-center py-2 fs--1">                                                
                                                <div class="col-auto"><a class="rounded-2 d-flex align-items-center me-3 text-700" href="#!" onclick="EditIngreso({{ $s['id_ingreso'] }})" ><span class="ms-1 fas fa-edit text-primary" data-fa-transform="shrink-2"   ></span><span class="ms-1">Editar </span></a></div> 
                                                <div class="col-auto d-flex align-items-center"><a class="rounded-2 text-700 d-flex align-items-center" href="../DelIngreso/{{ $s['id_ingreso'] }}/{{ $s['id_solicitud'] }}" ><span class="ms-1 fas fa-trash text-danger" data-fa-transform="shrink-2" ></span><span class="ms-1">Borrar</span></a></div> 
                                            </div>
                                        </div>
                                    </div>

                                   
                                </td>
                                <td>{{ $s['Cantidad'] }} </td>
                                <td>{{ $s['Fecha'] }} </td>
                                <td>{{ $s['id_ingreso'] }} </td>
                                <?php $total += $s->Cantidad; ?>

                                

                            </tr>
                        @endforeach
                    </tbody>
                </table>
                </div>
                <div class="row g-0 justify-content-end">
                <div class="col-auto">
                    <table class="table table-sm table-borderless fs--1 text-end">
                    <tr class="border-top">
                        <th class="text-900">Total Ingreso:</th>
                        <td class="fw-semi-bold">( {{number_format($total,2)}} )</td>
                    </tr>
                    </table>
                </div>
                </div>
            </div>
        </div>
        
        @include('layouts.footer_gumadesk')
    </div>
    <div class="modal fade" id="addNuevaSolicitud" tabindex="-1" role="dialog" aria-labelledby="authentication-modal-label" aria-hidden="true">
          <div class="modal-dialog modal-xl mt-6" role="document">
            <div class="modal-content border-0">
              <div class="modal-header px-5 position-relative modal-shape-header bg-shape">
                <div class="position-relative z-index-1 light">
                  <h4 class="mb-0 text-white" id="id_mdl_nombre_articulo">Editar</h4>
                  <p class="fs--1 mb-0 text-white" ><span id="id_mdl_articulo">Nº : </span>  #<a href="!#" class="text-white"> <strong id="id_row"># 000 </strong></a> </p> 
                </div>
                <button class="btn-close btn-close-white position-absolute top-0 end-0 mt-2 me-2" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body py-4 px-5">                
                <div class="mb-3">
                  <label class="fs-0" for="eventStartDate">Fecha de Ingreso</label>
                  <input class="form-control datetimepicker" id="eventStartDate" type="text" required="required" name="startDate" placeholder="yyyy/mm/dd" data-options='{"static":"true","enableTime":"false","dateFormat":"Y-m-d"}' />
                </div>
                <div class="row gx-2">
                  <div class="mb-3 col-sm-12">
                    <label class="form-label" for="txt_proyeccion_mensual">Cantidad</label>
                    <input class="form-control" type="text" autocomplete="on" id="id_txt_proyeccion_mensual" onkeypress="soloNumeros(event.keyCode, event, $(this).val())"/>
                  </div>
                </div>                
                <div class="mb-3">
                  <button class="btn btn-primary d-block w-100 mt-3" id="id_send_info" type="submit" name="submit">Actualiar</button>
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