<script type="text/javascript">
    const startOfMonth = moment().startOf('month').format('YYYY-MM-DD');
    const endOfMonth   = moment().subtract(0, "days").format("YYYY-MM-DD");

    var labelRange = startOfMonth + " to " + endOfMonth;
    $('#id_range_select').change(function () {
        Fechas = $(this).val().split("to");
        if(Object.keys(Fechas).length >= 2 ){
            RangeStat(Fechas[0],Fechas[1]);
        } 
    });
    function RangeStat(Start,Ends){
        Start = $.trim(Start)
        Ends = $.trim(Ends)
        $.ajax({
            url: "getOrdenesRangeDates",
            type: 'post',
            data: {
                DateStart  : Start,
                DateEnds   : Ends,
                _token  : "{{ csrf_token() }}" 
            },
            async: true,
            success: function(response) {

                //window.location.href ='ImportacionDetalles/' + response.original
            },
            error: function(response) {
                Swal.fire("Oops", "No se ha podido guardar!", "error");
            }
        }).done(function(data) {
            
        });

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
