<script src ="<?php echo base_url();?>assets/bower_components/jquery/dist/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo plugins_url('datatables/datatables.min.js'); ?>"></script>
<!-- Bootstrap 3.3.7 -->
<script src ="<?php echo base_url();?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src ="<?php echo base_url()."assets/";?>dist/js/adminlte.min.js"></script>
<script src ="<?php echo base_url();?>assets/bower_components/select2/select2.min.js"></script>
<!-- datepicker -->
<script src ="<?php echo base_url();?>assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script src ="<?php echo base_url();?>assets/bower_components/bootstrap-datepicker/dist/locales/bootstrap-datepicker.fr.min.js"></script>

<script>
    $(document).ready(function () {
        $(".select2").select2();
        function majuscule(champ){
            champ.value=champ.value.toUpperCase();
        }
    })


</script>
