/* 
 *
 * @autor	Hermes Canuto de Souza
 * @Descrição controle home do administrativo 
 * exibe o display de confirmacao para apagar um registro 
 * 
 */




function confirma(id,base_url,paging)
{
	var answer = confirm("Deseja realmete Deletar este registro ?");
	if (answer){
		url = base_url+'/DeleteReport/'+id+'/'+paging;
		
		window.location.href= url;
	}	
	
		
}
