<script>
	$(function() {
		var availableTags = [ {tag}"{nometag}",{/tag} ];

		$("#busca").autocomplete({
			source : availableTags
		});

	}); 
</script>

<table border="0" cellspacing="2" cellpadding="0">

	<tr>

		<td style="padding-left: 5px"><input type="text" name="busca"
			id="busca" class='textbox' size="50" maxlength="50"
			placeholder="titulo" /> <input name="retorno_url" type="hidden"
			id="retorno_url" value="{$retorno_url}" />
		</td>
		<td style="vertical-align: top; padding-left: 5px"><input
			class="btn btn-mini" type="button" name="bt_buscar" id="bt_buscar"
			value="Buscar"
			onClick="window.location='{search}'+document.getElementById('busca').value;" />
		</td>

		<td style="vertical-align: top; padding-left: 5px"><input
			class="btn btn-mini" type="button" name="bt_incluir" id="bt_incluir"
			value="Incluir um Novo Registro"
			onClick="window.location='{new_record}'" />
		</td>
	</tr>
</table>
<div class="barra"></div>
