
<script type="text/javascript">
//date picker
$("#depart_date").datepicker({
    format: "dd/mm/yyyy",
    language: "fr",
    autoclose: true
});


$(document).ready( function (e) {
    /**
     * script d'enregistrement d'un depart
     */
          //

        // e.preventDefault();
        // var elForm = $('#form_client');
        // if (elForm.valid()) {
        //     $(elForm).ajaxSubmit({
        //         url: 'index.php/Voyage/save_depart',
        //         type: 'post',
        //         /*beforeSubmit: function () {
        //             blockUI(elForm);
        //         },*/
        //         success: function (result) {
        //             // window.ajax.reload(null, false);
        //            // unblockUI(elForm);
        //              console.log("Succes!!")
        //             $('#msg_confirme').modal('show');
        //         },
        //         error: function (result) {
        //             console.log("error")
        //             $('#msg_error').modal('show');
        //         },
        //         resetForm: false
        //     })
        // }
        // return false;

    $('#form_depart').submit(function(e){
        e.preventDefault();

        let num_depart = $("#num_depart").val()

        url = '<?php echo base_url()."index.php/Voyage/save_depart";?>'
        var donnee = $("#form_depart").serialize();
        console.log(donnee)
        $.ajax({
            data : donnee,
            method: "POST",
            url: url,
            dataType: "json"

        }).done(function(data){

            $('#depart').append($('<option/>', {
                value: data['depart'],
                text :num_depart
            }));
            //sélectionner le client qui vient d'être ajouté
           // $("#client option:last").attr("selected", "selected");
            $('#msg_confirme').modal('show');
            $('#modal_depart').modal('hide');
            $("#num_depart").val("")
            $("#depart_date").val("")
            $("#heure_depart").val("")
        }).fail(function(jqXHR, textStatus, errorThrown){
            $('#modal_depart').modal('hide');
            $('#msg_error').modal('show');

        })

    });


});




</script>