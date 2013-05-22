<?php
/**
 * A model for admin
 * 
 * @package PennyCore
 */
class CMAdminControlPanel extends CObject implements IHasSQL{


  /**
   * Constructor
   */
  public function __construct() {
    parent::__construct();
  }

   /**
   * Implementing interface IHasSQL. Encapsulate all SQL used by this class.
   *
   * @param string $key the string that is the key of the wanted SQL-entry in the array.
   */
  public static function SQL($key=null) {
    $queries = array(
     
      'se all users'   => 'SELECT * FROM User;',
      'se all groups' => 'SELECT * FROM Groups;',
      
     );
    if(!isset($queries[$key])) {
      throw new Exception("No such SQL query, key '$key' was not found.");
    }
    return $queries[$key];
  }

  
 /**
   * Read all groups
   */
   public function SeeAllGroups() {
    try {
      return $this->db->ExecuteSelectQueryAndFetchAll(self::SQL('se all groups'));
    } catch(Exception $e) {
      return array();    
    }
  }
  /**
   * Read all users
   */
  public function SeeAllUsers() {
    try {
      return $this->db->ExecuteSelectQueryAndFetchAll(self::SQL('se all users'));
    } catch(Exception $e) {
      return array();    
    }
  }
} 


