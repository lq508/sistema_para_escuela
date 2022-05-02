
<?php
session_start();
include("conexion.php");


$primer_nombre = $_POST["primer_nombre"];
$segundo_nombre = $_POST["segundo_nombre"];
$primer_apellido = $_POST["primer_apellido"];
$segundo_apellido = $_POST["segundo_apellido"];
$email = $_POST["email"];
$sexo = $_POST["sexo"];
$dia_nacimiento = $_POST["dia_nacimiento"];
$mes_nacimiento = $_POST["mes_nacimiento"];
$año_nacimiento = $_POST["año_nacimiento"];
$pais_n = $_POST["pais_n"];
$estado_n = $_POST["estado_n"];
$ciudad_n = $_POST["ciudad_n"];
$cedula = $_POST["cedula"];
$edad = $_POST["edad"];
$cargo_admin = null;
$especialidad_admin = null;
$municipio = $_POST["municipio"];
$parroquia = $_POST["parroquia"];
$sector = $_POST["sector"];
$calle = $_POST["calle"];
$numero_de_casa = $_POST["numero_de_casa"];
$numero_de_telefono = $_POST["numero_de_telefono"];
$tipo_telefono = $_POST["tipo_telefono"];
$codigo_de_area = $_POST["codigo_de_area"];
$matricula = $_POST["matricula"];
$seccion = $_POST["seccion"];
$grado_academico = $_POST["grado_academico"];
$periodo_academico = $_POST["periodo_academico"];
$asignaturas = $_POST["asignaturas"];
$tipos_de_asignaturas = $_POST["tipos_de_asignaturas"];
$condicion_del_estudiante = $_POST["condicion_del_estudiante"];
$usuario_de_registro = $_SESSION["usuario_verificado_panel"];






class Creando_usuario{

private $primer_nombre = null;
private $segundo_nombre = null;
private $primer_apellido = null;
private $segundo_apellido = null;
private $email = null;
private $sexo = null;
private $dia_nacimiento=null;
private $mes_nacimiento = null;
private $año_nacimiento = null;
private $pais_n =null;
private $estado_n = null;
private $ciudad_n = null;
private $cedula = null;
private $id_fecha=null;
private $id_lugar=null;
private $edad = null;
private $usuario =null;
private $seleccion_nivel = null;
private $cargo_admin = null;
private $especialidad_admin = null;
private $validacion_nivel= null;
private $SALT = "MiSalt";
private $municipio = null;
private $parroquia = null;
private $sector = null;
private $calle = null;
private $numero_de_casa = null;
private $pregunta_secreta= null;
private $respuesta_secreta = null;
private $numero_de_telefono = null;
private $tipo_de_telefono = null;
private $codigo_de_area = null;
private $matricula = null;
private $seccion = null;
private $grado_academico = null;
private $periodo_academico = null;
private $asignaturas = null;
private $tipos_de_asignaturas = null;
private $condicion_del_estudiante = null;
private $usuario_de_registro = null;
private $codigo_de_lugar_de_nacimiento =null;
private $codigo_de_fecha_de_nacimiento = null;

