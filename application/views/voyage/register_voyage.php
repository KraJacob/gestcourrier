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
            <form action ="<?php echo base_url().'index.php/ControllerPersonnel/add' ?>" method="post" role="form">
              <div class="box-body ">
                  <div class="row">
                    <div class="col-md-12">
                    <fieldset>
                     <legend>PASSAGER</legend>
                      <div class="col-md-6">                      
                            <div class="col-md-12 frm" style="margin-bottom:1%;">
                                <div class="form-group">
                                <label class="col-md-3 col-form-label">Nom</label>
                                    <div class="col-md-9">
                                        <div class="input-group">
                                            <input class="form-control" name="nom" type="text" value="" id="example-text-input" onChange="majuscule(this);">
                                        </div>
                                    </div>
                                </div>
                           </div>  
                  
                            <div class="col-md-12 frm" style="margin-bottom:1%;">
                              <div class="form-group">
                                <label class="col-md-3 col-form-label">Prénom</label>
                                <div class="col-md-9">
                                    <div class="input-group">
                                        <input type="text" id="type" name ="prenom" class="form-control" value='' onChange="majuscule(this);"> 
                                    </div>
                                </div>
                              </div>
                          </div>
                          <div class="col-md-12 frm" style="margin-bottom:1%;">
                              <div class="form-group">
                                <label class="col-md-3 col-form-label">Mobile</label>
                                <div class="col-md-9">
                                    <div class="input-group">
                                        <input type="text" id="type" name ="mobile" class="form-control" value=''> 
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
                                    <select  class="custom-select col-md-9 mb-2 mr-sm-2 mb-sm-0" id="destination">
                                    <option selected>Choisissez</option>
                                        <?php if($destination): ?>
                                        <?php foreach($destination as $dest): ?>
                                        
                                        <option value="<?php echo $dest["ville_arrive"];?>"><?php echo $dest["ville_arrive"];?></option>
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
                                        <input type="text" id="siege" name ="num_siege" class="form-control" value=''> 
                                    </div>
                                </div>
                              </div>
                          </div>
                          <div class="col-md-12 frm" style="margin-bottom:1%;">
                              <div class="form-group">
                                <label class="col-md-3 col-form-label">Tarif</label>
                                <div class="col-md-9">
                                    <div class="input-group">
                                        <input type="text" id="tarif" name ="tarif" class="form-control" value='' disabled="disabled"> 
                                    </div>
                                </div>
                              </div>
                          </div>
                       
                     </div>
                </fieldset>
                <fieldset>
                    <legend>Infos</legend>
                       <div class="row" style="margin-bottom:2%;">
                       <div class="col-md-2"></div>
                           <div class="col-md-4">
                             <div class="form-group">
                                <label class="col-md-4 col-form-label">Départ N° </label>
                                    <div class="col-md-5">
                                        <div class="input-group">
                                            <input class="form-control" name="num_depart" size="20" type="text" value="1" id="num_depart" disabled="disabled">
                                        </div>
                                    </div>
                                </div>
                             </div>
                             <div class="col-md-4">
                                <div class="form-group">
                                <label class="col-md-6 col-form-label">place disponible </label>
                                    <div class="col-md-5">
                                        <div class="input-group">
                                            <input class="form-control" size="20" type="text" value="0" id="place_dispo" disabled="disabled">
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
                                <label class="col-md-3 col-form-label">Date </label>
                                <div class="col-md-8">
                                    <div class="input-group">
                                        <input id="date_depart" name="date_depart" size="21" type="text" value="Choisissez la date et l'heure" readonly class="form_datetime"> 
                                    </div>
                                </div>
                              </div>
                          </div>
                          <div class="col-md-12 frm" style="margin-bottom:1%;">
                              <div class="form-group">
                                <label class="col-md-3 col-form-label">Véhicule</label>
                                <div class="col-md-9">
                                    <div class="input-group col-md-10">
                                    <select  class="custom-select col-md-9 mb-2 mr-sm-2 mb-sm-0" id="imat">
                                    <option selected>Choisissez</option>
                                        <?php if($vehicule): ?>
                                        <?php foreach($vehicule as $veh): ?>
                                        
                                        <option value="<?php echo $veh["immatriculation"];?>" data-nbrePlace="<?php $veh["nbr_place"];?>"><?php echo $veh["immatriculation"];?></option>
                                        <?php endforeach ?>
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
                                    <select class="custom-select col-md-9 mb-2 mr-sm-2 mb-sm-0" id="select_vehicule">
                                    <option selected>Choisissez</option>
                                    <?php if($vehicule): ?>
                                        <?php foreach($chauffeur as $chauf): ?>
                                        
                                        <option value=" <?php $chauf["id_personnel"];?>"><?php echo $chauf["nom"]." ".$chauf["prenom"];?></option>
                                        <?php endforeach ?>
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
                                    <select class="custom-select col-md-9 mb-2 mr-sm-2 mb-sm-0" id="inlineFormCustomSelect">
                                    <option selected>Choisissez</option>
                                    <?php if($vehicule): ?>
                                        <?php foreach($convoyeur as $conv): ?>
                                          <option value=" <?php $conv["id_personnel"];?>"><?php echo $conv["nom"]." ".$conv["prenom"];?></option>
                                        <?php endforeach ?>
                                        <?php endif ?>
                                    </select> 
                                    </div>
                                </div>
                              </div>
                          </div>
                      </div>
                     </div>
                      <div class="row">
                         <div class="col-md-2"></div>
                          <div class="col-md-7 frm" style="margin-bottom:1%;">
                              <div class="form-group">
                                <label class="col-md-3 col-form-label">Parcours</label>
                                <div class="col-md-9">
                                    <div class="input-group">
                                        <input type="text" id="type" class="form-control" value='ABIDJAN - ODIENE' disabled="disabled"> 
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
    $(".form_datetime").datetimepicker({
        format: "dd MM yyyy - hh:ii",
        autoclose: true,
        todayBtn: true,
        pickerPosition: "bottom-left",
        language: 'fr'
        
        });

        $("#imat").on("change", function(e){

             var imat = $(this).val()
             console.log(imat)
             // var qte = $(`option[value=${id}]`).data("qte");
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
                     
                 })
                     }
                })

                $("#destination").on("change", function(e){

var id = $(this).val()
console.log(imat)
// var qte = $(`option[value=${id}]`).data("qte");
       var url = '<?php echo base_url("index.php/Voyage/get_tarif/"); ?>'
    $.ajax({
        method: "GET",
        url:url,
        dataType: "json",
        data: {id : id},
        success: function(data){
        
        }
                                   
    }).done(function(data){
       $("#tarif").val(data)
        
    })
        
   })

          
  })
    
</script>            
</body>
</html>