<div class="row">
  <div class="col-lg-12">
    <ol class="breadcrumb">
      <li><i class="fa fa-home"></i><a href="admin.php">Dashboard</a></li>
      <li><i class="fa fa-bars"></i>Workshop</li>
      <li><i class="fa fa-bars"></i>View Workshops</li>
    </ol>
  </div>
</div>

        <div class="row">
          <div class="col-lg-12">
            <section class="panel">
              <header class="panel-heading">
                WORKSHOPS
              </header>

              <table class="table table-striped table-advance table-hover">
                <tbody>
                  <tr>
                    <th><i class=""></i> S/N</th>
                    <th><i class=""></i> Title</th>
                    <th><i class=""></i> Year</th>
                    <th><i class=""></i> Module</th>
                    <th><i class=""></i> Status</th>
                    <th><i class="icon_cogs"></i> Action</th>
                  </tr>

                  <?php 
                  
                  foreach ($results['workshops'] as $key => $value) { ?>
                  <tr>
                    <td></td>
                    <td><p style="max-width: 200px;"><?php echo $value['title'] ?></p></td>
                    <td><?php echo $value['year'] ?></td>
                     <td><?php echo $value['module'] ?></td>
                     <td><?php if($value['publishStatus']){echo "Active";}else{echo "Archived";} ?></td>
                    <td>
                      <div class="btn-group">
                        <a class="btn btn-primary" href="admin.php?action=viewWorkshop&id=<?php echo $value['id']; ?>"><i class="fa fa-eye"></i>View</a>
                      </div>
                      <?php if ($value['publishStatus']) {?>
                       <div class="btn-group">
                        <a class="btn btn-primary" href="admin.php?action=registerForWorkshop"><i class="fa fa-registered"></i>Register For This Workshop</a>
                      </div>
                      <?php } ?>
                      
                    </td>
                  </tr>
                  <?php  } ?>
                
                  
                </tbody>
              </table>
            </section>
          </div>
        </div>
        <!-- page end-->