$(document).ready(function(){
		
	$('#salvar').click(function(){	
		erro = "";
		
		
			
		erro += valid_field('nome','','Favor inserir um nome');
		erro += valid_field('endereco','','Favor inserir um endereço');
		//erro += valid_field('url_gmaps','','Favor inserir o link do Google Maps');
		
		
		mapa = $('#url_gmaps').val();		
		if ( isUrl(mapa) === false ) { erro += 'Favor inserir o link do Google Maps'; }		
				
		valid_error('form1',erro);	
		
	});	
	
	$('#gmapsview').click(function(){	
		var url = $('#url_gmaps').val();
		if ( isUrl(url) != false ) 
		{
			window.open(url,'gmaps','_blank');
			return false;
		}
		else
		{
			alert('Favor inserir o link do Google Maps!');
		}
	});	
	
	
	$('#buscacep').click(function(){	

		var cep = $('#cep').val();
		
		if ( cep != '' ) {
		
		var surl = 'http://cep.republicavirtual.com.br/web_cep.php?cep='+cep+'&formato=javascript';	
		
		$.ajax({
			type: "GET",
			url: surl,
			dataType: "script",
			 beforeSend: function(){	
				$('salvar').attr('disabled', 'disabled');
				$('#gmapsview').attr('disabled', 'disabled');	
				$('#status_busca').html('<img src="http://127.0.0.1/websites/voleisp/pics/ajax-loader.gif" border="0" />');	
			},
			complete: function(){
				$('salvar').removeAttr('disabled');
				$('#gmapsview').removeAttr('disabled');
				$('#status_busca').html(' ');
			},
			success: function(){
				showresult();
			},
			error: function(request,error){
				alert("Erro:"+error);
			}
			
			
		});	
		
	}else{ alert ('Favor digitar o cep'); }

	});	

	
});


function showresult()
 {
	 if (resultadoCEP['resultado'] == 0){
			alert ('serviço indisponível/cep inválido');
		}
		else{ 
				 $('#endereco').val( unescape ( resultadoCEP['tipo_logradouro'] ) + ' ' + unescape (resultadoCEP['logradouro'] ));
				 $('#cidade').val( unescape ( resultadoCEP['cidade'] ) );
				 $('#estado').val(resultadoCEP['uf']) ;
		} 
 }


