
 <!-- Logo -->
 <a href="<?php echo base_url()."assets/";?>index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>A</b>LT</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Gestion </b>de Courriers</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="<?php echo base_url()."assets/";?>#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->

          <!-- Notifications: style can be found in dropdown.less -->
          
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="<?php echo base_url()."assets/";?>#" class="dropdown-toggle" data-toggle="dropdown">
              <img src ="<?php echo base_url()."assets/";?>dist/img/user.png" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo ($this->session->userdata("nom")) ? $this->session->userdata("nom")." ".$this->session->userdata("prenom") : " "; ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src ="<?php echo base_url()."assets/";?>dist/img/user.png" class="img-circle" alt="User Image">

                <p>
                <?php echo ($this->session->userdata("nom")) ? $this->session->userdata("nom")." ".$this->session->userdata("prenom") : " "; ?>
                  <!-- <small>Member since Nov. 2012</small> -->
                </p>
              </li>
                <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="javascript:;" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="<?php echo base_url()."index.php/logout";?>" class="btn btn-default btn-flat">Déconnexion</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
        </ul>
      </div>
    </nav>
