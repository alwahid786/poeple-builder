$(document).ready(function () {
    const UploadFile = $(".upload-file");
    const imageUpload = $("#image-upload");
    const imageView = $(".image-view");
    const imageViewer = $("#image-viewer");
    const closeIcon = $("#close-icon");
    const loader = $("#loader-section");

    UploadFile.hide();
    imageViewer.attr(
        "src",
        "http://localhost/people-builder/public/assets/images/video-card-pic-1.png"
    );
    imageView.show();
    closeIcon.show();

    imageUpload.change(function (event) {
        var file = event.target.files[0];
        var fileReader = new FileReader();
        fileReader.onload = function () {
            loader.css("display", "flex");
            var blob = new Blob([fileReader.result], { type: file.type });
            var url = URL.createObjectURL(blob);
            var video = document.createElement("video");
            var timeupdate = function () {
                if (snapImage()) {
                    video.removeEventListener("timeupdate", timeupdate);
                    video.pause();
                }
            };
            video.addEventListener("loadeddata", function () {
                if (snapImage()) {
                    video.removeEventListener("timeupdate", timeupdate);
                }
            });
            var snapImage = function () {
                var canvas = document.createElement("canvas");
                canvas.width = video.videoWidth;
                canvas.height = video.videoHeight;
                canvas
                    .getContext("2d")
                    .drawImage(video, 0, 0, canvas.width, canvas.height);
                var image = canvas.toDataURL();
                var success = image.length > 100000;
                if (success) {
                    UploadFile.hide();
                    loader.css("display", "none");
                    imageViewer.attr("src", image);
                    imageView.show();
                    closeIcon.show();
                    URL.revokeObjectURL(url);
                }
                return success;
            };
            video.addEventListener("timeupdate", timeupdate);
            video.preload = "metadata";
            video.src = url;
            video.muted = true;
            video.playsInline = true;
            video.play();
        };
        fileReader.readAsArrayBuffer(file);
    });

    closeIcon.click(function () {
        imageView.hide();
        closeIcon.hide();
        UploadFile.show();
    });
});
