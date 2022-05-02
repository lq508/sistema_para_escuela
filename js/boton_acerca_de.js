



class Boton_acerca_de{

  constructor(boton){



    this.boton = document.querySelector(boton);
    this.Eventos();

  }


  Eventos(){

    this.boton.addEventListener("click" , function(){

      let ul = document.querySelector(".ul_panel");

      if(ul.classList.contains("active")){

        ul.classList.remove("active");
        ul.setAttribute("style" , "display:none;");


      } else {

        ul.classList.add("active");
        ul.setAttribute("style" , "display:grid;");



      }


    });




  }


}


let acerca_de = new Boton_acerca_de(".acerca_de");
