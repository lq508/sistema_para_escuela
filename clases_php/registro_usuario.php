<?php
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
$contraseña = $_POST["contraseña"];
$contraseña_comprobacion = $_POST["contraseña_comprobacion"];
$usuario  = $_POST["nombre_de_usuario"];
$seleccion_nivel = $_POST["seleccion_nivel"];
$cargo_admin = null;
$especialidad_admin = null;
$municipio = $_POST["municipio"];
$parroquia = $_POST["parroquia"];
$sector = $_POST["sector"];
$calle = $_POST["calle"];
$numero_de_casa = $_POST["numero_de_casa"];
$pregunta_secreta = $_POST["pregunta_secreta"];
$respuesta_secreta = $_POST["respuesta_secreta"];
$numero_de_telefono = $_POST["numero_de_telefono"];
$tipo_telefono = $_POST["tipo_telefono"];
$codigo_de_area = $_POST["codigo_de_area"];




if($seleccion_nivel == "administrador"){

  $cargo_admin = $_POST["cargo_admin"];
  $especialidad_admin = $_POST["especialidad_admin"];

}




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
private $codigo_de_restablecer = null;
private $codigo_de_usuario = null;

  function __construct( $conexion , $primer_nombre , $segundo_nombre , $primer_apellido , $segundo_apellido , $email, $sexo, $dia_nacimiento , $mes_nacimiento , $año_nacimiento , $pais_n , $estado_n , $ciudad_n , $cedula , $edad , $contraseña , $contraseña_comprobacion , $usuario , $seleccion_nivel , $cargo_admin , $especialidad_admin , $municipio , $parroquia , $sector , $calle , $numero_de_casa , $pregunta_secreta , $respuesta_secreta , $codigo_de_area , $numero_de_telefono , $tipo_de_telefono){
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
    $this->contraseña = $contraseña;
    $this->contraseña_comprobacion = $contraseña_comprobacion;
    $this->usuario = $usuario;
    $this->seleccion_nivel= $seleccion_nivel;
    $this->cargo_admin = $cargo_admin;
    $this->especialidad_admin = $especialidad_admin;
    $this->municipio = $municipio;
    $this->parroquia = $parroquia;
    $this->sector = $sector;
    $this->calle = $calle;
    $this->numero_de_casa = $numero_de_casa;
    $this->pregunta_secreta = $pregunta_secreta;
    $this->respuesta_secreta = $respuesta_secreta;
    $this->numero_de_telefono = $numero_de_telefono;
    $this->codigo_de_area = $codigo_de_area;
    $this->tipo_de_telefono = $tipo_de_telefono;
    $valor_comprobacion_contraseña = $this->Comprobacion_contraseña();
    $valor_comprobacion_usuario = $this->Comprobacion_usuario();


if($valor_comprobacion_contraseña && $valor_comprobacion_usuario){

  $this->Creando_fecha_nacimiento();
  $this->Creando_lugar_nacimiento();
  $this->buscando_max_id_lugar();
  $this->buscando_max_id_fecha();
  $this->Creando_persona();
  $this->Validacion_nivel();
  $this->Creando_correo_electronico();
  $this->Creando_restablecer();
  $this->Buscando_id_restablecer();
  $this->Creando_usuario();
  $this->Buscando_id_usuario();
  $this->Creando_administrador();

  $this->Creando_direccion();
  $this->Creando_telefono();
  echo "Registro exitoso !!!! <a href='../crear_usuario.php'> registrar otro usuario  <a>";


}







  }

  function Buscando_id_restablecer(){

    $consulta = "SELECT MAX(Codigo_de_restablecer) from restablecer";
  $Codigo_de_restablecer =   $this->conexion->query($consulta)->fetch_assoc();
 $this->codigo_de_restablecer = $Codigo_de_restablecer["MAX(Codigo_de_restablecer)"];


  }

  function Buscando_id_usuario(){

    $consulta = "SELECT MAX(Codigo_de_usuario) from usuario";
  $Codigo_de_usuario =   $this->conexion->query($consulta)->fetch_assoc();
 $this->codigo_de_usuario = $Codigo_de_usuario["MAX(Codigo_de_usuario)"];

  }


  function Creando_telefono(){
    $consulta = "INSERT INTO telefono(Codigo_de_area, Numero_de_telefono , Tipo_de_telefono , Cedula_de_identidad) values(?,?,?,?)";
    $ejecucion = $this->conexion->prepare($consulta);
    $ejecucion->bind_param("ssss" , $this->codigo_de_area  , $this->numero_de_telefono , $this->tipo_de_telefono , $this->cedula );
    $ejecucion->execute();

  }


  function Creando_restablecer(){
    $consulta = "INSERT INTO restablecer (Pregunta_secreta , Respuesta_secreta , Usuario) values(?,?,?)";
    $ejecucion = $this->conexion->prepare($consulta);
    $respuesta_encriptada = hash("sha512" , $this->respuesta_secreta . $this->SALT);

    $ejecucion->bind_param("sss" , $this->pregunta_secreta ,$respuesta_encriptada, $this->usuario);
    $ejecucion->execute();


  }


  function Creando_direccion(){
    $consulta = "INSERT INTO direccion (Municipio , Parroquia , Sector , Calle , Numero_de_casa , Cedula_de_identidad) values(?,?,?,?,?,?)";
    $ejecucion = $this->conexion->prepare($consulta);
    $ejecucion->bind_param("ssssss" , $this->municipio , $this->parroquia , $this->sector , $this->calle , $this->numero_de_casa , $this->cedula);
    $ejecucion->execute();

  }


  function Creando_usuario(){
    $consulta  =" INSERT INTO usuario (Nombre_de_usuario , Tipo_de_usuario , password , codigo_restablecer)  values(?,?,?,?)";
    $contraseña_encriptada = hash("sha512" , $this->contraseña . $this->SALT);
    $tipo_de_usuario = null;
    if($this->validacion_nivel){
      $tipo_de_usuario = "administrador";


    } else {
      $tipo_de_usuario = "estandar";

    }
    $ejecucion = $this->conexion->prepare($consulta);
    $ejecucion->bind_param("ssss" , $this->usuario , $tipo_de_usuario , $contraseña_encriptada , $this->codigo_de_restablecer);
    $ejecucion->execute();


  }

  function Creando_correo_electronico(){
    $consulta ="INSERT INTO correo (Cedula_de_identidad, correo_electronico) values(?,?)";
    $ejecucion = $this->conexion->prepare($consulta);
    $ejecucion->bind_param("ss" , $this->cedula , $this->email);
    $ejecucion->execute();


  }





  function Creando_administrador(){

    if($this->validacion_nivel){
      $consulta = "INSERT INTO administrador( Cargo_administrativo, especialidad_administrativa, Cedula_de_identidad , codigo_de_usuario) values(?,?,?,?)";
      $ejecucion = $this->conexion->prepare($consulta);
      $ejecucion->bind_param("ssss" , $this->cargo_admin , $this->especialidad_admin , $this->cedula , $this->codigo_de_usuario);
      $ejecucion->execute();




    }

  }


  function Validacion_nivel(){
      if($this->seleccion_nivel == "administrador"){

        $this->validacion_nivel = true;

      } else {

        $this->validacion_nivel = false;

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
    $consulta = "INSERT INTO persona(Cedula_de_identidad , Primer_nombre , Segundo_nombre , Primer_apellido , Segundo_apellido , Sexo , edad , Codigo_lugar_de_nacimiento , Codigo_fecha_de_nacimiento) values(?,?,?,?,?,?,?,?,?)";
    $ejecucion = $this->conexion->prepare($consulta);


    $ejecucion->bind_param("sssssssss" , $this->cedula , $this->primer_nombre , $this->segundo_nombre , $this->primer_apellido , $this->segundo_apellido , $this->sexo , $this->edad , $this->id_lugar , $this->id_fecha );
      $resultado = $ejecucion->execute();


      if($resultado){


      }






  }


  function Comprobacion_usuario(){
      $consulta = "SELECT * from usuario";
      $resultado = $this->conexion->query($consulta);
      $contador = 0;
      while($rows = mysqli_fetch_assoc($resultado)){

        if($this->usuario == $rows["Nombre_de_usuario"]){

          $contador++;

        }

      }

      if($contador > 0 ){

        echo " El usuario ya existe ";
        return false;

      } else {
        return true;


      }

  }


}



$objeto = new Creando_usuario($conexion , $primer_nombre , $segundo_nombre , $primer_apellido , $segundo_apellido , $email, $sexo, $dia_nacimiento , $mes_nacimiento , $año_nacimiento , $pais_n , $estado_n , $ciudad_n , $cedula , $edad , $contraseña , $contraseña_comprobacion , $usuario, $seleccion_nivel , $cargo_admin , $especialidad_admin , $municipio , $parroquia , $sector , $calle , $numero_de_casa , $pregunta_secreta , $respuesta_secreta , $codigo_de_area , $numero_de_telefono , $tipo_telefono );





 ?>
