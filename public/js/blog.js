var blog = [
    {
        "title": "This is a title for this",
        "date": "2015/10/30",
        "author": "Justin Dietert",
        "image": "http://lorempixel.com/600/350/abstract/3/",
        "tags": [
            "Web",
            "Design",
            "HTML",
            "CSS"
        ],
        "category": "Design",
        "body": "Bacon ipsum dolor amet culpa proident et tri-tip quis fatback, eu venison short ribs sirloin salami nulla hamburger kevin excepteur. Short loin nulla cow tri-tip commodo. Flank capicola jerky, cillum commodo quis fugiat ea tenderloin ham consectetur. Boudin aliqua adipisicing rump corned beef. Nulla corned beef sunt ball tip, qui bresaola enim jowl. Capicola short ribs minim salami nulla nostrud pastrami. Pork drumstick turkey fugiat. Tri-tip elit turducken pork chop in. Swine short ribs meatball irure bacon nulla pork belly cupidatat meatloaf cow. Nulla corned beef sunt ball tip, qui bresaola enim jowl. Capicola short ribs minim salami nulla nostrud pastrami. Nulla corned beef sunt ball tip, qui bresaola enim jowl. Capicola short ribs minim salami nulla nostrud pastrami. Pork drumstick turkey fugiat. Tri-tip elit turducken pork chop in. Swine short ribs meatball irure bacon nulla pork belly cupidatat meatloaf cow. Nulla corned beef sunt ball tip, qui bresaola enim jowl. Capicola short ribs minim salami nulla nostrud pastrami."
    },
    {
        "title": "Another title here",
        "date": "2015/10/30",
        "author": "Justin Dietert",
        "image": "http://lorempixel.com/600/350/abstract/10/",
        "tags": [
            "Bacon",
            "Circuits",
            "Resolution",
            "Media queries"
        ],
        "category": "Development",
        "body": "Bacon ipsum dolor amet culpa proident et tri-tip quis fatback, eu venison short ribs sirloin salami nulla hamburger kevin excepteur. Short loin nulla cow tri-tip commodo. Flank capicola jerky, cillum commodo quis fugiat ea tenderloin ham consectetur. Boudin aliqua adipisicing rump corned beef. Nulla corned beef sunt ball tip, qui bresaola enim jowl. Capicola short ribs minim salami nulla nostrud pastrami. Pork drumstick turkey fugiat. Tri-tip elit turducken pork chop in. Swine short ribs meatball irure bacon nulla pork belly cupidatat meatloaf cow. Nulla corned beef sunt ball tip, qui bresaola enim jowl. Capicola short ribs minim salami nulla nostrud pastrami. Nulla corned beef sunt ball tip, qui bresaola enim jowl. Capicola short ribs minim salami nulla nostrud pastrami. Pork drumstick turkey fugiat. Tri-tip elit turducken pork chop in. Swine short ribs meatball irure bacon nulla pork belly cupidatat meatloaf cow. Nulla corned beef sunt ball tip, qui bresaola enim jowl. Capicola short ribs minim salami nulla nostrud pastrami."
    }
]


// ----------------------------------------------------

// var postString = '';
// var post = document.getElementById('blogPosts');


// for (var i = 0; i < blog.length; i++) {

//     var tags = '';
//     for (var j = 0; j < blog[i].tags.length; j++) {
//         tags += '<a href="#">' + blog[i].tags[j] + '</a>, ';
//         //string split to take off last comma
//     }
   
//     postString += '<article><hr /><h2><a href="#">' + blog[i].title + '</a></h2>';
//     postString += '<h4>By <a href="#">' + blog[i].author + '</a></h4>';
//     postString += '<h5>Posted on <a href="">' + blog[i].date + '</a> under <a href="">' + blog[i].category + '</a>.</h5>';
//     postString += '<h5>Tags: ' + tags + '</h5>';
//     postString += '<div class="row"><div class="medium-12 columns">';
//     postString += '';

//     postString += '</div></div></article>';
// }

// post.innerHTML = postString;

// ----------------------------------------------------

var allPosts = [];

function populateExistingPost(post) {
    var title = '<article><hr /><h2><a href="#">' + post.title + '</a></h2>';
    var author = '<h5>By <a href="#">' + post.author + '</a></h5>';
    var authorDate = '<h5>Posted on <a href="">' + post.date + '</a>';
    var category = ' under <a href="">' + post.category + '</a>.</h5>';
    var tags = [];
    post.tags.forEach(function (element, index, array) {
        tags += '<a href="#">' + element + '</a>' + ', ';
    });
    
    var image = '<div class="row"><div class="medium-12 columns">' + '<img class="image-cell" src="' + post.image + '" alt="">';
    var body = '<p>' + post.body + '</p>' + '</div></div></article>';

    var postHTML = title + author + authorDate + category + '<h5>Tags: ' + tags + '</h5>' + image + body;
    return postHTML;
}




blog.forEach(function (element, index, array) {
    allPosts += populateExistingPost(element);
});

document.getElementById('blogPosts').innerHTML = allPosts;







