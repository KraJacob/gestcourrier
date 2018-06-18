<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<head>
<?php $this->load->view('tpl/css_files');  $conf=0; ?>
 <style>
  
 </style>
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
      <h1>
       ENREGISTREMENT D'UNE RESERVATION
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url()."assets/";?>#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">passager</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
	  <form action ="<?php echo base_url().'index.php/Voyage/add_reservation' ?>" onSubmit="return valid_form()" method="post" role="form">
      <div class="row">
       <div class="col-md-12"></div>
      <div class="box box-primary col-md-4">
            <div class="box-header with-border" style="float:right;">
              <h3 class="box-title"></h3>
			  <a href="javascript:;" style="display:none;" id="btn_update" class="btn btn-primary">Modifier</a> 
			  <a href="javascript:;" style="display:none;" id="btn_delete" class="btn btn-danger">Supprimer</a> 
			  <button type="submit" class="btn btn-success">Valider</button> 
              <button type="reset" class="btn btn-default">Annuler</button>
               <!-- <a href="<?php //echo base_url()."index.php/ticket";  ?>" class="btn btn-warning fa fa-print">Ticket</a> -->
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <?php if($this->session->flashdata('echec') ): ?>
		        <div class="alert alert-warning alert-dismissable">
	            <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                <strong>Note: </strong> <?php echo "Cet enregistrement existe dejà"; ?>
               </div>
                <?php endif ?>
				<?php if($this->session->flashdata('confirme') )
				
		        $conf =  $this->session->flashdata('confirme'); 
               
               ?>
            
              <div class="box-body ">
                  <div class="row">
                    <div class="col-md-12">
                    <fieldset>
                     <legend>PASSAGER</legend>
                     <div class="row" style="margin-bottom:2%;">
                     <div class="col-md-6">
					 <div class="col-md-12 frm" style="margin-bottom:1%;">
                                <div class="form-group">
                                <label class="col-md-3 col-form-label">Depart du</label>
                                    <div class="col-md-9">
                                        <div class="input-group">
                                            <input class="forms" name="date_depart" type="text" required value="" id="date_reservation" readonly placeholder="date du depart">
											<input type="hidden" name="update" id="update" value="">
                                        </div>
                                    </div>
                                </div>
                           </div> 
					 </div>
                     <div class="col-md-2">
                       <label> Type du passager </label>
                     </div>
                     <div class="col-md-2">
                            <input name="type_passager" id="normal" value="normal" checked="checked" type="radio">Normal
                     </div>
                        <div class="col-md-2">
                            <input name="type_passager" id="privilegie" value="privilegie"  type="radio"> Privilegié
                         </div>
					 </div>

                     <div class="row">
                     <div class="col-md-6">                      
                            <div class="col-md-12 frm" style="margin-bottom:1%;">
                                <div class="form-group">
                                <label class="col-md-3 col-form-label">Nom</label>
                                    <div class="col-md-9">
                                        <div class="input-group">
                                            <input class="forms" name="nom" type="text" required value="" id="nom_reservation" onChange="majuscule(this);">
                                        </div>
                                    </div>
                                </div>
                           </div>  
                  
                            <div class="col-md-12 frm" style="margin-bottom:1%;">
                              <div class="form-group">
                                <label class="col-md-3 col-form-label">Prénom</label>
                                <div class="col-md-9">
                                    <div class="input-group">
                                        <input type="text" id="prenom_reservation" name ="prenom" required class="forms" value='' onChange="majuscule(this);"> 
                                    </div>
                                </div>
                              </div>
                          </div>
                          <div class="col-md-12 frm" style="margin-bottom:1%;">
                              <div class="form-group">
                                <label class="col-md-3 col-form-label">Mobile</label>
                                <div class="col-md-9">
                                    <div class="input-group">
                                        <input type="text" id="mobile_reservation" name ="mobile" required class="forms" value=''> 
                                    </div>
                                </div>
                              </div>
                          </div>
                       
                     </div>
                     <div class="col-md-6">                      
                            <div class="col-md-12 frm" style="margin-bottom:1%;">
                                <div class="form-group">
                                <label class="col-md-3 col-form-label"> Destination</label>
                                <div class="col-md-9">
                                    <div class="input-group col-md-10">
                                    <input type="hidden" id="ville_depart" name ="ville_depart" class="" value='<?php echo $this->session->userdata("ville");  ?>'> 
                                    <select name="id_destination" class="forms" style="" id="destination">
                                    <option selected>Choisissez</option>
                                        <?php if($destination): ?>
                                        <?php foreach($destination as $dest): ?>
                                        
                                        <option value="<?php echo $dest["id_destination"];?>" data-destination="<?php echo $dest["ville_arrive"];?>"><?php echo $dest["ville_arrive"];?></option>
                                        <?php endforeach ?>
                                        <?php endif ?>
                                    </select> 
                                    </div>
                                </div>
                                </div>
                           </div>  
						   <div class="col-md-12 frm" style="margin-bottom:1%;">
                              <div class="form-group">
                                <label class="col-md-3 col-form-label">Depart N° </label>
                                <div class="col-md-9">
                                    <div class="input-group">
                                        <input type="text" id="num_depart" required name ="num_depart" class="forms"> 
                                    </div>
                                 </div>
                              </div>
                          </div>
                  
                            <div class="col-md-12 frm" style="margin-bottom:1%;">
                              <div class="form-group">
                                <label class="col-md-3 col-form-label">N°de siège</label>
                                <div class="col-md-9">
                                    <div class="input-group">
                                        <input type="text" id="siege" required name ="num_siege" class="forms"> 
                                    </div>
                                    <div id="tooltip" style="display:none;position: absolute;cursor: pointer;left: 100px;top: 25px;border: solid 1px #eee; background-color:#ffffdd; padding: 10px; z-index: 1000;border-radus:5;">
                                        siège déjà occupé, veuillez choisir un autre.
                                    </div>
                                </div>
                              </div>
                          </div>
                          <div class="col-md-12 frm" style="margin-bottom:1%;">
                              <div class="form-group">
                                <label class="col-md-3 col-form-label">Tarif</label>
                                <div class="col-md-9">
                                    <div class="input-group">
                                        <input type="text" id="tarif" required name ="tarif" class="forms" readonly> 
                                    </div>
                                </div>
                              </div>
                          </div>
                       
                     </div>
                     </div>
                      
                </fieldset>
                </div>
              </div>  

			  <div class="row">
			   <table id="reservation" class="table table-striped">
			   <thead>
			   <tr>
			         <th></th>
				 	<th>Client</th>
					<th>Mobile</th>
					<th>Date réservation</th>
					<th>Date depart</th>
					<th>Destination</th>
					<th>Tarif</th>
				</tr>
			   </thead>
			    <tbody>
				</tbody>
			   </table>
			  
			  </div>
              </div>
              <!-- /.box-body -->
          </div>          
      </div>
      <!-- /.row -->
      <!-- Main row -->
      <div class="row">
      </div>
      <!-- /.row (main row) -->
    </form>
    </section>
    <!-- /.content -->
	
  </div>
  <!-- /.content-wrapper -->
  <!-- modal message -->
  <div class="modal fade" id="msg_confirme" style="display: none;">
         <div class="modal-dialog" style="width:400px;">
            <div class="modal-content">
               <div class="modal-body">
                  <p>Opération effectuée avec succès</p>
               </div>
            </div>
            <!-- /.modal-content -->
         </div>
         <!-- /.modal-dialog -->
      </div>
      <!-- Fin modal msg -->
	   <!-- modal message suppression-->
	 <div class="modal fade" id="msg_delete" style="display: none;">
         <div class="modal-dialog" style="width:200px;">
            <div class="modal-content">
               <div class="modal-body">
                  <p>Voulez-vous supprimer ?</p>
			   </div>
			   <div class="modal-footer">
                  <button type="button" class="btn btn-default pull-left" data-dismiss="modal"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Non</font></font></button>
                  <button id="valider_delete" type="button" class="btn btn-success fa fa-check"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></button>
               </div>
			</div>
		 </div>
      </div>
	  <!-- Fin modal message suppression -->
    <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 1.0.0
    </div>
    <strong>Copyright &copy; 2018<a href="<?php echo base_url();?>">KT</a>.</strong> All rights
    reserved.
  </footer>

