<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Lista de Edições</title>
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-theme.min.css">
   <style type="text/css">
    body {
	margin-left: 0px;
}
    </style>
    <?php
include 'script_css.php'
		?>
    
<script src="includes/ice/ice.js" type="text/javascript"></script>
</head>
<body>
      <?php
        include 'barra_simples.php';
		?>

<div>
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
		<?php
        include 'googleanalytics.php';
		?>
</header>
</div>
<table width="800" border="1">
  <tr>
    <th scope="col">&nbsp;</th>
  </tr>
</table>
<div>
  <div align="center">
    <table width="896" height="195" border="1">
      <tr>
        <th width="44" scope="col">&nbsp;</th>
        <th width="836" scope="col">
          <div align="left"><br/>
            
          </div>
          <br><h3 align="left"> Lista de Produtos disponíveis  </h3> </br>
     
          <div align="left">{lista_edicao}


            Edição {edicao}.  <a href="{base_url}login/showpdfhtml/{edicao}/{user}/{senha}" target='edicao_html5' onclick="ga('send', 'event', 'Leitura_on_line', 'Edicao', '{edicao}');" target='edicao_html5'> Ler Online </a> <br>
            {/lista_edicao}
            
            
          </div></th>
      </tr>
    </table>
  </div>
</div>
<p>&nbsp;</p>
    <div>
	<div align="center">
	  <table width="800" height="59" border="1">
	    <tr>
	      <th scope="col"><div align="left"><a href="http://get.adobe.com/br/reader/">Caso você não possua leitor de PDF acesse o link aqui para baixar</a></div></th>
        </tr>
  </table>
	  </div>
	<p align="center"><a href="http://get.adobe.com/br/reader/"></a></p>
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