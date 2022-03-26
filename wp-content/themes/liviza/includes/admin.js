/**
 *  Admin custom JS file
 */
"use strict";
// Header Style - Change options based on selected header style on click
function themestek_header_style_change_triggers(){

	jQuery('.cs-element.cs-element-select-header-style.themestek-header-style .cs-field-image-select').append('<div class="themestek-header-style-checkbox themestek-header-style-checkbox-off">  </div>');

	jQuery('.cs-element.cs-element-select-header-style.themestek-header-style .cs-field-image-select .themestek-header-style-checkbox').on('click', function(){
		if( jQuery(this).hasClass('themestek-header-style-checkbox-off') ){
			jQuery(this).removeClass('themestek-header-style-checkbox-off').addClass('themestek-header-style-checkbox-on');
		} else {
			jQuery(this).removeClass('themestek-header-style-checkbox-on').addClass('themestek-header-style-checkbox-off');
		}
	});

	// Default value
	var topbar_bg_color					= 'darkgrey';
	var topbar_text_color				= 'white';
	var header_btn_text					= '';
	var header_btn_link					= '';
	var mainmenu_active_link_color		= 'skin';
	var mainmenufont_tt					= 'uppercase';
	var header_height					= '105';
	var mainmenufont_color				= '#222d35';
	var stickymainmenufontcolor_color	= '#222d35';
	var header_menu_position			= 'right';
	var titlebar_bg_color				= 'darkgrey'
	var titlebar_height					= '200';
	var titlebar_view					= 'left';
	var titlebar_text_color				= 'white';
	var header_bg_color					= 'darkgrey';
	var sticky_header_bg_color			= 'darkgrey';
	var header_menu_bg_color			= 'skincolor';
	var header_menuarea_height			= '70';

	jQuery('input[name="liviza_theme_options[headerstyle]"]').change(function() {

		if( jQuery('.themestek-header-style-checkbox').hasClass('themestek-header-style-checkbox-on') ){
			if (this.value == 'classic') {
				jQuery('input[name="liviza_theme_options[show_topbar]"]').prop('checked', true);  // Hide topbar
				jQuery('select[name="liviza_theme_options[topbar_bg_color]"]').val('white').change();
				jQuery('select[name="liviza_theme_options[topbar_text_color]"]').val('dark').change();
				jQuery('input[name="liviza_theme_options[header_btn][header_btn_text]"]').val('Apply Now');
				jQuery('input[name="liviza_theme_options[header_btn][header_btn_link]"]').val('#');
				jQuery('select[name="liviza_theme_options[mainmenu_active_link_color]"]').val(mainmenu_active_link_color).change();
				jQuery('select[name="liviza_theme_options[mainmenufont][text-transform]"]').val(mainmenufont_tt).change();
				jQuery('input[name="liviza_theme_options[header_height]"]').val(header_height);
				jQuery('input[name="liviza_theme_options[mainmenufont][color]"').iris('color', mainmenufont_color);  //
				jQuery('input[name="liviza_theme_options[stickymainmenufontcolor]"').iris('color', stickymainmenufontcolor_color);  // 			
				jQuery('select[name="liviza_theme_options[header_menu_position]"]').val(header_menu_position).change();
				jQuery('select[name="liviza_theme_options[titlebar_bg_color]"]').val(titlebar_bg_color).change();
				jQuery('input[name="liviza_theme_options[titlebar_height]"]').val(titlebar_height);			
				jQuery('select[name="liviza_theme_options[titlebar_view]"]').val(titlebar_view).change();
				jQuery('select[name="liviza_theme_options[titlebar_text_color]"]').val(titlebar_text_color).change();
				jQuery('input[name="liviza_theme_options[header_search]"]').prop('checked', false);
				themestek_change_logo();
				themestek_change_sticky_logo();
				jQuery('select[name="liviza_theme_options[header_bg_color]"]').val('white').change();
				jQuery('select[name="liviza_theme_options[sticky_header_bg_color]"]').val('white').change();
	
			} else if (this.value == 'infostack') {
				jQuery('input[name="liviza_theme_options[show_topbar]"]').prop('checked', false);  // Hide topbar
				jQuery('select[name="liviza_theme_options[topbar_bg_color]"]').val(topbar_bg_color).change();
				jQuery('select[name="liviza_theme_options[topbar_text_color]"]').val(topbar_text_color).change();
				jQuery('input[name="liviza_theme_options[header_btn][header_btn_text]"]').val('Get a Free Pass');
				jQuery('input[name="liviza_theme_options[header_btn][header_btn_link]"]').val('#');
				jQuery('select[name="liviza_theme_options[mainmenu_active_link_color]"]').val('custom').change();
				jQuery('select[name="liviza_theme_options[mainmenufont][text-transform]"]').val('uppercase').change();
				jQuery('input[name="liviza_theme_options[header_height]"]').val('130');
				jQuery('select[name="liviza_theme_options[header_menuarea_height]"]').val('65');
				jQuery('input[name="liviza_theme_options[mainmenufont][color]"').iris('color', '#ffffff');  //
				jQuery('select[name="liviza_theme_options[header_menu_bg_color]"]').val(header_menu_bg_color).change();
				jQuery('input[name="liviza_theme_options[stickymainmenufontcolor]"').iris('color', '#ffffff');  // 
				jQuery('select[name="liviza_theme_options[header_menu_position]"]').val(header_menu_position).change();
				jQuery('select[name="liviza_theme_options[titlebar_bg_color]"]').val(titlebar_bg_color).change();
				jQuery('input[name="liviza_theme_options[titlebar_height]"]').val('500');
				jQuery('select[name="liviza_theme_options[titlebar_view]"]').val(titlebar_view).change();
				jQuery('select[name="liviza_theme_options[titlebar_text_color]"]').val(titlebar_text_color).change();
				jQuery('input[name="liviza_theme_options[header_search]"]').prop('checked', false);
				themestek_change_logo();
				themestek_change_sticky_logo();
				jQuery('select[name="liviza_theme_options[header_bg_color]"]').val('white').change();
				jQuery('select[name="liviza_theme_options[sticky_header_bg_color]"]').val('white').change();
	
			} else if (this.value == 'classic-overlay') {
				jQuery('input[name="liviza_theme_options[show_topbar]"]').prop('checked', true);  // Show topbar
				jQuery('select[name="liviza_theme_options[topbar_bg_color]"]').val('darkgrey').change();
				jQuery('select[name="liviza_theme_options[topbar_text_color]"]').val('white').change();
				jQuery('input[name="liviza_theme_options[header_btn][header_btn_text]"]').val('Apply Now');
				jQuery('input[name="liviza_theme_options[header_btn][header_btn_link]"]').val('');
				jQuery('select[name="liviza_theme_options[mainmenu_active_link_color]"]').val('custom').change();
				jQuery('select[name="liviza_theme_options[mainmenufont][text-transform]"]').val('uppercase').change();
				jQuery('input[name="liviza_theme_options[header_height]"]').val(header_height);
				jQuery('input[name="liviza_theme_options[mainmenufont][color]"').iris('color', '#ffffff');  //
				jQuery('input[name="liviza_theme_options[stickymainmenufontcolor]"').iris('color', '#ffffff');  // 
				jQuery('select[name="liviza_theme_options[header_menu_position]"]').val('left').change();
				jQuery('select[name="liviza_theme_options[titlebar_bg_color]"]').val(titlebar_bg_color).change();
				jQuery('input[name="liviza_theme_options[titlebar_height]"]').val('700');
				jQuery('select[name="liviza_theme_options[titlebar_view]"]').val(titlebar_view).change();
				jQuery('select[name="liviza_theme_options[titlebar_text_color]"]').val('white').change();
				jQuery('input[name="liviza_theme_options[header_search]"]').prop('checked', true);
				themestek_change_logo( 'logo-white.png' );
				themestek_change_sticky_logo( 'logo-white.png' );
				jQuery('select[name="liviza_theme_options[header_bg_color]"]').val('transparent').change();
				jQuery('select[name="liviza_theme_options[sticky_header_bg_color]"]').val(sticky_header_bg_color).change();
	
			}
		}
	});
}
function themestek_change_logo( logo='logo.png' ){
	var curr_url     = location.href;
	var root_url     = curr_url.replace("wp-admin/admin.php?page=themestek-theme-options", "");
	var inputele_val = jQuery('input[name="liviza_theme_options[logoimg][full-url]"]').val();
	var parentele    = jQuery('input[name="liviza_theme_options[logoimg][full-url]"]').closest('.cs-fieldset');
	var newimgsrc    = root_url + 'wp-content/themes/liviza/images/' + logo;
	if( inputele_val == root_url + 'wp-content/themes/liviza/images/logo.png' || inputele_val == root_url + 'wp-content/themes/liviza/images/logo-white.png' ){
		// do change
		jQuery( '.cs-preview img', parentele ).attr('src', newimgsrc );
		jQuery( 'input[name="liviza_theme_options[logoimg][thumb-url]"]' ).attr( 'value', newimgsrc );
		jQuery( 'input[name="liviza_theme_options[logoimg][full-url]"]' ).attr(  'value', newimgsrc );
	}
}
function themestek_change_sticky_logo( logo='' ){
	var parentele    = jQuery('input[name="liviza_theme_options[logoimg_sticky][full-url]"]').closest('.cs-fieldset');
	if( logo!='' ){
		var curr_url     = location.href;
		var root_url     = curr_url.replace("wp-admin/admin.php?page=themestek-theme-options", "");
		var inputele_val = jQuery('input[name="liviza_theme_options[logoimg_sticky][full-url]"]').val();
		var newimgsrc    = root_url + 'wp-content/themes/liviza/images/' + logo;
		if( inputele_val == root_url + 'wp-content/themes/liviza/images/logo.png' || inputele_val == root_url + 'wp-content/themes/liviza/images/logo-white.png' || inputele_val=='' ){
			// do change
			jQuery( '.cs-preview img', parentele ).attr('src', newimgsrc );
			jQuery( 'input[name="liviza_theme_options[logoimg_sticky][thumb-url]"]' ).attr( 'value', newimgsrc );
			jQuery( 'input[name="liviza_theme_options[logoimg_sticky][full-url]"]' ).attr(  'value', newimgsrc );
		}
	} else {
		// do change
		jQuery( '.cs-remove', parentele ).trigger('click');
	}
}
function themestek_change_titlebar_bgimage( imagesrc='titlebar-bg.jpg' ){
	var curr_url     = location.href;
	var root_url     = curr_url.replace("wp-admin/admin.php?page=themestek-theme-options", "");
	var inputele_val = jQuery('input[name="liviza_theme_options[titlebar_background][image]"]').val();
	var parentele    = jQuery('input[name="liviza_theme_options[titlebar_background][image]"]').closest('.cs-fieldset');
	var newimgsrc    = root_url + 'wp-content/themes/liviza/images/' + imagesrc;
	if( inputele_val == root_url + 'wp-content/themes/liviza/images/titlebar-bg.jpg' || inputele_val == root_url + 'wp-content/themes/liviza/images/titlebar-overlay-bg.jpg' ){
		// do change
		jQuery( '.cs-preview img', parentele ).attr('src', newimgsrc );
		jQuery( 'input[name="liviza_theme_options[titlebar_background][image]"]' ).attr( 'value', newimgsrc );
	}
}
/**
 *  Codestar Framework : themestek_background JS
 */
