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
		 <div class="box box-primary col-md-4" >
            <!-- Content Header (Page header) -->
            <section class="content-header">
               <div style="float:right;margin-bottom:5px;">
                  <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal_user" style="display:none;">
                  Nouveau
                  </button>
               </div>
            </section>
            <!-- Main content -->
            <section class="content">
               <div class="portlet portlet light portlet-fit portlet-datatable bordered" style="background-color:#fff;">
                  <div class="portlet-title">
                     <div class="caption font-dark">
                        <i class="fa fa-filter font-dark"></i>
                        <span class="caption-subject bold uppercase">Recherche</span>	
                     </div>
                  </div>
                  <div class="portlet-body">
                     <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover table-checkable dataTable no-footer center_tab">
                           <thead>
                              <tr role="row" class="heading">
                                 <th>Réference</th>
                                 <th>Date d'envoi</th>
								 <th>Type</th>
                                 <th>Etat</th>
                                 <th>Actions</th>
                              </tr>
                              <tr role="row" class="heading filter">
                                 <td rowspan="1" colspan="1">
                                    <input type="text" data-column="1" class="form-control form-filter input-sm search-input-text" name="ref"> 
                                 </td>
                                 <td rowspan="1" colspan="1">
                                    <div class="input-group date date-picker margin-bottom-5 col-md-8" data-date-format="dd/mm/yyyy">
                                       <input type="text" class="form-control input-sm" data-column="3" readonly="" name="colis_from" placeholder="de">
                                       <span class="input-group-btn">
                                       <button class="btn btn-sm default" type="button">
                                       <i class="fa fa-calendar"></i>
                                       </button>
                                       </span>
                                    </div>
                                    <div class="input-group date date-picker col-md-8" data-date-format="dd/mm/yyyy">
                                       <input id="colis_to" type="text" class="form-control input-from input-sm" data-column="3" readonly="" name="colis_to" placeholder="à">
                                       <span class="input-group-btn">
                                       <button class="btn btn-sm default" type="button">
                                       <i class="fa fa-calendar"></i>
                                       </button>
                                       </span>
									 </div>
									 
                                 </td>
								 <td>
                                    <select name="categories" data-column="3" class="form-control select-filter form-filter input-sm">
                                       <option value="">Sélectionner</option>
                                       <option value="Courier">Courier</option>
                                       <option value="Autre">Autres</option>
                                 </td>
                                 <td>
                                 <select name="mouvements_status" data-column="5" id="statut-filter" class="form-control select-filter form-filter input-sm">
                                 <option value="">Sélectionner</option>
                                 <option value="envoyé">Envoyé</option>
                                 <option value="reçu">Reçu</option>
                                 <option value="retiré">Retiré</option>
                                 </select>
                                 </td>
                                 <td rowspan="1" colspan="1">
                                    <!-- <div class="margin-bottom-5">
                                       <button class="btn btn-sm btn-success filter-submit margin-bottom">
                                       <i class="fa fa-search"></i> Recherche.</button>
                                    </div> -->
                                    <button class="btn btn-sm btn-default filter-cancel refresh">
                                    <i class="fa fa-times"></i> Rafraîchir.</button>
                                 </td>
                              </tr>
                           </thead>
                        </table>
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div id="content">
                     <!-- Begin: Table articles -->
                     <div class="portlet portlet light portlet-fit portlet-datatable bordered">
                        <div class="portlet-title">
                           <div class="actions" style="float:right;margin-top:15px;margin-right:2%;">
                              <a href="#" id="nouveau_passager" style="" class="btn btn btn-primary" data-toggle="modal" data-target="#modal_user">
                              <i class="fa fa-plus"></i>
                              <span class="hidden-xs"> Nouveau </span>
                              </a>
                              <a href="Javascript:;" id="voir-article" style="display: none;" class="btn btn btn-default">
                              <i class="fa fa-eye"></i>
                              <span class="hidden-xs"> Voir </span>
                              </a>
							  <a href="Javascript:;" id="btn_update" style="display: none;" class="btn btn btn-info">
                              <i class="fa fa-update"></i>
                              <span class="hidden-xs"> Modifier </span>
                              </a>
                              <a href="javascript:;" style="display:none;" id="list-delete-colis" class="btn btn btn-danger" data-toggle="confirmation" data-original-title="Etes vous sûre ?" title="">
                              <i class="fa fa-trash"></i>
                              <span class="hidden-xs"> Supprimer </span>
                              </a>
                           </div>
                        </div>
                        <div class="portlet-body">
                           <div class="table-container">
                              <table class="display responsive no-wrap table table-striped table-bordered table-hover table-checkable order-column dataTable no-footer" id="tableColis" width="100%">
                                 <thead>
                                    <tr>
                                       <th>&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                       <th>Réference</th>
                                       <th>Date d'envoi</th>
                                       <th>Type</th>
                                       <th>Contenu</th>
                                       <th>Etat</th>
                                       <th>Valeur</th>
                                       <th>Montant</th>
									   <th>id</th>
                                    </tr>
                                 </thead>
                              </table>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
         </div>
         </section> 
		 </div>
         <!-- /.content -->
      </div>
      <!-- /.content-wrapper -->
      <!-- Modal detail utilisateur   -->
      <div class="modal fade"  id="modal_user" style="display: none;">
         <div class="modal-dialog" style="width:80%;">
            <div class="modal-content">
               <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">×</font></font></span></button>
                  <h4 class="modal-title"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Enregistrement d'un colis</font></font></h4>
               </div>
               <div class="modal-body">
                  <form action ="<?php echo base_url().'index.php/add_colis' ?>" method="post" role="form">
                     <!-- Small boxes (Stat box) -->
                     <div class="row">
                        <div class="col-md-12"></div>
                        <div class="box box-primary col-md-4" >
                           <div class="box-header with-border">
                              <h3 class="box-title"></h3>
                              <div class="box-footer"  style="float:right;">
                                 <button type="submit" class="btn btn-success">Valider</button> 
                                 <button type="reset" class="btn btn-default" data-dismiss="modal">Annuler</button>
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
                                                      <input id="date_ajout" name="date_ajout" size="21" type="text" class="forms" readonly>
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
                                                      <input id="ref" class="forms" name="ref" size="21" type="text" >
													  <input id="id_colis" type="hidden" name="id_colis" value="">
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
                                                      <select name="type_colis" class="forms" id="type_colis">
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
                                                <label class="col-md-4 col-form-label">¨Contenu</label>
                                                <div class="col-md-8">
                                                   <div class="input-group">
                                                      <textarea name="remarque" id="contenu_colis" style="width:250px; height: 68px;" required></textarea> 
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
                                                      <select name="lieu_reception" class="forms" id="lieu_reception">
                                                         <option selected>Choisissez</option>
                                                         <?php if($gare): ?>
                                                         <?php foreach($gare as $dest): ?>
                                                         <option value="<?php echo $dest["id_gare"];?>" ><?php echo $dest["lib_gare"];?></option>
                                                         <?php endforeach ?>
                                                         <?php endif ?>
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
                                                      <input type="text" id="pass" name ="pass" required class="forms" value=''> 
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
                                                      <input type="text" id="valeur_colis" name ="valeur" required class="forms"  onChange="majuscule(this);"> 
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                          <div class="col-md-12 frm" style="margin-bottom:1%;">
                                             <div class="form-group">
                                                <label class="col-md-3 col-form-label">Montant</label>
                                                <div class="col-md-9">
                                                   <div class="input-group">
                                                      <input type="text" id="montant_colis" name ="montant" required class="forms"  onChange="majuscule(this);"> 
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
                                                         <input class="forms" name="nom_exp" type="text" required value="" id="nom_exp" onChange="majuscule(this);">
														 <input id="id_expediteur" type="hidden" name="id_expediteur" value="">
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="col-md-12 frm" style="margin-bottom:1%;">
                                                <div class="form-group">
                                                   <label class="col-md-3 col-form-label">Prénom</label>
                                                   <div class="col-md-9">
                                                      <div class="input-group">
                                                         <input type="text" id="prenom_exp" name ="prenom" required class="forms" value='' onChange="majuscule(this);"> 
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="col-md-12 frm" style="margin-bottom:1%;">
                                                <div class="form-group">
                                                   <label class="col-md-3 col-form-label">Mobile</label>
                                                   <div class="col-md-9">
                                                      <div class="input-group">
                                                         <input type="text" id="mobile_exp" name ="mobile" required class="forms" value=''> 
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="col-md-12 frm" style="margin-bottom:1%;">
                                                <div class="form-group">
                                                   <label class="col-md-3 col-form-label">Nature pièce</label>
                                                   <div class="col-md-9">
                                                      <div class="input-group">
                                                         <select name="nat_piece" class="forms" id="nat_piece">
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
                                                         <input type="text"  name ="nat_pieces" class="forms" value=''> 
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="col-md-12 frm" style="margin-bottom:1%;">
                                                <div class="form-group">
                                                   <label class="col-md-3 col-form-label">N° pièce</label>
                                                   <div class="col-md-9">
                                                      <div class="input-group">
                                                         <input type="text" id="num_piece" name ="num_piece" required class="forms" value=''> 
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
                                                         <input class="forms" name="nom_dest" type="text" required value="" id="nom_dest" onChange="majuscule(this);">
														 <input id="id_destinataire" type="hidden" name="id_destinataire" value="">
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="col-md-12 frm" style="margin-bottom:1%;">
                                                <div class="form-group">
                                                   <label class="col-md-3 col-form-label">Prénom</label>
                                                   <div class="col-md-9">
                                                      <div class="input-group">
                                                         <input type="text" id="prenom_dest" name ="prenom_dest" required class="forms" value='' onChange="majuscule(this);"> 
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="col-md-12 frm" style="margin-bottom:1%;">
                                                <div class="form-group">
                                                   <label class="col-md-3 col-form-label">Mobile</label>
                                                   <div class="col-md-9">
                                                      <div class="input-group">
                                                         <input type="text" id="dest_mobile" name ="mobile_dest" required class="forms" value=''> 
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
            </div>
            <!-- /.modal-content -->
         </div>
         <!-- /.modal-dialog -->
      </div>
      <!--  Fin du modal Colis-->
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
                                    <input type="text" id="valeur" name ="valeur" required class="forms" value=''> 
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
                                    <input type="text" id="montant" name ="montant" required class="forms" value=''> 
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
                                 <th>
                                    <center>Contenu</center>
                                 </th>
                                 <th>
                                    <center>Valeur</center>
                                 </th>
                                 <th>
                                    <center>Montant</center>
                                 </th>
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
      <!-- Fin modal msg -->
	  <!-- modal message suppression-->
	 <div class="modal fade" id="msg_delete" style="display: none;">
         <div class="modal-dialog" style="width:200px;">
            <div class="modal-content">
               <div class="modal-body">
                  <p>Voulez-vous supprimer ?</p>
			   </div>
			   <div class="modal-footer">
                  <button type="button" class="btn btn-default pull-left" data-dismiss="modal"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Non</font></font></button>
                  <button id="valider_delete" type="button" class="btn btn-success fa fa-check"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></button>
               </div>
			</div>
		 </div>
      </div>
	  <!-- Fin modal message suppression -->
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
         $(document).ready(function(e){ 
          
          let listColis =  $("#tableColis").DataTable({
         				"processing": true,
         				"serverSide": true,
         			    "select": true,
         				 buttons: [{
         			            extend: "print",
         			            text: "imprimer",
         			            className: "btn btn-good mt-ladda-btn ladda-button btn-secondary",
         			            title: "Liste des passager",
         			            exportOptions: {
         		                    columns: ':visible'
         		                }
         			        }, {
         			            extend: "pdf",
         			            className: "btn btn-good mt-ladda-btn ladda-button btn-danger ",
         			            title: "Liste des passager",
         			            exportOptions: {
         		                    columns: ':visible'
         		                }
         			        }, {
         			            extend: "excel",
         			            className: "btn btn-snap mt-ladda-btn ladda-button btn-success ",
         			            title: "Liste des passager",
         			            exportOptions: {
         		                    columns: ':visible'
         		                }
         			        }],
         
         			    "rowCallback": function(row, data, dataIndex) {
         			        
         			        if(data.statut == "false") { 
         			        
         			            listPassager.row(dataIndex).remove().draw();
         			        }
         			    },
         			    "ajax": {
         			    	"url": "<?php echo base_url() . "index.php/ControllerColis/list_colis_json" ?>",
         			    	"type": "POST"
         			    	  },
         			    "columnDefs": [ 
         				    {
         				        "orderable": false,
         				        "className": 'select-checkbox',
         				        "targets":   0
         				    },
         				  /*
         				    {
         				    	"targets": [7, 8, 9],
         		                "visible": false
         		                
         					},*/
         				    {
         				    	"targets": [8],
         		                "visible": false
         		                
         				    },
         				    {
         				    	"targets": "_all",
         				    	"createdCell": function(td, cellData, rowData, col) {
         						    	
         				    		$(td).attr("align", "center");
         				    	}
         				    }
         			    ],
         				"order": [ 8, 'desc' ],
         			 
         			    "select": {
         			        "style":'multi'				       
         			    },				 
         			   /* "drawCallback": function( settings ) {
         			        $("#list-delete-colis").fadeOut(200);
         			        $("#voir-article").fadeOut(200);
         			    }, */
         			    "dom": "<'row' <'col-md-12'B>><'row'<'col-md-6 col-sm-12'l><'col-md-6 col-sm-12'f>r><'table-scrollable't><'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12'p>>",
         			    "columns": [
         			    	{"data": "checkbox"},
         					{"data": "ref_colis"},
         					{"data": "date_create"},
         					{"data": "lib_type_colis"}, 	
         					{"data": "description"},
         					{"data": "etat"},
         					{"data": "valeur"},
         					{"data": "montant"},
							 {"data": "id_colis"}						
         				],
         				"lengthMenu": [[10, 15, 20, -1], [10, 15, 20, "All"]],
         			    "language": {
         			        "sProcessing":     "Traitement en cours...",
         					"sSearch":         "Rechercher&nbsp;:",
         				    "sLengthMenu":     "Afficher _MENU_ &eacute;l&eacute;ments",
         					"sInfo":           "Affichage de l'&eacute;l&eacute;ment _START_ &agrave; _END_ sur _TOTAL_ &eacute;l&eacute;ments",
         					"sInfoEmpty":      "Affichage de l'&eacute;l&eacute;ment 0 &agrave; 0 sur 0 &eacute;l&eacute;ments",
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
         			    }
         
         
         			    
         			}); // end of passager Datatables 
         
         			//
         			
         			let numberRows = 0;
         			listColis
         				.on( 'select', function ( e, dt, type, indexes ) {
         					$("#list-delete-colis").fadeIn(200);
         					numberRows = listColis.rows({selected: true}).count();
         					if(numberRows === 1) {
         						$("#voir-article").fadeIn(200);
								 $("#btn_update").fadeIn(200);
         					}else{
         						$("#voir-article").fadeOut(200);
								 $("#btn_update").fadeOut(200);
         					}
         					
         				} )
         				.on( 'deselect', function ( e, dt, type, indexes ) {
         					numberRows = listColis.rows({selected: true}).count();
         					if(numberRows == 0) {
         					$("#list-delete-colis").fadeOut(200);
         					}
         					if(numberRows !== 1) {
         						$("#voir-article").fadeOut(200);
								 $("#btn_update").fadeOut(200);
								 
         					}else{
         						$("#voir-article").fadeIn(200);
								 $("#btn_update").fadeIn(200);
         					}
         				
         				} );

					//affichage du message de suppression
					$("#list-delete-colis").on("click",function(){
						$("#msg_delete").modal("show")
					})
                    // function de suppression
         			$('#valider_delete').on("click", function(){
         					let i = 0;
         					let selectedIds = [];
         					listColis.rows({selected : true}).data().each(function(row){
         						selectedIds[i] = row["DT_RowId"].slice(4);
         						i++;
         					});
         					
         				//console.log(selectedIds)
         					listColis.rows({selected : true}).deselect();
         
         					$.ajax({
         						dataType: "json",
         						url: "delete_colis",
         						type: 'POST',
         						data: {
         							selected : selectedIds
         						}
         						})
         
         						.done(function(data){
									$("#msg_delete").modal("hide")
									location.reload(true);
         							
         						})
         						.fail(function( jqXHR, textStatus, errorThrown){
         
         						
         							
         						}); //ajax deleting colis
         
         
         				
         			}); //delete colis
         
         			$("#voir-article").on("click", function(e){
         				let id_art = listColis.row({selected: true}).data().DT_RowId.slice(4);
						 //console.log(id_art)
         				 window.location.href = '<?php echo base_url() . "index.php/voir/"; ?>' + id_art;
         				
         			})
         
         			
         			function checkForEmptyVal(v1, v2) {
         				search = v1 + '-' + v2;
         				if((v1 === "" || v2 === "") && search != "-" ) {
         					return true; 
         				}else{
         					return false;
         				}
         			}
                    //  $('#colis_to').on('blur', function(){
					//    let	i  = $("input[name='colis_from']").attr('data-column');
					//    let v1 = $("input[name='colis_from']").val();
					//    let v2 = $("input[name='colis_to']").val();
					//    listColis.columns(i).search(v1 + "-" + v2).draw();
					//    console.log("de "+v1+" "+"à "+v2)
					// //    if(checkForEmptyVal(v1, v2))
					// // 	   {
					// // 		alert('Veuillez remplir correctement les champs reçevant les valeurs "de...à..."')
					// // 	   }else{
					// // 		listColis.columns(i).search(v1 + "-" + v2).draw();
					// //    }
					   
					//  })

					let searchEtats = "<?php echo $etat; ?>";


					if(searchEtats){
                        //console.log(searchEtats)
						listColis.columns(5).search(searchEtats);
						listColis.draw();
					
					}


					//}
                     $('.search-input-text').on( 'keyup click', function () {   // for text boxes
         			let i =$(this).attr('data-column');  // getting column index
         			let v =$(this).val();  // getting search input value
         			listColis.columns(i).search(v).draw();
         			} );

         			$('.form-filter').on( 'change', function () {   // for select box
         				let i =$(this).attr('data-column');
         				let v =$(this).val();
         				listColis.columns(i).search(v).draw();
         			} );
         			$(".refresh").on("click", function(e){
         				
         			$(".filter").find("input").val("");
         			$('.select-filter option').filter(function() { 
         				return ($(this).text() == 'Select...'); //To select Blue
         			}).prop('selected', true)
         			listColis.columns().search("");
         			listColis.draw();
         
         
         			})

						$("#type_colis").on("change", function(){
						//let value = $(this).val();
						let type = $(this).find(":selected").text();
						if(type=="Autre")
						{
							$("#modal_colis").modal().show();
							$("#contenu").focus()
						}
					})
						let valeur_colis =0
						let montant_colis=0
						let contenu_colis ="";
					$("#add_contenu").on("click", function(){
						if($.isNumeric($("#valeur").val()) && $.isNumeric( $("#montant").val())){
							contenu = $("#contenu").val()
							valeur = parseInt($("#valeur").val())
							montant = parseInt($("#montant").val())
						console.log(montant)
						$('#tab_contenu tr:last').after('<tr class="delete"> <td><center>'+contenu+'<c/enter></td><td><center>'+valeur+'</center></td><td><center>'+montant+'</center></td><td><button id="btn_delete" class="btn btn-xs fa fa-trash-o" onclick="deleteRow(this)"></button></td></tr>');
						valeur_colis = valeur_colis + valeur
						montant_colis = montant_colis + montant
						contenu_colis = contenu_colis+" "+contenu
						$("#contenu").focus()
						$("#contenu").val("")
						$("#valeur").val("")
						$("#montant").val("")
						//console.log(montant_colis+" "+valeur_colis)
						}else{
							
							$("#message_erreur").modal().show();
							setTimeout(function() {$('#message_erreur').modal('hide');}, 3000);
							$("#valeur").focus()
						}
						
					})

					$("#enregistrer").on("click", function(){
						if(valeur_colis && montant_colis)
						if($.isNumeric(valeur_colis) && $.isNumeric(montant_colis)){
						$("#valeur_colis").val(valeur_colis)
						$("#montant_colis").val(montant_colis)
						$("#contenu_colis").val(contenu)
						$("#modal_colis").modal('hide');
						}else{
							setTimeout(function() {$('#message_erreur').modal('hide');}, 3000);
							$("#valeur").focus()
						}
					})
					
					$("#nat_piece").on("change",function(){
						let type = $(this).find(":selected").text();
						// console.log(type)
						if(type=="AUTRE")
						{
							$("#nature_piece").fadeIn();
						}else{
							$("#nature_piece").fadeOut();
						}
					})

					// Action sur le bouton de modification

		$("#btn_update").on("click",function(){
			let idColis = listColis.row({selected:true}).data().DT_RowId.slice(4);
				console.log(idColis)
			let url ='<?php echo base_url()."index.php/ControllerColis/get_colis_update";?>';

			$.ajax({
				dataType:"json",
				url:url,
				type:"POST",
				data:{id:idColis}
			}).done(function(data){
				console.log(data[0]["id_colis"]) 
				$("#modal_user").modal("show")
				$("#id_colis").val(data[0]["id_colis"])
				$("#id_expediteur").val(data[0]["id_expediteur"])
				$("#id_destinataire").val(data[0]["id_destinataire"])
				$("#date_ajout").val(data[0]["date_create"])
				$("#contenu_colis").val(data[0]["description"])
				$("#num_depart").val(data[0]["id_expediteur"])
				$("#type_colis").val(data[0]["id_type_colis"])
				$("#lieu_reception").val(data[0]["lieu_reception"])
				$("#montant_colis").val(data[0]["montant"])
				$("#pass").val(data[0]["passe"])
				$("#ref").val(data[0]["ref_colis"])
				$("#valeur_colis").val(data[0]["valeur"])
				$("#nat_piece").val(data[0]["nature_piece_expediteur"])
				$("#num_piece").val(data[0]["num_piece_expediteur"])
				$("#dest_mobile").val(data[0]["mobile_destinataire"])
				$("#nom_dest").val(data[0]["nom_destinataire"])
				$("#prenom_dest").val(data[0]["prenom_destinataire"])
				$("#mobile_exp").val(data[0]["mobile_expediteur"])
				$("#nom_exp").val(data[0]["nom_expediteur"]	)	
				$("#prenom_exp").val(data[0]["prenom_expediteur"])
				let id_gare = data[0]["id_gare"]
				$("#gare option[value="+id_gare+"]").prop('selected', true);
				if(data[0]["type_passager"]=="normal"){
					$("#normal").attr('checked', 'checked');
				}else{
					$("#privilegie").attr('checked', 'checked');
				}
				
			}).fail(function(){
				console.log("failed")
			})
		})
         // 

				$("#btn_delete").on("click", function(e){
					console.log("ok")
				})  

				 $("#date_ajout,.date-picker").datepicker({
					format: 'dd/mm/yyyy',
					setDate: new Date(),
					useCurrent: false,
					autoclose: true,
					todayBtn: true,
					pickerPosition: "bottom-left",
					language: 'fr'
					})
					.on('hide', function(e) {
						
					   let	i  = $("input[name='colis_from']").attr('data-column');
					   let v1 = $("input[name='colis_from']").val();
					   let v2 = $("input[name='colis_to']").val();
					   console.log(v1+" "+v2+" "+i)
					   listColis.columns(i).search(v1 + "-" + v2).draw();
	                });
      
         })
		
		 function deleteRow(btn) {
			var row = btn.parentNode.parentNode;
			row.parentNode.removeChild(row);
			}	
      </script>
   </body>
</html>
