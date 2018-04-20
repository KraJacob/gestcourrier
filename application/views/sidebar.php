
<!-- BEGIN SIDEBAR -->
	<div class="page-sidebar-wrapper">
		<div class="page-sidebar md-shadow-z-2-i  navbar-collapse collapse">
			<!-- BEGIN SIDEBAR MENU -->
			<ul class="page-sidebar-menu " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
				
				<li <?php echo $header == "logistock" ? "" : 'style="display: none"' ?> style="margin-top: 5px!important; border-bottom-style: inset;border-bottom-width: 3px;" id="logo-logistock">
					<img src="<?php echo base_url().'/assets/img/logistock.png'?> " class="img-responsive" style="padding: 10px 5px 10px 5px;">
				</li>
				
				<li <?php echo $header == "logistock" ? "" : 'style="display: none"' ?> style="margin-top: 5px!important;" id="dashboard" <?php if($page == 'dashboard') echo 'class="active"';?>>
					<a href="<?php echo base_url() . 'index.php/welcome'; ?>">
						<i class="icon-home"></i>
						<span class="title">Tableau de bord</span>
					</a>
				</li>

				<li <?php echo $header == "applications" ? "" : 'style="display: none"' ?> style="margin-top: 5px!important;" <?php if($page == 'produits') echo 'class="active"';?>>
					<a href="<?php echo base_url() . 'index.php/produits'; ?>">
						<i class="icon-doc"></i>
						<span class="title">Applications</span>
					</a>
				</li>

				<li <?php echo $header == "configuration" ? "" : 'style="display: none"' ?> style="margin-top: 5px!important;" <?php if($page == 'configuration') echo 'class="active"';?>>
					<a href="<?php echo base_url() . 'index.php/configuration/'; ?>">
						<i class="icon-home"></i>
						<span class="title">Tableau de bord</span>
					</a>
				</li>

				<li <?php echo $header == "logistock" ? "" : 'style="display: none"' ?> style="margin-top: 5px!important; display:none;" <?php if(($page == 'Transfert')) echo 'class="nav-item open"';?>>
					<a href="<?php echo base_url() . 'index.php/transfert'; ?>" class="nav-link nav-toggle">
						<i class="fa fa-exchange" aria-hidden="true"></i>
						<span class="title">Transfert</span>
						
					</a>
				</li>
				<?php if(((int)$this->session->userdata('items_lister') & LISTER_INVENTAIRE) || ($this->session->userdata('userright')=="Admin")): ?>
				<li <?php echo $header == "logistock" ? "" : 'style="display: none"' ?> style="margin-top: 5px!important;" <?php if(($page == 'Ajustement')) echo 'class="nav-item open"';?>>
					<a href="<?php echo base_url() . 'index.php/ajustements'; ?>" class="nav-link nav-toggle">
						<i class="glyphicon glyphicon-stats" aria-hidden="true"></i>
						<span class="title">Ajustement de Stock</span>
						
					</a>
				</li>
                <?php endif ?>
				<?php if(((int)$this->session->userdata('items_lister') & LISTER_REBUT) || ($this->session->userdata('userright')=="Admin")): ?>
				<li <?php echo $header == "logistock" ? "" : 'style="display: none"' ?> style="margin-top: 5px!important;" <?php if(($page == 'Rebut')) echo 'class="nav-item open"';?>>
					<a href="<?php echo base_url() . 'index.php/rebut'; ?>" class="nav-link nav-toggle">
						<i class=" icon-trash " aria-hidden="true"></i>
						<span class="title">Rebut</span>
						
					</a>
				</li>
                <?php endif ?>
				
				<li  style="display: none;"> <?php if(($page == 'planificateur')) echo 'class="nav-item open"';?>>
					<a data-toggle="modal" href="#basic2" class="nav-link nav-toggle">
						<i class=" fa fa-building " aria-hidden="true"></i>
						<span class="title">Lancer le planificateur</span>
						
					</a>
				</li>
				<?php if(((int)$this->session->userdata('items_lister') & LISTER_ARTICLE) || ($this->session->userdata('userright')=="Admin")): ?>
				  <li <?php echo $header == "logistock" ? "" : 'style="display: none"' ?> style="margin-top: 5px!important;" <?php if(($page == 'list_articles')) echo 'class="nav-item open"';?>>
					<a href="<?php echo base_url() . 'index.php/articles'; ?>" class="nav-link nav-toggle">
						<i class="icon-basket" aria-hidden="true"></i>
						<span class="title">Articles</span>
						
					</a>
					
				</li>
				<?php endif ?>
				<?php if(((int)$this->session->userdata('items_lister') & LISTER_MOUVEMENT) || ($this->session->userdata('userright')=="Admin")): ?>
				
				<li <?php echo $header == "logistock" ? "" : 'style="display: none"' ?> style="margin-top: 5px!important;" <?php if(($page == 'list_mouvements')) echo 'class="nav-item open"';?>>
					<a href="<?php echo base_url() . 'index.php/mouvements'; ?>" class="nav-link nav-toggle">
						<i class="fa fa-exchange" aria-hidden="true"></i>
						<span class="title">Entrée & Sortie de Stock</span>
						
					</a>
					
				</li>
                <?php endif ?>
				  <li <?php echo $header == "logistock" ? "" : 'style="display: none"' ?> style="display: none;"> <?php if(($page == 'Inventaire')) echo 'class="nav-item open"';?>>
					<a  data-toggle="modal" href="#basic1" class="nav-link nav-toggle">
						<i class="glyphicon glyphicon-list-alt" aria-hidden="true"></i>
						<span class="title">Inventaire</span>
						
					</a>
					
				</li>
                <?php if(((int)$this->session->userdata('items_lister') & LISTER_CLIENT) || ($this->session->userdata('userright')=="Admin")): ?>
				<li <?php echo $header == "logistock" ? "" : 'style="display: none"' ?> style="margin-top: 5px!important;" <?php if(($page == 'add_client') || ($page == 'listing_client') || ($page == 'liste') || ($page == 'listing_client')) echo 'class="nav-item open"';?>>
					<a  class="nav-link nav-toggle" href=<?php echo site_url('clients') ?>>
						<i class="icon-users" aria-hidden="true"></i>
						<span class="title">Clients</span>
					</a>
				</li>
	            <?php endif ?>
				<?php if(((int)$this->session->userdata('items_lister') & LISTER_FOURNISSEUR) || ($this->session->userdata('userright')=="Admin")): ?>

				<li <?php echo $header == "logistock" ? "" : 'style="display: none"' ?> style="margin-top: 5px!important;" <?php if(($page == 'add_fournisseurs') || ($page == 'listing_fournisseurs') || ($page == 'fournisseurs') || ($page == 'listing_fournisseurs')) echo 'class="nav-item open"';?>>
					<a  class="nav-link nav-toggle" href=<?php echo base_url().'index.php/fournisseurs' ; ?>>
						<i class="icon-users" aria-hidden="true"></i>
						<span class="title">Fournisseurs</span>
						
					</a>
        
				</li>
               <?php endif ?>
				
				<?php if(((int)$this->session->userdata('items_lister') & LISTER_UTILISATEUR) ||($this->session->userdata('userright')=="Admin")) : ?>
				<!-- Onglet Utilisateur  --> 
				<li <?php echo $header == "configuration" ? "" : 'style="display: none"' ?> style="margin-top: 5px!important;" <?php if(($page == 'add_user') || ($page == 'listing_user') || ($page == 'user') || ($page == 'listing_user')) echo 'class="nav-item open"';?>>
					<a href="<?php echo site_url('utilisateurs') ?>" class="nav-link nav-toggle">
						<i class="icon-users" aria-hidden="true"></i>
						<span class="title">Utilisateurs</span>
						<span class="<?php if(($page == 'add_user') || ($page == 'listing_user') || ($page == 'liste') || ($page == 'listing_client') ) echo "open";?>"></span>
					</a>
				</li>
			<?php endif ?>

				

				<li <?php if(($page == 'list_mouvements')) echo 'class="nav-item open"';?>>
					<a style="display:none" href="<?php echo base_url() . 'index.php/mouvements'; ?>" class="nav-link nav-toggle">
						<i class="fa fa-exchange" aria-hidden="true"></i>
						<span class="title">Mouvements</span>
						
					</a>
					
				</li>
				<?php if(((int)$this->session->userdata('items_lister') & VOIR_HISTORIQUE) || ($this->session->userdata('userright')=="Admin")): ?>
					<li <?php echo $header == "logistock" ? "" : 'style="display: none"' ?> style="margin-top: 5px!important;" <?php if(($page == 'historique') || ($page == 'listing_fournisseurs') || ($page == 'fournisseurs') || ($page == 'listing_fournisseurs')) echo 'class="nav-item open"';?>>
						<a  class="nav-link nav-toggle" href="<?php echo base_url() . 'index.php/historique'; ?>">
							<i class="fa fa-history" aria-hidden="true"></i>
							<span class="title">
								Historique des Activités             </span>
							
						</a>
			
					</li>
				<?php endif ?>

				<!-- <?php if($this->session->userdata('userright')=="Admin"): ?>
					<li style="display: none;"><?php if(($page == 'Commande') || ($page == 'Commande') || ($page == 'Commande') || ($page == 'listing_fournisseurs')) echo 'class="nav-item open"';?>>
						<a  class="nav-link nav-toggle" href="<?php echo base_url() . 'index.php/Commande'; ?>">
							<i class=" icon-basket " aria-hidden="true"></i>
							<span class="title">
								Liste des Commandes   </span>
						</a>
					</li>
				<?php endif ?> -->

				<li style="display: none;" <?php if($page == 'transactions') echo 'class="nav-item open"';?> style="display:none">
					<a href="javascript:;" class="nav-link nav-toggle">
						<i class="fa fa-exchange" aria-hidden="true"></i>
						<span class="title">Transactions</span>
						<span class="arrow <?php if($page == 'transactions') echo "open";?>"></span>
					</a>
					<ul class="sub-menu" <?php if($page == 'transactions') echo 'style="display: block;"';?>>
						<li class="nav-item  ">
						<li id="transactions" <?php if($page == 'transactions') echo 'class="active"';?>>
							<a href="<?php echo site_url('Transactions') ?>">
								<i class="fa fa-exchange"></i>
								<span class="title">Transactions</span>
							</a>
						</li>
						</li>

					</ul>

				</li>
				<?php if(((int)$this->session->userdata('items_lister') & LISTER_REGLE) || ($this->session->userdata('userright')=="Admin")): ?>

				<li <?php echo $header == "logistock" ? "" : 'style="display: none"' ?> style="margin-top: 5px!important;" <?php if(($page == 'appro')) echo 'class="nav-item open"';?>>
					<a href="<?php echo base_url() . 'index.php/list_regle'; ?>" class="nav-link nav-toggle">
						<i class=" icon-settings " aria-hidden="true"></i>
						<span class="title">Regles de réapprovisionnement</span>
						
					</a>
					
				</li>
				<?php endif ?>
				<li <?php echo $header == "configuration" ? "" : 'style="display: none"' ?> style="margin-top: 5px!important;" <?php if(($page == 'mon_entreprise')) echo 'class="nav-item open"';?>>
					<a href="<?php echo base_url() . 'index.php/entreprise' ?>" class="nav-link nav-toggle">
						<i class="fa fa-suitcase" aria-hidden="true"></i>
						<span class="title">Mon entreprise</span>
						
					</a>
					
				</li>
				<?php if(((int)$this->session->userdata('items_lister') & LISTER_CATEGORIE) || ($this->session->userdata('userright')=="Admin")): ?>
					
				<li <?php echo $header == "logistock" ? "" : 'style="display: none"' ?> style="margin-top: 5px!important;" <?php if(($page == 'categorie_list')) echo 'class="nav-item open"';?>>
					<a href="<?php echo base_url() . 'index.php/categories' ?>" class="nav-link nav-toggle">
						<i class="fa fa-th-list" aria-hidden="true"></i>
						<span class="title">Catégories d'articles</span>
						
					</a>
					
				</li>
				<?php endif ?>
				<li class="active" style="display:none">
					<a href="<?php echo site_url('Welcome/logout') ?>">
						<i class=" icon-logout"></i>
						<span class="title">Déconnexion</span>
					</a>
				</li>

				<?php if(((int)$this->session->userdata('items_lister') & LISTER_PRIVILEGE) || ($this->session->userdata('userright')=="Admin")): ?>
				<li <?php echo $header == "configuration" ? "" : 'style="display: none"' ?> style="" id="alertes" <?php if($page == 'privilege') echo 'class="active"';?>>
					<a href="<?php echo base_url() . 'index.php/liste_privilege' ?>">
						<i class="icon-lock"></i>
						<span class="title">Privilège</span>
					</a>
				</li>
				<?php endif ?>
				<?php if($this->session->userdata('userright')==0): ?>
				<li <?php echo $header == "configuration_sgci" ? "" : 'style="display: none"' ?> style="" id="alertes" <?php if($page == 'config_sgci') echo 'class="active"';?>>
					<a href="<?php echo base_url() . 'index.php/config_sgci' ?>">
					<i class="icon-home"></i>
						<span class="title">Tableau de bord</span>
					</a>
				</li>
				<?php endif ?>
			</ul>
			<!-- END SIDEBAR MENU -->
		</div>
	</div>
	<div class="modal fade" id="basic1" tabindex="-1" role="basic1" aria-hidden="true" style="display: none;">
	        <div class="modal-dialog">
	            <div class="modal-content">

	            	<?php echo form_open('Transfert/inventaire'); ?>
	            	 <div class="modal-header">

                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Rapport d'inventaire<span class="o_subtitle text-muted small"></span></h4>
            		</div>

            		 <div class="modal-body">

