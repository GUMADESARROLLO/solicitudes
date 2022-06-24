<script type="text/javascript">
    dtData = null 
    var Selectors = {
        ADD_NUEVA_SOLCITUD: '#addNuevaSolicitud',
    };
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
    table = $('#id_table_solicitud_detalles').DataTable({
                "destroy": true,
                    "info": false,
                    "bPaginate": true,
                    "order": [
                        [0, "asc"]
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
                    "columnDefs": [{"visible": false,"searchable": false, "targets": [1,2,3]}],
                });
                $("#id_table_solicitud_detalles_length").hide();
                $("#id_table_solicitud_detalles_filter").hide();


    $('#id_table_solicitud_detalles').on('click', "td",function(){

        var visIdx = $(this).index();     
        dtData = table.row( this ).data();

        $("#id_row").text(dtData[3])

        var addNuevaSolicitud = document.querySelector(Selectors.ADD_NUEVA_SOLCITUD);
        var modal = new window.bootstrap.Modal(addNuevaSolicitud);
        modal.show();

        $("#eventStartDate").val(dtData[2])
        $("#id_txt_proyeccion_mensual").val(dtData[1])

    });
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
                'Valor de Ingreso',
                'Ingrese el dato',
                'error'
            )
        }else{
            $.ajax({
                url: "../update_ingreso",
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
                location.reload();
            });
        }
    })
    
</script>