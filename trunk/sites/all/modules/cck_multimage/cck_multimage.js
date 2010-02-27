$(document).ready(function(){
  
	$('.multimage-image').each(function() {
	
	if (Drupal.settings[$(this).attr('id') + '-mode'] == 'single')
    return;
	
	
					var images = Drupal.settings[$(this).attr('id')];
					var captions = Drupal.settings[$(this).attr('id') + '-captions'];
					
					var container = $(this).parent().parent(); //Unused variable, for future additions.
					var top = $(this).parent();							
					var bottom = $(this).parent().next();
					var buffer = $(this).parent().next().next();
					
					//Load all images as soon as the page loads, that way the user won't have to wait on each click.	
						for (x = 0; x < images.length; x++) {
							buffer.attr('src', images[x]); //GET method in JQuery 1.01 is buggy when used in IE, so buffering must be done 'manually'.
						}  	
					var count = 1;
												$(this).click(function() {
													if (count == images.length ) 
														count = 0;
														
														bottom.fadeOut(200);	
														top.fadeOut(200, function(){	
														
																$(this).children().attr('src', images[count]);
																bottom.html(captions[count]);
																top.fadeIn(200);
																bottom.fadeIn(200);
																count++;} 
														);
			   
																	   
												});											 
				});
});
         