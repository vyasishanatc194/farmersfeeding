/* Set navigation */

function openNav() {
  $("#mySidenav").addClass("width80");
  $("#nav-res").addClass("opacityon");
  $(".cd-shadow-layer").addClass("displayblock");
}

function closeNav() {
  $("#mySidenav").removeClass("width80");
  $("#nav-res").removeClass("opacityon");
  $(".cd-shadow-layer").removeClass("displayblock");

} 


$(document).ready(function(){ 

  $(".cd-shadow-layer").click(function(){
    closeNav(); 
  });
	
  // Add minus icon for collapse element which is open by default
   $(".collapse.show").each(function(){
	$(this).removeClass('show');
    $(this).prev(".card-header").find(".flaticon-right-arrow").removeClass("up-arrow-icon").addClass("down-arrow-icon");
  });

  // Toggle plus minus icon on show hide of collapse element
  $(".collapse").on('show.bs.collapse', function(){
    $(this).prev(".card-header").find(".flaticon-right-arrow").removeClass("down-arrow-icon").addClass("up-arrow-icon");
  }).on('hide.bs.collapse', function(){
    $(this).prev(".card-header").find(".flaticon-right-arrow").removeClass("up-arrow-icon").addClass("down-arrow-icon");
  });
	
  Waves.attach('.btn', ['waves-effect']);

 });

/* end of navigation */



$(window).scroll(function(){
  var sticky = $('.header-div'),
      scroll = $(window).scrollTop();

    if (scroll >= 100) sticky.addClass('fixed_top');
    else sticky.removeClass('fixed_top');

  });
