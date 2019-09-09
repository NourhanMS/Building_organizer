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
 <body>
   <div class="row">
      <div class="col-md-6" style="text-align:center">
        <h3 style="margin-top:10px;"> إضافة مدفوعات شهرية</h3>
        <br>
        <form style="border-color: #030A44;border-style:solid;text-align:center;">
          <div class="form-group row">
            <label for="colFormLabel" class="col-sm-2 col-form-label">الوصف</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="colFormLabel">
            </div>
          </div>
          <div class="form-group row">
            <label for="colFormLabel" class="col-sm-2 col-form-label">التكلفة</label>
            <div class="col-sm-10">
              <input type="number" class="form-control" id="colFormLabel" >
            </div>
          </div>
          <br>
          <?php $months=["يناير","فبراير","مارس","ابريل","مايو","يونيو","يوليا","اغسطس","سبتمبر","اكتوبر","نوفمبر","ديسمبر"]; ?>
          <select class="custom-select mr-sm-2" id="inlineFormCustomSelect">
          <option selected>اختر الشهر ...</option>
          <?php foreach($months as $month):?>
            <option value="1"><?= $month ?></option>
          <?php endforeach;?>
          </select>
          <br><br>
          <button type="submit" class="btn btn-primary">إضافة</button>
          <br><br>
        </form> 
      </div>
      <div class="col-md-6" style="text-align:center">
        <h3 style="margin-top:10px;"> إضافة مدفوعات طارئة</h3>
        <br><br>
        <form style="border-color: #030A44;border-style:solid;text-align:center;">
          <div class="form-group row">
            <label for="colFormLabel" class="col-sm-2 col-form-label">الوصف</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="colFormLabel">
            </div>
          </div>
          <div class="form-group row">
            <label for="colFormLabel" class="col-sm-2 col-form-label">التكلفة</label>
            <div class="col-sm-10">
              <input type="number" class="form-control" id="colFormLabel" >
            </div>
          </div>
          <br><br>
          <button type="submit" class="btn btn-primary">إضافة</button>
          <br><br>
        </form> 
        <br><br>
      </div>
    </div>
    <div class="col-md-3" >
      <a href="<?= PUBLIC_ROOT."index.php?admin=True"?>" style="text-decoration:none;color:black;"> <i class="fa fa-mail-reply" style="font-size:80px;color:black"></i> رجوع </a>
    </div> 
</div>

   
  
    
