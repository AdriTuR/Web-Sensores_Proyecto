function disconnect(){
    fetch("./api/v1/session", {
        method: "DELETE"
    }).then(function (result) {
        if(result.ok) location.href = "./login.php";
    }); 
}