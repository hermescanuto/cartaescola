<!doctype html>
<html class="no-js">

	<head>
		<meta charset="utf-8" />
		<title>Carta na Escola</title>

		<?php
        include 'script_css.php';
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
			<div class="wrapper">
				<!-- slider holder -->
				<div id="slider-holder" class="clearfix">
					<!-- slider -->
					<div class="flexslider home-slider">
						<ul class="slides">
							<li><img src="{base_url}upload/{imagem_home0}" alt="{titulo0}" />
								<p class="flex-caption">
									<a href="{base_url}single/show/{destaque_id0}">{titulo0}</a>
									<br><span style='font-size: 13px'>{desc0}</span>
								</p>
							</li>
							<li><img src="{base_url}upload/{imagem_home1}" alt="{titulo1}" />
								<p class="flex-caption">
									<a href="{base_url}single/show/{destaque_id1}">{titulo1}</a>
									<br><span style='font-size: 13px'>{desc1}</span>
								</p>
							</li>
							<li><img src="{base_url}upload/{imagem_home2}" alt="{titulo2}" />
								<p class="flex-caption">
									<a href="{base_url}single/show/{destaque_id2}">{titulo2}</a>
									<br><span style='font-size: 13px'>{desc2}</span>
								</p>
							</li>
						</ul>
					</div>

					<!-- ENDS slider -->
					<div class="home-slider-clearfix "></div>
					<!-- Headline -->
					<div id="headline" style="text-align:center;  "margin-bottom: 22px;">

						<p>
							<a href="{base_url}edicao/{edicao_numero}" class="opener"><img
							src="{base_url}/upload/capa/{edicao_capa}"
							alt="Capa {edicao_numero} abril Carta na Escola revista mensal"
							width="205" height="261" /> </a>
							<br>
                            
							Edição
							N&deg;{edicao_numero}
						</p>
                        

						<em id="corner"></em>
					</div>
					<!-- ENDS headline -->
				</div>

				<!-- ENDS slider holder -->
				<!-- home-block -->
				<div class="home-block">
					<h2 class="page-heading"><span>Atualidades em sala de aula </span></h2>
					<br>
					<div class="one-third-thumbs clearfix">
						<figure>

							<div style="height: 300px">
							
							  <h5 class="post-heading"><strong>{sub0}</strong></h5>

								<a href="{base_url}single/show/{id0}"><img
								src="{base_url}upload/{imagem0}" alt="Alt text" /> </a>	
		
                                <h4 class="post-heading">{titulo0}</h4>
					
								<span>{olho0}</span>

								<a href="{base_url}single/show/{id0}" class="opener"></a>
							</div>
						</figure>

						<figure>

							<div style="height: 300px">
								<h5 class="post-heading"><strong>{sub1}</strong></h5>
								<a href="{base_url}single/show/{id1}"><img
								src="{base_url}upload/{imagem1}" alt="Alt text" /> </a>
			
                                 <h4 class="post-heading">{titulo1}</h4>
							
								<span>{olho1}</span>
								<a href="{base_url}single/show/{id1}" class="opener"></a>
							</div>

						</figure>
						<figure class="last">
							<div style="height: 300px">
								<h5 class="post-heading"><strong>{sub2}</strong></h5>
								<a href="{base_url}single/show/{id2}"><img
								src="{base_url}upload/{imagem2}" alt="Alt text" /> </a>
                                 <h4 class="post-heading">{titulo2}</h4>
						
								<span>{olho2}</span>
							</div>
						</figure>
						<figure>
							<div style="height: 300px">
							<h5 class="post-heading"><strong>{sub3}</strong></h5>
								<a href="{base_url}single/show/{id3}"><img
								src="{base_url}upload/{imagem3}" alt="Alt text" /> </a>
                                 <h4 class="post-heading">{titulo3}</h4>
							
								<span>{olho3}</span>
							</div>

						</figure>

						<figure>
							<div style="height: 300px">
							<h5 class="post-heading"><strong>{sub4}</strong></h5>
								<a href="{base_url}single/show/{id4}"><img
								src="{base_url}upload/{imagem4}" alt="Alt text" /> </a>
                                 <h4 class="post-heading">{titulo4}</h4>
								
								<span>{olho4}</span>
							</div>
						</figure>

						<figure class="last">

							<div style="height: 300px">
							<h5 class="post-heading"><strong>{sub5}</strong></h5>

								<a href="{base_url}single/show/{id5}"><img
								src="{base_url}upload/{imagem5}" alt="Alt text" /> </a>

								
                                <h4 class="post-heading">{titulo5}</h4>
							
								<span>{olho5}</span>

							</div>
						</figure>
					</div>
				</div>

			</div>

			<!-- ENDS home-block -->
	</div>
		<footer>

			<div class="wrapper">

				<ul class="widget-cols clearfix">
					<li class="first-col">
						<?php
                        include 'primeira_coluna.php';
						?>
					</li>

					<li class="second-col">
						<?php
                        include 'segunda_coluna.php';
						?>
					</li>

					<li class="third-col">
						<?php
                        include 'terceira_coluna.php';
						?>
					</li>

					<li class="fourth-col">
						<?php
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
