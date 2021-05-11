function disconnect(){
    fetch("./api/v1/", {
        method: "DELETE"
    }).then(function (result) {
        if(result.status == 200){
<<<<<<< HEAD
            location.href = "./login.php";
=======
            location.href = "/login.html";
>>>>>>> parent of e20f697 (Merge branch 'development' of https://github.com/kb079/9studios-web into development)
        }
    }); 
}