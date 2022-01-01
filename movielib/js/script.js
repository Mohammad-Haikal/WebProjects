const movieDBKey = 'cb577b81e37a005b719395bb2cb58cdc';
const userId = document.getElementById('userId').value;
var movieName;
var page = 1;
const genres = [{ "id": 28, "name": "Action" }, { "id": 12, "name": "Adventure" }, { "id": 16, "name": "Animation" }, { "id": 35, "name": "Comedy" }, { "id": 80, "name": "Crime" }, { "id": 99, "name": "Documentary" }, { "id": 18, "name": "Drama" }, { "id": 10751, "name": "Family" }, { "id": 14, "name": "Fantasy" }, { "id": 36, "name": "History" }, { "id": 27, "name": "Horror" }, { "id": 10402, "name": "Music" }, { "id": 9648, "name": "Mystery" }, { "id": 10749, "name": "Romance" }, { "id": 878, "name": "Science Fiction" }, { "id": 10770, "name": "TV Movie" }, { "id": 53, "name": "Thriller" }, { "id": 10752, "name": "War" }, { "id": 37, "name": "Western" }]

$(function () {

    if ($(window).width() < 800) {
        $('.menuBtn').click(function (e) {
            e.preventDefault();
            // $(this).toggleClass('menuBtnActive');
            $('nav').toggle(300);

        });

        $('#searchBar, main').click(function (e) {
            e.preventDefault();
            // $(this).toggleClass('menuBtnActive');
            $('nav').hide(300);
        });

    }


    $('#settingsBtn').click(function (e) {
        e.preventDefault();
        $('.fadeBox').fadeIn(100);
        $('#closeBtn').click(function (e) {
            e.preventDefault();
            $('.fadeBox').fadeOut(100);
        });
        
    });
    $('.searchPage').click(function (e) {
        e.preventDefault();
        $(this).addClass('selected');
        $('.fav').removeClass('selected');
        $('#container').html("");
        $('#searchBar').show(200);
        $('.pagesOptions').show();
        
    });
    $('.fav').click(function (e) {
        e.preventDefault();
        $('#searchBar').hide(200);
        $('.pagesOptions').hide();
        $('#container').html("");
        $('.searchPage').removeClass('selected');
        $(this).addClass('selected');

        let movieImgPath;

        $.ajax({
            type: "get",
            url: './read_data.php',
            dataType: 'json',
            success: function (response) {
                $('#container').html("");
                for (const key in response) {

                    if (response[key].imgPath != null) {
                        movieImgPath = `https://image.tmdb.org/t/p/original${response[key].imgPath}`;
                    } else {
                        movieImgPath = `./img/nopic.jpg`
                    }

                    $('#container').append(`<article data-aos="zoom-in"><i id=${response[key].movieId} class="fa fa-minus favBtn favBtn-active"></i> <img src="${movieImgPath}"><h1>${response[key].title}</h1><p class="genres${response[key].movieId}"></p><h4>Released: ${response[key].release_date}</h4><p class="description">${response[key].overview}</p></article>`);

                    /////////////////////////////////////
                    $(`.genres${response[key].movieId}`).html(response[key].genres.join(" | "));
                    /////////////////////////////////////



                    $(`.favBtn#${response[key].movieId}`).click(function (e) {

                        let movieObject = {
                            "movieId": response[key].movieId,
                            "imgPath": response[key].imgPath,
                            "title": response[key].title,
                            "genres": response[key].genres,
                            "release_date": response[key].release_date,
                            "overview": response[key].overview
                        }

                        let ready = JSON.stringify(movieObject);

                        if ($(this).hasClass('favBtn-active')) {
                            $(this).hide(100);

                            $.getJSON("./jsonhandler.php", { "removedFromFav": true, "userId": userId, ready },
                                function (data, textStatus, jqXHR) {
                                }
                            );

                        }


                    });
                }
            }
        });

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

    $('.searchBtn').click(function (e) {
        e.preventDefault();
        searchMovie($('#aa').val());
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

        $('#container').append(`<article data-aos="zoom-in"><i id=${response.results[key].id} class="fa fa-plus favBtn"></i> <img src="${movieImgPath}"><h1>${response.results[key].title}</h1><p class="genres${response.results[key].id}"></p><h4>Released: ${response.results[key].release_date}</h4><p class="description">${response.results[key].overview}</p></article>`);

        /////////////////////////////////////
        let movieGenres = [];
        for (const j in response.results[key].genre_ids) {
            genres.find(function (post, index) {
                if (post.id == response.results[key].genre_ids[j]) {
                    movieGenres.push(post.name);
                }
            });
        }

        $(`.genres${response.results[key].id}`).html(movieGenres.join(" | "));
        /////////////////////////////////////

        $(`.favBtn#${response.results[key].id}`).click(function (e) {
            e.preventDefault();
            $(this).hide(100);

            let movieObject = {
                'movieId': response.results[key].id,
                'imgPath': response.results[key].backdrop_path,
                'title': response.results[key].title,
                'genres': movieGenres,
                'release_date': response.results[key].release_date,
                'overview': response.results[key].overview
            }

            let ready = JSON.stringify(movieObject);

            $.getJSON('./jsonhandler.php', { "addedToFav": true, "userId": userId, ready },
                function (data, textStatus, jqXHR) {
                }
            );

        });

    }
}


