<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<?php
session_start();


if(!$_SESSION["usuario_verificado_panel"]){
  header("Location: http://localhost/rafaelrangel/error_de_acceso.php");
}

 ?>

<!DOCTYPE HML>
<html>
<head>
<title>Sistema de control de matriculas estudiantiles </title>
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link rel="stylesheet" href="./css/style_footer.css">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<script src="js/jquery.min.js"></script>
<script type="text/javascript">
        $(document).ready(function() {
            $(".dropdown img.flag").addClass("flagvisibility");

            $(".dropdown dt a").click(function() {
                $(".dropdown dd ul").toggle();
            });

            $(".dropdown dd ul li a").click(function() {
                var text = $(this).html();
                $(".dropdown dt a span").html(text);
                $(".dropdown dd ul").hide();
                $("#result").html("Selected value is: " + getSelectedValue("sample"));
            });

            function getSelectedValue(id) {
                return $("#" + id).find("dt a span.value").html();
            }

            $(document).bind('click', function(e) {
                var $clicked = $(e.target);
                if (! $clicked.parents().hasClass("dropdown"))
                    $(".dropdown dd ul").hide();
            });


            $("#flagSwitcher").click(function() {
                $(".dropdown img.flag").toggleClass("flagvisibility");
            });
        });
     </script>
 </head>
<body>
	<div class="header">
		<div class="container">
			<div class="row">
			  <div class="col-md-12">
				 <div class="header-left">
					 <div class="logo">
						<a href="index.html"><img src="images/logo123.png" class="logo_header" alt=""/></a>
					 </div>





            <br>


            <div class="titulo">

              <h1> "ACERCA DE"  </h1>

            </div>



	    		    <div class="clear"></div>
	    	    </div>
	            <div class="header_right">
	    		  <!-- start search-->

						<!----search-scripts---->
						<script src="js/classie.js"></script>
						<script src="js/uisearch.js"></script>
						<script>
							new UISearch( document.getElementById( 'sb-search' ) );
						</script>

		        <div class="clear"></div>
	       </div>
	      </div>
		 </div>
	    </div>
	  </div>
     <div class="main">
      <div class="shop_top">

        <div class="titulo_2">

          <h2> Institución</h2>

        </div>

        <div class="informacion">

        <p> Direccion del plantel: Calle Sucre al lado Iglesia Parroquial San José. San José de Guanipa. Estado Anzoátegui.</p>
        <p> Telefono: 0283 2550949</p>
        <p>Dependencia del plantel:Colegio Privado</p>
        <p>Codigo del plantel:Cód. De Dependencia</p>
        <p>Cod DEA:S1738D0310</p>
        <p>Cod Estadístico:30439</p>
        <p>Ubicación Geográfica: Ubicada en la parte Sur del estado Anzoátegui. Municipio Guanipa. Ciudad: San José de Guanipa (El Tigrito)</p>
        <p>Latitud Norte:64° 9’</p>
        <p>Longitud Oeste:9° 5’</p>
        <p>Subsistema de Educación Básica, nivel que atiende el Colegio:Educación Media General en Ciencias.</p>
        <p>Turnos de trabajo:Mañana (7:00 am a 1:20 pm) </p>
        </div>


          <div class="titulo_2">

            <h2> Desarrolladores</h2>

          </div>



          <div class="informacion">

            <p>Nombre:Sebastian Corvo CI:30.478.465 Rol:desarrollador backend </p>
            <p>Nombre:Diosdado Rojas  CI:30.766.165 Rol:desarrollador frontend </p>

            <p>Nombre:Deibis Medina CI:30.755.806  Rol:Analista de  datos  </p>
            <p>Nombre:Paula Jimenez CI:30.660.093 Rol:Betathester</p>

          </div>




        </div>

		  </div>
	  </div>
    <footer>
      <div class="hor bg3"></div>
      <div class="container_12_footer">
        <div class="grid_12">
          <div class="copy" class="footer_estudiantes">
            Sitio creado por estudiantes del UPTJAA
          </div>

        </div>
      </div>
    </footer>
</body>
</html>
