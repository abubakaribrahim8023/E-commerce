const login = document.querySelector("#closeLoginModal");
const loginform = document.querySelector("#modalLogin");
const loginmodal = document.querySelector("#loginmodal");


loginmodal.onclick = ()=>{
    loginform.style.display = "block";
}

login.onclick = ()=>{
    loginform.style.display = "none";
}


