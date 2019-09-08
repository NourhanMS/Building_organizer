<?php
class admin extends DatabaseObject
{
    static public function add_monthly_receivables($args)
    {
    $month=$args["month"];
    $amount=$args["amount"];
    $description=$args["description"];
    $sql="INSERT INTO monthly_receivables (month, amount, description) VALUES ( '".$month."' , '".$amount."' , '". $description."' )";
    $result=DatabaseObject ::insert($sql);
    return($result);
    }
    static public function add_emergency_receivables($args)
    {
    $amount=$args["amount"];
    $description=$args["description"];
    $sql="INSERT INTO  Emergency (amount, description) VALUES ( '".$amount."' , '".$description."' )";
    $result=DatabaseObject ::insert($sql);
    return($result);
    }
   static public function get_available_fund()
   {
       $recieved_sql="Select sum(mr.amount) from  Monthly_received join  monthly_receivables as mr where mr.id = Monthly_received.monthly_receivable_id";
       $paid_sql="select sum(amount) from Expenses";
       $recieved=DatabaseObject ::find_sum($recieved_sql);
       $paid=DatabaseObject ::find_sum($paid_sql);
       return((int)$recieved-(int)$paid);
   }
}
?>
