<header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        
        <div class="collapse navbar-collapse" id="navbarText">
        <span class="navbar-text">
             مرحبا" بك فى عمارة 21 
            </span>
            <ul class="navbar-nav mr-auto">
            <?php 
            if(!isset($_GET["user_id"]) and !isset($_GET["admin"])):?>
                <li class="nav-item">
                    <a class="nav-link" href="<?=PUBLIC_ROOT."index.php#about_us";?>"> من نحن؟ </a>
                    
                </li>
            <?php endif;?>
            <?php if(isset($_GET["admin"])):?>
            <li class="nav-item">
                <a class="nav-link" href="<?=PUBLIC_ROOT."index.php?admin=true#box";?>">مبلغ الصندوق </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?=PUBLIC_ROOT."index.php?admin=true#control";?>">لوحة التحكم </a>
            </li>
            <?php endif;?>
            <?php
                if( is_get_request())
                { 
                    if( isset($_GET["error"])): ?>
                        <li>
                            <p style="color:red;padding-left:30px;font-size:20px;"> رجاء التاكد من رقم الشقة أو كلمة المرور </p>
                        </li>
                  <?php endif;
                      
                }
                  ?>
            <?php 
            if(!isset($_GET["user_id"]) and !isset($_GET["admin"])):?>
            <li class="nav-item active">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
               تسجيل دخول 
                </button>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header" style="float:right;" > 
                                <span aria-hidden="true"> &times;</span>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <h5  style="margin-right:20px;" class="modal-title" id="exampleModalLabel">مٌتاح لسكان عمارة 21 </h5>
                                </button>
                            </div>
                            <form  action="<?=PUBLIC_ROOT."index.php"?>" method = "POST">
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="formGroupExampleInput">رقم الشقة</label>
                                        <input type="number" name="dep_id" class="form-control" id="formGroupExampleInput" placeholder="Example input">
                                    </div>
                                    <div class="form-group">
                                        <label for="formGroupExampleInput2">كلمة المرور</label>
                                        <input type="text" name="password" class="form-control" id="formGroupExampleInput2" placeholder="Another input">
                                    </div>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal" style="background-color:#007bff;">إغلاق</button>
                                    <input  class="btn-secondary btn" style="background-color:#007bff;" type="submit" value="تسجيل"> 
                                </div>  
                          </form>
                        </div>
                    </div>
                 </div>
            </li>
            <?php else:?>
              <li> <a href="<?=PUBLIC_ROOT."index.php" ?>"><button type="button" class="btn btn-primary"> تسجيل خروج  </button> </a> </li>
            <?php endif;?>
            </ul>
        </div>
    </nav>
    <img src="<?=IMAGE_PATH."building.jpg" ?>">    
</header> 
