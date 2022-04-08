Register = () => {
    var username =  $("#Username").val();
    var password =  $("#Password").val();
    var email    =  $("#Email").val();
    var phone    =  $("#phone").val();
    if(password == "" || email == ""){
        alert("Pleas Fill all fields");
    }
    else{
        Ajax({
            url     : "register",
            group   : "auth" ,
            object  : {
                method  : "Register",
                data    : {
                    username:   username,
                    password:   password,
                    email:      email,
                    phone:      phone,
                }
            },
            type:"POST",
            success: (response) => {
                response = JSON.parse(response);
                if(response.status == 1){
                    window.localStorage.setItem("user_id", response.id);
                    Router('dashboard');
                }
                else
                    alert(response.data)
            }
        })
    }


}