<script type="text/javascript">
    var dta_inventarios = []  
    var dta_calendar = []  
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

    var month_ = moment().format('M');
    var year_ = moment().format('YYYY');

    getDataCalendar(month_,year_)

    
    appCalendarInit(dta_calendar)
    
    
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
        ADD_MULTI_ROW: '#addMultiRow',
        MODAL_COMMENT: '#IdmdlComment',
    };

    
    /*-----------------------------------------------
    |   Calendar
    -----------------------------------------------*/
    function getStackIcon(icon, transform) {
        return "\n  <span class=\"fa-stack ms-n1 me-3\">\n    <i class=\"fas fa-circle fa-stack-2x text-200\"></i>\n    <i class=\"".concat(icon, " fa-stack-1x text-primary\" data-fa-transform=").concat(transform, "></i>\n  </span>\n");
    };
    function getTemplate(event) {
        return "\n<div class=\"modal-header bg-light ps-card pe-5 border-bottom-0\">\n  <div>\n    <h5 class=\"modal-title mb-0\">".concat(event.title, "</h5>\n    ").concat(event.extendedProps.organizer ? "<p class=\"mb-0 fs--1 mt-1\">\n        by <a href=\"#!\">".concat(event.extendedProps.organizer, "</a>\n      </p>") : '', "\n  </div>\n  <button type=\"button\" class=\"btn-close position-absolute end-0 top-0 mt-3 me-3\" data-bs-dismiss=\"modal\" aria-label=\"Close\"></button>\n</div>\n<div class=\"modal-body px-card pb-card pt-1 fs--1\">\n  ").concat(event.extendedProps.description ? "\n      <div class=\"d-flex mt-3\">\n        ".concat(getStackIcon('fas fa-align-left'), "\n        <div class=\"flex-1\">\n          <h6>Comentarios</h6>\n          <p class=\"mb-0\">\n            \n          ").concat(event.extendedProps.description.split(' ').slice(0, 30).join(' '), "\n          </p>\n        </div>\n      </div>\n    ") : '', " \n  <div class=\"d-flex mt-3\">\n    ").concat(getStackIcon('fas fa-calendar-check'), "\n    <div class=\"flex-1\">\n        <h6>Fecha y Hora</h6>\n        <p class=\"mb-1\">\n          ").concat(window.dayjs && window.dayjs(event.start).format('dddd, MMMM D, YYYY, h:mm A'), " \n          ").concat(event.end ? "\u2013 <br/>".concat(window.dayjs && window.dayjs(event.end).subtract(1, 'day').format('dddd, MMMM D, YYYY, h:mm A')) : '', "\n        </p>\n    </div>\n  </div>\n  ").concat(event.extendedProps.location ? "\n        <div class=\"d-flex mt-3\">\n          ".concat(getStackIcon('fas fa-map-marker-alt'), "\n          <div class=\"flex-1\">\n              <h6>Location</h6>\n              <p class=\"mb-0\">").concat(event.extendedProps.location, "</p>\n          </div>\n        </div>\n      ") : '', "\n  ").concat(event.schedules ? "\n        <div class=\"d-flex mt-3\">\n        ".concat(getStackIcon('fas fa-clock'), "\n        <div class=\"flex-1\">\n            <h6>Schedule</h6>\n            \n            <ul class=\"list-unstyled timeline mb-0\">\n              ").concat(event.schedules.map(function (schedule) {
            return "<li>".concat(schedule.title, "</li>");
        }).join(''), "\n            </ul>\n        </div>\n      ") : '', "\n  </div>\n</div>\n<div class=\"modal-footer d-flex justify-content-end bg-light px-card border-top-0\">\n </div>\n");
    };
    function appCalendarInit(events) {

        var Selectors = {
            ACTIVE: '.active',
            ADD_EVENT_FORM: '#addEventForm',
            ADD_EVENT_MODAL: '#addEventModal',
            CALENDAR: '#appCalendar',
            CALENDAR_TITLE: '.calendar-title',
            DATA_CALENDAR_VIEW: '[data-fc-view]',
            DATA_EVENT: '[data-event]',
            DATA_VIEW_TITLE: '[data-view-title]',
            EVENT_DETAILS_MODAL: '#eventDetailsModal',
            EVENT_DETAILS_MODAL_CONTENT: '#eventDetailsModal .modal-content',
            EVENT_START_DATE: '#addEventModal [name="startDate"]',
            INPUT_TITLE: '[name="title"]'
        };

        var _window3 = window,dayjs = _window3.dayjs;
        var currentDay = dayjs && dayjs().format('DD');
        var currentMonth = dayjs && dayjs().format('MM');
        var prevMonth = dayjs && dayjs().subtract(1, 'month').format('MM');
        var nextMonth = dayjs && dayjs().add(1, 'month').format('MM');
        var currentYear = dayjs && dayjs().format('YYYY');

        

       
        var Events = {
            CLICK: 'click',
            SHOWN_BS_MODAL: 'shown.bs.modal',
            SUBMIT: 'submit'
        };
        var DataKeys = {
            EVENT: 'event',
            FC_VIEW: 'fc-view'
        };
        var ClassNames = {
            ACTIVE: 'active'
        };
        var eventList = events.reduce(function (acc, val) {
            return val.schedules ? acc.concat(val.schedules.concat(val)) : acc.concat(val);
        }, []);

        var updateTitle = function updateTitle(title) {
            document.querySelector(Selectors.CALENDAR_TITLE).textContent = title;

            
            /*var month_ = moment().month(title).format("M");
            var year_ = moment().month(title).format("YYYY");
            
            getDataCalendar(month_,year_)*/
            
        };

        var appCalendar = document.querySelector(Selectors.CALENDAR);
        var addEventForm = document.querySelector(Selectors.ADD_EVENT_FORM);
        var addEventModal = document.querySelector(Selectors.ADD_EVENT_MODAL);
        var eventDetailsModal = document.querySelector(Selectors.EVENT_DETAILS_MODAL);

        if (appCalendar) {
            var calendar = renderCalendar(appCalendar, {
            headerToolbar: false,
            dayMaxEvents: 2,
            height: 800,
            stickyHeaderDates: false,
            views: {
                week: {
                eventLimit: 3
                }
            },
            eventTimeFormat: {
                hour: 'numeric',
                minute: '2-digit',
                omitZeroMinute: true,
                meridiem: true
            },
            events: eventList,
            eventClick: function eventClick(info) {
                var template = getTemplate(info.event);
                document.querySelector(Selectors.EVENT_DETAILS_MODAL_CONTENT).innerHTML = template;
                var modal = new window.bootstrap.Modal(eventDetailsModal);
                modal.show();

            },
            dateClick: function dateClick(info) {
                var month_ = moment().month(calendar.currentData.viewTitle).format("M");
                var year_ = moment().month(calendar.currentData.viewTitle).format("YYYY")

                getData(month_,year_)

                
                var modal = new window.bootstrap.Modal(addEventModal);
                modal.show();

                var flatpickr = document.querySelector(Selectors.EVENT_START_DATE)._flatpickr;

                flatpickr.setDate([info.dateStr]);
            }
            });
            updateTitle(calendar.currentData.viewTitle);
            document.querySelectorAll(Selectors.DATA_EVENT).forEach(function (button) {
            button.addEventListener(Events.CLICK, function (e) {
                var el = e.currentTarget;
                var type = utils.getData(el, DataKeys.EVENT);

                switch (type) {
                case 'prev':
                    calendar.prev();
                    updateTitle(calendar.currentData.viewTitle);
                    break;

                case 'next':
                    calendar.next();
                    updateTitle(calendar.currentData.viewTitle);
                    break;

                case 'today':
                    calendar.today();
                    updateTitle(calendar.currentData.viewTitle);
                    break;

                default:
                    calendar.today();
                    updateTitle(calendar.currentData.viewTitle);
                    break;
                }
            });
            });
            document.querySelectorAll(Selectors.DATA_CALENDAR_VIEW).forEach(function (link) {
            link.addEventListener(Events.CLICK, function (e) {
                e.preventDefault();
                var el = e.currentTarget;
                var text = el.textContent;
                el.parentElement.querySelector(Selectors.ACTIVE).classList.remove(ClassNames.ACTIVE);
                el.classList.add(ClassNames.ACTIVE);
                document.querySelector(Selectors.DATA_VIEW_TITLE).textContent = text;
                calendar.changeView(utils.getData(el, DataKeys.FC_VIEW));
                updateTitle(calendar.currentData.viewTitle);
            });
            });
            addEventForm && addEventForm.addEventListener(Events.SUBMIT, function (e) {
            e.preventDefault();
            var _e$target = e.target,
                title = _e$target.title,
                startDate = _e$target.startDate,
                endDate = _e$target.endDate,
                label = _e$target.label,
                description = _e$target.description,
                allDay = _e$target.allDay;
            calendar.addEvent({
                title: title.value,
                start: startDate.value,
                end: endDate.value ? endDate.value : null,
                allDay: allDay.checked,
                className: allDay.checked && label.value ? "bg-soft-".concat(label.value) : ''
                //description: description.value
            });
            e.target.reset();
            window.bootstrap.Modal.getInstance(addEventModal).hide();
            });
        }

        addEventModal && addEventModal.addEventListener(Events.SHOWN_BS_MODAL, function (_ref13) {
            var currentTarget = _ref13.currentTarget;
            currentTarget.querySelector(Selectors.INPUT_TITLE).focus();
        });
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
                url: "guardar_excel_proyecciones",
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
            url: 'dtProyeccion', 
            async: false,
            dataType: "json",
            success: function(data){
                if (data[0]['data'].length > 0) {
                    var Transito = 0;
                    var Retenido = 0;
                    var In_parci= 0;
                    var In_Total= 0;

                    table_render_solicitud(data[0]['data'])
    
                }

                
            },
            error: function(data) {
            }
        });
    }
    $("#id_send_filtros").click(function(){
        var var_nMes   = $("#IdSelectMes option:selected").val();           
        var var_annio  = $("#IdSelectAnnio option:selected").val()

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
            url: 'dtProyeccion', 
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
                        })

                    });

                    table_render_excel(dta_table_excel)

    
                }

                
            },
            error: function(data) {
            }
        });
    })

    
    function getData(month_,year_){
        
        $.ajax({
            type: "GET",
            url: 'getArticuloCalendar/'+ month_ + "/" + year_, 
            async: false,
            dataType: "json",
            success: function(data){
                $.each(data,function(key, registro) {
                    $("#eArticulos").append('<option value='+registro.Articulos+'>'+registro.Articulos + ' | ' + registro.Descripcion+'</option>');
                    


                }); 	 
                
            },
            error: function(data) {
                //alert('error');
            }
        });

       
    }
    function getDataCalendar(mes,annio){

        dta_calendar = []

        var SumCantidad = 0;

        $.ajax({
            type: "GET",
            url: 'getDataCalendar/' + mes + "/"+annio, 
            async: false,
            dataType: "json",
            success: function(data){
                $.each(data,function(key, registro) {


                    dta_calendar.push(
                        {
                            'title': numeral(registro.Cantidad).format('0,0.00') + " Kg.",
                            'start': registro.Fecha,
                            'description': registro.Descripcion + " <br> <br>" + registro.Comentarios,
                            'className': 'bg-soft-success'
                        }
                    )
                    SumCantidad += parseFloat(registro.Cantidad)
                }); 	 
                
                $("#id_sum_mes").html(numeral(SumCantidad).format('0,00.00'))
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
                location.reload();
            });
        }
    });

    $("#id_save_event").click(function(){
        
        


        var var_articulo   = $("#eArticulos option:selected").val();     
        var var_articulo_txt   = $("#eArticulos option:selected").text();     
        var txtCantidad = $("#eCantidad").val()
        var dtaFecha    = $("#eDate").val()
        var eComentario       = $("#eComentario").val()


        if(var_articulo==='0'){
            Swal.fire(
                'Articulo',
                'Seleccione el articulo',
                'error'
            )
        }else if (txtCantidad===''){
            Swal.fire(
                'Valor de Ingreso',
                'Ingrese el dato',
                'error'
            )
        }else{
            $.ajax({
                url: "./insert_evento",
                data: {
                    Articulo       : var_articulo,
                    
                    Descrip       : var_articulo_txt,
                    cantidad    : txtCantidad,
                    fecha       : dtaFecha,
                    comentario    : eComentario,
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
                location.reload();
            });
        }
    })


    

    $('#id_searh_table_Excel').on('keyup', function() {
        table_excel.search(this.value).draw();
    });



    function table_render_solicitud(datos){

        var html_grid_product = '' ;

        
            $.each(datos, function (ind, elem) { 

                html_grid_product += `<div class="mb-3 col-md-6 col-lg-3">
                            <div class="border rounded-1 h-100 d-flex flex-column justify-content-between pb-3">
                            <div class="overflow-hidden">
                                <div class="position-relative rounded-top overflow-hidden">
                                <a class="d-block" href="!#">
                                    <img class="img-fluid rounded-top" src="images/item-stock-03.png" alt="" />
                                </a>
                                </div>
                                <div class="p-3">
                                <h5 class="fs-0"><a class="text-dark" href="!#">`+elem.Descripcion+`</a></h5>
                                <p class="fs--1 mb-3"><a class="text-500" href="#!">SKU: `+elem.Articulos+`</a></p>
                                <h5 class="fs-md-2 text-warning mb-0 d-flex align-items-center mb-3"> `+elem.proyect_mensual+` Kg.</h5>
                                <p class="fs--1 mb-1">REAL: <strong> 00.0 Kg.</strong></p>
                                <span class="badge rounded-pill badge-soft-primary">
                                    <span class="fas fa-caret-up"></span> 0.00 %
                                </span>
                                </p>
                                </div>
                            </div>                    
                            </div>
                        </div>`


            }); 

            $("#id_render_grid_html").html(html_grid_product)
            
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
                {"title": "Proyeccion Mensual","data": "proyect_mensual","render": $.fn.dataTable.render.number(',', '.', 2)},

            ],
            "columnDefs": [
                {
                    "className": "dt-center",
                    "targets": [0]
                },
                {
                    "className": "dt-right",
                    "targets": [2]
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
        
        $("#id_modal_name_item").text(dtData.Descripcion)
        $("#id_modal_articulo").text(dtData.Articulos)
        $("#id_modal_nSoli").text(dtData.id_solicitud)
        $("#id_modal_Fecha").text("-")
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
                isError = false
                error_txt = ''
                Error_descripcion = ''
                $.each(objJson,function(key, objJson) {

                    var varCodigo  = isValue(objJson.Codigo,'N/D',true)
                    var varDescripcion  = isValue(objJson.Descripcion,'N/D',true)
                    var varProyeccion_Mensual  = isValue(objJson.Proyeccion_Mensual,'0.00',true)

                    if(varCodigo == 'N/D'){
                        isError=true
                        error_txt = varCodigo
                        Error_descripcion = varDescripcion
                        dta_table_excel = [];
                    }



                    
                    dta_table_excel.push({ 
                        Articulos: varCodigo,
                        Descripcion: varDescripcion,
                        proyect_mensual: varProyeccion_Mensual,
                    })


                });
                if(isError){
                    Swal.fire(Error_descripcion, "Error en columna Codigo : " + error_txt, "error");
                    dta_table_excel = [];
                }

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
