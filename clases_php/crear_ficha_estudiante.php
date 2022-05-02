<?php
include("conexion.php");
include_once('tbs_class.php');
include_once('plugins/tbs_plugin_opentbs.php');
$TBS = new clsTinyButStrong;
$TBS->Plugin(TBS_INSTALL, OPENTBS_PLUGIN);
$cedula = $_POST["cedula"];

class Creando_reporte{

  private $cedula = null;
  private $conexion = null;
  private $TBS= null;
  private $template = "template3.docx";
  private $primer_nombre = "";
  private $segundo_nombre = null;
  private $sexo = null;
  private $segundo_apellido = null;
  private $edad = null;
  private $codigo_lugar_nacimiento = null;
  private $dia = null;
  private $mes = null;
  private $año = null;
  private $pais = null;
  private $estado = null;
  private $ciudad = null;

  private $telefono = null;

  private $municipio = null;
  private $parroquia = null;
  private $sector = null;
  private $numero_de_casa=null;


  private $apellido = "";
  private $seccion = null;

  function __construct($conexion , $cedula , $TBS){

    $this->conexion = $conexion;
    $this->cedula = $cedula;
    $this->TBS= $TBS;


    if($this->Validacion()){
      $this->Consulta();
      $this->Consulta_2();
    $this->Consulta_fecha_nacimiento();
    $this->Consulta_lugar_nacimiento();
    $this->Consulta_direccion();
    $this->Consulta_telefono();
     $this->Creacion_reporte();

   } else {


   }








  }


  function Consulta_telefono(){
    $consulta = "SELECT *  from telefono where Cedula_de_identidad=" . $this->cedula;
    $resultado =  $this->conexion->query($consulta)->fetch_assoc();
    $this->telefono = $resultado["Numero_de_telefono"];
  }


  function Consulta_direccion(){
    $consulta = "SELECT *  from direccion where Cedula_de_identidad=" . $this->cedula;
  $resultado =  $this->conexion->query($consulta)->fetch_assoc();

  $this->municipio = $resultado["Municipio"];
  $this->parroquia = $resultado["Parroquia"];
  $this->sector = $resultado["Sector"];
  $this->calle = $resultado["Calle"];
  $this->numero_de_casa = $resultado["Numero_de_casa"];
  }

  function Validacion(){

    $consulta = "SELECT *  from persona where Cedula_de_identidad=" . $this->cedula;

    $resultado = $this->conexion->query($consulta)->fetch_assoc();
    if(!$resultado){
  //    var_dump($resultado);
      echo " la cedula no esta registrada !!!";
      return false;

    } else {
      $this->codigo_fecha_nacimiento = $resultado["Codigo_fecha_de_nacimiento"];
     $this->codigo_lugar_nacimiento = $resultado["Codigo_lugar_de_nacimiento"];

      return true;

    }
  }

  function Consulta_2(){
    $consulta = "SELECT Grado_academico, Seccion  from estudiante where cedula='" . $this->cedula . "'";
    $resultado = $this->conexion->query($consulta)->fetch_assoc();
    $this->grado_academico = $resultado["Grado_academico"];
    $this->seccion = $resultado["Seccion"];


  }


  function Consulta_lugar_nacimiento(){
    $consulta = "SELECT * from lugar_de_nacimiento  where codigo_de_lugar_de_nacimiento='" . $this->codigo_lugar_nacimiento ."'";
    $resultado = $this->conexion->query($consulta)->fetch_assoc();
    $this->pais = $resultado["Pais"];
    $this->estado = $resultado["Estado"];
    $this->ciudad = $resultado["Ciudad"];
  }


  function Consulta_fecha_nacimiento(){
    $consulta = "SELECT * from fecha_de_nacimiento  where Codigo_de_fecha_de_nacimiento='" . $this->codigo_fecha_nacimiento ."'";
    $resultado = $this->conexion->query($consulta)->fetch_assoc();
    $this->dia = $resultado["Dia"];
    $this->mes = $resultado["Mes"];
    $this->año = $resultado["Año"];



  }

  function Consulta(){

    $consulta = "SELECT Primer_nombre, Segundo_nombre, Primer_apellido, Sexo, Primer_apellido , Segundo_apellido, Edad from persona where Cedula_de_identidad='" . $this->cedula . "'";
    $resultado = $this->conexion->query($consulta)->fetch_assoc();
    $this->primer_nombre = $resultado["Primer_nombre"];
    $this->segundo_nombre = $resultado["Segundo_nombre"];
    $this->apellido = $resultado["Primer_apellido"];
    $this->sexo = $resultado["Sexo"];
    $this->segundo_apellido = $resultado["Segundo_apellido"];
    $this->edad = $resultado["Edad"];
  }



  function Creacion_reporte(){
    $this->TBS->LoadTemplate($this->template, OPENTBS_ALREADY_UTF8);

    $this->TBS->MergeField("pro.primer_nombre" , $this->primer_nombre);
    $this->TBS->MergeField("pro.segundo_nombre" , $this->segundo_nombre);
    $this->TBS->MergeField("pro.sexo" , $this->sexo);

    $this->TBS->MergeField("pro.primer_apellido" , $this->apellido);
    $this->TBS->MergeField("pro.segundo_apellido" , $this->segundo_apellido);

    $this->TBS->MergeField("pro.ci" , $this->cedula);
    $this->TBS->MergeField("pro.grado_academico" , $this->grado_academico);
    $this->TBS->MergeField("pro.seccion" , $this->seccion);
    $this->TBS->MergeField("pro.edad" , $this->edad);
    $this->TBS->MergeField("pro.dia" , $this->dia);
    $this->TBS->MergeField("pro.mes" , $this->mes);
    $this->TBS->MergeField("pro.año" , $this->año);

    $this->TBS->MergeField("pro.pais" , $this->pais);
    $this->TBS->MergeField("pro.estado" , $this->estado);
    $this->TBS->MergeField("pro.ciudad" , $this->ciudad);
    $this->TBS->MergeField("pro.ciudad" , $this->ciudad);
    $this->TBS->MergeField("pro.municipio" , $this->municipio);
    $this->TBS->MergeField("pro.parroquia" , $this->parroquia);
    $this->TBS->MergeField("pro.sector" , $this->sector);
    $this->TBS->MergeField("pro.calle" , $this->calle);
    $this->TBS->MergeField("pro.numero_de_casa" , $this->numero_de_casa);
    $this->TBS->MergeField("pro.numero_de_telefono" , $this->telefono);






    $save_as = (isset($_POST['save_as']) && (trim($_POST['save_as'])!=='') && ($_SERVER['SERVER_NAME']=='localhost')) ? trim($_POST['save_as']) : '';

    $output_file_name = str_replace('.', '_'.date('Y-m-d').$save_as.'.', $this->template);
    $this->TBS->Show(OPENTBS_DOWNLOAD, $output_file_name);

    $this->TBS->Show(OPENTBS_FILE, $output_file_name);

    //header("Location: ../reporte.php");

  }



}

$objeto = new Creando_reporte($conexion , $cedula , $TBS);
