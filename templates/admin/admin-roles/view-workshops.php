<div class="row">
  <div class="col-lg-12">
    <ol class="breadcrumb">
      <li><i class="fa fa-home"></i><a href="admin.php">Admin</a></li>
      <li><i class="fa fa-bars"></i>View Workshops</li>
    </ol>
  </div>
</div>
        <div class="row">
          <div class="col-lg-12">
            <section class="panel">
              <header class="panel-heading">
                WORKSHOPS LIST
              </header>

              <table class="table table-striped table-advance table-hover">
                <tbody>
                  <tr>
                    <th><i class=""></i> S/N</th>
                    <th><i class=""></i> Title</th>
                    <th><i class="icon_mail_alt"></i> Year</th>
                    <th><i class="icon_pin_alt"></i> Module</th>
                    <th><i class=""></i> Overview</th>
                    <th><i class="icon_cogs"></i> Action</th>
                  </tr>

                  <?php 
                  
                  foreach ($results['workshops'] as $key => $value) { ?>
                  <tr>
                    <td></td>
                    <td><?php echo $value['title'] ?></td>
                    <td><?php echo $value['year'] ?></td>
                     <td><?php echo $value['module'] ?></td>
                      <td><p style="max-width: 350px;"><?php echo $value['overview'] ?></p></td>
                    <td>
                      <div class="btn-group">
                        <a class="btn btn-primary" href="admin.php?role=admin&roleTask=viewWorkshop&id=<?php echo $value['id']; ?>"><i class="fa fa-eye"></i>View</a>
                      </div>
                    </td>
                  </tr>
                  <?php  } ?>
                
                  
                </tbody>
              </table>
            </section>
          </div>
        </div>
        <!-- page end-->