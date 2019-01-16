(function( $ ) {
	
	$.fn.dragSensitive = function(options) {  
		
		// Some settings
		var settings = {
		
			// The length of every row. Default is 10 items per row
			rowLength : 10,
			
			// The default width of the box. 
			boxWidth  : 500,
			
			// The default height of the box.
			boxHeight : 500,
			
			// The rate at which grabbing pans across items
			// The default is 1.3. Increasing makes it go slower.
			rate      : 1.3,
			
			// Sets whether or not the UI will snap to the last
			// element when the user stops grabbing
			round     : true,
			
			// This amount a user can drag (in pixels) while still
			// being able to click an object. Usually clicking is
			// disabled on drag, but within a (by default) 20px movement
			// clicking will still be enabled
			mistake   : 20
			
		};


		// Add those settings
		if(options) {
			$.extend(settings, options);
		}
		
		// Begin our plugin
		return this.each(function() {
			
			// Just a few variables
			$this = $(this);
			$settings = settings;
			
			// UI Additions
			$this.addClass('drag');
			$this.css({'width' : $settings.boxWidth+'px', height : $settings.boxHeight+'px'}); 
				
			// Some more variables
			var clicking, moving, outside = false;
			var firstPostionX, firstPositionY, x, defaultPos = 0;
			var slices = $(this).children('.item'); 
			var c = 1;	
			// Add some more UI elements with Javascript for ease (such as content, and divs so the icons will flip over)
			$this.find('.item').each(function() {
				
				$(this).append('<div class="front' + c + '"></div><div class="back"></div>');
					if($(this).find('.itemcontent').length > 0) {
						$(this).find('.itemcontent').appendTo($(this).find('.back'));
					    c++;
						
					}else{ 
						$(this).find('.back').append('<div class="play-button">&#9658;</div>');}
			});
			
			// Enclose these items in wrappers so we can have 'rows' of icons'
			for(var i = 0; i < slices.length; i += $settings.rowLength) {
				slices.slice(i, i+$settings.rowLength).wrapAll("<div class='wrapper'></div>");
			}
			
			
			// Handling Mouse Down Event
			// -------------------------
			$this.bind('mousedown touchstart', function(e) {
				
				// The user is now 'clicking'
				clicking = true;
				
				// Get the initial position of the mouse or finger
				if(e.pageX == undefined) {
					firstPositionX = e.originalEvent.touches[0].pageX - $this.offset().left;
				}
				else firstPositionX = e.pageX - $this.offset().left;
				
				// Set Figure out the position of the items based on CSS left
				if($this.find('.item').css('left') == 'auto') defaultPos = 0;
				else defaultPos = parseFloat($this.find('.item').css('left'));
				
				// Change cursor to grabbing
				$this.css({'cursor' : 'grabbing', 'cursor' : '-moz-grabbing', 'cursor' : '-webkit-grabbing'});
				
				return false;
				
			});
			
			
			
			// Handling Mouse Up Event
			// -----------------------
			function pressUp(e) {
				
				// Change cursor to just grab when the user lets go, and the cursor should be a 
				// pointer when the user is hovering over an item
				$this.css({'cursor' : 'grab', 'cursor' : '-moz-grab', 'cursor' : '-webkit-grab'});
				$this.children('.wrapper').children('.item').css({'cursor' : 'pointer', 'cursor' : 'pointer', 'cursor' : 'pointer'});
				
				// If the round setting is set (icons snap to nearest start point when user lets go)
				if($settings.round == true) {
					
					// Get how far left the items are
					$left = parseFloat($this.find('.item').css('left'));
					
					// Get item width including margins
					$itemwidth = parseFloat($this.children('.wrapper').children('.item').css('width')) + (parseFloat($this.children('.wrapper').children('.item').css('margin-left')) + parseFloat($this.children('.wrapper').children('.item').css('margin-right')));
					
					// Get width of wrapper
					$wrapwidth = $this.children('.wrapper').width() - parseFloat($this.css('width'));
					
					// Get number of items
					$number = Math.round($left / $itemwidth) * $itemwidth;
					
					if($number > 0) $number = 0;
					else if($number < -$wrapwidth) $number = -$wrapwidth;
										
					$this.find('.item').animate({
						left : $number
					}, 300);
					
				}
				
				setTimeout(function() {
					moving = false;
				}, 1);
				
				return false;
				
			}
			
			// Run function pressUp on mouse up or touch end.
			$this.bind('mouseup touchend', function(e) {
				
				clicking = false;
				pressUp(e);	
						
			});
			
			
			
			// Handling Mouse Move Event
			// -------------------------
			$(window).bind('mousemove touchmove', function(e) {
				
				// When the mouse is moving, get the current x coordinate
				if(e.pageX == undefined) x = e.originalEvent.touches[0].pageX - $this.offset().left;
				else x = e.pageX - $this.offset().left;
				
				// If its less than 0 or more than the width of the object, and clicking is true then
				// The user has left the object so run the pressUp() function and set clicking to false
				if((x < 0 || x > parseFloat($this.css('width'))) && clicking == true) {
				
					clicking = false;
					pressUp(e);
					
				}
				
				// if clicking is true
				if(clicking == true) {	
					
					// Figure out the change in x value from first position to x
					if(x == 0) return false;
					else var change = (x - firstPositionX) / $settings.rate;
					
					// Get the wrapper width
					var wrapperWidth = -($this.children('.wrapper').width() - (parseFloat($this.css('width')) - parseFloat($this.find('.item').css('margin-right'))));
					
					// The movement is the default position plus the change
					var movement =  defaultPos + change;
					
					// If the change is more than the settings mistake then moving is true
					if(change > $settings.mistake || change < -$settings.mistake) moving = true;
					
					// If rounding is set to true
					if($settings.round == true) {
						// Then give a 100px gap at the start and end of the wrapper
						if((movement > 100 || movement < (wrapperWidth-100))) return false;
					
					} else {
						// Otherwise end movement at the start and end of the wrapper
						if((movement > 0 || movement < (wrapperWidth))) return false;
					}
					
					// Change cursor
					$this.find('.item').css({'position' : 'relative', 'left' : movement+'px', 'cursor' : 'grabbing', 'cursor' : '-moz-grabbing', 'cursor' : '-webkit-grabbing'});
					
				}
				
				
			});
			
			
			// Handling Clicking Item Event
			// ----------------------------
			
			$this.find('.item').bind('click touchend', function() {
				
				// If the object has been clicked, then on second click remove the class 'clicked'
				if($(this).hasClass('clicked')) {
				
					$('.clicked').removeClass('clicked');
				
				}
				
				else if(moving == false) {
					// If moving is false (the user isn't moving)	
					$('.clicked').removeClass('clicked');
					$(this).addClass('clicked');
				
				}
				
			});
			
			
		});

	};

})( jQuery );