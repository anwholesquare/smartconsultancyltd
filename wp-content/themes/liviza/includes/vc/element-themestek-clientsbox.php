<?php
/* Options */
$clientsGroupList = array();
if( taxonomy_exists('themestek-client-group') ){
	$clientsGroupList_data = get_terms( 'themestek-client-group', array( 'hide_empty' => false ) );
	$clientsGroupList      = array();
	foreach($clientsGroupList_data as $cat){
		$clientsGroupList[ esc_html($cat->name) . ' (' . esc_html($cat->count) . ')' ] = esc_html($cat->slug);
	}
}
/**
 * Heading Element
 */
$heading_element = vc_map_integrate_shortcode( 'themestek-heading', '', esc_html__('Main Heading','liviza'),
	array(
		'exclude' => array(
			'el_class',
			'css',
			'css_animation'
		),
	)
);
/**
 * Boxes Appearance options
 */
$boxParams = themestek_box_params();
$allParams = array_merge(
	$heading_element,
	array(
		array(
			'type'			=> 'themestek_imgselector',
			'heading'		=> esc_html__( 'Box View Style', 'liviza' ),
			'description'	=> esc_html__( 'Select box view style.', 'liviza' ),
			'param_name'	=> 'boxstyle',
			'std'			=> 'style-1',
			'value'			=> themestek_global_template_list('clients', false),
			'group'		  => esc_html__( 'Box Style', 'liviza' ),
		),
		array(
			"type"        => "dropdown",
			"heading"     => esc_html__("Show HOVER image?",'liviza'),
			"description" => esc_html__("Show HOVER image too. This will work only if you set hover image for each client logo.",'liviza'),
			"param_name"  => "show_hover",
			"value"       => array(
				esc_html__('Yes','liviza') => 'yes',
				esc_html__('No','liviza')  => 'no',
			),
			"std"         => "yes",
			'dependency'  => array(
				'element'		=> 'boxstyle',
				'value'			=> array( 'style1' ),
			),
			'group'		  => esc_html__( 'Box Style', 'liviza' ),
			'edit_field_class' => 'vc_col-sm-8 vc_column',
		),
	),
	array(
		array(
			"type"        => "dropdown",
			"holder"      => "div",
			"class"       => "",
			"heading"     => esc_html__("Show Sortable GROUP Links",'liviza'),
			"description" => esc_html__("Show sortable GROUP links above logos so user can sort by just single click.",'liviza'),
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
			'description' => esc_html__( 'Replace ALL word in sortable category links. Default is ALL word.', 'liviza' ),
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
			"description" => esc_html__("Show pagination links below each logo boxes.",'liviza'),
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
			"heading"     => esc_html__("From Group", "liviza"),
			"param_name"  => "category",
			"description" => esc_html__("Select group so it will show client logo from selected group only.", "liviza"),
			"value"       => $clientsGroupList,
			"std"         => "",
			'group'		  => esc_html__('Box Options','liviza'),
		),
		array(
			"type"        => "dropdown",
			"holder"      => "div",
			"class"       => "",
			"heading"     => esc_html__("Order by",'liviza'),
			"description" => esc_html__("Sort retrieved portfolio by parameter.",'liviza'),
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
			'group'		  => esc_html__('Box Options','liviza'),
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
			"description" => esc_html__("Total Clients Logos you want to show.", "liviza"),
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
				esc_html__("11", "liviza") => "11",
				esc_html__("12", "liviza") => "12",
				esc_html__("13", "liviza") => "13",
				esc_html__("14", "liviza") => "14",
				esc_html__("15", "liviza") => "15",
				esc_html__("16", "liviza") => "16",
				esc_html__("17", "liviza") => "17",
				esc_html__("18", "liviza") => "18",
				esc_html__("19", "liviza") => "19",
				esc_html__("20", "liviza") => "20",
			),
			"std"  => "10",
			'group'		  => esc_html__('Box Options','liviza'),
		),
		array(
			"type"        => "dropdown",
			"holder"      => "div",
			"class"       => "",
			"heading"     => esc_html__("Show Tooltip on Logo?",'liviza'),
			"description" => esc_html__("Select YES to show Tooltip on the logo.",'liviza'),
			"param_name"  => "show_tooltip",
			"value"       => array(
				esc_html__("Yes", "liviza") => "yes",
				esc_html__("No", "liviza")  => "no",
			),
			"std"         => "yes",
			'edit_field_class' => 'vc_col-sm-6 vc_column',
			'group'		  => esc_html__('Box Options','liviza'),
		),
		array(
			"type"        => "dropdown",
			"holder"      => "div",
			"class"       => "",
			"heading"     => esc_html__("Add link to all logos?",'liviza'),
			"description" => esc_html__("Select YES to add link to all logos. Please note that link should be added to each client logo. If no link found than the logo will appear without link.",'liviza'),
			"param_name"  => "add_link",
			"value"       => array(
				esc_html__("Yes", "liviza") => "yes",
				esc_html__("No", "liviza")  => "no",
			),
			"std"         => "yes",
			'edit_field_class' => 'vc_col-sm-6 vc_column',
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
	if( $param_name == 'h2' ){
		$params[$i]['std'] = 'Our Clients';
	} else if( $param_name == 'column' ){
		$params[$i]['std'] = 'five';
	} else if( $param_name == 'boxview' ){
		$params[$i]['std'] = 'carousel';
	} else if( $param_name == 'content' ){
		$params[$i]['std'] = '';
	} else if( $param_name == 'carousel_loop' ){
		$params[$i]['std'] = '1';
	} else if( $param_name == 'carousel_dots' ){
		$params[$i]['std'] = 'true';
	} else if( $param_name == 'carousel_nav' ){
		$params[$i]['std'] = '0';
	} else if( $param_name == 'h2_use_theme_fonts' ){
		$params[$i]['std'] = 'yes';
	} else if( $param_name == 'h4_use_theme_fonts' ){
		$params[$i]['std'] = 'yes';
	} else if( $param_name == 'txt_align' ){
		$params[$i]['std'] = 'center';
	}
	$i++;
}
global $themestek_sc_params_clients;
$themestek_sc_params_clients = $params;
vc_map( array(
	"name"     => esc_html__("ThemeStek Client Logo Box", "liviza"),
	"base"     => "themestek-clientsbox",
	"icon"     => "icon-themestek-vc",
	'category' => esc_html__( 'THEMESTEK', 'liviza' ),
	"params"   => $params,
) );
