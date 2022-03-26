<?php
/******* Each Line (group) Options ********/
// Icon picker
$group_icon = vc_map_integrate_shortcode( 'themestek-icon', 'i_', '',
	array(
		'include_only_regex' => '/^(type|icon_\w*)/',
		// we need only type, icon_fontawesome, icon_blabla..., NOT color and etc
	), array(
		'element' => 'list_icon',
		'value' => 'custom',
	)
);
$group_params = array(
	array(
		'type' => 'textfield',
		'heading' => esc_html__( 'Label', 'liviza' ),
		'param_name' => 'label',
		'description' => esc_html__( 'Enter text used as title of bar. You can use STRONG tag to bold some texts.', 'liviza' ),
		'admin_label' => true,
	),
	array(
		'type'       => 'dropdown',
		'heading'    => esc_html__( 'Select Icon', 'liviza' ),
		'param_name' => 'list_icon',
		'value'      => array(
			esc_html__( 'No icon', 'liviza' )							=> '',
			esc_html__( 'Show default icon (check icon)', 'liviza' )	=> 'default',
			esc_html__( 'Select custom icon', 'liviza' )				=> 'custom',
		),
		'std'         => '',
		'description' => esc_html__( 'Select icon for this line.', 'liviza' ),
	),
);
// Merging icon with other options
$param_group = array_merge( $group_params, $group_icon );
$params_boxstyle =  array(
	array(
		'type'			=> 'themestek_imgselector',
		'heading'		=> esc_html__( 'Pricing Table Box Style', 'liviza' ),
		'description'	=> esc_html__( 'Select Pricing Table box style.', 'liviza' ),
		'param_name'	=> 'boxstyle',
		'std'			=> 'style-1',
		'value'			=> themestek_global_template_list('pricingtable', false),
	),
	array(
		'type'				=> 'dropdown',
		'heading'			=> esc_html__( 'Featured Column', 'liviza' ),
		'param_name'		=> 'featured_col',
		//'std'				=> '',
		'value'				=> array(
			esc_html__( 'None', 'liviza' )		=> '',
			esc_html__( '1st Column', 'liviza' )	=> '1',
			esc_html__( '2nd Column', 'liviza' )	=> '2',
			esc_html__( '3rd Column', 'liviza' )	=> '3',
			esc_html__( '4th Column', 'liviza' )	=> '4',
			esc_html__( '5th Column', 'liviza' )	=> '5',
		),
		'description'		=> esc_html__( 'Select whith column will be with featured style.', 'liviza' ),
		'edit_field_class'	=> 'vc_col-sm-6 vc_column',
	),
	array(
		'type'			=> 'textfield',
		'heading'		=> esc_html__( 'Featured Text', 'liviza' ),
		'std'			=> esc_html__( 'Featured', 'liviza' ),
		'param_name'	=> 'featured_text',
		'description'	=> esc_html__( 'Enter text that will be shown for featured column. Example "Featured".', 'liviza' ),
		'dependency' => array(
			'element' => 'featured_col',
			'value' => array( '1', '2', '3', '4', '5' ),
		),
		'edit_field_class'	=> 'vc_col-sm-6 vc_column',
	),
);
/*** Coumn Options ***/
$params_heading =  array(
	array(
		'type'			=> 'textfield',
		'heading'		=> esc_html__( 'Heading', 'liviza' ),
		'param_name'	=> 'heading',
		'description'	=> esc_html__( 'Enter text used as main heading. This will be plan title like "Basic", "Pro" etc.', 'liviza' ),
		//'group'			=> esc_html__( 'Content', 'liviza' ),
	)
);
// Main Icon picker
$main_icon = vc_map_integrate_shortcode( 'themestek-icon', 'i_', esc_html__( 'Content', 'liviza' ),
	array(
		'include_only_regex' => '/^(type|icon_\w*)/',
		// we need only type, icon_fontawesome, icon_blabla..., NOT color and etc
	)
);
$params_price =  array(
	array(
		'type'				=> 'textfield',
		'heading'			=> esc_html__( 'Price', 'liviza' ),
		'param_name'		=> 'price',
		'std'				=> '100',
		'description'		=> esc_html__( 'Enter Price.', 'liviza' ),
		'edit_field_class'	=> 'vc_col-sm-3 vc_column',
	),
	array(
		'type'				=> 'textfield',
		'heading'			=> esc_html__( 'Currency symbol', 'liviza' ),
		'param_name'		=> 'cur_symbol',
		'std'				=> '$',
		'description'		=> esc_html__( 'Enter currency symbol', 'liviza' ),
		'edit_field_class'	=> 'vc_col-sm-3 vc_column',
	),
	array(
		'type'				=> 'dropdown',
		'heading'			=> esc_html__( 'Currency Symbol position', 'liviza' ),
		'param_name'		=> 'cur_symbol_position',
		'std'				=> 'after',
		'value'				=> array(
			esc_html__( 'Before price', 'liviza' )	=> 'before',
			esc_html__( 'After price', 'liviza' )	=> 'after',
		),
		'description'		=> esc_html__( 'Select currency position.', 'liviza' ),
		'edit_field_class'	=> 'vc_col-sm-3 vc_column',
	),
	array(
		'type'				=> 'textfield',
		'heading'			=> esc_html__( 'Price Frequency', 'liviza' ),
		'param_name'		=> 'price_frequency',
		'std'				=> esc_html__( 'Monthly', 'liviza' ),
		'description'		=> esc_html__( 'Enter currency frequency like "Monthly", "Yearly" or "Weekly" etc.', 'liviza' ),
		'edit_field_class'	=> 'vc_col-sm-3 vc_column',
	),
);
$params_btn = array(
	array(
		'type'       		=> 'textfield',
		'heading'    		=> esc_html__( 'Button Text', 'liviza' ),
		'param_name' 		=> 'btn_title',
		'edit_field_class'	=> 'vc_col-sm-3 vc_column',
	),
	array(
		'type'				=> 'vc_link',
		'heading'			=> esc_html__( 'Button URL (Link)', 'liviza' ),
		'param_name'		=> 'btn_link',
		'description'		=> esc_html__( 'Add link to button.', 'liviza' ),
		'edit_field_class'	=> 'vc_col-sm-9 vc_column',
	),
);
$params_lines =  array(
	array(
		'type'			=> 'param_group',
		'heading'		=> esc_html__( 'Each Line (Features)', 'liviza' ),
		'param_name'	=> 'values',
		'description'	=> esc_html__( 'Enter values for graph - value, title and color.', 'liviza' ),
		'value'			=> urlencode( json_encode( array(
			array(
				'label'		=> esc_html__( 'This is label one', 'liviza' ),
				'value'		=> '90',
			),
			array(
				'label'		=> esc_html__( 'This is label two', 'liviza' ),
				'value'		=> '80',
			),
			array(
				'label'		=> esc_html__( 'This is label three', 'liviza' ),
				'value'		=> '70',
			),
		) ) ),
		'params'		=> $param_group,
	),
);
// CSS Animation
$css_animation = vc_map_add_css_animation();
$css_animation['group'] = esc_html__( 'Animation', 'liviza' );
// Extra Class
$extra_class = themestek_vc_ele_extra_class_option();
$extra_class['group'] = esc_html__( 'Animation', 'liviza' );
$params_all = array_merge(
	$params_heading,
	$main_icon,
	$params_price,
	$params_btn,
	$params_lines
);
/**** Multiple Columns for pricing table ****/
$params = array();
for( $i=1; $i<=5; $i++ ){  // 3 column
	$tab_title = esc_html__('First Column','liviza');
	switch( $i ){
		case 2:
			$tab_title = esc_html__('Second Column','liviza');
			break;
		case 3:
			$tab_title = esc_html__('Third Column','liviza');
			break;
		case 4:
			$tab_title = esc_html__('Fourth Column','liviza');
			break;
		case 5:
			$tab_title = esc_html__('Fifth Column','liviza');
			break;
	}
	foreach( $params_all as $param ){
		if( !empty($param['param_name']) ){
			$param['param_name'] = 'col'.$i.'_'.$param['param_name'];
		}
		$param['group']      = $tab_title;
		if( !empty($param['dependency']) && !empty($param['dependency']["element"]) ){
			$param['dependency']["element"] = 'col'.$i.'_'.$param['dependency']["element"];
		}
		$params[] = $param;
	}
} // for
$params = array_merge(
	$params_boxstyle,
	$params,
	array($css_animation),
	array($extra_class),
	array( themestek_vc_ele_css_editor_option() )
);
global $themestek_sc_params_pricingtable;
$themestek_sc_params_pricingtable = $params;
vc_map( array(
	'name'		=> esc_html__( 'ThemeStek Pricing Table', 'liviza' ),
	'base'		=> 'themestek-pricing-table',
	'class'		=> '',
	'icon'		=> 'icon-themestek-vc',
	'category'	=> esc_html__( 'THEMESTEK', 'liviza' ),
	'params'	=> $params
) );
