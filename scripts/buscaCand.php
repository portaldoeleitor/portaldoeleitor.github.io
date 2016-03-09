<?
ini_set('display_errors', 1);
error_reporting(E_ERROR);
header("Content-Type: text/html; charset=ISO-8859-1",true);

include("../inc/bigboss/inc/bigboss.php");
include("../inc/core.php");

conecta();

if($_POST["a"] == 1){
	$termo = str($_POST["termo"]);
	$ano = str($_POST["ano"]);
	$uf = str($_POST["uf"]);
	$bs = new bs();

	$busca = sel($ano."_".$uf."_cand","NOME_CANDIDATO LIKE '%$termo%' or NOME_URNA_CANDIDATO LIKE '%$termo%'");
	if(total($busca) > 0){
		?>
			<table class="table table-striped table-hover " id="listaCandidatos">
			  <thead>
			    <tr>
			      <th>Nome</th>
			      <th>Partido</th>
			      <th>Munic&iacute;pio</th>
			    </tr>
			  </thead>
			  <tbody>
		<?
		while($r = fetch($busca)){
			?>
			    <tr onclick="abreFicha('<?= $r["id"] ?>','<?= $ano ?>','<?= $uf ?>')">
			      <td><?= $r["NOME_URNA_CANDIDATO"] ?> <i>(<?= $r["NOME_CANDIDATO"] ?>)</i></td>
			      <td><?= $r["SIGLA_PARTIDO"] ?></td>
			      <td><?= $r["DESCRICAO_UE"] ?></td>
			    </tr>
			<?
		}
		?>
			  </tbody>
			</table>
			<?
	}else{
		echo "Nenhum candidato encontrado.";
	}
}
