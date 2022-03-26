<?php if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access pages directly.
/**
 *  Meta Boxes
 */
$themestek_metabox_options = array();
/************************* Common Meta Boxes *****************************/
// Slier Area metabox options array
$slider_list_array = array();
$slider_list_array[''] = esc_html__('No Slider', 'liviza');
if ( class_exists( 'RevSlider' ) )    { $slider_list_array['revslider']   = esc_html__('Slider Revolution', 'liviza'); }
if ( function_exists('layerslider') ) { $slider_list_array['layerslider'] = esc_html__('Layer Slider', 'liviza'); }
$slider_list_array['custom']   = esc_html__('Custom Slider', 'liviza');
$themestek_metabox_slider_area = array(
	array(
		'id'      	=> 'slidertype',
		'type'   	=> 'radio',
		'title'		=> esc_html__('Select Slider Type', 'liviza'),
		'desc'    	=> '<div class="cs-text-muted">'.esc_html__('Select slider which you want to show on this page. The slider will appear in header area.', 'liviza').'</div>',
		'options'	=> $slider_list_array,
		'default' 	 => '',
	)
);
$themestek_metabox_slider_area[] = array(
	'id'      	 => 'revslider',
	'type'   	 => 'select',
	'title'		 => esc_html__('Select Slider', 'liviza'),
	'after'    	 => ( themestek_revslider_array(true)==0 ) ? '<div class="cs-text-muted"><div class="themestek-no-slider-message">'.esc_html__('No slider found. Plesae create slider from Slider Revolution section.', 'liviza') . '<br><a href="'. admin_url( 'admin.php?page=revslider' ) .'">' . esc_html__('Click here to go to Slider Revolution section and create your first slider or import demo slider.', 'liviza') . '</a></div></div>' : '<div class="cs-text-muted">'.esc_html__('Select slider created in Revolution Slider. The slider will appear in header area.', 'liviza').'</div>',
	'options' 	 => themestek_revslider_array(),
	'dependency' => array( 'slidertype_revslider', '==', 'true' ),
);
$themestek_metabox_slider_area[] = array(
	'id'      	 => 'layerslider',
	'type'   	 => 'select',
	'title'		 => esc_html__('Select Slider', 'liviza'),
	'after'    	 => ( themestek_layerslider_array(true)==0 ) ? '<div class="cs-text-muted"><div class="themestek-no-slider-message">'.esc_html__('No slider found. Plesae create slider from Layer Slider section.', 'liviza') . '<br><a href="'. admin_url( 'admin.php?page=layerslider' ) .'">' . esc_html__('Click here to go to Layer Slider section and create your first slider or import demo slider.', 'liviza') . '</a></div></div>' : '<div class="cs-text-muted">'.esc_html__('Select slider created in Layer Slider. The slider will appear in header area.', 'liviza').'</div>',
	'options' 	 => themestek_layerslider_array(),
	'dependency' => array( 'slidertype_layerslider', '==', 'true' ),
);
$themestek_metabox_slider_area[] = array(
	'id'       	 => 'customslider',
	'type'     	 => 'textarea',
	'title'    	 => esc_html__('Custom Slider code', 'liviza'),
	'shortcode'	 => true,
	'after'  	 => '<div class="cs-text-muted">'.esc_html__('You can paste custom slider shortcode or html code here. The output code will appear in header area.', 'liviza').'</div>',
	'dependency' => array( 'slidertype_custom', '==', 'true' ),// Multiple dependency
);
$themestek_metabox_slider_area[] = array(
	'id'         => 'slider_width',
	'type'       => 'select',
	'title'      => esc_html__('Boxed or Wide Slider', 'liviza'),
	'info'       => esc_html__('Select slider width.', 'liviza'),
	'options'    => array(
		'wide'      => esc_html__('Wide Slider', 'liviza'),
		'boxed'     => esc_html__('Boxed Slider', 'liviza'),
	),
	'default'    => 'wide',
	'dependency' => array( 'slidertype_', '!=', 'true' ),// Multiple dependency
);
$themestek_metabox_slider_area[] = array(
	'id'       	 => 'below_slider_code',
	'type'     	 => 'textarea',
	'title'    	 => esc_html__('Content Below Slider', 'liviza'),
	'shortcode'	 => true,
	'after'  	 => '<div class="cs-text-muted">'.esc_html__('This content will appear below slider. You can add shortcode or HTML code here.', 'liviza').'</div>',
	'dependency' => array( 'slidertype_', '!=', 'true' ),// Multiple dependency
);
// Background metabox options array
$themestek_metabox_background = array(
	array(
		'id'      => 'custom_background_switcher',
		'title'   => esc_html__('Custom Background', 'liviza'),
		'type'    => 'switcher',
		'default' => false,
		'label'   => '<div class="cs-text-muted">'.esc_html__('If you are using Visual Composer page builder and you are adding ROWs with white background color only than please set this YES. So the spacing between each ROW will be reduced and you can see decent spacing between each ROW.', 'liviza').'</div>',
	),
	array(
		'id'		 => 'custom_background',
		'type'		 => 'themestek_background',
		'title'		 => esc_html__('Body Background Properties', 'liviza'),
		'after'		 => '<div class="cs-text-muted">'.esc_html__('Set background for main body. This is for main outer body background. For "Boxed" layout only', 'liviza').'</div>',
		'dependency' => array( 'custom_background_switcher', '==', 'true' ),// Multiple dependency
	),
);
// Pre Header metabox options array
$themestek_metabox_topbar = array(
	array(
		'id'      => 'show_topbar',
		'type'    => 'select',
		'title'   => esc_html__('Show Pre Header', 'liviza'),
		'info'    => esc_html__('For this page only.', 'liviza'),
		'options' => array(
			''      => esc_html__('Global', 'liviza'),
			'yes'   => esc_html__('Yes, show Pre Header', 'liviza'),
			'no'    => esc_html__('No, hide Pre Header', 'liviza'),
		),
		'default' => '',
	),
	array(
		'id'     	 => 'topbar_bg_color',
		'type'   	 => 'select',
		'title'  	 => esc_html__('Background Color', 'liviza'),
		'info'   	 => esc_html__('Please select color for background', 'liviza'),
		'options' 	 => array(
			''           => esc_html__('Global', 'liviza'),
			'darkgrey'   => esc_html__('Dark grey', 'liviza'),
			'grey'       => esc_html__('Grey', 'liviza'),
			'white'      => esc_html__('White', 'liviza'),
			'skincolor'  => esc_html__('Skincolor', 'liviza'),
			'custom'     => esc_html__('Custom Color', 'liviza'),
		),
		'default'	 => '',
		'dependency' => array( 'show_topbar', '!=', 'no' ),// Multiple dependency
	),
	array(
		'id'		 => 'topbar_bg_custom_color',
		'type'		 => 'color_picker',
		'title'		 => esc_html__('Select Background Color', 'liviza'),
		'default'	 => '#dd3333',
		'dependency' => array( 'show_topbar|topbar_bg_color', '!=|==', 'no|custom' ),
	),
	array(
		'id'		 => 'topbar_text_color',
		'type'		 => 'select',
		'title'		 => esc_html__('Text Color', 'liviza'),
		'info'		 => esc_html__('Select <code>Dark</code> color if you are going to select light color in above option.', 'liviza'),
		'options'	 => array(
			''          => esc_html__('Global', 'liviza'),
			'white'     => esc_html__('White', 'liviza'),
			'dark'      => esc_html__('Dark', 'liviza'),
			'skincolor' => esc_html__('Skin Color', 'liviza'),
			'custom'    => esc_html__('Custom color', 'liviza'),
		),
		'default' 	 => esc_html__('Global', 'liviza'),
		'dependency' => array( 'show_topbar', '!=', 'no' ),// Multiple dependency
	),
	array(
		'id'         => 'topbar_text_custom_color',
		'type'       => 'color_picker',
		'title'      => esc_html__('Custom Text Color', 'liviza' ),
		'default'    => 'rgba(0, 0, 255, 0.25)',
		'dependency' => array( 'show_topbar|topbar_text_color', '!=|==', 'no|custom' ),//Multiple dependency
		'after'      => '<div class="cs-text-muted">'.esc_html__('Please select custom color for text', 'liviza').'</div>',
	),
	array(
		'id'       	 => 'topbar_left_text',
		'type'     	 => 'textarea',
		'title'    	 =>  esc_html__('Pre Header Left Content (overwrite default text)', 'liviza'),
		'shortcode'	 => true,
		'after'  	 => '<div class="cs-text-muted">'.esc_html__('Add content for Pre Header text for left area. This will overwrite default text set in Theme Options', 'liviza').'</div>',
		'dependency' => array( 'show_topbar', '!=', 'no' ),// Multiple dependency
	),
	array(
		'id'         => 'topbar_right_text',
		'type'       => 'textarea',
		'title'      =>  esc_html__('Pre Header Right Content (overwrite default text)', 'liviza'),
		'shortcode'  => true,
		'after'      => '<div class="cs-text-muted">'.esc_html__('Add content for Pre Header text for right area. This will overwrite default text set in Theme Options', 'liviza').'</div>',
		'dependency' => array( 'show_topbar', '!=', 'no' ),// Multiple dependency
	),
);
// Titlebar metabox options array
$themestek_metabox_titlebar = array(
	array(
		'id'       			=> 'hide_titlebar',
		'type'      		=> 'checkbox',
		'title'         	=> esc_html__('Hide Titlebar', 'liviza'),
		'label'		        =>  esc_html__( 'YES, Hide the Titlebar', 'liviza' ),
		'after'   			=> '<div class="cs-text-muted">'.esc_html__('If you want to hide Titlebar than check this option', 'liviza').'</div>',
	),
	array(
		'id'		   		=> 'title',
		'type'     			=> 'textarea',
		'title'    		 	=>  esc_html__('Page Title', 'liviza'),
		'after'  		 	=> '<div class="cs-text-muted">'.esc_html__('(Optional) Replace current page title with this title. So Search results will show the original page title and the page will show this title', 'liviza').'</div>',
		'dependency'        => array( 'hide_titlebar', '!=', true ),//Multiple dependency
	),
	array(
		'id'		   		=> 'subtitle',
		'type'     			=> 'textarea',
		'title'    		 	=>  esc_html__('Page Subtitle', 'liviza'),
		'after'  		 	=> '<div class="cs-text-muted">'.esc_html__('(Optional) Please fill page subtitle', 'liviza').'</div>',
		'dependency'        => array( 'hide_titlebar', '!=', true ),//Multiple dependency
	),
	array(
		'type'       	 => 'heading',
		'content'    	 => esc_html__('Titlebar Background Options', 'liviza'),
		'after'  	  	 => '<small>'.esc_html__('Background options for Titlebar area', 'liviza').'</small>',
		'dependency'     => array( 'hide_titlebar', '!=', true ),//Multiple dependency
	),
	array(
		'id'		 => 'titlebar_bg_custom_options',
		'type'		 => 'select',
		'title'		 =>  esc_html__('Titlebar Background Options', 'liviza'),
		'options'	 => array(
			''       	=> esc_html__('Use global settings', 'liviza'),
			'custom' 	=> esc_html__('Set custom settings', 'liviza'),
		),
		'default'	 => '',
		'after'		 => '<div class="cs-text-muted"><br>'.esc_html__('Select predefined color for Titlebar background color', 'liviza').'</div>',
		'dependency' => array( 'hide_titlebar', '!=', true ),//Multiple dependency
	),
	array(
		'id'            => 'titlebar_bg_color',
		'type'          => 'select',
		'title'         =>  esc_html__('Titlebar Background Color', 'liviza'),
		'options'  => array(
			''           => esc_html__('Global', 'liviza'),
			'darkgrey'   => esc_html__('Dark grey', 'liviza'),
			'grey'       => esc_html__('Grey', 'liviza'),
			'white'      => esc_html__('White', 'liviza'),
			'skincolor'  => esc_html__('Skincolor', 'liviza'),
			'custom'     => esc_html__('Custom Color', 'liviza'),
		),
		'default'       => '',
		'after'  		=> '<div class="cs-text-muted"><br>'.esc_html__('Select predefined color for Titlebar background color', 'liviza').'</div>',
		'dependency'    => array( 'hide_titlebar|titlebar_bg_custom_options', '!=|!=', ''.true|'custom' ),//Multiple dependency
	),
	array(
		'id'      		=> 'titlebar_background',
		'type'    		=> 'themestek_background',
		'title'  		=> esc_html__('Titlebar Background Properties', 'liviza' ),
		'after'  		=> '<div class="cs-text-muted"><br>'.esc_html__('Set background for Title bar. You can set color or image and also set other background related properties', 'liviza').'</div>',
		'color'			=> true,
		'dependency'   => array( 'hide_titlebar|titlebar_bg_custom_options', '!=|!=', ''.true|'custom' ),// Multiple dependency
	),
	array(
		'type'       	 => 'heading',
		'content'    	 => esc_html__('Titlebar Font Settings', 'liviza'),
		'after'  	  	 => '<small>'.esc_html__('Font Settings for different elements in Titlebar area', 'liviza').'</small>',
		'dependency'     => array( 'hide_titlebar', '!=', true ),// Multiple dependency
	),
	array(
		'id'            => 'titlebar_font_custom_options',
		'type'          => 'select',
		'title'         =>  esc_html__('Titlebar Font Options', 'liviza'),
		'options'  => array(
						''       => esc_html__('Use global settings', 'liviza'),
						'custom' => esc_html__('Set custom settings', 'liviza'),
		),
		'default'       => '',
		'after'  		=> '<div class="cs-text-muted"><br>'.esc_html__('Select "Ude global settings" to load global font settings.', 'liviza').'</div>',
		'dependency'    => array( 'hide_titlebar', '!=', true ),// Multiple dependency
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
		'default'       => '',
		'after'  		=> '<div class="cs-text-muted"><br>'.esc_html__('Select <code>Dark</code> color if you are going to select light color in above option', 'liviza').'</div>',
		'dependency'=> array( 'hide_titlebar|titlebar_font_custom_options', '!=|!=', ''.true|'custom' ),// Multiple dependency
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
		'letter-spacing' => true, // Defaults to false
		'color'          => true,
		'all-varients'   => false,
		'units'       => 'px', // Defaults to px
		'default'     => array(
			"family"      => "Arimo",
			"font"        => "google",  // "google" OR "websafe"
			"font-backup" => "'Trebuchet MS', Helvetica, sans-serif",
			"font-weight" => "400",
			"font-size"   => "14",
			"line-height" => "16",
			"color"       => "#202020"
		),
		'after'  	=> '<div class="cs-text-muted"><br>'.esc_html__('Select font family, size etc. for heading in Titlebar', 'liviza').'</div>',
		'dependency'=> array( 'hide_titlebar|titlebar_font_custom_options', '!=|!=', ''.true|'custom' ),// Multiple dependency
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
		'letter-spacing' => true, // Defaults to false
		'color'          => true,
		'all-varients'   => false,
		'units'       => 'px', // Defaults to px
		'default'     => array(
			"family"      => "Arimo",
			"font"        => "google",  // "google" OR "websafe"
			"font-backup" => "'Trebuchet MS', Helvetica, sans-serif",
			"font-weight" => "400",
			"font-size"   => "14",
			"line-height" => "16",
			"color"       => "#202020"
		),
		'after'  	=> '<div class="cs-text-muted"><br>'.esc_html__('Select font family, size etc. for sub-heading in Titlebar', 'liviza').'</div>',
		'dependency'=> array( 'hide_titlebar|titlebar_font_custom_options', '!=|!=', ''.true|'custom' ),// Multiple dependency
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
		'letter-spacing' => true, // Defaults to false
		'color'          => true,
		'all-varients'   => false,
		'units'       => 'px', // Defaults to px
		'default'     => array(
			"family"      => "Arimo",
			"font"        => "google",  // "google" OR "websafe"
			"font-backup" => "'Trebuchet MS', Helvetica, sans-serif",
			"font-weight" => "400",
			"font-size"   => "14",
			"line-height" => "16",
			"color"       => "#202020"
		),
		'after'  	=> '<div class="cs-text-muted"><br>'.esc_html__('Select font family, size etc. for breadcrumbs in Titlebar', 'liviza').'</div>',
		'dependency'=> array( 'hide_titlebar|titlebar_font_custom_options', '!=|!=', ''.true|'custom' ),// Multiple dependency
	),
	array(
		'type'       	 => 'heading',
		'content'    	 => esc_html__('Titlebar Content Options', 'liviza'),
		'after'  	  	 => '<small>'.esc_html__('Content options for Titlebar area', 'liviza').'</small>',
		'dependency'     => array( 'hide_titlebar', '!=', true ),//Multiple dependency
	),
	array(
		'id'            	=> 'titlebar_view',
		'type'          	=> 'select',
		'title'         	=>  esc_html__('Titlebar Text Align', 'liviza'),
		'options'       	=> array (
						''         => esc_html__('Global', 'liviza'),
						'default'  => esc_html__('All Center', 'liviza'),
						'left'     => esc_html__('Title Left / Breadcrumb Right', 'liviza'),
						'right'    => esc_html__('Title Right / Breadcrumb Left', 	'liviza'),
						'allleft'  => esc_html__('All Left', 'liviza'),
						'allright' => esc_html__('All Right', 'liviza'),
		),
		'default'	 => '',
		'after'  			=> '<div class="cs-text-muted">'.esc_html__('Select text align in Titlebar', 'liviza').'</div>',
		'dependency' => array( 'hide_titlebar', '!=', true ),//Multiple dependency
	),
	array(
		'id'     		 => 'titlebar_height',
		'type'   		 => 'number',
		'title'          => esc_html__( 'Titlebar Height', 'liviza' ),
		'after'  	  	 => '<div class="cs-text-muted"><br>'.esc_html__('Set height of the Titlebar. In pixel only', 'liviza').'</div>',
		'default'		 => '',
		'after'   		 => ' px',
		'dependency'     => array( 'hide_titlebar', '!=', true ),//Multiple dependency
	),
	array(
		'id'            => 'titlebar_hide_breadcrumb',
		'type'          => 'select',
		'title'         =>  esc_html__('Hide Breadcrumb', 'liviza'),
		'options'  => array(
						''     => esc_html__('Global', 'liviza'),
						'no'   => esc_html__('NO, show the breadcrumb', 'liviza'),
						'yes'  => esc_html__('YES, Hide the Breadcrumb', 'liviza'),
		),
		'default'       => '',
		'after'  		=> '<div class="cs-text-muted"><br>'.esc_html__('You can show or hide the breadcrumb', 'liviza').'</div>',
		'dependency'    => array( 'hide_titlebar', '!=', true ),//Multiple dependency
	),
);
// Other Options
$themestek_other_options =  array(
	array(
		'id'     		 	=> 'skincolor',
		'type'   		 	=> 'color_picker',
		'title'  		 	=> esc_html__('Skin Color', 'liviza' ),
		'after'  		 	=> '<div class="cs-text-muted">'.esc_html__('Select Skin Color for this page only. This will override Skin color set under "Theme Options" section. ', 'liviza').'<br><br> <strong>' . esc_html__( 'NOTE: ' ,'liviza') . '</strong> ' . esc_html__( 'Leave this empty to use "Skin Color" set in the "Theme Options" directly. ' ,'liviza') . '</div>',
	),
);
/**** Metabox options - Sidebar ****/
// Getting custom sidebars 
$all_sidebars = themestek_get_all_registered_sidebars();
$themestek_metabox_sidebar = array(
	array(
		'id'       => 'sidebar',
		'title'    => esc_html__('Select Sidebar Position', 'liviza'),
		'type'     => 'image_select',
		'options'  => array(
			''          => get_template_directory_uri() . '/includes/images/layout_default.png',
			'no'        => get_template_directory_uri() . '/includes/images/layout_no_side.png',
			'left'      => get_template_directory_uri() . '/includes/images/layout_left.png',
			'right'     => get_template_directory_uri() . '/includes/images/layout_right.png',
			'both'      => get_template_directory_uri() . '/includes/images/layout_both.png',
			'bothleft'  => get_template_directory_uri() . '/includes/images/layout_left_both.png',
			'bothright' => get_template_directory_uri() . '/includes/images/layout_right_both.png',
		),
		'default'  => '',
	),
	array(
		'id'      => 'left_sidebar',
		'type'    => 'select',
		'title'   => esc_html__('Select Left Sidebar', 'liviza'),
		'options' => $all_sidebars,
		'default' => '',
	),
	array(
		'id'      => 'right_sidebar',
		'type'    => 'select',
		'title'   => esc_html__('Select Right Sidebar', 'liviza'),
		'options' => $all_sidebars,
		'default' => '',
	),
);
// Getting name of CPT from Theme Options
$liviza_theme_options	  = get_option('liviza_theme_options');
$pf_type_title_singular       = ( !empty($liviza_theme_options['pf_type_title_singular']) ) ? $liviza_theme_options['pf_type_title_singular'] : esc_html__('Portfolio', 'liviza') ;
$service_type_title_singular  = ( !empty($liviza_theme_options['service_type_title_singular']) ) ? $liviza_theme_options['service_type_title_singular'] : esc_html__('Service', 'liviza') ;
$team_type_title_singular     = ( !empty($liviza_theme_options['team_type_title_singular']) ) ? $liviza_theme_options['team_type_title_singular'] : esc_html__('Team Member', 'liviza') ;
$ch_type_title_singular       = ( !empty($liviza_theme_options['ch_type_title_singular']) ) ? $liviza_theme_options['ch_type_title_singular'] : esc_html__('Coaching', 'liviza') ;

