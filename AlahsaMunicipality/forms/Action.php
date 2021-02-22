<?php
session_start();
 include '../DB.php';


    $ID = $_POST['id']; 
    $pwd = $_POST['pwd']; 
    

    $query = "SELECT * FROM user WHERE National_ID='$ID' LIMIT 1";
    $result = mysqli_query($con, $query);
    
    if($result)
    {
        $row= mysqli_fetch_array($result);
        $db_ID=$row['National_ID'];
        $db_pass=$row['Password'];
        if($db_ID==$ID){
            
            if($pwd==$db_pass){
        $_SESSION['user']=$db_ID;

        header('Location: ../UserPage.php');

        }
        else {
            header('Location: ../Login.php?status=invalid');
        }
        }
        
        else {
            
         $query = "SELECT * FROM admin WHERE ID='$ID' LIMIT 1";
            $result = mysqli_query($con, $query);
            
            if($result){
                $row= mysqli_fetch_array($result);
                $db_ID=$row['ID'];
                $db_pass=$row['Password'];
        
             if($db_ID==$ID){
                 
                 if($pwd==$db_pass){
                    $_SESSION['admin']=$db_ID;

                    header('Location: ../index.php');

                    }
                    else {
                       header('Location: ../Login.php?status=invalid');
                    }
                 
             }
         else {
			
            header('Location: ../Login.php?status=notfound');
  
        }
         
        }
    
    }
    
        }
   
   
          
               
          
            
        

             
     
     

   
        