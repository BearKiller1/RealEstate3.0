$(document).ready(function () {
    District();
    TransactionType();
    BuildingType();
    BuildingStatus();

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

SearchDetails = () => {
    var obj = {
        title : $("#searchbox").val(),
        transaction : $("option[value='"+$("#transactionT").val()+"']").attr('data_id') ,
        building_type : $("option[value='"+$("#Btype").val()+"']").attr('data_id')      ,
        building_status : $("option[value='"+$("#statusI").val()+"']").attr('data_id')  ,
        district : $("option[value='"+$("#district").val()+"']").attr('data_id')        ,
        child_district : $("option[value='"+$("#NH").val()+"']").attr('data_id')        ,
    }
    window.localStorage.setItem("search", JSON.stringify(obj));
    Router('search');
}


searchHome = (type) => {
    var obj = {
        transaction : type ,
    }
    window.localStorage.setItem("search", JSON.stringify(obj));
    Router('search');
}
TransactionType = () => {
    Call("TransactionType", "transaction");
}

BuildingType = () => {
    Call("BuildingType", "btype");
}

BuildingStatus = () => {
    Call("BuildingStatus", "status");
}

District = () => {
    Call("District", "districts");
}

ChildDistrict = () => {
    var id = $("option[value='"+$("#district").val()+"']").attr('data_id')
    var datalist = $("#district").val();
    Call("ChildDistrict", datalist, { id : id});
}

Call = (method, datalist, data = {}) => {
    Ajax({
        spURL : "components/Common.class.php",
        object:{
            method  : method,
            data    : data
        },
        type:"POST",
        success:(response) => {
            response = JSON.parse(response);

            $("#"+datalist).html(response.page);
        }
    })
}