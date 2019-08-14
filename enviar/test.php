 <!-- lc -->
<?php
//Session PHP
session_start();
if(isset($_SESSION['aviso'])){
    //Avisos do Sistema
   if($_SESSION['aviso']==sha1('INSS-GNP01')) $aviso = "INSS-GNP01";
   else if($_SESSION['aviso']==sha1('PDF-ERROR'))$aviso = "PDF-ERROR";
   else if($_SESSION['aviso']==sha1('BOTOUNOVAEMICAO'))$aviso = "BOTOUNOVAEMICAO";
   else if($_SESSION['aviso']==sha1('INSS-PTF01'))$aviso = "INSS-PTF01";
   else if($_SESSION['aviso']==sha1('INSS-CPF02'))$aviso = "INSS-CPF02";
   else if($_SESSION['aviso']==sha1('INSS-EMF03'))$aviso = "INSS-EMF03";
   else if($_SESSION['aviso']==sha1('INSS-ERR04'))$aviso = "INSS-ERR04";
   else if($_SESSION['aviso']==sha1('INSS-EUF05'))$aviso = "INSS-EUF05";
   session_destroy(); //Destruir Session
}
//Menssagem de Sucesso
if(isset($_SESSION['sucesso'])) {
    if($_SESSION['sucesso']==sha1('INSS-SU001'))$aviso = "INSS-SU001";
    session_destroy(); //Destruir Session
}

$title = "INSS Digital - Enviar";
$pagehome = "http://www.oabam.org.br";
//Links
$logo = "https://inssdigital.oabam.org.br";
$emitir = "https://inssdigital.oabam.org.br/emitir/";
$enviar = "https://inssdigital.oabam.org.br/enviar/";
$ano = date('Y');
$suporte ="https://inssdigital.oabam.org.br/suporte";
$como ="https://inssdigital.oabam.org.br/contato";
$voltar = "https://inssdigital.oabam.org.br";
?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <link href="https://fonts.googleapis.com/css?family=Oswald&display=swap" rel="stylesheet">
      <script src='https://www.google.com/recaptcha/api.js'></script>
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="../img/oabfavoicon.png">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    	<link rel="stylesheet" href="../css/style-indext.css">

    <title><?php echo $title;?></title>
  </head>
  <body>
<div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
  <h5 class="my-0 mr-md-auto nt" style="LINE-HEIGHT: 17px;"><b style="color: #154259;font-weight: 900; font-size: 27px;"><a href="<?php echo $logo; ?>" style="text-decoration:none; color: #154259;">INSS</b><br><b style="color: #154259;font-weight: 500; font-size: 13px;">D I G I T A L</b></a></h5>
  <nav class="my-2 my-md-0 mr-md-3">
  	<a class="eft p-2" href="<?php echo $voltar; ?>">Voltar</a>
    <a class="eft p-2" href="<?php echo $como; ?>">Contato</a>
  </nav>
  <a class="btn btn-outline-primary" href="<?php echo $suporte; ?>">Suporte</a>