<div class="form-group" ">
				<label class="col-md-3 control-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Calculer</font></font></label>
				<div class="col-md-9">
					<div class="mt-radio-list">
						<label class="mt-radio">
							<input type="radio" name="Type" id="actuel" value="actuel" checked="true"  class="Type"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> Inventaire actuel
							</font></font><span></span>
						</label>
						<br>
						<label class="mt-radio">
							<input type="radio" name="Type" id="date_" value="date"  class="Type"><font style="vertical-align: inherit;" ><font style="vertical-align: inherit;">À une date spécifique
							</font></font><span></span>
						</label>
						
					</div>
				</div>
				<br>
				<br>
				<div class="form-group row date_fixe" style="display:none;">
						<label class="col-md-4 control-label">Inventaire à la date
						</label>
						<div class="col-md-4">
						<div class="input-group">
				<input type="text" name="date" value=" <?php  echo  date("Y-m-d / H:i:s") ;?> "  class="form-control" disabled>
						</div>
					</div>
						</div>
			</div>

           </div>
           <hr>
           <div class="modal-footer">
           	<div>
           		<footer>

           		<button type="submit" name="open_table"  class="btn btn-inventaire btn-sm btn-primary"> 
           			<span>Récuperer les quantités d'invantaire</span>
           		</button>

           		<button type="reset" class="btn btn-sm btn-default" data-dismiss="modal">
           			<span>Annuler</span>
           		</button>

           	</footer>
           	</div></div>
