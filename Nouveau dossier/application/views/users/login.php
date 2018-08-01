<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <?php $this->load->view('tpl/css_files'); ?>
  <title>Gestion | courrier</title>
  </head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Connectez vous</p>

    <form action="<?php echo base_url().'index.php/login' ?>" method="post">
      <div class="form-group has-feedback">
        <input type="email" name="email" class="form-control" placeholder="Email">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" name="password" class="form-control" placeholder="Mot de passe">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Connexion</button>
        </div>
        <!-- /.col -->
      </div>
      <div class="row" id="msg_erreur" data-message="<?php $this->session->userdata('erreur'); ?>">
      <?php if($this->session->flashdata('echec') ): ?>
      <span> <?php echo('<i style="color:red;">Email ou mot de passe incorect </i>') ?></span>
      <?php endif ?>
      </div>
    </form>
    <!-- /.social-auth-links -->

    <a href="javascript:;">Mot de passe oublié ?</a><br>
     </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->
<?php $this->load->view('tpl/js_files'); ?>
<script>
  $(document).ready(function(e){
    let msg = $("#msg_erreur").data("message");
    console.log(msg)
  });
  
</script>
</body>
</html>
