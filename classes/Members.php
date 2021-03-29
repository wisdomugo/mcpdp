<?php

/**
 * Class to handle articles
 */

class Member
{

  // Properties
  /**
  * @var int
  */
  public $id = null;
  /**
  * @var string
  */
  public $surname = null;
  public $firstname = null;
  public $otherNames = null;
  public $email = null;
  public $phone = null;
  public $regDate = null;
  public $sex = null;
  public $workshopCertNo = null;
  public $designation = null;
  public $workPlaceType = null;
  public $state = null;
  public $password = null;
  public $licence = null;
  public $admin = null;
  



  /**
  * Sets the object's properties using the values in the supplied array
  *
  * @param assoc The property values
  */

  public function __construct( $data=array() ) {
    if ( isset( $data['id'] ) ) $this->id = (int) $data['id'];
    if ( isset( $data['surname'] ) ) $this->surname = preg_replace ( "/[^\.\,\-\_\'\"\@\?\!\:\$ a-zA-Z0-9()]/", "", $data['surname'] );
    if ( isset( $data['firstname'] ) ) $this->firstname = preg_replace ( "/[^\.\,\-\_\'\"\@\?\!\:\$ a-zA-Z0-9()]/", "", $data['firstname'] );
    if ( isset( $data['otherNames'] ) ) $this->otherNames = preg_replace ( "/[^\.\,\-\_\'\"\@\?\!\:\$ a-zA-Z0-9()]/", "", $data['otherNames'] );
    if ( isset( $data['email'] ) ) $this->email = $data['email'];
    if ( isset( $data['phone'] ) ) $this->phone = $data['phone'];
    if ( isset( $data['password'] ) ) $this->password = $data['password'];
    if ( isset( $data['licence'] ) ) $this->licence = $data['licence'];
    if ( isset( $data['admin'] ) ) $this->admin = $data['admin'];
  }




  /**
  * Sets the object's properties using the edit form post values in the supplied array
  *
  * @param assoc The form post values
  */

  public function storeFormValues ( $params ) {

    // Store all the parameters
    $this->__construct( $params );

  }






  /**
  * Inserts the current Article object into the database, and sets its ID property.
  */

  public function insert() {
    // Does the Article object already have an ID?
    if ( !is_null( $this->id ) ) trigger_error ( "Member::insert(): Attempt to insert an Article object that already has its ID property set (to $this->id).", E_USER_ERROR );


    try {
      $conn = new PDO(DB_DSN, DB_USERNAME);
      // set the PDO error mode to exception
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e) {
      echo "Connection failed: " . $e->getMessage();
    }

    $sql = "INSERT INTO members (surname, firstname, otherNames, email, phone, sex, workshopCertNo,
    designation, workPlaceType, state, password, licence ) VALUES ( :surname, :firstname, :otherNames, :email, :phone, :sex, :workshopCertNo, :designation, :workPlaceType, :state, :password, :licence )";
    try{
      $st = $conn->prepare ( $sql );
    }
    catch(PDOException $r){
      echo "sql failed " . $r->getMessage();
    }

