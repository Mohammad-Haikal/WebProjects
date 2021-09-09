$(function () {
    
    
    $.ajax({
        type: "get",
        url: "../p.json",
        data: "../p.json",
        dataType: "json",
        success: function (data) {
            let propertyNames = Object.getOwnPropertyNames(data);
            console.log(data[1].info.length);

            for (let i = 0; i < data.length; i++) {
                console.log(data[i]);
                $('#menuDiv').append(
                    `
                    <section id="${data[i].id}">
                    <h1>${data[i].name}</h1>

                    </section>            
                    `
                );
                
            }
            
            // for (let i = 0; i < propertyNames.length; i++) {
            //     $('#menuDiv').append(
            //         `
            //         <section id="${propertyNames[i]}">
            //         <h1>${data[propertyNames[i]][0].name}</h1>

            //         </section>           
            //         `
            //     );
            // };

            for (let i = 0; i < data.length; i++) {
                for (let k = 0; k < data[i].info.length; k++) {

                    $(`#${data[i].id}`).append(
                        `
                        <div class="food-type">
                            <div class="description">
                                <h4>${data[i].info[k].title}</h4>
                                <p>${data[i].info[k].para}</p>
                            </div>
                            <img src="${data[i].info[k].path}" alt="${data[i].info[k].title}"> 
                        </div>
                        `
                    );
                    
                }

                
            };

            
                
            
            


        }
    });
});

