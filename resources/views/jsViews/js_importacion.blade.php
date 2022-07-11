<script type="text/javascript">
    var Selectors = {
        TABLE_SETTING: '#tbl_setting',
    };
    $("#id_btn_new_po").click(function(){
    
        var TABLE_SETTING = document.querySelector(Selectors.TABLE_SETTING);
        var modal = new window.bootstrap.Modal(TABLE_SETTING);
        modal.show();

    });
</script>
