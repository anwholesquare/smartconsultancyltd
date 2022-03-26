<?php
/* Options for ThemeStek Servicebox */
$bgcolor_custom = array();
$bgcolor_custom[__( 'Transparent', 'liviza' )] = 'transparent';
$bgcolor_custom[__( 'Skin color', 'liviza' )]  = 'skincolor';
$boxcolor =   array_merge( $bgcolor_custom , themestek_vc_get_shared( 'colors-dashed' ) ) ;
$heading_element = vc_map_integrate_shortcode( 'themestek-heading', '', esc_html__('Content','liviza'),
	array(
		'exclude' => array(
			'txt_align',
			'seperator',
			'reverse_heading',
			'el_class',
			'css_animation',
			'css',
		),
	)
);
if ( is_array( $heading_element ) && ! empty( $heading_element ) ) {
	foreach ( $heading_element as $key => $param ) {
		if ( is_array( $param ) && isset( $param['param_name'] ) ){
			if( $param['param_name'] == 'content' ){
				$heading_element[$key]['value'] = esc_html('Lorem ipsum dolor sit amet,con sec tetur adipisicing elit,sed do.');
				$heading_element[$key]['type'] = 'textarea';
			} else if( $param['param_name'] == 'reverse_heading' ){
				$heading_element[$key]['std'] = 'no';
				$heading_element[$key]['value'] = 'no';
			}
		}
	}
}
$btn_element = vc_map_integrate_shortcode( 'themestek-btn', 'btn_', esc_html__('Button','liviza'),
	array(
		'exclude' => array(
			'style',
			'shape',
			'color',
			'size',
			'font_weight',
			'align',
			'i_align',
			'gradient_color_1',
			'gradient_color_2',
			'gradient_custom_color_1',
			'gradient_custom_color_2',
			'gradient_text_color',
			'custom_background',
			'custom_text',
			'outline_custom_color',
			'outline_custom_hover_background',
			'outline_custom_hover_text',
			'button_block',
			'css_animation',
			'css',
		),
	),
	array(
		'element' => 'show_btn',
		'value'   => 'yes',
	)
);
// Extra Class Name
$themestek_extra_class = themestek_vc_ele_extra_class_option();
$themestek_extra_class['group'] = esc_html__( 'Content', 'liviza' );
$params = array_merge(
	array(
		array(
			'type'			=> 'themestek_imgselector',
			'heading'		=> esc_html__( 'Service Box Style', 'liviza' ),
			'description'	=> esc_html__( 'Select Service box style.', 'liviza' ),
			'param_name'	=> 'boxstyle',
			'std'			=> 'style-3',
			'value'			=> themestek_global_template_list('iconheadingbox', false),
			'group'		  => esc_html__( 'Box Style', 'liviza' ),
		),
	),
	// ICON TYPE
	array(
		array(
			'type'        => 'dropdown',
			'heading'     => esc_html__( 'Icon', 'liviza' ),
			'description' => esc_html__( 'Show/hide icon or show text (in place of icon).', 'liviza' ),
			'param_name'  => 'icon_type',
			'std'         => 'icon',
			'value'       => array(
				esc_html__( 'Show icon', 'liviza' )	=> 'icon',
				esc_html__( 'No icon', 'liviza' )	=> 'none',
				esc_html__( 'Show small text in place of icon', 'liviza' )	=> 'text',
			),
			'group'		  => esc_html__( 'Icon', 'liviza' ),
		),
	),
	// ICON TYPE: ICON
	vc_map_integrate_shortcode( 'themestek-icon', 'i_', esc_html__( 'Icon', 'liviza' ),
		array(
			'include_only_regex' => '/^(type|icon_\w*)/',
		),
		array(
			'element' => 'icon_type',
			'value'     => 'icon',
		)
	),
	// ICON TYPE: TEXT
	array(
		array(
			'type'        => 'textfield',
			'heading'     => esc_html__( 'Small text', 'liviza' ),
			'param_name'  => 'small_text',
			'value'		  => '01',
			'description' => esc_html__( 'This text will appear in place of icon. This is useful if you like to show small text like "01" or "Hi" small texts.', 'liviza' ),
			'group'		  => esc_html__( 'Icon', 'liviza' ),
			'dependency'  => array(
				'element'	=> 'icon_type',
				'value'		=> array('text'),
			)
		),
		array(
			'type'        => 'textfield',
			'heading'     => esc_html__( 'Big Number After icon', 'liviza' ),
			'param_name'  => 'big_number_text',
			'value'		  => '01',
			'description' => esc_html__( 'This text will appear after the icon as big text.', 'liviza' ),
			'group'		  => esc_html__( 'Icon', 'liviza' ),
			'dependency'  => array(
				'element'	=> 'boxstyle',
				'value'		=> array( 'style-4' ),
			)
		),
	),
	// Heading
	$heading_element,
	array(
		array(
			'type'        => 'dropdown',
			'heading'     => esc_html__( 'Show button', 'liviza' ),
			'description' => esc_html__( 'Show/hide button', 'liviza' ),
			'param_name'  => 'show_btn',
			'std'         => 'no',
			'value'       => array(
				esc_html__( 'Yes', 'liviza' )	=> 'yes',
				esc_html__( 'No', 'liviza' )	=> 'no',
			),
			'group'		  => esc_html__( 'Content', 'liviza' ),
		),
	),
	// Button
	$btn_element,
	array(
		/// cta3
		vc_map_add_css_animation(),
		$themestek_extra_class,
		themestek_vc_ele_css_editor_option(),
		themestek_responsive_padding_margin_option(),
	)
);
// Changing modifying, adding extra options
$i = 0;
foreach( $params as $param ){
	$param_name = (isset($param['param_name'])) ? $param['param_name'] : '' ;
	if( $param_name == 'txt_align' ){ // Remove Text Alignment option
		$params[$i]['dependency'] = array(  // This is to hide this option forever
			'element'  => 'btn_style',
			'value'    => array( 'abcdefg' )
		);
	} else if( $param_name == 'h2' ){
		$params[$i]['std']         = esc_html__( 'This is heading', 'liviza' );
	} else if( $param_name == 'btn_title' ){
		$params[$i]['std']         = '';
		$params[$i]['description'] = esc_html__( 'NOTE: Leave this blank to remove the button.', 'liviza' );
	} else if( $param_name == 'btn_add_icon' ){
		$params[$i]['std']   = false;
	} else if( $param_name == 'h2_use_theme_fonts' ){
		$params[$i]['std'] = 'yes';
	} else if( $param_name == 'h4_use_theme_fonts' ){
		$params[$i]['std'] = 'yes';
	} else if( $param_name == 'h2_google_fonts' ){
		$params[$i]['std'] = 'font_family:Arimo%3Aregular%2Citalic%2C700%2C700italic|font_style:700%20bold%20regular%3A700%3Anormal';
	} else if( $param_name == 'h4_google_fonts' ){
		$params[$i]['std'] = 'font_family:Lato%3A100%2C100italic%2C300%2C300italic%2Cregular%2Citalic%2C700%2C700italic%2C900%2C900italic|font_style:300%20light%20regular%3A300%3Anormal';
	} else if( $param_name == 'css_animation' ){
		$params[$i]['group'] = esc_html__( 'Animations', 'liviza' );
	}
	$i++;
} // Foreach
global $themestek_sc_params_iconheadingbox;
$themestek_sc_params_iconheadingbox = $params;
vc_map( array(
	'name'        => esc_html__( 'ThemeStek Icon Heading Box', 'liviza' ),
	'base'        => 'themestek-iconheadingbox',
	"icon"        => "icon-themestek-vc",
	'category'    => esc_html__( 'THEMESTEK', 'liviza' ),
	'params'      => $params,
) );