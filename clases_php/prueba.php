<?php



$conexion = new mysqli("localhost" , "root" , "" ,"rafaelrangel");
$consulta = "INSERT INTO restablecer (Pregunta_secreta , Respuesta_secreta , Usuario) values(?,?,?)";
$ejecucion = $this->conexion->prepare($consulta);
$pregunta_secreta = "odaskodkasp";
$valor_2 = "dadaskodkspadkspd";
$usuario = "oakdspodskdpoadop";


$ejecucion->bind_param("sss" ,  ,$pregunta_secreta, $this->valor_2 , $usuario);
$ejecucion->execute();


 ?>
