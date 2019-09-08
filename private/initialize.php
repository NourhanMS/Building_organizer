<?php
ob_start(); // turn on output buffering
define('PRIVATE_PATH',dirname(__FILE__)."/");
define('PUBLIC_PATH',dirname(PRIVATE_PATH).'/public/');
define('SHARED_PATH',PRIVATE_PATH.'shared/');
$findME=strpos($_SERVER['SCRIPT_NAME'],'/public' )+8;
$doc_root=substr($_SERVER['SCRIPT_NAME'],0,$findME);
define('PUBLIC_ROOT',$doc_root);
define('IMAGE_PATH',PUBLIC_ROOT."images/");
include_once('credentials.php');
include_once('functions.php');
include_once('classes/databaseobject.class.php');
include_once('classes/admin.class.php');


  $db =new mysqli(DB_SERVER,USER_NAME,PASSWORD,DB_NAME);
  DatabaseObject::set_database($db);
 
  // $result=DatabaseObject::find_by_sql($sql);
 
  // foreach($result as $row) 
  //   {                
                      
  //     foreach($row as $key_name => $key_value )//for descriptive array
  //     {
  //       if( $key_name != "errors")
  //       {
  //         echo " $key_name is: $key_value <br>  ";
  //       }
         
  //     }            
  //   }

?>