<?php
$heading_element = vc_map_integrate_shortcode( 'themestek-heading', '', esc_html__('Heading','liviza'),
	array(
		'exclude' => array(
			'el_class',
			'css',
			'css_animation'
		),
	)
);
$boxParams = themestek_box_params('staticbox');
// each staticbox options
$param_group = array(
	array(
		'type' => 'attach_image',
		'heading' => esc_html__( 'Box Image', 'liviza' ),
		'param_name' => 'boximage',
		'description' => esc_html__( 'Select image.', 'liviza' ),
		'admin_label' => true,
		'edit_field_class'	=> 'vc_col-sm-4 vc_column',
	),
	array(
		'type' => 'textfield',
		'heading' => esc_html__( 'Box Title', 'liviza' ),
		'param_name' => 'label',
		'description' => esc_html__( 'Enter text used as title of bar.', 'liviza' ),
		'admin_label' => true,
	),
	array(
		'type' => 'textarea',
		'heading' => esc_html__( 'Highlight Text', 'liviza' ),
		'param_name' => 'smalltext',
		'description' => esc_html__( 'Enter small text. This text will appear on image.', 'liviza' ),
		'admin_label' => true,
	),
);
$params =  array(
	array(
		'type'			=> 'textfield',
		'heading'		=> esc_html__( 'Box Image size', 'liviza' ),
		'param_name'	=> 'img_size',
		'value'			=> 'full',
		'description'	=> '<strong>'.esc_html__( 'NOTE:', 'liviza' ) . '</strong> ' . esc_html__( 'This is common for all images in all boxes. This will apply to all images in all boxes.', 'liviza' ) . '<br>' . esc_html__( 'Enter image size (Example: "thumbnail", "medium", "large", "full" or other sizes defined by theme). Alternatively enter size in pixels (Example: 200x100 (Width x Height)).', 'liviza' ),
	),
	array(
		'type' => 'param_group',
		'heading' => esc_html__( 'Boxes', 'liviza' ),
		'param_name' => 'values',
		'description' => esc_html__( 'Enter values for graph - value, title and color.', 'liviza' ),
		'value' => urlencode( json_encode( array(
			array(
				'attach_image'	=> '',
				'label'			=> esc_html('Surgical Procedures'),
				'smalltext'		=> esc_html('Doctor Timetable Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt.'),
			),
			array(
				'attach_image'	=> '',
				'label'			=> esc_html('Refractive Nature'),
				'smalltext'		=> esc_html('Doctor Timetable Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt.'),
			),
			array(
				'attach_image'	=> '',
				'label'			=> esc_html('Transitions Lenses'),
				'smalltext'		=> esc_html('Doctor Timetable Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt.'),
			),
		) ) ),
		'params' => $param_group,
	),
);
$params = array_merge(
	$heading_element,
	$params,
	array( vc_map_add_css_animation() ),
	$boxParams,
	array( themestek_vc_ele_extra_class_option() ),
	array( themestek_vc_ele_css_editor_option() )
);
global $themestek_sc_params_staticbox;
$themestek_sc_params_staticbox = $params;
vc_map( array(
	'name'		=> esc_html__( 'ThemeStek Static Content box', 'liviza' ),
	'base'		=> 'themestek-staticbox',
	'class'		=> '',
	'icon'		=> 'icon-themestek-vc',
	'category'	=> esc_html__( 'THEMESTEK', 'liviza' ),
	'params'	=> $params
) );
