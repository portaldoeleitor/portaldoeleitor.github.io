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

	$busca = sel($ano."_".$uf."_cand","id = '$id'");
	if(total($busca) > 0){
		$r = fetch($busca);
		?>
		<div class="row">
			<div class="col-md-12">
				<div class="tabbable" id="tabs-865962">
					<ul class="nav nav-tabs">
						<li class="active">
							<a href="#panel-ficha" data-toggle="tab">Ficha</a>
						</li>
						<li>
							<a href="#panel-<?= $ano ?>" data-toggle="tab"><?= $ano ?></a>
						</li>
					</ul>
					<div class="tab-content">
						<div class="tab-pane active" id="panel-ficha">
							<div id="numerocand">
								<?= $r["NUMERO_CANDIDATO"] ?>
							</div>
							<div id="nomecand">
								<b><?= $r["NOME_URNA_CANDIDATO"] ?></b><br>
								<i>(<?= $r["NOME_CANDIDATO"] ?>)</i>
							</div>
							<div style="clear: both"></div>
							<p>
								
							</p>
						</div>
						<div class="tab-pane" id="panel-<?= $ano ?>">
							<p>
								Howdy, I'm in Section 2.
							</p>
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
