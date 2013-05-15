<!doctype html>
<html class="no-js">

	<head>
		<meta charset="utf-8"/>
		<title>Carta na Escola</title>

		<?php
        include 'file:///sites/cartaescola/application/views/front/script_css.php';
		?>

		<script src="file:///sites/cartaescola/application/views/front/{base_url}js/bootstrap.js" type="text/javascript" ></script>
		<link href="file:///sites/cartaescola/application/views/front/{base_url}css/bootstrap.css" rel="stylesheet" type="text/css" />
		<link href="file:///sites/cartaescola/application/views/front/{base_url}/css/bootstrap-responsive.css" rel="stylesheet">

	</head>

	<body lang="en">

		<header class="clearfix">

			<!-- top widget -->
			<div id="top-widget-holder">
				<div class="wrapper">
					<div id="top-widget">
						<div class="padding"></div>
					</div>

					<!-- ENDS top-widget -->

					<div class="wrapper clearfix">

						<?php
                        include 'file:///sites/cartaescola/application/views/front/menu.php';
						?>
					</div>
		</header>

		<!-- MAIN -->
		<div id="main">
			<div class="wrapper">
			    
				<div class="container-fluid">
				    <img src="{base_url}/upload/capa/{edicao_capa}" alt="Capa {edicao_numero} abril Carta na Escola revista mensal" width="165" height="211" />
                    <h4 class="post-heading" >Edição: {edicao}</h4>
					{recordset}
					<div class="row">
					    
						<div class="span10" >
							<div class="span2" style="padding: 5px">

								<img src="{base_url}/upload/{imagem_fundo}"  alt="{titulo}" title="{titulo}" />
							</div>

							<div class="span7" >
								
								    <span style="font-size: 10px">{tipo_conteudo}</span >
									<h4 class="post-heading" >{titulo} </h4>
									<span >{descricao} <a href="{base_url}single/show/{id}/{titulo}" >leia mais...</a></span>
								
							</div>
						</div>
					</div>

					{/recordset}

					<div class="row">
						{paginacao}
					</div>

				</div>

			</div>
		</div>

		<footer>

			<div class="wrapper">

				<ul  class="widget-cols clearfix">
					<li class="first-col">

						<?php
                        include 'file:///sites/cartaescola/application/views/front/primeira_coluna.php';
						?>
					</li>

					<li class="second-col">

						<?php
                        include 'file:///sites/cartaescola/application/views/front/segunda_coluna.php';
						?>

					</li>

					<li class="third-col">

						<?php
                        include 'file:///sites/cartaescola/application/views/front/terceira_coluna.php';
						?>

					</li>

					<li class="fourth-col">

						<?php
                        include 'file:///sites/cartaescola/application/views/front/quarta_coluna.php';
						?>

					</li>
				</ul>

				<?php
                include 'file:///sites/cartaescola/application/views/front/footer_bottom.php';
				?>

			</div>
		</footer>

	</body>
</html>