<?php
	// Getting data of the  Facts in Digits box
	global $themestek_global_sbox_element_values;
	if( is_array($themestek_global_sbox_element_values) ) :
?>
<div class="themestek-ihbox themestek-ihbox-<?php echo themestek_sanitize_html_classes($themestek_global_sbox_element_values['boxstyle']); ?> <?php echo themestek_sanitize_html_classes($themestek_global_sbox_element_values['main-class']); ?>">
	<div class="themestek-sbox-bgimage-layer themestek-bgimage-layer"></div>
	<div class="themestek-ihbox-wrapper-bg-layer themestek-bg-layer"></div>
	<div class="themestek-ihbox-inner">
		<div class="themestek-ihbox-table">
			<div class="themestek-ihbox-icon  themestek-icon-skincolor">
				<?php echo themestek_wp_kses($themestek_global_sbox_element_values['icon_html'], 'sbox_icon'); ?>
			</div>
			<?php echo themestek_wp_kses( $themestek_global_sbox_element_values['heading_html'] ); ?>
		</div>
		<div class="themestek-ihbox-contents">

			<?php echo themestek_wp_kses( $themestek_global_sbox_element_values['content_html'] ); ?>
			<?php echo themestek_wp_kses( $themestek_global_sbox_element_values['button_html'] ); ?>
		</div><!-- .themestek-ihbox-contents -->
	</div>
</div>
<?php
	endif;
	// Resetting data of the Facts in Digits box
	$themestek_global_sbox_element_values = '';
?>