//ADD EVENT TO LOGIN FORM
document.querySelector("form").addEventListener("submit", function(event){
    event.preventDefault();
    
    let loginData = new FormData(event.target);
    
    fetch("./api/v1/session", {
        method: "POST",
        body: loginData
    }).then(function (result) {
        return result.json();
    }).then(function(data){
        if(data.error == null){
            if(data.role == "ADMIN"){
                location.href = "./admin_panel.php";
            }else{
                location.href = "./user_panel.php";
            }
        }else{
            loginError.innerHTML = data.error;
            loginForm.classList.add("shakeAnimation");
            setTimeout(() => {
                loginForm.classList.remove("shakeAnimation");
            }, 1000);  
        }
    }).catch(function (err) {
         console.log(err)
    })
});

//CHECK IF USER IS LOGGED VIA COOKIES
window.addEventListener("load", function(){
    fetch("./api/v1/session", {
        method: "GET"
    }).then(function (result) {
        if(result.ok) return result.json();
    }).then(function (data) {
        if(data.role == "USER"){
            location.href = "./user_panel.php";
        }else if(data.role == "ADMIN"){
            location.href = "./admin_panel.php";
        }
    }).catch(function () {
    })
});