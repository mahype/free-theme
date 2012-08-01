(function($){
	$(document).ready( function() {
		var options_holder = $('theme-options-holder');
		
		// Close and open elements in boxes
		$('.box-name').click( function(){
			var  p = $(this).parent();
			if ( !p.hasClass('closed') ) {
				p.addClass('closed');
			} else {
				p.removeClass('closed');
			}
		});
		
		// Dragging elements
		$('.theme-options-element').draggable({ 
			connectToSortable: ".theme-options-holder",
			helper: 'clone'
		});
		
		// Opening submenu for settings
		
		// Droppable area
		$('.theme-options-holder').sortable( {
			update: function() { 
				var settings = $('.theme-options-holder .theme-options-element-title .box-settings');
				var content = $('.theme-options-holder .theme-options-element-content');
				
				 // Unbinding click function from settings icon
            	settings.unbind("click");
            	content.unbind("click");
            	
            	// Adding click function for settings to settings icon
            	settings.click( function(e) {
            		// Getting settings content and showing or hiding it
		        	var  s = $(this).parent().parent().children( '.theme-options-element-content' );
		        	
					if ( !s.hasClass('show-settings') ) {
						$('.theme-options-element-content').removeClass('show-settings');
						s.addClass('show-settings');
					} else {
						s.removeClass('show-settings');
					}
					// Setting position of settings window
					s.css( 'top', e.pageY  - 20 );
					s.css( 'left', e.pageX - 460 );
		        });
		        
		        // Setting width
		        content.find('input:text[name=width]').change( function(){
		        	var box = $(this).closest('.theme-options-element');
					box.css( 'width', $(this).val() + $(this).parent().children('select[name=width-unit]').val() );
				});
				
				// Setting width unit
		        content.find('select[name=width-unit]').change( function(){
		        	var box = $(this).closest('.theme-options-element');
					box.css( 'width', $(this).parent().children('input:text[name=width]').val() + $(this).val() );
					console.log( box );
				});
				
				// Setting height
		        content.find('input:text[name=height]').change( function(){
		        	var box = $(this).closest('.theme-options-element');
					box.css( 'height', $(this).val() + $(this).parent().children('select[name=height-unit]').val() );
				});
				
				// Setting height unit
		        content.find('select[name=height-unit]').change( function(){
		        	var box = $(this).closest('.theme-options-element');
					box.css( 'height', $(this).parent().children('input:text[name=height]').val() + $(this).val() );
					console.log( box );
				});
				
				// Setting floating
		        content.find('select[name=float]').change( function(){
		        	var box = $(this).closest('.theme-options-element');
					box.css( 'float', $(this).val() );
				});
				
				// Close button
				$('.box-close').click( function(){
					$(this).parent().removeClass('show-settings');
				});
				
				
            }
		});

		console.log( 'End!' );
		 
	});
})(jQuery);