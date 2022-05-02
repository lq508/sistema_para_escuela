


class Boton_busca_usuario_restablecer{

  constructor(boton){
    this.verificacion = false;
    this.boton = document.querySelector(boton);
    this.Eventos();

  }

  Eventos(){
  let  verificacion_auxiliar = null;
  let funcion_verificacion_formulario = this.verificacion_formulario;
    this.boton.addEventListener("click" , function(){

      let usuario = document.querySelector(".usuario_restablecer");

      if(!usuario.value){
        alert("¡¡ Coloque el usuario !!!");

      } else {

        fetch("./clases_php/consulta_restablecer_contraseña.php?usuario=" + usuario.value).then(function(respuesta){

          console.log(respuesta);

          respuesta.json().then(function(valor){

            if(valor.respuesta == "no existe el usuario" ){

              alert( "no existe el usuario" );
            } else {
              console.log(valor);
              verificacion_auxiliar = true;
              funcion_verificacion_formulario(verificacion_auxiliar , valor.Pregunta_secreta );

            }



          });


          });

}

        });



      }

      verificacion_formulario(verificacion , pregunta_secreta_uso ){

        if(verificacion){
          let pregunta_secreta = document.querySelector(".pregunta_secreta");
          let respuesta_secreta = document.querySelector(".respuesta_secreta");
          let input_secreto = document.querySelector(".ingreso_restablecer");
          let pregunta_secreta_input = document.querySelector(".pregunta_secreta input");

          pregunta_secreta.classList.add("active");
          respuesta_secreta.classList.add("active");
          input_secreto.classList.add("active");

          pregunta_secreta_input.value = pregunta_secreta_uso;




        }




      }



    }



let objeto_busca_restablecer = new Boton_busca_usuario_restablecer(".ingresar_datos");
