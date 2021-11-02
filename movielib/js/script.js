const movieDBKey = 'cb577b81e37a005b719395bb2cb58cdc';
const userId = document.getElementById('userId').value;
var movieName;
var page = 1;

$(function () {

    $('.fav').click(function (e) {
        e.preventDefault();
        if ($(this).hasClass('fav-active')) {
            $(this).removeClass('fav-active');
            $('#aa').toggle(100);
            $('.pagesOptions').toggle();

            // Calling Function
            searchMovie($('#aa').val())


        }
        else {
            $(this).addClass('fav-active');
            $('#aa').toggle(100);
            $('.pagesOptions').toggle();
            $('#container').html("");

            let movieImgPath;

            $.ajax({
                type: "get",
                url: "./read_data.php",
                dataType: 'json',
                success: function (response) {
                    $('#container').html("");
                    for (const key in response) {

                        if (response[key].imgPath != null) {
                            movieImgPath = `https://image.tmdb.org/t/p/original${response[key].imgPath}`;
                        } else {
                            movieImgPath = `./img/nopic.jpg`
                        }

                        $('#container').append(`<article data-aos="zoom-in"><div id=${response[key].movieId} class="favBtn favBtn-active"></div> <img src="${movieImgPath}"><h1>${response[key].title}</h1><h4>Released: ${response[key].release_date}</h4><p class="description">${response[key].overview}</p></article>`);
                        $(`.favBtn#${response[key].movieId}`).click(function (e) {

                            let movieObject = {
                                "movieId": response[key].movieId,
                                "imgPath": response[key].imgPath,
                                "title": response[key].title,
                                "release_date": response[key].release_date,
                                "overview": response[key].overview
                            }

                            let ready = JSON.stringify(movieObject);
                            
                            if ($(this).hasClass('favBtn-active')) {
                                $(this).removeClass('favBtn-active');
                                $(this).hide(100);

                                $.getJSON("./handler", { "removedFromFav": true, "userId": userId, ready },
                                    function (data, textStatus, jqXHR) {
                                    }
                                );

                            }


                        });
                    }
                }
            });
        }



    });

    $('.page-span', this).click(function (e) {
        e.preventDefault();
        $('.page-span').removeClass('page-span-active');
        $(this).addClass('page-span-active');
        $('html, body').scrollTop(0);
        page = $(this).text();
        searchMovie(movieName);
    });

    $('#aa').keyup(function (e) {
        $(this).css('background-color', $(this).val());
        movieName = $(this).val();

        // Calling Function
        searchMovie(movieName)
    });

    function searchMovie(movieName) {
        if (movieName == "") {
            $('#container').html("");

        }

        $.ajax({
            type: "GET",
            url: `https://api.themoviedb.org/3/search/movie?api_key=${movieDBKey}&query=${movieName}&page=${page}&include_adult=false`,
            dataType: "json",
            caches: false,
            success: function (response) {
                showResuts(response);
            }
        });
    }


});




function showResuts(response) {
    let movieImgPath;
    $('#container').html("");

    for (const key in response.results) {
        if (response.results[key].backdrop_path != null) {
            movieImgPath = `https://image.tmdb.org/t/p/original${response.results[key].backdrop_path}`;
        } else {
            movieImgPath = `./img/nopic.jpg`
        }

        $('#container').append(`<article data-aos="zoom-in"><div id=${response.results[key].id} class="favBtn"></div> <img src="${movieImgPath}"><h1>${response.results[key].title}</h1><h4>Released: ${response.results[key].release_date}</h4><p class="description">${response.results[key].overview}</p></article>`);

        $(`.favBtn#${response.results[key].id}`).click(function (e) {
            e.preventDefault();
            $(this).hide(100);

            let movieObject = {
                'movieId': response.results[key].id,
                'imgPath': response.results[key].backdrop_path,
                'title': response.results[key].title,
                'release_date': response.results[key].release_date,
                'overview': response.results[key].overview
            }

            let ready = JSON.stringify(movieObject);

            $.getJSON("./handler", { "addedToFav": true, "userId": userId, ready },
                function (data, textStatus, jqXHR) {
                }
            );

        });

    }
}


