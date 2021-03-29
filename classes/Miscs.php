<?php

/**
 * Class to handle articles
 */

class Miscs
{

  // Properties

  /**
  * @var int The article ID from the database
  */





  /**
  * Sets the object's properties using the values in the supplied array
  *
  * @param assoc The property values
  */

  public function __construct( ) {



  }

  public function random_password($length){
    //A list of characters that can be used in our
    //random password.
    $characters = '01245689abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ!-.[]?*()';
    //Create a blank string.
    $password = '';
    //Get the index of the last character in our $characters string.
    $characterListLength = mb_strlen($characters, '8bit') - 1;
    //Loop from 1 to the $length that was specified.
    foreach(range(1, $length) as $i){
      $password .= $characters[random_int(0, $characterListLength)];
    }
    return $password;
    
  }


  
}
