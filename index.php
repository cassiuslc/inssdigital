<?php
$title = "INSS Digital - Início";
$logo = "https://inssdigital.oabam.org.br/";
//Principal
$emitir = "https://inssdigital.oabam.org.br/emitir/";
$enviar = "https://inssdigital.oabam.org.br/enviar/";
//Ano
$ano = "2019";
//Menu Superior
$suporte ="https://inssdigital.oabam.org.br/suporte";
$como ="https://inssdigital.oabam.org.br/como";
$contato = "https://inssdigital.oabam.org.br/contato";
//$mant = 1;
?>
<!doctype html>
<html lang="pt-br">
  <head>
    <!-- Cassius Leon Dev -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="img/oabfavoicon.png">
    <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="css/style-indexN.css">
    <title><?php echo $title;?></title>
  </head>
  <body>
<div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
  <h5 class="logo my-0 mr-md-auto nt" style="LINE-HEIGHT: 17px;"><b><a href="<?php echo $logo; ?>">INSS</b><br><b class="letras">D I G I T A L</b></a></h5>
  <nav class="my-2 my-md-0 mr-md-3">
    <a class="eft p-2" href="<?php echo $como; ?>">Como Funciona ?</a>
    <a class="eft p-2" href="<?php echo $contato; ?>">Contato</a>
  </nav>
  <a class="btn btn-outline-primary" href="<?php echo $suporte; ?>">Suporte</a>
</div>
<?php if(isset($_GET["404"])){ ?>
<div class="alert alert-warning alert-dismissible fade show mx-auto text-center" role="alert">
  <strong>Página não encontrada!</strong> Tente novamente ou entre em <a href="<?php echo $suporte; ?>" style="text-decoration: underline;" class="alert-link">contato</a> com suporte. [Cod: 404]
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<?php } ?>

<?php if(isset($_GET["403"])){ ?>
<div class="alert alert-warning alert-dismissible fade show mx-auto text-center" role="alert">
  <strong>Acesso Não Permitido!</strong> Caso precise acessar a página, Entre em <a href="<?php echo $suporte; ?>" style="text-decoration: underline;" class="alert-link">contato</a> com suporte. [Cod: 403]
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<?php } ?>

<?php if(isset($mant)){ ?>
<div class="alert alert-danger alert-dismissible fade show mx-auto text-center" role="alert">
  <strong>[Aviso] O INSS digital está passando por uma manutenção.</strong> O serviço está indisponível no momento. [Cod: 299]
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<?php } ?>
<div class="pricing-header px-3 py-3 pt-md-1 pb-md-4 mx-auto text-center">
  <h1 class="display-5 titleN">Seja bem-vindo a página do INSS digital OAB Amazonas.</h1>
</div>
<div class="container">
<!-- StartCard -->

<div class="containerN notselect">
  <div class="box">
    <div class="icon">01</div>
    <div class="contentN">
      <p class="HL">Emitir documentação</p>
      <p class="PL">&nbsp;&nbsp;&nbsp;Aqui você pode emitir os documentos necessários para o cadastramento.</p>
      <p class="PL">&nbsp;&nbsp;&nbsp;Será gerado um PDF com 2 (Duas) páginas, Cada página é um documento.</p>
      <?php if(isset($mant)){ ?>
      <span class="red">Tente Novamente mais tarde...</span><br>
      <a class="red" href="#">Manutenção</a>
      <?php } else { ?>
      <span>Assine ambos os documentos a mão.</span><br>
      <a href="https://inssdigital.oabam.org.br/emitir/">Emitir documentos</a>
      <?php } ?>
    </div>
  </div>

  <div class="box">
    <div class="icon">02</div>
    <div class="contentN">
      <p class="HL">Solicitar Cadastramento</p>
      <p class="PL">&nbsp;&nbsp;&nbsp;É Necessário que tenha emitido a sua documentação na etapa de emissão.</p>
      <p class="PL">&nbsp;&nbsp;&nbsp;<b>Documentos necessários:</b> TCMS, Requerimento e carteirinha da OAB frente e verso.</p>

      <?php if(isset($mant)){ ?>
      <span class="red">Tente Novamente mais tarde...</span><br>
      <a class="red" href="#">Manutenção</a>
      <?php } else { ?>
      <span>Os documentos devem ser escaneados.</span><br>
      <a href="https://inssdigital.oabam.org.br/enviar/">Enviar pedido</a>
      <?php } ?>
    </div>
  </div>

  <div class="box">
    <div class="icon" style="font-size: 25px;">INSS</div>
    <div class="contentN">
      <p class="HL">INSS Digital Nacional</p>
      <p class="PL">&nbsp;&nbsp;&nbsp;Essa pagina é destinada para usuários já cadastrados no INSS Digital com senha de acesso.</p>
      <p class="PL">&nbsp;&nbsp;&nbsp;Aqui você pode acessar o portal nacional e uma página de ajuda sobre como utiliza-lo.</p>
      <!-- <?php if(isset($mant)){ ?>
      <span class="red">Tente Novamente mais tarde...</span><br>
      <a class="red" href="#">Manutenção</a>
      <?php } else { ?>
      <span>Essa página ainda está em construção</span><br>
      <a href="#">Indisponível</a>
      <?php } ?> -->

      <span>Essa página ainda está em construção</span><br>
      <a href="#">Indisponível</a>

    </div>
  </div>
</div>

<!-- EndCard -->
<div class="container">
  <footer class="pt-4 my-md-5 pt-md-5 border-top">
    <div class="row">
      <div class="col-12 col-md">
        <a href="https://www.oabam.org.br"><img src="img/LOGO.png" width="150" height="88"></a>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
