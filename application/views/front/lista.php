<!doctype html>
<html class="no-js">

	<head>
		<meta charset="utf-8"/>
		<title>Carta na Escola</title>

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
    </div></div>
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
               
                    <h2 class="page-heading" ><span>{lista_legenda}</span></h2>
                    <br>
					{recordset}
					<div class="row">
					    
						<div class="span10" >
							<div class="span2" style="padding: 0px">

								<img src="{base_url}/upload/{imagem_fundo}"  alt="{titulo}" title="{titulo}" />
							</div>

							<div class="span7" >
                            
	
								
								    <span style="font-size: 15px">Edição: {edicao} </span >
                                    <p></p>
									<h3 class="post-heading" >{titulo} </h3><br>
									<span style="font-size: 16px">{descricao} <a href="{base_url}single/show/{id}" > leia mais...</a></span>
								
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