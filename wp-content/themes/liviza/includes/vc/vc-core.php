<?php
/**
 * Force Visual Composer to initialize as "built into the theme". This will hide certain tabs under the Settings->Visual Composer page
 */
add_action( 'vc_before_init', 'themestek_vcSetAsTheme' );
function themestek_vcSetAsTheme() {
	vc_set_as_theme();
	if( function_exists('vc_set_default_editor_post_types') ){
		vc_set_default_editor_post_types(array('page', 'themestek-portfolio', 'themestek-service', 'themestek-team', 'themestek-coaching'));
	}
}
/** ------------------------------------------------------ **/
/**                  Shared Library start                  **/
class themestek_VcSharedLibrary {
	// Here we will store plugin wise (shared) settings. Colors, Locations, Sizes, etc...
	/**
	 * @var array
	 */
	public static $colors = array(
		'[Skin Color]' => 'skincolor',
		'Blue' => 'blue',
		'Turquoise' => 'turquoise',
		'Pink' => 'pink',
		'Violet' => 'violet',
		'Peacoc' => 'peacoc',
		'Chino' => 'chino',
		'Mulled Wine' => 'mulled_wine',
		'Vista Blue' => 'vista_blue',
		'Black' => 'black',
		'Grey' => 'grey',
		'Orange' => 'orange',
		'Sky' => 'sky',
		'Green' => 'green',
		'Juicy pink' => 'juicy_pink',
		'Sandy brown' => 'sandy_brown',
		'Purple' => 'purple',
		'White' => 'white'
	);
	/**
	 * @var array
	 */
	public static $predefined_text_colors = array(
		'Grey'       => 'grey',
		'Dark Grey'  => 'darkgrey',
		'White'      => 'white',
		'Skin Color' => 'skincolor'
	);
	/**
	 * @var array
	 */
	public static $predefined_bg_colors = array(
		'Grey'       => 'grey',
		'Dark Grey'  => 'darkgrey',
		'White'      => 'white',
		'Skin Color' => 'skincolor'
	);
	/**
	 * @var array
	 */
	public static $icons = array(
		'Glass' => 'glass',
		'Music' => 'music',
		'Search' => 'search'
	);
	/**
	 * @var array
	 */
	public static $sizes = array(
		'Mini' => 'xs',
		'Small' => 'sm',
		'Normal' => 'md',
		'Large' => 'lg'
	);
	/**
	 * @var array
	 */
	public static $button_styles = array(
		'Rounded' => 'rounded',
		'Square' => 'square',
		'Round' => 'round',
		'Outlined' => 'outlined',
		'3D' => '3d',
		'Square Outlined' => 'square_outlined'
	);
	/**
	 * @var array
	 */
	public static $message_box_styles = array(
		'Standard' => 'standard',
		'Solid' => 'solid',
		'Solid icon' => 'solid-icon',
		'Outline' => 'outline',
		'3D' => '3d',
	);
	/**
	 * Toggle styles
	 * @var array
	 */
	public static $toggle_styles = array(
		'Default' => 'default',
		'Simple' => 'simple',
		'Round' => 'round',
		'Round Outline' => 'round_outline',
		'Rounded' => 'rounded',
		'Rounded Outline' => 'rounded_outline',
		'Square' => 'square',
		'Square Outline' => 'square_outline',
		'Arrow' => 'arrow',
		'Text Only' => 'text_only',
	);
	/**
	 * Animation styles
	 * @var array
	 */
	public static $animation_styles = array(
		'Bounce' => 'easeOutBounce',
		'Elastic' => 'easeOutElastic',
		'Back' => 'easeOutBack',
		'Cubic' => 'easeinOutCubic',
		'Quint' => 'easeinOutQuint',
		'Quart' => 'easeOutQuart',
		'Quad' => 'easeinQuad',
		'Sine' => 'easeOutSine'
	);
	/**
	 * @var array
	 */
	public static $cta_styles = array(
		'Rounded' => 'rounded',
		'Square' => 'square',
		'Round' => 'round',
		'Outlined' => 'outlined',
		'Square Outlined' => 'square_outlined'
	);
	/**
	 * @var array
	 */
	public static $txt_align = array(
		'Left' => 'left',
		'Right' => 'right',
		'Center' => 'center',
		'Justify' => 'justify'
	);
	/**
	 * @var array
	 */
	public static $el_widths = array(
		'100%' => '',
		'90%' => '90',
		'80%' => '80',
		'70%' => '70',
		'60%' => '60',
		'50%' => '50',
		'40%' => '40',
		'30%' => '30',
		'20%' => '20',
		'10%' => '10'
	);
	/**
	 * @var array
	 */
	public static $sep_widths = array(
		'1px' => '',
		'2px' => '2',
		'3px' => '3',
		'4px' => '4',
		'5px' => '5',
		'6px' => '6',
		'7px' => '7',
		'8px' => '8',
		'9px' => '9',
		'10px' => '10'
	);
	/**
	 * @var array
	 */
	public static $sep_styles = array(
		'Border' => '',
		'Dashed' => 'dashed',
		'Dotted' => 'dotted',
		'Double' => 'double',
		'Shadow' => 'shadow'
	);
	/**
	 * @var array
	 */
	public static $box_styles = array(
		'Default' => '',
		'Rounded' => 'vc_box_rounded',
		'Border' => 'vc_box_border',
		'Outline' => 'vc_box_outline',
		'Shadow' => 'vc_box_shadow',
		'Bordered shadow' => 'vc_box_shadow_border',
		'3D Shadow' => 'vc_box_shadow_3d'
	);
	/**
	 * Round box styles
	 *
	 * @var array
	 */
	public static $round_box_styles = array(
		'Round' => 'vc_box_circle',
		'Round Border' => 'vc_box_border_circle',
		'Round Outline' => 'vc_box_outline_circle',
		'Round Shadow' => 'vc_box_shadow_circle',
		'Round Border Shadow' => 'vc_box_shadow_border_circle'
	);
	/**
	 * Circle box styles
	 *
	 * @var array
	 */
	public static $circle_box_styles = array(
		'Circle' => 'vc_box_circle_2',
		'Circle Border' => 'vc_box_border_circle_2',
		'Circle Outline' => 'vc_box_outline_circle_2',
		'Circle Shadow' => 'vc_box_shadow_circle_2',
		'Circle Border Shadow' => 'vc_box_shadow_border_circle_2'
	);
	/**
	 * @return array
	 */
	public static function themestek_getColors() {
		return self::$colors;
	}
	/**
	 * @return array
	 */
	public static function themestek_getPreTextColors() {
		return self::$predefined_text_colors;
	}
	/**
	 * @return array
	 */
	public static function themestek_getPreBgColors() {
		return self::$predefined_bg_colors;
	}
	/**
	 * @return array
	 */
	public static function themestek_getIcons() {
		return self::$icons;
	}
	/**
	 * @return array
	 */
	public static function themestek_getSizes() {
		return self::$sizes;
	}
	/**
	 * @return array
	 */
	public static function themestek_getButtonStyles() {
		return self::$button_styles;
	}
	/**
	 * @return array
	 */
	public static function themestek_getMessageBoxStyles() {
		return self::$message_box_styles;
	}
	/**
	 * @return array
	 */
	public static function themestek_getToggleStyles() {
		return self::$toggle_styles;
	}
	/**
	 * @return array
	 */
	public static function themestek_getAnimationStyles() {
		return self::$animation_styles;
	}
	/**
	 * @return array
	 */
	public static function themestek_getCtaStyles() {
		return self::$cta_styles;
	}
	/**
	 * @return array
	 */
	public static function themestek_getTextAlign() {
		return self::$txt_align;
	}
	/**
	 * @return array
	 */
	public static function themestek_getBorderWidths() {
		return self::$sep_widths;
	}
	/**
	 * @return array
	 */
	public static function themestek_getElementWidths() {
		return self::$el_widths;
	}
	/**
	 * @return array
	 */
	public static function themestek_getSeparatorStyles() {
		return self::$sep_styles;
	}
	/**
	 * Get list of box styles
	 *
	 * Possible $groups values:
	 * - default
	 * - round
	 * - circle
	 *
	 * @param array $groups Array of groups to include. If not specified, return all
	 *
	 * @return array
	 */
	public static function themestek_getBoxStyles( $groups = array() ) {
		$list = array();
		$groups = (array) $groups;
		if ( ! $groups || in_array( 'default', $groups ) ) {
			$list += self::$box_styles;
		}
		if ( ! $groups || in_array( 'round', $groups ) ) {
			$list += self::$round_box_styles;
		}
		if ( ! $groups || in_array( 'cirlce', $groups ) ) {
			$list += self::$circle_box_styles;
		}
		return $list;
	}
	public static function themestek_getColorsDashed() {
		$colors = array(
			esc_html__( '[Skin Color]', 'liviza' ) => 'skincolor',
			esc_html__( 'Blue', 'liviza' ) => 'blue',
			esc_html__( 'Turquoise', 'liviza' ) => 'turquoise',
			esc_html__( 'Pink', 'liviza' ) => 'pink',
			esc_html__( 'Violet', 'liviza' ) => 'violet',
			esc_html__( 'Peacoc', 'liviza' ) => 'peacoc',
			esc_html__( 'Chino', 'liviza' ) => 'chino',
			esc_html__( 'Mulled Wine', 'liviza' ) => 'mulled-wine',
			esc_html__( 'Vista Blue', 'liviza' ) => 'vista-blue',
			esc_html__( 'Black', 'liviza' ) => 'black',
			esc_html__( 'Grey', 'liviza' ) => 'grey',
			esc_html__( 'Orange', 'liviza' ) => 'orange',
			esc_html__( 'Sky', 'liviza' ) => 'sky',
			esc_html__( 'Green', 'liviza' ) => 'green',
			esc_html__( 'Juicy pink', 'liviza' ) => 'juicy-pink',
			esc_html__( 'Sandy brown', 'liviza' ) => 'sandy-brown',
			esc_html__( 'Purple', 'liviza' ) => 'purple',
			esc_html__( 'White', 'liviza' ) => 'white'
		);
		return $colors;
	}
}
/**
 * @param string $asset
 *
 * @return array
 */
