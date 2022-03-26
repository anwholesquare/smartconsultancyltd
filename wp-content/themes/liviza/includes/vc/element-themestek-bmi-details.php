<?php
/**
 *  ThemeStek: BMI Details Box
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
			'heading'		=> esc_html__( 'BMI Details', 'liviza' ),
			'param_name'	=> 'bmilist',
			'group'			=> esc_html__( 'BMI Details', 'liviza' ),
			'description'	=> esc_html__( 'Set BMI Description', 'liviza' ),
			'value'			=> urlencode( json_encode( array(
				array(
					'service_name' => esc_html__( 'Below 18.5', 'liviza' ),
					'price'        => esc_html__('Underweight', 'liviza' ),
				),
				array(
					'service_name' => esc_html__( '18.5 - 24.9', 'liviza' ),
					'price'        => esc_html__('Healthy', 'liviza' ),
				),
				array(
					'service_name' => esc_html__( '25.0 - 29.9', 'liviza' ),
					'price'        => esc_html__('Overweight', 'liviza' ),
				),
				array(
					'service_name' => esc_html__( '30.0 - and Above', 'liviza' ),
					'price'        => esc_html__('Obese', 'liviza' ),
				),
			))),
			'params' => array(
				array(
						'type'        => 'textarea',
						'heading'     => esc_html__( 'BMI', 'liviza' ),
						'param_name'  => 'service_name',
						'description' => esc_html__( 'Fill BMI Desription Title here', 'liviza' ),
						// 'value'       => '',
						'group'       => esc_html__( 'BMI Details', 'liviza' ),
						'admin_label' => true,
						'edit_field_class' => 'vc_col-sm-6 vc_column',
				),
				array(
						'type'        => 'textarea',
						'heading'     => esc_html__( 'WEIGHT STATUS', 'liviza' ),
						'param_name'  => 'price',
						// 'value'       => '',
						'description' => esc_html__( 'Fill Description here eg: Healthy', 'liviza' ),
						'group'       => esc_html__( 'BMI Details', 'liviza' ),
						'admin_label' => true,
						'edit_field_class' => 'vc_col-sm-6 vc_column',
				),
			),
		),
		)
	);
	global $themestek_vc_custom_element_bmi_details;
	$themestek_vc_custom_element_bmi_details = $params;
	vc_map( array(
		'name'        => esc_html__( 'ThemeStek BMI Details Box', 'liviza' ),
		'base'        => 'themestek-bmi-details',
		"class"    => "",
		"icon"        => "icon-themestek-vc",
		'category'    => esc_html__( 'THEMESTEK', 'liviza' ),
		'params'      => $params,
	) );
