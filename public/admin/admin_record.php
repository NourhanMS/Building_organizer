<?php
$page_title="admin_record";
require_once('../../private/initialize.php');
include(SHARED_PATH.'head.php');
$departments=admin::get_departments();
if(isset($_GET['type']))
{
    $type=$_GET['type'];
    $word="تسجيل مدفوعات طارئة";
    $route='admin/admin_record.php?type=Emergency';
    $inserted_route='admin/admin_record.php?type=Emergency&inserted=True';
    $table_name="Emergency_received";

}
else
{
    $type="monthly_receivables";
    $word="تسجيل مدفوعات شهرية";
    $route='admin/admin_record.php';
    $inserted_route='admin/admin_record.php?inserted=True';
    $table_name="Monthly_received";
}
$descriptions_result=admin::get_id_descriptions($type); 
?>
<!-- receiving from the form -->
<?php
if(is_post_request())
{  
    $args=[];
    $args['record_id']=$_POST['record_id'];
    $args['departments']=$_POST['departments'];
    if($table_name="Monthly_received")
    {
       $result= admin::add_monthly_received($args);
      
       if($result)
        {
            url_for($inserted_route);
        }
    }
    if($table_name="Emergency_received")
    {
        $result = admin::add_emergency_received($args);
        if($result)
         {
             url_for($inserted_route);
         }
     }

}
?>
<body>
    <div style="text-align:center">
    <h3 style="margin-top:10px;"> <?=$word ?> </h3>
        <div style="border: 15px solid green;margin-top: 50px;padding-top:10px;">
            <form action="<?=PUBLIC_ROOT.$route?>" method="post" style="text-align:center">
    
            <br>  
                     
            <div class="form-group row">
                <div class="col-sm-2" >
                </div>
                <div class="col-sm-8" >
                        <select class="custom-select mr-sm-2" id="inlineFormCustomSelect" name="record_id">
                        <option selected>اختر رقم التسجيل ...</option>
                        <?php foreach($descriptions_result as $row){
                            foreach($row as $key => $value): 
                                if($key=="id"){ ?>
                                    <option  value=" <?= ($value);?>"> <?= $value;?>  </option>
                        <?php } endforeach;}?>
                        </select>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-sm-2" >
                </div>
                <div class="col-sm-8" >
                        <select class="custom-select mr-sm-2" id="inlineFormCustomSelect" name="departments[]" multiple>
                        <option selected>اختر الشقق ...</option>
                        <?php foreach($departments as $department):?>
                            <option value="<?= $department ?>"><?= $department ?></option>
                        <?php endforeach;?>
                        </select>
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
    </div>
    </div>
</body>