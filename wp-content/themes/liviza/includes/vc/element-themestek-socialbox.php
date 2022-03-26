<?php
/* Options */
// Getting social list
$global_social_list = themestek_shared_social_list();
$sociallist = array_merge(
	array('' => esc_html__('Select service','liviza')),
	$global_social_list,
	array('rss'     => 'Rss Feed')
);
$sociallist = array_flip($sociallist);
$params = array_merge(
	themestek_vc_heading_params(),
	array(
		array(
			'type'        => 'param_group',
			'heading'     => esc_html__( 'Social Services List', 'liviza' ),
			'param_name'  => 'socialservices',
			'description' => esc_html__( 'Select social service and add URL for it.', 'liviza' ).'<br><strong>'.esc_html__('NOTE:','liviza').'</strong> '.esc_html__("You don't need to add URL if you are selecting 'RSS' in the social service",'liviza'),
			'group'       => esc_html__( 'Social Services', 'liviza' ),
			'params'     => array(
				array( // First social service
					'type'        => 'dropdown',
					'heading'     => esc_html__( 'Select Social Service', 'liviza' ),
					'param_name'  => 'servicename',
					'std'         => 'none',
					'value'       => $sociallist,
					'description' => esc_html__( 'Select social service', 'liviza' ),
					'group'       => esc_html__( 'Social Services', 'liviza' ),
					'admin_label' => true,
					'edit_field_class' => 'vc_col-sm-4 vc_column',
				),
				array(
					'type'        => 'textarea',
					'heading'     => esc_html__( 'Social URL', 'liviza' ),
					'param_name'  => 'servicelink',
					'dependency'  => array(
						'element'            => 'servicename',
						'value_not_equal_to' => array( 'rss' )
					),
					'value'       => '',
					'description' => esc_html__( 'Fill social service URL', 'liviza' ),
					'group'       => esc_html__( 'Social Services', 'liviza' ),
					'admin_label' => true,
					'edit_field_class' => 'vc_col-sm-8 vc_column',
				),
			),
		),
		array( // First social service
			'type'        => 'dropdown',
			'heading'     => esc_html__( 'Select column', 'liviza' ),
			'param_name'  => 'column',
			'value'       => array(
				esc_html__('One column','liviza')   => 'one',
				esc_html__('Two column','liviza')   => 'two',
				esc_html__('Three column','liviza') => 'three',
				esc_html__('Four column','liviza')  => 'four',
				esc_html__('Five column','liviza')  => 'five',
				esc_html__('Six column','liviza')   => 'six',
			),
			'std'         => 'six',
			'description' => esc_html__( 'Select how many column will show the social icons', 'liviza' ),
			'group'       => esc_html__( 'Social Services', 'liviza' ),
			'edit_field_class' => 'vc_col-sm-6 vc_column',
		),
		array( // First social service
			'type'        => 'dropdown',
			'heading'     => esc_html__( 'Social icon size', 'liviza' ),
			'param_name'  => 'iconsize',
			'std'         => 'large',
			'value'       => array(
				esc_html__('Small icon','liviza')  => 'small',
				esc_html__('Medium icon','liviza') => 'medium',
				esc_html__('Large icon','liviza')  => 'large',
			),
			'description' => esc_html__( 'Select social icon size', 'liviza' ),
			'group'       => esc_html__( 'Social Services', 'liviza' ),
			'edit_field_class' => 'vc_col-sm-6 vc_column',
		),
	),
	array( vc_map_add_css_animation() ),
	array( themestek_vc_ele_extra_class_option() ),
	array( themestek_vc_ele_css_editor_option() )
);
global $themestek_sc_params_socialbox;
$themestek_sc_params_socialbox = $params;
vc_map( array(
	'name'        => esc_html__( 'ThemeStek Social Box', 'liviza' ),
	'base'        => 'themestek-socialbox',
	"icon"        => "icon-themestek-vc",
	'category'    => esc_html__( 'THEMESTEK', 'liviza' ),
	'params'      => $params,
) );