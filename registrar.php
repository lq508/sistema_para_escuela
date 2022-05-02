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
<!DOCTYPE HTML>
<html>
<head>
<title>Free Snow Bootstrap Website Template | Register :: w3layouts</title>
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link rel="stylesheet" href="/css/master.css">
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
				
           <div class="titulo_registro">

             <img class="titulo_imagen" src="./images/NOMBRE2.png" alt="">

           </div>
					 <div class="menu">
						  <a class="toggleMenu" href="#"><img src="images/nav.png" alt="" class="imagen_header"></a>

							<script type="text/javascript" src="js/responsive-nav.js"></script>
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
      <div class="shop_top4">
	     <div class="container">
						<form action="./clases_php/registro_estudiante.php" method="POST">
								<div class="register-top-grid">
										<h3>Información personal</h3>
										<div>
											<span>Primer nombre<label>*</label></span>
											<input type="text" name="primer_nombre" required>
										</div>
										<div>
											<span>Segundo nombre<label>*</label></span>
											<input type="text" name="segundo_nombre" required>
										</div>
                    <div>
                      <span>Primer apellido<label>*</label></span>
                      <input type="text" name="primer_apellido" required>
                    </div>
                    <div>
                      <span>Segundo apellido<label>*</label></span>
                      <input type="text" name="segundo_apellido" required>

                    </div>
										<div>
											<span>Email<label>*</label></span>
											<input type="text" name="email" required>
										</div>
                    <div>
                      <span>SEXO<label>*</label></span>
                       <span> <input type="radio" name="sexo"value="masculino"> masculino </span>
                         <span> <input type="radio" name="sexo" value="femenino"> femenino </span>
                    </div>
                    <div>
                      <span>EDAD<label>*</label></span>
                      <input type="number" name="edad">
                    </div>
                    <div>
                      <span>cedula<label>*</label></span>
                      <input type="number" name="cedula">
                    </div>
                    <div>
                      <span>fecha nacimiento<label>*</label></span>
                      <input type="number" placeholder="dia" name="dia_nacimiento" required>
                      <input type="number" placeholder="mes" name="mes_nacimiento" required>
                      <input type="number" placeholder="año" name="año_nacimiento"  required>
                    </div>
                    <div>
                      <span>pais de nacimiento<label>*</label></span>
                      <input type="text" name="pais_n" required >
                    </div>
                    <div>
                      <span>estado de nacimiento <label>*</label></span>
                      <input type="text"  name="estado_n" required>
                    </div>
                    <div>
                      <span>ciudad de nacimiento <label>*</label></span>
                      <input type="text" name="ciudad_n" required >
                    </div>







                    <div>
                        <span> telefono <label>*</label></span>
                      <input type="number" name="numero_de_telefono" required >
                    </div>

                    <div>
                        <span> codigo de area del telefono <label>*</label></span>
                      <input type="number" name="codigo_de_area" required >
                    </div>

                    <div>
                        <span> tipo de telefono <label>*</label></span>
                      <input type="text" name="tipo_telefono" required >
                    </div>
                    <div>
                        <span> Municipio <label>*</label></span>
                      <input type="text" name="municipio" required >
                    </div>
                    <div>
                        <span> Parroquia <label>*</label></span>
                      <input type="text" name="parroquia" required >
                    </div>
                    <div>
                        <span> Sector  <label>*</label></span>
                      <input type="text" name="sector" required >
                    </div>
                    <div>
                        <span> Calle <label>*</label></span>
                      <input type="text" name="calle" required >
                    </div>

                    <div>
                        <span> Numero de casa  <label>*</label></span>
                      <input type="number" name="numero_de_casa" required >
                    </div>
                    <div>
                        <span> Matricula <label>*</label></span>
                      <input type="number" name="matricula" required >
                    </div>
                    <div>
                        <span> Sección <label>*</label></span>
                        <span> <input type="radio" name="seccion"value="A"> A </span>
                        <span> <input type="radio" name="seccion"value="B"> B </span>
                        <span> <input type="radio" name="seccion"value="C"> C </span>
                        <span> <input type="radio" name="seccion"value="D"> D </span>
                        <span> <input type="radio" name="seccion"value="E"> E </span>

                    </div>
                    <div>
                        <span> Grado academico <label>*</label></span>
                        <span> <input type="radio" name="grado_academico"value="1er_año"> 1er_año </span>
                        <span> <input type="radio" name="grado_academico"value="2do_año"> 2do_año </span>
                        <span> <input type="radio" name="grado_academico"value="3er_año"> 3er_año </span>
                        <span> <input type="radio" name="grado_academico"value="4to_año"> 4to_año </span>
                        <span> <input type="radio" name="grado_academico"value="5to_año"> 5to_año </span>

                    </div>
                    <div>
                        <span> Periodo academico <label>*</label></span>
                      <input type="text" name="periodo_academico" required >
                    </div>
                    <div>
                        <span> Asignaturas a cursar <label>*</label></span>
                      <input type="number" name="asignaturas" required >
                    </div>
                    <div>
                        <span> Tipo de asignaturas  <label>*</label></span>
                      <input type="text" name="tipos_de_asignaturas" required >
                    </div>
                    <div>
                        <span> Condicion del estudiante  <label>*</label></span>
                      <input type="text" name="condicion_del_estudiante" required >
                    </div>





										<div class="clear"> </div>
											<a class="news-letter" href="#">
											</a>
										<div class="clear"> </div>
								</div>
								<div class="clear"> </div>

								<div class="clear"> </div>
								<input type="submit" value="Registrar">
						</form>
					</div>
		   </div>
	  </div>





</body>
</html>
