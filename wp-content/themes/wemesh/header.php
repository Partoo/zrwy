<?php
defined('ABSPATH') || exit;
$container = get_theme_mod('partoo_container_type');
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
	<meta name="renderer" content="webkit">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="apple-touch-fullscreen" content="yes"/>
	<meta name="MobileOptimized" content="320"/>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<meta name="description" content="<?php echo get_theme_mod('desc') ?>">
	<link rel="stylesheet" href="https://static.wemesh.cn/lib/fontawesome-free-5.9.0/css/all.min.css">
	<script>var isIE = !!document.documentMode;
			isIE && window.location.replace("https://static.wemesh.cn/html/fk_ie.html")</script>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php do_action('wp_body_open'); ?>
<!-- PAGE START -->
<div id="loading"><div class="loader"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div></div>
<div id="page" class="relative">
  <div id="header" class="header header-shadow">
    <div class="header-inner d-flex align-items-center">
        <div class="container relative">
          <div class="row justify-content-between align-items-center">
      <!--LOGO-->
          <div class="col-xl-3 col-auto"><div class="header-logo d-flex"><a href="/"><img class="logo" src="<?php echo get_theme_root_uri();?>/wemesh/dist/images/logo.png" alt="logo"></a></div></div>
      <!-- LOGO END -->
      <!-- NAV START -->
      <div class="col d-none d-lg-block static">
      <?php wp_nav_menu(
    [
        'theme_location' => 'primary',
        'container_class' => 'site-main-menu',
        'container_id' => 'navbar',
        'menu_class' => '',
        'menu_id' => 'main-menu',
        'fallback_cb' => '',
        'depth' => 2,
        'walker' => new WP_Bootstrap_Navwalker(),
    ]
);?>
      </div>
      <!-- NAV END -->
      <!-- HEADER RIGHT START -->
      <div class="col-lg-1 col-sm-3 col-auto">
        <div class="header-right">
          <div class="inner">
            <!-- HEADER SEARCH WRAPPER START -->
            <div class="header-search">
            <!-- SEARCH BUTTON START -->
            <button id="search_toggler" class="header-search-toggle">
              <i class="fa fa-search"></i>
            </button>
            <!-- SEARCH BUTTON END -->
            <!-- SEARCH FORM START -->
            <div id="searchBar" class="navbar-search-form">
                  <form action="<?php echo esc_url(home_url('/')); ?>" method="post">
                      <input type="text" id="s" name="s" placeholder="输入要搜索的内容..."
aria-label="Search" value="<?php the_search_query(); ?>">
                      <button id="searchsubmit" name="submit" type="submit"><i class="fas fa-search"></i></button>
                  </form>
              </div>
            <!-- SEARCH FORM END -->
            </div>
            <!-- HEADER SEARCH WRAPPER END -->

          <!-- MOBILE MENU TOGGLE START -->
          <div class=" d-flex d-lg-none">
            <button class="toggle" id="showMobileMenu">
              <i class="fa fa-bars"></i>
            </button>
          </div>
          <!-- MOBILE MENU TOGGLE END -->
          </div>
        </div>
      </div>
      <!-- HEADER RIGHT END -->
        </div>
        </div>
    </div>
  </div>
</div>
<!-- PAGE END -->
<!-- MOBILE MENU START -->
<div id="mobile-menu" class="mobile-menu">
  <div class="mobile-menu-inner">
    <div class="mobile-menu-header d-flex justify-content-between align-items-center">
      <div class="mobile-menu-logo"><a href="/"><img class="logo" src="<?php echo get_theme_root_uri();?>/wemesh/dist/images/logo.png" alt="logo"></a></div>
      <div class="mobile-menu-close d-flex"><button class="toggle" id="closeMobileMenu"><i class="fa fa-times"></i></button></div>
    </div>
    <div class="mobile-menu-content">
      <?php wp_nav_menu(
    [
        'theme_location' => 'primary',
        'container_class' => 'mobile-menu-wrapper',
        'container_id' => 'mobile-menu-wrapper',
        'menu_class' => 'mobile-menu-ul',
        'menu_id' => 'mobile-menu-ul',
        'fallback_cb' => '',
        'depth' => 2,
        'walker' => new WP_Bootstrap_Navwalker(),
    ]
);
?>
    </div>
  </div>
</div>
<!-- MOBILE MENU END -->