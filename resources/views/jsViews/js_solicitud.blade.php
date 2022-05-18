<script type="text/javascript">
    var dta_inventarios = []  
    var dta_aportes_mercados = []
    var table = ''
    var nMes   = $("#id_select_nmes option:selected").val();           
    var annio  = $("#id_select_annio option:selected").val()

    

    getData();
    CargarDatos(nMes,annio);

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
    };
   
    $("#id_btn_nueva_solicitud").click(function(){
    
        var addNuevaSolicitud = document.querySelector(Selectors.ADD_NUEVA_SOLCITUD);
        var modal = new window.bootstrap.Modal(addNuevaSolicitud);
        modal.show();

    });

    $("#id_btn_setting").click(function(){
    
        var TABLE_SETTING = document.querySelector(Selectors.TABLE_SETTING);
        var modal = new window.bootstrap.Modal(TABLE_SETTING);
        modal.show();

    });

    $("#id_send_info").click(function(){

        var slct_valu   = $("#organizerSingle option:selected").val();   
        var slct_text   = $("#organizerSingle option:selected").text().split("-");
        var dtaFecha    = $("#eventStartDate").val()
        var txtCantidad = $("#id_txt_proyeccion_mensual").val()

        console.log()

        if(slct_valu===''){
            Swal.fire(
            'Articulo',
            'No tiene articulo seleccionado',
            'error'
            )
        }else if(dtaFecha===''){
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
                    articulo    : slct_valu,
                    descripcion : slct_text[1],
                    fecha       : dtaFecha,
                    cantidad    : txtCantidad,
                    _token: "{{ csrf_token() }}" 
                },
                type: 'post',
                async: true,
                success: function(response) {
                    swal("Exito!", "Guardado exitosamente", "success");
                },
                error: function(response) {
                    swal("Oops", "No se ha podido guardar!", "error");
                }
            }).done(function(data) {
                CargarDatos(nMes,annio);
            });
        }


    });
    
    function CargarDatos(nMes,annio){
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

                    console.log(tt_pie_Transito)


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
                [5, -1],
                [5, "Todo"]
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
                "emptyTable": "REALICE UNA BUSQUEDA UTILIZANDO LOS FILTROS DE FECHA",
                "search": "BUSCAR"
            },
            'columns': [
                {
                    "title": "Solicitud",
                    "data": "Articulos",
                    "render": function(data, type, row, meta) {
                        return '<div class="d-flex align-items-center position-relative"><img class="rounded-1 border border-200" src="{{ asset("images/user/avatar-4.jpg") }}"alt="" width="60">'+
                        '<div class="flex-1 ms-3">'+
                            '<h6 class="mb-1 fw-semi-bold text-nowrap"><a class="text-900 stretched-link" href="#!"> <a href="OrdenesDetalles"> <strong>#' + row.id_solicitud + ' </strong></a> - ' + row.Descripcion + ' </a></h6>'+
                            '<p class="fw-semi-bold mb-0 text-500">' + row.Articulos + ' - -</p>'+
                        '</div>'+
                        '</div>'

                    },
                },
                {"title": "Fecha Solicitada","data": "Fecha_Solicitada"},
                {"title": "Proyeccion Mensual","data": "proyect_mensual", "render" : function (data, type, row, meta){

                        return numeral(data).format('0,0.00')
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
                        if(row.Estados === '0'){
                            return '<span class="badge badge rounded-pill d-block badge-soft-secondary">Transito<span class="ms-1 fas fa-ban" data-fa-transform="shrink-2"></span></span> '
                        }
                        if(row.Estados === '1'){
                            return '<span class="badge badge rounded-pill d-block badge-soft-warning">Retenido<span class="ms-1 fas fa-stream" data-fa-transform="shrink-2"></span></span>'
                        }
                        if(row.Estados === '2'){
                            return '<span class="badge badge rounded-pill d-block badge-soft-primary">Ingreso Parcial<span class="ms-1 fas fa-redo" data-fa-transform="shrink-2"></span></span>'
                        }
                        if(row.Estados === '3'){
                            return '<span class="badge badge rounded-pill d-block badge-soft-success">Ingreso Total<span class="ms-1 fas fa-check" data-fa-transform="shrink-2"></span></span>'
                        }

                    }
                },
                {
                    "title": " - ",
                    "data": "Articulos",
                    "render": function(data, type, row, meta) {
                        return '<div class="dropdown font-sans-serif position-static">'+
                            '<button class="btn btn-link text-600 btn-sm dropdown-toggle btn-reveal" type="button" id="order-dropdown-0" data-bs-toggle="dropdown" data-boundary="viewport" aria-haspopup="true" aria-expanded="false"><span class="fas fa-ellipsis-h fs--1"></span></button>'+
                            '<div class="dropdown-menu dropdown-menu-end border py-0" aria-labelledby="order-dropdown-0">'+
                                '<div class="bg-white py-2">'+
                                '<a class="dropdown-item" href="#!" onclick="ChanceStatus(' + row.id_solicitud + ',0)">Transito</a>'+
                                '<a class="dropdown-item" href="#!" onclick="ChanceStatus(' + row.id_solicitud + ',1)">Retenido</a>'+
                                '<a class="dropdown-item" href="#!" onclick="ChanceStatus(' + row.id_solicitud + ',2)">Ingreso Parcial</a>'+
                                '<a class="dropdown-item" href="#!" onclick="ChanceStatus(' + row.id_solicitud + ',3)">Ingreso Total</a>'+
                                '<div class="dropdown-divider"  ></div><a class="dropdown-item text-danger" href="#!" onclick="ChanceStatus(' + row.id_solicitud + ',4)">Borrar</a>'+
                                '</div>'+
                            '</div>'+
                            '</div>'

                    },
                },

                

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
                    "targets": [11]
                },
                
                {
                    "visible": false,
                    "searchable": false,
                    "targets": []
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
				var api = this.api(),
					data;



				var intVal = function(i) {
					return typeof i === 'string' ?
						i.replace(/[\$,]/g, '') * 1 :
						typeof i === 'number' ?
						i : 0;
				};

                $.each(data, function(i, item) {
                    if(intVal(item.Estados) === '0'){
                        Transito++;
                    }
                        
                });
				
                $('#id_total_soli').text(numeral(data.length).format('0,0'));
			},
        });
        $('#tbl_solicitudes thead').addClass('bg-200 text-900');
        
        $("#tbl_solicitudes_length").hide();
        $("#tbl_solicitudes_filter").hide();
        
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
                        swal("Exito!", "Guardado exitosamente", "success");
                    },
                    error: function(response) {
                        swal("Oops", "No se ha podido guardar!", "error");
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


        let IdSolci = dtData.id_solicitud;

        if(visIdx===3){
            Campo = 'Inventario_real'
            lblTitulo = 'Inventario Real'
            isSend = true
        }
        if(visIdx===4){
            Campo = 'Cant_solicitada'
            lblTitulo ='Cantidad Solicitada'
            isSend = true
        }

        if(visIdx===5){
            Campo = 'Ingreso'
            lblTitulo = 'Ingreso'
            isSend = true
        }
        
        if(visIdx===7){
            Campo = 'Tiempo_Entrega'
            lblTitulo = 'Tiempo de Entrega'
            isSend = true
        }
        if(visIdx===8){
            Campo = 'Proveedor'
            lblTitulo = 'Proveedor'
            isSend = true
            vali_number = ''
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
                                swal("Exito!", "Guardado exitosamente", "success");
                            },
                            error: function(response) {
                                swal("Oops", "No se ha podido guardar!", "error");
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
                                swal("Exito!", "Guardado exitosamente", "success");
                            },
                            error: function(response) {
                                swal("Oops", "No se ha podido guardar!", "error");
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
</script>