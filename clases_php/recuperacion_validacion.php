<?php
session_start();
$_SESSION["contraseña_cambio_usuario"] = $_POST["usuario_restablecer"];
include("conexion.php");
$respuesta_secreta = $_POST["respuesta_secreta"];
$usuario = $_POST["usuario_restablecer"];


class Validacion_recuperacion{

  private $respuesta_secreta = null;
  private $usuario = null;
  private $resultado = null;
  private $conexion = null;
  private $SALT = "MiSalt";

  function __construct($respuesta_secreta ,$usuario_restablecer ,  $conexion){
    $this->respuesta_secreta = $respuesta_secreta;
    $this->usuario = $usuario_restablecer;
    $this->conexion= $conexion;

    $this->Consulta();
    $this->Validando();

    }

    function Consulta(){
      $consulta = "SELECT Respuesta_secreta from restablecer where Usuario='" . $this->usuario . "'";
      $resultado = $this->conexion->query($consulta)->fetch_assoc();
      $this->resultado = $resultado;

    }

    function Validando(){

      $respuesta_encriptada = hash("sha512" , $this->respuesta_secreta . $this->SALT);
      echo $this->resultado["Respuesta_secreta"];

     if($respuesta_encriptada == $this->resultado["Respuesta_secreta"]){

        header("Location: ../nueva_contraseña.php");

      } else {
        echo " no son iguales !!";

      }


    }


}

$objeto = new Validacion_recuperacion($respuesta_secreta , $usuario , $conexion);




 ?>
