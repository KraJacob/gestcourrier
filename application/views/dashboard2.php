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
        K.F.T
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url()."index.php/dashboard2";?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
	 <section>
	  <div class="row" style="margin-bottom:5%;">
	    <div class="col-md-2"></div>
	       <div class="margin-bottom-5 col-md-4" >
				<input type="text" class="forms" id="debut" data-column="2" readonly="" name="colis_from" placeholder="de">
			</div>
			<div class="col-md-4">
				<input  type="text" id="fin" class="forms" data-column="2" readonly="" name="colis_to" placeholder="à">
			</div>	 
			<div class="col-md-2"></div> 
	  </div>
	 
	 </section>
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
			<p><h4>Valeur des departs</h4></p>
              <h3 id="depart"><?=$valeur_depart ?></h3>
            </div>
            <div class="icon">
              <i class=""></i>
            </div>
            <a href="<?php echo base_url()."index.php/detail_passager";?>" class="small-box-footer">Plus de détail <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
			 <p><h4>Valeur des colis envoyés</h4></p>
              <h3 id="colis"><?=$valeur_colis_envoye ?></h3>
              
            </div>
            <div class="icon">
              <i class=""></i>
            </div>
            <a href="<?php echo base_url()."index.php/colis_envoye";?>" class="small-box-footer">Plus de détail <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
			<p><h4>Depenses effectuées</h4></p>
              <h3 id="depense"><?=$depense ?></h3>
            </div>
            <div class="icon">
              <i class=""></i>
            </div>
            <a href="<?php echo base_url()."index.php/depenses";?>" class="small-box-footer">Plus de détail <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
			<p><h4>En caisse</h4></p>
              <h3 id="caisse"><?=$caisse ?></h3>
            </div>
            <div class="icon">
              <i class=""></i>
            </div>
            <a href="javascript:;" class="small-box-footer">Plus de détail <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
     </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 1.0.0
    </div>
    <strong>Copyright &copy; 2018 <a href="www.kft-transport.com">KFT</a>.</strong> conçu par djameryko technologie
    
  </footer>

  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- js files -->
<?php $this->load->view('tpl/js_files'); ?>
<script type="text/javascript">
   $("#debut,#fin").datepicker({
	format: 'dd/mm/yyyy',
	setDate: new Date(),
	useCurrent: false,
	autoclose: true,
	todayBtn: true,
	pickerPosition: "bottom-left",
	language: 'fr'
	})
	.on('hide', function(e) {
		let date_debut = $("#debut").val();
		let date_fin = $("#fin").val();
        if(date_debut && date_fin){			
			var url = '<?php echo base_url("index.php/Controlleruser/stat_dashboard2/"); ?>'
			$.ajax({
			method: "GET",
			url:url,
			dataType: "json",
			data: {
				date_debut : date_debut,
				date_fin : date_fin
				},
			success: function(data){
			
			}
										
			}).done(function(data){
			console.log(data)
			$("#depart").text(data["valeur_depart"])
			$("#colis").text(data["valeur_colis_envoye"])
			$("#depense").text(data["depense"])
			$("#caisse").text(data["caisse"])
		}).fail(function(data){
			console.log("erreur")
		})
		}
	});
</script>
</body>
</html>
