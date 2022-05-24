$(document).ready( () => {
    var fullPhone;
    var hidePhone;
    var phoneChecker = false;
    GetProductDetails(window.localStorage.getItem("ProductID"));
})

GetProductDetails = (ProductID) => {
    phoneChecker = false;
    Ajax({
        url:'details',
        object:{
            method:"GetProdData",
            data:{
                id: ProductID
            },
        },
        type: "POST",
        success:(response) => {
            response = JSON.parse(response);
            
            $("#facilities").html(response.facilities);
            if(response.bookmark == 1){
                $("#book").attr("class","fas fa-bookmark");
            }
            response = response[0]

            if(response.build_year == null || response.build_year == undefined ){ response.build_year = 0 }

            if(response.images.length > 0){
                BuildImages(response.images)
            }
            if(response.phone != ""){
                phoneChecker = true;
            }
            fullPhone = response.phone;
            if(response.phone.length > 3){
                hidePhone = response.phone.slice(0, -3) + "***";
                response.phone = response.phone.slice(0, -3) + "***";
            }
            $("#num").html(response.phone);
            if(response.title != null){
                $("#ProductTitle").append("  "+response.title);
            }

            if(response.profile_pic == ""){
                if(response.gender == 1)
                    $("#user_profile").attr("src","assets/images/user.png")
                else
                    $("#user_profile").attr("src","assets/images/fuser.png");
            }
            else{
                $("#user_profile").attr("src",response.profile_pic);
            }

            if(response.show_perm == 1){
                $("#username").html(response.username + " " + response.surname);
            }
            else{
                $("#username").html(response.username);
            }
            // $("#ProductTitle").html('Title:' + response.title  );
            $("#prod_address").html(response.address);
            $("#prod_date").html(response.datetime  );
            $("#prod_id").html("ID :"+response.id   );
            $("#prod_size").html(response.size      );
            $("#price1").html(response.price        );
            $("#prod_floor").html(response.floor    );

            if(window.localStorage.getItem("lang") == 1){
                $("#description").html(response.description);
                $("#building_type").html(response.building_type_geo_name);
                $("#building_year").html(response.build_year + " წლის წინ");
                $("#prod_room").html(response.number_of_rooms + " ოთახი");
                $("#prod_bedroom").html(response.bedroom + " საძინებელი"  );
            }
            else if(window.localStorage.getItem("lang") == 2){
                $("#description").html(response.description_en);
                $("#building_type").html(response.building_type_name);
                $("#building_year").html(response.build_year + " year building");
                $("#prod_room").html(response.number_of_rooms + " Rooms");
                $("#prod_bedroom").html(response.bedroom + " Bedrooms"  );
            }

            
            $("#full_adress").html(response.address);
            
            $('#us2').locationpicker({
                location: {latitude: response.x, longitude: response.y},   
                radius: 0,
                enableAutocomplete: true,
                draggable: false,
                markerDraggable: false,
            });
        }
    })
}

showFullMobile = () => {
    if(phoneChecker){
        if($("#num").html().indexOf("***") > 0){
            $("#num").html(fullPhone);
        }
        else{
            $("#num").html(hidePhone);
        }
    };
}

BuildImages = (images) => {
    var string = "active";
    images.forEach(e => {
        const imageArray = `
        <div class="carousel-item `+ string +` " id="`+e.id+`">
            <a href="" role="button" data-toggle="modal" data-target="#c-`+e.id+`">
                <img class="d-block col-12 mb-1 rounded px-0" style="object-fit: cover; height: 350px;" src="`+e.path+`" alt="">
            </a>
            <div class="modal fade" id="c-`+e.id+`">
                <div class="modal-dialog">
                    <div class="modal-body">
                        <img class="img-fluid rounded" src="`+e.path+`" alt="">
                    </div>
                </div>
            </div>
        </div>`;
        const initiator = `<li class="`+ string +`" data-target="#mycarousel1" data-slide-to="0"></li>`;
        $('#image_carousel').append(imageArray);
        $('#initiator').append(initiator);
        string = "";
    });
}

AddBookmark = () => {
    var ProductID = window.localStorage.getItem("ProductID")
    Ajax({
        url:'details',
        object:{
            method:"AddBookmark",
            data:{
                product_id: ProductID
            },
        },
        type: "POST",
        success:(response) => {
            response = JSON.parse(response);
            if(response.status == 1){
                 $("#book").attr("class","fas fa-bookmark");
            }
            else if(response.status == 3){
                alert(response.message);
            }
            else{
                $("#book").attr("class","far fa-bookmark");
            }
        }
    })
}