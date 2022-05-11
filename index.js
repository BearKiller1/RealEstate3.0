var MainPage    = "index";
var MainGroup   = "";
/**
 * @TODO ar mushaobs es normalurad grupebze da ushvele
 */
window.onload = () => {
    if(window.localStorage.getItem("last_page") != undefined && window.localStorage.getItem("last_page") != ""){
        if(window.localStorage.getItem("last_group") != undefined && window.localStorage.getItem("last_group") != ""){
            MainGroup = window.localStorage.getItem("last_group");
        }
        else{
            MainGroup = "";
        }
        MainPage = window.localStorage.getItem("last_page");
        Router(MainPage, MainGroup);
    }
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

            window.localStorage.setItem("last_page", Page);
            if(Group != ''){
                window.localStorage.setItem("last_group", Group);
            }

            if(window.localStorage.getItem("lang") == 1){
                $("#LangKa").click();
            }
            else if(window.localStorage.getItem("lang") == 2){
                $("#LangEn").click();
            }

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

Loader = (Toggler) => {
    if(Toggler){
        $("#loader").css("display", "block");
        $("#blackhole").css("display", "block");
    }
    else{
        $("#loader").css("display", "none");
        $("#blackhole").css("display", "none");
    }
}

searchHome = (type = '', city = '', district = '', child_district = '', condition = '', building_type = '') => {
    var obj = {
        transaction     : type ,
        city            : city,
        district        : district ,
        child_district  : child_district,
        condition       : condition,
        building_type   : building_type,
    }
    window.localStorage.setItem("search", JSON.stringify(obj));
    Router('search');
}