<?php

require("PHPMailer-5.2-stable/class.smtp.php");
require("PHPMailer-5.2-stable/class.phpmailer.php");

$errorMSG = "";

if (empty($_POST["name"])) {
    $name = "Undefined...";
} else {
    $name = $_POST["name"];
}

if (empty($_POST["email"])) {
    $email = "Undefined...";
} else {
    $email = $_POST["email"];
}

if (empty($_POST["phone"])) {
    $phone = "Undefined...";
} else {
    $phone = $_POST["phone"];
}

// prepare email body text
$Body = "";
$Body .= "Name: ";
$Body .= $name;
$Body .= "\n";
$Body .= "Email: ";
$Body .= $email;
$Body .= "\n";
$Body .= "Phone: ";
$Body .= $phone;
$Body .= "\n";

$mail = new PHPMailer();

//$mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'kidudstudents@gmail.com';                 // SMTP username
$mail->Password = 'k1dud123Stu';                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                    // TCP port to connect to

$mail->From = 'donotreply@kidud.co.il';
$mail->FromName = 'Kidud';
$mail->addAddress('imri.luzzattov@gmail.com');     // Add a recipient

$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'New Kidud Student';
$mail->Body    = $Body;

// redirect to success page
if ($mail->send() && $errorMSG == ""){
   echo "success";
}else{
    if($errorMSG == ""){
        echo "Something went wrong :(";
    } else {
        echo $errorMSG;
    }
}
?>

