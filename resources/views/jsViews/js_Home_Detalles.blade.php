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
    
    $('#id_range_select').change(function () {
    Fechas = $(this).val().split("to");
    if(Object.keys(Fechas).length >= 2 ){
        RangeStat(Fechas[0],Fechas[1]);
    } 
});
    $(".OnClickSearch").on('click', function() {
        var table = $('#tbl_guma_minsa').DataTable();
        var id = $(this).children().first().attr('id');
        


        if (id === 'id_sMiffc') {
            table.columns().search('').columns(7).search('1').draw();
        }
        if (id === 'id_ntMiffc') {
            table.columns().search('').columns(7).search('0').draw();
        }

        if (id === 'id_sRegencia') {
            table.columns().search('').columns(8).search('1').draw();
        }
        if (id === 'id_nRegencia') {
            table.columns().search('').columns(8).search('0').draw();
        }

        if (id === 'id_sMinsa') {
            table.columns().search('').columns(9).search('1').draw();
        }
        if (id === 'id_nMinsa') {
            table.columns().search('').columns(9).search('0').draw();
        }

    })

    function RangeStat(Start,Ends){
        Start = $.trim(Start)
        Ends = $.trim(Ends)
        $.ajax({
            url: "getAllOrdenesDetalles",
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

                var ttMific = 0;
                var sMific  = 0;
                var nMific  = 0;

                var ttRegencia = 0;
                var sRegencia  = 0;
                var nRegencia  = 0;

                var ttMinsa = 0;
                var sMinsa  = 0;
                var nMinsa  = 0;

                tbl_Header =  [
                {"title": "INFO. PRODUCTO","data": "PO", "render": function(data, type, row, meta) {

                    var tnVenta = (row.TieneVenta!=0)? '<span class="badge rounded-pill ms-3 badge-soft-success "><span class="fas fas fa-dollar-sign"></span> Tiene Venta</span>' : ''
                
                    var lblMific = (row.eMIFIC!=0)? '<span class="ms-3 badge rounded-pill bg-primary"> CON REGISTRO MINFIC <span class="fas fa-check"></span></span>' : ''
                
                    var lblRegencia = (row.eREGENCIA!=0)? '<span class="ms-3 badge rounded-pill bg-success">CON REGISTRO REGENCIA  <span class="fas fa-check"></span></span> ' : ''
                
                    var lblMinsa = (row.eMINSA!=0)? '<span class="ms-3 badge rounded-pill bg-info">CON REGISTRO MINSA <span class="fas fa-check"></span></span>' : ''
                
                    return  `<div class="card">
                            <div class="card-header bg-light">
                              <div class="row justify-content-between">
                                <div class="col">
                                  <div class="d-flex">
                                    <div class="avatar avatar-2xl status-online">
                                        <img class="rounded-circle" src="{{ asset('images/item.png') }}" alt="" />
                                    </div>
                                    <div class="flex-1 align-self-center ms-2">
                                        <p class="mb-1 lh-1"><a class="fw-semi-bold" href="#!">`+ row.Typ +` : `+ row.descripcion_corta +`</a></p>
                                            <p class="mb-0 fs--1">`+ row.cantidad +` &bull; `+ row.UND +` &bull; <span class="fas fa-boxes"></span>
                                            <span class="badge rounded-pill ms-3 badge-soft-info"><span class="fas fa-check"></span> Propiedad `+ row.pMINSA +` </span>
                                            `+ tnVenta +`
                                        </p>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="card-body overflow-hidden">
                                <h6 class="fs-0 mb-0">`+ row.descripcion_larga +`
                                    <div class="row g-0 fw-semi-bold text-center py-2 fs--1 tm-3"> 
                                        <div class="col-auto d-flex align-items-center">
                                        `+ lblMific + lblRegencia + lblMinsa +`
                                        </div>
                                    </div>
                                </h6>
                            </div>
                            <div class="card-footer bg-light pt-0">
                                <div class="row g-0 fw-semi-bold text-center py-2 fs--1">
                                    <div class="col-auto">
                                        <div class="rounded-2 d-flex align-items-center me-3" href="#!" >
                                            <span class="badge rounded-pill ms-3 badge-soft-info"><span class="fas fa-check"></span> Estado `+ row.Estado +`</span>
                                        </div>                                
                                    </div>
                                    <div class="col-auto">
                                        <div class="rounded-2 d-flex align-items-center me-3" href="#!" >
                                            <span class="badge rounded-pill ms-3 badge-soft-info"><span class="fas fa-check"></span> Via `+ row.Via +`</span>
                                        </div>  
                                    </div>
                                    <div class="col-auto"><a class="rounded-2 d-flex align-items-center me-3 text-700" href="#!"  onclick="AddComment(`+ row.id +`)"><span class="ms-1 fas fa-comment text-primary" ></span><span class="ms-1">`+ row.Commentario +`</span></a></div>
                                </div>
                            </div>
                        </div>`
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
                {
                    "title": "id",
                    "data": "eMIFIC"
                },  
                {
                    "title": "id",
                    "data": "eREGENCIA"
                },  
                {
                    "title": "id",
                    "data": "eMINSA"
                },  
                ]

                


                $.each(Ordenes.original.GUMA_MINSA,function(key, uPrivado) {

                    dta_table.push({ 
                        id                      :  uPrivado.id,
                        id_po                   :  uPrivado.id_po,
                        num_po                  :  uPrivado.num_po,
                        Via                     :  uPrivado.Via,
                        Articulo_exactus        :  uPrivado.Articulo_exactus,
                        descripcion_corta       :  uPrivado.descripcion_corta,
                        descripcion_larga       :  uPrivado.descripcion_larga,
                        cantidad                :  uPrivado.cantidad,
                        Estado                  :  uPrivado.Estado,
                        factura                 :  uPrivado.factura,
                        recibo                  :  uPrivado.recibo,
                        fecha_orden_compra      :  uPrivado.fecha_orden_compra,
                        fecha_despacho          :  uPrivado.fecha_despacho,
                        fecha_estimada          :  uPrivado.fecha_estimada,
                        DiasAcumulados          :  uPrivado.DiasAcumulados,
                        Commentario             :  uPrivado.Commentario,
                        TieneVenta              :  uPrivado.TieneVenta,
                        descripcion             :  uPrivado.descripcion,
                        UND                     :  uPrivado.UND,
                        LAB                     :  uPrivado.LAB,
                        PRO                     :  uPrivado.PRO,
                        eMIFIC                  :  uPrivado.eMIFIC,
                        eREGENCIA               :  uPrivado.eREGENCIA,
                        eMINSA                  :  uPrivado.eMINSA,
                        pMINSA                  :  uPrivado.minsa,
                        Typ                     :  uPrivado.Typ,
                    })

                    ttMific++
                    (uPrivado.eMIFIC==="0") ? nMific++ : sMific++

                    ttRegencia++
                    (uPrivado.eREGENCIA==="0") ? nRegencia++ : sRegencia++

                    ttMinsa++
                    (uPrivado.eMINSA==="0") ? nMinsa++ : sMinsa++
                })
                
                    
                table_render('#tbl_guma_minsa',dta_table,tbl_Header,false ) 
                
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
                    "targets": [7,8,9]
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
        MODAL_COMMENT: '#IdmdlComment',
    };

  

    

    


</script>
