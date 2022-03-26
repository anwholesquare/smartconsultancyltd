<?php
 
 
/**
 *  Version and directory
 */



/**
 *  Demo Content setup
 */
require_once THEMESTEK_LIVIZA_DIR . 'demo-content-setup/one-click-demo/demo-content.php';



/**
 *  Translation
 */
function liviza_demosetup_load_plugin_textdomain() {
	$domain = 'liviza-demo-content-setup';
	$locale = apply_filters( 'plugin_locale', get_locale(), $domain );
	if ( $loaded = load_textdomain( 'liviza-demosetup', trailingslashit( WP_LANG_DIR ) . $domain . '/' . $domain . '-' . $locale . '.mo' ) ) {
		return $loaded;
	} else {
		load_plugin_textdomain( 'liviza-demosetup', FALSE, basename( dirname( __FILE__ ) ) . '/languages/' );
	}
}
add_action( 'init', 'liviza_demosetup_load_plugin_textdomain' );



/**
 * Load plugin textdomain.
 *
 * @since 1.0.0
 */
function liviza_demosetup_load_textdomain() {
	load_plugin_textdomain( 'liviza-demosetup', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' ); 
}
add_action( 'plugins_loaded', 'liviza_demosetup_load_textdomain' );







function liviza_demo_content_scripts_styles(){

	wp_enqueue_style(
		'themestek-one-click-demo-style',
		plugin_dir_url( __FILE__ ) . 'style.css',
		time(),
		true
	);
	wp_enqueue_script(
		'themestek-one-click-demo-set-js',
		plugin_dir_url( __FILE__ ) . 'functions.js',
		array( 'jquery' ),
		time(),
		true
	);
	


}
add_action( 'admin_enqueue_scripts', 'liviza_demo_content_scripts_styles', 20 );



/**
 * html Output for the one click demo setup
 *
 * @since 1.0.0
 */
if( !function_exists('themestek_liviza_one_click_html') ){
function themestek_liviza_one_click_html() {
	?>
	
	
	
	
	<div class="themestek-demo-import-btn">
		<!--<a href="#TB_inline?height=300&width=content&inlineId=themestek-demo-import-form&modal=true" class="thickbox button button-primary"> Import Demo data </a>-->
		<a href="#" class="button button-primary themestek-open-demo-box"> Import Demo data </a>
	</div>
	
	<div id="themestek-demo-import-form-w" style="display:none;">
	
		<div class="themestek-demo-import-form-bg-grey">
			<div id="themestek-demo-import-form">
				<div class="themestek-demo-import-close-w"><a href="#"><i class="fa fa-close"></i></a></div>
				<div id="themestek-demo-import-form-inner">
			
					<h2>Demo Importer</h2>
					
					<div class="themestek-import-demo-boxes-w">
					
						<div class="import-demo-thumb-w import-demo-thumb-default">
							<div class="import-demo-thumb-img">
								<div class="import-demo-thumb-img-overlay" style="display:none;"><div class="import-demo-thumb-img-overlay-inner"><i class="fa fa-cog fa-spin"></i></div></div>
								<img src="<?php echo plugin_dir_url( __FILE__ ) ?>images/thumb-1.jpg" />
							</div>
							<div class="themestek-import-demo-buttons">
								<a href="http://liviza.themestek2.com/" target="_blank" class="button themestek-import-demo-preview-link"> <i class="fa fa-external-link"></i> Preview</a>
								<button href="#" class="button button-primary themestek-import-demo-import-demo-link"> <i class="fa fa-check"></i> Import Demo</button>
							</div>
							<div class="themestek-import-demo-conformation-w" style="display:none;">
								<div class="themestek-import-demo-conformation">
									<span>Are you sure you want to setup demo content?</span> <br><br>
									<a href="#" class="button button-primary themestek-import-demo-import-demo-do-process" data-demo="Overlay"> <i class="fa fa-check"></i> Yes</a> &nbsp;
									<a href="#" class="button button-primary themestek-import-demo-import-demo-no"> <i class="fa fa-close"></i> No</a>
								</div>
							</div>
						</div>
						
						<div class="import-demo-thumb-w import-demo-thumb-default">
							<div class="import-demo-thumb-img">
								<div class="import-demo-thumb-img-overlay" style="display:none;"><div class="import-demo-thumb-img-overlay-inner"><i class="fa fa-cog fa-spin"></i></div></div>
								<img src="<?php echo plugin_dir_url( __FILE__ ) ?>images/thumb-2.jpg" />
							</div>
							<div class="themestek-import-demo-buttons">
								<a href="http://liviza.themestek2.com/demo2/" target="_blank" class="button themestek-import-demo-preview-link"> <i class="fa fa-external-link"></i> Preview</a>
								<button href="#" class="button button-primary themestek-import-demo-import-demo-link"> <i class="fa fa-check"></i> Import Demo</button>
							</div>
							<div class="themestek-import-demo-conformation-w" style="display:none;">
								<div class="themestek-import-demo-conformation">
									<span>Are you sure you want to setup demo content?</span> <br><br>
									<a href="#" class="button button-primary themestek-import-demo-import-demo-do-process" data-demo="InfoStack"> <i class="fa fa-check"></i> Yes</a> &nbsp;
									<a href="#" class="button button-primary themestek-import-demo-import-demo-no"> <i class="fa fa-close"></i> No</a>
								</div>
							</div>
						</div>
						
						<div class="import-demo-thumb-w import-demo-thumb-default">
							<div class="import-demo-thumb-img">
								<div class="import-demo-thumb-img-overlay" style="display:none;"><div class="import-demo-thumb-img-overlay-inner"><i class="fa fa-cog fa-spin"></i></div></div>
								<img src="<?php echo plugin_dir_url( __FILE__ ) ?>images/thumb-3.jpg" />
							</div>
							<div class="themestek-import-demo-buttons">
								<a href="http://liviza.themestek2.com/demo1/" target="_blank" class="button themestek-import-demo-preview-link"> <i class="fa fa-external-link"></i> Preview</a>
								<button href="#" class="button button-primary themestek-import-demo-import-demo-link"> <i class="fa fa-check"></i> Import Demo</button>
							</div>
							<div class="themestek-import-demo-conformation-w" style="display:none;">
								<div class="themestek-import-demo-conformation">
									<span>Are you sure you want to setup demo content?</span> <br><br>
									<a href="#" class="button button-primary themestek-import-demo-import-demo-do-process" data-demo="Classic"> <i class="fa fa-check"></i> Yes</a> &nbsp;
									<a href="#" class="button button-primary themestek-import-demo-import-demo-no"> <i class="fa fa-close"></i> No</a>
								</div>
							</div>
						</div>

						<div class="import-demo-thumb-w import-demo-thumb-default">
							<div class="import-demo-thumb-img">
								<div class="import-demo-thumb-img-overlay" style="display:none;"><div class="import-demo-thumb-img-overlay-inner"><i class="fa fa-cog fa-spin"></i></div></div>
								<img src="<?php echo plugin_dir_url( __FILE__ ) ?>images/thumb-4.jpg" />
							</div>
							<div class="themestek-import-demo-buttons">
								<a href="http://liviza.themestek2.com/liviza-rtl/" target="_blank" class="button themestek-import-demo-preview-link"> <i class="fa fa-external-link"></i> Preview</a>
								<button href="#" class="button button-primary themestek-import-demo-import-demo-link"> <i class="fa fa-check"></i> Import Demo</button>
							</div>
							<div class="themestek-import-demo-conformation-w" style="display:none;">
								<div class="themestek-import-demo-conformation">
									<span>Are you sure you want to setup demo content?</span> <br><br>
									<a href="#" class="button button-primary themestek-import-demo-import-demo-do-process" data-demo="RTL"> <i class="fa fa-check"></i> Yes</a> &nbsp;
									<a href="#" class="button button-primary themestek-import-demo-import-demo-no"> <i class="fa fa-close"></i> No</a>
								</div>
							</div>
						</div>

						
						<div class="clear clr"></div>
						
					</div>
				</div>
			</div>
		</div>
	</div>
	
	
	<div class="clear"></div>
	
	<?php
}
}


