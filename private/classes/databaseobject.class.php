<?php
class DatabaseObject 
{

  static protected $database; 
  static protected $table_name = "";
  static protected $columns = [];
  public $errors = [];

  static public function set_database($database)
  {
    self::$database = $database;
  }

# returns array of objects with the result
  static public function find_by_sql($sql) 
  {
    $result = self::$database->query($sql);
    if(!$result)
     {
      exit("Database query failed.");
     }
    // results into objects
    $object_array = [];
    while($record = $result->fetch_assoc())
     {
    
       $object_array[] = static::array_to_object($record);
     }

    $result->free(); 
    return $object_array;
  }

  static public function find_one_field_by_sql($sql,$fieldNamel) 
  {
    $result = self::$database->query($sql);
    if(!$result)
     {
      exit("Database query failed.");
     }
    // results into array
    $object_array = [];
    while($record = $result->fetch_assoc())
     {
    
       $object_array[] = $record[$fieldNamel];
     }

    $result->free(); 
    return $object_array;
  }
  static public function find_all()
  {
    $sql = "SELECT * FROM " . static::$table_name;
    return static::find_by_sql($sql);
  }
  
  
  static public function count_all()
  {
    $sql = "SELECT count(*) FROM " . static::$table_name;
    $result_set= self::$database->query($sql);
	  $row= $result_set->fetch_row();
	  return array_shift($row);
  }

  static protected function array_to_object($assoc_array=[])
  {
     $object = new static;
     foreach($assoc_array as $key=> $value)
     { 
         
       $object->$key=$value;
        
     }
     return $object;
  }
  static public function insert($sql)
  {
    $result= self::$database->query($sql);
    return($result);
  }
  static public function find_sum($sql)
  {
    $result_set= self::$database->query($sql);
	  $row= $result_set->fetch_row();
	  return array_shift($row);
  }

}

?>
