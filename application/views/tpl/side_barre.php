<!-- sidebar: style can be found in sidebar.less -->
<section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
        <div class="pull-left image">
            <img src="<?php echo base_url() . "assets/"; ?>dist/img/user.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
            <p><?php echo ($this->session->userdata("nom")) ? $this->session->userdata("nom") . " " . $this->session->userdata("prenom") : " "; ?></p>
            <a href="<?php echo base_url() . "index.php/dashboard"; ?>"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
    </div>
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">
        <?php if ($this->session->userdata("droit") == "caissier"): ?>
            <li class="">
                <a href="<?php echo base_url() . "index.php/dashboard"; ?>">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                    <span class="pull-right-container">
              <i class="pull-right"></i>
            </span>
                </a>
            </li>
        <?php endif ?>
        <?php if ($this->session->userdata("droit") == "superviseur"): ?>
            <li class="active" style="">
                <a href="<?php echo base_url() . "index.php/dashboard2"; ?>">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                    <span class="pull-right-container">
              <i class="pull-right"></i>
            </span>
                </a>
            </li>
        <?php endif ?>
        <?php if ($this->session->userdata("droit") == "caissier"): ?>
            <li>
                <a href="<?php echo base_url() . "index.php/reservation"; ?>">
                    <i class="fa fa-circle-o"></i> <span>Reservation</span>
                    <span class="pull-right-container">
              <small class="label pull-right bg-green"></small>
            </span>
                </a>
            </li>
        <?php endif ?>
        <?php if ($this->session->userdata("droit") == "caissier"): ?>
            <li>
                <a href="<?php echo base_url() . "index.php/voyage"; ?>">
                    <i class="fa fa-circle-o"></i> <span>Voyage</span>
                    <span class="pull-right-container">
              <small class="label pull-right bg-green"></small>
            </span>
                </a>
            </li>
        <?php endif ?>
        <?php if ($this->session->userdata("droit") == "caissier"): ?>
            <li>
                <a href="<?php echo base_url() . "index.php/bagage"; ?>">
                    <i class="fa fa-circle-o"></i> <span>Bagage</span>
                    <span class="pull-right-container">
              <small class="label pull-right bg-green"></small>
            </span>
                </a>
            </li>
        <?php endif ?>
        <?php if ($this->session->userdata("droit") == "caissier"): ?>
            <li>
                <a href="<?php echo base_url() . "index.php/colis"; ?>">
                    <i class="fa fa-envelope"></i> <span>Colis</span>
                    <span class="pull-right-container">
              <small class="label pull-right bg-green"></small>
            </span>
                </a>
            </li>
        <?php endif ?>
        <?php if ($this->session->userdata("droit") == "superviseur"): ?>
            <li>
                <a href="<?php echo base_url() . "index.php/users"; ?>">
                    <i class="fa fa-users"></i> <span>Utilisateurs</span>
                    <span class="pull-right-container">
              <small class="label pull-right bg-green"></small>
            </span>
                </a>
            </li>
        <?php endif ?>
        <?php if ($this->session->userdata("droit") == "superviseur"): ?>
            <li style="display:none;">
                <a href="<?php echo base_url() . "index.php/type_passager"; ?>">
                    <i class="fa fa-th"></i> <span>Type passager</span>
                    <span class="pull-right-container">
              <small class="label pull-right bg-green"></small>
            </span>
                </a>
            </li>
        <?php endif ?>
        <?php if ($this->session->userdata("droit") == "superviseur"): ?>
            <li>
                <a href="<?php echo base_url() . "index.php/type_personnel"; ?>">
                    <i class="fa fa-th"></i> <span>Type personnel</span>
                    <span class="pull-right-container">
              <small class="label pull-right bg-green"></small>
            </span>
                </a>
            </li>
        <?php endif ?>
        <?php if ($this->session->userdata("droit") == "superviseur"): ?>
            <li>
                <a href="<?php echo base_url() . "index.php/personnel"; ?>">
                    <i class="fa fa-group"></i> <span>Personnel</span>
                    <span class="pull-right-container">
              <small class="label pull-right bg-green"></small>
            </span>
                </a>
            </li>
            <li>
                <a href="<?php echo base_url() . "index.php/gare"; ?>">
                    <i class="fa fa-th"></i> <span>Gare</span>
                    <span class="pull-right-container">
              <small class="label pull-right bg-green"></small>
            </span>
                </a>
            </li>
        <?php endif ?>
        <?php if ($this->session->userdata("droit") == "superviseur"): ?>
            <li style="display:none;">
                <a href="<?php echo base_url() . "index.php/type_colis"; ?>">
                    <i class="fa fa-envelop"></i> <span>Type colis</span>
                    <span class="pull-right-container">
              <small class="label pull-right bg-green"></small>
            </span>
                </a>
            </li>
        <?php endif ?>
        <?php if ($this->session->userdata("droit") == "superviseur"): ?>
            <li>
                <a href="<?php echo base_url() . "index.php/add_vehicule"; ?>">
                    <i class="fa fa-bus"></i> <span>Véhicule</span>
                    <span class="pull-right-container">
              <small class="label pull-right bg-green"></small>
            </span>
                </a>
            </li>
        <?php endif ?>
        <?php if ($this->session->userdata("droit") == "caissier"): ?>
            <li>
                <a href="<?php echo base_url() . "index.php/passager"; ?>">
                    <i class="fa fa-group"></i> <span>Passager</span>
                    <span class="pull-right-container">
              <small class="label pull-right bg-green"></small>
            </span>
                </a>
            </li>
        <?php endif ?>
        <?php if ($this->session->userdata("droit") == "caissier"): ?>
            <li>
                <a href="<?php echo base_url() . "index.php/depenses"; ?>">
                    <i class="fa fa-money"></i> <span>Depense</span>
                    <span class="pull-right-container">
              <small class="label pull-right bg-green"></small>
            </span>
                </a>
            </li>
        <?php endif ?>
    </ul>
</section>
<!-- /.sidebar -->
