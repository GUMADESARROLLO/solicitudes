<script type="text/javascript">
    var Selectors = {
        TABLE_SETTING: '#modal_new_ship_to',
    };
    $('#tbl_shipto').DataTable({
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
    
    $("#tbl_shipto_length").hide();
    $("#tbl_shipto_filter").hide();

    $("#id_btn_new").click(function(){
    
        OpenModal(0);

    });

    $("#id_send_frm_shipto").click(function(){

        var txt_nombre      = $("#id_name_shipto").val();   
        var txt_description = $("#id_description").val();   

        var modl_states     = $("#id_modal_state").text();  

        
        txt_nombre  = isValue(txt_nombre,'N/D',true)
        txt_description  = isValue(txt_description,'N/D',true)

        if(txt_description === 'N/D'|| txt_description ==='N/D'){
            //Swal.fire("Oops", "Datos no Completos", "error");
        }else{

            $.ajax({
                url: "SaveShipTo",
                type: 'post',
                data: {
                    name_shipto   : txt_nombre,
                    description   : txt_description,
                    idShipto      : modl_states,
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
        var id_vendor = Id

        if(Id!=0){
            id_vendor = Id
            $.ajax({
                url: "getOneShipTo/" + Id,
                type: 'GET',
                async: true,
                success: function(obj_vendor) {                    
                    $("#id_name_shipto").val(obj_vendor[0].nombre_shipto);   
                    $("#id_description").val(obj_vendor[0].Descripcion);   
                },
                error: function(response) {
                }
            }).done(function(data) {
                
            });

        }

        var TABLE_SETTING = document.querySelector(Selectors.TABLE_SETTING);
        var modal = new window.bootstrap.Modal(TABLE_SETTING);
        modal.show();

        $("#id_modal_state").text(id_vendor);  
     
    }
    function RemoveShipTo(id_shipto){
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
                    url: "DeleteShipTo",
                    type: 'post',
                    data: {
                        id      : id_shipto,
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
