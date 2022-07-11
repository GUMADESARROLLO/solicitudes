<script type="text/javascript">
    var Selectors = {
        TABLE_SETTING: '#modal_new_vendor',
    };
    $("#id_btn_new").click(function(){
    
        var TABLE_SETTING = document.querySelector(Selectors.TABLE_SETTING);
        var modal = new window.bootstrap.Modal(TABLE_SETTING);
        modal.show();

    });
</script>
