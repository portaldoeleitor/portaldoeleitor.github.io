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
		$r = fetch($busca);
	}else{
		$bs->msg("Nenhum candidato encontrado.");
	}
}
