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
			helper: 'clone',
		}).click( function(){
			var c = $(this).children('.theme-options-element-content');
			if ( !c.hasClass('show-settings') ) {
				c.addClass('show-settings');
			} else {
				c.removeClass('show-settings');
			}
		});
		
		
		
		// Droppable area
		$('.theme-options-holder').sortable({
			
		});
	});
})(jQuery);