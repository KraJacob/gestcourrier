<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//var_dump($type_colis);exit();
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
       ENVOI DE COLIS
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
                
                <button type="submit" class="btn btn-success">Valider</button> 
                <button type="reset" class="btn btn-default">Annuler</button>
                <a href="<?php echo base_url()."index.php/Voyage/pdf";  ?>" class="btn btn-warning fa fa-print"> TEST</a>
				<!--<button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-default"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                Lancer le modal par défaut
                </font></font></button> -->
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
                                        <input id="date_ajout" name="date_ajout" size="21" type="text" class="form_datetime" readonly>
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
                                        <input id="ref" name="ref" size="21" type="text" >
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
									<select name="type_colis" class="custom-select col-md-12 mb-2 mr-sm-2 mb-sm-0" id="type_colis">
                                    <option selected>Choisissez</option>
                                        <?php if($type_colis): ?>
                                        <?php foreach($type_colis as $dat): ?>
                                        
                                        <option value="<?php echo $dat["id_type_colis"];?>" ><?php echo $dat["lib_type_colis"];?></option>
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
					   <div class="col-md-4">
						   
					   </div>
					   <div class="col-md-4">
					   
					   </div>
					   <div class="col-md-4">
					   
					   </div>
					 </div>
					 <div class="row" style="margin-top:5%;">
									   <div class="col-md-4">
										 <div class="col-md-12 frm" style="margin-bottom:1%;">
																<div class="form-group">
																	<label class="col-md-4 col-form-label">Description</label>
																	<div class="col-md-8">
																			<div class="input-group">
																			<textarea name="remarque" style="width:250px; height: 68px;" required></textarea> 
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
                                    <option selected>Choisissez</option>
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
																					<input type="text" id="pass" name ="pass" required class="form-control" value=''> 
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
																					<input type="text" id="valeur_colis" name ="valeur" required class="form-control"  onChange="majuscule(this);"> 
																			</div>
																	</div>
																</div>
														</div>
														<div class="col-md-12 frm" style="margin-bottom:1%;">
																<div class="form-group">
																	<label class="col-md-3 col-form-label">Montant</label>
																	<div class="col-md-9">
																			<div class="input-group">
																					<input type="text" id="montant_colis" name ="montant" required class="form-control"  onChange="majuscule(this);"> 
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
																	<input class="form-control" name="nom" type="text" required value="" id="nom" onChange="majuscule(this);">
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
															<input type="text" id="mobile" name ="mobile" required class="form-control" value=''> 
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
							           <option selected>Choisissez</option>
                                       <option value="CNI" >CNI</option>
									   <option value="ATTESTATION" >ATTESTATION</option>
									   <option value="PASSEPORT" >PASSEPORT</option>
									   <option value="PERMIS" >PERMIS DE CONDUIRE</option>
									   <option value="AUTRE" >AUTRE</option>
                                    </select> 
										</div>
										</div>
										</div>
										</div>
										<div class="col-md-12 frm" id="nature_piece" style="margin-bottom:1%;display:none;">
												<div class="form-group">
													<label class="col-md-3 col-form-label">Autre</label>
													<div class="col-md-9">
															<div class="input-group">
																	<input type="text"  name ="nat_piece" required class="form-control" value=''> 
															</div>
													</div>
												</div>
										</div>
										<div class="col-md-12 frm" style="margin-bottom:1%;">
												<div class="form-group">
													<label class="col-md-3 col-form-label">N° pièce</label>
													<div class="col-md-9">
															<div class="input-group">
																	<input type="text" id="num_piece" name ="num_piece" required class="form-control" value=''> 
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
																							<input class="form-control" name="nom_dest" type="text" required value="" id="nom_dest" onChange="majuscule(this);">
																					</div>
																			</div>
																	</div>
														</div>  
										
															<div class="col-md-12 frm" style="margin-bottom:1%;">
																<div class="form-group">
																	<label class="col-md-3 col-form-label">Prénom</label>
																	<div class="col-md-9">
																			<div class="input-group">
																					<input type="text" id="prenom_dest" name ="prenom_dest" required class="form-control" value='' onChange="majuscule(this);"> 
																			</div>
																	</div>
																</div>
														</div>
														<div class="col-md-12 frm" style="margin-bottom:1%;">
																<div class="form-group">
																	<label class="col-md-3 col-form-label">Mobile</label>
																	<div class="col-md-9">
																			<div class="input-group">
																					<input type="text" id="dest_mobile" name ="mobile_dest" required class="form-control" value=''> 
																			</div>
																	</div>
																</div>
														</div>
												
											</div>
										</fieldset>
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

	<!-- Modal detail colis   -->
	<div class="modal fade"  id="modal_colis" style="display: none;">
          <div class="modal-dialog" style="width:700px;">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">×</font></font></span></button>
                <h4 class="modal-title"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Contenu du colis</font></font></h4>
              </div>
              <div class="modal-body">
                   <div class="row">
				     <div class="col-md-12">
						<div class="col-md-12 frm" style="margin-bottom:1%;">
								<div class="form-group">
									<label class="col-md-3 col-form-label">Contenu</label>
									<div class="col-md-9">
											<div class="input-group">
													<input type="text" id="contenu" name ="contenu" required class="form-control" value=''> 
											</div>
									</div>
								</div>
						</div>
					 </div>
					 <div class="col-md-12">
						<div class="col-md-12 frm" style="margin-bottom:1%;">
								<div class="form-group">
									<label class="col-md-3 col-form-label">Valeur</label>
									<div class="col-md-9">
											<div class="input-group">
													<input type="text" id="valeur" name ="valeur" required class="form-control" value=''> 
											</div>
									</div>
								</div>
						</div>
					 </div>
					 <div class="col-md-12">
						<div class="col-md-12 frm" style="margin-bottom:1%;">
								<div class="form-group">
									<label class="col-md-3 col-form-label">Montant</label>
									<div class="col-md-9">
											<div class="input-group">
													<input type="text" id="montant" name ="montant" required class="form-control" value=''> 
											</div>
									</div>
								</div>
						</div>
					 </div>
				   </div>
				   <div style="float:right">
				   <button type="button" class="btn btn-primary fa fa-add" id="add_contenu"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Ajouter</font></font></button>

				   </div>
				   <div class="row">
				   <div class="table-container">

					<table class="display responsive no-wrap table table-striped table-bordered table-hover table-checkable order-column dataTable no-footer center_tab" id="tab_contenu" width="100%" border="1px solid">
						<thead>
							<tr>
								<th><center>Contenu</center></th>
								<th><center>Valeur</center></th>
								<th><center>Montant</center></th>
								<th>&nbsp;&nbsp;</th>
							</tr>
						</thead>
						<tbody>
						
						</tbody>
					</table>
						
					</div>
				   </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Fermer</font></font></button>
                <button id="enregistrer" type="button" class="btn btn-success fa fa-check"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Enregistrer</font></font></button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>

	<!--  Fin du modal -->
	<!-- modal message -->
	<div class="modal fade" id="message_erreur" style="display: none;">
          <div class="modal-dialog" style="width:400px;">
            <div class="modal-content">
              
              <div class="modal-body">
                <p>Veuillez remplir correctement les champs valeur et montant</p>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
	<!-- Fin modal -->
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
 
 
	$(".delete").on("click",function(){
			console.log("ok")
			//$(this).remove()
		})

 function deleteRow(btn) {
  var row = btn.parentNode.parentNode;
  row.parentNode.removeChild(row);
}	
    
</script>            
</body>
</html>
