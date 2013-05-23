<!doctype html>
<html class="no-js">

<head>
<meta charset="utf-8" />
<title>Carta na Escola</title>

<?php
include 'script_css.php'
		?>

</head>

<body lang="en">

	<header class="clearfix">

		<!-- top widget -->

		<div id="top-widget">
			<div class="padding"></div>
		</div>

		<!-- ENDS top-widget -->

		<div class="wrapper clearfix">

			<?php
			include 'menu.php';
			?>
		</div>
	</header>

	<!-- MAIN -->
	<div>
    Sua mensagem foi enviada com sucesso.
    </div>
			<!-- ENDS posts list -->

			<!-- sidebar -->
			<aside id="sidebar">
				<div class="block">
					<h4>Central de atendimento</h4>
					<p>
						Assinaturas, sugestões <br> e reclamações
					</p>

					<ul class="address-block">
						<!-- <li class="address">Address line, city, state ZIP</li> -->
						<li class="phone">São Paulo</li>
						<li>(11) 3512-9486 <br> <br>
						</li>
						<li class="phone">Rio de Janeiro</li>
						<li>(21) 4062-7183 <br> <br>
						</li>
						<li class="phone">Belo Horizonte</li>
						<li>(31) 4062-7183 <br> <br>
						</li>
						<li class="phone">Distrito Federal</li>
						<li>(61) 4063-7183</li>
						<li><br /> De segunda a sexta, das 9 <br> às 18 horas exceto
							feriados</li>
						<li><br /> Números atrasados:</li>
						<li class="email"><a href="mailto:avulsas@cartacapital.com.br">avulsas@cartacapital.com.br</a>
						</li>
						<li><br /> Fale Conosco:</li>
						<li class="email"><a
							href="http://www.assinantecartacapital.com.br">assinantecartacapital</a>
						</li>

					</ul>
					<em id="corner"></em>

				</div>

			</aside>
			<!-- ENDS sidebar -->

		</div>
	</div>
	<!-- ENDS MAIN -->

	<footer>
		<div class="wrapper">

			<ul class="widget-cols clearfix">
				<li class="first-col"><?php
				include 'primeira_coluna.php'
		?>
				</li>

				<li class="second-col"><?php
				include 'segunda_coluna.php'
		?>
				</li>

				<li class="third-col"><?php
				include 'terceira_coluna.php'
		?>
				</li>

				<li class="fourth-col"><?php
				include 'quarta_coluna.php'
		?>
				</li>
			</ul>

			<?php
			include 'footer_bottom.php'
		?>

		</div>
	</footer>

</body>

</html>
