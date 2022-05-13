<script>
    $( document ).ready(function() {
        var StrRow = '';
        $.ajax({
            type : 'post',
            url: 'http://186.1.15.166:8448/gmv3_innova/api/api.php?get_recent',
            success:function(data) {
                
                if (data.length=='') {
                    $('.comentarios').html(`<div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <p class="text-center font-weight-bolder">No se encontraron registros</p>
                                    <center><img src="./images/icon_sinresultados.png" width="100" class="mt-4 mb-4" /></center>
                                </div>
                            </div>
                        </div>
                        </div>`);
                    
                }else {
                    $.each(data, function (i, item) {
                    StrRow += `
                        <div class="mb-4 col-md-6 col-lg-4">
                            <div class="border rounded-1 h-100 d-flex flex-column justify-content-between pb-3">
                                <div class="overflow-hidden">
                                    <div class="position-relative rounded-top overflow-hidden">
                                        <a class="d-block" href="">
                                            <img class="img-fluid rounded-top" src="{{ asset('images/1599859505__6095673.png') }}" alt="" />
                                        </a>
                                    </div>
                                    <div class="p-3">
                                        <h5 class="fs-0"><a class="text-dark" href="../../../app/e-commerce/product/product-details.html">`+ item.product_name +`</a></h5>
                                        <p class="fs--1 mb-3"><a class="text-500" href="#!">Computer &amp; Accessories</a></p>
                                        <h5 class="fs-md-2 text-warning mb-0 d-flex align-items-center mb-3"> C$ `+ item.product_price +`</h5>                                    
                                        <p class="fs--1 mb-1">Stock: <strong class="text-success">Disponible ( `+ item.product_quantity +` ) </strong>
                                        </p>
                                    </div>
                                </div>
                                
                                <div class="d-flex flex-between-center px-3">
                                    <div></div>                                
                                    <div>                                    
                                        <a class="btn btn-sm btn-falcon-default" href="#!" data-bs-toggle="tooltip" data-bs-placement="top" title="Add to Cart">
                                            <span class="fas fa-cart-plus"></span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>`;
                    });
                    $('#id_result').html(StrRow);
                }
                
            }
        });
    });
</script>

