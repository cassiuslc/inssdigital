 <!-- lc -->
<?php
//Session PHP
session_start();
if(isset($_SESSION['aviso'])){
    //Avisos do Sistema
   if($_SESSION['aviso']==sha1('INSS-GNP01')){
       $aviso = "Marque a opção Não sou um robô.";
       $cont=0;
   }
   if($_SESSION['aviso']==sha1('INSS-GVR02')){
        $aviso = "Ocorreu um erro na Validação do eu não sou robô.";
        $cont=0;
   }
   if($_SESSION['aviso']==sha1('INSS-PTF01')){
        $aviso = "Preencha todos os campos.";
        $cont=0;
   }
   if($_SESSION['aviso']==sha1('INSS-CPF02')){
        $aviso = "CPF Invalido, Verifique seu CPF ou fale conosco.";
        $cont=1;
   }
   if($_SESSION['aviso']==sha1('INSS-EMF03')){
        $aviso = "E-mail Invalido, digite seu e-mail corretamente.";
        $cont=0;
   }
   if($_SESSION['aviso']==sha1('INSS-ERR04')){
        $aviso = "Erro ao enviar o INSS Digital. Tente novamente mais tarde.";
        $cont=0;
   }
   if($_SESSION['aviso']==sha1('INSS-EUF05')){
        $aviso = "INSS Digital enviado, entretanto ocorreu uma falha ao enviar seu e-mail de confirmação.";
        $cont=1;
   }
   //Arquivos
    //sel01
    if($_SESSION['aviso']==sha1('vazio-mais')){
        $aviso = "Anexos Nao Enviados, Um ou mais Anexos nao foram enviados. (Tente Novamente)";
        $cont=0;
    }
    if($_SESSION['aviso']==sha1('ERROARQ')){
        $aviso = "[".$_SESSION['errorARQ']."] Ocorreu um erro desconhecido no Upload de Um dos anexos (Tente Novamente) Ou entao";
        $cont=1;
    }
    if($_SESSION['aviso']==sha1('tipo-sel01')){
        $aviso = "O Tipo de Arquivo do Requerimento INSS (Anexo 1), Nao Foi Aceito (Somente PDF). Tente Novamente";
        $cont=0;
    }
    if($_SESSION['aviso']==sha1('vazio-sel01')){
        $aviso = "Arquivo Nao Enviado, Por Favor Envie o Requerimento INSS (Anexo 1)";
        $cont=0;
    }
    if($_SESSION['aviso']==sha1('tam-sel01')){
        $aviso = "O Requerimento INSS (Anexo 1), Ultrapassou o limite de Upload do INSS Digital [10mb]";
        $cont=0;
    }
    //sel02
    if($_SESSION['aviso']==sha1('tipo-sel02')){
        $aviso = "O Tipo de Arquivo do TCMS (Anexo 2), Nao Foi Aceito (Somente PDF). Tente Novamente";
        $cont=0;
    }
    if($_SESSION['aviso']==sha1('vazio-sel02')){
        $aviso = "Arquivo Nao Enviado, Por Favor Envie o TCMS (Anexo 2)";
        $cont=0;
    }
    if($_SESSION['aviso']==sha1('tam-sel02')){
        $aviso = "O TCMS (Anexo 2), Ultrapassou o limite de Upload do INSS Digital [10mb]";
        $cont=0;
    }
    //sel03
    if($_SESSION['aviso']==sha1('tipo-sel03')){
        $aviso = "O Tipo de Arquivo da Carterinha (Frente), Nao Foi Aceito (Somente PDF). Tente Novamente";
        $cont=0;
    }
    if($_SESSION['aviso']==sha1('vazio-sel03')){
        $aviso = "Arquivo Nao Enviado, Por Favor Envie a Carterinha (Frente)";
        $cont=0;
    }
    if($_SESSION['aviso']==sha1('tam-sel03')){
        $aviso = "A Carterinha (Frente), Ultrapassou o limite de Upload do INSS Digital [10mb]";
        $cont=0;
    }
    //sel04
    if($_SESSION['aviso']==sha1('tipo-sel04')){
        $aviso = "O Tipo de Arquivo da Carterinha (Verso), Nao Foi Aceito (Somente PDF). Tente Novamente";
        $cont=1;
    }
    if($_SESSION['aviso']==sha1('vazio-sel04')){
        $aviso = "Arquivo Nao Enviado, Por Favor Envie a Carterinha (Verso)";
        $cont=0;
    }
    if($_SESSION['aviso']==sha1('tam-sel04')){
        $aviso = "Carterinha (Verso), Ultrapassou o limite de Upload do INSS Digital [10mb]";
        $cont=1;
    }
   session_destroy(); //Destruir Session
}
//Menssagem de Sucesso
if(isset($_SESSION['sucesso'])) {
    if($_SESSION['sucesso']==sha1('INSS-SU001')){
        $sucesso = "INSS Digital Enviado com sucesso.";
        $cont=1;
    }
    session_destroy(); //Destruir Session
}
$title = "Formulário – INSS Digital";
$pagehome = "http://oabam.org.br";
?>
<!DOCTYPE html>
 <html lang="pt-br" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <link href="https://fonts.googleapis.com/css?family=Oswald:300,400,700" rel="stylesheet">
    <script src='https://www.google.com/recaptcha/api.js'></script>
    <link rel="shortcut icon" href="../img/oabfavoicon.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript" src="../js/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="../js/jquery.mask.min.js"></script>
    <script src="../js/dropzone.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $("#oab_cpf").mask("000.000.000-00");
            $("#oab_ni").mask("AAAAAA");
     $("#oab_tel").mask("(00) 0000-00009").focusout(function (event) {  
            var target, phone, element;  
            target = (event.currentTarget) ? event.currentTarget : event.srcElement;  
            phone = target.value.replace(/\D/g, '');
            element = $(target);  
            element.unmask();  
            if(phone.length > 10) {  
                element.mask("(00) 0 0000-0009");  
            } else {  
                element.mask("(00) 0000-00009");  
            }  
        });
            //
        })
    </script>
    <link rel="stylesheet" type="text/css" href="../css/style-enviar.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="../css/dropzone.css" media="screen" />
    <title><?php echo $title; ?></title>
