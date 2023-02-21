/*
document.addEventListener("DOMContentLoaded", function(event) {
    var fotos = document.querySelectorAll(".fotoSmall");
    for (let fotounica of fotos){
        fotounica.addEventListener('click',sombrear,false)
    }
});


function sombrear(e){
    var fotos = document.querySelectorAll(".fotoSmall");
    for (let fotounica of fotos){
        fotounica.classList.add("limpiar")
        fotounica+=1;
    }
    e.target.classList.remove("limpiar")
    e.target.classList.add("sombreado")
}

