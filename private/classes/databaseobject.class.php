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
 

  // Properties which have database columns, excluding ID
  public function attributes($id_name="id") 
   {
    $attributes = [];
    foreach(static::$db_columns as $column)
    {
      if($column == $id_name) 
         {continue;}  
      $attributes[$column] = $this->$column;  
    }
    return $attributes;
   }

  protected function sanitized_attributes($id_name="id")
   {
    $sanitized = [];
    foreach($this->attributes($id_name) as $key => $value) 
    {
      $sanitized[$key] = self::$database->escape_string($value);
    }
    return $sanitized;
   }

  public function delete($id_name="id")
  {
    $sql = "DELETE FROM " . static::$table_name . " ";
    $sql .= "WHERE ".$id_name." ='" . self::$database->escape_string($this->$id_name) . "' ";
    $sql .= "LIMIT 1";
    $result = self::$database->query($sql);
    return $result;

  }
  

}

?>
