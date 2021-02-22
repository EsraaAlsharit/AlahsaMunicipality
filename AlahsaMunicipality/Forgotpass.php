<?php
 session_start();
 include 'DB.php';
 
  if(isset($_SESSION['user'])|| isset($_SESSION['admin'])){
     header("Location: error.php");
      }

  
   
      
      
 ?><html lang="ar">
<head>
    
    <title>  تسجيل دخول - أمانة الاحساء </title>
 
  
  <link rel="stylesheet" href="assets/css/style_login.css">

  <!-- الشعار بالتاب -->
  <link href="assets/img/favicon.png" rel="icon">
  
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon" sizes="300x300">

  <!-- رابط الخط -->
 <link href="https://fonts.googleapis.com/css2?family=Cairo&display=swap" rel="stylesheet">
 
 
 <style>
  
     .alert {
  position: relative;
  padding: 0.75rem 1.25rem;
  margin-bottom: 1rem;
  border: 1px solid transparent;
  border-radius: 0.25rem;
}

.alert-dismissible {
  padding-right: 4rem;
}

.alert-dismissible .close {
  position: absolute;
  top: 0;
  right: 0;
  padding: 0.75rem 1.25rem;
  color: inherit;
}

.alert-danger {
  color: #721c24;
  background-color: #f8d7da;
  border-color: #f5c6cb;
}

.alert-info {
  color: #0c5460;
  background-color: #d1ecf1;
  border-color: #bee5eb;
}



.container {
  width: 100%;
  padding-right: 15px;
  padding-left: 15px;
  margin-right: auto;
  margin-left: auto;
}

@media (min-width: 576px) {
  .container {
    max-width: 540px;
  }
}

@media (min-width: 768px) {
  .container {
    max-width: 720px;
  }
}

@media (min-width: 992px) {
  .container {
    max-width: 960px;
  }
}

@media (min-width: 1200px) {
  .container {
    max-width: 1140px;
  }
}


#preloader {
  position: fixed;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  z-index: 9999;
  overflow: hidden;
  background: #151515;
}

#preloader:before {
  content: "";
  position: fixed;
  top: calc(50% - 0px);
  left: calc(50% - 30px);
  border: 6px solid #B54447;
  border-top-color: #151515;
  border-bottom-color: #151515;
  border-radius: 50%;
  width: 60px;
  height: 60px;
  -webkit-animation: animate-preloader 1s linear infinite;
  animation: animate-preloader 1s linear infinite;
}

@-webkit-keyframes animate-preloader {
  0% {
    transform: rotate(0deg);
  }
  100% {
    transform: rotate(360deg);
  }
}

@keyframes animate-preloader {
  0% {
    transform: rotate(0deg);
  }
  100% {
    transform: rotate(360deg);
  }
}
 </style>
     
</head>
<body>
<div class="container" data-aos="fade-up">
    <?php if(isset($_GET['status']) and $_GET['status']==="notfound"){ ?>
          <div  style="text-align: right;" class="alert alert-danger alert-dismissible ">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>خطأ:</strong> لا يوجد مستخدم بهذا الاسم.
        </div>
<?php  } if(isset($_GET['status']) and $_GET['status']==="invalid"){ ?>
          <div  style="text-align: right;" class="alert alert-info alert-dismissible ">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>ملاحظة:</strong> كلمة المرور غير متطابقتين.
        </div>
<?php  } if(isset($_GET['status']) and $_GET['status']==="notdone"){ ?>
          <div  style="text-align: right;" class="alert alert-warning alert-dismissible ">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>حدث خطا:</strong> حاول مره اخره.
        </div>
<?php  } if(isset($_GET['status']) and $_GET['status']==="used"){ ?>
          <div  style="text-align: right;" class="alert alert-info alert-dismissible ">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>ملاحظة:</strong> هذي كلمة المرور السابقه الرجاء وضع كلمة مرور جديدة.
        </div>
<?php  }?>
    
    <div class="formF">
	<br>
        <h1>أمانة الأحساء </h1>
        
     
        <div class="hr">
     <hr id="hr1">
     
       <hr id="hr2">
        </div>
        
<?php if(isset($_GET['id'])) {?>
        
          <form  action="forms/Password.php" method="POST"  >
         
                         
                      
            <div class="inUser1">
                
            <div class="divImg">
                   <img id="imgUser1" src="assets/img/Lock.png">
                </div>
                
                <div class="divImg" id="div2">
                   <img id="imgUser1" src="assets/img/Lock.png">
                </div>
              
               
                
            </div>
              
            <div class="inUser form-group">
          
               <input  class="form-control" type="password" minlength="8" name="pwd" placeholder="كلمة المرور الجديد"
                        required oninvalid="this.setCustomValidity('يرجى ادخال كلمة المرور')" oninput="setCustomValidity('')">
               
               <input  class="form-control" type="password" minlength="8" name="pwdc" placeholder="تاكيد كلمة المرور"
                        required oninvalid="this.setCustomValidity('يرجى ادخال كلمة المرور')" oninput="setCustomValidity('')">
                
               
            </div>
                         
              <button  id="btnLogin" name="reset">إعادة تعيين كلمة المرور</button>
              <input type="hidden" name="id" value="<?php echo $_GET['id'];  ?>">
		</form>
        
        
<?php }else { ?>
        <form  action="forms/Password.php" method="POST"  >
         
                         
                      
            <div class="inUser1">
            <div class="divImg">
                <img id="imgUser" src="assets/img/UserMal.png">
              </div>
              
               
                
            </div>
            <div class="inUser form-group">
          
                <input class="form-control" type="text" name="id" maxlength="10" minlength="10" placeholder="رقم الهوية/الأقامة"
                       required oninvalid="this.setCustomValidity('يرجى ادخال رقم الهوية')" oninput="setCustomValidity('')">
                
               
            </div>
                         
            <button  id="btnLogin" name="send">ارسال طلب</button>
            
		</form>
       
        <button id="btnLogin" onclick="window.location.href='Login.php'">تسجيل دخول</button>
        
	
	
<?php } ?>
    </div>
    
</div>
   
     
   
</body>

  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
  <!--script src="assets/vendor/php-email-form/validate.js"></script-->
  <script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/venobox/venobox.min.js"></script>
  <script src="assets/vendor/waypoints/jquery.waypoints.min.js"></script>
  <script src="assets/vendor/counterup/counterup.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
</html>

