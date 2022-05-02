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
		<div class="container2">
			<div class="row">
			  <div class="col-md-12">
				 <div class="header-left2">
					 <div class="logo">
						<a href="index.html"><img src="images/logo123.png" class="logo_header" alt=""/></a>
					 </div>





            <br>


            <div class="titulo">

              <img class="titulo_imagen" src="./images/NOMBRE2.png" alt="">
              <img class="titulo_imagen_2" src="./images/logo_2.png" alt="">



            </div>
            <div class="menu">
               <a class="toggleMenu" href="#"><img src="images/nav.png" alt="" /></a>
                 <ul class="nav" id="nav">
                   <li> <img class="icono_nav_panel" src="./images/modificacion2.png" alt="">  <a href="registro_de_matriculas.php">Registro de estudiantes</a></li>
                   <li> <img class="icono_nav_panel" src="./images/inscripcion.png" alt="">  <a href="menu_reportes.php">Reporte </a></li>
                   <li class="acerca_de"><a href="#">Acerca de</a></li>

                 <div class="clear"></div>
                 <div class="opcion">


                 </div>

               </ul>

               <ul class="ul_panel">
                 <li><a href="inf_sistema.php"> inf sistema  </a></li>
                 <li><a href="inf_desarrolladores.php"> inf desarrolladores  </a></li>

               </ul>


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
      <div class="shop_top2">

        <div class="content_panel">

          <div class="vision_content">

            <div class="vision">

              <h2> Vision </h2>

              <p>La Unidad Educativa “Rafael Rangel” orienta su visión y futuro hacia una institución líder en la región, reconocidos por la excelencia en el dominio del saber científico y tecnológico con pertinencia social fundamentado en valores universales.</p>

            </div>

          </div>

          <div class="mision_content">

            <div class="mision">

              <h2> Mision  </h2>

              <p>La Unidad Educativa “Rafael Rangel” tiene como misión fundamental egresar estudiantes formados en la mística “Rangeliana” competentes para la participación activa y protagónica en su formación como bachilleres en ciencias, como ciudadano integral e integrado en el instituto y en su comunidad.</p>




            </div>

          </div>

          <div class="foto_content">

            <div class="foto">

              <img src="./images/panel_imagen.png" alt="">

            </div>


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


    <script src="./js/boton_acerca_de.js">

    </script>

</body>
</html>
