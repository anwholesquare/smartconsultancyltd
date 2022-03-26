<?php
/*
 * Plugin Name: ThemeStek Extras for Liviza Theme
 * Plugin URI: http://www.themestek.com
 * Description: ThemeStek Plugin for Liviza Theme
 * Version: 2.6
 * Author: ThemeStek
 * Author URI: http://www.themestek.com
 * Text Domain: tste
 * Domain Path: /languages
 */

 
/**
 *  TSTE = ThemeStek Theme Extras
 */
define( 'THEMESTEK_LIVIZA_VERSION', '2.6' );
define( 'THEMESTEK_LIVIZA_DIR', trailingslashit( dirname( __FILE__ ) ) );
define( 'THEMESTEK_LIVIZA_URI', plugins_url( '', __FILE__ ) );


if( !function_exists('liviza_init_widgets') ){
function liviza_init_widgets(){
	// Theme Widgets
	require THEMESTEK_LIVIZA_DIR.'widgets/widgets.php';
}
}
add_action( 'widgets_init', 'liviza_init_widgets' );


/**
 *  Codestar Framework core files
 */
function tste_liviza_cs_framework_init(){
	defined('CS_OPTION'          ) or define('CS_OPTION',           'liviza');
	defined('CS_ACTIVE_FRAMEWORK') or define('CS_ACTIVE_FRAMEWORK', true    ); // default true
	defined('CS_ACTIVE_METABOX'  ) or define('CS_ACTIVE_METABOX',   true    ); // default true
	defined('CS_ACTIVE_SHORTCODE') or define('CS_ACTIVE_SHORTCODE', true    ); // default true
	defined('CS_ACTIVE_CUSTOMIZE') or define('CS_ACTIVE_CUSTOMIZE', true    ); // default true
	
	// CS Framework
	include THEMESTEK_LIVIZA_DIR.'cs-framework/cs-framework.php';
	
	// VC Section templates
	include THEMESTEK_LIVIZA_DIR.'vc-templates/vc-templates-functions.php';
	
	// Make shortcode work in text widget
	//add_filter('widget_text', 'do_shortcode');
	add_filter('widget_text', 'do_shortcode', 11);
	
}
add_action( 'init', 'tste_liviza_cs_framework_init', 2 );




/**
 *  Codestar Framework core files
 */
function tste_header_css(){
	echo '
<style>
th#themestek_featured_image, td.themestek_featured_image {
    width: 115px !important;
}
td.themestek_featured_image img{
    max-width: 75px;
	height: auto;
}
</style>
';
}
add_action( 'admin_head', 'tste_header_css' );






add_action( 'plugins_loaded', 'themestek_liviza_load_textdomain' );
/**
 * Load plugin textdomain.
 *
 * @since 1.0.0
 */
