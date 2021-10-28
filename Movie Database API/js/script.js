const movieDBKey = 'cb577b81e37a005b719395bb2cb58cdc';
var movieName;
var page = 1;
var favMovies = [];


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

            // Calling Function
            findMovie(favMovies);
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





// function checkFav(movieId) {
//     console.log('done');
//     console.log(movieId);
//     let favbtn = `#${movieId}`;
//     if ($(favbtn).hasClass('favBtn-active')) {
//         $(favbtn).removeClass('favBtn-active');
//         const index = favMovies.indexOf(movieId);
//         if (index > -1) {
//             favMovies.splice(index, 1);
//         }
//     } else {
//         $(favbtn).addClass('favBtn-active');
//         favMovies.push(movieId);
//     }
// }

function findMovie(data) {
    for (const key in data) {
        

        if (data[key].imgPath != null) {
            movieImgPath = `https://image.tmdb.org/t/p/original${data[key].imgPath}`;
        } else {
            movieImgPath = `./img/nopic.jpg`
        }

        $('#container').append(`<article data-aos="zoom-in"><div id=${data[key].id} class="favBtn favBtn-active"></div> <img src="${movieImgPath}"><h1>${data[key].title}</h1><h4>Released: ${data[key].release_date}</h4><p class="description">${data[key].overview}</p></article>`);

        // $(document).ready(function () {
            // $('.favBtn', this).click(function (e) {
            //     e.preventDefault();

            //     // let movieId = $(this).attr('id');
            //     // checkFav(movieId);
            // });
        // });


    }


}



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

            let movieObject = {
                'movieId': response.results[key].id,
                'imgPath': response.results[key].backdrop_path,
                'title': response.results[key].title,
                'release_date': response.results[key].release_date,
                'overview': response.results[key].overview
            }

            favMovies.push(movieObject);
        });

    }
}


//https://api.themoviedb.org/3/movie/${favMovies[key]}?api_key=${movieDBKey}