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

                var ttMific = 0;
                var sMific  = 0;
                var nMific  = 0;

                var ttRegencia = 0;
                var sRegencia  = 0;
                var nRegencia  = 0;

                var ttMinsa = 0;
                var sMinsa  = 0;
                var nMinsa  = 0;

                $.each(Ordenes.original,function(key, Orden) {

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
                                        <h6 class="mb-1 fw-semi-bold text-nowrap"><a href="ImportacionDetalles/`+ row.id +`"> P.O <strong>`+ row.PO +`</strong></a> : `+ row.Vendor +`</h6>
                                        <p class="fw-semi-bold mb-0 text-500">`+ row.proveedor +`</p>                            
                                        <div class="row g-0 fw-semi-bold text-center py-2 fs--1">
                                        <div class="col-auto">
                                                    <a class="rounded-2 d-flex align-items-center me-3 text-700" href="#!" > 
                                                    <span class="ms-1">Fact.`+ row.factura +`</span>
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
                    {"title": "Fecha","data": "Fecha" , "render":function(data, type, row, meta) {
                        return '<td class="date py-2 align-middle">'+ row.Fecha +'</td>'
                    }},                                        
                    {"title": "Vias","data": "Vias" , "render":function(data, type, row, meta) {
                        return '<td class="date py-2 align-middle">'+ row.Vias +'</td>'
                    }},
                    {"title": "TipoCarga","data": "TipoCarga", "render": function(data, type, row, meta) {
                        return '<td class="date py-2 align-middle">'+ row.TipoCarga +'</td>'
                    }},
                    {"title": "Estado","data": "Estado" , "render":function(data, type, row, meta) {
                        return `<td class="status py-2 align-middle text-center fs-0 white-space-nowrap">
                                <span class="badge badge rounded-pill d-block badge-soft-success">`+ row.Estado +`<span class="ms-1 fas fa-check" data-fa-transform="shrink-2"></span></span>
                            </td>`
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
            $(Table+"_length").hide();
            $(Table+"_filter").hide();
        }

    }
$('#id_range_select').val(labelRange);
    var Selectors = {
        TABLE_SETTING: '#tbl_setting',
    };
    $("#id_btn_new_po").click(function(){
    
        var TABLE_SETTING = document.querySelector(Selectors.TABLE_SETTING);
        var modal = new window.bootstrap.Modal(TABLE_SETTING);
        modal.show();

    });

    $("#id_send_frm_new_po").click(function(){

        var num_new_po      = $("#id_num_po").val();   
        var slc_vendor   = $("#id_select_vendor option:selected").val();           
        var slc_shipto  = $("#id_select_shipto option:selected").val()


        num_new_po  = isValue(num_new_po,'N/D',true)
        slc_vendor  = isValue(slc_vendor,'N/D',true)
        slc_shipto  = isValue(slc_shipto,'N/D',true)

        if(num_new_po === 'N/D'|| slc_vendor ==='N/D' || slc_shipto ==='N/D'){
            Swal.fire("Oops", "Datos no Completos", "error");
        }else{

            $.ajax({
                url: "SaveNewPO",
                type: 'post',
                data: {
                    num_new_po   : num_new_po,
                    slc_vendor   : slc_vendor,
                    slc_shipto   : slc_shipto,
                    _token  : "{{ csrf_token() }}" 
                },
                async: true,
                success: function(response) {

                    window.location.href ='ImportacionDetalles/' + response.original
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
