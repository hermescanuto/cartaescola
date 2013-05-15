<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<title> Carta na Escola - Administrador de Conteúdo </title>

		<meta name="description" content="Sistema Administrativo" />
		<meta name="author" content="Carta na escola" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		{css}
		<link rel="stylesheet" type="text/css" href="{css_url}" />
		{/css}
		{js}<script type="text/javascript" src="{js_url}"  ></script>
		{/js}

		<style type="text/css">
			body {
				padding-top: 40px;
				padding-bottom: 40px;
				background-color: #f5f5f5;
			}

			.form-signin {
				max-width: 300px;
				padding: 19px 29px 29px;
				margin: 0 auto 20px;
				background-color: #fff;
				border: 1px solid #e5e5e5;
				-webkit-border-radius: 5px;
				-moz-border-radius: 5px;
				border-radius: 5px;
				-webkit-box-shadow: 0 1px 2px rgba(0,0,0,.05);
				-moz-box-shadow: 0 1px 2px rgba(0,0,0,.05);
				box-shadow: 0 1px 2px rgba(0,0,0,.05);
			}
			.form-signin .form-signin-heading, .form-signin .checkbox {
				margin-bottom: 10px;
			}
			.form-signin input[type="text"], .form-signin input[type="password"] {
				font-size: 16px;
				height: auto;
				margin-bottom: 15px;
				padding: 7px 9px;
			}

		</style>

		<!-- HTML5 shim, para suporte ao IE6-8 das tags HTML5 -->
		<!--[if lt IE 9]>
		<script src="//cdnjs.cloudflare.com/ajax/libs/html5shiv/3.6.2/html5shiv.js"></script>
		<![endif]-->
	</head>

	<body>
		<!-- .container -->
		<div class="black-ornament"></div>

		<div class="container">

			<form class="form-signin" action="{logon}" method="post" >
				<img src="{base_url}/img/logoEscola.jpg" />
				<input type="text" class="input-block-level" placeholder="Usuario" id="user" name="user">
				<input type="password" class="input-block-level" placeholder="Password" id="pass" name="pass">		
				<button class="btn btn-large btn-primary" type="submit">
					Entrar
				</button>
			</form>

		</div>

		<!-- </ .container -->
	</body>
</html>

