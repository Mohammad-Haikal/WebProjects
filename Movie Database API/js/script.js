const movieDBKey = 'cb577b81e37a005b719395bb2cb58cdc';
var movieName;
var page = 1;
var adultMessage;



function changeMovieName(value){
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

    $('#container').html("");
    $.ajax({
        type: "GET",
        url: `https://api.themoviedb.org/3/search/movie?api_key=${movieDBKey}&query=${searchQuery}&page=${page}&include_adult=false`,
        dataType: "json",
        caches: false,
        success: function (response) {
            console.log(response)
            
            for (const key in response.results) {
                $('#container').append(`<article> <img src="https://image.tmdb.org/t/p/w500${response.results[key].backdrop_path}"><h1>${response.results[key].title}</h1><h4>Released: ${response.results[key].release_date}</h4><p>${response.results[key].overview}</p></article>`);                
            }
        }
    });

}


