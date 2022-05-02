





class Eventos_seccion_año{

  constructor(boton_1 , boton_2){

    this.boton_1 = document.querySelector(boton_1);
      this.boton_2 = document.querySelector(boton_2);
      this.Consulta_inicial();
      this.Eventos_li_seccion();
      this.Eventos_li_año();
      this.Evento_boton_2();

      this.Evento_boton_1();

  }


  Agregando_panel_inicial(){

    let content_estudiantes = document.querySelector(".estudiantes_modificacion");
    console.log(content_estudiantes);

    let cedula_2 = document.createElement("p");
    cedula_2.classList.add("p2");
    cedula_2.innerHTML = "Cedula";
    content_estudiantes.appendChild(cedula_2);


    let nombre_2 = document.createElement("p");
    nombre_2.innerHTML = "Nombre";
    nombre_2.classList.add("p2");
    content_estudiantes.appendChild(nombre_2);

    let seccion_2 = document.createElement("p");
    seccion_2.innerHTML = "Sección";
    seccion_2.classList.add("p2");
    content_estudiantes.appendChild(seccion_2);


    let año_2 = document.createElement("p");
    año_2.innerHTML = "Año";
    año_2.classList.add("p2");
    content_estudiantes.appendChild(año_2);

    let action_2 = document.createElement("p");
     action_2.classList.add("action");
    action_2.innerHTML="Acción";
    action_2.classList.add("p2");

    content_estudiantes.appendChild(action_2);




  }



  Consulta_inicial(){
    let content_estudiantes = document.querySelector(".estudiantes_modificacion");
    fetch("http://localhost/rafaelrangel/clases_php/consulta_estudiantes.php").then(function(valor){

      valor.json().then(function(valor_json){

    let numero_estudiantes =     Object.keys(valor_json).length;

    for(let i =0 ; i < numero_estudiantes ; i ++){


      let cedula = document.createElement("p");
      cedula.classList.add("p2");
      cedula.innerHTML = valor_json[i].Cedula;
      content_estudiantes.appendChild(cedula);


      let nombre = document.createElement("p");
      nombre.innerHTML = valor_json[i].Nombre;
      nombre.classList.add("p2");
      content_estudiantes.appendChild(nombre);

      let seccion = document.createElement("p");
      seccion.innerHTML = valor_json[i].Seccion;
      seccion.classList.add("p2");
      content_estudiantes.appendChild(seccion);


      let año = document.createElement("p");
      año.innerHTML = valor_json[i].Año;
      año.classList.add("p2");
      content_estudiantes.appendChild(año);

      let action = document.createElement("a");
       action.classList.add("action");
       action.setAttribute("href" , "http://localhost/rafaelrangel/clases_php/eliminar_estudiantes.php?cedula=" + valor_json[i].Cedula);
       action.classList.add("p2");

      action.innerHTML="Eliminar";

      content_estudiantes.appendChild(action);





      console.log(valor_json[i].Seccion);

    }


      });

    });

  }


  Evento_boton_2(){

    this.boton_2.addEventListener("click" , function(){
      let boton_ul_seccion = document.querySelectorAll(".content_boton_año ul li");
      let boton_seccion_imagen = document.querySelector(".boton_filtrado_año img");


      boton_ul_seccion.forEach(function(valor){


        if(valor.classList.contains("active")){

          valor.classList.remove("active");
          valor.classList.add("desactive");

        } else if(valor.classList.contains("desactive")){
          valor.classList.add("active");
          valor.classList.remove("desactive");

        } else {
          valor.classList.add("active");

        }

      });


      if(boton_seccion_imagen.classList.contains("active")){

        boton_seccion_imagen.classList.remove("active");
        boton_seccion_imagen.classList.add("desactive");

      } else if(boton_seccion_imagen.classList.contains("desactive")){
        boton_seccion_imagen.classList.add("active");
        boton_seccion_imagen.classList.remove("desactive");

      } else {
        boton_seccion_imagen.classList.add("active");

      }


  });

 }

