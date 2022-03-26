<?php
	// Getting data of the  Facts in Digits box
	global $themestek_global_fid_element_values;
	if( is_array($themestek_global_fid_element_values) ) :
?>
<div class="themestek-fid inside themestek-fid-boxstyle-without-icon <?php echo themestek_sanitize_html_classes($themestek_global_fid_element_values['main-class']); ?>">
	<div class="themestek-fld-contents">
		<div class="themestek-fld-contents-wrap">
			<div class="themestek-fid-inner">			
				<span
					data-appear-animation = "animateDigits"
					data-from             = "0"
					data-to               = "<?php echo esc_html($themestek_global_fid_element_values['digit']); ?>"
					data-interval         = "<?php echo esc_html($themestek_global_fid_element_values['interval']); ?>"
					>
						<?php echo esc_html($themestek_global_fid_element_values['digit']); ?>
				</span><?php echo themestek_wp_kses($themestek_global_fid_element_values['after_text']); ?>
			</div>
			<h3 class="themestek-fid-title"><span><?php echo esc_html($themestek_global_fid_element_values['title']); ?><br></span></h3>
		</div>
	</div><!-- .themestek-fld-contents -->
</div>
<?php
	endif;
	// Resetting data of the Facts in Digits box
	$themestek_global_fid_element_values = '';
?>