<?php
	// jquery circle progress bar library
	wp_enqueue_script('jquery-circle-progress');

	// Getting data of the  Facts in Digits box
	global $themestek_global_fid_element_values;

	if( is_array($themestek_global_fid_element_values) ) :

		// Getting skin color
		global $liviza_theme_options;
		$skincolor = ( !empty($liviza_theme_options['skincolor']) ) ? $liviza_theme_options['skincolor'] : '#78c63e' ;

?>

<div class="themestek-fid inside themestek-fid-boxstyle-style4 <?php echo themestek_sanitize_html_classes($themestek_global_fid_element_values['main-class']); ?>">

	<div class="themestek-fld-contents">
		<div class="themestek-circle-outer"
			data-digit			= "<?php echo esc_attr($themestek_global_fid_element_values['digit']); ?>"
			data-fill			= "<?php echo esc_attr($skincolor); ?>"
			data-before			= "<?php echo esc_attr($themestek_global_fid_element_values['before_text']); ?>"
			data-before-type	= "<?php echo esc_attr($themestek_global_fid_element_values['beforetextstyle']); ?>"
			data-after			= "<?php echo esc_attr($themestek_global_fid_element_values['after_text']); ?>"
			data-after-type		= "<?php echo esc_attr($themestek_global_fid_element_values['aftertextstyle']); ?>"
			data-size			= "100"
			data-emptyfill		= "#99c2f0"
			data-thickness		= "7"
			data-gradient		= ""
			>
			<div class="themestek-circle-w">
				<div class="themestek-circle"></div>
				<div class="themestek-circle-overlay">
					<div class="themestek-circle-number"></div>
				</div>
			</div>
			<div class="themestek-fid-title-w">
				<h3 class="themestek-fid-title"><span><?php echo esc_attr($themestek_global_fid_element_values['title']); ?><br></span></h3>
			</div>
		</div>
	</div><!-- .themestek-fld-contents -->

</div>

<?php

	endif;

	// Resetting data of the Facts in Digits box
	$themestek_global_fid_element_values = '';
?>