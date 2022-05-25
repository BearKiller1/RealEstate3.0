var prod_id = window.localStorage.getItem('edit_prod_id');
$(document).ready(function () {
    var lang_id = window.localStorage.getItem('lang_id');

    if(lang_id == 1){
        $('#lanswitch1').show();
        $('#englang1').hide();

        $('#lanswitch2').show();
        $('#englang2').hide();

        $('#lanswitch2').show();
        $('#englang2').hide();
    }else{
        $('#lanswitch1').hide();
        $('#englang2').show();

        $('#lanswitch2').hide();
        $('#englang2').show();
        
        $('#lanswitch2').hide();
        $('#englang2').show();
    }

    if(prod_id == undefined || prod_id == null){
        Router('dashboard');
    }
    else{
        GetProductInfo(prod_id);
        
        District();
        TransactionType();
        BuildingType();
        BuildingStatus();
        City();
    }
});

GetProductInfo = () => {
    Ajax({
        url: "edit",
        object:{
            method:"GetProductInfo",
            data :{
                id: prod_id
            }
        },
        success: (response) => {
            response = JSON.parse(response);
            FillProductData(response.data);
            GetProductFiles(response.images);
            
            $("#x").val(response.data.x);
            $("#y").val(response.data.y);

            $('#us2').locationpicker({
                location: {latitude: response.data.x, longitude: response.data.y},   
                radius: 0,
                enableAutocomplete: true,
                onchanged: function(currentLocation, radius, isMarkerDropped) {
                    $("#x").val(currentLocation.latitude);
                    $("#y").val(currentLocation.longitude);
                }
            });
        }
    })
}


FillProductData = (data) => {
    $("#year").val(data.building_year);

    if(window.localStorage.getItem('lang') == 2){
        $("#city").val(data.city_name);
        $("#district").val(data.district_name);
        $("#NH").val(data.child_district);
        $("#transactionT").val(data.transaction_type_name);
        $("#Btype").val(data.building_type_name);
        $("#statusI").val(data.building_status_name);
        $("#Condition").val(data.condition_name);

        $("#Design").val(data.designs_name);
    }
    else{
        $("#city").val(data.city_geo_name);
        $("#district").val(data.district_geo_name);
        $("#NH").val(data.child_district_geo_name);
        $("#transactionT").val(data.transaction_type_geo_name);
        $("#Btype").val(data.building_type_geo_name);
        $("#statusI").val(data.building_status_geo_name);
        $("#Condition").val(data.condition_geo_name);
        $("#Design").val(data.designs_geo_name);
    }

    $("#NH_id").val(data.child_district_id);
    $("#district_id").val(data.district_id);
    $("#city_id").val(data.city_id);
    $("#transactionTl_id").val(data.transaction_type_id);
    $("#Btypel_id").val(data.building_type_id);
    $("#statusI_id").val(data.building_status_id);
    $("#Conditions_id").val(data.condition_id);
    $("#Designs_id").val(data.designs_id);



    $("#Cadastral").val(data.cadastral);
    $("#F-address").val(data.address);
    $("#floor").val(data.floor);
    $("#storeys").val(data.number_of_storeys);
    $("#rooms").val(data.number_of_rooms);
    $("#bedroom").val(data.bedroom);

    if(data.bathroom == 1){
        $("#Bathrooms1").prop('checked', true)
    }
    else if(data.bathroom == 2){
        $("#Bathrooms2").prop('checked', true)
    }
    else if(data.bathroom == 3){
        $("#Bathrooms3").prop('checked', true)
    }
    else if(data.shared == 1){
        $("#Bathrooms4").prop('checked', true)
    }
    
    data.balcony    == 1 ? $("#balcony").prop('checked', true)      : $("#balcony2").prop('checked', true)
    data.loggia     == 1 ? $("#loggia").prop('checked', true)       : console.log(12);
    data.veranda    == 1 ? $("#veranda").prop('checked', true)      : console.log(12);
    data.gas        == 1 ? $("#Gas").prop('checked', true)          : console.log(data.gas);
    data.telephone  == 1 ? $("#Telephone").prop('checked', true)    : console.log(12);
    data.internet   == 1 ? $("#Internet").prop('checked', true)     : console.log(12);
    data.television == 1 ? $("#Television").prop('checked', true)   : console.log(12);
    data.hot_water  == 1 ? $("#Hot-water").prop('checked', true)    : console.log(12);
    data.heating    == 1 ? $("#Heating").prop('checked', true)      : console.log(12);
    data.parking    == 1 ? $("#Parking").prop('checked', true)      : console.log(12);
    data.storeroom  == 1 ? $("#Storeroom").prop('checked', true)    : console.log(12);
    data.service_elevator   == 1 ? $("#SElevator").prop('checked', true)    : console.log(12);
    data.passenger_elevator == 1 ? $("#PElevator").prop('checked', true)    : console.log(12);
    data.fireplace  == 1 ? $("#Fireplace").prop('checked', true)    : console.log(12);
    data.furniture  == 1 ? $("#Furniture").prop('checked', true)    : console.log(12);
    data.air_conditioner    == 1 ? $("#Air-conditioner").prop('checked', true)  : console.log(12);

    $("#Cheight").val(data.ceiling_height);
    $("#Pnumber").val(data.mobile_phone);
    $("#Area").val(data.size);
    $("#Price").val(data.price);
    $("#desctiption_ka").val(data.description)
    $("#desctiption").val(data.description_en)

    if(data.price_id == 1){
        $("#t_price").prop("selected", true)
    }
    else{
        $("#m_price").prop("selected", true)
    }

    if(data.price_value == 1){
        $("#GEL").prop("selected", true)
    }
    else{
        $("#usd").prop("selected", true)
    }

    if(data.exchange == 1){
        $("#exchangeY").prop("checked", true)
    }
    else{
        $("#exchangeN").prop("checked", true)
    }
}

