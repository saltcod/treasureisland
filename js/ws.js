jQuery(function($){
	 
// Scroll to TOP

//Extract the link and turn it into a screenshot 
 
$(function(){
		   
	$.fn.scrollToTop=function(){
		
		$(this).hide().removeAttr("href");
		
		if($(window).scrollTop()!="0"){
			$(this).fadeIn("slow")
		}
		var scrollDiv=$(this);
		
		$(window).scroll(function(){
								  
			if($(window).scrollTop()=="0"){
				$(scrollDiv).fadeOut("slow")
			}else{
				$(scrollDiv).fadeIn("slow")
			}
		
		});
		
		$(this).click(function(){
			$("html, body").animate({scrollTop:0},"slow");
		});
	
	}
			
});



//Don't show the scrollTop button on small screens 
$(function() {
	 if( $(window).width() < 481 ){
		$("#toTop").scrollToTop();
	 }
	 
});
	
$(document).ready(function(){
	
	$(".scroll").click(function(event){
		//prevent the default action for the click event
		event.preventDefault();
		
		//get the full url - like mysitecom/index.htm#home
		var full_url = this.href;
		
		//split the url by # and get the anchor target name - home in mysitecom/index.htm#home
		var parts = full_url.split("#");
		var trgt = parts[1];
		
		//get the top offset of the target anchor
		var target_offset = $("#"+trgt).offset();
		var target_top = target_offset.top;
		
		//goto that anchor by setting the body scroll top to anchor top
		$('html, body').animate({scrollTop:target_top}, 500);
	});

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


