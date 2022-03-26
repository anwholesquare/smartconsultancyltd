<?php
/* Options for ThemeStek Blogbox */
// Team Group
$teamGroupList = array();
if( taxonomy_exists('themestek-team-group') ){
	$teamGroups    = get_terms( 'themestek-team-group', array( 'hide_empty' => false ) );
	$teamGroupList = array();
	foreach($teamGroups as $teamGroup){
		$name                   = $teamGroup->name.' ('.$teamGroup->count.')';
		$teamGroupList[ $name ] = $teamGroup->slug;
	}
}
// Getting Options
$liviza_theme_options      = get_option('liviza_theme_options');
$team_type_title           = ( !empty($liviza_theme_options['team_type_title']) ) ? $liviza_theme_options['team_type_title'] : 'Team Members' ;
$team_type_title_singular  = ( !empty($liviza_theme_options['team_type_title_singular']) ) ? $liviza_theme_options['team_type_title_singular'] : 'Team Member' ;
$team_group_title          = ( !empty($liviza_theme_options['team_group_title']) ) ? $liviza_theme_options['team_group_title'] : 'Team Groups' ;
$team_group_title_singular = ( !empty($liviza_theme_options['team_group_title_singular']) ) ? $liviza_theme_options['team_group_title_singular'] : 'Team Group' ;
/**
 * Heading Element
 */
