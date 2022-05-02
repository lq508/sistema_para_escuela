<?php
session_start();

include("conexion.php");

$usuario = $_SESSION["contraseña_cambio_usuario"];
$contraseña = $_POST["contraseña"];
$contraseña_verifiacion= $_POST["contraseña_verifiacion"];

class Cambio_final_contraseña{
  private $conexion = null;
  private $usuario = null;
  private $contraseña = null;
  private $contraseña_verificacion = null;
  private $verificacion = null;
  private $SALT = "MiSalt";

  function __construct( $conexion , $usuario , $contraseña , $contraseña_verificacion){
    $this->conexion = $conexion;
    $this->usuario = $usuario;
    $this->contraseña = $contraseña;
    $this->contraseña_verifiacion = $contraseña_verificacion;

    $verificacion = $this->Verificacion();

    if($verificacion){
      $this->Cambio();
    } else {
      echo  " Las contraseñas no son iguales";
    }

  }

  function Verificacion(){

    if($this->contraseña_verifiacion == $this->contraseña){

      return true;

    } else {
        return false;
    }

  }

  function Cambio(){
    $contraseña_encriptada = hash("sha512" , $this->contraseña . $this->SALT);
    $consulta ="update usuario set password='" . $contraseña_encriptada . "' where Nombre_de_usuario='" . $this->usuario . "'" ;
    $this->conexion->query($consulta);
    echo " Cambio de contraseña exitoso !! <a href='index.html'>   <a>";

  }

}


$objeto = new Cambio_final_contraseña($conexion , $usuario, $contraseña , $contraseña_verifiacion);










 ?>