  Eventos_li_año(){

    let opciones_li = document.querySelectorAll(".content_boton_año li");

    let content_estudiantes = document.querySelector(".estudiantes_modificacion");
    let panel_inicial = this.Agregando_panel_inicial;

    opciones_li.forEach(function(valor){


      valor.addEventListener("click" , function(){
        content_estudiantes.innerHTML = "";


        let boton_seccion = document.querySelector(".boton_filtrado_año p");
        boton_seccion.innerHTML = valor.innerHTML;
        panel_inicial();


        fetch("http://localhost/rafaelrangel/clases_php/consulta_estudiantes_año.php?año=" + valor.innerHTML).then(function(resultado){


          resultado.json().then(function(valor_json){

            let numero_estudiantes_2 =     Object.keys(valor_json).length;
            console.log(numero_estudiantes_2);

            for(let i =0 ; i < numero_estudiantes_2 ; i ++){
              console.log(i);

              let cedula = document.createElement("p");
              cedula.classList.add("p2");
              cedula.innerHTML = valor_json[i].Cedula;
              content_estudiantes.appendChild(cedula);


              let nombre = document.createElement("p");
              nombre.innerHTML = valor_json[i].Nombre;
              nombre.classList.add("p2");
              content_estudiantes.appendChild(nombre);

              let seccion = document.createElement("p");
              seccion.innerHTML = valor_json[i].Seccion;
              seccion.classList.add("p2");
              content_estudiantes.appendChild(seccion);


              let año = document.createElement("p");
              año.innerHTML = valor_json[i].Año;
              año.classList.add("p2");
              content_estudiantes.appendChild(año);

              let action = document.createElement("a");
               action.classList.add("action");
               action.classList.add("p2");

              action.innerHTML="Eliminar";
              content_estudiantes.appendChild(action);






            }

          });



      });




        })

      });



  }


  Eventos_li_seccion(){

    let opciones_li = document.querySelectorAll(".content_boton_seccion li");
    let panel_inicial = this.Agregando_panel_inicial;



    opciones_li.forEach(function(valor){


      valor.addEventListener("click" ,function (){



        let content_estudiantes = document.querySelector(".estudiantes_modificacion");
        content_estudiantes.innerHTML = "";
        panel_inicial();

        let boton_seccion = document.querySelector(".boton_filtrado_seccion p");
        boton_seccion.innerHTML = valor.innerHTML;


        fetch("http://localhost/rafaelrangel/clases_php/consulta_estudiantes_seccion.php?seccion=" + valor.innerHTML).then(function(resultado){


          resultado.json().then(function(valor_json){

            let numero_estudiantes_2 =     Object.keys(valor_json).length;
            console.log(numero_estudiantes_2);

            for(let i =0 ; i < numero_estudiantes_2 ; i ++){
              console.log(i);

              let cedula = document.createElement("p");
              cedula.classList.add("p2");
              cedula.innerHTML = valor_json[i].Cedula;
              content_estudiantes.appendChild(cedula);


              let nombre = document.createElement("p");
              nombre.innerHTML = valor_json[i].Nombre;
              nombre.classList.add("p2");
              content_estudiantes.appendChild(nombre);

              let seccion = document.createElement("p");
              seccion.innerHTML = valor_json[i].Seccion;
              seccion.classList.add("p2");
              content_estudiantes.appendChild(seccion);


              let año = document.createElement("p");
              año.innerHTML = valor_json[i].Año;
              año.classList.add("p2");
              content_estudiantes.appendChild(año);

              let action = document.createElement("a");
               action.classList.add("action");
               action.classList.add("p2");

              action.innerHTML="Eliminar";
              content_estudiantes.appendChild(action);






            }

          });



      });

    });


  });

}

  Evento_boton_1(){

    this.boton_1.addEventListener("click" , function(){
      let boton_ul_seccion = document.querySelectorAll(".content_boton_seccion ul li");
      let boton_seccion_imagen = document.querySelector(".boton_filtrado_seccion img");


      boton_ul_seccion.forEach(function(valor){


        if(valor.classList.contains("active")){

          valor.classList.remove("active");
          valor.classList.add("desactive");

        } else if(valor.classList.contains("desactive")){
          valor.classList.add("active");
          valor.classList.remove("desactive");

        } else {
          valor.classList.add("active");

        }

      });


      if(boton_seccion_imagen.classList.contains("active")){

        boton_seccion_imagen.classList.remove("active");
        boton_seccion_imagen.classList.add("desactive");

      } else if(boton_seccion_imagen.classList.contains("desactive")){
        boton_seccion_imagen.classList.add("active");
        boton_seccion_imagen.classList.remove("desactive");

      } else {
        boton_seccion_imagen.classList.add("active");

      }









    });

  }





}

  let objeto_seccion_año = new Eventos_seccion_año(".boton_filtrado_seccion" , ".boton_filtrado_año");
