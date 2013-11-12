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
	<?php
        include 'barra_simples.php';
		?>

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
	<div id="main">
		<div class="wrapper clearfix">

			<div id="posts-list" class="single-post">

				<!-- floated content -->
				<div class="floated-content">

					<h2 class="page-heading">
						<span>Acervo</span>
					</h2>

					<div style='width: 98%;'>
					
					{lista_acervo}
					<div class="float: left;margin: 0.5em 1em 0.5em 0;">

          			  
                           
             			<div style='float: left;margin-left: 5px;margin-right: 5px;'>
             			<span> {edicao} </span>
             			<a href="{base_url}edicao/{edicao}">
							<img src="{base_url}upload/capa/{imagem_capa}" alt="Parem de subestimar o povo" title="Edição {edicao}" height="128" width="103">
						</a>
						</div>
						 
						<div style=''> </div>
         		  
       				 </div>
					{/lista_acervo}
					
					
					
					</div>


				</div>

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
