<!DOCTYPE html>
<html>
<head>

	<?php
	include 'script_css2.php';
	?>

	<link

	href="{base_url}jquery_mobile/home.css" rel="stylesheet" type="text/css"/>

</head>



<body>

	<div data-role='page'>

		<!-- menu -->
		<?php
		include 'menu2.php';
		?>
		<!-- menu -->	
		
		<!-- header -->
		<?php
		include 'header.php';
		?>
		<!-- header -->


		<!-- destaques -->

		<div data-role="content">

			<br/>

			<h3> Lista de Produtos disponíveis  </h3>

			{lista_edicao}
            Edição {edicao}. <a href="{base_url}mobile/login/showdpf/{edicao}/{user}/{senha}" > Download PDF</a>    -     <a href="{base_url}mobile/login/showpdfhtml/{edicao}/{user}/{senha}" target='edicao_html5'> Visualizar PDF </a> <br>
            {/lista_edicao}

		</div>

		<?php
		include 'footer.php';
		?>
	</div>
</body>
</html>
