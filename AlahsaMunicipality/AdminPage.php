 <?php $title="قبول ورفض المواعيد"; 
 include 'Header.php';

     if(!isset($_SESSION['admin'])){
     header("Location: Error.php");
    }
    
  ?>
<!DOCTYPE html>
<html lang="ar">
    <head>
    
        <style>
            
             .icons {
    width: 30px;
    height: 30px;
   margin-left: 5px;
   
}

.btnz {
    display: block;
    float: left;
    padding: 10px 15px;
    border:none;
    margin: 5px;
    width: 20%;
    background-color: #ececec;
    text-decoration: none;
    text-align: right;    
    font-size: 18px;
    color: #FFF;
}
.btnz:hover {
    box-shadow: 0 5px #151515;
    
}
.Appointments {
    background-color: #ac6e00;
}
.Municipalities {
    background-color: #b54447;
}
.admins {
    background-color: #ffa900;
}

        </style>
        
    </head>
    <body>
        <section id="contact" class="contact">
            <div class="container" data-aos="fade-up">
                <div class="section-title">
                    <h2>التحكم</h2>
                    <p>تحم بالمواعيد</p>
                </div>
                
                <div class="row justify-content-center"> 
        
        
           <a class="btnz share Municipalities" href="Municipalities.php">
    <img class="icons" src="assets/img/Municipality.png">
    البلديات</a>
    
        <a class="btnz Appointments" href="Appointments.php">
    <img class="icons" src="assets/img/calendar.png">
   المواعيد</a>

  <a class="btnz share admins" href="admins.php">
      <img class="icons" src="assets/img/admin.png">
    مدراء النظام</a>
    

 

                </div>
</div> 

            </section>
     
        
    </body>
  
    <?php
    include 'Footer.php';
    ?>
</html>