</div>
<?php if(isset($aviso)){?>

        <?php if($aviso=="INSS-GNP01"){ ?>
        <div class="alert alert-primary alert-dismissible fade show mx-auto text-center" role="alert">
        <strong>Marque a opção!</strong> Não sou um robô.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <?php } ?>

        <?php if($aviso=="PDF-ERROR"){ ?>
        <div class="alert alert-danger alert-dismissible fade show mx-auto text-center" role="alert">
        <strong>Ocorreu um erro ao Gerar PDF!</strong> Por favor recarregue a página e Tente novamente.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <?php } ?>

         <?php if($aviso=="BOTOUNOVAEMICAO"){ ?>
         <div class="alert alert-danger alert-dismissible fade show mx-auto text-center" role="alert">
         <strong>Ocorreu um erro na Validação do eu não sou robô!</strong> Por favor recarregue a página e Tente novamente.
             <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                 <span aria-hidden="true">&times;</span>
             </button>
         </div>
         <?php } ?>

         <?php if($aviso=="INSS-PTF01"){ ?>
         <div class="alert alert-info alert-dismissible fade show mx-auto text-center" role="alert">
         <strong>Campos em Branco!</strong> Preencha todos os campos.
             <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                 <span aria-hidden="true">&times;</span>
             </button>
         </div>
         <?php } ?>

         <?php if($aviso=="INSS-CPF02"){ ?>
         <div class="alert alert-info alert-dismissible fade show mx-auto text-center" role="alert">
         <strong>CPF Invalido!</strong> Verifique seu CPF ou fale conosco.
             <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                 <span aria-hidden="true">&times;</span>
             </button>
         </div>
         <?php } ?>

         <?php if($aviso=="INSS-EMF03"){ ?>
         <div class="alert alert-info alert-dismissible fade show mx-auto text-center" role="alert">
         <strong>E-mail Invalido!</strong> digite seu e-mail corretamente.
             <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                 <span aria-hidden="true">&times;</span>
             </button>
         </div>
         <?php } ?>

         <?php if($aviso=="INSS-EMF03"){ ?>
         <div class="alert alert-danger alert-dismissible fade show mx-auto text-center" role="alert">
         <strong>Erro ao enviar o INSS Digital!</strong> Tente novamente mais tarde.
             <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                 <span aria-hidden="true">&times;</span>
             </button>
         </div>
         <?php } ?>

         <?php if($aviso=="INSS-EMF03"){ ?>
         <div class="alert alert-warning alert-dismissible fade show mx-auto text-center" role="alert">
         <strong>INSS Digital enviado!</strong> entretanto ocorreu uma falha ao enviar seu e-mail de confirmação.
             <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                 <span aria-hidden="true">&times;</span>
             </button>
         </div>
         <?php } ?>

         <?php if($aviso=="INSS-SU001"){ ?>
         <div class="alert alert-success alert-dismissible fade show mx-auto text-center" role="alert">
         <strong>INSS Digital emitido!</strong> Agora e so imprimir assinar e enviar ao INSS.
             <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                 <span aria-hidden="true">&times;</span>
             </button>
         </div>
         <?php } ?>
<?php }else{ ?>

             <div class="alert alert-info alert-dismissible fade show mx-auto text-center" role="alert">
                 <strong>[Aviso] Apos emitir e assinar os documentos!</strong> Retorne ao <a style="text-decoration: underline;" class="alert-link" href="https://inssdigital.oabam.org.br">inssdigital.oabam.org.br</a> para <a style="text-decoration: underline;" class="alert-link" href="../enviar">enviar</a> ao INSS.
                 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
             </div>

<?php } ?>
<div class="container">
        <h1 class="display-5 text-center"><b style="color: #154259;font-weight: 500; font-size: 19px;"><img src="../img/INSS.jpg" style="padding-left: 15px;" align="center" width="225" height="113"><br>Enviar pedido de cadastramento INSS Digital</br></b></h1>
    <div class="row">
        <div class="col-sm">
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <form action="/emitir/back/gerar.php" method="post" autocomplete="off">
                        <input type="text" style="display:none">
                        <input type="password" style="display:none">
                        <div class="form-group">
                            <label style="padding-top: 7px;" for="oab_nome">Nome</label>
                            <input type="text" class="form-control" id="oab_nome" name="nome" placeholder="Digite seu nome">
                            <div class="row">
                                <div class="col">
                                    <label for="oab_ni" style="padding-top: 7px;">Nº de Inscrição (OAB)</label>
                                    <input type="tel" id="oab_ni" name="ni" class="form-control" placeholder="Digite o nº da sua OAB">
                                </div>
                                <div class="col">
                                    <label for="oab_cpf" style="padding-top: 7px;">CPF</label>
                                    <input type="text" id="oab_cpf" name="email" class="form-control" placeholder="Digite seu CPF">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <label for="oab_tel" style="padding-top: 7px;">Telefone</label>
                                    <input type="tel" id="oab_tel" name="tel" class="form-control" placeholder="Digite seu Telefone">
                                </div>
                                <div class="col">
                                    <label for="oab_email" style="padding-top: 7px;">E-mail</label>
                                    <input type="text" id="oab_email" name="email" class="form-control" placeholder="Digite seu email">
                                </div>
                            </div>
                            <small id="emailHelp" class="form-text text-muted">&nbsp;&nbsp;&nbsp;Nunca vamos compartilhar seus dados, com ninguém.</small>
                        </div>
                        <!-- Campos Endereços-->

                        <div class="row">
                            <div class="col">
                                <label style="padding-top: 7px;" for="oab_rua">Rua</label>
                                <input type="text" id="oab_rua" name="rua" class="form-control" placeholder="">
                            </div>
                            <div class="col">
                                <label style="padding-top: 7px;" for="oab_num">Número</label>
                                <input type="text" id="oab_num" name="num" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label style="padding-top: 5px;" for="oab_bairro">Bairro</label>
                                <input type="text" id="oab_bairro" name="bairro" class="form-control" placeholder="">
                            </div>
                            <div class="col">
                                <label style="padding-top: 5px;" for="oab_cidade">Cidade</label>
                                <input type="text" id="oab_cidade" name="cidade" class="form-control" >
                            </div>
                        </div>
                        <div class="container" style="width: 330px;padding-top: 15px;">
                        <div class="g-recaptcha" style="margin-top: 0px;margin-bottom: 0px;" data-sitekey="6Legp6wUAAAAAFzO3aF3Oap-jwZb1Q-tZrEnx9fx"></div>
                        </div>
                            <!-- Campos Endereços FIM-->
                            <input type="submit" class="sb" name="Emitir" value="Emitir">
                    </form>
                </div>
            </div>
        </div>
        <div class="col-sm">
        </div>
    </div>
