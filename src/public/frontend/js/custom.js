$(document).ready(function(){
	$(".modal-wide").on("show.bs.modal", function() {
	  var height = $(window).height() - 200;
	  $(this).find(".modal-body").css("max-height", height);
	});

$(".project-detail .property-highlights").each(function(){
    if ($(this).text().trim() === "") {
        $(this).hide();
    }
});

// project detail page link btn click active and scroll to active div
var lastId,
 topMenu = $(".ul-list"),
 topMenuNw = $(".project-overview"),
 topMenuHeight = topMenuNw.outerHeight()+1,
 // All list items
 menuItems = topMenu.find("a"),
 // Anchors corresponding to menu items
 scrollItems = menuItems.map(function(){
   var item = $($(this).attr("href"));
    if (item.length) { return item; }
 });
menuItems.click(function(e){
  var href = $(this).attr("href"),
      offsetTop = href === "#" ? 0 : $(href).offset().top-topMenuHeight+1;
  $('html, body').stop().animate({ 
      scrollTop: offsetTop
  }, 850);
  e.preventDefault();
});
$(window).scroll(function(){
   var fromTop = $(this).scrollTop()+topMenuHeight;
   var cur = scrollItems.map(function(){
     if ($(this).offset().top < fromTop)
       return this;
   });
   cur = cur[cur.length-1];
   var id = cur && cur.length ? cur[0].id : ""; 
   if (lastId !== id) {
       lastId = id;
       menuItems
         .parent().removeClass("active")
         .end().filter("[href=#"+id+"]").parent().addClass("active");
   }                   
});

$(".loc-map a").click(function() {
    $('html,body').animate({
        scrollTop: $(".map").offset().top - 150},
        'slow');
});


// project img slider	
$('.slider-for').slick({
	slidesToShow: 1,
    slidesToScroll: 1,
    arrows: false,
    fade: true,
    asNavFor: '.slider-nav'
});
$('.slider-nav').slick({
  slidesToShow: 2,
  slidesToScroll: 1,
  asNavFor: '.slider-for',
  dots: true,
  centerMode: true,
  focusOnSelect: true,
  arrows: true,
  dots:false
});
$('.slider-for').slickLightbox({
  itemSelector        : 'a',
  navigateByKeyboard  : true
});
});

