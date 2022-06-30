@extends('layouts.lyt_gumadesk')
@section('metodosjs')
@include('jsViews.js_proyecciones');

@endsection
@section('content')
    <!-- ===============================================-->
    <!--    Main Content-->
    <!-- ===============================================-->
    <main class="main" id="top">
      <div class="container-fluid" data-layout="container">
      
        <div class="content">
          
          @include('layouts.nav_gumadesk')

          <div class="card mb-3 overflow-hidden">
            <div class="card-header">
              <div class="row gx-0 align-items-center">
               
                <div class="col-auto col-md-auto order-md-2">
                  
                  <div class="d-flex align-items-center">
                  <h4 class="mb-0 fs-0 fs-sm-1 fs-lg-2 calendar-title"></h4>
                    <h4 class="text-primary mb-0 ms-3"><span id="id_sum_mes"></span> Kg. </h4>
                    <span class="badge rounded-pill ms-3 badge-soft-primary">
                      <span class="fas fa-caret-up"></span> 0.00 %
                    </span>
                  </div>
                </div>

                <div class="col-auto">
                 
                </div>

                <div class="col-auto d-flex justify-content-end order-md-1">
                  <button class="btn icon-item icon-item-sm shadow-none p-0 me-1 ms-md-2" type="button" data-event="prev" data-bs-toggle="tooltip" title="Previous"><span class="fas fa-arrow-left"></span></button>
                  <button class="btn icon-item icon-item-sm shadow-none p-0 me-1 me-lg-2" type="button" data-event="next" data-bs-toggle="tooltip" title="Next"><span class="fas fa-arrow-right"></span></button>
                </div>
                <div class="col col-md-auto d-flex justify-content-end order-md-3">
                  <button class="btn btn-falcon-primary btn-sm" type="button" data-event="today">Hoy</button>
                </div>
                <div class="col-md-auto d-md-none">
                  <hr />
                  
                </div>
                <div class="col d-flex justify-content-end order-md-2">
                  <div class="dropdown font-sans-serif me-md-2">
                    <button class="btn btn-falcon-default text-600 btn-sm dropdown-toggle dropdown-caret-none" type="button" id="email-filter" data-bs-toggle="dropdown" data-boundary="viewport" aria-haspopup="true" aria-expanded="false">
                      <span data-view-title="data-view-title">Por Mes</span><span class="fas fa-sort ms-2 fs--1"></span></button>
                    <div class="dropdown-menu dropdown-menu-end border py-2" aria-labelledby="email-filter">
                      <a class="active dropdown-item d-flex justify-content-between" href="#!" data-fc-view="dayGridMonth">Por Mes<span class="icon-check">
                        <span class="fas fa-check" data-fa-transform="down-4 shrink-4"></span></span></a>
                        <a class="dropdown-item d-flex justify-content-between" href="#!" data-fc-view="timeGridWeek">Por Semana<span class="icon-check">
                          <span class="fas fa-check" data-fa-transform="down-4 shrink-4"></span></span></a>
                          <a class="dropdown-item d-flex justify-content-between" href="#!" data-fc-view="timeGridDay">Por Dia<span class="icon-check">
                            <span class="fas fa-check" data-fa-transform="down-4 shrink-4"></span></span></a><a class="dropdown-item d-flex justify-content-between" href="#!" data-fc-view="listWeek">Por Lista<span class="icon-check"><span class="fas fa-check" data-fa-transform="down-4 shrink-4"></span></span></a><a class="dropdown-item d-flex justify-content-between" href="#!" data-fc-view="listYear">Ver año<span class="icon-check"><span class="fas fa-check" data-fa-transform="down-4 shrink-4"></span></span></a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="card-body p-0">
              <div class="calendar-outline" id="appCalendar"></div>
            </div>
          </div>
       
          
          @include('layouts.footer_gumadesk')
        </div>

        <div class="modal fade" id="eventDetailsModal" tabindex="-1">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border"></div>
          </div>
        </div>
            


        <div class="modal fade" id="addEventModal" tabindex="-1">
          <div class="modal-dialog">
            <div class="modal-content border">
              <form id="addEventForm" autocomplete="off">
                <div class="modal-header px-card bg-light border-bottom-0">
                  <h5 class="modal-title">Agregar produccion del dia</h5>
                  <button class="btn-close me-n1" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-card">
                  <div class="mb-3">
                    <label class="fs-0" for="eArticulos">Producto</label>
                    <select class="form-select" id="eArticulos" name="label">
                      <option value="0" selected="selected">...</option>
                    </select>
                  </div>
                  <div class="mb-3" >
                    <label class="fs-0" for="eCantidad">Cantida Producida</label>
                    <input class="form-control" id="eCantidad" type="text" name="title" required="required" onkeypress="soloNumeros(event.keyCode, event, $(this).val())"/>
                  </div>
                  <div class="mb-3" >
                    <label class="fs-0" for="eDate">Start Date</label>
                    <input class="form-control datetimepicker" id="eDate" type="text" required="required" name="startDate" placeholder="yyyy/mm/dd" data-options='{"static":"true","enableTime":"false","dateFormat":"Y-m-d"}' />
                  </div>
                  <div class="mb-3" style="display:none">
                    <label class="fs-0" for="">End Date</label>
                    <input class="form-control datetimepicker" id="" type="text" name="endDate" placeholder="yyyy/mm/dd" data-options='{"static":"true","enableTime":"false","dateFormat":"Y-m-d"}' />
                  </div>
                  <div class="form-check" style="display:none">
                    <input class="form-check-input" type="checkbox" id="eventAllDay" name="allDay" />
                    <label class="form-check-label" for="eventAllDay">All Day
                    </label>
                  </div>
                  <div class="mb-3" style="display:none">
                    <label class="fs-0">Schedule Meeting</label>
                    <div><a class="btn badge-soft-success btn-sm" href="#!"><span class="fas fa-video me-2"></span>Add video conference link</a></div>
                  </div>
                  <div class="mb-3">
                    <label class="fs-0" for="eComentario">Comentario</label>
                    <textarea class="form-control" rows="3" name="Comentario" id="eComentario"></textarea>
                  </div>
                 
                </div>
                <div class="card-footer d-flex justify-content-end align-items-center bg-light">
                  <button class="btn btn-primary px-4" type="submit" id="id_save_event">Guardar</button>
                </div>
              </form>
            </div>
          </div>
        </div>


      </div>
    </main>
    
    <!-- ===============================================-->
    <!--    End of Main Content-->
    <!-- ===============================================-->

@endsection('content')