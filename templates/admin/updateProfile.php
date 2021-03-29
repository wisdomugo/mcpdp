  


<div class="row">
  <div class="col-lg-12">
    <ol class="breadcrumb">
      <li><i class="fa fa-home"></i><a href="admin.php">Dashboard</a></li>
      <li><i class="fa fa-bars"></i>Profile</li>
      <li><i class="fa fa-square-o"></i>Update Profile</li>
    </ol>
  </div>
</div>


<!-- edit-profile -->
<div id="edit-profile" class="tab-pane">
  <section class="panel">
    <div class="panel-body bio-graph-info">
      <h1> Update Profile</h1>
      <form action="admin.php?action=updateProfile" method="post" class="form-horizontal" role="form">
        <input type="hidden" name="usid" value="<?php echo $results['user']['id'] ?>" />

        <?php if ( isset( $_GET['successmsg'] ) ) { ?>
          <div class="errorMessage alert alert-success" role="alert"><?php echo "Thanks. Profile - Successfully Updated" ?></div>
        <?php } ?>

        <?php if ( isset( $results['errorMessage'] ) ) { ?>
          <div class="errorMessage alert alert-warning" role="alert"><?php echo $results['errorMessage'] ?></div>
        <?php } ?>

        <div class="form-group">
          <label class="col-lg-2 control-label" for="email">Email</label>
          <div class="col-lg-6">
            <input type="text" class="form-control" id="email" name="email" placeholder="Email" value="<?php echo $results['user']['email']; ?>" disabled required>
          </div>
        </div>


        <div class="form-group">
          <label for="licence" class="col-lg-2 control-label">Licence Number</label>
          <div class="col-lg-6">
            <input type="text" class="form-control" id="licence" name="licence" placeholder="Licence Number" disabled value="<?php echo $results['user']['licence'] ?>" 

      required>
          </div>
        </div>

        <div class="form-group">
          <label for="phone" class="col-lg-2 control-label">Phone</label>
          <div class="col-lg-6">
            <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone" disabled value="<?php echo $results['user']['phone'] ?>" 

      required>
          </div>
        </div>

        <div class="form-group">
          <label for="surname" class="col-lg-2 control-label">Surname</label>
          <div class="col-lg-6">
            <input type="text" class="form-control" id="surname" name="surname" placeholder="Surname" value="<?php echo $results['user']['surname']; ?>" required >
          </div>
        </div>

          <div class="form-group">
          <label for="firstname" class="col-lg-2 control-label">FirstName</label>
          <div class="col-lg-6">
           <input type="text" class="form-control" id="firstname" name="firstname" placeholder="First Name" value="<?php echo $results['user']['firstname']; ?>" required >
          </div>
        </div>

        <div class="form-group">
          <label for="otherNames" class="col-lg-2 control-label">Other Names</label>
          <div class="col-lg-6">
        <input type="text" class="form-control" id="otherNames" name="otherNames" placeholder="Other Names" value="<?php echo $results['user']['otherNames']; ?>" required >
          </div>
        </div>

            <div class="form-group">
          <label for="sex" class="col-lg-2 control-label">Sex</label>
          <div class="col-lg-6">
        <input type="text" class="form-control" id="sex" name="sex" placeholder="Sex" value="<?php echo $results['user']['sex']; ?>" required >
          </div>
        </div>

        <div class="form-group">
          <label for="workPlaceType" class="col-lg-2 control-label">Work Place Type</label>
          <div class="col-lg-6">
         <input type="text" class="form-control" id="workPlaceType" name="workPlaceType" placeholder="Work Place Type" value="<?php echo $results['user']['workPlaceType'] ?>" 

      required>
          </div>
        </div>

          <div class="form-group">
          <label for="state" class="col-lg-2 control-label">State</label>
          <div class="col-lg-6">
         <input type="text" class="form-control" id="state" name="state" placeholder="State" value="<?php echo $results['user']['state']; ?>" required>
          </div>
        </div>

          <div class="form-group">
          <label for="designation" class="col-lg-2 control-label">Designation</label>
          <div class="col-lg-6">
         <input type="text" class="form-control" id="designation" name="designation" placeholder="Designation" value="<?php echo $results['user']['designation']; ?>" required>
          </div>
        </div>

         <div class="form-group">
          <label for="workshopCertNo" class="col-lg-2 control-label">Workshop Cert Number</label>
          <div class="col-lg-6">
          <input type="text" class="form-control" id="workshopCertNo" name="workshopCertNo" placeholder="Workshop Cert Number" value="<?php echo $results['user']['workshopCertNo']; ?>" >
          </div>
        </div>




       

        <div class="form-group">
          <div class="col-lg-offset-2 col-lg-10">
            <input type="submit" name="updateProfile" value="Update Profile">
            <!--<button type="button" class="btn btn-danger">Cancel</button>-->
          </div>
        </div>
      </form>
    </div>
  </section>
</div>