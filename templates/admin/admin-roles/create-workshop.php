
<div class="row">
  <div class="col-lg-12">
    <ol class="breadcrumb">
      <li><i class="fa fa-home"></i><a href="admin.php">Admin</a></li>
      <li><i class="fa fa-bars"></i>Workshops</li>
      <li><i class="fa fa-square-o"></i>Create Workshop</li>
    </ol>
  </div>
</div>


<!-- edit-profile -->
<div id="edit-profile" class="tab-pane">
  <section class="panel">
    <div class="panel-body bio-graph-info">
      <h1> Create Workshop</h1>
      <form action="admin.php?role=admin&roleTask=createWorkshop" method="post" class="form-horizontal" role="form">
       
        <!--0<input type="hidden" name="login" value="true" />-->
        <input type="hidden" name="adminCreatedId" value="<?php echo $_SESSION['id'] ?>" />

          <?php if ( isset( $_GET['status'] ) && $_GET['status'] == "newWorkshopCreated" ) {
           $results['statusMessage'] = "You Successfully Created a Workshop";?>
        <div class="errorMessage alert alert-success" role="alert"><?php echo $results['statusMessage'] ?></div>
      <?php } ?>

        <?php if ( isset( $_GET['errormsg'] ) ) { $results['errorMessage'] = "Please enter current password correctly";?>
        <div class="errorMessage alert alert-warning" role="alert"><?php echo $results['errorMessage'] ?></div>
      <?php } ?>

      <div class="form-group">
        <label class="col-lg-2 control-label" for="title">Title</label>
        <div class="col-lg-6">
          <input type="text" class="form-control" id="title" name="title" placeholder="Workshop Title" required>
        </div>
      </div>


      <div class="form-group">
        <label for="year" class="col-lg-2 control-label">Year</label>
        <div class="col-lg-6">
          <input type="text" class="form-control" id="year" name="year" placeholder="Year" required>
        </div>
      </div>

      <div class="form-group">
        <label for="module" class="col-lg-2 control-label">Module</label>
        <div class="col-lg-6">
          <input type="text" class="form-control" id="module" name="module" placeholder="eg: Mar - Apr" required>
        </div>
      </div>

      <div class="form-group">
        <label for="overview" class="col-lg-2 control-label">Overview</label>
        <div class="col-lg-6">
          <textarea class="form-control" name="overview" placeholder="Overview" required></textarea>
        </div>
      </div>

      <div class="form-group">
        <label for="startDate" class="col-lg-2 control-label">Start Date</label>
        <div class="col-lg-3">
          <input type="text" class="form-control" name="startDate" placeholder="Format: 2021-01-01" required>
        </div>

        <label for="endDate" class="col-lg-2 control-label">End Date</label>
        <div class="col-lg-3">
          <input type="text" class="form-control" name="endDate" placeholder="Format: 2021-01-01" required>
        </div>
        <div class="col-lg-2"></div>
      </div>


      <div class="form-group">
        <div class="col-lg-offset-2 col-lg-10">
          <input type="submit" name="createWorkshop" value="Create Workshop">
          <!--<button type="button" class="btn btn-danger">Cancel</button>-->
        </div>
      </div>
    </form>
  </div>
</section>
</div>





