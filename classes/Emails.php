<?php

/**
 * Class to handle articles
 */

class Email
{

  // Properties

  /**
  * @var int The article ID from the database
  */
  public $email = null;
  public $name = null;
  public $subject = null;
  public $msg = null;

 




  /**
  * Sets the object's properties using the values in the supplied array
  *
  * @param assoc The property values
  */

  public function __construct( $email, $name, $password) {

    $this->email = $email;
    $this->name = $name;
    $this->password = $password;
    
  }


  public function registerSuccessEmail() {

    $headers = 'From: donotreply@mcpdp.org';

    $this->subject = "Thanks for Signing up on MCPDP Portal";

    $this->msg = "Greetings Dear" . $this->name . "thank you for registering on MCPDP platform. <br> Your Login Passcode is:" . $this->password . "<br> Follow link below to login: <br> https://mcpdp.org/admin.php?action=login";

   if( mail($this->email, $this->subject, $this->msg, $headers)){
    die("went through");
   }else{
      die("didn't go through");
   }

  }


  
}
