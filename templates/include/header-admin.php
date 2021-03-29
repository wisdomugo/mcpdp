<!DOCTYPE html>
<html lang="en">
<head>
  <title><?php echo htmlspecialchars( $results['pageTitle'] )?></title>
  <link rel="stylesheet" type="text/css" href="templates/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="templates/css/all.css">
  <link rel="stylesheet" type="text/css" href="templates/css/mystyle.css">

  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=RocknRoll+One&family=Noto+Sans+JP:wght@300;400&family=Open+Sans+Condensed&display=swap" rel="stylesheet">
</head>
<body>


  <section class="sec1">
    <header>
      <div class="container">
        <div class="row">
          <div class="offset-md-6 col-md-6 topicons">
            <ul class="float-right">
              <li><a href="#"><i class=""></i><b>EMAIL: &nbsp;</b></a></li>
             
                
            <?php if ( isset( $_SESSION['username'] ) ) {
              echo "<li><a href='admin.php?action=logout'><i class='fa fa-unlock-alt'></i>LOGOUT</a></li>";
            }else{
              echo "<li><a href='admin.php?action=login'><i class='fa fa-unlock-alt'></i>LOGIN</a></li>";
            }
             ?>
              
              
                <?php if ( isset( $_SESSION['username'] ) ) {
              echo "";
            }else{
              echo "<li><a href='admin.php?action=register'><i class='fa fa-user'></i>REGISTER</a></li>";
            }
             ?>
              
            </ul>
          </div>
        </div>
      </div>
    </header>
  </section>

  <section class="sec2" style="border-bottom: 1px solid #c0c0c0; margin-bottom: 4em;">
    <header>
      <div class="container">
        <div class="row">
          <div class="col-sm-4 logo">
            <a href="index.php"><img src="templates/images/logo.png" alt="MCPDP logo"></a>
            <h5>Mandatory Continuing Professional Develpment Programme</h5>
          </div>

          <!--<div class="col-sm-9">
            <ul class="mnav float-right">
              <li><a href="#">Links</a></li>
              <li><a href="#">Programmes</a></li>

            </ul>
          </div>-->



        </div>




      </div>
    </header>
  </section>
