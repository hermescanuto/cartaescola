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
							</p>
						</li>
						<li><img src="{base_url}upload/{imagem_home1}" alt="{titulo1}" />
							<p class="flex-caption">
								<a href="{base_url}single/show/{destaque_id1}">{titulo1}</a>
							</p>
						</li>
						<li><img src="{base_url}upload/{imagem_home2}" alt="{titulo2}" />
							<p class="flex-caption">
								<a href="{base_url}single/show/{destaque_id2}">{titulo2}</a>
							</p>
						</li>
					</ul>
				</div>
				<!-- ENDS slider -->
				<div class="home-slider-clearfix "></div>
				<!-- Headline -->
				<div id="headline">
					<center>
						<p>
							<a href="{base_url}edicao/{edicao_numero}" class="opener"><img
								src="{base_url}/upload/capa/{edicao_capa}"
								alt="Capa {edicao_numero} abril Carta na Escola revista mensal"
								width="177" height="226" /> </a> <br> Edição
							N&deg;{edicao_numero}
						</p>
					</center>
					</span><em id="corner"></em>
				</div>
				<!-- ENDS headline -->
			</div>
			<!-- ENDS slider holder -->
			<!-- home-block -->
			<div class="home-block">
				<h2 class="page-heading">
					<span>Atualidades em sala de aula</span>
				</h2>
				<br> <br>
				<div class="one-third-thumbs clearfix">
					<figure>
						<figcaption>
							<strong>{sub0}</strong> <span>{olho0}</span> <em>{data_criacao0}</em>
							<a href="{base_url}single/show/{id0}" class="opener"></a>
						</figcaption>
						<a href="{base_url}single/show/{id0}" class="thumb"><img
							src="{base_url}upload/{imagem0}" alt="Alt text" /> </a>
					</figure>
					<figure>
						<figcaption>
							<strong>{sub1}</strong> <span>{olho1}</span> <em>{data_criacao1}</em>
							<a href="{base_url}single/show/{id1}" class="opener"></a>
						</figcaption>
						<a href="{base_url}single/show/{id1}" class="thumb"><img
							src="{base_url}upload/{imagem1}" alt="Alt text" /> </a>
					</figure>
					<figure class="last">
						<figcaption>
							<strong>{sub2}</strong> <span>{olho2}</span> <em>{data_criacao2}</em>
							<a href="{base_url}single/show/{id2}" class="opener"></a>
						</figcaption>
						<a href="{base_url}single/show/{id2}" class="thumb"><img
							src="{base_url}upload/{imagem2}" alt="Alt text" /> </a>
					</figure>
					<figure>
						<figcaption>
							<strong>{sub3}</strong> <span>{olho3}</span> <em>{data_criacao3}</em>
							<a href="{base_url}single/show/{id3}" class="opener"></a>
						</figcaption>
						<a href="{base_url}single/show/{id3}" class="thumb"><img
							src="{base_url}upload/{imagem3}" alt="Alt text" /> </a>
					</figure>
					<figure>
						<figcaption>
							<strong>{sub4}</strong> <span>{olho4}</span> <em>{data_criacao4}</em>
							<a href="{base_url}single/show/{id4}" class="opener"></a>
						</figcaption>
						<a href="{base_url}single/show/{id4}" class="thumb"><img
							src="{base_url}upload/{imagem4}" alt="Alt text" /> </a>
					</figure>
					<figure class="last">
						<figcaption>
							<strong>{sub5}</strong> <span>{olho5}</span> <em>{data_criacao5}</em>
							<a href="{base_url}single/show/{id5}" class="opener"></a>
						</figcaption>
						<a href="{base_url}single/show/{id5}" class="thumb"><img
							src="{base_url}upload/{imagem5}" alt="Alt text" /> </a>
					</figure>
				</div>
			</div>
			<!-- ENDS home-block -->
			<!-- home-block -->
			<div class="home-block" style="display: none">
				<h2 class="home-block-heading">
					<span>EDIÇÕES ANTERIORES</span>
				</h2>
				<div class="one-fourth-thumbs clearfix">
					<figure>
						<figcaption>
							<strong>Redação</strong> <span>Professor as matérias
								originalmente publicadas em CartaCapital estão disponíveis
								para seus alunos no site www.cartacapital.com.br.</span> <em>December
								08, 2011</em> <a href="single.html" class="opener"></a>
						</figcaption>
						<a href="single.html" class="thumb"><img
							src="{base_url}img/dummies/featured-7.jpg" alt="Alt text" /> </a>
					</figure>
					<figure>
						<figcaption>
							<strong>História</strong> <span>Professor as matérias
								originalmente publicadas em CartaCapital estão disponíveis
								para seus alunos no site www.cartacapital.com.br.</span> <em>December
								08, 2011</em> <a href="single.html" class="opener"></a>
						</figcaption>
						<a href="single.html" class="thumb"><img
							src="{base_url}img/dummies/featured-8.jpg" alt="Alt text" /> </a>
					</figure>
					<figure>
						<figcaption>
							<strong>Tecnologia</strong> <span>Professor as matérias
								originalmente publicadas em CartaCapital estão disponíveis
								para seus alunos no site www.cartacapital.com.br.</span> <em>December
								08, 2011</em> <a href="single.html" class="opener"></a>
						</figcaption>
						<a href="single.html" class="thumb"><img
							src="{base_url}img/dummies/featured-9.jpg" alt="Alt text" /> </a>
					</figure>
					<figure class="last">
						<figcaption>
							<strong>Língua Inglesa</strong> <span>Professor as matérias
								originalmente publicadas em CartaCapital estão disponíveis
								para seus alunos no site www.cartacapital.com.br.</span> <em>December
								08, 2011</em> <a href="single.html" class="opener"></a>
						</figcaption>
						<a href="single.html" class="thumb"><img
							src="{base_url}img/dummies/featured-10.jpg" alt="Alt text" /> </a>
					</figure>
					<a href="#" class="more-link right">Mais matérias &#8594;</a>
				</div>
			</div>
			<!-- ENDS home-block -->
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
