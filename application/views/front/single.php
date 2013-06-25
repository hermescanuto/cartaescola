<!doctype html>
<html class="no-js">

<head>
<meta charset="utf-8" />
<title>Carta na Escola</title>

<?php
include 'script_css.php'
		?>
<style>
.credito_foto {
	text-align: right;
	font-family: Arial, Helvetica, sans-serif;
	font-size: 13px;
	color: white;
	opacity: .7;
	background-color: #000;
	position: absolute;
	margin-top: -50px;
	margin-left: 10 px;
	padding: 9px;
}

p {
	margin-bottom: 5px;
}
.credito_foto2 {
		text-align: right;
		font-size: 0.8em;
		text-transform: none;
		padding-right: 40px;
	}

</style>

</head>

<body lang="en">
	<?php
        include 'barra_simples.php';
		?>

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
			
			<div class="wrapper" >
			
			<h2 class="page-heading" style='width: 560px'><span>{tipo_conteudo}</span> <span>{sub_classificacao}</span></h2>
					
			</div>

				

				<article class="format-standard">
					
					<div>
						<div class="credito_foto2">{credito_foto}</div>
						<img src="{base_url}upload/{imagem_fundo}" alt="{titulo}"
							style="max-width: 98%" />
						<div class="credito_foto">{legenda_foto}</div>
					</div>
					<br />

					<h2 class="post-heading">{titulo}</h2>
					<h4 class="post-heading">{descricao}</h4>
                    <h6 class="post-heading">Por {autor} — publicado na edição {edicao}, mês {edicao_mes} </h6>
					<div class="post-content">{texto} {pdf_free}</div>
                    <br>
                    <br>
                    

					<div class="meta" style="display: none">
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
			
            <aside id="sidebar">{texto_extra}
            <em id="corner"></em>
            
            
                
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
