<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<head>
<?php 

$this->load->view('tpl/css_files');
$data = $this->session->userdata('data_passager');
$nom = $data['nom'];
$prenom = $data['prenom'];
$destination = $data['destination'];
$num_siege = $data['num_siege'];
$mobile = $data['mobile'];
$tarif = $data['tarif'];
 $id_reservation = 0;

 if($this->input->get("idreservation")!=null){ $id_reservation = $this->input->get("idreservation");}
 
?>
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
       FICHE D'ENREGISTREMENT
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
      <div class="box box-primary col-md-12">
            <div class="box-header with-border" style="float:right;">
              <h3 class="box-title"></h3>
			  <a href="<?php echo $id_reservation ?  base_url().'index.php/dashboard' :  base_url().'index.php/voyage';?>" class="btn btn-default fa fa-mail-reply"> Retour</a>
              <a class="btn btn-primary fa fa-edit" id="btn_update"> Modifier</a>
              <a href='<?php echo base_url()."index.php/Voyage/pdf";  ?>' target="_blank" id="btn_print" class="btn btn-warning fa fa-print"> Imprimer ticket</a>
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
                                            <input class="form-control" name="nom" type="text" required value="<?=$nom ; ?>" id="example-text-input" onChange="majuscule(this);">
                                        </div>
                                    </div>
                                </div>
                           </div>  
                  
                            <div class="col-md-12 frm" style="margin-bottom:1%;">
                              <div class="form-group">
                                <label class="col-md-3 col-form-label">Prénom</label>
                                <div class="col-md-9">
                                    <div class="input-group">
                                        <input type="text" id="type" name ="prenom" required class="form-control" value="<?=$prenom ; ?>" onChange="majuscule(this);"> 
                                    </div>
                                </div>
                              </div>
                          </div>
                          <div class="col-md-12 frm" style="margin-bottom:1%;">
                              <div class="form-group">
                                <label class="col-md-3 col-form-label">Mobile</label>
                                <div class="col-md-9">
                                    <div class="input-group">
                                        <input type="text" id="type" name ="mobile" required class="form-control" value="<?=$mobile ; ?>"> 
                                    </div>
                                </div>
                              </div>
                          </div>
                       
                     </div>
                     <div class="col-md-6">                      
                     <div class="col-md-12 frm" style="margin-bottom:1%;">
                              <div class="form-group">
                                <label class="col-md-3 col-form-label">Destination</label>
                                <div class="col-md-9">
                                    <div class="input-group">
                                        <input type="text" id="type" name ="destination" required class="form-control" value="<?=$this->session->userdata("ville")." "."-"." ".$destination ; ?>"> 
                                    </div>
                                </div>
                              </div>
                          </div>
                  
                            <div class="col-md-12 frm" style="margin-bottom:1%;">
                              <div class="form-group">
                                <label class="col-md-3 col-form-label">N°de siège</label>
                                <div class="col-md-9">
                                    <div class="input-group">
                                        <input type="text" id="siege" required name ="num_siege" value="<?=$num_siege ; ?>" class="form-control"> 
                                    </div>
                                </div>
                              </div>
                          </div>
                          <div class="col-md-12 frm" style="margin-bottom:1%;">
                              <div class="form-group">
                                <label class="col-md-3 col-form-label">Tarif</label>
                                <div class="col-md-9">
                                    <div class="input-group">
                                        <input type="text" id="tarif" required value="<?=$tarif ; ?>" name ="tarif" class="form-control" readonly> 
                                    </div>
                                </div>
                              </div>
                          </div>
                       
                     </div>
                     </div>
                      
                </fieldset>

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
    $("input").css("border", "0px");

    $("#btn_print").on('click', function(e){
        $("#btn_update").attr('disable',true)
    })
 })
</script>            
</body>
</html>
