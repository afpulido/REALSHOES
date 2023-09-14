
function datatogle(e){
    nuevo =document.querySelector("[#nuevo]");
    buscar =document.querySelector("[#buscar]");
    actualizar =document.querySelector("[#actualizar]");
    activos =document.querySelector("[#activos]");
    inactivos =document.querySelector("[#inactivos]");
    todos =document.querySelector("[#todos]");

    const urlSearchParams = new URLSearchParams(window.location.search);
    const id = urlSearchParams.get(id);

    const menu = e.target;
    const menuToggle = e.target.value;

    if(id == (
        ('?c=Dashboard&a=roles#todos') || 
        ('?c=Dashboard&a=roles#buscar') || 
        ('?c=Dashboard&a=role#actualizar') || 
        ('?c=Dashboard&a=roles#actiovs') || 
        ('?c=Dashboard&a=roles#inactivos'))){

        menu.classList.remove("active");
        menu.classList.add("active");
    }

    
}