function disconnect(){
    fetch("./api/v1/", {
        method: "DELETE"
    }).then(function (result) {
        if(result.status == 200){
            location.href = "./login.php";
        }
    }); 
}