  function __construct( $conexion , $primer_nombre , $segundo_nombre , $primer_apellido , $segundo_apellido , $email, $sexo, $dia_nacimiento , $mes_nacimiento , $año_nacimiento , $pais_n , $estado_n , $ciudad_n , $cedula , $edad    , $municipio , $parroquia , $sector , $calle , $numero_de_casa  , $codigo_de_area , $numero_de_telefono , $tipo_de_telefono , $matricula , $seccion , $grado_academico , $periodo_academico , $asignaturas , $tipos_de_asignaturas , $condicion_del_estudiante ,$usuario_de_registro){
    $this->conexion = $conexion;
    $this->primer_nombre = $primer_nombre;
    $this->segundo_nombre = $segundo_nombre;
    $this->primer_apellido = $primer_apellido;
    $this->segundo_apellido = $segundo_apellido;
    $this->email = $email;
    $this->sexo = $sexo;
    $this->dia_nacimiento = $dia_nacimiento;
    $this->mes_nacimiento = $mes_nacimiento;
    $this->año_nacimiento = $año_nacimiento;
    $this->pais_n = $pais_n;
    $this->estado_n = $estado_n;
    $this->ciudad_n = $ciudad_n;
    $this->cedula = $cedula;
    $this->edad = $edad;



    $this->municipio = $municipio;
    $this->parroquia = $parroquia;
    $this->sector = $sector;
    $this->calle = $calle;
    $this->numero_de_casa = $numero_de_casa;

    $this->numero_de_telefono = $numero_de_telefono;
    $this->codigo_de_area = $codigo_de_area;
    $this->tipo_de_telefono = $tipo_de_telefono;
    $this->matricula = $matricula;
    $this->seccion = $seccion;
    $this->grado_academico = $grado_academico;
    $this->periodo_academico = $periodo_academico;
    $this->asignaturas = $asignaturas;
    $this->tipos_de_asignaturas = $tipos_de_asignaturas;
    $this->condicion_del_estudiante = $condicion_del_estudiante;
    $this->cedula = $cedula;
    $this->usuario_de_registro = $usuario_de_registro;


    $this->Creando_persona();
    $this->Creando_correo_electronico();
    $this->Creando_direccion();
    $this->Creando_telefono();

    $this->Creando_estudiante();
    $this->Buscando_id_fecha();
    $this->Actualizando_lugar_nacimiento();
    $this->Actualizando_fecha_nacimiento();

    echo "El estudiante con cedula " . $this->cedula . " fue actualizado";

    /*  $this->Creando_lugar_nacimiento();
      $this->Creando_fecha_nacimiento();


      $this->buscando_max_id_lugar();
      $this->buscando_max_id_fecha();
      echo " El estudiante se registro correctamente, para registrar otro ir <a href='../registrar.php'> Registro </a>";
      //echo "Registro exitoso !!!! <a href='../crear_usuario.php'> registrar otro usuario  <a>";

*/




  }

  function Actualizando_fecha_nacimiento(){
    $consulta = "UPDATE fecha_de_nacimiento SET Dia='$this->dia_nacimiento', Mes='$this->mes_nacimiento', Año='$this->año_nacimiento' where Codigo_de_fecha_de_nacimiento='"  .$this->codigo_de_fecha_de_nacimiento . "'";
    $resultado = $this->conexion->query($consulta);

    if($resultado){

    }
  }

  function Actualizando_lugar_nacimiento(){
    $consulta = "UPDATE lugar_de_nacimiento SET Pais='$this->pais_n', Estado='$this->estado_n', Ciudad='$this->ciudad_n' where codigo_de_lugar_de_nacimiento='"  .$this->codigo_de_lugar_de_nacimiento . "'";
    $resultado = $this->conexion->query($consulta);

    if($resultado){

    }

  }

  function Buscando_id_fecha(){
    $consulta ="SELECT Codigo_fecha_de_nacimiento, Codigo_lugar_de_nacimiento from persona where Cedula_de_identidad='" . $this->cedula . "'" ;
    $resultado = $this->conexion->query($consulta)->fetch_assoc();
    $this->codigo_de_fecha_de_nacimiento = $resultado["Codigo_fecha_de_nacimiento"];
    $this->codigo_de_lugar_de_nacimiento = $resultado["Codigo_lugar_de_nacimiento"];

  }

  function Creando_estudiante(){

    $consulta = "UPDATE  estudiante SET Matricula_estudiantil='$this->matricula', Seccion='$this->seccion' , Grado_academico='$this->grado_academico' , periodo_academico='$this->periodo_academico' , asignaturas_a_cursar='$this->asignaturas' , tipo_de_asignaturas='$this->tipos_de_asignaturas' , condicion_del_estudiante='$this->condicion_del_estudiante' , cedula='$this->cedula' , Nombre_de_usuario='$this->usuario_de_registro' WHERE  cedula='$this->cedula' ";
    $resultado = $this->conexion->query($consulta);

    if($resultado){

    }


  }

