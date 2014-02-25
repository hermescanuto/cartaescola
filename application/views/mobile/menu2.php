<div data-role="panel" id="mypanel" data-position="left"
	data-display="overlay" data-theme="a" data-animate="false">

	<div class="ui-panel-inner">

		<h3>Menu:</h3>

		<ul data-role="listview">
			<li><a href="{base_url}mobile" data-transition="none"
				data-inline="true" data-inline="true">Home</a></li>


			<li><a href="{base_url}mobile/materias" data-transition="none"
				data-inline="true" data-inline="true">Matérias</a></li>

			<li><a href="{base_url}mobile/artigos" data-transition="none"
				data-inline="true" data-inline="true">Artigos</a></li>
			<li><a href="{base_url}mobile/aulas" data-transition="none"
				data-inline="true" data-inline="true">Aulas</a></li>
			<li><a href="{base_url}mobile/entrevistas" data-transition="none"
				data-inline="true" data-inline="true">Entrevista</a></li>
			<li><a href="{base_url}mobile/reportagens" data-transition="none"
				data-inline="true" data-inline="true">Reportagens</a></li>

			<li><a href="{base_url}mobile/editorial" data-transition="none"
				data-inline="true" data-inline="true">Editorial</a></li>

			<li><a href="{base_url}mobile/cartaaoprofessor"
				data-transition="none" data-inline="true" data-inline="true">Carta
					ao Professor</a></li>

			<li><a href="{base_url}mobile/saladoprofessor" data-transition="none"
				data-inline="true" data-inline="true">Sala do Professor</a></li>

			<li><a href="{base_url}mobile/tecnologias" data-transition="none"
				data-inline="true" data-inline="true">Tecnologia</a>
			
			<li><a href="{base_url}mobile/sobre" data-transition="none"
				data-inline="true" data-inline="true">Sobre</a></li>
			<li><a href="{base_url}mobile/expediente" data-transition="none"
				data-inline="true" data-inline="true">Expediente</a></li>
			<li><a href="{base_url}mobile/contato" data-transition="none"
				data-inline="true" data-inline="true">Contato</a></li>
		</ul>

	</div>

	<div class="ui-panel-inner">
		<a href="#my-header" data-rel="close" data-role="button"
			data-icon="delete">Fechar</a>
	</div>

</div>

<div data-role="panel" id="mybusca" data-position="left"
	data-display="overlay" data-theme="a" data-animate="false">
	<div class="ui-panel-inner">
		<h3>Busca:</h3>
		<hr>
		<input type="search" name="search" id="search" value="" placeholder="Digite sua busca" />



		<div class="ui-grid-a">
			<div class="ui-block-a">
				<a href="#my-header"  data-role="button"
					data-icon="search" id='bt_buscar' >Ok</a>
			</div>
			<div class="ui-block-b">
				<a href="#my-header" data-rel="close" data-role="button"
					data-icon="delete">Sair</a>
			</div>
		</div>
	</div>
</div>



<script type="text/javascript">


$("#bt_buscar").click(function() {

	  busca = $("#search").val();

	  if ( busca+"" == "") {
     		alert("Favor digitar sua busca");
     		//$.mobile.changePage("#dialogPage");
	  }else{		  
		 window.location ="{base_url}mobile/materias/paging/0/" + busca;
	  }
	  
	});

</script>
