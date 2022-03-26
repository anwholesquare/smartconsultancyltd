<?php
	// Getting data of the  Facts in Digits box
	global $themestek_global_ptbox_element_values;
	if( is_array($themestek_global_ptbox_element_values) ) :
?>
<div class="themestek-ptablebox themestek-ptablebox-<?php echo themestek_sanitize_html_classes($themestek_global_ptbox_element_values['boxstyle']); ?> <?php echo themestek_sanitize_html_classes($themestek_global_ptbox_element_values['main-class']); ?>">
	<?php echo themestek_wp_kses($themestek_global_ptbox_element_values['featured_text']); ?>
	<div class="themestek-ptable-main">
		<!-- <div class="themestek-ptable-icon">
			<?php echo themestek_wp_kses($themestek_global_ptbox_element_values['icon_html']); ?>
		</div> -->
		<h3 class="themestek-ptable-heading"><?php echo esc_html($themestek_global_ptbox_element_values['heading']); ?></h3>
		<div class="themestek-des">Here goes some description</div>
		<div class="themestek-sep"></div>
		<div class="themestek-ptable-price-w">
			<?php echo themestek_wp_kses($themestek_global_ptbox_element_values['cur_symbol_before']); ?>
			<div class="themestek-ptable-price"><?php echo esc_html($themestek_global_ptbox_element_values['price']); ?></div>
			<?php echo themestek_wp_kses($themestek_global_ptbox_element_values['cur_symbol_after']); ?>		
			<div class="themestek-ptable-frequency"><?php echo esc_html($themestek_global_ptbox_element_values['price_frequency']); ?></div>
		</div>
	</div>
	<div class="themestek-ptablebox-colum themestek-ptablebox-featurebox">
		<?php echo themestek_wp_kses($themestek_global_ptbox_element_values['lines_html']); ?>
	</div>
	<?php if( !empty($themestek_global_ptbox_element_values['btn_title']) ){ ?>
		<?php echo do_shortcode('[themestek-btn color="inverse" title="'. esc_attr($themestek_global_ptbox_element_values['btn_title']).'" link="'.esc_attr($themestek_global_ptbox_element_values['btn_link']).'"]'); ?>
	<?php } ?>
</div>
<?php
	endif;
	// Resetting data of the Pricing Table box
	$themestek_global_ptbox_element_values = '';
?>