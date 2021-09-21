
$(function () {

    importDataAjax();
}); //jQuery




function importDataAjax() {
    $.ajax({
        type: "get",
        url: "./readData.php",
        dataType: "json",
        caches: false,
        success: function (data) {

            // Loop along 'data' Array.
            for (let i = 0; i < data.length; i++) {
                $("#foodNavUl").append(
                    `
                    <li><a href="#${data[i].id}">${data[i].name}</a></li>     
                    `
                );

                // Create a main section for each 'data' index.
                $("#menuDiv").append(
                    `
                    <section id="${data[i].id}">
                        <h1>${data[i].name}</h1>
                    </section>            
                    `
                );
            }
            
            var quantitySum = 0;

            // Set the value of quantitySum = the sum of each data.info.quantity 
            for (const i in data) {
                for (const j in data[i].info) {
                    quantitySum += data[i].info[j].quantity;
                    
                    
                }
            }

            // Loop along 'info' array inside 'data' array.
            for (let i = 0; i < data.length; i++) {
                for (let k = 0; k < data[i].info.length; k++) {

                    // Re Declare variable each loop
                    let data_info_id = data[i].info[k].id;
                    let data_info_title = data[i].info[k].title;
                    let data_info_para = data[i].info[k].para;
                    let data_info_price = data[i].info[k].price;

                    // Append to quantity object new property called (the id of each food-type), then store 0 inside it
                    // quantity[data[i].info[k].id] = { id:data_info_id, q: 0 }

                    // Create a food-type div for each 'info' index inside 'data' index, then append it to its own main section.
                    $(`#${data[i].id}`).append(
                        `
                        <div id=${data_info_id} class="food-type">
                                <div class="description">
                                    <h4>${data_info_title}</h4>
                                    <p>${data_info_para}</p>
                                    <h3>${data_info_price} JD</h3>
                                    <hr>
                                        <h4>Quantity:</h4>
                                        <button type="button" id="dec${data_info_id}">-</button>
                                        <span id="q${data_info_id}">0</span>
                                        <button type="button" id="inc${data_info_id}">+</button><br>
                                </div>
                                
                                <img src="${data[i].info[k].path}" alt="${data_info_title}"> 
                        </div>
                        
                        `
                    );

                    


                    // If the [-] button pressed:
                    $(`#dec${data_info_id}`).click(function () {

                        // Quit the function if the propirty quantity value = 0
                        if (data[i].info[k].quantity == 0) {
                            return false;
                        }

                        // let quantity propirty - 1
                        data[i].info[k].quantity -= 1
                        // let sumPrice propirty = quantity*price then fix(2) the float number
                        data[i].info[k].sumPrice = (data[i].info[k].quantity * data[i].info[k].price).toFixed(1);

                        quantitySum -= 1;

                        // overwrite innerHTML inide <span>
                        $(`#q${data_info_id}`).html(`${data[i].info[k].quantity}`);
                        $(`#sum`).html(`${quantitySum}`);
                    });



                    // If the [+] button pressed:
                    $(`#inc${data_info_id}`).click(function () {
                        
                        // let quantity propirty + 1
                        data[i].info[k].quantity += 1
                        // let sumPrice propirty = quantity*price then fix(2) the float number
                        data[i].info[k].sumPrice = (data[i].info[k].quantity * data[i].info[k].price).toFixed(1);

                        quantitySum += 1;

                        // overwrite innerHTML inide <span>
                        $(`#q${data_info_id}`).html(`${data[i].info[k].quantity}`);
                        $(`#sum`).html(`${quantitySum}`);
                        });



                    


                } // for (k)
            } // for (i)

            $('#checkoutBtn').click(function() {
                $('#checkoutMenu').show(200);
                
                $('#checkoutMenu > p').html('');

                for (const i in data) {
                    for (const j in data[i].info) {
                        if (data[i].info[j].quantity != 0) { 

                            $('#checkoutMenu > p').append(`<strong>${data[i].info[j].title}</strong><br>Quantity: ${data[i].info[j].quantity}<br>Price: ${data[i].info[j].sumPrice}</p>`);
                        }
                        
                        
                        
                    }
                }

                console.log(data);

                $('#closeBtn').click(function() {
                    $('#checkoutMenu').hide(200);
                })
            })
            

        }, //success
    }); //ajax
} //importDataAjax()
