(function($){
	$(document).ready( function() {
		var options_holder = $('.theme-options-holder-content');
		
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
			connectToSortable: '.theme-options-holder-content',
			helper: 'clone'
		});
		
		// Opening submenu for settings
		
		// Droppable area
		options_holder.sortable( {
	        stop: function(event, ui){  
	        	save_theme_layout();  
	        },
			update: function() { 
				var settings = $('.theme-options-holder-content .theme-options-element-title .box-settings');
				var content = $('.theme-options-holder-content .theme-options-element-content');
				
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
					s.css( 'left', e.pageX - 180 );
		        });
		        
		        // Setting Menu
		        content.find('select[name=menu]').change( function(){
		        	var box = $(this).closest('.theme-options-element');
					box.css( 'float', $(this).val() );
				});
		        
		        // Setting Name
		        content.find('input:text[name=name]').change( function(){
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
				});
				
				// Setting floating
		        content.find('select[name=float]').change( function(){
		        	var box = $(this).closest('.theme-options-element');
					box.css( 'float', $(this).val() );
				});
				
				// Setting Class
		        content.find('input:text[name=class]').change( function(){
				});
				
				// Setting ID
		        content.find('input:text[name=id]').change( function(){
				});
				
				// Close button
				$('.box-close').click( function(){
					$(this).parent().removeClass('show-settings');
					save_theme_layout();
				});
				
				
            }
		});
		
		/*
		 * Collecting data to save
		 */
		function collect_data( options_holder ){
			var items={}; 
			var i = 0;
			
			options_holder.each( function( index, value ){
				items[ i ] = {};

				 $(this).find( 'input' ).each( function(){
				 	$(this).val( function(index, value){
				 		items[ i ][ $(this).prop( 'name' ) ] = value;
				 	});
				 });
				 
				 $(this).find( 'select' ).each( function(){
				 	$(this).val( function(index, value){
				 		items[ i ][ $(this).prop( 'name' ) ] = value;
				 	});
				 });
				 i++;
			});
			// alert( i );
			return items;
			
		}

		/*
		 * Saving data
		 */
		function save_theme_layout(){
			var data = collect_data( $('.theme-options-holder-content .theme-options-element-content') );
			
			// console.log( data );
			console.log( data );
			console.log( JSON.stringify(data) );
			// alert(JSON.stringify( data ));
			
			// console.log( $('form').serializeArray() );
			/*
			$.post('updatePanels.php', 'data='+$.toJson(sortorder), function(response){  
        		if(response=="success")  
            		$("#console").html('<div class="success">Saved</div>').hide().fadeIn(1000);  
        		setTimeout(function(){  
            		$('#console').fadeOut(1000);  
        		}, 2000);  
    		}); 
    		*/
		}
		
		console.log( 'End!' );
		 
	});
})(jQuery);