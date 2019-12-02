<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'src/Exception.php';
require 'src/PHPMailer.php';
require 'src/SMTP.php';
require 'koneksi.php';

$emailTo = $_POST["email_admin"];
$code = uniqid(true);
$query = mysqli_query($koneksi, "INSERT INTO token_admin (kode,email) VALUES ('$code','$emailTo')");
if (!$query) {
    exit("ERROR");
}
// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings                   // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 's67023671@gmail.com';                     // SMTP username
    $mail->Password   = 'IndowebsteR9';                               // SMTP password
    $mail->SMTPSecure = 'tls';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
    $mail->Port       = 587;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('sipadisumberdadi@gmail.com', 'Sipadi (Sistem Informasi Pertanian Sumberdadi)');
    $mail->addAddress($emailTo);            // Name is optional
    $mail->addReplyTo('no-reply@gmail.com', 'No reply');

    // Content
    $url = "http://" . $_SERVER["HTTP_HOST"] . dirname($_SERVER["PHP_SELF"]) . "../../../../views/login/resetpassword.php?code=$code";
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Alamat Reset Password';
    $mail->Body    = "<h1>Berikut adalah alamat untuk reset password anda</h1> 
    Klik!! <a href='$url'>Reset Password</a>
    ";
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';
    echo '<br>';
    echo '<a href="../../../views/login/login.php">Kembali</a>';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
