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
<link rel="stylesheet" href="./css/style_footer.css">

<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<link href="css/style.css" rel='stylesheet' type='text/css' />
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

             <img class="titulo_imagen_3" src="./images/NOMBRE2.png" alt="">

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
      <div class="shop_top3">
	     <div class="container4">
						<form action="./clases_php/crear_ficha_estudiante.php" method="POST">
								<div class="register-top-grid">
										<h3>Informacion del estudiante</h3>
										<div>
											<span>Cedula<label>*</label></span>
											<input type="text" name="cedula">
										</div>

										<div class="clear"> </div>
											<a class="news-letter" href="#">
											</a>
										<div class="clear"> </div>
								</div>
								<div class="clear"> </div>

								<div class="clear"> </div>
								<input type="submit" value="Crear ficha de estudio">
						</form>
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
