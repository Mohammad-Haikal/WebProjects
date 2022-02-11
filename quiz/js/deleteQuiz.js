function deleteQz(token) {
    if (confirm('Are you sure?')) {
        var tokensArray = JSON.parse(readCookie('tokensArray'));
        var i = tokensArray.indexOf(token);
        tokensArray.splice(i, 1);
        setCookie("tokensArray", JSON.stringify(tokensArray), 30);
        window.location = `./deleteQuiz.php?token=${token}`;
    }
}