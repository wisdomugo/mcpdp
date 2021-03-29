<?php

/**
 * Class to handle articles
 */

class Workshop
{

  // Properties
  /**
  * @var int
  */
  public $id = null;
  /**
  * @var string
  */
  public $title = null;
  public $year = null;
  public $module = null;
  public $overview = null;
  public $startDate = null;
  public $endDate = null;
  public $adminCreatedId = null;
  

  /**
  * Sets the object's properties using the values in the supplied array
  *
  * @param assoc The property values
  */

  public function __construct( $data=array() ) {
    if ( isset( $data['id'] ) ) $this->id = (int) $data['id'];
    if ( isset( $data['title'] ) ) $this->title = preg_replace ( "/[^\.\,\-\_\'\"\@\?\!\:\$ a-zA-Z0-9()]/", "", $data['title'] );
    if ( isset( $data['year'] ) ) $this->year = (int) $data['year'];
    if ( isset( $data['module'] ) ) $this->module = preg_replace ( "/[^\.\,\-\_\'\"\@\?\!\:\$ a-zA-Z0-9()]/", "", $data['module'] );
    if ( isset( $data['overview'] ) ) $this->overview = preg_replace ( "/[^\.\,\-\_\'\"\@\?\!\:\$ a-zA-Z0-9()]/", "", $data['overview'] );
    if ( isset( $data['startDate'] ) ) $this->startDate = (int) $data['startDate'];
    if ( isset( $data['endDate'] ) ) $this->endDate = (int) $data['endDate'];
    if ( isset( $data['adminCreatedId'] ) ) $this->adminCreatedId = (int) $data['adminCreatedId'];

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
    if ( !is_null( $this->id ) ) trigger_error ( "Workshop::insert(): Attempt to insert an Article object that already has its ID property set (to $this->id).", E_USER_ERROR );


    try {
      $conn = new PDO(DB_DSN, DB_USERNAME);
      // set the PDO error mode to exception
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e) {
      echo "Connection failed: " . $e->getMessage();
    }

    $sql = "INSERT INTO workshops (title, year, module, overview, startDate, endDate, adminCreatedId ) VALUES ( :title, :year, :module, :overview, :startDate, :endDate, :adminCreatedId )";
    try{
      $st = $conn->prepare ( $sql );
    }
    catch(PDOException $r){
      echo "sql failed " . $r->getMessage();
    }

    $st->bindValue( ":title", $this->title, PDO::PARAM_STR );
    $st->bindValue( ":year", $this->year, PDO::PARAM_INT );
    $st->bindValue( ":module", $this->module, PDO::PARAM_STR );
    $st->bindValue( ":overview", $this->overview, PDO::PARAM_STR );
    $st->bindValue( ":startDate", $this->startDate, PDO::PARAM_INT );
    $st->bindValue( ":endDate", $this->endDate, PDO::PARAM_INT );
    $st->bindValue( ":adminCreatedId", $this->adminCreatedId, PDO::PARAM_INT );
    
    $st->execute();
    $this->id = $conn->lastInsertId();
    $conn = null;
  }




   public static function getById( $id ) {

    $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
    $sql = "SELECT * FROM workshops WHERE id = :id";
    $st = $conn->prepare( $sql );
    $st->bindValue( ":id", $id, PDO::PARAM_INT );
    
    $st->execute();
    $row = $st->fetch();
    $conn = null;

    if ( $row ) { 
      return $row;
    }else { return false; }
    
  }



   public static function getWorkshops( $NUM_WORKSHOPS_FOR_ADMIN_PAGE ) {

    $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
    $sql = "SELECT * FROM workshops LIMIT :NUM_WORKSHOPS_FOR_ADMIN_PAGE";
    $st = $conn->prepare( $sql );
    $st->bindValue( ":NUM_WORKSHOPS_FOR_ADMIN_PAGE", $NUM_WORKSHOPS_FOR_ADMIN_PAGE, PDO::PARAM_INT );
    
    $list = array();
    $st->execute();
    while ( $row = $st->fetch() ) {
      $list[] = $row;
    }
    
    if ( $list ) { 
      return $list;
    }else { return false; }
    
  }


    public static function getActiveWorkshop( $LIM, $publishStatus = 1) {

    $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
    $sql = "SELECT * FROM workshops WHERE publishStatus = :publishStatus LIMIT :LIM";
    $st = $conn->prepare( $sql );
    $st->bindValue( ":LIM", $LIM, PDO::PARAM_INT );
    $st->bindValue( ":publishStatus", $publishStatus, PDO::PARAM_INT );
    
    $st->execute();
    $row = $st->fetch();
    
    if ( $row ) { 
      return $row;
    }else { return false; }
    
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
