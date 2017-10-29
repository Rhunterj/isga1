/* Menu / overlay height js */


/* Sticky header */
$(function(){
        var stickyHeaderTop = $('header').offset().top;

        $(window).scroll(function(){
                if( $(window).scrollTop() > stickyHeaderTop ) {
                        $('header').css({position: 'fixed', top: '0px'});
                         $('aside').css({position: 'fixed', top: '0px'});
                } else {
                        $('header').css({position: 'static', top: '0px'});
                }
        });
  });

/* Menu /overlay js */
$(".fa-bars").click(function(){
	$("aside").toggle({ direction: "left" }, 1000);
	$(".overlay").toggle({ direction: "left" }, 1000);
});
$(".overlay").click(function(){
	$("aside").toggle({ direction: "left" }, 1000);
	$(".overlay").toggle({ direction: "left" }, 1000);
});

/*  List js */
$(document).ready(function(e){
  $('.item').click(function (e){
    if($(this).next('.item-data').css('display') != 'block'){
      $('.active').slideUp('fast').removeClass('active');
      $(this).next('.item-data').addClass('active').slideDown('slow');
    } else {
      $('.active').slideUp('fast').removeClass('active');
    }
  });
});