</form>
	            </div>
	            <!-- /.modal-content -->
	        </div>
	    </div>

	    <div class="modal fade" id="basic2" tabindex="-1" role="basic2" aria-hidden="true" style="display: none;">
	        <div class="modal-dialog">
	            <div class="modal-content">

	            	<?php echo form_open('Transfert/planificateur'); ?>
	            	 <div class="modal-header">

                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Lancer le planificateur<span class="o_subtitle text-muted small"></span></h4>
            		</div>

            		 <div class="modal-body">

						<div class="form-group" ">
					Quand vous lancez les planificateurs, Logistock essaie de réserver le stock disponible pour satisfaire les approvisionnements en cours et vérifie si des règles de réassort doivent être activées.
									</div>

           </div>
           <hr>
           <div class="modal-footer">
           	<div>
           		<footer>

           		<button type="button" name="open_table"  class="btn btn-sm btn-primary"> 
           			<span>Lancer le planificateur</span>
           		</button>

           		<button type="reset" class="btn btn-sm btn-default" data-dismiss="modal">
           			<span>Annuler</span>
           		</button>

           	</footer>
           	</div></div>
</form>
	            </div>
	            <!-- /.modal-content -->
	        </div>
	    </div>
	<!-- END SIDEBAR -->

	<script src="<?php echo plugins_url('jquery.min.js'); ?>" type="text/javascript">
      
        </script>

	<script type="text/javascript">
		$(".Type").on('change', function(e){
                let selectVal = $(this).val(); 
                if(selectVal == 'actuel'){
                    $(".date_fixe").hide();
                    
                }else{
                    $(".date_fixe").show();
                }
                
            });
	</script>