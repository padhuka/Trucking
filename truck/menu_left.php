  <?php
                            include_once 'lib/sess.php';
                            include_once 'lib/config.php';
                      ?>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li>&nbsp;
        </li>
        <?php if ($seskdlvl=='partner'){?>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-laptop"></i>
            <span>Overview</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="?p=orderhistory"><i class="fa fa-book"></i><span>Order History</span></a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-laptop"></i>
            <span>Truck</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="?p=truck&pil=list"><i class="fa fa-book"></i><span>List Truck</span></a></li>
            <li><a href="?p=truck&pil=reg"><i class="fa fa-book"></i><span>Tambah Armada</span></a></li>
          </ul>
        </li> 
      <?php }?>
      <?php if ($seskdlvl=='customer'){?>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-laptop"></i>
            <span>Overview</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <?php
            $sqlcatat = "SELECT * FROM orders A WHERE A.fk_customer_id='$userid' ORDER BY A.id DESC";
            $jmlorder=mysql_num_rows(mysql_query($sqlcatat));
            ?>
            
            <li><a href="?p=order&pil=list"><i class="fa fa-book"></i><span>Order History (<?php echo $jmlorder;?>)</span></a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-laptop"></i>
            <span>Order</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="?p=order&pil=reg"><i class="fa fa-book"></i><span>Create Order</span></a></li>
          </ul>
        </li> 
      <?php }?>
        <li><a href="logout.php"><i class="fa fa-laptop"></i><span>Logout</span></a></li>
        
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>