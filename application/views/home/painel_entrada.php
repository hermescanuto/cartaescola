<div class="container-fluid">
<form name = "form1" id="form1" action="{save}" method="post" enctype="multipart/form-data" class="form-vertical" >
		<b>->HOME</b>
		<br/>
		<p>
			ID: {id}
			<input 		type="hidden" name='id' id='id' value="{id}"/>
		</p>

		<div class="control-group">
		    <label class="control-label">Home 1:</label>
			<select name="id_1" id="id_1" style=˜width:300px"">
                {area1}
                <option value="{valor}" {selected} >{legenda}</option>
                {/area1}
            </select>
            
            <label class="control-label">Home 2:</label>
            <select name="id_2" id="id_2">
                {area2}
                <option value="{valor}" {selected} >{legenda}</option>
                {/area2}
            </select>
            
            <label class="control-label">Home 3:</label>
            <select name="id_3" id="id_3">
                {area3}
                <option value="{valor}" {selected} >{legenda}</option>
                {/area3}
            </select>
            
		</div>

		<a href='<?php echo base_url(); ?>home' title='preview do conteudo' target="preview">Preview</a>

	</form>
</div>

<input type="button" value="Salvar" id="salvar"  class="btn btn-mini"/>



            

            
            

         
 