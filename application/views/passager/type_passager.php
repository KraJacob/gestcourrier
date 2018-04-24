<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<head>
<?php $this->load->view('tpl/css_files'); ?>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
  <header class="main-header">
  <?php $this->load->view('tpl/header'); ?>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- insertion de la side barre -->
    <?php $this->load->view('tpl/side_barre'); ?>
  </aside>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
    </section>
           <!-- begin -->
           <div class="portlet portlet light portlet-fit portlet-datatable bordered">
		          	<div class="portlet-title">
		               	<div class="actions">
							    		 	<a href="#" id="voir-utilisateur" style="display: none;" class="btn btn btn-default">
                          <i class="fa fa-eye"></i>
                          <span class="hidden-xs"> Voir </span>            
		                    </a>
									 		  <a href="javascript:;" style="display: none;" id="list-update-user" class="btn btn-primary" >
                           <i class="fa fa-edit"></i>
                            <span class="hidden-xs"> Modifier </span>
                        </a>
                        <a href="javascript:;" style="display: none;" id="list-delete-user" class="btn btn-danger" data-toggle="confirmation" data-original-title="Etes vous sûre ?" title="">
                           <i class="fa fa-trash"></i>
                           <span class="hidden-xs"> Supprimer </span>
                        </a>      
			                	<a  data-toggle="modal" href="#basic" class="btn btn- btn-info">
		                       <i class="fa fa-plus"></i>
		                        <span class="hidden-xs"> NOUVEL UTILISATEUR</span>
		                    </a>                                 
			              </div>     	
		              </div>
			            <div class="portlet-body">
			                <div class="table-container">
                       		<table class="display responsive no-wrap table table-striped table-bordered table-hover table-checkable order-column dataTable no-footer center_tab" id="type_passager" width="100%">
			                        <thead>
			                        		<tr>
			                        			<th>id</th>
			                        			<th>&nbsp;&nbsp;</th>
														        <th>Nom</th>
			                    					<th>Prénom</th>
			                    					<th>E-mail</th>	             
			                    					</tr>
	                        			</thead>                       			
			                      </table>       
		                    </div>   	
			              </div>
			           <div class="scroll-to-top" style="display: block;">
				        <i class="icon-arrow-up"></i>
			    </div>
       </div>
           <!-- end -->
      </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.4.0
    </div>
    <strong>Copyright &copy; 2014-2016 <a href="<?php echo base_url()."assets/";?>https://adminlte.io">Almsaeed Studio</a>.</strong> All rights
    reserved.
  </footer>

</div>
<!-- ./wrapper -->

