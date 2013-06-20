<!DOCTYPE html>
<html>
	<head>
	
	

		<?php
        include 'script_css2.php';
		?>
		
		<link
        
        href="{base_url}jquery_mobile/home.css" rel="stylesheet" type="text/css"/>
		
	</head>
	
	

	<body>

		<div data-role='page'>

		<!-- menu -->
			<?php
            include 'menu2.php';
			?>
		<!-- menu -->	
		
			<!-- header -->
			<?php
            	include 'header.php';
			?>
			<!-- header -->
			
			
			<!-- destaques -->

			<div data-role="content">
			
					<h4>Contato</h4>
				<br>
				
<script type="text/javascript">

$("#enviar").click(function() {

   		$('#contactForm').submit()
});
</script>

				<form id="contactForm" action="{base_url}mobile/contato/enviar"  method="post" data-ajax=”false”>

						<fieldset>
							<div><label>Nome:</label>
								<input name="name" id="name" type="text" 
									title="Entre com o seu nome completo" /> 
							</div>
							<div> <label>Email:</label>
								<input name="email" id="email" type="text" 
									title="Entre com o seu e-mail" />
							</div>
							
							<div> <label>Área:</label>
								<select id='to' name='to'>
									 <option  value='escola@cartacapital.com.br'>Redação</option>
									 <option  value='comercial@cartacapital.com.br'>Comercial</option>
								</select>
							</div>
							
                            <div><label>Assunto:</label>
								<input name="assunto" id="assunto" type="text" 
									title="Entre com o assunto" /> 
							</div>

							<div><label>Mensagem:</label>
								<textarea name="comments" id="comments" rows="5" cols="20"
									 title="Poste seus comentário"></textarea>
							</div>

							<p>
								
							</p>
			
						</fieldset>

					</form>
					
					<a href="#"  data-role="button"  id='enviar' >Enviar</a>
					
	        <br>
			<h4>Central de atendimento</h4>
					<p>
						Assinaturas, sugestões e reclamações
					</p>
				
					
						São Paulo<br>
						(11) 3512-9486 <br> 
						<br>
						Rio de Janeiro<br>
						(21) 4062-7183 <br> 
						<br>
						Belo Horizonte<br>
						(31) 4062-7183 <br> 
						<br>
						Distrito Federal<br>
						(61) 4063-7183<br>
						<br /> De segunda a sexta, das 9 às 18 horas exceto
							feriados<br>
						<strong>Números atrasados:</strong><br>
						<a href="mailto:avulsas@cartacapital.com.br">avulsas@cartacapital.com.br</a>
						<br>
					   <strong>Fale Conosco:</strong><br>
						<a
							href="http://www.assinantecartacapital.com.br">assinantecartacapital</a>
						<br>
				

			</div>

			<?php
            include 'footer.php';
			?>
		</div>

	</body>
</html>
