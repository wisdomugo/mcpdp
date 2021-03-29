<?php

require( "config.php" );
session_start();
$action = isset( $_GET['action'] ) ? $_GET['action'] : "";
$role = isset( $_GET['role'] ) ? $_GET['role'] : "";

$username = isset( $_SESSION['username'] ) ? $_SESSION['username'] : "";

$isAdmin = isset( $_SESSION['admin'] ) ? $_SESSION['admin'] : "";


 /*require( TEMPLATE_PATH . "/admin/contact.html" );
 die;*/

if ( $action != "login" && $action != "logout" && $action != "register" && !$username ) {
  login();
  exit;
}

if ($role == "admin") {
   adminRole();
   exit;
 }

switch ( $action ) {
  case 'login':
    login();
    break;
  case 'logout':
    logout();
    break;
  case 'register':
    register();
    break;
  case 'changePassword':
    changePassword();
    break;
  case 'registerForWorkshop':
    registerForWorkshop();
    break;
  case 'viewWorkshops':
    viewWorkshops();
    break;
  case 'viewWorkshop':
    viewWorkshop();
    break;
  case 'updateProfile':
    updateProfile();
    break;
  /*case 'newMember':
    newMember();
    break;*/
 
  default:
    dashboard();
}



function login() {

  $results = array();
  $results['pageTitle'] = "Admin Login | MCPDP";

  if ( isset( $_POST['login'] ) ) {

    // User has posted the login form: attempt to log the user in
    $member = new Member;
    
    $user = $member->getByEmailAndLicence($_POST['email'], $_POST['licence'], $_POST['password'] );

    if ( $user ) {

      // Login successful: Create a session and redirect to the admin homepage

      $_SESSION['username'] = $user->surname . " " . $user->firstname;
      $_SESSION['id'] = $user->id;
      $_SESSION['admin'] = $user->admin;

      header( "Location: admin.php" );

    } else {

      // Login failed: display an error message to the user
      $results['errorMessage'] = "Incorrect username or password. Please try again.";
      require( TEMPLATE_PATH . "/admin/loginForm.php" );
    }

  } else {
    // User has not posted the login form yet: display the form
    require( TEMPLATE_PATH . "/admin/loginForm.php" );
  }

}




function logout() {
  unset( $_SESSION['username'] );
  header( "Location: admin.php" );
}




function register() {

  $results = array();
  $results['pageTitle'] = "Admin Register | MCPDP";

  if ( isset( $_GET['status'] ) && $_GET['status'] == "newMemberSignup" ) {
    $results['statusMessage'] = "User Sign up Sucessfull. Please Login into your email for further directions to login to your dashboard. PS:" . $_GET['ps'];
      require( TEMPLATE_PATH . "/admin/registerForms/registerForm.php" );
      exit;
  }

  if ( isset( $_POST['next'] ) ) {
    // User has posted the new member form: save the new member
    $misc =  new Miscs;
    $passwordNonHash = $misc->random_password(9);
    $_POST['password'] = password_hash($passwordNonHash, PASSWORD_DEFAULT);
   // die($_POST['licence']);

    $member = new Member;
    $member->storeFormValues( $_POST );
    $member->insert();

    /*$email = new Email($_POST['email'], $_POST['firstname'], $passwordNonHash);
    $email->registerSuccessEmail();*/
    // return the inserted data and send mail to the email

    header( "Location: admin.php?action=register&status=newMemberSignup&ps=" . $passwordNonHash );
  }


  // User has not posted the login form yet: display the form
    require( TEMPLATE_PATH . "/admin/registerForms/registerForm.php" );
  
}

function updateProfile(){

  if (isset($_POST['updateProfile'])) {

    $member = new Member;
    $returned = $member->updateProfile($_POST);
    if ($returned) {
      header("Location: admin.php?duty=updateProfile&successmsg=1");
      exit;
    }
  }else{
    header("Location: admin.php?duty=updateProfile");
  }
}


function changePassword(){
  $results = array();
  $member = new Member;
  $returned = $member->updatePassword($_POST['id'], $_POST['currentPassword'], $_POST['newPassword'], $_POST['userPass']);
  if($returned){
    header("Location: admin.php?cPassSuccess=true");
    
  }else{
    header("Location: admin.php?duty=changePassword&errormsg=true");
  }
  
}