jQuery.fn.THEMESTEK_CSFRAMEWORK_BG_IMAGE_UPLOADER = function($) {
    return this.each(function() {
	var $this      = jQuery(this),
		$add       = $this.find('.cs-add'),
		$preview   = $this.find('.cs-image-preview'),
		$noimgtext = $this.find('.themestek-cs-background-heading-noimg'),
		$closeicon = $this.find('.themestek-cs-remove'),
		$remove    = $this.find('.cs-remove'),
		$input     = $this.find('input.themestek-background-image'),
		$inputid   = $this.find('input.themestek-background-imageid'),
		$img       = $this.find('img'),
		$btntitleadd    = $this.find('.themestek-cs-background-text-add-image').text(),
		$btntitlechange = $this.find('.themestek-cs-background-text-change-image').text(),
		wp_media_frame;
      $add.on('click', function( e ) {
        e.preventDefault();
        // Check if the `wp.media.gallery` API exists.
        if ( typeof wp === 'undefined' || ! wp.media || ! wp.media.gallery ) {
          return;
        }
        // If the media frame already exists, reopen it.
        if ( wp_media_frame ) {
          wp_media_frame.open();
          return;
        }
        // Create the media frame.
        wp_media_frame = wp.media({
          library: {
            type: 'image'
          }
        });
        // When an image is selected, run a callback.
        wp_media_frame.on( 'select', function() {
          var attachment = wp_media_frame.state().get('selection').first().attributes;
          var thumbnail  = ( typeof attachment.sizes.thumbnail !== 'undefined' ) ? attachment.sizes.thumbnail.url : attachment.url;
          $img.removeClass('hidden');
		  $closeicon.removeClass('hidden');
		  $noimgtext.addClass('hidden');
          $img.attr('src', thumbnail);
          $input.val( attachment.url ).trigger('change');
		  $inputid.val( attachment.id ).trigger('change');
			$add.text($btntitlechange);
        });
        // Finally, open the modal.
        wp_media_frame.open();
      });
      // Remove image
      $remove.on('click', function( e ) {
        e.preventDefault();
        $input.val('').trigger('change');
		$inputid.val('').trigger('change');
        $img.addClass('hidden');
		$closeicon.addClass('hidden');
		$noimgtext.removeClass('hidden');
		$add.text($btntitleadd);
      });
    });
  };
