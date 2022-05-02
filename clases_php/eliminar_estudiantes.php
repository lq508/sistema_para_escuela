<?php

include("conexion.php");
$cedula = $_GET["cedula"];



class Eliminacion{
  private $conexion = null;
  private $cedula = null;
  private $codigo_fecha_nacimiento = null;
  private $codigo_lugar_nacimiento = null;
  function __construct($conexion , $cedula){
    $this->conexion = $conexion;
    $this->cedula = $cedula;

    $this->Consulta_fecha_nacimiento();
    $this->Eliminando_fecha_nacimiento();
    $this->Consulta_lugar_nacimiento();
    $this->Eliminando_lugar_nacimiento();
    $this->Eliminando_persona();
  $this->Eliminando_estudiante();
  $this->Eliminando_direccion();

  $this->Eliminando_telefono();

 $this->Eliminando_correo();

 echo "El estudiante con la cedula " . $this->cedula . " ha sido eliminado";
  }

  function Eliminando_telefono(){
    $consulta = "DELETE from telefono where Cedula_de_identidad=" . $this->cedula;
    $resultado = $this->conexion->query($consulta);


  }

  function Consulta_fecha_nacimiento(){
    $consulta= "SELECT Codigo_fecha_de_nacimiento from persona where Cedula_de_identidad='" . $this->cedula . "'";
    $resultado = $this->conexion->query($consulta)->fetch_assoc();
    $this->codigo_fecha_nacimiento = $resultado["Codigo_fecha_de_nacimiento"];
  }

  function Consulta_lugar_nacimiento(){
    $consulta= "SELECT Codigo_lugar_de_nacimiento from persona where Cedula_de_identidad='" . $this->cedula . "'";
    $resultado = $this->conexion->query($consulta)->fetch_assoc();
    $this->codigo_lugar_nacimiento = $resultado["Codigo_lugar_de_nacimiento"];

  }

  function Eliminando_lugar_nacimiento(){
    $consulta = "DELETE from lugar_de_nacimiento where codigo_de_lugar_de_nacimiento=" . $this->codigo_lugar_nacimiento;
    $resultado = $this->conexion->query($consulta);
    if($resultado){


    }

  }


  function Eliminando_fecha_nacimiento(){
    $consulta = "DELETE from fecha_de_nacimiento where Codigo_de_fecha_de_nacimiento=" . $this->codigo_fecha_nacimiento;
    $resultado = $this->conexion->query($consulta);


  }


  function Eliminando_correo(){
    $consulta = "DELETE from correo where Cedula_de_identidad=" . $this->cedula;
    $resultado = $this->conexion->query($consulta);

  }

  function Eliminando_direccion(){
    $consulta = "DELETE from direccion where Cedula_de_identidad=" . $this->cedula;
    $resultado = $this->conexion->query($consulta);


  }


  function Eliminando_persona(){
    $consulta = "DELETE from persona where Cedula_de_identidad=" . $this->cedula;
    $resultado = $this->conexion->query($consulta);




    }

    function Eliminando_estudiante(){
      $consulta = "DELETE from estudiante where cedula=" . $this->cedula;
      $resultado = $this->conexion->query($consulta);


  }


}


$objeto = new Eliminacion($conexion , $cedula);




 ?>
