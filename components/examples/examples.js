AddData = () => {
    Ajax({
        url: "examples", // miaq mxolod php file saxeli 
        object: {
            method  : "AddData",
            data    : {
                name    : $("#name  ").val(),
                email   : $("#email ").val(),
                phone   : $("#phone ").val(),
                age     : $("#age   ").val(),
            }
        },
        type: "POST",
        success : (response) =>{
            console.log(response);
        }
    });
}

GetData = () => {
    Ajax({
        url: 'examples',
        type: 'POST',
        object: {
            method: 'GetUsers',
            data    : {
                id    : 25,
                name  : 'dachi'
            }
        },
        success: (response) => {
            response = JSON.parse(response);
            console.log(response);
        }
    })
}

RunQuery = () => {
    Ajax({
        url: 'examples',
        type: 'POST',
        object: {
            method: 'SetQuery',
            data    : {
                id  : 25,
            }
        },
        success: (response) => {
            response = JSON.parse(response);
            console.log(response);
        }
    })
}