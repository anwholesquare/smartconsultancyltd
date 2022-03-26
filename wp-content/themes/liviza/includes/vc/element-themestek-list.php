<?php
/* Options */
$allParams = array(
	array(
		'type'       => 'dropdown',
		'heading'    => esc_html__( 'List Type', 'liviza' ),
		'param_name' => 'type',
		'value'      => array(
			esc_html__( 'None', 'liviza' )                    => 'none',
			esc_html__( 'Icon', 'liviza' )                    => 'icon',
			esc_html__( 'Disc', 'liviza' )                    => 'disc',
			esc_html__( 'Circle', 'liviza' )                  => 'circle',
			esc_html__( 'Square', 'liviza' )                  => 'square',
			esc_html__( 'Decimal (1, 2, 3, 4)', 'liviza' )    => 'decimal',
			esc_html__( 'Alphabetic (A, B, C, D)', 'liviza' ) => 'upper-alpha',
			esc_html__( 'Roman (I, II, III, IV)', 'liviza' )  => 'roman',
		),
		'std'         => 'icon',
		'description' => esc_html__( 'Select list style.', 'liviza' ),
	),
	array(
		'type'       => 'dropdown',
		'heading'    => esc_html__( 'List icon color', 'liviza' ),
		'param_name' => 'icon_color',
		'value'      => array( esc_html__( 'Default (same as text color)', 'liviza' ) => '' ) + themestek_vc_get_shared( 'colors' ),
		'std'         => 'skincolor',
		'description' => esc_html__( 'Select icon color.', 'liviza' ),
		'param_holder_class' => 'themestek_vc_colored-dropdown',
		'edit_field_class'   => 'vc_col-sm-6 vc_column',
	),
	array(
		"type"        => "dropdown",
		"heading"     => esc_html__("Text Color", "liviza"),
		"description" => esc_html__("Select text color.", "liviza"),
		"param_name"  => "themestek_textcolor",
		'value'       => array( esc_html__( 'Default', 'liviza' ) => '' ) + themestek_vc_get_shared( 'colors' ),
		'param_holder_class' => 'themestek_vc_colored-dropdown',
		'edit_field_class'   => 'vc_col-sm-6 vc_column',
	),
	array(
		'type'       => 'dropdown',
		'heading'    => esc_html__( 'List Font size', 'liviza' ),
		'param_name' => 'textsize',
		'value'      => array(
			esc_html__( 'Default', 'liviza' )     => '',
			esc_html__( 'Small', 'liviza' )       => 'small',
			esc_html__( 'Medium', 'liviza' )      => 'medium',
			esc_html__( 'Large', 'liviza' )       => 'large',
			esc_html__( 'Extra Large', 'liviza' ) => 'xlarge',
		),
		'std'         => '',
		'description' => esc_html__( 'Select list font size. This will also apply to icon too', 'liviza' ),
	),
);
$icon_options = vc_map_integrate_shortcode(
	'themestek-icon',
	'icon_',
	'',
	array(
		'include_only_regex' => '/^(type|icon_\w*)/',
	),
	array(
		'element' => 'type',
		'value'   => 'icon',
	)
);
// Setting default icon for Font Awesome icon
foreach( $icon_options as $index=>$icon_option ){
	if( isset($icon_option['param_name']) && $icon_option['param_name']=='icon_icon_fontawesome' ){
		$icon_options[$index]['value'] = 'fa fa-angle-right';
	}
}
// each line
$lines = array();
$total = 20;
for( $x=1; $x <= $total ; $x++ ){
	$lines[] = array(
		'type'        => 'textarea_raw_html',
		'heading'     => sprintf( esc_html__( 'List Line %s','liviza' ), $x ),
		'param_name'  => 'line'.$x,
		'description' => esc_html__( 'Enter text for the list line. Some html tags are allowed.', 'liviza' ),
		'std'         => '',
		'value'       => '',
		'param_holder_class' => 'themestek-simplify-textarea',
	);
}
// Merge all parameters
$params = array_merge( $allParams, $icon_options, $lines, array( vc_map_add_css_animation() ), array( themestek_vc_ele_extra_class_option() ), array( themestek_vc_ele_css_editor_option() ) );
// Changing default values
$i = 0;
foreach( $params as $param ){
	$param_name = (isset($param['param_name'])) ? $param['param_name'] : '' ;
	if( $param_name == 'icon_type' ){
		$params[$i]['std']   = 'fontawesome';
	} else if( $param_name == 'icon_icon_fontawesome' ){
		$params[$i]['value'] = 'fa fa-caret-right';
		$params[$i]['std']   = 'fa fa-caret-right';
	} else if( $param_name == 'icon_icon_linecons' ){
		$params[$i]['value'] = 'vc_li vc_li-location';
		$params[$i]['std']   = 'vc_li vc_li-location';
	} else if( $param_name == 'icon_icon_themify' ){
		$params[$i]['value'] = 'themifyicon ti-angle-double-right';
		$params[$i]['std']   = 'themifyicon ti-angle-double-right';
	}
	$i++;
}
global $themestek_sc_params_list;
$themestek_sc_params_list = $params;
vc_map( array(
	'name'		=> esc_html__( 'ThemeStek List', 'liviza' ),
	'base'		=> 'themestek-list',
	'class'		=> '',
	'icon'		=> 'icon-themestek-vc',
	'category'	=> esc_html__( 'THEMESTEK', 'liviza' ),
	'params'	=> $params
) );