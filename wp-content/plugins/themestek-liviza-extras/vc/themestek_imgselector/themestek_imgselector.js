/*
function themestek_imgselector_callback(){
	jQuery('.themestek_imgselector').change(function() {      // When arrow is clicked
		var currval = jQuery(this).val();
		var wrapper = jQuery(this).parent();
		jQuery( '.themestek-imgselector-thumb', wrapper).removeClass('themestek-imgselector-thumb-selected');
		jQuery( '.themestek-imgselector-thumb-'+currval, wrapper).addClass('themestek-imgselector-thumb-selected');
	});
};
themestek_imgselector_callback();
*/	


function themestek_imgselector_click(){
	jQuery('.themestek-imgselector-thumb').each(function(){
		var $this = jQuery(this);
		
		jQuery($this).on( 'click', function(){
			
			var currval = jQuery(this).data('value');
			var wrapper = jQuery(this).closest('.themestek-imgselector-main-wrapper');
			
			jQuery( '.themestek-imgselector-thumb', wrapper).removeClass('themestek-imgselector-thumb-selected');
			jQuery( '.themestek-imgselector-thumb-'+currval, wrapper).addClass('themestek-imgselector-thumb-selected');
			
			jQuery( 'select', wrapper).val(currval).trigger('change');
			
			
		});
		
	});
	
	
};
themestek_imgselector_click();