</head>
<div class="menssage"><a title="<?php echo $title;?>" href="<?php echo $pagehome;?>"><img src="../img/LOGOTIPO-2-2.png" alt="" title="" width="50" height="30"style="
    padding-top: 0px;
    margin-top: 0px;
    position: absolute;
    padding-left: 45px;
    "></a>&emsp;&emsp;&emsp;&emsp;&emsp;&ensp;- INSS Digital Enviar</div>
<main>
    <div id="voltar"><a href="https://inssdigital.oabam.org.br/" title="Retorne ao site do INSS Digital">&laquo; Voltar</a></div>
    <div id="enviar" class="bradius">
        <?php if(isset($aviso)){?>
            <div class="menssage2 bradius"><?php if(!empty($aviso)){echo $aviso;}else{echo "INSS Digital";} if(isset($cont)){if($cont==1){ ?> <div>(Entre em Contato com OAB-AM (92) 3194-1815)</div><div>(ouvidoria@oabam.org.br)</div> <?php }}?></div>
        <?php }?>
        <?php if(isset($sucesso)){?>
            <div class="sucesso bradius"><?php if(!empty($sucesso)){echo $sucesso;}else{echo "INSS Digital";}if(isset($cont)){if($cont==1){ ?> <div>(Verifique o seu e-mail)<br></div> <?php }}?></div>
        <?php }?>
        <div class="logo"><a title="<?php echo $title;?>" href="<?php echo $pagehome;?>"><img src="../img/INSS.jpg" alt="" title="" width="300" height="140"></a></div>
        <div class="acomodar">
            <form action="../enviar/back/acess.php" style="width: 350px;" enctype="multipart/form-data" method="post"  autocomplete="off">
                <input type="text" style="display:none">
                <input type="password" style="display:none">
                <label for="nome">Nome:</label><input id="oab_nome" name="nome" type="text" class="txt">
                <label for="ni">Nº de Inscrição (OAB):</label><input id="oab_ni" name="ni" type="text" class="txt">
                <label for="cpf">CPF:</label><input id="oab_cpf" name="cpf" type="text" class="txt">
                <label for="email">E-Mail:</label><input id="oab_email" name="email" type="email" class="txt">
                <label for="tel">Telefone:</label><input id="oab_tel" name="tel" type="tel" class="txt">
                <label>Termos Assinados (PDF):</label>
                <!--Anexos Inicio-->
                <input type="file" name="sel01" id="sel01" class="arquivo" accept=".pdf">
                <input type="text" name="txt01" id="txt01" class="file" placeholder="Requerimento INSS" readonly="readonly">
                <input type="button" id="btonea" name="btone" class="btn" value="SELECIONAR" />
                <script type="text/javascript">
                    $(function(){
                        $("#btonea").click(function(){
                            $('#sel01').trigger('click');
                        });
                        $('#sel01').on('change', function() {
                            if ($('#sel01').get(0).files.length) {
                                var fileSize = $('#sel01').get(0).files[0].size; // in bytes
                            }
                            if(fileSize >10000000){
                                $('#txt01').val("Limite Exedido");
                            }else {
                                var fileName = $(this)[0].files[0].name;
                                $('#txt01').val(fileName);
                            }
                        });});
                </script>
                <!--Anexosfim-->
                <!--Anexos Inicio-->
                <input type="file" name="sel02" id="sel02" class="arquivo" accept=".pdf">
                <input type="text" name="txt02" id="txt02" class="file" placeholder="Anexo II - TCMS" readonly="readonly">
                <input type="button" id="btoneb" name="btone" class="btn" value="SELECIONAR" />
                <script type="text/javascript">
                    $(function(){
                        $("#btoneb").click(function(){
                            $('#sel02').trigger('click');
                        });
                        $('#sel02').on('change', function() {
                            if ($('#sel02').get(0).files.length) {
                                var fileSize = $('#sel02').get(0).files[0].size; // in bytes
                            }
                            if(fileSize >10000000){
                                $('#txt02').val("Limite Exedido");
                            }else {
                                var fileName = $(this)[0].files[0].name;
                                $('#txt02').val(fileName);
                            }
                        });});
                </script>
                <!--Anexosfim-->
                <label>Carterinha OAB/AM (PDF):</label>
                <!--Anexos Inicio-->
                <input type="file" name="sel03" id="sel03" class="arquivo" accept=".pdf">
                <input type="text" name="txt03" id="txt03" class="file" placeholder="Carterinha (Frente)" readonly="readonly">
                <input type="button" id="btonec" name="btone" class="btn" value="SELECIONAR" />
                <script type="text/javascript">
                    $(function(){
                        $("#btonec").click(function(){
                            $('#sel03').trigger('click');
                        });
                        $('#sel03').on('change', function() {
                            if ($('#sel03').get(0).files.length) {
                                var fileSize = $('#sel03').get(0).files[0].size; // in bytes
                            }
                            if(fileSize >10000000){
                                $('#txt03').val("Limite Exedido");
                            }else {
                                var fileName = $(this)[0].files[0].name;
                                $('#txt03').val(fileName);
                            }
                        });});
                </script>

                <input type="file" name="sel04" id="sel04" class="arquivo" accept=".pdf">
                <input type="text" name="txt04" id="txt04" class="file" placeholder="Carterinha (Verso)" readonly="readonly">
                <input type="button" id="btoned" name="btone" class="btn" value="SELECIONAR" />
                <script type="text/javascript">
                    $(function(){
                        $("#btoned").click(function(){
                            $('#sel04').trigger('click');
                        });
                        $('#sel04').on('change', function() {
                            if ($('#sel04').get(0).files.length) {
                                var fileSize = $('#sel04').get(0).files[0].size; // in bytes
                            }
                            if(fileSize >10000000){
                                $('#txt04').val("Limite Exedido");
                            }else{
                                var fileName = $(this)[0].files[0].name;
                                $('#txt04').val(fileName);
                            }
                        });});
                </script>
                <!--Anexosfim-->
                <div class="g-recaptcha" data-sitekey="6Legp6wUAAAAAFzO3aF3Oap-jwZb1Q-tZrEnx9fx"></div>
                <input type="submit" class="sb" name="enviar" value="Enviar">
            </form>
            <!--acomodarfim-->
        </div>
        <!--enviarfim-->
</main>
<!-- rodape -->
<footer>
   <div style="background-color: rgb(34, 67, 137);">OAB - AM © Copyright 2019</div>
  <!-- Cassius Lc - Dev -->
</html>