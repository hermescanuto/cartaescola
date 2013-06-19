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

				<div class="ui-grid-solo">
					<div class="ui-block-a">
						<a href="{base_url}mobile/single/{id0}" data-transition="none"><img
						src="{base_url}upload/{imagem_home0}" alt="{titulo0}"
						class="imagem_destaque" /></a>
						</div>
						<div class="ui-block-a">
						<h5 class='sub_destaque' >{sub0}</h5>
						<h5 class='titulo_destaque' >{titulo0}</h5>
						<span class="descricao_destaque">{descricao0}</span>
						
					</div>
				</div>

				<div class="ui-grid-solo">
					<div class="ui-block-a">
						<a href="{base_url}mobile/single/{id1}" data-transition="none"><img
						src="{base_url}upload/{imagem_home1}" alt="{titulo1}"
						class="imagem_destaque" /> </a>
						<h5 class='sub_destaque' >{sub1}</h5>
						<h5 class='titulo_destaque' >{titulo1}</h5>
						<span class="descricao_destaque">{descricao1}</span>
					</div>
				</div>

				<div class="ui-grid-solo">
					<div class="ui-block-a">
						<a href="{base_url}mobile/single/{id2}" data-transition="none"><img
						src="{base_url}upload/{imagem_home2}" alt="{titulo2}"
						class="imagem_destaque" /> </a>
						<h5 class='sub_destaque' >{sub2}</h5>
						<h5 class='titulo_destaque' >{titulo2}</h5>
						<span class="descricao_destaque">{descricao2}</span>
					</div>
				</div>

				<!-- destaques -->

				Atualidades
				<hr>

				{lista_materias}
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

				{/lista_materias}

			</div>

			<?php
            include 'footer.php';
			?>
		</div>
	</body>
</html>
