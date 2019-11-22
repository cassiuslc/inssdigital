<?php
$title = "Inss Digital - Help";
$logo = "https://inssdigital.oabam.org.br/";
//Principal
$passo = "https://inssdigital.oabam.org.br/como/passo";
$faq = "https://inssdigital.oabam.org.br/como/faq";
$help = "https://inssdigital.oabam.org.br/como/help";
//Ano
$ano = "2019";
//Menu Superior
$suporte ="https://inssdigital.oabam.org.br/suporte";
$como ="https://inssdigital.oabam.org.br/como";
$contato = "https://inssdigital.oabam.org.br/contato";
//$mant = 1; //Remova o Comentario para Manutencao
?>
<!doctype html>
<html lang="pt-br">
  <head>
    <!-- Cassius Leon Dev -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="../../img/oabfavoicon.png">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../../css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="../../css/style-indext.css">
    <title><?php echo $title;?></title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<style>
    .bs-example{
        margin: 20px;
    }
    .accordion .fa{
        margin-right: 0.5rem;
    }
    .btn-faq{
      color: #154259;
      border none;
    }
    .btn-faq:hover{
      color: #008EFD;
      cursor: pointer;
        border none;
    }
    .btn-faq:focus{
      color: #008EFD;
      box-shadow: 0 0 0 0;
    }

</style>
<script>
    $(document).ready(function(){
        // Add minus icon for collapse element which is open by default
        $(".collapse.show").each(function(){
        	$(this).prev(".card-header").find(".fa").addClass("fa-minus").removeClass("fa-plus");
        });

        // Toggle plus minus icon on show hide of collapse element
        $(".collapse").on('show.bs.collapse', function(){
        	$(this).prev(".card-header").find(".fa").removeClass("fa-plus").addClass("fa-minus");
        }).on('hide.bs.collapse', function(){
        	$(this).prev(".card-header").find(".fa").removeClass("fa-minus").addClass("fa-plus");
        });
    });
</script>

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
  <h1 class="display-5" style="margin-bottom: 15px;"><b style="color: #154259;font-weight: 500; font-size: 20px;">Olá, temos um vídeo para ajudar na solução de erros<br></b></h1>
  <iframe width="560" height="315" src="https://www.youtube.com/embed/m8J3sAWFQJY" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
</div>

<div class="container">
<!-- Conteudo -->

