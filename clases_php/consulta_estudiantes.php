<?php
include("conexion.php");



class Consulta_estudiantes{

  private $conexion = null;
  private $estudiantes = null;

  function __construct($conexion){
    $this->conexion = $conexion;
    $this->estudiantes = array();
    $this->Consulta();
  //  $this->Respuesta();



  }

  function Consulta(){
    $variable_axiliar = array();

    $consulta = "SELECT cedula, Grado_academico, Seccion  from estudiante ";
    $resultado = $this->conexion->query($consulta);


     while($rows = mysqli_fetch_assoc($resultado)){

        array_push($variable_axiliar , $rows);

     }

     for($i = 0 ; $i < count($variable_axiliar); $i++){

     $consulta_2 = "SELECT Primer_nombre from persona where Cedula_de_identidad=" . $variable_axiliar[$i]["cedula"];

     $resultado_nombre = $this->conexion->query($consulta_2)->fetch_assoc();

     $nuevo_array = array( "Cedula" => $variable_axiliar[$i]["cedula"], "Nombre" => $resultado_nombre["Primer_nombre"] , "Año" => $variable_axiliar[$i]["Grado_academico"] ,"Seccion" => $variable_axiliar[$i]["Seccion"]);
     array_push($this->estudiantes , $nuevo_array);

     }




    header('Content-type: application/json');
    echo json_encode($this->estudiantes, JSON_FORCE_OBJECT);










  }

  function Respuesta(){
    header('Content-type: application/json');
    echo json_encode($this->estudiantes, JSON_FORCE_OBJECT);




  }






}


$objeto = new Consulta_estudiantes($conexion);



 ?>
