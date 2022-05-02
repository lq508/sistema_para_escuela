

let elemento_administrador = document.querySelector(".administrador");
elemento_administrador.checked=false;
let elemento_estandar = document.querySelector(".estandar");
elemento_estandar.checked = false;

class Boton_administrador{

  constructor(boton , boton_2){
    this.boton = document.querySelector(boton);
    this.boton_2 = document.querySelector(boton_2);
    this.Eventos();

  }

  Eventos(){
    this.boton.addEventListener("click" , function(){

      let cargo_admin = document.querySelector(".cargo_admin");
      cargo_admin.classList.add("active");


      let especialidad_admin = document.querySelector(".especialidad_admin");
      especialidad_admin.classList.add("active");
      document.querySelector(".cargo_admin_input").required = true;
       document.querySelector(".especialidad_admin_input").required=true;

      });

    this.boton_2.addEventListener("click" , function(){

      let cargo_admin = document.querySelector(".cargo_admin");
      cargo_admin.classList.remove("active");


      let especialidad_admin = document.querySelector(".especialidad_admin");
      especialidad_admin.classList.remove("active");
      document.querySelector(".cargo_admin_input").required = false;
       document.querySelector(".especialidad_admin_input").required=false;


    });


  }


}


let objeto = new Boton_administrador(".administrador" , ".estandar");
