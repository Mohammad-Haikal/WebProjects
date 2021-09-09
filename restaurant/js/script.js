$(function () {
    
    
    $.ajax({
        type: "get",
        url: "../p.json",
        data: "../p.json",
        dataType: "json",
        success: function (data) {
            let propertyNames = Object.getOwnPropertyNames(data);
            console.log(data[propertyNames[1]].length);
            
            for (let i = 0; i < propertyNames.length; i++) {
                $('#menuDiv').append(
                    `
                    <section id="${propertyNames[i]}">
                    <h1>${data[propertyNames[i]][0].name}</h1>

                    </section>           
                    `
                );
            };

            for (let j = 0; j < propertyNames.length; j++) {
                for (let k = 0; k < data[propertyNames[j]].length; k++) {

                    $(`#${propertyNames[j]}`).append(
                        `
                        <div class="food-type">
                            <div class="description">
                                <h4>${data[propertyNames[j]][k].title}</h4>
                                <p>${data[propertyNames[j]][k].title}</p>
                            </div>
                            <img src="${data[propertyNames[j]][k].path}" alt="${propertyNames[0]}"> 
                        </div>
                        `
                    );
                    
                }

                
            };

            
                
            
            


        }
    });
});

