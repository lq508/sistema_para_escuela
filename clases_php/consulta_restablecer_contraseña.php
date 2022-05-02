<?php
include("conexion.php");
$usuario = $_GET["usuario"];



class Consulta_usuarios{
  private $usuario = null;
  private $conexion = null;

  function __construct($usuario , $conexion){

    $this->usuario = $usuario;
    $this->conexion = $conexion;
    $this->Consulta();

  }


  function Consulta(){
    $consulta = "SELECT * from restablecer where Usuario='" . $this->usuario . "'";

    $resultado = $this->conexion->query($consulta)->fetch_assoc();

    if(!$resultado){

      header('Content-type: application/json');
      $respuesta = array("respuesta" => "no existe el usuario");

     echo json_encode($respuesta, JSON_FORCE_OBJECT);

   } else {

       header('Content-type: application/json');
       echo json_encode($resultado, JSON_FORCE_OBJECT);


   }



  }


}

$objeto = new Consulta_usuarios($usuario , $conexion);





 ?>
