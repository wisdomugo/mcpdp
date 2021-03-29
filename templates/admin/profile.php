 <style type="text/css">
  .bio-graph-info p{font-size: 15px;}
  .bio-graph-info p span{text-transform: uppercase;}
</style>
<div class="row">
  <div class="col-lg-12">
    <ol class="breadcrumb">
      <li><i class="fa fa-home"></i><a href="admin.php">Dashboard</a></li>
      <li><i class="fa fa-bars"></i>Profile</li>
      <li><i class="fa fa-square-o"></i>View Profile</li>
    </ol>
  </div>
</div>
<div class="row">
  <!-- profile-widget -->
  <div class="col-lg-12">
   <h3 style="text-transform: uppercase; font-weight: bold;"> <?php echo $results['user']['surname'] ." ". $results['user']['firstname'] ?></h3>
 </div>
</div>


<!-- page start-->
<div class="row">
  <div class="col-lg-12">
    <section class="panel">

      <div class="panel-body">
        <div class="tab-content">

          <!-- profile -->
          <div id="profile" class="tab-pane active">
            <section class="panel">

              <div class="panel-body bio-graph-info">
                <h1>Bio Data</h1>
                <div class="row">
                  <div class="bio-row">
                    <p><span>Surname:</span><?php echo $results['user']['surname'] ?> </p>
                  </div>
                  <div class="bio-row">
                    <p><span>First Name:</span> <?php echo $results['user']['firstname'] ?> </p>
                  </div>
                  <div class="bio-row">
                    <p><span>Other Names:</span> <?php echo $results['user']['otherNames'] ?></p>
                  </div>
                  <div class="bio-row">
                    <p><span>Gender:</span> <?php echo $results['user']['sex'] ?></p>
                  </div>


                </div>
              </div>

              <div class="panel-body bio-graph-info">
                <h1>Access / Nursing Data</h1>

                <div class="bio-row">
                  <p><span>Email:</span><?php echo $results['user']['email'] ?></p>
                </div>
                <div class="bio-row">
                  <p><span>Phone: </span><?php echo $results['user']['phone'] ?></p>
                </div>
                <div class="bio-row">
                  <p><span>License: </span><?php echo $results['user']['licence'] ?></p>
                </div>
                <div class="bio-row">
                  <p><span>Work Place Type:</span><?php echo $results['user']['workPlaceType'] ?></p>
                </div>
                <div class="bio-row">
                  <p><span>State: </span><?php echo $results['user']['state'] ?></p>
                </div>
                <div class="bio-row">
                  <p><span>Designation: </span><?php echo $results['user']['designation'] ?></p>
                </div>
                

              </div>

              <a style="margin-top: 2em; float: right;" class="btn btn-lg btn-default" href="admin.php?duty=updateProfile">==Update Your Profile==</a>

            </div>
          </section>
          <section>
            <div class="row">
            </div>
          </section>
        </div>




      </div>
    </div>
  </section>
</div>
</div>