function themestek_vc_get_shared( $asset = '' ) {
	switch ( $asset ) {
		case 'colors':
			return themestek_VcSharedLibrary::themestek_getColors();
			break;
		case 'pre-text-colors':
			return themestek_VcSharedLibrary::themestek_getPreTextColors();
		case 'pre-bg-colors':
			return themestek_VcSharedLibrary::themestek_getPreBgColors();
		case 'colors-dashed':
			return themestek_VcSharedLibrary::themestek_getColorsDashed();
			break;
		case 'icons':
			return themestek_VcSharedLibrary::themestek_getIcons();
			break;
		case 'sizes':
			return themestek_VcSharedLibrary::themestek_getSizes();
			break;
		case 'button styles':
		case 'alert styles':
			return themestek_VcSharedLibrary::themestek_getButtonStyles();
			break;
		case 'message_box_styles':
			return themestek_VcSharedLibrary::themestek_getMessageBoxStyles();
			break;
		case 'cta styles':
			return themestek_VcSharedLibrary::themestek_getCtaStyles();
			break;
		case 'text align':
			return themestek_VcSharedLibrary::themestek_getTextAlign();
			break;
		case 'cta widths':
		case 'separator widths':
			return themestek_VcSharedLibrary::themestek_getElementWidths();
			break;
		case 'separator styles':
			return themestek_VcSharedLibrary::themestek_getSeparatorStyles();
			break;
		case 'separator border widths':
			return themestek_VcSharedLibrary::themestek_getBorderWidths();
			break;
		case 'single image styles':
			return themestek_VcSharedLibrary::themestek_getBoxStyles();
			break;
		case 'single image external styles':
			return themestek_VcSharedLibrary::themestek_getBoxStyles( array( 'default', 'round' ) );
			break;
		case 'toggle styles':
			return themestek_VcSharedLibrary::themestek_getToggleStyles();
			break;
		case 'animation styles':
			return themestek_VcSharedLibrary::themestek_getAnimationStyles();
			break;
		default:
			# code...
			break;
	}
	return '';
}
global $themestek_pixel_icons;
$themestek_pixel_icons = array(
	array( 'vc_pixel_icon vc_pixel_icon-alert' => esc_html__( 'Alert', 'liviza' ) ),
	array( 'vc_pixel_icon vc_pixel_icon-info' => esc_html__( 'Info', 'liviza' ) ),
	array( 'vc_pixel_icon vc_pixel_icon-tick' => esc_html__( 'Tick', 'liviza' ) ),
	array( 'vc_pixel_icon vc_pixel_icon-explanation' => esc_html__( 'Explanation', 'liviza' ) ),
	array( 'vc_pixel_icon vc_pixel_icon-address_book' => esc_html__( 'Address book', 'liviza' ) ),
	array( 'vc_pixel_icon vc_pixel_icon-alarm_clock' => esc_html__( 'Alarm clock', 'liviza' ) ),
	array( 'vc_pixel_icon vc_pixel_icon-anchor' => esc_html__( 'Anchor', 'liviza' ) ),
	array( 'vc_pixel_icon vc_pixel_icon-application_image' => esc_html__( 'Application Image', 'liviza' ) ),
	array( 'vc_pixel_icon vc_pixel_icon-arrow' => esc_html__( 'Arrow', 'liviza' ) ),
	array( 'vc_pixel_icon vc_pixel_icon-asterisk' => esc_html__( 'Asterisk', 'liviza' ) ),
	array( 'vc_pixel_icon vc_pixel_icon-hammer' => esc_html__( 'Hammer', 'liviza' ) ),
	array( 'vc_pixel_icon vc_pixel_icon-balloon' => esc_html__( 'Balloon', 'liviza' ) ),
	array( 'vc_pixel_icon vc_pixel_icon-balloon_buzz' => esc_html__( 'Balloon Buzz', 'liviza' ) ),
	array( 'vc_pixel_icon vc_pixel_icon-balloon_facebook' => esc_html__( 'Balloon Facebook', 'liviza' ) ),
	array( 'vc_pixel_icon vc_pixel_icon-balloon_twitter' => esc_html__( 'Balloon Twitter', 'liviza' ) ),
	array( 'vc_pixel_icon vc_pixel_icon-battery' => esc_html__( 'Battery', 'liviza' ) ),
	array( 'vc_pixel_icon vc_pixel_icon-binocular' => esc_html__( 'Binocular', 'liviza' ) ),
	array( 'vc_pixel_icon vc_pixel_icon-document_excel' => esc_html__( 'Document Excel', 'liviza' ) ),
	array( 'vc_pixel_icon vc_pixel_icon-document_image' => esc_html__( 'Document Image', 'liviza' ) ),
	array( 'vc_pixel_icon vc_pixel_icon-document_music' => esc_html__( 'Document Music', 'liviza' ) ),
	array( 'vc_pixel_icon vc_pixel_icon-document_office' => esc_html__( 'Document Office', 'liviza' ) ),
	array( 'vc_pixel_icon vc_pixel_icon-document_pdf' => esc_html__( 'Document PDF', 'liviza' ) ),
	array( 'vc_pixel_icon vc_pixel_icon-document_powerpoint' => esc_html__( 'Document Powerpoint', 'liviza' ) ),
	array( 'vc_pixel_icon vc_pixel_icon-document_word' => esc_html__( 'Document Word', 'liviza' ) ),
	array( 'vc_pixel_icon vc_pixel_icon-bookmark' => esc_html__( 'Bookmark', 'liviza' ) ),
	array( 'vc_pixel_icon vc_pixel_icon-camcorder' => esc_html__( 'Camcorder', 'liviza' ) ),
	array( 'vc_pixel_icon vc_pixel_icon-camera' => esc_html__( 'Camera', 'liviza' ) ),
	array( 'vc_pixel_icon vc_pixel_icon-chart' => esc_html__( 'Chart', 'liviza' ) ),
	array( 'vc_pixel_icon vc_pixel_icon-chart_pie' => esc_html__( 'Chart pie', 'liviza' ) ),
	array( 'vc_pixel_icon vc_pixel_icon-clock' => esc_html__( 'Clock', 'liviza' ) ),
	array( 'vc_pixel_icon vc_pixel_icon-fire' => esc_html__( 'Fire', 'liviza' ) ),
	array( 'vc_pixel_icon vc_pixel_icon-heart' => esc_html__( 'Heart', 'liviza' ) ),
	array( 'vc_pixel_icon vc_pixel_icon-mail' => esc_html__( 'Mail', 'liviza' ) ),
	array( 'vc_pixel_icon vc_pixel_icon-play' => esc_html__( 'Play', 'liviza' ) ),
	array( 'vc_pixel_icon vc_pixel_icon-shield' => esc_html__( 'Shield', 'liviza' ) ),
	array( 'vc_pixel_icon vc_pixel_icon-video' => esc_html__( 'Video', 'liviza' ) ),
);
/*
 *  GLOBAL: Carousel Options
 */
