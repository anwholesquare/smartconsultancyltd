jQuery( document ).ready(function($) {
	
	/*******************************************/
	
	
	// Open the main lightbox for demo content setup
	jQuery( ".themestek-open-demo-box" ).on('click', function() {
		jQuery('#themestek-demo-import-form-w').show();
		return false;
	});
	
	// close lightbox
	jQuery( ".themestek-demo-import-close-w" ).on('click', function() {
		jQuery('#themestek-demo-import-form-w').hide();
		return false;
	});
	
	
	jQuery( ".themestek-import-demo-import-demo-link" ).on('click', function() {
		var main_wrapper = jQuery(this).closest('.import-demo-thumb-w');
		jQuery('.themestek-import-demo-conformation-w').slideUp();
		jQuery('.themestek-import-demo-import-demo-link').prop('disabled', false);
		jQuery('.themestek-import-demo-conformation-w', main_wrapper ).slideDown();
		jQuery('.themestek-import-demo-import-demo-link', main_wrapper ).prop('disabled', true);
		return false;
	});
	
	jQuery( ".themestek-import-demo-import-demo-no" ).on('click', function() {
		var main_wrapper = jQuery(this).closest('.import-demo-thumb-w');
		jQuery('.themestek-import-demo-conformation-w', main_wrapper ).slideUp();
		jQuery('.themestek-import-demo-import-demo-link', main_wrapper ).prop('disabled', false);
		return false;
	});
	
	/****/
	
	
	jQuery('.themestek-import-demo-import-demo-do-process').each(function(){
		
		var main_wrapper = jQuery(this).closest('.import-demo-thumb-w');
		
		/*** Ajax process ***/
		jQuery(this).click(function() {
			
			if( $(this).attr('disabled') == 'disabled' ) {
				return false;
			}
			
			jQuery('.themestek-demo-import-close-w').hide();
			
			var main_wrapper = jQuery(this).closest('.import-demo-thumb-w');
			
			jQuery('.import-demo-thumb-w a.button').addClass('disabled');
			jQuery('.import-demo-thumb-w button.button').prop('disabled', true);
			jQuery('.import-demo-thumb-img-overlay' ).fadeOut();
			jQuery('.import-demo-thumb-img-overlay', main_wrapper ).fadeIn();
			
			
			var main_wrapper = jQuery(this).closest('.import-demo-thumb-w');
			var resultDiv = $('.themestek-import-demo-conformation', main_wrapper);
			
			// Layout Type
			var layout_type_name = jQuery(this).data('demo');
			var layout_type		 = jQuery(this).data('demo').toLowerCase().replace(' ', '-');
			
			console.log( 'Processing: ' + layout_type );
			
			// adding loader in image
			$( '.import-demo-thumb-img', main_wrapper).addClass('import-demo-thumb-processing');
			
			
			// Hide buttons
			$( '.themestek-import-demo-buttons', main_wrapper).hide();
			
			
			//var button = $(this);
			//var resultDiv = $('.import-demo-data-text');
			
			resultDiv.addClass('themestek-import-demo-progress'); /* Adding loader class */
			
		
			$.ajax({
				url: ajaxurl,
				type: "POST",
				dataType: "json",
				data: {
					'action'		: 'liviza_install_demo_data',
					'layout_type'	: layout_type,
					'subaction'		: 'start'
				},
				beforeSend: function() {
					//resultDiv.html('<p id="install-demo-data-started">' + livizaVars.strInstallingDemoData + '</p>').show().removeClass('error');
					resultDiv.html('<p id="install-demo-data-started">Starting <strong>'+layout_type_name+'</strong> Demo Content Setup</p>').show().removeClass('error');
				},
				success: function( result ) {
					
					jQuery(".themestek-import-demo-progress").each( function(){
						jQuery(this).scrollTop( jQuery(this)[0].scrollHeight );
					});
					
					
					function demoInstallerStep( result ) {
						
						if( result != null && typeof( result ) == 'object' ) {
						
							if( result.answer == 'ok' ) {
							
								resultDiv.append('<p>' + result.message + '</p>');
								
								/*** Extra data for next processing ***/
								var missing_menu_items = '';
								if( typeof result.missing_menu_items != "undefined" ){
									missing_menu_items = result.missing_menu_items;
								}
								
								var processed_terms = '';
								if( typeof result.processed_terms != "undefined" ){
									processed_terms = result.processed_terms;
								}
								
								var processed_posts = '';
								if( typeof result.processed_posts != "undefined" ){
									processed_posts = result.processed_posts;
								}
								
								var processed_menu_items = '';
								if( typeof result.processed_menu_items != "undefined" ){
									processed_menu_items = result.processed_menu_items;
								}
								
								var menu_item_orphans = '';
								if( typeof result.menu_item_orphans != "undefined" ){
									menu_item_orphans = result.menu_item_orphans;
								}
								
								var url_remap = '';
								if( typeof result.url_remap != "undefined" ){
									url_remap = result.url_remap;
								}
								
								var featured_images = '';
								if( typeof result.featured_images != "undefined" ){
									featured_images = result.featured_images;
								}
								/***********************************/
								
								
								
								
								$.ajax({
									url: ajaxurl,
									type: "POST",
									dataType: "json",
									data: {
										'action'		: 'liviza_install_demo_data',
										'layout_type'	: layout_type,
										'subaction'		: result.next_subaction,
										'data'			: result.data,
										'missing_menu_items'   : result.missing_menu_items,
										'processed_terms'      : result.processed_terms,
										'processed_posts'      : result.processed_posts,
										'processed_menu_items' : result.processed_menu_items,
										'menu_item_orphans'    : result.menu_item_orphans,
										'url_remap'            : result.url_remap,
										'featured_images'      : featured_images
									},
									success: function( result ) {
										
										demoInstallerStep( result );
										
										jQuery(".themestek-import-demo-progress").each( function(){
											jQuery(this).scrollTop( jQuery(this)[0].scrollHeight );
										});
									},
									error: function(request, status, error) {
										//resultDiv.html( '<p><strong style="color: red">' + livizaVars.strError + ": " + request.status + '</p>' );
										resultDiv.html( '<p><strong style="color: red"> Error: ' + request.status + '</p>' );
										//button.removeAttr('disabled');
									}
								});
							
							}
						
							if( result.answer == 'finished' ) {
								//$('#install-demo-data-started').remove();
								
								jQuery('.import-demo-thumb-img-overlay i').removeClass('fa-cog fa-spin').addClass('fa-check');
								
								if( result.reload == 'yes' ){
									resultDiv.append('<p><strong>All finished :) ... Please wait while we are saving the settings... </strong></p>');
									
									window.location = window.location.href + '&tsdemosuccess=yes';
									window.location.href = window.location.href + '&tsdemosuccess=yes';
									
									
									
									
								} else {
									resultDiv.append('<p><strong>All finished... Enjoy :)</strong></p>');
									
								}
								
								//button.removeAttr('disabled');
							}
						
						} else {
						
							resultDiv.append( '<p><strong style="color: red">' + livizaVars.strError + ":</strong> " + livizaVars.strWrongServerAnswer + '</p>' ).addClass('error');
							//button.removeAttr('disabled');
							$('#install-demo-data-started').remove();
							
						}
						
					}

					demoInstallerStep( result );
			
				},
				error: function(request, status, error) {
					resultDiv.html( '<p><strong style="color: red">: ERROR ' + request.status + '</p>' );
					console.log( 'Error: ' + error );
				}
			});
			
			return false;
		

		});
		
		
		
	});
	
	
	
	/*******************************************/
	
	
	// Remove query string from URL
	var currurl = window.location.href;
	if (currurl.indexOf('tsdemosuccess=yes') > -1) {
		currurl = currurl.replace('&tsdemosuccess=yes', '');
		window.history.pushState( {urlPath:currurl} , 'Liviza Options < Liviza - WordPress', currurl );
	}
	
	
	
	
	
	// On change the dropdown to select the demo client like to import 
	/*
	jQuery( "#import-layout-type" ).change(function() {
		var selected = jQuery(this).val().toLowerCase().replace(' ', '-');
		jQuery('.import-demo-thumb-w').css('display','none');
		jQuery( '.import-demo-thumb-'+selected ).css('display','inline-block');
	});
	*/
	
	
	
	
}); // document.ready END