<script type="text/javascript">
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
</script>
