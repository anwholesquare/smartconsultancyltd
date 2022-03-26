<?php
/**
 *  ThemeStek: BMI Calculator Box
 */
$params = array_merge(
	array(
		array(
			'type'			=> 'themestek_imgselector',
			'heading'		=> esc_html__( 'BMI Calculator View Style', 'liviza' ),
			'description'	=> esc_html__( 'Select BMI Calculator view style.', 'liviza' ),
			'param_name'	=> 'style',
			'std'			=> 'style-1',
			'value'			=> themestek_global_template_list('bmi-calculator', false),
		),
	),
	array(
		/// cta3
		vc_map_add_css_animation(),
		themestek_vc_ele_extra_class_option(),
		themestek_vc_ele_css_editor_option(),
	)
);

global $themestek_vc_bmi_calculator;
$themestek_vc_bmi_calculator = $params;
vc_map( array(
	'name'		=> esc_html__( 'ThemeStek BMI Calculator', 'liviza' ),
	'base'		=> 'themestek-bmi-calculator',
	"class"     => "",
	"icon"      => "icon-themestek-vc",
	'category'	=> esc_html__( 'THEMESTEK', 'liviza' ),
	'params'	=> $params,
) );
