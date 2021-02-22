<?php $title="تسجيل جديد"; 
       include 'Header.php';

  if(isset($_SESSION['user'])|| isset($_SESSION['admin'])){
     header("Location: error.php");
      }
       ?>

<html lang="ar">
    <head>
        
        <style>
            #selecter{
    width: 100%;
    height: 38px; 
    border: 1px solid #ced4da;
    color:  #7d858c;  
    border-radius: 4px;
}

#selecter:focus {
  border-color: #B54447;
}
        </style>
        
    </head>
    <body>
         <main id="main">
        <!-- ======= قسم التواصل ======= -->
    <section id="contact" class="contact">
      <div class="container" data-aos="fade-up">
          
<?php if(isset($_GET['status']) and $_GET['status']==="invalid"){ ?>
          <div  style="text-align: right;" class="alert alert-danger alert-dismissible ">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>خطأ: </strong> لم يتم ادخال المعلومات بشروط الصحيحه.
        </div>
            
<?php  } if(isset($_GET['status']) and $_GET['status']==="used"){ ?>
                <div style="text-align: right;" class="alert alert-info alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>ملاحظة: </strong>تم استخدام رقم الهوية هذا من قبل يرجى تحقق.
        </div> 
<?php  } if(isset($_GET['status']) and $_GET['status']==="notequal"){ ?>
          
          <div style="text-align: right;" class="alert alert-warning alert-dismissible ">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>تنبيه!</strong> لم يتم ادخال كلمة المرور بشكل متطابق.
  </div>
<?php } ?>
 <div class="text-center">
          
         <h3>فضلًا قم بتعبئة النموذج أدناه لاجراء حجز زيارة لأحد فروع أمانة الاحساء</h3>
        </div>
        <div class="row mt-5">

          
          <div class="col-lg-12 mt-5 mt-lg-0">

              <p style="text-align:right; color:brown;">البيانات الأساسية للمستخدم</p>
                      <?php


?>
              <form action="forms/NewAccount.php" method="POST" >
              <div class="form-row">
                <div class="col-md-6 form-group">
                    <input type="text" class="form-control"  onkeypress="return isNumeric(event)"
                           maxlength="10" minlength="10" name="ID"
                    placeholder="رقم الهوية/الأقامة" oninput="setCustomValidity('')"
                         required oninvalid="this.setCustomValidity('هذا حقل مطلوب')"
                       />
             
                </div>
                  <div class="col-md-6 form-group">
                      <input type="text" name="fullname" class="form-control" pattern="\S+\s+\S+\s+\S+" id="name" placeholder="الاسم الثلاثي"
                             required oninvalid="this.setCustomValidity('هذا حقل مطلوب')" oninput="setCustomValidity('')" >
                  
                  </div>
                <div class="col-md-6 form-group">
                    
                    <input type="date" class="form-control" name="date"  placeholder="تاريخ الميلاد"
                           required oninvalid="this.setCustomValidity('تاريخ الميلاد')" oninput="setCustomValidity('')"/>
                  </div>
                  
                    <div class="col-md-6 form-group" >
                    
                    <select  id="selecter" name="gander" placeholder="النوع"  >
                     
                      <option value="ذكر" selected>ذكر</option>
                      <option value="انثى" >انثى</option>
 
                    </select>
                  </div>
                </div>

              <p style="text-align:right; color:brown;">بيانات الاتصال</p>
          
              <div class="form-row">
                <div class="col-md-6 form-group">
                  <input type="email" name="email" class="form-control" placeholder="البريد الالكتروني" 
                         required oninvalid="this.setCustomValidity('يرجى إدخال بريد إلكتروني صحيح')" oninput="setCustomValidity('')" />
                
                </div>
                <div class="col-md-6 form-group">
                    <input type="tel" class="form-control"  minlength="10" maxlength="10" name="phone" placeholder="رقم الجوال"
                           required oninvalid="this.setCustomValidity('هذا حقل مطلوب')" oninput="setCustomValidity('')"/>
              
                </div>
                    
              
                </div>

               <p style="text-align:right; color:brown;">كلمة المرور</p>
                       
              <div class="form-row">
                <div class="col-md-6 form-group">
                  <input type="password" class="form-control" minlength="8" name="password" placeholder="كلمة المرور"
                         required oninvalid="this.setCustomValidity('لا يقل عن 8 أحرف')" oninput="setCustomValidity('')"/>
             
                </div>
                <div class="col-md-6 form-group">
                    <input type="password" class="form-control" minlength="8" name="confirmpassword"  placeholder="تأكيد كلمة المرور"
                           required oninvalid="this.setCustomValidity('هذا حقل مطلوب')" oninput="setCustomValidity('')"/>
              </div>
                </div>            
            
          

               <p style="text-align:right; color:brown;">اقرار</p>
                  
                <div class="form-row">
                <div class="col-md-6 ">
                    <div class="row">
                        <div class="text-left col-md-1 form-group">
                        <input type="checkbox" id="condition1" name="condition1"  clss="form-check-input"
                               required oninvalid="this.setCustomValidity('يرجى الموافقة على شروط')" oninput="setCustomValidity('')"/>
                    
                        </div>
                        <div class="text-right col-md-11">
                        <label for="condition1" class="form-check-label">اطلعت على شروط الاستخدام وأوافق عليها</label>
                        
                      </div>
                        </div>
                    </div>
                </div>
               <div class="form-row">
                <div class="col-md-6 ">
                    <div class="row">
                        <div class="text-left col-md-1 form-group">
                          <input type="checkbox" id="condition2" name="condition2" clss="form-check-input"
                                 required oninvalid="this.setCustomValidity('يرجى الموافقة على شروط')" oninput="setCustomValidity('')">
                         
                          
                        </div>
                        <div class="text-right col-md-11">
                          <label for="condition2" class="form-check-label">
                            أُقر وأتعهد بأن جميع البيانات المسجله صحيحه وخلاف ذلك سيتم اتخاذ كافة الاجراءات القانونية</label>
                        </div>
                    </div>
                </div>
               </div>
                  
                </div>
           
            <div class="text-center php-email-form"><button name="Signup" type="submit" >إرسال</button></div>
                </form>
               
            </div>
           
        </div>    
    </section>
  </main><!-- End #main -->
    </body>
    <script>
  function maxLengthCheck(object) {
    if (object.value.length > object.max.length)
      object.value = object.value.slice(0, object.max.length)
  }
    
  function isNumeric (evt) {
    var theEvent = evt || window.event;
    var key = theEvent.keyCode || theEvent.which;
    key = String.fromCharCode (key);
    var regex = /[0-9]|\./;
    if ( !regex.test(key) ) {
      theEvent.returnValue = false;
      if(theEvent.preventDefault) theEvent.preventDefault();
    }
  }
</script>
    <?php include 'Footer.php'; ?>
</html>