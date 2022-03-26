<?php
// Icon picker
$icons_params = vc_map_integrate_shortcode( 'themestek-icon', 'i_', '',
	array(
		'include_only_regex' => '/^(type|icon_\w*)/',
		// we need only type, icon_fontawesome, icon_blabla..., NOT color and etc
	), array(
		'element' => 'add_icon',
		'value' => 'true',
	)
);
// each progress bar options
$param_group = array(
	array(
		'type' => 'textfield',
		'heading' => esc_html__( 'Label', 'liviza' ),
		'param_name' => 'label',
		'description' => esc_html__( 'Enter text used as title of bar.', 'liviza' ),
		'admin_label' => true,
	),
	array(
		'type' => 'textfield',
		'heading' => esc_html__( 'Value', 'liviza' ),
		'param_name' => 'value',
		'description' => esc_html__( 'Enter value of bar.', 'liviza' ),
		'admin_label' => true,
	),
	array(
		'type' => 'dropdown',
		'heading' => esc_html__( 'Color', 'liviza' ),
		'param_name' => 'color',
		'value' => array(
				esc_html__( 'Default', 'liviza' ) => '',
			) + array(
				esc_html__( 'Classic Grey', 'liviza' ) => 'bar_grey',
				esc_html__( 'Classic Blue', 'liviza' ) => 'bar_blue',
				esc_html__( 'Classic Turquoise', 'liviza' ) => 'bar_turquoise',
				esc_html__( 'Classic Green', 'liviza' ) => 'bar_green',
				esc_html__( 'Classic Orange', 'liviza' ) => 'bar_orange',
				esc_html__( 'Classic Red', 'liviza' ) => 'bar_red',
				esc_html__( 'Classic Black', 'liviza' ) => 'bar_black',
			) + themestek_vc_get_shared( 'colors-dashed' ),
		'description' => esc_html__( 'Select single bar background color.', 'liviza' ),
		'admin_label' => true,
		'param_holder_class' => 'vc_colored-dropdown',
	),
	// Show / Hide icon
	array(
		'type'       => 'dropdown',
		'heading'    => esc_html__( 'Show Icon?', 'liviza' ),
		'param_name' => 'add_icon',
		'value'      => array(
			esc_html__( 'Yes', 'liviza' ) => 'true',
			esc_html__( 'No', 'liviza' )  => 'false',
		),
		'std'         => 'true',
		'description' => esc_html__( 'Want to show icon with the progress bar.', 'liviza' ),
	)
);
// Merging icon with other options
$param_group = array_merge( $param_group, $icons_params );
$params =  array(
	array(
		'type' => 'textfield',
		'heading' => esc_html__( 'Widget title', 'liviza' ),
		'param_name' => 'title',
		'description' => esc_html__( 'Enter text used as widget title (Note: located above content element).', 'liviza' ),
	),
	array(
		'type' => 'param_group',
		'heading' => esc_html__( 'Values', 'liviza' ),
		'param_name' => 'values',
		'description' => esc_html__( 'Enter values for graph - value, title and color.', 'liviza' ),
		'value' => urlencode( json_encode( array(
			array(
				'label' => esc_html__( 'Progress Line 1', 'liviza' ),
				'value' => '90',
			),
			array(
				'label' => esc_html__( 'Progress Line 2', 'liviza' ),
				'value' => '80',
			),
			array(
				'label' => esc_html__( 'Progress Line 3', 'liviza' ),
				'value' => '70',
			),
		) ) ),
		'params' => $param_group,
	),
	array(
		'type' => 'textfield',
		'heading' => esc_html__( 'Units', 'liviza' ),
		'param_name' => 'units',
		'description' => esc_html__( 'Enter measurement units (Example: %, px, points, etc. Note: graph value and units will be appended to graph title).', 'liviza' ),
	),
	array(
		'type' => 'dropdown',
		'heading' => esc_html__( 'Color', 'liviza' ),
		'param_name' => 'bgcolor',
		'std' => 'skincolor',
		'value' => array(
				esc_html__( 'Classic Grey', 'liviza' ) => 'bar_grey',
				esc_html__( 'Classic Blue', 'liviza' ) => 'bar_blue',
				esc_html__( 'Classic Turquoise', 'liviza' ) => 'bar_turquoise',
				esc_html__( 'Classic Green', 'liviza' ) => 'bar_green',
				esc_html__( 'Classic Orange', 'liviza' ) => 'bar_orange',
				esc_html__( 'Classic Red', 'liviza' ) => 'bar_red',
				esc_html__( 'Classic Black', 'liviza' ) => 'bar_black',
			) + themestek_vc_get_shared( 'colors-dashed' ),
		'description' => esc_html__( 'Select bar background color.', 'liviza' ),
		'admin_label' => true,
		'param_holder_class' => 'vc_colored-dropdown',
	),
	array(
		'type' => 'checkbox',
		'heading' => esc_html__( 'Options', 'liviza' ),
		'param_name' => 'options',
		'value' => array(
			esc_html__( 'Add stripes', 'liviza' ) => 'striped',
			esc_html__( 'Add animation (Note: visible only with striped bar).', 'liviza' ) => 'animated',
		),
	),
);
$params = array_merge(
	$params,
	array( vc_map_add_css_animation() ),
	array( themestek_vc_ele_extra_class_option() ),
	array( themestek_vc_ele_css_editor_option() )
);
global $themestek_sc_params_progressbar;
$themestek_sc_params_progressbar = $params;
vc_map( array(
	'name'		=> esc_html__( 'ThemeStek Progress Bar', 'liviza' ),
	'base'		=> 'themestek-progress-bar',
	'class'		=> '',
	'icon'		=> 'icon-themestek-vc',
	'category'	=> esc_html__( 'THEMESTEK', 'liviza' ),
	'params'	=> $params
) );