<!-- js files -->
<?php $this->load->view('tpl/js_files'); ?>
<script>
  $(document).ready(function () {
     let ajaxLink = "<?php echo base_url(). "index.php/ControllerPassager/list_type_passager" ?>";
     let type_passager =  $("#type_passager").DataTable({
				
        buttons: [{
                 extend: "print",
                 text: "imprimer",
                 className: "btn btn-change mt-ladda-btn ladda-button btn-outline ",
                 title: "Liste des utilisateurs",
                 exportOptions: {
                       columns: ':visible'
                   }
             },  {
                 extend: "pdf",
                 className: "btn btn-good mt-ladda-btn ladda-button btn-outline ",
                 title: "Liste des utilisateurs",
                 exportOptions: {
                       columns: ':visible'
                   }
             }, {
                 extend: "excel",
                 className: "btn btn-snap mt-ladda-btn ladda-button btn-outline ",
                 title: "Liste des utilisateurs",
                 exportOptions: {
                       columns: ':visible'
                   }
             }],
              "select": true,
         
              "select": {
                    "style":    'multi'
                   },
            "columnDefs": [ 
                         {
                             "orderable": false,
                             "className": 'select-checkbox',
                             "targets":   1
                         },
                         {
                 "targets": [0],
                       "visible": false
                   
               }
                 ],
                 "lengthMenu": [[10, 15, 20, -1], [10, 15, 20, "All"]],
                 "order": [ 5, 'desc' ],
                 "columns": [
             { data: 0 },
             { data: 1 },
             { data: 2 },
             { data: 3 }
            ],
           "language": {
             "sProcessing":     "Traitement en cours...",
         "sSearch":         "Rechercher&nbsp;:",
           "sLengthMenu":     "Afficher _MENU_ &eacute;l&eacute;ments",
         "sInfo":           "Affichage de l'&eacute;l&eacute;ment _START_ &agrave; _END_ sur _TOTAL_ &eacute;l&eacute;ments",
         "sInfoEmpty":      "Affichage de l'&eacute;l&eacute;ment 0 &agrave; 0 sur 0 &eacute;l&eacute;ments",
         "sInfoFiltered":   "",
         "sInfoPostFix":    "",
         "sLoadingRecords": "Chargement en cours...",
           "sZeroRecords":    "Aucun &eacute;l&eacute;ment &agrave; afficher",
         "sEmptyTable":     "Aucune donn&eacute;e disponible dans le tableau",
         "oPaginate": {
           "sFirst":      "Premier",
           "sPrevious":   "Pr&eacute;c&eacute;dent",
           "sNext":       "Suivant",
           "sLast":       "Dernier"
         },
         "oAria": {
           "sSortAscending":  ": activer pour trier la colonne par ordre croissant",
           "sSortDescending": ": activer pour trier la colonne par ordre d&eacute;croissant"
         }
         },
         "ajax": {
         url : ajaxLink,
           "type": "POST"
           },

        "dom": "<'row' <'col-md-12'B>><'row'<'col-md-6 col-sm-12'l><'col-md-6 col-sm-12'f>r><'table-scrollable't><'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12'p>>",

    }); 
      //  let numberRows = 0;
      //        type_passager
      //            .on( 'select', function ( e, dt, type, indexes ) {
      //                $("#list-delete-user").fadeIn(200);
      //                numberRows = type_passager.rows({selected: true}).count();
      //                if(numberRows === 1) {
      //                    $("#list-update-user").fadeIn(200);
      //                    $("#voir-utilisateur").fadeIn(200);
      //                }else{
      //                    $("#list-update-user").fadeOut(200);
      //                    $("#voir-utilisateur").fadeOut(200);
      //                }
                     
      //            } )
      //            .on( 'deselect', function ( e, dt, type, indexes ) {
      //                numberRows = type_passager.rows({selected: true}).count();
      //                if(numberRows == 0) {
      //                   $("#list-delete-user").fadeOut(200);
      //                }
      //                if(numberRows !== 1) {
      //                    $("#list-update-user").fadeOut(200);
      //                    $("#voir-utilisateur").fadeOut(200);
      //                }else{
      //                    $("#list-update-user").fadeIn(200);
      //                    $("#voir-utilisateur").fadeIn(200);
      //                }
                    
      //            } );

      //            $("#voir-utilisateur").on("click", function(e){

      //    let id_user = type_passager.row({selected : true}).data()[0];
      //      window.location.href = '<?php echo base_url() . "index.php/utilisateurs/profile/"; ?>' + id_user;
         
      //  });
      //            $('#list-delete-user').confirmation({
      //            btnOkLabel: '<i class="icon-ok-sign icon-white"></i> OUI',
      //            btnCancelLabel: '<i class="icon-remove-sign"></i> NON',
      //            onConfirm: function(){
      //                let i = 0;
      //                let selectedIds = [];
      //                type_passager.rows({selected : true}).data().each(function(row){
      //                    selectedIds[i] = row[0];
      //                    i++;
      //                });

      //                type_passager.rows({selected : true}).deselect();

      //                $.ajax({
      //                    dataType: "json",
      //                    url: "supprimer_utilisateur",
      //                    type: 'POST',
      //                    data: {
      //                        selected : selectedIds
      //                    }
      //                    })
      //                  .done(function(data){
      //                        if(data["error"] === ""){
      
      //                           type_passager.ajax.url(ajaxLink).load();

      //                        }else{
      //                            alert("Vous ne pouvez pas supprimer un utilisateur qui a un historique.")
      //                            //console.log(data["error"]);
      //                        }
      //                    })
      //                    .fail(function( jqXHR, textStatus, errorThrown){

      //              if(textStatus == "parsererror"){
      //                bootbox.alert({ 
      //            title: "Session Terminée",
      //            message: "Votre session s'est interrompu. Veuillez-vous reconnecter.", 
      //            callback: function(){ 
      //              window.location.href = "<?php echo base_url() . "index.php/Login"; ?>"

      //             }
      //          })
      //              }else{
      //                $(".error-connexion").fadeIn(200);
      //                $(".error-connexion").fadeOut(4000);
      //                $('html, body').animate({ scrollTop: 0 }, 'fast');
      //              }
      //            }); 
      //                    //ajax deleting  
      //            }
      //        }); //delete

      //        $('#list-update-user').on("click", function(e){
      //            id = type_passager.row({selected : true}).data()[0];
      //             window.location.href = "<?php echo base_url() . "index.php/modification_utilisateur/"; ?>" +  id;
      //        });
      //        $('.searchable').select2();          
   });
 </script>
</body>
</html>