function themestek_liviza_load_textdomain() {
	load_plugin_textdomain( 'tste', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' ); 
}



/**
 *  Shortcodes
 */
require_once THEMESTEK_LIVIZA_DIR . 'icon-picker/icon-picker.php';




/**
 *  Custom Post Types - With Post Meta Boxes
 */
if( function_exists('vc_map') ){
    require_once THEMESTEK_LIVIZA_DIR . 'vc/themestek_attach_image/themestek_attach_image.php';
	require_once THEMESTEK_LIVIZA_DIR . 'vc/themestek_iconpicker/themestek_iconpicker.php';
	require_once THEMESTEK_LIVIZA_DIR . 'vc/themestek_imgselector/themestek_imgselector.php';
	require_once THEMESTEK_LIVIZA_DIR . 'vc/themestek_css_editor/themestek_css_editor.php';
}
if( file_exists( get_template_directory() . '/includes/core.php' ) ){
	require_once get_template_directory() . '/includes/core.php';
} else {
	require_once THEMESTEK_LIVIZA_DIR . 'core.php';
}
require_once THEMESTEK_LIVIZA_DIR . 'custom-post-types/themestek-portfolio.php';
require_once THEMESTEK_LIVIZA_DIR . 'custom-post-types/themestek-coaching.php';
require_once THEMESTEK_LIVIZA_DIR . 'custom-post-types/themestek-service.php';
require_once THEMESTEK_LIVIZA_DIR . 'custom-post-types/themestek-team.php';
require_once THEMESTEK_LIVIZA_DIR . 'custom-post-types/themestek-reviews.php';
require_once THEMESTEK_LIVIZA_DIR . 'custom-post-types/themestek-client.php';




/**
 *  Shortcodes
 */
require_once THEMESTEK_LIVIZA_DIR . 'shortcodes.php';


/**
 *  Demo content setup
 */
require_once THEMESTEK_LIVIZA_DIR . 'demo-content-setup/demo-content-setup.php';





function tste_rewrite_flush() {
    // ATTENTION: This is *only* done during plugin activation hook
    flush_rewrite_rules();
}
register_activation_hook( __FILE__, 'tste_rewrite_flush' );




/**
 * Enqueue scripts and styles
 */
if( !function_exists('tste_liviza_scripts_styles') ){
function tste_liviza_scripts_styles() {
	wp_enqueue_script( 'jquery-resize', THEMESTEK_LIVIZA_URI . '/js/jquery-resize.min.js', array( 'jquery' ) );
}
}
add_action( 'wp_enqueue_scripts', 'tste_liviza_scripts_styles' );





/**
 * Admin Enqueue scripts and styles
 */
function tste_liviza_admin_scripts_styles(){
	wp_register_script( 'tste-liviza-vc-templates', THEMESTEK_LIVIZA_URI . '/vc-templates/themestek-custom-vc-templates.js' , array( 'jquery' ) );
	wp_register_style( 'tste-liviza-style', THEMESTEK_LIVIZA_URI . '/css/tmte-style.css' );
	
	wp_localize_script( 'tste-liviza-vc-templates', 'THEMESTEK_LIVIZA_EXTRAS',
		array(
			'THEMESTEK_LIVIZA_URI' => esc_url( THEMESTEK_LIVIZA_URI ),
			'THEMESTEK_LIVIZA_DIR' => esc_url( THEMESTEK_LIVIZA_DIR ),
		)
	);

	wp_enqueue_script( 'tste-liviza-vc-templates' );
	wp_enqueue_style( 'tste-liviza-style' );
}
add_action( 'admin_enqueue_scripts', 'tste_liviza_admin_scripts_styles' );






/**
 * @param $param_value
 * @param string $prefix
 *
 * @since 4.2
 * @return string
 */
if( !function_exists('themestek_vc_shortcode_custom_css_class') ){
function themestek_vc_shortcode_custom_css_class( $param_value, $prefix = '' ) {
	$css_class = preg_match( '/\s*\.([^\{]+)\s*\{\s*([^\}]+)\s*\}\s*/', $param_value ) ? $prefix . preg_replace( '/\s*\.([^\{]+)\s*\{\s*([^\}]+)\s*\}\s*/', '$1', $param_value ) : '';
	return $css_class;
}
}


/**
 *  This function will do encoding things. The encode function is not allowed in theme so we created function in plugin
 */
if( !function_exists('themestek_enc_data') ){
function themestek_enc_data( $htmldata='' ) {
	return base64_encode($htmldata);
}
}


/**
 *  URL Encode
 */
if( !function_exists('themestek_url_encode') ){
function themestek_url_encode( $url='' ) {
	return urlencode($url);
}
}


/************** Start Plugin Options settings ************************/




/**
 *  This will create option link and option page
 */
if( !function_exists('tste_liviza_register_options_page') ){
function tste_liviza_register_options_page() {
	add_options_page(
		esc_attr__('Liviza Extra Options', 'tste'),  // Page title in TITLE tag
		esc_attr__('Liviza Extra Options', 'tste'),  // heading on page
		'manage_options',
		'tste-liviza',
		'tste_liviza_options_page'
	);
}
}
add_action('admin_menu', 'tste_liviza_register_options_page');


/**
 *  Save plugin options
 */
if( !function_exists('tste_liviza_register_settings') ){
function tste_liviza_register_settings() {
	
	// Social share for Blog
	register_setting( 'tste_liviza_options_group', 'tste_liviza_social_share_blog', 'tste_liviza_social_share_blog_callback' );
	//add_option( 'tste_liviza_option_name', 'This is my option value.');
	
	// Social share for Portfolio
	register_setting( 'tste_liviza_options_group', 'tste_liviza_social_share_portfolio', 'tste_liviza_social_share_portfolio_callback' );
	//add_option( 'tste_liviza_option_name', 'This is my option value.');

	// Enable TGMPA update message
	$theme_name				= get_template();
	$theme_data				= wp_get_theme( $theme_name );
	$theme_version			= $theme_data->get( 'Version' );
	$stored_theme_version	= get_option('tstk_liviza_version');
	$user_id				= get_current_user_id();
	if( $theme_name == 'liviza' && $theme_version != $stored_theme_version ){
		delete_user_meta( $user_id, 'tgmpa_dismissed_notice_tgmpa' );
		update_option( 'tstk_liviza_version', $theme_version );
	}
}
}
add_action( 'admin_init', 'tste_liviza_register_settings' );




if( !function_exists('tste_liviza_social_share_blog_callback') ){
function tste_liviza_social_share_blog_callback( $data ){
	// Save settings to theme options so we can re-use it
	$liviza_toptions = get_option('liviza_theme_options');
	if( !empty($liviza_toptions['post_social_share_services']) ){
		$liviza_toptions['post_social_share_services'] = $data;
		update_option('liviza_theme_options', $liviza_toptions);
	}
	return $data;
}
}



if( !function_exists('tste_liviza_social_share_portfolio_callback') ){
function tste_liviza_social_share_portfolio_callback( $data ){
	// Save settings to theme options so we can re-use it
	$liviza_toptions = get_option('liviza_theme_options');
	if( !empty($liviza_toptions['portfolio_social_share_services']) ){
		$liviza_toptions['portfolio_social_share_services'] = $data;
		update_option('liviza_theme_options', $liviza_toptions);
	}
	return $data;
}
}






if( !function_exists('tste_liviza_options_page') ){
function tste_liviza_options_page(){
	
	// Commong elements
	$liviza_toptions	= get_option('liviza_theme_options');
	$social_list	= array(
						'Facebook'		=> 'facebook',
						'Twitter'		=> 'twitter',
						'Google Plus'	=> 'gplus',
						'Pinterest'		=> 'pinterest',
						'LinkedIn'		=> 'linkedin',
						'Stumbleupon'	=> 'stumbleupon',
						'Tumblr'		=> 'tumblr',
						'Reddit'		=> 'reddit',
						'Digg'			=> 'digg',
					);
	
	
	
	?>
	<div class="wrap"> 
		<?php screen_icon(); ?>
		<h1>Liviza Extra Options</h1>
		
		<form method="post" action="options.php">
		
			<?php settings_fields( 'tste_liviza_options_group' ); ?>

			<p>This page will set some extra options for Liviza theme. So it will be stored even when you change theme.</p>
			<br><br>
			
			
			<h2>Select Social Share Service (for single Post or Portfolio)</h2>
			<p>The selected social service icon will be visible on single view so user can share on social sites.</p>
			<table class="form-table">
				<tr valign="top">
					<th scope="row"><label for="tste_liviza_option_name"> Select Social Share Service for Blog Section </label></th>
					<td>
						<p>
						
						<?php
						
						// Getting from Theme Options
						$tste_liviza_social_share_blog = array();
						if( !empty($liviza_toptions['post_social_share_services']) ){
							$tste_liviza_social_share_blog = $liviza_toptions['post_social_share_services'];
							
						}
						
						// Now setting checkboxes in Plugin Options
						foreach( $social_list as $social_name=>$social_slug ){
							$checked = '';
							if( is_array($tste_liviza_social_share_blog) && in_array( $social_slug, $tste_liviza_social_share_blog ) ){
								$checked = 'checked="checked"';
							}
							echo '<label><input name="tste_liviza_social_share_blog[]" type="checkbox" value="'.$social_slug.'" '.$checked.'> ' . $social_name . '</label> <br/>';
						}
						
						?>
						
						</p>
					</td>
				</tr>
				
				
				
				
				
				<!-- ---------- -->
				<tr valign="top">
					<th scope="row"><label for="tste_liviza_option_name"> Select Social Share Service for Portfolio Section </label></th>
					<td>
						<p>
						
						<?php
						
						// Getting from Theme Options
						$tste_liviza_social_share_portfolio = array();
						if( !empty($liviza_toptions['portfolio_social_share_services']) ){
							$tste_liviza_social_share_portfolio = $liviza_toptions['portfolio_social_share_services'];
							
						}
						
						// Now setting checkboxes in Plugin Options
						foreach( $social_list as $social_name=>$social_slug ){
							$checked = '';
							if( is_array($tste_liviza_social_share_portfolio) && in_array( $social_slug, $tste_liviza_social_share_portfolio ) ){
								$checked = 'checked="checked"';
							}
							echo '<label><input name="tste_liviza_social_share_portfolio[]" type="checkbox" value="'.$social_slug.'" '.$checked.'> ' . $social_name . '</label> <br/>';
						}
						
						?>
						
						</p>
					</td>
				</tr>
				
				
				
				
			</table>
			<?php  submit_button(); ?>
		</form>
		
	</div>
	<?php
}
}



/*******
 *  Social Share links creations
 */
if ( !function_exists( 'themestek_social_share_links' ) ){
function themestek_social_share_links( $post_type='portfolio' ){
	$post_type = esc_html($post_type);
	if( !empty($post_type) ){
		$post_type       = esc_html($post_type);
		$social_services = themestek_get_option( $post_type.'_social_share_services' );
		$return          = '';
		if( !empty( $social_services ) && is_array( $social_services ) ){
			foreach( $social_services as $social ){
				switch($social){
					case 'facebook':
						$link = '//web.facebook.com/sharer/sharer.php?u='.urlencode(get_permalink()). '&_rdr';
						break;
					case 'twitter':
						$link = '//twitter.com/share?url='. get_permalink();
						break;
					case 'gplus':
						$link = '//plus.google.com/share?url='. get_permalink();
						break;
					case 'pinterest':
						$link = '//www.pinterest.com/pin/create/button/?url='. get_permalink();
						break;
					case 'linkedin':
						$link = '//www.linkedin.com/shareArticle?mini=true&url='. get_permalink();
						break;
					case 'stumbleupon':
						$link = '//stumbleupon.com/submit?url='. get_permalink();
						break;
					case 'tumblr':
						$link = '//tumblr.com/share/link?url='. get_permalink();
						break;
					case 'reddit':
						$link = '//reddit.com/submit?url='. get_permalink();
						break;
					case 'digg':
						$link = '//www.digg.com/submit?url='. get_permalink();
						break;
				} // switch end here
				// Now preparing the icon
				$return .= '<li class="themestek-social-share themestek-social-share-'. $social .'" data-ts-service="' . esc_attr($social) . '" data-ts-service-url="' . esc_url($link) . '">
				<a href="#"><i class="themestek-liviza-icon-'. sanitize_html_class($social) .'"></i></a>
				</li>';
			}  // foreach
		} // if
		// preparing final output
		if( $return != '' ){
			$return = '<div class="themestek-social-share-links"><ul>'. $return .'</ul></div>';
		}
	}
	// return data
	return $return;
}
}





// Show Featured image in the admin section
add_filter( 'manage_post_posts_columns', 'themestek_post_set_featured_image_column' );
add_action( 'manage_post_posts_custom_column' , 'themestek_post_set_featured_image_column_content', 10, 2 );
if ( ! function_exists( 'themestek_post_set_featured_image_column' ) ) {
function themestek_post_set_featured_image_column($columns) {
	$new_columns = array();
	foreach( $columns as $key=>$val ){
		$new_columns[$key] = $val;
		if( $key=='title' ){
			$new_columns['themestek_featured_image'] = esc_attr__( 'Featured Image', 'liviza' );
		}
	}
	return $new_columns;
}
}
if ( ! function_exists( 'themestek_post_set_featured_image_column_content' ) ) {
function themestek_post_set_featured_image_column_content( $column, $post_id ) {
	if( $column == 'themestek_featured_image' ){
		if ( has_post_thumbnail($post_id) ) {
			the_post_thumbnail('thumbnail');
		} else {
			echo '<img style="max-width:75px;height:auto;" src="' . THEMESTEK_LIVIZA_URI . '/images/admin-no-image.png" />';
		}
	}
}
}





if( !function_exists('themestek_author_socials') ){
function themestek_author_socials( $contactsethods ) {
	$contactsethods['twitter']  = esc_html__( 'Twitter Link', 'liviza' );  // Add Twitter
	$contactsethods['facebook'] = esc_html__( 'Facebook Link', 'liviza' );  //add Facebook
	$contactsethods['linkedin'] = esc_html__( 'LinkedIn Link', 'liviza' );  //add LinkedIn
	$contactsethods['gplus']    = esc_html__( 'Google Plus Link', 'liviza' );  //add Google Plus
	return $contactsethods;
}
}
add_filter('user_contactmethods','themestek_author_socials', 20);





/**
 *  Login page logo link
 */
if( !function_exists('themestek_loginpage_custom_link') ){
function themestek_loginpage_custom_link() {
	return esc_url( home_url( '/' ) );
}
}
add_filter('login_headerurl','themestek_loginpage_custom_link');






/**
 * Login page logo link title
 */
if( !function_exists('themestek_change_title_on_logo') ){
function themestek_change_title_on_logo() {
	return esc_attr( get_bloginfo( 'name', 'display' ) );
}
}
add_filter('login_headertext', 'themestek_change_title_on_logo');






/**
 *  add skincolor class style
 */
add_action( 'admin_head', 'themestek_admin_skincolor_css' );
function themestek_admin_skincolor_css(){
	global $liviza_theme_options;
	
	$liviza_theme_options = get_option('liviza_theme_options');
	
	$skincolor_default = '#000';  //change this with default skin color
	
	if( function_exists('themestek_get_option') ){
		$skincolor_default = themestek_get_option('skincolor');
	}
	
	if( !empty($liviza_theme_options['skincolor']) && empty($skincolor_default) ){
		$skincolor_default = $liviza_theme_options['skincolor'];
	}
	
	$skincolor = (!empty($liviza_theme_options['skincolor'])) ? $liviza_theme_options['skincolor'] : $skincolor_default ;
	
	?>
	<style>
	
		.cs-framework.cs-option-framework .button:not(.wp-color-result):not(.ed_button){
			width: auto !important;
			text-shadow: none !important;
			box-shadow: none !important;
			color: #ffffff !important;
			border: none;
		}
		.cs-framework.cs-option-framework .button.button-primary:not(.wp-color-result):not(.ed_button){
			width: auto !important;
			text-shadow: none !important;
			box-shadow: none !important;
			color: #fff !important;
			border: none;
		}
		.cs-framework.cs-option-framework .button span.wp-media-buttons-icon:before{
			color: inherit;
		}
	
	
	
		.themestek_vc_colored-dropdown .skincolor,
		.vc_colored-dropdown .skincolor,
		.vc_btn3.vc_btn3-color-skincolor{  /* VC button */
			background-color: <?php echo esc_attr($skincolor); ?> !important;
			color: #fff !important;
		}
		.vc_btn3.vc_btn3-color-skincolor.vc_btn3-style-outline{
			color: <?php echo esc_attr($skincolor); ?> !important;
			border-color: <?php echo esc_attr($skincolor); ?> !important;
			background-color: transparent !important;
		}
		.vc_btn3.vc_btn3-color-skincolor.vc_btn3-style-3d {
			box-shadow: 0 4px rgba(<?php echo themestek_hex2rgb($skincolor); ?>, 0.73), 0 4px rgb(0, 0, 0) !important;
		}
		
		.vc_btn3.vc_btn3-style-text.vc_btn3-color-skincolor{ /* Normal Text style button */
			color: <?php echo esc_attr($skincolor); ?> !important;
			background-color: transparent !important;
		}
		
		/* VC Templates - Section template box style */
		body .vc_ui-panel-header-container,
		.themestek_vc_filters .cz_active,
		
		/* VC editor - in post page etc */
		.composer-switch,
		/*.composer-switch .logo-icon,
		.composer-switch a, .composer-switch a:visited,
		.composer-switch a.wpb_switch-to-front-composer, .composer-switch a:visited.wpb_switch-to-front-composer,*/
		.vc_navbar,
		.wp-pointer-content h3,

		/* VC Editor - new page message buttons */
		.vc_ui-button.vc_ui-button-info{
			background-color: <?php echo themestek_adjustBrightness($skincolor, '-25'); ?> !important;
		}
		
		
		/* Theme Options - buttons */
		.cs-framework .button:not(.wp-color-result):not(.ed_button){
			background-color: <?php echo themestek_adjustBrightness($skincolor, '-25'); ?> !important;
			color: white;
			border: none;
		}
		
		/* CS WYSIWYG editor - Add Media button */
		.cs-framework .wp-media-buttons .add_media span.wp-media-buttons-icon:before{
			color:white;
		}
		
		/* CS WYSIWYG editor - Add Shortcode button (primary) */
		.cs-framework a.button.button-primary.cs-shortcode{
			text-shadow:none;
			color: white;
			border: none !important;
			box-shadow: none !important;
		}
		
		.cs-framework .button.button-primary:not(.wp-color-result):not(.ed_button) {
			background-color: <?php echo themestek_adjustBrightness($skincolor, '-75'); ?> !important;
		}
		
		
		/*** VC Message Box - Border Color - Skincolor ***/
		.wp-pointer-content h3{
			border-color: <?php echo themestek_adjustBrightness($skincolor, '-25'); ?> !important;
		}
		
		
		/*** VC Message Box - Icon Color - Skincolor ***/
		.wp-pointer-content h3:before{
			color: <?php echo themestek_adjustBrightness($skincolor, '-25'); ?> !important;
		}
		
		
		.composer-switch .logo-icon,
		.composer-switch a, .composer-switch a:visited,
		.composer-switch a.wpb_switch-to-front-composer, .composer-switch a:visited.wpb_switch-to-front-composer {
			background-color: transparent !important;
		}
		.vc_navbar .vc_icon-btn:hover,
		.composer-switch a.wpb_switch-to-composer:hover,
		.composer-switch a:visited.wpb_switch-to-composer:hover,
		.composer-switch a.wpb_switch-to-front-composer:hover,
		.composer-switch a:visited.wpb_switch-to-front-composer:hover {
			background-color: rgba(255, 255, 255, 0.27) !important;
		}
		#wpb_visual_composer .vc_navbar,
		.wp-pointer-content h3{
			border-bottom: none !important;
		}
		
		/* VC - ThemeStek tab on instert element */
		.themestek-tab-main {
			font-weight: bold !important;
		}
		
		
		
		
	</style>
	
	
	<script>
	jQuery( document ).ready(function($) {
		$( "button:contains('THEMESTEK')" ).addClass('themestek-tab-main');
	});
	</script>
	
	<?php
	
}



if( !function_exists('themestek_adjustBrightness') ){
function themestek_adjustBrightness($hex, $steps) {
    // Steps should be between -255 and 255. Negative = darker, positive = lighter
    $steps = max(-255, min(255, $steps));

    // Format the hex color string
    $hex = str_replace('#', '', $hex);
    if (strlen($hex) == 3) {
        $hex = str_repeat(substr($hex,0,1), 2).str_repeat(substr($hex,1,1), 2).str_repeat(substr($hex,2,1), 2);
    }

    // Get decimal values
    $r = hexdec(substr($hex,0,2));
    $g = hexdec(substr($hex,2,2));
    $b = hexdec(substr($hex,4,2));

    // Adjust number of steps and keep it inside 0 to 255
    $r = max(0,min(255,$r + $steps));
    $g = max(0,min(255,$g + $steps));  
    $b = max(0,min(255,$b + $steps));

    $r_hex = str_pad(dechex($r), 2, '0', STR_PAD_LEFT);
    $g_hex = str_pad(dechex($g), 2, '0', STR_PAD_LEFT);
    $b_hex = str_pad(dechex($b), 2, '0', STR_PAD_LEFT);

    return '#'.$r_hex.$g_hex.$b_hex;
}
}








/**
 *  Create New Param Type : Info
 */
if( function_exists('vc_add_shortcode_param') ){
	vc_add_shortcode_param( 'themestek_info', 'themestek_vc_param_info' );
	function themestek_vc_param_info( $settings, $value ) {
		$return  = '';
		$head    = ( !empty($settings['head']) ) ? '<h2 class="themestek_vc_info_heading">'.$settings['head'].'</h2>' : '' ;
		$subhead = ( !empty($settings['subhead']) ) ? '<h4 class="themestek_vc_info_subheading">'.$settings['subhead'].'</h4>' : '' ;
		$desc    = ( !empty($settings['desc']) ) ? '<div class="themestek_vc_info_desc">'.$settings['desc'].'</div>' : '' ;
		
		
		
		
		$return .= '<div class="themestek_vc_param_info '.$settings['param_name'].'">'
					. '<div class="themestek_vc_param_info_inner">'
						. $head
						. $subhead
						. $desc 
					. '</div>'
			   . '</div>'; // This is html markup that will be outputted in content elements edit form
	   return $return;
	}
}








/*************** theme-style.css generator *******************/


function themestek_theme_css() {
	$liviza_theme_options = get_option('liviza_theme_options');
	
	header("Content-Type: text/css");
	ob_start();
	include get_template_directory().'/css/theme-style.php'; // Fetching theme-style.php output and store in a variable
	$css    = ob_get_clean();
	
	
	// Minify CSS style
	if( isset( $liviza_theme_options['minify'] ) && esc_attr($liviza_theme_options['minify'])==true && function_exists('themestek_minify_css') ){
		$css = themestek_minify_css( $css );
	}
	
	// output
	echo $css;
	
	exit;
}
add_action('wp_ajax_themestek_theme_css', 'themestek_theme_css');
add_action('wp_ajax_nopriv_themestek_theme_css', 'themestek_theme_css');


function tmte_load_dynamic_style(){
	$skincolor = '';
	if( is_page() || is_singular() ){
		$themestek_metabox_group = get_post_meta( get_the_ID(), '_themestek_metabox_group', true ); // fetching all post meta
		if( !empty($themestek_metabox_group['skincolor']) ){
			$skincolor = '&color=' . str_replace('#', '', $themestek_metabox_group['skincolor'] );
		}
	}
	wp_dequeue_style('tste-liviza-theme-style');
	wp_enqueue_style('tste-liviza-theme-style', admin_url('admin-ajax.php').'?action=themestek_theme_css'.$skincolor);
}
add_action( 'wp_enqueue_scripts', 'tmte_load_dynamic_style', 20 );






/**
 *  Remove type attribute from script and style tags
 */
 
function themestek_is_login_page() {
    return in_array($GLOBALS['pagenow'], array('wp-login.php', 'wp-register.php'));
}

if( !themestek_is_login_page() && !is_admin() ){

	add_filter('style_loader_tag', 'themestek_remove_type_attr', 10, 2);
	add_filter('script_loader_tag', 'themestek_remove_type_attr', 10, 2);
	
	// remove from all script and style tags
	if( !function_exists('themestek_remove_type_attr') ){
	function themestek_remove_type_attr($tag, $handle) {
		return preg_replace( "/type=['\"]text\/(javascript|css)['\"]/", '', $tag );
	}
	}
	
	// Remove form body content and head content
	add_action('wp_loaded', 'themestek_output_buffer_start');
	function themestek_output_buffer_start() { 
		ob_start("themestek_output_callback"); 
	}
	add_action('shutdown', 'themestek_output_buffer_end');
	function themestek_output_buffer_end() { 
		if (ob_get_contents()){ ob_end_flush(); }
	}
	function themestek_output_callback($buffer) {
		return preg_replace( "%[ ]type=[\'\"]text\/(javascript|css)[\'\"]%", '', $buffer );
	}
	
}





/**
 *  Disabling VC welcome page redirection
 */
function themestek_disable_vc_welcome(){
	delete_transient( '_vc_page_welcome_redirect' );
}
add_action( 'admin_init', 'themestek_disable_vc_welcome', 1 );






/**
 * Register widget areas.
 *
 * @since Liviza 1.0
 *
 * @return void
 */
function liviza_widgets_init() {
	
	$liviza_theme_options = get_option('liviza_theme_options');
	
	$pf_type_title_singular     = ( !empty($liviza_theme_options['pf_type_title_singular'])      ) ? $liviza_theme_options['pf_type_title_singular']               : esc_attr__('Portfolio', 'liviza' ) ;
	$pf_cat_title_singular      = ( !empty($liviza_theme_options['pf_cat_title_singular'])       ) ? $liviza_theme_options['pf_cat_title_singular']                : esc_attr__('Portfolio Category', 'liviza' ) ;

	$ch_type_title_singular     = ( !empty($liviza_theme_options['ch_type_title_singular'])      ) ? $liviza_theme_options['ch_type_title_singular']               : esc_attr__('Coaching', 'liviza' ) ;
	$ch_cat_title_singular      = ( !empty($liviza_theme_options['ch_cat_title_singular'])       ) ? $liviza_theme_options['ch_cat_title_singular']                : esc_attr__('Coaching Category', 'liviza' ) ;

	$service_title_singular     = ( !empty($liviza_theme_options['service_type_title_singular']) ) ? $liviza_theme_options['service_type_title_singular']          : esc_attr__('Service', 'liviza' ) ;
	$service_cat_title_singular = ( !empty($liviza_theme_options['service_cat_title_singular'])  ) ? esc_attr($liviza_theme_options['service_cat_title_singular']) : esc_attr__('Service Category', 'liviza') ;
	$team_member_title_singular = ( !empty($liviza_theme_options['team_type_title_singular'])    ) ? esc_attr($liviza_theme_options['team_type_title_singular'])   : esc_attr__('Team Member', 'liviza') ;
	$team_group_title_singular  = ( !empty($liviza_theme_options['team_group_title_singular'])   ) ? esc_attr($liviza_theme_options['team_group_title_singular'])  : esc_attr__('Team Group', 'liviza') ;

	
	register_sidebar( array(
		'name'			=> esc_attr__( 'Left Sidebar for Blog', 'liviza' ),
		'id'			=> 'sidebar-left-blog',
		'description'	=> esc_attr__( 'This is left sidebar for blog section', 'liviza' ),
		'before_widget'	=> '<aside id="%1$s" class="widget %2$s">',
		'after_widget'	=> '</aside>',
		'before_title'	=> '<h3 class="widget-title">',
		'after_title'	=> '</h3>',
	) );

	register_sidebar( array(
		'name'			=> esc_attr__( 'Right Sidebar for Blog', 'liviza' ),
		'id'			=> 'sidebar-right-blog',
		'description'	=> esc_attr__( 'This is right sidebar for blog section', 'liviza' ),
		'before_widget'	=> '<aside id="%1$s" class="widget %2$s">',
		'after_widget'	=> '</aside>',
		'before_title'	=> '<h3 class="widget-title">',
		'after_title'	=> '</h3>',
	) );
	
	register_sidebar( array(
		'name'			=> esc_attr__( 'Left Sidebar for Pages', 'liviza' ),
		'id'			=> 'sidebar-left-page',
		'description'	=> esc_attr__( 'This is left sidebar for pages', 'liviza' ),
		'before_widget'	=> '<aside id="%1$s" class="widget %2$s">',
		'after_widget'	=> '</aside>',
		'before_title'	=> '<h3 class="widget-title">',
		'after_title'	=> '</h3>',
	) );

	register_sidebar( array(
		'name'			=> esc_attr__( 'Right Sidebar for Pages', 'liviza' ),
		'id'			=> 'sidebar-right-page',
		'description'	=> esc_attr__( 'This is right sidebar for pages', 'liviza' ),
		'before_widget'	=> '<aside id="%1$s" class="widget %2$s">',
		'after_widget'	=> '</aside>',
		'before_title'	=> '<h3 class="widget-title">',
		'after_title'	=> '</h3>',
	) );
	
	// Portfolio - Left
	register_sidebar( array(
		'name'			=> sprintf( esc_attr__( 'Left Sidebar for %1$s', 'liviza' ), $pf_type_title_singular ),
		'id'			=> 'sidebar-left-portfolio',
		'description'	=> esc_attr__( 'This is left sidebar for Portfolio', 'liviza' ),
		'before_widget'	=> '<aside id="%1$s" class="widget %2$s">',
		'after_widget'	=> '</aside>',
		'before_title'	=> '<h3 class="widget-title">',
		'after_title'	=> '</h3>',
	) );
	// Portfolio - Right
	register_sidebar( array(
		'name'			=> sprintf( esc_attr__( 'Right Sidebar for %1$s', 'liviza' ), $pf_type_title_singular ),
		'id'			=> 'sidebar-right-portfolio',
		'description'	=> esc_attr__( 'This is right sidebar for Portfolio', 'liviza' ),
		'before_widget'	=> '<aside id="%1$s" class="widget %2$s">',
		'after_widget'	=> '</aside>',
		'before_title'	=> '<h3 class="widget-title">',
		'after_title'	=> '</h3>',
	) );
	// Portfolio Category - Left
	register_sidebar( array(
		'name'			=> sprintf( esc_attr__( 'Left Sidebar for %1$s', 'liviza' ), $pf_cat_title_singular ),
		'id'			=> 'sidebar-left-portfoliocat',
		'description'	=> esc_attr__( 'This is left sidebar for Portfolio Category pages.', 'liviza' ),
		'before_widget'	=> '<aside id="%1$s" class="widget %2$s">',
		'after_widget'	=> '</aside>',
		'before_title'	=> '<h3 class="widget-title">',
		'after_title'	=> '</h3>',
	) );
	// Portfolio Category - Right
	register_sidebar( array(
		'name'			=> sprintf( esc_attr__( 'Right Sidebar for %1$s', 'liviza' ), $pf_cat_title_singular ),
		'id'			=> 'sidebar-right-portfoliocat',
		'description'	=> esc_attr__( 'This is right sidebar for Portfolio Category pages.', 'liviza' ),
		'before_widget'	=> '<aside id="%1$s" class="widget %2$s">',
		'after_widget'	=> '</aside>',
		'before_title'	=> '<h3 class="widget-title">',
		'after_title'	=> '</h3>',
	) );





	// Coaching - Left
	register_sidebar( array(
		'name'			=> sprintf( esc_attr__( 'Left Sidebar for %1$s', 'liviza' ), $ch_type_title_singular ),
		'id'			=> 'sidebar-left-coaching',
		'description'	=> esc_attr__( 'This is left sidebar for Coaching', 'liviza' ),
		'before_widget'	=> '<aside id="%1$s" class="widget %2$s">',
		'after_widget'	=> '</aside>',
		'before_title'	=> '<h3 class="widget-title">',
		'after_title'	=> '</h3>',
	) );
	// Coaching - Right
	register_sidebar( array(
		'name'			=> sprintf( esc_attr__( 'Right Sidebar for %1$s', 'liviza' ), $ch_type_title_singular ),
		'id'			=> 'sidebar-right-coaching',
		'description'	=> esc_attr__( 'This is right sidebar for Coaching', 'liviza' ),
		'before_widget'	=> '<aside id="%1$s" class="widget %2$s">',
		'after_widget'	=> '</aside>',
		'before_title'	=> '<h3 class="widget-title">',
		'after_title'	=> '</h3>',
	) );
	// Coaching Category - Left
	register_sidebar( array(
		'name'			=> sprintf( esc_attr__( 'Left Sidebar for %1$s', 'liviza' ), $ch_cat_title_singular ),
		'id'			=> 'sidebar-left-coachingcat',
		'description'	=> esc_attr__( 'This is left sidebar for Coaching Category pages.', 'liviza' ),
		'before_widget'	=> '<aside id="%1$s" class="widget %2$s">',
		'after_widget'	=> '</aside>',
		'before_title'	=> '<h3 class="widget-title">',
		'after_title'	=> '</h3>',
	) );
	// Coaching Category - Right
	register_sidebar( array(
		'name'			=> sprintf( esc_attr__( 'Right Sidebar for %1$s', 'liviza' ), $ch_cat_title_singular ),
		'id'			=> 'sidebar-right-coachingcat',
		'description'	=> esc_attr__( 'This is right sidebar for Coaching Category pages.', 'liviza' ),
		'before_widget'	=> '<aside id="%1$s" class="widget %2$s">',
		'after_widget'	=> '</aside>',
		'before_title'	=> '<h3 class="widget-title">',
		'after_title'	=> '</h3>',
	) );





	
	// Service - Left
	register_sidebar( array(
		'name'			=> sprintf( esc_attr__( 'Left Sidebar for %1$s', 'liviza' ), $service_title_singular ),
		'id'			=> 'sidebar-left-service',
		'description'	=> esc_attr__( 'This is left sidebar for Service', 'liviza' ),
		'before_widget'	=> '<aside id="%1$s" class="widget %2$s">',
		'after_widget'	=> '</aside>',
		'before_title'	=> '<h3 class="widget-title">',
		'after_title'	=> '</h3>',
	) );
	// Service - Right
	register_sidebar( array(
		'name'			=> sprintf( esc_attr__( 'Right Sidebar for %1$s', 'liviza' ), $service_title_singular ),
		'id'			=> 'sidebar-right-service',
		'description'	=> esc_attr__( 'This is right sidebar for Service', 'liviza' ),
		'before_widget'	=> '<aside id="%1$s" class="widget %2$s">',
		'after_widget'	=> '</aside>',
		'before_title'	=> '<h3 class="widget-title">',
		'after_title'	=> '</h3>',
	) );
	// Service Category - Left
	register_sidebar( array(
		'name'			=> sprintf( esc_attr__( 'Left Sidebar for %1$s', 'liviza' ), $service_cat_title_singular ),
		'id'			=> 'sidebar-left-servicecat',
		'description'	=> esc_attr__( 'This is left sidebar for Service Category pages.', 'liviza' ),
		'before_widget'	=> '<aside id="%1$s" class="widget %2$s">',
		'after_widget'	=> '</aside>',
		'before_title'	=> '<h3 class="widget-title">',
		'after_title'	=> '</h3>',
	) );
	// Service Category - Right
	register_sidebar( array(
		'name'			=> sprintf( esc_attr__( 'Right Sidebar for %1$s', 'liviza' ), $service_cat_title_singular ),
		'id'			=> 'sidebar-right-servicecat',
		'description'	=> esc_attr__( 'This is right sidebar for Service Category pages.', 'liviza' ),
		'before_widget'	=> '<aside id="%1$s" class="widget %2$s">',
		'after_widget'	=> '</aside>',
		'before_title'	=> '<h3 class="widget-title">',
		'after_title'	=> '</h3>',
	) );
	
	
	// Team Member - Left
	register_sidebar( array(
		'name'			=> sprintf( esc_attr__( 'Left Sidebar for %1$s', 'liviza' ), $team_member_title_singular ),
		'id'			=> 'sidebar-left-team-member',
		'description'	=> esc_attr__( 'This is left sidebar for Team Member', 'liviza' ),
		'before_widget'	=> '<aside id="%1$s" class="widget %2$s">',
		'after_widget'	=> '</aside>',
		'before_title'	=> '<h3 class="widget-title">',
		'after_title'	=> '</h3>',
	) );
	
	// Team Member - Right
	register_sidebar( array(
		'name'			=> sprintf( esc_attr__( 'Right Sidebar for %1$s', 'liviza' ), $team_member_title_singular ),
		'id'			=> 'sidebar-right-team-member',
		'description'	=> esc_attr__( 'This is right sidebar for Team Member', 'liviza' ),
		'before_widget'	=> '<aside id="%1$s" class="widget %2$s">',
		'after_widget'	=> '</aside>',
		'before_title'	=> '<h3 class="widget-title">',
		'after_title'	=> '</h3>',
	) );
	// Team Member Group - Left
	register_sidebar( array(
		'name'			=> sprintf( esc_attr__( 'Left Sidebar for %1$s', 'liviza' ), $team_group_title_singular ),
		'id'			=> 'sidebar-left-team-member-group',
		'description'	=> esc_attr__( 'This is left sidebar for Team Member Group.', 'liviza' ),
		'before_widget'	=> '<aside id="%1$s" class="widget %2$s">',
		'after_widget'	=> '</aside>',
		'before_title'	=> '<h3 class="widget-title">',
		'after_title'	=> '</h3>',
	) );
	// Team Member Group - Right
	register_sidebar( array(
		'name'			=> sprintf( esc_attr__( 'Right Sidebar for %1$s', 'liviza' ), $team_group_title_singular ),
		'id'			=> 'sidebar-right-team-member-group',
		'description'	=> esc_attr__( 'This is right sidebar for Team Member Group', 'liviza' ),
		'before_widget'	=> '<aside id="%1$s" class="widget %2$s">',
		'after_widget'	=> '</aside>',
		'before_title'	=> '<h3 class="widget-title">',
		'after_title'	=> '</h3>',
	) );
	
	register_sidebar( array(
		'name'			=> esc_attr__( 'Left Sidebar for Search', 'liviza' ),
		'id'			=> 'sidebar-left-search',
		'description'	=> esc_attr__( 'This is left sidebar for search', 'liviza' ),
		'before_widget'	=> '<aside id="%1$s" class="widget %2$s">',
		'after_widget'	=> '</aside>',
		'before_title'	=> '<h3 class="widget-title">',
		'after_title'	=> '</h3>',
	) );
	register_sidebar( array(
		'name'			=> esc_attr__( 'Right Sidebar for search', 'liviza' ),
		'id'			=> 'sidebar-right-search',
		'description'	=> esc_attr__( 'This is right sidebar for search', 'liviza' ),
		'before_widget'	=> '<aside id="%1$s" class="widget %2$s">',
		'after_widget'	=> '</aside>',
		'before_title'	=> '<h3 class="widget-title">',
		'after_title'	=> '</h3>',
	) );
	
	if( function_exists('is_woocommerce') ){
		// WooCommerce - Left
		register_sidebar( array(
			'name' => esc_html__( 'Left Sidebar for WooCommerce Shop Page', 'liviza' ),
			'id' => 'sidebar-left-woocommerce',
			'description' => esc_html__( 'This is left sidebar for WooCommerce shop pages.', 'liviza' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget' => '</aside>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>',
		) );
		// WooCommerce - Right
		register_sidebar( array(
			'name' => esc_html__( 'Right Sidebar for WooCommerce Shop Page', 'liviza' ),
			'id' => 'sidebar-right-woocommerce',
			'description' => esc_html__( 'This is right sidebar for WooCommerce shop pages.', 'liviza' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget' => '</aside>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>',
		) );
	}

	if( function_exists('is_bbpress') ){
		// BBPress - Left
		register_sidebar( array(
			'name'          => esc_html__( 'Left Sidebar for BBPress', 'liviza' ),
			'id'            => 'sidebar-left-bbpress',
			'description'   => esc_html__( 'This is left sidebar for BBPress.', 'liviza' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) );
		// BBPress - Right
		register_sidebar( array(
			'name'          => esc_html__( 'Right Sidebar for BBPress', 'liviza' ),
			'id'            => 'sidebar-right-bbpress',
			'description'   => esc_html__( 'This is right sidebar for BBPress.', 'liviza' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) );
	}


	if( class_exists('Mp_Time_Table') ){
		// Timetable - Left
		register_sidebar( array(
			'name'          => esc_html__( 'Left Sidebar for TimeTable', 'liviza' ),
			'id'            => 'sidebar-left-timetable',
			'description'   => esc_html__( 'This is left sidebar for Timetable.', 'liviza' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) );
		// Timetable - Right
		register_sidebar( array(
			'name'          => esc_html__( 'Right Sidebar for Timetable', 'liviza' ),
			'id'            => 'sidebar-right-timetable',
			'description'   => esc_html__( 'This is right sidebar for Timetable.', 'liviza' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) );
		
	}


	// First Footer widgets
	register_sidebar( array(
		'name'			=> esc_attr__( 'First Footer - 1st Widget Area', 'liviza' ),
		'id'			=> 'first-footer-1-widget-area',
		'description'	=> esc_attr__( 'This is first footer widget area for first row of footer.', 'liviza' ),
		'before_widget'	=> '<aside id="%1$s" class="widget %2$s">',
		'after_widget'	=> '</aside>',
		'before_title'	=> '<h3 class="widget-title">',
		'after_title'	=> '</h3>',
	) );
	register_sidebar( array(
		'name'			=> esc_attr__( 'First Footer - 2nd Widget Area', 'liviza' ),
		'id'			=> 'first-footer-2-widget-area',
		'description'	=> esc_attr__( 'This is second footer widget area for first row of footer.', 'liviza' ),
		'before_widget'	=> '<aside id="%1$s" class="widget %2$s">',
		'after_widget'	=> '</aside>',
		'before_title'	=> '<h3 class="widget-title">',
		'after_title'	=> '</h3>',
	) );
	register_sidebar( array(
		'name'			=> esc_attr__( 'First Footer - 3rd Widget Area', 'liviza' ),
		'id'			=> 'first-footer-3-widget-area',
		'description'	=> esc_attr__( 'This is third footer widget area for first row of footer.', 'liviza' ),
		'before_widget'	=> '<aside id="%1$s" class="widget %2$s">',
		'after_widget'	=> '</aside>',
		'before_title'	=> '<h3 class="widget-title">',
		'after_title'	=> '</h3>',
	) );
	register_sidebar( array(
		'name'			=> esc_attr__( 'First Footer - 4th Widget Area', 'liviza' ),
		'id'			=> 'first-footer-4-widget-area',
		'description'	=> esc_attr__( 'This is fourth footer widget area for first row of footer.', 'liviza' ),
		'before_widget'	=> '<aside id="%1$s" class="widget %2$s">',
		'after_widget'	=> '</aside>',
		'before_title'	=> '<h3 class="widget-title">',
		'after_title'	=> '</h3>',
	) );
	
	// Second Footer widgets
	register_sidebar( array(
		'name'			=> esc_attr__( 'Second Footer - 1st Widget Area', 'liviza' ),
		'id'			=> 'second-footer-1-widget-area',
		'description'	=> esc_attr__( 'This is first footer widget area for second row of footer.', 'liviza' ),
		'before_widget'	=> '<aside id="%1$s" class="widget %2$s">',
		'after_widget'	=> '</aside>',
		'before_title'	=> '<h3 class="widget-title">',
		'after_title'	=> '</h3>',
	) );
	register_sidebar( array(
		'name'			=> esc_attr__( 'Second Footer - 2nd Widget Area', 'liviza' ),
		'id'			=> 'second-footer-2-widget-area',
		'description'	=> esc_attr__( 'This is second footer widget area for second row of footer.', 'liviza' ),
		'before_widget'	=> '<aside id="%1$s" class="widget %2$s">',
		'after_widget'	=> '</aside>',
		'before_title'	=> '<h3 class="widget-title">',
		'after_title'	=> '</h3>',
	) );
	register_sidebar( array(
		'name'			=> esc_attr__( 'Second Footer - 3rd Widget Area', 'liviza' ),
		'id'			=> 'second-footer-3-widget-area',
		'description'	=> esc_attr__( 'This is third footer widget area for second row of footer.', 'liviza' ),
		'before_widget'	=> '<aside id="%1$s" class="widget %2$s">',
		'after_widget'	=> '</aside>',
		'before_title'	=> '<h3 class="widget-title">',
		'after_title'	=> '</h3>',
	) );
	register_sidebar( array(
		'name'			=> esc_attr__( 'Second Footer - 4th Widget Area', 'liviza' ),
		'id'			=> 'second-footer-4-widget-area',
		'description'	=> esc_attr__( 'This is fourth footer widget area for second row of footer.', 'liviza' ),
		'before_widget'	=> '<aside id="%1$s" class="widget %2$s">',
		'after_widget'	=> '</aside>',
		'before_title'	=> '<h3 class="widget-title">',
		'after_title'	=> '</h3>',
	) );
	
	
	// Dynamic Sidebars (Unlimited Sidebars)
	global $liviza_theme_options;
	$liviza_theme_options = get_option('liviza_theme_options');
	if( isset($liviza_theme_options['custom_sidebars']) && is_array($liviza_theme_options['custom_sidebars']) && count($liviza_theme_options['custom_sidebars'])>0 ){
		foreach( $liviza_theme_options['custom_sidebars'] as $custom_sidebar ){
			
			if( isset($custom_sidebar['custom_sidebar']) && trim($custom_sidebar['custom_sidebar'])!='' ){
				$custom_sidebar = $custom_sidebar['custom_sidebar'];
				if( trim($custom_sidebar)!='' ){
					$custom_sidebar_key = sanitize_title($custom_sidebar);
					register_sidebar( array(
						'name'          => $custom_sidebar,
						'id'            => $custom_sidebar_key,
						'description'   => esc_attr__( 'This is custom widget developed from "Liviza Options".', 'liviza' ),
						'before_widget'	=> '<aside id="%1$s" class="widget %2$s">',
						'after_widget'  => '</aside>',
						'before_title'  => '<h3 class="widget-title">',
						'after_title'   => '</h3>',
					) );
				}
			}
			
		}
	}
	
}
add_action( 'widgets_init', 'liviza_widgets_init' );


/** Post Like ajax **/
add_action('wp_ajax_themestek-portfolio-likes', 'themestek_ajax_callback' );
add_action('wp_ajax_nopriv_themestek-portfolio-likes', 'themestek_ajax_callback' );
function themestek_ajax_callback(){
	if(isset($_POST['likes_id'])){
		$post_id = str_replace('pid-', '', $_POST['likes_id']);
		echo themestek_update_like( $post_id );
	}
	exit;
}
/**
 *  Reset LIKE counter
 */
function themestek_pf_reset_like(){
    $screen = get_current_screen();
    if ( $screen->post_type == 'themestek-portfolio' && isset($_GET['action']) && $_GET['action']=='edit' && !isset($_GET['taxonomy']) ){
        global $post;
        $postID = esc_html($_GET['post']);
        $resetVal = get_post_meta($postID, 'themestek_portfolio_like' ,true );
        if( $resetVal==true ){
            // Do reset processs now
            update_post_meta($postID, 'themestek_likes' , '0' ); // Setting ZERO
            update_post_meta($postID, 'themestek_portfolio_like' ,'' ); // Removing checkbox
        }
    }
}
add_action('current_screen', 'themestek_pf_reset_like');
function themestek_update_like( $post_id ){
	if(!is_numeric($post_id)) return;
	$return = '';
	$likes = get_post_meta($post_id, 'themestek_likes', true);
	if(!$likes){ $likes = 0; }
	$likes++;
	update_post_meta($post_id, 'themestek_likes', $likes);
	setcookie('themestek_likes_'.esc_html($post_id), esc_html($post_id), time()*20, '/');
	return '<i class="tsicon-fa-heart"></i> ' . esc_html($likes) . '</i>';
}
// WooCommerce: Ensure cart contents update when products are added to the cart via AJAX
add_filter('woocommerce_add_to_cart_fragments', 'themestek_wc_header_add_to_cart_fragment');
if (!function_exists('themestek_wc_header_add_to_cart_fragment')) {
function themestek_wc_header_add_to_cart_fragment( $fragments ) {
	global $woocommerce;
	ob_start();
	?><span class="number-cart"><?php echo esc_attr($woocommerce->cart->cart_contents_count); ?></span><?php
	$fragments['span.number-cart'] = ob_get_clean();
	return $fragments;
}
}



/**
 *  Custom code - loader animation
 */
if( !function_exists('themestek_get_page_loader_css') ){
function themestek_get_page_loader_css(){
	$return             = '';
	$loaderimg          = themestek_get_option('loaderimg');
	$loaderimage_custom = themestek_get_option('loaderimage_custom');
	if( !empty( $loaderimg ) ){
		$img_src = '';
		if( $loaderimg=='custom' ){
			if( !empty($loaderimage_custom) ){
				$imgdata = wp_get_attachment_image_src( $loaderimage_custom, 'full' );
				if( !empty($imgdata[0]) ){ $img_src = $imgdata[0]; }
			}
		} else {
			$img_src = get_template_directory_uri() .'/images/loader'. $loaderimg .'.gif';
		}
		$return = '.themestek-page-loader-wrapper{background-image:url(' . esc_url( $img_src ) . ')}';
	};
	return $return;
}
}


/**
 *  Custom Google Analytics code in footer
 */
add_action( 'wp_footer', 'themestek_analytics_code' );
if( !function_exists('themestek_analytics_code') ){
function themestek_analytics_code(){
	// Custom JS code
	$custom_js_code = themestek_get_option('custom_js_code');
	// Google Analytics code
	$customhtml_bodyend = themestek_get_option('customhtml_bodyend');
	// Output
	if( !empty($custom_js_code) ){
		echo trim('<script> "use strict"; ' . $custom_js_code . '</script>');
	}
	if( !empty($customhtml_bodyend) ){
		echo trim($customhtml_bodyend);
	}
}
}