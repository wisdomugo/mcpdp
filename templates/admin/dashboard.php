  <?php include "templates/admin/include/header.php" ?>




  <style type="text/css">
    .title a{color: #fff;}
  </style>

  <!--main content start-->
  <section id="main-content">
    <section class="wrapper">

     <div class="row">
      <div class="col-lg-1"></div>
      <div class="col-lg-10">
        <div class="row">
          <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
            <div class="info-box dark-bg">
              <i class="fa fa-recycle"></i>
              
              <div class="title"><a <?php 
              if(!$results['user']['passwordChanged']) 
                echo "href='admin.php?duty=changePassword'";
              else echo "href='javascript:void'";
              ?> >
            Quickly change your password to your choice. Click</a></div>
          </div>
          <!--/.info-box-->
        </div>
        <!--/.col-->

        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
          <div class="info-box dark-bg">
            <i class="fa fa-registered"></i>

            <div class="title">
              <?php
              if ($_SESSION['activeWorkshop']) { ?>
                <a href="admin.php?action=registerForWorkshop&id=<?php echo $_SESSION['activeWorkshop']['id'];?>">
                  <?php echo "Registration for Module: <br>" . $_SESSION['activeWorkshop']['module'] . ">>> " . $_SESSION['activeWorkshop']['year'] . " <br>is Ongoing. CLICK TO REGISTER!"; ?>
                  </a>
             <?php }else{ echo "<a href='javascript:void'> No Active Workshop for Now </a>"; }

             ?>
           </div>
          </div>
          <!--/.info-box-->
        </div>
        <!--/.col-->

        

      </div>
      <!--/.row-->


    </div>
    <div class="col-lg-1"></div>
  </div>







  <!-- page start-->
  <div class="row">
    <div class="col-lg-2"></div>

    <div class="col-lg-8">
     


    <?php $duty = isset($_GET['duty']) ? $_GET['duty'] : "";
    switch ($duty) {
      case 'changePassword':
      require ("changePassword.php");
      break;
      case 'updateProfile':
      require ("updateProfile.php");
      break;
      case 'viewProfile':
      require ("profile.php");
      break;
      case 'viewWorkshops':
      require ("view-workshops.php");
      break;
      case 'viewWorkshop':
      require ("view-workshop.php");
      break;
      case 'registerForWorkshop':
      require ("register-for-workshop.php");
      break;
      default:
      require("main.php");
      break;
    }
    ?>

  </div>

  <div class="col-lg-2"></div>

</div>
<!-- page end-->
</section>
</section>




<?php  include "templates/admin/include/footer.php" ?>
