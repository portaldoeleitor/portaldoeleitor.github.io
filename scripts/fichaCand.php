<?
ini_set('display_errors', 1);
error_reporting(E_ERROR);
header("Content-Type: text/html; charset=ISO-8859-1",true);
header( 'Access-Control-Allow-Origin: *' );

include("../inc/bigboss/inc/bigboss.php");
include("../inc/core.php");

conecta();

if($_POST["a"] == 1){
	$id = str($_POST["id"]);
	$ano = str($_POST["ano"]);
	$uf = str($_POST["uf"]);
	$bs = new bs();
	$busca = sel($ano."_".$uf."_cand","id = '$id'");
	if(total($busca) > 0){
		$r = fetch($busca);
		?>
		<script type="text/javascript">
			$(function() {
				$('[data-toggle="tooltip"]').tooltip(); 
			});
		</script>
		<div class="row">
			<div class="col-md-12">
				<div class="tabbable" id="tabs-865962">
					<ul class="nav nav-tabs">
						<li class="active">
							<a href="#panel-ficha" data-toggle="tab">Ficha</a>
						</li>
						<li>
							<a href="#panel-noticias" data-toggle="tab">Not&iacute;cias</a>
						</li>
						<li>
							<a href="#panel-<?= $ano ?>" data-toggle="tab"><?= $ano ?></a>
						</li>
						<li>
							<a href="#panel-2008" data-toggle="tab">2008</a>
						</li>
					</ul>
					<div class="tab-content">
						<div class="tab-pane active" id="panel-ficha">
							<div class="col-md-4">
								<a href="alterarFoto.htm"><img src="img/default.png"<?= $bs->tooltip("Clique aqui para alterar a foto") ?>></a>
							</div>
							<div class="col-md-8">
								<div class="col-md-12">
									<div id="numerocand">
										<?= $r["NUMERO_CANDIDATO"] ?>
									</div>
									<div id="nomecand">
										<b><?= $r["NOME_URNA_CANDIDATO"] ?></b><br>
										<i>(<?= $r["NOME_CANDIDATO"] ?>)</i>
									</div>
								</div>
								<div class="col-md-12">
									<div class="col-md-6">
										<b>Data de nascimento: </b><?= $r["DATA_NASCIMENTO"] ?><br>
										<b>Escolaridade: </b><?= $r["DESCRICAO_GRAU_INSTRUCAO"] ?><br>
										<b>Estado civil: </b><?= $r["DESCRICAO_ESTADO_CIVIL"] ?><br>
										<b>Cidade de nascimento: </b><?= $r["NOME_MUNICIPIO_NASCIMENTO"] ?>/<?= $r["SIGLA_UF_NASCIMENTO"] ?><br>
										<b>Nacionalidade: </b><?= $r["DESCRICAO_NACIONALIDADE"] ?><br>
									</div>
									<div class="col-md-6">
										<b>Profiss&atilde;o: </b><?= $r["DESCRICAO_OCUPACAO"] ?><br>
										<b>N&ordm; do t&iacute;tulo eleitoral: </b><?= $r["NUM_TITULO_ELEITORAL_CANDIDATO"] ?><br>
										<b>CPF: </b><?= $r["CPF_CANDIDATO"] ?><br>
									</div>
								</div>
							</div>
						</div>
						<div class="tab-pane" id="panel-noticias">
							<?
							echo "<p align=\"center\"><a href=\"#\" class=\"btn btn-default\">Nenhuma not&iacute;cia cadastrada.</a></p>";
							?>
							<div id="novaNoticia" style="display: none"></div>
						</div>
						<div class="tab-pane" id="panel-<?= $ano ?>">
							<h3>Dados da candidatura</h3>
							<div class="col-md-6">
								<b><?= $r["DESCRICAO_ELEICAO"] ?></b><br>
								<b><?= $r["DESCRICAO_UE"] ?>/<?= $r["SIGLA_UF"] ?></b><br>
								<b>Cargo: </b><?= $r["DESCRICAO_CARGO"] ?><br>
								<b>Nome na urna: </b><?= $r["NOME_URNA_CANDIDATO"] ?><br>
								<b>Resultado: </b><?= $r["DESC_SIT_TOT_TURNO"] ?>
							</div>
							<div class="col-md-6">
								<b>Sigla: </b><?= $r["SIGLA_PARTIDO"] ?> (<?= $r["NUMERO_PARTIDO"] ?>)<br>
								<b>Legenda: </b><?= $r["COMPOSICAO_LEGENDA"] ?><br>
								<b><?= $r["NOME_LEGENDA"] ?></b><br>
								<b>Situa&ccedil;&atilde;o da candidatura: </b><?= $r["DES_SITUACAO_CANDIDATURA"] ?><br>
							</div>
							<div style="clear: both"></div>
							<h3>Bens declarados</h3>
							<div class="col-md-12">
								<p>Em breve.</p>
							</div>
							<h3>Resultado na elei&ccedil;&atilde;o</h3>
							<div class="col-md-6">
								<p>Em breve.</p>
							</div>
							<?
							//dados da eleição
							//declaração de bens
							if($r["DESC_SIT_TOT_TURNO"] != "NÃO ELEITO"){
								//o que est&aacute; achando ou achou do mandato deste pol&iacute;tico?
							}
							?>
						</div>
						<div class="tab-pane" id="panel-2008">
							<p>Em breve, voc&ecirc; poder&aacute; ver todos os anos em que esta pessoa foi candidata!</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?
	}else{
		$bs->msg("Nenhum candidato encontrado.");
	}
}
?>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-75347092-1', 'auto');
  ga('send', 'pageview');

</script>
