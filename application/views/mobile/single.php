<!doctype html>
<html lang="en">

<head>
<?php
include 'script_css.php';
?>
<style>
#carousel-caption {
	height: 200px;
}

#img {
	width: 45%;
	height: 45%;
	padding: 3px;
}
</style>
</head>
<body>

	<?php
	include 'menu.php';
	?>
	<div class="row">

		<div class="span3">
			<img src="{base_url}upload/{imagem_home}" alt="{titulo}" />

		</div>
	</div>
	<div class="row">
		<div class="span3">
			<p>{dia}/{mes}/{ano}</p>
			<h4 class="post-heading">{titulo}</h4>
			<div class="post-content">{texto} {pdf_free}</div>

		</div>

</body>
</html>
