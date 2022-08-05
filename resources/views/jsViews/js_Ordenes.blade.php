<script type="text/javascript">
    const startOfMonth = moment().startOf('month').format('YYYY-MM-DD');
    const endOfMonth   = moment().subtract(0, "days").format("YYYY-MM-DD");
    RangeStat(startOfMonth,endOfMonth)
    var labelRange = startOfMonth + " to " + endOfMonth;
    $('#id_range_select').val(labelRange);

    

    var labelRange = startOfMonth + " to " + endOfMonth;

    var vTableOrdenesCompra = $('#tbl_ordenes_compra').DataTable();
    
    $('#id_txt_buscar').on('keyup', function() {        
        vTableOrdenesCompra.search(this.value).draw();
    });
    $("#tbl_ordenes_compra_length").hide();
    $("#tbl_ordenes_compra_filter").hide();


    function RangeStat(Start,Ends){
        Start = $.trim(Start)
        Ends = $.trim(Ends)
        $.ajax({
            url: "getOrdenesRangeDates",
            type: 'post',
            dataType: 'json',
            data: {
                DateStart  : Start,
                DateEnds   : Ends,
                _token  : "{{ csrf_token() }}" 
            },
            async: true,
            success: function(Ordenes) {
                dta_table  = []
                dta_table_uPrivador  = []
                dt_table_uMinsa =[]
                dt_table_uPrivado =[]
                dt_table_guma_privado=[]
                dt_table_guma_minsa=[]

                var ttMific = 0;
                var sMific  = 0;
                var nMific  = 0;

                var ttRegencia = 0;
                var sRegencia  = 0;
                var nRegencia  = 0;

                var ttMinsa = 0;
                var sMinsa  = 0;
                var nMinsa  = 0;


                $.each(Ordenes.original.UMK_PRIVADO,function(key, uPrivado) {

                    dt_table_uPrivado.push({ 
                        id                      :  uPrivado.id,
                        id_po                      :  uPrivado.id_po,
                        num_po                      :  uPrivado.num_po,
                        Via                      :  uPrivado.Via,
                        Articulo_exactus        :  uPrivado.Articulo_exactus,
                        descripcion_corta       :  uPrivado.descripcion_corta,
                        descripcion_larga       :  uPrivado.descripcion_larga,
                        cantidad                :  uPrivado.cantidad,
                        Estado                  :  uPrivado.Estado,
                        factura                  :  uPrivado.factura,
                        recibo                  :  uPrivado.recibo,
                        fecha_orden_compra:uPrivado.fecha_orden_compra,
                        fecha_despacho:uPrivado.fecha_despacho,
                        fecha_estimada:uPrivado.fecha_estimada,
                        DiasAcumulados:uPrivado.DiasAcumulados,
                        Commentario:uPrivado.Commentario,
                        TieneVenta:uPrivado.TieneVenta,
                        descripcion:uPrivado.descripcion,

                        UND:uPrivado.UND,
                        LAB:uPrivado.LAB,
                        PRO:uPrivado.PRO,
                        
                        
                    })

                })
                tbl_Header_uPrivado =  [                
                {"title": "INFO. PRODUCTO","data": "PO", "render": function(data, type, row, meta) {

                    var tnVenta = (row.TieneVenta!=0)? '<span class="badge rounded-pill ms-3 badge-soft-success "><span class="fas fas fa-dollar-sign"></span> Tiene Venta</span>' : ''
                

                return  ` <td class="align-middle">
                    <div class="d-flex align-items-center position-relative"><img class="rounded-1 border border-200" src="{{ asset('images/item.png') }}"alt="" width="60">
                        <div class="flex-1 ms-3">
                        
                        <div class="d-flex align-items-center">
                            <h6 class="mb-1 fw-semi-bold text-nowrap"><a href="ImportacionDetalles/`+ row.id_po +`"> P.O <strong>`+ row.num_po +`</strong></a> : `+ row.descripcion_corta +`</h6>
                            <span class="badge rounded-pill ms-3 badge-soft-primary"><span class="fas fa-check"></span> Status. `+ row.Estado +`</span>
                            `+ tnVenta +`
                            
                            
                        </div>
                        <p class="fw-semi-bold mb-0 text-500">[ `+ row.Articulo_exactus +` ] `+ row.descripcion_larga +`</p>   
                        
                        <div class="row g-0 fw-semi-bold text-center py-2 fs--1"> 
                                <div class="col-auto"><a class="rounded-2 d-flex align-items-center me-3 text-700" href="#!"><span class="ms-1 fas fa-boxes text-primary" ></span><span class="ms-1"> `+ row.cantidad +` `+ row.UND +`</span></a></div>
                                <div class="col-auto d-flex align-items-center"><a class="rounded-2 text-700 d-flex align-items-center" href="#!" onclick="AddComment(`+ row.id +`)"><span class="ms-1 fas fa-comment text-primary" data-fa-transform="shrink-2" ></span><span class="ms-1"> `+ row.Commentario +` </span></a></div>
                                
                        </div>
                        </div>
                    </div>
                </td> `
                }},  
                {"title": "VIA DE TRANSITO","data": "Tipo de Carga", "render": function(data, type, row, meta) {
                return '<td class="date py-2 align-middle"><span class="badge rounded-pill badge-soft-info"><span class="fas fa-check"></span> '+ row.Via +'</span></td>'
                }},
                {"title": "LABORATORIO","data": "VIA" , "render":function(data, type, row, meta) {
                return '<td class="date py-2 align-middle">'+ row.LAB +'</td>'
                }},
                {"title": "PROVEEDOR","data": "VIA" , "render":function(data, type, row, meta) {
                return '<td class="date py-2 align-middle">'+ row.PRO +'</td>'
                }},                                  
                {"title": "FECHA ORDEN COMPRA","data": "VIA" , "render":function(data, type, row, meta) {
                return '<td class="date py-2 align-middle">'+ row.fecha_orden_compra +'</td>'
                }},
                {"title": "FECHA DE DESPACHO (CONFIRMADO)","data": "fecha_orden_compra" , "render":function(data, type, row, meta) {
                return '<td class="date py-2 align-middle">'+ row.fecha_despacho +'</td>'
                }},
                {"title": "FECHA ESTIMADA EN PUERTO","data": "fecha_orden_compra" , "render":function(data, type, row, meta) {
                return '<td class="date py-2 align-middle">'+ row.fecha_estimada +'</td>'
                }},
                {"title": "DIAS TRANSCURRIDOS DESDE DESPACHO","data": "Tipo de Carga", "render": function(data, type, row, meta) {
                return '<td class="date py-2 align-middle">'+ row.DiasAcumulados +'</td>'
                }},
                ]
                table_render('#tbl_unimark_privado',dt_table_uPrivado,tbl_Header_uPrivado,true )

                $.each(Ordenes.original.UMK_MINSA,function(key, uMinsa) {

                    dt_table_uMinsa.push({ 
                        id                      :  uMinsa.id,
                        id_po                      :  uMinsa.id_po,
                        num_po                      :  uMinsa.num_po,
                        Via                      :  uMinsa.Via,
                        Articulo_exactus        :  uMinsa.Articulo_exactus,
                        descripcion_corta       :  uMinsa.descripcion_corta,
                        descripcion_larga       :  uMinsa.descripcion_larga,
                        cantidad                :  uMinsa.cantidad,
                        Estado                  :  uMinsa.Estado,
                        factura                  :  uMinsa.factura,
                        recibo                  :  uMinsa.recibo,
                        fecha_orden_compra:uMinsa.fecha_orden_compra,
                        fecha_despacho:uMinsa.fecha_despacho,
                        fecha_estimada:uMinsa.fecha_estimada,
                        DiasAcumulados:uMinsa.DiasAcumulados,
                        Commentario:uMinsa.Commentario,
                        TieneVenta:uMinsa.TieneVenta,                        
                        descripcion:uMinsa.descripcion,

                        UND:uMinsa.UND,
                        LAB:uMinsa.LAB,
                        PRO:uMinsa.PRO,

                        
                    })

                })
                table_render('#tbl_unimark_minsa',dt_table_uMinsa,tbl_Header_uPrivado,true )


                $.each(Ordenes.original.GUMA_PRIVADO,function(key, uPrivado) {

                        dt_table_guma_privado.push({ 
                            id                      :  uPrivado.id,
                            id_po                      :  uPrivado.id_po,
                            num_po                      :  uPrivado.num_po,
                            Via                      :  uPrivado.Via,
                            Articulo_exactus        :  uPrivado.Articulo_exactus,
                            descripcion_corta       :  uPrivado.descripcion_corta,
                            descripcion_larga       :  uPrivado.descripcion_larga,
                            cantidad                :  uPrivado.cantidad,
                            Estado                  :  uPrivado.Estado,
                            factura                  :  uPrivado.factura,
                            recibo                  :  uPrivado.recibo,
                            fecha_orden_compra:uPrivado.fecha_orden_compra,
                            fecha_despacho:uPrivado.fecha_despacho,
                            fecha_estimada:uPrivado.fecha_estimada,
                            DiasAcumulados:uPrivado.DiasAcumulados,
                            Commentario:uPrivado.Commentario,
                            TieneVenta:uPrivado.TieneVenta,
                            descripcion:uPrivado.descripcion,

                            UND:uPrivado.UND,
                            LAB:uPrivado.LAB,
                            PRO:uPrivado.PRO,
                        })

                })
                
                table_render('#tbl_guma_privado',dt_table_guma_privado,tbl_Header_uPrivado,true )



                $.each(Ordenes.original.GUMA_MINSA,function(key, uPrivado) {

                    dt_table_guma_minsa.push({ 
                        id                      :  uPrivado.id,
                        id_po                      :  uPrivado.id_po,
                        num_po                      :  uPrivado.num_po,
                        Via                      :  uPrivado.Via,
                        Articulo_exactus        :  uPrivado.Articulo_exactus,
                        descripcion_corta       :  uPrivado.descripcion_corta,
                        descripcion_larga       :  uPrivado.descripcion_larga,
                        cantidad                :  uPrivado.cantidad,
                        Estado                  :  uPrivado.Estado,
                        factura                  :  uPrivado.factura,
                        recibo                  :  uPrivado.recibo,
                        fecha_orden_compra:uPrivado.fecha_orden_compra,
                        fecha_despacho:uPrivado.fecha_despacho,
                        fecha_estimada:uPrivado.fecha_estimada,
                        DiasAcumulados:uPrivado.DiasAcumulados,
                        Commentario:uPrivado.Commentario,
                        TieneVenta:uPrivado.TieneVenta,
                        descripcion:uPrivado.descripcion,
                        UND:uPrivado.UND,
                        LAB:uPrivado.LAB,
                        PRO:uPrivado.PRO,
                    })
                })
                    
                table_render('#tbl_guma_minsa',dt_table_guma_minsa,tbl_Header_uPrivado,true )    




                $.each(Ordenes.original.RESUMEN,function(key, Orden) {

                    dta_table.push({ 
                        id       : Orden.id,
                        PO       :  Orden.num_po,
                        Fecha       :  Orden.Fecha,
                        Vias       :  Orden.Vias,
                        TipoCarga       :  Orden.TipoCarga,
                        Estado       :  Orden.Estado,
                        Vendor       :  Orden.Vendor,
                        proveedor       :  Orden.proveedor,

                        recibo       :  Orden.recibo,
                        factura       :  Orden.factura,
                    })

                    $.each(Orden.ttMific,function(key, mf){
                        ttMific += mf.hit
                        if(mf.mific==="0")nMific += mf.hit
                        if(mf.mific==="1")sMific += mf.hit
                    })
                    $.each(Orden.ttRegencia,function(key, rg){
                        ttRegencia += rg.hit
                        if(rg.regencia==="0")nRegencia += rg.hit
                        if(rg.regencia==="1")sRegencia += rg.hit
                    })
                    $.each(Orden.ttMinsa,function(key, ms){
                        ttMinsa += ms.hit
                        if(ms.minsa==="0")nMinsa += ms.hit
                        if(ms.minsa==="1")sMinsa += ms.hit
                    })
                })

                
                $("#id_ttMiffc").text(ttMific)
                $("#id_sMiffc").text(sMific)
                $("#id_ntMiffc").text(nMific)
                cMific_procent_si = numeral((sMific * 100 ) / ttMific).format('0,00.0');
                cMific_procent_no = numeral((nMific * 100 ) / ttMific).format('0,00.0');
                $("#id_sMiffc_procent_si").text(cMific_procent_si)
                $("#id_ntMiffc_procent_no").text(cMific_procent_no)



                $("#id_ttRegencia").text(ttRegencia)
                $("#id_sRegencia").text(sRegencia)
                $("#id_nRegencia").text(nRegencia)
                cRegencia_procent_si = numeral((sRegencia * 100) / ttRegencia).format('0,00.0');
                cRegencia_procent_no = numeral((nRegencia * 100) / ttRegencia).format('0,00.0');
                $("#id_sRengencia_procent_si").text(cRegencia_procent_si)
                $("#id_nRegencia_procent_no").text(cRegencia_procent_no)

                $("#id_ttMinsa").text(ttMinsa)
                $("#id_sMinsa").text(sMinsa)
                $("#id_nMinsa").text(nMinsa)
                cMinsa_procent_si = numeral((sMinsa * 100 ) / ttMinsa).format('0,00.0');
                cMinsa_procent_no = numeral((nMinsa * 100) / ttMinsa).format('0,00.0');
                $("#id_sMinsa_procent_si").text(cMinsa_procent_si)
                $("#id_ntMinsa_procent_no").text(cMinsa_procent_no)


                tbl_Header =  [                
                    {"title": "Nº P.O","data": "PO", "render": function(data, type, row, meta) {
                        return  ` <td class="align-middle">
                                    <div class="d-flex align-items-center position-relative"><img class="rounded-1 border border-200" src="{{ asset('images/item.png') }}"alt="" width="60">
                                        <div class="flex-1 ms-3">
                                        
                                        <div class="d-flex align-items-center">
                                            <h6 class="mb-1 fw-semi-bold text-nowrap"><a href="ImportacionDetalles/`+ row.id +`"> P.O <strong>`+ row.PO +`</strong></a> : `+ row.Vendor +`</h6>
                                            <span class="badge rounded-pill ms-3 badge-soft-primary"><span class="fas fa-check"></span> `+ row.Estado +`</span>
                                        </div>
                                        <p class="fw-semi-bold mb-0 text-500">`+ row.proveedor +`</p>                            
                                        <div class="row g-0 fw-semi-bold text-center py-2 fs--1">
                                        <div class="col-auto">
                                            <a class="rounded-2 d-flex align-items-center me-3 text-700" href="#!" > 
                                                <span class="ms-1">Fact. `+ row.factura +`</span>
                                            </a>
                                        </div>
                                        <div class="col-auto d-flex align-items-center">
                                            <span class="ms-1">Rec. `+ row.recibo +` </span>
                                        </div>
                                        </div> 
                                        </div>
                                    </div>
                                    </td> `
                    }},
                    {"title": "FECHA ORDEN COMPRA","data": "Fecha" , "render":function(data, type, row, meta) {
                        return '<td class="date py-2 align-middle">'+ row.Fecha +'</td>'
                    }},                                        
                    {"title": "VIA","data": "VIA" , "render":function(data, type, row, meta) {
                        return '<td class="date py-2 align-middle">'+ row.Vias +'</td>'
                    }},
                    {"title": "TIPO CARGA","data": "Tipo de Carga", "render": function(data, type, row, meta) {
                        return '<td class="date py-2 align-middle">'+ row.TipoCarga +'</td>'
                    }},
                ]

                table_render('#tbl_ordenes_compra',dta_table,tbl_Header,false )
                
            },
            error: function(response) {
                Swal.fire("Oops", "No se ha podido guardar!", "error");
            }
        }).done(function(data) {
            
        });

    }
    function AddComment(id){
        var addcomment_ = document.querySelector(Selectors.MODAL_COMMENT);
        var mdl_comment = new window.bootstrap.Modal(addcomment_);

        $("#id_modal_name_item").text("Comentarios del Producto")
        getComment(id)
        mdl_comment.show();

    }
    function getComment(Id){
        var items_comment = '';
        $("#id_textarea_comment").val(items_comment)
        $.ajax({
            url: 'getCommentImportacion',
            type: 'post',
            data: {
                id_item     : Id,                  
                _token      : "{{ csrf_token() }}" 
            }, 
            async: false,
            dataType: "json",
            success: function(data){
                $.each(data,function(key, c) {
                    var date_comment = moment(c.created_at).format("D MMM, YYYY")
                    items_comment += ' <div class="d-flex">'+
                                            '<div class="avatar avatar-xl">'+
                                                '<img class="rounded-circle" src="{{ asset("images/user/avatar-4.jpg") }}" alt="" />'+
                                            '</div>'+
                                            '<div class="flex-1 ms-2 fs--1">'+
                                                '<p class="mb-1 bg-200 rounded-3 p-2">'+
                                                '<a class="fw-semi-bold" href="!#">'+c.username+'</a> '+
                                                ' '+c.comment+'  </p>'+
                                                '<div class="px-2">'+
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
    function table_render(Table,datos,Header,Filter){

        $(Table).DataTable({
            "data": datos,
            "destroy": true,
            "info": false,
            "bPaginate": true,
            "order": [
                [0, "asc"]
            ],
            "lengthMenu": [
                [10, -1],
                [10, "Todo"]
            ],
            "language": {
                "zeroRecords": "NO HAY COINCIDENCIAS",
                "paginate": {
                    "first": "Primera",
                    "last": "Última ",
                    "next": "Siguiente",
                    "previous": "Anterior"
                },
                "lengthMenu": "MOSTRAR _MENU_",
                "emptyTable": "-",
                "search": "BUSCAR"
            },
            'columns': Header,
            "columnDefs": [
                {
                    "visible": false,
                    "searchable": false,
                    "targets": []
                },
            ],
            rowCallback: function( row, data, index ) {
                if ( data.Index < 0 ) {
                    $(row).addClass('table-danger');
                } 
            }
            });
        if(!Filter){            
            $(Table+"_filter").hide();
        }
        $(Table+"_length").hide();

    }
$('#id_range_select').val(labelRange);
    var Selectors = {
        TABLE_SETTING: '#tbl_setting',
        MODAL_COMMENT: '#IdmdlComment',
    };
    $("#id_btn_new_po").click(function(){
    
        var TABLE_SETTING = document.querySelector(Selectors.TABLE_SETTING);
        var modal = new window.bootstrap.Modal(TABLE_SETTING);
        modal.show();

    });

    $("#id_send_frm_new_po").click(function(){

        var num_new_po      = $("#id_num_po").val();   
        var slc_vendor      = $("#id_select_vendor option:selected").val();           
        var slc_shipto      = $("#id_select_shipto option:selected").val()
        var dtaFecha        = $("#poDate").val()


        num_new_po          = isValue(num_new_po,'N/D',true)
        slc_vendor          = isValue(slc_vendor,'N/D',true)
        slc_shipto          = isValue(slc_shipto,'N/D',true)
        dtaFecha            = isValue(dtaFecha,'N/D',true)

        if(num_new_po === 'N/D'|| slc_vendor ==='N/D' || slc_shipto ==='N/D' ){
            Swal.fire("Oops", "Datos no Completos", "error");
        }else{

            $.ajax({
                url: "SaveNewPO",
                type: 'post',
                data: {
                    num_new_po   : num_new_po,
                    slc_vendor   : slc_vendor,
                    slc_shipto   : slc_shipto,
                    dtaFecha     : dtaFecha,
                    _token  : "{{ csrf_token() }}" 
                },
                async: true,
                success: function(response) {

                    location.reload();
                    //window.location.href ='ImportacionDetalles/' + response.original
                },
                error: function(response) {
                    Swal.fire("Oops", "No se ha podido guardar!", "error");
                }
            }).done(function(data) {
                
            });

        }
    });


    function RemoveOrden(id_vendor){
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
                    url: "DeletePO",
                    type: 'post',
                    data: {
                        id      : id_vendor,
                        _token  : "{{ csrf_token() }}" 
                    },
                    async: true,
                    success: function(response) {
                        location.reload();
                    },
                    error: function(response) {
                    }
                }).done(function(data) {
                    
                });
            },
            allowOutsideClick: () => !Swal.isLoading()
        });
    }
</script>
