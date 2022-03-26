<?php
/* Options for ThemeStek Blogbox */
$postCatList    = get_categories( array('hide_empty'=>false) );
$catList = array();
foreach($postCatList as $cat){
	$catList[ esc_html($cat->name) . ' (' . esc_html($cat->count) . ')' ] = esc_html($cat->slug);
}
$heading_element = vc_map_integrate_shortcode( 'themestek-heading', '', esc_html__('Headings','liviza'),
	array(
		'exclude' => array(
			'el_class',
			'css',
			'css_animation'
		),
	)
);
$boxParams = themestek_box_params('blog');
$allParams = array_merge(
	$heading_element,
	array(
		array(
			'type'			=> 'themestek_imgselector',
			'heading'		=> esc_html__( 'Box View Style', 'liviza' ),
			'description'	=> esc_html__( 'Select box view style.', 'liviza' ),
			'param_name'	=> 'boxstyle',
			'std'			=> 'style-1',
			'value'			=> themestek_global_template_list('blog', false),
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
			"std"  => "",
			'group'		  => esc_html__( 'Box Style', 'liviza' ),
		)
	),
	array(
		array(
			"type"        => "dropdown",
			"holder"      => "div",
			"class"       => "",
			"heading"     => esc_html__("Show Sortable Category Links",'liviza'),
			"description" => esc_html__("Show sortable category links above Blog boxes so user can sort by category by just single click.",'liviza'),
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
			'group'		  => esc_html__( 'Box Options', 'liviza' ),
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
			'group'		  => esc_html__( 'Box Options', 'liviza' ),
		),
		array(
			"type"        => "dropdown",
			"holder"      => "div",
			"class"       => "",
			"heading"     => esc_html__("Show Pagination",'liviza'),
			"description" => esc_html__("Show pagination links below blog boxes.",'liviza'),
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
			'group'		  => esc_html__( 'Box Options', 'liviza' ),
		),
		array(
			"type"        => "checkbox",
			"heading"     => esc_html__("Set Post Link On Feature Image", "liviza"),
			"param_name"  => "postlink_onimage",
			"description" => esc_html__("If you like to set post link on feature image than check here.", "liviza"),
			'group'		  => esc_html__( 'Box Options', 'liviza' ),
		),
		array(
			"type"        => "checkbox",
			"heading"     => esc_html__("From Category", "liviza"),
			"description" => esc_html__("If you like to show posts from selected category than select the category here.", "liviza") . esc_html__("The brecket number shows how many posts there in the category.", "liviza"),
			"param_name"  => "category",
			"value"       => $catList,
			'group'		  => esc_html__( 'Box Options', 'liviza' ),
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
			'group'		  => esc_html__( 'Box Options', 'liviza' ),
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
			'group'		  => esc_html__( 'Box Options', 'liviza' ),
		),
		array(
			"type"        => "dropdown",
			"holder"      => "div",
			"class"       => "",
			"heading"     => esc_html__("Show Posts",'liviza'),
			"description" => esc_html__("How many post you want to show.",'liviza'),
			"param_name"  => "show",
			"value"       => array(
				esc_html__('1','liviza')=>'1',
				esc_html__('2','liviza')=>'2',
				esc_html__('3','liviza')=>'3',
				esc_html__('4','liviza')=>'4',
				esc_html__('5','liviza')=>'5',
				esc_html__('6','liviza')=>'6',
				esc_html__('7','liviza')=>'7',
				esc_html__('8','liviza')=>'8',
				esc_html__('9','liviza')=>'9',
				esc_html__('10','liviza')=>'10',
				esc_html__('11','liviza')=>'11',
				esc_html__('12','liviza')=>'12',
				esc_html__('13','liviza')=>'13',
				esc_html__('14','liviza')=>'14',
				esc_html__('15','liviza')=>'15',
				esc_html__('16','liviza')=>'16',
				esc_html__('17','liviza')=>'17',
				esc_html__('18','liviza')=>'18',
				esc_html__('19','liviza')=>'19',
				esc_html__('20','liviza')=>'20',
				esc_html__('21','liviza')=>'21',
				esc_html__('22','liviza')=>'22',
				esc_html__('23','liviza')=>'23',
				esc_html__('24','liviza')=>'24',
			),
			"std"  => "3",
			'group'		  => esc_html__( 'Box Options', 'liviza' ),
		),
		array(
			'type'        => 'textfield',
			'heading'     => esc_html__( 'Exclude Posts', 'liviza' ),
			'param_name'  => 'exclude',
			'description' => esc_html__( 'Exclude posts that you don\'t want to appear. Write ID of the post with comma separated. Example "24,36,58,698".', 'liviza' ),
			"std"         => "",
			'group'		  => esc_html__( 'Box Options', 'liviza' ),
		),
		array(
			"type"        => "dropdown",
			"holder"      => "div",
			"class"       => "",
			"heading"     => esc_html__("Ignore/Skip latest posts (Offset)",'liviza'),
			"description" => esc_html__("number of post to displace or pass over.",'liviza'),
			"param_name"  => "offset",
			"value"       => array(
				esc_html__('None', 'liviza')			=> '',
				esc_html__('1st post', 'liviza')		=> '1',
				esc_html__('Two Posts', 'liviza')		=> '2',
				esc_html__('Three Posts', 'liviza')	=> '3',
				esc_html__('Four Posts', 'liviza')	=> '4',
				esc_html__('Five Posts', 'liviza')	=> '5',
				esc_html__('Six Posts', 'liviza')		=> '6',
				esc_html__('Seven Posts', 'liviza')	=> '7',
				esc_html__('Eight Posts', 'liviza')	=> '8',
				esc_html__('Nine Posts', 'liviza')	=> '9',
				esc_html__('Ten Posts', 'liviza')		=> '10',
			),
			"std"  => "",
			'group'		  => esc_html__( 'Box Options', 'liviza' ),
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
		$params[$i]['std'] = 'Blog';
	} else if( $param_name == 'h2_use_theme_fonts' ){
		$params[$i]['std'] = 'yes';
	} else if( $param_name == 'h4_use_theme_fonts' ){
		$params[$i]['std'] = 'yes';
	} else if( $param_name == 'txt_align' ){
		$params[$i]['std'] = 'center';
	}
	$i++;
}
global $themestek_sc_params_blogbox;
$themestek_sc_params_blogbox = $params;
vc_map( array(
	"name"     => esc_html__('ThemeStek Blog Box','liviza'),
	"base"     => "themestek-blogbox",
	"class"    => "",
	'category' => esc_html__( 'THEMESTEK', 'liviza' ),
	"icon"     => 'icon-themestek-vc',
	"params"   => $params,
) );