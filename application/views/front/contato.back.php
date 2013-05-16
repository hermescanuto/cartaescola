<!doctype html>
<html class="no-js">

<head>
<meta charset="utf-8" />
<title>Contato</title>

<?php
include 'script_css.php';
?>

<!-- reply move form -->
<script src="{base_url}js/moveform.js"></script>

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

		<div class="wrapper">

			<?php
			include 'menu.php';
			?>

		</div>
	</header>

	<!-- MAIN -->
	<div id="main">
		<div class="wrapper clearfix">

			<h2 class="page-heading">
				<span>Contato</span>
			</h2>

			<!-- page content -->
			<div id="page-content" class="clearfix">

				<!-- form -->
				<!-- <script type="text/javascript" src="{base_url}js/form-validation.js"></script> -->
				<form id="contactForm" action="{base_urlcontato/enviar"
					method="post">

					<fieldset>
						<div>
							<input name="name" id="name" type="text" class="form-poshytip"
								title="Entre com o seu nome completo" /> <label>Nome</label>
						</div>
						<div>
							<input name="email" id="email" type="text" class="form-poshytip"
								title="Entre com o seu e-mail" /> <label>Email</label>
						</div>

						<div>
							<textarea name="comments" id="comments" rows="5" cols="20"
								class="form-poshytip" title="Poste seus comentário"></textarea>
						</div>

						<!-- send mail configuration -->
						<input type="hidden" value="email@yourserver.com" name="to"
							id="to" /> <input type="hidden" value="Enter the subject here"
							name="subject" id="subject" /> <input type="hidden"
							value="send-mail.php" name="sendMailUrl" id="sendMailUrl" />
						<!-- ENDS send mail configuration -->

						<p>
							<input type="button" value="Enviar" name="submit" id="submit" />
							<span id="error" class="warning">Mensagem</span>
						</p>
					</fieldset>

				</form>

			</div>
			<!-- ENDS form -->

			<!-- contact sidebar -->

			<aside id="contact-sidebar">
				<div class="block">
					<h4>Central de atendimento</h4>
					<p>
						Assinaturas, sugestões <br> e reclamações
					</p>

					<ul class="address-block">
						<!-- <li class="address">Address line, city, state ZIP</li> -->
						<li class="phone">São Paulo</li>
						<li>(11) 3512-9486 <br> <br>
						</li>
						<li class="phone">Rio de Janeiro</li>
						<li>(21) 4062-7183 <br> <br>
						</li>
						<li class="phone">Belo Horizonte</li>
						<li>(31) 4062-7183 <br> <br>
						</li>
						<li class="phone">Distrito Federal</li>
						<li>(61) 4063-7183</li>
						<li><br /> De segunda a sexta, das 9 <br> às 18 horas exceto
							feriados</li>
						<li><br /> Números atrasados:</li>
						<li class="email"><a href="mailto:avulsas@cartacapital.com.br">avulsas@cartacapital.com.br</a>
						</li>
						<li><br /> Fale Conosco:</li>
						<li><a href="http://www.assinantecartacapital.com.br">www.assinantecartacapital.com.br</a>
						</li>

					</ul>

				</div>
			</aside>
			<div class="clearfix"></div>
			<!-- ENDS contact-sidebar -->

		</div>
		<!--  page content-->

	</div>
	</div>
	<!-- ENDS MAIN -->

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

	<!-- Start google map -->
	<script>
			initialize();
		</script>
</body>

</html>
