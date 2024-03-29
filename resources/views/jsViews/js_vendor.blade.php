<script type="text/javascript">
    var Selectors = {
        TABLE_SETTING: '#modal_new_vendor',
    };

    var vTableArticulos =  $('#tbl_vendors').DataTable({
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
    });
    
    $("#tbl_vendors_length").hide();
    $("#tbl_vendors_filter").hide();

    $('#id_txt_buscar').on('keyup', function() {        
        vTableArticulos.search(this.value).draw();
    });

    $("#id_btn_new").click(function(){
    
        OpenModal(0);

    });

    $("#id_send_frm_vendor").click(function(){

        var txt_nombre      = $("#id_name_vendor").val();   
        var txt_description = $("#id_description").val();   

        var modl_states     = $("#id_modal_state").text();  

        var txt_despacho    = $("#id_frm_time_despacho").val();   
        var txt_transito    = $("#id_frm_time_transito").val();   
        var txt_aduana      = $("#id_frm_time_aduana").val();  

        
        txt_nombre  = isValue(txt_nombre,'N/D',true)
        txt_description  = isValue(txt_description,'N/D',true)

        if(txt_description === 'N/D'|| txt_description ==='N/D'){
            //Swal.fire("Oops", "Datos no Completos", "error");
        }else{

            $.ajax({
                url: "SaveVendor",
                type: 'post',
                data: {
                    name_vendor   : txt_nombre,
                    description   : txt_description,
                    idVendor      : modl_states,
                    despacho      : txt_despacho,
                    transito      : txt_transito,
                    aduana        : txt_aduana,
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
                location.reload();
            });

        }

    });
    
    function OpenModal(Id){

        $("#id_name_vendor").val("");   
        $("#id_description").val("");   

        $("#id_frm_time_despacho").val("");   
        $("#id_frm_time_transito").val("");   
        $("#id_frm_time_aduana").val("");   
        var id_vendor = Id

        if(Id!=0){
            id_vendor = Id
            $.ajax({
                url: "getOneVendor/" + Id,
                type: 'GET',
                async: true,
                success: function(obj_vendor) {                    
                    $("#id_name_vendor").val(obj_vendor[0].nombre_vendor);   
                    $("#id_description").val(obj_vendor[0].Descripcion);   

                    $("#id_frm_time_despacho").val(obj_vendor[0].time_despacho);   
                    $("#id_frm_time_transito").val(obj_vendor[0].time_transito);   
                    $("#id_frm_time_aduana").val(obj_vendor[0].time_aduana);  

                },
                error: function(response) {
                }
            }).done(function(data) {
                //location.reload();
            });

        }

        var TABLE_SETTING = document.querySelector(Selectors.TABLE_SETTING);
        var modal = new window.bootstrap.Modal(TABLE_SETTING);
        modal.show();

        $("#id_modal_state").text(id_vendor);  
        
    }
    function RemoveVendor(id_vendor){
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
                    url: "DeleteVendor",
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
