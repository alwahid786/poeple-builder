// show-hide-password
$(document).ready(function() {
    $(".hidePass").hide();
    $(".showPass").click(function() {
        const input = $(this).siblings("input[type='password']");
        input.attr("type", "text");
        $(this).hide();
        $(this).siblings(".hidePass").show();
    });

    $(".hidePass").click(function() {
        const input = $(this).siblings("input[type='text']");
        input.attr("type", "password");
        $(this).hide();
        $(this).siblings(".showPass").show();
    });
});

const resetButton = document.getElementById('reset-btn');
const verificationBox = document.getElementsByClassName('verfication-successfull')[0];
const resetForm = document.getElementsByClassName('reset-form')[0];


function handleClick() {
    resetForm.style.display = 'none';
    verificationBox.style.display = 'block';

}

resetButton.addEventListener('click', handleClick);