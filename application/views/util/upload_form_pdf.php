<div style="padding-left: 5px">
	<br /> {error} <br /> ID:{id} - {titulo} - {data_criacao} <br /> <br />
	<form method="post"
		action="{base_url}admin/upload_pdf/do_upload/{id}/{t}"
		enctype="multipart/form-data" />

	<input type="hidden" id='id' name='id' value='{id}' /> <input
		type="hidden" id='t' name='t' value='{t}' /> <input type="hidden"
		id='option' name='option' value='{option}' /> <br /> <br /> Upload de
	imagem {pic} <br /> <input type="file" name="userfile" size="60" /> <br />
	<br /> <input type="submit" value="upload" class="btn btn-mini" /> <input
		type="button" value="Voltar" class="btn btn-mini"
		onclick="history.go(-1)" />
	</form>
	<label class="control-label">PDF Atual:</label> {pdf} <br />
	<br />
	<label class="control-label">Zerar PDF Atual:</label> <a
		href="{base_url}admin/upload_pdf/zerar/{id}/{t}"> Click aqui ! </a>

</div>
