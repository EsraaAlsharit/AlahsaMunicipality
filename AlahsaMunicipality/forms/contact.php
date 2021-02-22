<?php

use PHPMailer\PHPMailer\PHPMailer;
        require_once '../PHPMailer/PHPMailer.php';
        require_once '../PHPMailer/SMTP.php';
        require_once '../PHPMailer/Exception.php';
      
  $name=$_POST['name'];
  $Em= $_POST['email'];
  $Sub=$_POST['subject'];
  $Des=$_POST['message'];
  
 /*  $admin=$_SESSION['admin'];
  $query = "SELECT * FROM admin WHERE ID='$admin' LIMIT 1";
   $result = mysqli_query($con, $query);
   
   $row= mysqli_fetch_array($result);
        $db_em=$row['Email'];*/
  
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
$bodyContent = '<h1>شكرا لتواصلك معنا </h1>';
$bodyContent .= '<h4>هذه رسالة إلكترونية لإعلامك بأننا تلقينا رسالتك وسنتصل بك في أقرب وقت ممكن</h4>';
$bodyContent .= '<h3>محتوى الرسالة</h3>';
$bodyContent.= '<div style="border: 2px solid #e8d3bf; background-color: #e2caaf; border-radius: 5px; padding: 10px;
  margin: 10px 0;" text-align: right;>
    <p ><b>الاسم : </b>'. $name.'</p><br>
        <p ><b>الموضوع : </b>'. $Sub.'</p><br>
  <p><b>الرساله :</b>'. $Des.'</p>
</div>';

$mail->Subject = 'Confirm receipt from Alahsa Municipality';
$mail->Body    = $bodyContent;


if(!$mail->send()) {
    echo 'Message could not be sent.';
  //  echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    $mail = new PHPMailer();

//$mail->IsSMTP();                            // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';             // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                     // Enable SMTP authentication
$mail->Username = 'alahsamunicipalitykfu@gmail.com';          // SMTP username
$mail->Password = 'coopkfu2020'; // SMTP password
$mail->SMTPSecure = 'ssl';                  // Enable TLS encryption, `ssl` also accepted
$mail->Port = '587';//'465';                          // TCP port to connect to

$mail->setFrom('alahsamunicipalitykfu@gmail.com' , 'Alahsa Municipality');
$mail->addAddress( 'alahsamunicipalitykfu@gmail.com' );   // Add a recipient
//$mail->setFrom('info@alhasa.gov.sa' , 'Alahsa Municipality');
//$mail->addAddress( 'info@alhasa.gov.sa' );   // Add a recipient



$mail->IsHTML(true);  // Set email format to HTML
    
    $bodyContent = '<h1>شكرا لتواصلك معنا </h1>';
$bodyContent .= '<h4>هذه رسالة إلكترونية لإعلامك بأن تم تلقي رساله من</h4>';
$bodyContent .= '<p><b>'.$name.'</b></p><br>';
$bodyContent .= '<h3>محتوى الرسالة</h3>';
$bodyContent.= '<div style="border: 2px solid #e8d3bf; background-color: #e2caaf; border-radius: 5px; padding: 10px;
  margin: 10px 0;" text-align: right;>
      <p><b>الايميل :</b>'. $Em.'</p><br>
    <p ><b>الموضوع : </b>'. $Sub.'</p><br>
  <p><b>الرساله :</b>'. $Des.'</p><br>
  
</div>';

$mail->Subject = 'Alahsa Municipality System ';
$mail->Body    = $bodyContent;
$mail->send();
    echo 'Check your email for further  details';
    
}



