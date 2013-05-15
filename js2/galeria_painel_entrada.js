$(document).ready(function(){
	
		$('#salvar').click(function(){	
			
				$('#texto_ckeditor').val(  $('#texto').val() ) ;
			
				erro = "";			
				erro += valid_field('titulo','','Favor inserir um titulo');
				erro += valid_field('descricao','','Favor inserir a descrição');				
				valid_error('form1',erro);			
		});	
		
	
		
});
