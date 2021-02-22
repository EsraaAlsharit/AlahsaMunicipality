<?php
session_start();
include '../DB.php';
  
    $ID=$_POST['ID'];
    $Fname= $_POST['fullname'];
    $brithday= $_POST['date'];
    $Email= $_POST['email'];
    $phone=$_POST['phone'];
    $gander=$_POST['gander'];
    $pass=$_POST['password'];
    $passcon=$_POST['confirmpassword'];  
    
    
    if($passcon==$pass){
    
    $sql = "SELECT * FROM user WHERE National_ID='$ID' LIMIT 1";
    $res = mysqli_query($con, $sql);
    
    $row= mysqli_fetch_array($res);
  $db_ID=$row['National_ID'];
    if($ID!==$db_ID){

    $query = "INSERT INTO user(National_ID,Full_Name,Birthday,Email,Phone,Gender,Password) VALUES ('$ID', '$Fname', '$brithday', '$Email', '$phone', '$gander', '$pass')";

    $result = mysqli_query($con, $query);

    if($result){

       header('Location: ../index.php?status=valid');


    }
    else {
       header('Location: ../Register.php?status=invalid');


    }
    
    
    }
 else {
        
     header( "Location: ../Register.php?status=used" );

     
}
    }
 else {
     
     header( "Location: ../Register.php?status=notequal" );
        
}