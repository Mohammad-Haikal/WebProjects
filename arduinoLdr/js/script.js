var i = 0;
function record(i) {
    
}


setInterval(function () {
    $.get("readRecord.php",
    function (data, textStatus, jqXHR) {
        $('#record').val(data);
    $('#recordLabel').html(data);
    },
);
}, 1000);


