
  <div class="row">
          <div class="col-lg-12">
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="admin.php">Dashboard</a></li>
              <li><i class="fa fa-bars"></i>Profile</li>
              <li><i class="fa fa-square-o"></i>Change Password</li>
            </ol>
          </div>
        </div>


        <!-- edit-profile -->
<div id="edit-profile" class="tab-pane">
  <section class="panel">
    <div class="panel-body bio-graph-info">
      <h1> Change Password</h1>
      <form action="admin.php?action=changePassword" method="post" class="form-horizontal" role="form">
        <!--0<input type="hidden" name="login" value="true" />-->
        <input type="hidden" name="id" value="<?php echo $results['user']['id'] ?>" />
        <input type="hidden" name="userPass" value="<?php echo $results['user']['password'] ?>" />


        <?php if ( isset( $_GET['errormsg'] ) ) { $results['errorMessage'] = "Please enter current password correctly";?>
          <div class="errorMessage alert alert-warning" role="alert"><?php echo $results['errorMessage'] ?></div>
        <?php } ?>

        <div class="form-group">
          <label class="col-lg-2 control-label" for="password">Enter Current Password</label>
          <div class="col-lg-6">
            <input type="text" class="form-control" id="currentPassword" name="currentPassword" placeholder="Enter Current Password" required>
          </div>
        </div>


        <div class="form-group">
          <label for="newPassword" class="col-lg-2 control-label">New Password</label>
          <div class="col-lg-6">
            <input type="text" class="form-control" id="newPassword" name="newPassword" placeholder="New Password" required>
          </div>
        </div>

        <div class="form-group">
          <label for="newPasswordRepeat" class="col-lg-2 control-label">Repeat New Password</label>
          <div class="col-lg-6">
            <input type="text" class="form-control" id="newPasswordRepeat" name="newPasswordRepeat" placeholder="Repeat New Password" required>
          </div>
        </div>


        <div class="form-group">
          <div class="col-lg-offset-2 col-lg-10">
            <input type="submit" name="updatePassword" value="Change Password">
            <!--<button type="button" class="btn btn-danger">Cancel</button>-->
          </div>
        </div>
      </form>
    </div>
  </section>
</div>





