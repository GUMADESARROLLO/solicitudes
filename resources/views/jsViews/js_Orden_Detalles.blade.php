<script type="text/javascript">
    var vTableArticulos = $('#tbl_detalles_articulos_po').DataTable();

    $('#id_txt_buscar').on('keyup', function() {        
        vTableArticulos.search(this.value).draw();
    });


    $("#tbl_detalles_articulos_po_length").hide();
    $("#tbl_detalles_articulos_po_filter").hide();

    var Selectors = {
        ADD_PRODUCT: '#mdl_add_product',
    };

    $("#id_btn_add_product").click(function(){
    
        var mdl_add_product = document.querySelector(Selectors.ADD_PRODUCT);
        var mdl_product = new window.bootstrap.Modal(mdl_add_product);
        mdl_product.show();
        $("#id_modal_state").text("Agregar");  

    });

    function Remover(id_producto){
        Swal.fire({
            title: '¿Estas Seguro de borrar el Producto?',
            text: "¡Esta acción no podrá ser revertida!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si!',
            target:"",
            showLoaderOnConfirm: true,
            preConfirm: () => {
                $.ajax({
                    url: "../delInfoLinea",
                    type: 'post',
                    data: {
                        id      : id_producto,
                        _token  : "{{ csrf_token() }}" 
                    },
                    async: true,
                    success: function(response) {
                        if(response.original){
                        Swal.fire({
                        title: 'Producto Borrado.',
                        icon: 'success',
                        showCancelButton: false,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'OK'
                        }).then((result) => {
                        if (result.isConfirmed) {
                            location.reload();
                            }
                        })
                    }
                    },
                    error: function(response) {
                    }
                }).done(function(data) {
                    
                });
            },
            allowOutsideClick: () => !Swal.isLoading()
        });
    }
    function Editar(Id){
        var mdl_add_product = document.querySelector(Selectors.ADD_PRODUCT);
        var mdl_product = new window.bootstrap.Modal(mdl_add_product);
        mdl_product.show();
        $("#id_modal_state").text("Editar");  

        $.ajax({
                url: "../getInfoLinea",
                type: 'post',
                data: {
                    id_linea           : Id,
                    _token  : "{{ csrf_token() }}" 
                },
                async: true,
                success: function(obj_producto) {

                    $("#id_select_producto").val(obj_producto[0].id_product).change();
                    $("#id_frm_cantidad").val(obj_producto[0].cantidad); 

                    $("#id_frm_precio_farma").val(isValue(obj_producto[0].precio_farmacia,0,true)); 
                    $("#id_frm_precio_public").val(isValue(obj_producto[0].precio_publico,0,true)); 
                    $("#id_frm_precio_insti").val(isValue(obj_producto[0].precio_institucion,0,true)); 

                    $("#id_frm_precio_insti").val((obj_producto[0].mific==='1')? true : false); 
                    $("#id_frm_precio_insti").val((obj_producto[0].regencia==='1')? true : false); 
                    $("#id_frm_precio_insti").val((obj_producto[0].minsa==='1')? true : false); 
                    
                },
                error: function(response) {
                    Swal.fire("Oops", "No se ha podido guardar!", "error");
                }
            }).done(function(data) {
                //location.reload();
            });

        
    }
    
    
    $("#id_frm_add_articulo_po").click(function(){

        var id_code             = $("#id_select_producto option:selected").val();   
        var descrip             = $("#id_select_producto option:selected").text();  
        var frm_Cantidad        = $("#id_frm_cantidad").val();  
        
        var frm_precio_farma    = $("#id_frm_precio_farma").val();   
        var frm_precio_public   = $("#id_frm_precio_public").val();   
        var frm_precio_insti    = $("#id_frm_precio_insti").val();   

        var isChkMific          = $("#id_chk_mific").prop('checked')
        var isChkRegen          = $("#id_chk_regencia").prop('checked')
        var isChkMinsa          = $("#id_chk_minsa").prop('checked')

        var modl_states         = $("#id_modal_state").text();  
        var id_po               = $("#id_mdl_po").text();  

        var ttModal             = (modl_states=='0')? 'Add' : 'Edit'

        descrip_corta           = isValue(id_code,'N/D',true)
        frm_Cantidad            = isValue(frm_Cantidad,0,true)

        frm_precio_farma        = isValue(frm_precio_farma,0,true)
        frm_precio_public       = isValue(frm_precio_public,0,true)
        frm_precio_insti        = isValue(frm_precio_insti,0,true)
        frm_Cantidad            = isValue(frm_Cantidad,0,true)
        id_po                   = isValue(id_po,0,true)

        isChkMific              = (isChkMific)? 1 : 0;
        isChkRegen              = (isChkRegen )? 1 : 0;
        isChkMinsa              = (isChkMinsa)? 1 : 0;


        


        if(descrip_corta === 'N/D' || frm_Cantidad === 0){
            Swal.fire("Oops", "Datos no Completos", "error");
            console.log(descrip_corta)
            console.log(frm_Cantidad)
        }else{

            $.ajax({
                url: "../AddProductPO",
                type: 'post',
                data: {
                    id_po           : id_po,
                    id_producto     : id_code,
                    Cantidad        : frm_Cantidad,                    
                    precio_farma    : frm_precio_farma,
                    precio_public   : frm_precio_public,
                    precio_insti    : frm_precio_insti,
                    isChkMific      : isChkMific,
                    isChkRegen      : isChkRegen,
                    isChkMinsa      : isChkMinsa,
                    _token  : "{{ csrf_token() }}" 
                },
                async: true,
                success: function(response) {
                    if(response.original){
                        Swal.fire({
                        title: 'Se agrego el producto',
                        icon: 'success',
                        showCancelButton: false,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'OK'
                        }).then((result) => {
                        if (result.isConfirmed) {
                            location.reload();
                            }
                        })
                    }
                },
                error: function(response) {
                    Swal.fire("Oops", "No se ha podido guardar!", "error");
                }
            }).done(function(data) {
                //location.reload();
            });

        }

    })
</script>
