<!DOCTYPE html>
<html>
<head>
</head>
<body>
<div class="container">

<hr>
	<?php 
		session_start();
		
		
		if(isset($_GET['send'])){
			// unset($_SESSION['receipt_pdf']);
			$receipt =$_SESSION['receipt_pdf'];
			$email =$_SESSION['email'];
			require 'PHPMailer-5.2-stable/PHPMailerAutoload.php';
			require 'credential.php';

			$mail = new PHPMailer;

			// $mail->SMTPDebug = 4;                               // Enable verbose debug output

			$mail->isSMTP();                                      // Set mailer to use SMTP
			$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
			$mail->SMTPAuth = true;                               // Enable SMTP authentication
			$mail->Username = 'wendellLaptopExpress@gmail.com';                 // SMTP username
			$mail->Password = 'supermegaultra1101';                           // SMTP password
			$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
			$mail->Port = 587;                                    // TCP port to connect to

			$mail->setFrom('wendellLaptopExpress@gmail.com', 'Laptop Express');
			$mail->addAddress($email);     // Add a recipient

			$mail->addReplyTo(EMAIL);
			// print_r($_FILES['file']); exit;
			// for ($i=0; $i < count($_FILES['file']['tmp_name']) ; $i++) { 
			// 	$mail->addAttachment($_FILES['file']['tmp_name'][$i], $_FILES['file']['name'][$i]);    // Optional name
			// }
			$mail->addAttachment($receipt);
			
			$mail->isHTML(true);                                  // Set email format to HTML

			$mail->Subject = 'Laptop Express Official Receipt';
			$mail->Body    = '<div style="border:none;">This is the copy of the receipt of the purchase item. Thank you for trusting us!.</b></div>';
			//$mail->AltBody = $_POST['message'];

			if(!$mail->send()) {
				$_SESSION['not_sent'] = 'Message not sent';
				header('location:../items.php');
				unset($email);
				// unset($receipt);
				exit();
			} else {
				$_SESSION['sent'] = 'Message has been sent';
				header('location:../items.php');
				unset($email);
				// unset($receipt);
				exit();
			}
		}
			
		
	 ?>
	
</body>
</html>
