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

			<?php
            include 'menu2.php';
			?>

			<!-- destaques -->

			<div data-role="header" data-position="fixed">

				<div class="ui-grid-b">
					<div class="ui-block-a"></div>
					<div class="ui-block-b">
						<a href="{base_url}mobile" data-transition="none"><img src="{base_url}img/lonovo.png"
						alt="Carta Capital" style="width: 100%; height: 100%; max-width:100%;  max-height: 100%;" > </a>
					</div>
					<div class="ui-block-c"></div>
				</div>

			</div>

			<div data-role="content">

				<div class="ui-grid-solo">
					<div class="ui-block-a">
						<a href="{base_url}mobile/single/{id0}" data-transition="none"><img
						src="{base_url}upload/{imagem_home0}" alt="{titulo0}"
						style="height: 97%; width: 97%" /> </a>
						<h5>{titulo0}</h5>
						<p class="destaque">
							{descricao0}
						</p>
					</div>
				</div>

				<div class="ui-grid-solo">
					<div class="ui-block-a">
						<a href="{base_url}mobile/single/{id1}" data-transition="none"><img
						src="{base_url}upload/{imagem_home1}" alt="{titulo1}"
						style="height: 97%; width: 97%" /> </a>
						<h5>{titulo1}</h5>
						<p  class="destaque">

							{descricao1}
						</p>
					</div>
				</div>

				<div class="ui-grid-solo">
					<div class="ui-block-a">
						<a href="{base_url}mobile/single/{id2}" data-transition="none"><img
						src="{base_url}upload/{imagem_home2}" alt="{titulo2}"
						style="height: 97%; width: 97%" /> </a>
						<h5>{titulo2}</h5>
						<p  class="destaque">
							{descricao2}
						</p>
					</div>
				</div>

				<!-- destaques -->

				Atualidades
				<hr>

				{lista_materias}
				<div class="ui-grid-a">

					<div class="ui-block-a">
						<a href="{base_url}mobile/single/{id}" data-transition="none" ><img src="{base_url}upload/{imagem_fundo}" alt="{titulo}" class="destaque_imagem"/></a>
					</div>

					<div class="ui-block-b">
						<span class="atualidades_titulo">{titulo}</span>
						<br/>
						<span class="atualidades">{descricao}</span>

					</div>

				</div>

				{/lista_materias}

			</div>

			<?php
            include 'footer.php';
			?>
		</div>
	</body>
</html>
