<?php
global $liviza_theme_options;
$search_input     = ( !empty($liviza_theme_options['search_input']) ) ? esc_html($liviza_theme_options['search_input']) :  esc_html_x("WRITE SEARCH WORD...", 'Search placeholder word', 'liviza');
$searchform_title = ( isset($liviza_theme_options['searchform_title']) ) ? esc_html($liviza_theme_options['searchform_title']) :  esc_html_x("Hi, How Can We Help You?", 'Search form title word', 'liviza');
$search_logo = ( !empty($liviza_theme_options['logoimg_search']['full-url']) ) ? '<div class="themestek-search-logo"><img src="' . esc_url($liviza_theme_options['logoimg_search']['full-url']) . '" alt="' . esc_attr(get_bloginfo('name')) . '" /></div>' : '' ;
if( !empty($searchform_title) ){
	$searchform_title = '<div class="themestek-form-title">' . esc_html($searchform_title) . '</div>';
}
?>
<div class="themestek-search-overlay">
		<?php echo themestek_wp_kses($searchform_title); ?>
		<div class="themestek-icon-close"></div>
	<div class="themestek-search-outer">
		<?php echo themestek_wp_kses($search_logo); ?>
		<form method="get" class="themestek-site-searchform" action="<?php echo esc_url( home_url() ); ?>">
			<input type="search" class="field searchform-s" name="s" placeholder="<?php echo esc_attr($search_input); ?>" />
			<button type="submit"><span class="themestek-liviza-icon-search"></span></button>
		</form>
	</div>
</div>