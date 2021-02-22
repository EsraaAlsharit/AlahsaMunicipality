 <?php $title="قبول ورفض المواعيد"; 
 include 'Header.php';
 
     if(!isset($_SESSION['admin'])){
     header("Location: Error.php");
    }
    
         if(isset($_POST['Accept'])){
           $idBo=$_POST['Accept'];
           header("Location: forms/AcceptBook.php?booking=".$idBo);

        }
    
        if(isset($_POST['Refusal'])){
            $idBo=$_POST['Refusal'];
              header("Location: Adminnote.php?booking=".$idBo);
            
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

/* Style the tab */
.tab {
  overflow: hidden;
  border: 1px solid #ccc;
  background-color: #f1f1f1;
}

/* Style the buttons that are used to open the tab content */
.tab button {
  background-color: inherit;
  float: left;
  border: none;
  outline: none;
  cursor: pointer;
  padding: 14px 16px;
  transition: 0.3s;
}

/* Change background color of buttons on hover */
.tab button:hover {
  background-color: #ddd;
}

/* Create an active/current tablink class */
.tab button.active {
  background-color: #ccc;
}

/* Style the tab content */
.tabcontent {
  display: none;
  padding: 6px 12px;
  border: 1px solid #fff;
  border-top: none;
}

#place{

width:100%;
height:30px;
font-weight: bold;
border:1px solid #DADADA;
border-radius: 4px;

}

        </style>

    <title><?php echo $title; ?></title>
    </head>
    <body>

        <section id="contact" class="contact">
               <div class="container" data-aos="fade-up">
                    <?php if(isset($_GET['status']) and $_GET['status']==="invalid"){ ?>
          <div  style="text-align: right;" class="alert alert-danger alert-dismissible ">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>خطأ: </strong> لم يتم ارسال الرساله للمستخدم بنجاح.
        </div>
            
<?php  } if(isset($_GET['status']) and $_GET['status']==="valid"){ ?>
               <div  style="text-align: right;" class="alert alert-success alert-dismissible ">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>تم بنجاح.</strong> تم ارسال الرساله للمستخدم بنجاح.
  </div>
<?php  }  if(isset($_GET['status']) and $_GET['status']==="notdone"){ ?>
           <div  style="text-align: right;" class="alert alert-danger alert-dismissible ">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>خطأ: </strong> لم يتم ارسال الرساله للمستخدم بنجاح.
        </div>
<?php  }?>

        <div class="section-title">
          <h2>قبول ورفض المواعيد </h2>
          <p>تأكيد حجز مواعيد زيارات :</p>
        </div>

        <div class="tables">
                   <?php
 $sql="SELECT National_ID, Full_Name, sch.schedule_date, sch.schedule_time, ar.area_name, bo.reason, bo.booking_id FROM `user`as u "
       . "INNER JOIN `booking` as bo ON bo.user_id = u.National_ID INNER JOIN schedules as sch ON sch.schedule_id = bo.schedule_id INNER JOIN areas as ar ON sch.area_id = ar.area_id";
          
                $r= mysqli_query($con, $sql);
               if(mysqli_num_rows($r)>0){
       ?>

            <form method="POST" action="Appointments.php" >
               
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
                <label for="no">سبب الرياة</label>
            </th>
         
            <th>
                <label for="no">حالت الطلب</label>
            </th>
           

        </tr>
    
   <?php 

               $users=array();
               while($row = mysqli_fetch_assoc($r)){

                $users[$row['booking_id']]= array(
                   'id'=> $row['booking_id'],
                    'National_ID' => $row['National_ID'],
                    'Full_Name'=>$row['Full_Name'],
                    'area_name' => $row['area_name'],
                    'schedule_time'=>$row['schedule_time'],
                    'schedule_date' => $row['schedule_date'],
                    'reason' => $row['reason']
                    );
                } 
             
                 foreach($users as $j) {?>
        <tr>
            
            <td>
               <label><?php echo $j['National_ID']; ?></label>
            </td>
            <td>
                <label><p><?php echo $j['Full_Name']; ?></p></label>
            </td>
          
            <td>
               <label><?php echo $j['area_name']; ?></label>
            </td>
            <td>
                <label><?php echo $j['schedule_time']; ?></label>
            </td>
            <td>
             <label><?php echo $j['schedule_date']; ?></label>
            </td>
            <td>
               <label><p><?php echo $j['reason']; ?></p></label>
            </td>
            
            <td>
                  <button class="button" type="submit" name="Accept" value="<?php echo $j['id']; ?>" >قبول</button>
               
               
                
               
               
                  <button class="button" type="submit" name="Refusal" value="<?php echo $j['id']; ?>" > رفض</button>
            </td>
           
        </tr>
          <?php } ?>

    </table>
          </form>
                  <?php }
     else { ?>
         <h3>لا يوجد مواعيد مسجله</h3> 
   <?php  }?>
        </div>

        </div>
        </section>
        
    </body>
   <?php
    include 'Footer.php';
    ?>
</html>

