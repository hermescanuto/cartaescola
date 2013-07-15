<a href="{base_url}" id="logo"><img src="{base_url}img/logo.png"
	alt="Carta Capital" width="265" height="73"> </a>

<nav>
	<ul id="nav" class="sf-menu">
		<li class="{alvo_home}"><a href="{base_url}">HOME</a>
		</li>

		<li class="{alvo_portifolio}"><a href="{base_url}materias">MATÉRIAS</a>
			<ul>

				<li><a href="{base_url}editorial">Editorial</a>
				</li>
				
				<li><a href="{base_url}entrevistas">Entrevista</a>
				</li>
				

				<li><a href="{base_url}aulas">Tema de Aula</a>
				</li>
				


				<li><a href="{base_url}reportagens">Reportagem</a>
				</li>
				
				<li><a href="{base_url}artigos">Artigo</a>
				</li>
				
				<li><a href="{base_url}tecnologias">Tecnologia</a>
				</li>
				
				<li><a href="{base_url}saladoprofessor">Sala do Professor</a>
				</li>

				<li><a href="{base_url}cartaaoprofessor">Carta ao Professor</a>
				</li>

				

				

			</ul>
		</li>
		<li class="{alvo_sobre}"><a href="{base_url}sobre">SOBRE</a>
			<ul>
				<li><a href="{base_url}expediente">Expediente</a>
				</li>


			</ul>
		</li>
		<li class="{alvo_contato}"><a href="{base_url}contato">CONTATO</a>
		<ul>
		<li>
					<a href="{base_url}bancas">Bancas</a>
				</li>
		
		</ul>
		
		</li>
		<li><a href="http://www.mercadocapital.com.br/" target="_blank">ASSINE</a>
		</li>

		<li class="{alvo_tablet}"><a href="{base_url}tablet">TABLETS</a>
		</li>
		
		<li> 
			<input type="text" name="busca" id="busca" size="20" maxlength="150" placeholder='busca' style='height: 15px;'/>
			<input type="button" value="ok" id="bt_buscar"  style='height: 20px;margin-bottom: 7px;'>	

		</li>
	</ul>

</nav>
<script>
	$(function() {


		$("#bt_buscar").click(function() {
			
			var busca=$('#busca').val();

			if ( busca+"" != "") {

				window.location = '{base_url}materias/paging/0/' + busca;

			}
			
			
		});

		

	}); 
</script>


