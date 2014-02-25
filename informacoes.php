<!doctype html>
<html lang="en">
<head>

	<title>Dialogos Capitais Brasil</title>
	<meta charset="UTF-8">	
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="style.css">

</head>
<body>

	<div class="banner">

		<div class="container">
			
			<div class='col-xs-11 col-sm-4 col-md-3'>
				<img src="img/logovale.png" class='img-responsive'  alt="Logo do Evento">
			</div>


			<div class='col-xs-11 col-sm-9 col-md-9'>
				<div class="hidden-xs">				
					<br ><br ><br ><br >
				</div>				
				<h4 class='titulo_home' >
					
<b>O Brasil que se deseja para o futuro está sendo construído no presente.</b><br><br>

Em um ano de eleições que vão definir

os próximos passos do País, <b>CartaCapital</b> oferece um espaço em que especialistas, pensadores e gestores públicos e privados

podem dialogar sobre os grandes temas do nosso tempo e propor soluções para os principais dilemas nacionais.

 


				</h4>
			</div>	

		</div>

	</div>
	
<!-- Menu -->
<?php include ('menu.php') ?>
<!-- Menu -->

	<div class="container">

		<h3> INFORMAÇÕES </h3>

		<div class="col-md-4" style='font-size: 13px; margin-left: -15px;'>


                  <p><strong>Data:</strong> 18 e 19 de março de 2014<br>
                    <strong>Horário:</strong> 8h30 às 17h45<br>
                    <strong>Local:</strong> Tivoli São Paulo<br>
                    <strong>Endereço:</strong> Alameda Santos, 1437 - Cerqueira César <br>
                    CEP  01419-001 - São Paulo - Brasil<br>
                    <br>
                    <strong>RSVP: (</strong>xx) xxxx-xxx<br>
                  <strong>Email: </strong><u><a href="mailto:rsvpforumbrasil@eventosmg.com.br">rsvpforumbrasil@eventosmg.com.br</a></u></p>
                  <h4>&nbsp;</h4>


		</div>


		<div class="col-md-8">

			<div id="map_canvas" style="width: 100%; height: 400px"></div>

               
              
          </div>

		</div>	


	</div>
<div style='padding:15px; height:5px'>

</div>


<!-- Rodape  -->
<?php include('rodape.php') ?>
<!-- Rodape  -->

	<script src="https://code.jquery.com/jquery.js"></script>
	<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>	

<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDrmXk_SkdO6iHcaEWpTM0jn1fvubzzOrg&sensor=true"></script>

<script type="text/javascript" src="http://www.cartanaescola.com.br/js/gmap3v5.1.1/gmap3.min.js"></script>

   

   

    <script type="text/javascript">


     $("#map_canvas").gmap3();
     showAddress('Alameda Santos, 1437,Cerqueira César ,01419-001 , São Paulo , Brasil');



 		  function showAddress(endereco) {

 			 $('#map_canvas').gmap3({

 				 map: {

 				    options: {

 				      maxZoom: 14 

 				    }  

 				 },

 				 marker:{

 				    address: " " + endereco +  " ",

 				    options: {

 				     icon: new google.maps.MarkerImage(

 				       "http://www.mccscp.com/sites/default/files/images/maps/google-maps/Google_Maps_Marker.png",

 				       new google.maps.Size(60, 43, "px", "px")

 				     )

 				    }

 				 }

 				},

 				"autofit" );



 		  }

    </script>
</body>
</html>
