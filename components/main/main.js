GetGroups = () => {
    // if( $("#generator").val() == 2)
    //     $("#group").attr('hidden',false)
    // else
    //     $("#group").attr('hidden',true)
}


$(document).on("click","#create",function () {
    var pageName = $("#component").val();
    var group = $("#group").val();
    
    if(pageName != "" && pageName != null){
        $.ajax({
            url: "components/main/main.php",
            data: {
                method  : "CreateComponent",
                name    : pageName,
                group   : group
            },
            success: function (response) {
                response = JSON.parse(response);
                alert(response);
                if(response == "Component Created"){
                    $(".generator").css("margin-left","25%");
                    $(".todo").show();
                }
            }
        });
    }
    else{
        alert("Type Component Name");
    }

});

// $(document).on("click","#delete",function(){
//     $.ajax({
//         url: "components/main/main.php",
//         data: {
//             method  :"DeleteGenerator",
//         },
//         success: function (response) {
//             alert("Component Created");
//             $(".generator").css("margin-left","25%");
//             $(".todo").show();
//         }
//     });
// })