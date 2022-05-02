<?php
session_start();

include("conexion.php");
$usuario = $_POST["usuario"];
$password = $_POST["password"];


class Inicio_de_session{
  private $usuario = null;
  private $password = null;
  private $SALT = "MiSalt";
  private $datos = null;
  private $conexion = null;
  private $verificacion_usuario = null;
  private $usuario_total = null;


  function __construct( $usuario , $password , $conexion){
    $this->usuario = $usuario;
    $this->password= $password;
    $this->conexion = $conexion;
    $this->Consulta();
    $this->Validando();


  }

  function Consulta(){
    $consulta = "SELECT * from usuario where Nombre_de_usuario='" . $this->usuario . "'" ;
    $resultado = $this->conexion->query($consulta)->fetch_assoc();


    if($resultado["Nombre_de_usuario"]){

      $this->verificacion_usuario = true;
      $this->usuario_total = $resultado;



    } else {
      echo "el nombre de usuario no existe ";
    }


  }


  function Validando(){

    if($this->verificacion_usuario){


        $password_encriptada = hash("sha512" , $this->password . $this->SALT);
        if($password_encriptada == $this->usuario_total["password"]){


          $_SESSION["usuario_verificado_panel"] = $this->usuario ;
          header("Location: http://localhost/rafaelrangel/panel.php");

        } else{
           echo "La contraseña es incorrecta ";
        }







    }


  }

}

$objeto_login = new Inicio_de_session($usuario , $password , $conexion);


 ?>
