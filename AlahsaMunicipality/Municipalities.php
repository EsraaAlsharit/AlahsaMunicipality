 <?php $title="قبول ورفض المواعيد"; 
 include 'Header.php';
 
    if(!isset($_SESSION['admin'])){
     header("Location: Error.php");
    }
    

    
   if(isset($_POST['ID'])){
            
     $are=$_POST['area'];
  
    $sql="update schedules set schedule_state=0 WHERE area_id='$are'";
           
            $result1= mysqli_query($con, $sql);
    
        $ids=$_POST['book'];
        foreach($ids as $selected){
          
            $sql="update schedules set schedule_state=1 where schedule_id='$selected'";
       
           $result1= mysqli_query($con, $sql);
           header('Location: Municipalities.php?status=valid');
            
   
            }
 
        }

        
        if(isset($_POST['add'])){
    
    $name=$_POST['name'];
    
     $sqll = "SELECT * FROM areas WHERE area_name='$name' LIMIT 1";
    $resa = mysqli_query($con, $sqll);
    
    $row= mysqli_fetch_array($resa);
        $db_name=$row['area_name'];
        
   if($name!=$db_name){
       
       $sql="insert into areas (area_name) values ('$name')";
        $result= mysqli_query($con, $sql);
        
        if($result){
            header( "Location: Municipalities.php?status=valid" );
        } else {
            header( "Location: Municipalities.php?status=invalid" );
        }
       
   }
     else {
            header( "Location: Municipalities.php?status=used" );
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

.button{
    
    width: 20%;
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

#place{

width:100%;
height:30px;
font-weight: bold;
border:1px solid #DADADA;
border-radius: 4px;

}
#reason{

width:90%;

font-weight: bold;
border:1px solid #DADADA;
border-radius: 4px;

}

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

.custom-checkbox .custom-control-input:checked ~ .custom-control-label::before {
  background-color: green!important;
}

.custom-checkbox .custom-control-input:checked:focus ~ .custom-control-label::before {
  box-shadow: 0 0 0 1px #fff, 0 0 0 0.2rem rgba(0, 255, 0, 0.25)
}
.custom-checkbox .custom-control-input:focus ~ .custom-control-label::before {
  box-shadow: 0 0 0 1px #fff, 0 0 0 0.2rem rgba(0, 255, 0, 0.25)
}
.custom-checkbox .custom-control-input:active ~ .custom-control-label::before {
  background-color: #C8FFC8; 
}

.button1 {
    background-color: #ffc34d;
    width: 100%;
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


        </style>
        
    <title><?php echo $title; ?></title>
    </head>
    <body>
        
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
            <strong>ملاحظة: </strong>تم استخدام هذا لاسم من قبل يرجى تغيره.
        </div> 
<?php  } if(isset($_GET['status']) and $_GET['status']==="valid"){ ?>
               <div  style="text-align: right;" class="alert alert-success alert-dismissible ">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>تم بنجاح.</strong>
  </div>
<?php  }?>

            <div class="section-title">
                <h2>اضافة وحذف المواعيد</h2>
                <p>مواعيد البلديات :</p>
            </div>

               <div class="text-center">
           
                   <form action="Municipalities.php" method="post" role="form" class="php-email-form">
           
            
                   <div class="row">
           <div class="form-group col-md-3">
        <label> أختر الموقع</label>
            </div>
           <div class=" col-md-9">
        <select name="area_id" dir="rtl" id="place" onchange="this.form.submit()">
        <option disabled selected value="">اختر البلدية</option>
        <?php
        
        $sql="select * from areas";
        $result= mysqli_query($con, $sql);
        if($result){
            while ($row = mysqli_fetch_array($result)) {?>
        <option <?php  if(isset($_POST['area_id']) && $_POST['area_id'] == $row['area_id']){ echo 'selected'; } ?> value="<?php echo utf8_encode($row['area_id']); ?>"><?php echo $row['area_name']; ?></option>
        <?php
            }
        }
        
        ?>
    </select>
            </div>
        </div>
                  

            </form>
                    <!--div1 class="center">
             <button class="button1" onclick="window.location.href='NewMunicipality.php'">إضافت بلدية</button>
             </div1-->
                   
                   <br>
    </div>

          
          
         <?php
         if(isset($_POST['area_id'])){
             $area_id=$_POST['area_id'];
        $today=date('Y-m-d');
        $sql="select * from schedules where area_id= '$area_id' and schedule_date>='$today' group by schedule_date ";
        $result= mysqli_query($con, $sql);
        if(mysqli_num_rows($result)==0){
            echo'<p class="reserv-button">لاتوجد مواعيد </p>';
        } elseif(mysqli_num_rows($result)>0){ ?>
          
                  <form method="post" action="Municipalities.php">
              

  <div class="row">
          <div class="form-group col-md-2">
              <label>المواعيد</label>
           </div>
                <div class="">
              
        <div class="table-responsive">  
    <table class="table" style="text-align:center;">
        <input type="hidden" name="area" value="<?php echo $_POST['area_id']; ?>" >
        <thead>   <caption>
    مفعل <i class='bx bxs-message-square-check text-success' style="margin-left:10px;"></i>
    غير مفعل  <i class='bx bxs-message-square '></i></caption>
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
                             <div class="myTest custom-control custom-checkbox">
    <input type="checkbox" class="custom-control-input" name="book[]" id="<?php echo $row1['schedule_id']; ?>" value="<?php echo $row1['schedule_id']; ?>" checked>
      <label class="custom-control-label" for="<?php echo $row1['schedule_id']; ?>"><?php echo $row1['schedule_time']; ?> </label>
   
    </div>
                
                    
              
            </td>
                
          <?php  } else { ?>
            <td>
               
                      <div class="myTest custom-control custom-checkbox">
<input type="checkbox" class="custom-control-input" name="book[]" id="<?php echo $row1['schedule_id']; ?>" value="<?php echo $row1['schedule_id']; ?>">
      <label class="custom-control-label" for="<?php echo $row1['schedule_id']; ?>"><?php echo $row1['schedule_time']; ?> </label>
     
    </div>
                
                
             
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
                <button type="submit" name="ID" class="button" value="<?php echo $users['booking_id']; ?>">تطبيق</button></div>
           
        </div>
    </div>
      
              </div>
                       </form>
      <?php      
        }
        }
         
         ?>

          </div>
        </section>
        
        <section id="contact" class="contact">
      <div class="container" data-aos="fade-up">
      
           <div class="section-title">
                <h2>اضافة بلدية</h2>
                <p>بلدية:</p>
            </div>

        <div class="row mt-5">

          
          <div class="col-lg-12 mt-5 mt-lg-0">

              <!--p style="text-align:right; color:brown;">اسم البلديه</p-->

              
              <form action="Municipalities.php" method="POST" >
              <div class="form-row">
                  
                  <div class="col-md-1 form-group">
                      <label> اسم البلديه</label>
                  
                  </div>
                  
                <div class="col-md-8 form-group">
                    <input type="text" class="form-control"  
                           oninput="setCustomValidity('')" name="name"
                         required oninvalid="this.setCustomValidity('هذا حقل مطلوب')"
                       />
             
                </div>
                  <div class="col-md-3 form-group">
                      <input type="submit" class="button1" name="add" value="إضافة"   >
                  
                  </div>
              </div>
              </form>
              
          </div>
          </div>  
      </div>
 </section>

       
        
    </body>
    
   <?php
   

    include 'Footer.php';
    ?>
</html>

