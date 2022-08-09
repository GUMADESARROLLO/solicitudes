<script type="text/javascript">
    var vTableArticulos = $('#tbl_detalles_articulos_po').DataTable({
                        
                        "columnDefs": [
                                {
                                    "visible": false,
                                    "searchable": false,
                                    "targets": [0,1,2,3]
                                },
                            ],
                            "fnDrawCallback": function ( row, data, start, end, display ) {
                            var api         = this.api(), data;  
                            var cMific      = 0
                            var cRegencia   = 0
                            var cMinsa      = 0
                            var tt_prod     = api.data().length

                            

            
                            api.column( 1 ).data().reduce( function (a, b) {                                
                                if(b.search("fa-check") != -1){
                                    cMific++;
                                }
                            }, 0 );

                            api.column( 2 ).data().reduce( function (a, b) {                                
                                if(b.search("fa-check") != -1){
                                    cRegencia++;
                                }
                            }, 0 );

                            api.column( 3 ).data().reduce( function (a, b) {                                
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
        MODAL_COMMENT: '#IdmdlComment',
    };
   
    $("#id_btn_add_product").click(function(){
    
        var mdl_add_product = document.querySelector(Selectors.ADD_PRODUCT);
        var mdl_product = new window.bootstrap.Modal(mdl_add_product);
        mdl_product.show();

        $("#id_modal_state").text("Agregar");  
        
        var Id = $("#id_lbl_po").text(); 

        $("#id_mdl_po").text(Id);  



        

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

    function AddComment(obj){
        var addcomment_ = document.querySelector(Selectors.MODAL_COMMENT);
        var mdl_comment = new window.bootstrap.Modal(addcomment_);
        
        var fecha_humana = moment(obj.created_at).format("D MMM, YYYY")
        
        $("#id_modal_name_item").text(obj.is_product.tipo.descripcion + ' : ' + obj.is_product.descripcion_corta)
        $("#id_modal_articulo").text(obj.is_product.descripcion_larga)
        $("#id_modal_nSoli").text(obj.id)
        $("#id_modal_Fecha").text(fecha_humana)
        
        mdl_comment.show();
        getComment(obj.id)

    }

    var intVal = function ( i ) {
        return typeof i === 'string' ?
        i.replace(/[^0-9.]/g, '')*1 :
        typeof i === 'number' ?
        i : 0;
    };

    $('#id_textarea_comment').keydown(function(event){
        if (event.which == 13){

            var id_Item = $("#id_modal_nSoli").text()
            var value = $(this).val();

            $.ajax({
                url: "../AddCommentDetalles",
                type: 'post',
                data: {
                    id_item     : id_Item,
                    comment     : value,                    
                    _token      : "{{ csrf_token() }}" 
                },
                async: true,
                success: function(response) {
                    getComment(id_Item)
                },
                error: function(response) {
                   // Swal.fire("Oops", "No se ha podido guardar!", "error");
                }
            }).done(function(data) {
                location.reload();
            });
        }
    });
    function DeleteComment(id_comment,id_Solicitud){
        console.log(id_Solicitud)
        Swal.fire({
            title: '¿Estas Seguro de borrar el Comentario?',
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
                    url: "../DeleteCommentDetalle",
                    type: 'post',
                    data: {
                        id      : id_comment,
                        _token  : "{{ csrf_token() }}" 
                    },
                    async: true,
                    success: function(response) {
                        //Swal.fire("Exito!", "Guardado exitosamente", "success");
                    },
                    error: function(response) {
                        //Swal.fire("Oops", "No se ha podido guardar!", "error");
                    }
                }).done(function(data) {
                    getComment(id_Solicitud)
                });
            },
            allowOutsideClick: () => !Swal.isLoading()
        });
    }
    $("#id_btn_delete_po").click(function(){

        var id_orden = $("#id_lbl_po").text();

        Swal.fire({
            title: '¿Estas Seguro de borrar La Orden?' ,
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
                    url: "../DeletePO",
                    type: 'post',
                    data: {
                        id      : id_orden,
                        _token  : "{{ csrf_token() }}" 
                    },
                    async: true,
                    success: function(response) {
                        window.location.href = "../Importacion";
                    },
                    error: function(response) {
                    }
                }).done(function(data) {
                    
                });
            },
            allowOutsideClick: () => !Swal.isLoading()
        });

    });
    function getComment(Id){

        var var_rol         = intVal($("#id_rol").text());      
        var var_login_user  = intVal($("#id_login_user").text());      
    
        var items_comment = '';
        $("#id_textarea_comment").val(items_comment)
        $.ajax({
            url: '../getCommentImportacion',
            type: 'post',
            data: {
                id_item     : Id,                  
                _token      : "{{ csrf_token() }}" 
            }, 
            async: false,
            dataType: "json",
            success: function(data){
                $.each(data,function(key, c) {
                    var var_borrar = ''

                    if(var_rol==1){
                        var_borrar = '<a href="#!" onClick="DeleteComment('+c.id_comment+' , '+c.id_linea+' )">Borrar</a> &bull; ' 
                    }else{
                        var_borrar = (c.id_usuario ===  var_login_user)? '<a href="#!" onClick="DeleteComment('+c.id_comment+' , '+c.id_linea+' )">Borrar</a> &bull; ' : ''

                    }


                    
                    

                    var date_comment = moment(c.created_at).format("D MMM, YYYY")
                    items_comment += ' <div class="d-flex mt-3">'+
                                            '<div class="avatar avatar-xl">'+
                                                '<img class="rounded-circle" src="{{ asset("images/user/avatar-4.jpg") }}" alt="" />'+
                                            '</div>'+
                                            '<div class="flex-1 ms-2 fs--1">'+
                                                '<p class="mb-1 bg-200 rounded-3 p-2">'+
                                                '<a class="fw-semi-bold" href="!#">'+c.username+'</a> '+
                                                ' '+c.comment+'  </p>'+
                                                '<div class="px-2">'+
                                                var_borrar+
                                                date_comment+'</div>'+
                                            '</div>'+
                                        '</div>'
                }); 	 
            },
            error: function(data) {
                //alert('error');
            }
        }); 

        $("#id_comment_item").html(items_comment)
    }
    function Editar(Id, statusBtn){


        $("#id_div_btn_send").hide();

        var mdl_add_product = document.querySelector(Selectors.ADD_PRODUCT);
        var mdl_product = new window.bootstrap.Modal(mdl_add_product);
        mdl_product.show();
        $("#id_modal_state").text("Editar");  

        
        $("#id_mdl_po").text(Id);  

        $.ajax({
                url: "../getInfoLinea",
                type: 'post',
                data: {
                    id_linea           : Id,
                    _token  : "{{ csrf_token() }}" 
                },
                async: true,
                success: function(obj_producto) {

                    $("#id_mercado").val(obj_producto[0].id_tipo_mecado).change();
                    $("#id_tiene_venta").val(obj_producto[0].TieneVenta).change();
                    $("#id_select_producto").val(obj_producto[0].id_product).change();
                    $("#id_frm_cantidad").val(obj_producto[0].cantidad); 

                    $("#id_select_estado").val(obj_producto[0].Estado).change();

                    $("#id_frm_precio_farma").val(isValue(obj_producto[0].precio_farmacia,0,true)); 
                    $("#id_frm_precio_public").val(isValue(obj_producto[0].precio_publico,0,true)); 
                    $("#id_frm_precio_insti").val(isValue(obj_producto[0].precio_institucion,0,true)); 

                    $("#id_chk_mific").attr('checked',(obj_producto[0].mific==='1')? true : false);
                    $("#id_chk_regencia").attr('checked',(obj_producto[0].regencia==='1')? true : false);
                    $("#id_chk_minsa").attr('checked',(obj_producto[0].minsa==='1')? true : false);
                    
                },
                error: function(response) {
                    Swal.fire("Oops", "No se ha podido guardar!", "error");
                }
            }).done(function(data) {
                //location.reload();
            });

            if(statusBtn){
                $("#id_div_btn_send").show();
            }



        
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

    function frmCambioDeEstado(nTitulo){

        var SelectData      = [];
        $.get( "../dtaSelect", function( data ) {
            $.map(data[0].stdArticu,function(o) {
                SelectData[o.id] = o.descripcion;
            });

            Swal.fire({
                title: "Cambio de Estado",          
                input: "select",
                inputOptions: SelectData,
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
                        $.ajax({
                            url: "../UpdateEstado",
                            type: 'post',
                            data:  {
                                valor   : value,
                                Id      : nTitulo,
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
                            //CargarDatos(nMes,annio);
                        });
                    }
                },
                allowOutsideClick: () => !Swal.isLoading()
            });
        });        
    }

    function frmSweetAlert(nTitulo){


        let idPO            = $("#id_lbl_po").text()

        let lblTitulos      = ["Nº de Factura", "Nº de Recibo","Via","Status","Estado de pago",'Carga','Fecha Despacho','Fecha Estimada','Fecha Factura', 'Fecha Orden Compra','Cambio de Estado']
        let lblVia          = ['Tierra', 'Mar' , 'Aire']

        var sData           = {}

        TypeInput           = (nTitulo > 1)? 'select'  : 'text'

        

        var SelectData      = [[],[],[],['Estatus01','Estatus02','Estatus03'],[],[],[]];
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
            $.map(data[0].stdArticu,function(o) {
                SelectData[6][o.id] = o.descripcion;
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

    function frmSweetAlert03(nTitulo,id){
        let flatpickrInstance

        let lblTitulos      = ['Fecha Real Despacho','Fecha Real en aduana','Fecha real en bodega']
        let FormatDate      = 'YYYY-MM-DD'
        var now             = moment().format(FormatDate);


        
        Swal.fire({
            title: lblTitulos[nTitulo],
            html: '<input class="form-control " id="id_frm" placeholder="0000/00/00" value="'+now+'" >',
            
            stopKeydownPropagation: false,
                preConfirm: (value) => {

                    var dtDate = moment(flatpickrInstance.selectedDates[0]).format(FormatDate);
                    sData = {
                        id      : id,
                        valor   : dtDate,
                        Campo   : nTitulo,
                        _token  : "{{ csrf_token() }}" 
                    }
                    sendEstados(sData)


                },
                willOpen: () => {
                    flatpickrInstance = flatpickr(Swal.getPopup().querySelector('#id_frm'))
                }
        })
    
        

    }

    function sendEstados(dtInfo){
        $.ajax({
            url: "../updtFechasArticulos",
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
        var id_este             = $("#id_select_estado option:selected").val();   
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

        var id_mercado          = $("#id_mercado option:selected").val();   
        var id_tiene_venta      = $("#id_tiene_venta option:selected").val();   

        descrip_corta           = isValue(id_code,'N/D',true)
        frm_Cantidad            = isValue(frm_Cantidad,0,true)

        frm_precio_farma        = isValue(frm_precio_farma,0,true)
        frm_precio_public       = isValue(frm_precio_public,0,true)
        frm_precio_insti        = isValue(frm_precio_insti,0,true)
        frm_Cantidad            = isValue(frm_Cantidad,0,true)

        isChkMific              = (isChkMific)? 1 : 0;
        isChkRegen              = (isChkRegen )? 1 : 0;
        isChkMinsa              = (isChkMinsa)? 1 : 0;

        var number_linea        = parseInt($("#id_tt_list_product").text()) + 1;

        


        if(descrip_corta === 'N/D' || frm_Cantidad === 0){
            Swal.fire("Oops", "Datos no Completos", "error");
        }else{

            $.ajax({
                url: "../AddProductPO",
                type: 'post',
                data: {
                    id_po           : id_po,
                    id_este         : id_este,
                    modl_states     : modl_states,
                    id_producto     : id_code,
                    Cantidad        : frm_Cantidad,                    
                    precio_farma    : frm_precio_farma,
                    precio_public   : frm_precio_public,
                    precio_insti    : frm_precio_insti,
                    isChkMific      : isChkMific,
                    isChkRegen      : isChkRegen,
                    isChkMinsa      : isChkMinsa,
                    number_linea    : number_linea,
                    id_mercado      : id_mercado,
                    id_tiene_venta  : id_tiene_venta,
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
