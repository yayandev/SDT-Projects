 function modeMalam() {
    let modeMalam = document.getElementById("modeMalam");
    let modeSiang = document.getElementById("modeSiang");
    let induk = document.getElementById("induk");
    modeSiang.setAttribute("style", "");
    modeMalam.setAttribute("style", "display: none");
    induk.setAttribute("style", "background-color: black;color:white;");
 }
 function modeSiang() {
    let modeMalam = document.getElementById("modeMalam");
    let modeSiang = document.getElementById("modeSiang");
    let induk = document.getElementById("induk");
    modeSiang.setAttribute("style", "display: none");
    modeMalam.setAttribute("style", "");
    induk.setAttribute("style", "background-color: white;");
 }