<?php
session_start();
// chamando os arquivos necessários do DOMPdf
require_once 'dompdf/lib/html5lib/Parser.php';
require_once 'dompdf/lib/php-font-lib-master/src/FontLib/Autoloader.php';
require_once 'dompdf/lib/php-svg-lib-master/src/autoload.php';
require_once 'dompdf/src/Autoloader.php';
// definindo os namespaces
dompdf\Autoloader::register();
use Dompdf\Dompdf;
//verifica Google
//Verifica o recaptcha google
if(isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response'])) {


    $vetParametros = array(
        "secret" => "6Legp6wUAAAAAISS_54BUobY7rkCpeJuuZiU1sEA",//Chave Secreta Google --- Chave aqui
        "response" => $_POST["g-recaptcha-response"],
        "remoteip" => $_SERVER["REMOTE_ADDR"]
    );
# Abre a conexão e informa os parâmetros: URL, método POST, parâmetros e retorno numa string
    $curlReCaptcha = curl_init();
    curl_setopt($curlReCaptcha, CURLOPT_URL, "https://www.google.com/recaptcha/api/siteverify");
    curl_setopt($curlReCaptcha, CURLOPT_POST, true);
    curl_setopt($curlReCaptcha, CURLOPT_POSTFIELDS, http_build_query($vetParametros));
    curl_setopt($curlReCaptcha, CURLOPT_RETURNTRANSFER, true);
    $vetResposta = json_decode(curl_exec($curlReCaptcha), true);
# Fecha a conexão
    curl_close($curlReCaptcha);
# Analisa o resultado (no caso de erro, pode informar os códigos)
    if (!($vetResposta["success"])) {
        $_SESSION['aviso'] = sha1('BOTOUNOVAEMICAO');
        header('Location: /emitir');
        exit();
    } else {
      $encoding = 'UTF-8';
        //Salvando dados
         if (isset($_POST['nome'])) {
             $nome= $_POST['nome'];

             $nome=mb_convert_case( $nome, MB_CASE_UPPER, $encoding);
         }
         if (isset($_POST['ni'])) {
             $ni= $_POST['ni'];
             $ni=mb_convert_case( $ni, MB_CASE_UPPER, $encoding);
         }
         if (isset($_POST['cpf'])) {
             $cpf= $_POST['cpf'];
         }
         if (isset($_POST['email'])) {
             $email= $_POST['email'];
             $email=mb_convert_case( $email, MB_CASE_UPPER, $encoding);
         }
        if (isset($_POST['tel'])) {
            $tel= $_POST['tel'];
        }
         if (isset($_POST['cep'])) {
             $cep= $_POST['cep'];
         }
        if (isset($_POST['rua'])) {
            $rua= $_POST['rua'];
            $rua=mb_convert_case( $rua, MB_CASE_UPPER, $encoding);
        }
        if (isset($_POST['num'])) {
            $num= $_POST['num'];
        }
         if (isset($_POST['bairro'])) {
             $bairro= $_POST['bairro'];
             $bairro=mb_convert_case( $bairro, MB_CASE_UPPER, $encoding);
         }
         if (isset($_POST['cidade'])) {
             $cidade= $_POST['cidade'];
             $cidade=mb_convert_case( $cidade, MB_CASE_UPPER, $encoding);
         }
         $estado = "AMAZONAS";
 //Verifica Vazio
         if (empty($nome) || empty($ni)|| empty($cpf)|| empty($email)|| empty($tel) || empty($cep) || empty($rua) || empty($num) || empty($bairro) || empty($cidade) || empty($estado)) {
             $_SESSION['aviso']=sha1('INSS-PTF01');
             header('Location: /emitir');
             exit();
         }
//Verifica Email
        if (!(filter_var($email, FILTER_VALIDATE_EMAIL))) {
            $_SESSION['aviso']=sha1('INSS-EMF03');
            header('Location: /emitir');
            exit();
        }
        include "vercpf.php";
        if (!(validaCPF($cpf))) {
            $_SESSION['aviso']=sha1('INSS-CPF02');
            header('Location: /emitir');
            exit();
        }
//Redirecionar para create
        //Gerar PDF
        echo "Gerando PDF, Aguarde...";
// inicializando o objeto Dompdf
        $dompdf = new Dompdf();
//Data
setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
date_default_timezone_set('America/manaus');
$data =  strftime(', %d de %B de %Y', strtotime('today'));

// coloque nessa variável o código HTML que você quer que seja inserido no PDF
        $codigo_html = '
<html>
 <head>
   <style =\"text/css\">
     body {
       font-family: Calibri, DejaVu Sans, Arial;
       margin: 0;
       padding: 0;
       border: none;
       font-size: 13px;
     }

     .titulo_inss{
     text-align: center;
     padding-bottom: 100px;
     }
     .texto_inss{
     text-align: justify;
     }
   </style>
 </head>
 <body>
   <div class="titulo_inss">
   REQUERIMENTO<br />
   <span style="text-align: center">INSTITUTO NACIONAL DO SEGURO SOCIAL - INSS <br> ORDEM DOS ADVOGADOS DO BRASIL - SEÇÃO DO AMAZONAS</span>

   </div>
   <div id="texto_inss" style="text-align: justify;page-break-after: always;"">
        <span style="text-align: justify"><b>' . $nome . '</b>, Brasileiro (a), Advogado (a), portador (a) do CPF sob o nº <b>' . $cpf . '</b>, OAB/AM sob o Nº <b>' . $ni . '</b>, com endereço à rua  <b>' . $rua . '</b>, Nº <b>' . $num . '</b>, Bairro <b>' . $bairro . '</b>, <b>' . $cidade . '/AM</b>, vem respeitosamente, informar a ciencia do TERMO DE COMPROMISSO DE MANUTENÇÃO DE SIGILO - TCMS, e por fim, solicitar o cadastramento no INSS Digital que poderá ser enviado pela plataforma do INSS ao e-mail: <b>'.$email.'</b> - Telefone: <b>'.$tel.'</b>.</span>
        <br><br><br><br><br><br><br><br><br>
        <span style="text-align: left"> Termos em que,<br><br><br> Pede Deferimento.</span>
        <br><br><br>
        <span style="text-align: left"> '.$cidade.'/AM'.$data.'.</span>
        <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
        <span style="text-align: center">____________________________________________________________________<br>
        <b>' . $nome . '</b></span>
   </div>

   <center><img src="img/brasao2.jpg" width="70" height="70"></center>
   <div class="titulo_inss">
   <b>ANEXO II</b><br>
   <span style="text-align: center">INSTITUTO NACIONAL DO SEGURO SOCIAL - INSS <br> ORDEM DOS ADVOGADOS DO BRASIL - SEÇÃO DO AMAZONAS<br> <b>TERMO DE COMPROMISSO DE MANUTENÇÃO DE SIGILO – TCMS </b></span>
    <br><br>
    <div id="texto_inss" style="text-align: justify;">
        <span style="text-align: justify">Eu <b>' . $nome . '</b>, Brasileiro (a), Advogado (a), portador (a) do CPF <b>' . $cpf . '</b>, OAB/AM sob o numero <b>' . $ni . '</b>, na qual resido na <b>' . $rua . '</b>, Nº <b>' . $num . '</b>, <b>' . $bairro . '</b>, <b>' . $cidade . '</b>, estado <b>AMAZONAS</b>, perante o Instituto Nacional do Seguro Social, declaro ter ciência inequívoca da legislação sobre o tratamento de informação classificada cuja divulgação possa causar risco ou dano à segurança da sociedade ou do Estado, e me comprometo a guardar o sigilo necessário, nos termos da Lei nº 12.527, de 18 de novembro de 2011, e a:</span>
        <br><br>
        <span style="text-align: justify">a) tratar as informações classificadas em qualquer grau de sigilo ou os materiais de acesso restrito que me forem fornecidos pelo INSS e preservar o seu sigilo, de acordo com a legislação vigente;</span>
        <br><br>
        <span style="text-align: justify">b) preservar o conteúdo das informações classificadas em qualquer grau de sigilo ou dos materiais de acesso restrito, sem divulgá-lo a terceiros;</span>
        <br><br>
        <span style="text-align: justify">c) não praticar quaisquer atos que possam afetar o sigilo ou a integridade das informações classificadas em qualquer grau de sigilo ou dos materiais de acesso restrito;</span>
        <br><br>
        <span style="text-align: justify">d) não copiar ou reproduzir, por qualquer meio ou modo: (I) informações classificadas em qualquer grau de sigilo; (II) informações relativas aos materiais de acesso restrito do INSS, salvo autorização da autoridade competente;</span>
        <br><br>
        <span style="text-align: justify">e) acessar o conteúdo das informações não classificadas como sigilosas, podendo utilizá-las, copiá-las ou reproduzi-las por qualquer meio ou modo, exclusivamente no exercício das atividades funcionais que me compete exercer; e</span>
        <br><br>
        <span style="text-align: justify">f) em sendo gestor de acesso aos dados, me comprometo, ainda, a colher a assinatura do TCMS do usuário a quem eu compartilhar o acesso e enviá-lo à Gerência-Executiva do INSS do local da sede do meu órgão.</span>
        <br><br>
        <span style="text-align: justify">Declaro ter ciência das responsabilidades inerentes às atribuições a mim conferidas em virtude do ajuste firmado pelo INSS e OAB-AM, que por estar de acordo com este Termo.</span>
        <br><br>
        <span style="text-align: left"> '.$cidade.'/AM'.$data.'.</span>
        <br><br><br><br><br>
        <span style="text-align: center">____________________________________________________________________<br>
        <b>' . $nome . '</b></span>
   </div>
   </div>

 </body>
';
// carregamos o código HTML no nosso arquivo PDF
        $dompdf->loadHtml($codigo_html);
// (Opcional) Defina o tamanho (A4, A3, A2, etc) e a oritenação do papel, que pode ser 'portrait' (em pé) ou 'landscape' (deitado)
        $dompdf->setPaper('A4', 'portrait');
// Renderizar o documento
        $dompdf->render();
// pega o código fonte do novo arquivo PDF gerado
// Salvo no diretório temporário do sistema
// e exibido para o usuário
        $dompdf->stream($nome.".pdf",array('Attachment'=>0));
    }
    session_destroy();
    //ATT
} else {
    //reCaptcha Nao marcado
    $_SESSION['aviso']=sha1('INSS-GNP01');
    header('Location: /emitir');
    exit();
}
//Cassius Lc - DEV
?>
