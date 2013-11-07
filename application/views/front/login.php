<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Login</title>
    
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
<div>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
</div>
<div>
  <div align="center">
    <table width="940" border="1">
      <tr>
        <th width="930" scope="col">  <form action="{base_url}login/on" name="form1" id="form1" method="post">
          
          <label for="nome">
            <div align="left">Login</div>
            </label>
          <div align="left">
            <input type="text" id="nome" name='nome' size='20' placeholder='Digite seu usuário' value='AppEditoraConfianca' >
            </div>
          <label for="nome">
            <div align="left">Senha</div>
            </label>
          <div align="left">
            <input type="password" id="senha" name='senha'  size='20' placeholder='Digite sua senha' value='GDfr1rsf313#'>
            
            <input type="submit" id="bt_enviar" value='Enviar'>
            
            <br><br>
            {msg}
            
            </div>
          </form>
          
          <div align="left"><br>
            <a href="https://vendas.assinaja.com/entitlement/empresa/editoraconfianca/CriarConta.aspx">Criar Conta</a>
            <br>
            <br>
        <a href="https://vendas.assinaja.com/entitlement/empresa/editoraconfianca/ProblemaAcesso.aspx">Problemas no acesso</a></div></th>
      </tr>
  </table>
  </div>
</div>
<div>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
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