window.addEventListener("load", function(){
    fetch("./api/v1/session", {
        method: "GET"
    }).then(function (result) {
        if(result.ok) return result.json();
    }).then(function (data) {
        if(data.role == "USER") location.href = "./user_panel.php"; 
    }).catch(function () {
        location.href = "./login.php";
    })
});