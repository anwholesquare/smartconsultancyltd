<?php
/* Options */
$icons_params = vc_map_integrate_shortcode( 'themestek-icon', 'i_', esc_html__('Icon','liviza'), array(
	'include_only_regex' => '/^(type|icon_\w*)/',
	// we need only type, icon_fontawesome, icon_blabla..., NOT color and etc
), array(
	'element' => 'boxstyle',
	'value' => array('style-1','style-2'),
) );
$icons_params_new = array();	
/* Adding class for two column */
foreach( $icons_params as $param ){
	$icons_params_new[] = $param;
}
$allParams = array(
	array(
		'type'			=> 'themestek_imgselector',
		'heading'		=> esc_html__( 'Fact In Digits box Style', 'liviza' ),
		'description'	=> esc_html__( 'Select box style for Facts in Digits box. This will show rotating number with icon and heading.', 'liviza' ),
		'param_name'	=> 'boxstyle',
		'std'			=> 'style-1',
		'value'			=> themestek_global_template_list('fidbox', false),
		'group'  	    => esc_html__( 'Box Style', 'liviza' ),
	),
	array(
		'type'			=> 'textfield',
		'holder'		=> 'div',
		'class'			=> '',
		'heading'		=> esc_html__('Heading Text', 'liviza'),
		'param_name'	=> 'title',
		'std'			=> esc_html__('Title Text', 'liviza'),
		'description'	=> esc_html__('Enter text for the title. Leave blank if no title is needed.', 'liviza'),
		'group'		    => esc_html__( 'Content', 'liviza' ),
	),
	array(
		'type'			=> 'textfield',
		'holder'		=> 'div',
		'class'			=> '',
		'heading'		=> esc_html__('Small Description Text', 'liviza'),
		'param_name'	=> 'desc',
		'std'			=> esc_html__('Small Description Text', 'liviza'),
		'description'	=> esc_html__('Enter text for small desciption. Leave blank if no desciption is needed.', 'liviza'),
		'group'		    => esc_html__( 'Content', 'liviza' ),
		'dependency'	=> array(
			'element'		=> 'boxstyle',
			'value'			=> array( 'style-1' ),
		),
	),
	array(
		'type'				=> 'textfield',
		'holder'			=> 'div',
		'class'				=> '',
		'heading'			=> esc_html__('Rotating Number', 'liviza'),
		'param_name'		=> 'digit',
		'std'				=> '85',
		'description'		=> esc_html__('Enter rotating number digit here.', 'liviza'),
		'group'		    => esc_html__( 'Content', 'liviza' ),
	),
	array(
		'type'				=> 'textfield',
		'holder'			=> 'div',
		'heading'			=> esc_html__('Text Before Number', 'liviza'),
		'param_name'		=> 'before',
		'description'		=> esc_html__('Enter text which appear just before the rotating numbers.', 'liviza'),
		'edit_field_class'	=> 'vc_col-sm-6 vc_column',
		'group'		    => esc_html__( 'Content', 'liviza' ),
	),
	array(
		"type"			=> "dropdown",
		"holder"		=> "div",
		"heading"		=> esc_html__("Text Style",'liviza'),
		"param_name"	=> "beforetextstyle",
		"description"	=> esc_html__('Select text style for the text.', 'liviza') . '<br>' . esc_html__('Superscript text appears half a character above the normal line, and is rendered in a smaller font.','liviza') . '<br>' . esc_html__('Subscript text appears half a character below the normal line, and is sometimes rendered in a smaller font.','liviza'),
		'value' => array(
			esc_html__( 'Superscript', 'liviza' ) => 'sup',
			esc_html__( 'Subscript', 'liviza' )   => 'sub',
			esc_html__( 'Normal', 'liviza' )      => 'span',
		),
		'std' => 'sup',
		'edit_field_class'	=> 'vc_col-sm-6 vc_column',
		'group'		    => esc_html__( 'Content', 'liviza' ),
	),
	array(
		'type'				=> 'textfield',
		'holder'			=> 'div',
		'class'				=> '',
		'heading'			=> esc_html__('Text After Number', 'liviza'),
		'param_name'		=> 'after',
		'description'		=> esc_html__('Enter text which appear just after the rotating numbers.', 'liviza'),
		'edit_field_class'	=> 'vc_col-sm-6 vc_column',
		'group'		    => esc_html__( 'Content', 'liviza' ),
	),
	array(
		"type"			=> "dropdown",
		"holder"		=> "div",
		"class"			=> "",
		"heading"		=> esc_html__("Text Style",'liviza'),
		"param_name"	=> "aftertextstyle",
		"description"	=> esc_html__('Select text style for the text.', 'liviza') . '<br>' . esc_html__('Superscript text appears half a character above the normal line, and is rendered in a smaller font.','liviza') . '<br>' . esc_html__('Subscript text appears half a character below the normal line, and is sometimes rendered in a smaller font.','liviza'),
		'value' => array(
			esc_html__( 'Superscript', 'liviza' ) => 'sup',
			esc_html__( 'Subscript', 'liviza' )   => 'sub',
			esc_html__( 'Normal', 'liviza' )      => 'span',
		),
		'std' => 'sub',
		'edit_field_class'	=> 'vc_col-sm-6 vc_column',
		'group'		    => esc_html__( 'Content', 'liviza' ),
	),
	array(
		'type'			=> 'textfield',
		'holder'		=> 'div',
		'class'			=> '',
		'heading'		=> esc_html__('Rotating digit Interval', 'liviza'),
		'param_name'	=> 'interval',
		'std'			=> '5',
		'description'	=> esc_html__('Enter rotating interval number here.', 'liviza'),
		'group'		    => esc_html__( 'Content', 'liviza' ),
	)
);
$extra_class = themestek_vc_ele_extra_class_option();
$extra_class['group'] = esc_html__( 'Content', 'liviza' );
$css_animation = vc_map_add_css_animation();
$css_animation['group'] = esc_html__( 'Content', 'liviza' );
// merging all options
$params = array_merge( $allParams, $icons_params_new );
// merging extra options like css animation, css options etc
$params = array_merge(
	$params,
	array( $css_animation ),
	array( $extra_class ),
	array( themestek_vc_ele_css_editor_option() )
);
global $themestek_sc_params_facts_in_digits;
$themestek_sc_params_facts_in_digits = $params;
vc_map( array(
	'name'		=> esc_html__( 'ThemeStek Facts in digits', 'liviza' ),
	'base'		=> 'themestek-facts-in-digits',
	'class'		=> '',
	'icon'		=> 'icon-themestek-vc',
	'category'	=> esc_html__( 'THEMESTEK', 'liviza' ),
	'params'	=> $params
) );
