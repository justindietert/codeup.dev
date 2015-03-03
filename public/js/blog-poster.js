(function() {
   
    function loadBlog(){

        var blogData = $.get("/data/blog.json");

        blogData.done(function(data) {

            var blogInsert = $('#post');

            var htmlString = '';


            $(data).each(function(index, value){

                var tagGroup = [];

                value.tags.forEach(function (element, index, array) {
                    if (index == value.tags.length - 1) {
                        tagGroup += '<a href="#">' + element + '</a>';
                    } else {
                        tagGroup += '<a href="#">' + element + '</a>' + ', ';
                    }
                });

                htmlString += '<article><hr /><h2><a href="#">' + value.title + '</a></h2>';
                htmlString += '<h5>By <a href="#">' + value.author + '</a></h5>';
                htmlString += '<h5>Posted on <a href="">' + value.date + '</a>';
                htmlString += ' under <a href="">' + value.category + '</a>.</h5>';
                htmlString += '<h5>Tags: ' + tagGroup + '</h5>'
                htmlString += '<div class="row"><div class="medium-12 columns">' + '<img class="image-cell" src="' + value.image + '" alt="">';
                htmlString += '<p>' + value.body + '</p>' + '</div></div></article>';
            });

            blogInsert.html(htmlString);

        });

        blogData.fail(function(){
            console.log("AJAX request to blog.json failed to load");
        });

    };

    loadBlog();

})();