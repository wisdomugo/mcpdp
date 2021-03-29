  <?php include "templates/admin/include/adminRoleHeader.php" ?>


  <!-- page start-->
  <div class="row">
    <div class="col-lg-1"></div>

    <div class="col-lg-10">
     


    <?php
   
      require ($page . ".php");
     
    ?>
<!-- create-workshop
  edit-workshop
  view-workshops
  view-workshop
-->
  </div>

  <div class="col-lg-1"></div>

</div>
<!-- page end-->
</section>
</section>




<?php  include "templates/admin/include/footer.php" ?>
