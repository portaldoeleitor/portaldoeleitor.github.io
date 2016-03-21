function pesquisa(){
	var termo = $('#t').val();
	var ano = $('#a').val();
	var uf = $('#uf').val();
	$('#resultados').html("Pesquisando candidatos...");
	$('#resultados').load('http://portaldoeleitor.16mb.com/scripts/buscaCand.php', {a:1, termo:termo, ano:ano, uf:uf});
}

function abreFicha(id,ano,uf){
	$('#resultados').html("Abrindo ficha...");
	$('#resultados').load('http://portaldoeleitor.16mb.com/scripts/fichaCand.php', {a:1, id:id, ano:ano, uf:uf});
}

$(document).keypress(function(e) {
	if(e.which == 13) {
		pesquisa();
	}
});

function insereNoticia(id,ano,uf){
	//abre página de comentários do facebook para divulgar links de sites externos
	$('#novaNoticia').toggle();
}
