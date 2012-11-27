jQuery(function($){
	 
//Toggle the visibility of the post thumbnails

$('p#toggle-thumbnails a').toggle(function(){
		$('.thumbnail img').fadeIn('slow');
		$('.thumbnail').addClass('visible');
		$('p#toggle-thumbnails a').text('Hide Thumbnails');

	},function(){
		$('.thumbnail img').fadeOut('slow');
		$('.thumbnail').removeClass('visible');
		$('p#toggle-thumbnails a').text('Show Thumbnails');
})


	$('.thumbnail img').fadeOut('slow');
 

//Don't show the scrollTop button on small screens 
$(function() {
	 if( $(window).width() < 481 ){
		$("#toTop").scrollToTop();
	 }
	 
});
	
$(function() {
	$('#tag-list').jScrollPane();
	
});


$(document).ready(function() {

$('#all-tags').css('display:inherit');

 // hides the slickbox as soon as the DOM is ready
  $('#all-tags').hide();
 // shows the slickbox on clicking the noted link  

 // toggles the slickbox on clicking the noted link  
  $('#slick-toggle').click(function() {
    $('#all-tags').toggle(300);
    return false;
  });
});

	
	
	
	
});


