<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//echo"lieu ". $lieu_reception." "; exit();
?>
<!DOCTYPE html>
<html>
<head>
<?php $this->load->view('tpl/css_files'); ?>
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
       FICHE DU COLIS
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url()."assets/";?>#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">passager</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
		<form action ="<?php echo base_url().'index.php/add_colis' ?>" method="post" role="form">
      <!-- Small boxes (Stat box) -->
      <div class="row">
       <div class="col-md-12"></div>
      <div class="box box-primary col-md-4" >
            <div class="box-header with-border">
              <h3 class="box-title"></h3>
							<div class="box-footer"  style="float:right;">
                
                 <a href="<?php echo base_url()."index.php/print_recu";  ?>" class="btn btn-warning fa fa-print"> REÇU</a>
				 <a class="btn btn-primary fa fa-edit"> Modifier</a>
				 <a href="<?php echo base_url()."index.php/colis";  ?>" class="btn btn-default fa fa-mail-reply"> RETOUR</a>
              </div>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <?php if($this->session->flashdata('echec') ): ?>
		        <div class="alert alert-warning alert-dismissable">
	            <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                <strong>Note: </strong> <?php echo "Cet enregistrement existe dejà"; ?>
               </div>
                <?php endif ?>
                <?php if($this->session->flashdata('success') ): ?>
		        <div class="alert alert-warning alert-success">
	            <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                <strong>Note: </strong> <?php echo "Enregistrement effectué"; ?>
               </div>
                <?php endif ?>
            
              <div class="box-body ">
                  <div class="row">
                    <div class="col-md-12">
                    <div class="row" style="margin-bottom:2%;">
                       <div class="col-md-4">
                        <div class="col-md-12 frm" style="margin-bottom:1%;">
                              <div class="form-group">
                                <label class="col-md-5 col-form-label">Enregistré le </label>
                                <div class="col-md-7">
                                    <div class="input-group">
                                        <input id="date_ajout" name="date_ajout" size="21" type="text" value="<?=$date_expedition; ?>" class="form_datetime">
                                    </div>
                                </div>
                              </div>
                          </div>
                       </div>
                     <div class="col-md-4">
										 <div class="col-md-12 frm" style="margin-bottom:1%;">
                              <div class="form-group">
                                <label class="col-md-3 col-form-label">Référence</label>
                                <div class="col-md-9">
                                    <div class="input-group">
                                        <input id="ref" name="ref" size="21" value="<?=$ref_colis; ?>" type="text" >
                                    </div>
                                </div>
                              </div>
                          </div>
                     </div>
                        <div class="col-md-4">
												<div class="col-md-12 frm" style="margin-bottom:1%;">
                              <div class="form-group">
                                <label class="col-md-3 col-form-label">Type</label>
                                <div class="col-md-9">
                                    <div class="input-group">
									<select name="type_colis" class="custom-select col-md-12 mb-2 mr-sm-2 mb-sm-0" id="type">
                                    <option selected><?=$id_type_colis; ?></option>
                                        <?php //if($destination): ?>
                                        <?php// foreach($destination as $dest): ?>
                                        
                                        <option value="<?php //echo $dest["id_destination"];?>" ><?php //echo $dest["ville_arrive"];?></option>
                                        <?php //endforeach ?>
                                        <?php //endif ?>
                                    </select>
                                    </div>
                                </div>
                              </div>
                          </div>
                         </div>
                     </div>
										 <div class="row">
										 <div class="col-md-6">
											<fieldset>
											<legend>Expéditeur</legend>
																						
															<div class="col-md-12 frm" style="margin-bottom:1%;">
																	<div class="form-group">
																	<label class="col-md-3 col-form-label">Nom</label>
																			<div class="col-md-9">
																					<div class="input-group">
																							<input class="form-control" name="nom" value="<?=$nom; ?>" type="text" required id="nom" onChange="majuscule(this);">
																					</div>
																			</div>
																	</div>
														</div>  
										
															<div class="col-md-12 frm" style="margin-bottom:1%;">
																<div class="form-group">
																	<label class="col-md-3 col-form-label">Prénom</label>
																	<div class="col-md-9">
																			<div class="input-group">
																					<input type="text" id="type" value="<?=$prenom; ?>" name ="prenom" required class="form-control" onChange="majuscule(this);"> 
																			</div>
																	</div>
																</div>
														</div>
														<div class="col-md-12 frm" style="margin-bottom:1%;">
																<div class="form-group">
																	<label class="col-md-3 col-form-label">Mobile</label>
																	<div class="col-md-9">
																			<div class="input-group">
																					<input type="text" value="<?=$mobile; ?>" id="mobile" name ="mobile" required class="form-control"> 
																			</div>
																	</div>
																</div>
														</div>
														<div class="col-md-12 frm" style="margin-bottom:1%;">
																<div class="form-group">
																	<label class="col-md-3 col-form-label">Nature pièce</label>
																	<div class="col-md-9">
																			<div class="input-group">
																			<select name="nat_piece" class="custom-select col-md-12 mb-2 mr-sm-2 mb-sm-0" id="nat_piece">
                                    <option selected><?=$nature_piece; ?></option>
                                        <?php //if($destination): ?>
                                        <?php// foreach($destination as $dest): ?>
                                        
                                        <option value="<?php //echo $dest["id_destination"];?>" ><?php //echo $dest["ville_arrive"];?></option>
                                        <?php //endforeach ?>
                                        <?php //endif ?>
                                    </select> 
																			</div>
																	</div>
																</div>
														</div>
														<div class="col-md-12 frm" style="margin-bottom:1%;">
																<div class="form-group">
																	<label class="col-md-3 col-form-label">N° pièce</label>
																	<div class="col-md-9">
																			<div class="input-group">
																					<input type="text" value="<?=$num_piece; ?>" id="num_piece" name ="num_piece" required class="form-control"> 
																			</div>
																	</div>
																</div>
														</div>
												
											</div>
										</fieldset>
                     <div class="col-md-6">                      
										 <fieldset>
											<legend>Destinateur</legend>																						
															<div class="col-md-12 frm" style="margin-bottom:1%;">
																	<div class="form-group">
																	<label class="col-md-3 col-form-label">Nom</label>
																			<div class="col-md-9">
																					<div class="input-group">
																							<input class="form-control" value="<?=$nom_dest; ?>" name="nom_dest" type="text" required id="nom_dest" onChange="majuscule(this);">
																					</div>
																			</div>
																	</div>
														</div>  
										
															<div class="col-md-12 frm" style="margin-bottom:1%;">
																<div class="form-group">
																	<label class="col-md-3 col-form-label">Prénom</label>
																	<div class="col-md-9">
																			<div class="input-group">
																					<input type="text" value="<?=$prenom_dest; ?>" id="prenom_dest" name ="prenom_dest" required class="form-control" onChange="majuscule(this);"> 
																			</div>
																	</div>
																</div>
														</div>
														<div class="col-md-12 frm" style="margin-bottom:1%;">
																<div class="form-group">
																	<label class="col-md-3 col-form-label">Mobile</label>
																	<div class="col-md-9">
																			<div class="input-group">
																					<input type="text" value="<?=$mobile_dest; ?>" id="dest_mobile" name ="mobile_dest" required class="form-control"> 
																			</div>
																	</div>
																</div>
														</div>
												
											</div>
										</fieldset>
                   </div>
									 </div>
									 <div class="row" style="margin-top:25%;">
									   <div class="col-md-4">
										 <div class="col-md-12 frm" style="margin-bottom:1%;">
																<div class="form-group">
																	<label class="col-md-3 col-form-label">Rémarque</label>
																	<div class="col-md-9">
																			<div class="input-group">
																			<textarea name="remarque" style="width:268px; height: 68px;" value="<?=$description; ?>" required><?=$description; ?> </textarea> 
																			</div>
																	</div>
																</div>
														</div>
										 </div>
										 <div class="col-md-4">
										 <div class="col-md-12 frm">
																<div class="form-group">
																	<label class="col-md-6 col-form-label">Lieu de reception</label>
																	<div class="col-md-6">
																			<div class="input-group">
																			<select name="lieu_reception" class="custom-select col-md-12 mb-2 mr-sm-2 mb-sm-0" id="lieu_reception">
                                    <option selected><?=$lieu_reception; ?></option>
                                        <?php //if($destination): ?>
                                        <?php// foreach($destination as $dest): ?>
                                        
                                        <option value="<?php //echo $dest["id_destination"];?>" ><?php //echo $dest["ville_arrive"];?></option>
                                        <?php //endforeach ?>
                                        <?php //endif ?>
                                    </select>
																			</div>
																	</div>
																</div>
														</div>
														<div class="col-md-12 frm" style="margin-bottom:1%;">
																<div class="form-group">
																	<label class="col-md-6 col-form-label">Mot de passe</label>
																	<div class="col-md-6">
																			<div class="input-group">
																					<input type="text" value="<?=$passe; ?>" id="pass" name ="pass" required class="form-control"> 
																			</div>
																	</div>
																</div>
														</div>
										 </div>
										 <div class="col-md-4">
										 
											 <div class="col-md-12 frm" style="margin-bottom:1%;">
																<div class="form-group">
																	<label class="col-md-3 col-form-label">Valeur</label>
																	<div class="col-md-9">
																			<div class="input-group">
																					<input type="text" id="valeur" value="<?=$valeur; ?>" name ="valeur" required class="form-control"  onChange="majuscule(this);"> 
																			</div>
																	</div>
																</div>
														</div>
														<div class="col-md-12 frm" style="margin-bottom:1%;">
																<div class="form-group">
																	<label class="col-md-3 col-form-label">Montant</label>
																	<div class="col-md-9">
																			<div class="input-group">
																					<input type="text" value="<?=$montant; ?>" id="montant" name ="montant" required class="form-control"  onChange="majuscule(this);"> 
																			</div>
																	</div>
																</div>
														</div>
										 
										 
										 </div>
									 </div>
                  
                    </div>
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
  $(document).ready(function(e){
	$("input,select,textarea").css("border", "0px");
   // $('.form_datetime').datepicker("setDate", new Date());
 //  $(".form_datetime").data("DateTimePicker").date(moment(dateVar));
    //$(".form_datetime").datepicker({
     //   format: 'dd/mm/yyyy',
        //setDate: new Date(),
        //useCurrent: false,
     //   autoclose: true,
        //  todayBtn: true,
        // pickerPosition: "bottom-left",
       // language: 'fr'
        
      //  });

        

      /*  $("#imat").on("change", function(e){
             var imat = $(this).val()
            // console.log(imat)
             
               if( imat=="Choisissze"){
                        $("#place_dispo").val("0")
                     }else{
                      
                        var url = '<?php //echo base_url("index.php/Voyage/place_disponible/"); ?>'
				 $.ajax({
				 	method: "GET",
				 	url:url,
				 	dataType: "json",
				 	data: {imat : imat},
				 	success: function(data){
				 	
				 	}
												
				 }).done(function(data){
                    $("#place_dispo").val(data)
                    console.log(data)
                })
                     }
                })

$("#destination").on("change", function(e){

   var id = $(this).val()
   //console.log(id)
    var destination = $(`option[value=${id}]`).data("destination");
   var ville_depart  = $("input[name=ville_depart]").val();
   var type_passager  = $("input[name=type_passager]:checked").val();
   var url = '<?php //echo base_url("index.php/Voyage/get_tarif/"); ?>'
    $.ajax({
        method: "GET",
        url:url,
        dataType: "json",
        data: {destination : destination},
        success: function(data){
        
        }
                                   
    }).done(function(data){
        if((type_passager=="corps_habillé") && (ville_depart=="ODIENE" || ville_depart=="ABIDJAN") && (destination=="ODIENE" || destination=="ABIDJAN")){
            let tarif = parseInt(data) - 1000;
            $("#tarif").val(tarif.toLocaleString())
        }else{
            $("#tarif").val(data.toLocaleString())
        }
               
    })
        
   })
   
   
    $("input[name=type_passager]").on("change",function(e){
       // let type_passager = $(this).val();
        //console.log(id)
        let id_destination = $("#destination").val();
        var destination = $(`option[value=${id_destination}]`).data("destination");
        let ville_depart  = $("input[name=ville_depart]").val();
        let tarif = $("input[name=tarif]").val().split(" ");
        
        let type_passager = $("input[name=type_passager]:checked").val();
        
      if(type_passager=="normal"){
        console.log(destination)
        if((tarif) && (ville_depart=="ODIENE" || ville_depart=="ABIDJAN") && (destination=="ODIENE" || destination=="ABIDJAN"))
       {
          // res = tarif.split(" ")
           console.log(tarif)
           tarif = parseInt(tarif) + 1000
        $("#tarif").val(tarif)
       }
      }
      else{
        console.log(type_passager)
        if((tarif) && (ville_depart=="ODIENE" || ville_depart=="ABIDJAN") && (destination=="ODIENE" || destination=="ABIDJAN"))
       {
           tarif = tarif - 1000
        $("#tarif").val(tarif)
       }
      }
      
     });     

  
     
  })

  $("#siege").on("blur", function(e){
    var num_siege = $(this).val()
    var num_depart  = $("input[name=num_depart]").val();
    //console.log()
    var url = '<?php //echo base_url("index.php/Voyage/check_num_siege/"); ?>'
    $.ajax({
        method: "GET",
        url:url,
        dataType: "json",
        data: {
            num_siege : num_siege,
            num_depart : num_depart
        },
        success: function(data){
        
        }
                                    
    }).done(function(data){
        if(data){
            //evt.preventDefault();
            $("#siege").css("border", "1px solid red");
            $("#siege").val("");
            $("#siege").focus();
            //$('#siege').attr('data-tooltip', 'w00t');
            $("#tooltip").show();
        }
                
    })

    $("#tooltip").click(function() {
        $(this).hide();
        $("#siege").val("");
        $("#siege").css("border", "1px solid");
    });*/
        
    })

 
</script>            
</body>
</html>
