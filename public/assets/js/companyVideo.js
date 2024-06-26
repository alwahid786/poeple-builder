$('.tab-box-two:last-of-type').addClass('active');
function tabCall() {
    const tabList = document.querySelector(".tab-list-two");
    const scrollLeftBtn = document.querySelector(".back-button");
    const scrollRightBtn = document.querySelector(".next-button");
    const activeTab = document.querySelector(".tab-box-two.active");

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

  
  $(document).on('click', '.videocard', function(e) {
    // $('#pagination-links').on('click', 'a', function(e) {
      currentObj = $(this);
    e.preventDefault();
    var url = window.location.href;
    obj = {
        count: $(currentObj).attr('data-no')
    };
    showLoader();
    $.get(url, obj, function(data) {
      $('.tab-hide-two').removeClass('active');
      $(currentObj).addClass('active');
        hideLoader();
        $('#videosDiv').html($(data));
    });
});
// const daysContainer = document.getElementById("daysContainer");
// const prevBtn = document.getElementById("prevBtn");
// const nextBtn = document.getElementById("nextBtn");
// const monthYear = document.getElementById("monthYear");
// const dateInput = document.getElementById("dateInput");
// const calendar = document.getElementById("calendar");

// let currentDate = new Date();
// let selectedDate = null;

// function handleDayClick(day) {
//     selectedDate = new Date(
//         currentDate.getFullYear(),
//         currentDate.getMonth(),
//         day
//     );
//     dateInput.value = selectedDate.toLocaleDateString("en-US");
//     calendar.style.display = "none";
//     renderCalendar();
// }

// function createDayElement(day) {
//     const date = new Date(
//         currentDate.getFullYear(),
//         currentDate.getMonth(),
//         day
//     );
//     const dayElement = document.createElement("div");
//     dayElement.classList.add("day");

//     if (date.toDateString() === new Date().toDateString()) {
//         dayElement.classList.add("current");
//     }
//     if (selectedDate && date.toDateString() === selectedDate.toDateString()) {
//         dayElement.classList.add("selected");
//     }

//     dayElement.textContent = day;
//     dayElement.addEventListener("click", () => {
//         handleDayClick(day);
//     });
//     daysContainer.appendChild(dayElement);
// }

// function renderCalendar() {
//     daysContainer.innerHTML = "";
//     const firstDay = new Date(
//         currentDate.getFullYear(),
//         currentDate.getMonth(),
//         1
//     );
//     const lastDay = new Date(
//         currentDate.getFullYear(),
//         currentDate.getMonth() + 1,
//         0
//     );

//     monthYear.textContent = `${currentDate.toLocaleString("default", {
//         month: "long",
//     })} ${currentDate.getFullYear()}`;

//     for (let day = 1; day <= lastDay.getDate(); day++) {
//         createDayElement(day);
//     }
// }

// prevBtn.addEventListener("click", () => {
//     currentDate.setMonth(currentDate.getMonth() - 1);
//     renderCalendar();
// });

// nextBtn.addEventListener("click", () => {
//     currentDate.setMonth(currentDate.getMonth() + 1);
//     renderCalendar();
// });

// dateInput.addEventListener("click", () => {
//     if (calendar.style.display === "block") {
//         calendar.style.display = "none";
//     } else {
//         calendar.style.display = "block";
//     }
// });

// document.addEventListener("click", (event) => {
//     if (!dateInput.contains(event.target) && !calendar.contains(event.target)) {
//         calendar.style.display = "none";
//     }
// });

// function positionCalendar() {
//     const inputRect = dateInput.getBoundingClientRect();
//     calendar.style.top = inputRect.bottom + "px";
//     calendar.style.left = inputRect.left + "px";
// }

// // window.addEventListener("resize", positionCalendar);

// renderCalendar();
// 
