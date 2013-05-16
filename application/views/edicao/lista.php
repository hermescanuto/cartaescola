<div style="padding-left: 5px">
	<b>->Conteúdo</b> <br />
	<p>Total de Registro:{record_count}</p>
	<table border="0" class="table table-striped" width="80%">

		<thead>
			<tr>
				<td bgcolor='#D4D4D4'>id</td>
				<td bgcolor='#D4D4D4'>Capa Atual</td>
				<td bgcolor='#D4D4D4'>Data de Criação</td>
				<td bgcolor='#D4D4D4'>Edição</td>
				<td bgcolor='#D4D4D4'>Capa</td>
				<td bgcolor='#D4D4D4'>Detalhes</td>
			</tr>
		</thead>
		<tbody>
			{recordset}
			<tr style='border: 1px solid black'>
				<td>{id}</td>
				<td>{atual}</td>
				<td>{data_criacao}</td>
				<td>N.:{edicao} - Mês : {mes} - Ano: {ano}</td>
				<td><img src="{base_url}upload/capa/{imagem_capa}"
					style="height: 30%">
				</td>
				<td><a href='{base_url}admin/{local}/ShowReport/{id}'
					title='Edita o registro' data-toggle="tooltip"
					data-placement="left" rel="tooltip"><i class="icon-pencil"></i>
				</a> <a
					href='javascript:confirma({id},"{base_url}admin/{local}",{cursor})'
					title='Elimina o Registro' data-toggle="tooltip"
					data-placement="top" rel="tooltip"><i class="icon-remove"></i>
				</a> <a href='{base_url}admin/upload_imagem/prepara/{id}/3'
					title='Upload da imagem da Capa' data-toggle="tooltip"
					data-placement="top" rel="tooltip"><i class="icon-th-large"></i>
				</a> <a href='{base_url}admin/edicao/capa/{id}'
					title='Tornar Capa Atual' data-toggle="tooltip"
					data-placement="right" rel="tooltip"><i class="icon-tag"></i>
				</a></td>
			</tr>
			{/recordset}
		</tbody>
	</table>
	<br /> {paginacao}
</div>


