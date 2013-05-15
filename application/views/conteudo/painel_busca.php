<script>
	$(function() {
		var availableTags = [ {tag}"{nometag}",{/tag} ];		
		
		$("#busca").autocomplete({ source: availableTags });
		
	});		
</script>
<div class="barra"></div>
<fieldset>

  <legend>Painel de Busca:</legend>
  <table  border="0" cellspacing="2" cellpadding="0">
    <tr>  
      <td>Nome</td>
    </tr>
    <tr>
      <td>
		  <input type="text" name="busca" id="busca" class='textbox'  size="50" maxlength="50" />
		  <input name="retorno_url" type="hidden" id="retorno_url" value="{$retorno_url}" />
      
      </td>
        <td>
          <input type="button" name="bt_buscar" id="bt_buscar"  value="Buscar" onClick="window.location='{search}'+document.getElementById('busca').value;" />
          <input type="button" name="bt_incluir" id="bt_incluir" value="Incluir um Novo Registro"  onClick="window.location='{new_record}'" />
        </td>
    </tr>
  </table> 

</fieldset>
<div class="barra"></div>

