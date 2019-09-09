<?php
$page_title="admin_expenses";
require_once('../../private/initialize.php');
include(SHARED_PATH.'head.php');
$departments=admin::get_departments();
?>

<body >
    <div style="text-align:center">
    <h3 style="margin-top:10px;"> متأخرات </h3>
        <div style="border: 15px solid green;margin-top: 50px;padding-top:10px;" class="row">
            <table class="col-md-12">
                <thead>
                    <tr>
                    <th>رقم الشقة </th>
                    <th>اسم الساكن</th>
                    <th>الهاتف</th>
                    <th>متأخرات شهرية </th>
                    <th>متأخرات عاجلة </th>
                    </tr>
                </thead>
                <tbody>
                <?php  
                foreach($departments as $department):
                   $info=admin::get_department_info($department);
                   foreach($info as $info_object)
                   {
                       foreach($info_object as $key => $value)
                       {
                           if($key=="owner_name") $owner_name=$value;
                           elseif($key=="mobile") $mobile=$value;
                       }
                   }
                   if($owner_name=="admin")continue;
                   $arrears= admin::get_arrears($department);
                   ?>
                
                    <tr>
                    <td> <?= $department ?> </td>
                    <td> <?= $owner_name ?> </td>
                    <td> <?= $mobile ?> </td>
                    <td> <?= $arrears["monthly"] ?> </td>
                    <td> <?= $arrears["emergency"] ?> </td>
                    </tr>
                <?php  endforeach;?>
                </tbody>
            </table>
        </div>
        <br><br>
        <div>
            <a href="<?= PUBLIC_ROOT."index.php?admin=True"?>" style="text-decoration:none;color:black;"> <i class="fa fa-mail-reply" style="font-size:80px;color:black"></i> رجوع </a>
        </div>
         
    </div>
</body>