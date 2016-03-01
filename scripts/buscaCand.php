<?
include("../inc/bigboss/inc/bigboss.php");
include("../inc/core.php");
conecta();
$termo = str($_POST["t"]);
$ano = str($_POST["a"]);
$uf = str($_POST["uf"]);
$busca = sel($ano."_".$uf."_cand","NOME_CANDIDATO LIKE '%$termo%' or NOME_URNA_CANDIDATO LIKE '%$termo%'");
if(total($busca) > 0){
	while($r = fetch($busca)){
		//monta tabela 
	}
}else{
	
}
