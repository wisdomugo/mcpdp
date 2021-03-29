<div class="row">
  <div class="col-lg-12">
    <ol class="breadcrumb">
      <li><i class="fa fa-home"></i><a href="admin.php">Admin</a></li>
      <li><i class="fa fa-bars"></i>View Members</li>
    </ol>
  </div>
</div>
        <div class="row">
          <div class="col-lg-12">
            <section class="panel">
              <header class="panel-heading">
                MCPDP MEMBERS & PARTICIPANTS
              </header>

              <table class="table table-striped table-advance table-hover">
                <tbody>
                  <tr>
                    <th><i class="icon_profile"></i> Full Name</th>
                    <th><i class=""></i> Gender</th>
                    <th><i class="icon_mail_alt"></i> Email</th>
                    <th><i class="icon_pin_alt"></i> State</th>
                    <th><i class=""></i> Date Joined</th>
                    <th><i class="icon_cogs"></i> Action</th>
                  </tr>

                  <?php 
                  
                  foreach ($results['members'] as $key => $value) { ?>
                  <tr>
                    <td><?php echo $value['surname'] . " " . $value['firstname'] ?></td>
                    <td><?php echo $value['sex'] ?></td>
                     <td><?php echo $value['email'] ?></td>
                      <td><?php echo $value['state'] ?></td>
                       <td><?php echo $value['regDate'] ?></td>
                    <td>
                      <div class="btn-group">
                        <a class="btn btn-primary" href="admin.php?role=admin&roleTask=viewMember&id=<?php echo $value['id']; ?>"><i class="fa fa-eye"></i>View</a>
                       
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