<?php 
 ob_start();
 session_start();
 include 'DB.php';
 include 'date.php';?>
<!DOCTYPE html>
<html lang="ar">
  <head>
  

      <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="descriptison">
  <meta content="" name="keywords">

  <!-- الشعار بالتاب -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon" sizes="300x300">

  <!-- رابط الخط -->
 <link href="https://fonts.googleapis.com/css2?family=Cairo&display=swap" rel="stylesheet">
 
  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">

  <!-- الستايل الاساسي -->
  <link href="assets/css/style.css" rel="stylesheet">
  
  <title><?php echo $title; ?>- أمانة الأحساء</title>
  </head>
  <body>
      <!-- ======= راس الصفحة ======= -->
  <header id="header" class="fixed-top ">
    <div class="container d-flex align-items-center justify-content-between">
  
      <h1 class="logo"><a href="index.php">
	  <img src='assets/img/logo.png'>
	  </a></h1>
        <nav class="nav-menu d-lg-block">
        <ul>
            <?php 
      
            if(isset($_SESSION['user']) || isset($_SESSION['admin'])){ ?>
            <li> <a href="logout.php">تسجيل خروج</a></li>
            
            <?php 
            if(!isset($_SESSION['user'])){ ?>
            <li> <a href="AdminPage.php">التحكم</a></li>
                <?php } if(!isset($_SESSION['admin'])){ ?>
            <li> <a href="UserPage.php">مواعيدي</a></li>
               <?php }
            }
            else {?>
            <li> <a href="Register.php">تسجيل جديد</a></li>  
            <li> <a href="Login.php">تسجيل دخول</a></li>   
            
            <?php } ?>  
                 
        </ul>
        </nav>
      
	<!-- بداية القائمة -->
      <nav class="nav-menu d-none d-lg-block">
        <ul>
            <li class="active"><a href="index.php">الرئيسية</a></li>
            <li><a href="index.php/../#about">عن الأمانة</a></li>
          <li><a href="index.php/../#cta">خدماتنا</a></li>
          <!--li><a href="#portfolio">معرض الصور</a></li-->
          <li><a href="index.php/../#contact">تواصل معنا</a></li>
        </ul>
          
      </nav><!-- نهاية القائنة -->

      <h1 class="logo"><a href="index.php">
	  <img src='assets/img/logo1.png' width='150px'>
	  </a></h1>
        

    </div>
  </header><!-- نهاية راس الصفحة -->

  <!-- ======= القسم العلوي ======= -->
  
  <section id="hero" class="d-flex align-items-center justify-content-center">
    <div class="container" data-aos="fade-up">

      <div class="row justify-content-center" data-aos="fade-up" data-aos-delay="150">
        <div class="col-xl-6 col-lg-8">
          <h1>نسعد بزيارتكم ونتمنى منكم الإلتزام بالإجراءات الإحترازية والتدابير الوقائية</h1>
          <h2>الأحساء ترحب بكم</h2>
        </div>
      </div>


    </div>
  </section><!-- نهاية لقسم العلوي -->  
  </body>
  

</html>