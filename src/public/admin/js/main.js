$.noConflict();

jQuery(document).ready(function($) {
  "use strict";

  // [].slice
  //   .call(document.querySelectorAll("select.cs-select"))
  //   .forEach(function(el) {
  //     new select2({
  //       placeholder: "Select an option"
  //     });
  //   });

  // $("body").on("DOMNodeInserted", "select", function() {
  //   $(this).select2();
  // });

  $("#menuToggle").on("click", function(event) {
    $("body").toggleClass("open");
  });

  $(".search-trigger").on("click", function(event) {
    event.preventDefault();
    event.stopPropagation();
    $(".search-trigger")
      .parent(".header-left")
      .addClass("open");
  });

  $(".search-close").on("click", function(event) {
    event.preventDefault();
    event.stopPropagation();
    $(".search-trigger")
      .parent(".header-left")
      .removeClass("open");
  });

  // $('.user-area> a').on('click', function(event) {
  // 	event.preventDefault();
  // 	event.stopPropagation();
  // 	$('.user-menu').parent().removeClass('open');
  // 	$('.user-menu').parent().toggleClass('open');
  // });
});
