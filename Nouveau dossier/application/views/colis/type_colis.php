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
      <h1>
       ENREGISTREMENT DU TYPE COLIS
        <small>type colis</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url()."assets/";?>#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">type colis</li>
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
            <?php if($this->session->flashdata('msg_erreur') ): ?>
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
            <form action ="<?php echo base_url().'index.php/ControllerColis/add_type_colis' ?>" method="post" role="form">
              <div class="box-body ">
                <div class="col-md-8 frm">
                <div class="form-group">
                    <label class="col-md-4 control-label">Type colis</label>
                    <div class="col-md-8">
                        <div class="input-group">
                            <input type="text" id="type" name ="lib_type_colis" class="form-control" value=''> 
                            <span class="input-group-addon">
                            <i class=""></i>
                            </span>
                        </div>
                    </div>
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
</body>
</html>