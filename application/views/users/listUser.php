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
    <!-- Main content -->
    <!-- <section class="content"> -->
    <div class="register-box">
    <div class="register-box-body col-md-12">
    <p class="login-box-msg"> <b> ENREGISTREMENT D'UN UTILISATEUR </b></p>

    <form action="<?php echo base_url().'index.php/Controlleruser/SaveUser' ?>" method="post">
      <div class="row">
      <div class="col-md-12 frm" style="margin-bottom:1%;">
        <div class="form-group">
          <label class="col-md-3 col-form-label"> GARE </label>
             <div class="col-md-9">
               <div class="input-group col-md-12">
                 <select class="custom-select col-md-9 mb-2 mr-sm-2 mb-sm-0" id="inlineFormCustomSelect">
                 <option selected>Choisissez</option>
                   <?php if($gare): ?>
                   <?php foreach($gare as $g): ?>
                   
                   <option value=" <?php $g["id_gare"];?>"><?php echo $g["lib_gare"];?></option>
                   <?php endforeach ?>
                   <?php endif ?>
                </select> 
              </div>
          </div>
        </div>
       </div> 
       </div> 
      <div class="form-group has-feedback">
          <input type="text" class="form-control" name="nom" placeholder="Nom" onChange="majuscule(this);">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="text" class="form-control" name="prenom" placeholder="Prénom" onChange="majuscule(this);">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="email" class="form-control" name="email" placeholder="Email">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" name="password" placeholder="Mot de passe ">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" name="passwordconf" placeholder="Confirmer le mot de passe">
        <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-4">
          
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-success btn-block btn-flat">Valider</button>
        </div>
        <div class="col-xs-4">
          <button type="reset" class="btn btn-default btn-block btn-flat">Annuler</button>
        </div>
        <!-- /.col -->
      </div>
    </form>
   
  </div>
  <!-- /.form-box -->
</div>
    <!-- </section> -->
    <!-- /.content -->
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
</body>
</html>