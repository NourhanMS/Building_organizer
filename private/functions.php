<?php
function is_post_request()
{
  return $_SERVER['REQUEST_METHOD'] == 'POST';
}
function is_get_request()
{
  return $_SERVER['REQUEST_METHOD'] == 'GET';
}
function h($string="")
{
  return htmlspecialchars($string);
}
function u($string="")
{
  return urlencode($string);
}
  // is_blank('abcd')
  // * validate data presence
  // * uses trim() so empty spaces don't count
  // * uses === to avoid false positives
  function is_blank($value) 
  {
    if(is_array($value))
      {
        $value=implode(',',$value);
      }
    return !isset($value) || trim($value) === '';
  }
  //returns the path inside public root to be used in header 
function url_for($path) 
{
	return header("Location: ".PUBLIC_ROOT.$path);
}
function validate($dep_id,$passwrod)
{
  $errors=[];
  $sql="SELECT * FROM Department WHERE id = ".$dep_id." AND password = "."'".$passwrod."'";
  $result = DatabaseObject::find_by_sql($sql);
  if(count($result) == 0) 
    $errors["login"]=True;
  return $errors ;
  
}

?> 