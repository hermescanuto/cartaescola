function valid_error(name_form,erro) {
		
		if ( erro == "" ) {
			document.getElementById(name_form).submit();			
			return true;
		}else{			
			msg = "Favor digitar os seguintes campos corretamente:\n\n"; 
			msg += erro;
			alert(msg);	
			erro = "";
			return false;
		}
		
		
}

function valid_field(campo,comparar,msg){	

	   var campo = '#' + campo;
	   
	   var normalcss = {'background-color' : 'white' };
	   var errocss =   {'background-color' : '#B7B7B7'} ;
	   
	   if ( $(campo).val( ) == comparar ){
		  $(campo).css(errocss);
		  return  msg +"\n"; 
	   }else{		   
		  $(campo).css(normalcss)
		  return ''; 		   
	   }
}


function isCheckedById(id) 
{ 
	var checked = $("input[@id="+id+"]:checked").length; 
	if (checked == 0) 
	{ 
		return false; 
	} 
	else 
	{ 
		return true; 
	} 
}

function isUrl(s) {
	var regexp = /(ftp|http|https):\/\/(\w+:{0,1}\w*@)?(\S+)(:[0-9]+)?(\/|\/([\w#!:.?+=&%@!\-\/]))?/
	return regexp.test(s);
}
