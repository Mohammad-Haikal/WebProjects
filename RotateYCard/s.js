var text;

$(document).ready(function () {
    $(".rect", this).hover(function () {
        text = $(this).children("article").children("p").html();

        $(this).children("article").children("p").html("Welcome home Babe!!");
            
        }, function () {
            $(this).children("article").children("p").html(text);

        }
    );
});




