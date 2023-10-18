function bookmarkArticle(link) {
    var bookmarkedArticles = [];
    if (document.cookie.indexOf('bookmarked_articles=') >= 0) {
        bookmarkedArticles = JSON.parse(getCookie('bookmarked_articles'));
    }

    if (bookmarkedArticles.indexOf(link) === -1) {
        bookmarkedArticles.push(link);
        setCookie('bookmarked_articles', JSON.stringify(bookmarkedArticles), 30);
        alert('Article bookmarked! You can view your bookmarks in the future.');
    } else {
        alert('This article is already bookmarked.');
    }
}

function setCookie(name, value, days) {
    var expires = '';
    if (days) {
        var date = new Date();
        date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
        expires = '; expires=' + date.toUTCString();
    }
    document.cookie = name + '=' + value + expires + '; path=/';
}

function getCookie(name) {
    var nameEQ = name + '=';
    var ca = document.cookie.split(';');
    for (var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) === ' ') c = c.substring(1, c.length);
        if (c.indexOf(nameEQ) === 0) return c.substring(nameEQ.length, c.length);
    }
    return null;
}