function themestek_box_params($boxtype=''){
	$boxview = array(
		esc_html__('Row and Column','liviza')  => 'default',
		esc_html__('Carousel effect','liviza') => 'carousel',
	);
	// CSS Animation
	$vc_map_add_css_animation = vc_map_add_css_animation();
	$vc_map_add_css_animation['group'] = esc_html__( 'Boxes Appearance', 'liviza' );
	if( $boxtype=='blog' ){
		// Nothing to do
	}
	// Testimonial changes for box option
	$std_column  = 'three';
	$std_boxview = 'default';
	if( $boxtype == 'testimonial' ){
		$std_column  = 'one';
		$std_boxview = 'carousel';
	}
	$boxOprions = array(
		array(
			"type"        => "dropdown",
			"heading"     => esc_html__("Column", "liviza"),
			"param_name"  => "column",
			"description" => esc_html__("Select column.", "liviza"),
			"value"       => array(
				esc_html__("One Column",    "liviza") => "one",
				esc_html__("Two Columns",   "liviza") => "two",
				esc_html__("Three Columns", "liviza") => "three",
				esc_html__("Four Columns",  "liviza") => "four",
				esc_html__("Five Columns",  "liviza") => "five",
				esc_html__("Six Columns",   "liviza") => "six",
			),
			'std'         => esc_html($std_column),
			'group'       => esc_html__( 'Boxes Appearance', 'liviza' ),
		),
		array(
			"type"        => "dropdown",
			"holder"      => "div",
			"class"       => "",
			"heading"     => esc_html__("Box View",'liviza'),
			"description" => esc_html__("Select box view. Show as normal row and column or show with carousel effect.",'liviza'),
			"param_name"  => "boxview",
			"value"       => $boxview,
			'group'       => esc_html__( 'Boxes Appearance', 'liviza' ),
			'std'         => esc_html($std_boxview),
		),
		array(
			'type'       => 'dropdown',
			'heading'    => esc_html__( 'Timeline: Group by', 'liviza' ),
			'param_name' => 'timeline_groupby',
			'value'      => array(
				esc_html__( 'Monthly grouping', 'liviza' ) => 'monthly',
				esc_html__( 'Yearly grouping', 'liviza' )  => 'yearly'
			),
			'description' => esc_html__( 'Timeline: Show timeline view in which group by.', 'liviza' ),
			'group'       => esc_html__( 'Boxes Appearance', 'liviza' ),
			'dependency'  => array(
				'element'   => 'boxview',
				'value'     => array( 'timeline' ),
			),
			'edit_field_class' => 'vc_col-sm-6 vc_column',
			'std'              => 'monthly',
		),
		array(
			'type'       => 'dropdown',
			'heading'    => esc_html__( 'Timeline: Box view', 'liviza' ),
			'param_name' => 'timeline_boxview',
			'value'      => array(
				esc_html__( 'Simple view - without featured image', 'liviza' ) => 'simple',
				esc_html__( 'Simple view - with featured image', 'liviza' )    => 'simple_with_fetured',
				esc_html__( 'Box view', 'liviza' )                             => 'box',
			),
			'description' => esc_html__( 'Timeline: Show timeline view in which group by.', 'liviza' ),
			'group'       => esc_html__( 'Boxes Appearance', 'liviza' ),
			'dependency'  => array(
				'element'   => 'boxview',
				'value'     => array( 'timeline' ),
			),
			'edit_field_class' => 'vc_col-sm-6 vc_column',
			'std'              => 'monthly',
		),
		/*** Carousel Options start ***/
		// speed
		array(
			'type'        => 'textfield',
			'heading'     => esc_html__( 'Carousel: Transaction speed', 'liviza' ),
			'param_name'  => 'carousel_speed',
			'description' => esc_html__( 'Carousel Effect: Slide/Fade animation speed.', 'liviza' ),
			'group'       => esc_html__( 'Boxes Appearance', 'liviza' ),
			'dependency'  => array(
				'element'   => 'boxview',
				'value'     => array( 'carousel', 'slickview','slickview-leftimg','slickview-bottomimg'),
			),
			'edit_field_class' => 'vc_col-sm-6 vc_column',
			'std'              => '1500',
		),
		// Auto Play
		array(
			'type'       => 'dropdown',
			'heading'    => esc_html__( 'Carousel: Autoplay', 'liviza' ),
			'param_name' => 'carousel_autoplay',
			'value'      => array(
				esc_html__( 'Yes', 'liviza' ) => '1',
				esc_html__( 'No', 'liviza' )  => '0'
			),
			'description' => esc_html__( 'Carousel Effect: Enable/disable Autoplay', 'liviza' ),
			'group'       => esc_html__( 'Boxes Appearance', 'liviza' ),
			'dependency'  => array(
				'element'   => 'boxview',
				'value'     => array( 'carousel', 'slickview','slickview-leftimg','slickview-bottomimg'),
			),
			'edit_field_class' => 'vc_col-sm-6 vc_column',
			'std'              => '1',
		),
		// autoplaySpeed
		array(
			'type'        => 'textfield',
			'heading'     => esc_html__( 'Carousel: autoplaySpeed', 'liviza' ),
			'param_name'  => 'carousel_autoplayspeed',
			'description' => esc_html__( 'Carousel Effect: autoplay speed. Inert numbers only. Default value is "4500".', 'liviza' ),
			'group'       => esc_html__( 'Boxes Appearance', 'liviza' ),
			'dependency'  => array(
				'element'   => 'boxview',
				'value'     => array( 'carousel', 'slickview','slickview-leftimg','slickview-bottomimg'),
			),
			'edit_field_class' => 'vc_col-sm-6 vc_column',
			'std'              => '4500',
		),
		// loop
		array(
			'type'       => 'dropdown',
			'heading'    => esc_html__( 'Carousel: Loop Item', 'liviza' ),
			'param_name' => 'carousel_loop',
			'value'      => array(
				esc_html__( 'No', 'liviza' )  => '0',
				esc_html__( 'Yes', 'liviza' ) => '1',
			),
			'description' => esc_html__( 'Carousel Effect: Infinite loop sliding.', 'liviza' ).'<br><strong>'.esc_html__( 'NOTE:', 'liviza' ).' </strong> '.esc_html__( 'If you select NO than the carousel will rewind all and start from 1st item. Also this will work if you enabled "Autoplay".', 'liviza' ),
			'group'       => esc_html__( 'Boxes Appearance', 'liviza' ),
			'dependency'  => array(
				'element'   => 'boxview',
				'value'     => array( 'carousel', 'slickview','slickview-leftimg','slickview-bottomimg'),
			),
			'edit_field_class' => 'vc_col-sm-6 vc_column',
			'std'              => '1',
		),
		// Dots
		array(
			'type'       => 'dropdown',
			'heading'    => esc_html__( 'Carousel: dots', 'liviza' ),
			'param_name' => 'carousel_dots',
			'value'      => array(
				esc_html__('No', 'liviza')  => '0',
				esc_html__('Yes', 'liviza') => '1',
			),
			'description' => esc_html__( 'Carousel Effect: Show dots navigation.', 'liviza' ),
			'group'       => esc_html__( 'Boxes Appearance', 'liviza' ),
			'dependency'  => array(
				'element'   => 'boxview',
				'value'     => array( 'carousel', 'slickview','slickview-leftimg','slickview-bottomimg'),
			),
			'edit_field_class' => 'vc_col-sm-6 vc_column',
			'std'              => '0',
		),
		// Next/Prev links
		array(
			'type'       => 'dropdown',
			'heading'    => esc_html__( 'Carousel: Next/Prev Arrows', 'liviza' ),
			'param_name' => 'carousel_nav',
			'value'      => array(
				esc_html__('Above Carousel / Below Title', 'liviza')	=> 'above',
				esc_html__('Below Carousel', 'liviza')				=> 'below',
				esc_html__('Before / After boxes', 'liviza')			=> '1',
				esc_html__('Hide', 'liviza')							=> 'hide',
			),
			'description' => esc_html__( 'Carousel Effect: Show dots navigation.', 'liviza' ),
			'group'       => esc_html__( 'Boxes Appearance', 'liviza' ),
			'dependency'  => array(
				'element'   => 'boxview',
				'value'     => array( 'carousel' ),
			),
			'edit_field_class' => 'vc_col-sm-6 vc_column',
			'std'              => 'below',
		),
		// centerMode
		array(
			'type'       => 'dropdown',
			'heading'    => esc_html__( 'Carousel: centerMode', 'liviza' ),
			'param_name' => 'carousel_centermode',
			'value'      => array(
				esc_html__('No', 'liviza')  => '0',
				esc_html__('Yes', 'liviza') => '1',
			),
			'description' => esc_html__( 'Enables centered view with partial prev/next slides. Use with odd numbered slidesToShow counts.', 'liviza' ),
			'group'       => esc_html__( 'Boxes Appearance', 'liviza' ),
			'dependency'  => array(
				'element'   => 'boxview',
				'value'     => array( 'carousel' ),
			),
			'edit_field_class' => 'vc_col-sm-6 vc_column',
			'std'              => '0',
		),
		// pauseOnFocus
		array(
			'type'       => 'dropdown',
			'heading'    => esc_html__( 'Carousel: pauseOnFocus', 'liviza' ),
			'param_name' => 'carousel_pauseonfocus',
			'value'      => array(
				esc_html__('Yes', 'liviza') => '1',
				esc_html__('No', 'liviza')  => '0',
			),
			'description' => esc_html__( 'Carousel Effect: Pause Autoplay On Focus.', 'liviza' ),
			'group'       => esc_html__( 'Boxes Appearance', 'liviza' ),
			'dependency'  => array(
				'element'   => 'boxview',
				'value'     => array( 'carousel' ),
			),
			'edit_field_class' => 'vc_col-sm-6 vc_column',
			'std'              => '0',
		),
		// pauseOnHover
		array(
			'type'       => 'dropdown',
			'heading'    => esc_html__( 'Carousel: pauseOnHover', 'liviza' ),
			'param_name' => 'carousel_pauseonhover',
			'value'      => array(
				esc_html__('Yes', 'liviza') => '1',
				esc_html__('No', 'liviza')  => '0',
			),
			'description' => esc_html__( 'Carousel Effect: Pause on mouse hover.', 'liviza' ),
			'group'       => esc_html__( 'Boxes Appearance', 'liviza' ),
			'dependency'  => array(
				'element'   => 'boxview',
				'value'     => array( 'carousel' ),
			),
			'edit_field_class' => 'vc_col-sm-6 vc_column',
			'std'              => '1',
		),
		// 
		array(
			'type'       => 'dropdown',
			'heading'    => esc_html__( 'Carousel: slidesToScroll', 'liviza' ),
			'param_name' => 'carousel_slidestoscroll',
			'value'      => array(
				esc_html__( '1 Slide', 'liviza' )        => '1',
				esc_html__( 'Same as column', 'liviza' ) => 'column',
			),
			'description' => esc_html__( '# of slides to scroll.', 'liviza' ),
			'group'       => esc_html__( 'Boxes Appearance', 'liviza' ),
			'dependency'  => array(
				'element'   => 'boxview',
				'value'     => array( 'carousel' ),
			),
			'edit_field_class' => 'vc_col-sm-6 vc_column',
			'std'              => 'column',
		),
		// Box trasaction effect
		array(
			'type'       => 'dropdown',
			'heading'    => esc_html__( 'Carousel: Box transaction effect', 'liviza' ),
			'param_name' => 'carousel_effecttype',
			'value'      => array(
				esc_html__( 'Slide', 'liviza' )  => 'slide',
				esc_html__( 'fade', 'liviza' )   => 'fade',
			),
			'description' => esc_html__( 'Select Fade or Slide effect for carousel.', 'liviza' ) . '<br><strong>' . esc_html__( 'NOTE:', 'liviza' ) . esc_html__( 'The FADE effect will work with one column view only.', 'liviza' ) . '</strong>',
			'group'       => esc_html__( 'Boxes Appearance', 'liviza' ),
			'dependency'  => array(
				'element'   => 'boxview',
				'value'     => array( 'carousel', 'slickview','slickview-leftimg','slickview-bottomimg'),
			),
			'edit_field_class' => 'vc_col-sm-6 vc_column',
			'std'              => 'slide',
		),
		$vc_map_add_css_animation,
		array(
			'type'        => 'textfield',
			'heading'     => esc_html__( 'Extra class name', 'liviza' ),
			'param_name'  => 'el_class',
			'description' => esc_html__( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'liviza' ),
			'group'       => esc_html__( 'Boxes Appearance', 'liviza' ),
		),
	);
	return $boxOprions;
}
/**
 *  GLOBAL: Heading Options in Visual Composer element
 */
