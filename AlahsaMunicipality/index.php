<?php 
ob_start();
session_start();
 include 'DB.php';
 include 'date.php';

$title="الصفحة الرئيسية";

?>
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
    </ul></nav>
      
	<!-- بداية القائمة -->
      <nav class="nav-menu d-none d-lg-block">
        <ul>
            <li class="active"><a href="index.php">الرئيسية</a></li>
          <li><a href="#about">عن الأمانة</a></li>
          <li><a href="#cta">خدماتنا</a></li>
          <!--li><a href="#portfolio">معرض الصور</a></li-->
          <li><a href="#contact">تواصل معنا</a></li>

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
          <h1>نسعد بزيارتكم ونتمنى منكم الإلتزام بالإجراءات الإحترازية والتدابير الوقائية
<span></span></h1>
          <h2>الأحساء ترحب بكم</h2>
        </div>
      </div>


    </div>
  </section><!-- نهاية لقسم العلوي -->

  <main id="main">

      
       <?php  if(isset($_GET['status']) and $_GET['status']==="valid"){ ?>
      
               <div  style="text-align: right;" class="alert alert-success alert-dismissible ">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>تم بنجاح.</strong>
  </div>
<?php  }?>        
     <!-- ===========عن الامانة========== -->
     <section id="about" class="contact">
  
      <div class="container" data-aos="zoom-in">
          

        <div class="text-center">
          <h3>عن الأمانة</h3>
          <p>
              أمانة محافظة الأحساء نشأت بمسمى ( بلدية الأحساء ) وكانت محدودة المهام ثم تطورت إلى أن تم ترقيتها في عام 2009 لتصبح أمانة ، وهي أحد الإدارات الحكومية المسؤولة عن تطوير مدينة الأحساء وضواحيها في كافة مرافقها من التخطيط العمراني وتوفير الطرق والإنارة والتجهيزات الأساسية وتحسين وتجميل المدينة بالإضافة إلى إدارة الخدمات اللازمة للحفاظ على نظافة وصحة البيئة.
              
          </p>
        </div>

      </div>
    </section><!-- نهايةعن الامانة -->

    <!-- ======= قسم زر الحجز ======= -->
    <section id="cta" class="cta">
      <div class="container" data-aos="zoom-in">

        <div class="text-center">
          <h3>إحجز موعدك</h3>
          <p>لزيارة أمانة الأحساء وبلدياتها الفرعية</p>
          <a class="cta-btn" href="Booking.php">حجز موعد</a>
        </div>

      </div>
    </section><!-- نهاية قسم الحجز -->

    <!-- ======= قسم التواصل ======= -->
    <section id="contact" class="contact">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>تواصل معنا </h2>
          <p>نسعد بتواصلكم معنا من خلال قنوات الاتصال او من خلال النموذج أدناه :</p>
        </div>

        <div>
		  <iframe style="border:0; width: 100%; height: 270px;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d28834.726627612403!2d49.600417447942014!3d25.39339948300081!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e3797a820e4f395%3A0x7071d2bce0839095!2z2KPZhdin2YbYqSDYp9mE2KPYrdiz2KfYoQ!5e0!3m2!1sar!2ssa!4v1592680842220!5m2!1sar!2ssa" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
		  
        </div>

        <div class="row mt-5">

          <div class="col-lg-4">
            <div class="info">
              <div class="address">
                <i class="icofont-google-map"></i>
                <h4>البريد الإلكتروني</h4>
                <p>info@alhasa.gov.sa</p>
              </div>

              <div class="email">
                <i class="icofont-envelope"></i>
                <h4>الرقم الموحد</h4>
                <p>920011050</p>
              </div>

              <div class="phone">
                <i class="icofont-phone"></i>
                <h4>الهاتف</h4>
                <p>0135825000</p>
              </div>

            </div>

          </div>

          <div class="col-lg-8 mt-5 mt-lg-0">

            <form action="forms/contact.php" method="POST" role="form" class="php-email-form">
              <div class="form-row">
                <div class="col-md-6 form-group">
                  <input type="text" name="name" class="form-control" id="name" placeholder="الاسم الثلاثي" data-rule="minlen:4" data-msg="الرجاء إدخال 4 أحرف على الأقل" />
                  <div class="validate"></div>
                </div>
                <div class="col-md-6 form-group">
                  <input type="email" class="form-control" name="email" id="email" placeholder="البريد الإلكتروني" data-rule="email" data-msg="يرجى إدخال البريد الإلكتروني الصحيح" />
                  <div class="validate"></div>
                </div>
              </div>
              <div class="form-group">
                <input type="text" class="form-control" name="subject" id="subject" placeholder="الموضوع" data-rule="minlen:8" data-msg="يرجى إدخال 8 أحرف على الأقل من الموضوع" />
                <div class="validate"></div>
              </div>
              <div class="form-group">
                <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="تفضل بكتابة الرسالة التي تود إيصالها لنا .." placeholder="الرسالة"></textarea>
                <div class="validate"></div>
              </div>
              <div class="mb-3">
                <div class="loading">تحميل</div>
                <div class="error-message"></div>
                <div class="sent-message">تم إرسال رسالتك بنجاح</div>
              </div>
              <div class="text-center"><button type="submit">إرسال</button></div>
            </form>

          </div>

        </div>

      </div>
    </section><!-- نهاية قسم التواصل -->
    
   

  </main><!-- End #main -->

  <!-- ======= ذيل الصفحة ======= -->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6">
            <div class="footer-info">
              <h3>أمانة الأحساء</h3>
         
              <div class="social-links mt-3">
            <a href="https://twitter.com/alhasamunicipal" class="twitter"><i class="bx bxl-twitter"></i></a>
                <a href="https://www.facebook.com/Al-Hasa-Municipality-107067309377986/" class="facebook"><i class="bx bxl-facebook"></i></a>
                <a href="https://www.instagram.com/alhasamunicipality/" class="instagram"><i class="bx bxl-instagram"></i></a>
              </div>
            </div>
          </div>

          <div class="col-lg-2 col-md-6 footer-links">
            <h4> العضويات</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <img width='30%' src='assets/img/idc-logo.png'> </li>
              <li><i class="bx bx-chevron-right"></i> <img width='30%' src='assets/img/meawardslogo2.png'> </li>

            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>الجوائز و الشهادات</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <img src='assets/img/unesco_whc_sau_al_ahsa_oasis.png'> </li>
              <li><i class="bx bx-chevron-right"></i> <img src='assets/img/The_capital_of_Arab_tourism.png'> </li>
              <li><i class="bx bx-chevron-right"></i> <img src='assets/img/Al Ahsa_Creative.png'> </li>
            </ul>
          </div>

          <div class="col-lg-4 col-md-6 footer-newsletter" dir='ltr'>
            <h4>التسجيل في النشرات الإعلانية</h4>
           
            <form action="" method="post" dir='ltr'>
              <input type="email" name="email" placeholder="الإشتراك عن طريق البريد الإلكترونى" ><input type="submit" value="الإشتراك">
            </form>
			
			<form action="" method="post" dir='ltr'>
              <input type="tel" name="tel" placeholder="الإشتراك عن طريق الجوال"><input type="submit" value="الإشتراك">
            </form>
			
          </div>

        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
         جميع الحقوق محفوظة لأمانة الأحساء &copy;
      </div>
      <div class="credits">
      
          تم تطويره بالتعاون مع <a href="https://www.kfu.edu.sa/sites/Home/" target="_blank">جامعة الملك فيصل بالأحساء</a>
      </div>
    </div>
  </footer><!-- نهاية ذيل الصفحة -->

  <a href="#" class="back-to-top"><i class="ri-arrow-up-line"></i></a>
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script><!--show up-->
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script><!--show up-->
  <script src="assets/vendor/venobox/venobox.min.js"></script>
  <script src="assets/vendor/waypoints/jquery.waypoints.min.js"></script>
  <script src="assets/vendor/counterup/counterup.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>