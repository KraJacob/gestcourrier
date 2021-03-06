<?php
defined('BASEPATH') OR exit('No direct script access allowed');
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
       ENREGISTREMENT D'UN PASSAGER
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
      <div class="row">
       <div class="col-md-12"></div>
      <div class="box box-primary col-md-4">
            <div class="box-header with-border">
              <h3 class="box-title"></h3>
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
            <form action ="<?php echo base_url().'index.php/Voyage/add_voyage' ?>" method="post" role="form">
              <div class="box-body ">
                  <div class="row">
                    <div class="col-md-12">
                    <fieldset>
                     <legend>PASSAGER</legend>
                     <div class="row" style="margin-bottom:2%;">
                     <div class="col-md-2"></div>
                     <div class="col-md-2">
                       <label> Type du passager </label>
                     </div>
                     <div class="col-md-2">
                            <input name="type_passager" id="normal" value="normal" checked="checked" type="radio"> Normal
                     </div>
                        <div class="col-md-2">
                            <input name="type_passager" id="corps_habille" value="corps_habillé"  type="radio"> Corps Habillé
                         </div>
                     </div>

                     <div class="row">
                     <div class="col-md-6">                      
                            <div class="col-md-12 frm" style="margin-bottom:1%;">
                                <div class="form-group">
                                <label class="col-md-3 col-form-label">Nom</label>
                                    <div class="col-md-9">
                                        <div class="input-group">
                                            <input class="form-control" name="nom" type="text" required value="" id="example-text-input" onChange="majuscule(this);">
                                        </div>
                                    </div>
                                </div>
                           </div>  
                  
                            <div class="col-md-12 frm" style="margin-bottom:1%;">
                              <div class="form-group">
                                <label class="col-md-3 col-form-label">Prénom</label>
                                <div class="col-md-9">
                                    <div class="input-group">
                                        <input type="text" id="type" name ="prenom" required class="form-control" value='' onChange="majuscule(this);"> 
                                    </div>
                                </div>
                              </div>
                          </div>
                          <div class="col-md-12 frm" style="margin-bottom:1%;">
                              <div class="form-group">
                                <label class="col-md-3 col-form-label">Mobile</label>
                                <div class="col-md-9">
                                    <div class="input-group">
                                        <input type="text" id="type" name ="mobile" required class="form-control" value=''> 
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
                                    <input type="hidden" id="ville_depart" name ="ville_depart" class="form-control" value='<?php echo $this->session->userdata("ville");  ?>'> 
                                    <select name="ville_arrive" class="custom-select col-md-9 mb-2 mr-sm-2 mb-sm-0" id="destination">
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
                                <label class="col-md-3 col-form-label">N°de siège</label>
                                <div class="col-md-9">
                                    <div class="input-group">
                                        <input type="text" id="siege" required name ="num_siege" class="form-control"> 
                                    </div>
                                </div>
                              </div>
                          </div>
                          <div class="col-md-12 frm" style="margin-bottom:1%;">
                              <div class="form-group">
                                <label class="col-md-3 col-form-label">Tarif</label>
                                <div class="col-md-9">
                                    <div class="input-group">
                                        <input type="text" id="tarif" required name ="tarif" class="form-control" readonly> 
                                    </div>
                                </div>
                              </div>
                          </div>
                       
                     </div>
                     </div>
                      
                </fieldset>
                <fieldset>
                    <legend>Informations sur le départ</legend>
                       <div class="row" style="margin-bottom:2%;">
                       <div class="col-md-2"></div>
                           <div class="col-md-4">
                             <div class="form-group">
                                <label class="col-md-4 col-form-label">Départ N° </label>
                                    <div class="col-md-5">
                                        <div class="input-group">
                                            <input class="form-control" name="num_depart" size="20" value="1" type="text" id="num_depart" readonly>
                                        </div>
                                    </div>
                                </div>
                             </div>
                             <div class="col-md-4">
                                <div class="form-group">
                                <label class="col-md-6 col-form-label">Place disponible </label>
                                    <div class="col-md-5">
                                        <div class="input-group">
                                            <input class="form-control" name="place_disponible" size="20" type="text" value="1" id="place_dispo" readonly>
                                        </div>
                                    </div>
                                </div> 
                            </div>
                            <div class="col-md-2"></div>
                         </div>
                     <div class="row" style="margin-bottom:3%;">
                        <div class="col-md-6">                      
                            <div class="col-md-12 frm" style="margin-bottom:1%;">
                              <div class="form-group">
                                <label class="col-md-3 col-form-label">Date</label>
                                <div class="col-md-9">
                                    <div class="input-group">
                                        <input id="date_depart" name="date_depart" size="21" type="text" value="<?php echo  date("j/m/Y")?>" readonly class="form_datetime">
                                    </div>
                                </div>
                              </div>
                          </div>
                          <div class="col-md-12 frm" style="margin-bottom:1%;">
                              <div class="form-group">
                                <label class="col-md-3 col-form-label">Heure</label>
                                <div class="col-md-9">
                                    <div class="input-group">
                                        <input id="heure_depart" required name="heure_depart" size="21" type="time" value="<?php if($chauffeur_depart){echo $chauffeur_depart[0]["heure_depart"];}?>">  
                                    </div>
                                </div>
                              </div>
                          </div>
                          
                          <div class="col-md-12 frm" style="margin-bottom:1%;">
                              <div class="form-group">
                                <label class="col-md-3 col-form-label">Véhicule</label>
                                <div class="col-md-9">
                                    <div class="input-group col-md-10">
                                    <select name="immatriculation" class="custom-select col-md-9 mb-2 mr-sm-2 mb-sm-0" id="imat">
                                    <?php if($chauffeur_depart):?>
                                    <option value="<?php echo $chauffeur_depart[0]["immatriculation"];?>"><?php echo $chauffeur_depart[0]["immatriculation"];?></option>
                                    <?php else: ?>
                                       <option selected>Choisissez</option>
                                        <?php if($vehicule): ?>
                                        <?php foreach($vehicule as $veh): ?>
                                        
                                        <option value="<?php echo $veh["immatriculation"];?>" data-nbrePlace="<?php $veh["nbr_place"];?>"><?php echo $veh["immatriculation"];?></option>
                                        <?php endforeach ?>
                                        <?php endif ?>
                                        <?php endif ?>
                                    </select> 
                                    </div>
                                </div>
                              </div>
                          </div>
                       
                     </div>
                     <div class="col-md-6">                      
                            <div class="col-md-12 frm" style="margin-bottom:1%;">
                                <div class="form-group">
                                <label class="col-md-3 col-form-label"> Chauffeur</label>
                                    <div class="col-md-9">
                                    <div class="input-group col-md-10">
                                    <select name="chauffeur" class="custom-select col-md-9 mb-2 mr-sm-2 mb-sm-0" id="select_vehicule">
                                     
                                    <?php if($chauffeur_depart):?>
                                    <option value="<?php echo $chauffeur_depart[0]["id_personnel"];?>"><?php echo $chauffeur_depart[0]["nom"]." ".$chauffeur_depart[0]["prenom"];?></option>
                                    <?php else: ?>
                                    <option selected>Choisissez</option>
                                    <?php if($vehicule): ?>
                                        <?php foreach($chauffeur as $chauf): ?>                                        
                                        <option value="<?php echo $chauf["id_personnel"];?>"><?php echo $chauf["nom"]." ".$chauf["prenom"];?></option>
                                        <?php endforeach ?>
                                        <?php endif ?>
                                        <?php endif ?>
                                    </select> 
                                    </div>
                                    </div>
                                </div>
                           </div>  
                  
                            <div class="col-md-12 frm" style="margin-bottom:1%;">
                              <div class="form-group">
                                <label class="col-md-3 col-form-label">Convoyeur</label>
                                <div class="col-md-9">
                                <div class="input-group col-md-10">
                                    <select name="convoyeur" class="custom-select col-md-9 mb-2 mr-sm-2 mb-sm-0" id="inlineFormCustomSelect">
                                    <?php if($convoyeur_depart):?>
                                    <option value="<?php echo $convoyeur_depart[0]["id_personnel"];?>"><?php echo $convoyeur_depart[0]["nom"]." ".$convoyeur_depart[0]["prenom"];?></option>
                                    <?php else: ?>
                                    <option selected>Choisissez</option>
                                    <?php if($convoyeur): ?>
                                        <?php foreach($convoyeur as $conv): ?>
                                          <option value="<?php echo $conv["id_personnel"];?>"><?php echo $conv["nom"]." ".$conv["prenom"];?></option>
                                        <?php endforeach ?>
                                        <?php endif ?>
                                        <?php endif ?>
                                    </select> 
                                    </div>
                                </div>
                              </div>
                          </div>
                      </div>
                     </div>
                     <?php 
                     $ville = $this->session->userdata("ville");
                     $parcours;
                     if($ville == "ABIDJAN"){
                         $parcours = "ABIDJAN - ODIENE";
                     }else{
                        $parcours = "ODIENE - ABIDJAN"; 
                     }
                     
                     ?>
                      <div class="row">
                         <div class="col-md-2"></div>
                          <div class="col-md-7 frm" style="margin-bottom:1%;">
                              <div class="form-group">
                                <label class="col-md-3 col-form-label">Parcours</label>
                                <div class="col-md-9">
                                    <div class="input-group">
                                        <input name="parcours" type="text" id="type" class="form-control" value='<?php echo $parcours; ?>' readonly> 
                                    </div>
                                </div>
                              </div>
                          </div>
                      </div>
                     </div>
                </fieldset>
                    </div>
                 </div>  
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <a href="<?php echo base_url()."index.php/Voyage/pdf";  ?>" class="btn btn-primary"> Test </a>
                <button type="submit" class="btn btn-success">Valider</button> 
                <button type="reset" class="btn btn-default">Annuler</button>
              </div>
            </form>
            
          </div>
          
      </div>
      <!-- /.row -->
      <!-- Main row -->
      <div class="row">
      </div>
      <!-- /.row (main row) -->

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

        

        $("#imat").on("change", function(e){
             var imat = $(this).val()
            // console.log(imat)
             
               if( imat=="Choisissze"){
                        $("#place_dispo").val("0")
                     }else{
                      
                        var url = '<?php echo base_url("index.php/Voyage/place_disponible/"); ?>'
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
   var url = '<?php echo base_url("index.php/Voyage/get_tarif/"); ?>'
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

  $("#siege").on("change", function(e){
    var num_siege = $(this).val()
    var num_depart  = $("input[name=num_depart]").val();
    console.log()
    var url = '<?php echo base_url("index.php/Voyage/check_num_siege/"); ?>'
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
            alert("Cet siège est déjà occupé")
        }
                
    })
        
    })
    
</script>            
</body>
</html>