function themestek_vc_heading_params($data=''){
	$h2_custom_heading = vc_map_integrate_shortcode( 'themestek-custom-heading', 'h2_', esc_html__( 'Heading', 'liviza' ),
		array(
			'exclude' => array(
				'text',
				'source',
				'css',
				'el_class',
			),
		),
		array(
			'element' => 'use_custom_fonts_h2',
			'value'   => 'true',
		)
	);
	// This is needed to remove custom heading _tag and _align options.
	if ( is_array( $h2_custom_heading ) && ! empty( $h2_custom_heading ) ) {
		foreach ( $h2_custom_heading as $key => $param ) {
			if ( is_array( $param ) && isset( $param['type'] ) && $param['type'] == 'font_container' ) {
				if ( isset( $param['settings'] ) && is_array( $param['settings'] ) && isset( $param['settings']['fields'] ) ) {
					$sub_key = array_search( 'tag', $param['settings']['fields'] );
					if ( false !== $sub_key ) {
						unset( $h2_custom_heading[ $key ]['settings']['fields'][ $sub_key ] );
					} else if ( isset( $param['settings']['fields']['tag'] ) ) {
						unset( $h2_custom_heading[ $key ]['settings']['fields']['tag'] );
					}
					$sub_key = array_search( 'text_align', $param['settings']['fields'] );
					if ( false !== $sub_key ) {
						unset( $h2_custom_heading[ $key ]['settings']['fields'][ $sub_key ] );
					} else if ( isset( $param['settings']['fields']['text_align'] ) ) {
						unset( $h2_custom_heading[ $key ]['settings']['fields']['text_align'] );
					}
				}
			}
		}
	}
	$h4_custom_heading = vc_map_integrate_shortcode( 'themestek-custom-heading', 'h4_', esc_html__( 'Subheading', 'liviza' ),
		array(
			'exclude' => array(
				'text',
				'source',
				'css',
				'el_class',
			),
		),
		array(
			'element' => 'use_custom_fonts_h4',
			'value' => 'true',
		)
	);
	// This is needed to remove custom heading _tag and _align options.
	if ( is_array( $h4_custom_heading ) && ! empty( $h4_custom_heading ) ) {
		foreach ( $h4_custom_heading as $key => $param ) {
			if ( is_array( $param ) && isset( $param['type'] ) && $param['type'] == 'font_container' ) {
				if ( isset( $param['settings'] ) && is_array( $param['settings'] ) && isset( $param['settings']['fields'] ) ) {
					$sub_key = array_search( 'tag', $param['settings']['fields'] );
					if ( false !== $sub_key ) {
						unset( $h4_custom_heading[ $key ]['settings']['fields'][ $sub_key ] );
					} else if ( isset( $param['settings']['fields']['tag'] ) ) {
						unset( $h4_custom_heading[ $key ]['settings']['fields']['tag'] );
					}
					$sub_key = array_search( 'text_align', $param['settings']['fields'] );
					if ( false !== $sub_key ) {
						unset( $h4_custom_heading[ $key ]['settings']['fields'][ $sub_key ] );
					} else if ( isset( $param['settings']['fields']['text_align'] ) ) {
						unset( $h4_custom_heading[ $key ]['settings']['fields']['text_align'] );
					}
				}
			}
		}
	}
	$params = array_merge(
		array(
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Heading', 'liviza' ),
				'admin_label' => true,
				'param_name'  => 'h2',
				'save_always' => true,
				'value'       => esc_html__( 'Welcome', 'liviza' ),
				'description' => esc_html__( 'Enter text for heading line.', 'liviza' ),
				'edit_field_class' => 'vc_col-sm-9 vc_column',
			),
			array(
				'type' => 'checkbox',
				'heading' => esc_html__( 'Use custom font?', 'liviza' ),
				'param_name' => 'use_custom_fonts_h2',
				'description' => esc_html__( 'Enable Google fonts.', 'liviza' ),
				'edit_field_class' => 'vc_col-sm-3 vc_column',
			),
		),
		$h2_custom_heading,
		array(
			array(
				'type'             => 'textfield',
				'heading'          => esc_html__( 'Subheading', 'liviza' ),
				'param_name'       => 'h4',
				'description'      => esc_html__( 'Enter text for subheading line.', 'liviza' ),
				'edit_field_class' => 'vc_col-sm-9 vc_column',
			),
			array(
				'type'             => 'checkbox',
				'heading'          => esc_html__( 'Use custom font?', 'liviza' ),
				'param_name'       => 'use_custom_fonts_h4',
				'description'      => esc_html__( 'Enable custom font option.', 'liviza' ),
				'edit_field_class' => 'vc_col-sm-3 vc_column',
			),
		),
		$h4_custom_heading,
		array(
			array(
				'type'        => 'dropdown',
				'heading'     => esc_html__( 'Text alignment', 'liviza' ),
				'param_name'  => 'txt_align',
				'value' => ( ( function_exists('vc_get_shared') ) ? vc_get_shared( 'text align' ) : getVcShared( 'text align' ) ), // default left
				'description' => esc_html__( 'Select text alignment.', 'liviza' ),
				'std'         => 'left',
			),
		)
	);
	// Setting default font settings.. Make sure you change this when change default value in Redux Options
	$i = 0;
	foreach( $params as $param ){
		$param_name = (isset($param['param_name'])) ? $param['param_name'] : '' ;
		if( $param_name == 'h2_google_fonts' ){
			$params[$i]['std'] = 'font_family:Arimo%3Aregular%2Citalic%2C700%2C700italic|font_style:700%20bold%20regular%3A700%3Anormal';
		} else if( $param_name == 'h4_google_fonts' ){
			$params[$i]['std'] = 'font_family:Lato%3A100%2C100italic%2C300%2C300italic%2Cregular%2Citalic%2C700%2C700italic%2C900%2C900italic|font_style:300%20light%20regular%3A300%3Anormal';
		}
		$i++;
	}; // Foreach
	return $params;
}
function themestek_vc_ele_extra_class_option(){
	$return = array(
		'type'        => 'textfield',
		'heading'     => esc_html__( 'Extra class name', 'liviza' ),
		'param_name'  => 'el_class',
		'description' => esc_html__( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'liviza' )
	);
	return $return;
}
function themestek_vc_ele_css_editor_option(){
	$return = array(
		'type'       => 'css_editor',
		'heading'    => esc_html__( 'CSS box', 'liviza' ),
		'param_name' => 'css',
		'group'      => esc_html__( 'Design Options', 'liviza' )
	);
	return $return;
}
function themestek_responsive_padding_margin_option( $for=''){
	$return = array(
		"type"			=> "themestek_css_editor",
		"heading"		=> esc_html__("Responsive Padding/Margin Options", "liviza"),
		"description"	=> esc_html__("You can mange padding/margin from here. For differnt screen sizes", "liviza"),
		"param_name"	=> "themestek_responsive_css",
		'group'			=> esc_html__( 'Responsive Padding/Margin Options', 'liviza' ),
	);
	if( $for=='column' ){
		$return['break_column_option'] = 'no';
	}
	return $return;
}
/**
 * @param $value
 *
 * @since 4.2
 * @return array
 */
