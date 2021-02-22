 <?php $title="قبول ورفض المواعيد"; 
 include 'Header.php';
 
    if(!isset($_SESSION['admin'])){
     header("Location: Error.php");
    }
    



    $id = $_GET['booking'];
    
    $query ="SELECT Email , sch.schedule_date, sch.schedule_time, ar.area_name, bo.booking_id FROM `user`as u INNER JOIN `booking` as bo ON bo.user_id = u.National_ID INNER"
            . " JOIN schedules as sch ON sch.schedule_id = bo.schedule_id INNER JOIN areas as ar ON sch.area_id = ar.area_id WHERE bo.booking_id='$id'";
    $result = mysqli_query($con, $query);

while($row = mysqli_fetch_assoc($result)){

                $users= array(
                   'booking_id'=> $row['booking_id'],
                    'Email' => $row['Email'],
                    'area_name' => $row['area_name'],
                    'schedule_time'=>$row['schedule_time'],
                    'schedule_date' => $row['schedule_date']
               
                    );
                } 


 
 ?>
<!DOCTYPE html>
<html lang="ar">
    <head>
        
        <style>
            
          
     .tables form{
    width: 100%;
    text-align: center;
    margin: 0 auto;
    }


    table{
        width: 100%;
    }

.tables form tr{
    width: 100px;
    border: 1px solid #CCC;
    background: #f5efe8;
    
}

.tables form th:nth-child(odd){
   
    background: #e2caaf;
    
}
.tables form th:nth-child(even){
   
    background: #e8d3bf;
    
}
td label,th label{
    color: #95744c;
}


.tables form th {
    width: 100px;
    border-right: 1px solid #CCC;
    vertical-align: middle;
    padding: 8px;
}
.tables form td {
    width: 100px;
    padding: 15px 15px;
    border-right: 1px solid #CCC;
}

.tables form td:nth-child(odd){
   
    background: #f5efe8;
    
}
.tables form td:nth-child(even){
   
    background: #f9f5f1;   
}

.button{
    
    width: 70px;
    
    text-align: center;
    background: #922125;
    color: white;
    border: none;
     text-align: center;
  cursor: pointer;
  outline: none;
    -webkit-border-radius: 8px;
    border-radius: 8px;    
    font-size: 14px;
    padding: 10px;
    margin: 4px;
      box-shadow: 0 3px #999;
}

.button{background-color: #3e8e41}

.button:active {
    
  background-color: #3e8e41;
  box-shadow: 0 5px #666;
  transform: translateY(4px);
  
}

.button:nth-child(even){
   
   background: #922125;   
}

.button:nth-child(odd){
   
   background: #00a753;  
}

.button:hover {box-shadow: 0 5px #666;}
        </style>
        
        <?php
  
            ?>
    <title><?php echo $title; ?></title>
    </head>
    <body>
 <section id="contact" class="contact">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>قبول ورفض المواعيد </h2>
          <p>تأكيد حجز مواعيد زيارات   :</p>
        </div>

          <div class="text-center">

              <form action="forms/contactBook.php" method="post" role="form" class="php-email-form">
           
              <div class="form-group">
                  <input type="text" class="form-control" name="email" required
                         oninvalid="this.setCustomValidity('يرجى ادخال الايميل')" oninput="setCustomValidity('')"
                         value="<?php echo $users['Email']; ?>" />
                
                <div class="validate"></div>
              </div>
              <div class="form-group">
                  <textarea class="form-control" name="message" rows="5"
                             oninvalid="this.setCustomValidity('يرجى كتابة الرسالة التي تود إيصالها')" oninput="setCustomValidity('')"
                            placeholder="الرسالة" required>الموعد المحجوز في <?php echo $users['area_name']; ?> بتاريخ <?php echo $users['schedule_date']; ?>  الساعة <?php echo $users['schedule_time']; ?>  مرفوض بسبب </textarea>
                <div class="validate"></div>
              </div>
      
              </div-->
              <div class="text-center"><button type="submit" name="ID" value="<?php echo $users['booking_id']; ?>">إرسال</button></div>
            </form>

          </div>

           

        </div>

      
    </section>
    
  


        
    </body>
   <?php
    include 'Footer.php';
    ?>
</html>
 <?php 
 
 
 ?>
