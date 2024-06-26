
$(document).on('click', '#pagination-links a', function(e) {
    // $('#pagination-links').on('click', 'a', function(e) {
    e.preventDefault();
    var url = $(this).attr('href');
    search(url);
});


var searchTimer; // Timer variable to track typing timeout
var searchTimeout = 1000;
$(document).on('keyup', '#search-input', function(event) {
    url = window.location.href;
    clearTimeout(searchTimer);
    searchTimer = setTimeout(function() {
        search(url);
    }, 1000);
});


$(document).on('keydown', '#search-input', function(event) {
    clearTimeout(searchTimer); // Clear the timer when a key is pressed
});
// Search function
function search(url) {
    obj = {
        search: $("#search-input").val()
    };
    showLoader();
    $.get(url, obj, function(data) {
        hideLoader();
        $('.reward-table').html($(data));
    });
}