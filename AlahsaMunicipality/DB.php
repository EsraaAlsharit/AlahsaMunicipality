<?php
 //session_start();
$host="localhost";
$user="root";
$pwd="";
$db="AlahsaMunicipality";

$con= mysqli_connect($host, $user, $pwd, $db);

if(mysqli_connect_errno($con)){
    echo mysqli_connect_error();
}
 else {
  //  echo 'concted to db';
        
}







