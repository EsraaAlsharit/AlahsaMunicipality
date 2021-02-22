<?php  $title="احجز موعد"; 
include 'Header.php';
 if(!isset($_SESSION['user'])){
     header("Location: Login.php");
      }
      if(isset($_SESSION['user']) && ($_SESSION['user']==="admin")){
     header("Location: Error.php");}
     
$user_id=$_SESSION['user'];
// اضافة الحجز لقاعدة البيانات
if(isset($_POST['booking'])){
     $schedule_id=$_POST['book'];
  
    $reason=$_POST['reason'];
    echo $schedule_id;
  
        
         $qury="SELECT * FROM booking WHERE schedule_id='$schedule_id' AND user_id='$user_id'";
          $res= mysqli_query($con, $qury);
    $num=mysqli_num_rows($res);
     if($num == 0){
         
    $sql="insert into booking (schedule_id,user_id,reason) values ('$schedule_id','$user_id','$reason')";
    $result= mysqli_query($con, $sql);
    
    if($result){
        //$sql1="update schedules set schedule_state=0 where schedule_id ='$schedule_id'";
       //$result1= mysqli_query($con, $sql1);
      //  if($result) {
              header( "Location: userPage.php?status=valid" );
            //echo '<script>alert("تم حجز الموعد بنجاح")</script>';
//        }
    }
 else {
          header( "Location: Booking.php?status=invalid" );
    }
    }
 else {
       header( "Location: Booking.php?status=used" ); 
    }
   
}
?>
<!DOCTYPE html>
<html lang="ar">
    <head>
        
        
    <style>
     table {
    width: 100%;
    text-align: center;
    margin: 0 auto;
    }

  
    table tr{
    width: 100px;
    border: 1px solid #CCC;
    background: #f5efe8;
    }

    table th{
    
       background: #e8d3bf;
    }

td label,th label{
    color: #95744c;
}


table th {
    width: 100px;
    border-right: 1px solid #CCC;
    vertical-align: middle;
    padding: 5px;
}
table td {
    width: 100px;
    padding: 5px 5px;
    border-right: 1px solid #CCC;
}

table td:nth-child(odd){
   
    background: #f5efe8;
    
}
table td:nth-child(even){
   
    background: #f9f5f1;   
} 

label{
font-size:15px;
font-weight:700;
 display: inline-block;
    width: 50%;
    text-align: right;
}
#place{

width:100%;
height:30px;
font-weight: bold;
border:1px solid #DADADA;
border-radius: 4px;

}
#reason{


border:1px solid #DADADA;
margin-top:10px;
margin-bottom:10px;

width:100%;
font-size:14px;

}
input#date{
width:345px;
height:30px;
border:1px solid #DADADA;
margin-top:10px;
margin-bottom:10px;
padding-left:35px;
font-weight: bold;
font-size:15px;


}
input#time{
width:345px;
height:30px;
background-position:6px;
border:1px solid #DADADA;
margin-top:10px;
margin-bottom:10px;
padding-left:35px;
font-weight: bold;
font-size:15px;


}

input#submit {
background-color:#922125;
width: 100px;
border-radius:8px;
border:none;
color:#FFF;
font-size: 20px;

    padding: 10px;
    margin: 4px;  
}

h1{font-weight: bold;font-size: 50px;}

caption { 
    caption-side:top;
    text-align: right;
    background-color:#942D01;
    color:white;
    padding:10px;

 
}

td:first-child 
{
  position:sticky;
  right:0px;
  background-color: lightgray;
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
      background-color: #922125;
}



.button:active {
    
 
  box-shadow: 0 5px #666;
  transform: translateY(4px);
  
}