// CPT list
$themestek_cpt_list = array(
	'page'					=> esc_html__('Page', 'liviza'),
	'post'					=> esc_html__('Post', 'liviza'),
	'themestek-portfolio'   => esc_html($pf_type_title_singular),
	'themestek-coaching'	=> esc_html($ch_type_title_singular),
	'themestek-service'     => esc_html($service_type_title_singular),
	'themestek-team'		=> esc_html($team_type_title_singular),
	'themestek-reviews'		=> esc_html__('Testimonials', 'liviza'),
);
// Foreach loop
foreach( $themestek_cpt_list as $cpt_id=>$cpt_name ){
	$themestek_metabox_options[] = array(
		'id'        => '_themestek_metabox_group',
		'title'     => sprintf( esc_html__('Liviza - %s Single view Elements Options', 'liviza'), $cpt_name ),
		'post_type' => $cpt_id,
		'context'   => 'normal',
		'priority'  => 'default',
		'sections'  => array(
			array(
				'name'   => '_themestek_slider_area_options',
				'title'  => esc_html__('Header Slider Options', 'liviza'),
				'icon'   => 'fa fa-picture-o',
				'fields' => $themestek_metabox_slider_area,
			),
			array(
				'name'   => '_themestek_background_options',
				'title'  => esc_html__(' Background Options', 'liviza'),
				'icon'   => 'fa fa-paint-brush',
				'fields' => $themestek_metabox_background,
			),
			array(
				'name'   => '_themestek_page_topbar_options',
				'title'  => esc_html__('Pre Header Options', 'liviza'),
				'icon'   => 'fa fa-tasks',
				'fields' => $themestek_metabox_topbar,
			),
			array(
				'name'   => '_themestek_titlebar_options',
				'title'  => esc_html__('Titlebar Options', 'liviza'),
				'icon'   => 'fa fa-align-justify',
				'fields' => $themestek_metabox_titlebar,
			),
			array(
				'name'   => '_themestek_page_customize',
				'title'  => esc_html__('Other Options', 'liviza'),
				'icon'   => 'fa fa-cog',
				'fields' => $themestek_other_options,
			),
		),
	);
	/**
	 *  CPT - Sidebar
	 */
	$themestek_metabox_options[]    = array(
		'id'        => '_themestek_metabox_sidebar',
		'title'     => esc_html__('Liviza - Sidebar Options', 'liviza'),
		'post_type' => $cpt_id,
		'context'   => 'side',
		'priority'  => 'default',
		'sections'  => array(
			array(
				'name'   => 'themestek_sidebar_options',
				'fields' => $themestek_metabox_sidebar,
			),
		),
	);
	$themestek_metabox_options[]    = array(
		'id'        => 'themestek_page_row_settings',
		'title'     => esc_html__('Liviza - Content ROW settings', 'liviza'),
		'post_type' => $cpt_id,
		'context'   => 'side',
		'priority'  => 'default',
		'sections'  => array(
			array(
				'name'   => 'themestek_content_row_settings',
				'fields' => array(
					array(
						'id'      => 'row_lower_padding',
						'title'   => esc_html__('Lower ROW Spacing', 'liviza'),
						'type'    => 'switcher',
						'default' => false,
						'label'   => '<div class="cs-text-muted">'.esc_html__('If you are using Visual Composer page builder and you are adding ROWs with white background color only than please set this YES. So the spacing between each ROW will be reduced and you can see decent spacing between each ROW.', 'liviza').'</div>',
					)
				)
			)
		)
	);
} // foreach
/* Blog Post Format - Gallery meta box */
$themestek_metabox_options[] = array(
	'id'        => '_themestek_metabox_gallery',
	'title'     => esc_html__('Liviza - Gallery Images', 'liviza'),
	'post_type' => 'post',
	'context'   => 'normal',
	'priority'  => 'default',
	'sections'  => array(
		array(
			'name'   => 'themestek_metabox_gallery_sections',
			'fields' => array(
				array(
					'id'          => 'gallery_images',
					//'debug'       => true,
					'type'        => 'gallery',
					'title'       => esc_html__('Slider Images', 'liviza'),
					'add_title'   => esc_html__('Add Images', 'liviza'),
					'edit_title'  => esc_html__('Edit Gallery', 'liviza'),
					'clear_title' => esc_html__('Remove Gallery', 'liviza'),
					'after'       => '<br><div class="cs-text-muted">'.esc_html__('Select images for gallery. Click on "Edit Gallery" button to add images, order images or remove images in gallery.', 'liviza').'</div>',
				),
			)
		)
	),
);
/* Service - icon */
$themestek_metabox_options[] = array(
	'id'        => '_themestek_metabox_service_icon',
	'title'     => esc_html__('Liviza - Service Icon ', 'liviza'),
	'post_type' => 'themestek-service',
	'context'   => 'normal',
	'priority'  => 'default',
	'sections'  => array(
		array(
			'name'   => 'themestek_metabox_service_icon',
			'fields' => array(
				array(
					'id'      => 'service_icon',
					'type'    => 'themestek_iconpicker',
					'title'  		=> esc_html__('Service Icon', 'liviza' ),
					'default' => array(
						'library'             => 'fontawesome',
						'library_fontawesome' => 'fa fa-map-marker',
					),
					'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>' . sprintf( esc_html__('Select icon for the this single %s', 'liviza'), $service_type_title_singular ) . '</div>',
				),
			)
		)
	),
);
/* Coaching - icon */
$themestek_metabox_options[] = array(
	'id'        => '_themestek_metabox_coaching_icon',
	'title'     => sprintf( esc_html__('Liviza - %1$s Icon ', 'liviza'), $ch_type_title_singular ),
	'post_type' => 'themestek-coaching',
	'context'   => 'normal',
	'priority'  => 'default',
	'sections'  => array(
		array(
			'name'   => 'themestek_metabox_coaching_icon',
			'fields' => array(
				array(
					'id'      => 'coaching_icon',
					'type'    => 'themestek_iconpicker',
					'title'  		=> sprintf( esc_html__('%1$s Icon', 'liviza' ), $ch_type_title_singular ),
					'default' => array(
						'library'             => 'fontawesome',
						'library_fontawesome' => 'fa fa-map-marker',
					),
					'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>' . sprintf( esc_html__('Select icon for the this single %s', 'liviza'), $ch_type_title_singular ) . '</div>',
				),
			)
		)
	),
);
