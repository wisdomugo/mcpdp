<style type="text/css">
  .my-bg{
    background-color: none;

  }
  .my-bg a{
    color: black !important;
    text-transform: uppercase;
    font-weight: bold;
  }
  .mem-details{
    background-color: #fff;
  }
  .mem-details h2{
    font-family: candara;

  }
  .mem-details article{
    width: 94%;
    border-bottom: 1px #c0c0c0 solid;
    float: left;
    margin: 0 40px 40px 20px;
    font-family: candara;
    font-size: 15px;
    padding-bottom: 1em;
    padding-top: 0.5em;
  }
  .mem-details .fa{

  }
  .my{
    text-transform: uppercase;
  }
  article b{text-transform: uppercase; display: inline-block; min-width: 140px;}
  article span{text-transform: uppercase;}
   article label{text-transform: uppercase; font-weight: bold;}
</style>
<div class="row">
  <div class="col-lg-12">
    <ol class="breadcrumb">
      <li><i class="fa fa-home"></i><a href="admin.php">Admin</a></li>
      <li><i class="fa fa-bars"></i>View Members</li>
      <li><i class="fa fa-square-o"></i>View Member Details</li>
    </ol>
  </div>
</div>


<div class="row mem-details">

   <div class="col-sm-6">
   
<h2 class="my"><i class="fa fa-user fabig"></i>BIO DATA</h2>
<article class=""><i class="e"></i><b>Full Name: </b>&nbsp; &nbsp; &nbsp;<span><?php echo $results['members']['surname'] . " " . $results['members']['firstname']; ?></span></article>
<article class=""><i class=""></i><b>Email: </b>&nbsp; &nbsp; &nbsp;<span><?php echo $results['members']['email']; ?></span></article>
<article class=""><i class=""></i><b>Phone: </b>&nbsp; &nbsp; &nbsp;<span><?php echo $results['members']['phone']; ?></span></article>
<article class=""><i class=""></i><b>Gender: </b>&nbsp; &nbsp; &nbsp;<span><?php echo $results['members']['sex']; ?></span></article>

<h2 class="my"><i class="fa fa-registered fabig"></i>Nursing DATA</h2>
<article class=""><i class=""></i><b>Licence:</b>&nbsp; &nbsp; &nbsp; <span><?php echo $results['members']['licence']; ?></span></article>
<article class=""><i class=""></i><b>Work Place Type:</b>&nbsp; &nbsp; &nbsp;<span><?php echo $results['members']['workPlaceType']; ?></span></article>
<article class=""><i class=""></i><b>State: </b>&nbsp; &nbsp; &nbsp;<span><?php echo $results['members']['state']; ?></span></article>
<article class=""><i class=""></i><b>Designation: </b>&nbsp; &nbsp; &nbsp;<span><?php echo $results['members']['designation']; ?></span></article>

   </div>

    <div class="col-sm-6" style="padding-left: 4em;">
      <div class="row">
         <h2>Member Workshops Participation</h2>

            <!--collapse start-->
            <div class="panel-group m-bot20" id="accordion">
              <?php 
              $i = 0;

              foreach ($results['memberWorkshops'] as $key => $value) { ?>
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h4 class="panel-title">
                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapse<?php $i++; echo $i;?>">
                               <?php echo "<b>WORKSHOP: </b>" . $value['workshop_name']['title']; ?>
                              </a>
                  </h4>
                </div>
                <div id="collapse<?php echo $i;?>" class="panel-collapse collapse">
                  <div class="panel-body">
                  <article><label>Workshop Certificate Number:</label> <?php echo $value['workshopCertNo']; ?></article>
                  <article><label>Pre Test Score:</label> <?php echo $value['preTestScore']; ?></article>
                  <article><label>Post Test Score:</label> <?php echo $value['postTestScore']; ?></article>
                  <article><label>Performance Rating:</label> <?php echo $value['performanceRating']; ?></article>
                  </div>
                </div>
              </div>
             <?php } ?>
          

            </div>
            <!--collapse end-->

      </div>

      <div class="row">
        <h2><i class="fa fa-settings"></i>Actions</h2>  
        <a class="btn btn-default">[[ Make Administrator ]]</a>
        <a class="btn btn-default">[[ Suspend Member ]]</a>

      </div>

    </div>
  
</div>

<!-- page end-->