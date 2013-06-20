<!DOCTYPE html>
<html>
	<head>

		<?php
        include 'script_css2.php';
		?>
    <link
    rel="stylesheet"
    href="{base_url}jquery_mobile/single.css" />
	</head>

	<body>

		<div data-role='page'>



					<?php
                    include 'menu2.php';
					?>
			

			<!-- header -->
			<?php
            	include 'header.php';
			?>
			<!-- header -->
			
			

			<div data-role="content">

				<div class="ui-grid-solo">
				    
				    
					<div class="ui-block-a">
						<img src="{base_url}upload/{imagem_home}" alt="{titulo}" class="destaque_imagem"/>
					</div>
					
					
					<h5 class="titulo" >{titulo}</h5>
					<span class="descricao"><i>{descricao}</i></span><br/>
					<span class="por">por {autor} — publicado na edição {edicao}, mês {edicao_mes} </span><br/>
					
					<div class="texto" >
					{texto}
					</div>
					
					{pdf_free}
				</div>

			</div>

			<?php
                    include 'footer.php';
              ?>

		</div>
		
<script type="text/javascript">

$(function(){
	

AjustaImagem(); 


function AjustaImagem() {

	//$('.texto img').css( "border", "1px solid red" );;
	
 	imagem_width = parseInt( $('.texto img').css("width") );
 	imagem_height = parseInt( $('.texto img').css("height") );

    
    largura= ($(window).width() ) - 40;

  // alert( largura);


    $('.texto img').each(function() {
        var maxWidth = largura; // Max width for the image
        var maxHeight = imagem_height ;    // Max height for the image
        var ratio = 0;  // Used for aspect ratio
        var width = $(this).width();    // Current image width
        var height = $(this).height();  // Current image height
 
        // Check if the current width is larger than the max
        if(width > maxWidth){
            ratio = maxWidth / width;   // get ratio for scaling image
            $(this).css("width", maxWidth); // Set new width
            $(this).css("height", height * ratio);  // Scale height based on ratio
            height = height * ratio;    // Reset height to match scaled image
            width = width * ratio;    // Reset width to match scaled image
        }
 
        // Check if current height is larger than max
        if(height > maxHeight){
            ratio = maxHeight / height; // get ratio for scaling image
            $(this).css("height", maxHeight);   // Set new height
            $(this).css("width", width * ratio);    // Scale width based on ratio
            width = width * ratio;    // Reset width to match scaled image
        }
    });

}



    $(window).resize(function(){
    	AjustaImagem(); 
    });
});
              
</script>
		
	</body>
	
</html>