/**
 *  Codestar Framework : themestek_typography JS
 */
  jQuery.fn.THEMESTEK_CSFRAMEWORK_TYPOGRAPHY = function() {
    return this.each( function() {
      var typography      = jQuery(this),
          family_select   = typography.find('.cs-typo-family'),
          varianthemestek_select = typography.find('.cs-typo-variant'),
          typography_type = typography.find('.cs-typo-font');
      family_select.on('change', function() {
        var _this     = jQuery(this),
            _type     = _this.find(':selected').data('type') || 'custom',
            _variants = _this.find(':selected').data('variants');
        if( varianthemestek_select.length ) {
          varianthemestek_select.find('option').remove();
          jQuery.each( _variants.split('|'), function( key, text ) {
            varianthemestek_select.append('<option value="'+ text +'">'+ text +'</option>');
          });
          varianthemestek_select.find('option[value="regular"]').attr('selected', 'selected').trigger('chosen:updated');
        }
        typography_type.val(_type);
      });
    });
  };
/**
 *  themestek_image
 */
  jQuery.fn.THEMESTEK_CSFRAMEWORK_IMAGE_UPLOADER = function() {
    return this.each(function() {
      var $this     = jQuery(this),
          $add      = $this.find('.cs-add'),
          $preview  = $this.find('.cs-image-preview'),
          $remove   = $this.find('.cs-remove'),
          $input    = $this.find('input.themestek-cs-imgid'),
		  $thumbimg = $this.find('input.themestek-cs-thumburl'),
		  $fullimg  = $this.find('input.themestek-cs-fullurl'),
          $img      = $this.find('img'),
          wp_media_frame;
      $add.on('click', function( e ) {
        e.preventDefault();
        // Check if the `wp.media.gallery` API exists.
        if ( typeof wp === 'undefined' || ! wp.media || ! wp.media.gallery ) {
          return;
        }
        // If the media frame already exists, reopen it.
        if ( wp_media_frame ) {
          wp_media_frame.open();
          return;
        }
        // Create the media frame.
        wp_media_frame = wp.media({
          library: {
            type: 'image'
          }
        });
        // When an image is selected, run a callback.
        wp_media_frame.on( 'select', function() {
          var attachment = wp_media_frame.state().get('selection').first().attributes;
          var thumbnail  = ( typeof attachment.sizes.thumbnail !== 'undefined' ) ? attachment.sizes.thumbnail.url : attachment.url;
		  var fullimg    = ( typeof attachment.sizes.full.url !== 'undefined' ) ? attachment.sizes.full.url : '';
          $preview.removeClass('hidden');
          $img.attr('src', thumbnail);
          $input.val( attachment.id ).trigger('change');
		  $fullimg.val( fullimg ).trigger('change');
		  $thumbimg.val( thumbnail ).trigger('change');
        });
        // Finally, open the modal.
        wp_media_frame.open();
      });
      // Remove image
      $remove.on('click', function( e ) {
        e.preventDefault();
        $input.val('').trigger('change');
		$fullimg.val('').trigger('change');
		$thumbimg.val('').trigger('change');
        $preview.addClass('hidden');
      });
    });
  };
