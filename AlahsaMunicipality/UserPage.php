<?php $title="الأستعلام عن طلب موعد زيارة أمانة"; 
include 'Header.php';
$ID=$_SESSION['user'];
 if(!isset($_SESSION['user'])){
     header("Location: Error.php");
      }
     if(isset($_SESSION['user']) && ($_SESSION['user']==="adminadmin")){
     header("Location: adminPro.php");}
     
     
     if(isset($_POST['delete'])){
         $delet=$_POST['delete'];
         
      $qury="DELETE FROM booking WHERE booking_id='$delet'";    
      $result= mysqli_query($con, $qury);
      
      
    
    if($result){
          
          header("Location: UserPage.php");
      }
      else {
             header("Location: UserPage.php?state=none");
      }
         
     }
        
    
?>
<!DOCTYPE html>
<html lang="ar">
    <head>
        
          <style>
              .tables{
                   text-align: center;
              }
          
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




.button:active {
    
 
  box-shadow: 0 5px #666;
  transform: translateY(4px);
  
}

.button:hover {box-shadow: 0 5px #666;}


.button1 {
    background-color: #ffc34d;
    width: 20%;
    color: black;
    text-align: center;
    position: relative;
      border: none;
  cursor: pointer;
  outline: none;
    -webkit-border-radius: 8px;
    border-radius: 8px;    
    font-size: 14px;
    padding: 10px;
    margin: 4px;
      box-shadow: 0 3px #999;
}
.button1:hover {box-shadow: 0 5px #666;}

.button1:active {
    
  box-shadow: 0 5px #666;
  transform: translateY(4px);
  
}

.center {
  
  position: absolute;
  left: 45%;
  width: 60%;

}
        </style>
        
    </head>
    <body>
 <section id="contact" class="contact">
      <div class="container" data-aos="fade-up">
          <?php if(isset($_GET['status']) and $_GET['status']==="valid"){ ?>
               <div  style="text-align: right;" class="alert alert-success alert-dismissible ">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>تم بنجاح.</strong>
  </div>
<?php  }?>

        <div class="section-title">
          <h2>الأستعلام </h2>
          <p>الأستعلام عن طلب موعد زيارات :</p>
        </div>


        <div class="tables">
          <?php
 $sql="SELECT National_ID, Full_Name, sch.schedule_date, sch.schedule_time, ar.area_name, bo.booking_id FROM `user`as u "
                  . "INNER JOIN `booking` as bo ON bo.user_id = u.National_ID INNER JOIN schedules as sch ON sch.schedule_id = bo.schedule_id INNER JOIN areas as ar ON sch.area_id = ar.area_id WHERE National_ID='$ID'";
          
                $Q= mysqli_query($con, $sql);
                if($Q){
                $num=mysqli_num_rows($Q);
               if($num>0){
       ?>
            <form  method="POST" action="UserPage.php" >
        
           
                <table>
                    <tr>
            
                        <th>
                            <label for="no">الارقام الهوية</label>
                        </th>
                        <th>
                            <label for="no">الاسم</label>
                        </th>
                         <th>
                            <label for="no">الموقع</label>
                        </th>
                        <th>
                            <label for="no">الوقت</label>
                        </th>
                        <th>
                            <label for="no">التاريخ</label>
                        </th>


                        <th>
                            <label for="no">حالت الطلب</label>
                        </th>
                    </tr>
    

          <?php 
         
         
               $user=array();
               while($row = mysqli_fetch_assoc($Q)){

                $user[$row['booking_id']]= array(
                   'booking_id'=> $row['booking_id'],
                    'National_ID' => $row['National_ID'],
                    'Full_Name'=>$row['Full_Name'],
                    'area_name' => $row['area_name'],
                    'schedule_time'=>$row['schedule_time'],
                    'schedule_date' => $row['schedule_date']
                    );
                } 
             
                 foreach($user as $i) {?>
            <tr>
            
            <td>
               <label><?php echo $i['National_ID']; ?></label>
            </td>
            <td>
                <label><p><?php echo $i['Full_Name']; ?></p></label>
            </td>
          
            <td>
               <label><?php echo $i['area_name']; ?></label>
            </td>
            <td>
                <label><?php echo $i['schedule_time']; ?></label>
            </td>
            <td>
             <label><?php echo $i['schedule_date']; ?></label>
            </td>
                  
            <td>
                <button class="button" type="submit" name="delete" value="<?php echo $i['booking_id']; ?>" >حذف</button>
 
                
            </td>
           
        </tr>
                 <?php } ?>

        
    </table>
                </form>
            
            
                           <?php }
     else { ?>
         <h3>لا يوجد مواعيد مسجله</h3> 
                <?php  }}?>
        </div>
          <div1 class="center">
             <button class="button1" onclick="window.location.href='Booking.php'">حجز موعد جديد</button>
             </div1>


        </div>

      
    </section>
    
  


        
    </body>
    <?php
    include 'Footer.php';
    ?>
</html>
