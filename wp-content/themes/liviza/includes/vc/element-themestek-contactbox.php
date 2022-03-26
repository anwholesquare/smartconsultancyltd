<?php
/* Options */
$params = array(
	array(
		"type"        => "textfield",
		"holder"      => "div",
		"class"       => "",
		"heading"     => esc_html__("Phone",'liviza'),
		"description" => esc_html__("Write phone number here. Example: (+01) 123 456 7890",'liviza'),
		"param_name"  => "phone",
	),
	array(
		"type"        => "textfield",
		"holder"      => "div",
		"class"       => "",
		"heading"     => esc_html__("Email",'liviza'),
		"description" => esc_html__("Write email here. Example: info@example.com",'liviza'),
		"param_name"  => "email",
	),
	array(
		"type"        => "textfield",
		"holder"      => "div",
		"class"       => "",
		"heading"     => esc_html__("Website",'liviza'),
		"description" => esc_html__("Write website URL here.",'liviza'),
		"param_name"  => "website",
	),
	array(
		"type"        => "textarea",
		"holder"      => "div",
		"class"       => "",
		"heading"     => esc_html__("Address",'liviza'),
		"description" => esc_html__("Write address here. You can write in multi-line too.",'liviza'),
		"param_name"  => "address",
	),
	array(
		"type"        => "textarea",
		"holder"      => "div",
		"class"       => "",
		"heading"     => esc_html__("Time",'liviza'),
		"description" => esc_html__("Write time here. You can write in multi-line too.",'liviza'),
		"param_name"  => "time",
	),
);
$params    = array_merge( $params, array( vc_map_add_css_animation() ), array( themestek_vc_ele_extra_class_option() ), array( themestek_vc_ele_css_editor_option() ) );
global $themestek_sc_params_contactbox;
$themestek_sc_params_contactbox = $params;
vc_map( array(
	"name"     => esc_html__("ThemeStek Contact Details Box",'liviza'),
	"base"     => "themestek-contactbox",
	"class"    => "",
	'category' => esc_html__( 'THEMESTEK', 'liviza' ),
	"icon"     => "icon-themestek-vc",
	"params"   => $params
) );