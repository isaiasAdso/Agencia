function mostrarObjeto() {
    var anchoVentana = window.innerWidth;
    if (anchoVentana <= 720) {
  
      var objetos = document.getElementsByClassName('perfilAdmin');
      var boton = document.querySelector('.boton-circular');
      var imagen = boton.querySelector('img');
  
      for (var i = 0; i < objetos.length; i++) {
        if (objetos[i].style.display === 'none' || objetos[i].style.display === '') {
          objetos[i].style.display = 'flex';
          imagen.src = 'assets/asset/cerrar.svg';
        } else {
          objetos[i].style.display = 'none';
          imagen.src = 'assets/asset/menu-svgrepo-com.svg';
        }
      }
  
    //   window.addEventListener('resize', function() {
    //     var anchoVentana = window.innerWidth;
    //     if (anchoVentana > 720) {
    //       for (var i = 0; i < objetos.length; i++) {
    //         objetos[i].style.display = 'flex';
    //       }
    //     }
    //   });
    }
  }
  