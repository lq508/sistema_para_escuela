


class Consulta_inicial{


  constructor(elemento){

    this.elemento = document.querySelector(elemento);
    this.Eventos();

  }

  Eventos(){

    fetch("http://localhost/rafaelrangel/clases_php/consulta_estudiantes.php").then(function(valor){


    });


  }


}
