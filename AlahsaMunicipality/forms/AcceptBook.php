<?php
 
use PHPMailer\PHPMailer\PHPMailer;
        require_once '../PHPMailer/PHPMailer.php';
        require_once '../PHPMailer/SMTP.php';
        require_once '../PHPMailer/Exception.php';
    session_start();  
 include '../DB.php';
 $ID=$_GET['booking'];
 
  $query ="SELECT Email , sch.schedule_date, sch.schedule_time, ar.area_name, bo.booking_id FROM `user`as u INNER JOIN `booking` as bo ON bo.user_id = u.National_ID INNER"
            . " JOIN schedules as sch ON sch.schedule_id = bo.schedule_id INNER JOIN areas as ar ON sch.area_id = ar.area_id WHERE bo.booking_id='$ID'";
    $result = mysqli_query($con, $query);

$row = mysqli_fetch_assoc($result);

  $Em= $row['Email'];
  $area= $row['area_name'];
  $time= $row['schedule_time'];
  $date= $row['schedule_date'];
  
  $name=$_SESSION['admin'];
  $query = "SELECT * FROM admin WHERE ID='$name' LIMIT 1";
   $res = mysqli_query($con, $query);
   
   $row1= mysqli_fetch_array($res);
        $db_em=$row1['Email'];
  
  
  $mail = new PHPMailer();

//$mail->IsSMTP();                            // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';             // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                     // Enable SMTP authentication
$mail->Username = 'alahsamunicipalitykfu@gmail.com';          // SMTP username
$mail->Password = 'coopkfu2020'; // SMTP password
$mail->SMTPSecure = 'ssl';                  // Enable TLS encryption, `ssl` also accepted
$mail->Port = '587';//'465';                          // TCP port to connect to
$mail->setFrom($Em , 'Alahsa Municipality');
$mail->addAddress( $Em );   // Add a recipient


$mail->IsHTML(true);  // Set email format to HTML
$bodyContent = '<h4>عزيزي المستفید: تم تأكيد حجز موعد لزيارة '.$area.'  بتاریخ '.$date.'  الساعة '.$time.'  ویرجی منك الاحتفاظ بالموعد الإبرازه عند بوابة الدخول نسعد بزيارتكم ونتمنى منكم الالتزام بالإجراءات الاحترازية والتدابير الوقائية أمانة الأحساء
</h4>';


$mail->Subject = 'Alahsa Municipality';
$mail->Body    = $bodyContent;


if(!$mail->send()) {
    header("Location: ../Appointments.php?status=invalid");

} else {
    
 $query = "DELETE FROM booking WHERE booking_id='$ID'";
                $result = mysqli_query($con, $query); 
 if($result){
     header("Location: ../Appointments.php?status=valid");
  
}else {
    header("Location: ../Appointments.php?status=notdone");
  
}


    
  
    
}



