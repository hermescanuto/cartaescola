<!DOCTYPE html>
<html>
	<head>

		<?php
        include 'script_css2.php';
		?>
    <link
    rel="stylesheet"
    href="{base_url}jquery_mobile/single.css" />
	</head>

	<body>

		<div data-role='page'>



					<?php
                    include 'menu2.php';
					?>
			

			<!-- destaques -->

			<div data-role="header" data-position="fixed" data-add-back-btn="true">

				<div class="ui-grid-b">
					<div class="ui-block-a"></div>
					<div class="ui-block-b">
						<a href="{base_url}mobile" data-transition="none" data-inline="true" ><img src="{base_url}img/lonovo.png"
						alt="Carta Capital" style="width: 100%; height: 100%"> </a>
					</div>
					<div class="ui-block-c"></div>
				</div>

			</div>

			<div data-role="content">

				<div class="ui-grid-solo">
				    
				    
					<div class="ui-block-a">
						<img src="{base_url}upload/{imagem_home}" alt="{titulo}" class="destaque_imagem"/>
					</div>
					
					
					<span class="titulo" >{titulo}</span><br/>
					<span class="texto">{texto}</span>
					
					{pdf_free}
				</div>

			</div>

			<?php
                    include 'footer.php';
              ?>

		</div>
	</body>
</html>
