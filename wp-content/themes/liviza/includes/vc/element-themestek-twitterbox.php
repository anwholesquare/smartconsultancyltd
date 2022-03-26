<?php
/* Options */
$allParams = array(
		array(
			"type"			=> "textfield",
			"holder"		=> "div",
			"class"			=> "",
			"heading"		=> esc_html__("Twitter handle (Twitter Username)",'liviza'),
			"param_name"	=> "username",
			"description"	=> esc_html__('Twitter user name. Example "envato".','liviza')
		),
		array(
			"type"			=> "textfield",
			"holder"		=> "div",
			"class"			=> "",
			"heading"		=> esc_html__('"Follow us" text after big icon','liviza'),
			"param_name"	=> "followustext",
			"description"	=> esc_html__('(optional) Follow us text after the big Twitter icon so user can click on it and go to Twitter profile page.','liviza')
		),
		array(
			"type"			=> "dropdown",
			"holder"		=> "div",
			"class"			=> "",
			"heading"		=> esc_html__("Show Tweets",'liviza'),
			"param_name"	=> "show",
			"description"	=> esc_html__('How many Tweets you like to show.','liviza'),
			'value' => array(
				esc_html__( '1', 'liviza' ) => '1',
				esc_html__( '2', 'liviza' ) => '2',
				esc_html__( '3', 'liviza' ) => '3',
				esc_html__( '4', 'liviza' ) => '4',
				esc_html__( '5', 'liviza' ) => '5',
				esc_html__( '6', 'liviza' ) => '6',
				esc_html__( '7', 'liviza' ) => '7',
				esc_html__( '8', 'liviza' ) => '8',
				esc_html__( '9', 'liviza' ) => '9',
				esc_html__( '10', 'liviza' ) => '10',
			),
			'std' => '3',
		),
	);
$boxParams  = themestek_box_params();
$css_editor = array( themestek_vc_ele_css_editor_option() );
$params = array_merge( $allParams, $boxParams, $css_editor );
// Changing default values
$i = 0;
foreach( $params as $param ){
	$param_name = (isset($param['param_name'])) ? $param['param_name'] : '' ;
	if( $param_name == 'column' ){
		$params[$i]['std'] = 'one';
	} else if( $param_name == 'view' ){
		$params[$i]['std'] = 'carousel';
	} else if( $param_name == 'carousel_dots' ){
		$params[$i]['std'] = 'true';
	} else if( $param_name == 'carousel_nav' ){ // Removing "About Carousel" option as it's not used here.
		unset( $params[$i]['value']["Above Carousel"] );
	}
	$i++;
}
global $themestek_sc_params_twitterbox;
$themestek_sc_params_twitterbox = $params;
vc_map( array(
	"name"        => esc_html__("ThemeStek Twitter Box",'liviza'),
	"base"        => "themestek-twitterbox",
	"class"       => "",
	'category' => esc_html__( 'THEMESTEK', 'liviza' ),
	"icon"        => "icon-themestek-vc",
	"params"      => $params,
) );