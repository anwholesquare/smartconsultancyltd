<?php
/**
 *  ThemeStek: Schedule Box
 */
	$params = array_merge(
		themestek_vc_heading_params(),
		array(
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Extra class name', 'liviza' ),
				'param_name'  => 'el_class',
				'description' => esc_html__( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'liviza' ),
			),
			array(
				'type'			=> 'param_group',
				'heading'		=> esc_html__( 'Timeline', 'liviza' ),
				'param_name'	=> 'timeline',
				'group'			=> esc_html__( 'Timeline', 'liviza' ),
				'description'	=> esc_html__( 'Set Service price', 'liviza' ),
				'value'			=> urlencode( json_encode( array (
					array (
					  'year'		=> esc_html__( '1981', 'liviza' ),
					  'title'		=> esc_html__( 'Founded in Berlin', 'liviza' ),
					  'short_desc'	=> esc_html__( 'Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin lorem', 'liviza' ),
					),
					array (
					  'year'		=> esc_html__( '1982', 'liviza' ),
					  'title'		=> esc_html__( 'Founded in Japan', 'liviza' ),
					  'short_desc'	=> esc_html__( 'Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin lorem', 'liviza' ),
					),
					array (
					  'year'		=> esc_html__( '1983', 'liviza' ),
					  'title'		=> esc_html__( 'Founded in Europe', 'liviza' ),
					  'short_desc'	=> esc_html__( 'Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin lorem', 'liviza' ),
					),
					array (
						'year'		=> esc_html__( '1984', 'liviza' ),
						'title'		=> esc_html__( 'Founded in USA', 'liviza' ),
						'short_desc'	=> esc_html__( 'Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin lorem', 'liviza' ),
					  ),
				  ))),
				'params' => array(
					array(
							'type'        => 'textfield',
							'heading'     => esc_html__( 'Year', 'liviza' ),
							'param_name'  => 'year',
							'description' => esc_html__( 'Add Year here', 'liviza' ),
							// 'value'       => '',
							'group'       => esc_html__( 'Timeline', 'liviza' ),
							'admin_label' => true,
							'edit_field_class' => 'vc_col-sm-6 vc_column',
					),
					array(
						'type'        => 'textfield',
						'heading'     => esc_html__( 'Title', 'liviza' ),
						'param_name'  => 'title',
						'description' => esc_html__( 'Add Title here', 'liviza' ),
						// 'value'       => '',
						'group'       => esc_html__( 'Timeline', 'liviza' ),
						'admin_label' => true,
						'edit_field_class' => 'vc_col-sm-6 vc_column',
					),
					array(
							'type'        => 'textarea',
							'heading'     => esc_html__( 'Short Description', 'liviza' ),
							'param_name'  => 'short_desc',
							// 'value'       => '',
							'description' => esc_html__( 'Fill short description text here', 'liviza' ),
							'group'       => esc_html__( 'Timeline', 'liviza' ),
							'admin_label' => true,
					),
				),
			),
		)
	);
	global $themestek_vc_custom_element_timeline;
	$themestek_vc_custom_element_timeline = $params;
	vc_map( array(
		'name'        => esc_html__( 'ThemeStek Timeline Box', 'liviza' ),
		'base'        => 'themestek-timeline',
		"class"    => "",
		"icon"        => "icon-themestek-vc",
		'category'    => esc_html__( 'THEMESTEK', 'liviza' ),
		'params'      => $params,
	) );