$heading_element = vc_map_integrate_shortcode( 'themestek-heading', '', esc_html__('Headings','liviza'),
	array(
		'exclude' => array(
			'el_class',
			'css',
			'css_animation'
		),
	)
);
$boxParams = themestek_box_params();
$allParams = array_merge(
	$heading_element,
	array(
		array(
			'type'			=> 'themestek_imgselector',
			'heading'		=> esc_html__( 'Box View Style', 'liviza' ),
			'description'	=> esc_html__( 'Select box view style.', 'liviza' ),
			'param_name'	=> 'boxstyle',
			'std'			=> 'style-2',
			'value'			=> themestek_global_template_list('team', false),
			'group'		  => esc_html__( 'Box Style', 'liviza' ),
		),
		array(
			"type"        => "dropdown",
			"heading"     => esc_html__("Box Spacing", "liviza"),
			"param_name"  => "box_spacing",
			"description" => esc_html__("Spacing between each box.", "liviza"),
			"value"       => array(
				esc_html__("Default", "liviza")                        => "",
				esc_html__("0 pixel spacing (joint boxes)", "liviza")  => "0px",
				esc_html__("5 pixel spacing", "liviza")                => "5px",
				esc_html__("10 pixel spacing", "liviza")               => "10px",
			),
			"std"         => "",
			'group'		  => esc_html__( 'Box Style', 'liviza' ),
		),
	),
	array(
		array(
			"type"        => "dropdown",
			"holder"      => "div",
			"class"       => "",
			"heading"     => sprintf( esc_html__("Show Sortable %s Links",'liviza'), $team_group_title ),
			"description" => sprintf( esc_html__("Show sortable %s links above box items so user can sort by just single click.",'liviza'), $team_group_title ),
			"param_name"  => "sortable",
			"value"       => array(
				esc_html__('No','liviza')  => 'no',
				esc_html__('Yes','liviza') => 'yes',
			),
			"std"         => "no",
			'dependency'  => array(
				'element'            => 'boxview',
				'value_not_equal_to' => array( 'carousel' ),
			),
			'group'		  => esc_html__('Box Options','liviza'),
		),
		array(
			'type'        => 'textfield',
			'heading'     => esc_html__( 'Replace ALL word', 'liviza' ),
			'param_name'  => 'allword',
			'description' => esc_html__( 'Replace ALL word in sortable group links. Default is ALL word.', 'liviza' ),
			"std"         => "All",
			'dependency'  => array(
				'element'   => 'sortable',
				'value'     => array( 'yes' ),
			),
			'group'		  => esc_html__('Box Options','liviza'),
		),
		array(
			"type"        => "dropdown",
			"holder"      => "div",
			"class"       => "",
			"heading"     => esc_html__("Show Pagination",'liviza'),
			"description" => sprintf( esc_html__("Show pagination links below %s boxes.",'liviza'), $team_type_title_singular ),
			"param_name"  => "pagination",
			"value"       => array(
				esc_html__('No','liviza')  => 'no',
				esc_html__('Yes','liviza') => 'yes',
			),
			"std"         => "no",
			'dependency'  => array(
				'element'    => 'sortable',
				'value_not_equal_to' => array( 'yes' ),
			),
			'group'		  => esc_html__('Box Options','liviza'),
		),
		array(
			"type"        => "checkbox",
			"heading"     => sprintf( esc_html__("From %s", "liviza"), $team_group_title_singular ),
			"param_name"  => "category",
			"description" => sprintf( esc_html__('If you like to show %1$s from selected %2$s than select the category here.', 'liviza'), $team_type_title, $team_group_title ),
			"value"       => $teamGroupList,
			'group'		  => esc_html__('Box Options','liviza'),
		),
		array(
			"type"        => "dropdown",
			"holder"      => "div",
			"class"       => "",
			"heading"     => esc_html__("Order by",'liviza'),
			"description" => sprintf( esc_html__("Sort retrieved %s by parameter.",'liviza'), $team_type_title_singular ),
			"param_name"  => "orderby",
			"value"       => array(
				esc_html__('No order (none)','liviza')           => 'none',
				esc_html__('Order by post id (ID)','liviza')     => 'ID',
				esc_html__('Order by author (author)','liviza')  => 'author',
				esc_html__('Order by title (title)','liviza')    => 'title',
				esc_html__('Order by slug (name)','liviza')      => 'name',
				esc_html__('Order by date (date)','liviza')      => 'date',
				esc_html__('Order by last modified date (modified)','liviza') => 'modified',
				esc_html__('Random order (rand)','liviza')       => 'rand',
				esc_html__('Order by number of comments (comment_count)','liviza') => 'comment_count',
			),
			'edit_field_class' => 'vc_col-sm-6 vc_column',
			"std"              => "date",
			'group'			   => esc_html__('Box Options','liviza'),
		),
		array(
			"type"        => "dropdown",
			"holder"      => "div",
			"class"       => "",
			"heading"     => esc_html__("Order",'liviza'),
			"description" => esc_html__("Designates the ascending or descending order of the 'orderby' parameter.",'liviza'),
			"param_name"  => "order",
			"value"       => array(
				esc_html__('Ascending (1, 2, 3; a, b, c)','liviza')  => 'ASC',
				esc_html__('Descending (3, 2, 1; c, b, a)','liviza') => 'DESC',
			),
			'edit_field_class' => 'vc_col-sm-6 vc_column',
			"std"              => "DESC",
			'group'		  => esc_html__('Box Options','liviza'),
		),
		array(
			"type"        => "dropdown",
			"heading"     => esc_html__("Show", "liviza"),
			"param_name"  => "show",
			"description" => sprintf( esc_html__("How many %s item you want to show.", "liviza"), $team_type_title ),
			"value"       => array(
				esc_html__("All", "liviza") => "-1",
				esc_html__("1", "liviza")  => "1",
				esc_html__("2", "liviza") => "2",
				esc_html__("3", "liviza") => "3",
				esc_html__("4", "liviza") => "4",
				esc_html__("5", "liviza") => "5",
				esc_html__("6", "liviza") => "6",
				esc_html__("7", "liviza") => "7",
				esc_html__("8", "liviza") => "8",
				esc_html__("9", "liviza") => "9",
				esc_html__("10", "liviza") => "10",
			),
			"std"  => "4",
			'group'		  => esc_html__('Box Options','liviza'),
		),
	),
	$boxParams,
	array(
		themestek_vc_ele_css_editor_option(),
	)
);
$params = $allParams;
// Changing default values
$i = 0;
foreach( $params as $param ){
	$param_name = (isset($param['param_name'])) ? $param['param_name'] : '' ;
	if( $param_name == 'column' ){
		$params[$i]['std'] = 'three';
	} else if( $param_name == 'show' ){
		$params[$i]['std'] = '3';
	} else if( $param_name == 'h2' ){
		$params[$i]['std'] = 'Our Team';
	} else if( $param_name == 'h2_use_theme_fonts' ){
		$params[$i]['std'] = 'yes';
	} else if( $param_name == 'h4_use_theme_fonts' ){
		$params[$i]['std'] = 'yes';
	} else if( $param_name == 'txt_align' ){
		$params[$i]['std'] = 'center';
	}
	$i++;
}
global $themestek_sc_params_teambox;
$themestek_sc_params_teambox = $params;
vc_map( array(
	"name"     => sprintf( esc_html__("ThemeStek %s Box", "liviza"), $team_type_title_singular ),
	"base"     => "themestek-teambox",
	"icon"     => "icon-themestek-vc",
	'category' => esc_html__( 'THEMESTEK', 'liviza' ),
	"params"   => $params,
) );
