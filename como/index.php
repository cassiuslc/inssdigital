<?php
$title = "Inss Digital - Início";
$logo = "https://inssdigital.oabam.org.br/";
//Principal
$passo = "https://inssdigital.oabam.org.br/como/passo";
$faq = "https://inssdigital.oabam.org.br/como/faq";
$help = "https://inssdigital.oabam.org.br/como/help";
//Ano
$ano = "2019";
//Menu Superior
$suporte ="https://inssdigital.oabam.org.br/suporte";
$como ="https://inssdigital.oabam.org.br";
$contato = "https://inssdigital.oabam.org.br/contato";
//$mant = 1; //Remova o Comentario para Manutencao
?>
<!doctype html>
<html lang="pt-br">
  <head>
    <!-- Cassius Leon Dev -->
    <meta charset="utf-8">
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
    <a class="eft p-2" href="<?php echo $como; ?>">Voltar</a>
    <a class="eft p-2" href="<?php echo $contato; ?>">Contato</a>
  </nav>
  <a class="btn btn-outline-primary" href="<?php echo $suporte; ?>">Suporte</a>
</div>

<div class="pricing-header px-3 py-3 pt-md-1 pb-md-4 mx-auto text-center">
  <h1 class="display-5"><b style="color: #154259;font-weight: 500; font-size: 20px;">Seja bem-vindo a página de ajuda ao cadastramento do INSS digital.</b></h1>
</div>

<div class="container">
  <div class="card-deck mb-3 text-center">
    <div class="card mb-4 shadow-sm">
      <div class="card-header">
        <h4 class="my-0 font-weight-normal"><b style="color: #154259;font-weight: 700; font-size: 22px;">Passo a Passo</b></h4>
      </div>
      <div class="card-body">
        <h1 class="card-title pricing-card-title"><img src="../img/passo.png" width="230" height="113"></h1>
        <ul class="list-unstyled mt-3 mb-4">
          <li><b style="color: #154259;font-weight: 500; font-size: 15px;">Um passo a passo de como se cadastrar no INSS Digital.<br>(EM CONSTRUÇÃO)</b></li>
        </ul>
        <a href="<?php echo $passo; ?>" style="text-decoration-style: none;" class="btn btn-lg btn-block btn-outline-primary"><?php echo "Como Funciona ?"; ?></a>
      </div>
    </div>
    <div class="card mb-4 shadow-sm">
      <div class="card-header">
        <h4 class="my-0 font-weight-normal"><b style="color: #154259;font-weight: 700; font-size: 22px;">Perguntas e Respostas</b></h4>
      </div>
      <div class="card-body">
        <h1 class="card-title pricing-card-title"><img src="../img/faq.png" width="195" height="113"></h1>
        <ul class="list-unstyled mt-3 mb-4">
          <li><b style="color: #154259;font-weight: 500; font-size: 15px;">Caso tenha alguma dúvida acesse a página do F.A.Q</b></li>
        </ul>
        <a href="<?php echo $faq; ?>" style="text-decoration-style: none;" class="btn btn-lg btn-block btn-primary"><?php echo "F.A.Q"; ?></a>
      </div>
    </div>
    <div class="card mb-4 shadow-sm">
      <div class="card-header">
        <h4 class="my-0 font-weight-normal"><b style="color: #154259;font-weight: 700; font-size: 22px;">Ajuda ?</b></h4>
      </div>
      <div class="card-body">
        <h1 class="card-title pricing-card-title"><img style="padding-left: 4%;" src="../img/help.png" width="195" height="113"></h1>
        <ul class="list-unstyled mt-3 mb-4">
          <li><b style="color: #154259;font-weight: 500; font-size: 15px;">Caso tenha recebido algum erro ao tentar fazer o cadastro.<br>(EM CONSTRUÇÃO)</b></li>
        </ul>
        <a href="<?php echo $help; ?>" style="text-decoration-style: none;" class="btn btn-lg btn-block btn-outline-primary"><?php echo "Ajuda com Erros ?"; ?></a>
      </div>
    </div>
    
  </div>

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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