/**
 *  Titlebar text custom color show/hide
 */
function themestek_show_hide_titlebar_textcolor(){
	var $this      = jQuery( 'select[name="liviza_theme_options[titlebar_text_color]"]' );
	var $page_this = jQuery( 'select[name="_themestek_metabox_group[titlebar_text_color]"]' );
	if( $this.length > 0 ){
		if( jQuery($this).val()=='custom' ){
			jQuery( 'input[name="liviza_theme_options[titlebar_heading_font][color]"]' ).closest('.themestek-typography-font-color-w').show();
			jQuery( 'input[name="liviza_theme_options[titlebar_subheading_font][color]"]' ).closest('.themestek-typography-font-color-w').show();
			jQuery( 'input[name="liviza_theme_options[titlebar_breadcrumb_font][color]"]' ).closest('.themestek-typography-font-color-w').show();
		} else {
			jQuery( 'input[name="liviza_theme_options[titlebar_heading_font][color]"]' ).closest('.themestek-typography-font-color-w').hide();
			jQuery( 'input[name="liviza_theme_options[titlebar_subheading_font][color]"]' ).closest('.themestek-typography-font-color-w').hide();
			jQuery( 'input[name="liviza_theme_options[titlebar_breadcrumb_font][color]"]' ).closest('.themestek-typography-font-color-w').hide();
		}
	}
	if( $page_this.length > 0 ){
		if( jQuery($page_this).val()=='custom' ){
			jQuery( 'input[name="_themestek_metabox_group[titlebar_heading_font][color]"]' ).closest('.themestek-typography-font-color-w').show();
			jQuery( 'input[name="_themestek_metabox_group[titlebar_subheading_font][color]"]' ).closest('.themestek-typography-font-color-w').show();
			jQuery( 'input[name="_themestek_metabox_group[titlebar_breadcrumb_font][color]"]' ).closest('.themestek-typography-font-color-w').show();
		} else {
			jQuery( 'input[name="_themestek_metabox_group[titlebar_heading_font][color]"]' ).closest('.themestek-typography-font-color-w').hide();
			jQuery( 'input[name="_themestek_metabox_group[titlebar_subheading_font][color]"]' ).closest('.themestek-typography-font-color-w').hide();
			jQuery( 'input[name="_themestek_metabox_group[titlebar_breadcrumb_font][color]"]' ).closest('.themestek-typography-font-color-w').hide();
		}
	}
}
/**
 *  Titlebar bg custom color show/hide
 */
