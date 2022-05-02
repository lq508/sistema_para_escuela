<?php
session_start();
include("conexion.php");
$cedula = $_GET["cedula"];


class Consulta_datos{
  private $resultado_total = null;
  private $cedula = null;
  private $conexion = null;
  private $persona = null;
  private $direccion = null;
  private $correo = null;
  private $fecha_de_nacimiento=null;
  private $telefono = null;
  private $lugar_de_nacimiento= null;
  private $estudiante = null;
  function __construct($conexion , $cedula){

    $this->conexion = $conexion;
    $this->cedula = $cedula;

    $this->Consulta_persona();
$this->Consulta_correo();

    $this->Consulta_correo();
    $this->Consulta_telefono();
    $this->Consulta_estudiante();
    $this->Consulta_direccion();
    $this->Consulta_fecha_nacimiento();
    $this->Consulta_lugar_nacimiento();
    $this->finalizando();
  }

  function finalizando(){


    $this->resultado_total = array("Primer_nombre" => $this->persona["Primer_nombre"] , "Segundo_nombre" => $this->persona["Segundo_nombre"] , "Primer_apellido" => $this->persona["Primer_apellido"] , "Segundo_apellido" => $this->persona["Segundo_apellido"]  , "correo" => $this->correo["correo_electronico"]  , "sexo" => $this->persona["Sexo"] , "edad" => $this->persona["edad"] , "Cedula" => $this->persona["Cedula_de_identidad"] , "Dia_nacimiento" => $this->fecha_de_nacimiento["Dia"] , "Mes" => $this->fecha_de_nacimiento["Mes"] , "Año" => $this->fecha_de_nacimiento["Dia"] ,"Pais" => $this->lugar_de_nacimiento["Pais"] , "Estado" =>  $this->lugar_de_nacimiento["Estado"] , "Ciudad" =>  $this->lugar_de_nacimiento["Ciudad"] , "Telefono" => $this->telefono["Numero_de_telefono"] , "Codifo_area_telefono" => $this->telefono["Codigo_de_area"] , "telefono" => $this->telefono["Numero_de_telefono"] , "Tipo_de_telefono" => $this->telefono["Tipo_de_telefono"] , "Municipio" => $this->direccion["Municipio"] , "Parroquia" => $this->direccion["Parroquia"] , "Sector" => $this->direccion["Sector"] , "Calle" => $this->direccion["Calle"] , "Numero_de_casa" => $this->direccion["Numero_de_casa"] , "Matricula" => $this->estudiante["Matricula_estudiantil"] , "Seccion" => $this->estudiante["Seccion"] , "Grado_academico" => $this->estudiante["Grado_academico"] , "Periodo_academico" => $this->estudiante["periodo_academico"] , "Asignaturas_a_cursar" => $this->estudiante["asignaturas_a_cursar"] , "tipo_de_asignaturas" => $this->estudiante["tipo_de_asignaturas"] , "Condicion_del_estudiante" => $this->estudiante["condicion_del_estudiante"]);

    $_SESSION["resultado_total"]= $this->resultado_total;

    var_dump($this->resultado_total);
   header("Location: http://localhost/rafaelrangel/modificar_estudiante.php");


  }

  function Consulta_lugar_nacimiento(){
    $codigo =  $this->persona["Codigo_lugar_de_nacimiento"];
    $consulta =" SELECT  * from lugar_de_nacimiento where codigo_de_lugar_de_nacimiento='" . $codigo . "'" ;
    $resultado = $this->conexion->query($consulta)->fetch_assoc();
    $this->lugar_de_nacimiento = $resultado;

  }
  function Consulta_fecha_nacimiento(){

    $codigo =  $this->persona["Codigo_fecha_de_nacimiento"];
    $consulta =" SELECT  * from fecha_de_nacimiento where Codigo_de_fecha_de_nacimiento='" . $codigo . "'" ;
    $resultado = $this->conexion->query($consulta)->fetch_assoc();
    $this->fecha_de_nacimiento = $resultado;



  }

  function Consulta_telefono(){
    $consulta =" SELECT  * from telefono where Cedula_de_identidad='" . $this->cedula . "'" ;
    $resultado =   $this->conexion->query($consulta)->fetch_assoc();
    if($resultado){
      $this->telefono = $resultado;
      echo "Consulta exitosa";



    } else {
      echo "la consulta se realizo de forma exitosa";
    }

  }



  function Consulta_estudiante(){
    $consulta =" SELECT  * from estudiante where cedula='" . $this->cedula . "'" ;
   $resultado =   $this->conexion->query($consulta)->fetch_assoc();
    if($resultado){
      $this->estudiante = $resultado;
      echo "Consulta exitosa";



    } else {
      echo "la consulta se realizo de forma exitosa";
    }

  }


  function Consulta_direccion(){
    $consulta =" SELECT  * from direccion where Cedula_de_identidad='" . $this->cedula . "'" ;
   $resultado =   $this->conexion->query($consulta)->fetch_assoc();
    if($resultado){
      $this->direccion = $resultado;
      echo "Consulta exitosa";



    } else {
      echo "la consulta se realizo de forma exitosa";
    }


  }


  function Consulta_persona(){

    $consulta =" SELECT  * from persona where Cedula_de_identidad='" . $this->cedula . "'" ;
   $resultado =   $this->conexion->query($consulta)->fetch_assoc();
    if($resultado){
      $this->persona = $resultado;
      echo "Consulta exitosa";



    } else {
      echo "la consulta se realizo de forma exitosa";
    }

  }

  function Consulta_correo(){

    $consulta =" SELECT  * from correo where Cedula_de_identidad='" . $this->cedula . "'" ;
    $resultado =   $this->conexion->query($consulta)->fetch_assoc();
    if($resultado){
      $this->correo = $resultado;
echo "Consulta exitosa";

    } else {
      echo "la consulta se realizo de forma exitosa";
    }



  }





}


$objeto = new Consulta_datos($conexion , $cedula);




 ?>
