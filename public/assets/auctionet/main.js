$(document).ready(function() {
    $('.markdown').html(function(i, contents) {
        return marked.parse(contents);
    });
});