function themestek_vc_build_link( $value ) {
	return themestek_vc_parse_multi_attribute( $value, array( 'url' => '', 'title' => '', 'target' => '' ) );
}
/**
 * Parse string like "title:Hello world|weekday:Monday" to array('title' => 'Hello World', 'weekday' => 'Monday')
 *
 * @param $value
 * @param array $default
 *
 * @since 4.2
 * @return array
 */
function themestek_vc_parse_multi_attribute( $value, $default = array() ) {
	$result = $default;
	$params_pairs = explode( '|', $value );
	if ( ! empty( $params_pairs ) ) {
		foreach ( $params_pairs as $pair ) {
			$param = preg_split( '/\:/', $pair );
			if ( ! empty( $param[0] ) && isset( $param[1] ) ) {
				$result[ $param[0] ] = rawurldecode( $param[1] );
			}
		}
	}
	return $result;
}
 /*
 * Enqueue icon element font
 * @todo move to separate folder
 * @since 4.4
 *
 * @param $font
 */
function themestek_vc_icon_element_fonts_enqueue( $font ) {
	switch ( $font ) {
		case 'themify':
			wp_enqueue_style( 'themify' );  // added by ThemeStek
			break;
		case 'fontawesome':
		default:
			wp_enqueue_style( 'font-awesome' );
			break;
		case 'linecons':
			wp_enqueue_style( 'vc_linecons' );
			break;
	}
}
function themestek_getStyles( $el_class, $css, $google_fonts_data, $font_container_data, $atts ) {
	$styles = array();
	if ( ! empty( $font_container_data ) && isset( $font_container_data['values'] ) ) {
		foreach ( $font_container_data['values'] as $key => $value ) {
			if ( 'tag' !== $key && strlen( $value ) ) {
				if ( preg_match( '/description/', $key ) ) {
					continue;
				}
				if ( 'font_size' === $key || 'line_height' === $key ) {
					$value = preg_replace( '/\s+/', '', $value );
				}
				if ( 'font_size' === $key ) {
					$pattern = '/^(\d*(?:\.\d+)?)\s*(px|\%|in|cm|mm|em|rem|ex|pt|pc|vw|vh|vmin|vmax)?$/';
					$regexr  = preg_match( $pattern, $value, $matches );
					$value   = isset( $matches[1] ) ? (float) $matches[1] : (float) $value;
					$unit    = isset( $matches[2] ) ? $matches[2] : 'px';
					$value   = $value . $unit;
				}
				if ( strlen( $value ) > 0 ) {
					$styles[] = str_replace( '_', '-', esc_attr($key) ) . ': ' . esc_attr($value);
				}
			}
		}
	}
	if ( ( ! isset( $atts['use_theme_fonts'] ) || 'yes' !== $atts['use_theme_fonts'] ) && ! empty( $google_fonts_data ) && isset( $google_fonts_data['values'], $google_fonts_data['values']['font_family'], $google_fonts_data['values']['font_style'] ) ) {
		$google_fonts_family = explode( ':', $google_fonts_data['values']['font_family'] );
		$styles[] = 'font-family:' . esc_attr($google_fonts_family[0]);
		$google_fonts_styles = explode( ':', $google_fonts_data['values']['font_style'] );
		$styles[] = 'font-weight:' . esc_attr($google_fonts_styles[1]);
		$styles[] = 'font-style:' . esc_attr($google_fonts_styles[2]);
	}
	/**
	 * Filter 'VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG' to change vc_custom_heading class
	 *
	 * @param string - filter_name
	 * @param string - element_class
	 * @param string - shortcode_name
	 * @param array - shortcode_attributes
	 *
	 * @since 4.3
	 */
	$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, 'vc_custom_heading ' . esc_attr($el_class) . vc_shortcode_custom_css_class( $css, ' ' ), $this->settings['base'], $atts );
	return array(
		'css_class' => trim( preg_replace( '/\s+/', ' ', $css_class ) ),
		'styles' => $styles,
	);
}
function themestek_vc_get_css_color( $prefix, $color ) {
	$rgb_color = preg_match( '/rgba/', $color ) ? preg_replace( array(
		'/\s+/',
		'/^rgba\((\d+)\,(\d+)\,(\d+)\,([\d\.]+)\)$/',
	), array(
		'',
		'rgb($1,$2,$3)',
	), $color ) : $color;
	$string = $prefix . ':' . esc_attr($rgb_color) . ';';
	if ( $rgb_color !== $color ) {
		$string .= $prefix . ':' . esc_attr($color) . ';';
	}
	return $string;
}
function themestek_getCSSAnimation( $css_animation ) {
	$output = '';
	if ( '' !== $css_animation ) {
		wp_enqueue_script( 'vc_waypoints' );
		wp_enqueue_style( 'animate-css' );
		$output = ' wpb_animate_when_almost_visible wpb_' . esc_attr($css_animation) . ' ' . esc_attr($css_animation);
	}
	return $output;
}
/**
 * @param $el_class
 *
 * @return string
 */
function themestek_getExtraClass( $el_class ) {
	$output = '';
	if ( '' !== $el_class ) {
		$output = ' ' . str_replace( '.', '', $el_class );
	}
	return $output;
}
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
 *  Check if Background color is available in css code
 */
if( !function_exists('themestek_check_if_bgcolor_in_css') ){
function themestek_check_if_bgcolor_in_css( $css ) {
	$return = false;
	if( !empty($css) ){
		$css_array = explode('{', $css);
		$css_array = $css_array[1];
		$css_array = str_replace('}','', $css_array );
		$css_array = explode( ';', $css_array );
		if( is_array($css_array) && count($css_array)>0 ){
			foreach( $css_array as $css_rule ){
				if ( substr( $css_rule, 0, 11 ) == 'background:' ) {
					$css_rule = explode( ':', $css_rule );
					$css_rule = $css_rule[1];
					$css_rule = explode( ' ', $css_rule );
					$css_rule = array_filter($css_rule);
					foreach( $css_rule as $rule ){
						if( substr($rule, 0, 1)=='#' || substr($rule, 0, 4)=='rgb(' || substr($rule, 0, 5)=='rgba(' ){
							$return = true;
						}
					}
				} else if ( substr( $css_rule, 0, 17 ) == 'background-color:' ) {
					$return = true;
				}
			}
		}
	}
	return $return;
}
}
/**** Security ****/
if ( ! defined( 'ABSPATH' ) ) { die( '-1' ); }
/**
 * Adding extra parameters in VC
 */
