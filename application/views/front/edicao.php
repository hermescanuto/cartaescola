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
        <?php
        include 'googleanalytics.php';
		?>
    </header>

	<!-- MAIN -->
	<div id="main">
		<div class="wrapper">

			<div class="container">
			 <h2 class="page-heading">
						<span>Edição: {edicao}</span>
					</h2>
			
			  <div class="span2">
			
           
				<img src="{base_url}/upload/capa/{edicao_capa}"
					alt="Capa {edicao_numero} abril Carta na Escola revista mensal"
					/>

                
                </div>
                
                 <div class="span7">
                
				{recordset}
                <div class="row">

                    <div class="span10">
                    
                        <div class="span2" style='margin-bottom: 10px'>

                            <a href="{base_url}single/show/{id}"><img src="{base_url}/upload/{imagem_fundo}" alt="{titulo}"
                                title="{titulo}"  /></a>
                        </div>

                        <div class="span5" style='margin-bottom: 5px'>
                            <a href="{base_url}single/show/{id}"><h4 class="post-heading" style='margin-bottom: -15px;margin-top: 10px;'>{titulo}</h4></a>
                            <br>
                            {descricao} 
                      

                        </div>
                    </div>
                </div>

				{/recordset}

				<div class="row">{paginacao}</div>
				
				</div>
				
				

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
