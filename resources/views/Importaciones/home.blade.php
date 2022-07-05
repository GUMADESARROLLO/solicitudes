@extends('layouts.lyt_gumadesk')
@section('metodosjs')
@include('jsViews.js_importaciones');
@endsection
@section('content')

<!-- ===============================================-->
<!--    Main Content-->
<!-- ===============================================-->
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
                                <input class="form-control form-control-sm datetimepicker ps-4" id="CRMDateRange" type="text" data-options="{&quot;mode&quot;:&quot;range&quot;,&quot;dateFormat&quot;:&quot;M d&quot;,&quot;disableMobile&quot;:true , &quot;defaultDate&quot;: [&quot;Sep 12&quot;, &quot;Sep 19&quot;] }" /><span class="fas fa-calendar-alt text-primary position-absolute top-50 translate-middle-y ms-2"> </span>
                            </div>
                            <div class="col-auto"><a class="btn btn-falcon-primary btn-sm" href="../../app/email/compose.html"><span class="fas fa-plus me-1" data-fa-transform="shrink-3"></span>Crear </a></div>
                            </form>
                        </div>
                        
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="row g-3 mb-3">
            <div class="col-md-6 col-xxl-3">
            <div class="card h-md-100">
                    <div class="card-body">
                        <div class="row h-100 justify-content-between g-0">
                            <div class="col-5 col-sm-6 col-xxl pe-2">
                            <h6 class="mb-0 mt-2 d-flex align-items-center">MIFIC
                                <span class="ms-1 text-400" data-bs-toggle="tooltip" data-bs-placement="top" title="Calculated according to last week's sales">
                                    <span class="far fa-question-circle" data-fa-transform="shrink-1"></span>
                                </span>
                            </h6>
                            <div class="fs--2 mt-3">
                                <div class="d-flex flex-between-center mb-1">
                                <div class="d-flex align-items-center"><span class="dot bg-primary"></span><span class="fw-semi-bold">CON SI</span></div>
                                <div class="d-xxl">00.00</div>
                                </div>
                                <div class="d-flex flex-between-center mb-1">
                                <div class="d-flex align-items-center"><span class="dot bg-info"></span><span class="fw-semi-bold">CON NO</span></div>
                                <div class="d-xxl">00.00</div>
                                </div>
                                <div class="d-flex flex-between-center mb-1">
                                <div class="d-flex align-items-center"><span class="dot bg-300"></span><span class="fw-semi-bold">TOTAL</span></div>
                                <div class="d-xxl">00.00</div>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xxl-3">
                <div class="card h-md-100">
                    <div class="card-body">
                        <div class="row h-100 justify-content-between g-0">
                            <div class="col-5 col-sm-6 col-xxl pe-2">
                            <h6 class="mb-0 mt-2 d-flex align-items-center">REGENCIA NECESITA PERMISO
                                <span class="ms-1 text-400" data-bs-toggle="tooltip" data-bs-placement="top" title="Calculated according to last week's sales">
                                    <span class="far fa-question-circle" data-fa-transform="shrink-1"></span>
                                </span>
                            </h6>
                            <div class="fs--2 mt-3">
                                <div class="d-flex flex-between-center mb-1">
                                <div class="d-flex align-items-center"><span class="dot bg-primary"></span><span class="fw-semi-bold">CON SI</span></div>
                                <div class="d-xxl">00.00</div>
                                </div>
                                <div class="d-flex flex-between-center mb-1">
                                <div class="d-flex align-items-center"><span class="dot bg-info"></span><span class="fw-semi-bold">CON NO</span></div>
                                <div class="d-xxl">00.00</div>
                                </div>
                                <div class="d-flex flex-between-center mb-1">
                                <div class="d-flex align-items-center"><span class="dot bg-300"></span><span class="fw-semi-bold">TOTAL</span></div>
                                <div class="d-xxl">00.00</div>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xxl-3">
              <div class="card h-md-100">
                <div class="card-body">
                  <div class="row h-100 justify-content-between g-0">
                    <div class="col-5 col-sm-6 col-xxl pe-2">
                        <h6 class="mb-0 mt-2 d-flex align-items-center">MINSA Ó PRIVADO
                            <span class="ms-1 text-400" data-bs-toggle="tooltip" data-bs-placement="top" title="Calculated according to last week's sales">
                                <span class="far fa-question-circle" data-fa-transform="shrink-1"></span>
                            </span>
                        </h6>
                      <div class="fs--2 mt-3">
                        <div class="d-flex flex-between-center mb-1">
                          <div class="d-flex align-items-center"><span class="dot bg-primary"></span><span class="fw-semi-bold">CON SI</span></div>
                          <div class="d-xxl">00.00</div>
                        </div>
                        <div class="d-flex flex-between-center mb-1">
                          <div class="d-flex align-items-center"><span class="dot bg-info"></span><span class="fw-semi-bold">CON NO</span></div>
                          <div class="d-xxl">00.00</div>
                        </div>
                        <div class="d-flex flex-between-center mb-1">
                          <div class="d-flex align-items-center"><span class="dot bg-300"></span><span class="fw-semi-bold">TOTAL</span></div>
                          <div class="d-xxl">00.00</div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6 col-xxl-3">
            <div class="card h-md-100">
                    <div class="card-body">
                        <div class="row h-100 justify-content-between g-0">
                            <div class="col-5 col-sm-6 col-xxl pe-2">
                            <h6 class="mb-0 mt-2 d-flex align-items-center">ESTADOS
                                <span class="ms-1 text-400" data-bs-toggle="tooltip" data-bs-placement="top" title="Calculated according to last week's sales">
                                    <span class="far fa-question-circle" data-fa-transform="shrink-1"></span>
                                </span>
                            </h6>
                            <div class="fs--2 mt-3">
                                <div class="d-flex flex-between-center mb-1">
                                <div class="d-flex align-items-center"><span class="dot bg-primary"></span><span class="fw-semi-bold">TRANSITO</span></div>
                                <div class="d-xxl">00.00</div>
                                </div>
                                <div class="d-flex flex-between-center mb-1">
                                <div class="d-flex align-items-center"><span class="dot bg-info"></span><span class="fw-semi-bold">PRODUCTO MINSA</span></div>
                                <div class="d-xxl">00.00</div>
                                </div>
                                <div class="d-flex flex-between-center mb-1">
                                <div class="d-flex align-items-center"><span class="dot bg-300"></span><span class="fw-semi-bold">PEDIDO</span></div>
                                <div class="d-xxl">00.00</div>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
          </div>
          
            <div class="card mb-3">
                <div class="card-header"></div>
                <div class="card-body fs--1 border-top border-200 p-0" id="emails">

                    <?php
                    for($i=0;$i<=20;$i++){
                        echo '<div class="row border-bottom border-200 hover-actions-trigger hover-shadow py-2 px-1 mx-0 bg-white dark__bg-dark" data-href="ImportacionesDetalles">
                            <div class="col-auto d-none d-sm-block">
                                <div class="d-flex bg-white dark__bg-dark">
                                    
                                </div>
                            </div>

                            <div class="col col-md-9 col-xxl-10">
                                <div class="row">
                                    <div class="col-md-4 col-xl-3 col-xxl-2 ps-md-0 mb-1 mb-md-0">
                                        <div class="d-flex position-relative">
                                            <div class="avatar avatar-s">
                                                <img class="rounded-soft" src="images/item.png" alt="" />

                                            </div>
                                        <div class="flex-1 ms-2"><a class="fw-bold stretched-link inbox-link" href="ImportacionesDetalles"># AD20294</a></div>
                                    </div>
                                </div>
                                <div class="col"><a class="d-block inbox-link" href="ImportacionesDetalles">
                                    <span class="fw-bold">Goodreads Newsletter: March 5, 2019</span><span class="mx-1">&ndash;</span>
                                    <span>The most anticipated books of spring, a rocking read, and more! Goodreads Spring...</span></a>
                                </div>
                            </div>
                            </div>
                            <div class="col-auto ms-auto d-flex flex-column justify-content-between">
                                <span class="fw-bold">March 5</span>
                                <span class="far text-300 fa-star ms-auto mb-2 d-sm-none" data-fa-transform="down-7"></span></div>
                        </div>';
                    }
                    ?>
                </div>
                <div class="card-footer d-flex justify-content-between align-items-center"></br></div>
            </div>
            
            @include('layouts.footer_gumadesk')
        </div>
    </div>
</main>
@endsection('content')