$(document).ready(function() {
    GetUserInfo();
    var user_pwd;
    for (let i = 1; i < 6; i++) {
        document.getElementById("nav"+i).addEventListener("click",(e)=>{
            try{document.querySelector('.selected').className='nav-link text-dark my-2 ';}catch{} 
            document.getElementById('nav'+i).className += 'selected';
            /////////////////////////////////////////////////////////
            document.getElementById('sec-mya').className = "col-lg-9 col-md-8 ml-auto mt-5 d-none";
            document.getElementById('sec-ad').className = "col-lg-9 col-md-8 ml-auto mt-5 d-none";
            document.getElementById('sec-edit').className = "col-lg-9 col-md-8 ml-auto mt-5 d-none";
            document.getElementById('sec-mb').className = "col-lg-9 col-md-8 ml-auto mt-5 d-none";
            switch (document.querySelector('#nav'+i+' span').innerText) {
                case "My announcements":
                    document.getElementById('sec-mya').className = "col-lg-9 col-md-8 ml-auto mt-5 ";
                    break;
                case "ჩემი განცხადებები":
                    document.getElementById('sec-mya').className = "col-lg-9 col-md-8 ml-auto mt-5 ";
                    break;
        
                case "Advertisement":
                    document.getElementById('sec-ad').className = "col-lg-9 col-md-8 ml-auto mt-5 ";
                    break;
                case "რეკლამა":
                    document.getElementById('sec-ad').className = "col-lg-9 col-md-8 ml-auto mt-5 ";
                    break;
        
                case "Edit account":
                    document.getElementById('sec-edit').className = "col-lg-9 col-md-8 ml-auto mt-5 ";
                    break;
                case "ანგარიშის რედაქტირება":
                    document.getElementById('sec-edit').className = "col-lg-9 col-md-8 ml-auto mt-5 ";
                    break;
                case "My bookmarks":
                    document.getElementById('sec-mb').className = "col-lg-9 col-md-8 ml-auto mt-5 ";
                    break;
                case "ჩემი სანიშნეები":
                    document.getElementById('sec-mb').className = "col-lg-9 col-md-8 ml-auto mt-5 ";
                    break;
                default:
                    console.log(document.getElementById('nav'+i).innerText);
                    break;
            }
        })
    }

    $('#profile_pic').change(function(){
        var form_data = new FormData();
        // Read selected files
        var totalfiles = document.getElementById('profile_pic').files.length;

        for (var index = 0; index < totalfiles; index++) {
            form_data.append("files[]", document.getElementById('profile_pic').files[index]);
        }
        // AJAX request
        $.ajax({
            url: 'includes/upload.php?profile=true', 
            type: 'post',
            data: form_data,
            dataType: 'json',
            contentType: false,
            processData: false,
            success: function (response) {
                $.ajax({
                    url: "components/dashboard/dashboard.php",
                    data: {
                        method: "EditPhoto",
                        image: response
                    },
                    success: function (data) {
                        $("#profile").attr("src",response);
                    }
                });
            }
        });
    });

});

GetUserInfo = () => {
    Ajax({
        url:"dashboard",
        object: {
            method: "GetUserInfo",
            data: {}
        },
        type:"POST",
        success: function (response) {
            response = JSON.parse(response);
            response = response[0];

            PutUserInfo(response);
        }
    });
}

GetMyProd = () => {
    Ajax({
        url: "dashboard",
        object: {
            method:"GetMyProduct",
            data: {},
        },
        type:"POST",
        success: (response) => {
            response = JSON.parse(response);
            $(".my_prod_container").html(response.page);
            $("#curentCount").html(response.count);
        }
    });
}

GetMyBookmarks = () => {
    Ajax({
        url: "dashboard",
        object: {
            method:"GetMyBookmarks",
            data: {},
        },
        type:"POST",
        success: (response) => {
            response = JSON.parse(response);
            $(".my_bookmarks_container").html(response.page);
            $("#curentCountBookmark").html(response.count);
        }
    });
}

Signout = () => {
    Ajax({
        url:"dashboard",
        object: {
            method: "logout",
            data: {}
        },
        success: function (response) {
            localStorage.removeItem('user_id');
            Router('login','auth');
        }
    })
}

EditUserInfo = () => {
    var email       = $("#username-email").val();
    var username    = $("#name").val();
    var phone       = $("#phone").val();
    var last_name   = $("#lname").val();

    var show_perm;
    var gender;

    $("#showname").is(':checked')   ?  show_perm = 1    : show_perm = 0;
    $("#male").is(':checked')       ?  gender = 1    : gender = 0;
    
    Ajax({
        url:'dashboard',
        object:{
            method:"EditUserInfo",
            data:{
                email       : email,
                username    : username,
                phone       : phone,
                show_perm   : show_perm,
                gender      : gender,
                last_name   : last_name,
            }
        },
        type:"POST",
        success: (response) => {
            Router("dashboard");
        }
    })


    // $.ajax({
    //     url: "components/dashboard/dashboard.php",
    //     data: {
    //         method: "EditUserInfo",
    //         email: email,
    //         username: username,
    //         phone: phone,
    //         show_perm: show_perm,
    //         gender: gender,
    //         last_name:last_name,
    //     },
    //     success: function (response) {
    //         Router("dashboard");
    //     }
    // });
}

ChangePWD = () => {
    var pwd = $("#opassword").val();
    var new_pwd = $("#npassword").val();
    var new_pwd_conf = $("#cpassword").val();

    if(md5(pwd) == user_pwd){
        if(new_pwd != new_pwd_conf){
            $("#new_pwd_conf").css("border-color","red");
            $("#new_pwd").css("border-color","red");
            alert("Passwords do not match");
        }
        else{
            Ajax({
                url:"dashboard",
                object: {
                    method: "EditPassword",
                    data: {
                        password: md5(new_pwd)
                    }
                },
                type:"POST",
                success: function (response) {
                    alert("Password changed");
                }
            });
        }
    }
    else{
        alert("Wrong password");
    }
}

PutUserInfo = (response) => {
    $("#username").html(response.username);
    $("#phone").val(response.phone);

    if(response.profile_pic == ""){
        if(response.gender == 1)
            $("#profile").attr("src","assets/images/user.png")
        else
            $("#profile").attr("src","assets/images/fuser.png");
    }
    else{
        $("#profile").attr("src",response.profile_pic);
    }

    $("#username-email").val(response.email);
    $("#name").val(response.username);
    $("#lname").val(response.surname);
    user_pwd = response.password;

    if(response.show_perm == 1){
        $("#showname").prop('checked', true);
    }else{
        $("#showname2").prop('checked', true);
    }

    if(response.gender == 1){
        $("#male").prop("checked", true);
    }else{
        $("#female").prop("checked",true);
    }
}