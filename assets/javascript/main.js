$(document).ready(function () {
  $(".hamburger").click(function () {
    $(this).toggleClass("is-active");
    $(".main-nav__list").toggleClass("main-nav__list-active");
    $(".main-nav").toggleClass("main-nav-active");
    flashColor(this);
    // $("html").toggleClass(".html-active");
  });
  function flashColor(element) {
    $(element)
      .addClass("flash")
      .on(
        "webkitAnimationEnd oanimationend msAnimationEnd animationend",
        function () {
          console.log("animationend");
          $(element)
            .delay(500) // Wait for milliseconds.
            .queue(function () {
              console.log("end of delay");
              $(element).removeClass("flash").dequeue();
            });
        }
      );
  }
});

//   var header = document.querySelectorAll(".sticky-header")[0];
//   var headerOffset = header.offsetTop;

//   setHeaderFixed();

//   window.onscroll = function () {
//     setHeaderFixed();
//   };

//   function setHeaderFixed() {
//     if (window.pageYOffset + 10 > headerOffset) {
//       header.classList.add("sticky");
//     } else {
//       header.classList.remove("sticky");
//     }
//   }