</div>
</div>
         </div>
<div class="container">
<!-- Rodape -->
  <footer class="pt-4 my-md-5 pt-md-5 border-top">
    <div class="row">
      <div class="col-12 col-md">
        <img src="../img/LOGO.png" width="150" height="88">
        <small class="d-block mb-3 text-muted text-left"><br>Copyright &copy; <?php echo $ano;?><br>Ordem Dos Advogados Do Brasil<br>Seção Amazonas</small>
          <small class="d-block mb-3 text-muted text-left">Desenvolvido por Cassius Lc</small>
      </div>
      <div class="col-6 col-md">
        <h5>OAB Amazonas</h5>
        <ul class="list-unstyled text-small">
          <li><a class="text-muted" href="https://www.oabam.org.br">Site Principal</a></li>
          <li><a class="text-muted" href="https://www.oabam.org.br/site/definitiva/">Definitiva</a></li>
          <li><a class="text-muted" href="https://www.oabam.org.br/site/noticias/">Notícias</a></li>
          <li><a class="text-muted" href="https://www.oabam.org.br/site/2017/10/01/telefones-da-oab-amazonas/">Telefones</a></li>
          <li><a class="text-muted" href="https://www.oabam.org.br/site/institucional/">Institucional</a></li>
        </ul>
      </div>
      <div class="col-6 col-md">
        <h5>Rede Socias</h5>
        <ul class="list-unstyled text-small">
          <li><a class="text-muted" href="https://pt-br.facebook.com/oabamazonas">Facebook</a></li>
          <li><a class="text-muted" href="https://www.instagram.com/oabamazonas/">Instagram</a></li>
          <li><a class="text-muted" href="https://www.youtube.com/channel/UCayODeI14PpDvCNKI5j7J1w">Youtube</a></li>
        </ul>
      </div>
      <div class="col-6 col-md">
        <h5>Sobre</h5>
        <ul class="list-unstyled text-small">
          <li><a class="text-muted" href="#">Historia da OAB</a></li>
          <li><a class="text-muted" href="#">Desenvovimento</a></li>
        </ul>
      </div>
    </div>
  </footer>
</div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
<script type="text/javascript" src="../js/jquery.mask.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $("#oab_ni").mask("A000099")
        $("#oab_cpf").mask("000.000.000-00")
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
        });$("#oab_cep").mask("00000-000")
    })
</script>
<!--cep inicio-->
<!-- Adicionando Javascript -->
<script type="text/javascript" >

    $(document).ready(function() {

        function limpa_formulário_cep() {
            // Limpa valores do formulário de cep.
            $("#oab_rua").val("");
            $("#oab_bairro").val("");
            $("#oab_cidade").val("");
        }

        //Quando o campo cep perde o foco.
        $("#oab_cep").blur(function() {

            //Nova variável "cep" somente com dígitos.
            var cep = $(this).val().replace(/\D/g, '');

            //Verifica se campo cep possui valor informado.
            if (cep != "") {

                //Expressão regular para validar o CEP.
                var validacep = /^[0-9]{8}$/;

                //Valida o formato do CEP.
                if(validacep.test(cep)) {
                    //Consulta o webservice viacep.com.br/
                    $('#oab_rua').attr('placeholder','...');
                    $('#oab_bairro').attr('placeholder','...');
                    $('#oab_cidade').attr('placeholder','...');
                    $('#oab_num').attr('placeholder','...');
                    $.getJSON("https://viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {

                        if (!("erro" in dados)) {
                            //Atualiza os campos com os valores da consulta.
                            $("#oab_rua").val(dados.logradouro);
                            $("#oab_bairro").val(dados.bairro);
                            $("#oab_cidade").val(dados.localidade);
                            $('#oab_rua').attr('placeholder','');
                            $('#oab_num').attr('placeholder','Digite o n.º');
                            $('#oab_bairro').attr('placeholder','');
                            $('#oab_cidade').attr('placeholder','');
                        }else{
                            $('#oab_rua').attr('placeholder','');
                            $('#oab_bairro').attr('placeholder','');
                            $('#oab_num').attr('placeholder','');
                            $('#oab_cidade').attr('placeholder','');
                        } //end if.
                    });
                } //end if.
            } //end if.
        });
    });

</script>

<!--cepfim-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="../js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