if( !function_exists('themestek_vc_add_extra_param') ){
function themestek_vc_add_extra_param(){
	/************* VC ROW *******************/
	
	// adding 0px for zero pixel in gap
	$vc_row_gap_param			= WPBMap::getParam( 'vc_row', 'gap' );
	$vc_row_gap_param['value'][ __('Default', 'liviza') ] = 'default';
	$vc_row_gap_param['value']['0px'] = '0px';
	$vc_row_gap_param['std'] = 'default';
	vc_update_shortcode_param( 'vc_row', $vc_row_gap_param );

	// VC ROW: set RTL on
	$vc_row_rtl_reverse			= WPBMap::getParam( 'vc_row', 'rtl_reverse' );
	$vc_row_rtl_reverse['std'] = 'yes';
	vc_update_shortcode_param( 'vc_row', $vc_row_rtl_reverse );

	// VC INNER ROW: set RTL on
	$vc_row_inner_rtl_reverse			= WPBMap::getParam( 'vc_row_inner', 'rtl_reverse' );
	$vc_row_inner_rtl_reverse['std'] = 'yes';
	vc_update_shortcode_param( 'vc_row_inner', $vc_row_inner_rtl_reverse );
	
	
	// Inner row
	$vc_row_inner_gap_param			= WPBMap::getParam( 'vc_row_inner', 'gap' );
	$vc_row_inner_gap_param['value']['0px'] = '0px';
	vc_update_shortcode_param( 'vc_row_inner', $vc_row_inner_gap_param );
	
	// VC ROW : Text Color
	vc_add_param( 'vc_row', array(
		"type"        => "dropdown",
		"heading"     => esc_html__("Text Color", "liviza"),
		"description" => esc_html__("Select text color.", "liviza"),
		"param_name"  => "themestek_textcolor",
		"weight"      => 1,
		"value"       => array(
			esc_html__("Default", "liviza")     => "",
			esc_html__("Dark Color", "liviza")  => "dark",
			esc_html__("White Color", "liviza") => "white",
			esc_html__("Skin Color", "liviza")  => "skincolor",
		),
	));
	// VC ROW : Background Color
	vc_add_param( 'vc_row', array(
		"type"        => "dropdown",
		"heading"     => esc_html__("Background Color", "liviza"),
		"description" => esc_html__("Select Background Color. If you select color and also select background Video or background Image than the color will be overlay with some opacity.", "liviza"),
		"param_name"  => "themestek_bgcolor",
		"weight"      => 1,
		"value"       => array(
			esc_html__("Default (From Design Options tab)", "liviza") => "",
			esc_html__('Dark grey color as background color', 'liviza') => 'darkgrey',
			esc_html__('Grey color as background color', 'liviza')      => 'grey',
			esc_html__('White color as background color', 'liviza')     => 'white',
			esc_html__('Skincolor color as background color', 'liviza') => 'skincolor',
		),
	));
	// VC ROW : Background Image Position
	vc_add_param( 'vc_row', array(
		"type"        => "dropdown",
		"heading"     => esc_html__("Background Image Position", "liviza"),
		"description" => esc_html__("Select Background Image Position", "liviza"),
		"param_name"  => "themestek_bgimage_position",
		"weight"      => 1,
		"value"       => array(
			esc_html__('left top', "liviza")      => 'left_top',
			esc_html__('left center', "liviza")   => 'left_center',
			esc_html__('left bottom', "liviza")   => 'left_bottom',
			esc_html__('right top', "liviza")     => 'right_top',
			esc_html__('right center', "liviza")  => 'right_center',
			esc_html__('right bottom', "liviza")  => 'right_bottom',
			esc_html__('center center', "liviza") => 'center_center',
			esc_html__('center top', "liviza")    => 'center_top',
			esc_html__('center bottom', "liviza") => 'center_bottom'
		),
		"std"  => "center_center",
	));
	// VC ROW : Z-index
	vc_add_param( 'vc_row', array(
		'type'			=> 'themestek_imgselector',
		'heading'		=> esc_html__( 'Layer position for this ROW (z-index of the ROW)', 'liviza' ),
		'description'	=> esc_html__( 'Select position for this ROW. Technically this will add z-index css property. So you can overlap ROW on each over by setting this z-index property.', 'liviza' ),
		'param_name'	=> 'zindex',
		'std'			=> 'zero',
		"weight"      	=> 1,
		'value'			=> array(
			array(
				'label'	=> esc_html__('Z-Index - Style 0','liviza'),
				'value'	=> 'zero',
				'thumb'	=> get_template_directory_uri() . '/includes/images/zindex-1.jpg',
				'width'	=> '150px',
			),
			array(
				'label'	=> esc_html__('Z-Index - Style 1','liviza'),
				'value'	=> '1',
				'thumb'	=> get_template_directory_uri() . '/includes/images/zindex-2.jpg',
				'width' => '150px',
			),
			array(
				'label'	=> esc_html__('Z-Index - Style 2','liviza'),
				'value'	=> '2',
				'thumb'	=> get_template_directory_uri() . '/includes/images/zindex-3.jpg',
				'width' => '150px',
			),
		),
	));
	// VC ROW : CSS Settings for 1200 and up
	vc_add_param( 'vc_row', themestek_responsive_padding_margin_option() );
	/************* VC COLUMN *******************/
	// VC COLUMN : Text Color
	vc_add_param( 'vc_column', array(
		"type"        => "dropdown",
		"heading"     => esc_html__("Text Color", "liviza"),
		"description" => esc_html__("Select text color", "liviza"),
		"param_name"  => "themestek_textcolor",
		"weight"      => 1,
		"value"       => array(
			esc_html__("Default", "liviza")     => "",
			esc_html__("Dark Color", "liviza")  => "dark",
			esc_html__("White Color", "liviza") => "white",
			esc_html__("Skin Color", "liviza")  => "skincolor",
		),
	));
	// VC COLUMN : Background Color
	vc_add_param( 'vc_column', array(
		"type"        => "dropdown",
		"heading"     => esc_html__("Background Color", "liviza"),
		"description" => esc_html__("Select Background Color. If you select color and also select background Image than the color will be overlay with some opacity", "liviza"),
		"param_name"  => "themestek_bgcolor",
		"weight"      => 1,
		"value"       => array(
			esc_html__("Default (From Design Options tab)", "liviza") => "",
			esc_html__('Dark grey color as background color', 'liviza') => 'darkgrey',
			esc_html__('Grey color as background color', 'liviza')      => 'grey',
			esc_html__('White color as background color', 'liviza')     => 'white',
			esc_html__('Skincolor color as background color', 'liviza') => 'skincolor',
		),
	));
	// VC COLUMN : Add Shadow
	vc_add_param( 'vc_column', array(
		"type"        => "dropdown",
		"heading"     => esc_html__("Add shadow?", "liviza"),
		"description" => esc_html__("Select YES to set shadow for the column.", "liviza"),
		"param_name"  => "themestek_shadow",
		"weight"      => 1,
		"value"       => array(
			esc_html__("No", "liviza")  => "",
			esc_html__('Yes', 'liviza') => 'yes',
		),
	));
	// VC COLUMN : Lower padding in responsive mode
	vc_add_param( 'vc_column', array(
		"type"        => "dropdown",
		"heading"     => esc_html__("Reduce spacing (Padding) from left/right area in responsive mode", "liviza"),
		"description" => esc_html__("This is useful if you set extra padding via 'Design Options' tab. This will reset spacing (padding) from left/right area for the column.", "liviza"),
		"param_name"  => "reduce_extra_padding",
		"weight"      => 1,
		"value"       => array(
			esc_html__("None (default)", "liviza")                       		   => "",
			esc_html__('Reset in small desktop (under 1200 pixel size)', "liviza") => '1200',
			esc_html__('Reset in tablet (under 992 pixel size)', "liviza")         => '991',
		),
	));
	// VC COLUMN : Exapand Column BG to left or right
	vc_add_param( 'vc_column', array(
		"type"        => "dropdown",
		"heading"     => esc_html__("Exapand Column Background", "liviza"),
		"description" => esc_html__("Exapand Column BG to left or right. This will expand the Background image/color visibility to border of the browser border.", "liviza"),
		"param_name"  => "themestek_col_bg_expand",
		"weight"      => 1,
		"value"       => array(
			esc_html__("No expand (default)", "liviza")                => "",
			esc_html__('Exapand Column background to left', 'liviza')  => 'left',
			esc_html__('Exapand Column background to right', 'liviza') => 'right',
		),
	));
	// VC COLUMN : Background Image Position
	vc_add_param( 'vc_column', array(
		"type"        => "dropdown",
		"heading"     => esc_html__("Background Image Position", "liviza"),
		"description" => esc_html__("Select Background Image Position", "liviza"),
		"param_name"  => "themestek_bgimage_position",
		"weight"      => 1,
		"value"       => array(
			esc_html__('left top', "liviza")      => 'left_top',
			esc_html__('left center', "liviza")   => 'left_center',
			esc_html__('left bottom', "liviza")   => 'left_bottom',
			esc_html__('right top', "liviza")     => 'right_top',
			esc_html__('right center', "liviza")  => 'right_center',
			esc_html__('right bottom', "liviza")  => 'right_bottom',
			esc_html__('center center', "liviza") => 'center_center',
			esc_html__('center top', "liviza")    => 'center_top',
			esc_html__('center bottom', "liviza") => 'center_bottom'
		),
		"std"  => "center_center",
	));
	// VC COLUMN : Z-index
	vc_add_param( 'vc_column', array(
		'type'			=> 'themestek_imgselector',
		'heading'		=> esc_html__( 'Layer position for this COLUMN (z-index of the COLUMN)', 'liviza' ),
		'description'	=> esc_html__( 'Select position for this COLUMN. Technically this will add z-index css property. So you can overlap COLUMN on each over by setting this z-index property.', 'liviza' ),
		'param_name'	=> 'zindex',
		'std'			=> 'zero',
		"weight"      	=> 1,
		'value'			=> array(
			array(
				'label'	=> esc_html__('Z-Index - Style 0','liviza'),
				'value'	=> 'zero',
				'thumb'	=> get_template_directory_uri() . '/includes/images/zindex-1.jpg',
				'width'	=> '150px',
			),
			array(
				'label'	=> esc_html__('Z-Index - Style 1','liviza'),
				'value'	=> '1',
				'thumb'	=> get_template_directory_uri() . '/includes/images/zindex-2.jpg',
				'width' => '150px',
			),
			array(
				'label'	=> esc_html__('Z-Index - Style 2','liviza'),
				'value'	=> '2',
				'thumb'	=> get_template_directory_uri() . '/includes/images/zindex-3.jpg',
				'width' => '150px',
			),
		),
	));
	// VC COLUMN : CSS Settings for 1200 and up
	vc_add_param( 'vc_column', themestek_responsive_padding_margin_option('column') );
	/************* VC ROW INNER *******************/
	// VC ROW INNER : Text Color
	vc_add_param( 'vc_row_inner', array(
		"type"        => "dropdown",
		"heading"     => esc_html__("Text Color", "liviza"),
		"description" => esc_html__("Select text color.", "liviza"),
		"param_name"  => "themestek_textcolor",
		"weight"      => 1,
		"value"       => array(
			esc_html__("Default", "liviza")     => "",
			esc_html__("Dark Color", "liviza")  => "dark",
			esc_html__("White Color", "liviza") => "white",
			esc_html__("Skin Color", "liviza")  => "skincolor",
		),
	));
	// VC ROW INNER : Background Color
	vc_add_param( 'vc_row_inner', array(
		"type"        => "dropdown",
		"heading"     => esc_html__("Background Color", "liviza"),
		"description" => esc_html__("Select Background Color. If you select color and also select background Video or background Image than the color will be overlay with some opacity.", "liviza"),
		"param_name"  => "themestek_bgcolor",
		"weight"      => 1,
		"value"       => array(
			esc_html__("Default (From Design Options tab)", "liviza") => "",
			esc_html__('Dark grey color as background color', 'liviza') => 'darkgrey',
			esc_html__('Grey color as background color', 'liviza')      => 'grey',
			esc_html__('White color as background color', 'liviza')     => 'white',
			esc_html__('Skincolor color as background color', 'liviza') => 'skincolor',
		),
	));
	// VC ROW INNER : Add Shadow
	vc_add_param( 'vc_row_inner', array(
		"type"        => "dropdown",
		"heading"     => esc_html__("Add shadow?", "liviza"),
		"description" => esc_html__("Select YES to set shadow for the column.", "liviza"),
		"param_name"  => "themestek_shadow",
		"weight"      => 1,
		"value"       => array(
			esc_html__("No", "liviza")  => "",
			esc_html__('Yes', 'liviza') => 'yes',
		),
	));
	// VC ROW INNER : Animation
	vc_add_param( 'vc_row_inner', vc_map_add_css_animation( false ) );
	// VC ROW INNER : Break column in Tablet
	vc_add_param( 'vc_row_inner', array(
		"type"        => "dropdown",
		"heading"     => esc_html__("Break column in Responsive", "liviza"),
		"description" => esc_html__("Break columns (set in one row) in Desktop or Tablet screens. This is useful if your content breaks (or not fit) due to wider content in columns.", "liviza"),
		"param_name"  => "break_in_responsive",
		"weight"      => 1,
		"value"       => array(
			esc_html__("None (default)", "liviza")									=> "",
			esc_html__('Break in small desktop (under 1200 pixel size)', "liviza")	=> '1200',
			esc_html__('Break in tablet (under 992 pixel size)', "liviza")			=> '991',
		),
	));
	// VC ROW INNER : Z-index
	vc_add_param( 'vc_row_inner', array(
		'type'			=> 'themestek_imgselector',
		'heading'		=> esc_html__( 'Layer position for this ROW (z-index of the ROW)', 'liviza' ),
		'description'	=> esc_html__( 'Select position for this ROW. Technically this will add z-index css property. So you can overlap ROW on each over by setting this z-index property.', 'liviza' ),
		'param_name'	=> 'zindex',
		'std'			=> 'zero',
		"weight"      	=> 1,
		'value'			=> array(
			array(
				'label'	=> esc_html__('Z-Index - Style 0','liviza'),
				'value'	=> 'zero',
				'thumb'	=> get_template_directory_uri() . '/includes/images/zindex-1.jpg',
				'width'	=> '150px',
			),
			array(
				'label'	=> esc_html__('Z-Index - Style 1','liviza'),
				'value'	=> '1',
				'thumb'	=> get_template_directory_uri() . '/includes/images/zindex-2.jpg',
				'width' => '150px',
			),
			array(
				'label'	=> esc_html__('Z-Index - Style 2','liviza'),
				'value'	=> '2',
				'thumb'	=> get_template_directory_uri() . '/includes/images/zindex-3.jpg',
				'width' => '150px',
			),
		),
	));
	// VC ROW INNER : CSS Settings for 1200 and up
	vc_add_param( 'vc_row_inner', themestek_responsive_padding_margin_option() );
	/************* VC COLUMN INNER *******************/
	// VC COLUMN INNER : Text Color
	vc_add_param( 'vc_column_inner', array(
		"type"        => "dropdown",
		"heading"     => esc_html__("Text Color", "liviza"),
		"description" => esc_html__("Select text color", "liviza"),
		"param_name"  => "themestek_textcolor",
		"weight"      => 1,
		"value"       => array(
			esc_html__("Default", "liviza")     => "",
			esc_html__("Dark Color", "liviza")  => "dark",
			esc_html__("White Color", "liviza") => "white",
			esc_html__("Skin Color", "liviza")  => "skincolor",
		),
	));
	// VC COLUMN INNER : Background Color
	vc_add_param( 'vc_column_inner', array(
		"type"        => "dropdown",
		"heading"     => esc_html__("Background Color", "liviza"),
		"description" => esc_html__("Select Background Color. If you select color and also select background Image than the color will be overlay with some opacity", "liviza"),
		"param_name"  => "themestek_bgcolor",
		"weight"      => 1,
		"value"       => array(
			esc_html__("Default (From Design Options tab)", "liviza") => "",
			esc_html__('Dark grey color as background color', 'liviza') => 'darkgrey',
			esc_html__('Grey color as background color', 'liviza')      => 'grey',
			esc_html__('White color as background color', 'liviza')     => 'white',
			esc_html__('Skincolor color as background color', 'liviza') => 'skincolor',
		),
	));
	// VC COLUMN INNER : Add Shadow
	vc_add_param( 'vc_column_inner', array(
		"type"        => "dropdown",
		"heading"     => esc_html__("Add shadow?", "liviza"),
		"description" => esc_html__("Select YES to set shadow for the column.", "liviza"),
		"param_name"  => "themestek_shadow",
		"weight"      => 1,
		"value"       => array(
			esc_html__("No", "liviza")  => "",
			esc_html__('Yes', 'liviza') => 'yes',
		),
	));
	// VC COLUMN INNER : Lower padding in responsive mode
	vc_add_param( 'vc_column_inner', array(
		"type"        => "dropdown",
		"heading"     => esc_html__("Reduce spacing (Padding) from left/right area in responsive mode", "liviza"),
		"description" => esc_html__("This is useful if you set extra padding via 'Design Options' tab. This will reset spacing (padding) from left/right area for the column.", "liviza"),
		"param_name"  => "reduce_extra_padding",
		"weight"      => 1,
		"value"       => array(
			esc_html__("None (default)", "liviza")                       		   => "",
			esc_html__('Reset in small desktop (under 1200 pixel size)', "liviza") => '1200',
			esc_html__('Reset in tablet (under 992 pixel size)', "liviza")         => '991',
		),
	));
	// VC COLUMN : Z-index
	vc_add_param( 'vc_column_inner', array(
		'type'			=> 'themestek_imgselector',
		'heading'		=> esc_html__( 'Layer position for this COLUMN (z-index of the COLUMN)', 'liviza' ),
		'description'	=> esc_html__( 'Select position for this COLUMN. Technically this will add z-index css property. So you can overlap COLUMN on each over by setting this z-index property.', 'liviza' ),
		'param_name'	=> 'zindex',
		'std'			=> 'zero',
		"weight"      	=> 1,
		'value'			=> array(
			array(
				'label'	=> esc_html__('Z-Index - Style 0','liviza'),
				'value'	=> 'zero',
				'thumb'	=> get_template_directory_uri() . '/includes/images/zindex-1.jpg',
				'width'	=> '150px',
			),
			array(
				'label'	=> esc_html__('Z-Index - Style 1','liviza'),
				'value'	=> '1',
				'thumb'	=> get_template_directory_uri() . '/includes/images/zindex-2.jpg',
				'width' => '150px',
			),
			array(
				'label'	=> esc_html__('Z-Index - Style 2','liviza'),
				'value'	=> '2',
				'thumb'	=> get_template_directory_uri() . '/includes/images/zindex-3.jpg',
				'width' => '150px',
			),
		),
	));
	// VC COLUMN INNER : Animation
	vc_add_param( 'vc_column_inner', vc_map_add_css_animation( false ) );
	// VC COLUMN INNER : CSS Settings for 1200 and up
	vc_add_param( 'vc_column_inner', themestek_responsive_padding_margin_option('column') );
}
}
add_action( 'vc_after_init', 'themestek_vc_add_extra_param', 21 );
/**
 *  Adding skincolor in some elements
 */
