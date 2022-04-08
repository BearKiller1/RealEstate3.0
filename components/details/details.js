$(document).ready( () => {
    var fullPhone;
    var hidePhone;
    GetProductDetails(window.localStorage.getItem("ProductID"));
})

GetProductDetails = (ProductID) => {
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

            if(response.images.length > 0){
                BuildImages(response.images)
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
            // $("#ProductTitle").html('Title:' + response.title  );
            $("#prod_address").html(response.address);
            $("#prod_date").html(response.datetime  );
            $("#prod_id").html("ID :"+response.id   );
            $("#prod_size").html(response.size      );
            $("#price1").html(response.price        );
            $("#prod_floor").html(response.floor    );
            $("#building_type").html(response.building_type_name    );
            $("#prod_room").html(response.number_of_rooms + " Rooms");
            $("#prod_bedroom").html(response.bedroom + " Bedrooms"  );
            $("#description").html(response.description_en          );

        }
    })
}

showFullMobile = () => {
    if($("#num").html().indexOf("***") > 0){
        $("#num").html(fullPhone);
    }
    else{
        $("#num").html(hidePhone);
    }
}

BuildImages = (images) => {
    var string = "active";
    images.forEach(e => {
        const imageArray = `
        <div class="carousel-item `+ string +` " id="`+e.id+`">
            <a href="" role="button" data-toggle="modal" data-target="#c-1">
                <img class="d-block col-12 mb-1 rounded px-0" style="object-fit: cover; height: 350px;" src="`+e.path+`" alt="">
            </a>
            <div class="modal fade" id="c-1">
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