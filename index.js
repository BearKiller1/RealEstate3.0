var MainPage    = "index";
var MainGroup   = "";

window.onload = () => {
    Router(MainPage, MainGroup);   
}

Router = (Page, Group = '') => {
    Ajax({
        spURL: 'includes/Router.class.php',
        object: {
            method  : "GetPage",
            data    : {
                page    : Page,
                group   : Group
            }
        },
        type: "POST",
        success : (response) =>{
            response = JSON.parse(response);
            
            Permission(response.permission);
            document.title = Page;
            $("#content").html(response.page);
        }
    })
}

Ajax = (Params) =>{

    if(Params.spURL != undefined)
        Params.url = Params.spURL;
    else
        if(Params.group != undefined)
            Params.url = "components/" +Params.group + "/" + Params.url + "/" + Params.url + ".php";
        else
            Params.url = "components/" + Params.url + "/" + Params.url + ".php";

    $.ajax({
        type: Params.type,
        url: Params.url,
        data: Params.object,
        success: Params.success
    })
}

Permission = (toggler) => {
    if(toggler == 1){
        $("#menuaddprod").css('display', 'inline-block');
        $("#menulogin").css("display", "none");
        $("#menudashboard").css('display', 'inline-block');
    }
    else{
        $("#menuaddprod").css('display', 'none');
        $("#menulogin").css("display", "inline-block");
        $("#menudashboard").css('display', 'none');
    }
}

Details = (ProductID) => {
    window.localStorage.setItem("ProductID", ProductID);
    Router('details')
}