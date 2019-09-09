<?php
$page_title="admin_expenses";
require_once('../../private/initialize.php');
include(SHARED_PATH.'head.php');
?>
<?php
if(is_post_request())
{  
    $args=[];
    $args['description']=$_POST['description'];
    $args['received_by']=$_POST['received_by'];
    $args['amount']=$_POST['amount'];
    $result = admin::add_expenses($args);
        if($result)
         {
             url_for("admin/admin_expenses.php?inserted=True");
         }

}
?>

<body>
    <div style="text-align:center">
    <h3 style="margin-top:10px;"> سحب من الصندوق </h3>
        <div style="border: 15px solid green;margin-top: 50px;padding-top:10px;">
            <form action="<?=PUBLIC_ROOT.'admin/admin_expenses.php'?>" method="post" style="text-align:center">
    
                <br>  
                        
                
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">السبب</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="staticEmail" name="description" >
                    </div>
                </div>
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">اسم المٌستلم</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="staticEmail" name="received_by">
                    </div>
                </div>
            
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">المبلغ</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" id="staticEmail" name="amount" >
                    </div>
                </div>
                <div class="form-group row" >
                    <div class="col-sm-12" >
                        <button type="submit" class="btn btn-primary">تسجيل </button>
                        <?php if(isset($_GET['inserted'])): ?>
                            <span style="color:red;">  تمت اﻹضافة </span>
                        <?php endif;?>
                    </div>
                    <div class="col-sm-6" >
                        <a href="<?= PUBLIC_ROOT."index.php?admin=True"?>" style="text-decoration:none;color:black;"> <i class="fa fa-mail-reply" style="font-size:80px;color:black"></i> رجوع </a>
                    </div>
                </div>
            
            
             </form>
        </div >
     </div>
</body>