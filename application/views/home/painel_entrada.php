<div id='painel_campos'>

	<ul>
		<li><a href="#tabs-1">Matérias Home</a>
		</li>
		<li><a href="#tabs-2">HOME Destaque Linha 1</a>
		</li>
		<li><a href="#tabs-3">HOME Destaque Linha 2</a>
		</li>
	</ul>


	<div class="container-fluid">



		<div id="tabs-1">
			<form name="form1" id="form1" action="{save}" method="post"
				enctype="multipart/form-data" class="form-vertical">
				<b>->HOME</b> <br />
				<p>
					ID: {id} <input type="hidden" name='id' id='id' value="{id}" />
				</p>

				<div class="control-group">
					<label class="control-label">Home 1:</label> <select name="id_1"
						id="id_1" style="˜width: 300px"""> {area1}
						<option value="{valor}"{selected} >{legenda}</option> {/area1}
					</select> <label class="control-label">Home 2:</label> <select
						name="id_2" id="id_2"> {area2}
						<option value="{valor}"{selected} >{legenda}</option> {/area2}
					</select> <label class="control-label">Home 3:</label> <select
						name="id_3" id="id_3"> {area3}
						<option value="{valor}"{selected} >{legenda}</option> {/area3}
					</select>

				</div>


				<input type="submit" value="Salvar" id="salvar" class="btn btn-mini" />
			</form>
		</div>

		<div id="tabs-2">

			<form name="form2" id="form1" action="{save}" method="post"
				enctype="multipart/form-data" class="form-vertical">
				<b>->HOME Destaque Linha 1</b> <br />
				<p>
					ID: 2 <input type="hidden" name='id' id='id' value="2" />
				</p>

				<div class="control-group">
					<label class="control-label">Home 1:</label> <select name="id_1"
						id="id_1" style="˜width: 300px"""> {area4}
						<option value="{valor}"{selected} >{legenda}</option> {/area4}
					</select> <label class="control-label">Home 2:</label> <select
						name="id_2" id="id_2"> {area5}
						<option value="{valor}"{selected} >{legenda}</option> {/area5}
					</select> <label class="control-label">Home 3:</label> <select
						name="id_3" id="id_3"> {area6}
						<option value="{valor}"{selected} >{legenda}</option> {/area6}
					</select>

				</div>


				<input type="submit" value="Salvar" id="salvar" class="btn btn-mini" />
			</form>
		</div>

		<div id="tabs-3">
			<form name="form2" id="form1" action="{save}" method="post"
				enctype="multipart/form-data" class="form-vertical">
				<b>->HOME Destaque Linha 2</b> <br />
				<p>
					ID: 3 <input type="hidden" name='id' id='id' value="3" />
				</p>

				<div class="control-group">
					<label class="control-label">Home 1:</label> <select name="id_1"
						id="id_1" style="˜width: 300px"""> {area7}
						<option value="{valor}"{selected} >{legenda}</option> {/area7}
					</select> <label class="control-label">Home 2:</label> <select
						name="id_2" id="id_2"> {area8}
						<option value="{valor}"{selected} >{legenda}</option> {/area8}
					</select> <label class="control-label">Home 3:</label> <select
						name="id_3" id="id_3"> {area9}
						<option value="{valor}"{selected} >{legenda}</option> {/area9}
					</select>

				</div>


				<input type="submit" value="Salvar" id="salvar" class="btn btn-mini" />
			</form>

		</div>
	</div>
</div>

<script>
	$(document).ready(function() {

		$("#painel_campos").tabs();
	});
</script>