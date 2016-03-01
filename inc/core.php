<?
/** 
  * DEFINIÇÕES
  */

# banco principal
define("DBURL_1","localhost");
define("DBUSR_1","root");
define("DBPSW_1","");
define("DBNAME_1","pde");

# banco auxiliar 1
define("DBURL_2","localhost");
define("DBUSR_2","root");
define("DBPSW_2","");
define("DBNAME_2","pde");

# banco auxiliar 2
define("DBURL_3","localhost");
define("DBUSR_3","root");
define("DBPSW_3","");
define("DBNAME_3","pde");

/** 
  * FUNÇÕES DO SISTEMA
  */
function conecta(){
    // tenta se conectar ao servidor principal
    if(mysql_connect(DBURL_1,DBUSR_1,DBPSW_1)){
	if(mysql_select_db(DBNAME_1)){ // se conseguir conexão, tenta selecionar banco
		return true;
	}else{
		// falhando o servidor principal, tenta se conectar ao primeiro servidor auxiliar 
		if(mysql_connect(DBURL_2,DBUSR_2,DBPSW_2)){
			if(mysql_select_db(DBNAME_2)){ // se conseguir conexão, tenta selecionar banco
				return true;
			}else{
				// falhando o primeiro servidor auxiliar, tenta se conectar ao segundo servidor auxiliar 
				if(mysql_connect(DBURL_3,DBUSR_3,DBPSW_3)){
					if(mysql_select_db(DBNAME_3)){ // se conseguir conexão, tenta selecionar banco
						return true;
					}else{
						return false;
					}
				}
			}
		}
	}
    }else{
	    // tenta se conectar ao servidor auxiliar
	    if(mysql_connect(DBURL_2,DBUSR_2,DBPSW_2)){
		if(mysql_select_db(DBNAME_2)){ // se conseguir conexão, tenta selecionar banco
			return true;
		}else{
			// falhando o servidor auxiliar, tenta se conectar ao próximo servidor auxiliar 
			if(mysql_connect(DBURL_3,DBUSR_3,DBPSW_3)){
				if(mysql_select_db(DBNAME_3)){ // se conseguir conexão, tenta selecionar banco
					return true;
				}else{
					return false;
				}
			}
		}
	    }else{
		// falhando o servidor auxiliar, tenta se conectar ao último servidor auxiliar 
		if(mysql_connect(DBURL_3,DBUSR_3,DBPSW_3)){
			if(mysql_select_db(DBNAME_3)){ // se conseguir conexão, tenta selecionar banco
				return true;
			}else{
				return false;
			}
		}
	    }
    }
}