GetProductFiles = (images) =>{
    for(var index = 0; index < images.length; index++) {
        var src = images[index]['path'];

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
            }
        })
    
        this.parentNode.remove();
    });
}

UploadFiles = () => {
    var form_data = new FormData();
    // Read selected files
    var totalfiles = document.getElementById('files').files.length;
    if(totalfiles > 12){
        alert("You can upload maximum 12 files");
    }
    else{
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
                if(response.message != '' && response.message != undefined){
                    alert(response.message);
                }
                else{
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
                            }
                        })
                    
                        this.parentNode.remove();
                    });
                }
            }
        });
    }
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
        shared = 1;
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

    var transaction = $("option[value='"+$("#transactionT").val()+"']").attr('data_id');
    var btype       = $("option[value='"+$("#Btype").val()+"']").attr('data_id');
    var status      = $("option[value='"+$("#statusI").val()+"']").attr('data_id');
    var district    = $("option[value='"+$("#district").val()+"']").attr('data_id');
    var child_district = $("option[value='"+$("#NH").val()+"']").attr('data_id');
    var design      = $("option[value='"+$("#Design").val()+"']").attr('data_id');
    var city        = $("option[value='"+$("#city").val()+"']").attr('data_id');
    var contidion   = $("option[value='"+$("#Condition").val()+"']").attr('data_id')

    if(transaction == undefined || transaction == null){
        transaction = $("#transactionTl_id").val();
    }
    if(btype == undefined || btype == null){
        btype = $("#Btypel_id").val();
    }
    if(status == undefined || status == null){
        status = $("#statusI_id").val();
    }
    if(district == undefined || district == null){
        district = $("#district_id").val();
    }
    console.log(child_district + "Ifamde") 
    if(child_district == undefined || child_district == null){
        console.log(child_district + "IFSHI")
        child_district = $("#NH_id").val();
    }
    if(design == undefined || design == null){
        design = $("#Designs_id").val();
    }
    if(city == undefined || city == null){
        city = $("#city_id").val();
    }
    if(contidion == undefined || contidion == null){
        contidion = $("#Conditions_id").val();
    }
    console.log(child_district + "Ajaxamde")
    console.log(child_district)
    Ajax({
        url:"edit",
        object:{
            method:"EditProduct",
            data:{
                id: prod_id,
                title              : $("#TEST").val(),
                price              : $("#Price").val(),
                price_id           : price_id,
                price_value        : price_val,
                transaction_type   : transaction,
                building_type      : btype,
                building_status    : status,
                district_id        : district,
                sub_district_id    : child_district,
                designs            : design,
                city_id            : city,
                building_year      : $("#year").val(),
                cadastral          : $("#Cadastral").val(),
                address            : $("#F-address").val(),
                floor              : $("#floor").val(),
                number_of_storeys  : $("#storeys").val(),
                number_of_rooms    : $("#rooms").val(),
                bedroom            : $("#bedroom").val(),
                size               : $("#Area").val(),
                description        : $("#desctiption_ka").val(),
                description_en     : $("#desctiption").val(),
                mobile_phone       : $("#Pnumber").val(),
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
                condition_id       : contidion,
                exchange           : $("#exchangeY").is (":checked")  ? 1 : 0,
                x                  : $("#x").val(),
                y                  : $("#y").val(),
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

City = () => {
    Call("City", "cities");
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