<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="keyword" content="">
  <link rel="shortcut icon" href="templates/admin/img/favicon.png">

  <title><?php echo htmlspecialchars( $results['pageTitle'] )?></title>

  <!-- Bootstrap CSS -->
  <link href="templates/admin/css/bootstrap.min.css" rel="stylesheet">
  <!-- bootstrap theme -->
  <link href="templates/admin/css/bootstrap-theme.css" rel="stylesheet">
  <!--external css-->
  <!-- font icon -->
  <link href="templates/admin/css/elegant-icons-style.css" rel="stylesheet" />
  <link href="templates/admin/css/font-awesome.min.css" rel="stylesheet" />
  <!-- Custom styles -->
  <link href="templates/admin/css/style.css" rel="stylesheet">
  <link href="templates/admin/css/style-responsive.css" rel="stylesheet" />

  <!-- HTML5 shim and Respond.js IE8 support of HTML5 -->
  <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
      <script src="js/lte-ie7.js"></script>
    <![endif]-->

    <!-- =======================================================
      Theme Name: NiceAdmin
      Theme URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
      Author: BootstrapMade
      Author URL: https://bootstrapmade.com
      ======================================================= -->

      <style type="text/css">
        .md{background-color: #ffffff; color: #000;
          border-radius: 5%;}
          .show-admin{padding-top: 0;}
      </style>
    </head>

    <body>
      <!-- container section start -->
      <section id="container" class="">
        <!--header start-->

        <header class="header dark-bg">
          <div class="toggle-nav">
            <div class="icon-reorder tooltips" data-original-title="Toggle Navigation" data-placement="bottom"><i class="icon_menu"></i></div>
          </div>

          <!--logo start-->
          <a href="admin.php" class="logo">MCPDP <span class="lite"> Member</span></a>
          <!--logo end-->

         
          <div class="top-nav notification-row">
            <!-- notificatoin dropdown start-->
            <ul class="nav pull-right top-menu">
              <?php if ($_SESSION['admin']) { ?>
                 <li class="show-admin dropdown">
                <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                  <h5 style="display: inline; text-transform: uppercase;">Member/Admin: [switch roles] </h5>
                  <b class="caret"></b>
                </a>  
                 <ul class="dropdown-menu extended">
                  <li class="eborder-top">
                    <a href="admin.php?role=admin"> ADMIN ROLES ======<i class="icon_key_alt"></i></a>
                  </li>
                  <li>
                    <a href="admin.php"> MEMBER ROLES =====<i class="icon_key_alt"></i></a>
                  </li>

                </ul>
              </li>
            <?php } ?>
             
            

              <!-- user login dropdown start-->
              <li class="dropdown">
                <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                  <span class="profile-ava">
                    <img alt="" src="templates/admin/img/myavatar.png">
                  </span>
                  <span class="username">welcome <?php echo htmlspecialchars( $_SESSION['username']) ?> </span>
                  <b class="caret"></b>
                </a>
                <ul class="dropdown-menu extended logout">
                  <div class="log-arrow-up"></div>
                  <li class="eborder-top">
                    <a href="admin.php?duty=viewProfile"><i class="icon_profile"></i> My Profile</a>
                  </li>
                  <li>
                    <a href="admin.php?action=logout"><i class="icon_key_alt"></i> Log Out</a>
                  </li>

                </ul>
              </li>
              <!-- user login dropdown end -->
            </ul>
            <!-- notificatoin dropdown end-->


          </div>
        </header>
        <!--header end-->

           



        <!--sidebar start-->
        <aside>
          <div id="sidebar" class="nav-collapse ">
            <!-- sidebar menu start-->
            <ul class="sidebar-menu">
              <li class="">
                <a class="" href="admin.php">
                  <i class="icon_house_alt"></i>
                  <span>Dashboard</span>
                </a>
              </li>

              <li class="sub-menu">
                <a href="javascript:;" class="">
                  <i class="icon_document_alt"></i>
                  <span>Profile</span>
                  <span class="menu-arrow arrow_carrot-right"></span>
                </a>
                <ul class="sub">
                  <li><a class="" href="admin.php?duty=changePassword">Change Password</a></li>
                  <li><a class="" href="admin.php?duty=updateProfile">Update Profile</a></li>
                  <li><a class="" href="admin.php?duty=viewProfile">View Profile</a></li>
                </ul>
              </li>
              <li class="sub-menu">
                <a href="javascript:;" class="">
                  <i class="icon_document_alt"></i>
                  <span>Workshop</span>
                  <span class="menu-arrow arrow_carrot-right"></span>
                </a>
                <ul class="sub">
                  <li><a class="" href="admin.php?action=viewWorkshops">View Workshops</a></li>
                </ul>
              </li>




            </ul>
            <!-- sidebar menu end-->
          </div>
        </aside>
        <!--sidebar end-->
