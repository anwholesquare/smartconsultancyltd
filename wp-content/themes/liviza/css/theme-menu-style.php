<?php $themestek_header_menuarea_height = themestek_header_menuarea_height(); ?>
.headerlogo{
    height: <?php echo esc_html($header_height); ?>px;
    line-height: <?php echo esc_html($header_height); ?>px;
}
/* Header sticky animation */        
@keyframes menu_sticky {
    0%   {margin-top:-120px;opacity: 0;}
    50%  {margin-top: -64px;opacity: 0;}
    100% {margin-top: 0;opacity: 1;}
}
/**
* Responsive Menu
* ----------------------------------------------------------------------------
*/
@media (max-width: <?php echo esc_html($breakpoint); ?>px){
    body.themestek-slider-yes{
        background-image: none;
    }
    .themestek-slider-yes .headerlogo .standardlogo{
        display: inline-block;
    }
    .themestek-header-text-area,
    .themestek-header-icon.themestek-header-wc-cart-link{
        display: none;
    }

    /*** Header Section ***/
    .site-header-main.themestek-table{
        margin: 0 15px;
        width: auto;
        display: block;
    }   
    .site-header-main.themestek-table .themestek-table-cell {
        display: block;     
    }   
    .themestek-header-icon{
        padding-right: 0px;
        padding-left: 20px;
        position: relative;
    } 
    .site-title{
        width: inherit;        
    }       
    /*** Navigation ***/
    .main-navigation {
        clear: both;
    }    
    .site-branding,
    .menu-themestek-main-menu-container,
    #site-header-menu {
        float: none;    
    }

    /*** Responsive Menu ***/    
    .righticon{
        position: absolute;
        right: 0px;
        z-index: 33;
        top: 15px;
        display: block;
    }    
    .righticon i{
        font-size:20px;
        cursor:pointer;
        display:block;
        line-height: 0px;
    } 
    /*** Default menu box ***/ 
    #site-header-menu #site-navigation div.nav-menu > ul{
        position: absolute;
        padding: 10px 20px; 
        left: 0px;  
        box-shadow: rgba(0, 0, 0, 0.12) 3px 3px 15px;
        border-top: 3px solid <?php echo esc_html($skincolor); ?>;   
        background-color: #333;       
        z-index: 100;
        width: 100%;
        top: <?php echo esc_html($header_height); ?>px;  
    }  
    <?php if($headerbg_color=='custom' && !empty($headerbg_customcolor['rgba']) ) : ?>
        #site-header-menu #site-navigation div.nav-menu > ul{
            background-color: <?php  echo esc_html($headerbg_customcolor['rgba']); ?>;
        } 
    <?php endif; ?>
    <?php if( !empty($dropmenu_background['color']) ): ?>       
        #site-header-menu #site-navigation div.nav-menu > ul{
            background-color: <?php echo esc_html($dropmenu_background['color']); ?>;
        }    
    <?php endif; ?>      
    #site-header-menu #site-navigation div.nav-menu > ul,
    #site-header-menu #site-navigation div.nav-menu > ul ul {
        overflow: hidden;
        max-height: 0px;
    }    
    #site-header-menu #site-navigation div.nav-menu > ul ul ul{
        max-height: none;
    }    
    #site-header-menu #site-navigation div.nav-menu > ul > li{
        position: relative;
        text-align: left;
    }    
    #site-header-menu #site-navigation.toggled-on div.nav-menu > ul{       
        display: block;
        max-height: 10000px;       
    }
    #site-header-menu #site-navigation.toggled-on div.nav-menu > ul ul.open {
        max-height: 10000px;
    } 
    #site-header-menu #site-navigation div.nav-menu > ul ul{
          background-color: transparent !important;
    }
    #site-header-menu #site-navigation div.nav-menu > ul > li a{
        display: block;
        padding: 15px 0px;        
        text-decoration: none;
        line-height: 18px;
        height: auto;
        line-height: 18px !important;
    }     
    #site-header-menu #site-navigation div.nav-menu > ul ul a{
        margin: 0;
        display: block;
        padding: 15px 15px 15px 0px;
    }
    #site-header-menu #site-navigation div.nav-menu > ul > li li a:before{
        font-family: "FontAwesome";
        font-style: normal;
        font-weight: normal;
        speak: none;
        display: inline-block;
        text-decoration: inherit;
        margin-right: .2em;
        text-align: center;
        opacity: .8;
        font-variant: normal;
        text-transform: none;
        font-size: 13px;
        content: "\f105";
        margin-right: 8px;
        display: none;
    }
    #site-header-menu #site-navigation div.nav-menu > ul > li a{
        display: inline-block;
    }  
    <?php if( !empty($dropdownmenufont['color']) ): ?>
        #site-header-menu #site-navigation div.nav-menu > ul > li > a,
        .righticon i  {
            color: rgba( <?php echo themestek_hex2rgb($dropdownmenufont['color']); ?> , 1);
        } 
        #site-header-menu #site-navigation div.nav-menu > ul li {
            border-bottom: 1px solid rgba( <?php echo themestek_hex2rgb($dropdownmenufont['color']); ?> , 0.15);
        }  
        #site-header-menu #site-navigation div.nav-menu > ul li li:last-child{
            border-bottom: none;
        }     
    <?php endif; ?>    
    /* Dynamic main menu color applying to responsive menu link text */           
    .menu-toggle i,     
    .themestek-header-icons a{
        color: rgba( <?php echo themestek_hex2rgb($mainMenuFontColor); ?> , 1) ;
    }
    .themestek-liviza-icon-bars,
    .themestek-liviza-icon-bars:before, 
    .themestek-liviza-icon-bars:after{
        background: rgba( <?php echo themestek_hex2rgb($mainMenuFontColor); ?> , 1);
    }
    .themestek-headerstyle-infostack .main-navigation:not(.toggled-on) .themestek-liviza-icon-bars,
    .themestek-headerstyle-infostack .main-navigation .themestek-liviza-icon-bars:before, 
    .themestek-headerstyle-infostack .main-navigation .themestek-liviza-icon-bars:after{
        background: #031b4e;
    }
    #site-header-menu #site-navigation div.nav-menu > ul{
        padding-right: 15px;
        padding-left: 15px;
    }    
    #site-header-menu #site-navigation div.nav-menu > ul ul{
        list-style: none;
    }      
    .themestek-header-icons{
        position: absolute;
        top: 4px;
        float: none;
        right: 53px;
        margin-right: 0px;
    }    
    #site-header-menu #site-navigation div.nav-menu > ul > li ul{       
        display: block !important;
        height: auto !important;  
    }
    #site-header-menu #site-navigation div.nav-menu > ul > li ul{
        background-image: none !important;      
    }
    #site-header-menu #site-navigation div.nav-menu > ul > li ul{
        background: none;
        background-image: none;
    }    
    .themestek-header-overlay .themestek-titlebar-wrapper .themestek-titlebar-inner-wrapper{
        padding-top: 0px;
    }
    .themestek-header-icon{
        top: <?php echo esc_html(ceil($header_height/2)-15); ?>px;
        display: block;
        position: absolute; 
        right: 7px;
    }
    #site-header-menu #site-navigation .menu-toggle {   
        top: 50%;
        -webkit-transform: translateY(-50%);
        -ms-transform: translateY(-50%);
        transform: translateY(-50%);
        display: block;
        position: absolute;
        right: 15px;
        width: 25px;
        height: 30px;
        background: none;
        z-index: 1;
        outline: none;
        padding: 0;
        line-height: normal;
        margin-top: -4px;
    }
    .themestek-headerstyle-classic-overlay #site-header-menu #site-navigation .menu-toggle {
        right: 0px;
    }
    /*** Display None ***/
    .themestek-header-style-infostack .themestek-header-right,
    .themestek-header-overlay .site-header .themestek-header-right,
    .themestek-infostack-right-content,
    #site-header-menu #site-navigation div.nav-menu > ul{
        display: none;
    }
    .themestek-header-style-infostack .themestek-stickable-header-w{
        height: auto !important;
    }
    .themestek-header-style-infostack .themestek-header-top-wrapper.container{
        width: 100%;     
    }

    /*** sticky footer bottom margin ***/   
    body .site-content-wrapper {
        margin-bottom: 0px !important;
    }

    /*** Classic header cross ***/  
    .themestek-header-overlay .themestek-header-icons,
    .themestek-header-overlay .site-header .themestek-social-links-wrapper,
    .themestek-headerstyle-classic.themestek-slider-yes #themestek-home{
        display: none;
    }
    .themestek-header-overlay .site-header-main.themestek-table{  
        margin: 0 30px;
        padding: 0;
        width: auto;
        display: block;
    }
    .themestek-header-overlay .site-header-main.themestek-table .themestek-header-top-wrapper.container{
       width: auto;
       padding: 0; 
    }

    /*** Classic header cross ***/ 
    .themestek-header-style-classic .site-header .themestek-header-right,
    .themestek-header-style-classic-2 .site-header .themestek-header-icons{
        display: none;
    }

}
@media (min-width: <?php echo esc_html($breakpoint); ?>px) {
    .site-header .themestek-vc_btn3-container{
        margin-bottom: 0;
    }
    /*** Header full ***/
    .site-header-main.container-full {
        padding: 0 50px;
    }
    .themestek-stickable-header.is_stuck{        
        box-shadow: 0 4px 10px 0 rgba(0, 0, 0, 0.06);
    } 
    .themestek-stickable-header{
        z-index: 12;      
    }
    .themestek-header-right,   
    .headerlogo, 
    #site-header-menu #site-navigation div.nav-menu > ul,
    #site-header-menu #site-navigation div.nav-menu > ul > li, 
    #site-header-menu #site-navigation div.nav-menu > ul > li > a {
        transition: all .3s ease-in-out;
        -moz-transition: all .3s ease-in-out;
        -webkit-transition: all .3s ease-in-out;
        -o-transition: all .3s ease-in-out;
    }
    .themestek-header-icon{       
        position: relative;
    }
    #site-header-menu #site-navigation .nav-menu,  
    #site-header-menu,        
    .menu-themestek-main-menu-container{
        float: right;
    }    
    .navbar{
        vertical-align: top;
    }
    .menu-toggle {
        display: none;
        z-index: 10;    
    }
    .menu-toggle i{
        color:#fff;
        font-size:28px;
    }
    .toggled-on li, 
    .toggled-on .children {
        display: block;
    }  
    #site-header-menu #site-navigation .nav-menu-wrapper > ul {
        margin: 0;
        padding: 0; 
    }
    #site-header-menu #site-navigation div.nav-menu > ul{
        margin: 0px;
    }    
    #site-header-menu #site-navigation div.nav-menu > ul > li{
        height: <?php echo esc_html($header_height); ?>px;
        line-height: <?php echo esc_html($header_height); ?>px;
    }  
    #site-header-menu #site-navigation div.nav-menu > ul > li {
        margin: 0 0px 0 0;
        display: inline-block;
        position: relative;
        vertical-align: top;
    }    
    #site-header-menu #site-navigation div.nav-menu > ul > li > a{
        display: block; 
        margin: 0px 18px 0px 18px;
        padding:  0px; 
        text-decoration: none;
        position: relative;
        z-index: 1;       
        height: <?php echo esc_html($header_height); ?>px;
        line-height: <?php echo esc_html($header_height); ?>px;        
    }
    #site-header-menu #site-navigation div.nav-menu > ul{    
        height: <?php echo esc_html($header_height); ?>px;       
    }
    .is_stuck #site-header-menu #site-navigation div.nav-menu > ul{
        height: <?php echo esc_html($header_height_sticky); ?>px;  
    }
    /*WordPress Dropdown Menu*/
    .themestek-dmenu-active-color-skin #site-header-menu #site-navigation div.nav-menu > ul > li li.current-menu-ancestor > a,    
    .themestek-dmenu-active-color-skin #site-header-menu #site-navigation div.nav-menu > ul > li li.current-menu-item > a,    
    .themestek-dmenu-active-color-skin #site-header-menu #site-navigation div.nav-menu > ul > li li.current_page_item > a,    
    .themestek-dmenu-active-color-skin #site-header-menu #site-navigation div.nav-menu > ul > li li.current_page_ancestor > a{
        color: <?php echo esc_html($skincolor); ?> ;
    }
    <?php if( $mainmenu_active_link_color=='custom' && !empty($mainmenu_active_link_custom_color) ){ ?>
    /* Main Menu Active Link Color --------------------------------*/                
        .themestek-mmenu-active-color-custom #site-header-menu #site-navigation div.nav-menu > ul > li.current_page_item > a, 
        .themestek-mmenu-active-color-custom #site-header-menu #site-navigation div.nav-menu > ul > li.current_page_ancestor > a, 
        .themestek-mmenu-active-color-custom #site-header-menu #site-navigation div.nav-menu > ul > li.current_page_parent > a,          
        .themestek-mmenu-active-color-custom  #site-header-menu #site-navigation div.nav-menu > ul > li.current-menu-ancestor > a,       
        .themestek-mmenu-active-color-custom  .themestek-mmmenu-override-yes #site-header-menu #site-navigation div.nav-menu > ul > li.current_page_item > a{
            color: <?php echo esc_html($mainmenu_active_link_custom_color); ?>;
        }
    <?php } ?>
    /*** Defaultsenu ***/      
    .themestek-dmenu-active-color-skin #site-header-menu #site-navigation div.nav-menu > ul > li li:hover > a,
    .themestek-dmenu-active-color-skin #site-header-menu #site-navigation div.nav-menu > ul > li li:hover > a{
        color: <?php echo esc_html($skincolor); ?> ;
    }
    .themestek-mmenu-active-color-skin #site-header-menu #site-navigation div.nav-menu > ul > li.current-menu-ancestor > a, 
    .themestek-mmenu-active-color-skin #site-header-menu #site-navigation div.nav-menu > ul > li.current_page_item > a,     
    .themestek-mmenu-active-color-skin #site-header-menu #site-navigation div.nav-menu > ul > li.current_page_ancestor > a, 
    .themestek-mmenu-active-color-skin #site-header-menu #site-navigation div.nav-menu > ul > li:hover > a{
        color: <?php echo esc_html($skincolor); ?> ;
    } 
    <?php if( $mainmenu_active_link_color=='custom' && !empty($mainmenu_active_link_custom_color) ){ ?>     
        .themestek-mmenu-active-color-custom .themestek-header-icons .themestek-header-search-link a:hover, 
        .themestek-mmenu-active-color-custom .themestek-header-icons .themestek-header-wc-cart-link a:hover,        
        .themestek-mmenu-active-color-custom #site-header-menu #site-navigation div.nav-menu > ul > li:hover > a{
            color: <?php echo esc_html($mainmenu_active_link_custom_color); ?> ;
        }        
        .themestek-mmenu-active-color-custom #site-header-menu #site-navigation div.nav-menu > ul > li > a:before{
            background-color: <?php echo esc_html($mainmenu_active_link_custom_color); ?> ;
        }    
    <?php } ?>
    <?php if( $dropmenu_active_link_color=='custom' && !empty($dropmenu_active_link_custom_color) ){ ?>        
        /* Dropdown Menu Active Link Color -------------------------------- */        
        .themestek-dmenu-active-color-custom #site-header-menu #site-navigation div.nav-menu > ul > li li:hover > a{
            color: <?php echo esc_html($skincolor); ?> ;
        }
    <?php } ?>  
    #site-header-menu #site-navigation div.nav-menu > ul > li > a{
        margin: 0px 15px 0px 15px;
    }
    .themestek-main-menu-more-than-six #site-header-menu #site-navigation div.nav-menu > ul > li > a{
        margin: 0px 10px 0px 10px;
    }

    .site-header.is_stuck .social-icons li > a, 
    .site-header.is_stuck .themestek-header-icons .themestek-header-icon a,

    .is_stuck #site-header-menu #site-navigation div.nav-menu > ul > li > a,
    #site-header-menu.is_stuck #site-navigation div.nav-menu > ul > li > a{
        color: <?php echo esc_html($stickymainmenufontcolor); ?>;
    }   
    .site-header .social-icons li > a,
    .themestek-header-icons .themestek-header-icon a{
        color: rgba( <?php echo themestek_hex2rgb($mainMenuFontColor); ?> , 1) ;
        transition: all .3s ease-in-out;
        -moz-transition: all .3s ease-in-out;
        -webkit-transition: all .3s ease-in-out;
        -o-transition: all .3s ease-in-out;
    }
    .site-header .social-icons li > a:hover,
    .themestek-header-icons .themestek-header-icon a:hover{
        color: <?php echo esc_html($skincolor); ?> ;
    }
    .themestek-header-style-classic .site-header.themestek-bgcolor-white .themestek-header-icons .themestek-header-wc-cart-link a:hover span.number-cart{
        color: #fff;
    } 
    /*** Sub Navigation Section ***/     
    #site-header-menu #site-navigation div.nav-menu > ul > li ul{
        box-shadow: 0px 10px 40px rgba(0, 0, 0, 0.20);
    }
    header#masthead #site-header-menu #site-navigation div.nav-menu > ul li.last ul.sub-menu{
        left: auto;
        right: 0px !important;
    }    
    header#masthead #site-header-menu #site-navigation div.nav-menu > ul li.last ul.sub-menu ul.sub-menu, 
    header#masthead #site-header-menu #site-navigation div.nav-menu > ul li.lastsecond ul.sub-menu ul.sub-menu{
        left: -100%;
    }            
    #site-header-menu #site-navigation div.nav-menu > ul ul {
        width: 250px;
        padding: 0px;
    }        
    #site-header-menu #site-navigation div.nav-menu > ul ul li > a {
        margin: 0;
        display: block;
        padding: 17px 20px 15px;
        position: relative;         
    }

    #site-header-menu #site-navigation div.nav-menu > ul ul li:hover > a{
        background: #fff;
    }
    #site-header-menu #site-navigation div.nav-menu > ul ul li > a{
        -webkit-transition: all .2s ease-in-out;
        transition: all .2s ease-in-out;
    }  
    #site-header-menu #site-navigation div.nav-menu > ul li > ul ul  {
        border-left: 0;
        left: 100%;
        top: 0;        
    }
    #site-header-menu #site-navigation div.nav-menu > ul li > ul ul.themestek-nav-left{
        left: -100%;
        right: 0;
    }
    #site-header-menu #site-navigation ul ul li {
        position: relative;
    }    
    #site-header-menu #site-navigation div.nav-menu > ul ul {
        text-align: left;
        position: absolute;        
        display: block;
        line-height: 14px;        
        margin: 0;
        list-style: none;
        left: 0;        
        border-radius: 0;
        -webkit-box-shadow: 0 6px 12px rgba(0,0,0,.175);
        box-shadow: 0 6px 12px rgba(0,0,0,.175);
        background-clip: padding-box;
        z-index: 99;

        visibility: hidden;
        opacity: 0;
        visibility: hidden;
        -webkit-transition: all .3s linear 0s;
        transition: all .3s linear 0s;
    }
    #site-header-menu #site-navigation div.nav-menu > ul li:hover > ul {
        opacity: 1;        
        visibility: visible; 
    }   
    /*** Sep Section ***/
    #site-header-menu #site-navigation div.nav-menu ul ul > li {
        border-bottom: 1px solid transparent;
        border-bottom-color: rgba(0, 0, 0, 0.10);
    } 
    #site-header-menu #site-navigation div.nav-menu ul ul > li:hover > a{
        background-color: <?php echo esc_html($skincolor); ?> ;
        color: #fff !important;
    }


    .themestek-dmenu-sep-white #site-header-menu #site-navigation div.nav-menu ul ul > li {
        border-bottom-color: rgba(255, 255, 255, 0.20);
    }
    /*** Sticky Header Height ***/ 
    header .is_stuck #site-header-menu #site-navigation,    
    .is_stuck .headerlogo,
    .is_stuck #site-header-menu #site-navigation div.nav-menu > ul > li,
    .is_stuck #site-header-menu #site-navigation div.nav-menu > ul > li > a{
        height: <?php echo esc_html($header_height_sticky); ?>px ;
        line-height: <?php echo esc_html($header_height_sticky); ?>px;
    }
    /*** Sub Navigation menu ***/
    #site-header-menu #site-navigation div.nav-menu > ul > li > ul {
        top: auto; 
        border-top: 3px solid <?php echo esc_html($skincolor); ?>;       
    }  
    /*** Sticky Sub Navigation menu ***/
    .site-header-main.container-fullwide{
        padding-left: 30px;
        padding-right: 0px;
    }    
    /*** Header Icon border ***/       
    .is_stuck .themestek-header-icons{  
        border-left-color: rgba( <?php echo themestek_hex2rgb($stickymainmenufontcolor); ?> , 0.15) ;
        height: <?php echo esc_html($header_height_sticky); ?>px;
    }    
    header .is_stuck .site-header:after{
        border-bottom-color: rgba( <?php echo themestek_hex2rgb($stickymainmenufontcolor); ?> , 0.15) ;
    }
    /*** Header Text Area ***/
    .themestek-header-style-classic .nav-menu{
        margin-right:10px;
    }
    .themestek-header-style-classic .themestek-header-icons {
         margin-left: 15px;       
         float: right;
    }
    .themestek-header-style-classic .themestek-header-text-area {
         float: right;
         margin-left: 20px;
    }
    .themestek-header-style-classic:not(.themestek-header-overlay) .themestek-header-icons,
    .themestek-header-style-classic:not(.themestek-header-overlay) .themestek-header-text-area {
        height: <?php echo esc_html($header_height); ?>px;
        line-height: <?php echo esc_html($header_height); ?>px;
        transition: all .3s ease-in-out;
        -moz-transition: all .3s ease-in-out;
        -webkit-transition: all .3s ease-in-out;
        -o-transition: all .3s ease-in-out;
    }
    .themestek-header-style-classic .is_stuck .themestek-header-icons,
    .themestek-header-style-classic .is_stuck .themestek-header-text-area {
        height: <?php echo esc_html($header_height_sticky); ?>px;
        line-height: <?php echo esc_html($header_height_sticky); ?>px;
    }

    /*themestek-header-wc-cart-link*/
    .themestek-header-wc-cart-link{
        margin-right: 30px;
    }
    .themestek-header-style-classic:not(.themestek-header-overlay) .themestek-header-wc-cart-link{
        margin-right: 15px;
    }
    .themestek-header-style-classic:not(.themestek-header-overlay) .themestek-header-wc-cart-link .number-cart{
        left: 3px;
    }
    .themestek-header-style-infostack .themestek-header-wc-cart-link {
        margin-right: 5px;
    }
    .themestek-header-wc-cart-link .number-cart{
        position: absolute;
        width: 20px;
        height: 20px;
        line-height: 20px;
        background-color: <?php echo esc_html($skincolor); ?>;
        color: #fff;
        border-radius: 50%;
        top: -21px;
        left: 8px;
        font-size: 11px;
        transition: all .3s ease-in-out;
        -moz-transition: all .3s ease-in-out;
        -webkit-transition: all .3s ease-in-out;
        -o-transition: all .3s ease-in-out;
        text-align: center;
    }
    .themestek-headerstyle-infostack .themestek-header-wc-cart-link .number-cart{
        background-color: #fff;
        color: #313437;
        top: 4px;
        left: 28px;
        text-align: center;
        font-size: 13px;
    }
    .themestek-header-style-overlay #site-header-menu #site-navigation .themestek-header-icon.themestek-header-wc-cart-link a,
    .themestek-header-style-classic #site-header-menu #site-navigation .themestek-header-icon.themestek-header-wc-cart-link a{
        background-color: transparent;
        color: rgba( <?php echo themestek_hex2rgb($mainMenuFontColor); ?> , 1) ;
    }
    .themestek-header-style-overlay .is_stuck #site-header-menu #site-navigation .themestek-header-icon.themestek-header-wc-cart-link a,
    .themestek-header-style-classic .is_stuck #site-header-menu #site-navigation .themestek-header-icon.themestek-header-wc-cart-link a{           
        color: rgba( <?php echo themestek_hex2rgb($stickymainmenufontcolor); ?> , 1) ;
    }

    .themestek-header-style-classic.themestek-header-overlay #site-header-menu #site-navigation .themestek-header-icon.themestek-header-wc-cart-link a:hover .number-cart{
        color: <?php echo esc_html($skincolor); ?>;
        background-color: #fff;
    }

    .themestek-header-style-classic.themestek-header-overlay .is_stuck #site-header-menu #site-navigation .themestek-header-icon.themestek-header-wc-cart-link a:hover .number-cart{
        background-color: rgba( <?php echo themestek_hex2rgb($stickymainmenufontcolor); ?> , 1);
        color: #fff;
    }
    .themestek-header-style-classic.themestek-header-overlay .themestek-pre-header-wrapper .themestek-vc_btn3-container .themestek-vc_general.themestek-vc_btn3:hover{
        background-color: <?php echo esc_html($skincolor); ?>;
    }

    /*** ThemeStek Center Menu ***/     
    .themestek-header-menu-position-center #site-header-menu{
        float: none;
    }
    .themestek-header-menu-position-center #site-header-menu #site-navigation{
        text-align: center;
        width: 100%;
    }    
    .themestek-header-menu-position-center #site-header-menu  #site-navigation .nav-menu{       
        float: none;
        right: 0;
        left: 0;
        text-align: center;      
    }
    .themestek-header-menu-position-center .site-header-menu.themestek-table-cell{
        display: block;
    }
    .themestek-header-menu-position-center .headerlogo, 
    .themestek-header-menu-position-center .themestek-header-icon{
        position: relative;
        z-index: 2;
    }  

    /*** ThemeStek Left Menu ***/   
    .themestek-header-menu-position-left #site-header-menu{
        float: none;
        display: block;
    }
    .themestek-header-menu-position-left #site-header-menu #site-navigation .nav-menu{
        float: none;
    }
    .themestek-header-menu-position-left .site-branding{    
        padding-right: 25px;
    }

    /*** Header Social link ***/ 
    .site-header .social-icons {
        padding-top: 0;
        padding-bottom: 0;
    }
    .site-header.is_stuck {
        position: fixed;
        width:100%;
        top:0;    
        z-index: 999;
        margin:0;
        animation-name: menu_sticky;
        -webkit-box-shadow: 0px 13px 25px -12px rgba(0,0,0,0.25);
        -moz-box-shadow: 0px 13px 25px -12px rgba(0,0,0,0.25);
        box-shadow: 0px 13px 25px -12px rgba(0,0,0,0.25);
        padding: 0;
    }    
    #site-header-menu #site-navigation div.nav-menu ul ul > li:last-child{
        border-bottom: none !important;
    }

    /***  Ts Header Style Infostack ***/    
    .themestek-header-style-infostack #site-header-menu #site-navigation{
        float: left;
        position: relative;
    }
    .themestek-header-style-infostack .themestek-stickable-header{
        position: relative;
    }
    .themestek-header-style-infostack .themestek-slider-wrapper {
        margin-top: -30px;
    }
    .themestek-header-style-infostack #site-header-menu #site-navigation .nav-menu ul,
    .themestek-header-style-infostack #site-header-menu #site-navigation .nav-menu{
        float: left;
        height: auto;
    }  
    .themestek-header-style-infostack  #site-header-menu{
        float: none;       
    }
    .themestek-header-style-infostack #site-header-menu #site-navigation div.nav-menu > ul > li{
        vertical-align: top;
    }
    .themestek-header-style-infostack #site-header-menu #site-navigation div.nav-menu > ul > li > a{ 
        padding: 0px 25px 0px 25px;
        margin: 0;
    }
    .themestek-header-style-infostack #site-header-menu #site-navigation .nav-menu ul {
        height: auto !important;
    }
    .themestek-header-style-infostack .is_stuck .themestek-header-icons,
    .themestek-header-style-infostack #site-header-menu #site-navigation div.nav-menu > ul > li, 
    .themestek-header-style-infostack #site-header-menu #site-navigation div.nav-menu > ul > li > a, 
    .themestek-header-style-infostack #site-header-menu #site-navigation {
        height: <?php echo esc_html($themestek_header_menuarea_height); ?>px;
        line-height: <?php echo esc_html($themestek_header_menuarea_height); ?>px;
    }

    .themestek-header-style-infostack .headerlogo{
        height: <?php echo esc_html($header_height)?>px; 
        margin-left: 0px;
    }
    .themestek-header-style-infostack .site-header-menu-middle .container {        
        position: relative;  
        width: auto;        
    }
    .themestek-header-style-infostack .is_stuck .site-header-menu-middle{
        padding: 0px;
    }
    .themestek-header-style-infostack #site-header-menu .is_stuck .container,
    .themestek-header-style-infostack .site-header-menu-inner{
        background-color: transparent;
    }
    .themestek-header-style-infostack .site-header-menu .is_stuck .themestek-sticky-bgcolor-skincolor{
        background-color: <?php echo esc_html($skincolor); ?>; 
    }
    .themestek-header-style-infostack .themestek-infostack-right-content {
        float: right;
        position: relative;
        z-index: 3;
        text-align: right;
        height: <?php echo esc_html($header_height)?>px; 
        display: table;
    }

    .themestek-infostack-right-content .info-widget i{
        color: <?php echo esc_html($skincolor); ?>;
    }
    .themestek-header-style-infostack .themestek-header-right .themestek-vc_btn3-inline .themestek-vc_btn3,
    .themestek-header-style-infostack .themestek-header-right .themestek-header-icons a,
    .themestek-header-style-infostack .themestek-header-right .themestek-header-text-area{
        height: <?php echo esc_html($themestek_header_menuarea_height); ?>px;
        line-height: <?php echo esc_html($themestek_header_menuarea_height); ?>px;
    }
    .themestek-header-style-infostack .themestek-header-right .themestek-header-text-area{
        position: relative;       
    }     
    .themestek-header-style-infostack .themestek-header-right .themestek-vc_btn3-inline{
        position: relative;
        z-index: 1;
    }
    .themestek-header-style-infostack .themestek-header-right .themestek-header-icons a{
        padding: 0 25px;
        background-color: <?php echo esc_html($skincolor); ?>; 
        font-size: 16px;
    }
    .themestek-header-style-infostack .themestek-header-right .themestek-header-icons a:hover{
        color: #fff;
    }
    .themestek-header-style-infostack .themestek-header-right .themestek-header-icons .themestek-header-wc-cart-link a{
        background-color: transparent;
    }
    .themestek-header-style-infostack .themestek-header-right .themestek-header-icons .themestek-header-wc-cart-link .number-cart {
        width: 17px;
        height: 17px;
        line-height: 17px;
        top: 9px;
        left: 31px;
        font-size: 11px;
    }
    .themestek-headerstyle-infostack section.error-404{
        margin-top: <?php echo esc_html($header_height + $themestek_header_menuarea_height)?>px; 
    }
    .themestek-header-style-infostack div.themestek-titlebar-wrapper{
        margin-top: -32px;
    }
    .themestek-headerstyle-classic .themestek-header-icons{    
        position: relative;        
    }
    .themestek-headerstyle-classic .themestek-stickable-header-w .themestek-social-links-wrapper{
        float: right;
    }

    /*** Overlay Header ***/
    .themestek-header-overlay.themestek-header-style-classic .site-header-main .site-branding{
        padding-left: 50px;
    }

    .themestek-header-overlay .themestek-header-right .social-icons li > a {
        width: auto;
        height: auto;
        font-size: 15px;      
    }

    /*** Overlay Box  ***/
    .themestek-header-style-overlaybox .site-branding{
        padding-left: 30px;
    }
    .themestek-header-style-overlaybox #site-header-menu #site-navigation div.nav-menu > ul > li > a {
        margin: 0px 20px 0px 20px;
    }
    .themestek-header-style-overlaybox .themestek-header-icons,
    .themestek-header-style-overlaybox .themestek-header-right{
        height: <?php echo esc_html($header_height)?>px; 
        line-height:  <?php echo esc_html($header_height)?>px;            
        transition: all .3s ease-in-out;
        -moz-transition: all .3s ease-in-out;
        -webkit-transition: all .3s ease-in-out;
        -o-transition: all .3s ease-in-out;
    }
    .themestek-header-style-overlaybox .is_stuck .themestek-header-icons,
    .themestek-header-style-overlaybox .is_stuck .themestek-header-right{
        height: <?php echo esc_html($header_height_sticky)?>px; 
        line-height:  <?php echo esc_html($header_height_sticky)?>px;   
    }
    .themestek-header-style-overlaybox .themestek-header-icon{
        margin-right: 30px;
    }
    .themestek-header-style-overlaybox .site-header-main > div{
        display: table-cell;
        vertical-align: top;
    }
    .themestek-header-style-overlaybox .themestek-header-right .themestek-header-button-w{
        background-color: <?php echo esc_html($skincolor); ?>;
        display: block;
        margin-left: 20px;
    }
    .themestek-header-style-overlaybox .themestek-header-right .themestek-header-button-w{
        display: block;
        text-align: center;
    }
    .themestek-header-style-overlaybox .themestek-header-right .themestek-header-button-w .themestek-vc_btn3{
        border: 0;
        color: #fff;
    }
    .themestek-header-style-overlaybox .themestek-header-right .themestek-vc_btn3.themestek-vc_btn3-size-md {
        padding: 17px 20px;
        display: inline-block;
    }
    .themestek-header-style-overlaybox .site-header.themestek-stickable-header.is_stuck .site-header-main > div,
    .themestek-header-style-overlaybox .site-header.themestek-stickable-header:not(.is_stuck){
        background-color: transparent !important;
    }
    .themestek-header-style-overlaybox .main-navigation{
        float: right;
        margin-right: 30px;
    }
    .themestek-header-style-overlaybox .themestek-header-icons{
        float: right;
    }

    .themestek-header-style-overlaybox .is_stuck.themestek-sticky-bgcolor-skincolor{
        background-color: <?php echo esc_html($skincolor); ?>;
    }
    .themestek-header-style-overlaybox .is_stuck.themestek-sticky-bgcolor-custom{
        background-color:  <?php echo esc_html($sticky_header_menu_bg_custom_color); ?>;
    }



