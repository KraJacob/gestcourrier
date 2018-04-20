<?php
  //ITEMS AJOUT
   define ('AJOUT_ARTICLE', 0x01); 
  define ('AJOUT_CATEGORIE', 0x02); 
  define ('AJOUT_UNITE', 0x04);
  define ('AJOUT_REGLE', 0x08);
  define ('AJOUT_MOUVEMENT', 0x10); 
  define ('AJOUT_REBUT', 0x20); 
  define ('AJOUT_INVENTAIRE', 0x40);
  define ('AJOUT_FOURNISSEUR', 0x80);
  define ('AJOUT_CLIENT', 0x100); 
  define ('AJOUT_UTILISATEUR', 0x200); 
  define ('AJOUT_PRIVILEGE', 0x400); 
   //ITEMS MODIFICATION
   define ('MODIFIER_ARTICLE', 0x01); 
  define ('MODIFIER_CATEGORIE', 0x02); 
  define ('MODIFIER_UNITE', 0x04);
  define ('MODIFIER_REGLE', 0x08);
  define ('MODIFIER_INVENTAIRE', 0x40);
  define ('MODIFIER_FOURNISSEUR', 0x80);
  define ('MODIFIER_CLIENT', 0x100); 
  define ('MODIFIER_UTILISATEUR', 0x200); 
  define ('MODIFIER_PRIVILEGE', 0x400);
  define ('MODIFIER_ENTREPRISE', 0x800);
  // ITEMS SUPPRESSION
   define ('SUPPRIMER_ARTICLE', 0x01); 
  define ('SUPPRIMER_CATEGORIE', 0x02); 
  define ('SUPPRIMER_UNITE', 0x04);
  define ('SUPPRIMER_REGLE', 0x08);
  define ('SUPPRIMER_INVENTAIRE', 0x40);
  define ('SUPPRIMER_FOURNISSEUR', 0x80);
  define ('SUPPRIMER_CLIENT', 0x100); 
  define ('SUPPRIMER_UTILISATEUR', 0x200); 
  define ('SUPPRIMER_PRIVILEGE', 0x400);
  // ITEMS LISTE
   define ('LISTER_ARTICLE', 0x01); 
  define ('LISTER_CATEGORIE', 0x02); 
  define ('LISTER_UNITE', 0x04);
  define ('LISTER_REGLE', 0x08);
  define ('LISTER_MOUVEMENT', 0x10); 
  define ('LISTER_REBUT', 0x20); 
  define ('LISTER_INVENTAIRE', 0x40);
  define ('LISTER_FOURNISSEUR', 0x80);
  define ('LISTER_CLIENT', 0x100); 
  define ('LISTER_UTILISATEUR', 0x200);
  define ('VOIR_HISTORIQUE', 0x400); 
  define ('LISTER_PRIVILEGE', 0x800);
  define ('VOIR_ENTREPRISE', 0x1000);
  // PAGES
  define ('PAGE_CONFIGURATION', 0x01); 
  define ('PAGE_APPLICATION', 0x02);
  define ('PAGE_LOGI_STOCK', 0x04);
 
