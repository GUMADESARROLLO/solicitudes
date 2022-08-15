@extends('layouts.lyt_gumadesk')

@section('content')

    <!-- ===============================================-->
    <!--    Main Content-->
    <!-- ===============================================-->
    
    <main class="main" id="top">
      <div class="container" data-layout="container">
        
      @include('layouts.nav_ordenes')
      
        <div class="content">
        @include('layouts.nav_gumadesk')    
        
        <div class="card mb-3">
              <div class="card-body">
                <div class="row flex-between-center">
                  <div class="col-sm-auto mb-2 mb-sm-0">
                    <h6 class="mb-0">Showing 1-24 of 205 Products</h6>
                  </div>
                  <div class="col-sm-auto">
                    <div class="row gx-2 align-items-center">
                      <div class="col-auto">
                        <form class="row gx-2">
                          <div class="col-auto"><small>Sort by:</small></div>
                          <div class="col-auto">
                            <select class="form-select form-select-sm" aria-label="Bulk actions">
                              <option selected="">Best Match</option>
                              <option value="Refund">Newest</option>
                              <option value="Delete">Price</option>
                            </select>
                          </div>
                        </form>
                      </div>
                      <div class="col-auto pe-0"> <a class="text-600 px-1" href="../../../app/e-commerce/product/product-list.html" data-bs-toggle="tooltip" data-bs-placement="top" title="Product List"><span class="fas fa-list-ul"></span></a></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          <div class="card mb-3">
            <div class="card-body">
              <div class="row" id="id_result">
                
              </div>
            </div>    
            <div class="card-footer bg-light d-flex justify-content-center">
                <div>
                  <button class="btn btn-falcon-default btn-sm me-2" type="button" disabled="disabled" data-bs-toggle="tooltip" data-bs-placement="top" title="Prev"><span class="fas fa-chevron-left"></span></button><a class="btn btn-sm btn-falcon-default text-primary me-2" href="#!">1</a><a class="btn btn-sm btn-falcon-default me-2" href="#!">2</a><a class="btn btn-sm btn-falcon-default me-2" href="#!"> <span class="fas fa-ellipsis-h"></span></a><a class="btn btn-sm btn-falcon-default me-2" href="#!">35</a>
                  <button class="btn btn-falcon-default btn-sm" type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Next"><span class="fas fa-chevron-right">     </span></button>
                </div>
              </div>        
          </div>
          @include('layouts.footer_gumadesk')
          
        </div>       
      </div>
    </main>
    <!-- ===============================================-->
    <!--    End of Main Content-->
    <!-- ===============================================-->
    

@endsection('content')
