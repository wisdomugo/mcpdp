  <?php include "templates/include/header-admin.php" ?>
  <section style="margin-top: 4em;">
    <div class="container">

      <div class="row">
        <div class="col-sm-2"></div>

        <div class="col-sm-6">
          <h4>Register your data in the Database</h4><br>
          <form action="admin.php?action=register" method="post">
            <input type="hidden" name="memberRegister" value="true" />

            <?php if ( isset( $results['errorMessage'] ) ) { ?>
              <div class="errorMessage"><?php echo $results['errorMessage'] ?></div>
            <?php } ?>

            <?php if ( isset( $results['statusMessage'] ) ) { ?>
              <div class="errorMessage alert alert-success" role="alert"><?php echo $results['statusMessage'] ?></div>
            <?php } ?>


            <div class="form-row">
              <div class="col-sm-4">
                <label for="surname">Surname</label>
              <input type="text" class="form-control" id="surname" name="surname" placeholder="Surname"
              required> 
              </div>
              <div class="col-sm-4">
                <label for="firstname">First Name</label>
              <input type="text" class="form-control" id="firstname" name="firstname" placeholder="First Name" required>
              </div>
              <div class="col-sm-4">
                <label for="otherNames">Other Names</label>
              <input type="text" class="form-control" id="otherNames" name="otherNames" placeholder="Other Names" required>
              </div>
              
            </div>
             <div class="form-row">
              <div class="col-sm-6">
                <label for="email">Email</label>
              <input type="text" class="form-control" id="email" name="email" placeholder="email"
              required> 
              </div>
              <div class="col-sm-6">
                <label for="phone">Phone</label>
              <input type="text" class="form-control" id="phone" name="phone" placeholder="phone" required>
              </div>
             
              
            </div>
             <div class="form-row">
              <div class="col-sm-6">
                <label for="licence">License Number</label>
              <input type="text" class="form-control" id="licence" name="licence" placeholder="licence"
              required> 
              </div>
              
             
              
            </div>
            



            <br>
            <div class="form-row">
              <div class="col-sm-6"></div>
           <div class="col-sm-6">
             <input type="submit" name="next" value="Next" style="width: 100%" />
           </div>
           </div>

         </form>
       </div>

       <div class="col-sm-3"></div>
     </div>



   </div>
 </section>



 <?php // include "templates/include/footer.php" ?>
