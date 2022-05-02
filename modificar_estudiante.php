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
						<form action="./clases_php/modificar_estudiante.php" method="POST">
								<div class="register-top-grid">
										<h3>Información personal</h3>
										<div>
											<span>Primer nombre<label>*</label></span>
											<input type="text" name="primer_nombre" required value=<?php echo $_SESSION["resultado_total"]["Primer_nombre"]?>>
										</div>
										<div>
											<span>Segundo nombre<label>*</label></span>
											<input type="text" name="segundo_nombre" required value=<?php echo $_SESSION["resultado_total"]["Segundo_nombre"]?>>
										</div>
                    <div>
                      <span>Primer apellido<label>*</label></span>
                      <input type="text" name="primer_apellido" required value=<?php echo $_SESSION["resultado_total"]["Primer_apellido"]?>>
                    </div>
                    <div>
                      <span>Segundo apellido<label>*</label></span>
                      <input type="text" name="segundo_apellido" required value=<?php echo $_SESSION["resultado_total"]["Segundo_apellido"]?>>

                    </div>
										<div>
											<span>Email<label>*</label></span>
											<input type="text" name="email" required value=<?php echo $_SESSION["resultado_total"]["correo"]?>>
										</div>
                    <div>
                      <span>SEXO<label>*</label></span>



                       <span> <input type="radio" class="sexo" name="sexo"value="masculino"> masculino </span>
                         <span> <input type="radio" class="sexo" name="sexo" value="femenino"> femenino </span>
                    </div>
                    <div>
                      <span>EDAD<label>*</label></span>
                      <input type="number" name="edad"  value=<?php echo $_SESSION["resultado_total"]["edad"]?>>
                    </div>
                    <div>
                      <span>cedula<label>*</label></span>
                      <input type="number" name="cedula"  value=<?php echo $_SESSION["resultado_total"]["Cedula"]?>>
                    </div>
                    <div>
                      <span>fecha nacimiento<label>*</label></span>
                      <input type="number" placeholder="dia" name="dia_nacimiento" required  value=<?php echo $_SESSION["resultado_total"]["Dia_nacimiento"]?>>
                      <input type="number" placeholder="mes" name="mes_nacimiento" required  value=<?php echo $_SESSION["resultado_total"]["Mes"]?>>
                      <input type="number" placeholder="año" name="año_nacimiento"  required  value=<?php echo $_SESSION["resultado_total"]["Año"]?>>
                    </div>
                    <div>
                      <span>pais de nacimiento<label>*</label></span>
                      <input type="text" name="pais_n" required  value=<?php echo $_SESSION["resultado_total"]["Pais"]?>>
                    </div>
                    <div>
                      <span>estado de nacimiento <label>*</label></span>
                      <input type="text"  name="estado_n" required value=<?php echo $_SESSION["resultado_total"]["Estado"]?> >
                    </div>
                    <div>
                      <span>ciudad de nacimiento <label>*</label></span>
                      <input type="text" name="ciudad_n" required value=<?php echo $_SESSION["resultado_total"]["Ciudad"]?> >
                    </div>







                    <div>
                        <span> telefono <label>*</label></span>
                      <input type="number" name="numero_de_telefono" required value=<?php echo $_SESSION["resultado_total"]["Telefono"]?> >
                    </div>

                    <div>
                        <span> codigo de area del telefono <label>*</label></span>
                      <input type="number" name="codigo_de_area" required value=<?php echo $_SESSION["resultado_total"]["Codifo_area_telefono"]?> >
                    </div>

                    <div>
                        <span> tipo de telefono <label>*</label></span>
                      <input type="text" name="tipo_telefono" required value=<?php echo $_SESSION["resultado_total"]["Tipo_de_telefono"]?> >
                    </div>
                    <div>
                        <span> Municipio <label>*</label></span>
                      <input type="text" name="municipio" required value=<?php echo $_SESSION["resultado_total"]["Municipio"]?> >
                    </div>
                    <div>
                        <span> Parroquia <label>*</label></span>
                      <input type="text" class="parroquia" name="parroquia" required   >


                    </div>
                    <div>
                        <span> Sector  <label>*</label></span>




                      <input class="sector" type="text" name="sector" required  >



                    </div>
                    <div>
                        <span> Calle <label>*</label></span>
                      <input type="text" class="calle" name="calle" required value=<?php echo $_SESSION["resultado_total"]["Calle"]?> >
                    </div>

                    <div>
                        <span> Numero de casa  <label>*</label></span>
                      <input type="number" name="numero_de_casa" required value=<?php echo $_SESSION["resultado_total"]["Numero_de_casa"]?>>
                    </div>
                    <div>
                        <span> Matricula <label>*</label></span>
                      <input type="number" name="matricula" required value=<?php echo $_SESSION["resultado_total"]["Matricula"]?>>
                    </div>
                    <div>
                        <span> Sección <label>*</label></span>
                        <span> <input type="radio" class="seccion_estudiante" name="seccion"value="A"> A </span>
                        <span> <input type="radio" class="seccion_estudiante" name="seccion"value="B"> B </span>
                        <span> <input type="radio" class="seccion_estudiante" name="seccion"value="C"> C </span>
                        <span> <input type="radio" class="seccion_estudiante" name="seccion"value="D"> D </span>
                        <span> <input type="radio"class="seccion_estudiante" name="seccion"value="E"> E </span>

                    </div>
                    <div>
                        <span> Grado academico <label>*</label></span>
                        <span> <input type="radio" class="año_estudiante" name="grado_academico"value="1er_año"> 1er_año </span>
                        <span> <input type="radio"  class="año_estudiante" name="grado_academico"value="2do_año"> 2do_año </span>
                        <span> <input type="radio"  class="año_estudiante" name="grado_academico"value="3er_año"> 3er_año </span>
                        <span> <input type="radio"  class="año_estudiante" name="grado_academico"value="4to_año"> 4to_año </span>
                        <span> <input type="radio"  class="año_estudiante" name="grado_academico"value="5to_año"> 5to_año </span>

                    </div>
                    <div>
                        <span> Periodo academico <label>*</label></span>
                      <input type="text" class="periodo_academico" name="periodo_academico" required >
                    </div>
                    <div>
                        <span> Asignaturas a cursar <label>*</label></span>
                      <input type="number" name="asignaturas" required  value=<?php echo $_SESSION["resultado_total"]["Asignaturas_a_cursar"]?>>
                    </div>
                    <div>
                        <span> Tipo de asignaturas  <label>*</label></span>
                      <input type="text" name="tipos_de_asignaturas" required value=<?php echo $_SESSION["resultado_total"]["tipo_de_asignaturas"]?> >
                    </div>
                    <div>
                        <span> Condicion del estudiante  <label>*</label></span>
                      <input type="text" name="condicion_del_estudiante" required  value=<?php echo $_SESSION["resultado_total"]["Condicion_del_estudiante"]?> >
                    </div>





										<div class="clear"> </div>
											<a class="news-letter" href="#">
											</a>
										<div class="clear"> </div>
								</div>
								<div class="clear"> </div>

								<div class="clear"> </div>
								<input type="submit" value="Modificar">
						</form>
					</div>
		   </div>
	  </div>


    <?php $sexo =  $_SESSION["resultado_total"]["sexo"];            ?>
    <script type="text/javascript">
    let sexo = "<?php echo $sexo?>";
    console.log(sexo);
    let valores_sexo = document.querySelectorAll(".sexo");
    if(sexo == "masculino"){
      console.log("exito?");
      valores_sexo.forEach(function(valor){
        console.log(valor);
        if(valor.value== "masculino"){



          valor.checked = true;


        }

      });



    } else {
      valores_sexo.forEach(function(valor){
        console.log(valor);
        if(valor.value== "femenino"){



          valor.checked = true;


        }

      });


    }

    </script>

    <script type="text/javascript">
    let periodo_academico = "<?php echo $_SESSION["resultado_total"]["Periodo_academico"] ?>";
    let valor_parroquia = "<?php echo $_SESSION["resultado_total"]["Parroquia"] ?>";
    let valor_sector = "<?php echo $_SESSION["resultado_total"]["Sector"] ?>";
    let valor_calle = "<?php echo $_SESSION["resultado_total"]["Calle"] ?>"
    let Parroquia = document.querySelector(".parroquia");
    let Sector = document.querySelector(".sector");
    let Calle = document.querySelector(".calle");
    let Periodo_academico = document.querySelector(".periodo_academico");

    Parroquia.value = valor_parroquia;
    Sector.value = valor_sector;
    Calle.value = valor_calle;
    Periodo_academico.value = periodo_academico;



    </script>

    <script type="text/javascript">


    let seccion = "<?php echo $_SESSION["resultado_total"]["Seccion"] ?>";
    let seccion_estudiante = document.querySelectorAll(".seccion_estudiante");
    seccion_estudiante.forEach(function(valor){

      if(valor.value == seccion){
        valor.checked = true;

      }

    });




    </script>
    <script type="text/javascript">


    let año = "<?php echo $_SESSION["resultado_total"]["Grado_academico"] ?>";
    let año_estudiante = document.querySelectorAll(".año_estudiante");

    año_estudiante.forEach(function(valor){
      console.log(año + "este es");
      if(valor.value == año){
        valor.checked = true;

      }

    });




    </script>




</body>
</html>
