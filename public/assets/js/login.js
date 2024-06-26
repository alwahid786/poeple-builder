$(document).ready(function () {
    $(".showPass").show();
    $(".hidePass").hide();

    $(".showPass").click(function () {
        const input = $(this).siblings("input[type='password']");
        input.attr("type", "text");
        $(this).hide();
        $(this).siblings(".hidePass").show();
    });

    $(".hidePass").click(function () {
        const input = $(this).siblings("input[type='text']");
        input.attr("type", "password");
        $(this).hide();
        $(this).siblings(".showPass").show();
    });
});
