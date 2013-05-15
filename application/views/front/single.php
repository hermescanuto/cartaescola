<!doctype html>
<html class="no-js">

	<head>
		<meta charset="utf-8"/>
		<title>Carta na Escola</title>

		<?php
include 'script_css.php'
		?>
		<style>
			.credito_foto {

				text-align: right;
				font-family: Arial, Helvetica, sans-serif;
				font-size: 11px;
				color: white;
				opacity: .7;
				background-color: #000;
				position: absolute;
				margin-top: -50px;
				margin-left: 10 px;
				padding: 9px;
			}

		</style>

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
			<div class="wrapper clearfix">

				<!-- posts list -->
				<div id="posts-list" class="single-post">

					<h2 class="page-heading"><span>Teste</span></h2>

					<article class="format-standard" >
						<div class="entry-date">
							<div class="number">
								{mes}
							</div>
							<div class="year" style="font-size: 18px">
								{ano}
							</div>
						</div>
						<div  ><img src="{base_url}upload/{imagem_home}" alt="{titulo}"  style="max-width: 550px"/>
							<div class="credito_foto" >
								{credito_foto}
							</div>
						</div>
						<br/>

						<h2  class="post-heading">{titulo}</h2>
						<div class="post-content">
							{texto}
							{pdf_free}
						</div>

						<div class="meta"  style="display:none">
							<div class="categories">
								In <a href="#">Categoria 1</a>, <a href="#">Categoria 2</a>
							</div>
							<div class="comments">
								<a href="#">5 comentários </a>
							</div>
							<div class="user">
								<a href="#">Redação</a>
							</div>
						</div>

					</article>

				</div>
				<!-- ENDS posts list -->

				<!-- sidebar -->
				<aside id="sidebar">
					{texto_extra}
				</aside>
				<!-- ENDS sidebar -->

			</div>
		</div>
		<!-- ENDS MAIN -->

		<footer>
			<div class="wrapper">

				<ul  class="widget-cols clearfix">
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