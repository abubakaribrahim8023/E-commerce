const sideBar = document.getElementById("sideBar"),
openMenu = document.getElementById("openMenu");

openMenu.onclick = ()=>{
    if(sideBar.style.display == "none"){
        sideBar.style.display = "block";
        openMenu.classList.add("active");
    }
    else{
        sideBar.style.display = "none";
        openMenu.classList.remove("active");
    }
}


function search() {
    let input = document.getElementById('searchBar').value
    input=input.toLowerCase();
    let x = document.getElementsByClassName('searchtab');
    
    for (i = 0; i < x.length; i++) {
        if (!x[i].innerHTML.toLowerCase().includes(input)) {
            x[i].style.display="none";
        }
        else {
            x[i].style.display="";				
        }
    }
}

