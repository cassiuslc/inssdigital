<!-- lc -->
<?php
// session_start inicia a sessão
session_start();
//Verifica o recaptcha google
if(isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response'])) {

$vetParametros = array (
   "secret" => "6Legp6wUAAAAAISS_54BUobY7rkCpeJuuZiU1sEA",//Chave Secreta Google --- Chave aqui
   "response" => $_POST["g-recaptcha-response"],
   "remoteip" => $_SERVER["REMOTE_ADDR"]
   );
# Abre a conexão e informa os parâmetros: URL, método POST, parâmetros e retorno numa string
$curlReCaptcha = curl_init();
curl_setopt($curlReCaptcha, CURLOPT_URL,"https://www.google.com/recaptcha/api/siteverify");
curl_setopt($curlReCaptcha, CURLOPT_POST, true);
curl_setopt($curlReCaptcha, CURLOPT_POSTFIELDS, http_build_query($vetParametros));
curl_setopt($curlReCaptcha, CURLOPT_RETURNTRANSFER, true);
$vetResposta = json_decode(curl_exec($curlReCaptcha), true);
# Fecha a conexão
curl_close($curlReCaptcha);
# Analisa o resultado (no caso de erro, pode informar os códigos)
if (!($vetResposta["success"])){
  $_SESSION['aviso']=md5('INSS-GVR02');
 header('Location: /enviar');
 exit();
 }else{//Acesso permitido
//Salvando dados\
$encoding = 'UTF-8';
       if (isset($_POST['nome'])) {
       $nome = $_POST['nome'];
       $nome=mb_convert_case( $nome, MB_CASE_UPPER, $encoding);
       $varnome = current(explode(" ", $nome));
       }
       if (isset($_POST['ni'])) {
           $ni = $_POST['ni'];
           $ni=mb_convert_case( $ni, MB_CASE_UPPER, $encoding);
       }
       if (isset($_POST['cpf'])) {
           $cpf = $_POST['cpf'];
       }
       if (isset($_POST['email'])) {
           $email = $_POST['email'];
       }
       if (isset($_POST['tel'])) {
           $tel = $_POST['tel'];
       }
//data e hora
       $data_envio = date('d/m/Y');
       $hora_envio = date('H:i:s');

///Verifica Vazio
       if (empty($tel) || empty($email) || empty($cpf) || empty($ni) || empty($nome)) {
           $_SESSION['aviso']=sha1('INSS-PTF01');
           header('Location: /enviar');
           exit();
       }
//Verifica CPF
       include "vercpf.php";
       if (!(validaCPF($cpf))) {
           $_SESSION['aviso']=sha1('INSS-CPF02');
           header('Location: /enviar');
           exit();
       }
//Verifica Email
       if (!(filter_var($email, FILTER_VALIDATE_EMAIL))) {
           $_SESSION['aviso']=sha1('INSS-EMF03');
           header('Location: /enviar');
           exit();
       }
       //Arquivos
             $filename = "sel01";
             if(isset($_FILES[$filename])){
                 if($_FILES[$filename]['error'] == 0){
                 if(empty($_FILES[$filename]['name'])){
                     if(empty($_FILES[$filename]['name'])&&(empty($_FILES['sel02']['name'])||empty($_FILES['sel03']['name'])||empty($_FILES['sel04']['name']))){
                         $_SESSION['aviso']=sha1('vazio-mais');
                         header('Location: /enviar');
                         exit();
                     }else{
                         $_SESSION['aviso']=sha1('vazio-sel01');
                         header('Location: /enviar');
                         exit();
                     }
                 }else{
                     if(((bool)$_FILES[$filename]['size'])>10000){
                         $_SESSION['aviso']=sha1('tam-sel01');
                         header('Location: /enviar');
                         exit();
                     }else{
             $exten = explode(".", $_FILES[$filename]['name']);
             if(!($_FILES[$filename]['type']=="application/pdf")){
                 $_SESSION['aviso']=sha1('tipo-sel01');
                 header('Location: /enviar');
                 exit();
             }}}}else{
                     if($_FILES[$filename]['error']==4){
                       $_SESSION['aviso']=sha1('vazio-sel01');
                       header('Location: /enviar');
                       exit();
                     }else if($_FILES[$filename]['error']==2||$_FILES[$filename]['error']==1){
                       $_SESSION['aviso']=sha1('tam-sel01');
                       header('Location: /enviar');
                       exit();
                     }else {
                     $_SESSION['aviso']=sha1('ERROARQ');
                     $_SESSION['errorARQ']=$_FILES[$filename]['error'];
                     header('Location: /enviar');
                     exit();
                   }
                 }/*Fim isset*/}
             $filename = "sel02";
             if(isset($_FILES[$filename])){
                 if($_FILES[$filename]['error'] == UPLOAD_ERR_OK){
                 if(empty($_FILES[$filename]['name'])){
                     if(empty($_FILES[$filename]['name'])&&(empty($_FILES['sel01']['name'])||empty($_FILES['sel03']['name'])||empty($_FILES['sel04']['name']))){
                         $_SESSION['aviso']=sha1('vazio-mais');
                         header('Location: /enviar');
                         exit();
                     }else{
                         $_SESSION['aviso']=sha1('vazio-sel02');
                         header('Location: /enviar');
                         exit();
                     }
                 }else{
                     if(((bool)$_FILES[$filename]['size'])>10000){
                         $_SESSION['aviso']=sha1('tam-sel02');
                         header('Location: /enviar');
                         exit();
                     }else{
                         $exten = explode(".", $_FILES[$filename]['name']);
                         if(!($_FILES[$filename]['type']=="application/pdf")){
                             $_SESSION['aviso']=sha1('tipo-sel02');
                             header('Location: /enviar');
                             exit();
                         }}}}else{
                           if($_FILES[$filename]['error']==4){
                             $_SESSION['aviso']=sha1('vazio-sel02');
                             header('Location: /enviar');
                             exit();
                           }else if($_FILES[$filename]['error']==2||$_FILES[$filename]['error']==1){
                             $_SESSION['aviso']=sha1('tam-sel02');
                             header('Location: /enviar');
                             exit();
                           }{
                           $_SESSION['aviso']=sha1('ERROARQ');
                           $_SESSION['errorARQ']=$_FILES[$filename]['error'];
                           header('Location: /enviar');
                           exit();
                         }
                 }/*Fim isset*/}
             $filename = "sel03";
             if(isset($_FILES[$filename])){
                 if($_FILES[$filename]['error'] == UPLOAD_ERR_OK){
                 if(empty($_FILES[$filename]['name'])){
                     if(empty($_FILES[$filename]['name'])&&(empty($_FILES['sel02']['name'])||empty($_FILES['sel01']['name'])||empty($_FILES['sel04']['name']))){
                         $_SESSION['aviso']=sha1('vazio-mais');
                         header('Location: /enviar');
                         exit();
                     }else{
                         $_SESSION['aviso']=sha1('vazio-sel03');
                         header('Location: /enviar');
                         exit();
                     }
                 }else{
                     if(((bool)$_FILES[$filename]['size'])>10000){
                         $_SESSION['aviso']=sha1('tam-sel03');
                         header('Location: /enviar');
                         exit();
                     }else{
                         $exten = explode(".", $_FILES[$filename]['name']);
                         if(!($_FILES[$filename]['type']=="application/pdf")){
                             $_SESSION['aviso']=sha1('tipo-sel03');
                             header('Location: /enviar');
                             exit();
                         }}}}else{
                           if($_FILES[$filename]['error']==4){
                             $_SESSION['aviso']=sha1('vazio-sel03');
                             header('Location: /enviar');
                             exit();
                           }else if($_FILES[$filename]['error']==2||$_FILES[$filename]['error']==1){
                             $_SESSION['aviso']=sha1('tam-sel03');
                             header('Location: /enviar');
                             exit();
                           }else {
                           $_SESSION['aviso']=sha1('ERROARQ');
                           $_SESSION['errorARQ']=$_FILES[$filename]['error'];
                           header('Location: /enviar');
                           exit();
                         }
                 }/*Fim isset*/}
             $filename = "sel04";
             if(isset($_FILES[$filename])){
                 if($_FILES[$filename]['error'] == UPLOAD_ERR_OK){
                 if(empty($_FILES[$filename]['name'])){
                     if(empty($_FILES[$filename]['name'])&&(empty($_FILES['sel02']['name'])||empty($_FILES['sel03']['name'])||empty($_FILES['sel01']['name']))){
                         $_SESSION['aviso']=sha1('vazio-mais');
                         header('Location: /enviar');
                         exit();
                     }else{
                         $_SESSION['aviso']=sha1('vazio-sel04');
                         header('Location: /enviar');
                         exit();
                     }
                 }else{
                     if(((bool)$_FILES[$filename]['size'])>10000){
                         $_SESSION['aviso']=sha1('tam-sel04');
                         header('Location: /enviar');
                         exit();
                     }else{
                         $exten = explode(".", $_FILES[$filename]['name']);
                         if(!($_FILES[$filename]['type']=="application/pdf")){
                             $_SESSION['aviso']=sha1('tipo-sel04');
                             header('Location: /enviar');
                             exit();
                         }}}}else{
                           if($_FILES[$filename]['error']==4){
                             $_SESSION['aviso']=sha1('vazio-sel04');
                             header('Location: /enviar');
                             exit();
                           }else if($_FILES[$filename]['error']==2||$_FILES[$filename]['error']==1){
                             $_SESSION['aviso']=sha1('tam-sel04');
                             header('Location: /enviar');
                             exit();
                           }else {
                           $_SESSION['aviso']=sha1('ERROARQ');
                           $_SESSION['errorARQ']=$_FILES[$filename]['error'];
                           header('Location: /enviar');
                           exit();
                         }
                 }/*Fim isset*/}
   $sb="'cid:bg'";
//Enviando Email - Start

//Inicio Corpo do Email (Usar Aspas simples)
       $body = '
<!doctype html>
<html>
<head>
<title></title>
<style type="text/css">
/* CLIENT-SPECIFIC STYLES */
body, table, td, a { -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; }
table, td { mso-table-lspace: 0pt; mso-table-rspace: 0pt; }
img { -ms-interpolation-mode: bicubic; }

/* RESET STYLES */
img { border: 0; height: auto; line-height: 100%; outline: none; text-decoration: none; }
table { border-collapse: collapse !important; }
body { height: 100% !important; margin: 0 !important; padding: 0 !important; width: 100% !important; }

/* iOS BLUE LINKS */
a[x-apple-data-detectors] {
   color: inherit !important;
   text-decoration: none !important;
   font-size: inherit !important;
   font-family: inherit !important;
   font-weight: inherit !important;
   line-height: inherit !important;
}

/* PADDING */
.padding {
   padding: 50px 15px !important;
}

/* COUPON FONT */
.coupon {
 font-size: 150px !important;
}

/* MOBILE STYLES */
@media screen and (max-width: 600px) {
 .img-max {
   width: 100% !important;
   max-width: 100% !important;
   height: auto !important;
 }

 .max-width {
   max-width: 100% !important;
 }

 .mobile-wrapper {
   width: 85% !important;
   max-width: 85% !important;
 }

 .mobile-padding {
   padding-left: 5% !important;
   padding-right: 5% !important;
 }

 .coupon {
   font-size: 90px !important;
 }
}

/* ANDROID CENTER FIX */
div[style*="margin: 16px 0;"] { margin: 0 !important; }
</style>
</head>
<body style="margin: 0 !important; padding: 0; !important background-color: #ffffff;" bgcolor="#ffffff">

<!-- HIDDEN PREHEADER TEXT -->
<div style="display: none; font-size: 1px; color: #fefefe; line-height: 1px; font-family: Open Sans, Helvetica, Arial, sans-serif; max-height: 0px; max-width: 0px; opacity: 0; overflow: hidden;">
   Lorem ipsum dolor que ist
</div>

<table border="0" cellpadding="0" cellspacing="0" width="100%">
   <tr>
       <td align="center" valign="top" width="100%" bgcolor="#3b4a69" style="background: #3b4a69 url('.$sb.'); background-size: cover; padding: 50px 15px;" class="padding mobile-padding">
           <!--[if (gte mso 9)|(IE)]>
           <table align="center" border="0" cellspacing="0" cellpadding="0" width="600">
           <tr>
           <td align="center" valign="top" width="600">
           <![endif]-->
           <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:600px;">
               <tr>
                   <td align="center" valign="top" style="padding: 0 0 20px 0;">
                       <img src="cid:logo" width="250" height="100" border="0" style="display: block;">
                   </td>
               </tr>
               <tr>
                   <td align="center" valign="top" style="padding: 0; font-family: Open Sans, Helvetica, Arial, sans-serif;">
                       <h1 style="font-size: 40px; color: #ffffff;">INSS Digital OAB/AM</h1>
                   </td>
               </tr>
               <tr>
                   <td align="center" valign="top" style="padding: 10px 0 35px 0; font-family: Open Sans, Helvetica, Arial, sans-serif;">
                     <table align="center" border="0" cellpadding="0" cellspacing="0" width="75%">
                         <tr>
                             <td align="center" bgcolor="#232e45" style="color: #ffffff; font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 90px; font-weight: bold; padding: 0 15px; border-radius: 3px;" class="coupon">
                                 0
                             </td>
                             <td style="font-size: 1px;" width="10">
                               &nbsp;
                             </td>
                             <td align="center" bgcolor="#232e45" style="color: #ffffff; font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 90px; font-weight: bold; padding: 0 15px; border-radius: 3px;" class="coupon">
                                 7
                             </td>
                             <td style="font-size: 1px;" width="10">
                               &nbsp;
                             </td>
                             <td align="center" bgcolor="#232e45" style="color: #ffffff; font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 60px; font-weight: bold; padding: 0 15px; border-radius: 3px;">
                                 Dias
                             </td>
                         </tr>
                     </table>
                   </td>
               </tr>
               <tr>
                   <td align="center" valign="top" style="font-family: Open Sans, Helvetica, Arial, sans-serif; padding-top: 0;">

                       <p style="color: #b7bdc9; font-size: 16px; line-height: 24px; margin: 0;">
                         Novo Cadastro recebido pelo formulário do INSS Digital presente no site da OAB/AM, foi enviado um e-mail similar dando o prazo acima em dias uteis para o usuário, Atenção esse e-mail possui Anexos.
                       </p>

                   </td>
               </tr>
           </table>
           <!--[if (gte mso 9)|(IE)]>
           </td>
           </tr>
           </table>
           <![endif]-->
       </td>
   </tr>
   <tr>
       <td align="center" height="100%" valign="top" width="100%" bgcolor="#f6f6f6" style="padding: 40px 15px;">
           <!--[if (gte mso 9)|(IE)]>
           <table align="center" border="0" cellspacing="0" cellpadding="0" width="600">
           <tr>
           <td align="center" valign="top" width="600">
           <![endif]-->
           <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:600px;font-family:Arial, Helvetica, sans-serif;">
               <h3 style="font-family:Arial, Helvetica, sans-serif;">Dados Recebidos</h3>
               <div style="font-family:Arial, Helvetica, sans-serif;"><b>Nome:</b> &nbsp;'.$nome.'<br>
                   <b>Nº de Inscrição:</b> &nbsp;'.$ni.'<br>
                   <b>CPF:</b> &nbsp;'.$cpf.'<br>
                   <b>Telefone:</b> &nbsp;'.$tel.'<br>
                   <b>E-Mail:</b> &nbsp;'.$email.'<br><br>
                   <b>Dia:</b> &nbsp;'.$data_envio.'<b>&nbsp; &bull; &nbsp;Hora:</b>&nbsp; '.$hora_envio.'<br>
                   </td>
                </div>
               <td align="center" valign="top" style="padding: 0; font-family: Open Sans, Helvetica, Arial, sans-serif; color: #999999;">
                       <p style="font-size: 14px; line-height: 20px;">
                           OAB Amazonas<br>
                         Av. Umberto Calderaro Filho, nº 2000<br>
                         Bairro Adrianópolis &nbsp; &bull; &nbsp; CEP 69057-021
                        <br>   ouvidoria@oabam.org.br
                         <br><br>

                         <a href="http://oabam.org.br/site/" style="color: #999999;" target="_blank">OAB Amazonas</a>
                         &nbsp; &bull; &nbsp;
                         <a href="http://oabam.org.br/site/ouvidoria/" style="color: #999999;" target="_blank">Ouvidoria</a>
                       </p>
                       <p style="font-size: 14px; line-height: 20px;">
                   </td>
               </tr>
           </table>
           <!--[if (gte mso 9)|(IE)]>
           </td>
           </tr>
           </table>
           <![endif]-->
       </td>
   </tr>
</table>
</body>
</html>
';//Fim do Corpo do Email
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
       $mail->AddAddress("previdenciario@oabam.org.br", $nome); // Email e nome de quem receberá //Responder
       $mail->FromName = "INSS Digital (OAB/AM)"; // Nome de quem envia o email
       $mail->IsHTML = true; // Enviar como HTML
       //$mail->AddBcc($servermail); //cc Email
       $mail->Subject = "INSS Digital - ".$nome."(OAB/AM: ".$ni.")";
       $mail->AddAttachment($_FILES['sel01']['tmp_name'],"Requerimento - OAB/AM ".$ni.".pdf");
       $mail->AddAttachment($_FILES['sel02']['tmp_name'],"TCMS - OAB/AM ".$ni.".pdf");
       $mail->AddAttachment($_FILES['sel03']['tmp_name'],"Carterinha (Frente) - OAB/AM ".$ni.".pdf");
       $mail->AddAttachment($_FILES['sel04']['tmp_name'],"Carterinha (Verso) - OAB/AM ".$ni.".pdf");
       $mail->AddEmbeddedImage('./img/LOGOTIPO-2-2.png', 'logo','logo');
       $mail->AddEmbeddedImage('./img/bg.jpg', 'bg','bg');
       $mail->Body = $body; //Corpo da mensagem caso seja HTML
       $mail->AltBody = "Nome: ".$nome."| Nº de Inscrição: ".$ni." | CPF: ".$cpf." | Telefone: ".$tel."| E-Mail: ".$email;
       //$mail->SMTPDebug = 2; //
       if ($mail->Send()){//Sucesso ao Enviar Email Principal

           //Enviando Email - Usuario
//Inicio Corpo do Email (Usar Aspas simples)
           $body = '
   <!doctype html>
   <html>
   <head>
   <title></title>
   <style type="text/css">
   /* CLIENT-SPECIFIC STYLES */
   body, table, td, a { -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; }
   table, td { mso-table-lspace: 0pt; mso-table-rspace: 0pt; }
   img { -ms-interpolation-mode: bicubic; }

   /* RESET STYLES */
   img { border: 0; height: auto; line-height: 100%; outline: none; text-decoration: none; }
   table { border-collapse: collapse !important; }
   body { height: 100% !important; margin: 0 !important; padding: 0 !important; width: 100% !important; }

   /* iOS BLUE LINKS */
   a[x-apple-data-detectors] {
       color: inherit !important;
       text-decoration: none !important;
       font-size: inherit !important;
       font-family: inherit !important;
       font-weight: inherit !important;
       line-height: inherit !important;
   }

   /* PADDING */
   .padding {
       padding: 50px 15px !important;
   }

   /* COUPON FONT */
   .coupon {
     font-size: 150px !important;
   }

   /* MOBILE STYLES */
   @media screen and (max-width: 600px) {
     .img-max {
       width: 100% !important;
       max-width: 100% !important;
       height: auto !important;
     }

     .max-width {
       max-width: 100% !important;
     }

     .mobile-wrapper {
       width: 85% !important;
       max-width: 85% !important;
     }

     .mobile-padding {
       padding-left: 5% !important;
       padding-right: 5% !important;
     }

     .coupon {
       font-size: 90px !important;
     }
   }

   /* ANDROID CENTER FIX */
   div[style*="margin: 16px 0;"] { margin: 0 !important; }
   </style>
   </head>
   <body style="margin: 0 !important; padding: 0; !important background-color: #ffffff;" bgcolor="#ffffff">

   <!-- HIDDEN PREHEADER TEXT -->
   <div style="display: none; font-size: 1px; color: #fefefe; line-height: 1px; font-family: Open Sans, Helvetica, Arial, sans-serif; max-height: 0px; max-width: 0px; opacity: 0; overflow: hidden;">
       Lorem ipsum dolor que ist
   </div>

   <table border="0" cellpadding="0" cellspacing="0" width="100%">
       <tr>
           <td align="center" valign="top" width="100%" bgcolor="#3b4a69" style="background: #3b4a69 url('.$sb.'); background-size: cover; padding: 50px 15px;" class="padding mobile-padding">
               <!--[if (gte mso 9)|(IE)]>
               <table align="center" border="0" cellspacing="0" cellpadding="0" width="600">
               <tr>
               <td align="center" valign="top" width="600">
               <![endif]-->
               <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:600px;">
                   <tr>
                       <td align="center" valign="top" style="padding: 0 0 20px 0;">
                           <img src="cid:logo" width="250" height="100" border="0" style="display: block;">
                       </td>
                   </tr>
                   <tr>
                       <td align="center" valign="top" style="padding: 0; font-family: Open Sans, Helvetica, Arial, sans-serif;">
                           <h1 style="font-size: 40px; color: #ffffff;">INSS Digital OAB/AM</h1>
                       </td>
                   </tr>
                   <tr>
                       <td align="center" valign="top" style="padding: 10px 0 35px 0; font-family: Open Sans, Helvetica, Arial, sans-serif;">
                         <table align="center" border="0" cellpadding="0" cellspacing="0" width="75%">
                             <tr>
                                 <td align="center" bgcolor="#232e45" style="color: #ffffff; font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 90px; font-weight: bold; padding: 0 15px; border-radius: 3px;" class="coupon">
                                     0
                                 </td>
                                 <td style="font-size: 1px;" width="10">
                                   &nbsp;
                                 </td>
                                 <td align="center" bgcolor="#232e45" style="color: #ffffff; font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 90px; font-weight: bold; padding: 0 15px; border-radius: 3px;" class="coupon">
                                     7
                                 </td>
                                 <td style="font-size: 1px;" width="10">
                                   &nbsp;
                                 </td>
                                 <td align="center" bgcolor="#232e45" style="color: #ffffff; font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 60px; font-weight: bold; padding: 0 15px; border-radius: 3px;">
                                     Dias
                                 </td>
                             </tr>
                         </table>
                       </td>
                   </tr>
                   <tr>
                       <td align="center" valign="top" style="font-family: Open Sans, Helvetica, Arial, sans-serif; padding-top: 0;">

                           <p style="color: #b7bdc9; font-size: 16px; line-height: 24px; margin: 0;">
                           Seu Cadastro foi recebido com sucesso, aguarde o prazo de até 7 dias uteis para receber a resposta do Instituto Nacional do Seguro Social, caso precise de ajuda entre em contato pelo número <b>(92) 9 8145-4171</b> ou <b>(92) 9 8114-3552.</b>                            </p>

                       </td>
                   </tr>
               </table>
               <!--[if (gte mso 9)|(IE)]>
               </td>
               </tr>
               </table>
               <![endif]-->
           </td>
       </tr>
       <tr>
           <td align="center" height="100%" valign="top" width="100%" bgcolor="#f6f6f6" style="padding: 40px 15px;">
               <!--[if (gte mso 9)|(IE)]>
               <table align="center" border="0" cellspacing="0" cellpadding="0" width="600">
               <tr>
               <td align="center" valign="top" width="600">
               <![endif]-->
               <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:600px;font-family:Arial, Helvetica, sans-serif;">
                   <h3 style="font-family:Arial, Helvetica, sans-serif;">Dados Recebidos</h3>
                     <b>Atenção Verifique seus Dados para que não aja erro no cadastramento.</b><br><b>Verifique tambem nos Documentos enviados ao INSS na guia enviar.</b>.
                     <br>
                     <b>Caso encontre alguma irregularidade.</b> &nbsp; &bull; &nbsp;<b>Entre em contato via email ou telefone. </b>.<br>
                   <div style="font-family:Arial, Helvetica, sans-serif;"><b>Nome:</b> &nbsp;'.$nome.'<br>
                       <b>Nº de Inscrição:</b> &nbsp;'.$ni.'<br>
                       <b>CPF:</b> &nbsp;'.$cpf.'<br>
                       <b>Telefone:</b> &nbsp;'.$tel.'<br><br>
                       <b>Dia:</b> &nbsp;'.$data_envio.'<b>&nbsp; &bull; &nbsp;Hora:</b>&nbsp; '.$hora_envio.'<br><br><br>
                       <b>E-mail Automatico Não responda</b>&nbsp; &bull; &nbsp;Contato via email: previdenciario@oabam.org.br.
                       </td>
                    </div>
                   <td align="center" valign="top" style="padding: 0; font-family: Open Sans, Helvetica, Arial, sans-serif; color: #999999;">
                           <p style="font-size: 14px; line-height: 20px;text-align:center;">
                               OAB Amazonas<br>
                             Av. Umberto Calderaro Filho, nº 2000<br>
                             Bairro Adrianópolis &nbsp; &bull; &nbsp; CEP 69057-021
                            <br>   ouvidoria@oabam.org.br
                             <br><br>

                             <a href="http://oabam.org.br/site/" style="color: #999999;" target="_blank">OAB Amazonas</a>
                             &nbsp; &bull; &nbsp;
                             <a href="http://oabam.org.br/site/ouvidoria/" style="color: #999999;" target="_blank">Ouvidoria</a>
                           </p>
                           <p style="font-size: 14px; line-height: 20px;">
                       </td>
                   </tr>
               </table>
               <!--[if (gte mso 9)|(IE)]>
               </td>
               </tr>
               </table>
               <![endif]-->
           </td>
       </tr>
   </table>
   </body>
   </html>

';//Fim do Corpo do Email

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
           $mail->AddAddress($email, $nome); // Email e nome de quem receberá //Responder
           $mail->FromName = "INSS Digital (OAB-AM)"; // Nome de quem envia o email
           $mail->IsHTML = true; // Enviar como HTML
           //$mail->AddBcc('previdenciario@oabam.org.br');
           //$mail->AddBcc($email); //cc Email
           $mail->Subject = "INSS Digital (OAB-AM) - " . $nome;
           $mail->AddEmbeddedImage('./img/LOGOTIPO-2-2.png', 'logo','logo');
           $mail->AddEmbeddedImage('./img/bg.jpg', 'bg','bg');
           $mail->Body = $body; //Corpo da mensagem caso seja HTML
           $mail->AltBody = "Nome: ".$nome."| Nº de Inscrição: ".$ni." | CPF: ".$cpf." | Telefone: ".$tel."| E-Mail: ".$email;
           //$mail->SMTPDebug = 2;
           echo "Envindo Arquivo...";
           if($mail->Send()){
               //Envio Completo
               //if(isset($_SESSION['aviso'])){unset($_SESSION['aviso']);}
               $_SESSION['sucesso']=sha1('INSS-SU001');
               header('Location: /enviar');
               exit();
           }else{
               //Erro no Envio do E-mail Usuario
               $_SESSION['aviso']=sha1('INSS-EUF05');
               header('Location: /enviar');
               exit();
           }
       }else {
           //Erro no Envio do E-mail Principal
           $_SESSION['aviso']=sha1('INSS-ERR04');
           header('Location: /enviar');
           exit();
       }
//Fim Acesso permitido
   }
} else {
   //reCaptcha Nao marcado
   $_SESSION['aviso']=sha1('INSS-GNP01');
   header('Location: /enviar');
   exit();
}
 //Cassius Lc - DEV
?>
