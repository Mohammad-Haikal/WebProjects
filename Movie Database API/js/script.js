const movieDBKey = 'cb577b81e37a005b719395bb2cb58cdc';
var movieName;
var page = 1;
var adultMessage;



function changeMovieName(value){
    $('#aa').css('background-color', value);

    movieName = value;
    searchMovie(movieName);
}

function changePage(value){
    page = value;
    searchMovie(movieName);
}


function searchMovie(searchQuery){
    if (page == "") {
        page = 1;
    }

    $.ajax({
        type: "GET",
        url: `https://api.themoviedb.org/3/search/movie?api_key=${movieDBKey}&query=${searchQuery}&page=${page}&include_adult=false`,
        dataType: "json",
        caches: false,

        success: function (response) {
            $("img").ready(function () {
                $('#container').html("");
                console.log(response)
                
                for (const key in response.results) {
                    $('#container').append(`<article data-aos="zoom-in"> <img src="https://image.tmdb.org/t/p/original${response.results[key].backdrop_path}"><h1>${response.results[key].title}</h1><h4>Released: ${response.results[key].release_date}</h4><p>${response.results[key].overview}</p></article>`);                
                }

            });

            
        }
        
    });

}


