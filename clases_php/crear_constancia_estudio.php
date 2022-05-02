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
  private $template = "template2.docx";
  private $primer_nombre = "";
  private $apellido = "";
  private $seccion = null;

  function __construct($conexion , $cedula , $TBS){

    $this->conexion = $conexion;
    $this->cedula = $cedula;
    $this->TBS= $TBS;


    if($this->Validacion()){
      $this->Consulta();
      $this->Consulta_2();
     $this->Creacion_reporte();

    }




    //



  }

  function Validacion(){

    $consulta = "SELECT *  from persona where Cedula_de_identidad='" . $this->cedula . "'";
    $resultado = $this->conexion->query($consulta)->fetch_assoc();
    if(!$resultado){

      echo " la cedula no esta registrada !!!";
      return false;

    } else {
      return true;

    }
  }

  function Consulta_2(){
    $consulta = "SELECT Grado_academico, Seccion from estudiante where cedula='" . $this->cedula . "'";
    $resultado = $this->conexion->query($consulta)->fetch_assoc();
    $this->grado_academico = $resultado["Grado_academico"];
    $this->seccion = $resultado["Seccion"];

  }

  function Consulta(){
    $consulta = "SELECT Primer_nombre, Primer_apellido from persona where Cedula_de_identidad='" . $this->cedula . "'";
    $resultado = $this->conexion->query($consulta)->fetch_assoc();
    $this->primer_nombre = $resultado["Primer_nombre"];
    $this->apellido = $resultado["Primer_apellido"];

  }

  function Creacion_reporte(){
    $this->TBS->LoadTemplate($this->template, OPENTBS_ALREADY_UTF8);

    $this->TBS->MergeField("pro.nomprimer_nombre" , $this->primer_nombre);
    $this->TBS->MergeField("pro.nomapellido" , $this->apellido);
    $this->TBS->MergeField("pro.nomci" , $this->cedula);
    $this->TBS->MergeField("pro.nomgrado_academico" , $this->grado_academico);
    $this->TBS->MergeField("pro.nomseccion" , $this->seccion);


    $save_as = (isset($_POST['save_as']) && (trim($_POST['save_as'])!=='') && ($_SERVER['SERVER_NAME']=='localhost')) ? trim($_POST['save_as']) : '';

    $output_file_name = str_replace('.', '_'.date('Y-m-d').$save_as.'.', $this->template);
    $this->TBS->Show(OPENTBS_DOWNLOAD, $output_file_name);

    $this->TBS->Show(OPENTBS_FILE, $output_file_name);

    //header("Location: ../reporte.php");

  }



}

$objeto = new Creando_reporte($conexion , $cedula , $TBS);
