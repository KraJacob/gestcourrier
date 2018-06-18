<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$nbre_colis_envoye;
$nbre_colis_recu;
if($colis_recu){
	$nbre_colis_recu = count($colis_recu);
}
if($colis_envoye){
	$nbre_colis_envoye = count($colis_envoye);
}
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
        <li><a href="<?php echo base_url()."assets/";?>#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Accueil</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?=$nbre_colis_envoye ?></h3>

              <p>Colis envoyé(s)</p>
            </div>
            <div class="icon">
              <i class="glyphicon glyphicon-envelope"></i>
            </div>
            <a href="<?php echo base_url()."index.php/colis_envoye";?>" class="small-box-footer">Plus de détail <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?=$nbre_colis_recu ?></h3>

              <p>Colis reçu(s)</p>
            </div>
            <div class="icon">
              <i class="glyphicon glyphicon-envelope"></i>
            </div>
            <a href="<?php echo base_url()."index.php/colis_recu";?>" class="small-box-footer">Plus de détil<i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3><?=$passager ?></h3>

              <p>Passager(s)</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="<?php echo base_url()."assets/";?>#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3>65</h3>

              <p>Unique Visitors</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="<?php echo base_url()."assets/";?>#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->
      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <section class="col-lg-6 connectedSortable">
             <!-- TO DO List -->
            <div class="box box-primary div-scrol">
            <div class="box-header">
              <i class="ion ion-clipboard"></i>

              <h3 class="box-title">Liste des colis réçus</h3>

              <div class="box-tools pull-right">
                
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <!-- See dist/js/pages/dashboard.js to activate the todoList plugin -->
							<?php if($colis_recu): ?>
              <ul class="todo-list">
							<?php foreach($colis_recu as $col): ?>
                <li>
                  <!-- drag handle -->
                  <span class="handle">
                        <i class="fa fa-ellipsis-v"></i>
                        <i class="fa fa-ellipsis-v"></i>
                      </span>
                  <!-- checkbox -->
                  <input type="checkbox" value="">
                  <!-- todo text -->
                  <span class="text"><?=$col['ref_colis']; ?></span>
									<!-- Emphasis label -->
                  <small class="label label-success"><i class="fa fa-clock-o"></i> <?=$col['date_create']; ?></small>
                  <!-- General tools such as edit or delete-->
                  <div class="tools">
                    <!-- <i class="fa fa-edit"></i> -->
                    <button  class="fa  btn btn-success fa-check colis_id"  data-idcolis="<?=$col['id_colis']; ?>"></button>
                  </div>
                </li>
                <?php endforeach ?>
              </ul>
							<?php endif ?>
            </div>
            </div>
          <!-- /.box -->
          
        </section>
        <section class="col-lg-6 connectedSortable">

             <div class="box box-primary div-scrol">
            <div class="box-header">
              <i class="ion ion-clipboard"></i>

              <h3 class="box-title">Liste des réservations</h3>

              <div class="box-tools pull-right">
                <ul class="pagination pagination-sm inline">
                 </ul>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <!-- See dist/js/pages/dashboard.js to activate the todoList plugin -->
							<?php if($reservation): ?>
              <ul class="todo-list">
						  <?php foreach($reservation as $re): ?>
                <li>
                  <!-- drag handle -->
                  <span class="handle">
                        <i class="fa fa-ellipsis-v"></i>
                        <i class="fa fa-ellipsis-v"></i>
                      </span>
                  <!-- checkbox -->
                  <input type="checkbox" value="">
                  <!-- todo text -->
                  <span class="text"><?=$re->nom." ".$re->prenom; ?></span>
                  <!-- Emphasis label -->
                  <small class="label label-success"><i class="fa fa-clock-o"></i> destination <?=$re->ville_arrive." le ".$re->date_depart; ?></small>
                  <!-- General tools such as edit or delete-->
                  <div class="tools">
									<a  class="fa  btn btn-success fa-check reservation" data-idreservation="<?=$re->id_reservation; ?>"></a>
                  </div>
                </li>
                <?php endforeach; ?>
              </ul>
							<?php endif ?>
            </div>
            <!-- /.box-body -->
            <!-- <div class="box-footer clearfix no-border">
              <button type="button" class="btn btn-default pull-right"><i class="fa fa-plus"></i> Add item</button>
            </div> -->
          </div>

        </section>
        
      </div>
      <!-- /.row (main row) -->
      </section>
    <!-- /.content -->
  </div>
  	<!-- modal message -->
      <div class="modal fade" id="message_confirme" style="display: none;">
         <div class="modal-dialog" style="width:200px;">
            <div class="modal-content">
               <div class="modal-body">
                  <p>Voulez-vous confirmer la reception de ce colis ?</p>
			        </div>
							<div class="modal-footer">
								<button type="button" class="btn btn-default pull-left" data-dismiss="modal"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Non</font></font></button>
								<button id="colis" type="button" class="btn btn-success fa fa-check"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></button>
							</div>
		      	</div>			 
            <!-- /.modal-content -->
         </div>
         <!-- /.modal-dialog -->
      </div>
      <!-- Fin modal msg -->
		<!-- modal message -->
		<div class="modal fade" id="msg_reservation" style="display: none;">
         <div class="modal-dialog" style="width:200px;">
            <div class="modal-content">
               <div class="modal-body">
                  <p>Voulez-vous confirmer cette réservation ?</p>
			        </div>
							<div class="modal-footer">
								<button type="button" class="btn btn-default pull-left" data-dismiss="modal"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Non</font></font></button>
								<button id="reservation" type="button" class="btn btn-success fa fa-check"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></button>
							</div>
		      	</div>			 
            <!-- /.modal-content -->
         </div>
         <!-- /.modal-dialog -->
      </div>
      <!-- Fin modal msg -->
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
$(document).ready(function(){
		let id
	 let  idreservation
	$(".colis_id").on("click", function(e){
		 id = $(this).data('idcolis');
	$("#message_confirme").modal('show')
	})
	$("#colis").on("click", function(e){
		
		let urlcolis = "<?=base_url().('index.php/ControllerColis/valider_colis'); ?>"
		$.ajax({
				 	method: "GET",
				 	url:urlcolis,
				 	dataType: "json",
				 	data: {id : id},
				 	success: function(data){
				 	
				 	}
												
				 }).done(function(data){
					console.log(data)
               location.reload();
                }).fail(function(data){
									console.log(data)
								})
		$("#message_confirme").modal('hide')
	})


	$(".reservation").on("click", function(e){
		 idreservation = $(this).data('idreservation');
	$("#msg_reservation").modal('show')
	})


	$("#reservation").on("click", function(e){
		let id_reservation = $(".reservation").data("idreservation")
		let url = "<?=base_url().('index.php/ControllerPassager/valider_reservation?idreservation='); ?>"+id_reservation
		$(location).attr("href",url)
	// 	$.ajax({
	// 			 	method: "GET",
	// 			 	url:url,
	// 			 	dataType: "json",
	// 			 	data: {idreservation : idreservation},
	// 			 	success: function(data){
	// 			 	console.log("ok")
	// 			 	}
												
	// 			 }).done(function(data){
  //              location.reload();
  //               }).fail(function(){
	// 								console.log("fail")
	// 							})
	// 	$("#message_confirme").modal('hide')
	 })
})
  
</script>
</body>
</html>
