$(document).ready(function () {
    const UploadFile = $(".upload-file");
    const imageUpload = $("#image-upload");
    const imageView = $(".image-view");
    const imageViewer = $("#image-viewer");
    const closeIcon = $("#close-icon");
    const loader = $("#loader-section");

    $(document).on('change', '#image-upload', function() {
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
                    $("#thumbnail").val(image);
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
        $('.upload-file #image-upload').remove();
        $('.upload-file').append('<input type="file" accept="video/*" class="" name="video" id="image-upload">');
    });
});


function videoForm(){
    if (!ValidateField("videoForm")) {
        return false;
    }
    return true;
};


$('.tab-box-two:last-of-type').addClass('last-one');
function tabCall() {
  const tabList = document.querySelector(".tab-list-two");
  const scrollLeftBtn = document.querySelector(".back-button");
  const scrollRightBtn = document.querySelector(".next-button");
  const activeTab = document.querySelector(".tab-box-two.last-one");

  if (activeTab) {
    tabList.scrollLeft =
      activeTab.offsetLeft -
      tabList.clientWidth / 2 +
      activeTab.clientWidth / 2;
  }
  function hasHorizontalScrollbar(element) {
    return element.scrollWidth > element.clientWidth;
  }

  function updateNextButtonVisibility() {
    if (hasHorizontalScrollbar(tabList)) {
      scrollRightBtn.style.display =
        tabList.scrollLeft < tabList.scrollWidth - tabList.clientWidth
          ? "block"
          : "none";
    } else {
      scrollRightBtn.style.display = "none";
    }
  }

  tabList.addEventListener("scroll", () => {
    if (tabList.scrollLeft > 0) {
      scrollLeftBtn.style.display = "block";
    } else {
      scrollLeftBtn.style.display = "none";
    }
    updateNextButtonVisibility();
  });

  scrollLeftBtn.addEventListener("click", () => {
    tabList.scrollBy({
      left: -100,
      behavior: "smooth",
    });
  });

  scrollRightBtn.addEventListener("click", () => {
    tabList.scrollBy({
      left: 100,
      behavior: "smooth",
    });
  });

  updateNextButtonVisibility();

  window.addEventListener("resize", updateNextButtonVisibility);
}
tabCall();
