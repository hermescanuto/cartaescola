<!doctype html>
<html class="no-js">

<head>
<meta charset="utf-8" />
<title>Carta na Escola</title>


<script src="{base_url}js/bootstrap.js" type="text/javascript"></script>
<link href="{base_url}css/bootstrap.css" rel="stylesheet"
	type="text/css" />
<link href="{base_url}/css/bootstrap-responsive.css" rel="stylesheet">


<?php
include 'script_css.php';
?>



</head>

<body lang="en">

	<header class="clearfix">

		<!-- top widget -->
		<div id="top-widget-holder">
			<div class="wrapper">
				<div id="top-widget">
					<div class="padding"></div>
				</div>
			</div>
		</div>
		<!-- ENDS top-widget -->

		<div class="wrapper clearfix">

			<?php
			include 'menu.php';
			?>
		</div>
	</header>

	<!-- MAIN -->
	<div id="main">
		<div class="wrapper">

			<div class="container-fluid">
				<h4 class="post-heading">{lista_legenda}</h4>
				{recordset}
				<div class="row">

					<div class="span10">
						<div class="span2" style="padding: 5px">

							<img src="{base_url}/upload/{imagem_fundo}" alt="{titulo}"
								title="{titulo}" />
						</div>

						<div class="span7">

							<span style="font-size: 10px">Edição : {edicao} </span>
							<h4 class="post-heading">{titulo}</h4>
							<span>{descricao} <a href="{base_url}single/show/{id}"> leia
									mais...</a>
							</span>

						</div>
					</div>
				</div>

				{/recordset}

				<div class="row">{paginacao}</div>

			</div>

		</div>
	</div>

	<footer>

		<div class="wrapper">

			<ul class="widget-cols clearfix">
				<li class="first-col"><?php
				include 'primeira_coluna.php';
				?>
				</li>

				<li class="second-col"><?php
				include 'segunda_coluna.php';
				?>
				</li>

				<li class="third-col"><?php
				include 'terceira_coluna.php';
				?>
				</li>

				<li class="fourth-col"><?php
				include 'quarta_coluna.php';
				?>
				</li>
			</ul>

			<?php
			include 'footer_bottom.php';
			?>

		</div>
	</footer>

</body>
</html>