  function Creando_telefono(){
    $consulta = "UPDATE  telefono SET Codigo_de_area='$this->codigo_de_area', Numero_de_telefono='$this->numero_de_telefono' , Tipo_de_telefono='$this->tipo_de_telefono' , Cedula_de_identidad='$this->cedula' WHERE Cedula_de_identidad='$this->cedula'";
    $resultado = $this->conexion->query($consulta);

    if($resultado){

    }

  }




  function Creando_direccion(){
    $consulta = "UPDATE  direccion SET Municipio='$this->municipio' , Parroquia='$this->parroquia' , Sector ='$this->sector', Calle ='$this->calle', Numero_de_casa='$this->numero_de_casa' , Cedula_de_identidad='$this->cedula' where Cedula_de_identidad='$this->cedula'";
  $resultado = $this->conexion->query($consulta);
  if($resultado){

  }

  }




  function Creando_correo_electronico(){
    $consulta ="UPDATE  correo SET Cedula_de_identidad='$this->cedula', correo_electronico='$this->email' where Cedula_de_identidad='$this->cedula' ";
    $resultado = $this->conexion->query($consulta);
    if($resultado){

    }

  }














  function Creando_fecha_nacimiento(){
    $consulta = "INSERT INTO fecha_de_nacimiento  (Dia , Mes , Año) values(?,?,?)";
    $ejecucion = $this->conexion->prepare($consulta);
    $ejecucion->bind_param("sss" , $this->dia_nacimiento , $this->mes_nacimiento , $this->año_nacimiento);
    $resultado = $ejecucion->execute();





  }

  function Creando_lugar_nacimiento(){
    $consulta = "INSERT INTO lugar_de_nacimiento  (Pais , Estado , Ciudad) values(?,?,?)";
    $ejecucion = $this->conexion->prepare($consulta);
    $ejecucion->bind_param("sss" , $this->pais_n , $this->estado_n , $this->ciudad_n);
    $resultado = $ejecucion->execute();




  }


  function buscando_max_id_lugar(){
    $consulta = "SELECT MAX(codigo_de_lugar_de_nacimiento) from lugar_de_nacimiento";
    $resultado = $this->conexion->query($consulta)->fetch_assoc();
    $codigo = $resultado["MAX(codigo_de_lugar_de_nacimiento)"];
    $this->id_lugar= $codigo;


  }

  function buscando_max_id_fecha(){
    $consulta = "SELECT MAX(Codigo_de_fecha_de_nacimiento) from fecha_de_nacimiento";
    $resultado = $this->conexion->query($consulta)->fetch_assoc();
    $codigo = $resultado["MAX(Codigo_de_fecha_de_nacimiento)"];
    $this->id_fecha= $codigo;


  }

  function Comprobacion_contraseña(){

    if( $this->contraseña != $this->contraseña_comprobacion){

      echo "Las contraseña y la contraseña de comprobacion no son iguales";
      return false;
    } else {
      return true;
    }




  }

  function Creando_persona(){
    $consulta = " UPDATE persona SET   Primer_nombre='$this->primer_nombre', Segundo_nombre='$this->segundo_nombre' ,Primer_apellido='$this->primer_apellido' , Segundo_apellido='$this->segundo_apellido', Sexo='$this->sexo' , edad='$this->edad', Cedula_de_identidad='$this->cedula'  WHERE Cedula_de_identidad=" . $this->cedula;

  $resultado =   $this->conexion->query($consulta);




  }

}





$objeto = new Creando_usuario($conexion , $primer_nombre , $segundo_nombre , $primer_apellido , $segundo_apellido , $email, $sexo, $dia_nacimiento , $mes_nacimiento , $año_nacimiento , $pais_n , $estado_n , $ciudad_n , $cedula , $edad   , $municipio , $parroquia , $sector , $calle , $numero_de_casa  , $codigo_de_area , $numero_de_telefono , $tipo_telefono , $matricula , $seccion , $grado_academico , $periodo_academico , $asignaturas  , $tipos_de_asignaturas , $condicion_del_estudiante , $usuario_de_registro );





 ?>