.button:hover {box-shadow: 0 5px #666;}


    </style>
        
    </head>
    <body>
        
  <section id="about" class="contact">
      <div class="container" data-aos="zoom-in">
          <?php if(isset($_GET['status']) and $_GET['status']==="invalid"){ ?>
          <div  style="text-align: right;" class="alert alert-danger alert-dismissible ">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>خطأ: </strong> لم يتم الحجز حول مره اخره.
        </div>
            
<?php  } if(isset($_GET['status']) and $_GET['status']==="used"){ ?>
                <div style="text-align: right;" class="alert alert-info alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>ملاحظة: </strong>تم تسجيل الموعد مسبقا يرجى تغيره.
        </div> 
<?php  } ?>

          <div class="text-center">
              <h3 style="font-weight: bold">حجز موعد</h3>
          </div>  
          
     <div class="row mt-5">

          
          <div class="col-lg-12 mt-5 mt-lg-0">

              <p style="text-align:right; color:brown;">أختر الموقع</p>
              
              <form method="post" action="Booking.php">
               <div class="form-row">
                <div class="col-md-12 form-group">
                       <select name="area_id" dir="rtl" id="place" onchange="this.form.submit()">
        <option disabled selected value="">اختر البلدية</option>
        <?php
        
        $sql="select * from areas";
        $result= mysqli_query($con, $sql);
        if($result){
            while ($row = mysqli_fetch_array($result)) {?>
        <option <?php  if(isset($_POST['area_id']) && $_POST['area_id'] == $row['area_id']){ echo 'selected'; } ?> value="<?php echo $row['area_id']; ?>"><?php echo $row['area_name']; ?></option>
        <?php
            }
        }
        
        ?>
            </select>
                    
                </div>
               </div>
              </form>
   <?php
         if(isset($_POST['area_id'])){
             $area_id=$_POST['area_id'];
        $today=date('Y-m-d');
        $sql="select * from schedules where area_id= '$area_id' and schedule_date>='$today' group by schedule_date ";
        $result= mysqli_query($con, $sql);
        if(mysqli_num_rows($result)==0){
            echo'<p class="reserv-button">لاتوجد مواعيد </p>';
        } elseif(mysqli_num_rows($result)>0){ ?>
              
   
    <!--/form-->
    
   
              
      
    </div>
       <div class="col-md-13">
            <p style="text-align:right; color:brown;">سبب الزيارة</p>
    
    <form method="post" action="Booking.php">
    <div class="row">
        <div class="col-md-12 ">
            <textarea  id="reason" name="reason" required rows="6" cols="45"></textarea> 
        </div>
    </div>
        
         <p style="text-align:right; color:brown;">المواعيد</p>
        <div class="table-responsive">  
            <!--form method="post" action="Booking.php"-->
    <table class="table" style="text-align:center;">
        <thead>   <caption>
    متاح <i class='bx bxs-message-square-check text-success' style="margin-left:10px;"></i>
    غير متاح  <i class='bx bxs-message-square-x text-danger'></i></caption>
    </thead>

    <tbody>
      
   
        <?php    while ($row = mysqli_fetch_array($result)) {
          $schedule_date = $row['schedule_date'];
          $sql1="select * from schedules where area_id= '$area_id' and schedule_date='$schedule_date' ";
        $result1= mysqli_query($con, $sql1);
        ?>
        
        <tr>
            <th class="reserv-button" >
                <div style="width:90px;">
               
                <?php
                echo $schedule_date;
                ?>
                 <i class='bx bx-calendar' ></i>
                </div>
            </th>
            <?php
        while ($row1 = mysqli_fetch_array($result1)) {
            if($row1['schedule_state']==1){?>
            <td>
                
                <label  for="<?php echo $row1['schedule_id']; ?>"><?php echo $row1['schedule_time']; ?><i class='bx bxs-message-square-check text-success'></i></label>
      <input type="radio"  name="book" id="<?php echo $row1['schedule_id']; ?>" value="<?php echo $row1['schedule_id']; ?>" >
              
            </td>
                
          <?php  } else { ?>
            <td>
                
      <label  for="<?php echo $row1['schedule_id']; ?>"><?php echo $row1['schedule_time']; ?><i class='bx bxs-message-square-x text-danger'></i></label>
      <input type="radio" disabled  name="book" id="<?php echo $row1['schedule_id']; ?>" value="<?php echo $row1['schedule_id']; ?>" >
                
            </td>
          <?php  } ?>

         

       
        
        <?php
          } ?>
          </tr>
         <?php   }
           ?>  
    </tbody>    
  </table>
            <div class="text-center">
                <button type="submit" name="booking" class="button" value="<?php echo $users['booking_id']; ?>">احجز</button></div>
          
        </div>
            </form> 
        </div>
          </div>
      <?php      
        }
        }
         
         ?>   
     </div>
          

         
              </div>
 
  </section>
       
    </body>

    
    <?php
    include 'Footer.php';
    ?>
</html>
