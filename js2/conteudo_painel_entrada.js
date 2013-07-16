$(document).ready(
		function() {

			var tb_usuario_area_id = $('#tb_usuario_area_id_db').val();

			$("#tb_usuario_area_id").val(tb_usuario_area_id);

			var config = {
				height : '500px',
				language : 'pt_br',

				toolbar : 'Full',
				filebrowserBrowseUrl : '/browser/browse.php',
				filebrowserUploadUrl : '/uploader/upload.php',

			};

			$('#texto').ckeditor(config);

			$('#salvar').click(
					function() {

						$('#texto_ckeditor').val($('#texto').val());

						erro = "";
						// erro += valid_field('titulo','','Favor inserir um
						// titulo');
						erro += valid_field('tb_usuario_area_id', '-1',
								'Favor escolher uma área');
						erro += valid_field('texto', '',
								'Favor inserir o texto');
						
						erro += valid_field('titulo_home', '',
						'Favor inserir o Titulo HOME');
						
						erro += valid_field('descricao_home', '',
						'Favor inserir o DESCRIÇÃO HOME');
						
						valid_error('form1', erro);
					});

		});
