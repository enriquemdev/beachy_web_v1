// Create our number formatter.
var formatter = new Intl.NumberFormat('en-US', {
    style: 'currency',
    currency: 'USD',
  
    // These options are needed to round to whole numbers if that's what you want.
    //minimumFractionDigits: 0, // (this suffices for whole numbers, but will print 2500.10 as $2,500.1)
    //maximumFractionDigits: 0, // (causes 2500.99 to be printed as $2,501)
  });

  

  function formatMoney()
  {
    let dinero = document.querySelectorAll(".dinero");

    for(var numero of dinero){
      numero.textContent = formatter.format(numero.textContent);//Le asignamos el formato de us dollars a cada elemento con la clase dinero
    }
  }
  
  formatMoney();

  // var paginador = document.querySelector(".dataTable-pagination");
  // //console.log(paginador);
  // paginador.onmouseout = formatMoney;