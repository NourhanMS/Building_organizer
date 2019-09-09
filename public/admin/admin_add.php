<?php
  require_once('../../private/initialize.php');
  $page_title="admin_panel";
  include(SHARED_PATH.'head.php');
 ?>
 <style>
   a:hover {
  color: red;
  background-color: transparent;
  text-decoration: None
}
   </style>
   <?php
    if(is_post_request())
    {  
        $args=[];
        $args['description']=$_POST['description'];
        $args['budget']=$_POST['budget'];
        if(isset($_POST['month']))
        {
          $args['month']=$_POST['month'];
          $result= admin::add_monthly_receivables($args);
          if($result)
          {
            url_for("admin/admin_add.php?monthly_inserted=true");
          }

        }

        else
        {
          $result= admin::add_emergency_receivables($args);
          if($result)
          {
            url_for("admin/admin_add.php?emergency_inserted=true");
          }
        }
    }
    ?>
 <body>
   <div class="row">
      <div class="col-md-6" style="text-align:center">
        <h3 style="margin-top:10px;"> إضافة مدفوعات شهرية</h3>
        <br>
        <form action="<?=PUBLIC_ROOT.'admin/admin_add.php'?>" method="post" style="border-color: #030A44;border-style:solid;text-align:center;">
          <div class="form-group row">
            <label for="colFormLabel" class="col-sm-2 col-form-label">الوصف</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="colFormLabel" name="description">
            </div>
          </div>
          <div class="form-group row">
            <label for="colFormLabel" class="col-sm-2 col-form-label">التكلفة</label>
            <div class="col-sm-10">
              <input type="number" class="form-control" id="colFormLabel" name="budget">
            </div>
          </div>
          <br>
          <?php $months=[1,2,3,4,5,6,7,8,9,10,11,12]; ?>
          <select class="custom-select mr-sm-2" id="inlineFormCustomSelect" name="month">
          <option selected>اختر الشهر ...</option>
          <?php foreach($months as $month):?>
            <option value="<?= $month ?>"><?= $month ?></option>
          <?php endforeach;?>
          </select>
          <br><br>
          <button type="submit" class="btn btn-primary">إضافة</button>
          <?php if(isset($_GET['monthly_inserted'])): ?>
            <span style="color:red;"> تمت اﻹضافة  </span>
          <?php endif;?>
          <br><br>
        </form> 
      </div>
      <div class="col-md-6" style="text-align:center">
        <h3 style="margin-top:10px;"> إضافة مدفوعات طارئة</h3>
        <br><br>
        <form action="<?=PUBLIC_ROOT.'admin/admin_add.php'?>" method="post" style="border-color: #030A44;border-style:solid;text-align:center;">
          <div class="form-group row">
            <label for="colFormLabel" class="col-sm-2 col-form-label">الوصف</label>
            <div class="col-sm-10">
              <input class="form-control" id="colFormLabel" name="description">
            </div>
          </div>
          <div class="form-group row">
            <label for="colFormLabel" class="col-sm-2 col-form-label">التكلفة</label>
            <div class="col-sm-10">
              <input type="number" class="form-control" id="colFormLabel" name="budget">
            </div>
          </div>
          <br><br>
          <button type="submit" class="btn btn-primary">إضافة</button>

          <?php if(isset($_GET['emergency_inserted'])): ?>
              <span style="color:red;">  تمت اﻹضافة  </span>
          <?php endif;?>

          <br><br>
        </form> 
        <br><br>
      </div>
    </div>
    <div class="col-md-3" >
      <a href="<?= PUBLIC_ROOT."index.php?admin=True"?>" style="text-decoration:none;color:black;"> <i class="fa fa-mail-reply" style="font-size:80px;color:black"></i> رجوع </a>
    </div> 
</div>
   
  
    
