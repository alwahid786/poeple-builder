$(document).ready(function () {
    const UploadFile = $(".upload-file");
    const imageUpload = $("#image-upload");
    const imageView = $(".image-view");
    const imageViewer = $("#image-viewer");
    const closeIcon = $("#close-icon");

    imageUpload.change(function () {
        const file = this.files[0];
        if (file) {
            const reader = new FileReader();

            reader.onload = function (e) {
                UploadFile.hide();
                imageViewer.attr("src", e.target.result);
                imageView.show();
                closeIcon.show();
            };

            reader.readAsDataURL(file);
        }
    });

    closeIcon.click(function () {
        imageView.hide();
        closeIcon.hide();
        UploadFile.show();
    });
});
//   password
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
