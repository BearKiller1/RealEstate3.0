$(document).ready(() => {
    var search = window.localStorage.getItem("search");
    if(search != ''){
        GetProduct(JSON.parse(search));
    }
    else{
        GetProduct();
    }
})

GetProduct = (search = '' ) => {
    Loader(true);
    var sort;

    if($("#sort").val() == "oldest")
        sort = "ORDER BY id ASC";
    else if($("#sort").val() == "latest")
        sort = "ORDER BY id DESC";
    else if($("#sort").val() == "cheapest")
        sort = "ORDER BY price ASC";
    else if($("#sort").val() == "most expensive")
        sort = "ORDER BY price DESC";
    else
        sort = "ORDER BY id";
    var data = [];
    
    if(search != ''){
        data = search;
    }
    else{
        data = {
            title   : $("#searchbox123").val(),
            sorting : $("#sorting").val(),
            price   : $("#price").val(),
            area    : $("#area").val(),
    
            min_price   :   $("#ipmin").val(),
            max_price   :   $("#ipmax").val(),
    
            min_area    :   $("#iAmin").val(),
            max_area    :   $("#iAmax").val(),
    
            sorting     :   sort,
        }
    }
    Ajax({
        url:"search",
        object:{
            method:"GetProduct",
            data
        },
        type:"POST",
        success: (response) => {
            response = JSON.parse(response);
            
            if(response.page != ""){
                $("#prod_container").html(response.page)
            }
            else{
                $("#prod_container").html("<h1>No results found</h1>");
            }
            localStorage['search'] = '';
            
            Loader(false);
        }
    })
}