function registerForWorkshop(){
  $member = new Member;
  if (isset($_POST['registerForWorkshop'])) {
    
    $returned = $member->registerForWorkshop($_POST);
    if ($returned) {
      header("Location: admin.php?wkRegmsg=1");
      exit;
    }
  }

  if (!$_SESSION['activeWorkshop']) {
    header("Location: admin.php");
    exit;
  }

  if ($member->hasMemberRegistered($_SESSION['id'], $_SESSION['activeWorkshop']['id'])) {
    header("Location: admin.php?regwkshpyes=1");
      exit;
  }
  header("Location: admin.php?duty=registerForWorkshop");
}


function viewWorkshops(){

  header("Location: admin.php?duty=viewWorkshops");
}


function viewWorkshop(){

  header("Location: admin.php?duty=viewWorkshop&id=".$_GET['id']);
}



/*function newMember() {

  $results = array();
  $results['pageTitle'] = "New Member";
  $results['formAction'] = "newMember";

  // require( TEMPLATE_PATH . "/admin/newMember.php" );
  // die("new member working");

  if ( isset( $_POST['saveNewMember'] ) ) {
    // User has posted the new member form: save the new member
    $member = new Member;
    $member->storeFormValues( $_POST );
    $member->insert();
    header( "Location: admin.php?status=newMemberSaved" );

  }

  elseif ( isset( $_POST['cancel'] ) ) {

    // User has cancelled their edits: return to the member list
    header( "Location: admin.php" );
  } else {

    // User has not posted the new member form yet: display the form
    //$results['article'] = new Article;
    require( TEMPLATE_PATH . "/admin/newMember.php" );
  }

}*/



function dashboard() {


  $results = array();
  $results['pageTitle'] = "Member Area:: Dashboard";

  // Instantiating the classes I need
  $member = new Member;
  $workshop = new Workshop;

  $user = $member->getById($_SESSION['id']);
  $results['user'] = $user;

  
  $dactiveWorkshop = $workshop->getActiveWorkshop(1);
  $_SESSION['activeWorkshop'] = $dactiveWorkshop;

  if (isset($_GET['duty']) && $_GET['duty'] == "viewWorkshops") {
    $workshops = $workshop->getWorkshops(10);
    $results['workshops'] = $workshops;
  }

  if (isset($_GET['duty']) && $_GET['duty'] == "viewWorkshop") {
    $aworkshop = $workshop->getById($_GET['id']);
    $results['workshop'] = $aworkshop;
  }

  /*if (isset($_GET['duty']) && $_GET['duty'] == "registerForWorkshop") {
    $aworkshop = $workshop->getById($_GET['id']);
    $results['workshop'] = $aworkshop;
  }*/



  require( TEMPLATE_PATH . "/admin/dashboard.php" );

 }




 function adminRole(){

  if (!$_SESSION['admin']) {
   header( "Location: admin.php" );
 }
 $roleTask = isset($_GET['roleTask']) ? $_GET['roleTask'] : "";
 switch ($roleTask) {
      case 'viewMembers':
      $page = "view-members";
      $results = array();
      $member = new Member;
      $members = $member->getMembers(70);
      $results['members'] = $members;
      require( TEMPLATE_PATH . "/admin/admin-roles/members.php" );
      break;

      case 'viewMember':
      $page = "view-member";
      $results = array();
      $member = new Member;
      $members = $member->getById($_GET['id']);
       $results['members'] = $members;
      $memberWorkshops = $member->workshopsRegistered($_GET['id']);
      $results['memberWorkshops'] = $memberWorkshops;
      require( TEMPLATE_PATH . "/admin/admin-roles/members.php" );
      break;

      case 'createWorkshop':
      if (isset($_POST['createWorkshop'])) {
        $workshop = new Workshop;
        $workshop->storeFormValues($_POST);
        $workshop->insert();
        header( "Location: admin.php?role=admin&roleTask=createWorkshop&status=newWorkshopCreated" );
      }
      $page = "create-workshop";
      $results = array();
      require( TEMPLATE_PATH . "/admin/admin-roles/workshops.php" );
      break;

      case 'viewWorkshops':
      $page = "view-workshops";
      $results = array();
      $workshop = new Workshop;
      $workshops = $workshop->getWorkshops(10);
      $results['workshops'] = $workshops;
      require( TEMPLATE_PATH . "/admin/admin-roles/workshops.php" );
      break;

      case 'viewWorkshop':
      $page = "view-workshop";
      $results = array();
      $workshop = new Workshop;
      $aworkshop = $workshop->getById($_GET['id']);
      $results['workshop'] = $aworkshop;
      require( TEMPLATE_PATH . "/admin/admin-roles/workshops.php" );
      break;

     
      default:
      require( TEMPLATE_PATH . "/admin/adminDashboard.php" );
      break;
    }

 }

?>
