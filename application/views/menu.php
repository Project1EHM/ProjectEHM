<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>
 <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="<?php echo base_url(); ?>assets/img/user3-160x160.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <p><?php echo $this->session->userdata('firstname');?> <?php echo $this->session->userdata('lastname'); ?></p>
              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>
          <!-- search form -->
          
          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li></li>
            
             
            <li>
             
              <a href="<?php echo site_url('/useraccount/useraccount'); ?>">
                <i class="fa  fa-user"></i> <span>User Account</span> 
                <small class="label pull-right bg-green"></small>
              </a>
            </li>
              

            <li>
             
              <a href="<?php echo site_url('/useraccount/emergency'); ?>">
                <i class="fa  fa-warning"></i> <span>Emergancy</span> 
                <small class="label pull-right bg-green"></small>
              </a>
            </li>

           
            <li>
             
              <a href="<?php echo site_url('/useraccount/notify'); ?>">
                <i class="fa  fa-bell-o"></i> <span>Notify</span> 
                <small class="label pull-right bg-green"></small>
              </a>
            </li>

            
            <li>
             
              <a href="<?php echo site_url('/useraccount/friendlist'); ?>">
                <i class="fa  fa-users"></i> <span>FriendList</span> 
                <small class="label pull-right bg-green"></small>
              </a>
            </li>


            <li>
             
              <a href="<?php echo site_url('/useraccount/emer_call'); ?>">
                <i class="fa  fa-phone"></i> <span>EmergencyCall</span> 
                <small class="label pull-right bg-green"></small>
              </a>
            </li>
            </ul>
            
        </section>
        <!-- /.sidebar -->
      </aside>