<!doctype html>
<html lang="en">

	<head>
		<?php
        include 'script_css.php';
		?>
		<style>
			#carousel-caption {

				height: 200px;
			}
			#img {
				width: 45%;
				height: 45%;
				padding: 3px;
			}

		</style>
	</head>
	<body  >

		<?php
        include 'menu.php';
		?>

		<div class="row">

			<div id="this-carousel-id" class="carousel slide">

				<div class="carousel-inner">
					<div class="item active">
						<a  href="{base_url}mobile/single/{id0}"><img src="{base_url}upload/{imagem_home0}" alt="{titulo0}" /></a>
						<div class="carousel-caption" >
							<p>
								{titulo0}
							</p>
						</div>
					</div>
					<div class="item">
						<a  href="{base_url}mobile/single/{id1}"><img src="{base_url}upload/{imagem_home1}" alt="{titulo1}" /></a>
						<div class="carousel-caption" >
							<p>
								{titulo1}
							</p>
						</div>
					</div>
					<div class="item">
						<a  href="{base_url}mobile/single/{id2}"><img src="{base_url}upload/{imagem_home2}" alt="{titulo2}" /></a>
						<div class="carousel-caption" >

							<p>
								{titulo2}
							</p>
						</div>
					</div>

				</div>
				<a class="carousel-control left" href="#this-carousel-id" data-slide="prev">&lsaquo;</a>
				<a class="carousel-control right" href="#this-carousel-id" data-slide="next">&rsaquo;</a>
			</div>

		</div>
        <div class="well well-small">Atualidades em sala de aula</div>

		{lista_materias}

		<div class="media">
			<a class="pull-left" href="{base_url}mobile/single/{id}"><img class="media-object img-polaroid" src="{base_url}upload/{imagem_fundo}" alt="{titulo}" /></a>

			<div class="media-body">
				<h5 class="media-heading">{tipo_conteudo}</h5>
				<h4 class="media-heading">{titulo}</h4>

				<span>{descricao}</span>
				
					<p>
						<a class="btn btn-inverse" href="{base_url}mobile/single/{id}">Leia mais &raquo;</a>
					</p>
			

			</div>
		</div>

		{/lista_materias}
		<script src="http://code.jquery.com/jquery-latest.min.js"></script>
		<script src="{base_url}js/bootstrap.min.js"></script>
		<script>
			$(document).ready(function() {
				$('.carousel').carousel();
			});
		</script>
	</body>
</html>