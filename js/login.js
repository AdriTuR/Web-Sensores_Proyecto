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
            if(data.role == "ADMIN"){
                location.href = "/admin_panel.php";
            }else{
                location.href = "/user_panel.php";
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