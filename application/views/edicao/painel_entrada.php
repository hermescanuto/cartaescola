<div id='painel_campos'  style="padding-left: 5px">


	<form name = "form1" id="form1" action="{save}" method="post" enctype="multipart/form-data" >
		<b>->Edição</b>
		<br/>

	

					<div class="control-group">
					       <label class="control-label"> ID: {id}</label>
                            <input      type="hidden" name='id' id='id' value="{id}"/>
			

						<label class="control-label"  for="edicao">Edicao:</label>
						<input type="text" name="edicao"   id="edicao"     size="10" maxlength="10" value="{edicao}" placeholder="Edição" />
						<input type="text" name="geral"   id="geral"     size="10" maxlength="10" style="display:none"/>
						
						<label class="control-label"  for="sub_classificacao">Mês:</label>
                        <input type="text" name="mes"   id="mes"     size="10" maxlength="10" value="{mes}" placeholder="Mês" />
                        
                        <label class="control-label"  for="sub_classificacao">Ano:</label>
                        <input type="text" name="ano"   id="ano"     size="10" maxlength="10" value="{ano}" placeholder="ano" />

					</div>



			{up_imagem_capa} : <img src="{imagem_capa}" class="img-polaroid"/>
			</p>
		</div>
	</form>
</div>
<hr/>
<input type="button" value="Salvar" id="salvar" class="btn btn-mini" />

<script>
	$(document).ready(function() {

		$("#geral").datepicker({
			dateFormat : 'mm:yy',
			dayNames : ['Domingo', 'Segunda', 'TerÃ§a', 'Quarta', 'Quinta', 'Sexta', 'SÃ¡bado', 'Domingo'],
			dayNamesMin : ['D', 'S', 'T', 'Q', 'Q', 'S', 'S', 'D'],
			dayNamesShort : ['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sáb', 'Dom'],
			monthNames : ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'],
			monthNamesShort : ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'],
			nextText : 'Próximo',
			prevText : 'Anterior',
			showOn : "button",
			buttonImage : "{base_url}img/calendar.gif",
			onSelect : function(dateText, inst) {

				var i = dateText.split(':');
				$('#mes').val(i[0]);
				$('#ano').val(i[1]);

			}
		});

		$('#salvar').click(function() {

			$('#texto_ckeditor').val($('#texto').val());

			$('#texto_extra_ckeditor').val($('#texto_extra').val());

			erro = "";
			//erro += valid_field('titulo','','Favor inserir um titulo');
			erro += valid_field('tb_usuario_area_id', '-1', 'Favor escolher uma área');
			erro += valid_field('texto', '', 'Favor inserir o texto');
			valid_error('form1', erro);
		});

	});

</script>

