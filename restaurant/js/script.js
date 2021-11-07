$(function () {
    $.ajax({
        type: "get",
        url: "../data.json",
        data: "../data.json",
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

            // Loop along 'info' array inside 'data' array.
            for (let i = 0; i < data.length; i++) {
                for (let k = 0; k < data[i].info.length; k++) {
                    
                    // Create a food-type div for each 'info' index inside 'data' index, then append it to its own main section.
                    $(`#${data[i].id}`).append(
                        `
                        <div id=${data[i].info[k].id} class="food-type">
                                <div class="description">
                                    <h4>${data[i].info[k].title}</h4>
                                    <p>${data[i].info[k].para}</p>
                                    <h3>${data[i].info[k].price} JD</h3>
                                </div>
                                <img src="${data[i].info[k].path}" alt="${data[i].info[k].title}"> 
                        </div>
                        `
                    );
                } // for (k)
            } // for (i)
        }, //success
    }); //ajax
}); //jQuery
