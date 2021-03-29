<style type="text/css">
  .my-bg{
    background-color: none;

  }
  .my-bg a{
    color: black !important;
    text-transform: uppercase;
    font-weight: bold;
  }
  .wksh{
    background-color: #fff;
    min-height: 400px;
    padding: 0 30px 0 30px;
  }
  .wksh h1, .wksh h3, .wksh h2{
    font-family: candara;
  }
  .wksh span {
    text-align: center;
    font-size: 20px;
  }

  .head-area{
    padding-left: 10em;
  }
  .mem-details .fa{

  }
</style>
<div class="row">
  <div class="col-lg-12">
    <ol class="breadcrumb">
      <li><i class="fa fa-home"></i><a href="admin.php">Admin</a></li>
      <li><i class="fa fa-bars"></i>Workshop</li>
      <li><i class="fa fa-square-o"></i>View A Workshop</li>
    </ol>
  </div>
</div>


<div class="row wksh">
 
  <article head-area>
     <h1>[[ <?php echo $results['workshop']['title'] ?> ]]</h1>
     <span><b>Year:</b><?php echo $results['workshop']['year'] ?></span> &nbsp; &nbsp; &nbsp;
     <span><b>Module:</b><?php echo $results['workshop']['module'] ?></span>
  </article>

  <div class="row">
    <div class="col-sm-6">
      <article>
        <h3><b>OVERVIEW</b></h3>
        <?php echo $results['workshop']['overview'] ?>
      </article>
    </div>

    <div class="col-sm-6">
      <article>
        <h3><b>MetaData</b></h3>
        <?php echo $results['workshop']['overview'] ?>
      </article>
      
    </div>
  </div>


  
</div>

<!-- page end-->