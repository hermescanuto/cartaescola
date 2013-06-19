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
			
					<h5>{lista_legenda}</h5>
				<hr>
			

				 {recordset}
				<div class="ui-grid-a" style="border-bottom: 1px dotted rgb(180, 177, 177)" >

					<div class="ui-block-a">
						<a href="{base_url}mobile/single/{id}" data-transition="none" ><img src="{base_url}upload/{imagem_fundo}" alt="{titulo}" class="destaque_imagem"/></a>
					</div>

					<div class="ui-block-b">
						<h5 class="atualidades_titulo">{titulo}</h5>
						<span class="atualidades">{descricao}</span>

					</div>

				</div>
				<br/>

				 {/recordset}
				 
				 <div class="row">{paginacao}</div>

			</div>

			<?php
            include 'footer.php';
			?>
		</div>
	</body>
</html>