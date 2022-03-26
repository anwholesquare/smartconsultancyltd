<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}
$params = array(
	array(
		'type'			=> 'textfield',
		'heading'		=> esc_html__( 'Widget title', 'liviza' ),
		'param_name'	=> 'title',
		'description'	=> esc_html__( 'Enter text used as widget title (Note: located above content element).', 'liviza' ),
	),
	array(
		'type'			=> 'themestek_attach_image',
		'heading'		=> esc_html__( 'Image', 'liviza' ),
		'param_name'	=> 'image',
		'value'			=> '',
		'description'	=> esc_html__( 'Select image from media library.', 'liviza' ),
		'admin_label'	=> true,
	),
	array(
		'type' => 'dropdown',
		'heading' => esc_html__( 'Image alignment', 'liviza' ),
		'param_name' => 'alignment',
		'value' => array(
			esc_html__( 'Left', 'liviza' ) => 'left',
			esc_html__( 'Right', 'liviza' ) => 'right',
			esc_html__( 'Center', 'liviza' ) => 'center',
		),
		'description' => esc_html__( 'Select image alignment.', 'liviza' ),
	),
	array(
		'type'			=> 'textarea_raw_html',
		'heading'		=> esc_html__( 'Caption Text', 'liviza' ),
		'param_name'	=> 'caption_text',
		'description'	=> esc_html__( 'This text will appear over image with some different design.', 'liviza' ),
		'edit_field_class' => 'vc_col-xs-12 themestek-normalize-html-input',
	),
	array(
		'type' => 'textfield',
		'heading' => esc_html__( 'Extra class name', 'liviza' ),
		'param_name' => 'el_class',
		'description' => esc_html__( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'liviza' ),
	),
	array(
		'type' => 'css_editor',
		'heading' => esc_html__( 'CSS box', 'liviza' ),
		'param_name' => 'css',
		'group' => esc_html__( 'Design Options', 'liviza' ),
	),
);
global $themestek_sc_params_single_image;
$themestek_sc_params_single_image = $params;
vc_map( array(
	'name'		=> esc_html__( 'ThemeStek Single Image', 'liviza' ),
	'base'		=> 'themestek-single-image',
	'icon'		=> 'icon-themestek-vc',
	'category'	=> array( esc_html__( 'THEMESTEK', 'liviza' ) ),
	'params'	=> $params,
) );
