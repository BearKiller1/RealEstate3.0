$(document).ready(() => {
    District();
    TransactionType();
    BuildingType();
    BuildingStatus();
})

UploadFiles = () => {
    var form_data = new FormData();
    // Read selected files
    var totalfiles = document.getElementById('files').files.length;
    for (var index = 0; index < totalfiles; index++) {
        form_data.append("files[]", document.getElementById('files').files[index]);
    }
    // AJAX request
    $.ajax({
        url: 'includes/upload.php', 
        type: 'post',
        data: form_data,
        dataType: 'json',
        contentType: false,
        processData: false,
        success: function (response) {

            for(var index = 0; index < response.length; index++) {
                var src = response[index];

                var box =   document.createElement("div");
                var img =   document.createElement("img");

                var close = document.createElement("div");

                close.appendChild(document.createTextNode("X"));
                close.className = "close";
                box.className = "image_container";
                img.src = src;
                img.className = "image";
                box.appendChild(close);
                box.appendChild(img);
                $('#preview').append(box);
            }

            $(".close").click(function(){
                var image = this.parentNode.children[1].getAttribute('src');

                Ajax({
                    url:'upload',
                    object:{
                        method:'DeleteFile',
                        data : {
                            src: image
                        },
                    },
                    type:"POST",
                    success:(response) => {
                        response = JSON.parse(response)
                        console.log(response);
                    }
                })

                this.parentNode.remove();
            });
        }
    });
};

UploadProduct = () => {
    var Bathrooms = 0;
    var shared = 0
    if( $("#Bathrooms1").is(":checked") ){
        Bathrooms = 1;
    }
    else if( $("#Bathrooms2").is(":checked") ){
        Bathrooms = 2;
    }
    else if( $("#Bathrooms3").is(":checked") ){
        Bathrooms = 3;
    }
    else if( $("#Bathrooms4").is(":checked") ){
        shared = 1
    }

    if($("#price_id").val == 'Price per 1 m²'){
        var price_id = 1
    }
    else{
        var price_id = 0
    }

    if($("#price_value").val == 'GEL'){
        var price_val = 1
    }
    else{
        var price_val = 0
    }

    var images = $(".image");
    var image_obj = new Array();

    if(images.length > 0)
        for (let i = 0; i < images.length; i++) 
            image_obj.push(images[i].getAttribute('src'));
    else
        image_obj.push('assets/images/nophoto.webp')

    Ajax({
        url:"upload",
        object:{
            method:"UploadProduct",
            data:{
                title              : $("#TEST").val(),
                price              : $("#Price").val(),
                price_id           : price_id,
                price_value        : price_val,
                transaction_type   : $("option[value='"+$("#transactionT").val()+"']").attr('data_id')  ,
                building_type      : $("option[value='"+$("#Btype").val()+"']").attr('data_id')         ,
                building_status    : $("option[value='"+$("#statusI").val()+"']").attr('data_id')       ,
                district_id        : $("option[value='"+$("#district").val()+"']").attr('data_id')      ,
                sub_district_id    : $("option[value='"+$("#NH").val()+"']").attr('data_id')            ,
                designs             : $("option[value='"+$("#Design").val()+"']").attr('data_id')        ,
                cadastral          : $("#Cadastral").val(),
                address            : $("#F-address").val(),
                floor              : $("#floor").val(),
                number_of_storeys  : $("#storeys").val(),
                number_of_rooms    : $("#rooms").val(),
                bedroom            : $("#bedroom").val(),
                size               : $("#Area").val(),
                description        : $("#desctiption_ka").val(),
                description_en     : $("#desctiption").val(),
                bathroom           : Bathrooms,
                shared             : shared,
                balcony            : $("#balcony").is   (":checked")  ? 1 : 0,
                loggia             : $("#loggia").is    (":checked")  ? 1 : 0,
                veranda            : $("#veranda").is   (":checked")  ? 1 : 0,
                gas                : $("#Gas").is       (":checked")  ? 1 : 0,
                telephone          : $("#Telephone").is (":checked")  ? 1 : 0,
                internet           : $("#Internet").is  (":checked")  ? 1 : 0,
                television         : $("#Television").is(":checked")  ? 1 : 0,
                hot_water          : $("#Hot-water").is (":checked")  ? 1 : 0,
                heating            : $("#Heating").is   (":checked")  ? 1 : 0,
                parking            : $("#Parking").is   (":checked")  ? 1 : 0,
                storeroom          : $("#Storeroom").is (":checked")  ? 1 : 0,
                service_elevator   : $("#SElevator").is (":checked")  ? 1 : 0,
                passenger_elevator : $("#PElevator").is (":checked")  ? 1 : 0,
                fireplace          : $("#Fireplace").is (":checked")  ? 1 : 0,
                furniture          : $("#Furniture").is (":checked")  ? 1 : 0,
                air_conditioner    : $("#Air-conditioner").is(":checked")  ? 1 : 0,
                ceiling_height     : $("#Cheight").val(),
                condition_id       : $("option[value='"+$("#Condition").val()+"']").attr('data_id'),
                exchange           : $("#exchangeY").is (":checked")  ? 1 : 0,
            },
            image:{
                path:image_obj
            }
        },
        type:"POST",
        success:(response) => {
            response = JSON.parse(response);
            if(response.success == 1){
                Router("index");
            }
            else{
                alert("Error Uploading Product");
            }
        }

    })
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
    console.log(id, datalist);
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