</div>
<!-- ./wrapper -->

<!-- js files -->
<?php $this->load->view('tpl/js_files'); ?>
<script type="text/javascript">
let erreur = true;
  $(document).ready(function(e){

	  let confirme = '<?php echo $conf; ?>';
	 if(confirme==1){
		// console.log(confirme)
		$("#msg_confirme").modal().show();
		setTimeout(function() {$('#msg_confirme').modal('hide');}, 1500);
	 }
	      
$("#destination").on("change", function(e){
   var id = $(this).val()
   //console.log(id)
    var destination = $(`option[value=${id}]`).data("destination");
   var ville_depart  = $("input[name=ville_depart]").val();
   var type_passager  = $("input[name=type_passager]:checked").val();
   var url = '<?php echo base_url("index.php/Voyage/get_tarif/"); ?>'
    $.ajax({
        method: "GET",
        url:url,
        dataType: "json",
        data: {destination : destination},
        success: function(data){
        
        }                                   
    }).done(function(data){
        if((type_passager=="privilegie") && (ville_depart=="ODIENNE" || ville_depart=="ABIDJAN") && (destination=="ODIENNE" || destination=="ABIDJAN")){
            let tarif = parseInt(data) - 1000;
			 $("#tarif").val(tarif)
        }else{
            $("#tarif").val(data.toLocaleString())
        }
               
    })
        
   })   
   
    $("input[name=type_passager]").on("change",function(e){
        let id_destination = $("#destination").val();
        let destination = $(`option[value=${id_destination}]`).data("destination");
        let ville_depart  = $("input[name=ville_depart]").val();
        let tarif = $("input[name=tarif]").val().split(" ");        
        let type_passager = $("input[name=type_passager]:checked").val();   
		//console.log(tarif);     
      if(type_passager=="normal"){
       // console.log(destination)
        if((tarif) && (ville_depart=="ODIENE" || ville_depart=="ABIDJAN") && (destination=="ODIENNE" || destination=="ABIDJAN"))
       {
          // res = tarif.split(" ")
           console.log(tarif)
           tarif = parseInt(tarif) + 1000
        $("#tarif").val(tarif)
       }
      }
      else{
        console.log(type_passager)
        if((tarif) && (ville_depart=="ODIENNE" || ville_depart=="ABIDJAN") && (destination=="ODIENNE" || destination=="ABIDJAN"))
       {
           tarif = tarif - 1000
        $("#tarif").val(tarif)
       }
      }
      
     });     
	 let url = "<?php echo base_url(). "index.php/Voyage/list_reservation" ?>";
    		let listreservation =  $("#reservation").DataTable({
				
				buttons: [{
					   extend: "print",
					   text: "imprimer",
					   className: "btn btn-change mt-ladda-btn ladda-button btn-secondary ",
					   title: "Liste des réservations",
					   exportOptions: {
						   columns: ':visible'
					   }
				   },  {
					   extend: "pdf",
					   className: "btn btn-good mt-ladda-btn ladda-button btn-danger ",
					   title: "Liste des réservations",
					   exportOptions: {
						   columns: ':visible'
					   }
				   }, {
					   extend: "excel",
					   className: "btn btn-snap mt-ladda-btn ladda-button btn-success ",
					   title: "Liste des réservations",
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
							   "targets":   0
						    },
						   {
							   "targets": [0],
							   "visible": false
					   
						   }
			   ],
			   "lengthMenu": [[5,10, 15, 20, -1], [5, 15, 20, "All"]],
			   "order": [ 0, 'desc' ],
			   "columns": [
				   { data: 0 },
				   { data: 1 },
				   { data: 2 },
				   { data: 3 },
				   { data: 4 },
				   { data: 5 },
				   { data: 6 }
			   ],
			 
			   //   "language": {
			   //     "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/French.json"
			   // },
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
				   url : url,
				   "type": "POST"
				   },

			  "dom": "<'row' <'col-md-12'B>><'row'<'col-md-6 col-sm-12'l><'col-md-6 col-sm-12'f>r><'table-scrollable't><'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12'p>>",

		   }); 
            //Affichage des boutons de controle
		   listreservation
					.on( 'select', function ( e, dt, type, indexes ) {
						$("#btn_delete").fadeIn(200);
						numberRows = listreservation.rows({selected: true}).count();
						if(numberRows === 1) {
							$("#btn_update").fadeIn(200);
						}else{
							$("#btn_update").fadeOut(200);
						}
						
					} )
					.on( 'deselect', function ( e, dt, type, indexes ) {
						numberRows = listreservation.rows({selected: true}).count();
						if(numberRows == 0) {
						$("#btn_delete").fadeOut(200);
						}
						if(numberRows !== 1) {
							$("#btn_update").fadeOut(200);
						}else{
							$("#btn_update").fadeIn(200);
						}
					
					} );

		// Action sur le bouton de modification

		$("#btn_update").on("click",function(){
			let idColis = listreservation.row({selected:true}).data()[0];
			
			let url ='<?php echo base_url()."index.php/Voyage/get_reservation_update";?>';

			$.ajax({
				dataType:"json",
				url:url,
				type:"POST",
				data:{id:idColis}
			}).done(function(data){
				//console.log(data)
				$("#date_reservation").val(data[0]["date_depart"])
				$("#nom_reservation").val(data[0]["nom"])
				$("#prenom_reservation").val(data[0]["prenom"])
				$("#mobile_reservation").val(data[0]["mobile"])
				$("#num_depart").val(data[0]["num_depart"])
				$("#siege").val(data[0]["num_siege"])
				$("#tarif").val(data[0]["tarif"])
				$("#update").val(data[0]["id_reservation"])
				let destination = data[0]["id_destination"]
				$("#destination option[value="+destination+"]").prop('selected', true);
				if(data[0]["type_passager"]=="normal"){
					$("#normal").attr('checked', 'checked');
				}else{
					$("#privilegie").attr('checked', 'checked');
				}
			}).fail(function(){
				console.log("failed")
			})
		})

		//affichage du message de suppression
		$("#btn_delete").on("click",function(){
						$("#msg_delete").modal("show")
					})
                    // function de suppression
         			$('#valider_delete').on("click", function(){
         					let i = 0;
         					let selectedIds = [];
         					listreservation.rows({selected : true}).data().each(function(row){
         						selectedIds[i] = listreservation.row({selected:true}).data()[0];
         						i++;
         					});
         					
         				//console.log(selectedIds)
						 listreservation.rows({selected : true}).deselect();
         
         					$.ajax({
         						dataType: "json",
         						url: "delete_reservation",
         						type: 'POST',
         						data: {
         							selected : selectedIds
         						}
         						})
         
         						.done(function(data){
									$("#msg_delete").modal("hide")
									location.reload(true);
         							
         						})
         						.fail(function( jqXHR, textStatus, errorThrown){
         
         						
         							
         						}); //ajax deleting colis
         
         
         				
         			}); //delete colis
     
  })

  $("#siege").on("keyup", function(e){
    var num_siege = $(this).val()
	var num_depart = $("#num_depart").val()
    var date_depart  = $("input[name=date_depart]").val();
    // console.log("oo"+num_depart)
    var url = '<?php echo base_url("index.php/Voyage/check_num_siege_reservation/"); ?>'
    $.ajax({
        method: "GET",
        url:url,
        dataType: "json",
        data: {
			num_depart : num_depart,
            num_siege : num_siege,
            date_depart : date_depart
        },
        success: function(data){
        
        }
                                    
    }).done(function(data){
        if(data){
			erreur = false;
            //evt.preventDefault();
            $("#siege").css("border", "1px solid red");
           // $("#siege").val("");
            $("#siege").focus();

            //$('#siege').attr('data-tooltip', 'w00t');
            $("#tooltip").show();
        }else{
			erreur = true;
			$("#tooltip").hide();
             $("#siege").css("border", "1px solid");
		}
                
    })

    $("#tooltip").click(function() {
        $(this).hide();
        $("#siege").val("");
        $("#siege").css("border", "1px solid");
    });        
    })
    //var 
    $("#date_reservation").datepicker({
		format: "dd/mm/yyyy",
		language:"fr",
		autoclose:true
	})
	.on('hide', function(e) {
				
				
				})

	function valid_form(){
		if(!erreur){
         alert("Ce siège est déjà occupé, veuillez choisir un autre")
		 return erreur
		}else{
			return erreur;
		}
        
	}
    
</script>            
</body>
</html>