if( !function_exists('themestek_vc_add_skin_color') ){
function themestek_vc_add_skin_color() {
	// Add vc element in which you like to add skincolor
	$vc_element_array = array(
		array( 'vc_tta_accordion', 'color' ),
		array( 'vc_tta_tour', 'color' ),
		array( 'vc_tta_tabs', 'color' ),
		array( 'vc_toggle', 'color' ),
	);
	// looping vc elements and adding skincolor
	foreach( $vc_element_array as $vc_element ){
		$element = $vc_element[0];
		$option  = $vc_element[1];
		$param   = WPBMap::getParam( $element, $option );
		$colors  = $param['value'];
		if( is_array($colors) ){
			$colors = array_reverse($colors);
			$colors[__( '[Skin color]', 'liviza' )] = 'skincolor';
			$param['value']      = array_reverse($colors);
		}
		vc_update_shortcode_param( $element, $param );
	}
}
}
add_action( 'vc_after_init', 'themestek_vc_add_skin_color', 2 ); /* Note: here we are using vc_after_init because WPBMap::GetParam and mutateParame are available only when default content elements are "mapped" into the system */
/**
 *  Modify default values for VC elements
 */
if( !function_exists('themestek_vc_change_default_values') ){
function themestek_vc_change_default_values() {
	$vc_element_array = array(
		array( 'vc_tta_accordion',	'shape',	'rounded' ),
		array( 'vc_tta_accordion',	'style',	'classic' ),
		array( 'vc_tta_accordion',	'no_fill',	'true' ),
		array( 'vc_tta_accordion',	'color',	'skincolor' ),
		array( 'vc_tta_accordion',	'gap',		'10' ),
		// 
		array( 'vc_tta_tabs',		'style',	'classic' ),
		array( 'vc_tta_tabs',		'shape',	'rounded' ),
		array( 'vc_tta_tabs',		'no_fill_content_area',	'true' ),
		array( 'vc_tta_tabs',		'color',	'skincolor' ),
		// 
		array( 'vc_tta_tour',		'style',	'classic' ),
		array( 'vc_tta_tour',		'color',	'skincolor' ),
		array( 'vc_tta_tour',		'shape',	'rounded' ),
		array( 'vc_tta_tour',		'controls_size',	'lg' ),
		array( 'vc_tta_tour',		'active_section',	'1' ),
		array( 'vc_tta_tour',		'no_fill_content_area',	'true' ),
		array( 'vc_tta_tour',		'el_class',	'themestek-tourtab-style1' ),
	);
	// looping vc elements and adding skincolor
	foreach( $vc_element_array as $vc_element ){
		$element = $vc_element[0];
		$option  = $vc_element[1];
		$new_std = $vc_element[2];
		$param			= WPBMap::getParam( $element, $option );
		$param['std']	= $new_std;
		vc_update_shortcode_param( $element, $param );
	}
}
}
add_action( 'vc_after_init', 'themestek_vc_change_default_values' );
/********* Add extra Google Fonts in Custom Heading's Google Font list - Working Code Sample **********/
if( !function_exists('themestek_add_google_fonts') ){
function themestek_add_google_fonts($fonts_list){
	$return = $fonts_list;
	// reverse array so new font will be at top
	$return = array_reverse($return);
	// Adding: Source Sans Pro
	$Source_Sans_Pro->font_family = esc_html('Source Sans Pro');
	$Source_Sans_Pro->font_styles = "200,200italic,300,300italic,regular,italic,600,600italic,700,700italic,800,800italic,900,900italic";
    $Source_Sans_Pro->font_types = "200 light regular:200:normal,200 light italic:200:italic,300 light regular:300:normal,300 light italic:300:italic,400 regular:400:normal,400 italic:400:italic,600 bold regular:600:normal,600 bold italic:600:italic,700 bold regular:700:normal,700 bold italic:700:italic,800 bold regular:800:normal,800 bold italic:800:italic,900 bold regular:900:normal,900 bold italic:900:italic";
	// Adding "Source Sans Pro" font in return variable
	$return[] = $Source_Sans_Pro;
	// Adding: Nunito Sans
	$Nunito_Sans->font_family = esc_html('Nunito Sans');
	$Nunito_Sans->font_styles = "200,200italic,300,300italic,regular,italic,600,600italic,700,700italic,800,800italic,900,900italic";
    $Nunito_Sans->font_types = "200 light regular:200:normal,200 light italic:200:italic,300 light regular:300:normal,300 light italic:300:italic,400 regular:400:normal,400 italic:400:italic,600 bold regular:600:normal,600 bold italic:600:italic,700 bold regular:700:normal,700 bold italic:700:italic,800 bold regular:800:normal,800 bold italic:800:italic,900 bold regular:900:normal,900 bold italic:900:italic";
	// Adding "Nunito Sans" font in return variable
	$return[] = $Nunito_Sans;
	// *** Removing: Montserrat font as VC is already providing but with less options
	foreach( $return as $key=>$val ){
		if( !empty($val->font_family) && $val->font_family == 'Montserrat' ){
			unset( $return[$key] );
		}
	}
	// *** Adding: Montserrat
	$Montserrat->font_family = esc_html('Montserrat');
	$Montserrat->font_styles = "100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i";
    $Montserrat->font_types = "100 Thin:100:normal,100 Thin Italic:100:normal,200 Extra-Light:200:normal,200 Extra-light Italic:200:italic,300 Light:300:normal,300 Light Italic:300:italic,400 Regular:400:normal,400 Regular Italic:400:italic,500 Medium:500:normal,500 Medium Italic:500:italic,600 Semi-bold:600:normal,600 Semi-bold Italic:600:italic,700 Bold:700:normal,700 Bold Italic:700:italic,800 Extra-bold:800:normal,800 Extra-bold Italic:800:italic,900 Black:900:normal,900 Black Italic:900:italic";
	// Adding "Nunito Sans" font in return variable
	$return[] = $Montserrat;
	// *** Removing: Oswald font as VC is already providing but with less options
	foreach( $return as $key=>$val ){
		if( !empty($val->font_family) && $val->font_family == 'Oswald' ){
			unset( $return[$key] );
		}
	}
	// *** Adding: Oswald
	$Oswald->font_family = esc_html('Oswald');
	$Oswald->font_styles = "200,200i,300,300i,400,400i,500,500i,600,600i,700,700i";
    $Oswald->font_types = "200 Extra-Light:200:normal,200 Extra-light Italic:200:italic,300 Light:300:normal,300 Light Italic:300:italic,400 Regular:400:normal,400 Regular Italic:400:italic,500 Medium:500:normal,500 Medium Italic:500:italic,600 Semi-bold:600:normal,600 Semi-bold Italic:600:italic,700 Bold:700:normal,700 Bold Italic:700:italic";
	// Adding "Nunito Sans" font in return variable
	$return[] = $Oswald;
	// again reverse
	$return = array_reverse($return);
	asort($return);
	return $return;
}
}
add_filter('vc_google_fonts_get_fonts_filter', 'themestek_add_google_fonts');
/*************************************************************************************/
/********************* Modifying TAB SECTION adding our own icon picker ***********************/
if( function_exists('vc_map_update') ){
	function themestek_vc_edit_tab_element(){
		$params = vc_map_integrate_shortcode( 'vc_tta_section');
		$new_params = array();
		// adding new icon library
		foreach( $params as $key=>$param ){
			if( isset($param['param_name']) && $param['param_name']=='i_type' ){
				// adding new icon library
				$libraries = array_merge(
					array( esc_html__('Liviza Special Icons','liviza') => 'themestek_liviza' ),
					$param['value']
				);
				$param['value'] = $libraries;
				// adding new option
				$new_params[] = $param;
				// adding icon picker : themestek_liviza
				$new_params[] = array(
					'type'        => 'themestek_iconpicker',
					'heading'     => esc_html__( 'Icon', 'liviza' ),
					'param_name'  => 'i_icon_themestek_liviza',
					'value'       => 'flaticon-healthy-breakfast', // default value to backend editor admin_label
					'settings'    => array(
						'emptyIcon'    => false, // default true, display an "EMPTY" icon?
						'type'         => 'themestek_liviza',
					),
					'dependency'  => array(
						'element'  => 'i_type',
						'value'    => 'themestek_liviza',
					),
					'description'      => esc_html__( 'Select icon from library.', 'liviza' ),
					'edit_field_class' => 'vc_col-sm-9 vc_column',
				);
			} else {
				$new_params[] = $param;
			}
		}
		vc_map_update( 'vc_tta_section', array( 'params'=>$new_params ) );
	}
	add_action( 'vc_after_init', 'themestek_vc_edit_tab_element' );
}
