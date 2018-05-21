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
		<div style="float:right;margin-bottom:5px;">
			
			<button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal_user">
               Nouveau
      </button>
		</div>
		
    </section>
    <!-- Main content -->
    <!-- <section class="content"> -->
    <div class="portlet-body">
   
		<div class="table-container">

			<table class="display responsive no-wrap table table-striped table-bordered table-hover table-checkable order-column dataTable no-footer center_tab" id="users" width="100%">
					<thead>
						<tr>
							<th>id</th>
							<th>&nbsp;&nbsp;</th>
			      	<th>Nom</th>
							<th>Prénom</th>
							<th>E-mail</th>	             
						</tr>
					</thead>
				
			</table>
					
	</div>
  </div>
  <!-- /.form-box -->
</div>
    <!-- </section> -->
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

	<!-- Modal detail utilisateur   -->
	<div class="modal fade"  id="modal_user" style="display: none;">
          <div class="modal-dialog" style="width:700px;">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">×</font></font></span></button>
                <h4 class="modal-title"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Contenu du colis</font></font></h4>
              </div>
              <div class="modal-body">
                   
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
											<input type="text" class="form-control" name="nom" placeholder="Nom" required onChange="majuscule(this);">
										<span class="glyphicon glyphicon-user form-control-feedback"></span>
									</div>
									<div class="form-group has-feedback">
										<input type="text" class="form-control" name="prenom" placeholder="Prénom" required onChange="majuscule(this);">
										<span class="glyphicon glyphicon-user form-control-feedback"></span>
									</div>
									<div class="form-group has-feedback">
										<input type="email" class="form-control" name="email" required placeholder="Email">
										<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
									</div>
									<div class="form-group has-feedback">
										<input type="password" class="form-control" name="password" required placeholder="Mot de passe ">
										<span class="glyphicon glyphicon-lock form-control-feedback"></span>
									</div>
									<div class="form-group has-feedback">
										<input type="password" class="form-control" name="passwordconf" required placeholder="Confirmer le mot de passe">
										<span class="glyphicon glyphicon-log-in form-control-feedback"></span>
									</div>
									<div class="row">
										<div class="col-xs-4">
											
										</div> 
										<!-- /.col -->
										 
										<!-- /.col -->
								 </div>
								 
              </div>
              <div class="modal-footer">
						  	<div class="col-xs-2" style="float:right;">
											<button type="submit" class="btn btn-success btn-block btn-flat">Valider</button>
										</div>
										<div class="col-xs-4" style="float:right;">
										<button type="button" class="btn btn-default" data-dismiss="modal"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Fermer</font></font></button>
									</div>                
              </div>
							</form>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>

	<!--  Fin du modal -->
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
<script type="text/javascript">
		let ajaxLink = "<?php echo base_url(). "index.php/Controlleruser/listUser" ?>";
        
				let userlist =  $("#users").DataTable({				
				buttons: [{
								 extend: "print",
								 text: "imprimer",
								 className: "btn btn-change mt-ladda-btn ladda-button btn-secondary ",
								 title: "Liste des utilisateurs",
								 exportOptions: {
											 columns: ':visible'
									 }
						 }, 
						  {
								 extend: "pdf",
								 className: "btn btn-good mt-ladda-btn ladda-button btn-danger ",
								 title: "Liste des utilisateurs",
								 exportOptions: {
											 columns: ':visible'
									 }
						 }, {
								 extend: "excel",
								 className: "btn btn-snap mt-ladda-btn ladda-button btn-success ",
								 title: "Liste des utilisateurs",
								 exportOptions: {
											 columns: ':visible'
									 }
						 }],
							"select": true,
				 
							"select": {
										"style":'multi'
									 },
						"columnDefs": [ 
												 {
														 "orderable": false,
														 "className": 'select-checkbox',
														 "targets":1
												 },
												 {
								 "targets": [0],
								"visible": false
									 
							 }
								 ],
								 "lengthMenu": [[10, 15, 20, -1], [10, 15, 20, "All"]],
								 "order": [ 0, 'desc' ],
								 "columns": [
						 { data: 0 },
						 { data: 1 },
						 { data: 2 },
						 { data: 3 },
						 { data: 4 }
				 ],
			 
								 //   "language": {
				 //     "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/French.json"
				 // },
								 "language": {
						 "sProcessing":     "Traitement en cours...",
				 "sSearch":         "Rechercher&nbsp;:",
					 "sLengthMenu":     "Afficher _MENU_ &eacute;l&eacute;ments",
				 "sInfo":           "",
				 "sInfoEmpty":      "",
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
				 url : ajaxLink,
					 "type": "POST"
					 },

				"dom": "<'row' <'col-md-12'B>><'row'<'col-md-6 col-sm-12'l><'col-md-6 col-sm-12'f>r><'table-scrollable't><'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12'p>>",

		 }); 
</script>
</body>
</html>
