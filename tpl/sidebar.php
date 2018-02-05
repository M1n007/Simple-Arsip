<!-- sidebar: style can be found in sidebar.less -->
<section class="sidebar">
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu">
        <li class="active">
            <a href="index.php">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            </a>
        </li>
        <li>
            <a href="#" data-toggle="modal" data-target="#myLose">
                <i class="fa fa-reply"><i class="fa fa-envelope"></i></i> <span>Add Data Surat Keluar</span>
            </a>
        </li>
        <?php
          if ($_SESSION['level'] == 'admin' ) {
         ?>
        <li>
            <a href="#" data-toggle="modal" data-target="#myMod">
                <i class="fa fa-share"><i class="fa fa-envelope"></i></i> <span>Add Data Surat Masuk</span>
            </a>
        </li>
        <li>
            <a href="#" data-toggle="modal" data-target="#myDispo">
              <i class="fa fa-exchange"></i> <span>Disposisikan Surat</span>
            </a>
        </li>
        <?php
          }
         ?>
    </ul>
</section>
<!-- /.sidebar -->