<div class="bs-example">
    <div class="accordion" id="accordion">
        <div class="card">
            <div class="card-header" id="headingOne">
                <h2 class="mb-0">
                    <button type="button" class="btn btn-faq" data-toggle="collapse" data-target="#collapseOne"><i class="fa fa-plus"></i>Marque a opção! Não sou um robô.</button>
                </h2>
            </div>
            <div id="collapseOne" class="collapse show" aria-labelledby="headingUm" data-parent="#accordion">
              <div class="alert alert-primary alert-dismissible fade show mx-auto text-center" role="alert">
                <strong>Marque a opção!</strong> Não sou um robô.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
              </div>
                <div class="card-body">
                    <p> Existe um sistema de validação no site para testarmos se você é ou não um programa criado para executar tarefas automatizadas. Por isso marque esta opção  <b> "não sou um robô"</b>.
					Para mantermos sua segurança e a segurança do site. </p>
                    <p> 
				</div>
            </div>
        </div>

        <div class="card">
            <div class="card-header" id="headingDois">
                <h2 class="mb-0">
                    <button type="button" class="btn btn-faq" data-toggle="collapse" data-target="#collapseDois"><i class="fa fa-plus"></i>Ocorreu um erro ao Gerar PDF!</button>
                </h2>
            </div>
            <div id="collapseDois" class="collapse" aria-labelledby="headingDois" data-parent="#accordion">
              <div class="alert alert-danger alert-dismissible fade show mx-auto text-center" role="alert">
                <strong>Ocorreu um erro ao Gerar PDF!</strong> Por favor recarregue a página e Tente novamente.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
              </div>
                <div class="card-body">
				<p> Ocorreu um erro ao gerar o <b>pdf</b>, possivelmente estamos passando por uma manutenção. Se você acha que essa mensagem apareceu por engano e deseja falar com alguém do nosso suporte por favor entrar em contato
				conosco: informatica@oabam.org.br </p> 
                </div> 
            </div>
        </div>

        <div class="card">
            <div class="card-header" id="headingTres">
                <h2 class="mb-0">
                    <button type="button" class="btn btn-faq" data-toggle="collapse" data-target="#collapseTres"><i class="fa fa-plus"></i>Ocorreu um erro na Validação do eu não sou robô!</button>
                </h2>
            </div>
            <div id="collapseTres" class="collapse" aria-labelledby="headingTres" data-parent="#accordion">
              <div class="alert alert-danger alert-dismissible fade show mx-auto text-center" role="alert">
              <strong>Ocorreu um erro na Validação do eu não sou robô!</strong> Por favor recarregue a página e Tente novamente.
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
                <div class="card-body">
                    <p>A <b>Seção Amazonas da Ordem dos Advogados do Brasil</b> e o <b>Instituto Nacional do Seguro Social (INSS)</b> assinaram um Acordo de Cooperação Técnica para a implementação do <b>INSS Digital</b> para a advocacia amazonense. O advogado poderá realizar vários procedimentos pelo sistema do INSS na internet, inclusive abrir processos para concessão de aposentadorias e benefícios, com o envio de documentação digitalizada.</p>
                    <p>Por tanto, as advogadas e os advogados deverão fazer a adesão, através do site da OAB AM, assinando o requerimento INSS Digital e o Termo de Compromisso e Manutenção de Sigilo (TCMS) em seguida devem escanear ambos os documentos e <a href="inssdigital.oabam.org.br/enviar">enviar</a> ao INSS.</p>
                    <p>** As assinaturas devem ser feitas à mão, e deve obrigatoriamente ser escaneadas (cada pagina um arquivo PDF) para enviar ao INSS.</p>
                </div>
            </div>    
        </div>

        <div class="card">
            <div class="card-header" id="headingQuatro">
                <h2 class="mb-0">
                    <button type="button" class="btn btn-faq" data-toggle="collapse" data-target="#collapseQuatro"><i class="fa fa-plus"></i>Campos em Branco!</button>
                </h2>
            </div>
            <div id="collapseQuatro" class="collapse" aria-labelledby="headingQuatro" data-parent="#accordion">
              <div class="alert alert-info alert-dismissible fade show mx-auto text-center" role="alert">
              <strong>Campos em Branco!</strong> Preencha todos os campos.
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
                <div class="card-body">
                    <p> Este erro ocorre quando você deixa algum espaço sem preencher, verifique novamente e preencha qualquer espaço que estiver em branco. Se você
                       acha que essa mensagem apareceu por engano, atualize a página e tente novamente. </p> 					
                </div> 
            </div>
        </div>

        <div class="card">
            <div class="card-header" id="headingQuatro">
                <h2 class="mb-0">
                    <button type="button" class="btn btn-faq collapsed" data-toggle="collapse" data-target="#collapseQuatro"><i class="fa fa-plus"></i> Errei meus dados, o que eu devo fazer?</button>
                </h2>
            </div>
            <div id="collapseQuatro" class="collapse" aria-labelledby="headingTres" data-parent="#accordion">
                <div class="card-body">
                  <p> Caso seus dados estejam <b>incorretos no e-mail de confirmação</b> que voce recebeu mas estejam <b>corretos nos documentos enviados (Anexos)</b>:<p>
                  <p>- Apenas entrar em contato e informar o erro e já resolve o problema, neste caso de preferencia entrar em contato via telefone.</p><br>
                  <p>Caso seus dados estejam <b>corretos no e-mail de confirmação</b> mas <b>incorretos nos documentos enviados (Anexos)</b>:</p>
                  <p>- Faça novamente a emição dos documentos no guia "Emitir". </p>
                  <p>- Então você deve enviar um email para <b>previdenciario@oabam.org.br</b>.</p>
                  <p>- Assunto: [SUA-OAB][Correcao] Erro nos dados dos documentos enviados.</p>
                  <p>- Preencha o campo SUA-OAB com o número de inscrição da sua OAB.</p>
                  <p>- Anexe os 4 arquivos PDF nesse e-mail:</p>
                  <p>[Arquivo 1] Requerimento INSS Digital (Esse arquivo está na página 1 do PDF, ele deve estar assinado e escaneado)</p>
                  <p>[Arquivo 2] TCMS ou Termo de Compromisso e Manutenção de Sigilo (Esse arquivo está na página 2 do PDF, ele deve estar assinado e escaneado)</p>
                  <p>[Arquivo 3] Carterinha Frente (Escaneado)</p>
                  <p>[Arquivo 4] Carterinha Verso (Escaneado)</p>
                  <p>- Em seguida, envie o email.</p>
                  <br>
                  <p><b>** Atenção: o envio desse pedido deve ser feito pelo seu proprio e-mail (Ex: gmail,hotmail etc), Não será aceito fotos dos documentos apenas escaneados.</b></p>
                  <p><b>** Caso seus dados estejam errados tanto nos documentos quanto no email de confirmação, É muito importante que você entre em <a href="inssdigital.oabam.org.br/contato">contato</a>, com a comissão de direito previdenciario.</b> </p>
                            </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header" id="headingCinco">
                <h2 class="mb-0">
                    <button type="button" class="btn btn-faq collapsed" data-toggle="collapse" data-target="#collapseCinco"><i class="fa fa-plus"></i> Quem pode ter acesso ?</button>
                </h2>
            </div>
            <div id="collapseCinco" class="collapse" aria-labelledby="headingCinco" data-parent="#accordion">
                <div class="card-body">
                  <p>Advogados inscritos na Ordem dos Advogados do Brasil - Seccional do Amazonas, desde que ativos, adimplentes e que não se encontrem punidos pela OAB AM ou que não estejam conhecidamente com condenação criminal, respeitando a cláusula de limitação territorial, conforme item 03 (três) do <a href="#">Plano de Trabalho</a> firmado entre as partes. </p>
                </div>
            </div>
        </div>


    </div>
</div>

<!-- Conteudo Fim -->
<div class="container">
  <footer class="pt-4 my-md-5 pt-md-5 border-top">
    <div class="row">
      <div class="col-12 col-md">
        <img src="../../img/LOGO.png" width="150" height="88">
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
  </body>
</html>
