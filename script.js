document.onclick = evalua;

function evalua(e){
    let elementoClicked;

    if (e == null)
    {
        elementoClicked = event.srcElement;
    }
    else
    {
        elementoClicked = e.target;
    }

    if (elementoClicked.nodeName == 'INPUT')
    {
     // document.querySelectorAll("."+elementoClicked.id);
     var productos = document.getElementsByClassName("producto");

     var filtros = document.getElementsByTagName('input');
     var flag2 = false;//flag 2 va a verificar que cada producto contenga la clase que sea igual al id del input que se checkea
     //console.log(filtros);
     var arreglo = [];
     var flag3 = false;//esta va a verificar que ningun input checkbox este chequeado, si hay alguno chequeado es true sino false

     for (var filtro of filtros)
     {
        if (filtro.checked)
        {
            arreglo.push(filtro);
            
            flag3 = true;
        }
        else 
        {
            
        }
     }


     for (var i = 0; i<productos.length; i++) 
            {
                if (flag3 == true)
                {
                    flag2 = false;
                    for (var elem of arreglo)
                    {
                        if (productos[i].classList.contains(elem.id))
                        {
                            productos[i].classList.add("mostrar")
                        //productos[i].classList.add("escondido")
                        flag2 = true;
                        }

                    }

                    if (flag2==false)
                    {
                        productos[i].classList.remove("mostrar")
                    }
                }
                else 
                {
                    productos[i].classList.add("mostrar")
                }

                
               
            }
        /*
        else
        {

            for (var i = 0; i<productos.length; i++) {
                
                if (productos[i].classList.contains("escondido"+elementoClicked.id))
                {
                    productos[i].classList.remove("escondido"+elementoClicked.id)
                    //productos[i].classList.remove("escondido")
                }
            }
        }*/

        for (var i = 0; i<productos.length; i++) {
            /*
            productos[i].classList.remove("rojo");
            productos[i].classList.add("verde");*/
            let flag = true;//Este flag verifica que en cada producto revise si contiene la clase mostrar(true) si no (false)
            for (item of productos[i].classList){
                if (item == "mostrar")
                {
                    
                    flag = true;
                }
                else{
                    flag = false;
                }
            }

            if (flag == false)
            {
                productos[i].style.display = 'none';
            }
            else
            {
                productos[i].style.display = 'block';
            }
            /*
            if (productos[i].classList.contains(startsWith("escondido")))
            {
                productos[i].style.display = 'none';
            }
            else {
                productos[i].style.display = 'block';
            }*/


        }

        


     
    }   
}
