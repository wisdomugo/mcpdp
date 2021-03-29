<div class="row">
          <div class="col-lg-12">
            <?php if ( isset( $_GET['cPassSuccess'] ) ) { ?>
      <div class="errorMessage alert alert-success" role="alert"><?php echo "Congrats!! You have successfully changed your password"; ?></div>
    <?php } ?>

    <?php if ( isset( $results['errorMessage'] ) ) { ?>
      <div class="errorMessage alert alert-warning" role="alert"><?php echo $results['errorMessage'] ?></div>
    <?php } ?>
          </div>
        </div>




<h1>WELCOME TO THE ADMIN-ROLES DASHBOARD </h1>