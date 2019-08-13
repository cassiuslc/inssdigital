 <!-- lc -->
<?php
//Enviando Email - Start
$nome = "test";
$ni = "123ab";
$tel = "999999";
$email = "oabam.info@oabam.org.br";
//Inicio Corpo do Email (Usar Aspas simples)
        $body = 'OLA TEST OLA';//Fim do Corpo do Email
    
            $servermail = "webmaster@oabam.org.br";
            $serversenha = "Qwe123321@";
        //Carrega as classes do PHPMailer
        require './PHPMailer/PHPMailerAutoload.php';
        $mail = new PHPMailer();
        $mail->IsSMTP(); // envia por SMTP
        $mail->CharSet = 'UTF-8';
        $mail->Host = "email-ssl.com.br"; // Servidor SMTP
        $mail->Port = 465;
        $mail->SMTPSecure = "ssl";
        $mail->SMTPAuth = true; // Caso o servidor SMTP precise de autenticação
        $mail->Username = $servermail; // SMTP username
        $mail->Password = $serversenha; // SMTP password
        $mail->From = $servermail; // De
        //$mail->AddAddress($servermail, $nome);
        $mail->AddAddress("informatica@oabam.org.br","test"); // Email e nome de quem receberá //Responder
        $mail->FromName = "INSS Digital (OAB/AM)"; // Nome de quem envia o email
        $mail->IsHTML = true; // Enviar como HTML
        //$mail->AddBcc($servermail); //cc Email
        $mail->Subject = "INSS Digital";
        $mail->Body = $body; //Corpo da mensagem caso seja HTML
    	//ADD TEST
        $mail->SMTPDebug = 4; //DEBUG
        //$mail->Send();
        //exit();
        //Enviando Email
if(!$mail->Send())
{
echo "Message was not sent";
echo "Mailer Error: " . $mail->ErrorInfo; 
exit(); 
}
echo "E-mail enviado!";
?>

