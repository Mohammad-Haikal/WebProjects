$(function () {
    $("#newBtn").click(function () {
        $(this).toggleClass('newBtnA');
        $(".configuration").slideToggle(500);
    });

    $("#settingsBtn").click(function () {
        $(this).toggleClass('settingsBtnA');
        $(".settings").slideToggle(500);
        $(".settings").css('display', 'flex');
        $(".toolsBar").toggleClass('toolsBarA');
    });
    // Ajax read JSON Data
    readData();

});

function readData() {
    $.ajax({
        type: "POST",
        url: "./readData.php",
        dataType: "json",
        caches: false,
        success: function (data) {
            $('#notesContainer').html("");

            data.forEach(row => {
                $('#notesContainer').append(`
                    <form class="noteForm" action="" method="POST" >
                        <div id="note${row.id}" class="noteBox">
                            <input hidden type="number" name="id" value="${row.id}">
                            <textarea dir="auto" oninput="showEditBtn(${row.id})" id="t${row.id}" class="title" cols="30" placeholder="Title">${row.title}</textarea>
                            <textarea dir="auto" oninput="showEditBtn(${row.id})" id="n${row.id}" class="note" cols="30" placeholder="Your Note">${row.note}</textarea>
                            <p id="date${row.id}">${row.note_date}</p>
                            <div class="rowBtns">
                                <button type="button" id="editBtn${row.id}" class="editBtn">Save</button>
                                <button type="button" id="delBtn${row.id}" class="delBtn">
                                    <img src="./img/outline_delete_black_24dp.png" alt="delete">
                                </button>
                            </div>
                        </div>
                    </form>`
                );

                // Edit Handler ------------------------------
                $(`#editBtn${row.id}`).click(function (e) {
                    // Post (without refresh) by giving the specific data
                    $.post("./handler.php", { edit: true, id: row.id, title: $(`#t${row.id}`).val(), note: $(`#n${row.id}`).val() },
                        function (data) {
                            // Reread JSON Data
                            readData();
                        },
                    );
                });

                // Delete Handler ------------------------------
                $(`#delBtn${row.id}`).click(function (e) {
                    // Confirm before deletion
                    if (confirm("Are you sure?")) {
                        // Post (without refresh) by giving the specific data
                        $.post("./handler.php", { delete: true, id: row.id },
                            function (data) {
                                // Reread JSON Data
                                readData();
                            },
                        );

                    } else {
                        e.preventDefault();
                    }
                });




            });
        }
    });
}


function showEditBtn(id) {
    $(`#editBtn${id}`).fadeIn(500);
}