    $st->bindValue( ":surname", $this->surname, PDO::PARAM_STR );
    $st->bindValue( ":firstname", $this->firstname, PDO::PARAM_STR );
    $st->bindValue( ":otherNames", $this->otherNames, PDO::PARAM_STR );
    $st->bindValue( ":email", $this->email, PDO::PARAM_STR );
    $st->bindValue( ":phone", $this->phone, PDO::PARAM_INT );
    $st->bindValue( ":sex", $this->sex, PDO::PARAM_STR );
    $st->bindValue( ":workshopCertNo", $this->workshopCertNo, PDO::PARAM_STR );
    $st->bindValue( ":designation", $this->designation, PDO::PARAM_INT );
    $st->bindValue( ":workPlaceType", $this->workPlaceType, PDO::PARAM_STR );
    $st->bindValue( ":state", $this->state, PDO::PARAM_STR );
    $st->bindValue( ":password", $this->password, PDO::PARAM_STR );
    $st->bindValue( ":licence", $this->licence, PDO::PARAM_STR );
    $st->execute();
    $this->id = $conn->lastInsertId();
    $conn = null;
  }

  public static function hasMemberRegistered($memberId, $workshopId){
     $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
     $sql = "SELECT * FROM member_workshop WHERE member_id = :member_id AND workshop_id = :workshop_id";
     $st = $conn->prepare( $sql );
    $st->bindValue( ":member_id", $memberId, PDO::PARAM_INT);
    $st->bindValue( ":workshop_id", $workshopId, PDO::PARAM_INT);
    
    $st->execute();
    $row = $st->fetch();
    if ($row) {
      return true;
    }else{ return false; }

  }

  public static function workshopsRegistered($memberId){
     $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
     $sql = "SELECT * FROM member_workshop WHERE member_id = :member_id";
     $st = $conn->prepare( $sql );
    $st->bindValue( ":member_id", $memberId, PDO::PARAM_INT);
    
    $st->execute();
    $list = array();
    $dlist = array();
    while ( $row = $st->fetch() ) {
      $list[] = $row;
    }
    
    if ($list) {
      for ($i=0; $i < count($list) ; $i++) { 
        $sql = "SELECT title FROM workshops WHERE id = :id";
        $st = $conn->prepare( $sql );
        $st->bindValue( ":id", $list[$i]['workshop_id'], PDO::PARAM_INT);
        $st->execute();
        $list[$i]['workshop_name'] = $st->fetch();
      }
      // var_dump($list); exit;
      return $list;

    }else{ return false; }
    $conn = null;

  }

  public static function registerForWorkshop( $data = array() ){
    $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
    $sql = "INSERT INTO member_workshop (member_id, workshop_id, workshopCertNo) VALUES ( :member_id, :workshop_id, :workshopCertNo )";
    $st = $conn->prepare ( $sql );
    $st->bindValue( ":member_id", $data['memberId'], PDO::PARAM_INT );
    $st->bindValue( ":workshop_id", $data['workshopId'], PDO::PARAM_INT );
    $st->bindValue( ":workshopCertNo", $data['workshopCertNo'], PDO::PARAM_STR );
    $st->execute();
    if ($conn->lastInsertId()) {
      return true;
    }else{ return false;}

    $conn = null;
  }



  public static function getByEmailAndLicence( $email, $licence, $password ) {

    $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
    $sql = "SELECT *, UNIX_TIMESTAMP(regDate) AS regDate FROM members WHERE email = :email AND licence = :licence";
    $st = $conn->prepare( $sql );
    $st->bindValue( ":email", $email, PDO::PARAM_STR );
    $st->bindValue( ":licence", $licence, PDO::PARAM_STR );
    
    $st->execute();
    $row = $st->fetch();
    $conn = null;

    if ( $row ) { 
      $verifyP = password_verify($password, $row['password']);
      if($verifyP){
      return new Member( $row );
    }else{ 
      return false;
    }
    }else { return false; }
    
  }



   public static function getById( $id ) {

    $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
    $sql = "SELECT *, UNIX_TIMESTAMP(regDate) AS regDate FROM members WHERE id = :id";
    $st = $conn->prepare( $sql );
    $st->bindValue( ":id", $id, PDO::PARAM_INT );
    
    $st->execute();
    $row = $st->fetch();
    $conn = null;

    if ( $row ) { 
      return $row;
    }else { return false; }
    
  }



   public static function getMembers( $NUM_MEMBERS_FOR_ADMIN_PAGE ) {

    $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
    $sql = "SELECT * FROM members LIMIT :NUM_MEMBERS_FOR_ADMIN_PAGE";
    $st = $conn->prepare( $sql );
    $st->bindValue( ":NUM_MEMBERS_FOR_ADMIN_PAGE", $NUM_MEMBERS_FOR_ADMIN_PAGE, PDO::PARAM_INT );
    
    $list = array();
    $st->execute();
    while ( $row = $st->fetch() ) {
      $list[] = $row;
    }

   /* $sql = "SELECT FOUND_ROWS() AS totalRows";
    $totalRows = $conn->query( $sql )->fetch();
    $conn = null;*/
    
    if ( $list ) { 
      return $list;
    }else { return false; }
    
  }




public static function updateProfile( $data = array() ) {

    // Update the Member
       $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
        $sql = "UPDATE members SET surname=:surname, firstname=:firstname, otherNames=:otherNames, sex=:sex, workshopCertNo=:workshopCertNo, designation=:designation, workPlaceType=:workPlaceType, state=:state WHERE id = :id";
        $st = $conn->prepare ( $sql );
        $st->bindValue( ":surname", $data['surname'], PDO::PARAM_STR );
        $st->bindValue( ":firstname", $data['firstname'] , PDO::PARAM_STR);
        $st->bindValue( ":otherNames", $data['otherNames'], PDO::PARAM_STR);
        $st->bindValue( ":sex", $data['sex'], PDO::PARAM_STR);
        $st->bindValue( ":workshopCertNo", $data['workshopCertNo'], PDO::PARAM_STR);
        $st->bindValue( ":designation", $data['designation'], PDO::PARAM_STR);
        $st->bindValue( ":workPlaceType", $data['workPlaceType'], PDO::PARAM_STR);
        $st->bindValue( ":state", $data['state'], PDO::PARAM_STR);
        $st->bindValue( ":id", $data['usid'], PDO::PARAM_INT );
        $st->execute();
        $conn = null;
        return true;    
    
  }



  public static function updatePassword( $id, $currentPassword, $newPassword, $userPass ) {

    // Update the Member
   
    if(password_verify($currentPassword, $userPass)){
       $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
        $sql = "UPDATE members SET password=:password, passwordChanged=:pcd WHERE id = :id";
        $st = $conn->prepare ( $sql );
        $st->bindValue( ":password", password_hash($newPassword, PASSWORD_DEFAULT), PDO::PARAM_STR );
        $st->bindValue( ":pcd", true, PDO::PARAM_INT);
        $st->bindValue( ":id", $id, PDO::PARAM_INT );
        $st->execute();
        $conn = null;
    }else{
      return false;
      exit;
    }
    return true;    
    
  }




  /**
  * Updates the current Article object in the database.
  */
  public function update() {

    // Does the Article object have an ID?
    if ( is_null( $this->id ) ) trigger_error ( "Article::update(): Attempt to update an Article object that does not have its ID property set.", E_USER_ERROR );

    // Update the Article
    $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
    $sql = "UPDATE articles SET publicationDate=FROM_UNIXTIME(:publicationDate), title=:title, summary=:summary, content=:content WHERE id = :id";
    $st = $conn->prepare ( $sql );
    $st->bindValue( ":publicationDate", $this->publicationDate, PDO::PARAM_INT );
    $st->bindValue( ":title", $this->title, PDO::PARAM_STR );
    $st->bindValue( ":summary", $this->summary, PDO::PARAM_STR );
    $st->bindValue( ":content", $this->content, PDO::PARAM_STR );
    $st->bindValue( ":id", $this->id, PDO::PARAM_INT );
    $st->execute();
    $conn = null;
  }



}
