<?php if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access pages directly.
// Get current theme name and vesion
$themestek_theme = wp_get_theme();
$themestek_theme_name = $themestek_theme->get( 'Name' );
$themestek_theme_ver  = $themestek_theme->get( 'Version' );
// Getting all theme options again if variable is not defined
global $liviza_theme_options;
if( empty($liviza_theme_options) || !is_array($liviza_theme_options) ){
	if( function_exists('themestek_load_default_theme_options') ){
		themestek_load_default_theme_options();
	} else {
		$liviza_theme_options = get_option('liviza_theme_options');
	}
}
// variables
$team_member_title          = ( !empty($liviza_theme_options['team_type_title']) ) ? esc_html($liviza_theme_options['team_type_title']) : esc_html__('Team Members', 'liviza') ;
$team_member_title_singular = ( !empty($liviza_theme_options['team_type_title_singular']) ) ? esc_html($liviza_theme_options['team_type_title_singular']) : esc_html__('Team Member', 'liviza') ;
$team_group_title           = ( !empty($liviza_theme_options['team_group_title']) ) ? esc_html($liviza_theme_options['team_group_title']) : esc_html__('Team Groups', 'liviza') ;
$team_group_title_singular  = ( !empty($liviza_theme_options['team_group_title_singular']) ) ? esc_html($liviza_theme_options['team_group_title_singular']) : esc_html__('Team Group', 'liviza') ;
$pf_title               = ( !empty($liviza_theme_options['pf_type_title']) ) ? esc_html($liviza_theme_options['pf_type_title']) : esc_html__('Project', 'liviza') ;
$pf_title_singular      = ( !empty($liviza_theme_options['pf_type_title_singular']) ) ? esc_html($liviza_theme_options['pf_type_title_singular']) : esc_html__('Project', 'liviza') ;
$pf_cat_title           = ( !empty($liviza_theme_options['pf_cat_title']) ) ? esc_html($liviza_theme_options['pf_cat_title']) : esc_html__('Project Categories', 'liviza') ;
$pf_cat_title_singular  = ( !empty($liviza_theme_options['pf_cat_title_singular']) ) ? esc_html($liviza_theme_options['pf_cat_title_singular']) : esc_html__('Project Category', 'liviza') ;

$ch_title               = ( !empty($liviza_theme_options['ch_type_title']) ) ? esc_html($liviza_theme_options['ch_type_title']) : esc_html__('Coaching', 'liviza') ;
$ch_title_singular      = ( !empty($liviza_theme_options['ch_type_title_singular']) ) ? esc_html($liviza_theme_options['ch_type_title_singular']) : esc_html__('Coaching', 'liviza') ;
$ch_cat_title           = ( !empty($liviza_theme_options['ch_cat_title']) ) ? esc_html($liviza_theme_options['ch_cat_title']) : esc_html__('Coaching Categories', 'liviza') ;
$ch_cat_title_singular  = ( !empty($liviza_theme_options['ch_cat_title_singular']) ) ? esc_html($liviza_theme_options['ch_cat_title_singular']) : esc_html__('Coaching Category', 'liviza') ;

$service_title               = ( !empty($liviza_theme_options['service_type_title']) ) ? esc_html($liviza_theme_options['service_type_title']) : esc_html__('Service', 'liviza') ;
$service_title_singular      = ( !empty($liviza_theme_options['service_type_title_singular']) ) ? esc_html($liviza_theme_options['service_type_title_singular']) : esc_html__('Service', 'liviza') ;
$service_cat_title           = ( !empty($liviza_theme_options['service_cat_title']) ) ? esc_html($liviza_theme_options['service_cat_title']) : esc_html__('Service Categories', 'liviza') ;
$service_cat_title_singular  = ( !empty($liviza_theme_options['service_cat_title_singular']) ) ? esc_html($liviza_theme_options['service_cat_title_singular']) : esc_html__('Service Category', 'liviza') ;
/**
 *  Blogbox Styles
 */
$blog_styles = array_merge( array( 'classic' => get_template_directory_uri() . '/includes/images/blogbox-style-classic.jpg' ), themestek_global_template_list('blog', true) );
/**
 *  FRAMEWORK SETTINGS
 */
$themestek_framework_settings = array(
	'menu_title' 	  => esc_html__('Liviza Options', 'liviza'),
	'menu_type'  	  => 'menu',
	'menu_slug'  	  => 'themestek-theme-options',
	'ajax_save'  	  => true,
	'show_reset_all'  => false,
	'framework_title' => esc_html($themestek_theme_name).'  <small>'.esc_html($themestek_theme_ver).'</small>',
	'menu_position'   => 2, // See below comment for proper number
);
/**
 *  FRAMEWORK OPTIONS
 */