/*** 
====================================================================
    Header Section - RTL
====================================================================
 ***/ 

    .rtl #site-header-menu #site-navigation div.nav-menu > ul > li {
        text-align: right;
    }
    .rtl .righticon,
    .rtl #site-header-menu #site-navigation .menu-toggle{
        left: 0px;
        right: auto !important; 
    }
    .rtl .themestek-header-overlay.themestek-header-style-classic .site-header-main .site-branding {
        padding-right: 50px;
    }
    .rtl .themestek-header-wc-cart-link {
        margin-left: 30px;
    }

}


   /*** Classic Header ***/
    .themestek-headerstyle-classic .themestek-pre-header-wrapper.themestek-textcolor-dark {
        color: #42474c;
    }
    .themestek-pre-header-wrapper.themestek-textcolor-dark .social-icons li > a:hover{
        color:<?php echo esc_html($skincolor); ?>;
    }
   .themestek-headerstyle-classic .themestek-pre-header-wrapper .themestek-social-links-wrapper .social-icons a{
        width: 40px;
    }
   .themestek-headerstyle-classic .themestek-textcolor-white .top-contact{
       font-size: 13px;          
       font-weight: 500;
   }
    .themestek-headerstyle-classic .top-contact i{
       font-size: 16px;
       margin-right: 5px;
   }
   .themestek-headerstyle-classic .themestek-social-links-wrapper{
      position: relative;      
   }   

    .themestek-headerstyle-classic .top-contact li{
        padding-left: 10px;
        padding-right: 20px;
    }
    .themestek-headerstyle-classic .top-contact li:first-child{
        padding-left: 0;
    }
    .themestek-headerstyle-classic .themestek-textcolor-white .top-contact span{
        color: #fff;        
    } 
    .themestek-headerstyle-classic .themestek-header-right .themestek-vc_general.themestek-vc_btn3{
        border: 2px solid <?php echo esc_html($skincolor); ?>;
        border-radius: 8px;
        padding: 16px 35px !important;
        font-size: 14px;
    }

    .themestek-headerstyle-classic .themestek-vc_general.themestek-vc_btn3.themestek-vc_btn3-style-outline:not(.themestek-vc_btn3-icon-right):not(.themestek-vc_btn3-icon-left) span:after{
        margin-top: 1px !important;
    }
    .themestek-headerstyle-classic .themestek-header-right .themestek-vc_general.themestek-vc_btn3:hover{
        background-color: <?php echo esc_html($skincolor); ?> !important;
        color: #fff;
    }
   .themestek-headerstyle-classic .themestek-header-right .themestek-vc_general.themestek-vc_btn3 span:before{
        background-color: <?php echo esc_html($skincolor); ?> !important;
        margin-top: 1px !important;
   }
    .themestek-headerstyle-classic .themestek-header-right .themestek-vc_general.themestek-vc_btn3:hover span:before{
        background-color: #fff !important;
   }

    /*** Overlay Header ***/
    .themestek-pre-header-content .top-contact{
        height: 62px;
        line-height: 62px;
    } 
    .themestek-header-overlay .themestek-stickable-header-w-main{
        position: absolute;
        z-index: 21;
        width: 100%;
        box-shadow: none;
        -khtml-box-shadow: none;
        -webkit-box-shadow: none;
        -moz-box-shadow: none;
        -ms-box-shadow: none;
        -o-box-shadow: none;
    }
    .themestek-header-overlay.themestek-header-style-classic .site-header-menu.themestek-bgcolor-darkgrey,   
    .themestek-header-overlay.themestek-header-style-classic .site-header.themestek-bgcolor-darkgrey{
        background-color: rgba(0, 0, 0, 0.40);
    }    
    .themestek-header-overlay.themestek-header-style-classic .site-header-menu.themestek-bgcolor-grey, 
    .themestek-header-overlay.themestek-header-style-classic .site-header.themestek-bgcolor-grey{
        background-color: rgba(235, 235, 235, 0.38);
    }   
    .themestek-header-overlay.themestek-header-style-classic .site-header-menu.themestek-bgcolor-white,
    .themestek-header-overlay.themestek-header-style-classic .site-header.themestek-bgcolor-white{
        background-color: rgba(255, 255, 255, 0.38);
    }   
    .themestek-header-overlay.themestek-header-style-classic .site-header-menu.themestek-bgcolor-skincolor,
    .themestek-header-overlay.themestek-header-style-classic .site-header.themestek-bgcolor-skincolor{
        background-color: rgba( <?php echo themestek_hex2rgb($skincolor); ?> , 0.30);
    }    
    .themestek-header-overlay.themestek-header-style-classic .themestek-sticky-bgcolor-darkgrey.is_stuck{
        background-color: #2d3845;
    }    
    .themestek-header-overlay.themestek-header-style-classic .themestek-sticky-bgcolor-grey.is_stuck{
        background-color: #f5f5f5;
    }
    .themestek-header-overlay.themestek-header-style-classic .themestek-sticky-bgcolor-white.is_stuck{
        background-color: #fff;
    }
    .themestek-header-overlay.themestek-header-style-classic .themestek-sticky-bgcolor-skincolor.is_stuck{
        background-color: rgba( <?php echo themestek_hex2rgb($skincolor); ?> , 1);
    }    
    .themestek-header-overlay.themestek-header-style-classic .themestek-pre-header-wrapper.themestek-bgcolor-darkgrey{
        border-bottom-color: rgba(0, 0, 0, 0.13);
    }  
    .themestek-header-style-classic .site-header .themestek-header-right,
    .themestek-header-overlay.themestek-header-style-classic .site-header .themestek-header-right{
        height: <?php echo esc_html($header_height); ?>px;
        line-height: <?php echo esc_html($header_height); ?>px;
    }
    .themestek-header-style-classic .site-header.is_stuck .themestek-header-right,
    .themestek-header-overlay.themestek-header-style-classic .site-header.is_stuck .themestek-header-right,
    .themestek-header-overlay.themestek-header-style-classic .site-header.is_stuck .themestek-social-links-wrapper{
        height: <?php echo esc_html($header_height_sticky); ?>px ;
        line-height: <?php echo esc_html($header_height_sticky); ?>px;
    }
    .themestek-header-overlay.themestek-header-style-classic .site-header.is_stuck.themestek-stickable-header{
        border-bottom: none;
    }
    .themestek-header-overlay.themestek-header-style-classic .themestek-header-icons{
        padding-left: 40px;
        padding-right: 40px;
        font-size: 20px;
        border-left: 1px solid rgba( <?php echo themestek_hex2rgb($mainMenuFontColor); ?> , 0.15) ;
    }
    .themestek-header-overlay.themestek-header-style-classic .themestek-header-right .themestek-vc_general.themestek-vc_btn3{
        background-color: rgba( <?php echo themestek_hex2rgb($mainMenuFontColor); ?> , 1);
        color: #2d3845;
        border-radius: 4px;
    }
    .themestek-header-overlay.themestek-header-style-classic .themestek-header-right .themestek-vc_btn3 span:before {
        background-color: #2d3845 !important;
    }
    .themestek-header-overlay.themestek-header-style-classic .themestek-header-icons{
        margin-left: 40px;
    }

    .themestek-header-overlay.themestek-header-style-classic .themestek-header-right .themestek-header-phone-w{        
        padding-right: 0;   
        vertical-align: middle;    
    }
    .themestek-header-overlay.themestek-header-style-classic .themestek-header-right .themestek-header-phone-w,
    .themestek-header-overlay.themestek-header-style-classic .themestek-header-right .themestek-header-phone-w a{
        color: rgba( <?php echo themestek_hex2rgb($mainMenuFontColor); ?> , 1);
        -webkit-transition: all .2s ease-in-out;
        transition: all .2s ease-in-out;
    }
    .themestek-header-overlay.themestek-header-style-classic .themestek-header-right .themestek-header-phone-w a:hover i{
        color: <?php echo esc_html($skincolor); ?>;
    }
    .themestek-header-overlay.themestek-header-style-classic .themestek-header-right .themestek-header-phone-w .themestek-header-phone-w-inner{
        padding-left: 75px;
        position: relative;
    }
    .themestek-header-overlay.themestek-header-style-classic .themestek-header-phone-w i{
        position: absolute;
        line-height: normal;
        left: 0;
        font-size: 50px;
        top: -8px;
        -webkit-transition: all .2s ease-in-out;
        transition: all .2s ease-in-out;
    }
    .themestek-header-overlay.themestek-header-style-classic .themestek-header-phone-w span{
        display: block;
        line-height: normal;
    }
    .themestek-header-overlay.themestek-header-style-classic .themestek-header-phone-w .themestek-phone-title{
        font-size: 16px;
        font-weight: 600;
    }
    .themestek-header-overlay.themestek-header-style-classic .themestek-header-phone-w .themestek-phone-number{
        font-size: 18px;
        margin-top: 5px;
    }
    .themestek-header-overlay.themestek-header-style-classic .site-header.themestek-bgcolor-transparent{
        border-bottom: 1px solid rgba(255, 255, 255, 0.15)
    }
    .themestek-header-style-classic .themestek-header-right,
    .themestek-header-overlay.themestek-header-style-classic .themestek-header-right{
        float: right;
    }
    .themestek-header-style-classic .themestek-header-right .themestek-header-icons,
    .themestek-header-overlay .themestek-header-right .themestek-header-icons,
    .themestek-header-style-classic .themestek-header-right .themestek-header-button-w,
    .themestek-header-overlay:not(.themestek-header-style-overlaybox) .themestek-header-right .themestek-header-button-w,
    .themestek-header-overlay:not(.themestek-header-style-overlaybox) .themestek-header-right .themestek-social-links-wrapper,
    .themestek-header-overlay:not(.themestek-header-style-overlaybox) .themestek-header-right .themestek-header-phone-w {
        display: inline-block;        
    }
    .themestek-header-overlay .site-header.is_stuck .social-icons li > a{
        color: <?php echo esc_html($stickymainmenufontcolor); ?>;
    }
    .themestek-header-overlay .themestek-pre-header-inner{
        line-height: 60px;
    }
    .themestek-header-overlay .top-contact li:first-child{
        padding-left: 0;
        border: none;
    }
    .themestek-header-overlay .themestek-textcolor-dark{
        color: #313538;
    }
    .themestek-header-overlay .top-contact i{
        font-size: 18px;
    }

