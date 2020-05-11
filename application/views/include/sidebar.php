<?php 
$cur_tab = $this->uri->segment(2)==''?'dashboard': $this->uri->segment(2);  
?>  

  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?= base_url() ?>public/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?= ucwords($this->session->userdata('name')); ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
     
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li id="profile" class="treeview">
          <a href="#">
            <i class="fa fa-user"></i> <span>Profile</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li id="profile"><a href="<?= base_url('profile'); ?>"><i class="fa fa-circle-o"></i> profile</a></li>
          </ul>
        </li>
      </ul>

      <ul class="sidebar-menu">
        <li id="ui" class="treeview">
            <a href="#">
              <i class="fa fa-laptop"></i> <span>UI Components</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li id="general"><a href="<?= base_url('ui/general'); ?>"><i class="fa fa-circle-o"></i> General</a></li>
              <li id="widgets"><a href="<?= base_url('ui/widgets'); ?>"><i class="fa fa-circle-o"></i> Widgets</a></li>
              <li id="icons"><a href="<?= base_url('ui/icons'); ?>"><i class="fa fa-circle-o"></i> Icons</a></li>
              <li id="buttons"><a href="<?= base_url('ui/buttons'); ?>"><i class="fa fa-circle-o"></i> Buttons</a></li>
              <li id="sliders"><a href="<?= base_url('ui/sliders'); ?>"><i class="fa fa-circle-o"></i> Sliders</a></li>
              <li id="timeline"><a href="<?= base_url('ui/timeline'); ?>"><i class="fa fa-circle-o"></i> Timeline</a></li>
              <li id="modals"><a href="<?= base_url('ui/modals'); ?>"><i class="fa fa-circle-o"></i> Modals</a></li>
            </ul>
          </li>
      </ul> 
      
      <ul class="sidebar-menu">
        <li id="forms" class="treeview">
            <a href="#">
              <i class="fa fa-edit"></i> <span>Forms</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li id="gen"><a href="<?= base_url('forms/general'); ?>"><i class="fa fa-circle-o"></i> General</a></li>
              <li id="advanced"><a href="<?= base_url('forms/advanced'); ?>"><i class="fa fa-circle-o"></i> Advance</a></li>
              <li id="editors"><a href="<?= base_url('forms/editors'); ?>"><i class="fa fa-circle-o"></i> Editors</a></li>
            </ul>
        </li>
      </ul> 
      
      <ul class="sidebar-menu">
        <li id="examples" class="treeview">
          <a href="#">
            <i class="fa fa-folder"></i> <span>Examples</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li id="invoice"><a href="<?= base_url('example/invoice'); ?>"><i class="fa fa-circle-o"></i> Invoice</a></li>
            <li id="prof"><a href="<?= base_url('example/profile'); ?>"><i class="fa fa-circle-o"></i> Profile</a></li>
            <li id="login"><a target="_blank" href="<?= base_url('example/login'); ?>"><i class="fa fa-circle-o"></i> Login</a></li>
            <li id="register"><a target="_blank" href="<?= base_url('example/register'); ?>"><i class="fa fa-circle-o"></i> Register</a></li>
            <li id="lockscreen"><a target="_blank" href="<?= base_url('example/lockscreen'); ?>"><i class="fa fa-circle-o"></i> Lockscreen</a></li>
            <li id="404-error"><a href="<?= base_url('example/error404'); ?>"><i class="fa fa-circle-o"></i> 404 Error</a></li>
            <li id="500-error"><a href="<?= base_url('example/errro500'); ?>"><i class="fa fa-circle-o"></i> 500 Error</a></li>
            <li id="blank-page"><a href="<?= base_url('example/blank'); ?>"><i class="fa fa-circle-o"></i> Blank Page</a></li>
            <li id="pace"><a href="<?= base_url('example/pace'); ?>"><i class="fa fa-circle-o"></i> Pace Page</a></li>
          </ul>
        </li>
      </ul>

      <ul class="sidebar-menu">
        <li id="charts" class="treeview">
            <a href="#">
              <i class="fa fa-pie-chart"></i>
              <span>Charts</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li id="chartjs"><a href="<?= base_url('charts/chartjs'); ?>"><i class="fa fa-circle-o"></i> ChartJS</a></li>
              <li id="morris"><a href="<?= base_url('charts/morris'); ?>"><i class="fa fa-circle-o"></i> Morris</a></li>
              <li id="flot"><a href="<?= base_url('charts/flot'); ?>"><i class="fa fa-circle-o"></i> Flot</a></li>
              <li id="inline"><a href="<?= base_url('charts/inline'); ?>"><i class="fa fa-circle-o"></i> Inline charts</a></li>
          </ul>
        </li>
      </ul>
      
      <ul class="sidebar-menu">  
        <li id="calender">
          <a href="<?= base_url('calendar'); ?>">
            <i class="fa fa-calendar"></i> <span>Calendar</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-red">3</small>
              <small class="label pull-right bg-blue">17</small>
            </span>
          </a>
        </li>
      </ul>
        
      <ul class="sidebar-menu">
        <li id="mailbox" class="treeview">
          <a href="">
            <i class="fa fa-envelope"></i> <span>Mailbox</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li id="inbox">
              <a href="<?= base_url('mailbox/inbox'); ?>">Inbox
                <span class="pull-right-container">
                  <span class="label label-primary pull-right">13</span>
                </span>
              </a>
            </li>
            <li id="compose"><a href="<?= base_url('mailbox/compose'); ?>">Compose</a></li>
            <li id="read"><a href="<?= base_url('mailbox/read_mail'); ?>">Read</a></li>
          </ul>
        </li>
      </ul>

      <ul class="sidebar-menu">
        <li class="treeview">
          <a href="#">
            <i class="fa fa-share"></i> <span>Multilevel</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>
            <li>
              <a href="#"><i class="fa fa-circle-o"></i> Level One
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="#"><i class="fa fa-circle-o"></i> Level Two</a></li>
                <li>
                  <a href="#"><i class="fa fa-circle-o"></i> Level Two
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                  </a>
                  <ul class="treeview-menu">
                    <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
                    <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
                  </ul>
                </li>
              </ul>
            </li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>
          </ul>
        </li>
      </ul>


    </section>
    <!-- /.sidebar -->
  </aside>

  
<script>
  $("#<?= $cur_tab ?>").addClass('active');
</script>
