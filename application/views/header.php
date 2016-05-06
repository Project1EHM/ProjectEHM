<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>
<div class="wrapper">

      <header class="main-header">
        <!-- Logo -->
        <a href="index2.html" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>E</b>HM</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>Admin</b>EHM</span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="<?php echo base_url(); ?>assets/img/user3-160x160.jpg" class="user-image" alt="User Image">
                  <span class="hidden-xs"><?php echo $this->session->userdata('firstname');?> <?php echo $this->session->userdata('lastname'); ?></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="<?php echo base_url(); ?>assets/img/user3-160x160.jpg" class="img-circle" alt="User Image">
                    
                     <p><?php echo $this->session->userdata('firstname');?> <?php echo $this->session->userdata('lastname'); ?></p>
                    
                    
                  </li>
                  <!-- Menu Body -->
                  <li class="user-body">
                   
                  <!-- Menu Footer-->
                    <div class="pull-right">
                      <a href="<?php echo site_url('/useraccount/logout'); ?>" class="btn btn-default btn-flat">Sign out</a>
                    </div>
                  </li>
                </ul>
              </li>
              <!-- Control Sidebar Toggle Button -->
              
            </ul>
          </div>
        </nav>
      </header>