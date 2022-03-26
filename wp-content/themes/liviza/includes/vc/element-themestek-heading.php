<?php
/* Options for ThemeStek Heading and Subheading */
$h2_custom_heading = vc_map_integrate_shortcode( 'themestek-custom-heading', 'h2_', esc_html__( 'Heading', 'liviza' ),
	array(
		'exclude' => array(
			'source',
			'text',
			'css',
		),
	),
	array(
		'element' => 'use_custom_fonts_h2',
		'value'   => 'true',
	)
);
// This is needed to remove custom heading _tag and _align options.
if ( is_array( $h2_custom_heading ) && ! empty( $h2_custom_heading ) ) {
	foreach ( $h2_custom_heading as $key => $param ) {
		if ( is_array( $param ) && isset( $param['type'] ) && 'font_container' === $param['type'] ) {
			$h2_custom_heading[ $key ]['value'] = '';
			if ( isset( $param['settings'] ) && is_array( $param['settings'] ) && isset( $param['settings']['fields'] ) ) {
				$sub_key = array_search( 'tag', $param['settings']['fields'] );
				if ( false !== $sub_key ) {
					unset( $h2_custom_heading[ $key ]['settings']['fields'][ $sub_key ] );
				} elseif ( isset( $param['settings']['fields']['tag'] ) ) {
					unset( $h2_custom_heading[ $key ]['settings']['fields']['tag'] );
				}
				$sub_key = array_search( 'text_align', $param['settings']['fields'] );
				if ( false !== $sub_key ) {
					unset( $h2_custom_heading[ $key ]['settings']['fields'][ $sub_key ] );
				} elseif ( isset( $param['settings']['fields']['text_align'] ) ) {
					unset( $h2_custom_heading[ $key ]['settings']['fields']['text_align'] );
				}
			}
		}
	}
}
$h4_custom_heading = vc_map_integrate_shortcode( 'themestek-custom-heading', 'h4_', esc_html__( 'Subheading', 'liviza' ),
	array(
		'exclude' => array(
			'source',
			'text',
			'css',
		),
	),
	array(
		'element' => 'use_custom_fonts_h4',
		'value' => 'true',
	)
);
// This is needed to remove custom heading _tag and _align options.
if ( is_array( $h4_custom_heading ) && ! empty( $h4_custom_heading ) ) {
	foreach ( $h4_custom_heading as $key => $param ) {
		if ( is_array( $param ) && isset( $param['type'] ) && 'font_container' === $param['type'] ) {
			$h4_custom_heading[ $key ]['value'] = '';
			if ( isset( $param['settings'] ) && is_array( $param['settings'] ) && isset( $param['settings']['fields'] ) ) {
				$sub_key = array_search( 'tag', $param['settings']['fields'] );
				if ( false !== $sub_key ) {
					unset( $h4_custom_heading[ $key ]['settings']['fields'][ $sub_key ] );
				} elseif ( isset( $param['settings']['fields']['tag'] ) ) {
					unset( $h4_custom_heading[ $key ]['settings']['fields']['tag'] );
				}
				$sub_key = array_search( 'text_align', $param['settings']['fields'] );
				if ( false !== $sub_key ) {
					unset( $h4_custom_heading[ $key ]['settings']['fields'][ $sub_key ] );
				} elseif ( isset( $param['settings']['fields']['text_align'] ) ) {
					unset( $h4_custom_heading[ $key ]['settings']['fields']['text_align'] );
				}
			}
		}
	}
}
$params = array_merge(
	array(
		array(
			'type'             => 'textarea',
			'heading'          => esc_html__( 'Heading', 'liviza' ),
			'admin_label'      => true,
			'param_name'       => 'h2',
			'value'            => '',
			'description'      => esc_html__( 'Enter text for heading line.', 'liviza' ),
			'edit_field_class' => 'vc_col-sm-9 vc_column',
		),
		array(
			'type'             => 'checkbox',
			'heading'          => esc_html__( 'Use custom font?', 'liviza' ),
			'param_name'       => 'use_custom_fonts_h2',
			'description'      => esc_html__( 'Enable Google fonts.', 'liviza' ),
			'edit_field_class' => 'vc_col-sm-3 vc_column',
		),
	),
	$h2_custom_heading,
	array(
		array(
			'type'             => 'textarea',
			'heading'          => esc_html__( 'Subheading', 'liviza' ),
			'param_name'       => 'h4',
			'value'            => '',
			'description'      => esc_html__( 'Enter text for subheading line.', 'liviza' ),
			'edit_field_class' => 'vc_col-sm-9 vc_column',
		),
		array(
			'type'             => 'checkbox',
			'heading'          => esc_html__( 'Use custom font?', 'liviza' ),
			'param_name'       => 'use_custom_fonts_h4',
			'description'      => esc_html__( 'Enable custom font option.', 'liviza' ),
			'edit_field_class' => 'vc_col-sm-3 vc_column',
		),
	),
	$h4_custom_heading,
	array(
		array(
			'type'       => 'textarea_html',
			'heading'    => esc_html__( 'Text', 'liviza' ),
			'param_name' => 'content',
			'value'      => esc_html__( 'I am promo text. Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.', 'liviza' )
		),
		array(
			'type'        => 'dropdown',
			'heading'     => esc_html__( 'Text alignment', 'liviza' ),
			'param_name'  => 'txt_align',
			'std'		  => 'left',
			'value'       => themestek_vc_get_shared( 'text align' ), // default left
			'description' => esc_html__( 'Select text alignment in "Call to Action" block.', 'liviza' ),
		),
		array(
			'type'             => 'checkbox',
			'heading'          => esc_html__( 'Reverse heading order', 'liviza' ),
			'param_name'       => 'reverse_heading',
			'description'      => esc_html__( 'Show sub-heading before heading.', 'liviza' ),
			'std'			   => 'true',
		),
		array(
			'type'        => 'dropdown',
			'heading'     => esc_html__( 'Seperator', 'liviza' ),
			'param_name'  => 'seperator',
			'value'       => array(
				esc_html__( 'None', 'liviza' )  							=> 'none',
				esc_html__( 'Solid', 'liviza' ) 							=> 'solid',
			),
			'description' => esc_html__( 'Show separator between Heading and Subheading', 'liviza' ),
			'std'		  => 'none',
		),
	),
	array(
		/// cta3
		vc_map_add_css_animation(),
		themestek_vc_ele_extra_class_option(),
		themestek_vc_ele_css_editor_option(),
	)
);
// Moving heading link option on main tab instead of inner tab
foreach( $params as $key=>$val ){
	// Heading
	if( !empty($val['param_name']) && $val['param_name']=='h2_link' ){
		unset($params[$key]['group']);
		unset($params[$key]['dependency']);
		$params[$key]['heading'] = esc_html__('Heading Link (URL)','liviza');
	}
	// Sub-heading
	if( !empty($val['param_name']) && $val['param_name']=='h4_link' ){
		unset($params[$key]['group']);
		unset($params[$key]['dependency']);
		$params[$key]['heading'] = esc_html__('Subheading Link (URL)','liviza');
	}
}
global $themestek_sc_params_heading;
$themestek_sc_params_heading = $params;
vc_map( array(
	'name'     => esc_html__( 'ThemeStek Heading and Subheading', 'liviza' ),
	'base'     => 'themestek-heading',
	'icon'     => 'icon-themestek-vc',
	'category' => array( esc_html__( 'THEMESTEK', 'liviza' ) ),
	'since'    => '4.5',
	'params'   => $params,
	'js_view'  => 'VcCallToActionView3',
) );