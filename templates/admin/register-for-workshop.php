
<div class="row">
  <div class="col-lg-12">
    <ol class="breadcrumb">
      <li><i class="fa fa-home"></i><a href="admin.php">Dashboard</a></li>
      <li><i class="fa fa-bars"></i>Register For Workshop</li>
    </ol>
  </div>
</div>

<?php if (!$_SESSION['activeWorkshop']) {
  die("<div class='errorMessage alert alert-warning' role='alert'>Sorry, There is No Active Workshop To Register For</div>");
} ?>
<!-- edit-profile -->
<div id="edit-profile" class="tab-pane">
  <section class="panel">
    <div class="panel-body bio-graph-info">
      
      <h4 style="text-align: center; margin-bottom: 40px;">Module: <?php echo $_SESSION['activeWorkshop']['module'] . " " . $_SESSION['activeWorkshop']['year'] . " <br>" .$_SESSION['activeWorkshop']['title']; ?></h4>
      <form action="admin.php?action=registerForWorkshop" method="post" class="form-horizontal" role="form">
       
        <!--0<input type="hidden" name="login" value="true" />-->
        <input type="hidden" name="memberId" value="<?php echo $_SESSION['id']; ?>" />
        <input type="hidden" name="workshopId" value="<?php echo $_SESSION['activeWorkshop']['id']; ?>" />

          <?php if ( isset( $_GET['status'] ) && $_GET['status'] == "newWorkshopCreated" ) {
           $results['statusMessage'] = "You Successfully Registered Enrolled In for the Workshop";?>
        <div class="errorMessage alert alert-success" role="alert"><?php echo $results['statusMessage'] ?></div>
      <?php } ?>

        <?php if ( isset( $_GET['errormsg'] ) ) { $results['errorMessage'] = "Please enter current password correctly";?>
        <div class="errorMessage alert alert-warning" role="alert"><?php echo $results['errorMessage'] ?></div>
      <?php } ?>

      <div class="form-group">
        <label class="col-lg-4 control-label" for="workshopCertNo">Workshop Certificate Number:  </label>
        <div class="col-lg-6">
          <input type="text" class="form-control" id="workshopCertNo" name="workshopCertNo" placeholder="Enter Workshop Certificate Number" required>
        </div>
      </div>


 
      <div class="form-group">
        <div class="col-lg-offset-2 col-lg-10">
          <input type="submit" name="registerForWorkshop" value="Register">
          <!--<button type="button" class="btn btn-danger">Cancel</button>-->
        </div>
      </div>
    </form>
  </div>
</section>
</div>





