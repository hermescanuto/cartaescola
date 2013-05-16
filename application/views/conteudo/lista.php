<div style="padding-left: 5px">
	<b>->Conteúdo</b> <br />
	<p>Total de Registro:{record_count}</p>
	<table border="0" class="table table-striped" width="80%">

		<thead>
			<tr>
				<td bgcolor='#D4D4D4'>id</td>
				<td bgcolor='#D4D4D4'>Data de Criação</td>
				<td bgcolor='#D4D4D4'>Edição</td>
				<td bgcolor='#D4D4D4'>Tipo do Conteúdo</td>

				<td bgcolor='#D4D4D4'>Titulo</td>
				<td bgcolor='#D4D4D4'>Detalhes</td>
			</tr>
		</thead>
		<tbody>
			{recordset}
			<tr style='border: 1px solid black'>
				<td>{id}</td>
				<td><strong>{data_criacao}</strong>
				</td>
				<td>{edicao}</td>
				<td><strong>{tipo_conteudo}</strong>
				</td>
				<td>{titulo}</td>
				<td><a href='{base_url}admin/{local}/ShowReport/{id}'
					title='Edita o registro' data-toggle="tooltip"
					data-placement="left" rel="tooltip"><i class="icon-pencil"></i>
				</a> <a
					href='javascript:confirma({id},"{base_url}admin/{local}",{cursor})'
					title='Elimina o Registro' data-toggle="tooltip"
					data-placement="top" rel="tooltip"><i class="icon-remove"></i>
				</a> <a href='{base_url}admin/upload_imagem/prepara/{id}/1'
					title='Upload da imagem da home' data-toggle="tooltip"
					data-placement="top" rel="tooltip"><i class="icon-th-large"></i>
				</a> <a href='{base_url}admin/upload_imagem/prepara/{id}/2'
					title='Upload da imagem Painel Menor' data-toggle="tooltip"
					data-placement="top" rel="tooltip"><i class="icon-th"></i>
				</a> <a href='{base_url}admin/upload_pdf/prepara/{id}/1'
					title='Upload de PDF' data-toggle="tooltip" data-placement="top"
					rel="tooltip"><i class="icon-book"></i>
				</a> <a href='{base_url}single/show/{id}'
					title='preview do conteúdo' target="preview" data-toggle="tooltip"
					data-placement="right" rel="tooltip"><i class="icon-eye-open"></i>
				</a></td>
			</tr>
			{/recordset}
		</tbody>
	</table>
	<br /> {paginacao}
</div>
