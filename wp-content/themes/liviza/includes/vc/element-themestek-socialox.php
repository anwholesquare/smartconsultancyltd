<?php
/* Options */
// Social services
$sociallist = array(
	esc_html__('Select service','liviza') => '',
	'Twitter'      => 'twitter',
	'YouTube'      => 'youtube',
	'Flickr'       => 'flickr',
	'Facebook'     => 'facebook',
	'LinkedIn'     => 'linkedin',
	'Google+'      => 'gplus',
	'yelp'         => 'yelp',
	'Dribbble'     => 'dribbble',
	'Pinterest'    => 'pinterest',
	'Podcast'      => 'podcast',
	'Instagram'    => 'instagram',
	'Xing'         => 'xing',
	'Vimeo'        => 'vimeo',
	'VK'           => 'vk',
	'Houzz'        => 'houzz',
	'Issuu'        => 'issuu',
	'Google Drive' => 'google-drive',
	'Rss Feed'     => 'rss',
);
/**
 * Boxes Appearance options
 */
$boxParams = themestek_box_params();
$allParams = array_merge(
	$heading_element,
	array(
		array(
			'type'        => 'textfield',
			'heading'     => esc_html__( 'Extra class name', 'liviza' ),
			'param_name'  => 'el_class',
			'description' => esc_html__( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'liviza' ),
		),
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
	$boxParams,
	array(
		themestek_vc_ele_css_editor_option(),
	)
);
$params = $allParams;
global $themestek_sc_params_clients;
$themestek_sc_params_clients = $params;
vc_map( array(
	"name"     => esc_html__("ThemeStek Social Box", "liviza"),
	"base"     => "themestek-socialbox",
	"icon"     => "icon-themestek-vc",
	'category' => esc_html__( 'THEMESTEK', 'liviza' ),
	"params"   => $params,
) );