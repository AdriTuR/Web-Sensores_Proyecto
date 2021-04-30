document.querySelector("form").addEventListener("submit", function(event){
    event.preventDefault();

    let loginData = new FormData(event.target);

    fetch("./api/v1/", {
        method: "POST",
        body: loginData
    }).then(function (result) {
        return result.json();
        
    }).then(function(data){
        if(data.end == "ok"){
            console.log(data.role);
            if(data.role == "ADMIN"){
                location.href = "/admin_panel.html";
            }else{
                location.href = "/user_panel.html";
            }
        }else{
            loginError.innerHTML = data.error;
            loginForm.classList.add("shakeAnimation");
            setTimeout(() => {
                loginForm.classList.remove("shakeAnimation");
            }, 1000);    
        }
    });
});