<?php
require_once '../assets/configuration/konek.php';

?>

<html>
  <head>
    <title>Simple Aplikasi Pengarsipan Surat</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="../assets/css/jquery-ui.min.css" rel="stylesheet" type="text/css" />
    <link href="../assets/css/jquery-ui.theme.min.css" rel="stylesheet" type="text/css" />
    <!-- font Awesome -->
    <link href="../assets/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons -->
    <link href="../assets/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="../assets/css/AdminLTE.css" rel="stylesheet" type="text/css" />
  </head>
<body class="skin-black">
  <!-- header logo: style can be found in header.less -->
  <header class="header">
      <a href="index.php" class="logo">
          <!-- Add the class icon to your logo image or logo icon to add the margining -->
          SAPS
      </a>
      <!-- Header Navbar: style can be found in header.less -->
      <nav class="navbar navbar-static-top" role="navigation">
          <div class="navbar-right">
              <ul class="nav navbar-nav">
                  <!-- User Account: style can be found in dropdown.less -->
                  <li class="dropdown user user-menu">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                          <i class="glyphicon glyphicon-user"></i>
                          <span><?php echo $_SESSION['username']; ?> <i class="caret"></i></span>
                      </a>
                      <ul class="dropdown-menu">
                          <!-- Menu Footer-->
                          <li class="user-footer">
                            <div class="pull-left">
                                <a href="ubah.php" class="btn btn-default btn-flat">Ubah Password</a>
                            </div>
                              <div class="pull-right">
                                  <a href="logout.php" class="btn btn-default btn-flat">Log Out</a>
                              </div>
                          </li>
                      </ul>
                  </li>
              </ul>
          </div>
      </nav>
  </header>
