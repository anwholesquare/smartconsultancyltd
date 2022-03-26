<?php
/* Options for ThemeStek Icon */
/*
 * Icon Element
 * @since 4.4
 */
/**
 *  Show selected icon library only
 */
global $liviza_theme_options;
$icon_library = array();
if( function_exists('tste_liviza_icon_libraries') ){
	$icon_library = tste_liviza_icon_libraries();
}
$icon_dropdown_array = array();
$icon_element_array  = array();
if( is_array($icon_library) && count($icon_library)>0 ){
foreach( $icon_library as $library_id=>$library ){
	$icon_dropdown_array[$library[0]] = $library_id;
	$icon_element_array[]  = array(
		'type'        => 'themestek_iconpicker',
		'heading'     => esc_html__( 'Icon', 'liviza' ),
		'param_name'  => 'icon_'.$library_id,
		'value'       => $library[1], // default value to backend editor admin_label
		'settings'    => array(
			'emptyIcon'    => false, // default true, display an "EMPTY" icon?
			'type'         => $library_id,
		),
		'dependency'  => array(
			'element'   => 'type',
			'value'     => $library_id,
		),
		'description' => esc_html__( 'Select icon from library.', 'liviza' ),
		'edit_field_class' => 'vc_col-sm-9 vc_column',
	);
}
}
/* Select icon library code end here */
// All icon related elements
$icon_elements = array_merge(
	array(
		array(
			'type'        => 'dropdown',
			'heading'     => esc_html__( 'Icon library', 'liviza' ),
			'value'       => $icon_dropdown_array,
			'std'         => '',
			'admin_label' => true,
			'param_name'  => 'type',
			'description' => esc_html__( 'Select icon library.', 'liviza' ),
			'edit_field_class' => 'vc_col-sm-3 vc_column',
		)
	),
	$icon_element_array
);
$allparams = array(
	array(
		'type'        => 'dropdown',
		'heading'     => esc_html__( 'Icon color', 'liviza' ),
		'param_name'  => 'color',
		'value'       => array_merge( 
			themestek_vc_get_shared( 'colors' ),
			array(
				esc_html__( 'Classic Grey', 'liviza' )      => 'bar_grey',
				esc_html__( 'Classic Blue', 'liviza' )      => 'bar_blue',
				esc_html__( 'Classic Turquoise', 'liviza' ) => 'bar_turquoise',
				esc_html__( 'Classic Green', 'liviza' )     => 'bar_green',
				esc_html__( 'Classic Orange', 'liviza' )    => 'bar_orange',
				esc_html__( 'Classic Red', 'liviza' )       => 'bar_red',
				esc_html__( 'Classic Black', 'liviza' )     => 'bar_black',
			),
			array( esc_html__( 'Custom color', 'liviza' ) => 'custom' )
		),
		'std'         => 'skincolor',
		'description' => esc_html__( 'Select icon color.', 'liviza' ),
		'param_holder_class' => 'themestek_vc_colored-dropdown',
	),
	array(
		'type'        => 'colorpicker',
		'heading'     => esc_html__( 'Custom color', 'liviza' ),
		'param_name'  => 'custom_color',
		'description' => esc_html__( 'Select custom icon color.', 'liviza' ),
		'dependency'  => array(
			'element'   => 'color',
			'value'     => 'custom',
		),
	),
	array(
		'type'        => 'dropdown',
		'heading'     => esc_html__( 'Background shape', 'liviza' ),
		'param_name'  => 'background_style',
		'value'       => array(
			esc_html__( 'None', 'liviza' ) => '',
			esc_html__( 'Circle', 'liviza' ) => 'rounded',
			esc_html__( 'Square', 'liviza' ) => 'boxed',
			esc_html__( 'Rounded', 'liviza' ) => 'rounded-less',
			esc_html__( 'Outline Circle', 'liviza' ) => 'rounded-outline',
			esc_html__( 'Outline Square', 'liviza' ) => 'boxed-outline',
			esc_html__( 'Outline Rounded', 'liviza' ) => 'rounded-less-outline',
		),
		'std'         => '',
		'description' => esc_html__( 'Select background shape and style for icon.', 'liviza' ),
		'param_holder_class' => 'themestek-simplify-textarea',
	),
	array(
		'type'        => 'dropdown',
		'heading'     => esc_html__( 'Background color', 'liviza' ),
		'param_name'  => 'background_color',
		'value'       => array_merge( array( esc_html__( 'Transparent', 'liviza' ) => 'transparent' ), themestek_vc_get_shared( 'colors' ), array( esc_html__( 'Custom color', 'liviza' ) => 'custom' ) ),
		'std'         => 'grey',
		'description' => esc_html__( 'Select background color for icon.', 'liviza' ),
		'param_holder_class' => 'themestek_vc_colored-dropdown',
		'dependency'  => array(
			'element'   => 'background_style',
			'not_empty' => true,
		),
	),
	array(
		'type'        => 'colorpicker',
		'heading'     => esc_html__( 'Custom background color', 'liviza' ),
		'param_name'  => 'custom_background_color',
		'description' => esc_html__( 'Select custom icon background color.', 'liviza' ),
		'dependency'  => array(
			'element'   => 'background_color',
			'value'     => 'custom',
		),
	),
	array(
		'type'        => 'dropdown',
		'heading'     => esc_html__( 'Size', 'liviza' ),
		'param_name'  => 'size',
		'value'       => array_merge( themestek_vc_get_shared( 'sizes' ), array( 'Extra Large' => 'xl' ) ),
		'std'         => 'md',
		'description' => esc_html__( 'Icon size.', 'liviza' )
	),
	array(
		'type'       => 'dropdown',
		'heading'    => esc_html__( 'Icon alignment', 'liviza' ),
		'param_name' => 'align',
		'value'      => array(
			esc_html__( 'Left', 'liviza' )   => 'left',
			esc_html__( 'Right', 'liviza' )  => 'right',
			esc_html__( 'Center', 'liviza' ) => 'center',
		),
		'std'         => 'left',
		'description' => esc_html__( 'Select icon alignment.', 'liviza' ),
	),
	array(
		'type'        => 'vc_link',
		'heading'     => esc_html__( 'URL (Link)', 'liviza' ),
		'param_name'  => 'link',
		'description' => esc_html__( 'Add link to icon.', 'liviza' )
	),
	vc_map_add_css_animation(),
	themestek_vc_ele_extra_class_option(),
	themestek_vc_ele_css_editor_option(),
);
// All params
$params = array_merge( $icon_elements, $allparams );
global $themestek_sc_params_icon;
$themestek_sc_params_icon = $params;
vc_map( array(
	'name'     => esc_html__( 'ThemeStek Icon', 'liviza' ),
	'base'     => 'themestek-icon',
	'icon'     => 'icon-themestek-vc',
	'category' => array( esc_html__( 'THEMESTEK', 'liviza' ) ),
	'params'   => $params,
	'js_view'  => 'VcIconElementView_Backend',
) );
