<?php
class admin extends DatabaseObject
{
    static public function add_monthly_receivables($args)
    {
    $month=$args["month"];
    $amount=$args["budget"];
    $description=$args["description"];
    $sql="INSERT INTO monthly_receivables (month, amount, description) VALUES ( '".$month."' , '".$amount."' , '". $description."' )";
    $result=DatabaseObject ::insert($sql);
    return($result);
    }
    static public function add_emergency_receivables($args)
    {
    $amount=$args["budget"];
    $description=$args["description"];
    $sql_="INSERT INTO  Emergency (amount, description) VALUES ( '".$amount."' , '".$description."' )";
    echo( $sql_);
    $result=DatabaseObject ::insert($sql_);
    return($result);
    }
   static public function get_available_fund()
   {
       $recieved_sql="SELECT sum(mr.amount) FROM  Monthly_received JOIN  monthly_receivables AS mr WHERE mr.id = Monthly_received.monthly_receivable_id";
       $paid_sql="select sum(amount) from Expenses";
       $recieved=DatabaseObject ::find_sum($recieved_sql);
       $paid=DatabaseObject ::find_sum($paid_sql);
       return((int)$recieved-(int)$paid);
   }
   static public function get_departments()
   {
       $sql="SELECT id  FROM Department";
       $result=DatabaseObject ::find_one_field_by_sql($sql,'id');
       return($result);
   }

   static public function  get_id_descriptions($table_name="monthly_receivables")
   {
       $sql="SELECT id , description FROM ".$table_name;
       $result=DatabaseObject ::find_by_sql($sql,'id');
       return($result);
   }
   static public function add_monthly_received($args)
   {
        $record_id=$args["record_id"];
        $departments=$args["departments"];
        foreach($departments as $department_id):
            $sql="INSERT INTO Monthly_received(department_id , monthly_receivable_id) VALUES ( '".$department_id."' , '".$record_id."' )";
            $result=DatabaseObject ::insert($sql);
        endforeach;
       return($result);
   }

   static public function  add_emergency_received($args)
   {  $record_id=$args["record_id"];
     $departments=$args["departments"];
    foreach($departments as $department_id):
        $sql="INSERT INTO Emergency_received(department_id , emergency_receivable_id) VALUES ( '".$department_id."' , '".$record_id."' )";
        echo($sql);
        $result=DatabaseObject ::insert($sql);
    endforeach;
   return($result);
   }
   static public function  add_expenses($args)

   {  
        $description=$args["description"];
        $received_by=$args["received_by"];
        $amount=$args["amount"];
    
        $sql="INSERT INTO Expenses( description , received_by , amount ) VALUES ( '".$description."' , '".$received_by."' , '".$amount."' )";
        $result=DatabaseObject ::insert($sql);
     
        return($result);
    }
    static public function get_arrears($department_id)

   {  
    $emergency_arrears_sql = "select sum(amount) from Emergency where id not in (select monthly_receivable_id from Monthly_received where department_id='".$department_id."' )";
    $monthly_arrears_sql = "select sum(amount) from monthly_receivables where id not in (select emergency_receivable_id from Emergency_received where department_id='".$department_id."' )";
    $emergency=admin::find_sum($emergency_arrears_sql);
    $monthly=admin::find_sum($monthly_arrears_sql);
    $result=[];
    $result["emergency"]= $emergency;
    $result["monthly"]= $monthly;
    return($result);
  }
  static public function get_department_info($department_id)
  {
      $sql="SELECT owner_name , mobile FROM Department WHERE id = '".$department_id."'";
      $result=DatabaseObject ::find_by_sql($sql);
      return($result);
  }
   
 
  
}
?>
