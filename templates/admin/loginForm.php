  <?php include "templates/include/header-admin.php" ?>






    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">

        <!-- page start-->
        <div class="row">
          <div class="col-lg-3"></div>

          <div class="col-lg-4">
             <h4>Login to Dashboard</h4><br>
          <form action="admin.php?action=login" method="post">
            <input type="hidden" name="login" value="true" />

            <?php if ( isset( $results['errorMessage'] ) ) { ?>
              <div class="errorMessage alert alert-warning" role="alert"><?php echo $results['errorMessage'] ?></div>
            <?php } ?>

              
            <div class="form-row">
              <div class="col-sm-6">
                <label for="email">Email</label>
              <input type="text" class="form-control" id="email" name="email" placeholder="Email"
              required>
              </div>

              <div class="col-sm-6">
                <label for="licence">License Number</label>
              <input type="text" class="form-control" id="licence" name="licence" placeholder="License Number"
              required>
              </div>
              
            </div>
            <div class="form-row">

              <label for="password">Password</label>
              <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
            </div>



            <br>
            <div class="form-row">
             <input type="submit" name="login" value="Login"/>
           </div>

         </form>
          </div>

          <div class="col-lg-5"></div>

        </div>
        <!-- page end-->
      </section>
    </section>




 <?php // include "templates/admin/include/footer.php" ?>
