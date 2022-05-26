<script type="text/javascript">
    var dta_inventarios = []  
    var dta_aportes_mercados = []
    var dta_table_excel = []
    var table = ''
    var table_excel = ''

    var nMes   = $("#id_select_nmes option:selected").val();           
    var annio  = $("#id_select_annio option:selected").val()

    

    var tbl_hide_colum = [2,10]

    
    
    var intVal = function ( i ) {
        return typeof i === 'string' ?
        i.replace(/[^0-9.]/g, '')*1 :
        typeof i === 'number' ?
        i : 0;
    };

    var var_rol         = intVal($("#id_rol").text());      
    var var_login_user  = intVal($("#id_login_user").text());      

    if(var_rol===1){
        $("#id_add_multi_row").show();
        $("#id_count_table").show();
        
    } else if(var_rol===5){
        tbl_hide_colum = [2,3,4,5,6,7,9,10]

        $("#id_add_multi_row").show();
        $("#id_count_table").show();
    }else if(var_rol===6){
        tbl_hide_colum = [1,2,3,6,7,9,10]
        $("#id_add_multi_row").hide();
        $("#id_count_table").hide();
    }else if(var_rol===4){
        tbl_hide_colum = [1,2,4,5,10]
        $("#id_add_multi_row").hide();
        $("#id_count_table").hide();
    }

    


    getData();
    CargarDatos(nMes,annio);
    table_render_excel(dta_table_excel)
    

    function soloNumeros(caracter, e, numeroVal) {
        var numero = numeroVal;
        if (String.fromCharCode(caracter) === "." && numero.length === 0) {
            e.preventDefault();
            swal.showValidationError('No se puede iniciar con un punto');
        } else if (numero.includes(".") && String.fromCharCode(caracter) === ".") {
            e.preventDefault();
            swal.showValidationError('No puede haber mas de dos puntos');
        } else {
            const soloNumeros = new RegExp("^[0-9]+$");
            if (!soloNumeros.test(String.fromCharCode(caracter)) && !(String.fromCharCode(caracter) === ".")) {
                e.preventDefault();
                swal.showValidationError(
                    'No se pueden escribir letras, solo se permiten datos númericos'
                );
            }
        }
    }
    function Echarts_Pie_Aportes_Mercado(data1) {
        var ECHART_MOST_LEADS = '.echart-most-leads';
        var $echartMostLeads = document.querySelector(ECHART_MOST_LEADS);

        if ($echartMostLeads) {
            var userOptions = utils.getData($echartMostLeads, 'options');
            var chart = window.echarts.init($echartMostLeads);

            var getDefaultOptions = function getDefaultOptions() {
                return {
                    color: [utils.getColors().primary, 
                        utils.getColors().info, 
                        utils.getColors().warning, 
                        utils.getColors().info // utils.getGrays()[300],
                    ],
                    tooltip: {
                    trigger: 'item',
                    padding: [7, 10],
                    backgroundColor: utils.getGrays()['100'],
                    borderColor: utils.getGrays()['300'],
                    textStyle: {
                        color: utils.getColors().dark
                    },
                    borderWidth: 1,
                    transitionDuration: 0,
                    formatter: function formatter(params) {
                            return "<strong>".concat(params.data.name, ":</strong> ").concat(params.percent, "%");
                        }
                    },
                    position: function position(pos, params, dom, rect, size) {
                        return getPosition(pos, params, dom, rect, size);
                    },
                    legend: {
                    show: false
                    },
                    series: [{
                    type: 'pie',
                    radius: ['100%', '67%'],
                    avoidLabelOverlap: false,
                    hoverAnimation: false,
                    itemStyle: {
                        borderWidth: 2,
                        borderColor: utils.getColor('card-bg')
                    },
                    label: {
                        normal: {
                        show: false,
                        position: 'center',
                        textStyle: {
                            fontSize: '20',
                            fontWeight: '500',
                            color: utils.getGrays()['700']
                        }
                        },
                        emphasis: {
                        show: false
                        }
                    },
                    labelLine: {
                        normal: {
                        show: false
                        }
                    },
                    data: data1
                    }]
                };
            };

            echartSetOption(chart, userOptions, getDefaultOptions);
        }
    };
    var Selectors = {
        ADD_NUEVA_SOLCITUD: '#addNuevaSolicitud',
        TABLE_SETTING: '#tbl_setting',
        ADD_MULTI_ROW: '#addMultiRow',
        MODAL_COMMENT: '#IdmdlComment',
    };
    $("#id_btn_nueva_solicitud").click(function(){
    
        var addNuevaSolicitud = document.querySelector(Selectors.ADD_NUEVA_SOLCITUD);
        var modal = new window.bootstrap.Modal(addNuevaSolicitud);
        modal.show();

    });
    $("#id_add_multi_row").click(function(){
    
        var addMultiRow = document.querySelector(Selectors.ADD_MULTI_ROW);
        var modal = new window.bootstrap.Modal(addMultiRow);
        modal.show();

    });
    
    $("#id_btn_setting").click(function(){
    
        var TABLE_SETTING = document.querySelector(Selectors.TABLE_SETTING);
        var modal = new window.bootstrap.Modal(TABLE_SETTING);
        modal.show();

    });
    $("#id_send_data_excel").click(function(){
        var slct_mes    = $("#IdSelectMes option:selected").val();   
        var slct_me_name    = $("#IdSelectMes option:selected").text();   
        var slct_annio  = $("#IdSelectAnnio option:selected").val();   

        if(dta_table_excel.length > 0){
            Swal.fire({
            title: '¿Estas Seguro de cargar ' + slct_me_name + ' ' + slct_annio + ' ?',
            text: "¡Se cargara la informacion previamente visualizada!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si!',
            target: document.getElementById('mdlMatPrima'),
            showLoaderOnConfirm: true,
            preConfirm: () => {
                $.ajax({
                url: "guardar_excel",
                data: {
                    mes     : slct_mes,
                    annio   : slct_annio,
                    datos   : dta_table_excel,
                    _token  : "{{ csrf_token() }}" 
                },
                type: 'post',
                async: true,
                success: function(response) {
                    Swal.fire("Exito!", "Guardado exitosamente", "success");
                },
                error: function(response) {
                    Swal.fire("Oops", "No se ha podido guardar!", "error");
                }
                }).done(function(data) {
                    CargarDatos(nMes,annio);
                });
            },
            allowOutsideClick: () => !Swal.isLoading()
        });

            
        }else{
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'No hay datos para cargar!!!...',
                
            })
        }
    })
    $("#id_send_info").click(function(){

        var dtaId       = $("#id_row").text()
        var dtaFecha    = $("#eventStartDate").val()
        var txtCantidad = $("#id_txt_proyeccion_mensual").val()



        if(dtaFecha===''){
            Swal.fire(
                'Fecha',
                'No tiene Fecha seleccionada',
                'error'
            )
        }else if (txtCantidad===''){
            Swal.fire(
                'Proyeccion Mensual',
                'Ingrese el dato',
                'error'
            )
        }else{
            $.ajax({
                url: "guardar_solicitud",
                data: {
                    rowID       : dtaId,
                    fecha       : dtaFecha,
                    cantidad    : txtCantidad,
                    _token: "{{ csrf_token() }}" 
                },
                type: 'post',
                async: true,
                success: function(response) {
                    Swal.fire("Exito!", "Guardado exitosamente", "success");
                },
                error: function(response) {
                    Swal.fire("Oops", "No se ha podido guardar!", "error");
                }
            }).done(function(data) {
                CargarDatos(nMes,annio);
            });
        }


    });
    
    function CargarDatos(nMes,annio){
        var name_nMes   = $("#id_select_nmes option:selected").text();           
        $("#id_title_solicitudes").text(" Solicitudes al " + name_nMes + ' ' + annio)

        table_render_solicitud([])

        $.ajax({
            type: 'post',
            data: {
                mes      : nMes,
                annio   : annio,                
                _token  : "{{ csrf_token() }}" 
            },
            url: 'getSolicitudes', 
            async: false,
            dataType: "json",
            success: function(data){
                if (data[0]['data'].length > 0) {
                    var Transito = 0;
                    var Retenido = 0;
                    var In_parci= 0;
                    var In_Total= 0;

                    table_render_solicitud(data[0]['data'])

                    $.each(data[0]['Counteo'],function(key, registro) {

                        if(registro.Estados === "0"){
                            Transito = registro.Hits 
                        }
                        if(registro.Estados === "1"){
                            Retenido = registro.Hits 
                        }
                        if(registro.Estados === "2"){
                            In_parci = registro.Hits 
                        }
                        if(registro.Estados === "3"){
                            In_Total = registro.Hits 
                        }

                    });

                    
                    var tt_row = data[0]['data'].length

                    



                    $('#id_count_transito').text(numeral(Transito).format('0,0'));
                    $('#id_count_Retenido').text(numeral(Retenido).format('0,0'));
                    $('#id_count_In_parci').text(numeral(In_parci).format('0,0'));
                    $('#id_count_In_Total').text(numeral(In_Total).format('0,0'));


                    tt_pie_Transito = ( Transito  * 100 ) /  tt_row
                    tt_pie_Retenido = ( Retenido  * 100 ) /  tt_row
                    tt_pie_In_parci = ( In_parci  * 100 ) /  tt_row
                    tt_pie_In_Total = ( In_Total  * 100 ) /  tt_row


                    $('#id_porcent_transito').text(numeral(tt_pie_Transito).format('0,0'));
                    $('#id_porcent_Retenido').text(numeral(tt_pie_Retenido).format('0,0'));
                    $('#id_porcent_In_parci').text(numeral(tt_pie_In_parci).format('0,0'));
                    $('#id_porcent_In_Total').text(numeral(tt_pie_In_Total).format('0,0'));

    
                }

                
            },
            error: function(data) {
            }
        });
    }
    $("#id_send_filtros").click(function(){
        var var_nMes   = $("#id_select_nmes option:selected").val();           
        var var_annio  = $("#id_select_annio option:selected").val()

        CargarDatos(var_nMes,var_annio)
    })

    $("#id_get_history").click(function(){
        var var_nMes   = $("#IdSelectMes option:selected").val();           
        var var_annio  = $("#IdSelectAnnio option:selected").val()
        //CargarDatos(var_nMes,var_annio)

        $.ajax({
            type: 'post',
            data: {
                mes      : nMes,
                annio   : annio,                
                _token  : "{{ csrf_token() }}" 
            },
            url: 'getSolicitudes', 
            async: false,
            dataType: "json",
            success: function(data){
                if (data[0]['data'].length > 0) {
                    var Transito = 0;
                    var Retenido = 0;
                    var In_parci= 0;
                    var In_Total= 0;

                    dta_table_excel = [];
                    $.each(data[0]['data'],function(key, registro) {

                        
                        dta_table_excel.push({ 
                            Articulos: registro.Articulos,
                            Descripcion: registro.Descripcion,
                            proyect_mensual: '0.00',
                            Fecha_Solicitada: moment(new Date()).format("YYYY-MM-DD"),
                        })

                    });

                    table_render_excel(dta_table_excel)

    
                }

                
            },
            error: function(data) {
            }
        });
    })

    
    function getData(){
        $.ajax({
            type: "GET",
            url: 'getArticulos', 
            async: false,
            dataType: "json",
            success: function(data){
                $.each(data,function(key, registro) {
                    $("#organizerSingle").append('<option value='+registro.ARTICULO+'>'+registro.ARTICULO + '-' + registro.DESCRIPCION+'</option>');


                    dta_inventarios.push(
                        {
                            'Existencia': registro.EXISTENCIA,
                            'Articulo': registro.ARTICULO,
                            'Descripcion': registro.DESCRIPCION
                        }
                    )
                }); 	 
            },
            error: function(data) {
                //alert('error');
            }
        });
    }

    $("#organizerSingle").change(function(){
        index_ = dta_inventarios.findIndex(x => x.Articulo === this.value);

        var var_numeral = numeral(dta_inventarios[index_]['Existencia']).format('0,0.00')
        
        $("#id_existencia").html(var_numeral)
        
    }); 
    
    $('#tbl_search_solicitud').on('keyup', function() {
        table.search(this.value).draw();
    });

    $('#id_textarea_comment').keydown(function(event){
        if (event.which == 13){

            var id_Item = $("#id_modal_nSoli").text()
            var value = $(this).val();

            $.ajax({
                url: "AddComment",
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
                //CargarDatos(nMes,annio);
            });
        }
    });


    

    $('#id_searh_table_Excel').on('keyup', function() {
        table_excel.search(this.value).draw();
    });



    function table_render_solicitud(datos){

        table = $('#tbl_solicitudes').DataTable({
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
            'columns': [
                {
                    "title": "Solicitud",
                    "data": "Articulos",
                    "render": function(data, type, row, meta) {
                        
                        var scope = moment(row.Fecha_Solicitada).format("D MMM, YYYY")

                        var icon = 'fa-ban text-warning'
                        var sta = 1;
                        var btnRetencion = ''

                        if(row.Estados === '1'){
                            icon = 'fa-check text-success'
                            sta = 0;
                        }

                        if(( var_rol === 4 ) || ( var_rol === 1 ) ){

                            btnRetencion = '<span class="ms-1 fas '+icon+' " data-fa-transform="shrink-2" ></span> '

                        }

                        return '<div class="d-flex align-items-center position-relative"><img class="rounded-1 border border-200" src="{{ asset("images/item.png") }}"alt="" width="60">'+
                        '<div class="flex-1 ms-3">'+
                            '<h6 class="mb-1 fw-semi-bold text-nowrap"><a href="OrdenesDetalles"> <strong>#' + row.id_solicitud + ' </strong></a> - ' + row.Descripcion + '</h6>'+
                            '<p class="fw-semi-bold mb-0 text-500">' + row.Articulos + ' - '+ 
                            scope+
                            '</p>'+ 
                            
                            '<div class="row g-0 fw-semi-bold text-center py-2 fs--1">'+ 
                                '<div class="col-auto"><a class="rounded-2 d-flex align-items-center me-3 text-700" href="#!" onclick="ChanceStatus(' + row.id_solicitud + ','+sta+')">'+btnRetencion+'<span class="ms-1">Retención</span></a></div>'+ 
                                '<div class="col-auto"><a class="rounded-2 d-flex align-items-center me-3 text-700" href="#!" onclick="AddComment(' + meta.row + ')"><span class="ms-1 fas fa-comment text-primary" data-fa-transform="shrink-2"  ></span><span class="ms-1">Comentarios</span></a></div>'+ 
                                '<div class="col-auto d-flex align-items-center"><a class="rounded-2 text-700 d-flex align-items-center" href="#!" onclick="ChanceStatus(' + row.id_solicitud + ',4)" ><span class="ms-1 fas fa-trash text-danger" data-fa-transform="shrink-2" ></span><span class="ms-1">Borrar</span></a></div>'+ 
                            '</div>'+ 
                        '</div>'+
                        '</div>'

                        

                    },
                },
                //{"title": "Fecha Solicitada","data": "Fecha_Solicitada"},
                {"title": "Proyeccion Mensual","data": "proyect_mensual", "render" : function (data, type, row, meta){

                        
                        return '<u class="dotted">  '+numeral(data).format('0,0.00') +'</u>'
                    } 
                },
                {"title": "Inventario Real","data": "Inventario_real", "render" : function (data, type, row, meta){

                        return '<u class="dotted">  '+numeral(data).format('0,0.00') +'</u>'
                    }  
                },
                {"title": "Cant. Solicitada","data": "Cant_solicitada", "render" : function (data, type, row, meta){

                        return '<u class="dotted">  '+numeral(data).format('0,0.00') +'</u>'
                    } 
                },
                {"title": "Ingreso","data": "Ingreso", "render" : function (data, type, row, meta){

                    return '<u class="dotted">  '+numeral(data).format('0,0.00') +'</u>'
                    } 
                },
                {"title": "Pendiente","data": "Pendiente","render": $.fn.dataTable.render.number(',', '.', 2)},
                {"title": "Tiempo Entrega","data": "Tiempo_Entrega", "render" : function (data, type, row, meta){

                        return '<u class="dotted">  '+numeral(data).format('0,0.00') +'</u>'
                    } 
                },
                {"title": "Proveedor","data": "Proveedor", "render" : function (data, type, row, meta){

                        return '<u class="dotted">  '+data +'</u>'
                    } 
                },
                {"title": "Dias Transcurridos","data": "Dias_Transcurridos","render": $.fn.dataTable.render.number(',', '.', 0)},
                {"title": "Transito","data": "Estados", "render" : function (data, type, row, meta){

                        if(row.Estados === '1'){
                            return '<span class="badge badge rounded-pill d-block badge-soft-warning">Retenido<span class="ms-1 fas fa-ban" data-fa-transform="shrink-2"></span></span>'
                        }

                        if(intVal(row.Ingreso) === 0){
                            return '<span class="badge badge rounded-pill d-block badge-soft-secondary">En Proceso<span class="ms-1 fas fa-clock" data-fa-transform="shrink-2"></span></span> '
                        }                       

                        
                        if(intVal(row.Pendiente) <= 0){
                            
                            return '<span class="badge badge rounded-pill d-block badge-soft-success">Ingreso Total<span class="ms-1 fas fa-check" data-fa-transform="shrink-2"></span></span>'
                        }else{
                            return '<span class="badge badge rounded-pill d-block badge-soft-primary">Ingreso Parcial<span class="ms-1 fas fa-redo" data-fa-transform="shrink-2"></span></span>'
                        }

                    }
                },
                
                {"title": "","data": "Dias_Transcurridos","render": function(data, type, row, meta) {
                    return 'COMENATARIOS'
                }}
                

            ],
            "columnDefs": [
                {
                    "className": "py-2 align-middle text-center fs-0 fw-medium",
                    "targets": [1,7,8,9,10]
                },
                {
                    "className": "py-2 align-middle text-end fs-0 fw-medium",
                    "targets": [2,3,4,5,6]
                },
                
                {
                    "className": "py-2 align-middle white-space-nowrap text-end",
                    "targets": [10]
                },
                
                {
                    "visible": false,
                    "searchable": false,
                    "targets": tbl_hide_colum
                },
                {
                    "width": "10%",
                    "targets": [1,2,3,4,5,6,7]
                },
                {
                    "width": "15%",
                    "targets": []
                },
            ],
            "footerCallback": function(row, data, start, end, display) {
             
			},
        });


        var cEnProceso = 0;
        var cRetenido = 0;
        var cParcial = 0;
        var cTotal = 0;
        var lng = 0;
        table.rows().every( function () {

            var d   = this.data();
            lng = this.column( 0 ).data().length;

            if(d.Estados ==='1'){
                cRetenido++;
            }
            if(intVal(d.Ingreso) === 0){
                cEnProceso++;
            }
            if(intVal(d.Pendiente) <=0){
                cTotal++
            }else{
                cParcial++;
            }
        } );

        $('#id_total_soli').text(" ( " + numeral(cEnProceso).format('0,0') + " )");
        $('#id_total_Retenido').text(" ( " + numeral(cRetenido).format('0,0') + " )");
        $('#id_total_total').text(" ( " + numeral(cTotal).format('0,0') + " )");
        $('#id_total_Parcial').text(" ( " + numeral(cParcial).format('0,0') + " )");
        $('#id_total_solicitud').text( numeral(lng).format('0,0') );
        

        $('#tbl_solicitudes thead').addClass('bg-200 text-900');
        $('#tbl_solicitudes thead tr th').addClass('sort pe-1 align-middle white-space-nowrap');
        
        $("#tbl_solicitudes_length").hide();
        $("#tbl_solicitudes_filter").hide();
        
    }

    function table_render_excel(datos){

        table_excel =  $('#tbl_excel').DataTable({
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
            'columns': [
                {"title": "Articulo","data": "Articulos"},
                {"title": "Descripcion","data": "Descripcion"},                
                {"title": "Fecha de Solicitud","data": "Fecha_Solicitada"},
                {"title": "Proyeccion Mensual","data": "proyect_mensual","render": $.fn.dataTable.render.number(',', '.', 2)},

            ],
            "columnDefs": [
                {
                    "className": "dt-center",
                    "targets": [0,2]
                },
                {
                    "className": "dt-right",
                    "targets": [3]
                },
                
                {
                    "className": "dt-left",
                    "targets": [1]
                },
                
                {
                    "visible": false,
                    "searchable": false,
                    "targets": []
                },
                {
                    "width": "10%",
                    "targets": []
                },
                {
                    "width": "15%",
                    "targets": []
                },
            ],
            "footerCallback": function(row, data, start, end, display) {
                
            },
        });
        $("#tbl_excel_length").hide();
        $("#tbl_excel_filter").hide();
    }
    function AddComment(id){
        var addcomment_ = document.querySelector(Selectors.MODAL_COMMENT);
        var modal = new window.bootstrap.Modal(addcomment_);

        dtData = table.row( id ).data();
        var fecha_humana = moment(dtData.Fecha_Solicitada).format("D MMM, YYYY")
        
        $("#id_modal_name_item").text(dtData.Descripcion)
        $("#id_modal_articulo").text(dtData.Articulos)
        $("#id_modal_nSoli").text(dtData.id_solicitud)
        $("#id_modal_Fecha").text(fecha_humana)
        modal.show();

        getComment(dtData.id_solicitud)

    }

    function getComment(Id){
        var items_comment = '';
        $("#id_textarea_comment").val(items_comment)
        $.ajax({
            url: 'getComment',
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
                        var_borrar = '<a href="#!" onClick="DeleteComment('+c.id_comment+' , '+c.id_solicitud+' )">Borrar</a> &bull; ' 
                    }else{
                        var_borrar = (c.id_usuario ===  var_login_user)? '<a href="#!" onClick="DeleteComment('+c.id_comment+' , '+c.id_solicitud+' )">Borrar</a> &bull; ' : ''

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


    function DeleteComment(id_comment,id_Solicitud){
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
                    url: "DeleteComment",
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

  
    function ChanceStatus(id,value){

        var Campo = 'Estados'
        var isSend = true

        if(value === 4){
            Campo = 'Activo'
            value = 'N'
        }

        if(isSend){
            Swal.fire({
            title: '¿Estas Seguro de cambiar el estado de la Solicitud?',
            text: "¡Esta acción no podrá ser revertida!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si!',
            target: document.getElementById('mdlMatPrima'),
            showLoaderOnConfirm: true,
            preConfirm: () => {
                $.ajax({
                    url: "Update",
                    type: 'post',
                    data: {
                        id      : id,
                        valor   : value,
                        Campo   : Campo,
                        _token  : "{{ csrf_token() }}" 
                    },
                    async: true,
                    success: function(response) {
                        Swal.fire("Exito!", "Guardado exitosamente", "success");
                    },
                    error: function(response) {
                        Swal.fire("Oops", "No se ha podido guardar!", "error");
                    }
                }).done(function(data) {
                    CargarDatos(nMes,annio);
                });
            },
            allowOutsideClick: () => !Swal.isLoading()
        });
            
        }

    }

    $('#tbl_solicitudes').on('click', "td",function(){

        var visIdx = $(this).index();
        var Campo = ''
        var lblTitulo = ''
        var isSend = false
        dtData = table.row( this ).data();


        var vali_number = 'soloNumeros(event.keyCode, event, $(this).val())'

        let estado = dtData.Estados

        

        let IdSolci = dtData.id_solicitud;

        if(var_rol === 1){
            if(visIdx===1){               

                $("#id_mdl_articulo").text(dtData.Articulos)
                $("#id_row").text(dtData.id_solicitud)
                $("#id_mdl_nombre_articulo").text(dtData.Descripcion)
                

                var addNuevaSolicitud = document.querySelector(Selectors.ADD_NUEVA_SOLCITUD);
                var modal = new window.bootstrap.Modal(addNuevaSolicitud);
                modal.show();

                
            }
            if(visIdx===2){
                Campo = 'Cant_solicitada'
                lblTitulo ='Cantidad Solicitada'
                isSend = true
            }

            if(visIdx===3){
                Campo = 'Ingreso'
                lblTitulo = 'Ingreso'
                isSend = true
            }
            
            if(visIdx===5){
                Campo = 'Tiempo_Entrega'
                lblTitulo = 'Tiempo de Entrega'
                isSend = true
            }
            if(visIdx===6){
                Campo = 'Proveedor'
                lblTitulo = 'Proveedor'
                isSend = true
                vali_number = ''
            }
        }

        if(var_rol === 4){
            if(visIdx===1){
                Campo = 'Cant_solicitada'
                lblTitulo ='Cantidad Solicitada'
                isSend = true
            }

            
            if(visIdx===2){
                Campo = 'Tiempo_Entrega'
                lblTitulo = 'Tiempo de Entrega'
                isSend = true
            }
            if(visIdx===3){
                Campo = 'Proveedor'
                lblTitulo = 'Proveedor'
                isSend = true
                vali_number = ''
            }
        }

        if(var_rol === 5){
            if(visIdx===1){
                
                $("#id_mdl_articulo").text(dtData.Articulos)
                $("#id_row").text(dtData.id_solicitud)
                $("#id_mdl_nombre_articulo").text(dtData.Descripcion)
                

                var addNuevaSolicitud = document.querySelector(Selectors.ADD_NUEVA_SOLCITUD);
                var modal = new window.bootstrap.Modal(addNuevaSolicitud);
                modal.show();                
            }            
            
        }

        if(var_rol === 6){
            /*if(visIdx===1){
                Campo = 'Inventario_real'
                lblTitulo = 'Inventario Real'
                isSend = true
            }*/

            if(visIdx===1){
                Campo = 'Ingreso'
                lblTitulo = 'Ingreso'
                isSend = true
            }            
            
        }

        if(intVal(estado) === 1){
            isSend= false
        }

        



        if(isSend){
            Swal.fire({
            title: lblTitulo,
            text: "Digite el valor solicitado",
            input: 'text',
            inputPlaceholder: 'Digite el valor ',
            target: document.getElementById('mdlMatPrima'),
            inputAttributes: {
                id: 'cantidad',
                required: 'true',
                onkeypress: vali_number
            },
            showCancelButton: true,
            confirmButtonText: 'Guardar',
            showLoaderOnConfirm: true,
            inputValue:  $(this). text(),
            inputValidator: (value) => {
                if (!value) {
                    return 'Digita la cantidad por favor';
                }

                value = value.replace(/[',]+/g, '');

                if (isNaN(value)) {
                    
                    if(vali_number===''){
                        $.ajax({
                            url: "Update",
                            type: 'post',
                            data: {
                                id      : IdSolci,
                                valor   : value,
                                Campo   : Campo,
                                _token  : "{{ csrf_token() }}" 
                            },
                            async: true,
                            success: function(response) {
                                Swal.fire("Exito!", "Guardado exitosamente", "success");
                            },
                            error: function(response) {
                                Swal.fire("Oops", "No se ha podido guardar!", "error");
                            }
                        }).done(function(data) {
                            CargarDatos(nMes,annio);
                        });
                    }else{
                        return 'Formato incorrecto';
                    }
                } else {

                        $.ajax({
                            url: "Update",
                            type: 'post',
                            data: {
                                id      : IdSolci,
                                valor   : value,
                                Campo   : Campo,
                                _token  : "{{ csrf_token() }}" 
                            },
                            async: true,
                            success: function(response) {
                                Swal.fire("Exito!", "Guardado exitosamente", "success");
                            },
                            error: function(response) {
                                Swal.fire("Oops", "No se ha podido guardar!", "error");
                            }
                        }).done(function(data) {
                            CargarDatos(nMes,annio);
                        });
                        
                    }
                }
            })
        }
    });
    dta_aportes_mercados.push(
            {value: 10,name: 'TRANSITO'}, 
            {value: 20,name: 'RETENIDO '}, 
            {value: 30,name: 'INGRESO PARCIAL'},
            {value: 40,name: 'INGRESO TOTAL'}
        )
    Echarts_Pie_Aportes_Mercado(dta_aportes_mercados)


    var ExcelToJSON = function() {

        this.parseExcel = function(file) {
        var reader = new FileReader();

        reader.onload = function(e) {
            var data = e.target.result;
            var workbook = XLSX.read(data, {type: 'binary'});
            workbook.SheetNames.forEach(function(sheetName) {
                var XL_row_object   = XLSX.utils.sheet_to_row_object_array(workbook.Sheets[sheetName]);
                var json_object     = JSON.stringify(XL_row_object);
                var objJson         = JSON.parse(json_object)

                dta_table_excel = [];
                $.each(objJson,function(key, objJson) {

                    var varCodigo  = isValue(objJson.Codigo,'N/D',true)
                    var varDescripcion  = isValue(objJson.Descripcion,'N/D',true)
                    var varFecha_de_Solicitud  = isValue(objJson.Fecha_de_Solicitud,'0000-00-00',true)                    
                    varFecha_de_Solicitud = (varFecha_de_Solicitud ==='0000-00-00') ? varFecha_de_Solicitud : moment(varFecha_de_Solicitud).format("YYYY-MM-DD")
                    var varProyeccion_Mensual  = isValue(objJson.Proyeccion_Mensual,'0.00',true)

                    
                    dta_table_excel.push({ 
                        Articulos: varCodigo,
                        Descripcion: varDescripcion,
                        proyect_mensual: varProyeccion_Mensual,
                        Fecha_Solicitada: varFecha_de_Solicitud,
                    })


                });
                table_render_excel(dta_table_excel)
            })
        };

        reader.onerror = function(ex) {

        };

        reader.readAsBinaryString(file);

        };
    };
    function handleFileSelect(evt) {    
        var files = evt.target.files;
        var xl2json = new ExcelToJSON();
        xl2json.parseExcel(files[0]);
    }
    $('#upload').on("change", function(e){ 
        handleFileSelect(e)
    });

    function isValue(value, def, is_return) {
    if ( $.type(value) == 'null'
        || $.type(value) == 'undefined'
        || $.trim(value) == ''
        || ($.type(value) == 'number' && !$.isNumeric(value))
        || ($.type(value) == 'array' && value.length == 0)
        || ($.type(value) == 'object' && $.isEmptyObject(value)) ) {
        return ($.type(def) != 'undefined') ? def : false;
    } else {
        return ($.type(is_return) == 'boolean' && is_return === true ? value : true);
    }
}
</script>