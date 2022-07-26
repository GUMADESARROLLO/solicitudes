<script type="text/javascript">
    
    var vTableArticulos = $('#tbl_detalles_articulos_po').DataTable({
                            "fnDrawCallback": function ( row, data, start, end, display ) {
                            var api         = this.api(), data;  
                            var cMific      = 0
                            var cRegencia   = 0
                            var cMinsa      = 0
                            var tt_prod     = api.data().length

                            

            
                            api.column( 5 ).data().reduce( function (a, b) {                                
                                if(b.search("fa-check") != -1){
                                    cMific++;
                                }
                            }, 0 );

                            api.column( 6 ).data().reduce( function (a, b) {                                
                                if(b.search("fa-check") != -1){
                                    cRegencia++;
                                }
                            }, 0 );

                            api.column( 7 ).data().reduce( function (a, b) {                                
                                if(b.search("fa-check") != -1){
                                    cMinsa++;
                                }
                            }, 0 );

                            cMific_procent = numeral((cMific / tt_prod ) * 100).format('0,00');
                            cRegencia_procent = numeral((cRegencia / tt_prod ) * 100).format('0,00');
                            cMinsa_procent = numeral((cMinsa / tt_prod ) * 100).format('0,00');

                            $("#id_count_tbl_mific").text(cMific)
                            $("#id_count_tbl_mific_procent").text(cMific_procent)

                            $("#id_count_tbl_regencia").text(cRegencia)
                            $("#id_count_tbl_regencia_procent").text(cRegencia_procent)

                            $("#id_count_tbl_minsa").text(cMinsa)
                            $("#id_count_tbl_minsa_procent").text(cMinsa_procent)
                            
  
            
        }
    });

    

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
    function soloNumeros(caracter, e, numeroVal) {
        var numero = numeroVal;
        if (String.fromCharCode(caracter) === "." && numero.length === 0) {
            e.preventDefault();
            //swal.showValidationError('No se puede iniciar con un punto');
        } else if (numero.includes(".") && String.fromCharCode(caracter) === ".") {
            e.preventDefault();
            //swal.showValidationError('No puede haber mas de dos puntos');
        } else {
            const soloNumeros = new RegExp("^[0-9]+$");
            if (!soloNumeros.test(String.fromCharCode(caracter)) && !(String.fromCharCode(caracter) === ".")) {
                e.preventDefault();
                //swal.showValidationError('No se pueden escribir letras, solo se permiten datos númericos');
            }
        }
    }
    function frmSweetAlert(nTitulo){

        let idPO            = $("#id_lbl_po").text()

        let lblTitulos      = ["Nº de Factura", "Nº de Recibo","Via","Status","Estado de pago",'Carga','Fecha Despacho','Fecha Estimada','Fecha Factura', 'Fecha Orden Compra']
        let lblVia          = ['Tierra', 'Mar' , 'Aire']

        var sData           = {}

        TypeInput           = (nTitulo > 1)? 'select'  : 'text'

        

        var SelectData      = [[],[],[],['Estatus01','Estatus02','Estatus03'],[],[]];
        $.get( "../dtaSelect", function( data ) {
            
    
            $.map(data[0].Vias,function(o) {
                SelectData[2][o.id] = o.Descripcion;
            });
            $.map(data[0].EstadosPagos,function(o) {
                SelectData[4][o.id] = o.Descripcion;
            });
            $.map(data[0].TipoCarga,function(o) {
                SelectData[5][o.id] = o.Descripcion;
            });

            Swal.fire({
                title: lblTitulos[nTitulo],          
                input: TypeInput,
                inputOptions: SelectData[nTitulo],
                inputPlaceholder: 'N/D',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Aceptar',
                target:"",
                inputAttributes: {
                    onkeypress: 'soloNumeros(event.keyCode, event, $(this).val())'
                },
                showLoaderOnConfirm: true,
                preConfirm: (value) => {
                    if (!value) {
                        Swal.showValidationMessage("Debe Ingresar algo")
                    } else {
                        sData = {
                            id      : idPO,
                            origen  : 0,
                            valor   : value,
                            Campo   : nTitulo,
                            _token  : "{{ csrf_token() }}" 
                        }
                        SendInfo(sData)
                    }
                },
                allowOutsideClick: () => !Swal.isLoading()
            });
        
        });

        console.log(SelectData)

        
        

    }

    function frmSweetAlert02(nTitulo){
        let flatpickrInstance
        let idPO            = $("#id_lbl_po").text()
        let lblTitulos      = ['Fecha Despacho','Fecha Estimada','Fecha Factura', 'Fecha Orden Compra']
        let FormatDate      = 'YYYY-MM-DD'
        var now             = moment().format(FormatDate);
        
        Swal.fire({
            title: lblTitulos[nTitulo],
            html: '<input class="form-control " id="id_frm" placeholder="0000/00/00" value="'+now+'" >',
            
            stopKeydownPropagation: false,
                preConfirm: (value) => {

                    var dtDate = moment(flatpickrInstance.selectedDates[0]).format(FormatDate);
                    sData = {
                        id      : idPO,
                        origen  : 1,
                        valor   : dtDate,
                        Campo   : nTitulo,
                        _token  : "{{ csrf_token() }}" 
                    }
                    SendInfo(sData)


                },
                willOpen: () => {
                    flatpickrInstance = flatpickr(Swal.getPopup().querySelector('#id_frm'))
                }
        })
    
        

    }

    function SendInfo(dtInfo){
        $.ajax({
            url: "../UpdateImportacion",
            type: 'post',
            data: dtInfo,
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
            //CargarDatos(nMes,annio);
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
