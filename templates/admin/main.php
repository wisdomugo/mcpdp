<div class="row">
	<div class="col-lg-12">
		<?php if ( isset( $_GET['cPassSuccess'] ) ) { ?>
			<div class="errorMessage alert alert-success" role="alert"><?php echo "Congrats!! You have successfully changed your password"; ?></div>
		<?php } ?>

		<?php if ( isset( $_GET['wkRegmsg'] ) ) { ?>
			<div class="errorMessage alert alert-success" role="alert"><?php echo "Thank you. Workshop Enrolment Successful"; ?></div>
		<?php } ?>

		<?php if ( isset( $_GET['regwkshpyes'] ) ) { ?>
			<div class="errorMessage alert alert-warning" role="alert"><?php echo "You Have Already Enrolled In This Workshop"; ?></div>
		<?php } ?>



		<?php if ( isset( $results['errorMessage'] ) ) { ?>
			<div class="errorMessage alert alert-warning" role="alert"><?php echo $results['errorMessage'] ?></div>
		<?php } ?>
	</div>
</div>




<h1>WELCOME TO THE MAIN DASHBOARD </h1>