?>
<!-- <?php // include_once('./application/controllers/constante_privilege.php'); ?> -->
<div class="page-header md-shadow-z-1-i navbar navbar-fixed-top bg-blue-chambray bg-font-blue-chambray">
	<!-- BEGIN HEADER INNER -->
	<div class="page-header-inner">
		<!-- BEGIN LOGO -->
		<div class="page-logo">
			<a style="display: none;"> href="<?php echo base_url() . 'index.php/welcome'; ?>">
				<img width=""  src="<?php echo img_url('logo.png'); ?>" alt="logo" class="logo-default"/>
			</a>
			<div class="menu-toggler sidebar-toggler">
				<!-- DOC: Remove the above "hide" to enable the sidebar toggler button on header -->
			</div>
		</div>
		<!-- END LOGO -->
		<!-- BEGIN RESPONSIVE MENU TOGGLER -->
		<a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
		</a>
		<!-- END RESPONSIVE MENU TOGGLER -->
		<div class="page-actions">
			<div class="btn-group">

				<?php if(((int)$this->session->userdata('items_page') & PAGE_APPLICATION) || ($this->session->userdata('userright')=="Admin")): ?>

				<a class="btn-header <?php echo  $header == 'applications' ? 'header-active' : ''  ?> btn btn-xs "  href="<?php echo base_url() . "index.php/produits" ?>" <?php echo  $header == 'applications' ? 'disabled' : ''  ?>>
				<span class="hidden-xs hidden-xs">Applications  &nbsp;</span></a>
                <?php endif ?>
				<?php if(((int)$this->session->userdata('items_page') &  PAGE_LOGI_STOCK)|| ($this->session->userdata('userright')=="Admin")): ?>

				<a class="btn-header <?php echo  $header == 'logistock' ? 'header-active' : ''  ?> btn btn-xs "  href="<?php echo base_url() . "index.php/welcome" ?>" <?php echo  $header == 'logistock' ? 'disabled' : ''  ?>>
				<span class="hidden-xs hidden-xs">Logistock  &nbsp;</span></a>
				<?php endif ?>
				<?php if(((int)$this->session->userdata('items_page') & PAGE_CONFIGURATION)|| ($this->session->userdata('userright')=="Admin")): ?>

				<a class="btn-header <?php echo  $header == 'configuration' ? 'header-active' : ''  ?> btn btn-xs "  href="<?php echo base_url() . "index.php/configuration" ?>" <?php echo  $header == 'configuration' ? 'disabled' : ''  ?>>
				<span class="hidden-xs hidden-xs">Configuration &nbsp;</span></a>
				<?php endif ?>
			</div>
		</div>
		<!-- BEGIN PAGE TOP -->
		<div class="page-top">
			<!-- BEGIN TOP NAVIGATION MENU -->
			<div class="top-menu">
				<ul class="nav navbar-nav pull-left">
					<li class="separator hide"></li>
				</ul>
				<ul class="nav navbar-nav pull-right">
					<li class="separator hide">
					</li>
					<!-- BEGIN NOTIFICATION DROPDOWN -->
					<!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
					<li style="display: none;" class="dropdown dropdown-extended dropdown-notification dropdown-dark" id="header_notification_bar">
						<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
							<i class="icon-bell"></i>
						<span class="badge badge-success">
						7 </span>
						</a>
						<!-- <ul class="dropdown-menu">
							<!- <li class="external">
								<h3><span class="bold">12 pending</span> notifications</h3>
								<a href="#">view all</a>
							</li> 
							<li>
								<ul class="dropdown-menu-list scroller" style="height: 250px;" data-handle-color="#637283">
									<li>
										<a href="javascript:;">
											<span class="time">just now</span>
										<span class="details">
										<span class="label label-sm label-icon label-success">
										<i class="fa fa-plus"></i>
										</span>
										New user registered. </span>
										</a>
									</li>
								</ul>
							</li>
						</ul> -->
					</li>
					<!-- END NOTIFICATION DROPDOWN -->
					<li class="separator hide">
					</li>
					<!-- BEGIN INBOX DROPDOWN -->
					<!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
					<?php if(((int)$this->session->userdata('items_lister') & LISTER_ARTICLE) || ($this->session->userdata('userright')=="Admin")): ?>			
							<?php 
							$alerte = 0;

							  if(null!==$this->session->userdata('msgStockBas'))
							  {
                                $alerte = $alerte +1;
							  }
							  if(null!==$this->session->userdata('msgArtExp'))
							  {
								$alerte = $alerte +1;
							  }
							  if(null!==$this->session->userdata('msgExpireProche'))
							  {
								$alerte = $alerte +1; 
							  }
							  if(null!==$this->session->userdata('msgStockMax'))
							  {
								$alerte = $alerte +1; 
							  }

						?>
					<li style="" class="dropdown dropdown-extended dropdown-inbox dropdown-dark" id="header_inbox_bar">
						<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
							<i class="icon-bell"></i>
						<span class="badge badge-danger">
						<?php echo  $alerte; ?> </span>
						</a>
						<ul class="dropdown-menu">
								<!-- <li class="external"> -->
								<!-- <span class="bold"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">12</font></font></span><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> notifications en </font><span class="bold"><font style="vertical-align: inherit;">attente</font></span></font></h3>
								<a href="page_user_profile_1.html"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Voir tout</font></font></a> -->
							<!-- </li> -->
							<li>
								<div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height:auto;">
								<ul class="dropdown-menu-list scroller" style="height: auto; overflow: hidden; width: auto;" data-handle-color="#637283" data-initialized="1">
								 <?php  
								//if(null!==$this->session->userdata('msgStockBas') || null!==$this->session->userdata('msgArtExp') || null!==$this->session->userdata('msgExpireProche')):?>
									<?php if(null!==$this->session->userdata('msgExpireProche')): ?>
									<li>
										<a href="<?php echo site_url('Login/articleExpireProche') ?>">
										<span class="label label-sm label-icon label-primary">
													<i class="fa fa-warning"></i>
												</span>
											<span class="time"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><?php print_r($this->session->userdata('msgExpireProche')); ?></font></font></span> </br>
											<?php 
											$tabartexpProch = $this->session->userdata('tabexpProche');
											foreach($tabartexpProch as $tab):?>
											<span class="details">
												
												<font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> <?php  echo $tab[0]."  expire le ".date('d/m/Y',$tab[3])."<br>"; ?> </font></font></span>
							        	<?php endforeach ?>

										</a>
									</li>
                                    <?php endif  ?>
									<?php if(null!==$this->session->userdata('msgArtExp')):?>
									<li>
										<a href="<?php echo site_url('Login/articleExp') ?>">
										<span class="label label-sm label-icon label-danger">
													<i class="fa fa-warning"></i>
												</span>
											<span class="time"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><?php print_r($this->session->userdata('msgArtExp'));
												?></font></font></span></br>
												<?php 
												$tabartexp = $this->session->userdata('tabartexp');
												foreach($tabartexp as $tab): ?>
											<span class="details">
												
												<font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> <?php  echo $tab[1]." ajouté le ".$tab[3]."</br>"; ?> </font></font></span>
												<?php endforeach ?>
											
										</a>
										
									</li>
									<?php endif ?>
									<?php if(null!==$this->session->userdata('msgStockBas')):?>
									<li>
										<a href="<?php echo site_url('Login/AlerteStock') ?>">
										<span class="label label-sm label-icon label-warning">
													<i class="fa fa-bell-o"></i>
												</span>
											<span class="time"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><?php print_r($this->session->userdata('msgStockBas')); ?></font></font></span></br>
											<?php 
											$tabstockA = $this->session->userdata('tabStock');
											foreach($tabstockA as $tab):?>
											<span class="details">
												
												<font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><?php  echo $tab[1]."</br>"; ?> </font></font></span>
												<?php endforeach ?>
										</a>
									</li>
									<?php endif ?>
									<?php if(null!==$this->session->userdata('tabStockMax')):?>
									<li>
										<a href="<?php echo site_url('Login/load_stock_max') ?>">
										<span class="label label-sm label-icon label-warning">
													<i class="fa fa-bell-o"></i>
												</span>
											<span class="time"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><?php print_r($this->session->userdata('msgStockMax')); ?></font></font></span></br>
											<?php 
											$tabStockMax = $this->session->userdata('tabStockMax');
											foreach($tabStockMax as $tab):?>
											<span class="details">
												
												<font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><?php  echo $tab[0]."</br>"; ?> </font></font></span>
												<?php endforeach ?>
										</a>
									</li>
									<?php endif ?>
									<?php// else: ?>   
									<!-- <li>
                                              
                                     <span class="time"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Vous n'avez aucun message</font></font></span>
                                                    
                                     </li> -->
									 <?php //endif ?>
								<div class="slimScrollBar" style="background: rgb(99, 114, 131); width: 7px; position: absolute; top: 0px; opacity: 0.4; display: none; border-radius: 7px; z-index: 99; right: 1px; height: 98.4252px;"></div><div class="slimScrollRail" style="width: 7px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(234, 234, 234); opacity: 0.2; z-index: 90; right: 1px;"></div></div>
							</li>
						</ul>
					</li>
					<?php endif ?>
					<!-- END INBOX DROPDOWN -->
					<!-- BEGIN USER LOGIN DROPDOWN -->
					<!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
					<li class="dropdown dropdown-user dropdown-dark">
						<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
							<?php //$session_nom = $this->session->userdata('nom'); ?>
							<?php //if ($session_nom): ?>
								<span class="username username-hide-on-mobile">
							
									<span style="foat:left"> <?php echo $this->session->userdata('username'); ?> </span>
						</span>
							<?php //endif ?>
							<!-- DOC: Do not remove below empty space(&nbsp;) as its purposely used -->
							<img alt="" class="img-circle" style="display: none;" ;src="<?php echo img_url('avatar9.jpg'); ?> "/>

							<span class="img-circle"></span>
						</a>
						<ul class="dropdown-menu dropdown-menu-default">
						<?php if($this->session->userdata('userright')!=0): ?>
							<li>
								<a href="<?php echo base_url() . "index.php/utilisateurs/profile/" . $this->session->userdata("user_id"); ?>">
									<i class="icon-user"></i> Profile </a>
								</a>
								
							</li>
						<?php endif ?>
							<li>
								<a href="<?php echo site_url('Login/logout') ?>">
									<i class="icon-key"></i> Deconnexion </a>
							</li>
						</ul>
					</li>
					<!-- END USER LOGIN DROPDOWN -->
					<!-- BEGIN USER LOGIN DROPDOWN -->
					<li style="display: none;" class="dropdown dropdown-extended quick-sidebar-toggler">
						<a href="<?php echo site_url('Deconnexion') ?>">
							<span class="sr-only">Déconnexion</span>
							<i class="icon-logout"></i> </a>
					</li>
					<!-- END USER LOGIN DROPDOWN -->
				</ul>
			</div>
			<!-- END TOP NAVIGATION MENU -->
		</div>
		<!-- END PAGE TOP -->
	</div>
	<!-- END HEADER INNER -->
</div>
<!-- END HEADER -->

 			