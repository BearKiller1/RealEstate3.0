Login = () => {
    Ajax({
        url     : "login",
        group   : "auth" ,
        type    : "POST",
        object  : {
            method  : "Login",
            data    : {
                email   : $("#Email").val(),
                password: $("#Password").val(),
            }
        },
        success : (response) => {
            response = JSON.parse(response);
            
            if(response.status == 1){
                window.localStorage.setItem("user_id", response[0].id);
                Router('index');
            }
            else{
                alert("Authentication failed");
            }
        }
    })
}