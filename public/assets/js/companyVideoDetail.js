$(document).on("click", ".video-reply-card", function () {
    $("#videoLink").html(`
    <video controls autoplay="true">
        <source src="${$(this).attr("data-url")}" type="video/mp4">
    </video>`);
    $("#videoModal").modal("show");
});

// paginate link
$(document).on("click", "#pagination-links a", function (e) {
    e.preventDefault();
    var url = $(this).attr("href");
    showLoader();
    $.get(url, function (data) {
        hideLoader();
        $("#partial-replies").html($(data));
    });
});
