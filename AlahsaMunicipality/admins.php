 <?php $title="المدراء"; 
 include 'Header.php';

   if(!isset($_SESSION['admin'])){
     header("Location: Error.php");
    }
 
    
        if(isset($_POST['Add'])){
        
        $ID=$_POST['ID'];
        $pass=$_POST['Password'];
        $em=$_POST['Email'];
        
        
        $sql = "SELECT * FROM admin WHERE ID='$ID' LIMIT 1";
    $result = mysqli_query($con, $sql);
    
    $row= mysqli_fetch_array($result);
        $db_ID=$row['ID'];
      
    if($ID!=$db_ID){
        
        $sql = "INSERT INTO admin (ID, Password, Email) VALUES ('$ID','$pass', '$em')";
        
        $res = mysqli_query($con, $sql);
        
        if($res){
            header( "Location: admins.php?status=valid" );
        } else {
            header( "Location: admins.php?status=invalid" );
        }
    }
    else {
            header( "Location: admins.php?status=used" );
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
 <?php if(isset($_GET['status']) and $_GET['status']==="invalid"){ ?>
          <div  style="text-align: right;" class="alert alert-danger alert-dismissible ">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>خطأ: </strong> لم يتم ادخال المعلومات بشروط الصحيحه.
        </div>
            
<?php  } if(isset($_GET['status']) and $_GET['status']==="used"){ ?>
                <div style="text-align: right;" class="alert alert-info alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>ملاحظة: </strong>تم استخدام هوية العضو هذا من قبل يرجى تغيره.
        </div> 
<?php  } if(isset($_GET['status']) and $_GET['status']==="valid"){ ?>
               <div  style="text-align: right;" class="alert alert-success alert-dismissible ">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>تم بنجاح.</strong>
  </div>
<?php  }?>
      
	  
	 <div class="section-title">
                    <h2>اضافة مدراء النظام</h2>
                    <p>اضافة مدير جديد</p>
                </div>
          <form action="admins.php" method="POST" >
	 
	 <p style="text-align:right; color:brown;">هوية العضو/ID</p>
                       
              <div class="form-row">
                <div class="col-md-6 form-group">
                    <input type="text" class="form-control" name='ID' maxlength="10" minlength="10"
                    placeholder="هوية العضو/ID" oninput="setCustomValidity('')"
                         required oninvalid="this.setCustomValidity('أحرف لا تقل عن 10')"
                       />
             
                </div>
                
                </div>
         
          <p style="text-align:right; color:brown;">البريد الاكتروني</p>
                       
              <div class="form-row">
                <div class="col-md-6 form-group">
                    <input type="email" class="form-control" name="Email" placeholder="البريد الاكتروني"
                         required oninvalid="this.setCustomValidity('هذا الحقل مطلوب')" oninput="setCustomValidity('')"/>
             
                </div>
               
                </div> 

        
     

               <p style="text-align:right; color:brown;">كلمة المرور</p>
                       
              <div class="form-row">
                <div class="col-md-6 form-group">
                  <input type="password" class="form-control" minlength="8" name="Password" placeholder="كلمة المرور"
                         required oninvalid="this.setCustomValidity('لا يقل عن 8 أحرف')" oninput="setCustomValidity('')"/>
             
                </div>
               
                </div>            
            
               <div class="text-center php-email-form"><button name="Add" type="submit" >إرسال</button></div>
                </form>
 
                </div>           
                
                
                


            </section>
        
        

     
	  <section id="contact" class="contact">
              <div class="container" data-aos="fade-up">
            <div class="section-title">
                    <h2>استعراض مدراء النظام</h2>
                    <p>استعراض المدراء</p>
                </div>
                
                <div class="row justify-content-center"> 
                    
                    
                       <div class="tables">
          <?php
          
          $sql = "SELECT ID, Email FROM admin";
          
                $resultset= mysqli_query($con, $sql);
               if(mysqli_num_rows($resultset)>0){
       ?>
            <form  method="POST" action="UserPage.php" >
        
           
                <table>
                    <tr>
            
                        <th>
                            <label for="no">هوية العضو</label>
                        </th>
                        <th>
                            <label for="no">بريد الاكتروني</label>
                        </th>

                        <!--th>
                            <label for="no">حالت الطلب</label>
                        </th-->
                    </tr>
    

          <?php 
         
         
               $user=array();
               while($row = mysqli_fetch_assoc($resultset)){

                $user[$row['ID']]= array(
                   'ID'=> $row['ID'],
                    'Email' => $row['Email'],
                   
                    );
                } 
             
                 foreach($user as $i) {?>
            <tr>
            
            <td>
               <label><?php echo $i['ID']; ?></label>
            </td>
            <td>
                <label><p><?php echo $i['Email']; ?></p></label>
            </td>   
                  
            <!--td>
                <button class="button" type="submit" name="delete" value="<?php echo $i['ID']; ?>">حذف</button>
 
                
            </td-->
           
        </tr>
                 <?php } ?>

        
    </table>
                </form>
            
            
                           <?php }
     else { ?>
         <h3>لا يوجد</h3> 
   <?php  }?>
        </div>
				
				
        
        <?php

?>


                </div>
            
	</div>		
				          
    </section>
        
    </body>
  
    <?php
    include 'Footer.php';
    ?>
</html>
