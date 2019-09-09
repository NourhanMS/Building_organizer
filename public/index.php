<?php
  require_once('../private/initialize.php');
  $page_title="Home";
  include(SHARED_PATH.'head.php');
  include(SHARED_PATH.'header.php');

    ?>
<?php
    if(is_post_request())
    {  
        $args=[];
        $args['department_id']=$_POST['dep_id'];
        $args['password']=$_POST['password'];
        $errors=validate($args['department_id'], $args['password']);
        if(is_blank($errors) )
        {
            if( $args['department_id']==0)
                url_for("index.php?admin=True");
            else
                url_for("index.php?user_id= ".h(u($args['department_id'])));
        }
        else
        {
            url_for("index.php?error=True");
        } 
    }

?>

<body>
<?php 
    if(!isset($_GET["user_id"]) and !isset($_GET["admin"])):?>
        <div id="about_us" style="text-align: center;">
            <br>
            <h3 style="color: #007bff ">   من نحن؟   </h3>
            <h5 > 
            موقع لمتابعة الدفعات الشهريةوالمصروفات لسكان عمارة 21
            <br> تم إنشائه فى سبتمبر 2019
            </h5>
        </div>
<?php endif;?>

    <!--    user section  -->
    <?php
         if( is_get_request())
         { 
             if( isset($_GET["user_id"])):?>
              <div id="user_area">
                    <div style="text-align: center;">
                        <br>
                         <h3 style="color: #007bff ">   استعلم  </h3>
                     </div>
                  <ul>
                      <li> <a href=""> مستحقات مدفوعة </a> </li>
                      <br><br>
                      <li> <a href="">  متأخرات </a>  </li>
                 </ul>
              </div>
              <br>
             <?php
            elseif(isset($_GET["admin"])):?>
             <div id="admin_area">
                    <div style="text-align: center;" id="control">
                        <br>
                         <h3 style="color: #007bff ">لوحة التحكم  </h3>
                     </div>
                  <ul>
                  <li> <a href="<?= PUBLIC_ROOT."admin/admin_add.php"?>"> إضافة مدفوعات </a> </li>
                      <br><br>
                      <li> <a href="<?=PUBLIC_ROOT.'admin/admin_record.php'?>"> تسجيل مدفوعات شهرية </a> </li>
                      <br><br>
                      <li> <a href="<?=PUBLIC_ROOT.'admin/admin_record.php?type=Emergency'?>"> تسجيل مدفوعات طارئة </a> </li>
                      <br><br>
                      <li> <a href="<?= PUBLIC_ROOT.'admin/admin_expenses.php' ?>">  سحب من الصندوق  </a>  </li>
                      <br><br>
                      <li> <a href="<?= PUBLIC_ROOT.'admin/admin_query.php' ?>">  متأخرات </a>  </li>
                 </ul>
              </div>
              <br><br>
         <?php endif;

            }?>
    <?php if(isset($_GET["admin"])):?>
        <div style="text-align: center;" id="box" >
            <h3 style="color: #007bff ">المبلغ المٌتاح بالصندوق  </h3>
            <div style="border: 15px solid green;margin: 20px;"> 
            <p style="color:red;font-size:20px; ">  <?= admin::get_available_fund();  ?>  جنيها" </p>
            </div>
        </div>
        <br>
        <?php endif;?>
             
  <!-- <?php  
   $args=[];
    $args["description"]="اجرة حارس العمارة - القمامة - تنظيف السلم";
    $args["month"]="يناير";
    $args["amount"]=220;
    var_dump(admin::add_monthly_receivables($args));  ?>  -->
<?= include(SHARED_PATH.'footer.php')?>
