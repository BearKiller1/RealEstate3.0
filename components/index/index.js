$(document).ready(function () {
    GetLastProd();
});

GetLastProd = () => {
    Ajax({
        url     : "index"   ,
        type    : "POST"    , 
        object: {
            method  : "GetLastProducts",
            data    : {}
        },
        success : (response) =>{
            response = JSON.parse(response);
            $("#latestProd").html(response.page);
        }
    })
}