<?php
session_start();
 include '../DB.php';

 if(isset($_POST['send'])){
     
    $ID = $_POST['id']; 
   
    

    $query = "SELECT * FROM user WHERE National_ID='$ID' LIMIT 1";
    $result = mysqli_query($con, $query);
    
    if($result)
    {
        $row= mysqli_fetch_array($result);
        $db_ID=$row['National_ID'];
   
        if($db_ID==$ID){
            
            header('Location: ../Forgotpass.php?status=valid&id='.$ID);
      

        }
        else {
            
            $query = "SELECT * FROM admin WHERE ID='$ID' LIMIT 1";
            $result = mysqli_query($con, $query);
            if($result)
            {
                $row= mysqli_fetch_array($result);
                $db_ID=$row['ID'];
                if($db_ID==$ID){
            
                   header('Location: ../Forgotpass.php?status=valid&id='.$ID);
     
                }
            
                else {
                    header('Location: ../Forgotpass.php?status=notfound');    
                }
            
            }
            
        }
    }
        
 }
 
 if(isset($_POST['reset'])){
     
     $ID = $_POST['id']; 
     $pass = $_POST['pwd']; 
     $passcon = $_POST['pwdc'];
     
     $query = "SELECT * FROM user WHERE National_ID='$ID' LIMIT 1";
    $result = mysqli_query($con, $query);
     $row= mysqli_fetch_array($result);
     $db_pass=$row['Password'];
     
    // echo $db_pass;
     if($pass==$passcon){
         
         $query = "SELECT * FROM user WHERE National_ID='$ID' LIMIT 1";
        $result = mysqli_query($con, $query);
        $row= mysqli_fetch_array($result);
        $db_pass=$row['Password'];
         
        if($db_pass!=$pass){
            
            $sql="UPDATE user SET Password='$pass' where National_ID='$ID'";
            $result = mysqli_query($con, $sql);
            if($result){
                header('Location: ../Login.php?status=done');
            }
            else {
                header('Location: ../Forgotpass.php?status=notdone');
            }
        }
        else {
           header('Location: ../Forgotpass.php?status=used&id='.$ID); 
        }
        
        
        /////////////admin
        
        $query1 = "SELECT * FROM admin WHERE ID='$ID' LIMIT 1";
        $result1 = mysqli_query($con, $query1);
        $row1= mysqli_fetch_array($result1);
        $db_pass1=$row1['Password'];
         
        if($db_pass1!=$pass){
            
            $sql="UPDATE admin SET Password='$pass' where ID='$ID'";
            $result = mysqli_query($con, $sql);
            if($result){
                header('Location: ../Login.php?status=done');
            }
            else {
                header('Location: ../Forgotpass.php?status=notdone');
            }
        }
        else {
           header('Location: ../Forgotpass.php?status=used&id='.$ID); 
        }
        
        
        
        
         
    }
    else {
         header('Location: ../Forgotpass.php?status=invalid&id='.$ID);
     }
     
 
     
     
 }