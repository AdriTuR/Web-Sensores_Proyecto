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
<<<<<<< HEAD
                location.href = "./admin_panel.php";
            }else{
                location.href = "./user_panel.php";
=======
                location.href = "/admin_panel.html";
            }else{
                location.href = "/user_panel.html";
>>>>>>> parent of e20f697 (Merge branch 'development' of https://github.com/kb079/9studios-web into development)
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