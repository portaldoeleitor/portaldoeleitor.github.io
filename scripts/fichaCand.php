<?
ini_set('display_errors', 1);
error_reporting(E_ERROR);
header("Content-Type: text/html; charset=ISO-8859-1",true);

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
						<div class="tab-pane active" id="panel-noticias">
							
						</div>
						<div class="tab-pane" id="panel-<?= $ano ?>">
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
							<?
							//dados da eleição
							//declaração de bens
							if($r["DESC_SIT_TOT_TURNO"] != "NÃO ELEITO"){
								//o que est&aacute; achando ou achou do mandato deste pol&iacute;tico?
							}
							?>
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