$themestek_framework_options = array();
// Layout Settings
$themestek_framework_options[] = array(
	'name'   => 'layout_settings', // like ID
	'title'  => esc_html__('Layout Settings', 'liviza'),
	'icon'   => 'fa fa-gear',
	'sections' => array(
		// Layout Settings - General Settings
		array(
			'name'   => 'general_settings', // like ID
			'icon'   => 'fa fa-gear',
			'title'  => esc_html__('General Settings', 'liviza'),
			'fields' => array( // begin: fields
				array(
					'type'    	=> 'heading',
					'content'	=> esc_html__('General settings like logo, header, skincolor etc.', 'liviza'),
				),
				array(
					'id'    => 'themestek_one_click_demo_setup',
					'type'  => 'themestek_one_click_demo_import',
					'title' => esc_html__('Demo Content Importer', 'liviza'),
					'after' => '<br><div class="cs-text-muted cs-text-desc">'.esc_html__('Demo content setup. This will add demo data same as our demo site (excluding images because they are copyright)', 'liviza').'</div>',
				),
				array(
					'id'      => 'skincolor',
					'type'    => 'themestek_skin_color',
					'title'   => esc_html__( 'Select Skin Color', 'liviza' ),
					'after'   	=> '<br><div class="cs-text-muted cs-text-desc">'.esc_html__('Select the main color. This color will be used globally.', 'liviza').'</div>',
					'default' => sanitize_hex_color('#0067da'),
					'options' => array(
						'Skin Color'		=> sanitize_hex_color('#0067da'), /* Default skin color */
						'Science Blue'		=> sanitize_hex_color('#0073cc'),
						'Red Orange'		=> sanitize_hex_color('#ff4229'),
						'Vivid Violet'		=> sanitize_hex_color('#af33bb'),
						'Tan Hide'			=> sanitize_hex_color('#f9a861'),
						'Selective Yellow'	=> sanitize_hex_color('#ffb901'),
						'Red'				=> sanitize_hex_color('#ff0b09'),
						'Purple Heart'		=> sanitize_hex_color('#6c33bb'),
						'Azure Radiance'	=> sanitize_hex_color('#0095eb'),
						'Mountain Meadow'	=> sanitize_hex_color('#18c47c'),
					),
					'rgba'    => false,
				),
				array(
					'id'         => 'secondskincolor',
					'type'       => 'color_picker',
					'title'      => esc_html__( 'Second Skin Color', 'liviza' ),
					'default'    => sanitize_hex_color('#eea200'),

				),
				array(
					'id'		=> 'layout',
					'type'		=> 'image_select',//themestek_pre_color_packages
					'title'		=> esc_html__('Pages Layout', 'liviza'),
					'options'	=> array(
						'wide'		=> get_template_directory_uri() . '/includes/images/layout-wide.png',
						'boxed'		=> get_template_directory_uri() . '/includes/images/layout-box.png',
						'framed'	=> get_template_directory_uri() . '/includes/images/layout-frame.png',
						'rounded'	=> get_template_directory_uri() . '/includes/images/layout-rounded.png',
						'fullwide'	=> get_template_directory_uri() . '/includes/images/layout-fullwide.png',
					),
					'default'	=> 'wide',
					'after'		=> '<br><div class="cs-text-muted cs-text-desc">'.esc_html__('Specify the layout for the pages', 'liviza').'</div>',
					'radio'		=> true,
				),
				array(
					'id'        => 'full_wide_elements',
					'type'      => 'checkbox',
					'title'     => esc_html__('Select Elements for Full Wide View (in above option)', 'liviza'),
					'options'   => array(
						'floatingbar' => esc_html__('Floatbar', 'liviza'),
						'topbar'      => esc_html__('Pre Header', 'liviza'),
						'header'      => esc_html__('Header', 'liviza'),
						'content'     => esc_html__('Content Area', 'liviza'),
						'footer'      => esc_html__('Footer', 'liviza'),
					),
					'default'    => array( 'header', 'footer' ),
					'after'    	 => '<small>'.esc_html__('Select elements that you want to show in full-wide view', 'liviza').'</small>',
					'dependency' => array( 'layout_fullwide', '==', 'true' ),
				),
				array(
					'type'       	 => 'heading',
					'content'    	 => esc_html__('Logo', 'liviza'),
					'after'  	  	 => '<small>'.esc_html__('Select or upload your logo. You can also show text logo from here.', 'liviza').'<br /> <span class="themestek-toptions-head-highlight">'.esc_html__('You can go to "Header Settings" tab from the left menu for more options.', 'liviza') . '</span></small>',
				),
				array(
				  'id'      	 	 => 'logotype',
				  'type'     		 => 'radio',
				  'title'    		 => esc_html__('Logo type', 'liviza'),
				  'options' 		 => array(
						'text'			=> esc_html__('Logo as Text', 'liviza'),
						'image'			=> esc_html__('Logo as Image', 'liviza')
					),
				  'default'  		 => 'image',
				  'after'  			 => '<div class="cs-text-muted cs-text-desc"><br>'.esc_html__('Specify the type of logo. It can Text or Image', 'liviza').'</div>',
				),
				array(
					'id'     		 => 'logotext',
					'type'    		 => 'text',
					'title'   		 => esc_html__('Logo Text', 'liviza'),
					'default' 		 => esc_html('Liviza'),
					'dependency'  	 => array( 'logotype_text', '==', 'true' ),
					'after'  			 => '<div class="cs-text-muted cs-text-desc"><br>'.esc_html__('Enter the text to be used instead of the logo image', 'liviza').'</div>',
				),
				array(
					'id'             => 'logo_font',
					'type'           => 'themestek_typography',
					'title'          => esc_html__('Logo Font', 'liviza'),
					'chosen'         => false,
					'text-align'     => false,
					'google'         => true, // Disable google fonts. Won't work if you haven't defined your google api key
					'font-backup'    => true, // Select a backup non-google font in addition to a google font
					'subsets'        => false, // Only appears if google is true and subsets not set to false
					'line-height'    => true,
					'text-transform' => true,
					'word-spacing'   => false, // Defaults to false
					'letter-spacing' => true, // Defaults to true
					'color'          => true,
					'all-varients'   => false,
					'output'         => '.headerlogo a.home-link', // An array of CSS selectors to apply this font style to dynamically
					'default'        => array(
						'family'			=> 'Nunito Sans',
						'backup-family'		=> 'Arial, Helvetica, sans-serif',
						'variant'			=> '700',
						'text-transform'	=> '',
						'font-size'			=> '26',
						'line-height'		=> '27',
						'letter-spacing'	=> '0',
						'color'				=> sanitize_hex_color('#202020'),
						'font'				=> 'google',
					),
					'dependency'  	=> array( 'logotype_text', '==', 'true' ),
					'after'  	=> '<div class="cs-text-muted cs-text-desc"><br>'.esc_html__('This will be applied to logo text only. Select Logo font-style and size', 'liviza').'</div>',
				),
				array(
					'id'       		 => 'logoimg',
					'type'     		 => 'themestek_image',
					'title'    		 => esc_html__('Logo Image', 'liviza'),
					'dependency'  	 => array( 'logotype_image', '==', 'true' ),
					'after'  		 => '<div class="cs-text-muted cs-text-desc"><br>'.esc_html__('Upload image that will be used as logo for the site ', 'liviza') . sprintf(esc_html__('%1$sNOTE:%2$s Upload image that will be used as logo for the site', 'liviza'),'<strong>', '</strong>').'</div>',
					'add_title'		 => esc_html__('Upload Site Logo','liviza'),
					'default'		 => array(
						'thumb-url'	=> get_template_directory_uri() . '/images/logo.png',
						'full-url'	=> get_template_directory_uri() . '/images/logo.png',
					),
				),
				array(
					'id'       		 => 'logoimg_sticky',
					'type'     		 => 'themestek_image',
					'title'    		 => esc_html__('Logo Image for Sticky Header (optional)', 'liviza'),
					'dependency'  	 => array( 'sticky_header|logotype_image', '==|==', 'true|true' ),
					'after'  		 => '<div class="cs-text-muted cs-text-desc"><br>' . esc_html__('This logo will appear only on sticky header only.', 'liviza') . '</div>',
					'add_title'		 => esc_html__('Upload Sticky Logo','liviza'),
				),

				array(
					'type'      	=> 'heading',
					'content'     	=> esc_html__('Background Settings', 'liviza'),
					'after'  		=> '<small>'.esc_html__('Set below background options. Background settings will be applied to Boxed layout only', 'liviza').'</small>',
				),
				array(
					'id'     		=> 'global_background',
					'type'   		=> 'themestek_background',
					'title' 		=> esc_html__('Body Background Properties', 'liviza'),
					'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>'.esc_html__('Set background for main body. This is for main outer body background. For "Boxed" layout only.', 'liviza').'</div>',
					'default'		=> array(
						'color'			=> sanitize_hex_color('#ffffff'),
					),
					'output'        => 'body',
				),
				array(
					'id'     		=> 'inner_background',
					'type'    		=> 'themestek_background',
					'title'  		=> esc_html__('Content Area Background Properties', 'liviza'),
					'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>'.esc_html__('Set background for content area', 'liviza').'</div>',
					'default'		=> array(
						'color'			=> sanitize_hex_color('#ffffff'),
					),
					'output'        => 'body .site-content-wrapper',
				),
				array(
					'type'		=> 'heading',
					'content'	=> esc_html__('Pre-loader Image', 'liviza'),
					'after'		=> '<small>'.esc_html__('Select pre-loader image for the site. This will work on desktop, mobile and tablet devices', 'liviza').'</small>',
				),
				array(
					'id'     		=> 'preloader_show',
					'type'   		=> 'switcher',
					'title'   		=> esc_html__('Show Pre-loader animation', 'liviza'),
					'default' 		=> false,
					'label'  		=> '<div class="cs-text-muted cs-text-desc">' . esc_html__('Show or hide pre-loader animation.', 'liviza') . '</div>',
				),
				array(
					'id'		=> 'loaderimg',
					'type'		=> 'image_select',
					'title'		=> esc_html__('Pre-loader Image', 'liviza'),
					'options'	=> array(
						'1'   		=> get_template_directory_uri() . '/images/loader1.svg',
						'2'   		=> get_template_directory_uri() . '/images/loader2.svg',
						'3'   		=> get_template_directory_uri() . '/images/loader3.svg',
						'4'   		=> get_template_directory_uri() . '/images/loader4.svg',
						'5'   		=> get_template_directory_uri() . '/images/loader5.svg',
						'6'   		=> get_template_directory_uri() . '/images/loader6.svg',
						'7'   		=> get_template_directory_uri() . '/images/loader7.svg',
						'8'   		=> get_template_directory_uri() . '/images/loader8.svg',
						'9'   		=> get_template_directory_uri() . '/images/loader9.svg',
						'10'   		=> get_template_directory_uri() . '/images/loader10.svg',
						'custom'	=> get_template_directory_uri() . '/includes/images/loader-custom.gif',
					),
					'radio'		=> true,
					'default'	=> '1',
					'after'		=> '<div class="cs-text-muted cs-text-desc">' . esc_html__('Please select pre-loader image.', 'liviza') . '</div>',
					'dependency' => array( 'preloader_show', '==', 'true' ),
				),
				array(
					'id'       		=> 'loaderimage_custom',
					'type'      	=> 'image',
					'title'    		=> esc_html__('Upload Page-loader Image', 'liviza'),
					'add_title' 	=> 'Select/Upload Page-loader image',
					'after'  		=> '<div class="cs-text-muted cs-text-desc">' . esc_html__('Custom page-loader image that you want to show. You can create animated GIF image from your logo from Animizer website.', 'liviza') . ' <a href="'. esc_url('http://animizer.net/en/animate-static-image') .'" target="_blank">' . esc_html__('Click here to go to Anmizer website.', 'liviza') . '</a></div>',
					'dependency'    => array( 'loaderimg_custom|preloader_show', '==|==', 'true|true' ),
				),
				array(
					'type'		=> 'heading',
					'content'	=> esc_html__('Totop Button', 'liviza'),
					'after'		=> '<small>'.esc_html__('Show or hide Totop Button', 'liviza').'</small>',
				),
				array(
					'id'     		=> 'hide_totop_button',
					'type'   		=> 'switcher',
					'title'   		=> esc_html__('Hide Totop Button', 'liviza'),
					'default' 		=> false,
					'label'  		=> '<div class="cs-text-muted cs-text-desc">' . esc_html__('Show or hide Totop Button.', 'liviza') . '</div>',
				),
			),
		),
		// Layout Settings - Floatbar Settings
		array(
			'name'   => 'floatingbar_settings', // like ID
			'title'  => esc_html__('Floatbar Settings', 'liviza'),
			'icon'   => 'fa fa-gear',
			'fields' => array( // begin: fields
				array(
					'type'    		=> 'heading',
					'content'		=> esc_html__('Floatbar Settings', 'liviza'),
				),
				array(
					'id'     		=> 'fbar_show',
					'type'   		=> 'switcher',
					'title'   		=> esc_html__('Show Floatbar', 'liviza'),
					'default' 		=> false,
					'label'  		=> '<div class="cs-text-muted cs-text-desc">'.esc_html__('Show or hide Floatbar', 'liviza').'</div>',
				),
				array(
					'id'      => 'fbar-position',
					'type'    => 'radio',
					'title'   => esc_html__('Floating bar position', 'liviza'),
					'options' => array(
						'default' => esc_html__('Top','liviza'),
						'right'   => esc_html__('Right', 'liviza'),
					),
					'default'    => 'right',
					'after'      => '<div class="cs-text-muted cs-text-desc"><br>'.esc_html__('Position for Floating bar', 'liviza').'</div>',
					'dependency' => array( 'fbar_show', '==', 'true' ),
				),
				array(
					'id'            => 'fbar_bg_color',
					'type'          => 'select',
					'title'         =>  esc_html__('Floatbar Background Color', 'liviza'),
					'options'  		=> array(
						'darkgrey'    => esc_html__('Dark grey', 'liviza'),
						'grey'        => esc_html__('Grey', 'liviza'),
						'white'       => esc_html__('White', 'liviza'),
						'skincolor'   => esc_html__('Skincolor', 'liviza'),
						'custom'      => esc_html__('Custom Color', 'liviza'),
					),
					'default'       => 'skincolor',
					'dependency' 	=> array( 'fbar_show', '==', 'true' ),
					'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>'.esc_html__('Select predefined color for Floatbar background color', 'liviza').'</div>',
				),
				array(
					'id'      		=> 'fbar_background',
					'type'    		=> 'themestek_background',
					'title'  		=> esc_html__('Floatbar Background Properties', 'liviza' ),
					'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>'.esc_html__('Set background for Floating bar. You can set color or image and also set other background related properties', 'liviza').'</div>',
					'color'			=> true,
					'dependency' 	=> array( 'fbar_show', '==', 'true' ),
					'default'		=> array(
						'size'				=> 'cover',
						'color'				=> sanitize_hex_color('#ceb994'),
					),
					'output' 	        => '.themestek-fbar-box-w',
					'output_bglayer'    => true,  // apply color to bglayer class div inside this , default: true
					'color_dropdown_id' => 'fbar_bg_color',   // color dropdown to decide which color
				),
				array(
					'id'            => 'fbar_text_color',
					'type'          => 'select',
					'title'         =>  esc_html__('Floatbar Text Color', 'liviza'),
					'options' 		=> array(
						'white'			=> esc_html__('White', 'liviza'),
						'darkgrey'		=> esc_html__('Dark', 'liviza'),
						'custom'		=> esc_html__('Custom color', 'liviza'),
									),
					'default'		=> 'white',
					'dependency' 	=> array( 'fbar_show', '==', 'true' ),
					'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>'.esc_html__('Select "Dark" color if you are going to select light color in above option', 'liviza').'</div>',
				),
				array(
					'id'     		 => 'fbar_text_custom_color',
					'type'   		 => 'color_picker',
					'title'  		 => esc_html__('Floatbar Custom Color for text', 'liviza' ),
					'default'		 => sanitize_hex_color('#dd3333'),
					'dependency'  	 => array( 'fbar_show|fbar_text_color', '==|==', 'true|custom' ),//Multiple dependency
					'after'  		 => '<div class="cs-text-muted cs-text-desc"><br>'.esc_html__('Custom background color for Floatbar', 'liviza').'</div>',
				),
				array(
					'type'    	 => 'heading',
					'content'	 => esc_html__('Floatbar Open/Close Button Settings', 'liviza'),
					'after'		 => '<small>' . esc_html__('Settings for Floatbar Open/Close Button', 'liviza') . '</small>',
					'dependency' => array( 'fbar_show', '==', 'true' ),
				),
				array(
					'id'      => 'fbar_handler_icon',
					'type'    => 'themestek_iconpicker',
					'title'   => esc_html__('Open Link Icon', 'liviza' ),
					'default' => array(
						'library'				=> 'themify',
						'library_fontawesome'	=> 'fa fa-arrow-down',
						'library_linecons'		=> 'vc_li vc_li-bubble',
						'library_themify'		=> 'themifyicon ti-menu',
					),
					'dependency' => array( 'fbar_show', '==', 'true' ),
				),
				array(
					'id'      => 'fbar_handler_icon_close',
					'type'    => 'themestek_iconpicker',
					'title'   => esc_html__('Close Link Icon', 'liviza' ),
					'default' => array(
						'library'				=> 'themify',
						'library_fontawesome'	=> 'fa fa-arrow-up',
						'library_linecons'		=> 'vc_li vc_li-bubble',
						'library_themify'		=> 'themifyicon ti-close',
					),
					'dependency' => array( 'fbar_show', '==', 'true' ),
				),
				array(
					'id'            => 'fbar_icon_color',
					'type'          => 'select',
					'title'         =>  esc_html__('Floatbar Open Icon Color', 'liviza'),
					'options' 		=> array(
							'dark'       => esc_html__('Dark grey', 'liviza'),
							'grey'       => esc_html__('Grey', 'liviza'),
							'white'      => esc_html__('White', 'liviza'),
							'skincolor'  => esc_html__('Skincolor', 'liviza'),
					),
					'default'		=> 'white',
					'dependency' 	=> array( 'fbar_show', '==', 'true' ),
					'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>'.esc_html__('Select "Dark" color if you are going to select light color in above option.', 'liviza').'</div>',
				),
				array(
					'id'            => 'fbar_icon_color_close',
					'type'          => 'select',
					'title'         =>  esc_html__('Floatbar Close Icon Color', 'liviza'),
					'options' 		=> array(
							'dark'       => esc_html__('Dark grey', 'liviza'),
							'grey'       => esc_html__('Grey', 'liviza'),
							'white'      => esc_html__('White', 'liviza'),
							'skincolor'  => esc_html__('Skincolor', 'liviza'),
					),
					'default'		=> 'dark',
					'dependency' 	=> array( 'fbar_show', '==', 'true' ),
					'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>'.esc_html__('Select "Dark" color if you are going to select light color in above option.', 'liviza').'</div>',
				),
				array(
					'type'    	 => 'heading',
					'content'	 => esc_html__('Floatbar Widget Settings', 'liviza'),
					'after'		 => '<small>' . esc_html__('Settings for Floatbar Widgets', 'liviza') . '</small>',
					'dependency' => array( 'fbar_show|fbar-position_default', '==|==', 'true|true' ),
				),
				array(
					'id'			=> 'fbar_widget_column_layout',
					'type' 			=> 'image_select',//themestek_pre_color_packages
					'title'			=> esc_html__('Floatbar Widget Columns', 'liviza'),
					'options'      	=> array(
							'12'      => get_template_directory_uri() . '/includes/images/footer_col_12.png',
							'6_6'     => get_template_directory_uri() . '/includes/images/footer_col_6_6.png',
							'4_4_4'   => get_template_directory_uri() . '/includes/images/footer_col_4_4_4.png',
							'3_3_3_3' => get_template_directory_uri() . '/includes/images/footer_col_3_3_3_3.png',
							'8_4'     => get_template_directory_uri() . '/includes/images/footer_col_8_4.png',
							'4_8'     => get_template_directory_uri() . '/includes/images/footer_col_4_8.png',
							'6_3_3'   => get_template_directory_uri() . '/includes/images/footer_col_6_3_3.png',
							'3_3_6'   => get_template_directory_uri() . '/includes/images/footer_col_3_3_6.png',
							'8_2_2'   => get_template_directory_uri() . '/includes/images/footer_col_8_2_2.png',
							'2_2_8'   => get_template_directory_uri() . '/includes/images/footer_col_2_2_8.png',
							'6_2_2_2' => get_template_directory_uri() . '/includes/images/footer_col_6_2_2_2.png',
							'2_2_2_6' => get_template_directory_uri() . '/includes/images/footer_col_2_2_2_6.png',
					),
					'default'		=> '3_3_3_3',
					'dependency' 	=> array( 'fbar_show|fbar-position_default', '==|==', 'true|true' ),
					'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>'.esc_html__('Select Floatbar Column layout View for widgets.', 'liviza').'</div>',
					'radio'      	=> true,
				),
				array(
					'type'       	 => 'heading',
					'content'    	 => esc_html__('Hide Floatbar in Small Devices', 'liviza'),
					'after'  	  	 => '<small>'.esc_html__('Hide Floatbar in small devices like mobile, tablet etc.', 'liviza').'</small>',
					'dependency'     => array('fbar_show','==','true'),
				),
				array(
					'id'       => 'floatingbar-breakpoint',
					'type'     => 'radio',
					'title'    => esc_html__('Show/Hide Floatbar in Responsive Mode', 'liviza'),
					'subtitle' => esc_html__('Change options for responsive behaviour of Floatbar.', 'liviza'),
					'options'  => array(
						'all'      => esc_html__('Show in all devices','liviza'),
						'1200'     => esc_html__('Show only on large devices','liviza').' <small>'.esc_html__('show only on desktops (>1200px)', 'liviza').'</small>',
						'992'      => esc_html__('Show only on medium and large devices','liviza').' <small>'.esc_html__('show only on desktops and Tablets (>992px)', 'liviza').'</small>',
						'768'      => esc_html__('Show on some small, medium and large devices','liviza').' <small>'.esc_html__('show only on mobile and Tablets (>768px)', 'liviza').'</small>',
						'custom'   => esc_html__('Custom (select pixel below)', 'liviza'),
					),
					'dependency' => array('fbar_show','==','true'),
					'default'    => '1200'
				),
				array(
					'id'            => 'floatingbar-breakpoint-custom',
					'type'          => 'number',
					'title'         => esc_html__( 'Custom screen size to hide Floatbar (in pixel)', 'liviza' ),
					'subtitle'      => esc_html__( 'Select after how many pixels the Floatbar will be hidden.', 'liviza' ),
					'after'         => ' '.esc_html('px'),
					'default'       => '1200',
					'dependency' 	=> array( 'fbar_show|floatingbar-breakpoint_custom', '==|==', 'true|true' ),
				),
			)
		),
		// Layout Settings - Pre Header Settings
		array(
			'name'   => 'preheader_settings', // like ID
			'title'  => esc_html__('Pre Header Settings', 'liviza'),
			'icon'   => 'fa fa-gear',
			'fields' => array( // begin: fields
				array(
					'type'    		=> 'heading',
					'content'		=> esc_html__('Pre Header settings', 'liviza'),
				),
				array(
					'id'     		=> 'show_topbar',
					'type'   		=> 'switcher',
					'title'   		=> esc_html__('Show Pre Header', 'liviza'),
					'default' 		=> false,
					'label'  		=> '<div class="cs-text-muted cs-text-desc">'.esc_html__('Show or hide Pre Header', 'liviza').'</div>',
				),
				array(
					'id'            => 'topbar_bg_color',
					'type'          => 'select',
					'title'         =>  esc_html__('Pre Header Background Color', 'liviza'),
					'options'  		=> array(
						'transparent' => esc_html__('Transparent', 'liviza'),
						'darkgrey'    => esc_html__('Dark grey', 'liviza'),
						'grey'        => esc_html__('Grey', 'liviza'),
						'white'       => esc_html__('White', 'liviza'),
						'skincolor'   => esc_html__('Skincolor', 'liviza'),
						'custom'      => esc_html__('Custom Color', 'liviza'),
					),
					'default'       => 'darkgrey',
					'dependency' 	=> array( 'show_topbar', '==', 'true' ),
					'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>'.esc_html__('Select predefined color for Pre Header background color', 'liviza').'</div>',
				),
				array(
					'id'     		 => 'topbar_bg_custom_color',
					'type'   		 => 'color_picker',
					'title'  		 => esc_html__('Pre Header Custom Background Color', 'liviza' ),
					'default'		 => sanitize_hex_color('#ffffff'),
					'dependency'  	 => array( 'show_topbar|topbar_bg_color', '==|==', 'true|custom' ),//Multiple dependency
					'after'  		 => '<div class="cs-text-muted cs-text-desc"><br>'.esc_html__('Custom background color for Pre Header', 'liviza').'</div>',
				),
				array(
					'id'            => 'topbar_text_color',
					'type'          => 'select',
					'title'         =>  esc_html__('Pre Header Text Color', 'liviza'),
					'options'  		=> array(
						'white'     	=> esc_html__('White', 'liviza'),
						'dark'      	=> esc_html__('Dark', 'liviza'),
						'skincolor' 	=> esc_html__('Skin Color', 'liviza'),
						'custom'   		=> esc_html__('Custom color', 'liviza'),
					),
					'default'       => 'white',
					'dependency' 	=> array( 'show_topbar', '==', 'true' ),
					'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>'.esc_html__('Select "Dark" color if you are going to select light color in above option', 'liviza').'</div>',
				),
				array(
					'id'     		 => 'topbar_text_custom_color',
					'type'   		 => 'color_picker',
					'title'  		 => esc_html__('Pre Header Custom Color for text', 'liviza' ),
					'default'		 => sanitize_hex_color('#000000'),
					'dependency'  	 => array( 'show_topbar|topbar_text_color', '==|==', 'true|custom' ),//Multiple dependency
					'after'  		 => '<div class="cs-text-muted cs-text-desc"><br>'.esc_html__('Custom color for Pre Header Text', 'liviza').'</div>',
				),
				array(
					'type'       	 => 'heading',
					'content'    	 => esc_html__('Pre Header Content Options', 'liviza'),
					'after'  	  	 => '<small>'.esc_html__('Content for Pre Header', 'liviza').'</small>',
					'dependency' 	 => array( 'show_topbar', '==', 'true' ),
				),
				array(
					'id'       		 => 'topbar_left_text',
					'type'     		 => 'textarea',
					'title'    		 =>  esc_html__('Pre Header Left Content', 'liviza'),
					'shortcode'		 => true,
					'dependency' 	 => array( 'show_topbar', '==', 'true' ),
					'desc'  		 => '<div class="cs-text-muted cs-text-desc"><br>'.esc_html__('This content will appear on Left side of Pre Header area', 'liviza').'</div>',
					'default'        => themestek_wp_kses('<ul class="top-contact"><li><i class=" themestek-liviza-icon-location-pin"></i><span>Address: </span>Los Angeles Gournadi</li>
					<li><i class="themestek-liviza-icon-envelope"></i><span>Email Address: </span>mail@example.com</li>
					</ul>'),
				),
				array(
					'id'       		 => 'topbar_right_text',
					'type'     		 => 'textarea',
					'title'    		 =>  esc_html__('Pre Header Right Content', 'liviza'),
					'shortcode'		 => true,
					'dependency' 	 => array( 'show_topbar', '==', 'true' ),
					'desc'  	 	 => '<div class="cs-text-muted cs-text-desc"><br>'.esc_html__('This content will appear on Right side of Pre Header area', 'liviza').'</div>',
					'after'  	 	 => '<div class="cs-text-muted cs-text-desc"><br>'.esc_html__('html tags and shortcodes are allowed', 'liviza') . sprintf( esc_html__('%1$s Click here to know more %2$s about shortcode description','liviza') , '<a href="'. esc_url('http://liviza.themestekthemes.com/documentation/shortcodes.html') .'" target="_blank">' , '</a>'  ).'</div>',
					'default'		=> '[themestek-social-links]' . themestek_wp_kses('<div class="themestek-vc_btn3-container themestek-vc_btn3-inline"><a class="themestek-vc_general themestek-vc_btn3 themestek-vc_btn3-size-md themestek-vc_btn3-shape-square themestek-vc_btn3-style-classic themestek-vc_btn3-weight-yes themestek-vc_btn3-color-skincolor" href="" title="Book A Consultation"><span>Book A Consultation</span></a></div>'),
				),
				array(
					'type'       	 => 'heading',
					'content'    	 => esc_html__('Hide Pre Header Bar in Small Devices', 'liviza'),
					'after'  	  	 => '<small>'.esc_html__('Hide Pre Header Bar in small devices like mobile, tablet etc.', 'liviza').'</small>',
					'dependency'     => array('show_topbar','==','true'),
				),
				array(
					'id'       => 'topbar-breakpoint',
					'type'     => 'radio',
					'title'    => esc_html__('Show/Hide Pre Header Bar in Responsive Mode', 'liviza'),
					'subtitle' => esc_html__('Change options for responsive behaviour of Pre Header Bar.', 'liviza'),
					'options'  => array(
						'all'      => esc_html__('Show in all devices','liviza'),
						'1200'     => esc_html__('Show only on large devices','liviza').' <small>'.esc_html__('show only on desktops (>1200px)', 'liviza').'</small>',
						'992'      => esc_html__('Show only on medium and large devices','liviza').' <small>'.esc_html__('show only on desktops and Tablets (>992px)', 'liviza').'</small>',
						'768'      => esc_html__('Show on some small, medium and large devices','liviza').' <small>'.esc_html__('show only on mobile and Tablets (>768px)', 'liviza').'</small>',
						'custom'   => esc_html__('Custom (select pixel below)', 'liviza'),
					),
					'dependency' => array('show_topbar','==','true'),
					'default'    => '1200'
				),
				array(
					'id'            => 'topbar-breakpoint-custom',
					'type'          => 'number',
					'title'         => esc_html__( 'Custom screen size to hide Pre Header (in pixel)', 'liviza' ),
					'subtitle'      => esc_html__( 'Select after how many pixels the Pre Header will be hidden.', 'liviza' ),
					'after'         => esc_html(' px'),
					'default'       => '1200',
					'dependency' 	=> array( 'show_topbar|topbar-breakpoint_custom', '==|==', 'true|true' ),
				),
			)
		),
		// Layout Settings - Header Settings

		array(
			'name'   => 'header_settings', // like ID
			'title'  => esc_html__('Header Settings', 'liviza'),
			'icon'   => 'fa fa-gear',
			'fields' => array( // begin: fields
				array(
					'type'       	 => 'heading',
					'content'    	 => esc_html__('Header Style', 'liviza'),
					'after'  	  	 => '<small>'.esc_html__('Options to change header style.', 'liviza'). '<br /> <span class="themestek-toptions-head-highlight">'.esc_html__('You can go to "Header Settings" tab from the left menu for more options.', 'liviza') . '</span></small>',
				),
				array(
					'id'			=> 'headerstyle',
					'type' 			=> 'image_select',
					'title'			=> esc_html__('Select Header Style', 'liviza'),
					'desc'     		=> esc_html__('Please select header style', 'liviza'),
					'wrap_class'    => 'themestek-header-style',
					'options'      	=> array(
						'classic'			=> get_template_directory_uri() . '/includes/images/header-classic.png',
						'infostack'			=> get_template_directory_uri() . '/includes/images/header-infostack.png', // demo1
						'classic-overlay'	=> get_template_directory_uri() . '/includes/images/header-classic-overlay.png',
					),
					'default'		=> 'classic',
					'attributes' 	=> array(
						'data-depend-id' => 'header_style'
					),
					'radio' 		=> true,
				),

				// Options for selected header
				array(
					'type'    		=> 'heading',
					'content'		=> esc_html__('Options for selected header', 'liviza'),
					'dependency'	=> array( 'header_style', 'any', 'classic,classic-overlay,infostack,classic-overlay-center' ),
					'after'  	  	 => '<small>'.esc_html__('These options will appear for selected header style only.', 'liviza').'</small>',
				),
				// Button group
				array(
					'id'		=> 'header_btn',
					'type'		=> 'fieldset',
					'title'		=> esc_html__('Header Button', 'liviza'),
					'fields'	=> array(
						array(
							'id'     		=> 'header_btn_text',
							'type'    		=> 'text',
							'title'   		=> esc_html__('Header Button Text', 'liviza'),
							'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>' . esc_html__('Header Button text', 'liviza') . '</div>',
						),
						array(
							'id'     		=> 'header_btn_link',
							'type'    		=> 'text',
							'title'   		=> esc_html__('Header Button Link', 'liviza'),
							'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>' . esc_html__('Header Button link', 'liviza') . '</div>',
						),
					),
					'dependency'	=> array( 'header_style', 'any', 'classic,infostack,classic-overlay' ),
				),
				// Button2 group
				array(
					'id'		=> 'header_multiline_btn',
					'type'		=> 'fieldset',
					'title'		=> esc_html__('Header Multiline Button', 'liviza'),
					'after'		=> '<small>'.esc_html__('This is specially created for Phone number button', 'liviza').'</small>',
					'fields'	=> array(
						array(
							'id'     		=> 'text_top',
							'type'    		=> 'text',
							'title'   		=> esc_html__('Header Button Top Text', 'liviza'),
							'default'		=> esc_html__('Have any Questions?', 'liviza'),
							'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>' . esc_html__('Header Button text', 'liviza') . '</div>',
						),
						array(
							'id'     		=> 'text_bottom',
							'type'    		=> 'text',
							'title'   		=> esc_html__('Header Button Bottom Text', 'liviza'),
							'default'		=> esc_html__('+0 123 888 555', 'liviza'),
							'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>' . esc_html__('Header Button text', 'liviza') . '</div>',
						),
						array(
							'id'     		=> 'link',
							'type'    		=> 'text',
							'title'   		=> esc_html__('Header Button Link', 'liviza'),
							'default'		=> esc_url('tel:0123888555', 'liviza'),
							'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>' . esc_html__('Header Button link', 'liviza') . '</div>',
						),
					),
					'dependency'	=> array( 'header_style', 'any', 'classic-overlay' ),
				),
				array(
					'id'            => 'header_menu_position',
					'type'          => 'select',
					'title'         =>  esc_html__('Header Menu Position', 'liviza'),
					'options'  		=> array(
						'left'			=> esc_html__('Left Align', 'liviza'),
						'right'			=> esc_html__('Right Align', 'liviza'),
						'center'		=> esc_html__('Center Align', 'liviza'),
					),
					'default'       => 'right',
					'dependency'  	=> array( 'header_style', 'any', 'classic,classic-overlay' ),
					'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>'.esc_html__('Select Menu Position. This option will work for currently selected header style only ', 'liviza').'</div>',
				),
				array(
					'id'     		=> 'header_show_social',
					'type'   		=> 'switcher',
					'title'   		=> esc_html__('Show Social Links', 'liviza'),
					'default' 		=> true,
					'label'  		=> '<div class="cs-text-muted cs-text-desc">' . esc_html__('Show or hide social links in header.', 'liviza') . '</div>',
					'dependency'  	=> array( 'header_style', 'any', 'classic-overlay-center' ),
				),
				array(
					'id'       		 => 'infostack_first_box',
					'type'     		 => 'textarea',
					'title'    		 =>  esc_html__('InfoStack First Box Content', 'liviza'),
					'shortcode'		 => true,
					'after'  		 => '<div class="cs-text-muted cs-text-desc"><br>'.esc_html__('This content will appear on Left side of logo', 'liviza').'</div>',
					'default'        => themestek_wp_kses('<div class="media-top"><i class=" themestek-liviza-icon-location-pin"></i><h3>Los Angeles</h3><div class="media-bottom">Gournadi, 1230 Bariasl</div></div>'),
					'dependency'  	 => array( 'header_style', 'any', 'infostack' ),
				),
				array(
					'id'       		 => 'infostack_second_box',
					'type'     		 => 'textarea',
					'title'    		 =>  esc_html__('InfoStack Second Box Content', 'liviza'),
					'shortcode'		 => true,
					'after'  		 => '<div class="cs-text-muted cs-text-desc"><br>'.esc_html__('This content will appear on Right side of logo', 'liviza').'</div>',
					'default'        => themestek_wp_kses('<div class="media-top"><i class="themestek-liviza-icon-envelope"></i><h3>mail@example.com</h3><div class="media-bottom">Office Hour: 09:00am - 4:00pm</div></div>'),
					'dependency'  	 => array( 'header_style', 'any', 'infostack' ),
				),
				array(
					'id'       		 => 'infostack_third_box',
					'type'     		 => 'textarea',
					'title'    		 =>  esc_html__('InfoStack Third Box Content', 'liviza'),
					'shortcode'		 => true,
					'after'  		 => '<div class="cs-text-muted cs-text-desc"><br>'.esc_html__('This content will appear on Right side of logo', 'liviza').'</div>',
					'default'        => themestek_wp_kses('<div class="media-top"><i class="themestek-liviza-icon-phone-call"></i><h3>000 8888 999</h3><div class="media-bottom">Free Call</div></div>'),
					'dependency'  	 => array( 'header_style', 'any', 'infostack' ),
				),
				array(
					'id'     		 => 'header_menuarea_height',
					'type'    		 => 'number',
					'title'   		 => esc_html__('Menu area height', 'liviza'),
					'default' 		 => '70',
					'after'          => esc_html(' px'),
					'attributes'     => array(
						'min'       	 => 40,
					),
					'subtitle'  		 => '<div class="cs-text-muted cs-text-desc"><br>'.esc_html__('Height for menu area only', 'liviza').'</div>',
					'dependency'     => array( 'header_style', 'any', 'infostack,classic-overlay-center' ),
				),
				array(
					'id'            => 'header_menu_bg_color',
					'type'          => 'select',
					'title'         =>  esc_html__('Header Menu Background Color', 'liviza'),
					'options'  		=> array(
						'darkgrey'		=> esc_html__('Dark grey', 'liviza'),
						'grey'			=> esc_html__('Grey', 'liviza'),
						'white'			=> esc_html__('White', 'liviza'),
						'skincolor'		=> esc_html__('Skincolor', 'liviza'),
						'custom'		=> esc_html__('Custom Color', 'liviza'),
					),
					'default'       => 'darkgrey',
					'dependency'	=> array( 'header_style', 'any', 'infostack,classic-overlay-center' ),
					'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>'.esc_html__('Select predefined background color for Menu area in header', 'liviza').'</div>',
				),
				array(
					'id'     		 => 'header_menu_bg_custom_color',
					'type'   		 => 'color_picker',
					'title'  		 => esc_html__('Header Menu Background Custom Background Color', 'liviza' ),
					'default'		 => 'rgba(0,0,0,0.31)',
					'dependency'  	 => array( 'header_menu_bg_color|header_style', '==|any', 'custom|infostack,classic-overlay-center' ),
					'after'  		 => '<div class="cs-text-muted cs-text-desc"><br>'.esc_html__('Custom background color for Header Menu area', 'liviza').'</div>',
				),
				array(
					'id'            => 'sticky_header_menu_bg_color',
					'type'          => 'select',
					'title'         =>  esc_html__('Sticky Header Menu Background Color', 'liviza'),
					'options'  		=> array(
						'darkgrey'   => esc_html__('Dark grey', 'liviza'),
						'grey'       => esc_html__('Grey', 'liviza'),
						'white'      => esc_html__('White', 'liviza'),
						'skincolor'  => esc_html__('Skincolor', 'liviza'),
						'custom'     => esc_html__('Custom Color', 'liviza'),
					),
					'default'       => 'darkgrey',
					'dependency'	=> array( 'header_style', 'any', 'infostack,classic-overlay-center' ),
					'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>'.esc_html__('Select predefined background color for Menu area in header when header is sticky', 'liviza').'</div>',
				),
				array(
					'id'     		 => 'sticky_header_menu_bg_custom_color',
					'type'   		 => 'color_picker',
					'title'  		 => esc_html__('Sticky Header Menu Background Custom Background Color', 'liviza' ),
					'default'		 => sanitize_hex_color('#ffffff'),
					'dependency'  	 => array( 'sticky_header_menu_bg_color|header_style', '==|any', 'custom|infostack,classic-overlay-center' ),
					'after'  		 => '<div class="cs-text-muted cs-text-desc"><br>'.esc_html__('Custom background color for Header Menu area when header is sticky', 'liviza').'</div>',
				),
				array(
					'type'    		=> 'heading',
					'content'		=> esc_html__('Header Settings', 'liviza'),
				),
				array(
					'id'     		 => 'header_height',
					'type'   		 => 'number',
					'title'          => esc_html__('Header Height (in pixel)', 'liviza' ),
					'after'  	  	 => '<div class="cs-text-muted cs-text-desc"><br>'.esc_html__('You can set height of header area from here', 'liviza').'</div>',
					'default'		 => '105',
				),
				array(
					'id'            => 'header_bg_color',
					'type'          => 'select',
					'title'         =>  esc_html__('Header Background Color', 'liviza'),
					'options'		=> array(
						'transparent'	=> esc_html__('Transparent', 'liviza'),
						'darkgrey'		=> esc_html__('Dark grey', 'liviza'),
						'grey'			=> esc_html__('Grey', 'liviza'),
						'white'			=> esc_html__('White', 'liviza'),
						'skincolor'		=> esc_html__('Skincolor', 'liviza'),
						'custom'		=> esc_html__('Custom Color', 'liviza'),
					),
					'default'       => 'white',
					'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>'.esc_html__('Select predefined color for Header background color', 'liviza').'</div>',
				),
				array(
					'id'     		 => 'header_bg_custom_color',
					'type'   		 => 'color_picker',
					'title'  		 => esc_html__('Header Custom Background Color', 'liviza' ),
					'default'		 => 'rgba(0,0,0,0)',
					'dependency'  	 => array( 'header_bg_color', '==', 'custom' ),//Multiple dependency
					'after'  		 => '<div class="cs-text-muted cs-text-desc"><br>'.esc_html__('Custom background color for Header', 'liviza').'</div>',
				),
				array(
					'id'     		 => 'responsive_header_bg_custom_color',
					'type'   		 => 'color_picker',
					'title'  		 => esc_html__('Responsive Header Custom Background Color', 'liviza' ),
					'default'		 => 'rgba(21,21,21,0.96)',
					'dependency'  	 => array( 'header_bg_color|header_style', '==|any', 'custom|classic-overlay,centerlogo-overlay,toplogo-overlay,classic-box-overlay,classic-box-overlay-rtl,classic-overlay-rtl,infostack-overlay,infostack-overlay-rtl' ),//Multiple dependency
					'after'  		 => '<div class="cs-text-muted cs-text-desc"><br>'.esc_html__('Custom background color for Header in responsive mode only. Like Mobile, tablet etc small screen devices.', 'liviza').'</div>',
				),
				array(
					'id'            => 'header_responsive_icon_color',
					'type'          => 'select',
					'title'         =>  esc_html__('Header Responsive Icon Color', 'liviza'),
					'options'		=> array(
						'dark'			=> esc_html__('Dark', 'liviza'),
						'white'			=> esc_html__('White', 'liviza'),
					),
					'default'       => 'dark',
					'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>'.esc_html__('Select color for responsive menu icon, cart icon, search icon. This is becuase PHP code cannot understand if you selected dark or light color as background. Will work in responsive only.', 'liviza').'</div>',
					'dependency'    => array( 'header_bg_color', '==', 'custom' ),//Multiple dependency
				),
				array(
					'id'     		 => 'logo_max_height',
					'type'   		 => 'number',
					'title'          => esc_html__('Logo Max Height', 'liviza' ),
					'after'  	  	 => '<div class="cs-text-muted cs-text-desc"><br>'.esc_html__('If you feel your logo looks small than increase this and adjust it', 'liviza').'</div>',
					'default'		 => '50',
					'dependency'  	 => array( 'logotype_image', '==', 'true' ),
				),
				array(
					'type'       	 => 'heading',
					'content'    	 => esc_html__('Sticky Header', 'liviza'),
					'after'  	  	 => '<small>'.esc_html__('Options for sticky header', 'liviza').'</small>',
				),
				array(
					'id'     		=> 'sticky_header',
					'type'   		=> 'switcher',
					'title'   		=> esc_html__('Enable Sticky Header', 'liviza'),
					'default' 		=> true,
					'label'  		=> '<div class="cs-text-muted cs-text-desc">'.esc_html__('Select ON if you want the sticky header on page scroll', 'liviza').'</div>',
				),
				array(
					'id'     		 => 'header_height_sticky',
					'type'   		 => 'number',
					'title'          => esc_html__('Sticky Header Height (in pixel)', 'liviza' ),
					'after'  	  	 => '<div class="cs-text-muted cs-text-desc"><br>'.esc_html__('You can set height of header area when it becomes sticky', 'liviza').'</div>',
					'default'		 => '90',
					'dependency'     => array( 'sticky_header', '==', 'true' ),
				),
				array(
					'id'            => 'sticky_header_bg_color',
					'type'          => 'select',
					'title'         =>  esc_html__('Sticky Header Background Color', 'liviza'),
					'options'		=> array(
						'darkgrey'		=> esc_html__('Dark grey', 'liviza'),
						'grey'			=> esc_html__('Grey', 'liviza'),
						'white'			=> esc_html__('White', 'liviza'),
						'skincolor'		=> esc_html__('Skincolor', 'liviza'),
						'custom'		=> esc_html__('Custom Color', 'liviza'),
					),
					'default'       => 'white',
					'dependency'    => array( 'sticky_header', '==', 'true' ),
					'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>'.esc_html__('Select predefined color for Sticky Header background color', 'liviza').'</div>',
				),
				array(
					'id'     		 => 'sticky_header_bg_custom_color',
					'type'   		 => 'color_picker',
					'title'  		 => esc_html__('Sticky Header Custom Background Color', 'liviza' ),
					'default'		 => sanitize_hex_color('#ffffff'),
					'dependency'  	 => array( 'sticky_header_bg_color|sticky_header', '==|==', 'custom|true' ),//Multiple dependency
					'after'  		 => '<div class="cs-text-muted cs-text-desc"><br>'.esc_html__('Custom background color for Sticky Header', 'liviza').'</div>',
				),
				array(
					'id'     		 => 'logo_max_height_sticky',
					'type'   		 => 'number',
					'title'          => esc_html__('Logo Max Height when Sticky Header', 'liviza' ),
					'after'  	  	 => '<div class="cs-text-muted cs-text-desc"><br>'.esc_html__('Set logo when the header is sticky', 'liviza').'</div>',
					'default'		 => '50',
					'dependency'     => array( 'sticky_header', '==', 'true' ),
				),
				array(
					'type'       	 => 'heading',
					'content'    	 => esc_html__('Search Button in Header', 'liviza'),
					'after'  	  	 => '<small>'.esc_html__('Option to show or hide search button in header area', 'liviza').'</small>',
				),
				array(
					'id'     		=> 'header_search',
					'type'   		=> 'switcher',
					'title'   		=> esc_html__('Show Search Button', 'liviza'),
					'default' 		=> false,
					'label'  		=> '<div class="cs-text-muted cs-text-desc">'.esc_html__('Set this option "ON" to show search button in header. The icon will be at the right side (after menu)', 'liviza').'</div>',
				),
				array(
					'id'			=> 'search_input',
					'type'			=> 'text',
					'title'			=> esc_html__('Search Form Input Word', 'liviza'),
					'default'		=> esc_html__('Type Word Then Press Enter', 'liviza'),
					'after'			=> '<div class="cs-text-muted cs-text-desc"><br>'.esc_html__('Write the search form input word here. <br> Default: "WRITE SEARCH WORD..."', 'liviza').'</div>',
					'dependency'	=> array( 'header_search', '==', 'true' ),
				),
				array(
					'id'       		 => 'logoimg_search',
					'type'     		 => 'themestek_image',
					'title'    		 => esc_html__('Logo on search form', 'liviza'),
					'after'  		 => '<div class="cs-text-muted cs-text-desc"><br>'.esc_html__('Upload logo image that will be shown above the search form.', 'liviza').'</div>',
					'add_title'		 => esc_html__('Upload Logo','liviza'),
					'default'		 => array(
						'thumb-url'	=> get_template_directory_uri() . '/images/logo-white.png',
						'full-url'	=> get_template_directory_uri() . '/images/logo-white.png',
					),
					'dependency'	=> array( 'header_search', '==', 'true' ),
				),
				array(
					'type'       	 => 'heading',
					'content'    	 => esc_html__('Logo SEO', 'liviza'),
					'after'  	  	 => '<small>'.esc_html__('Options for Logo SEO', 'liviza').'</small>',
				),
				array(
					'id'      		=> 'logoseo',
					'type'   		=> 'radio',
					'title'   		=> esc_html__('Logo Tag for SEO', 'liviza'),
					'options' 		=> array(
						'h1homeonly' => esc_html__('H1 for home, SPAN on other pages', 'liviza'),
						'allh1'      => esc_html__('H1 tag everywhere', 'liviza'),
					),
					'default'		=> 'h1homeonly',
					'after'  	  	=> '<div class="cs-text-muted cs-text-desc"><br>'.esc_html__('Select logo tag for SEO purpose', 'liviza').'</div>',
				),
			)
		),

		// Layout Settings - Menu Settings
		array(
			'name'   => 'menu_settings', // like ID
			'title'  => esc_html__('Menu Settings', 'liviza'),
			'icon'   => 'fa fa-gear',
			'fields' => array( // begin: fields
				array(
					'type'       	 => 'heading',
					'content'    	 => esc_html__('Menu Settings', 'liviza'),
					'after'  	  	=> '<small>'.esc_html__('Responsive Menu Breakpoint: Change Options for responsive menu.', 'liviza').'</small>',
				),
				array(
					'id'      		=> 'menu_breakpoint',
					'type'   		=> 'radio',
					'title'   		=> esc_html__('Responsive Menu Breakpoint', 'liviza'),
					'options'  		=> array(
						'1200'   => esc_html__('Large devices','liviza').' <small>'.esc_html__('Desktops (>1200px)', 'liviza').'</small>',
						'992'    => esc_html__('Medium devices','liviza').' <small>'.esc_html__('Desktops and Tablets (>992px)', 'liviza').'</small>',
						'768'    => esc_html__('Small devices','liviza').' <small>'.esc_html__('Mobile and Tablets (>768px)', 'liviza').'</small>',
						'custom' => esc_html__('Custom (select pixel below)', 'liviza'),
					),
					'default'		=> '1200',
					'after'  	  	=> '<div class="cs-text-muted cs-text-desc"><br>'.esc_html__('Change options for responsive menu breakpoint', 'liviza').'</div>',
				),
				array(
					'id'     		 => 'menu_breakpoint-custom',
					'type'   		 => 'number',
					'title'          => esc_html__('Custom Breakpoint for Menu (in pixel)', 'liviza' ),
					'dependency'  	 => array( 'menu_breakpoint_custom', '==', 'true' ),
					'default'		 => '1200',
					'after'  	  	 => '<div class="cs-text-muted cs-text-desc"><br>'.esc_html__('Select after how many pixels the menu will become responsive', 'liviza').'</div>',
				),
				array(
					'type'       	 => 'heading',
					'content'    	 => esc_html__('Main Menu Options', 'liviza'),
					'after'  	  	 => '<small>'.esc_html__('Options for main menu in header', 'liviza').'</small>',
				),
				array(
					'id'             => 'mainmenufont',
					'type'           => 'themestek_typography',
					'title'          => esc_html__('Main Menu Font', 'liviza'),
					'chosen'         => false,
					'text-align'     => false,
					'google'         => true, // Disable google fonts. Won't work if you haven't defined your google api key
					'font-backup'    => true, // Select a backup non-google font in addition to a google font
					'subsets'        => false, // Only appears if google is true and subsets not set to false
					'line-height'    => true,
					'text-transform' => true,
					'word-spacing'   => false, // Defaults to false
					'letter-spacing' => true, // Defaults to true
					'color'          => true,
					'all-varients'   => false,
					'output'         => '#site-header-menu #site-navigation div.nav-menu > ul > li > a, .themestek-mmmenu-override-yes #site-header-menu #site-navigation .mega-menu-wrap .mega-menu.mega-menu-horizontal > li.mega-menu-item > a', // An array of CSS selectors to apply this font style to dynamically
					'units'          => 'px', // Defaults to px
					'default'        => array(
						'family'			=> 'Roboto',
						'backup-family'		=> 'Arial, Helvetica, sans-serif',
						'variant'			=> '500',
						'text-transform'	=> 'uppercase',
						'font-size'			=> '14',
						'line-height'		=> '18',
						'letter-spacing'	=> '1',
						'color'				=> sanitize_hex_color('#222d35'),
						'font'				=> 'google',
					),
					'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>'.esc_html__('Select main menu font, color and size', 'liviza').'</div>',
				),
				array(
					'id'     		 => 'stickymainmenufontcolor',
					'type'   		 => 'color_picker',
					'title'  		 => esc_html__('Main Menu Font Color for Sticky Header', 'liviza' ),
					'default'		 => sanitize_hex_color('#222d35'),
					'after'  		 => '<div class="cs-text-muted cs-text-desc"><br>'.esc_html__('Main menu font color when the header becomes sticky', 'liviza').'</div>',
				),
				array(
					'id'           	=> 'mainmenu_active_link_color',
					'type'         	=> 'select',
					'title'        	=>  esc_html__('Main Menu Active Link Color', 'liviza'),
					'options'  		=> array(
						'skin'			=> esc_html__('Skin color (default)', 'liviza'),
						'custom'		=> esc_html__('Custom color (select below)', 'liviza'),
					),
					'default'      	=> 'skin',
					'after'  		=> themestek_wp_kses('<div class="cs-text-muted cs-text-desc"><br>
											<strong>' . esc_html__('Tips:', 'liviza') . '</strong>
											<ul>
												<li>' . esc_html__('"Skin color (default):" Skin color for active link color.', 'liviza') . '</li>
												<li>' . esc_html__('"Custom color:" Custom color for active link color. Useful if you like to use any color for active link color.', 'liviza') . '</li>
											</ul>
										</div>'),
				),
				array(
					'id'     		 => 'mainmenu_active_link_custom_color',
					'type'   		 => 'color_picker',
					'title'  		 => esc_html__('Main Menu Active Link Custom Color', 'liviza' ),
					'default'		 => sanitize_hex_color('#ffffff'),
					'dependency'  	 => array( 'mainmenu_active_link_color', '==', 'custom' ),
					'after'  		 => '<div class="cs-text-muted cs-text-desc"><br>'.esc_html__('Custom color for main menu active active link', 'liviza').'</div>',
				),
				array(
					'type'       	 => 'heading',
					'content'    	 => esc_html__('Drop Down Menu Options', 'liviza'),
					'after'  	  	 => '<small>'.esc_html__('Options for drop down menu in header', 'liviza').'</small>',
				),
				array(
					'id'             => 'dropdownmenufont',
					'type'           => 'themestek_typography',
					'title'          => esc_html__('Dropdown Menu Font', 'liviza'),
					'chosen'         => false,
					'text-align'     => false,
					'google'         => true, // Disable google fonts. Won't work if you haven't defined your google api key
					'font-backup'    => true, // Select a backup non-google font in addition to a google font
					'subsets'        => false, // Only appears if google is true and subsets not set to false
					'line-height'    => true,
					'text-transform' => true,
					'word-spacing'   => false, // Defaults to false
					'letter-spacing' => true, // Defaults to true
					'color'          => true,
					'all-varients'   => false,
					'output'         => 'ul.nav-menu li ul li a, div.nav-menu > ul li ul li a, .themestek-mmmenu-override-yes #site-header-menu #site-navigation .mega-menu-wrap .mega-menu.mega-menu-horizontal .mega-sub-menu a, .themestek-mmmenu-override-yes #site-header-menu #site-navigation .mega-menu-wrap .mega-menu.mega-menu-horizontal .mega-sub-menu a:hover, .themestek-mmmenu-override-yes #site-header-menu #site-navigation .mega-menu-wrap .mega-menu.mega-menu-horizontal .mega-sub-menu a:focus, .themestek-mmmenu-override-yes #site-header-menu #site-navigation .mega-menu-wrap .mega-menu.mega-menu-horizontal .mega-sub-menu a.mega-menu-link, .themestek-mmmenu-override-yes #site-header-menu #site-navigation .mega-menu-wrap .mega-menu.mega-menu-horizontal .mega-sub-menu a.mega-menu-link:hover, .themestek-mmmenu-override-yes #site-header-menu #site-navigation .mega-menu-wrap .mega-menu.mega-menu-horizontal .mega-sub-menu a.mega-menu-link:focus, .themestek-mmmenu-override-yes #site-header-menu #site-navigation .mega-menu-wrap .mega-menu.mega-menu-horizontal .mega-sub-menu > li.mega-menu-item-type-widget', // An array of CSS selectors to apply this font style to dynamically
					'units'          => 'px', // Defaults to px
					'default'        => array(
						'family'			=> 'Roboto',
						'backup-family'	=> 'Arial, Helvetica, sans-serif',
						'variant'			=> 'regular',
						'text-transform'	=> '',
						'font-size'			=> '14',
						'line-height'		=> '18',
						'letter-spacing'	=> '0',
						'color'				=> sanitize_hex_color('#2d3845'),
						'font'				=> 'google',
					),
					'after'  	=> '<div class="cs-text-muted cs-text-desc"><br>'.esc_html__('Select dropdown menu font, color and size', 'liviza').'</div>',
				),
				array(
					'id'           	=> 'dropmenu_active_link_color',
					'type'         	=> 'select',
					'title'        	=>  esc_html__('Dropdown Menu Active Link Color', 'liviza'),
					'options'  		=> array(
						'skin'			=> esc_html__('Skin color (default)', 'liviza'),
						'custom'		=> esc_html__('Custom color (select below)', 'liviza'),
					),
					'default'      	=> 'skin',
					'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>' . '<strong>' . esc_html__('Tips:', 'liviza') . '</strong>' . '<ul><li>' . esc_html__('"Skin color (default):" Skin color for active link color.', 'liviza') . '</li><li>' . esc_html__('"Custom color:" Custom color for active link color. Useful if you like to use any color for active link color.', 'liviza') . '</li></ul></div>',
				),
				array(
					'id'     		=> 'dropmenu_active_link_custom_color',
					'type'   		=> 'color_picker',
					'title'  		=> esc_html__('Dropdown Menu Active Link Custom Color', 'liviza' ),
					'default'		=> sanitize_hex_color('#3368c6'),
					'dependency'  	=> array( 'dropmenu_active_link_color', '==', 'custom' ),
					'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>'.esc_html__('Custom color for dropdown menu active menu text', 'liviza').'</div>',
				),
				array(
					'id'      		=> 'dropmenu_background',
					'type'    		=> 'themestek_background',
					'title'  		=> esc_html__('Dropdown Menu Background Properties (for all dropdown menus)', 'liviza' ),
					'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>'.esc_html__('Set background for dropdown menu. This will be applied to all dropdown menus. You can set common style here.', 'liviza').'</div>',
					'default'		=> array(
						'image'			=> '',
						'repeat'		=> 'no-repeat',
						'position'		=> 'center top',
						'size'			=> 'cover',
						'color'			=> sanitize_hex_color('#ffffff'),
					),
					'output' 	    => '.themestek-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal li.mega-menu-item ul.mega-sub-menu, #site-header-menu #site-navigation div.nav-menu > ul > li ul',
				),
			)
		),

		// Layout Settings - Titlebar Settings
		array(
			'name'   => 'titlebar_settings', // like ID
			'title'  => esc_html__('Titlebar Settings', 'liviza'),
			'icon'   => 'fa fa-gear',
			'fields' => array( // begin: fields
				array(
					'type'       	 => 'heading',
					'content'    	 => esc_html__('Titlebar Background Options', 'liviza'),
					'after'  	  	 => '<small>'.esc_html__('Background options for Titlebar area', 'liviza').'</small>',
				),
				array(
					'id'            => 'titlebar_bg_color',
					'type'          => 'select',
					'title'         =>  esc_html__('Titlebar Background Color', 'liviza'),
					'options'  => array(
						'transparent' => esc_html__('Transparent', 'liviza'),
						'darkgrey'    => esc_html__('Dark grey', 'liviza'),
						'grey'        => esc_html__('Grey', 'liviza'),
						'white'       => esc_html__('White', 'liviza'),
						'skincolor'   => esc_html__('Skincolor', 'liviza'),
						'custom'      => esc_html__('Custom Color', 'liviza'),
					),
					'default'       => 'darkgrey',
					'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>'.esc_html__('Select predefined color for Titlebar background color', 'liviza').'</div>',
				),
				array(
					'id'      		=> 'titlebar_background',
					'type'    		=> 'themestek_background',
					'title'  		=> esc_html__('Titlebar Background Image', 'liviza' ),
					'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>'.esc_html__('Set background for Title bar. You can set color or image and also set other background related properties', 'liviza').'</div>',
					'color'			=> true,
					'default'		=> array(
						'repeat'		=> 'no-repeat',
						'position'		=> 'center center',
						'size'			=> 'cover',
						'color'			=> sanitize_hex_color('#efefef'),
					),
					'output' 	    => 'div.themestek-titlebar-wrapper',
					'output_bglayer'    => true,  // apply color to bglayer class div inside this , default: true
					'color_dropdown_id' => 'titlebar_bg_color',   // color dropdown to decide which color
				),
				array(
					'id'        => 'titlebar_bg_featured_img',
					'type'      => 'checkbox',
					'title'     => esc_html__('Featured Image as Titlebar Background', 'liviza'),
					'options'   => array(
						'post'					=> sprintf( esc_html__('For %1$s', 'liviza') , '<strong>Post</strong>' ),
						'page'					=> sprintf( esc_html__('For %1$s', 'liviza') , '<strong>Page</strong>' ),
						'themestek-portfolio'	=> sprintf( esc_html__('For %1$s', 'liviza') , '<strong>'.$pf_title_singular.'</strong>' ),
						'themestek-coaching'		=> sprintf( esc_html__('For %1$s', 'liviza') , '<strong>'.$ch_title_singular.'</strong>' ),
						'themestek-team'		=> sprintf( esc_html__('For %1$s', 'liviza') , '<strong>'.$team_member_title_singular.'</strong>' ),
					),
					'default'    => array(),
					'after'    	 => '<div class="cs-text-muted cs-text-desc">'.esc_html__('Select which section (CPT) will show featured image as background image in Titlebar.', 'liviza'). '<br>' . esc_html__('NOTE: This will work for Single view only.', 'liviza').'</div>',
				),
				array(
					'type'       	 => 'heading',
					'content'    	 => esc_html__('Titlebar Font Settings', 'liviza'),
					'after'  	  	 => '<small>'.esc_html__('Font Settings for different elements in Titlebar area', 'liviza').'</small>',
				),
				array(
					'id'            => 'titlebar_text_color',
					'type'          => 'select',
					'title'         =>  esc_html__('Titlebar Text Color', 'liviza'),
					'options'  => array(
						'white'  => esc_html__('White', 'liviza'),
						'dark'   => esc_html__('Dark', 'liviza'),
						'custom' => esc_html__('Custom Color', 'liviza'),
					),
					'default'       => 'white',
					'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>'.esc_html__('Select "Dark" color if you are going to select light color in above option', 'liviza').'</div>',
				),
				array(
					'id'             => 'titlebar_heading_font',
					'type'           => 'themestek_typography',
					'title'          => esc_html__('Heading Font', 'liviza'),
					'chosen'         => false,
					'text-align'     => false,
					'google'         => true, // Disable google fonts. Won't work if you haven't defined your google api key
					'font-backup'    => true, // Select a backup non-google font in addition to a google font
					'subsets'        => false, // Only appears if google is true and subsets not set to false
					'line-height'    => true,
					'text-transform' => true,
					'word-spacing'   => false, // Defaults to false
					'letter-spacing' => true, // Defaults to true
					'color'          => true,
					'all-varients'   => true,
					'output'         => '.themestek-titlebar h1.entry-title, .themestek-titlebar-textcolor-custom .themestek-titlebar-main .entry-title', // An array of CSS selectors to apply this font style to dynamically
					'units'          => 'px', // Defaults to px
					'default'        => array(
						'family'			=> 'Roboto',
						'backup-family'		=> 'Arial, Helvetica, sans-serif',
						'variant'			=> 'regular',
						'text-transform'	=> '',
						'font-size'			=> '45',
						'line-height'		=> '55',
						'letter-spacing'	=> '0',
						'color'				=> sanitize_hex_color('#dd9933'),
						'all-varients'		=> 'on',
						'font'				=> 'google',
					),
					'after'			=> '<div class="cs-text-muted cs-text-desc"><br>'.esc_html__('Select font family, size etc. for heading in Titlebar', 'liviza').'</div>',
				),
				array(
					'id'             => 'titlebar_subheading_font',
					'type'           => 'themestek_typography',
					'title'          => esc_html__('Sub-heading Font', 'liviza'),
					'chosen'         => false,
					'text-align'     => false,
					'google'         => true, // Disable google fonts. Won't work if you haven't defined your google api key
					'font-backup'    => true, // Select a backup non-google font in addition to a google font
					'subsets'        => false, // Only appears if google is true and subsets not set to false
					'line-height'    => true,
					'text-transform' => true,
					'word-spacing'   => false, // Defaults to false
					'letter-spacing' => true, // Defaults to true
					'color'          => true,
					'all-varients'   => true,
					'output'         => '.themestek-titlebar .entry-subtitle, .themestek-titlebar-textcolor-custom .themestek-titlebar-main .entry-subtitle', // An array of CSS selectors to apply this font style to dynamically
					'units'			 => 'px', // Defaults to px
					'default'        => array(
						'family'			=> 'Muli',
						'backup-family'		=> 'Arial, Helvetica, sans-serif',
						'variant'			=> 'regular',
						'text-transform'	=> '',
						'font-size'			=> '18',
						'line-height'		=> '28',
						'letter-spacing'	=> '0',
						'color'				=> sanitize_hex_color('#dd9933'),
						'all-varients'		=> 'on',
						'font'				=> 'google',
					),
					'after'  		 => '<div class="cs-text-muted cs-text-desc"><br>'.esc_html__('Select font family, size etc. for sub-heading in Titlebar', 'liviza').'</div>',
				),
				array(
					'id'             => 'titlebar_breadcrumb_font',
					'type'           => 'themestek_typography',
					'title'          => esc_html__('Breadcrumb Font', 'liviza'),
					'chosen'         => false,
					'text-align'     => false,
					'google'         => true, // Disable google fonts. Won't work if you haven't defined your google api key
					'font-backup'    => true, // Select a backup non-google font in addition to a google font
					'subsets'        => false, // Only appears if google is true and subsets not set to false
					'line-height'    => true,
					'text-transform' => true,
					'word-spacing'   => false, // Defaults to false
					'letter-spacing' => true, // Defaults to true
					'color'          => true,
					'all-varients'   => false,
					'output'         => '.themestek-titlebar .breadcrumb-wrapper, .themestek-titlebar .breadcrumb-wrapper a', // An array of CSS selectors to apply this font style to dynamically
					'units'          => 'px', // Defaults to px
					'default'        => array(
						'family'			=> 'Muli',
						'backup-family'		=> 'Arial, Helvetica, sans-serif',
						'variant'			=> 'regular',
						'text-transform'	=> '',
						'font-size'			=> '16',
						'line-height'		=> '26',
						'letter-spacing'	=> '0',
						'color'				=> sanitize_hex_color('#eeee22'),
						'font'				=> 'google',
					),
					'after'  	=> '<div class="cs-text-muted cs-text-desc"><br>'.esc_html__('Select font family, size etc. for breadcrumbs in Titlebar', 'liviza').'</div>',
				),
				array(
					'type'       	 => 'heading',
					'content'    	 => esc_html__('Titlebar Content Options', 'liviza'),
					'after'  	  	 => '<small>'.esc_html__('Content options for Titlebar area', 'liviza').'</small>',
				),
				array(
					'id'            => 'titlebar_view',
					'type'          => 'select',
					'title'         =>  esc_html__('Titlebar Text Align', 'liviza'),
					'options'       => array(
						'default'  => esc_html__('All Center (default)', 'liviza'),
						'left'     => esc_html__('Title Left / Breadcrumb Right', 'liviza'),
						'right'    => esc_html__('Title Right / Breadcrumb Left', 'liviza'),
						'allleft'  => esc_html__('All Left', 'liviza'),
						'allright' => esc_html__('All Right', 'liviza'),
					),
					'default'       => 'allleft',
					'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>'.esc_html__('Select text align in Titlebar', 'liviza').'</div>',
				),
				array(
					'id'     		 => 'titlebar_height',
					'type'   		 => 'number',
					'title'          => esc_html__( 'Titlebar Height', 'liviza' ),
					'after'  	  	 => ' px<br><div class="cs-text-muted cs-text-desc">'.esc_html__('Set height of the Titlebar. In pixel only', 'liviza').'</div>',
					'default'		 => '200',
				),
				array(
					'id'        	=> 'breadcrumb_on_bottom',
					'type'      	=> 'checkbox',
					'title'     	=> esc_html__('Show Breadcrumb on bottom of Titlebar area', 'liviza'),
					'label'     	=> esc_html__('YES', 'liviza'),
					'default'   	=> false,
					'dependency'  	=> array( 'titlebar_view', 'any', 'default,allleft,allright' ),//Multiple dependency
					'after'    		=> '<div class="cs-text-muted cs-text-desc"><br>'.esc_html__('Select this option if you like to show breadcrumbs on bottom of Titlebar area. This option will only work when Titlebar Text Align option above is set to (All Center, All Left or All Right)', 'liviza').'</div>',
				),
				array(
					'id'            => 'titlebar_hide_breadcrumb',
					'type'          => 'select',
					'title'         =>  esc_html__('Hide Breadcrumb', 'liviza'),
					'options' 		=> array(
						'no'			=> esc_html__('NO, show the breadcrumb', 'liviza'),
						'yes'			=> esc_html__('YES, Hide the Breadcrumb', 'liviza'),
					),
					'default'       => 'no',
					'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>'.esc_html__('You can show or hide the breadcrumb', 'liviza').'</div>',
				),
				array(
					'type'       	 => 'heading',
					'content'    	 => esc_html__('Titlebar Extra Options', 'liviza'),
					'after'  	  	 => '<small>'.esc_html__('Change settings for some extra options in Titlebar', 'liviza').'</small>',
				),
				array(
					'id'      => 'adv_tbar_catarc',
					'type'    => 'text',
					'title'   => esc_html__('Post Category "Category Archives:" Label Text', 'liviza'),
					'default' => esc_html__('Category Archives: ', 'liviza'),
				),
				array(
					'id'      => 'adv_tbar_tagarc',
					'type'    => 'text',
					'title'   => esc_html__('Post Tag "Tag Archives:" Label Text', 'liviza'),
					'default' => esc_html__('Tag Archives: ', 'liviza'),
				),
				array(
					'id'      => 'adv_tbar_postclassified',
					'type'    => 'text',
					'title'   => esc_html__('Post Taxonomy "Posts classified under:" Label Text', 'liviza'),
					'default' => esc_html__('Posts classified under: ', 'liviza'),
				),
				array(
					'id'      => 'adv_tbar_authorarc',
					'type'    => 'text',
					'title'   => esc_html__('Post Author "Author Archives:" Label Text', 'liviza'),
					'default' => esc_html__('Author Archives: ', 'liviza'),
				),
			)
		),
		// Layout Settings - Footer Settings
		array(
			'name'   => 'footer_settings', // like ID
			'title'  => esc_html__('Footer Settings', 'liviza'),
			'icon'   => 'fa fa-gear',
			'fields' => array( // begin: fields
				array(
					'type'			=> 'heading',
					'content'    	=> esc_html__('Sticky Footer', 'liviza'),
					'after'  	  	=> '<small>'.esc_html__('Make footer sticky and visible on scrolling at bottom', 'liviza').'</small>',
				),
				array(
					'id'     		=> 'stickyfooter',
					'type'   		=> 'switcher',
					'title'   		=> esc_html__('Sticky Footer', 'liviza'),
					'default' 		=> false,
					'label'  		=> '<div class="cs-text-muted cs-text-desc">'.esc_html__('Set this option "ON" to enable sticky footer on scrolling at bottom', 'liviza').'</div>',
				),
				// Footer common background
				array(
					'type'       	 => 'heading',
					'content'    	 => esc_html__('Footer Background (full footer elements)', 'liviza'),
					'after'  	  	 => '<small>'.esc_html__('This background property will apply to full footer area. You can add', 'liviza').'</small>',
				),
				array(
					'id'            => 'full_footer_bg_color',
					'type'          => 'select',
					'title'         =>  esc_html__('Footer Background Color (all area)', 'liviza'),
					'options'		=> array(
						'transparent' => esc_html__('Transparent', 'liviza'),
						'darkgrey'    => esc_html__('Dark grey', 'liviza'),
						'grey'        => esc_html__('Grey', 'liviza'),
						'white'       => esc_html__('White', 'liviza'),
						'skincolor'   => esc_html__('Skincolor', 'liviza'),
						'custom'      => esc_html__('Custom Color', 'liviza'),
					),
					'default'       => 'darkgrey',
					'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>'.esc_html__('Select predefined color for Footer background color', 'liviza').'</div>',
				),
				array(
					'id'      		 => 'full_footer_bg_all',
					'type'    		 => 'themestek_background',
					'title'  		 => esc_html__('Footer Background (all area)', 'liviza' ),
					'after'  		 => '<div class="cs-text-muted cs-text-desc"><br>'.esc_html__('Footer background image', 'liviza').'</div>',
					'default'		 => array(
						'repeat'		=> 'no-repeat',
						'position'		=> 'center center',
						'attachment'	=> 'fixed',
						'size'			=> 'cover',
						'color'			=> 'rgba(30,115,190,0.9)',
					),
					'output' 	     => '.footer',
					'output_bglayer' => true,  // apply color to bglayer class div inside this , default: true
					'color_dropdown_id' => 'full_footer_bg_color',   // color dropdown to decide which color
				),
				// Footer CTA
				array(
					'type'       	 => 'heading',
					'content'    	 => esc_html__('Footer Call-To-Action Area', 'liviza'),
					'after'  	  	 => '<small>'.esc_html__('Modify elements like title, icon, button link, button title etc in footer Call-To-Action area.', 'liviza').'</small>',
				),
				array(
					'id'     		=> 'footer_cta',
					'type'   		=> 'switcher',
					'title'   		=> esc_html__('Show Footer CTA', 'liviza'),
					'default' 		=> false,
					'label'  		=> '<div class="cs-text-muted cs-text-desc">'.esc_html__('Set this option "ON" to enable sticky footer on scrolling at bottom', 'liviza').'</div>',
				),
				array(
					'id'      => 'footer_cta_icon',
					'type'    => 'themestek_iconpicker',
					'title'   => esc_html__('Open Link Icon', 'liviza' ),
					'default' => array(
						'library'				=> 'fontawesome',
						'library_fontawesome'	=> 'fa fa-arrow-down',
						'library_themify'		=> 'themifyicon ti-menu',
						'library_sgicon'		=> 'sgicon sgicon-WorldWide',
						'library_vc_linecons'	=> 'li_star',
						'library_themestek_liviza_business_icon' => 'themestek-liviza-business-icon-checklist',
					),
					'dependency' 	=> array( 'footer_cta', '==', 'true' ),
				),
				array(
					'id'     		=> 'footer_cta_title',
					'type'    		=> 'textarea',
					'title'   		=> esc_html__('Footer CTA Title', 'liviza'),
					'default' 		=> esc_html__('WE ARE AVAILABLE FOR YOU', 'liviza'),
					'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>' . esc_html__('Title for the Footer CTA area', 'liviza') . '</div>',
					'dependency' 	=> array( 'footer_cta', '==', 'true' ),
				),
				array(
					'id'     		=> 'footer_cta_subtitle',
					'type'    		=> 'textarea',
					'title'   		=> esc_html__('Footer CTA Sub-title', 'liviza'),
					'default' 		=> '',
					'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>' . esc_html__('Sub-title for the Footer CTA area', 'liviza') . '</div>',
					'dependency' 	=> array( 'footer_cta', '==', 'true' ),
				),
				array(
					'id'     		=> 'footer_cta_button_text',
					'type'    		=> 'text',
					'title'   		=> esc_html__('Footer CTA Button Text', 'liviza'),
					'default' 		=> esc_html__('CONTACT US', 'liviza'),
					'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>' . esc_html__('Button text for the Footer CTA', 'liviza') . '</div>',
					'dependency' 	=> array( 'footer_cta', '==', 'true' ),
				),
				array(
					'id'     		=> 'footer_cta_button_link',
					'type'    		=> 'text',
					'title'   		=> esc_html__('Footer CTA Button Link', 'liviza'),
					'default' 		=> esc_html__('#', 'liviza'),
					'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>' . esc_html__('Button link for the Footer CTA', 'liviza') . '</div>',
					'dependency' 	=> array( 'footer_cta', '==', 'true' ),
				),
				// First Footer Widget Area
				array(
					'type'       	 => 'heading',
					'content'    	 => esc_html__('First Footer Widget Area', 'liviza'),
					'after'  	  	 => '<small>'.esc_html__('Options to change settings for footer widget area', 'liviza').'</small>',
				),
				array(
					'id'			=> 'first_footer_column_layout',
					'type' 			=> 'image_select',//themestek_pre_color_packages
					'title'			=> esc_html__('Footer Widget Columns', 'liviza'),
					'options'      	=> array(
						'12'      => get_template_directory_uri() . '/includes/images/footer_col_12.png',
						'6_6'     => get_template_directory_uri() . '/includes/images/footer_col_6_6.png',
						'4_4_4'   => get_template_directory_uri() . '/includes/images/footer_col_4_4_4.png',
						'3_3_3_3' => get_template_directory_uri() . '/includes/images/footer_col_3_3_3_3.png',
						'8_4'     => get_template_directory_uri() . '/includes/images/footer_col_8_4.png',
						'4_8'     => get_template_directory_uri() . '/includes/images/footer_col_4_8.png',
						'6_3_3'   => get_template_directory_uri() . '/includes/images/footer_col_6_3_3.png',
						'3_3_6'   => get_template_directory_uri() . '/includes/images/footer_col_3_3_6.png',
						'8_2_2'   => get_template_directory_uri() . '/includes/images/footer_col_8_2_2.png',
						'2_2_8'   => get_template_directory_uri() . '/includes/images/footer_col_2_2_8.png',
						'6_2_2_2' => get_template_directory_uri() . '/includes/images/footer_col_6_2_2_2.png',
						'2_2_2_6' => get_template_directory_uri() . '/includes/images/footer_col_2_2_2_6.png',
						'4_2_4_2' => get_template_directory_uri() . '/includes/images/footer_col_4_2_4_2.png',
						'2_4_2_2' => get_template_directory_uri() . '/includes/images/footer_col_2_4_2_4.png',
						'4_3_2_3' => get_template_directory_uri() . '/includes/images/footer_col_4_3_2_3.png',
					),
					'default'		=> '3_3_3_3',
					'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>'.esc_html__('Select Footer Column layout View for widgets.', 'liviza').'</div>',
					'radio'      	=> true,
				),
				array(
					'id'            => 'first_footer_bg_color',
					'type'          => 'select',
					'title'         =>  esc_html__('Footer Background Color', 'liviza'),
					'options'  => array(
						'transparent' => esc_html__('Transparent', 'liviza'),
						'darkgrey'    => esc_html__('Dark grey', 'liviza'),
						'grey'        => esc_html__('Grey', 'liviza'),
						'white'       => esc_html__('White', 'liviza'),
						'skincolor'   => esc_html__('Skincolor', 'liviza'),
						'custom'      => esc_html__('Custom Color', 'liviza'),
					),
					'default'       => 'transparent',
					'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>'.esc_html__('Select predefined color for Footer background color', 'liviza').'</div>',
				),
				array(
					'id'      			=> 'first_footer_bg_all',
					'type'    			=> 'themestek_background',
					'title'  			=> esc_html__('Footer Background', 'liviza' ),
					'after'  			=> '<div class="cs-text-muted cs-text-desc"><br>'.esc_html__('Footer background image', 'liviza').'</div>',
					'default'			=> array(
						'repeat'			=> 'no-repeat',
						'attachment'		=> 'fixed',
						'color'				=> sanitize_hex_color('#353a3d'),
					),
					'output'			=> '.first-footer',
					'output_bglayer'    => true,  // apply color to bglayer class div inside this , default: true
					'color_dropdown_id' => 'first_footer_bg_color',   // color dropdown to decide which color
				),
				array(
					'id'           	=> 'first_footer_text_color',
					'type'         	=> 'select',
					'title'        	=>  esc_html__('Text Color', 'liviza'),
					'options'  		=> array(
						'white'			=> esc_html__('White', 'liviza'),
						'dark'			=> esc_html__('Dark', 'liviza'),
					),
					'default'      	=> 'white',
					'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>'.esc_html__('Select "Dark" color if you are going to select light color in above option', 'liviza').'</div>',
				),
				// Second Footer Widget Area
				array(
					'type'       	 => 'heading',
					'content'    	 => esc_html__('Second Footer Widget Area', 'liviza'),
					'after'  	  	 => '<small>'.esc_html__('Options to change settings for second footer widget area', 'liviza').'</small>',
				),
				array(
					'id'			=> 'second_footer_column_layout',
					'type' 			=> 'image_select',//themestek_pre_color_packages
					'title'			=> esc_html__('Footer Widget Columns', 'liviza'),
					'options'      	=> array(
						'12'      => get_template_directory_uri() . '/includes/images/footer_col_12.png',
						'6_6'     => get_template_directory_uri() . '/includes/images/footer_col_6_6.png',
						'4_4_4'   => get_template_directory_uri() . '/includes/images/footer_col_4_4_4.png',
						'3_3_3_3' => get_template_directory_uri() . '/includes/images/footer_col_3_3_3_3.png',
						'8_4'     => get_template_directory_uri() . '/includes/images/footer_col_8_4.png',
						'4_8'     => get_template_directory_uri() . '/includes/images/footer_col_4_8.png',
						'6_3_3'   => get_template_directory_uri() . '/includes/images/footer_col_6_3_3.png',
						'3_3_6'   => get_template_directory_uri() . '/includes/images/footer_col_3_3_6.png',
						'8_2_2'   => get_template_directory_uri() . '/includes/images/footer_col_8_2_2.png',
						'2_2_8'   => get_template_directory_uri() . '/includes/images/footer_col_2_2_8.png',
						'6_2_2_2' => get_template_directory_uri() . '/includes/images/footer_col_6_2_2_2.png',
						'2_2_2_6' => get_template_directory_uri() . '/includes/images/footer_col_2_2_2_6.png',
						'4_2_4_2' => get_template_directory_uri() . '/includes/images/footer_col_4_2_4_2.png',
						'2_4_2_2' => get_template_directory_uri() . '/includes/images/footer_col_2_4_2_4.png',
						'4_3_2_3' => get_template_directory_uri() . '/includes/images/footer_col_4_3_2_3.png',
					),
					'default'		=> '3_3_3_3',
					'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>'.esc_html__('Select Footer Column layout View for widgets.', 'liviza').'</div>',
					'radio'      	=> true,
				),
				array(
					'id'            => 'second_footer_bg_color',
					'type'          => 'select',
					'title'         =>  esc_html__('Footer Background Color', 'liviza'),
					'options'		=> array(
						'transparent' => esc_html__('Transparent', 'liviza'),
						'darkgrey'    => esc_html__('Dark grey', 'liviza'),
						'grey'        => esc_html__('Grey', 'liviza'),
						'white'       => esc_html__('White', 'liviza'),
						'skincolor'   => esc_html__('Skincolor', 'liviza'),
						'custom'      => esc_html__('Custom Color', 'liviza'),
					),
					'default'       => 'transparent',
					'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>'.esc_html__('Select predefined color for Footer background color', 'liviza').'</div>',
				),
				array(
					'id'      		=> 'second_footer_bg_all',
					'type'    		=> 'themestek_background',
					'title'  		=> esc_html__('Footer Background', 'liviza' ),
					'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>'.esc_html__('Footer background image', 'liviza').'</div>',
					'default'		=> array(
						'color'			=> sanitize_hex_color('#313538'),
					),
					'output' 	    => '.second-footer',
					'output_bglayer'    => true,  // apply color to bglayer class div inside this , default: true
					'color_dropdown_id' => 'second_footer_bg_color',   // color dropdown to decide which color
				),
				array(
					'id'           	=> 'second_footer_text_color',
					'type'         	=> 'select',
					'title'        	=>  esc_html__('Text Color', 'liviza'),
					'options'  		=> array(
						'white'  		=> esc_html__('White', 'liviza'),
						'dark'   		=> esc_html__('Dark', 'liviza'),
					),
					'default'      	=> 'white',
					'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>'.esc_html__('Select "Dark" color if you are going to select light color in above option', 'liviza').'</div>',
				),
				// Footer Text Area
				array(
					'type'       	 => 'heading',
					'content'    	 => esc_html__('Footer Text Area', 'liviza'),
					'after'  	  	 => '<small>'.esc_html__('Options to change settings for footer text area. This contains copyright info', 'liviza').'</small>',
				),
				array(
					'id'            => 'bottom_footer_bg_color',
					'type'          => 'select',
					'title'         =>  esc_html__('Footer Background Color', 'liviza'),
					'options'  => array(
						'transparent' => esc_html__('Transparent', 'liviza'),
						'darkgrey'    => esc_html__('Dark grey', 'liviza'),
						'grey'        => esc_html__('Grey', 'liviza'),
						'white'       => esc_html__('White', 'liviza'),
						'skincolor'   => esc_html__('Skincolor', 'liviza'),
						'custom'      => esc_html__('Custom Color', 'liviza'),
					),
					'default'       => 'transparent',
					'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>'.esc_html__('Select predefined color for Footer background color', 'liviza').'</div>',
				),
				array(
					'id'      		=> 'bottom_footer_bg_all',
					'type'    		=> 'themestek_background',
					'title'  		=> esc_html__('Footer Background', 'liviza' ),
					'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>'.esc_html__('Footer background image', 'liviza').'</div>',
					'default'		=> array(
						'repeat'		=> 'no-repeat',
						'position'		=> 'center center',
						'attachment'	=> 'fixed',
						'color'			=> sanitize_hex_color('#313538'),
					),
					'output' 	    => '.bottom-footer-text',
					'output_bglayer'    => true,  // apply color to bglayer class div inside this , default: true
					'color_dropdown_id' => 'bottom_footer_bg_color',   // color dropdown to decide which color
				),
				array(
					'id'           	=> 'bottom_footer_text_color',
					'type'         	=> 'select',
					'title'        	=>  esc_html__('Text Color', 'liviza'),
					'options'  		=> array(
						'white'			=> esc_html__('White', 'liviza'),
						'dark'			=> esc_html__('Dark', 'liviza'),
					),
					'default'      	=> 'white',
					'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>'.esc_html__('Select "Dark" color if you are going to select light color in above option', 'liviza').'</div>',
				),
				array(
				  'id'				=> 'footer_copyright_left',
				  'type'			=> 'wysiwyg',
				  'title'			=>  esc_html__('Footer Text Left', 'liviza'),
				  'after'			=> '<div class="cs-text-muted cs-text-desc"><br>'. esc_html__('You can use the following shortcodes in your footer text:', 'liviza')
				  . '<br>   <code>[themestek-site-url]</code> <code>[themestek-site-title]</code> <code>[themestek-site-tagline]</code> <code>[themestek-current-year]</code> <code>[themestek-footermenu]</code> <br><br> '
				  . sprintf( esc_html__('%1$s Click here to know more%2$s  about details for each shortcode.','liviza') , '<a href="'. esc_url('http://liviza.themestekthemes.com/documentation/shortcodes.html') .'" target="_blank">' , '</a>'  ) .'</div>',
				  'default'         => sprintf( esc_html__( 'Copyright &copy; %1$s %2$s. All rights reserved.', 'liviza'), date('Y'), themestek_wp_kses('<a href="' . site_url() . '">' . get_bloginfo('name') . '</a>') ),
				),
				array(
				  'id'       		=> 'footer_copyright_right',
				  'type'     		=> 'wysiwyg',
				  'title'   		=>  esc_html__('Footer Text Right', 'liviza'),
				  'after'  			=> '<div class="cs-text-muted cs-text-desc"><br>'. esc_html__('You can use the following shortcodes in your footer text:', 'liviza')
				  . '<br>   <code>[themestek-site-url]</code> <code>[themestek-site-title]</code> <code>[themestek-site-tagline]</code> <code>[themestek-current-year]</code> <code>[themestek-footermenu]</code> <br><br> '
				  . sprintf( esc_html__('%1$s Click here to know more%2$s about details for each shortcode.','liviza') , '<a href="'. esc_url('http://liviza.themestekthemes.com/documentation/shortcodes.html') .'" target="_blank">' , '</a>'  ) .'</div>',
				  'default'         => '',
				),
			)
		)
	),
);
// hide_demo_content_option
$hide_demo_content_option = false;
if( isset($liviza_theme_options['hide_demo_content_option']) ){
	$hide_demo_content_option = $liviza_theme_options['hide_demo_content_option'];
}
if( $hide_demo_content_option == true ){
	// Removing one click demo setup option
	if( !empty($themestek_framework_options[0]["sections"][0]["fields"]) ){
		foreach( $themestek_framework_options[0]["sections"][0]["fields"] as $index => $option ){
			if( !empty($option['type']) && $option['type'] == 'themestek_one_click_demo_import' ){
				unset($themestek_framework_options[0]["sections"][0]["fields"][$index]);
			}
		}
	}
}
// Typography Settings
$themestek_framework_options[] = array(
	'name'   => 'typography_settings', // like ID
	'title'  => esc_html__('Typography Settings', 'liviza'),
	'icon'   => 'fa fa-gear',
	'fields' => array( // begin: fields
		array(
			'type'    	=> 'heading',
			'content'	=> esc_html__('Typography Settings', 'liviza'),
			'after'  	=> '<small>'.esc_html__('General Element Fonts/Typography', 'liviza').'</small>',
        ),
		array(
			'id'             => 'general_font',
			'type'           => 'themestek_typography',
			'title'          => esc_html__('General Font', 'liviza'),
			'chosen'         => false,
			'google'         => true, // Disable google fonts. Won't work if you haven't defined your google api key
			'backup-family'  => true, // Select a backup non-google font in addition to a google font
			'font-size'      => true,
			'color'          => true,
			'variant'        => true, // Only appears if google is true and subsets not set to false
			'line-height'    => true,
			'text-align'     => false,  // This is still not available
			'text-transform' => true,
			'letter-spacing' => true, // Defaults to true
			'all-varients'   => true,
			'output'         => 'body', // An array of CSS selectors to apply this font style to dynamically
			'line-height-unit'	=> '', // default to no unit
			'units'          => 'px', // Defaults to px - Currently not working
			'subtitle'       => esc_html__('Select font family, size etc. for H2 heading tag.', 'liviza'),
			'default'        => array (
				'family'			=> 'Muli',
				'backup-family'		=> 'Tahoma, Geneva, sans-serif',
				'variant'			=> 'regular',
				'text-transform'	=> '',
				'font-size'			=> '15',
				'line-height'		=> '1.8',
				'letter-spacing'	=> '0',
				'color'				=> sanitize_hex_color('#5d6975'),
				'all-varients'		=> 'on',
				'font'				=> 'google',
			),
		),
		array(
			'id'        => 'link-color',
			'type'      => 'radio',
			'title'     => esc_html__('Select Link Color', 'liviza'),
			'options'  	=> array(
				'default'   => esc_html__('Dark color as normal color and Skin color as hover color', 'liviza'),
				'darkhover' => esc_html__('Skin color as normal color and Dark color as hover color', 'liviza'),
				'custom'    => esc_html__('Custom color (select below)', 'liviza'),
			),
			'default'   => 'default',
			'std'       => 'darkhover',
			'after'   	=> '<div class="cs-text-muted cs-text-desc">' . esc_html__('Select normal link color effect. This will change normal text link color and hover color', 'liviza') . '</div>',
        ),
		array(
			'id'         => 'link-color-regular',
			'type'       => 'color_picker',
			'title'      => esc_html__( 'Links Color Option (Regular)', 'liviza' ),
			'default'    => sanitize_hex_color('#052944'),
			'dependency' => array( 'link-color_custom', '==', 'true' ),
        ),
		array(
			'id'         => 'link-color-hover',
			'type'       => 'color_picker',
			'title'      => esc_html__( 'Links Color Option (Hover)', 'liviza' ),
			'default'    => sanitize_hex_color('#2097fc'),
			'dependency' => array( 'link-color_custom', '==', 'true' ),
        ),
		array(
			'id'             => 'h1_heading_font',
			'type'           => 'themestek_typography',
			'title'          => esc_html__('H1 Heading Font', 'liviza'),
			'chosen'         => false,
			'text-align'     => false,
			'google'         => true, // Disable google fonts. Won't work if you haven't defined your google api key
			'font-backup'    => true, // Select a backup non-google font in addition to a google font
			'subsets'        => false, // Only appears if google is true and subsets not set to false
			'line-height'    => true,
			'text-transform' => true,
			'word-spacing'   => false, // Defaults to false
			'letter-spacing' => true, // Defaults to true
			'all-varients'   => false,
			'output'         => 'h1', // An array of CSS selectors to apply this font style to dynamically
			'units'          => 'px', // Defaults to px
			'default'        => array(
				'family'			=> 'Roboto',
				'backup-family'		=> 'Arial, Helvetica, sans-serif',
				'variant'			=> '500',
				'text-transform'	=> '',
				'font-size'			=> '36',
				'line-height'		=> '46',
				'letter-spacing'	=> '0',
				'color'				=> sanitize_hex_color('#2d3845'),
				'font'				=> 'google',
			),
			'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>'.esc_html__('Select font family, size etc. for H1 heading tag.', 'liviza').'</div>',
		),
		array(
			'id'          => 'h2_heading_font',
			'type'        => 'themestek_typography',
			'title'       => esc_html__('H2 Heading Font', 'liviza'),
			'chosen'      => false,
			'text-align'  => false,
			'google'      => true, // Disable google fonts. Won't work if you haven't defined your google api key
			'font-backup' => true, // Select a backup non-google font in addition to a google font
			'subsets'     => false, // Only appears if google is true and subsets not set to false
			'line-height'    => true,
			'text-transform' => true,
			'word-spacing'   => false, // Defaults to false
			'letter-spacing' => true, // Defaults to true
			'all-varients'   => false,
			'output'      => 'h2', // An array of CSS selectors to apply this font style to dynamically
			'units'       => 'px', // Defaults to px
			'default'     => array(
				'family'			=> 'Roboto',
				'backup-family'		=> 'Arial, Helvetica, sans-serif',
				'variant'			=> '500',
				'text-transform'	=> '',
				'font-size'			=> '32',
				'line-height'		=> '42',
				'letter-spacing'	=> '0',
				'color'				=> sanitize_hex_color('#2d3845'),
				'font'				=> 'google',
			),
			'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>'.esc_html__('Select font family, size etc. for H2 heading tag.', 'liviza').'</div>',
		),
		array(
			'id'          => 'h3_heading_font',
			'type'        => 'themestek_typography',
			'chosen'      => false,
			'title'       => esc_html__('H3 Heading Font', 'liviza'),
			'text-align'  => false,
			'google'      => true, // Disable google fonts. Won't work if you haven't defined your google api key
			'font-backup' => true, // Select a backup non-google font in addition to a google font
			'subsets'     => false, // Only appears if google is true and subsets not set to false
			'line-height'    => true,
			'text-transform' => true,
			'word-spacing'   => false, // Defaults to false
			'letter-spacing' => true, // Defaults to true
			'all-varients'   => false,
			'output'         => 'h3', // An array of CSS selectors to apply this font style to dynamically
			'units'          => 'px', // Defaults to px
			'default'        => array(
			    'family'			=> 'Roboto',
				'backup-family'		=> 'Arial, Helvetica, sans-serif',
				'variant'			=> '500',
				'text-transform'	=> '',
				'font-size'			=> '28',
				'line-height'		=> '38',
				'letter-spacing'	=> '0',
				'color'				=> sanitize_hex_color('#2d3845'),
				'font'				=> 'google',
			),
			'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>'.esc_html__('Select font family, size etc. for H3 heading tag.', 'liviza').'</div>',
		),
		array(
			'id'          => 'h4_heading_font',
			'type'        => 'themestek_typography',
			'title'       => esc_html__('H4 Heading Font', 'liviza'),
			'chosen'      => false,
			'text-align'  => false,
			'google'      => true, // Disable google fonts. Won't work if you haven't defined your google api key
			'font-backup' => true, // Select a backup non-google font in addition to a google font
			'subsets'     => false, // Only appears if google is true and subsets not set to false
			'line-height'    => true,
			'text-transform' => true,
			'word-spacing'   => false, // Defaults to false
			'letter-spacing' => true, // Defaults to true
			'all-varients'   => false,
			'output'      => 'h4', // An array of CSS selectors to apply this font style to dynamically
			'units'       => 'px', // Defaults to px
			'default'     => array(
				'family'			=> 'Roboto',
				'backup-family'		=> 'Arial, Helvetica, sans-serif',
				'variant'			=> '500',
				'text-transform'	=> '',
				'font-size'			=> '24',
				'line-height'		=> '34',
				'letter-spacing'	=> '0',
				'color'				=> sanitize_hex_color('#2d3845'),
				'font'				=> 'google',
			),
			'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>'.esc_html__('Select font family, size etc. for H4 heading tag.', 'liviza').'</div>',
		),
		array(
			'id'          => 'h5_heading_font',
			'type'        => 'themestek_typography',
			'title'       => esc_html__('H5 Heading Font', 'liviza'),
			'chosen'      => false,
			'text-align'  => false,
			'google'      => true, // Disable google fonts. Won't work if you haven't defined your google api key
			'font-backup' => true, // Select a backup non-google font in addition to a google font
			'subsets'     => false, // Only appears if google is true and subsets not set to false
			'line-height'    => true,
			'text-transform' => true,
			'word-spacing'   => false, // Defaults to false
			'letter-spacing' => true, // Defaults to true
			'all-varients'   => false,
			'output'      => 'h5', // An array of CSS selectors to apply this font style to dynamically
			'units'       => 'px', // Defaults to px
			'default'     => array(
				'family'			=> 'Roboto',
				'backup-family'		=> 'Arial, Helvetica, sans-serif',
				'variant'			=> '500',
				'text-transform'	=> '',
				'font-size'			=> '20',
				'line-height'		=> '30',
				'letter-spacing'	=> '0',
				'color'				=> sanitize_hex_color('#2d3845'),
				'font'				=> 'google',
			),
			'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>'.esc_html__('Select font family, size etc. for H5 heading tag.', 'liviza').'</div>',
		),
		array(
			'id'          => 'h6_heading_font',
			'type'        => 'themestek_typography',
			'title'       => esc_html__('H6 Heading Font', 'liviza'),
			'chosen'      => false,
			'text-align'  => false,
			'google'      => true, // Disable google fonts. Won't work if you haven't defined your google api key
			'font-backup' => true, // Select a backup non-google font in addition to a google font
			'subsets'     => false, // Only appears if google is true and subsets not set to false
			'line-height'    => true,
			'text-transform' => true,
			'word-spacing'   => false, // Defaults to false
			'letter-spacing' => true, // Defaults to true
			'all-varients'   => false,
			'output'      => 'h6', // An array of CSS selectors to apply this font style to dynamically
			'units'       => 'px', // Defaults to px
			'default'     => array(
				'family'			=> 'Roboto',
				'backup-family'		=> 'Arial, Helvetica, sans-serif',
				'variant'			=> '500',
				'text-transform'	=> '',
				'font-size'			=> '16',
				'line-height'		=> '26',
				'letter-spacing'	=> '0',
				'color'				=> sanitize_hex_color('#2d3845'),
				'font'				=> 'google',
			),
			'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>'.esc_html__('Select font family, size etc. for H6 heading tag.', 'liviza').'</div>',
		),
		array(
			'type'        => 'heading',
			'content'     => esc_html__('Heading and Subheading Font Settings', 'liviza'),
			'after'  	  => '<small>'.esc_html__('Select font settings for Heading and subheading of different title elements like Blog Box, Project Box etc', 'liviza').'</small>',
		),
		array(
			'id'          => 'heading_font',
			'type'        => 'themestek_typography',
			'title'       => esc_html__('Heading Font', 'liviza'),
			'chosen'      => false,
			'text-align'  => false,
			'google'      => true, // Disable google fonts. Won't work if you haven't defined your google api key
			'font-backup' => true, // Select a backup non-google font in addition to a google font
			'subsets'     => false, // Only appears if google is true and subsets not set to false
			'line-height'    => true,
			'text-transform' => true,
			'word-spacing'   => false, // Defaults to false
			'letter-spacing' => true, // Defaults to true
			'all-varients'   => true,
			'output'         => '.themestek-element-heading-wrapper .themestek-vc_general .themestek-vc_cta3_content-container .themestek-vc_cta3-content .themestek-vc_cta3-content-header h2', // An array of CSS selectors to apply this font style to dynamically
			'units'          => 'px', // Defaults to px
			'default'        => array(
				'family'			=> 'Roboto',
				'backup-family'		=> 'Arial, Helvetica, sans-serif',
				'variant'			=> '300',
				'text-transform'	=> '',
				'font-size'			=> '42',
				'line-height'		=> '50',
				'letter-spacing'	=> '1',
				'color'				=> sanitize_hex_color('#2d3845'),
				'all-varients'		=> 'on',
				'font'				=> 'google',
			),
			'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>'.esc_html__('Select font family, size etc. for heading title', 'liviza').'</div>',
		),
		array(
			'id'          => 'subheading_font',
			'type'        => 'themestek_typography',
			'title'       => esc_html__('Subheading Font', 'liviza'),
			'chosen'      => false,
			'text-align'  => false,
			'google'      => true, // Disable google fonts. Won't work if you haven't defined your google api key
			'font-backup' => true, // Select a backup non-google font in addition to a google font
			'subsets'     => false, // Only appears if google is true and subsets not set to false
			'line-height'    => true,
			'text-transform' => true,
			'word-spacing'   => false, // Defaults to false
			'letter-spacing' => true, // Defaults to true
			'all-varients'   => true,
			'output'         => '.themestek-element-heading-wrapper .themestek-vc_general .themestek-vc_cta3_content-container .themestek-vc_cta3-content .themestek-vc_cta3-content-header h4, .themestek-vc_general.themestek-vc_cta3.themestek-vc_cta3-color-transparent.themestek-cta3-only .themestek-vc_cta3-content .themestek-vc_cta3-headers h4', // An array of CSS selectors to apply this font style to dynamically
			'units'          => 'px', // Defaults to px
			'default'        => array(
				'family'			=> 'Roboto',
				'backup-family'		=> 'Arial, Helvetica, sans-serif',
				'variant'			=> '500',
				'text-transform'	=> 'uppercase',
				'font-size'			=> '13',
				'line-height'		=> '25',
				'letter-spacing'	=> '3',
				'color'				=> sanitize_hex_color('#b2b8bf'),
				'all-varients'		=> 'on',
				'font'				=> 'google',
			),
			'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>'.esc_html__('Select font family, size etc. for heading title', 'liviza').'</div>',
		),
		array(
			'id'          => 'content_font',
			'type'        => 'themestek_typography',
			'title'       => esc_html__('Content Font', 'liviza'),
			'chosen'      => false,
			'text-align'  => false,
			'google'      => true, // Disable google fonts. Won't work if you haven't defined your google api key
			'font-backup' => true, // Select a backup non-google font in addition to a google font
			'subsets'     => false, // Only appears if google is true and subsets not set to false
			'line-height'    => true,
			'text-transform' => true,
			'word-spacing'   => false, // Defaults to false
			'letter-spacing' => true, // Defaults to true
			'all-varients'   => false,
			'output'         => '.themestek-element-heading-wrapper .themestek-vc_general.themestek-vc_cta3 .themestek-vc_cta3-content p', // An array of CSS selectors to apply this font style to dynamically
			'units'          => 'px', // Defaults to px
			'default'        => array(
				'family'			=> 'Muli',
				'backup-family'		=> 'Arial, Helvetica, sans-serif',
				'variant'			=> '300',
				'text-transform'	=> '',
				'font-size'			=> '16',
				'line-height'		=> '30',
				'letter-spacing'	=> '0',
				'color'				=> sanitize_hex_color('#8b95a0'),
				'font'				=> 'google',
			),
			'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>'.esc_html__('Select font family, size etc. for content', 'liviza').'</div>',
		),
		array(
			'type'        => 'heading',
			'content'     => esc_html__('Specific Element Fonts', 'liviza'),
			'after'  	  => '<small>'.esc_html__('Select Font for specific elements', 'liviza').'</small>',
		),
		array(
			'id'          => 'widget_font',
			'type'        => 'themestek_typography',
			'title'       => esc_html__('Widget Title Font', 'liviza'),
			'chosen'      => false,
			'text-align'  => false,
			'google'      => true, // Disable google fonts. Won't work if you haven't defined your google api key
			'font-backup' => true, // Select a backup non-google font in addition to a google font
			'subsets'     => false, // Only appears if google is true and subsets not set to false
			'line-height'    => true,
			'text-transform' => true,
			'word-spacing'   => false, // Defaults to false
			'letter-spacing' => true, // Defaults to true
			'all-varients'   => false,
			'output'         => 'body .widget .widget-title, body .widget .widgettitle, #site-header-menu #site-navigation .mega-menu-wrap .mega-menu.mega-menu-horizontal .mega-sub-menu > li.mega-menu-item > h4.mega-block-title, .portfolio-description h2, .themestek-portfolio-details h2, .themestek-portfolio-related h2', // An array of CSS selectors to apply this font style to dynamically
			'units'          => 'px', // Defaults to px
			'default'        => array(
				'family'			=> 'Roboto',
				'backup-family'		=> 'Arial, Helvetica, sans-serif',
				'variant'			=> '500',
				'text-transform'	=> '',
				'font-size'			=> '20',
				'line-height'		=> '26',
				'letter-spacing'	=> '0',
				'color'				=> sanitize_hex_color('#2d3845'),
				'font'				=> 'google',
			),
			'after'  	=> '<div class="cs-text-muted cs-text-desc"><br>'.esc_html__('Select font family, size etc. for widget title', 'liviza').'</div>',
		),
		array(
			'id'             => 'button_font',
			'type'           => 'themestek_typography',
			'title'          => esc_html__('Button Font', 'liviza'),
			'chosen'         => false,
			'text-align'     => false,
			'google'         => true, // Disable google fonts. Won't work if you haven't defined your google api key
			'font-backup'    => true, // Select a backup non-google font in addition to a google font
			'subsets'        => false, // Only appears if google is true and subsets not set to false
			'font-size'      => true,
			'line-height'    => false,
			'text-transform' => true,
			'color'          => false,
			'word-spacing'   => false, // Defaults to false
			'letter-spacing' => true, // Defaults to true
			'all-varients'   => false,
			'output'         => '.woocommerce button.button, .woocommerce-page button.button, .themestek-vc_btn, .themestek-vc_btn3, .woocommerce-page a.button, .button, .wpb_button, button, .woocommerce input.button, .woocommerce-page input.button, .tp-button.big, .woocommerce #content input.button, .woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce-page #content input.button, .woocommerce-page #respond input#submit, .woocommerce-page a.button, .woocommerce-page button.button, .woocommerce-page input.button, .themestek-post-readmore a, .themestek-box-blog-classic .themestek-readmore-link a, .themestek-box-blog-classic .entry-content a.more-link, .themestek-vc_btn3.themestek-vc_btn3-size-md, .comment-body .reply a', // An array of CSS selectors to apply this font style to dynamically
			'units'          => 'px', // Defaults to px
			'default'        => array(
				'family'			=> 'Roboto',
				'backup-family'		=> 'Arial, Helvetica, sans-serif',
				'variant'			=> '500',
				'text-transform'	=> '',
				'font-size'			=> '13',
				'letter-spacing'	=> '0.5',
				'font'				=> 'google',
			),
			'after'  	=> '<div class="cs-text-muted cs-text-desc"><br>'.esc_html__('This fonts will be applied to all buttons in this site', 'liviza').'</div>',
		),
		array(
			'id'             => 'element_title',
			'type'           => 'themestek_typography',
			'title'          => esc_html__('Element Title Font', 'liviza'),
			'chosen'         => false,
			'text-align'     => false,
			'google'         => true, // Disable google fonts. Won't work if you haven't defined your google api key
			'font-backup'    => true, // Select a backup non-google font in addition to a google font
			'subsets'        => false, // Only appears if google is true and subsets not set to false
			'line-height'    => false,
			'text-transform' => true,
			'word-spacing'   => false, // Defaults to false
			'letter-spacing'	=> false, // Defaults to false
			'color'          => false,
			'all-varients'   => false,
			'output'         => '.wpb_tabs_nav a.ui-tabs-anchor, body .wpb_accordion .wpb_accordion_wrapper .wpb_accordion_header a, .vc_progress_bar .vc_label, .vc_tta.vc_general .vc_tta-tab > a, .vc_toggle_title > h4', // An array of CSS selectors to apply this font style to dynamically
			'units'          => 'px', // Defaults to px
			'default'        => array(
				'family'			=> 'Roboto',
				'backup-family'		=> 'Arial, Helvetica, sans-serif',
				'variant'			=> '700',
				'text-transform'	=> 'uppercase',
				'font-size'			=> '18',
				'font'				=> 'google',
			),
			'after'  	=> '<div class="cs-text-muted cs-text-desc"><br>'.esc_html__('This fonts will be applied to Tab title, Accordion Title and Progress Bar title text', 'liviza').'</div>',
		),
		array(
			'id'             => 'testimonial_arrow_font_title',
			'type'           => 'themestek_typography',
			'title'          => esc_html__('Testimonial Arrow Font', 'liviza'),
			'chosen'         => false,
			'text-align'     => false,
			'google'         => false, // Disable google fonts. Won't work if you haven't defined your google api key
			'font-backup'    => false, // Select a backup non-google font in addition to a google font
			'subsets'        => false, // Only appears if google is true and subsets not set to false
			'line-height'    => false,
			'text-transform'	=> false,
			'word-spacing'   => false, // Defaults to false
			'letter-spacing'	=> false, // Defaults to false
			'color'          => false,
			'all-varients'   => false,
			'output'         => '.themestek-testimonialbox-style-1 .themestek-box-content:after, .themestek-testimonialbox-style-2 .themestek-box-content:after, 
								.themestek-post-featured-quote blockquote:before, blockquote > p:before', // An array of CSS selectors to apply this font style to dynamically
			'units'          => 'px', // Defaults to px
			'default'        => array(
				'family'			=> 'Oswald',
				'backup-family'		=> 'Arial, Helvetica, sans-serif',
				'variant'			=> '700',
				'text-transform'	=> '',
				'font-size'			=> '',
				'font'				=> 'google',
			),
			'after'  	=> '<div class="cs-text-muted cs-text-desc"><br>'.esc_html__('This fonts will be applied to Tab title, Accordion Title and Progress Bar title text', 'liviza').'</div>',
		),

	)
);

// Blog Settings
$themestek_framework_options[] = array(
	'name'   => 'blog_settings', // like ID
	'title'  => esc_html__('Blog Settings', 'liviza'),
	'icon'   => 'fa fa-gear',
	'fields' => array( // begin: fields
		array(
			'type'       	=> 'heading',
			'content'    	=> esc_html__('Blog Settings', 'liviza'),
			'after'  		=> '<small>'.esc_html__('Settings for Blog section', 'liviza').'</small>',
		),
		array(
			'id'            => 'blog_limit_enabled',
			'type'          => 'select',
			'title'         =>  esc_attr__('Auto Limit Blog content?', 'liviza'),
			'options'		=> array(
				'no'			=> esc_attr__('No', 'liviza'),
				'yes'			=> esc_attr__('Yes', 'liviza'),
			),
			'default'       => 'no',
			'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>'.esc_attr__('If you like to show limited Blog content on Blog list page (Blogroll page) only. This will not effect on single Blog post and single Blog will show full content.', 'liviza').'</div>',
		),
		array(
			'id'     		=> 'blog_text_limit',
			'type'   		=> 'number',
			'title'         => esc_html__('Blog Excerpt Limit (in words)', 'liviza' ),
			'default'		=> '150',
			'after'  	  	=> '<div class="cs-text-muted cs-text-desc"><br>' . esc_attr__('Set auto limit for content. Select how many words you like to show from content.', 'liviza') . '<br><strong>' . esc_attr__('NOTE:', 'liviza') . '</strong> ' . esc_attr__('This will also work on EXCERPT content too. Also this will remove all text formatting like paragraph, bold, italic etc. ', 'liviza') . '</div>',
			'dependency'    => array( 'blog_limit_enabled', '==', 'yes' ),
		),
		array(
			'id'            => 'blog_classic_excerpt_enable',
			'type'          => 'select',
			'title'         =>  esc_attr__('Show Excerpt in Classic view too?', 'liviza'),
			'options'		=> array(
				'no'			=> esc_attr__('No', 'liviza'),
				'yes'			=> esc_attr__('Yes', 'liviza'),
			),
			'default'       => 'yes',
			'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>'.esc_attr__('This will show Excerpt content (if set) instead of main content in Classic View too. By default, this is diabled.', 'liviza').'</div>',
		),
		array(
			'id'     		=> 'blog_readmore_text',
			'type'    		=> 'text',
			'title'   		=> esc_html__('"Read More" Link Text', 'liviza'),
			'default' 		=> esc_html__('Read More', 'liviza'),
			'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>'.esc_html__('Text for the Read More link on the Blog page', 'liviza').'</div>',
		),
		array(
			'id'           	=> 'blog_view',
			'type'         	=> 'image_select',
			'title'        	=>  esc_html__('Blog view', 'liviza'),
			'options'  		=> $blog_styles,
			'default'      	=> 'classic',
			'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>'.esc_html__('Select blog view. The default view is classic list view. Also we have total three differnt look for classic view. Select them in this option and see your BLOG page. For "Box view", you can select two, three or four columns box view too.', 'liviza').'</div>',
			'radio'      	=> true,
        ),
		array(
			'type'       	=> 'heading',
			'content'    	=> esc_html__('Blogbox Settings', 'liviza'),
			'after'  		=> '<small>'.esc_html__('Blog box style view settings. This is because you selected "BOX VIEW" in above option.', 'liviza').'</small>',
			'dependency'    => array( 'blog_view_classic', '!=', 'true' ),
		),
		array(
			'id'           	=> 'blogbox_column',
			'type'         	=> 'select',
			'title'        	=>  esc_html__('Blog box column', 'liviza'),
			'options'  		=> array(
				'one'			=> esc_html__('One Column View', 'liviza'),
				'two'			=> esc_html__('Two Column view', 'liviza'),
				'three'			=> esc_html__('Three Column view (default)', 'liviza'),
				'four'			=> esc_html__('Four Column view', 'liviza'),
			),
			'default'      	=> 'three',
			'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>'.esc_html__('Select blog view. The default view is classic list view. You can select two, three or four column blog view from here', 'liviza').'</div>',
			'dependency'    => array( 'blog_view_classic', '!=', 'true' ),
        ),
		array(
			'type'       	=> 'heading',
			'content'    	=> esc_html__('Blog Single Settings', 'liviza'),
			'after'  		=> '<small>'.esc_html__('Settings for single view of blog post.', 'liviza').'</small>',
		),
		array(
			'id'     		=> 'post_social_share_title',
			'type'    		=> 'text',
			'title'   		=> esc_html__('Social Share Title', 'liviza'),
			'default' 		=> '',
			'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>'.esc_html__('This text will appear in the social share box as title', 'liviza').'</div>',
			'dependency'    => array( 'portfolio_show_social_share', '==', 'true' ),
		),
		array(
			'id'        => 'post_social_share_services',
			'type'      => 'checkbox',
			'title'     => esc_html__('Select Social Share Service', 'liviza'),
			'options'   => array(
				'facebook'    => esc_html__('Facebook', 'liviza'),
				'twitter'     => esc_html__('Twitter', 'liviza'),
				'gplus'       => esc_html__('Google Plus', 'liviza'),
				'pinterest'   => esc_html__('Pinterest', 'liviza'),
				'linkedin'    => esc_html__('LinkedIn', 'liviza'),
				'stumbleupon' => esc_html__('Stumbleupon', 'liviza'),
				'tumblr'      => esc_html__('Tumblr', 'liviza'),
				'reddit'      => esc_html__('Reddit', 'liviza'),
				'digg'        => esc_html__('Digg', 'liviza'),
			),
			'after'    	 => '<div class="cs-text-muted cs-text-desc"><br>'.esc_html__('The selected social service icon will be visible on single Post so user can share on social sites.', 'liviza').'</div>',
		),
	)
);

// Project Settings
$themestek_framework_options[] = array(
	'name'   => 'portfolio_settings', // like ID
	'title'  => sprintf( esc_html__('%s Settings', 'liviza'), $pf_title_singular ),
	'icon'   => 'fa fa-gear',
	'fields' => array( // begin: fields
		array(
			'type'       	=> 'heading',
			'content'    	=> sprintf( esc_html__('Single %s Settings', 'liviza'), $pf_title_singular ),
			'after'  		=> '<small>' . sprintf( esc_html__('Options to change settings for single %s', 'liviza'), $pf_title_singular ) . '</small>',
		),
		array(
			'id'           	=> 'portfolio_viewstyle',
			'type'         	=> 'image_select',
			'title'        	=> sprintf( esc_html__('Single %s View Style', 'liviza'), $pf_title ),
			'options'       => themestek_global_template_list( 'portfolio-single', true ),
			'default'      	=> 'style-1',
			'after'  	  	=> '<div class="cs-text-muted cs-text-desc"><br>' . sprintf( esc_html__('Select view for single %s', 'liviza'), $pf_title_singular ) . '</div>',
			'radio'      	=> true,
        ),
		array(
			'type'       	=> 'heading',
			'content'    	=> sprintf( esc_html__('Related %1$s (on single %2$s) Settings', 'liviza'), $pf_title, $pf_title_singular ),
			'after'  		=> '<small>' . sprintf( esc_html__('Options to change settings for related %1$s section on single %2$s page.', 'liviza'), $pf_title, $pf_title_singular ) . '</small>',
		),
		array(
			'id'     		=> 'portfolio_show_related',
			'type'   		=> 'switcher',
			'title'   		=> sprintf( esc_html__('Show Related %s', 'liviza'), $pf_title ),
			'default' 		=> true,
			'label'  		=> '<div class="cs-text-muted cs-text-desc">' . sprintf( esc_html__('Select ON to show related %1$s on single %2$s page', 'liviza'), $pf_title, $pf_title_singular ) . '</div>',
        ),
		array(
			'id'     		=> 'portfolio_related_title',
			'type'    		=> 'text',
			'title'   		=> sprintf( esc_html__('Related %s Title', 'liviza'), $pf_title ),
			'default' 		=> esc_html__('RELATED PROJECTS', 'liviza'),
			'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>' . sprintf( esc_html__('Title for the Releated %1$s area. (For single %2$s only)', 'liviza'), $pf_title, $pf_title_singular ) . '</div>',
			'dependency'    => array( 'portfolio_show_related', '==', 'true' ),
		),
		array(
			'id'           	=> 'portfolio_related_view',
			'type'         	=> 'image_select',
			'title'        	=> sprintf( esc_html__('Related %s Boxes template', 'liviza'), $pf_title ),
			'options'       => themestek_global_template_list( 'portfolio', true ),
			'default'      	=> 'style-2',
			'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>' . sprintf( esc_html__('Select column to show in Related %s area.', 'liviza'), $pf_title ) . '</div>',
			'dependency'    => array( 'portfolio_show_related', '==', 'true' ),
			'radio'      	=> true,
        ),
		array(
			'id'           	=> 'portfolio_related_column',
			'type'         	=> 'select',
			'title'        	=> esc_html__('Select column', 'liviza'),
			'options'		=> array(
				'two'			=> esc_html__('Two column', 'liviza'),
				'three'			=> esc_html__('Three column', 'liviza'),
				'four'			=> esc_html__('Four column', 'liviza'),
				'five'			=> esc_html__('Five column', 'liviza'),
				'six'			=> esc_html__('Six column', 'liviza'),
			),
			'default'		=> 'three',
			'after'			=> '<div class="cs-text-muted cs-text-desc"><br>' . sprintf( esc_html__('Select column to show in Related %s area.', 'liviza'), $pf_title ) . '</div>',
			'dependency'	=> array( 'portfolio_show_related', '==', 'true' ),
        ),
		array(
			'id'     		=> 'portfolio_related_show',
			'type'   		=> 'number',
			'title'         => sprintf( esc_html__('Show %s', 'liviza'), $pf_title ),
			'default'		=> '3',
			'after'  	  	=> '<div class="cs-text-muted cs-text-desc"><br>' . sprintf( esc_html__('How many %2$s Boxes you like to show in Related %1$s area.', 'liviza'), $pf_title, $pf_title_singular ) . '</div>',
			'dependency'    => array( 'portfolio_show_related', '==', 'true' ),
        ),
		array(
			'type'       	=> 'heading',
			'content'    	=> sprintf( esc_html__('Single %s List Details Settings', 'liviza'), $pf_title_singular ),
			'after'  		=> '<small>' . sprintf( esc_html__('Options to change each line of list details for single %1$s. Here you can select how many lines will be appear in the details of a single %1$s', 'liviza'), $pf_title_singular ) . '</small>',
		),
		array(
			'id'     		=> 'portfolio_project_details',
			'type'    		=> 'text',
			'title'   		=> sprintf( esc_html__('%s Details Box Title', 'liviza'), $pf_title_singular ),
			'default' 		=> esc_html__('PROJECT DETAILS', 'liviza'),
			'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>' . sprintf( esc_html__('Title for the list styled "%1$s Details" area. (For single %1$s only)', 'liviza'), $pf_title_singular ) . '</div>',
		),
		array(
			'id'              => 'pf_details_line',
			'type'            => 'group',
			'title'           => esc_html__('Line Details', 'liviza'),
			'info'            => sprintf( esc_html__('This will be added a new line in DETAILS box on single %s view.', 'liviza'), $pf_title_singular ),
			'button_title'    => esc_html__('Add New Line', 'liviza'),
			'accordion_title' => esc_html__('Details for the line', 'liviza'),
			'default'		 => array (
				array (
					'pf_details_line_title'	=> esc_html__('Client', 'liviza'),
					'pf_details_line_icon'	=> array (
						'library'				=> 'fontawesome',
						'library_fontawesome'	=> 'empty',
						'library_themify'		=> 'ti-location-pin',
						'library_sgicon'		=> 'sgicon sgicon-WorldWide',
						'library_vc_linecons'	=> 'li_star',
						'library_themestek_liviza_business_icon' => 'themestek-liviza-business-icon-checklist',
				  	),
				  	'data' => 'custom',
				),
				array (
					'pf_details_line_title'	=> esc_html__('Services', 'liviza'),
					'pf_details_line_icon'	=> array (
						'library'				=> 'fontawesome',
						'library_fontawesome'	=> 'empty',
						'library_themify'		=> 'ti-location-pin',
						'library_sgicon'		=> 'sgicon sgicon-WorldWide',
						'library_vc_linecons'	=> 'li_star',
						'library_themestek_liviza_business_icon' => 'themestek-liviza-business-icon-checklist',
					),
					'data' => 'custom',
				),
				array (
					'pf_details_line_title'	=> esc_html__('Categories', 'liviza'),
					'pf_details_line_icon'	=> array (
						'library'				=> 'fontawesome',
						'library_fontawesome'	=> 'empty',
						'library_themify'		=> 'ti-location-pin',
						'library_sgicon'		=> 'sgicon sgicon-WorldWide',
						'library_vc_linecons'	=> 'li_star',
						'library_themestek_liviza_business_icon' => 'themestek-liviza-business-icon-checklist',
					),
					'data' => 'custom',
				),
				array (
					'pf_details_line_title'	=> esc_html__('Year', 'liviza'),
					'pf_details_line_icon'	=> array (
						'library'				=> 'fontawesome',
						'library_fontawesome'	=> 'empty',
						'library_themify'		=> 'ti-location-pin',
						'library_sgicon'		=> 'sgicon sgicon-WorldWide',
						'library_vc_linecons'	=> 'li_star',
						'library_themestek_liviza_business_icon' => 'themestek-liviza-business-icon-checklist',
					),
					'data' => 'custom',
				),
			  ),
			'fields'          => array(
				array(
					'id'		=> 'pf_details_line_title',
					'type'		=> 'text',
					'title'		=> esc_html__('Line Title', 'liviza'),
					'default'	=> esc_html__('Line Title will be here', 'liviza'),
					'after'		=> '<div class="cs-text-muted cs-text-desc"><br>' . sprintf( esc_html__('Title for the first line of the details in single %s', 'liviza'), $pf_title_singular ) . '<br> ' . esc_html__('Leave this field empty to remove the line.', 'liviza').'</div>',
				),
				array(
					'id'		=> 'pf_details_line_icon',
					'type'		=> 'themestek_iconpicker',
					'title' 	=> esc_html__('Line Icon', 'liviza' ),
					'default'	=> array(
						'library'             => 'fontawesome',
						'library_fontawesome' => 'fa fa-map-marker',
					),
					'after'  	=> '<div class="cs-text-muted cs-text-desc"><br>' . sprintf( esc_html__('Select icon for the first Line of the details in single %s', 'liviza'), $pf_title_singular ) . '</div>',
				),
				array(
					'id'      		=> 'data',
					'type'   		=> 'select',
					'title'   		=> esc_html__('Line Input Type', 'liviza'),
					'options' 		=> array(
							'custom'        => esc_html__('Custom text (single line)', 'liviza'),
							'multiline'     => esc_html__('Custom text with multiline', 'liviza'),
							'date'          => sprintf( esc_html__('Show date of the %s', 'liviza'), $pf_title_singular ),
							'category'      => sprintf( esc_html__('Show Category (without link) of the %s', 'liviza'), $pf_title_singular ),
							'category_link' => sprintf( esc_html__('Show Category (with link) of the %s', 'liviza'), $pf_title_singular ),
							'tag'           => sprintf( esc_html__('Show Tags (without link) of the %s', 'liviza'), $pf_title_singular ),
							'tag_link'      => sprintf( esc_html__('Show Tags (with link) of the %s', 'liviza'), $pf_title_singular ),
					),
					'default'		=> 'custom',
					'after'  	  	=> '<div class="cs-text-muted cs-text-desc"><br>' . sprintf( esc_html__('Select view for single %s', 'liviza'), $pf_title_singular ) . '</div>',
				),
			)
        ),
		array(
			'type'       	=> 'heading',
			'content'    	=> sprintf( esc_html__('Select social sharing service for single %s', 'liviza'), $pf_title_singular ),
			'after'  		=> '<small>' . sprintf( esc_html__('Select social service so site visitors can share the single %s on different social services', 'liviza'), $pf_title_singular ) . '</small>',
		),
		array(
			'id'     		=> 'portfolio_show_social_share',
			'type'   		=> 'switcher',
			'title'   		=> esc_html__('Show Social Share box', 'liviza'),
			'default' 		=> true,
			'label'  		=> '<div class="cs-text-muted cs-text-desc">'.esc_html__('Show or hide social share box.', 'liviza').'</div>',
        ),
		array(
			'id'     		=> 'portfolio_social_share_title',
			'type'    		=> 'text',
			'title'   		=> esc_html__('Social Share Title', 'liviza'),
			'default' 		=> esc_html__('SHARE', 'liviza'),
			'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>'.esc_html__('This text will appear in the social share box as title', 'liviza').'</div>',
			'dependency'    => array( 'portfolio_show_social_share', '==', 'true' ),
		),
		array(
			'id'        => 'portfolio_social_share_services',
			'type'      => 'checkbox',
			'title'     => esc_html__('Select Social Share Service', 'liviza'),
			'options'   => array(
					'facebook'    => esc_html__('Facebook', 'liviza'),
					'twitter'     => esc_html__('Twitter', 'liviza'),
					'gplus'       => esc_html__('Google Plus', 'liviza'),
					'pinterest'   => esc_html__('Pinterest', 'liviza'),
					'linkedin'    => esc_html__('LinkedIn', 'liviza'),
					'stumbleupon' => esc_html__('Stumbleupon', 'liviza'),
					'tumblr'      => esc_html__('Tumblr', 'liviza'),
					'reddit'      => esc_html__('Reddit', 'liviza'),
					'digg'        => esc_html__('Digg', 'liviza'),
			),
			'after'    	 => '<div class="cs-text-muted cs-text-desc"><br>' . sprintf( esc_html__('The selected social service icon will be visible on single %s so user can share on social sites.', 'liviza'), $pf_title_singular ) . '</div>',
			'dependency' => array( 'portfolio_show_social_share', '==', 'true' ),
		),
		array(
			'id'     		=> 'portfolio_single_top_btn_title',
			'type'    		=> 'text',
			'title'   		=> esc_html__('Button Title', 'liviza'),
			'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>'.esc_html__('This button will appear after the social share links.', 'liviza').'</div>',
		),
		array(
			'id'     		=> 'portfolio_single_top_btn_link',
			'type'    		=> 'text',
			'title'   		=> esc_html__('Button Link', 'liviza'),
			'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>'.esc_html__('This button will appear after the social share links.', 'liviza').'</div>',
		),
		array(
			'type'       	=> 'heading',
			'content'    	=> sprintf( esc_html__('%s Settings', 'liviza'), $pf_cat_title ),
			'after'  		=> '<small>' . sprintf( esc_html__('Settings for %s', 'liviza'), $pf_cat_title ) . '</small>',
		),
		array(
			'id'           	=> 'pfcat_view',
			'type'         	=> 'image_select',
			'title'        	=> sprintf( esc_html__('%s Boxes template', 'liviza'), $pf_title_singular ),
			'options'       => themestek_global_template_list( 'portfolio', true ),
			'default'      	=> 'style-1',
			'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>' . sprintf( esc_html__('Select %1$s Box view on single %2$s page.', 'liviza'), $pf_title_singular, $pf_cat_title_singular ) . '</div>',
			'radio'      	=> true,
        ),
		array(
			'id'           	=> 'pfcat_column',
			'type'         	=> 'select',
			'title'        	=>  esc_html__('Select column', 'liviza'),
			'options'  => array(
				'two'     => esc_html__('Two column', 'liviza'),
				'three'   => esc_html__('Three column', 'liviza'),
				'four'    => esc_html__('Four column', 'liviza'),
				'five'    => esc_html__('Five column', 'liviza'),
				'six'     => esc_html__('Six column', 'liviza'),
			),
			'default'      	=> 'three',
			'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>' . sprintf( esc_html__('Select column to show on %s page.', 'liviza'), $pf_cat_title_singular ) . '</div>',
        ),
		array(
			'id'     		=> 'pfcat_show',
			'type'   		=> 'number',
			'title'         => sprintf( esc_html__('%s to show', 'liviza' ), $pf_title_singular ),
			'default'		=> '9',
			'after'  	  	=> '<div class="cs-text-muted cs-text-desc"><br>' . sprintf( esc_html__('How many %1$s you like to show on %2$s page', 'liviza'), $pf_title_singular, $pf_cat_title_singular ) . '</div>',
        ),
	)
);

// Coaching Settings
$themestek_framework_options[] = array(
	'name'   => 'coaching_settings', // like ID
	'title'  => sprintf( esc_html__('%s Settings', 'liviza'), $ch_title_singular ),
	'icon'   => 'fa fa-gear',
	'fields' => array( // begin: fields
		array(
			'type'       	=> 'heading',
			'content'    	=> sprintf( esc_html__('Single %s Settings', 'liviza'), $ch_title_singular ),
			'after'  		=> '<small>' . sprintf( esc_html__('Options to change settings for single %s', 'liviza'), $ch_title_singular ) . '</small>',
		),
		array(
			'id'           	=> 'coaching_viewstyle',
			'type'         	=> 'image_select',
			'title'        	=> sprintf( esc_html__('Single %s View Style', 'liviza'), $ch_title ),
			'options'       => themestek_global_template_list( 'coaching-single', true ),
			'default'      	=> 'style-1',
			'after'  	  	=> '<div class="cs-text-muted cs-text-desc"><br>' . sprintf( esc_html__('Select view for single %s', 'liviza'), $ch_title_singular ) . '</div>',
			'radio'      	=> true,
        ),
		array(
			'type'       	=> 'heading',
			'content'    	=> sprintf( esc_html__('Related %1$s (on single %2$s) Settings', 'liviza'), $ch_title, $ch_title_singular ),
			'after'  		=> '<small>' . sprintf( esc_html__('Options to change settings for related %1$s section on single %2$s page.', 'liviza'), $ch_title, $ch_title_singular ) . '</small>',
		),
		array(
			'id'     		=> 'coaching_show_related',
			'type'   		=> 'switcher',
			'title'   		=> sprintf( esc_html__('Show Related %s', 'liviza'), $ch_title ),
			'default' 		=> true,
			'label'  		=> '<div class="cs-text-muted cs-text-desc">' . sprintf( esc_html__('Select ON to show related %1$s on single %2$s page', 'liviza'), $ch_title, $ch_title_singular ) . '</div>',
        ),
		array(
			'id'     		=> 'coaching_related_title',
			'type'    		=> 'text',
			'title'   		=> sprintf( esc_html__('Related %s Title', 'liviza'), $ch_title ),
			'default' 		=> esc_html__('RELATED COACHING', 'liviza'),
			'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>' . sprintf( esc_html__('Title for the Releated %1$s area. (For single %2$s only)', 'liviza'), $ch_title, $ch_title_singular ) . '</div>',
			'dependency'    => array( 'coaching_show_related', '==', 'true' ),
		),
		array(
			'id'           	=> 'coaching_related_view',
			'type'         	=> 'image_select',
			'title'        	=> sprintf( esc_html__('Related %s Boxes template', 'liviza'), $ch_title ),
			'options'       => themestek_global_template_list( 'coaching', true ),
			'default'      	=> 'style-2',
			'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>' . sprintf( esc_html__('Select column to show in Related %s area.', 'liviza'), $ch_title ) . '</div>',
			'dependency'    => array( 'coaching_show_related', '==', 'true' ),
			'radio'      	=> true,
        ),
		array(
			'id'           	=> 'coaching_related_column',
			'type'         	=> 'select',
			'title'        	=> esc_html__('Select column', 'liviza'),
			'options'		=> array(
				'two'			=> esc_html__('Two column', 'liviza'),
				'three'			=> esc_html__('Three column', 'liviza'),
				'four'			=> esc_html__('Four column', 'liviza'),
				'five'			=> esc_html__('Five column', 'liviza'),
				'six'			=> esc_html__('Six column', 'liviza'),
			),
			'default'		=> 'three',
			'after'			=> '<div class="cs-text-muted cs-text-desc"><br>' . sprintf( esc_html__('Select column to show in Related %s area.', 'liviza'), $ch_title ) . '</div>',
			'dependency'	=> array( 'coaching_show_related', '==', 'true' ),
        ),
		array(
			'id'     		=> 'coaching_related_show',
			'type'   		=> 'number',
			'title'         => sprintf( esc_html__('Show %s', 'liviza'), $ch_title ),
			'default'		=> '3',
			'after'  	  	=> '<div class="cs-text-muted cs-text-desc"><br>' . sprintf( esc_html__('How many %2$s Boxes you like to show in Related %1$s area.', 'liviza'), $ch_title, $ch_title_singular ) . '</div>',
			'dependency'    => array( 'coaching_show_related', '==', 'true' ),
        ),
		array(
			'type'       	=> 'heading',
			'content'    	=> sprintf( esc_html__('Single %s List Details Settings', 'liviza'), $ch_title_singular ),
			'after'  		=> '<small>' . sprintf( esc_html__('Options to change each line of list details for single %1$s. Here you can select how many lines will be appear in the details of a single %1$s', 'liviza'), $ch_title_singular ) . '</small>',
		),
		array(
			'id'     		=> 'coaching_project_details',
			'type'    		=> 'text',
			'title'   		=> sprintf( esc_html__('%s Details Box Title', 'liviza'), $ch_title_singular ),
			'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>' . sprintf( esc_html__('Title for the list styled "%1$s Details" area. (For single %1$s only)', 'liviza'), $ch_title_singular ) . '</div>',
		),
		array(
			'id'              => 'ch_details_line',
			'type'            => 'group',
			'title'           => esc_html__('Line Details', 'liviza'),
			'info'            => sprintf( esc_html__('This will be added a new line in DETAILS box on single %s view.', 'liviza'), $ch_title_singular ),
			'button_title'    => esc_html__('Add New Line', 'liviza'),
			'accordion_title' => esc_html__('Details for the line', 'liviza'),
			'fields'          => array(
				array(
					'id'		=> 'ch_details_line_title',
					'type'		=> 'text',
					'title'		=> esc_html__('Line Title', 'liviza'),
					'default'	=> esc_html__('Line Title will be here', 'liviza'),
					'after'		=> '<div class="cs-text-muted cs-text-desc"><br>' . sprintf( esc_html__('Title for the first line of the details in single %s', 'liviza'), $ch_title_singular ) . '<br> ' . esc_html__('Leave this field empty to remove the line.', 'liviza').'</div>',
				),
				array(
					'id'		=> 'ch_details_line_icon',
					'type'		=> 'themestek_iconpicker',
					'title' 	=> esc_html__('Line Icon', 'liviza' ),
					'default'	=> array(
						'library'             => 'fontawesome',
						'library_fontawesome' => 'fa fa-map-marker',
					),
					'after'  	=> '<div class="cs-text-muted cs-text-desc"><br>' . sprintf( esc_html__('Select icon for the first Line of the details in single %s', 'liviza'), $ch_title_singular ) . '</div>',
				),
				array(
					'id'      		=> 'data',
					'type'   		=> 'select',
					'title'   		=> esc_html__('Line Input Type', 'liviza'),
					'options' 		=> array(
							'custom'        => esc_html__('Custom text (single line)', 'liviza'),
							'multiline'     => esc_html__('Custom text with multiline', 'liviza'),
							'date'          => sprintf( esc_html__('Show date of the %s', 'liviza'), $ch_title_singular ),
							'category'      => sprintf( esc_html__('Show Category (without link) of the %s', 'liviza'), $ch_title_singular ),
							'category_link' => sprintf( esc_html__('Show Category (with link) of the %s', 'liviza'), $ch_title_singular ),
					),
					'default'		=> 'custom',
					'after'  	  	=> '<div class="cs-text-muted cs-text-desc"><br>' . sprintf( esc_html__('Select view for single %s', 'liviza'), $ch_title_singular ) . '</div>',
				),
			)
        ),
		array(
			'type'       	=> 'heading',
			'content'    	=> sprintf( esc_html__('Select social sharing service for single %s', 'liviza'), $ch_title_singular ),
			'after'  		=> '<small>' . sprintf( esc_html__('Select social service so site visitors can share the single %s on different social services', 'liviza'), $ch_title_singular ) . '</small>',
		),
		array(
			'id'     		=> 'coaching_show_social_share',
			'type'   		=> 'switcher',
			'title'   		=> esc_html__('Show Social Share box', 'liviza'),
			'default' 		=> true,
			'label'  		=> '<div class="cs-text-muted cs-text-desc">'.esc_html__('Show or hide social share box.', 'liviza').'</div>',
        ),
		array(
			'id'     		=> 'coaching_social_share_title',
			'type'    		=> 'text',
			'title'   		=> esc_html__('Social Share Title', 'liviza'),
			'default' 		=> esc_html__('SHARE', 'liviza'),
			'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>'.esc_html__('This text will appear in the social share box as title', 'liviza').'</div>',
			'dependency'    => array( 'coaching_show_social_share', '==', 'true' ),
		),
		array(
			'id'        => 'coaching_social_share_services',
			'type'      => 'checkbox',
			'title'     => esc_html__('Select Social Share Service', 'liviza'),
			'options'   => array(
					'facebook'    => esc_html__('Facebook', 'liviza'),
					'twitter'     => esc_html__('Twitter', 'liviza'),
					'gplus'       => esc_html__('Google Plus', 'liviza'),
					'pinterest'   => esc_html__('Pinterest', 'liviza'),
					'linkedin'    => esc_html__('LinkedIn', 'liviza'),
					'stumbleupon' => esc_html__('Stumbleupon', 'liviza'),
					'tumblr'      => esc_html__('Tumblr', 'liviza'),
					'reddit'      => esc_html__('Reddit', 'liviza'),
					'digg'        => esc_html__('Digg', 'liviza'),
			),
			'after'    	 => '<div class="cs-text-muted cs-text-desc"><br>' . sprintf( esc_html__('The selected social service icon will be visible on single %s so user can share on social sites.', 'liviza'), $ch_title_singular ) . '</div>',
			'dependency' => array( 'coaching_show_social_share', '==', 'true' ),
		),
		array(
			'id'     		=> 'coaching_single_top_btn_title',
			'type'    		=> 'text',
			'title'   		=> esc_html__('Button Title', 'liviza'),
			'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>'.esc_html__('This button will appear after the social share links.', 'liviza').'</div>',
		),
		array(
			'id'     		=> 'coaching_single_top_btn_link',
			'type'    		=> 'text',
			'title'   		=> esc_html__('Button Link', 'liviza'),
			'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>'.esc_html__('This button will appear after the social share links.', 'liviza').'</div>',
		),
		array(
			'type'       	=> 'heading',
			'content'    	=> sprintf( esc_html__('%s Settings', 'liviza'), $ch_cat_title ),
			'after'  		=> '<small>' . sprintf( esc_html__('Settings for %s', 'liviza'), $ch_cat_title ) . '</small>',
		),
		array(
			'id'           	=> 'pfcat_view',
			'type'         	=> 'image_select',
			'title'        	=> sprintf( esc_html__('%s Boxes template', 'liviza'), $ch_title_singular ),
			'options'       => themestek_global_template_list( 'coaching', true ),
			'default'      	=> 'style-1',
			'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>' . sprintf( esc_html__('Select %1$s Box view on single %2$s page.', 'liviza'), $ch_title_singular, $ch_cat_title_singular ) . '</div>',
			'radio'      	=> true,
        ),
		array(
			'id'           	=> 'pfcat_column',
			'type'         	=> 'select',
			'title'        	=>  esc_html__('Select column', 'liviza'),
			'options'  => array(
				'two'     => esc_html__('Two column', 'liviza'),
				'three'   => esc_html__('Three column', 'liviza'),
				'four'    => esc_html__('Four column', 'liviza'),
				'five'    => esc_html__('Five column', 'liviza'),
				'six'     => esc_html__('Six column', 'liviza'),
			),
			'default'      	=> 'three',
			'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>' . sprintf( esc_html__('Select column to show on %s page.', 'liviza'), $ch_cat_title_singular ) . '</div>',
        ),
		array(
			'id'     		=> 'pfcat_show',
			'type'   		=> 'number',
			'title'         => sprintf( esc_html__('%s to show', 'liviza' ), $ch_title_singular ),
			'default'		=> '9',
			'after'  	  	=> '<div class="cs-text-muted cs-text-desc"><br>' . sprintf( esc_html__('How many %1$s you like to show on %2$s page', 'liviza'), $ch_title_singular, $ch_cat_title_singular ) . '</div>',
        ),
	)
);

// Service CPT Settings
$themestek_framework_options[] = array(
	'name'   => 'service_settings', // like ID
	'title'  => sprintf( esc_html__('%s Settings', 'liviza'), $service_title_singular ),
	'icon'   => 'fa fa-gear',
	'fields' => array( // begin: fields
		array(
			'type'       	=> 'heading',
			'content'    	=> sprintf( esc_html__('%s Settings', 'liviza'), $service_cat_title ),
			'after'  		=> '<small>' . sprintf( esc_html__('Settings for %s', 'liviza'), $service_cat_title ) . '</small>',
		),
		array(
			'id'           	=> 'services_cat_view',
			'type'         	=> 'image_select',
			'title'        	=> sprintf( esc_html__('%s Boxes template', 'liviza'), $service_title_singular ),
			'options'       => themestek_global_template_list( 'service', true ),
			'default'      	=> 'style-2',
			'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>' . sprintf( esc_html__('Select %1$s Box view on single %2$s page.', 'liviza'), $service_title_singular, $service_cat_title_singular ) . '</div>',
			'radio'      	=> true,
        ),
		array(
			'id'           	=> 'services_cat_column',
			'type'         	=> 'select',
			'title'        	=>  esc_html__('Select column', 'liviza'),
			'options'  => array(
				'two'     => esc_html__('Two column', 'liviza'),
				'three'   => esc_html__('Three column', 'liviza'),
				'four'    => esc_html__('Four column', 'liviza'),
				'five'    => esc_html__('Five column', 'liviza'),
				'six'     => esc_html__('Six column', 'liviza'),
			),
			'default'      	=> 'two',
			'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>' . sprintf( esc_html__('Select column to show on %s page.', 'liviza'), $service_cat_title_singular ) . '</div>',
        ),
		array(
			'id'     		=> 'services_cat_show',
			'type'   		=> 'number',
			'title'         => sprintf( esc_html__('%s to show', 'liviza' ), $service_title_singular ),
			'default'		=> '9',
			'after'  	  	=> '<div class="cs-text-muted cs-text-desc"><br>' . sprintf( esc_html__('How many %1$s you like to show on %2$s page', 'liviza'), $service_title_singular, $service_cat_title_singular ) . '</div>',
        ),
	)
);

// Team Member Settings
$themestek_framework_options[] = array(
	'name'   => 'team_member_settings', // like ID
	'title'  => sprintf( esc_html__('%s Settings', 'liviza'), $team_member_title_singular ),
	'icon'   => 'fa fa-gear',
	'fields' => array( // begin: fields
		array(
			'type'       	=> 'heading',
			'content'    	=> sprintf( esc_html_x('%s\'s Extra Details Settings', 'Team Member', 'liviza'), $team_member_title_singular ),
			'after'  		=> '<small>'.sprintf( esc_html_x('You can fill this extra details and the details will be available on single %s page only. This will be shown as LIST with title and value design.', 'Team Member', 'liviza'), $team_member_title_singular ) . '</small>',
		),
		array(
			'id'              => 'team_extra_details_lines',
			'type'            => 'group',
			'title'           => esc_html__('Line Details', 'liviza'),
			'info'            => sprintf( esc_html_x('This will be added a new line in DETAILS box on single %s.', 'Team Member', 'liviza'), $team_member_title_singular ),
			'button_title'    => esc_html__('Add New Line', 'liviza'),
			'accordion_title' => esc_html__('Details for the line', 'liviza'),
			'fields'          => array(
				array(
					'id'     		=> 'team_extra_details_line_title',
					'type'    		=> 'text',
					'title'   		=> esc_html__('Line Title', 'liviza'),
					'default' 		=> esc_html__('Experience', 'liviza'),
					'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>'. sprintf( esc_html_x('Title for the first line in the DETAILS box in single %s', 'Team Member', 'liviza'), $team_member_title_singular ) . '<br> ' . esc_html__('Leave this field empty to remove the line.', 'liviza').'</div>',
				),
				array(
					'id'      		=> 'data',
					'type'   		=> 'radio',
					'title'   		=> esc_html__('Line Data Type', 'liviza'),
					'options' 		=> array(
						'custom'  => esc_html__('Custom text (add anything)', 'liviza'),
						'url'     => esc_html__('URL link', 'liviza'),
						'email'   => esc_html__('Email address', 'liviza'),
						'phone'   => esc_html__('Phone number', 'liviza'),
					),
					'default'		=> 'custom',
					'after'  	  	=> '<div class="cs-text-muted cs-text-desc"><br>'.sprintf( esc_html_x('Select view for single %s', 'Team Member', 'liviza'), $team_member_title_singular ).'</div>',
				),
			),
			'default' => array (
				array (
					'team_extra_details_line_title' => esc_html__('Address Info', 'liviza'),
					'data' => 'custom',
				),
				array (
					'team_extra_details_line_title' => esc_html__('Occupation', 'liviza'),
					'data' => 'custom',
				),
				array (
					'team_extra_details_line_title' => esc_html__('Experience', 'liviza'),
					'data' => 'custom',
				),
				array (
					'team_extra_details_line_title' => esc_html__('Core Skills', 'liviza'),
					'data' => 'custom',
				),
				array (
					'team_extra_details_line_title' => esc_html__('Certificates', 'liviza'),
					'data' => 'custom',
				),
				array (
					'team_extra_details_line_title' => esc_html__('Education', 'liviza'),
					'data' => 'custom',
				),
			),
        ),

		array(
			'type'       	=> 'heading',
			'content'    	=> sprintf( esc_html__('%s Settings', 'liviza'), $team_group_title_singular),
			'after'  		=> '<small>' . sprintf( esc_html__('Settings for %s page', 'liviza'), $team_group_title_singular) . '</small>',
		),
		array(
			'id'           	=> 'teamcat_view',
			'type'         	=> 'image_select',
			'title'        	=> sprintf( esc_html__('%s Boxes template', 'liviza'), $team_member_title_singular ),
			'options'       => themestek_global_template_list( 'team', true ),
			'default'      	=> esc_html__('style-1', 'liviza'),
			'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>' . sprintf( esc_html__('Select %1$s\'s Box view on %2$s page.', 'liviza'), $team_member_title_singular, $team_group_title_singular ) . '</div>',
			'radio'      	=> true,
        ),
		array(
			'id'           	=> 'teamcat_column',
			'type'         	=> 'select',
			'title'        	=>  esc_html__('Select column', 'liviza'),
			'options'  => array(
				'two'   => esc_html__('Two column', 'liviza'),
				'three' => esc_html__('Three column', 'liviza'),
				'four'  => esc_html__('Four column', 'liviza'),
			),
			'default'      	=> 'three',
			'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>' . sprintf(esc_html__('Select column to show %s', 'liviza'), $team_member_title ) . '</div>',
        ),
		array(
			'id'     		=> 'teamcat_show',
			'type'   		=> 'number',
			'title'         => sprintf( esc_html__('%s to Show', 'liviza' ), $team_member_title  ),
			'default'		=> '9',
			'after'  	  	=> '<div class="cs-text-muted cs-text-desc"><br>' . sprintf( esc_html__('How many %s you like to show on category page', 'liviza'), $team_member_title  ) . '</div>',
        ),
	)
);
// Creating Client Groups array
$client_groups = array();
if( isset($liviza_theme_options['client_groups']) && is_array($liviza_theme_options['client_groups']) ){
foreach( $liviza_theme_options['client_groups'] as $key => $val ){
	$name = $val['client_group_name'];
	$slug = str_replace(' ', '_', strtolower($name));
	$client_groups[$slug] = $name;
}
}
// Error 404 Page Settings
$themestek_framework_options[] = array(
	'name'   => 'error404_page_settings', // like ID
	'title'  => esc_html__('Error 404 Page Settings', 'liviza'),
	'icon'   => 'fa fa-gear',
	'fields' => array( // begin: fields
		array(
			'type'       	=> 'heading',
			'content'    	=> esc_html__('Error 404 Page Settings', 'liviza'),
			'after'  		=> '<small>'.esc_html__('Settings that determine how the error page will be looking', 'liviza').'</small>',
		),
		array(
			'id'      		=> '404_background',
			'type'    		=> 'themestek_background',
			'title'  		=> esc_html__('Content area background for 404 page only', 'liviza' ),
			'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>'.esc_html__('Set background for 404 page content area only.', 'liviza').'</div>',
			'default'		=> array(
				'image'			=> get_template_directory_uri() . '/images/404-bg.jpg',
				'repeat'		=> 'no-repeat',
				'position'		=> 'center top',
				'size'			=> 'cover',
				'color'			=> 'rgba(9,22,42,0.8)',
			),
			'output' 	    => '.error404 .site-content-wrapper',
		),
		array(
			'id'       		 => 'error404_big_image',
			'type'     		 => 'themestek_image',
			'title'    		 => esc_html__('Big Image', 'liviza'),
			'after'  		 => '<div class="cs-text-muted cs-text-desc"><br>'.esc_html__('Upload image that will be used as big image on 404 page.', 'liviza')  . '</div>',
			'add_title'		 => esc_html__('Upload Image','liviza'),
			'default'		 => array(
				'thumb-url'	=> '',
				'full-url'	=> '',
			),
		),
		array(
			'id'      => 'error404_big_icon',
			'type'    => 'themestek_iconpicker',
			'title'  		=> esc_html__('Big Icon', 'liviza' ),
			'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>'.esc_html__('Select icon that appear in top with big size', 'liviza').'</div>',
			'default' =>  array (
				'library'				=> 'themify',
				'library_fontawesome'	=> 'fa fa-thumbs-o-down',
				'library_themify'		=> 'empty',
				'library_sgicon'		=> 'sgicon sgicon-WorldWide',
				'library_vc_linecons'	=> 'li_star',
				'library_themestek_liviza_business_icon' => 'themestek-liviza-business-icon-nuclear',
			),
		),
		array(
			'id'     		=> 'error404_above_big_text',
			'type'    		=> 'text',
			'title'   		=> esc_html__('Heading text (before Big Heading text)', 'liviza'),
			'default' 		=> esc_html__('404', 'liviza'),
			'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>'. esc_html__('This text will be shown with medium font size before Big Heading text', 'liviza').'</div>',
		),
		array(
			'id'     		=> 'error404_big_text',
			'type'    		=> 'text',
			'title'   		=> esc_html__('Big heading text', 'liviza'),
			'default' 		=> esc_html__('PAGE NOT FOUND', 'liviza'),
			'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>'. esc_html__('This text will be shown with big font size below icon', 'liviza').'</div>',
		),
		array(
			'id'     		=> 'error404_medium_text',
			'type'    		=> 'textarea',
			'title'   		=> esc_html__('Description text', 'liviza'),
			'default' 		=> esc_html__('Sorry, but the page you are looking for does not exist or removed. Please use search given below to find what you are looking or use the main menu.', 'liviza'),
			'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>'. esc_html__('This file may have been moved or deleted. Be sure to check your spelling', 'liviza').'</div>',
		),
		array(
			'id'     		=> 'error404_search',
			'type'   		=> 'switcher',
			'title'   		=> esc_html__('Show Search Form', 'liviza'),
			'default' 		=> true,
			'label'  		=> '<div class="cs-text-muted cs-text-desc">'.esc_html__('Set this option "YES" to show search form on the 404 page', 'liviza').'</div>',
        ),
	)
);

// Search Page Settings
$themestek_framework_options[] = array(
	'name'   => 'search_page_settings', // like ID
	'title'  => esc_html__('Search Page Settings', 'liviza'),
	'icon'   => 'fa fa-gear',
	'fields' => array( // begin: fields
		array(
			'type'       	=> 'heading',
			'content'    	=> esc_html__('Search Page Settings', 'liviza'),
		),
		array(
			'id'       		 => 'searchnoresult',
			'type'     		 => 'textarea',
			'title'    		 =>  esc_html__('Content of the search page if no results found', 'liviza'),
			'shortcode'		 => true,
			'after'  	     => '<div class="cs-text-muted cs-text-desc"><br>'. esc_html__('Specify the content of the page that will be displayed if while search no results found', 'liviza') . '<br> ' . esc_html__('html tags and shortcodes are allowed', 'liviza').'</div>',
			'default'  		 => themestek_wp_kses( '<h3>Nothing found</h3><p>Sorry, but nothing matched your search terms. Please try again with some different keywords.</p>' ),
        ),
	)
);

// Sidebar Settings
$themestek_framework_options[] = array(
	'name'   => 'sidebar_settings', // like ID
	'title'  => esc_html__('Sidebar Settings', 'liviza'),
	'icon'   => 'fa fa-gear',
	'fields' => array( // begin: fields
		array(
			'type'       	=> 'heading',
			'content'    	=> esc_html__('Sidebar Settings', 'liviza'),
		),
		array(
			'id'              => 'custom_sidebars',
			'type'            => 'group',
			'title'           => esc_html__('Custom Sidebars', 'liviza'),
			'info'            => esc_html__('Specify the custom sidebars that can be used in the pages for a widgets', 'liviza'),
			'button_title'    => esc_html__('Add New Sidebar', 'liviza'),
			'accordion_title' => esc_html__('Custom Sidebar Properties', 'liviza'),
			'fields'          => array(
				array(
					'id'     		=> 'custom_sidebar',
					'type'    		=> 'text',
					'title'   		=> esc_html__('Custom Sidebar Name', 'liviza'),
					'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>'. esc_html__('Write custom sidebar name here', 'liviza').'</div>',
				),
			)
        ),
		array(
			'type'       	=> 'heading',
			'content'    	=> esc_html__('Sidebar Position', 'liviza'),
			'after'  		=> '<small>'.esc_html__('Select sidebar position for different sections', 'liviza').'</small>',
		),
		array(
			'id'           	=> 'sidebar_post',
			'type'        	=> 'image_select',
			'title'       	=> esc_html__('Blog Post/Category Sidebar', 'liviza'),
			'options'     	=> array(
				'no'          => get_template_directory_uri() . '/includes/images/layout_no_side.png',
				'left'        => get_template_directory_uri() . '/includes/images/layout_left.png',
				'right'       => get_template_directory_uri() . '/includes/images/layout_right.png',
				'both'        => get_template_directory_uri() . '/includes/images/layout_both.png',
				'bothleft'    => get_template_directory_uri() . '/includes/images/layout_left_both.png',
				'bothright'   => get_template_directory_uri() . '/includes/images/layout_right_both.png',
			),
			'radio'       	=> true,
			'default'      	=> 'right',
			'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>'.esc_html__('Select one of layouts for blog post. Also for Category, Tag and Archive view too. Technically, related to all blog post view.', 'liviza').'</div>',
        ),
		array(
			'id'           	=> 'sidebar_page',
			'type'        	=> 'image_select',
			'title'       	=> esc_html__('Standard Pages Sidebar', 'liviza'),
			'options'     	=> array(
				'no'          => get_template_directory_uri() . '/includes/images/layout_no_side.png',
				'left'        => get_template_directory_uri() . '/includes/images/layout_left.png',
				'right'       => get_template_directory_uri() . '/includes/images/layout_right.png',
				'both'        => get_template_directory_uri() . '/includes/images/layout_both.png',
				'bothleft'    => get_template_directory_uri() . '/includes/images/layout_left_both.png',
				'bothright'   => get_template_directory_uri() . '/includes/images/layout_right_both.png',
			),
			'radio'       	=> true,
			'default'      	=> 'right',
			'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>'.esc_html__('Select one of layouts for standard pages', 'liviza').'</div>',
        ),
		array(
			'id'           	=> 'sidebar_team_member',
			'type'        	=> 'image_select',
			'title'       	=> esc_html__('Team member Sidebar', 'liviza'),
			'options'     	=> array(
				'no'          => get_template_directory_uri() . '/includes/images/layout_no_side.png',
				'left'        => get_template_directory_uri() . '/includes/images/layout_left.png',
				'right'       => get_template_directory_uri() . '/includes/images/layout_right.png',
				'both'        => get_template_directory_uri() . '/includes/images/layout_both.png',
				'bothleft'    => get_template_directory_uri() . '/includes/images/layout_left_both.png',
				'bothright'   => get_template_directory_uri() . '/includes/images/layout_right_both.png',
			),
			'radio'       	=> true,
			'default'      	=> 'left',
			'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>'.esc_html__('Select one of layouts for Team Member single and Team Member Group.', 'liviza').'</div>',
        ),
		array(
			'id'           	=> 'sidebar_team_member_group',
			'type'        	=> 'image_select',
			'title'       	=> esc_html__('Team member Group Sidebar', 'liviza'),
			'options'     	=> array(
				'no'          => get_template_directory_uri() . '/includes/images/layout_no_side.png',
				'left'        => get_template_directory_uri() . '/includes/images/layout_left.png',
				'right'       => get_template_directory_uri() . '/includes/images/layout_right.png',
				'both'        => get_template_directory_uri() . '/includes/images/layout_both.png',
				'bothleft'    => get_template_directory_uri() . '/includes/images/layout_left_both.png',
				'bothright'   => get_template_directory_uri() . '/includes/images/layout_right_both.png',
			),
			'radio'       	=> true,
			'default'      	=> 'left',
			'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>'.esc_html__('Select one of layouts for Team Member single and Team Member Group.', 'liviza').'</div>',
        ),
		array(
			'id'           	=> 'sidebar_portfolio',
			'type'        	=> 'image_select',
			'title'       	=> sprintf( esc_html__('%s Sidebar', 'liviza'), $pf_title_singular ),
			'options'     	=> array(
				'no'          => get_template_directory_uri() . '/includes/images/layout_no_side.png',
				'left'        => get_template_directory_uri() . '/includes/images/layout_left.png',
				'right'       => get_template_directory_uri() . '/includes/images/layout_right.png',
				'both'        => get_template_directory_uri() . '/includes/images/layout_both.png',
				'bothleft'    => get_template_directory_uri() . '/includes/images/layout_left_both.png',
				'bothright'   => get_template_directory_uri() . '/includes/images/layout_right_both.png',
			),
			'radio'       	=> true,
			'default'      	=> 'left',
			'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>' . sprintf( esc_html__('Select one of layouts for %s single pages.', 'liviza'), $pf_title_singular ) . '</div>',
        ),
		array(
			'id'           	=> 'sidebar_portfolio_category',
			'type'        	=> 'image_select',
			'title'       	=> sprintf( esc_html__('%s Sidebar', 'liviza'), $pf_cat_title_singular ),
			'options'     	=> array(
				'no'          => get_template_directory_uri() . '/includes/images/layout_no_side.png',
				'left'        => get_template_directory_uri() . '/includes/images/layout_left.png',
				'right'       => get_template_directory_uri() . '/includes/images/layout_right.png',
				'both'        => get_template_directory_uri() . '/includes/images/layout_both.png',
				'bothleft'    => get_template_directory_uri() . '/includes/images/layout_left_both.png',
				'bothright'   => get_template_directory_uri() . '/includes/images/layout_right_both.png',
			),
			'radio'       	=> true,
			'default'      	=> 'left',
			'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>' . sprintf( esc_html__('Select one of layouts for %s view.', 'liviza'), $pf_cat_title_singular ) . '</div>',
		),
		array(
			'id'           	=> 'sidebar_coaching',
			'type'        	=> 'image_select',
			'title'       	=> sprintf( esc_html__('%s Sidebar', 'liviza'), $ch_title_singular ),
			'options'     	=> array(
				'no'          => get_template_directory_uri() . '/includes/images/layout_no_side.png',
				'left'        => get_template_directory_uri() . '/includes/images/layout_left.png',
				'right'       => get_template_directory_uri() . '/includes/images/layout_right.png',
				'both'        => get_template_directory_uri() . '/includes/images/layout_both.png',
				'bothleft'    => get_template_directory_uri() . '/includes/images/layout_left_both.png',
				'bothright'   => get_template_directory_uri() . '/includes/images/layout_right_both.png',
			),
			'radio'       	=> true,
			'default'      	=> 'left',
			'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>' . sprintf( esc_html__('Select one of layouts for %s single pages.', 'liviza'), $ch_title_singular ) . '</div>',
        ),
		array(
			'id'           	=> 'sidebar_coaching_category',
			'type'        	=> 'image_select',
			'title'       	=> sprintf( esc_html__('%s Sidebar', 'liviza'), $ch_cat_title_singular ),
			'options'     	=> array(
				'no'          => get_template_directory_uri() . '/includes/images/layout_no_side.png',
				'left'        => get_template_directory_uri() . '/includes/images/layout_left.png',
				'right'       => get_template_directory_uri() . '/includes/images/layout_right.png',
				'both'        => get_template_directory_uri() . '/includes/images/layout_both.png',
				'bothleft'    => get_template_directory_uri() . '/includes/images/layout_left_both.png',
				'bothright'   => get_template_directory_uri() . '/includes/images/layout_right_both.png',
			),
			'radio'       	=> true,
			'default'      	=> 'both',
			'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>' . sprintf( esc_html__('Select one of layouts for %s view.', 'liviza'), $ch_cat_title_singular ) . '</div>',
		),
		// Service
		array(
			'id'           	=> 'sidebar_service',
			'type'        	=> 'image_select',
			'title'       	=> sprintf( esc_html__('%s Sidebar', 'liviza'), $service_title_singular ),
			'options'     	=> array(
				'no'          => get_template_directory_uri() . '/includes/images/layout_no_side.png',
				'left'        => get_template_directory_uri() . '/includes/images/layout_left.png',
				'right'       => get_template_directory_uri() . '/includes/images/layout_right.png',
				'both'        => get_template_directory_uri() . '/includes/images/layout_both.png',
				'bothleft'    => get_template_directory_uri() . '/includes/images/layout_left_both.png',
				'bothright'   => get_template_directory_uri() . '/includes/images/layout_right_both.png',
			),
			'radio'       	=> true,
			'default'      	=> 'left',
			'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>' . sprintf( esc_html__('Select one of layouts for %s single pages.', 'liviza'), $service_title_singular ) . '</div>',
        ),
		array(
			'id'           	=> 'sidebar_service_category',
			'type'        	=> 'image_select',
			'title'       	=> sprintf( esc_html__('%s Sidebar', 'liviza'), $service_cat_title_singular ),
			'options'     	=> array(
				'no'          => get_template_directory_uri() . '/includes/images/layout_no_side.png',
				'left'        => get_template_directory_uri() . '/includes/images/layout_left.png',
				'right'       => get_template_directory_uri() . '/includes/images/layout_right.png',
				'both'        => get_template_directory_uri() . '/includes/images/layout_both.png',
				'bothleft'    => get_template_directory_uri() . '/includes/images/layout_left_both.png',
				'bothright'   => get_template_directory_uri() . '/includes/images/layout_right_both.png',
			),
			'radio'       	=> true,
			'default'      	=> 'left',
			'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>' . sprintf( esc_html__('Select one of layouts for %s view.', 'liviza'), $service_cat_title_singular ) . '</div>',
        ),
		array(
			'id'           	=> 'sidebar_search',
			'type'        	=> 'image_select',
			'title'       	=> esc_html__('Search Page Sidebar', 'liviza'),
			'options'     	=> array(
				'no'          => get_template_directory_uri() . '/includes/images/layout_no_side.png',
				'left'        => get_template_directory_uri() . '/includes/images/layout_left.png',
				'right'       => get_template_directory_uri() . '/includes/images/layout_right.png',
				'both'        => get_template_directory_uri() . '/includes/images/layout_both.png',
				'bothleft'    => get_template_directory_uri() . '/includes/images/layout_left_both.png',
				'bothright'   => get_template_directory_uri() . '/includes/images/layout_right_both.png',
			),
			'radio'       	=> true,
			'default'      	=> 'no',
			'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>'.esc_html__('Select one of layouts for search page', 'liviza').'</div>',
		),
		array(
			'id'           	=> 'sidebar_woocommerce',
			'type'        	=> 'image_select',
			'title'       	=> esc_html__('WooCommerce Sidebar', 'liviza'),
			'options'     	=> array(
				'no'          => get_template_directory_uri() . '/includes/images/layout_no_side.png',
				'left'        => get_template_directory_uri() . '/includes/images/layout_left.png',
				'right'       => get_template_directory_uri() . '/includes/images/layout_right.png',
				'both'        => get_template_directory_uri() . '/includes/images/layout_both.png',
				'bothleft'    => get_template_directory_uri() . '/includes/images/layout_left_both.png',
				'bothright'   => get_template_directory_uri() . '/includes/images/layout_right_both.png',
			),
			'radio'       	=> true,
			'default'      	=> 'right',
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_html__('Select sidebar position for WooCommerce Shop page', 'liviza').'</div>',
        ),
		array(
			'id'           	=> 'sidebar_woocommerce_single',
			'type'        	=> 'image_select',
			'title'       	=> esc_html__('WooCommerce Sidebar for Single Product page', 'liviza'),
			'options'     	=> array(
				'no'          => get_template_directory_uri() . '/includes/images/layout_no_side.png',
				'left'        => get_template_directory_uri() . '/includes/images/layout_left.png',
				'right'       => get_template_directory_uri() . '/includes/images/layout_right.png',
				'both'        => get_template_directory_uri() . '/includes/images/layout_both.png',
				'bothleft'    => get_template_directory_uri() . '/includes/images/layout_left_both.png',
				'bothright'   => get_template_directory_uri() . '/includes/images/layout_right_both.png',
			),
			'radio'       	=> true,
			'default'      	=> 'right',
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_html__('Select sidebar position for WooCommerce Single product view page', 'liviza').'</div>',
        ),
		array(
			'id'           	=> 'sidebar_bbpress',
			'type'        	=> 'image_select',
			'title'       	=> esc_html__('BBPress Sidebar', 'liviza'),
			'options'     	=> array(
				'no'          => get_template_directory_uri() . '/includes/images/layout_no_side.png',
				'left'        => get_template_directory_uri() . '/includes/images/layout_left.png',
				'right'       => get_template_directory_uri() . '/includes/images/layout_right.png',
				'both'        => get_template_directory_uri() . '/includes/images/layout_both.png',
				'bothleft'    => get_template_directory_uri() . '/includes/images/layout_left_both.png',
				'bothright'   => get_template_directory_uri() . '/includes/images/layout_right_both.png',
			),
			'radio'       	=> true,
			'default'      	=> 'right',
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_html__('Select sidebar position for BBPress pages', 'liviza').'</div>',
		),
		array(
			'id'           	=> 'sidebar_timetable',
			'type'        	=> 'image_select',
			'title'       	=> esc_html__('TimeTable Sidebar', 'liviza'),
			'options'     	=> array(
				'no'          => get_template_directory_uri() . '/includes/images/layout_no_side.png',
				'left'        => get_template_directory_uri() . '/includes/images/layout_left.png',
				'right'       => get_template_directory_uri() . '/includes/images/layout_right.png',
				'both'        => get_template_directory_uri() . '/includes/images/layout_both.png',
				'bothleft'    => get_template_directory_uri() . '/includes/images/layout_left_both.png',
				'bothright'   => get_template_directory_uri() . '/includes/images/layout_right_both.png',
			),
			'radio'       	=> true,
			'default'      	=> 'right',
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_html__('Select sidebar position for Timetable pages', 'liviza').'</div>',
        ),
	)
);
// Getting social list
$global_social_list = themestek_shared_social_list();
// social service list
$sociallist = array_merge(
	$global_social_list,
	array('rss'     => 'Rss Feed')
);
// Social Links
$themestek_framework_options[] = array(
	'name'   => 'social_links', // like ID
	'title'  => esc_html__('Social Links', 'liviza'),
	'icon'   => 'fa fa-gear',
	'fields' => array( // begin: fields
		array(
			'type'       	=> 'heading',
			'content'    	=> esc_html__('Social Links', 'liviza'),
			'after'			=> '<small>' . sprintf(__('You can use %1$s[themestek-social-links]%2$s shortcode to show social links.', 'liviza'), '<code>' , '</code>' ) . '</small>',
		),
		array(
			'id'              => 'social_icons_list',
			'type'            => 'group',
			'title'           => esc_html__('Social Links', 'liviza'),
			'info'            => esc_html__('Add your social services here. Also you can reorder the Social Links as per your choice. Just drag and drop items to reorder as per your choice', 'liviza'),
			'button_title'    => esc_html__('Add New Social Service', 'liviza'),
			'accordion_title' => esc_html__('Social Service Properties', 'liviza'),
			'fields'          => array(
					array(
						'id'            => 'social_service_name',
						'type'          => 'select',
						'title'         =>  esc_html__('Social Service', 'liviza'),
						'options'  		=> $sociallist,
						'default'       => 'twitter',
						'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>'.esc_html__('Select Social icon from here', 'liviza').'</div>',
					),
					array(
						'id'     		=> 'social_service_link',
						'type'    		=> 'text',
						'title'   		=> esc_html__('Link to Social icon selected above', 'liviza'),
						'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>'. esc_html__('Paste URL only', 'liviza').'</div>',
						'dependency' 	=> array( 'social_service_name', '!=', 'rss' ),
					),
			),
			'default' => array (
				array (
					'social_service_name' => 'facebook',
					'social_service_link' => '#',
				),
				array (
					'social_service_name' => 'twitter',
					'social_service_link' => '#',
				),
				array (
					'social_service_name' => 'flickr',
					'social_service_link' => '#',
				),
				array (
					'social_service_name' => 'linkedin',
					'social_service_link' => '',
				),
			),
        ),
	),
);
// WooCommerce Settings
if( function_exists('is_woocommerce') ){
	$themestek_framework_options[] = array(
		'name'   => 'woocommerce_settings', // like ID
		'title'  => esc_html__('WooCommerce Settings', 'liviza'),
		'icon'   => 'fa fa-shopping-cart',
		'fields' => array( // begin: fields
			array(
				'type'       	=> 'heading',
				'content'    	=> esc_html__('WooCommerce Settings', 'liviza'),
				'after'  		=> '<small>'. esc_html__('Setup for WooCommerce shop section. Please make sure you installed WooCommerce plugin', 'liviza').'</small>',
			),
			array(
				'id'     		=> 'wc-header-icon',
				'type'   		=> 'switcher',
				'title'   		=> esc_html__('Show Cart Icon in Header', 'liviza'),
				'default' 		=> false,
				'label'  		=> '<div class="cs-text-muted">'.esc_html__('Select "On" to show the cart icon in header. Select "OFF" to hide the cart icon.', 'liviza') . ' <br><br> ' . '<strong>' . esc_html__('NOTE:','liviza') . '</strong> ' . esc_html__('Please note that if you haven\'t installed "WooCommerce" plugin than the icon will not appear even if you selected "ON" in this option.', 'liviza').'</div>',
			),
			array(
				'id'     		=> 'woocommerce-column',
				'type'   		=> 'radio',
				'title'  		=> esc_html__('WooCommerce Product List Column', 'liviza'),
				'options'  		=> array(
					'1'				=> esc_html__('One Column', 'liviza'),
					'2'				=> esc_html__('Two Columns', 'liviza'),
					'3'				=> esc_html__('Three Columns', 'liviza'),
					'4'				=> esc_html__('Four Columns', 'liviza'),
				),
				'default'  		 => '3',
				'after'   		 => '<div class="cs-text-muted">'.esc_html__('Select how many column you want to show for product list view', 'liviza').'</div>',
			),
			array(
				'id'     		=> 'woocommerce-product-per-page',
				'type'   		=> 'number',
				'title'         => esc_html__('Products Per Page', 'liviza' ),
				'default'		=> '12',
				'after'  	  	=> '<div class="cs-text-muted"><br>'.esc_html__('Select how many product you want to show on SHOP page', 'liviza').'</div>',
			),
			array(
				'type'       	=> 'heading',
				'content'    	=> esc_html__('Single Product Page Settings', 'liviza'),
				'after'  		=> '<small>'. esc_html__('Options for Single product page', 'liviza').'</small>',
			),
			array(
				'id'     		=> 'wc-single-show-related',
				'type'   		=> 'switcher',
				'title'   		=> esc_html__('Show Related Products', 'liviza'),
				'default' 		=> true,
				'label'  		=> '<div class="cs-text-muted">'.esc_html__('Select "ON" to show Related Products below the product description on single page', 'liviza').'</div>',
			),
			array(
				'id'     		=> 'wc-single-related-column',
				'type'   		=> 'radio',
				'title'  		=> esc_html__('Column for Related Products', 'liviza'),
				'options'  		=> array(
					'1'				=> esc_html__('One Column', 'liviza'),
					'2'				=> esc_html__('Two Columns', 'liviza'),
					'3'				=> esc_html__('Three Columns', 'liviza'),
					'4'				=> esc_html__('Four Columns', 'liviza'),
				),
				'default'  		 => '3',
				'after'   		 => '<div class="cs-text-muted">'.esc_html__('Select how many column you want to show for product list of related products', 'liviza').'</div>',
				'dependency'     => array( 'wc-single-show-related', '==', 'true' ),
			),
			array(
				'id'     		=> 'wc-single-related-count',
				'type'   		=> 'number',
				'title'         => esc_html__('Related Products Show', 'liviza' ),
				'default'		=> '3',
				'after'  	  	=> '<div class="cs-text-muted"><br>'.esc_html__('Select how many products you want to show in the Related prodcuts area on single product page', 'liviza').'</div>',
				'dependency'    => array( 'wc-single-show-related', '==', 'true' ),
			),
		)
	);
}
// Under Construction
$themestek_framework_options[] = array(
	'name'   => 'under_construction', // like ID
	'title'  => esc_html__('Under Construction', 'liviza'),
	'icon'   => 'fa fa-gear',
	'fields' => array( // begin: fields
		array(
			'type'       	=> 'heading',
			'content'    	=> esc_html__('Under Construction', 'liviza'),
			'after'  		=> '<small>'. esc_html__('You can set your site in Under Construciton mode during development of your site. Please note that only logged in users like admin can view the site when this mode is activated', 'liviza').'</small>',
		),
		array(
			'id'     		=> 'uconstruction',
			'type'   		=> 'switcher',
			'title'   		=> esc_html__('Show Under Construciton Message', 'liviza'),
			'default' 		=> false,
			'label'  		=> esc_html__('You can acitvate this during development of your site. So site visitor will see Under Construction message.', 'liviza'). '<br>' . esc_html__('Please note that admin (when logged in) can view live site and not Under Construction message.', 'liviza'),
        ),
		array(
			'id'     		=> 'uconstruction_title',
			'type'    		=> 'text',
			'title'   		=> esc_html__('Title for Under Construction page', 'liviza'),
			'default'  		=> esc_html__('This site is Under Construction', 'liviza'),
			'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>'. esc_html__('Write TITLE for the Under Construction page', 'liviza').'</div>',
			'dependency'	=> array('uconstruction','==','true'),
		),
		array(
			'id'       		 => 'uconstruction_html',
			'type'     		 => 'textarea',
			'title'    		 =>  esc_html__('Page Content', 'liviza'),
			'shortcode'		 => true,
			'dependency'	 => array('uconstruction','==','true'),
			'default' 		 => themestek_wp_kses( '<div class="un-main-page-content">
			<div class="un-page-content">
			<div>[themestek-logo]</div>
			<div class="sepline"></div>
			<h1 class="heading">UNDER CONSTRUCTION</h1>
			<h4 class="subheading">Something awesome this way comes. Stay tuned!</h4>
			</div>
			</div>' ),
			'after'  		 => '<div class="cs-text-muted cs-text-desc"><br>'. esc_html__('Write your html code for Under Construction page body content', 'liviza').'</div>',
        ),
		array(
			'id'      		=> 'uconstruction_background',
			'type'    		=> 'themestek_background',
			'title'  		=> esc_html__('Background Properties', 'liviza' ),
			'dependency'	 => array('uconstruction','==','true'),
			'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>'.esc_html__('Set background options. This is for main body background', 'liviza').'</div>',
			'default'		=> array(
				'image'			=> get_template_directory_uri() . '/images/uconstruction-bg.jpg',
				'repeat'		=> 'no-repeat',
				'position'		=> 'center top',
				'attachment'	=> 'fixed',
				'size'			=> 'cover',
				'color'			=> sanitize_hex_color('#ffffff'),
			),
			'output'      	=> '.uconstruction_background',
        ),
		array(
			'id'       		 => 'uconstruction_css_code',
			'type'     		 => 'textarea',
			'title'    		 =>  esc_html__('CSS Code for Under Construction page', 'liviza'),
			'after'  		 => '<div class="cs-text-muted cs-text-desc"><br>'. esc_html__('Write your custom CSS code here', 'liviza').'</div>',
			'dependency'	 => array('uconstruction','==','true'),
			'default' 		 => urldecode('%40import+url%28%27https%3A%2F%2Ffonts.googleapis.com%2Fcss%3Ffamily%3DBiryani%3A200%2C300%2C400%2C500%2C600%2C700%27%29%3B%0D%0A%0D%0A.un-main-page-content%3Abefore%7B%0D%0Acontent%3A%27%27%3B%0D%0Aposition%3A+absolute%3B%0D%0Aleft%3A0%3B%0D%0Atop%3A0%3B%0D%0A+background-color%3A+rgba%28255%2C+255%2C+255%2C+0.10%29%3B%0D%0Awidth%3A100%25%3B%0D%0Aheight%3A100%25%3B%0D%0A%7D%0D%0A.un-page-content%7B%0D%0A%09position%3A+absolute%3B%0D%0A++++top%3A+50%25%3B%0D%0A++++left%3A+50%25%3B%0D%0A++++-khtml-transform%3A+translateX%280%25%29+translateY%28-50%25%29%3B%0D%0A++++-moz-transform%3A+translateX%280%25%29+translateY%28-50%25%29%3B%0D%0A++++-ms-transform%3A+translateX%280%25%29+translateY%28-50%25%29%3B%0D%0A++++-o-transform%3A+translateX%280%25%29+translateY%28-50%25%29%3B%0D%0A++++transform%3A+translateX%28-50%25%29+translateY%28-50%25%29%3B%0D%0A%7D%0D%0A.ts-sc-logo+img%7B%0D%0A%09max-height%3A+72px%3B%0D%0A%7D%0D%0Ah1.heading%2C%0D%0Ah4.subheading%7B%0D%0A%09margin%3A0%3B%0D%0A%09padding%3A0%3B%0D%0Afont-family%3A+%22Biryani%22%2C+Arial%2C+Helvetica%2C+sans-serif%3B%0D%0A%7D%0D%0Ah1.heading%7B%0D%0A++++font-size%3A+90px%3B%0D%0A++++line-height%3A+90px%3B%0D%0A++++font-weight%3A+700%3B%0D%0A++++margin-top%3A+50px%3B%0D%0A++++margin-bottom%3A+5px%3B%0D%0Afont-family%3A+%22Biryani%22%2C+Arial%2C+Helvetica%2C+sans-serif%3B%0D%0Acolor%3A+%23313437%0D%0A%7D%0D%0Ah4.subheading%7B%09%0D%0A%0D%0Amargin-top%3A+29px%3B%0D%0A++++color%3A+%23313437%3B%0D%0A++++font-size%3A+22px%3B%0D%0A++++line-height%3A+32px%3B%0D%0A%7D'),
        ),
	)
);
// One page website
$themestek_framework_options[] = array(
	'name'   => 'one_page_site', // like ID
	'title'  => esc_html__('One Page Site option', 'liviza'),
	'icon'   => 'fa fa-gear',
	'fields' => array( // begin: fields
		array(
			'type'      => 'heading',
			'content'   => esc_html__('One Page Website', 'liviza'),
			'after'  	=> '<small>'.esc_html__('Options for One Page website', 'liviza').'</small>',
		),
		array(
			'type'    	=> 'notice',
			'class'   	=> 'info',
			'content'	=> '<p><strong>' . esc_html__('More information about how to set one page site', 'liviza') . '</strong> <br> <a href="http://liviza.themestek2.com/doc/#one_page_website" target="_blank"> ' . esc_html__('Please read our documentation for how to set one-page website by clicking here.', 'liviza') . '</a> </p>',
		),
		array(
			'id'      	=> 'one_page_site',
			'type'    	=> 'switcher',
			'title'   	=> esc_html__('One Page Site', 'liviza'),
			'default' 	=> false,
			'label'   	=> '<br><div class="cs-text-muted cs-text-desc">'.esc_html__('Set this option "ON" if your site is one page website', 'liviza').' <a target="_blank" href="#">'.esc_html__('Click here to know more about how to setup one-page site.', 'liviza').'</a></div>',
		),
	)
);
// Seperator
$themestek_framework_options[] = array(
	'name'   => 'themestek_seperator_1',
	'title'  => esc_html__('Advanced', 'liviza'),
	'icon'   => 'fa fa-gear',
);
$cssfile = (is_multisite()) ? 'php' : 'css' ;
// Advanced Settings
$themestek_framework_options[] = array(
	'name'   => 'advanced_settings', // like ID
	'title'  => esc_html__('Advanced Settings', 'liviza'),
	'icon'   => 'fa fa-gear',
	'fields' => array( // begin: fields
		array(
			'type'       	=> 'heading',
			'content'    	=> sprintf( esc_html__('Custom Post Type : %s (Portfolio) Settings', 'liviza'), $pf_title_singular ),
			'after'  		=> '<small>'. esc_html__('Advanced settings for Portfolio custom post type', 'liviza').'</small>',
		),
		array(
			'id'     		=> 'pf_type_title',
			'type'    		=> 'text',
			'title'   		=> sprintf( esc_html__('Title for %s (Portfolio) Post Type', 'liviza'), $pf_title_singular ),
			'default'  		=> esc_html__('Country', 'liviza'),
			'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>'. esc_html__('This will change the Title for Portfolio post type section', 'liviza').'</div>',
		),
		array(
			'id'     		=> 'pf_type_title_singular',
			'type'    		=> 'text',
			'title'   		=> sprintf( esc_html__('Singular title for %s (Portfolio) Post Type', 'liviza'), $pf_title_singular ),
			'default'  		=> esc_html__('Country', 'liviza'),
			'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>'. esc_html__('This will change the Title for Portfolio post type section. Only for singular title.', 'liviza').'</div>',
		),
		array(
			'id'     		=> 'pf_type_slug',
			'type'    		=> 'text',
			'title'   		=> sprintf( esc_html__('URL Slug for %s (Portfolio) Post Type', 'liviza'), $pf_title_singular ),
			'default'  		=> esc_html('country'),
			'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>'. esc_html__('This will change the URL slug for Portfolio post type section', 'liviza').'</div>',
		),
		array(
			'id'     		=> 'pf_cat_title',
			'type'    		=> 'text',
			'title'   		=> sprintf( esc_html__('Title for %s (Portfolio Category) List', 'liviza'), $pf_cat_title_singular ),
			'default'  		=> esc_html__('Country Categories', 'liviza'),
			'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>'. esc_html__('Title for Portfolio Category list for group page. This will appear at left sidebar', 'liviza').'</div>',
		),
		array(
			'id'     		=> 'pf_cat_title_singular',
			'type'    		=> 'text',
			'title'   		=> sprintf( esc_html__('Singular Title for %s (Portfolio Category) List', 'liviza'), $pf_cat_title_singular ),
			'default'  		=> esc_html__('Country Category', 'liviza'),
			'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>'. esc_html__('Title for Portfolio Category list for group page. This will appear at left sidebar', 'liviza').'</div>',
		),
		array(
			'id'     		=> 'pf_cat_slug',
			'type'    		=> 'text',
			'title'   		=> sprintf( esc_html__('URL Slug for %s (Portfolio Category) Link', 'liviza'), $pf_cat_title_singular ),
			'default'  		=> esc_html__('country-category', 'liviza'),
			'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>'. esc_html__('This will change the URL slug for Portfolio Category link', 'liviza').'</div>',
		),

		// Coaching CPT
		array(
			'type'       	=> 'heading',
			'content'    	=> sprintf( esc_html__('Custom Post Type : %s (Coaching) Settings', 'liviza'), $ch_title_singular ),
			'after'  		=> '<small>'. esc_html__('Advanced settings for Coaching custom post type', 'liviza').'</small>',
		),
		array(
			'id'     		=> 'ch_type_title',
			'type'    		=> 'text',
			'title'   		=> sprintf( esc_html__('Title for %s (Coaching) Post Type', 'liviza'), $ch_title_singular ),
			'default'  		=> esc_html__('Coachings', 'liviza'),
			'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>'. esc_html__('This will change the Title for Coaching post type section', 'liviza').'</div>',
		),
		array(
			'id'     		=> 'ch_type_title_singular',
			'type'    		=> 'text',
			'title'   		=> sprintf( esc_html__('Singular title for %s (Coaching) Post Type', 'liviza'), $ch_title_singular ),
			'default'  		=> esc_html__('Coaching', 'liviza'),
			'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>'. esc_html__('This will change the Title for Coaching post type section. Only for singular title.', 'liviza').'</div>',
		),
		array(
			'id'     		=> 'ch_type_slug',
			'type'    		=> 'text',
			'title'   		=> sprintf( esc_html__('URL Slug for %s (Coaching) Post Type', 'liviza'), $ch_title_singular ),
			'default'  		=> esc_html('coaching'),
			'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>'. esc_html__('This will change the URL slug for Coaching post type section', 'liviza').'</div>',
		),
		array(
			'id'     		=> 'ch_cat_title',
			'type'    		=> 'text',
			'title'   		=> sprintf( esc_html__('Title for %s (Coaching Category) List', 'liviza'), $ch_cat_title_singular ),
			'default'  		=> esc_html__('Coaching Categories', 'liviza'),
			'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>'. esc_html__('Title for Coaching Category list for group page. This will appear at left sidebar', 'liviza').'</div>',
		),
		array(
			'id'     		=> 'ch_cat_title_singular',
			'type'    		=> 'text',
			'title'   		=> sprintf( esc_html__('Singular Title for %s (Coaching Category) List', 'liviza'), $ch_cat_title_singular ),
			'default'  		=> esc_html__('Coaching Category', 'liviza'),
			'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>'. esc_html__('Title for Coaching Category list for group page. This will appear at left sidebar', 'liviza').'</div>',
		),
		array(
			'id'     		=> 'ch_cat_slug',
			'type'    		=> 'text',
			'title'   		=> sprintf( esc_html__('URL Slug for %s (Coaching Category) Link', 'liviza'), $ch_cat_title_singular ),
			'default'  		=> esc_html__('coaching-category', 'liviza'),
			'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>'. esc_html__('This will change the URL slug for Coaching Category link', 'liviza').'</div>',
		),
		// Service CPT
		array(
			'type'       	=> 'heading',
			'content'    	=> sprintf( esc_html__('Custom Post Type : %s (Service) Settings', 'liviza'), $service_title_singular ),
			'after'  		=> '<small>'. esc_html__('Advanced settings for Service custom post type', 'liviza').'</small>',
		),
		array(
			'id'     		=> 'service_type_title',
			'type'    		=> 'text',
			'title'   		=> sprintf( esc_html__('Title for %s (Service) Post Type', 'liviza'), $service_title_singular ),
			'default'  		=> esc_html__('Visa', 'liviza'),
			'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>'. esc_html__('This will change the Title for Service post type section', 'liviza').'</div>',
		),
		array(
			'id'     		=> 'service_type_title_singular',
			'type'    		=> 'text',
			'title'   		=> sprintf( esc_html__('Singular title for %s (Service) Post Type', 'liviza'), $service_title_singular ),
			'default'  		=> esc_html__('Visa', 'liviza'),
			'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>'. esc_html__('This will change the Title for Service post type section. Only for singular title.', 'liviza').'</div>',
		),
		array(
			'id'     		=> 'service_type_slug',
			'type'    		=> 'text',
			'title'   		=> sprintf( esc_html__('URL Slug for %s (Service) Post Type', 'liviza'), $service_title_singular ),
			'default'  		=> esc_html('visa'),
			'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>'. esc_html__('This will change the URL slug for Service post type section', 'liviza').'</div>',
		),
		array(
			'id'     		=> 'service_cat_title',
			'type'    		=> 'text',
			'title'   		=> sprintf( esc_html__('Title for %s (Service Category) List', 'liviza'), $service_cat_title_singular ),
			'default'  		=> esc_html__('Visa Categories', 'liviza'),
			'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>'. esc_html__('Title for Service Category list for group page. This will appear at left sidebar', 'liviza').'</div>',
		),
		array(
			'id'     		=> 'service_cat_title_singular',
			'type'    		=> 'text',
			'title'   		=> sprintf( esc_html__('Singular Title for %s (Service Category) List', 'liviza'), $service_cat_title_singular ),
			'default'  		=> esc_html__('Visa Category', 'liviza'),
			'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>'. esc_html__('Title for Service Category list for group page. This will appear at left sidebar', 'liviza').'</div>',
		),
		array(
			'id'     		=> 'service_cat_slug',
			'type'    		=> 'text',
			'title'   		=> sprintf( esc_html__('URL Slug for %s (Service Category) Link', 'liviza'), $service_cat_title_singular ),
			'default'  		=> esc_html__('visa-category', 'liviza'),
			'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>'. esc_html__('This will change the URL slug for Service Category link', 'liviza').'</div>',
		),
		array(
			'type'       	=> 'heading',
			'content'    	=> sprintf( esc_html__('Custom Post Type : %s (Team member) Settings', 'liviza'), $team_member_title_singular ),
			'after'  		=> '<small>'. esc_html__('Advanced settings for Team Member custom post type', 'liviza').'</small>',
		),
		array(
			'id'     		=> 'team_type_title',
			'type'    		=> 'text',
			'title'   		=> sprintf( esc_html__('Title for %s (Team Member) Post Type', 'liviza'), $team_member_title_singular ),
			'default'  		=> esc_html__('Team', 'liviza'),
			'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>'. esc_html__('This will change the Title for Team Member post type section', 'liviza').'</div>',
		),
		array(
			'id'     		=> 'team_type_title_singular',
			'type'    		=> 'text',
			'title'   		=> sprintf( esc_html__('Singular title for %s (Team Member) Post Type', 'liviza'), $team_member_title_singular ),
			'default'  		=> esc_html__('Team', 'liviza'),
			'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>'. esc_html__('This will change the Title for Team Member post type section. Only for singular title.', 'liviza').'</div>',
		),
		array(
			'id'     		=> 'team_type_slug',
			'type'    		=> 'text',
			'title'   		=> sprintf( esc_html__('URL Slug for %s (Team Member) Post Type', 'liviza'), $team_member_title_singular ),
			'default'  		=> esc_html__('team', 'liviza'),
			'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>'. esc_html__('This will change the URL slug for Team Member post type section', 'liviza').'</div>',
		),
		array(
			'id'     		=> 'team_group_title',
			'type'    		=> 'text',
			'title'   		=> sprintf( esc_html__('Title for %s (Team Group) List', 'liviza'), $team_group_title_singular ),
			'default'  		=> esc_html__('Team Groups', 'liviza'),
			'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>'. esc_html__('Title for Team Group list for group page. This will appear at left sidebar', 'liviza').'</div>',
		),
		array(
			'id'     		=> 'team_group_title_singular',
			'type'    		=> 'text',
			'title'   		=> sprintf( esc_html__('Singular Title for %s (Team Group) List', 'liviza'), $team_group_title_singular ),
			'default'  		=> esc_html__('Team Group', 'liviza'),
			'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>'. esc_html__('Title for Team Group list for group page. This will appear at left sidebar', 'liviza').'</div>',
		),
		array(
			'id'     		=> 'team_group_slug',
			'type'    		=> 'text',
			'title'   		=> sprintf( esc_html__('URL Slug for %s (Team Group) Link', 'liviza'), $team_group_title_singular ),
			'default'  		=> esc_html__('team-group', 'liviza'),
			'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>'. esc_html__('This will change the URL slug for Team Group link', 'liviza').'</div>',
		),
		array(
			'type'       	=> 'heading',
			'content'    	=> esc_html__('Minify Options', 'liviza'),
			'after'  		=> '<small>'. esc_html__('Options to minify html/JS/CSS files', 'liviza').'</small>',
		),
		array(
			'id'     		=> 'minify',
			'type'   		=> 'switcher',
			'title'   		=> esc_html__('Minify JS and CSS files', 'liviza'),
			'default' 		=> true,
			'label'  		=> '<div class="cs-text-muted cs-text-desc"><br>'. esc_html__('This will generate MIN version of all CSS and JS files. This will help you to lower the page load time. You can use this if the Theme Options are not working', 'liviza').'</div>',
        ),
		array(
			'type'       	=> 'heading',
			'content'    	=> esc_html__('Show or hide Demo Content Setup option', 'liviza'),
			'after'  		=> '<small>'. esc_html__('Show or hide "Demo Content Setup" option under "Layout Settings" tab', 'liviza').'</small>',
		),
		array(
			'id'     		=> 'hide_demo_content_option',
			'type'   		=> 'switcher',
			'title'   		=> esc_html__('Hide "Demo Content Setup" option', 'liviza'),
			'default' 		=> false,
			'label'  		=> '<div class="cs-text-muted cs-text-desc"><br>'. esc_html__('Show or hide "Demo Content Setup" option under "Layout Settings" tab', 'liviza').'</div>',
        ),
	)
);
// CSS/JS Code
$themestek_framework_options[] = array(
	'name'   => 'custom_code', // like ID
	'title'  => esc_html__('CSS/JS Code', 'liviza'),
	'icon'   => 'fa fa-gear',
	'fields' => array( // begin: fields
		// Custom Code
		array(
			'type'       	=> 'heading',
			'content'    	=> esc_html__('Custom CSS or JS Code', 'liviza'),
			'after'  		=> '<small>'. esc_html__('Add custom JS and CSS code', 'liviza').'</small>',
		),
		array(
			'id'       		 => 'custom_css_code',
			'type'     		 => 'textarea',
			'title'    		 =>  esc_html__('CSS Code', 'liviza'),
			'after'  		 => '<div class="cs-text-muted cs-text-desc"><br>'. esc_html__('Add custom CSS code here. This code will be appear at bottom of the dynamic css file so you can override any existing style', 'liviza').'</div>',
        ),
		array(
			'id'       => 'custom_js_code',
			'type'     => 'wysiwyg',
			'title'    => esc_html__('JS Code', 'liviza'),
			'settings' => array(
				'textarea_rows' => 5,
				'tinymce'       => false,
				'media_buttons' => false,
				'quicktags'     => false,
			),
			'after'    => '<div class="cs-text-muted cs-text-desc"><br>'. esc_html__('Paste your JS code here', 'liviza').'</div>',
		),
		array(
			'type'       	=> 'heading',
			'content'    	=> esc_html__('Custom html Code', 'liviza'),
			'after'  		=> '<small>'. sprintf(__('Custom html Code for different areas. You can paste <strong>Google Analytics</strong> or any tracking code here', 'liviza'),'<strong>', '</strong>').'</small>',
		),
		array(
			'id'       => 'customhtml_head',
			'type'     => 'wysiwyg',
			'title'    => esc_html__('Custom Code for &lt;head&gt; tag', 'liviza'),
			'settings' => array(
				'textarea_rows' => 5,
				'tinymce'       => false,
				'media_buttons' => false,
				'quicktags'     => false,
			),
			'after'    => '<div class="cs-text-muted cs-text-desc"><br>'. esc_html__('This code will appear in &lt;head&gt; tag. You can add your custom tracking code here', 'liviza').'</div>',
		),
		array(
			'id'       => 'customhtml_bodystart',
			'type'     => 'wysiwyg',
			'title'    => esc_html__('Custom Code after &lt;body&gt; tag', 'liviza'),
			'settings' => array(
				'textarea_rows' => 5,
				'tinymce'       => false,
				'media_buttons' => false,
				'quicktags'     => false,
			),
			'after'    => '<div class="cs-text-muted cs-text-desc"><br>'. esc_html__('HTML code only. This code will appear after &lt;body&gt; tag. You can add your custom tracking code here.', 'liviza').'</div>',
		),
		array(
			'id'       => 'customhtml_bodyend',
			'type'     => 'wysiwyg',
			'title'    => esc_html__('Custom Code before &lt;/body&gt; tag', 'liviza'),
			'settings' => array(
				'textarea_rows' => 5,
				'tinymce'       => false,
				'media_buttons' => false,
				'quicktags'     => false,
			),
			'after'    => '<div class="cs-text-muted cs-text-desc"><br>'. esc_html__('This code will appear before &lt;/body&gt; tag. You can add your custom tracking code here', 'liviza').'</div>',
		),
		array(
			'type'       	=> 'heading',
			'content'    	=> esc_html__('Custom Code for Login page', 'liviza'),
			'after'  		=> '<small>'. esc_html__('Custom Code for Login pLogin page only. This will effect only login page and not effect any other pages or admin section', 'liviza').'</small>',
		),
		array(
			'id'       		 => 'login_custom_css_code',
			'type'     		 => 'textarea',
			'title'    		 =>  esc_html__('CSS Code for Login Page', 'liviza'),
			'after'  		 => '<div class="cs-text-muted cs-text-desc"><br>'. esc_html__('Write your custom CSS code here', 'liviza').'</div>',
        ),
		array(
			'type'       	=> 'heading',
			'content'    	=> esc_html__('Advanced Custom CSS Code Option', 'liviza'),
		),
		array(
			'id'       		 => 'custom_css_code_top',
			'type'     		 => 'textarea',
			'title'    		 =>  esc_html__('CSS Code (at top of the file)', 'liviza'),
			'after'  		 => '<div class="cs-text-muted cs-text-desc"><br>'. esc_html__('Add custom CSS code here. This code will be appear at top of the css code. specially for "@import" style tag.', 'liviza').'</div>',
        ),
	)
);
// Backup
$themestek_framework_options[]   = array(
	'name'     => 'backup_section',
	'title'    => esc_html__('Backup / Restore', 'liviza'),
	'icon'   => 'fa fa-gear',
	'fields'   => array(
		array(
			'type'    => 'notice',
			'class'   => 'warning',
			'content' => esc_html__('You can save your current options. Download a Backup and Import', 'liviza'),
		),
		array(
			'type'    => 'backup',
		),
	)
);
