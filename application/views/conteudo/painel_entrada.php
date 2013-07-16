<div id='painel_campos'>

	<ul>
		<li><a href="#tabs-1">Principal</a>
		</li>
		<li><a href="#tabs-2">Secundaria</a>
		</li>
		<li><a href="#tabs-3">Imagens</a>
		</li>
		<li><a href="#tabs-4">Home</a>
		</li>
	</ul>

	<form name="form1" id="form1" action="{save}" method="post"
		enctype="multipart/form-data">
		<b>->Conteúdo</b> <br />

		<div id="tabs-1">


			<div class="row-fluid">
				<div class="span4">

					<div class="control-group">
						<label class="control-label"> ID: {id}</label> <input
							type="hidden" name='id' id='id' value="{id}" /> <label
							class="control-label" for="tb_usuario_area_id">Área:</label> <select
							name="tb_usuario_area_id" id="tb_usuario_area_id" class="span3">
							{area}
							<option value="{valor}"{selected} >{legenda}</option> {/area}
						</select> <label class="control-label" for="sub_classificacao">Sub
							Classificacao:</label> <input type="text"
							name="sub_classificacao" id="sub_classificacao" size="100"
							maxlength="100" value="{sub_classificacao}"
							placeholder="Sub Classificação" style="width: 400px"/>
							
							<label class="control-label">Ordem:</label> <input type="text"
							name="ordem" id="ordem" size="200" maxlength="200"
							value="{ordem}" placeholder="ordem" style="width: 400px" />

					</div>

					<div class="control-group">

						<label class="control-label">Titulo:</label> <input type="text"
							name="titulo" id="titulo" size="200" maxlength="200"
							value="{titulo}" placeholder="Titulo" style="width: 400px" /> <label
							class="control-label" for="descricao">Olho :</label>
						<textarea name='descricao' id='descricao'
							style="height: 80px; width: 400px"
							placeholder="Uma breve descrição do texto principal">{descricao}</textarea>
						<input type="hidden" name='texto_ckeditor' id='texto_ckeditor'
							value="" /> <label class="control-label" for="autor">Autor:</label>
						<textarea id="autor" name="autor" cols="80" rows="6"
							placeholder="Autor">{autor}</textarea>


						<label class="control-label" for="edicao">Edição:</label> <select
							name="edicao" id="edicao" class="span3"> {edicao_lista}
							<option value="{valor}"{selected} >{legenda}</option>
							{/edicao_lista}
						</select>

					</div>

				</div>
				<div class="span8">

					<div class="control-group">
						<label class="control-label" for="texto">Texto:</label>
						<textarea name='texto' id='texto' cols="80" rows="10">{texto}</textarea>
					</div>

				</div>
			</div>

		</div>

		<div id="tabs-2">
			<div class="control-group">
				<label class="control-label" for="texto_extra">Texto Extra :</label>
				<textarea name='texto_extra' id='texto_extra' cols="80" rows="6">{texto_extra}</textarea>
				<input type="hidden" name='texto_extra_ckeditor'
					id='texto_extra_ckeditor' value="" />

			</div>
			<div class="control-group">
				<label class="control-label" for="credito_foto">Credito Foto :</label>
				<input type="text" name="credito_foto" id="credito_foto" size="100"
					maxlength="100" value="{credito_foto}" style="width: 400px"
					placeholder="Foto de:" />
					
				<label class="control-label" for="legenda_foto">Legenda Foto :</label>
				<input type="text" name="legenda_foto" id="legenda_foto" size="100"
					maxlength="100" value="{legenda_foto}" style="width: 400px"
					placeholder="Legenda" />
			</div>
			<div class="control-group">
				<label class="control-label">PDF free: <a
					href="{base_url}upload/pdf_free/{pdf_free}">{pdf_free}</a>
				</label> {pdf}
			</div>

		</div>

		<div id="tabs-3">
			<hr />
			<p>
				Imagem HOME {up_imagem_home}: <img src="{imagem_home}"
					class="img-polaroid" />
			</p>
			<p>
				Imagem Interna {up_imagem_fundo} : <img src="{imagem_fundo}"
					class="img-polaroid" />
			</p>
		</div>
		
		
		<div id="tabs-4">
			<label class="control-label">Titulo Home:</label> <input type="text"
							name="titulo_home" id="titulo_home" size="200" maxlength="200"
							value="{titulo_home}" placeholder="Titulo" style="width: 400px" /> <label
							class="control-label" for="descricao">Olho Home:</label>
						<textarea name='descricao_home' id='descricao_home'
							style="height: 80px; width: 400px"
							placeholder="Uma breve descrição do texto principal">{descricao_home}</textarea>
		
						<div id="chars">138</div>

		
		</div>
		
	</form>
</div>
<hr />
<input
	type="button" value="Salvar" id="salvar" class="btn btn-mini" />
<script src="{base_url}/js/limiter.js"></script>
<script>
	$(document).ready(function() {

		var elem = $("#chars");
		$("#descricao_home").limiter(138, elem);
		


		 var availableTags = [ {autocomplete} "{autocomplete_sub_classificacao}",  {/autocomplete} 
		   
		                    ];
		                    $( "#sub_classificacao" ).autocomplete({
		                      source: availableTags
		                    });

		

		$("#painel_campos").tabs();

		var tb_usuario_area_id = $('#tb_usuario_area_id_db').val();

		$("#tb_usuario_area_id").val(tb_usuario_area_id);

		var config = {
			height : '420px',
			
			language : 'pt_br',
			toolbar : 'Full',
			filebrowserUploadUrl : '{base_url}extra/upload.php',
			// filebrowserImageBrowseUrl : 'http://192.168.1.147/sites/cartaescola/extra/browser/index.php?editor=ckeditor&filter=image',

		};

		$('#texto').ckeditor(config);

		var config = {
			height : '300px',
			language : 'pt_br',
			toolbar : 'Full',
			filebrowserUploadUrl : '{base_url}extra/upload.php',
			// filebrowserImageBrowseUrl : 'http://192.168.1.147/sites/cartaescola/extra/browser/index.php?editor=ckeditor&filter=image',

		};

		$('#texto_extra').ckeditor(config);

		$('#salvar').click(function() {

			$('#texto_ckeditor').val($('#texto').val());

			$('#texto_extra_ckeditor').val($('#texto_extra').val());

			erro = "";
			//erro += valid_field('titulo','','Favor inserir um titulo');
			erro += valid_field('tb_usuario_area_id', '-1', 'Favor escolher uma área');
			erro += valid_field('texto', '', 'Favor inserir o texto');
			erro += valid_field('titulo_home', '','Favor inserir o Titulo HOME');	
			erro += valid_field('descricao_home', '','Favor inserir o DESCRIÇÃO HOME');
			valid_error('form1', erro);
		});

	});

</script>