function themestek_show_hide_titlebar_bgcolor(){
	var $page_this = jQuery( 'select[name="_themestek_metabox_group[titlebar_bg_color]"]' );
	if( $page_this.length > 0 ){
		if( jQuery($page_this).val()=='custom' ){
			jQuery( 'input[name="_themestek_metabox_group[titlebar_background][color]"]' ).closest('.themestek-background-color-w').show();
		} else {
			jQuery( 'input[name="_themestek_metabox_group[titlebar_background][color]"]' ).closest('.themestek-background-color-w').hide();
		}
	}
}
/**
 *  This is for background with custom color dropdown.. This will will show/hide color picker from the background options.
 */
function themestek_show_hide_color_picker_background(){
	var items = [
		/* ['dropdown_id',         'background_id'], */
		['fbar_bg_color',          'fbar_background'],
		['titlebar_bg_color',      'titlebar_background'],
		['full_footer_bg_color',   'full_footer_bg_all'],
		['first_footer_bg_color',  'first_footer_bg_all'],
		['second_footer_bg_color', 'second_footer_bg_all'],
		['bottom_footer_bg_color', 'bottom_footer_bg_all']
	];
	jQuery(items).each(function(n,val){
		var dropdown_name   = val[0];
		var background_name = val[1];
		var $dropdown_element   = jQuery( 'select[name="liviza_theme_options['+dropdown_name+']"]' );
		// show/hide the color picker on load
		if( $dropdown_element.val()=='custom' ){
			jQuery( 'input[name="liviza_theme_options['+background_name+'][color]"]' ).closest('.themestek-background-color-w').show();
		} else {
			jQuery( 'input[name="liviza_theme_options['+background_name+'][color]"]' ).closest('.themestek-background-color-w').hide();
		}
		// on change of the dropdown
		$dropdown_element.change(function() {  // Theme Options
			if( jQuery(this).val()=='custom' ){
				jQuery( 'input[name="liviza_theme_options['+background_name+'][color]"]' ).closest('.themestek-background-color-w').show();
			} else {
				jQuery( 'input[name="liviza_theme_options['+background_name+'][color]"]' ).closest('.themestek-background-color-w').hide();
			}
		});
	});
}
/**
 *  Blog Post Format - Move the Gallery Meta Box to the Gallery Tab content so user can select images directly from Gallery tab.
 */
function themestek_gallery_post_format(){
	// moving the gallery meta box after the gallery box
	jQuery("#cfpf-format-gallery-preview").after( jQuery("#_themestek_metabox_gallery") );
	// hide all box by defualt
	jQuery("#_themestek_metabox_gallery").hide();
	jQuery("#cfpf-format-gallery-preview").hide();
	jQuery( '#cfpf-format-gallery-preview > label' ).hide();
	jQuery( '#cfpf-format-gallery-preview > .cfpf-gallery-options' ).hide();
	// show/hide if gallery post format
	if( jQuery('input[name="post_format"]:checked').val() == 'gallery' ){
		jQuery("#_themestek_metabox_gallery").show();
	}
	jQuery('input[name="post_format"]').change(function() {
		if( this.value == 'gallery' ){
			jQuery("#_themestek_metabox_gallery").show();
		} else {
			jQuery("#_themestek_metabox_gallery").hide();
		}
	});
}
/**
 *  Document Ready Init
 */
jQuery(document).ready( function() {
	// stickey header in theme options
	jQuery(".cs-header").stick_in_parent();
	// CS custom elements
	jQuery('.cs-field-themestek_background', this).THEMESTEK_CSFRAMEWORK_BG_IMAGE_UPLOADER();
	jQuery('.cs-field-themestek_typography', this).THEMESTEK_CSFRAMEWORK_TYPOGRAPHY();
	jQuery('.cs-field-themestek_image', this).THEMESTEK_CSFRAMEWORK_IMAGE_UPLOADER();
	// Titlebar Text Color - Show / Hide color for Text color option
	themestek_show_hide_titlebar_textcolor();
	jQuery( 'select[name="liviza_theme_options[titlebar_text_color]"]' ).change(function() {  // Theme Options
		themestek_show_hide_titlebar_textcolor();
	});
	jQuery( 'select[name="_themestek_metabox_group[titlebar_text_color]"]' ).change(function() {  // Page Meta Box Option
		themestek_show_hide_titlebar_textcolor();
	});
	// Titlebar BG Color - Show / Hide color for bg color option
	themestek_show_hide_titlebar_bgcolor()
	jQuery( 'select[name="_themestek_metabox_group[titlebar_bg_color]"]' ).change(function() {  // Page Meta Box Option
		themestek_show_hide_titlebar_bgcolor();
	});
	/**
	 *  Codestar Framework : themestek_skin_color JS
	 */
	jQuery('.cs-field-themestek_skin_color').each(function(){
		var $this = jQuery(this);
		jQuery( '.themestek-skin-color-list a', $this ).on('click', function() {
			var color = jQuery(this).css('background-color');
			jQuery('.wp-color-picker', $this ).iris('color', color);
			return false;
		});
	});
	/**
	 *  Add class in page loading option
	 */
	jQuery('*[data-depend-id="loaderimg_1"]').closest('.cs-field-image-select').addClass('themestek-pre-loader-option-wrapper');
	jQuery('input[type=radio][name="liviza_theme_options[loaderimg]"]:checked').closest('label').addClass('themestek-pre-loader-option-selected');
	jQuery('input[type=radio][name="liviza_theme_options[loaderimg]"]').change(function() {
		jQuery('input[type=radio][name="liviza_theme_options[loaderimg]"]').closest('label').removeClass('themestek-pre-loader-option-selected');
		jQuery(this).closest('label').addClass('themestek-pre-loader-option-selected');
		return true;
	});
	// Post formats - Move Gallery meta box in Gallery tab
	themestek_gallery_post_format();
	/**
	 *  Icon picker init on adding new group in TS Progress Bar
	 */
	if ( typeof vc != 'undefined' && typeof vc.atts != 'undefined' ) {
		vc.atts.themestek_iconpicker = {
			init: function ( param, $wrapper ) {
				if (typeof tste_inducstco_icon_picker != 'undefined') {
					tste_inducstco_icon_picker();
				}
			}
		};
	}
	// on ajax complete
	jQuery( document ).ajaxComplete(function( event, xhr, settings ) {
		if (typeof tste_inducstco_icon_picker != 'undefined') {
			tste_inducstco_icon_picker();
		}
	});
	/* For all background options - linking dropdown with all color picker for CUSTOM option.. so the color picker will be visiable only when custom color is selected */
	themestek_show_hide_color_picker_background();
});  // document.ready
/**
 *  Window Load init
 */
jQuery( window ).on( 'load', function() {
	// Header Styles - change values of some options on change of the header style
	themestek_header_style_change_triggers();
	// Post formats - Open Gallery meta box if closed
	if( jQuery(".js #_themestek_metabox_gallery").hasClass('closed') ){
		jQuery(".js #_themestek_metabox_gallery button.handlediv").trigger('click');
	}
	// Codestar - Remove DISABLED and adding READONLY to the export textarea
	jQuery('textarea[name="_nonce"]').prop("readonly", true);
	jQuery('textarea[name="_nonce"]').removeAttr('disabled');
});  // window.load
